<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class PendudukSeeder extends Seeder
{
    public function run()
    {
        $dataStatis = [
            [
                'nama' => 'Arya Bagus Permono',
                'alamat' => 'Jl. Manukan Lor 1D/05',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],

            [
                'nama' => 'Selly Ajeng Via Wiranti',
                'alamat' => 'Jl. Manukan Lor 4G/23',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
        ];

        // << 2 CARA MENJALANKAN QUERY : >>
        //  1. Simple Queries
        // $this->db->query(
        //     'INSERT INTO penduduk (nama, kelas, absen, jurusan, created_at, updated_at) 
        //      VALUES(:nama:, :kelas:, :absen:, :jurusan:, :created_at:, :updated_at:)', $dataStatis
        // );

        //  2. Using Query Builder
        // insert() = hanya dpt digunakan untuk menambahkan 1 data saja
        // insertBatch() = dpt digunakan untuk menambahkan banyak data 
        $this->db->table('penduduk')->insertBatch($dataStatis);

        // Cara Menggunakan Faker 
        // Cara Mengatur Localization (Negara Asal Dari Data yg Diambil)
        // $faker = \Faker\Factory::create('negara_NEGARA');
        $faker = \Faker\Factory::create('id_ID');

        for ($i = 0; $i <= 100; $i++) {
            $dataRandom = [
                'nama' => $faker->name,
                'alamat' => $faker->address,
                // cara membuat created_at menggunakan waktu random 
                'created_at' => Time::createFromTimestamp($faker->unixTime()),
                'updated_at' => Time::now()
            ];
            $this->db->table('penduduk')->insert($dataRandom);
        };


        // (( CARA RUNNING SEEDER : ))
        // php spark db:seed NamaSeeder

        // FAKER YANG SUPPORT PHP 8
        // composer require fakerphp/faker
    }
}
