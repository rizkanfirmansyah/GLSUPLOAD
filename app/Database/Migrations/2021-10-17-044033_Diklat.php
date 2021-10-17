<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Diklat extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                    'type'           => 'INT',
                    'constraint'     => 5,
                    'unsigned'       => true,
                    'auto_increment' => true,
            ],
            'diklat_ids'       => [
                    'type'       => 'VARCHAR',
                    'constraint' => '16',
            ],
            'diklat_token'       => [
                    'type'       => 'VARCHAR',
                    'constraint' => '12',
            ],
            'diklat_name'       => [
                    'type'       => 'VARCHAR',
                    'constraint' => '100',
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('diklat');
    }

    public function down()
    {
        $this->forge->dropTable('diklat');
    }
}
