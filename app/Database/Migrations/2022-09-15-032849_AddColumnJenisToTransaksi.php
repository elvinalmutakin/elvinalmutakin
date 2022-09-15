<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddColumnJenisToTransaksi extends Migration
{
    public function up()
    {
        $fields = [
            'jenis' => [
                'type'          => 'VARCHAR',
                'constraint'    => '20',
            ],
        ];
        $this->forge->addColumn('transaksi', $fields);
    }

    public function down()
    {
        //
    }
}
