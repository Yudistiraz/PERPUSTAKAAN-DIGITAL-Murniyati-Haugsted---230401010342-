<?php
namespace App\Controllers;

use App\Models\PeminjamanModel;
use App\Models\BukuModel;

class PeminjamanController extends BaseController
{
    protected $peminjamanModel;
    protected $bukuModel;

    public function __construct()
    {
        $this->peminjamanModel = new PeminjamanModel();
        $this->bukuModel = new BukuModel();
    }

    public function pinjam($buku_id)
    {
        $user_id = session()->get('user_id');
        $jumlah = 1;
        $lama_hari = 3;
        $biaya_per_hari = 5000;

        $total_biaya = $jumlah * $lama_hari * $biaya_per_hari;

        $data = [
            'user_id'         => $user_id,
            'buku_id'         => $buku_id,
            'jumlah'          => $jumlah,
            'lama_hari'       => $lama_hari,
            'biaya_per_hari'  => $biaya_per_hari,
            'total_biaya'     => $total_biaya,
            'tanggal_pinjam'  => date('Y-m-d'),
            'status'          => 'dipinjam'
        ];

        $this->peminjamanModel->save($data);

        return redirect()->back()->with('success', '✅ Buku berhasil dipinjam.');
    }

    public function prosesPinjam($id)
{
    $userId = session()->get('user_id');
    $jumlah = $this->request->getPost('jumlah');
    $lama = $this->request->getPost('lama_hari');
    $biaya_per_hari = 5000;
    $total = $jumlah * $lama * $biaya_per_hari;

    $this->peminjamanModel->save([
        'user_id'        => $userId,
        'buku_id'        => $id,
        'jumlah'         => $jumlah,
        'lama_hari'      => $lama,
        'biaya_per_hari' => $biaya_per_hari,
        'total_biaya'    => $total,
        'tanggal_pinjam' => date('Y-m-d'),
        'status'         => 'dipinjam'
    ]);

    return redirect()->to('/buku')->with('success', '✅ Buku berhasil dipinjam.');
}


    public function kembalikan($id)
    {
        $this->peminjamanModel->update($id, [
            'status' => 'dikembalikan',
            'tanggal_kembali' => date('Y-m-d')
        ]);

        return redirect()->back()->with('success', '📚 Buku dikembalikan.');
    }

    public function riwayat()
    {
        $user_id = session()->get('user_id');
        $data['riwayat'] = $this->peminjamanModel
            ->join('buku', 'buku.id = peminjaman.buku_id')
            ->where('user_id', $user_id)
            ->findAll();

        return view('user/riwayat_peminjaman', $data);
    }
}
