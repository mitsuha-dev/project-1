CodeMaster: Platform Kursus Pemrograman Privat

Selamat datang di repositori CodeMaster! Proyek ini adalah aplikasi web sederhana yang dirancang untuk mempermudah pengelolaan kursus pemrograman privat. Aplikasi ini menghubungkan pembelajar dengan mentor berpengalaman untuk bimbingan personal dan intensif.
✨ Fitur Utama

    Pendaftaran & Login Pengguna: Membuat akun baru dan masuk dengan mudah.
    Dashboard Pengguna: Melihat riwayat pemesanan kursus Anda di satu tempat (perlu file dashboard.php).
    Pemesanan Kursus Privat: Memilih bahasa pemrograman, tanggal, dan waktu sesi belajar yang diinginkan.
    Halaman Utama (Landing Page): Memberikan informasi lengkap tentang CodeMaster, layanan yang ditawarkan, dan keunggulan kami.
    Halaman Kontak: Informasi untuk menghubungi tim CodeMaster (perlu file contact.php).
    Logout: Keluar dari sesi pengguna dengan aman.

🚀 Mengapa Memilih CodeMaster?

    Pembelajaran Personal: Dapatkan fokus penuh dari mentor dalam sesi 1-on-1.
    Kurikulum Fleksibel: Materi belajar disesuaikan dengan tujuan dan tingkat keahlian Anda.
    Jadwal Sesuka Hati: Atur waktu belajar yang paling cocok dengan jadwal sibuk Anda.
    Proyek Nyata: Terapkan ilmu Anda dengan mengerjakan proyek praktis dan bangun portofolio Anda.

⚙️ Persyaratan Sistem

Untuk menjalankan aplikasi ini di lingkungan lokal Anda, pastikan Anda memiliki:

    Server Web: Apache atau Nginx (disarankan menggunakan XAMPP/MAMP/WAMP).
    PHP: Versi 7.4 atau yang lebih baru.
    Database: MySQL (biasanya termasuk dalam XAMPP/MAMP/WAMP).
    Browser Web: Chrome, Firefox, Safari, atau Edge.

📦 Cara Instalasi dan Setup

Ikuti langkah-langkah berikut untuk menyiapkan CodeMaster di komputer Anda:

    Unduh atau Clone Repositori:
    Bash

    git clone https://github.com/nama_pengguna_anda/codemaster.git
    cd codemaster

    Atau unduh file ZIP dan ekstrak.

    Siapkan Server Web:
    Pindahkan folder codemaster ke direktori htdocs (untuk XAMPP/WAMP) atau htdocs/www (untuk MAMP).

    Siapkan Database MySQL:
        Buka phpMyAdmin (biasanya di http://localhost/phpmyadmin).
        Buat database baru bernama codemaster.
        Impor file codemaster.sql (termasuk dalam repositori ini) ke database yang baru Anda buat. File ini akan membuat tabel users dan bookings.

    Konfigurasi Koneksi Database:
    Pastikan detail koneksi database ($db_host, $db_user, $db_pass, $db_name) di file login.php dan register.php (serta book.php dan dashboard.php jika ada) sesuai dengan pengaturan MySQL lokal Anda.
        Secara default untuk XAMPP: localhost, root, "" (kosong), codemaster.

    Akses Aplikasi:
        Nyalakan server Apache dan MySQL Anda (melalui panel kontrol XAMPP/MAMP/WAMP).
        Buka browser web Anda dan kunjungi: http://localhost/codemaster (atau http://localhost:8888/codemaster jika menggunakan MAMP).

📝 Cara Menggunakan Aplikasi

    Daftar Akun: Klik "Daftar" di halaman utama (index.php) atau langsung ke register.php untuk membuat akun baru.
    Login: Setelah mendaftar, Anda akan diarahkan ke halaman login (login.php). Masukkan email dan password Anda.
    Pesan Kursus: Setelah login, Anda bisa memesan kursus dari halaman utama (index.php) di bagian "Pesan Kursus". Pilih bahasa, tanggal, waktu, dan tambahkan catatan.
    Logout: Klik tombol "Logout" di navigasi untuk keluar dari sesi Anda.

📁 Struktur Proyek

codemaster/
├── index.php         # Halaman utama (landing page & form pemesanan)
├── login.php         # Halaman login pengguna
├── register.php      # Halaman pendaftaran pengguna
├── dashboard.php     # Halaman dashboard untuk riwayat pemesanan (perlu file ini)
├── book.php          # Proses pengiriman data pemesanan ke database (perlu file ini)
├── contact.php       # Halaman informasi kontak (perlu file ini)
├── logout.php        # Proses logout pengguna
├── styles.css        # File CSS untuk semua gaya tampilan
├── scripts.js        # File JavaScript untuk interaktivitas (menu mobile, validasi form, dll.)
└── codemaster.sql    # File SQL untuk membuat database dan tabel
