# Penerapan Latihan PPW2 ke Project PPWL

## Fitur
- Dashboard: total project, Published, Draft, kategori, teknologi, skill.
- Skill teratas dan jumlah project per kategori (`withCount`).
- CRUD project: index, create, edit, update, delete.
- Upload thumbnail; validasi lebar minimal 500 px.
- Thumbnail lama dihapus ketika diganti; file thumbnail/gallery dihapus saat project dihapus.
- Gallery multiple upload, validasi lebar minimal 800 px, maksimal 10 gambar per project.
- Edit caption gallery dengan method PUT.

## Cara menjalankan
1. Ekstrak project, buka terminal pada folder `PPWL-pertemuan4`.
2. Pastikan file `.env` sudah dibuat. Jika belum: `copy .env.example .env`.
3. Atur koneksi database pada `.env` (contoh MySQL: DB_DATABASE, DB_USERNAME, DB_PASSWORD).
4. Jalankan:
   - `composer install`
   - `php artisan key:generate`
   - `php artisan migrate --seed`
   - `php artisan storage:link`
   - `npm install`
   - `npm run dev` (terminal pertama)
   - `php artisan serve` (terminal kedua)
5. Buka `/admin/dashboard`.

## Catatan
- Route admin pada paket latihan ini belum diberi middleware `auth`, karena project PPWL yang diberikan belum memiliki fitur autentikasi/login. Untuk deployment, lindungi grup route admin dengan middleware auth setelah login disiapkan.
- Seed awal membuat kategori, skill, teknologi, dan dua project contoh. Seeder memakai `firstOrCreate`, jadi aman dijalankan ulang.
- Jika database lama sudah berisi data dan migrasi awal pernah dijalankan, cukup jalankan `php artisan migrate --seed`, jangan `migrate:fresh` kecuali memang ingin menghapus seluruh data.
- Thumbnail minimal 500 px mengikuti implementasi project edit; syarat latihan gallery minimal 800 px.
