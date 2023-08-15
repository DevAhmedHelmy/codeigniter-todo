<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table = 'users';
    protected $allowedFields  = ['name', 'email', 'password', 'created_at', 'updated_at'];
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';


    public function todos()
    {
        $user_id = session()->get('userData')['id'];
        return  $this->db->table('todos')
            ->where('user_id', $user_id)
            ->get()->getResult();
    }
}
