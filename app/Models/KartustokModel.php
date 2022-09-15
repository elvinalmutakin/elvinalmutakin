<?php

namespace App\Models;

use CodeIgniter\Model;

class KartustokModel extends Model
{
    protected $table      = 'kartustok';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'id_barang',
        'id_transaksi',
        'stok_awal',
        'masuk',
        'keluar',
        'stok_akhir',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getStokAkhir($keyword = false)
    {
        if ($keyword == false) :
            return $this->findAll();
        endif;
        $this->where(['id_barang' => $keyword]);
        return $this->orderBy('id, created_at','Desc')->first();
    }
}