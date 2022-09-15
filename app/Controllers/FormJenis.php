<?php

namespace App\Controllers;

class FormJenis extends BaseController
{
    public function index()
    {
        return view('pages/jenis/index');
    }

    public function create(){
        return view('pages/jenis/create');
    }

    public function edit($id){
        $jenis = $this->model->getJenisById($id);
        $data = [
            'id'    => $jenis['id'],
            'nama'  => $jenis['nama']
        ];
        return view('pages/jenis/edit', $data);
    }
}