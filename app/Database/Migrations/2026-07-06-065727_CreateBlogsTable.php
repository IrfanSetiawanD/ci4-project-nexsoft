<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBlogsTable extends Migration
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

            'blog_category_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],

            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'unique' => true,
            ],

            'excerpt' => [
                'type' => 'TEXT',
                'null' => true,
            ],

            'content' => [
                'type' => 'LONGTEXT',
            ],

            'featured_image' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],

            'author' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'default' => 'Admin',
            ],

            'is_featured' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0,
            ],

            'status' => [
                'type' => 'ENUM',
                'constraint' => ['draft', 'published'],
                'default' => 'draft',
            ],

            'published_at' => [
                'type' => 'DATETIME',
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
        $this->forge->addKey('blog_category_id');
        $this->forge->addKey('status');
        $this->forge->addKey('is_featured');

        $this->forge->addForeignKey(
            'blog_category_id',
            'blog_categories',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->forge->createTable('blogs');
    }

    public function down()
    {
        $this->forge->dropTable('blogs');
    }
}
