<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\TransaksiModel;

class Laporan extends ResourceController
{
    use ResponseTrait;

    protected $model;

    public function __construct() {
        $this->model = new TransaksiModel();
    }
    
    public function index()
    {
        $data = $this->model->getTransaksi();
        return $this->respond($data, 200);
    }

    //Menampilkan data spesifik berdasarkan ID
    public function show($id = null)
    {
        $data = $this->model->Where(['id' => $id])->first();
        if($data){
            return $this->respond($data);
        }else{
            return $this->failNotFound('No Data Found with id '.$id);
        }
    }

    //Mencari data berdasarkan keyword
    public function search($startdate, $enddate, $id_barang)
    {
        $startdate = date('Y-m-d', strtotime($startdate));
        $enddate = date('Y-m-d', strtotime($enddate));
        $data = $this->model->getlaporanbyparameter($startdate, $enddate, $id_barang);
        if($data){
            return $this->respond($data);
        }else{
            return $this->failNotFound('No Data Found');
        }
    }

    public function search2($startdate, $enddate)
    {
        $startdate = date('Y-m-d', strtotime($startdate));
        $enddate = date('Y-m-d', strtotime($enddate));
        $data = $this->model->getlaporan2byparameter($startdate, $enddate);
        if($data){
            return $this->respond($data);
        }else{
            return $this->failNotFound('No Data Found');
        }
    }

    //Menyimpan data
    public function create()
    {
        $data = [
            'keterangan' => $this->request->getPost('keterangan'),
        ];
        $this->model->save($data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Data Saved'
            ]
        ];
        return $this->respondCreated($data, 201);
    }

    //Mengubah data
    public function update($id = null)
    {
        $json = $this->request->getJSON();
        if($json){
            $data = [
                'keterangan' => $json->keterangan
            ];
        }else{
            $input = $this->request->getRawInput();
            $data = [
                'keterangan' => $input['keterangan']
            ];
        }
        $this->model->update($id, $data);
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Data Updated'
            ]
        ];
        return $this->respond($response);
    }

    //Menghapus data
    public function delete($id = null)
    {
        $data = $model->find($id);
        if($data){
            $this->model->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Data Deleted'
                ]
            ];
            return $this->respondDeleted($response);
        }else{
            return $this->failNotFound('No Data Found with id '.$id);
        }
    }
}