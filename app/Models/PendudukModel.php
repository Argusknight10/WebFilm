<?php

namespace App\Models;

use CodeIgniter\Model;

class PendudukModel extends Model
{
    protected $table      = 'penduduk';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama', 'alamat'];
    protected $useTimestamps = true;
}
