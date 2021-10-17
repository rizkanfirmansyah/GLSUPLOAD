<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Diorama extends Migration
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
			'diorama_ids'       => [
					'type'       => 'VARCHAR',
					'constraint' => '16',
			],
			'diorama_token'       => [
					'type'       => 'VARCHAR',
					'constraint' => '12',
			],
			'diorama_first'       => [
					'type'       => 'VARCHAR',
					'constraint' => '50',
			],
			'diorama_last'       => [
					'type'       => 'VARCHAR',
					'constraint' => '50',
			],
			'updated_at'        => [
                    'type'      => 'datetime',
                    'null'      => true,
			],
			'created_at datetime default current_timestamp',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('diorama');
    }

    public function down()
    {
        $this->forge->dropTable('diorama');
    }
}
