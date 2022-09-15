<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\BarangModel;

class Barang extends ResourceController
{
    use ResponseTrait;
    
    protected $model;

    public function __construct() {
        $this->model = new BarangModel();
    }

    //Menampilkan seluruh data
    public function index()
    {
        $data = $this->model->getbarang();
        return $this->respond($data, 200);
    }

    //Menampilkan data spesifik berdasarkan ID
    public function show($id = null)
    {
        $data = $this->model->where(['id' => $id])->first();
        if($data){
            return $this->respond($data);
        }else{
            return $this->failNotFound('No Data Found with id '.$id);
        }
    }

    //Mencari data berdasarkan keyword
    public function search($keyword = null)
    {
        $data = $this->model->Like(['nama' => $keyword])->findAll();
        if($data){
            return $this->respond($data);
        }else{
            return $this->failNotFound('No Data Found with keyword '.$keyword);
        }
    }

    //Menyimpan data
    public function create()
    {
        $nama="";
        $id_jenis="";
        $postdata = json_decode(file_get_contents('php://input'), TRUE);
        if (isset($postdata['barang'])){
            $nama = $postdata['barang']['nama'];
            $id_jenis = $postdata['barang']['id_jenis'];
        }
        $data = [
            'id_jenis' => $id_jenis,
            'nama' => $nama,
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
        $id_jenis="";
        $nama="";
        $json = $this->request->getJSON();
        if($json){
            $data = [
                'id_jenis' => $json->id_jenis,
                'nama' => $json->nama
            ];
        }else{
            $input = $this->request->getRawInput();
            $data = [
                'id_jenis' =>  $input['id_jenis'],
                'nama' => $input['nama']
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
        $data = $this->model->find($id);
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