<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        helper('url');
    }

    // -------------------- ADMIN --------------------

    // Menampilkan form login admin
    public function adminLoginForm()
    {
        return view('auth/login_admin');
    }

    // Proses login admin
    public function adminLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $admin = $this->userModel
                      ->where('username', $username)
                      ->where('role', 'admin')
                      ->first();

        if (!$admin || !password_verify($password, $admin['password'])) {
            return redirect()->back()->with('error', '❌ Username atau Password Admin salah!');
        }

        session()->set([
            'id'        => $admin['id'],
            'username'  => $admin['username'],
            'role'      => 'admin',
            'logged_in' => true
        ]);

    return redirect()->to('/admin/dashboard')->with('success', 'Selamat datang, ' . $admin['username']);

    }

    // Logout admin
    public function adminLogout()
    {
        session()->destroy();
        return redirect()->to(base_url('admin/login'));
    }

    // -------------------- USER --------------------

    // Menampilkan form login user
    public function userLoginForm()
    {
        return view('auth/login_user');
    }

    // Proses login user
    public function userLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $this->userModel
                     ->where('username', $username)
                     ->where('role', 'user')
                     ->first();

        if (!$user || !password_verify($password, $user['password'])) {
            return redirect()->back()->with('error', '❌ Username atau Password Pengguna salah!');
        }

       
        session()->set([
    'user_id' => $user['id'],
    'username' => $user['username'],
    'role' => 'user',
    'logged_in' => true
]);


        return redirect()->to(base_url('/')); // ke halaman pengguna


    }

    

    // Logout pengguna
    public function userLogout()
    {
        session()->destroy();
        return redirect()->to(base_url('/login'));
    }
}
