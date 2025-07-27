<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
    protected $table            = 'buku';
    protected $primaryKey       = 'id';
    protected $allowedFields = ['judul', 'penulis', 'tahun', 'deskripsi', 'gambar', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
 // akan mengisi created_at otomatis

   public function getPopularBooks($limit = 4)
{
    return $this->select('buku.*, COUNT(peminjaman.buku_id) as total_pinjam')
        ->join('peminjaman', 'peminjaman.buku_id = buku.id')
        ->where('peminjaman.status', 'dipinjam')
        ->groupBy('buku.id')
        ->orderBy('total_pinjam', 'DESC')
        ->limit($limit)
        ->findAll();
}


}


