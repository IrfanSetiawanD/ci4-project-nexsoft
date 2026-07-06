<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $data = [

            [
                'name'        => 'Productivity',
                'slug'        => 'productivity',
                'description' => 'Office productivity software.',
                'icon'        => 'fa-solid fa-briefcase',
                'status'      => 'active',
            ],

            [
                'name'        => 'Design',
                'slug'        => 'design',
                'description' => 'Creative design software.',
                'icon'        => 'fa-solid fa-palette',
                'status'      => 'active',
            ],

            [
                'name'        => 'PDF Solution',
                'slug'        => 'pdf-solution',
                'description' => 'PDF editing and management software.',
                'icon'        => 'fa-solid fa-file-pdf',
                'status'      => 'active',
            ],

            [
                'name'        => 'Cyber Security',
                'slug'        => 'cyber-security',
                'description' => 'Endpoint and network security.',
                'icon'        => 'fa-solid fa-shield-halved',
                'status'      => 'active',
            ],

            [
                'name'        => 'Cloud',
                'slug'        => 'cloud',
                'description' => 'Cloud computing solutions.',
                'icon'        => 'fa-solid fa-cloud',
                'status'      => 'active',
            ],

            [
                'name'        => 'Backup & Recovery',
                'slug'        => 'backup-recovery',
                'description' => 'Backup and disaster recovery software.',
                'icon'        => 'fa-solid fa-database',
                'status'      => 'active',
            ],

            [
                'name'        => 'Virtualization',
                'slug'        => 'virtualization',
                'description' => 'Virtual machine and virtualization solutions.',
                'icon'        => 'fa-solid fa-server',
                'status'      => 'active',
            ],

            [
                'name'        => 'Developer Tools',
                'slug'        => 'developer-tools',
                'description' => 'Software development tools.',
                'icon'        => 'fa-solid fa-code',
                'status'      => 'active',
            ],

        ];

        $this->db->table('categories')->insertBatch($data);
    }
}
