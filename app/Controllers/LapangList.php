<?php

namespace App\Controllers;

use App\Models\Lapang;

class LapangList extends BaseController
{
    protected $lapangModel;

    public function __construct()
    {
        $this->lapangModel = new Lapang();
    }

    public function index()
    {
        // $lapang = $this->lapangModel->findAll();

        $data = [
            'title'  => 'List Lapang',
            'lapang' => $this->lapangModel->getLapang()
        ];

        return view('lapang/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Add Field'

        ];

        return view('lapang/create', $data);
    }

    public function save()
    {
        //Lakukan Validasi Input
        $validation      = \Config\Services::validation();
        $rules           = ['nama_tim' => 'required', 'jam_main' => 'required', 'selesai' => 'required', 'lapang' => 'required'];
        $validation->setRules($rules);
        $isDataValid     = $validation->withRequest($this->request)->run();

        // Jika Data Valid, Maka Simpan Ke Database
        if ($isDataValid) {
            $this->lapangModel->insert([
                'tanggal'  => $this->request->getPost('tanggal'),
                'jam_main' => $this->request->getPost('jam_main'),
                'selesai'  => $this->request->getPost('selesai'),
                'lapang'   => $this->request->getPost('lapang'),
                'nama_tim' => $this->request->getPost('nama_tim'),
            ]);
        }
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect('list/lapang');
    }


    public function edit($id)
    {
        $data = [
            'title'  => 'Edit Field',
            'lapang' => $this->lapangModel->getLapang($id)
        ];

        return view('lapang/edit', $data);
    }

    public function update($id)
    {
        // Lakukan Validasi
        $validation     = \Config\Services::validation();
        $rules          = ['tanggal' => 'required', 'jam_main' => 'required', 'selesai' => 'required'];
        $validation->setRules($rules);
        $isDataValid    = $validation->withRequest($this->request)->run();

        // Jika Data Valid, Maka Simpan Ke Database
        if ($isDataValid) {
            $this->lapangModel->update($id, [
                'tanggal'    => $this->request->getPost('tanggal'),
                'jam_main'   => $this->request->getPost('jam_main'),
                'selesai'    => $this->request->getPost('selesai'),
                'lapang'     => $this->request->getPost('lapang'),
                'nama_tim'   => $this->request->getPost('nama_tim')
            ]);
        }
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect('list/lapang');
    }

    public function ubah($id)
    {
        $lp = $this->lapangModel->find($id);
        return json_encode($lp);
    }

    public function delete($id)
    {
        $this->lapangModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect('list/lapang');
    }
}