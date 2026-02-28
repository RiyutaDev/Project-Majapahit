<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function register()
    {
        return view('auth/register');
    }

    public function saveRegister()
    {
        $userModel = new UserModel();

        $data = [
            'nama'     => $this->request->getPost('nama'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'     => 'user'
        ];

        $userModel->save($data);

        return redirect()->to('/login')->with('success', 'Registrasi berhasil');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function processLogin()
    {
        $session = session();
        $userModel = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $userModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {

            $session->set([
                'user_id' => $user['id'],
                'nama'    => $user['nama'],
                'role'    => $user['role'],
                'logged_in' => true
            ]);

            return redirect()->to('/dashboard');
        }

        return redirect()->back()->with('error', 'Email atau password salah');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}