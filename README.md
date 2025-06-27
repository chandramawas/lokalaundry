# 📦 lokaLaundry - Installation Guide

Halo gengs! Ini adalah langkah-langkah buat setup dan jalanin project **lokaLaundry** di laptop/PC kalian. Pastikan semua software yang dibutuhkan udah keinstall yaa! 🚀

---

## ✅ Software Requirements

Sebelum mulai, pastiin kalian udah install:

* **PHP**: minimal versi `8.2`
* **Composer**: versi terbaru
* **Node.js & NPM**: minimal Node.js versi `16.x` (rekomendasi `18.x`)
* **MySQL**: udah jalan dan siap pake
* **Git**: buat clone project

---

## 🛠️ Installation Steps

1. **Clone Project**

   ```bash
   git clone <repo-url>
   cd lokalaundry
   ```

2. **Install PHP Dependencies**

   ```bash
   composer install
   ```

3. **Install NPM Packages**

   ```bash
   npm install
   ```

4. **Copy & Setup Environment File**

   ```bash
   cp .env.example .env
   ```

   Lalu isi konfigurasi database dan API key sesuai kebutuhan.
   Contoh:

   ```env
   DB_DATABASE=lokalaundry
   DB_USERNAME=root
   DB_PASSWORD=root
   ```

5. **Generate App Key**

   ```bash
   php artisan key:generate
   ```

6. **Migrate Database + Seeder**

   ```bash
   php artisan migrate --seed
   ```

7. **Run Development Server**

   ```bash
   php artisan serve
   ```

8. **Run Dev Build (Vite)**

   ```bash
   composer run dev
   ```

---

## 🔑 Midtrans Setup

* API Key yang dipake udah disiapin di file `.env`.
* Pastikan mode sandbox Midtrans aktif dan API key-nya sesuai.

---

## ⚙️ Notes

* **Session & Queue** sudah disetup pake database.
* Pastikan MySQL dan Redis sudah berjalan kalau mau support cache & queue penuh.
* Untuk email, project ini sudah terhubung dengan SMTP Gmail (akun: `lokapustaka.cs@gmail.com`).
* Gak usah ganti `APP_KEY` kalau sudah generate.

---

## 🚀 Let's Go!

Setelah semua langkah selesai, akses project-nya di:

```
http://localhost:8000
```

Kalau ada error, tinggal jalankan:

```bash
php artisan optimize:clear
```
