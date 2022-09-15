<?php

namespace App\Controllers;

class FormLaporan extends BaseController
{
    public function index()
    {
        return view('pages/laporan/index');
    }

    public function index2()
    {
        return view('pages/laporan/index2');
    }
}