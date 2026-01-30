<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function register()
    {
        if ($this->request->getMethod() === 'post') {

            $role = $this->request->getPost('role');

            $status = ($role === 'guru')
                ? 'pending'
                : 'active';

            $userModel = new \App\Models\UserModel();

            $userModel->insert([
                'name'     => $this->request->getPost('name'),
                'email'    => $this->request->getPost('email'),
                'password' => password_hash(
                    $this->request->getPost('password'),
                    PASSWORD_DEFAULT
                ),
                'role'     => $role,
                'status'   => $status
            ]);

            if ($role === 'guru') {
                return redirect()->to('/register-success');
            }

            return redirect()->to('/login');
        }

        return view('auth/register');
    }

    public function processRegister()
    {
        $userModel = new \App\Models\UserModel();

        $data = [
            'name'     => $this->request->getPost('name'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash(
                $this->request->getPost('password'),
                PASSWORD_DEFAULT
            ),
            'role'     => $this->request->getPost('role'),
        ];

        // status otomatis
        $data['status'] = ($data['role'] === 'guru') ? 'pending' : 'active';

        if (!$userModel->insert($data)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $userModel->errors());
        }

        if ($data['role'] === 'guru') {
            return redirect()->to('/register-success');
        }

        return redirect()->to('/login');
    }



    public function registerSuccess()
    {
        return view('auth/register_success');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function processLogin()
    {
        $email    = trim($this->request->getPost('email'));
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Email tidak terdaftar');
        }

        if (!password_verify($password, $user['password'])) {
            return redirect()->back()->with('error', 'Password salah');
        }

        if ($user['status'] === 'blocked') {
            return redirect()->back()->with('error', 'Akun diblokir');
        }

        session()->set([
            'logged_in' => true,
            'user_id'   => $user['id'],
            'name'      => $user['name'],
            'email'     => $user['email'],
            'role'      => $user['role'],
            'status'    => $user['status'],
        ]);

        if ($user['role'] === 'admin') {
            return redirect()->to('/admin');
        }

        if ($user['role'] === 'guru') {
            if ($user['status'] === 'pending') {
                return redirect()->to('/guru/pending');
            }
            return redirect()->to('/guru');
        }

        return redirect()->to('/');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()
            ->to('/login')
            ->with('success', 'Anda berhasil logout');
    }

}
