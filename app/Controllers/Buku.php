<?php

namespace App\Controllers;

use App\Models\BukuModel;

class Buku extends BaseController
{
    protected $bukuModel;

    public function __construct()
    {
        $this->bukuModel = new BukuModel();
        helper(['form']);
    }

    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/admin/login');
        }

        $keyword = $this->request->getVar('q');
        $query = $this->bukuModel;

        if ($keyword) {
            $query = $query->groupStart()
                           ->like('judul', $keyword)
                           ->orLike('penulis', $keyword)
                           ->groupEnd();
        }

        $data = [
            'buku'    => $query->orderBy('id', 'DESC')->paginate(10, 'buku'),
            'pager'   => $this->bukuModel->pager,
            'keyword' => $keyword
        ];

        return view('admin/buku_list', $data);
    }

    public function create()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/admin/login');
        }

        return view('admin/buku/create');
    }

    public function save()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/admin/login');
        }

        $validation = \Config\Services::validation();

        $rules = [
            'judul'     => 'required|min_length[3]',
            'penulis'   => 'required',
            'tahun'     => 'required|numeric|exact_length[4]',
            'gambar'    => 'uploaded[gambar]|is_image[gambar]|max_size[gambar,1024]'
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $fileGambar = $this->request->getFile('gambar');
        $namaGambar = $fileGambar->getRandomName();
        $fileGambar->move('uploads/buku/', $namaGambar);

        $this->bukuModel->save([
            'judul'     => $this->request->getPost('judul'),
            'penulis'   => $this->request->getPost('penulis'),
            'tahun'     => $this->request->getPost('tahun'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'gambar'    => $namaGambar
        ]);

        return redirect()->to('/admin/buku')->with('success', 'Buku berhasil ditambahkan!');
    }

    public function edit($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/admin/login');
        }

        $buku = $this->bukuModel->find($id);

        if (!$buku) {
            return redirect()->to('/admin/buku')->with('error', 'Data buku tidak ditemukan.');
        }

        return view('admin/buku_form', ['buku' => $buku]);
    }

    public function update($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/admin/login');
        }

        $fileGambar = $this->request->getFile('gambar');
        if ($fileGambar && $fileGambar->isValid() && !$fileGambar->hasMoved()) {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('uploads/buku/', $namaGambar);
        } else {
            $namaGambar = $this->request->getPost('gambar_lama');
        }

        $this->bukuModel->save([
            'id'        => $id,
            'judul'     => $this->request->getPost('judul'),
            'penulis'   => $this->request->getPost('penulis'),
            'tahun'     => $this->request->getPost('tahun'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'gambar'    => $namaGambar
        ]);

        return redirect()->to('/admin/buku')->with('success', 'Buku berhasil diperbarui.');
    }

    public function delete($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/admin/login');
        }

        $this->bukuModel->delete($id);
        return redirect()->to('/admin/buku')->with('success', 'Buku berhasil dihapus.');
    }
}

