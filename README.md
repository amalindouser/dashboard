# Dashboard Penjualan

Aplikasi dashboard penjualan dengan Laravel dan Chart.js

## Instalasi Lokal

### Requirements
- PHP 8.1+
- Composer
- Node.js & npm

### Langkah Instalasi

1. **Clone Repository**
   ```bash
   git clone https://github.com/username/dashboard-penjualan.git
   cd dashboard-penjualan
   ```

2. **Install Dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Setup Environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Setup Database**
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

5. **Run Development Server**
   ```bash
   php artisan serve
   npm run dev
   ```

6. **Akses Aplikasi**
   - Buka http://localhost:8000

## Fitur
- Dashboard penjualan real-time
- Visualisasi data dengan Chart.js
- Filter penjualan berdasarkan tanggal
- Total penjualan dan statistik

## Tech Stack
- Laravel 11
- Blade Templates
- Chart.js
- SQLite

## cara akses aplikasi yang telah di hosting
- Laravel 11
- Blade Templates
- Chart.js
- SQLite