<?php
session_start();

// Jadi, ini tuh fungsinya untuk ngecek apakah user udah login atau belum
if (!isset($_SESSION['user_id'])) {
    // Kalau belum login, langsung diarahkan ke halaman login
    header("Location: login.php?error=" . urlencode("Anda harus login untuk melakukan pemesanan."));
    exit();
}

// Nah, ini ngecek apakah request-nya beneran pake POST
// Soalnya kita cuma ngizinin booking lewat form POST aja, bukan GET atau lainnya
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header("Location: index.php");
    exit();
}

// Konfigurasi database-nya, kayak nama server, username, password, dan nama databasenya
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "codemaster";

// Ini buat koneksi ke database-nya
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Kalau koneksinya gagal, log error-nya dan kasih tahu user-nya
if ($conn->connect_error) {
    error_log("Database connection failed: " . $conn->connect_error);
    header("Location: index.php?booking_status=error_db#booking-section");
    exit();
}

// Ini bagian buat ngambil data dari form, terus disanitize dulu biar aman dari SQL injection
$language = isset($_POST['language']) ? trim($conn->real_escape_string($_POST['language'])) : '';
$date = isset($_POST['date']) ? trim($conn->real_escape_string($_POST['date'])) : '';
$time = isset($_POST['time']) ? trim($conn->real_escape_string($_POST['time'])) : '';
$notes = isset($_POST['notes']) ? trim($conn->real_escape_string($_POST['notes'])) : '';
$user_id = $_SESSION['user_id'];

// Cek dulu nih, jangan sampai ada input yang kosong
if (empty($language) || empty($date) || empty($time)) {
    header("Location: index.php?booking_status=error_incomplete#booking-section");
    exit();
}

// Validasi tanggal dan waktu. Jadi, kita pastiin user gak bisa booking ke waktu yang udah lewat
$selected_datetime = strtotime($date . ' ' . $time);
$current_datetime = time();

if ($selected_datetime === false) {
    // Kalau tanggalnya gak valid (misalnya formatnya aneh), kita tolak
    header("Location: index.php?booking_status=error_invalid_date#booking-section");
    exit();
}

if ($selected_datetime < $current_datetime) {
    // Kalau user milih waktu yang udah lewat, kita juga tolak
    header("Location: index.php?booking_status=error_past_date#booking-section");
    exit();
}

// Ini bagian penting: kita siapin statement buat masukin data booking ke database
$stmt = $conn->prepare("INSERT INTO bookings (user_id, language, date, time, notes) VALUES (?, ?, ?, ?, ?)");
if (!$stmt) {
    // Kalau prepare gagal (mungkin karena query error), kita log dan kasih feedback
    error_log("Prepare failed: " . $conn->error);
    header("Location: index.php?booking_status=error_statement#booking-section");
    exit();
}

// Bind parameter ke statement-nya. Jadi, datanya dimasukin satu-satu secara aman
$stmt->bind_param("issss", $user_id, $language, $date, $time, $notes);

// Eksekusi query-nya
if (!$stmt->execute()) {
    // Kalau gagal saat insert, kita log juga dan kasih notifikasi error
    error_log("Execute failed: " . $stmt->error);
    header("Location: index.php?booking_status=error_failed#booking-section");
    $stmt->close();
    $conn->close();
    exit();
}

// Kalau berhasil, kita tutup koneksi dan arahin user ke dashboard dengan pesan sukses
$stmt->close();
$conn->close();
header("Location: dashboard.php?booking_status=success");
exit();
?>
