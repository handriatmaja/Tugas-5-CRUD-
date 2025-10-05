## Tugas CRUD Laravel: Sistem Manajemen Dosen & Mata Kuliah

Aplikasi web untuk mengelola data Dosen dan Mata Kuliah menggunakan Laravel, dilengkapi fitur seeding, relasi, validasi spesifik, dan dashboard statistik.

---

## Langkah Instalasi & Menjalankan Proyek

Ikuti langkah-langkah di bawah ini untuk menjalankan proyek secara lokal.
Pastikan Anda memiliki Composer dan PHP yang terinstal.

1. Konfigurasi Lingkungan (.env)
Buat file .env dari contoh yang tersedia dan buat Application Key:

cp .env.example .env
php artisan key:generate


2. Konfigurasi Database
Buka file .env dan sesuaikan detail koneksi database Anda.
Ganti baris-baris ini sesuai dengan setup lokal Anda:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tugascrud  # Gunakan nama database yang sudah dibuat atau ganti
DB_USERNAME=root
DB_PASSWORD=  #Biasanya tanpa menggunakan password


3. Migrasi, Seeding, dan Pembersihan Cache (Langkah Kunci)
Jalankan perintah ini untuk membuat tabel (dosens dan mata_kuliahs) dan mengisi data dummy. Perintah composer dump-autoload -o dan migrate:fresh sangat penting agar class dan relasi terdeteksi dengan benar.

#Bersihkan cache konfigurasi Laravel
php artisan config:clear

#Hapus cache Composer dan paksa rebuild class map
composer dump-autoload -o

#Hapus semua tabel lama, jalankan migrasi, dan seed data dummy
php artisan migrate:fresh --seed


4. Menjalankan Server
Setelah database siap, Anda dapat menjalankan aplikasi:

php artisan serve


## Navigasi Aplikasi
Aplikasi akan tersedia di http://127.0.0.1:8000/.

Landing Page (Utama): / (Mengarahkan ke Daftar Mata Kuliah)

Dashboard Statistik: /dashboard

Daftar Dosen: /dosen

Daftar Mata Kuliah: /mata_kuliah



-Andhika Kevin Handriatmaja-
-21060122130056-