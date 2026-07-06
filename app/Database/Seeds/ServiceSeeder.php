<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        $data = [

            [
                'title' => 'Software Licensing',
                'slug' => 'software-licensing',
                'icon' => 'license.svg',
                'short_description' => 'Pengadaan lisensi software resmi untuk kebutuhan bisnis.',
                'description' => 'Kami menyediakan berbagai lisensi software original dari vendor terpercaya seperti Microsoft, Adobe, Autodesk, Corel, Kaspersky, dan lainnya.',
                'display_order' => 1,
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'title' => 'Cloud Solutions',
                'slug' => 'cloud-solutions',
                'icon' => 'cloud.svg',
                'short_description' => 'Implementasi solusi cloud untuk bisnis modern.',
                'description' => 'Membantu perusahaan melakukan migrasi dan implementasi layanan cloud seperti Microsoft 365 dan layanan SaaS lainnya.',
                'display_order' => 2,
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'title' => 'IT Consultation',
                'slug' => 'it-consultation',
                'icon' => 'consultation.svg',
                'short_description' => 'Konsultasi kebutuhan software dan infrastruktur IT.',
                'description' => 'Tim kami membantu memilih solusi software dan lisensi yang paling sesuai dengan kebutuhan perusahaan Anda.',
                'display_order' => 3,
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'title' => 'License Renewal',
                'slug' => 'license-renewal',
                'icon' => 'renewal.svg',
                'short_description' => 'Perpanjangan lisensi software dengan proses cepat.',
                'description' => 'Layanan renewal untuk Microsoft CSP, Adobe Creative Cloud, Autodesk Subscription, antivirus, dan software lainnya.',
                'display_order' => 4,
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'title' => 'Technical Support',
                'slug' => 'technical-support',
                'icon' => 'support.svg',
                'short_description' => 'Pendampingan instalasi dan troubleshooting software.',
                'description' => 'Memberikan bantuan teknis mulai dari aktivasi lisensi, instalasi, konfigurasi hingga troubleshooting software.',
                'display_order' => 5,
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'title' => 'Enterprise Solutions',
                'slug' => 'enterprise-solutions',
                'icon' => 'enterprise.svg',
                'short_description' => 'Solusi software enterprise untuk perusahaan skala besar.',
                'description' => 'Menyediakan solusi enterprise yang dapat disesuaikan dengan kebutuhan organisasi, termasuk volume licensing dan implementasi sistem.',
                'display_order' => 6,
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

        ];

        $this->db->table('services')->insertBatch($data);
    }
}
