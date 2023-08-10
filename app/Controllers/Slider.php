<?php

namespace App\Controllers;

use App\Models\SliderModel;

class Slider extends BaseController
{
    protected $sliderModel;
    public function __construct()
    {
        $this->sliderModel = new SliderModel();
    }

    public function index()
    {
        $data = [
            'title' => 'HOME | SLIDER',
            'slider' => $this->sliderModel->getSlider()
        ];
        return view('slider/index', $data);
    }

    public function create()
    {
        // Mengambil hasil inputan yang terkirim di Session
        // Agar tidak lupa ketika menulisakan session() alangkah baiknya kita pindah di BaseController
        // session();
        $data = [
            'title' => 'ADD | SLIDERS',
            // Mengambil nilai validation
            'validation' => \Config\Services::validation()
        ];
        return view('slider/create', $data);
    }

    public function save()
    {
        // Validasi Input
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[slider.judul]',
                'errors' => [
                    'required' => '{field} slider harus diisi!',
                    'is_unique' => '{field} slider telah ada!'
                ]
            ],
            'slider' => [
                'rules' => 'uploaded[slider]|max_size[slider,6000]|is_image[slider]|mime_in[slider,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Pilih Gambar {field} terlebih dahulu',
                    'max_size' => 'Ukuran {field} terlalu besar!',
                    'is_image' => '{field} yang anda pilih bukan gambar',
                    'mime_in' => '{field} yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to('/slider/create')->withInput();
        }

        // Mengambil Gambar
        $fileSlider = $this->request->getFile('slider');

        // Ambil Nama File Slider
        $namaSlider = $fileSlider->getName();
        $fileSlider->move('img');

        // Mengolah Slug 
        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->sliderModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'slider' => $namaSlider,
        ]);

        session()->setFlashdata('message', 'DATA BERHASIL DITAMBAHKAN!');

        return redirect()->to('/slider');
    }

    public function delete($id)
    {
        // Cari Gambar Berdasarkan id
        $slider = $this->sliderModel->find($id);
        // Delete Gambar 
        unlink('img/' . $slider['slider']);

        $this->sliderModel->delete($id);
        session()->setFlashdata('message', 'DATA BERHASIL DIHAPUS!');
        return redirect()->to('/slider');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'EDIT | SLIDER',
            'validation' => \Config\Services::validation(),
            'slider' => $this->sliderModel->getSlider($slug)
        ];
        return view('slider/edit', $data);
    }

    public function update($id)
    {
        // dd($this->request->getVar());
        // Cek Judul
        $sliderLama = $this->sliderModel->getSlider($this->request->getVar('slug'));
        if ($sliderLama['judul'] == $this->request->getVar('judul')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[slider.judul]';
        }

        // Validasi Input
        if (!$this->validate([
            'judul' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => '{field} slider harus diisi!',
                    'is_unique' => '{field} slider telah ada!'
                ]
            ],
            'slider' => [
                'rules' => 'max_size[slider,6000]|is_image[slider]|mime_in[slider,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} terlalu besar!',
                    'is_image' => '{field} yang anda pilih bukan gambar',
                    'mime_in' => '{field} yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to('/slider/edit/' . $this->request->getVar('slug'))->withInput();
        }

        $fileSlider = $this->request->getFile('slider');
        // Cek Gambar (Apakah Tetap Gambar Lama)
        if ($fileSlider->getError() == 4) {
            $namaSlider = $this->request->getVar('sliderLama');
        } else {
            $namaSlider = $fileSlider->getName();
            $fileSlider->move('img', $namaSlider);
            unlink('img/' . $this->request->getVar('sliderLama'));
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);

        $this->sliderModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'slider' => $namaSlider
        ]);

        session()->setFlashdata('message', 'DATA BERHASIL DIUBAH!');
        return redirect()->to('/slider');
    }
}

?>