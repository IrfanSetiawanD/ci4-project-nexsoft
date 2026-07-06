<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTestimonialsTable extends Migration
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

            'client_name' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
            ],

            'company' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
                'null' => true,
            ],

            'position' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
                'null' => true,
            ],

            'photo' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],

            'rating' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 5,
            ],

            'testimonial' => [
                'type' => 'LONGTEXT',
            ],

            'status' => [
                'type' => 'ENUM',
                'constraint' => ['active', 'inactive'],
                'default' => 'active',
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
        $this->forge->addKey('status');
        $this->forge->createTable('testimonials');
    }

    public function down()
    {
        $this->forge->dropTable('testimonials');
    }
}
