<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;
use CodeIgniter\Database\Seeder;

class OrangSedeer extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama'          => 'Rijki Juhara',
                'alamat'        => 'Jl. Bekasi No. 45',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now()
            ],
            [
                'nama'          => 'Dobith',
                'alamat'        => 'Jl. CieuntengGede No. 35',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now()
            ],
            [
                'nama'          => 'Muhamad Aripin',
                'alamat'        => 'Jl. Sukaratu No. 80',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now()
            ],
            [
                'nama'          => 'Fiona',
                'alamat'        => 'Jl. Cihideung No. 38',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now()
            ]
        ];

        // Simple Queries
        //$this->db->query('INSERT INTO orang (nama, alamat, created_at, updated_at) VALUES(:nama:, :alamat:, :created_at:, :updated_at:)', $data);

        // Using Query Builder
        //$this->db->table('orang')->insert($data);
        $this->db->table('orang')->insertBatch($data);
    }
}