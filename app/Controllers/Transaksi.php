<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\TransaksiModel;
use App\Models\KartustokModel;

class Transaksi extends ResourceController
{
    use ResponseTrait;

    protected $model;
    protected $model_2;

    public function __construct() {
        $this->model = new TransaksiModel();
        $this->model_2 = new KartustokModel();
    }
    
    //Menampilkan seluruh data
    public function index()
    {
        $data = $this->model->findAll();
        return $this->respond($data, 200);
    }

    //Menampilkan data spesifik berdasarkan ID
    public function show($id = null)
    {
        $data = $this->model->Where(['no_transaksi' => $id])->first();
        if($data){
            return $this->respond($data);
        }else{
            return $this->failNotFound('No Data Found with id '.$id);
        }
    }

    //Mencari data berdasarkan keyword
    public function search($keyword = null)
    {
        $data = $this->model->Like(['no_transaksi' => $keyword])->findAll();
        if($data){
            return $this->respond($data);
        }else{
            return $this->failNotFound('No Data Found with keyword '.$keyword);
        }
    }

    //Menyimpan data
    public function create()
    {
        $jumlah = 0;
        $stok_akhir = 0;
        $stok_awal = 0;
        $masuk = 0;
        $keluar = 0;
        $no_transaksi = uniqid();
        $id_barang = "";
        $tanggal = "";
        $jenis="";

        $postdata = json_decode(file_get_contents('php://input'), TRUE);
        if (isset($postdata['transaksi'])){
            $id_barang = $postdata['transaksi']['id_barang'];
            $jumlah = $postdata['transaksi']['jumlah'];
            $jenis = $postdata['transaksi']['jenis'];
            $tanggal = date('Y-m-d'); //date('Y-m-d', strtotime($postdata['transaksi']['tanggal']));
            if($jenis=="Pembelian"){
                $masuk = $postdata['transaksi']['jumlah'];
            }else{
                $keluar = $postdata['transaksi']['jumlah'];
            }
        }
        //Simpan Transaksi
        $data = [
            'no_transaksi'  => $no_transaksi,
            'tanggal'       => $tanggal,
            'jumlah'        => $jumlah,
            'jenis'         => $jenis,
            'id_barang'     => $id_barang
        ];
        $this->model->save($data);
        //Get ID Transaksi
        $transaksi = $this->model->getIdByNoTransaksi($no_transaksi);
        $id_transaksi = $transaksi['id'];
        //Get Stok Akhir
        $kartustok = $this->model_2->getStokAkhir($id_barang);
        if($kartustok){
            $stok_awal = $kartustok['stok_akhir'];
        }
        $stok_akhir = $stok_awal + $masuk - $keluar;
        $data2 = [
            'id_transaksi'  => $id_transaksi,
            'id_barang'     => $id_barang,
            'stok_awal'     => $stok_awal,
            'masuk'         => $masuk,
            'keluar'        => $keluar,
            'stok_akhir'    => $stok_akhir
        ];
        $this->model_2->save($data2);
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
        //
    }

    //Menghapus data
    public function delete($id = null)
    {
        //
    }
}