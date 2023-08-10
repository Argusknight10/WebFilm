<?php

namespace App\Controllers;

use App\Models\MovieModel;

class Movies extends BaseController
{
    protected $movieModel;
    public function __construct()
    {
        $this->movieModel = new MovieModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_movie') ? $this->request->getVar('page_movie') : 1;


        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $movie = $this->movieModel->search($keyword);
        } else {
            $movie = $this->movieModel;
            // session()->setFlashdata('notFound', 'Film Yang Dicari Tidak Ada!');
        };

        // $movie = $this-> movieModel -> findAll();
        $data = [
            'title' => 'HOME | MOVIES',
            'movie' => $movie->paginate(10, 'movie'),
            'pager' => $this->movieModel->pager,
            'currentPage' => $currentPage
        ];

        // Cara Koneksi Database Dengan Model 
        // $movieModel = new \App\Models\MovieModel();
        // $movieModel = new MovieModel();

        return view('movies/index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'DETAILS | MOVIES',
            'movie' => $this->movieModel->getMovie($slug)
        ];

        // jika movie tidak ada di tabel 
        if (empty($data['movie'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul ' . $slug . ' tidak ditemukan!!');
        }

        // return view('movies/detail', $data);
        return view('movies/detail', $data);
    }

    // public function pesan($id)
    // {
    //     $data = [
    //         'title' => 'DETAILS | MOVIES',
    //         'movie' => $this->movieModel->getFilm($id)
    //     ];

    //     // jika movie tidak ada di tabel 
    //     if (empty($data['movie'])) {
    //         throw new \CodeIgniter\Exceptions\PageNotFoundException('slug ' . $id . ' Tidak ditemukan!!');
    //     }

    //     return view('movies/pesan', $data);
    // }

    public function create()
    {
        // Mengambil hasil inputan yang terkirim di Session
        // Agar tidak lupa ketika menulisakan session() alangkah baiknya kita pindah di BaseController
        // session();
        $data = [
            'title' => 'ADD | MOVIES',
            // Mengambil nilai validation
            'validation' => \Config\Services::validation()
        ];
        return view('movies/create', $data);
    }

    // method save() berfungsi untuk mengelola data yang dikirim dari create untuk diinsert ke dalam tabel
    public function save()
    {
        // Validasi Input
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[movie.judul]',
                'errors' => [
                    'required' => '{field} movie harus diisi!',
                    'is_unique' => '{field} movie telah ada!'
                ]
            ],

            'poster' => [
                'rules' => 'max_size[poster,6000]|is_image[poster]|mime_in[poster,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} terlalu besar!',
                    'is_image' => '{field} yang anda pilih bukan gambar',
                    'mime_in' => '{field} yang anda pilih bukan gambar'
                ]
            ],

