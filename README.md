# CodeMaster: Platform Kursus Pemrograman Privat

Selamat datang di repositori **CodeMaster**!  
Proyek ini adalah aplikasi web sederhana yang dirancang untuk mempermudah pengelolaan kursus pemrograman privat. Aplikasi ini menghubungkan pembelajar dengan mentor secara langsung.

---

## ✨ Fitur Utama

- **Pendaftaran & Login Pengguna:** Membuat akun baru dan masuk dengan mudah.
- **Dashboard Pengguna:** Melihat riwayat pemesanan kursus Anda di satu tempat. _(Perlu file `dashboard.php`)_
- **Pemesanan Kursus Privat:** Memilih bahasa pemrograman, tanggal, dan waktu sesi belajar yang diinginkan.
- **Halaman Utama (Landing Page):** Menyediakan informasi lengkap tentang CodeMaster, layanan, dan keunggulan kami.
- **Halaman Kontak:** Informasi untuk menghubungi tim CodeMaster. _(Perlu file `contact.php`)_
- **Logout:** Keluar dari sesi pengguna dengan aman.

---

## 🚀 Mengapa Memilih CodeMaster?

- **Pembelajaran Personal:** Fokus penuh dari mentor dalam sesi 1-on-1.
- **Kurikulum Fleksibel:** Materi belajar disesuaikan dengan tujuan dan tingkat keahlian Anda.
- **Jadwal Sesuka Hati:** Atur waktu belajar sesuai jadwal Anda.
- **Proyek Nyata:** Terapkan ilmu Anda dengan mengerjakan proyek praktis untuk membangun portofolio.

---

## ⚙️ Persyaratan Sistem

Pastikan Anda memiliki:

- **Server Web:** Apache atau Nginx (disarankan XAMPP/MAMP/WAMP)
- **PHP:** Versi 7.4 atau lebih baru
- **Database:** MySQL (biasanya sudah tersedia di XAMPP/MAMP/WAMP)
- **Browser Web:** Chrome, Firefox, Safari, atau Edge

---

## 📦 Cara Instalasi dan Setup

1. **Unduh atau Clone Repositori:**
    ```bash
    git clone https://github.com/nama_pengguna_anda/codemaster.git
    cd codemaster
    ```
    Atau unduh file ZIP dan ekstrak.

2. **Siapkan Server Web:**
    - Pindahkan folder `codemaster` ke direktori `htdocs` (XAMPP/WAMP) atau `htdocs/www` (MAMP).

3. **Siapkan Database MySQL:**
    - Buka phpMyAdmin (`http://localhost/phpmyadmin`).
    - Buat database baru bernama `codemaster`.
    - Impor file `codemaster.sql` (terdapat pada repositori) ke database tersebut. File ini akan membuat tabel `users` dan `bookings`.

4. **Konfigurasi Koneksi Database:**
    - Sesuaikan detail koneksi database (`$db_host`, `$db_user`, `$db_pass`, `$db_name`) pada file `login.php`, `register.php`, `book.php`, dan `dashboard.php` dengan pengaturan MySQL lokal Anda.
    - Default XAMPP: `localhost`, `root`, `""` (kosong), `codemaster`.

5. **Akses Aplikasi:**
    - Nyalakan server Apache dan MySQL.
    - Buka browser dan kunjungi:  
      `http://localhost/codemaster`  
      atau  
      `http://localhost:8888/codemaster` (untuk MAMP).

---

## 📝 Cara Menggunakan Aplikasi

1. **Daftar Akun:**  
   Klik "Daftar" di halaman utama (`index.php`) atau langsung ke `register.php` untuk membuat akun baru.
2. **Login:**  
   Setelah mendaftar, Anda akan diarahkan ke halaman login (`login.php`). Masukkan email dan password Anda.
3. **Pesan Kursus:**  
   Setelah login, Anda bisa memesan kursus dari halaman utama (`index.php`) di bagian "Pesan Kursus". Pilih bahasa, tanggal, waktu, dan tambahkan catatan.
4. **Logout:**  
   Klik tombol "Logout" di navigasi untuk keluar dari sesi Anda.

---

## 📁 Struktur Proyek
codemaster/ 
├── index.php # Halaman utama (landing page & form pemesanan) 
├── login.php # Halaman login pengguna 
├── register.php # Halaman pendaftaran pengguna 
├── dashboard.php # Halaman dashboard untuk riwayat pemesanan (perlu file ini) 
├── book.php # Proses pengiriman data pemesanan ke database (perlu file ini) 
├── contact.php # Halaman informasi kontak (perlu file ini) 
├── logout.php # Proses logout pengguna 
├── styles.css # File CSS untuk semua gaya tampilan 
├── scripts.js # File JavaScript untuk interaktivitas (menu mobile, validasi form, dll.) 
└── codemaster.sql # File SQL untuk membuat database dan tabel
