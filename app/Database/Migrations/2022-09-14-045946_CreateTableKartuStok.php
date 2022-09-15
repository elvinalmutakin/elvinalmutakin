<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableKartuStok extends Migration
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
            'id_penjualan'   => [
                'type'              => 'INT',
                'constraint'        => '11',
            ],
            'stok_awal'   => [
                'type'              => 'INT',
                'constraint'        => '11',
            ],
            'masuk'   => [
                'type'              => 'INT',
                'constraint'        => '11',
            ],
            'keluar'   => [
                'type'              => 'INT',
                'constraint'        => '11',
            ],
            'stok_akhir'   => [
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
        $this->forge->createTable('kartustok'); 
    }

    public function down()
    {
        $this->forge->dropTable('kartustok');
    }
}
