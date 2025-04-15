# 🚀 Cara Cepat Cloning dan Menjalankan Project Laravel

Panduan singkat untuk menjalankan project Laravel dari repository Git, cocok untuk pemula.

## Langkah-langkah

```bash
# Clone project dan masuk ke foldernya
git clone https://github.com/username/nama-project.git
cd nama-project
composer install
cp .env.example .env
php artisan key:generate
```

## Setting Database

Buka file `.env` dan sesuaikan konfigurasi database kamu:

```env
DB_DATABASE=namadb
DB_USERNAME=root
DB_PASSWORD=
```

## Migrasi dan Menjalankan Server

```bash
php artisan migrate
php artisan serve
```

Akses project di browser melalui: [http://localhost:8000](http://localhost:8000)

---

✅ **Selesai!** Project Laravel kamu siap digunakan 🎉
