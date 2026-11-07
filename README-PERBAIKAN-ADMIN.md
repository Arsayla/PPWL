# PPWL — perbaikan admin/dashboard

Project ini menggunakan Laravel 12 dan PHP 8.2+. Perubahan ini mempertahankan database yang sudah ada dan tidak menambahkan/menghapus migration.

## Konfigurasi `.env`

Pastikan koneksi MySQL XAMPP menggunakan port 3307:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3307
DB_DATABASE=ppwl
DB_USERNAME=root
DB_PASSWORD=
```

Jangan mengganti atau menghapus `.env` yang sudah berisi konfigurasi lokal kamu.

## Jalankan project

Buka PowerShell pada folder yang berisi file `artisan`, lalu jalankan:

```powershell
php artisan optimize:clear
php artisan serve --host=127.0.0.1 --port=8010
```

Buka `http://127.0.0.1:8010/login`. Login admin:

- Email: `admin@ppwl.test`
- Password: `Admin12345!`

Setelah login, dashboard admin: `http://127.0.0.1:8010/admin/dashboard`.

Jika akun admin belum ada, jalankan `php artisan db:seed --class=AdminUserSeeder`. Seeder menggunakan `updateOrCreate`, jadi aman dijalankan ulang. Jangan menjalankan `migrate:fresh`.

## Fitur yang sudah ada dalam project

- Login/logout berbasis session Laravel.
- Middleware admin dan route dashboard.
- Dashboard statistik dari database (projects, status, categories, skills, technologies, posts).
- CRUD Projects dan pengelolaan galeri yang sudah ada.
- Daftar dan edit Skills yang sudah ada.
- Halaman publik Home, About, Education, Projects, dan Posts/Newpost.

Kategori, teknologi, dan CRUD Posts belum memiliki halaman pengelolaan admin lengkap pada versi sumber; dashboard menampilkan hitungan data yang tersedia. Fitur tersebut tidak diklaim selesai.
