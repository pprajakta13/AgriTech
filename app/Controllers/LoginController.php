<?php

namespace App\Controllers;

use App\Models\UserModel;

class LoginController extends BaseController
{
    
    public function login()
    {
        return view('auth/login');
    }

    
    public function register()
    {
        return view('auth/register');
    }

    public function store()
    {
        $userModel = new UserModel();

        $email = $this->request->getPost('email');

        
        $existingUser = $userModel->where('email', $email)->first();

        if ($existingUser) {
            return redirect()->back()->with('error', 'Email already exists.');
        }

        $userModel->save([
            'name'     => $this->request->getPost('name'),
            'email'    => $email,
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'     => 'user'
        ]);

        return redirect()->to('/login')->with('success', 'Registration Successful! Please Login.');
    }

    
    public function authenticate()
    {
        $userModel = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $userModel->where('email', $email)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Invalid Email');
        }

        if (!password_verify($password, $user['password'])) {
            return redirect()->back()->with('error', 'Invalid Password');
        }

        session()->set([
            'id' => $user['id'],
            'name' => $user['name'],
            'role' => $user['role'],
            'isLoggedIn' => true
        ]);

        if ($user['role'] == 'admin') {
            return redirect()->to('/admin/dashboard');
        }

        return redirect()->to('/user/dashboard');
    }

    
    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login');
    }
}