            'video' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} movie harus diisi!',
                ]
            ],

            'sutradara' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} movie harus diisi!',
                ]
            ],

            'aktor' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} movie harus diisi!',
                ]
            ],

            'produksi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} movie harus diisi!',
                ]
            ],

            'genre' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} movie harus diisi!',
                ]
            ],

            'tanggal_tayang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} movie harus diisi!',
                ]
            ]
        ])) {
            // Cara Menangkap Pesan Kesalahan 
            // $validation = \Config\Services::validation();

            // Mengirimkan Hasil Inputan & Validasi ke method create()  
            // return redirect()->to('/movies/create')->withInput()->with('validation', $validation);
            return redirect()->to('/movies/create')->withInput();
        }

        // Mengambil Gambar
        $filePoster = $this->request->getFile('poster');
        // Apakah Tidak Ada Gambar Yang Diupload
        // Ambil Nama File Poster
        $namaPoster = $filePoster->getName();
        if ($filePoster->getError() == 4) {
            $namaPoster = 'default.png';
        } else {
            // Pindah File ke Folder img
            $filePoster->move('img');
        }

        // Mengolah Slug 
        $slug = url_title($this->request->getVar('judul'), '-', true);

        $this->movieModel->save([

            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'poster' => $namaPoster,
            'video' => $this->request->getVar('video'),
            'sutradara' => $this->request->getVar('sutradara'),
            'aktor' => $this->request->getVar('aktor'),
            'produksi' => $this->request->getVar('produksi'),
            'genre' => $this->request->getVar('genre'),
            'tanggal_tayang' => $this->request->getVar('tanggal_tayang')
        ]);

        session()->setFlashdata('message', 'DATA BERHASIL DITAMBAHKAN!');

        return redirect()->to('/movies');
    }

    public function delete($id)
    {
        // Cari Gambar Berdasarkan id
        $movie = $this->movieModel->find($id);

        // Cek Apabila File Gambar default.png
        if ($movie['poster'] != 'default.png') {
            // Delete Gambar 
            unlink('img/' . $movie['poster']);
        }

        $this->movieModel->delete($id);
        session()->setFlashdata('message', 'DATA BERHASIL DIHAPUS!');
        return redirect()->to('/movies');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'EDIT | MOVIES',
            // Mengambil nilai validation
            'validation' => \Config\Services::validation(),
            'movie' => $this->movieModel->getMovie($slug)
        ];
        return view('movies/edit', $data);
    }

    public function update($id)
    {
        // Cek Judul
        $movieLama = $this->movieModel->getMovie($this->request->getVar('slug'));
        if ($movieLama['judul'] == $this->request->getVar('judul')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required';
        }

        if ($movieLama['video'] == $this->request->getVar('video')) {
            $rule_video = 'required';
        } else {
            $rule_video = 'required';
        }

        if ($movieLama['sutradara'] == $this->request->getVar('sutradara')) {
            $rule_sutradara = 'required';
        } else {
            $rule_sutradara = 'required';
        }

        if ($movieLama['aktor'] == $this->request->getVar('aktor')) {
            $rule_aktor = 'required';
        } else {
            $rule_aktor = 'required';
        }

        if ($movieLama['produksi'] == $this->request->getVar('produksi')) {
            $rule_produksi = 'required';
        } else {
            $rule_produksi = 'required';
        }

        if ($movieLama['genre'] == $this->request->getVar('genre')) {
            $rule_genre = 'required';
        } else {
            $rule_genre = 'required';
        }

        if ($movieLama['tanggal_tayang'] == $this->request->getVar('tanggal_tayang')) {
            $rule_tanggal_tayang = 'required';
        } else {
            $rule_tanggal_tayang = 'required';
        }

        if (!$this->validate([
            'judul' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => '{field} movie harus diisi!',
                    'is_unique' => '{field} movie telah ada!'
                ]
            ],

            'poster' => [
                'rules' => 'max_size[poster,6000]|is_image[poster]|mime_in[poster,image/jpg,image/png,image/jpeg]',
                'errors' => [
                    'max_size' => 'Ukuran {field} terlalu besar!',
                    'is_image' => '{field} yang anda pilih bukan gambar',
                    'mime_in' => '{field} yang anda pilih bukan gambar'
                ]
            ],

            'video' => [
                'rules' => $rule_video,
                'errors' => [
                    'required' => '{field} movie harus diisi!',
                ]
            ],

            'sutradara' => [
                'rules' => $rule_sutradara,
                'errors' => [
                    'required' => '{field} movie harus diisi!',
                ]
            ],

            'aktor' => [
                'rules' => $rule_aktor,
                'errors' => [
                    'required' => '{field} movie harus diisi!',
                ]
            ],

            'produksi' => [
                'rules' => $rule_produksi,
                'errors' => [
                    'required' => '{field} movie harus diisi!',
                ]
            ],

            'genre' => [
                'rules' => $rule_genre,
                'errors' => [
                    'required' => '{field} movie harus diisi!',
                ]
            ],

            'tanggal_tayang' => [
                'rules' => $rule_tanggal_tayang,
                'errors' => [
                    'required' => '{field} movie harus diisi!',
                ]
            ]
        ])) {
            // Cara Menangkap Pesan Kesalahan 
            // $validation = \Config\Services::validation();

            // Mengirimkan Hasil Inputan & Validasi ke method create()  
            // return redirect()->to('/movies/edit/'.$this->request->getVar('slug'))->withInput()->with('validation', $validation);
            return redirect()->to('/movies/edit/' . $this->request->getVar('slug'))->withInput();
        }

        // Jika Sudah Lolos Validasi, Kelola File Gambar Baru
        $filePoster = $this->request->getFile('poster');

        // Cek Gambar (Apakah Tetap Gambar Lama)
        if ($filePoster->getError() == 4) {
            $namaPoster = $this->request->getVar('posterLama');
        } else {
            $namaPoster = $filePoster->getName();
            $filePoster->move('img', $namaPoster);
            if ($this->request->getVar('posterLama') != 'default.png') {
                unlink('img/' . $this->request->getVar('posterLama'));
            }
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);

        $this->movieModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'poster' => $namaPoster,
            'video' => $this->request->getVar('video'),
            'sutradara' => $this->request->getVar('sutradara'),
            'aktor' => $this->request->getVar('aktor'),
            'produksi' => $this->request->getVar('produksi'),
            'genre' => $this->request->getVar('genre'),
            'tanggal_tayang' => $this->request->getVar('tanggal_tayang')
        ]);

        session()->setFlashdata('message', 'DATA BERHASIL DIUBAH!');

        return redirect()->to('/movies');
    }
}
