<?php

namespace App\Controllers;

use App\Models\MovieModel;
use App\Models\SliderModel;
// use App\Models\PesanModel;

class Pages extends BaseController
{
    protected $movieModel;
    protected $sliderModel;
    // protected $pesanModel;
    public function __construct()
    {
        $this->movieModel = new MovieModel();
        $this->sliderModel = new SliderModel();
        // $this->pesanModel = new PesanModel();
    }


    public function index()
    {
        $currentPage = $this->request->getVar('page_movie') ? $this->request->getVar('page_movie') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $movie = $this->movieModel->search($keyword);
        } else {
            $movie = $this->movieModel;
        };

        // Agar dapat menampilkan sebuah View
        // return view('Folder/NamaFile');
        $data = [
            'title' => 'HOME | MOVIES',
            // 'movie' => $this->movieModel->getMovie(),
            'movie' => $movie->paginate(14, 'movie'),
            'pesan' => $this->movieModel->getPesan(),
            'pager' => $this->movieModel->pager,
            'slider' => $this->sliderModel->getSlider(),
            'currentPage' => $currentPage
            // $data = $this->tmdb->call('6fdeacccd4e3e958ad89c3500dd85180', 'Movie.getInfo', '187')
        ];
        return view('pages/index', $data);
    }

    public function movies()
    {
        // Agar dapat menampilkan sebuah View
        // return view('Folder/NamaFile');
        $data = [
            'title' => 'HOME | MOVIES',
            'pesan' => $this->movieModel->getPesan(),
            // 'movie' => $movie->paginate(14, 'movie'),
            'pager' => $this->movieModel->pager,
            'slider' => $this->sliderModel->getSlider(),
            // 'currentPage' => $currentPage
        ];

        return view('pages/movies', $data);
    }

    public function contact()
    {
        // Agar dapat menampilkan sebuah View
        // return view('Folder/NamaFile');
        $data = [
            'title' => 'CONTACT | ARGUS.com',
            'medsos' => [
                [
                    'nama' => 'WHATSAPP =',
                    'kontak' => '+62 821-3138-3146'
                ],

                [
                    'nama' => 'INSTAGRAM =',
                    'kontak' => 'argus_.10'
                ]
            ]
        ];
        return view('pages/contact', $data);
    }
}
