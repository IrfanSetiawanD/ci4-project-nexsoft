<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PrincipalSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name'        => 'Microsoft',
                'slug'        => 'microsoft',
                'logo'        => 'microsoft-principal.png',
                'website'     => 'https://www.microsoft.com',
                'description' => 'Official Microsoft licensing partner.',
                'status'      => 'active',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'name'        => 'Adobe',
                'slug'        => 'adobe',
                'logo'        => 'adobe-principal.png',
                'website'     => 'https://www.adobe.com',
                'description' => 'Official Adobe software distributor.',
                'status'      => 'active',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'name'        => 'Autodesk',
                'slug'        => 'autodesk',
                'logo'        => 'autodesk-principal.png',
                'website'     => 'https://www.autodesk.com',
                'description' => 'Authorized Autodesk software provider.',
                'status'      => 'active',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'name'        => 'Corel',
                'slug'        => 'corel',
                'logo'        => 'corel-principal.png',
                'website'     => 'https://www.corel.com',
                'description' => 'Corel graphic design software solutions.',
                'status'      => 'active',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'name'        => 'Kaspersky',
                'slug'        => 'kaspersky',
                'logo'        => 'kaspersky-principal.png',
                'website'     => 'https://www.kaspersky.com',
                'description' => 'Kaspersky cybersecurity solutions.',
                'status'      => 'active',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('principals')->insertBatch($data);
    }
}
