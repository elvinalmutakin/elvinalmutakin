<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ChangeColumnNameOnJenis extends Migration
{
    public function up()
    {
        $fields = [
            'keterangan' => [
                'name'          => 'nama',
                'type'          => 'VARCHAR',
                'constraint'    => '50',
            ],
        ];
        $this->forge->modifyColumn('jenis', $fields);
    }

    public function down()
    {
        //
    }
}
