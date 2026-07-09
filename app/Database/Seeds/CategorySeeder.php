<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $data = [

            [
                'name'        => 'IT & Security',
                'slug'        => 'it-security',
                'description' => 'Cyber security, antivirus, backup, endpoint security, firewall and networking solutions.',
                'icon'        => 'fa-solid fa-shield-halved',
                'status'      => 'active',
            ],

            [
                'name'        => 'Design / Creative',
                'slug'        => 'design-creative',
                'description' => 'Graphic design, CAD, video editing, PDF and creative software.',
                'icon'        => 'fa-solid fa-palette',
                'status'      => 'active',
            ],

            [
                'name'        => 'Desktop & Server OS',
                'slug'        => 'desktop-server-os',
                'description' => 'Windows, Windows Server, Linux and virtualization platforms.',
                'icon'        => 'fa-solid fa-desktop',
                'status'      => 'active',
            ],

            [
                'name'        => 'Office & Productivity',
                'slug'        => 'office-productivity',
                'description' => 'Microsoft 365, Office, collaboration and productivity software.',
                'icon'        => 'fa-solid fa-briefcase',
                'status'      => 'active',
            ],

        ];

        $this->db->table('categories')->insertBatch($data);
    }
}
