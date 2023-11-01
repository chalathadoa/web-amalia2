<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Santriwati extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_santri' => [
                'type'           => 'INT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nis' => [
                'type'       => 'INT',
                'constraint' => '20',
            ],
            'nama_santri' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'jurusan_santri' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'tahun_masuk' => [
                'type' => 'year',
                'constraint' => '4',
            ],
            'hafalan_santri' => [
                'type' => 'VARCHAR',
                'constraint' => '10',
                'null' => true,
            ],
            'foto_santri' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'alamat_santri' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'angkatan_santri' => [
                'type' => 'INT',
                'constraint' => '5',
            ],
            'wali_santri' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'noHp_santri' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],

        ]);
        $this->forge->addKey('id_santri', true);
        $this->forge->createTable('santriwati');
    }

    public function down()
    {
        $this->forge->dropTable('santriwati');
    }
}
