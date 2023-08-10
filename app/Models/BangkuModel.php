<?php

namespace App\Models;

use CodeIgniter\Model;

class BangkuModel extends Model
{
    protected $table      = 'bangku';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama_bangku', 'jml_pesanan', 'hrg_pesanan'];
    protected $useTimestamps = false;

    // public function search($keyword)
    // {  
    //     return $this->table('pesan')->like('judul', $keyword);
    // }

    // public function getBangku($slugBangku = false)
    // {
    //     if ($slugBangku == false) {
    //         return $this->findAll();
    //     }

    //     return $this->where(['slug_bangku' => $slugBangku])->first();
    // }
}
