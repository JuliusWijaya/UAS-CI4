<?php

namespace App\Controllers;

use App\Models\Menu;

class Pages extends BaseController
{
    protected $menuModel;

    public function __construct()
    {
        $this->menuModel = new Menu();
    }

    public function index()
    {
        $data = [
            'title' => 'Home'
        ];
        return view('home', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About'
        ];
        return view('about', $data);
    }

    public function portfolio()
    {
        $data = [
            'title' => 'Portfolio'
        ];
        return view('portfolio', $data);
    }
    
    public function contact()
    {
        $data = [
            'title' => 'Contact'
        ];
        return view('contact', $data);
    }
}