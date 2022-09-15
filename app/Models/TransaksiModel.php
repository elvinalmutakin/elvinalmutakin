<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table      = 'transaksi';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'id_barang',
        'tanggal',
        'jenis',
        'no_transaksi',
        'jumlah',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getIdByNoTransaksi($keyword = false)
    {
        if ($keyword == false){
            return $this->findAll();
        }
        return $this->where(['no_transaksi' => $keyword])->first();
    }

    public function getTransaksi($keyword = false)
    {
        $this->select('transaksi.*, jenis.nama jenis_barang, barang.nama barang, (select stok_akhir from kartustok where id_barang=barang.id and id_transaksi=transaksi.id order by id, id_transaksi desc limit 1) stok_akhir');
        $this->table('transaksi');
        $this->join('barang', 'transaksi.id_barang = barang.id', 'left');
        $this->join('jenis', 'barang.id_jenis = jenis.id', 'left');
        if ($keyword == false){
            return $this->findAll();
        }
        return $this->where(['no_transaksi' => $keyword])->first();
    }

    public function getlaporanbyparameter($startdate, $enddate, $id_barang){
        $startdate = date('Y-m-d', strtotime($startdate));
        $enddate = date('Y-m-d', strtotime($enddate));
        $this->select('transaksi.*, jenis.nama jenis_barang, barang.nama barang, (select stok_akhir from kartustok where id_barang=barang.id and id_transaksi=transaksi.id order by id, id_transaksi desc limit 1) stok_akhir');
        $this->table('transaksi');
        $this->join('barang', 'transaksi.id_barang = barang.id', 'left');
        $this->join('jenis', 'barang.id_jenis = jenis.id', 'left');
        $this->where('transaksi.tanggal >=', $startdate);
        $this->where('transaksi.tanggal <=', $enddate);
        if($id_barang!=="Semua Barang" && $id_barang!=="" && $id_barang!==null){
            $this->where('transaksi.id_barang', $id_barang);
        }
        $this->orderBy('transaksi.created_at, barang.nama', 'asc');
        return $this->findAll();
    }

    public function getlaporan2byparameter($startdate, $enddate){
        $startdate = date('Y-m-d', strtotime($startdate));
        $enddate = date('Y-m-d', strtotime($enddate));
        $this->select('transaksi.id_barang, barang.nama barang, sum(transaksi.jumlah) total_jual, jenis.nama jenis_barang');
        $this->table('transaksi');
        $this->join('barang', 'transaksi.id_barang = barang.id', 'left');
        $this->join('jenis', 'barang.id_jenis = jenis.id', 'left');
        $this->where('transaksi.tanggal >=', $startdate);
        $this->where('transaksi.tanggal <=', $enddate);
        $this->where('transaksi.jenis','Penjualan');
        $this->groupBy('transaksi.id_barang');
        $this->orderBy('sum(transaksi.jumlah)', 'desc');
        return $this->findAll();
    }
}