<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kota extends Migration
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
			'kota_ids'       => [
					'type'       => 'VARCHAR',
					'constraint' => '16',
			],
			'kota_token'       => [
					'type'       => 'VARCHAR',
					'constraint' => '12',
			],
			'kota_nama'       => [
					'type'           => 'VARCHAR',
					'constraint'     => '50',
			],
			'updated_at'        => [
					'type'      => 'datetime',
					'null'      => true,
			],
			'created_at datetime default current_timestamp',
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('kota');
	}

	public function down()
	{
		$this->forge->dropTable('kota');
	}
}
