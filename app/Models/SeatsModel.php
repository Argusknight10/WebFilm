<?php

namespace App\Models;

use CodeIgniter\Model;

class SeatsModel extends Model
{
    protected $table      = 'seats';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama_bangku', 'slug_bangku', 'jml_pesanan', 'hrg_pesanan'];
    protected $useTimestamps = false;

    // public function getSeats($slugBangku = false)
    // {
    //     if ($slugBangku == false) {
    //         return $this->findAll();
    //     }

    //     return $this->where(['slug_bangku' => $slugBangku])->first();
    // }
}
