<?php
namespace App\Controllers\Admin;

// ARAHKAN MENGGUNAKAN USE AGAR DAPAT TERSAMBUNG KE BASECONTROLLER
use App\Controllers\BaseController;

class Users extends BaseController
{
    public function index()
    {
        echo "INI ADALAH <br>";
        echo "CONTROLLER = USERS, METHOD = INDEX <br>";
        echo "BERADA DI DALAM FOLDER/NAMESPACE ADMIN";
    }
}
