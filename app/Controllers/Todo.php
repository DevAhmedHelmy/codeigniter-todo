<?php

namespace App\Controllers;

use App\Models\Todo as TodoModel;
use App\Models\User;
use Config\Services;
use App\Controllers\BaseController;

class Todo extends BaseController
{
    public $userModel, $todoModel, $validation;
    public function __construct()
    {
        $this->userModel = new User();
        $this->todoModel = new TodoModel();
        $this->validation = Services::validation();
        helper(['form']);
    }
    public function index()
    {
        return view('index', [
            'todos' => $this->userModel->todos()
        ]);
    }

    public function create()
    {
        return view('todos/create');
    }

    public function store()
    {
        $data = [
            'title' => $this->request->getVar('title'),
            'body' => $this->request->getVar('body'),
            'status' => $this->request->getVar('status'),
            'user_id' => session('userData')['id'],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        if (!$this->validateData($data, $this->todoModel->validationRules)) {
            return view('todos/create', [
                'validation' => $this->validation
            ]);
        }
        $this->todoModel->save($data);
        return redirect()->to('/');
    }

    public function edit($id)
    {
        return view('todos/edit', ['todo' => $this->todoModel->find($id)]);
    }

    public function update($id)
    {
        $data = [
            'title' => $this->request->getVar('title'),
            'body' => $this->request->getVar('body'),
            'status' => $this->request->getVar('status'),
            'user_id' => session('userData')['id'],
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        if (!$this->validateData($data, $this->todoModel->validationRules)) {
            return view('todos/edit', [
                'validation' => $this->validation
            ]);
        }
        $this->todoModel->update($id, $data);
        return redirect()->to('/');
    }

    public function delete($id)
    {
        $this->todoModel->delete($id);
        return redirect()->to('/');
    }
}
