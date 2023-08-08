<?php

namespace App\Controllers;

use App\Models\Todo;
use CodeIgniter\Controller;

class TodoController extends Controller
{
    protected $model;

    public function __construct()
    {
        $this->model = new Todo();
    }

    public function index()
    {
        $data['todos'] = $this->model->getTodos();
        return view('todos/index', $data);
    }

    public function create()
    {
        return view('todos/create');
    }

    public function store()
    {
        $this->model->createTodo($this->request->getPost());
        return redirect()->to('/todos');
    }

    public function edit($id)
    {
        $data['todo'] = $this->model->getTodoById($id);
        return view('todos/edit', $data);
    }

    public function update($id)
    {
        $this->model->updateTodo($this->request->getPost(), $id);
        return redirect()->to('/todos');
    }

    public function delete($id)
    {
        $this->model->deleteTodo($id);
        return redirect()->to('/todos');
    }
}