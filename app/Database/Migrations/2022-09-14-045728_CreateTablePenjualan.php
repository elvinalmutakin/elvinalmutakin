<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTablePenjualan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => [
                'type'              => 'INT',
                'constraint'        => '11',
                'unsigned'          => true,
                'auto_increment'    => true,
            ],
            'id_barang'   => [
                'type'              => 'INT',
                'constraint'        => '11',
            ],
            'no_transaksi'   => [
                'type'              => 'VARCHAR',
                'constraint'        => '20',
            ],
            'tanggal'   => [
                'type'              => 'DATE',
            ],
            'jumlah'   => [
                'type'              => 'INT',
                'constraint'        => '11',
            ],
            'created_by'    => [
                'type'              => 'VARCHAR',
                'constraint'        => '20',
                'null'              => true,
            ],
            'created_at'    => [
                'type'              => 'DATETIME',
                'null'              => true
            ],
            'updated_by'    => [
                'type'              => 'VARCHAR',
                'constraint'        => '20',
                'null'              => true
            ],
            'updated_at'    => [
                'type'              => 'DATETIME',
                'null'              => true
            ],
            'deleted_by'    => [
                'type'              => 'VARCHAR',
                'constraint'        => '20',
                'null'              => true
            ],
            'deleted_at'    => [
                'type'              => 'DATETIME',
                'null'              => true
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('penjualan');
    }

    public function down()
    {
        $this->forge->dropTable('penjualan');
    }
}
