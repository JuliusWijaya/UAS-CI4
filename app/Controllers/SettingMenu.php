<?php

namespace App\Controllers;

use App\Models\Menu;

class SettingMenu extends BaseController
{
    protected $menuModel;

    public function __construct()
    {
        $this->menuModel = new Menu();
    }

    public function index()
    {
        $main = $this->menuModel->main_menu();
        $menus = [];
        foreach ($main as $key => $val) {
            $menus[$key] = $main[$key];
            $menus[$key]['sub'] = $this->menuModel->sub_menu($val['id']);
        }
        $data['menu'] = $menus;
        $data['main'] = $main;
        return view('settings/menu/index', $data);
    }

    public function create()
    {
        // Lakukan Validasi
        $validation = \Config\Services::validation();
        $rules      = ['menu_id' => 'required', 'title' => 'required', 'link' => 'required'];
        $validation->setRules($rules);
        $isDataValid = $validation->withRequest($this->request)->run();

        // Jika Data Valid, Maka Simpan Ke Database
        if ($isDataValid) {
            $this->menuModel->INSERT([
                "menu_id"       => $this->request->getPost('menu_id'),
                "title"         => $this->request->getPost('title'),
                "link"          => $this->request->getPost('link'),
                "icon"          => $this->request->getPost('icon'),
                "menu_level"    => $this->request->getPost('menu_level'),
                "parent_id"     => $this->request->getPost('parent_id'),
                "is_active"     => $this->request->getPost('is_active'),
            ]);
            //session()->setFlashdata('pesan', 'Menu Baru Berhasil Ditambahkan');
            return redirect('setting/menu');
        }
    }

    public function update($id)
    {
        // Lakukan Validasi
        $validation  = \Config\Services::validation();
        $rules       = ['menu_id' => 'required', 'title' => 'required', 'link' => 'required'];
        $validation->setRules($rules);
        $isDataValid = $validation->withRequest($this->request)->run();

        // Jika Data Valid, Maka Simpan Ke Database
        if ($isDataValid) {
            $this->menuModel->update($id, [
                "menu_id"    => $this->request->getPost('menu_id'),
                "title"      => $this->request->getPost('title'),
                "link"       => $this->request->getPost('link'),
                "icon"       => $this->request->getPost('icon'),
                "menu_level" => $this->request->getPost('menu_level'),
                "parent_id"  => $this->request->getPost('parent_id'),
                "is_active"  => $this->request->getPost('is_active'),
            ]);
        }
        session()->setFlashdata('pesan', 'Menu Berhasil Di Edit');
        return redirect('setting/menu');
    }

    public function delete($id)
    {
        $this->menuModel->delete($id);
        session()->setFlashdata('pesan', 'Menu Berhasil Di Delete');
        return redirect('setting/menu');
    }

    public function edit($id)
    {
        $mv = $this->menuModel->find($id);
        return json_encode($mv);
    }
}