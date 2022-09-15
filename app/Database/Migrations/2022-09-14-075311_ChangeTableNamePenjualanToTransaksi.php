<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ChangeTableNamePenjualanToTransaksi extends Migration
{
    public function up()
    {
        $this->forge->renameTable('penjualan', 'transaksi');
    }

    public function down()
    {
        //
    }
}
