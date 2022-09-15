<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ChangeColumnNameOnKartuStok extends Migration
{
    public function up()
    {
        $fields = [
            'id_penjualan' => [
                'name' => 'id_transaksi',
                'type' => 'INT',
            ],
        ];
        $this->forge->modifyColumn('kartustok', $fields);
    }

    public function down()
    {
        //
    }
}
