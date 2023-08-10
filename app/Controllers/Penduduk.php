<?php

namespace App\Controllers;

use App\Models\PendudukModel;

class Penduduk extends BaseController
{
    protected $pendudukModel;
    public function __construct()
    {
        $this->pendudukModel = new PendudukModel();
    }

    public function index()
    {
        // $currentPage = $this->request->getVar('page_penduduk') ? $this->request->getVar('page_penduduk') : 1;

        $data = [
            'title' => 'HOME | PENDUDUK',
            'penduduk' => $this->pendudukModel->findAll()
            // 'penduduk' => $this->pendudukModel->paginate(10, 'penduduk'),
            // 'pager' => $this->pendudukModel->pager,
            // 'currentPage' => $currentPage
        ];

        return view('penduduk/index', $data);
    }

}
?>