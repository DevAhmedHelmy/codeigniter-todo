<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTodosTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
                'unsigned' => true,
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'body' => [
                'type' => 'TEXT' ,
                'null' => true
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],

        ]);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('todos');
    }

    public function down()
    {
        $this->forge->dropTable('todos');
    }
}
