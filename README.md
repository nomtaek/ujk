# 📱 Toko kopi  

Aplikasi web berbasis **Laravel 11** yang dirancang untuk digitalisasi manajemen stok dan aset pada toko kopi. Aplikasi ini mengintegrasikan sistem autentikasi keamanan, manajemen data (CRUD), dan antarmuka responsif.

---

## 👤 Identitas Mahasiswa

- **NAMA :** Muhammad Saifullah
- **NIM :** 220103199
- **KELAS:** 22TIA6
- **INSTANSI:** Universitas Duta Bangsa Surakarta

---

## 🗂️ Daftar Isi

Tentang Proyek
Fitur Utama
Teknologi yang Digunakan
Struktur Proyek
Struktur Database
Instalasi & Konfigurasi
Keamanan & Alur Data
Rute Aplikasi

---

## Tentang Proyek

Toko Kopi Manager merupakan aplikasi berbasis web yang digunakan untuk membantu pengelolaan data menu dan stok pada sebuah usaha kedai kopi. Sistem ini dirancang untuk menggantikan pencatatan manual menjadi lebih terstruktur, cepat, dan efisien.

Melalui aplikasi ini, admin dapat mengelola berbagai data seperti daftar menu kopi, harga, deskripsi, serta jumlah stok yang tersedia. Selain itu, sistem juga dilengkapi dengan fitur autentikasi login sehingga hanya pengguna yang terdaftar (admin) yang dapat mengakses dan mengelola data.

Dengan adanya sistem ini, diharapkan proses manajemen menu pada toko kopi menjadi lebih mudah, meminimalisir kesalahan pencatatan, serta meningkatkan efisiensi operasional.
---

## Fitur Utama

- **Autentikasi Keamanan** — Login & Logout menggunakan session Laravel yang diproteksi dengan **Bcrypt Hashing** dan perlindungan terhadap serangan CSRF.
- **Dashboard Statistik** — Menampilkan ringkasan total item, total stok tersedia, dan kategori barang secara real-time.
- **Manajemen Inventaris (CRUD)** — Fitur lengkap untuk Menambah, Melihat Detail, Mengedit, dan Menghapus data barang.
- **Middleware Protection** — Memastikan halaman manajemen hanya dapat diakses oleh pengguna yang sudah terverifikasi (login).
- **UI Responsif** — Antarmuka modern menggunakan **Tailwind CSS** yang optimal diakses melalui PC maupun Smartphone.
- **Notifikasi Sistem** — Integrasi **SweetAlert2** untuk memberikan pesan konfirmasi dan status sukses/gagal pada setiap aksi pengguna.

---

## Teknologi yang Digunakan

| Komponen       | Detail                           |
| :------------- | :------------------------------- |
| **Framework**  | Laravel 11 (PHP)                 |
| **Database**   | MySQL                            |
| **Frontend**   | Tailwind CSS & Blade Templating  |
| **Library UI** | SweetAlert2 & FontAwesome 6      |
| **Security**   | Bcrypt Hashing & CSRF Protection |
| **Build Tool** | Vite                             |

---

## Struktur Proyek

```
tokokopi/
├── app/
│   ├── Http/Controllers/
│   │   └── ProductController.php
│   └── Models/
│       ├── User.php
│       └── Product.php
├── database/
│   └── migrations/
├── resources/views/
│   ├── auth/
│   └── products/
├── routes/
│   └── web.php
└── .env

---

## Struktur Database

### Tabel `items` (Manajemen Stok)

| Kolom         | Tipe        | Keterangan                         |
| :------------ | :---------- | :--------------------------------- |
| `id`          | bigint (PK) | Auto Increment                     |
| `nama_barang` | string      | Nama produk/aksesoris              |
| `kategori`    | string      | Contoh: Smartphone, Charger, Audio |
| `harga_beli`  | decimal     | Harga modal barang                 |
| `harga_jual`  | decimal     | Harga jual ke konsumen             |
| `stok`        | integer     | Jumlah unit tersedia               |
| `keterangan`  | text        | Deskripsi tambahan barang          |

### Tabel `users` (Otentikasi)

| Kolom      | Tipe        | Keterangan                 |
| :--------- | :---------- | :------------------------- |
| `id`       | bigint (PK) | Auto Increment             |
| `name`     | string      | Nama lengkap Admin         |
| `email`    | string      | Email untuk login (Unique) |
| `password` | string      | **Bcrypt Hash**            |

---

## Instalasi & Konfigurasi

1. **Clone Repository**

    ```bash
    git clone https://github.com/nomtaek/ujk
    cd UJK
    ```

2. **Install Dependensi**

    ```bash
    composer install
    npm install && npm run build
    ```

3. **Konfigurasi Database**
   Salin `.env.example` ke `.env` dan atur koneksi database MySQL.

4. **Migrasi & Key Generate**

    ```bash
    php artisan key:generate
    php artisan migrate --seed
    ```

5. **Jalankan Aplikasi**
    ```bash
    php artisan serve
    ```

---

## Akun Default (Seeder)

Setelah menjalankan perintah `php artisan migrate --seed`, Anda dapat menggunakan akun berikut untuk masuk ke sistem:

'email' => 'user1@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
---

## Keamanan & Alur Data

Sistem ini menerapkan dua lapisan keamanan utama:

1. **Bcrypt Hashing** — Diimplementasikan pada AuthController. Saat pengguna login atau mendaftar, password diproses menggunakan fungsi `Hash::make` yang menghasilkan string acak aman.

2. **Middleware** — Seluruh rute manajemen stok di dalam `web.php` dibungkus dengan `Route::middleware(['auth'])`. Ini bertugas memvalidasi session user sebelum mengizinkan akses ke database.

---

## Rute Aplikasi

| Method | URL             | Controller               | Fungsi                |
| :----- | :-------------- | :----------------------- | :-------------------- |
| GET    | `/login`        | AuthController@showLogin | Form Login            |
| POST   | `/login`        | AuthController@login     | Proses Verifikasi     |
| GET    | `/dashboard`    | ItemController@index     | Tampilan Utama (Auth) |
| GET    | `/items/create` | ItemController@create    | Form Tambah Stok      |
| POST   | `/items`        | ItemController@store     | Simpan Data ke DB     |
| DELETE | `/items/{id}`   | ItemController@destroy   | Hapus Data            |