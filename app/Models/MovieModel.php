<?php

namespace App\Models;

use CodeIgniter\Model;

class MovieModel extends Model
{
    protected $table      = 'movie';
    // protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    // protected $returnType     = 'array';
    // SoftDeletes = Data yang dimiliki di database tidak akan dihapus, tetapi akan muncul sebuah field deleted_at
    // protected $useSoftDeletes = false;
    protected $allowedFields = ['judul', 'slug', 'poster', 'video', 'sutradara', 'aktor', 'produksi', 'genre', 'tanggal_tayang'];
    protected $useTimestamps = true;

    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;

    public function search($keyword)
    {   // Validasi Input
        // Cara Baca: Jika Tidak Tervalidasi, Maka...
       
        // $builder = $this->table('movie');
        // $builder->like('judul',$keyword);
        // return $builder;
        // if ($keyword != 'judul') {
        //     session()->setFlashdata('notFound', 'Film Yang Anda Cari Tidak Ada');
        // }

        return $this->table('movie')->like('judul', $keyword);
    }
    public function getMovie($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
    public function getPesan($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
