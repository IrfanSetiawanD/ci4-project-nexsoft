<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $data = [

            [
                'category_id'      => 1,
                'brand_id'         => 1,
                'license_type_id'  => 2,
                'principal_id'     => 1,
                'name'             => 'Microsoft 365 Business Standard',
                'slug'             => 'microsoft-365-business-standard',
                'sku'              => 'M365-BS',
                'short_description' => 'Microsoft 365 untuk bisnis kecil dan menengah.',
                'description'      => 'Microsoft 365 Business Standard menyediakan Outlook, Word, Excel, PowerPoint, Teams, Exchange Online dan OneDrive.',
                'price'            => 2150000,
                'image'            => 'm365-business-standard.jpg',
                'stock_status'     => 'ready',
                'status'           => 'active',
                'is_featured'      => 1,
                'created_at'       => date('Y-m-d H:i:s'),
                'updated_at'       => date('Y-m-d H:i:s'),
            ],

            [
                'category_id'      => 1,
                'brand_id'         => 1,
                'license_type_id'  => 2,
                'principal_id'     => 1,
                'name'             => 'Microsoft Office LTSC 2024 Professional Plus',
                'slug'             => 'office-ltsc-2024-professional-plus',
                'sku'              => 'OFFICE-LTSC24',
                'short_description' => 'Lisensi Office perpetual.',
                'description'      => 'Microsoft Office LTSC Professional Plus 2024 dengan lisensi perpetual.',
                'price'            => 6900000,
                'image'            => 'office-ltsc-2024.jpg',
                'stock_status'     => 'ready',
                'status'           => 'active',
                'is_featured'      => 1,
                'created_at'       => date('Y-m-d H:i:s'),
                'updated_at'       => date('Y-m-d H:i:s'),
            ],

            [
                'category_id'      => 2,
                'brand_id'         => 2,
                'license_type_id'  => 2,
                'principal_id'     => 2,
                'name'             => 'Adobe Creative Cloud All Apps',
                'slug'             => 'adobe-creative-cloud-all-apps',
                'sku'              => 'ADOBE-CC',
                'short_description' => 'Seluruh aplikasi Adobe Creative Cloud.',
                'description'      => 'Berisi Photoshop, Illustrator, Premiere Pro, After Effects dan aplikasi Adobe lainnya.',
                'price'            => 9800000,
                'image'            => 'adobe-cc.jpg',
                'stock_status'     => 'ready',
                'status'           => 'active',
                'is_featured'      => 1,
                'created_at'       => date('Y-m-d H:i:s'),
                'updated_at'       => date('Y-m-d H:i:s'),
            ],

            [
                'category_id'      => 3,
                'brand_id'         => 4,
                'license_type_id'  => 1,
                'principal_id'     => 3,
                'name'             => 'Autodesk AutoCAD 2026',
                'slug'             => 'autodesk-autocad-2026',
                'sku'              => 'AUTOCAD-2026',
                'short_description' => 'Software CAD profesional.',
                'description'      => 'Autodesk AutoCAD untuk kebutuhan desain teknik dan arsitektur.',
                'price'            => 27800000,
                'image'            => 'autocad-2026.jpg',
                'stock_status'     => 'preorder',
                'status'           => 'active',
                'is_featured'      => 0,
                'created_at'       => date('Y-m-d H:i:s'),
                'updated_at'       => date('Y-m-d H:i:s'),
            ],

            [
                'category_id'      => 4,
                'brand_id'         => 5,
                'license_type_id'  => 2,
                'principal_id'     => 5,
                'name'             => 'Kaspersky Endpoint Security',
                'slug'             => 'kaspersky-endpoint-security',
                'sku'              => 'KES',
                'short_description' => 'Perlindungan endpoint perusahaan.',
                'description'      => 'Solusi keamanan endpoint untuk bisnis kecil hingga enterprise.',
                'price'            => 550000,
                'image'            => 'kaspersky-endpoint.jpg',
                'stock_status'     => 'ready',
                'status'           => 'active',
                'is_featured'      => 0,
                'created_at'       => date('Y-m-d H:i:s'),
                'updated_at'       => date('Y-m-d H:i:s'),
            ],

        ];

        $this->db->table('products')->insertBatch($data);
    }
}
