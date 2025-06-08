<?php
// jadi ini tuh fungsinya buat memulai session PHP,
// penting biar bisa ngecek user udah login atau belum
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <!-- jadi ini biar halaman bisa responsif di berbagai ukuran layar -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - CodeMaster</title>

    <!-- ini tuh ngelinkin ke file CSS lokal buat styling -->
    <link rel="stylesheet" href="styles.css">
    
    <!-- nah ini buat pake ikon dari Font Awesome, biar tampilannya lebih kece -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- ini ngelinkin file JS lokal dan di-load setelah HTML selesai kebaca -->
    <script src="scripts.js" defer></script>
</head>
<body>
    <!-- ini bagian header atau navbar -->
    <header class="navbar">
        <div class="container">
            <!-- brand/logo di navbar -->
            <a href="index.php" class="nav-brand">CodeMaster</a>

            <!-- tombol buat toggle menu di mobile -->
            <button class="nav-toggle" id="navToggle" aria-label="Menu">
                <i class="fas fa-bars"></i>
            </button>

            <!-- ini daftar link di navbar -->
            <ul class="nav-links" id="navLinks">
                <li><a href="index.php">Beranda</a></li>

                <?php if (isset($_SESSION['user_id'])): ?>
                    <!-- jadi ini muncul cuma kalau user udah login -->
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="index.php#booking-section">Pesan Kursus</a></li>
                    <li><a href="logout.php" class="button-style-outline">Logout</a></li>
                <?php else: ?>
                    <!-- nah yang ini muncul kalau user belum login -->
                    <li><a href="index.php#features">Fitur</a></li>
                    <li><a href="login.php" class="button-style-outline">Login</a></li>
                    <li><a href="register.php" class="button-style">Daftar</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </header>

    <!-- ini bagian utama dari halaman -->
    <main>
        <div class="container">
            <div class="contact-card">
                <h2>Hubungi Kami</h2>
                <p>Untuk informasi lebih lanjut, silakan hubungi tim kami:</p>

                <!-- daftar kontak dari tim -->
                <div class="contact-list">
                    <div class="contact-item">
                        <h3>Ni Kadek Dwi Puspita Sari</h3>
                        <!-- icon email + link mailto biar langsung buka email -->
                        <p><i class="fas fa-envelope"></i> Email: <a href="mailto:dwipuspit@codemaster.com">dwipuspit@codemaster.com</a></p>
                    </div>
                    <div class="contact-item">
                        <h3>Ni Luh Putu Eka Mulianingsih</h3>
                        <p><i class="fas fa-envelope"></i> Email: <a href="mailto:putuekamulia@codemaster.com">putuekamulia@codemaster.com</a></p>
                    </div>
                    <div class="contact-item">
                        <h3>Ni Nyoman Trisna Yanti</h3>
                        <p><i class="fas fa-envelope"></i> Email: <a href="mailto:trisnayanti@codemaster.com">trisnayanti@codemaster.com</a></p>
                    </div>
                    <div class="contact-item">
                        <h3>Ni Putu Laksmi Priya Dewi Dasi</h3>
                        <p><i class="fas fa-envelope"></i> Email: <a href="mailto:laksmipriya@codemaster.com">laksmipriya@codemaster.com</a></p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- ini bagian footer yang muncul di bawah -->
    <footer class="footer">
        <div class="container">
            <!-- ini buat nampilin tahun otomatis pake PHP -->
            <p>&copy; <?php echo date("Y"); ?> CodeMaster. Hak Cipta Dilindungi.</p>
            <p>
                <!-- navigasi tambahan di footer -->
                <a href="contact.php">Hubungi Kami</a> |
                <a href="#">Kebijakan Privasi</a> |
                <a href="#">Ketentuan Layanan</a>
            </p>
        </div>
    </footer>
</body>
</html>
