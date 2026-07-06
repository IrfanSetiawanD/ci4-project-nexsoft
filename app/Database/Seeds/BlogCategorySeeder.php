<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    public function run()
    {
        $data = [

            [
                'name' => 'Microsoft',
                'slug' => 'microsoft',
                'description' => 'Artikel seputar Microsoft, Microsoft 365, Office, Windows, dan Azure.',
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'name' => 'Adobe',
                'slug' => 'adobe',
                'description' => 'Tips, tutorial, dan informasi produk Adobe.',
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'name' => 'Autodesk',
                'slug' => 'autodesk',
                'description' => 'Artikel mengenai AutoCAD, Revit, Inventor, dan solusi Autodesk.',
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'name' => 'Cyber Security',
                'slug' => 'cyber-security',
                'description' => 'Berita dan edukasi mengenai keamanan siber.',
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'name' => 'Cloud Computing',
                'slug' => 'cloud-computing',
                'description' => 'Informasi mengenai cloud computing dan layanan SaaS.',
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'name' => 'Tips & Tutorial',
                'slug' => 'tips-tutorial',
                'description' => 'Tutorial penggunaan software dan panduan instalasi.',
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'name' => 'News',
                'slug' => 'news',
                'description' => 'Berita terbaru mengenai teknologi dan software.',
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'name' => 'Promo',
                'slug' => 'promo',
                'description' => 'Promo, diskon, dan penawaran khusus produk software.',
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

        ];

        $this->db->table('blog_categories')->insertBatch($data);
    }
}
