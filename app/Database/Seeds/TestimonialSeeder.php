<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run()
    {
        $data = [

            [
                'client_name' => 'Budi Santoso',
                'company' => 'PT Maju Bersama',
                'position' => 'IT Manager',
                'photo' => 'budi.jpg',
                'rating' => 5,
                'testimonial' => 'Pelayanan sangat cepat dan profesional. Proses pembelian lisensi Microsoft berjalan lancar dengan harga kompetitif.',
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'client_name' => 'Rina Wijaya',
                'company' => 'CV Digital Kreatif',
                'position' => 'Creative Director',
                'photo' => 'rina.jpg',
                'rating' => 5,
                'testimonial' => 'Adobe Creative Cloud yang kami beli resmi dan proses aktivasinya sangat mudah. Sangat direkomendasikan.',
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'client_name' => 'Andi Pratama',
                'company' => 'PT Teknologi Nusantara',
                'position' => 'System Administrator',
                'photo' => 'andi.jpg',
                'rating' => 5,
                'testimonial' => 'Tim support responsif dan membantu proses deployment Microsoft 365 untuk seluruh karyawan.',
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'client_name' => 'Siska Lestari',
                'company' => 'PT Arsitek Indonesia',
                'position' => 'Project Architect',
                'photo' => 'siska.jpg',
                'rating' => 5,
                'testimonial' => 'Pembelian Autodesk AutoCAD sangat mudah dan didampingi hingga proses aktivasi selesai.',
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'client_name' => 'Dedi Kurniawan',
                'company' => 'PT Secure Network',
                'position' => 'IT Security',
                'photo' => 'dedi.jpg',
                'rating' => 5,
                'testimonial' => 'Kaspersky Endpoint Security yang kami gunakan sangat membantu menjaga keamanan perangkat perusahaan.',
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'client_name' => 'Maria Angela',
                'company' => 'PT Solusi Digital',
                'position' => 'Procurement Manager',
                'photo' => 'maria.jpg',
                'rating' => 5,
                'testimonial' => 'Harga kompetitif, proses cepat, dan semua lisensi yang diterima merupakan lisensi resmi dari vendor.',
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

        ];

        $this->db->table('testimonials')->insertBatch($data);
    }
}
