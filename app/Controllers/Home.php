<?php

namespace App\Controllers;
use App\Models\Menu;

class Home extends BaseController
{
    protected $menuModel;

    public function __construct()
    {
        $this->menuModel = new Menu();
    }

    public function index(){
        // Tracking Data
        // $main = $this->menuModel->main_menu();
        // $menus = [];
        
        // foreach($main as $menu){
        //     $menu['sub'] = $this->menuModel->sub_menu($menu['id']);
        //     $menus[] = $menu;
        // }
        // // $sub = $this->menuModel->sub_menu();
        // dd($menus);
        return view('welcome_message');
    }

    public function hello(){
        return view('Hello World!');
    }

    public function about(){
        return view('about');
    }

    public function contact(){
        return view('contact');
    }

    public function faqs(){
        return view ('faqs');
    }

    // public function news(){
    //     return view('news');
    // }
}
