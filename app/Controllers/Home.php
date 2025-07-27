<?php

namespace App\Controllers;

use App\Models\BukuModel;
use App\Models\PeminjamanModel;

class Home extends BaseController
{
    protected $bukuModel;
    protected $peminjamanModel;

    public function __construct()
    {
        $this->bukuModel = new BukuModel();
        $this->peminjamanModel = new PeminjamanModel();
    }

    public function index()
    {
        $data['buku'] = $this->bukuModel->findAll();
        return view('user/index', $data);
    }

    public function dashboard()
    {
        return view('user/dashboard');
    }

    public function detail($id)
    {
        $data['buku'] = $this->bukuModel->find($id);
        return view('user/detail', $data);
    }

    public function buku()
    {
        $model = new BukuModel();
        $keyword = $this->request->getVar('q');

        if ($keyword) {
            $model->like('judul', $keyword)->orLike('penulis', $keyword);
        }

        $data = [
            'buku'    => $model->paginate(5, 'buku'),
            'pager'   => $model->pager,
            'keyword' => $keyword
        ];

        return view('home/katalog', $data);
    }

    public function pinjam($id)
    {
        if (!session()->get('logged_in')) return redirect()->to('/login');

        $user_id = session()->get('user_id');

        // Cek apakah user sudah meminjam buku yang sama dan belum dikembalikan
        $existing = $this->peminjamanModel
            ->where('user_id', $user_id)
            ->where('buku_id', $id)
            ->where('status', 'dipinjam')
            ->first();

        if ($existing) {
            return redirect()->back()->with('success', '⚠️ Buku ini masih dalam status dipinjam.');
        }

        $this->peminjamanModel->save([
            'user_id'         => $user_id,
            'buku_id'         => $id,
            'tanggal_pinjam'  => date('Y-m-d'),
            'status'          => 'dipinjam'
        ]);

        return redirect()->to('/buku')->with('success', '✅ Buku berhasil dipinjam!');
    }

    public function kembalikan($id)
    {
        if (!session()->get('logged_in')) return redirect()->to('/login');

        $user_id = session()->get('user_id');

        // Update status peminjaman user untuk buku ini
        $this->peminjamanModel
            ->where('user_id', $user_id)
            ->where('buku_id', $id)
            ->where('status', 'dipinjam')
            ->set([
                'status' => 'dikembalikan',
                'tanggal_kembali' => date('Y-m-d')
            ])
            ->update();

        return redirect()->to('/buku')->with('success', '📚 Buku berhasil dikembalikan.');
    }

    public function katalog()
    {
        $keyword = $this->request->getVar('q');
        $user_id = session()->get('user_id');

        $bukuModel = new \App\Models\BukuModel();

        // Join dengan peminjaman agar tahu status
        $builder = $bukuModel
            ->select('buku.*, peminjaman.status, peminjaman.id AS pinjam_id')
            ->join('peminjaman', 'peminjaman.buku_id = buku.id AND peminjaman.status = "dipinjam" AND peminjaman.user_id = ' . $user_id, 'left');

        if ($keyword) {
            $builder->groupStart()
                    ->like('buku.judul', $keyword)
                    ->orLike('buku.penulis', $keyword)
                    ->groupEnd();
        }

        $data = [
            'buku' => $builder->paginate(5, 'buku'),
            'pager' => $bukuModel->pager,
            'keyword' => $keyword
        ];

        return view('home/katalog', $data);
    }
}
