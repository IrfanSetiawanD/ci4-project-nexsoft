<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BlogSeeder extends Seeder
{
    public function run()
    {
        $now = date('Y-m-d H:i:s');

        $data = [

            [
                'blog_category_id' => 1,
                'title' => 'Perbedaan Microsoft 365 dan Office LTSC',
                'slug' => 'perbedaan-microsoft-365-dan-office-ltsc',
                'excerpt' => 'Pelajari perbedaan Microsoft 365 dan Office LTSC sebelum membeli lisensi.',
                'content' => 'Microsoft 365 merupakan layanan berbasis subscription yang selalu mendapatkan update fitur terbaru, sedangkan Office LTSC merupakan lisensi perpetual yang dibeli satu kali tanpa update fitur utama.',
                'featured_image' => 'blog-microsoft365-vs-ltsc.jpg',
                'author' => 'Admin',
                'is_featured' => 1,
                'status' => 'published',
                'published_at' => $now,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'blog_category_id' => 1,
                'title' => 'Apa Itu Microsoft CSP?',
                'slug' => 'apa-itu-microsoft-csp',
                'excerpt' => 'Mengenal Cloud Solution Provider (CSP).',
                'content' => 'Microsoft CSP memungkinkan perusahaan membeli lisensi cloud secara fleksibel dengan sistem subscription bulanan maupun tahunan.',
                'featured_image' => 'blog-csp.jpg',
                'author' => 'Admin',
                'is_featured' => 1,
                'status' => 'published',
                'published_at' => $now,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'blog_category_id' => 2,
                'title' => 'Mengapa Memilih Adobe Creative Cloud?',
                'slug' => 'mengapa-memilih-adobe-creative-cloud',
                'excerpt' => 'Keunggulan Adobe Creative Cloud untuk profesional kreatif.',
                'content' => 'Adobe Creative Cloud menyediakan lebih dari 20 aplikasi profesional seperti Photoshop, Illustrator, Premiere Pro, dan After Effects.',
                'featured_image' => 'blog-adobe.jpg',
                'author' => 'Admin',
                'is_featured' => 0,
                'status' => 'published',
                'published_at' => $now,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'blog_category_id' => 3,
                'title' => 'Mengenal Autodesk AutoCAD 2026',
                'slug' => 'mengenal-autodesk-autocad-2026',
                'excerpt' => 'Fitur terbaru AutoCAD 2026.',
                'content' => 'AutoCAD 2026 menghadirkan peningkatan performa, kolaborasi cloud, serta fitur AI untuk membantu proses desain.',
                'featured_image' => 'blog-autocad.jpg',
                'author' => 'Admin',
                'is_featured' => 0,
                'status' => 'published',
                'published_at' => $now,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'blog_category_id' => 4,
                'title' => 'Tips Memilih Antivirus untuk Perusahaan',
                'slug' => 'tips-memilih-antivirus-perusahaan',
                'excerpt' => 'Panduan memilih solusi keamanan endpoint.',
                'content' => 'Perusahaan perlu mempertimbangkan proteksi ransomware, manajemen terpusat, update otomatis, dan dukungan teknis sebelum memilih antivirus.',
                'featured_image' => 'blog-antivirus.jpg',
                'author' => 'Admin',
                'is_featured' => 1,
                'status' => 'published',
                'published_at' => $now,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'blog_category_id' => 5,
                'title' => 'Mengapa Perusahaan Beralih ke Cloud?',
                'slug' => 'mengapa-perusahaan-beralih-ke-cloud',
                'excerpt' => 'Cloud meningkatkan efisiensi bisnis.',
                'content' => 'Cloud Computing memberikan fleksibilitas, keamanan, dan efisiensi biaya bagi perusahaan modern.',
                'featured_image' => 'blog-cloud.jpg',
                'author' => 'Admin',
                'is_featured' => 0,
                'status' => 'published',
                'published_at' => $now,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'blog_category_id' => 6,
                'title' => 'Cara Memilih Lisensi Software yang Tepat',
                'slug' => 'cara-memilih-lisensi-software',
                'excerpt' => 'Panduan memilih lisensi sesuai kebutuhan bisnis.',
                'content' => 'Sebelum membeli software, pastikan mengetahui perbedaan lisensi subscription, perpetual, OEM, dan volume licensing.',
                'featured_image' => 'blog-license.jpg',
                'author' => 'Admin',
                'is_featured' => 0,
                'status' => 'published',
                'published_at' => $now,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'blog_category_id' => 7,
                'title' => 'Tren Software Bisnis Tahun 2026',
                'slug' => 'tren-software-bisnis-2026',
                'excerpt' => 'Perkembangan software enterprise terbaru.',
                'content' => 'AI, Cloud, Cyber Security, dan Automation menjadi fokus utama perusahaan dalam memilih software bisnis.',
                'featured_image' => 'blog-trend.jpg',
                'author' => 'Admin',
                'is_featured' => 1,
                'status' => 'published',
                'published_at' => $now,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'blog_category_id' => 8,
                'title' => 'Promo Microsoft 365 Bulan Ini',
                'slug' => 'promo-microsoft-365',
                'excerpt' => 'Dapatkan penawaran terbaik Microsoft 365.',
                'content' => 'Nikmati promo spesial untuk pembelian Microsoft 365 Business Basic, Standard, dan Premium.',
                'featured_image' => 'blog-promo.jpg',
                'author' => 'Admin',
                'is_featured' => 0,
                'status' => 'published',
                'published_at' => $now,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'blog_category_id' => 4,
                'title' => '5 Langkah Meningkatkan Keamanan Data Perusahaan',
                'slug' => 'langkah-meningkatkan-keamanan-data',
                'excerpt' => 'Tips sederhana menjaga keamanan data perusahaan.',
                'content' => 'Gunakan antivirus resmi, MFA, backup rutin, update software, dan edukasi keamanan kepada seluruh karyawan.',
                'featured_image' => 'blog-security.jpg',
                'author' => 'Admin',
                'is_featured' => 0,
                'status' => 'published',
                'published_at' => $now,
                'created_at' => $now,
                'updated_at' => $now,
            ],

        ];

        $this->db->table('blogs')->insertBatch($data);
    }
}
