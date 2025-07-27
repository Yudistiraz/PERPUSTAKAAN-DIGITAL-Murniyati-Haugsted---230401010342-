<?php

namespace App\Controllers;

class Hash extends BaseController
{
    /**
     * Fungsi ini akan menampilkan hash dari password yang dimasukkan melalui URL query
     * Contoh akses: http://localhost:8080/PERPUSTAKAAN-DIGITAL/public/hash?password=admin123
     */
    public function index()
    {
        $password = $this->request->getGet('password');

        if (!$password) {
            return 'Silakan tambahkan password di URL, contoh: <br><code>?password=admin123</code>';
        }

        $hash = password_hash($password, PASSWORD_DEFAULT);

        return view('hash_result', ['password' => $password, 'hash' => $hash]);
    }
}
