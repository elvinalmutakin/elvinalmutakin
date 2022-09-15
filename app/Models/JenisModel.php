<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisModel extends Model
{
    protected $table      = 'jenis';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'nama',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getJenis($keyword = false)
    {
        if ($keyword == false){
            return $this->findAll();
        }
        return $this->where(['nama' => $keyword])->first();
    }

    public function getJenisById($keyword = false){
        if ($keyword == false){
            return $this->findAll();
        }
        return $this->where(['id' => $keyword])->first();
    }
}