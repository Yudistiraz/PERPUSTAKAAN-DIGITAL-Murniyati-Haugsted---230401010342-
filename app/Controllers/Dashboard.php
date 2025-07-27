<?php

namespace App\Controllers;

use App\Models\BukuModel;

class Dashboard extends BaseController
{
    public function index()
    {
        // Cek apakah user sudah login
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $bukuModel = new BukuModel();

        // 1. Total semua buku
        $data['totalBuku'] = $bukuModel->countAll();

        // 2. Total penulis unik
        $data['totalPenulis'] = $bukuModel->select('penulis')->distinct()->countAllResults();

        // 3. Data untuk grafik jumlah buku per tahun
        $data['bukuPerTahun'] = $bukuModel->select('tahun, COUNT(*) as jumlah')
                                          ->groupBy('tahun')
                                          ->orderBy('tahun', 'ASC')
                                          ->findAll();

        // 4. Buku yang ditambahkan di bulan ini
        $now = date('Y-m'); // Contoh: 2025-07
        $data['bukuBulanIni'] = $bukuModel
            ->where('DATE_FORMAT(created_at, "%Y-%m")', $now)
            ->countAllResults(false);

        $data['namaBulanIni'] = date('F Y'); // Contoh: July 2025

        // Kirim ke view
        return view('admin/dashboard', $data);
    }
}


