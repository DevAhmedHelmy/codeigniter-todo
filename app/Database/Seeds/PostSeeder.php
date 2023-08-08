<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'title' => 'test seed',
            'body'    => ' test seed body',
        ];

        // Simple Queries
        // $this->db->query('INSERT INTO posts (title, body) VALUES(:title:, :body:)', $data);

        // Using Query Builder
        $this->db->table('posts')->insert($data);
    }
}
