<?php

namespace App\Models;

use CodeIgniter\Model;

class PesanModel extends Model
{
    protected $table      = 'pesan';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['username','judul','slug', 'tempat', 'tanggal', 'jam', 'jumlah', 'seat', 'price'];
    protected $useTimestamps = true;

    public function search($keyword)
    {  
        return $this->table('pesan')->like('judul', $keyword);
    }

    public function getSlugPesan($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
