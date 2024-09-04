<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        return 'Selamat Datang';
    }
    public function about(){
        return 'Nairsya Syauqi Ghasila - 2241760076';
    }
    public function articles($id){
        return 'Halaman Artikel dengan ID:'. $id;
    }
}
