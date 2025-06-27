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
<<<<<<< HEAD
   git clone https://github.com/chandramawas/lokalaundry.git
=======
   git clone <repo-url>
>>>>>>> a17b2bab26927e3456e0f129b476177e6f6c4ce1
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

<<<<<<< HEAD
7. **Run Development Server + Vite (Auto)**
=======
7. **Run Development Server**

   ```bash
   php artisan serve
   ```

8. **Run Dev Build (Vite)**
>>>>>>> a17b2bab26927e3456e0f129b476177e6f6c4ce1

   ```bash
   composer run dev
   ```

<<<<<<< HEAD
   > Laravel 12 udah auto jalanin PHP server dan Vite sekaligus dengan perintah ini.

=======
>>>>>>> a17b2bab26927e3456e0f129b476177e6f6c4ce1
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
<<<<<<< HEAD

---

## 🔗 Update Project

Kalau mau update project ke versi terbaru dari GitHub, jalankan:

```bash
git pull origin main
```

Pastikan sebelum `git pull`, project kalian dalam keadaan clean (gak ada perubahan yang belum di-commit).

---

Happy coding gengs! 🚀💪
=======
>>>>>>> a17b2bab26927e3456e0f129b476177e6f6c4ce1
