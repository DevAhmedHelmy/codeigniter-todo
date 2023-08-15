<?php

namespace App\Controllers;

use App\Models\User;
use Config\Services;
use App\Controllers\BaseController;

class Auth extends BaseController
{
    public $userModel, $validation, $session;
    public function __construct()
    {
        helper(['form']);
        $this->userModel = new User();
        $this->validation = Services::validation();
        $this->session = Services::session();
    }

    public function loginPage()
    {
        return view('auth/login');
    }
    public function login()
    {
        $data = [
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
        ];

        if (!$this->validation->run($data, 'login')) return view('auth/login', ['validation' => $this->validation]);
        $userModel = new User();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $user = $userModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
        print_r($user);
            $this->session->set('userData', $user);
            return redirect()->to('/');
        } else {
            return view('auth/login');
        }
    }

    public function registerPage()
    {
        return view('auth/register');
    }


    public function register()
    {
        $userModel = new User();

        $data = [
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
            'passconf' => $this->request->getVar('passconf'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        if (!$this->validation->run($data, 'signup')) return view('auth/register', ['validation' => $this->validation]);
        unset($data['passconf']);
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        $userModel->save($data);
        return redirect()->to('/login');
    }




    public function logout()
    {
        // Clear user session data on logout
        session()->destroy();
        return redirect('login');
    }
}
