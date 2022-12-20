<?php

namespace App\Controllers;

class pages extends BaseController
{
    public function index()
    {
        return view('pages/home');
    }
    public function about()
    {
        return view('pages/about');
    }
    public function kontak()
    {
        return view('pages/kontak');
    }
    public function v_konsultasi()
    {
        return view('pages/v_konsultasi');
    }
    public function hasil_diagnosa()
    {
        return view('pages/hasil_diagnosa');
    }
    public function info()
    {
        return view('pages/info');
    }
}
