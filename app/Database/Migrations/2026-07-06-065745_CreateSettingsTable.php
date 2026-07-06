<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSettingsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([

            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],

            'company_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'tagline' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],

            'logo' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],

            'favicon' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],

            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],

            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],

            'whatsapp' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],

            'address' => [
                'type' => 'TEXT',
                'null' => true,
            ],

            'google_maps' => [
                'type' => 'TEXT',
                'null' => true,
            ],

            'facebook' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],

            'instagram' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],

            'linkedin' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],

            'youtube' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],

            'meta_title' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],

            'meta_description' => [
                'type' => 'TEXT',
                'null' => true,
            ],

            'meta_keywords' => [
                'type' => 'TEXT',
                'null' => true,
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

        $this->forge->addKey('id', true);

        $this->forge->createTable('settings');
    }

    public function down()
    {
        $this->forge->dropTable('settings');
    }
}
