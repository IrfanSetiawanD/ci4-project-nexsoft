<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProductsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([

            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],

            /*
            |--------------------------------------------------------------------------
            | Foreign Keys
            |--------------------------------------------------------------------------
            */

            'category_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],

            'brand_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],

            'license_type_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],

            'principal_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],

            /*
            |--------------------------------------------------------------------------
            | Product Information
            |--------------------------------------------------------------------------
            */

            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],

            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'unique'     => true,
            ],

            'sku' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],

            'short_description' => [
                'type' => 'TEXT',
                'null' => true,
            ],

            'description' => [
                'type' => 'LONGTEXT',
                'null' => true,
            ],

            'price' => [
                'type'       => 'DECIMAL',
                'constraint' => '15,2',
                'default'    => 0.00,
            ],

            'image' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],

            'stock_status' => [
                'type'       => 'ENUM',
                'constraint' => ['ready', 'preorder', 'out_of_stock'],
                'default'    => 'ready',
            ],

            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['active', 'inactive'],
                'default'    => 'active',
            ],

            // Gunakan TINYINT(1) agar kompatibel dengan MySQL
            'is_featured' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0,
            ],

            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],

            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],

        ]);

        /*
        |--------------------------------------------------------------------------
        | Keys
        |--------------------------------------------------------------------------
        */

        $this->forge->addKey('id', true);

        $this->forge->addKey('category_id');
        $this->forge->addKey('brand_id');
        $this->forge->addKey('license_type_id');
        $this->forge->addKey('principal_id');

        $this->forge->addKey('status');

        $this->forge->addKey('stock_status');

        $this->forge->addKey('is_featured');

        /*
        |--------------------------------------------------------------------------
        | Foreign Keys
        |--------------------------------------------------------------------------
        */

        $this->forge->addForeignKey(
            'category_id',
            'categories',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->forge->addForeignKey(
            'brand_id',
            'brands',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->forge->addForeignKey(
            'license_type_id',
            'license_types',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->forge->addForeignKey(
            'principal_id',
            'principals',
            'id',
            'CASCADE',
            'CASCADE'
        );

        /*
        |--------------------------------------------------------------------------
        | Create Table
        |--------------------------------------------------------------------------
        */

        $this->forge->createTable('products');
    }

    public function down()
    {
        $this->forge->dropTable('products', true);
    }
}
