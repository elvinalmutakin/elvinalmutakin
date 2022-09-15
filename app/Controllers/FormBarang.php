<?php

namespace App\Controllers;

class FormBarang extends BaseController
{
    public function index()
    {
        return view('pages/barang/index');
    }

    public function create(){
        return view('pages/barang/create');
    }

    public function edit($id){
        $barang = $this->barangModel->getbarang($id);
        $data = [
            'id'        => $barang['id'],
            'id_jenis'  => $barang['id_jenis'],
            'nama'      => $barang['nama']
        ];
        return view('pages/barang/edit', $data);
    }
}