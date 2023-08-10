<?php

namespace App\Controllers;

use App\Models\PesanModel;
use App\Models\MovieModel;
use App\Models\SeatsModel;
use App\Models\BangkuModel;

class Pesan extends BaseController
{
    protected $pesanModel;
    protected $movieModel;
    protected $seatsModel;
    protected $bangkuModel;
    public function __construct()
    {
        $this->pesanModel = new PesanModel();
        $this->movieModel = new MovieModel();
        $this->seatsModel = new SeatsModel();
        $this->bangkuModel = new BangkuModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_pesan') ? $this->request->getVar('page_pesan') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $pesan = $this->pesanModel->search($keyword);
        } else {
            $pesan = $this->pesanModel;
            // session()->setFlashdata('notFound', 'Film Yang Dicari Tidak Ada!');
        };
        $data = [
            'title' => 'PESAN | MOVIES',
            'pesan' => $pesan->paginate(10, 'pesan'),
            'pager' => $this->pesanModel->pager,
            'currentPage' => $currentPage
        ];

        return view('pesan/index', $data);
    }

    public function pesan($slug){ 
        {
            $data = [
                'title' => 'ADD | TICKETS',
                'validation' => \Config\Services::validation(),
                'movie' => $this->movieModel->getMovie($slug),
                'seats' => $this->seatsModel->findAll()
            ];

            // jika movie tidak ada di tabel 
            // if (empty($data['movie'])) {
            //     throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul ' . $slug . ' tidak ditemukan!!');
            // }

            return view('pesan/pesan', $data);
        }
    }


    // public function create()
    // {
    //     $data = [
    //         'title' => 'ADD | TICKETS',
    //         'validation' => \Config\Services::validation(),
    //         'movie' => $this->movieModel->findAll(),
    //         'seats' => $this->seatsModel->findAll()
    //     ];

    //     return view('pesan/create', $data);
    // }

    public function save()
    {
        // $seats = $this->seatsModel->getVar('seat');

        // Validasi Input
        // if (!$this->validate([
        //     'judul' => [
        //         'rules' => 'required|is_unique[pesan.judul]',
        //         'errors' => [
        //             'required' => '{field} pesan harus diisi!',
        //             'is_unique' => '{field} pesan telah ada!'
        //         ]
        //     ],

        //     'tanggal' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} pesan harus diisi!',
        //         ]
        //     ],

        //     'jam' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} pesan harus diisi!',
        //         ]
        //     ],

        //     'jumlah' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} pesan harus diisi!',
        //         ]
        //     ],

        //     'seat' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} pesan harus diisi!',
        //         ]
        //     ]
        // ])) {
        //     return redirect()->to('/pesan/create')->withInput();
        // }

        // Mengolah Price
        // $jumlah = $this->request->getVar('jumlah');
        // $price = 5000;
        // $totalPrice = $price * $jumlah;

        // Mengolah Seat 

        // Mengolah Slug 
        $slug = url_title($this->request->getVar('judul'), '-', true);

        $this->pesanModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'tempat' => $this->request->getVar('tempat'),
            'tanggal' => $this->request->getVar('tanggal'),
            'jam' => $this->request->getVar('jam'),
            // 'jumlah' => $this->request->getVar('jumlah'),
            // 'seat' =>  $this->request->getVar('seat'),
            'seat' => implode(", ", $this->request->getVar('seat[]')),
            'price' => $this->request->getVar('price')
        ]);

        session()->setFlashdata('message', 'PESANAN BERHASIL MASUK!');

        return redirect()->to('/pesan/');
    }

    public function delete($id)
    {
        $this->pesanModel->delete($id);
        session()->setFlashdata('message', 'PESANAN DIBATALKAN!');
        return redirect()->to('/pesan/');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'EDIT | TICKETS',
            // Mengambil nilai validation
            'validation' => \Config\Services::validation(),
            'pesan' => $this->pesanModel->getSLugPesan($slug),
            'movie' => $this->movieModel->getMovie($slug),
            'seats' => $this->seatsModel->findAll()
        ];
        return view('pesan/edit', $data);
    }

    public function update($id)
    {
        // Cek Judul
        $movieLama = $this->pesanModel->getSlugPesan($this->request->getVar('slug'));
        if ($movieLama['judul'] == $this->request->getVar('judul')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required';
        }

        if ($movieLama['tempat'] == $this->request->getVar('tempat')) {
            $rule_tempat = 'required';
        } else {
            $rule_tempat = 'required';
        }

        if ($movieLama['tanggal'] == $this->request->getVar('tanggal')) {
            $rule_tanggal = 'required';
        } else {
            $rule_tanggal = 'required';
        }

        if ($movieLama['jam'] == $this->request->getVar('jam')) {
            $rule_jam = 'required';
        } else {
            $rule_jam = 'required';
        }

        if ($movieLama['jumlah'] == $this->request->getVar('jumlah')) {
            $rule_jumlah = 'required';
        } else {
            $rule_jumlah = 'required';
        }

        if ($movieLama['seat'] == $this->request->getVar('seat')) {
            $rule_seat = 'required';
        } else {
            $rule_seat = 'required';
        }
        if (!$this->validate([
            'judul' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => '{field} movie harus diisi!',
                    'is_unique' => '{field} movie telah ada!'
                ]
            ],

            'tempat' => [
                'rules' => $rule_tempat,
                'errors' => [
                    'required' => '{field} movie harus diisi!',
                ]
            ],

            'tanggal' => [
                'rules' => $rule_tanggal,
                'errors' => [
                    'required' => '{field} movie harus diisi!',
                ]
            ],

            'jam' => [
                'rules' => $rule_jam,
                'errors' => [
                    'required' => '{field} movie harus diisi!',
                ]
            ],

            'jumlah' => [
                'rules' => $rule_jumlah,
                'errors' => [
                    'required' => '{field} movie harus diisi!',
                ]
            ],

            'seat' => [
                'rules' => $rule_seat,
                'errors' => [
                    'required' => '{field} movie harus diisi!',
                ]
            ]
        ])) {
            // Cara Menangkap Pesan Kesalahan 
            // $validation = \Config\Services::validation();

            // Mengirimkan Hasil Inputan & Validasi ke method create()  
            return redirect()->to('/pesan/edit/' . $this->request->getVar('slug'))->withInput();
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);

        $this->pesanModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'tempat' => $this->request->getVar('tempat'),
            'tanggal' => $this->request->getVar('tanggal'),
            'jam' => $this->request->getVar('jam'),
            'jumlah' => $this->request->getVar('jumlah'),
            'seat' => $this->request->getVar('seat')
        ]);

        session()->setFlashdata('message', 'PESANAN BERHASIL DIUBAH!');

        return redirect()->to('/pesan/');
    }
}
