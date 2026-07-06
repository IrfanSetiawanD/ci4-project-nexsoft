<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run()
    {
        $data = [

            [
                'question' => 'Apakah semua produk yang dijual original?',
                'answer' => 'Ya. Seluruh produk yang kami jual merupakan lisensi resmi dan original dari vendor atau distributor resmi.',
                'display_order' => 1,
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'question' => 'Apa perbedaan lisensi CSP dan Perpetual?',
                'answer' => 'Lisensi CSP menggunakan sistem berlangganan (subscription), sedangkan lisensi Perpetual cukup dibeli satu kali dan dapat digunakan tanpa biaya perpanjangan.',
                'display_order' => 2,
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'question' => 'Bagaimana proses pembelian software?',
                'answer' => 'Pilih produk, lakukan pemesanan, selesaikan pembayaran, kemudian lisensi akan diproses sesuai jenis produk yang dipilih.',
                'display_order' => 3,
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'question' => 'Apakah tersedia layanan instalasi?',
                'answer' => 'Ya. Kami menyediakan bantuan instalasi, aktivasi, konfigurasi, hingga konsultasi penggunaan software.',
                'display_order' => 4,
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'question' => 'Apa arti status Ready dan Preorder?',
                'answer' => 'Ready berarti lisensi tersedia dan dapat diproses segera. Preorder berarti produk perlu dipesan terlebih dahulu kepada vendor atau distributor.',
                'display_order' => 5,
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'question' => 'Berapa lama proses aktivasi lisensi?',
                'answer' => 'Produk Ready biasanya diproses dalam beberapa menit hingga maksimal 1x24 jam setelah pembayaran terverifikasi.',
                'display_order' => 6,
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'question' => 'Metode pembayaran apa saja yang tersedia?',
                'answer' => 'Kami menerima transfer bank, Virtual Account, QRIS, kartu kredit, dan metode pembayaran lainnya yang tersedia pada checkout.',
                'display_order' => 7,
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'question' => 'Apakah tersedia invoice dan faktur pajak?',
                'answer' => 'Ya. Kami menyediakan invoice resmi dan faktur pajak sesuai kebutuhan perusahaan.',
                'display_order' => 8,
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

        ];

        $this->db->table('faqs')->insertBatch($data);
    }
}
