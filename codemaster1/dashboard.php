<?php
// Mulai session untuk mengecek status login
session_start();

// Redirect ke halaman login jika user belum login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Ambil nama user dari session atau gunakan default 'Pengguna'
$user_name = isset($_SESSION['user_name']) ? htmlspecialchars($_SESSION['user_name']) : 'Pengguna';
$success_message = '';
$error_message = '';

// Tampilkan pesan selamat datang jika berhasil login
if (isset($_GET['login_success'])) {
    $success_message = "Selamat datang kembali, " . $user_name . "!";
}

// Tampilkan pesan sukses jika berhasil melakukan booking
if (isset($_GET['booking_status']) && $_GET['booking_status'] === 'success') {
    $success_message = "Pemesanan kursus Anda telah berhasil ditambahkan!";
}

// Inisialisasi array untuk menyimpan daftar booking
$bookings = [];

// Konfigurasi koneksi database
$db_host = "localhost"; 
$db_user = "root"; 
$db_pass = ""; 
$db_name = "codemaster";

// Membuat koneksi ke database
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Cek koneksi berhasil atau tidak
if ($conn->connect_error) {
    $error_message = "Tidak dapat memuat data pemesanan saat ini.";
} else {
    // Siapkan query untuk mengambil data booking milik user saat ini
    $stmt = $conn->prepare("SELECT id, language, date, time FROM bookings WHERE user_id = ? ORDER BY date DESC, time DESC");
    if ($stmt) {
        $stmt->bind_param("i", $_SESSION['user_id']); // binding parameter
        $stmt->execute(); // eksekusi query
        $result = $stmt->get_result(); // ambil hasil
        $bookings = $result->fetch_all(MYSQLI_ASSOC); // simpan hasil dalam array
        $stmt->close(); // tutup statement
    } else {
        $error_message = "Gagal memuat riwayat pemesanan.";
    }
    $conn->close(); // tutup koneksi database
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - CodeMaster</title>
    <!-- CSS eksternal -->
    <link rel="stylesheet" href="styles.css">
    <!-- Ikon Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Script JavaScript eksternal -->
    <script src="scripts.js" defer></script>
</head>
<body>
    <!-- Navigasi -->
    <header class="navbar">
        <div class="container">
            <a href="index.php" class="nav-brand">CodeMaster</a>
            <button class="nav-toggle" id="navToggle" aria-label="Menu">
                <i class="fas fa-bars"></i>
            </button>
            <ul class="nav-links" id="navLinks">
                <li><a href="index.php">Beranda</a></li>
                <li><a href="index.php#booking-section">Pesan Kursus Baru</a></li>
                <li><a href="logout.php" class="button-style-outline">Logout</a></li>
            </ul>
        </div>
    </header>

    <!-- Konten Utama -->
    <main>
        <div class="container">
            <!-- Header Dashboard -->
            <div class="dashboard-header">
                <h1>Dashboard Anda</h1>
                <p>Selamat datang, <?php echo $user_name; ?>! Kelola jadwal kursus Anda di sini.</p>
            </div>

            <!-- Tampilkan pesan sukses jika ada -->
            <?php if (!empty($success_message)): ?>
                <div id="successMessage" class="message message-success"><?php echo $success_message; ?></div>
            <?php endif; ?>

            <!-- Tampilkan pesan error jika ada -->
            <?php if (!empty($error_message)): ?>
                <div id="errorMessage" class="message message-error"><?php echo $error_message; ?></div>
            <?php endif; ?>

            <!-- Riwayat Pemesanan -->
            <h2 style="margin-bottom: 1.5rem;">Riwayat Pemesanan Kursus</h2>

            <?php if (empty($bookings)): ?>
                <!-- Jika belum ada booking -->
                <div class="no-bookings">
                    <p>Anda belum memiliki pemesanan kursus.</p>
                    <a href="index.php#booking-section" class="btn btn-primary" style="margin-top:1rem;">Pesan Kursus Sekarang</a>
                </div>
            <?php else: ?>
                <!-- Jika ada booking -->
                <div class="bookings-container">
                    <?php foreach ($bookings as $booking): ?>
                        <div class="booking-card">
                            <h3><?php echo htmlspecialchars($booking['language']); ?></h3>
                            <p><strong>Tanggal:</strong> <?php echo htmlspecialchars(date("d M Y", strtotime($booking['date']))); ?></p>
                            <p><strong>Waktu:</strong> <?php echo htmlspecialchars(date("H:i", strtotime($booking['time']))); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; <?php echo date("Y"); ?> CodeMaster. Hak Cipta Dilindungi.</p>
            <p>
                <a href="contact.php">Hubungi Kami</a> |
                <a href="#">Kebijakan Privasi</a> |
                <a href="#">Ketentuan Layanan</a>
            </p>
        </div>
    </footer>
</body>
</html>
