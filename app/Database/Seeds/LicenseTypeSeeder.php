<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LicenseTypeSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name'        => 'Perpetual',
                'description' => 'Lisensi sekali beli dan dapat digunakan selamanya.',
                'status'      => 'active',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'name'        => 'Subscription',
                'description' => 'Lisensi berlangganan bulanan atau tahunan.',
                'status'      => 'active',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'name'        => 'CSP (Cloud Solution Provider)',
                'description' => 'Lisensi Microsoft Cloud Solution Provider.',
                'status'      => 'active',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'name'        => 'OEM',
                'description' => 'Lisensi yang dijual bersama perangkat keras.',
                'status'      => 'active',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'name'        => 'Volume License',
                'description' => 'Lisensi untuk organisasi atau perusahaan dalam jumlah besar.',
                'status'      => 'active',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('license_types')->insertBatch($data);
    }
}
