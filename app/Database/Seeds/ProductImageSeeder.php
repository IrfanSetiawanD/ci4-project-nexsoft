<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductImageSeeder extends Seeder
{
    public function run()
    {
        $data = [

            // Microsoft 365 Business Standard
            [
                'product_id' => 1,
                'image' => 'm365-business-standard-1.jpg',
                'alt_text' => 'Microsoft 365 Business Standard',
                'sort_order' => 1,
                'is_primary' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'product_id' => 1,
                'image' => 'm365-business-standard-2.jpg',
                'alt_text' => 'Microsoft 365 Features',
                'sort_order' => 2,
                'is_primary' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            // Office LTSC 2024
            [
                'product_id' => 2,
                'image' => 'office-ltsc-2024-1.jpg',
                'alt_text' => 'Office LTSC 2024',
                'sort_order' => 1,
                'is_primary' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'product_id' => 2,
                'image' => 'office-ltsc-2024-2.jpg',
                'alt_text' => 'Office LTSC Package',
                'sort_order' => 2,
                'is_primary' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            // Adobe CC
            [
                'product_id' => 3,
                'image' => 'adobe-cc-1.jpg',
                'alt_text' => 'Adobe Creative Cloud',
                'sort_order' => 1,
                'is_primary' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            // AutoCAD
            [
                'product_id' => 4,
                'image' => 'autocad-2026-1.jpg',
                'alt_text' => 'Autodesk AutoCAD',
                'sort_order' => 1,
                'is_primary' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            // Kaspersky
            [
                'product_id' => 5,
                'image' => 'kaspersky-endpoint-1.jpg',
                'alt_text' => 'Kaspersky Endpoint Security',
                'sort_order' => 1,
                'is_primary' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

        ];

        $this->db->table('product_images')->insertBatch($data);
    }
}
