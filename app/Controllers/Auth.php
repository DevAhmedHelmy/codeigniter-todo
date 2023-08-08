<?php

namespace App\Controllers;

use App\Models\User;
use Config\Services;
use App\Controllers\BaseController;

class Auth extends BaseController
{
     
    public function loginPage()
    {    
        return view('auth/login');
    }

    public function registerPage()
    {
        return view('auth/register');
    }

    public function register()
    {
        $userModel = new User();
        $validation = Services::validation();
        $data = [
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        if (!$validation->run($data, 'signup')) {
            return view('signup');
        }
        
        $userModel->save($data);
        redirect('login');
    }

    public function login()
    {
        $data = [
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
        ];
        $validation = Services::validation();
        if (!$validation->run($data, 'login')) {
            return view('login');
        }
        
        $userModel = new User();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $user = $userModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            redirect('/');
        } else {
            return view('auth/login');
        }
    }

    public function logout()
    {
        // Clear user session data on logout
        session()->destroy();
        return redirect('login');
    }
}