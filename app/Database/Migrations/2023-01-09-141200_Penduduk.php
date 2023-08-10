<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penduduk extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true, //agar nilai positif semua
                'auto_increment' => true,
            ],
            'nama' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'alamat' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'created_at' => [
                'type'           => 'DATETIME',
                'null'           => TRUE,
            ],
            'updated_at' => [
                'type'           => 'DATETIME',
                'null'           => TRUE,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('penduduk');
    }

    public function down()
    {
        $this->forge->dropTable('penduduk');
    }

    // Cara Membuat File Migration
    // php spark migrate:create NamaMigration

    // Cara Eksekusi File Migration 
    // php spark migrate (jika menggunakan cara ini akan mengeksekusi semua file migration)
}
