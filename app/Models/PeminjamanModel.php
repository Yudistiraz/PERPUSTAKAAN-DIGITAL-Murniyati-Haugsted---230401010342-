<?php

namespace App\Models;

use CodeIgniter\Model;

class PeminjamanModel extends Model
{
    protected $table = 'peminjaman';
    protected $allowedFields = [
        'user_id', 'buku_id', 'jumlah', 'lama_hari',
        'biaya_per_hari', 'total_biaya',
        'tanggal_pinjam', 'tanggal_kembali', 'status'
    ];

    protected $useTimestamps = false;
}
