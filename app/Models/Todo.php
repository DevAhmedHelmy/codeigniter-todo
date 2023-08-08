<?php

namespace App\Models;

use CodeIgniter\Model;

class Todo extends Model
{
    protected $table = 'todos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['description', 'status'];

    public function getTodos()
    {
        return $this->findAll();
    }

    public function getTodoById($id)
    {
        return $this->where(['id' => $id])->first();
    }

    public function createTodo($data)
    {
        return $this->insert($data);
    }

    public function updateTodo($data, $id)
    {
        return $this->update($id, $data);
    }

    public function deleteTodo($id)
    {
        return $this->delete($id);
    }
}