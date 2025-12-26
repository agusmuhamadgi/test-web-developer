### 👤 Customer
- Melihat katalog video
- Mengajukan request akses video
- Mendapat notifikasi status request
- Menonton video **hanya jika sudah di-approve dan belum expired**

### 🛠 Admin
- Melihat daftar request video
- Approve / Reject request customer
- Menentukan durasi akses (jam)
- Akses otomatis berakhir sesuai waktu yang ditentukan

---

## 🏗️ Teknologi yang Digunakan

- **Laravel 12**
- **PHP 8.3**
- **PostgreSQL**
- Blade Template
- Middleware (Auth & Role)
- Eloquent ORM
- Carbon (Date & Time Handling)


1. **Instalasi & Setup**:
    ```bash
    git clone https://github.com/agusmuhamadgi/test-web-developer.git
    cd test-web-developer

2. **Install Depedency**:
    ```bash
    composer install

3. **Setup Environment**:
    ```bash
    cp .env.example .env
    php artisan key:generate

4. **Migrasi Database**:
    ```bash
    php artisan migrate
    php artisan db:seed

5. **Jalankan Aplikasi**:
    ```bash
    php artisan serve



