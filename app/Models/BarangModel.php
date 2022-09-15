<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table      = 'barang';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'nama',
        'id_jenis',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getbarang($keyword = false){
        $this->select('barang.id, barang.id_jenis, barang.nama, jenis.nama jenis');
        $this->table('barang');
        $this->join('jenis', 'barang.id_jenis = jenis.id', 'left');
        if ($keyword == false){
            return $this->findAll();
        }
        return $this->where(['barang.id' => $keyword])->first();
    }
}