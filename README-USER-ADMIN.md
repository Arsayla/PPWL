# Integrasi MyPortfolio, Posts, dan Admin

## Navigasi
Website user/public menggunakan satu layout dan navbar bersama:
Home, About, Education, Projects, Posts, dan Admin (login).

## Akun admin awal
Seeder membuat akun admin berikut:
- Email: `admin@ppwl.test`
- Password: `Admin12345!`

Ganti password akun tersebut sebelum website dipublikasikan.

## Menjalankan perubahan pada project yang sudah pernah dimigrasikan
Dari folder yang berisi file `artisan`, jalankan:

```bash
php artisan migrate --seed
php artisan optimize:clear
php artisan storage:link
php artisan serve
```

Jangan menjalankan `migrate:fresh` pada database yang berisi data penting karena perintah itu menghapus seluruh tabel.

## URL
- User: `http://127.0.0.1:8000/`
- Posts: `http://127.0.0.1:8000/newpost`
- Login admin: `http://127.0.0.1:8000/login`
- Dashboard admin: `http://127.0.0.1:8000/admin/dashboard`

Dashboard admin dan seluruh route `/admin/*` dilindungi middleware `auth` dan `admin`.
Role disimpan pada kolom `users.role`. Akun yang dibuat biasa memiliki role `user` (default), sedangkan akun admin dibuat oleh `AdminUserSeeder`.

## Catatan
Halaman Posts merupakan daftar postingan publik dari tabel `posts`. Pengelolaan Projects, Skills, dan Gallery tersedia pada area admin. Sistem ini menggunakan autentikasi Laravel bawaan dan tidak memerlukan paket tambahan.
