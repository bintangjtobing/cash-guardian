# CashGuardian

CashGuardian adalah solusi terbaik untuk mengelola petty cash di toko-toko perusahaan retail. Dengan fitur-fitur canggih dan intuitif, CashGuardian membantu Anda memantau dan mengelola uang tunai dengan lebih efisien dan akurat. Dari pencatatan transaksi hingga pembuatan laporan, CashGuardian memberikan Anda kendali penuh atas keuangan toko Anda.

## Fitur CashGuardian

-   **Pencatatan Transaksi:** Mudahnya mencatat setiap transaksi petty cash, baik itu penerimaan maupun pengeluaran, dengan rincian yang lengkap dan terperinci.
-   **Pemantauan Saldo:** Memantau saldo petty cash secara real-time, sehingga Anda selalu memiliki visibilitas terhadap dana yang tersedia.
-   **Pembuatan Laporan:** Menghasilkan laporan-laporan yang informatif dan mudah dimengerti, termasuk laporan transaksi, laporan pembelian berdasarkan jenis, dan lain-lain.
-   **Keamanan Data:** Menjamin keamanan data transaksi Anda dengan teknologi enkripsi yang canggih, sehingga Anda dapat mengelola keuangan dengan kedamaian pikiran.

## Instalasi

### Prasyarat

-   PHP >= 8.2
-   Composer
-   MySQL atau database lainnya

### Langkah-langkah

1. **Clone Repository**

    ```bash
    git clone https://github.com/bintangjtobing/cash-guardian.git
    ```

2. **Install Dependencies**

    ```bash
    cd cash-guardian
    composer install
    ```

3. **Setup Environment**

    - Salin file `.env.example` menjadi `.env`
    - Sesuaikan pengaturan database di file `.env` dengan konfigurasi Anda

4. **Generate Application Key**

    ```bash
    php artisan key:generate
    ```

5. **Run Migrations**

    ```bash
    php artisan migrate
    ```

6. **Run Database Seeding (Opsional)**

    ```bash
    php artisan db:seed
    ```

7. **Compile Assets (Opsional)**

    ```bash
    npm install
    ```

8. **Serve Aplikasi**
    ```bash
    php artisan serve
    ```

## Catatan

-   Pastikan Anda telah mengatur pengaturan database dengan benar sebelum menjalankan migrasi dan seeding.
-   Jika Anda menggunakan frontend assets (CSS, JavaScript), pastikan untuk mengompilasi atau menyatukan file-file tersebut sebelum menjalankan aplikasi di lingkungan produksi.
-   Untuk informasi lebih lanjut tentang instalasi dan konfigurasi Laravel, silakan kunjungi [Dokumentasi Laravel](https://laravel.com/docs).

---

Ini merupakan assignment work sample test dari Pondoklensa.
