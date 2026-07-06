<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'company_name'     => 'NexSoft',
            'tagline'          => 'Smart Software Solutions for Modern Business',
            'logo'             => 'logo.png',
            'favicon'          => 'favicon.ico',

            'email'            => 'info@nexsoft.com',
            'phone'            => '+62 21 5555 1234',
            'whatsapp'         => '+6281234567890',

            'address'          => 'Jl. Teknologi No. 88, Jakarta, Indonesia',

            'google_maps'      => '<iframe src="https://maps.google.com/..."></iframe>',

            'facebook'         => 'https://facebook.com/nexsoft',
            'instagram'        => 'https://instagram.com/nexsoft',
            'linkedin'         => 'https://linkedin.com/company/nexsoft',
            'youtube'          => 'https://youtube.com/@nexsoft',

            'meta_title'       => 'NexSoft | Software License & IT Solutions',
            'meta_description' => 'NexSoft menyediakan berbagai software original, lisensi bisnis, solusi keamanan, dan layanan IT profesional.',

            'meta_keywords'    => 'software, software license, microsoft, adobe, antivirus, office, nexsoft, IT solutions',

            'created_at'       => date('Y-m-d H:i:s'),
            'updated_at'       => date('Y-m-d H:i:s'),
        ];

        $this->db->table('settings')->insert($data);
    }
}
