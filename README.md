# Portfolio CMS (PHP Native MVC)

Aplikasi website portfolio pribadi yang ringan, premium, dan bersih, terintegrasi dengan Dashboard Administrasi kustom (CMS). Dibangun sepenuhnya dari nol menggunakan PHP Native, MySQL (PDO), Bootstrap 5, dan Vanilla JavaScript.

## Fitur

### 💻 Public Portfolio Website
- **Hero Banner:** Judul dinamis, peran profesional, narasi bio, tombol aksi (CTA), dan pengunduh CV/resume.
- **About Me:** Penjelasan profesional, informasi kontak, dan foto profil/avatar.
- **Work Experiences:** Linimasa kronologis yang menampilkan peran kerja, detail perusahaan, periode kerja, dan deskripsi tanggung jawab.
- **Education Timeline:** Menampilkan gelar akademik, jurusan, nama institusi, IPK/GPA, dan periode studi.
- **Skills Directory:** Bar persentase kemahiran yang dikelompokkan berdasarkan kategori (Frontend, Backend, DevOps, dll).
- **Projects Showcase:** Kartu modern yang menampilkan gambar preview, deskripsi proyek, tautan demo langsung, dan repositori GitHub.
- **Licenses & Certificates:** Lencana lisensi profesional yang terhubung dengan tautan verifikasi kredensial.
- **Contact:** Saluran kontak yang aman dan tautan media sosial (GitHub, LinkedIn).

### 🛠️ Admin Dashboard CMS
- **Autentikasi Aman:** Proteksi halaman admin dari akses tidak sah menggunakan Session Guard.
- **Kelola Profil:** Perbarui biografi, data diri, unggah foto profil baru, dan unggah berkas resume (PDF).
- **CRUD Pengalaman:** Formulir lengkap untuk menambah, mengubah, dan menghapus riwayat pengalaman kerja.
- **CRUD Pendidikan:** Formulir lengkap untuk menambah, mengubah, dan menghapus riwayat akademik.
- **CRUD Skill:** Penggeser (*slider*) tingkat kemahiran dan pengelompokan kategori keahlian.
- **CRUD Project:** Unggah gambar proyek, tulis deskripsi, dan simpan tautan demo serta repositori kode.
- **CRUD Sertifikat:** Kelola sertifikasi profesional beserta ID kredensial dan URL verifikasinya.

---

## Tech Stack
- **Backend:** PHP 8+ (Native, OOP, MVC Architecture)
- **Database:** MySQL via PDO (Prepared Statements untuk Keamanan SQL)
- **Frontend Framework:** Bootstrap 5 (CDN) & Bootstrap Icons
- **Typography:** Poppins (Google Fonts)
- **Styling:** CSS Kustom (style.css) dengan estetika premium terinspirasi dari Vercel/Notion (efek bayangan halus, navbar glassmorphism, dan mikro-interaksi yang interaktif).

---

## Struktur Direktori
```text
/public               # Root server web
  /assets
    /css/style.css    # Stylesheet kustom global
    /js/app.js        # Logika scroll navigasi dan interaksi UI
  /uploads            # Berkas unggahan (foto profil, CV, gambar proyek)
  index.php           # Front Controller / App Bootstrapper
/app                  # Logika Aplikasi
  /core               # Kelas Inti (Router, Controller, Model, Database)
  /controllers        # Pengendali Rute (HomeController, AuthController, AdminController)
  /helpers            # Fungsi Utility (helpers.php, upload.php)
  /models             # Skema Entitas Database (Profile, Experience, Education, dll)
  /views              # Templat Tampilan/UI (layouts/, admin/, home.php, login.php)
/config               # Konfigurasi aplikasi
/database             # Mesin Migrasi dan Seeder
  /migrations
  /seeders
  migrate.php
  seed.php
/routes
  web.php             # Registrasi Rute Web
.env                  # File konfigurasi env lokal
```

---

## Setup & Instalasi

### 1. Konfigurasi Environment
Buat atau ubah nama file `.env` di direktori utama (root) proyek Anda:
```ini
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=portfolio_cms
DB_USERNAME=root
DB_PASSWORD=
```

### 2. Jalankan Migrasi Database
Untuk menginisialisasi skema tabel database secara bersih:
```bash
php database/migrate.php
```

### 3. Jalankan Seeder Database
Mengisi database dengan data dummy awal serta akun admin default:
```bash
php database/seed.php
```

### 4. Jalankan Local PHP Server
Mulai server PHP dengan mengarahkan root direktori ke folder `public`:
```bash
php -S localhost:8000 -t public
```

Buka alamat `http://localhost:8000` pada web browser Anda.

---

## Kredensial Login Admin
Untuk mengakses halaman CMS Dashboard (`http://localhost:8000/login`):
- **Username:** `admin`
- **Password:** `admin123`
