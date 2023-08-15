<?php

namespace App\Models;

use CodeIgniter\Model;

class Todo extends Model
{

    protected $table            = 'todos';
    protected $allowedFields    = ['title', 'body', 'user_id', 'status','created_at', 'updated_at'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [
        'title' => 'required',
        'body' => 'required',
        'status' => 'required',
    ];
}
