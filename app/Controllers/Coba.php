<?php

namespace App\Controllers;

class Coba extends BaseController
{
    public function index()
    {
        echo "INI ADALAH <br>";
        echo "CONTROLLER = COBA, METHOD = INDEX" ;
    }

    public function nama() {
        echo "PERKENALKAN NAMA SAYA $this->Nama.";
    }

    // Kita juga dapat mengirimkan data melalui segmen URL, Caranya :
    // 1. Tambahkan data melalui segmen URL
    // 2. Buat parameter untuk menangkap data dari URL
    // 3. Untuk menampilkan data tidak perlu $this-> lagi
    public function kelas($Kelas = '0', $Jurusan = '') {
        echo "SAYA KELAS $Kelas $Jurusan";
    }
}
