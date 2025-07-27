<?php

namespace App\Controllers;

use App\Models\BukuModel;
use CodeIgniter\Controller;

class User extends Controller
{
    protected $bukuModel;

    public function __construct()
    {
        
        $this->bukuModel = new BukuModel();
    }

    public function dashboard()
{    

    helper('text'); // ← Tambahkan baris ini
    $keyword = $this->request->getGet('q');
    $query = $this->bukuModel;

    if ($keyword) {
        $query = $query->groupStart()
            ->like('judul', $keyword)
            ->orLike('penulis', $keyword)
            ->groupEnd();
    }

    $data = [
        'buku'        => $query->orderBy('id', 'DESC')->paginate(10, 'buku'),
        'pager'       => $this->bukuModel->pager,
        'keyword'     => $keyword,
        'bukuPopuler' => $this->bukuModel->getPopularBooks() // penting!
    ];

    return view('user/dashboard', $data);
}

    public function search()
    {
        $keyword = $this->request->getGet('q');
        $query = $this->bukuModel;

        if ($keyword) {
            $query = $query->groupStart()
                           ->like('judul', $keyword)
                           ->orLike('penulis', $keyword)
                           ->groupEnd();
        }

        $data['buku'] = $query->orderBy('id', 'DESC')->findAll();

        return view('user/table', $data);
    }
}
