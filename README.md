# ☕ Toko Kopi - Sistem Manajemen Inventori

Aplikasi web berbasis **Laravel 11** yang dirancang untuk digitalisasi manajemen stok kopi dan data pemasok. Sistem ini mengintegrasikan autentikasi keamanan, manajemen data (CRUD), dan antarmuka responsif.

---

## 👤 Identitas Mahasiswa

- **NAMA :** Muhammad Saifullah
- **NIM :** 220103199
- **KELAS:** 22TIA6
- **INSTANSI:** Universitas Duta Bangsa Surakarta

---

## 📋 Daftar Isi

- [Tentang Proyek](#tentang-proyek)
- [Fitur Utama](#fitur-utama)
- [Teknologi yang Digunakan](#teknologi-yang-digunakan)
- [Struktur Proyek](#struktur-proyek)
- [Struktur Database](#struktur-database)
- [Instalasi & Konfigurasi](#instalasi--konfigurasi)
- [Penggunaan Aplikasi](#penggunaan-aplikasi)
- [Rute Aplikasi](#rute-aplikasi)
- [Keamanan & Alur Data](#keamanan--alur-data)
- [Development Commands](#development-commands)
- [Troubleshooting](#troubleshooting)

---

## Tentang Proyek

**Toko Kopi Manager** adalah aplikasi berbasis web yang dirancang untuk membantu pengelolaan inventori kopi dan data pemasok pada usaha kedai kopi. Sistem ini menggantikan pencatatan manual menjadi lebih terstruktur, cepat, dan efisien.

Melalui aplikasi ini, admin dapat mengelola:
- **Daftar Jenis Kopi** - Nama, tipe, asal daerah, harga, stok, dan gambar produk
- **Data Pemasok** - Kontak, alamat, status, dan informasi tambahan supplier
- **Sistem Autentikasi** - Login aman dengan password hashing untuk admin

Dengan sistem ini, proses manajemen menjadi lebih mudah, meminimalisir kesalahan, dan meningkatkan efisiensi operasional.

---

## Fitur Utama

### 🔐 Keamanan
- **Login & Logout** - Sistem autentikasi dengan Bcrypt password hashing
- **CSRF Protection** - Perlindungan terhadap serangan CSRF
- **Middleware Protection** - Halaman admin hanya dapat diakses user yang login
- **Session Management** - Pengelolaan session Laravel yang aman

### ☕ Manajemen Jenis Kopi
- ✅ CRUD lengkap (Create, Read, Update, Delete)
- ✅ Kelola stok per jenis kopi
- ✅ Harga dinamis
- ✅ Deskripsi detail produk
- ✅ Upload gambar produk
- ✅ Klasifikasi: Arabika, Robusta, Liberika, Excelsa
- ✅ Informasi asal daerah
- ✅ Pagination & sorting

### 🚚 Manajemen Pemasok
- ✅ CRUD lengkap untuk supplier
- ✅ Kelola kontak pemasok (email, telepon)
- ✅ Alamat lengkap dan lokasi geografis
- ✅ Status aktif/nonaktif supplier
- ✅ Catatan tambahan untuk setiap pemasok
- ✅ Email unik untuk setiap supplier

### 🎨 UI/UX
- **Responsive Design** - Optimal di PC, tablet, dan smartphone
- **Bootstrap 5** - Framework CSS modern
- **Bootstrap Icons** - Icon library yang lengkap
- **Notifikasi Alert** - Pesan sukses/error otomatis
- **Pagination** - List data dengan pembagian halaman
- **Tema Cokelat** - Sesuai identitas kopi

---

## Teknologi yang Digunakan

| Komponen       | Detail                               |
| :------------- | :----------------------------------- |
| **Framework**  | Laravel 11 (PHP 8.2+)                |
| **Database**   | MySQL/MariaDB                        |
| **Frontend**   | Bootstrap 5.3 & Blade Templating    |
| **Icons**      | Bootstrap Icons 1.11                 |
| **Security**   | Bcrypt Hashing & CSRF Protection    |
| **Build Tool** | Vite                                 |
| **Package Mgr**| Composer (PHP) & NPM (JS)           |

---

## Struktur Proyek

```
tokokopi/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AuthController.php
│   │   │   ├── JenisKopiController.php
│   │   │   └── SupplierController.php
│   │   ├── Kernel.php
│   │   └── Middleware/
│   ├── Models/
│   │   ├── User.php
│   │   ├── JenisKopi.php
│   │   └── Supplier.php
│   └── Providers/
├── database/
│   ├── factories/
│   ├── migrations/
│   │   ├── 2014_10_12_000000_create_users_table.php
│   │   ├── 2026_04_22_122358_create_jenis_kopi_table.php
│   │   └── 2026_04_25_000001_create_suppliers_table.php
│   └── seeders/
├── resources/
│   ├── views/
│   │   ├── layouts/
│   │   │   └── app.blade.php
│   │   ├── kopi/
│   │   │   ├── index.blade.php
│   │   │   ├── create.blade.php
│   │   │   ├── show.blade.php
│   │   │   └── edit.blade.php
│   │   ├── supplier/
│   │   │   ├── index.blade.php
│   │   │   ├── create.blade.php
│   │   │   ├── show.blade.php
│   │   │   └── edit.blade.php
│   │   ├── auth/
│   │   └── welcome.blade.php
│   ├── css/ & js/
├── routes/
│   ├── web.php
│   ├── api.php
│   └── channels.php
├── storage/app/public/kopi/
├── tests/
├── vendor/
├── public/
├── .env & .env.example
├── composer.json & package.json
├── artisan
├── vite.config.js
└── README.md
```

---

## Struktur Database

### Tabel `jenis_kopis` (Manajemen Jenis Kopi)

| Kolom | Tipe | Nullable | Keterangan |
| :--- | :--- | :--- | :--- |
| `id` | bigint (PK) | NO | Auto Increment |
| `nama` | string(100) | NO | Nama jenis kopi |
| `asal_daerah` | string(100) | NO | Asal daerah kopi |
| `jenis` | enum | NO | Arabika/Robusta/Liberika/Excelsa |
| `deskripsi` | text | YES | Deskripsi detail |
| `harga` | decimal(10,2) | NO | Harga per kg |
| `stok` | integer | NO | Stok tersedia (kg) |
| `gambar` | string | YES | Path gambar produk |
| `created_at` | timestamp | NO | Waktu dibuat |
| `updated_at` | timestamp | NO | Waktu diupdate |

### Tabel `suppliers` (Manajemen Pemasok)

| Kolom | Tipe | Nullable | Keterangan |
| :--- | :--- | :--- | :--- |
| `id` | bigint (PK) | NO | Auto Increment |
| `nama` | string(100) | NO | Nama pemasok |
| `nama_pemilik` | string(100) | NO | Nama pemilik |
| `email` | string | NO | Email (UNIQUE) |
| `telepon` | string(15) | NO | Nomor telepon |
| `alamat` | text | NO | Alamat lengkap |
| `kota` | string(50) | NO | Kota |
| `provinsi` | string(50) | NO | Provinsi |
| `kode_pos` | string(10) | YES | Kode pos |
| `catatan` | text | YES | Catatan tambahan |
| `status` | enum | NO | Aktif/Nonaktif |
| `created_at` | timestamp | NO | Waktu dibuat |
| `updated_at` | timestamp | NO | Waktu diupdate |

### Tabel `users` (Sistem Autentikasi)

| Kolom | Tipe | Nullable | Keterangan |
| :--- | :--- | :--- | :--- |
| `id` | bigint (PK) | NO | Auto Increment |
| `name` | string | NO | Nama lengkap user |
| `email` | string | NO | Email (UNIQUE) |
| `email_verified_at` | timestamp | YES | Verifikasi email |
| `password` | string | NO | Password (Bcrypt Hash) |
| `created_at` | timestamp | NO | Waktu dibuat |
| `updated_at` | timestamp | NO | Waktu diupdate |

---

## Instalasi & Konfigurasi

### Prerequisites
- PHP 8.2 atau lebih tinggi
- Composer
- MySQL/MariaDB
- Node.js & NPM
- Git

### Langkah-langkah Instalasi

#### 1. Clone Repository
```bash
git clone https://github.com/nomtaek/ujk.git
cd ujk/tokokopi
```

#### 2. Install Dependensi PHP
```bash
composer install
```

#### 3. Install Dependensi JavaScript
```bash
npm install
npm run build
```

#### 4. Setup Environment File
```bash
cp .env.example .env
php artisan key:generate
```

#### 5. Konfigurasi Database
Edit file `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=toko_kopi
DB_USERNAME=root
DB_PASSWORD=
```

#### 6. Run Migrations
```bash
php artisan migrate
```

#### 7. (Opsional) Seed Database
```bash
php artisan db:seed
```

#### 8. Create Storage Link
```bash
php artisan storage:link
```

#### 9. Start Development Server
```bash
php artisan serve
```

Akses aplikasi di: `http://localhost:8000`

---

## Penggunaan Aplikasi

### Login
1. Buka `http://localhost:8000/login`
2. Masukkan email dan password
3. Klik tombol "Login"
4. Sistem akan mengarahkan ke halaman Jenis Kopi

### Menu Jenis Kopi (`/kopi`)
**Fitur:**
- Lihat daftar semua jenis kopi dengan pagination
- Tambah jenis kopi baru (upload gambar, set harga, stok)
- Edit data jenis kopi
- Lihat detail kopi
- Hapus jenis kopi

**Tombol Aksi:**
- 👁️ **Eye Icon** - Lihat detail
- ✏️ **Pencil Icon** - Edit data
- 🗑️ **Trash Icon** - Hapus data

### Menu Pemasok (`/supplier`)
**Fitur:**
- Lihat daftar semua pemasok dengan pagination
- Tambah pemasok baru (kontak, alamat lengkap, status)
- Edit data pemasok
- Lihat detail pemasok
- Hapus pemasok
- Filter status (Aktif/Nonaktif)

**Tombol Aksi:**
- 👁️ **Eye Icon** - Lihat detail
- ✏️ **Pencil Icon** - Edit data
- 🗑️ **Trash Icon** - Hapus data

### Logout
Klik tombol "Logout" di navbar untuk keluar dari sistem.

---

## Rute Aplikasi

### Authentication Routes
| Method | URL | Fungsi |
| :----- | :--- | :--- |
| GET | `/login` | Tampil form login |
| POST | `/login` | Proses verifikasi login |
| POST | `/logout` | Logout user |

### Jenis Kopi Routes
| Method | URL | Fungsi |
| :----- | :--- | :--- |
| GET | `/kopi` | List semua kopi |
| GET | `/kopi/create` | Form tambah kopi |
| POST | `/kopi` | Store kopi baru ke DB |
| GET | `/kopi/{id}` | Detail kopi |
| GET | `/kopi/{id}/edit` | Form edit kopi |
| PUT | `/kopi/{id}` | Update kopi |
| DELETE | `/kopi/{id}` | Hapus kopi |

### Pemasok Routes
| Method | URL | Fungsi |
| :----- | :--- | :--- |
| GET | `/supplier` | List semua pemasok |
| GET | `/supplier/create` | Form tambah pemasok |
| POST | `/supplier` | Store pemasok ke DB |
| GET | `/supplier/{id}` | Detail pemasok |
| GET | `/supplier/{id}/edit` | Form edit pemasok |
| PUT | `/supplier/{id}` | Update pemasok |
| DELETE | `/supplier/{id}` | Hapus pemasok |

---

## Keamanan & Alur Data

### 1. Password Hashing (Bcrypt)
```php
// Proses saat login
if (Hash::check($request->password, $user->password)) {
    // Password valid
}

// Proses saat create/update user
'password' => Hash::make($request->password)
```

### 2. Middleware Protection
```php
// web.php
Route::middleware('auth')->group(function () {
    Route::resource('kopi', JenisKopiController::class);
    Route::resource('supplier', SupplierController::class);
});
```
Hanya user yang sudah login yang dapat akses routes ini.

### 3. CSRF Protection
Setiap form otomatis dilindungi dengan token CSRF:
```blade
@csrf
```

### 4. Session Management
Session user disimpan di `storage/framework/sessions/` dengan lifetime konfigurabel.

### 5. Input Validation
Setiap request divalidasi di controller:
```php
$request->validate([
    'nama' => 'required|string|max:100',
    'email' => 'required|email|unique:suppliers,email,'.$id,
    // ... validation rules
]);
```

---

## Development Commands

```bash
# Start dev server
php artisan serve

# Build frontend assets
npm run build
npm run dev

# Database commands
php artisan migrate
php artisan migrate:rollback
php artisan migrate:refresh
php artisan migrate:fresh
php artisan db:seed

# Cache commands
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Model & Controller generation
php artisan make:model ModelName
php artisan make:controller ControllerName
php artisan make:migration create_table_name

# Tinker (interactive shell)
php artisan tinker
```

---

## Validasi Form

### Jenis Kopi Validation Rules
```
- nama (required, string, max:100)
- asal_daerah (required, string, max:100)
- jenis (required, in:Arabika,Robusta,Liberika,Excelsa)
- deskripsi (nullable, string)
- harga (required, numeric, min:0)
- stok (required, integer, min:0)
- gambar (nullable, image, mimes:jpg,jpeg,png,webp, max:2048)
```

### Pemasok Validation Rules
```
- nama (required, string, max:100)
- nama_pemilik (required, string, max:100)
- email (required, email, unique:suppliers,email)
- telepon (required, string, max:15)
- alamat (required, string)
- kota (required, string, max:50)
- provinsi (required, string, max:50)
- kode_pos (nullable, string, max:10)
- catatan (nullable, string)
- status (required, in:Aktif,Nonaktif)
```

---

## Troubleshooting

### Error: "Target class does not exist"
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
```

### Error Database Connection
- Pastikan MySQL service berjalan
- Cek konfigurasi `.env` database
- Run: `php artisan migrate`

### Gambar tidak tampil di browser
```bash
# Create symbolic link
php artisan storage:link
```

### Port 8000 sudah terpakai
```bash
php artisan serve --port=8001
```

### Cache issues
```bash
php artisan cache:clear
php artisan view:clear
```

---

## Akun Test (Default Seeder)

Setelah `php artisan migrate --seed`:
```
Email: user1@gmail.com
Password: password123
```

---

## 📝 Notes

- Semua password disimpan dalam bentuk **Bcrypt hash** (irreversible)
- Gambar disimpan di `storage/app/public/kopi/`
- Session default expiration: 120 minutes
- CSRF token diperlukan untuk setiap POST/PUT/DELETE request
- Pagination default: 10 items per page

---

## 👥 Kontribusi

Kontribusi sangat diterima! Silakan:
1. Fork repository
2. Buat branch feature
3. Commit changes
4. Push ke branch
5. Buat Pull Request

---

**Last Updated:** April 25, 2026  
**Version:** 1.0.0  
**Status:** Active Development ✅