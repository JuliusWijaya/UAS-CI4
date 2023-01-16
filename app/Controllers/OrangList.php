<?php

namespace App\Controllers;

use App\Models\orang;

use function PHPUnit\Framework\returnSelf;

class OrangList extends BaseController
{
    protected $orangModel;

    public function __construct()
    {
        $this->orangModel = new Orang();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_orang') ?  $this->request->getVar('page_orang') : 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $orang = $this->orangModel->search($keyword);
        } else {
            $orang = $this->orangModel;
        }

        //$orang = $this->orangModel->findAll();
        $data = [
            'title'       => 'List Orang',
            'orang'       => $orang->paginate(5, 'orang'),
            'pager'       => $this->orangModel->pager,
            'currentPage' => $currentPage
            //'orang'  => $this->orangModel->findAll()
        ];

        return view('orang/index', $data);
    }

    // INSERT DATA ORANG
    public function create()
    {
        // Lakukan Validasi
        $validation = \Config\Services::validation();
        $rules      = ['nama' => 'required', 'alamat' => 'required'];
        $validation->setRules($rules);
        $isDataValid = $validation->withRequest($this->request)->run();

        // Jika Data Valid, Maka Simpan Ke Database
        if ($isDataValid) {
            $this->orangModel->INSERT([
                "nama"       => $this->request->getPost('nama'),
                "alamat"     => $this->request->getPost('alamat')
            ]);
            session()->setFlashdata('pesan', 'Orang Baru Berhasil Ditambahkan');
            return redirect('orang');
        }
    }

    // UPDATE ORANG
    public function update($id)
    {
        // Lakukan Validasi
        $validation  = \Config\Services::validation();
        $rules       = ['nama' => 'required', 'alamat' => 'required'];
        $validation->setRules($rules);
        $isDataValid = $validation->withRequest($this->request)->run();

        // Jika Data Valid, Maka Simpan Ke Database
        if ($isDataValid) {
            $this->orangModel->update($id, [
                "nama"    => $this->request->getPost('nama'),
                "alamat"  => $this->request->getPost('alamat')
            ]);
        }
        session()->setFlashdata('pesan', 'Orang Berhasil Di Edit');
        return redirect('orang');
    }

    //EDIT ORANG
    // public function edit($id)
    // {
    //     $data = [
    //         'title'  => 'Edit Orang',
    //         'orang'  => $this->orangModel->getOrang($id)
    //     ];

    //     return redirect('orang', $data);
    // }

    //DELETE ORANG
    public function delete($id)
    {
        $this->orangModel->delete($id);
        session()->setFlashdata('pesan', 'Orang Berhasil Di Delete');
        return redirect('orang');
    }
}