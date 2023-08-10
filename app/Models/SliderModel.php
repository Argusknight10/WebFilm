<?php

namespace App\Models;

use CodeIgniter\Model;

class SliderModel extends Model
{
    protected $table      = 'slider';
    // protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    // protected $returnType     = 'array';
    // SoftDeletes = Data yang dimiliki di database tidak akan dihapus, tetapi akan muncul sebuah field deleted_at
    // protected $useSoftDeletes = false;
    protected $allowedFields = ['judul', 'slug', 'slider'];
    protected $useTimestamps = true;

    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;

    public function getSlider($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
