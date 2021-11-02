<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Antologi extends Migration
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
			'antologi_ids'       => [
				'type'       => 'VARCHAR',
				'constraint' => '16',
			],
			'antologi_token'       => [
					'type'       => 'VARCHAR',
					'constraint' => '12',
			],
			'antologi_cover'       => [
					'type'           => 'VARCHAR',
					'constraint'     => '50',
			],
			'antologi_judul'       => [
					'type'       => 'VARCHAR',
					'constraint' => '50',
			],
			'antologi_author'       => [
					'type'       => 'VARCHAR',
					'constraint' => '50',
			],
			'antologi_category'       => [
					'type'       => 'VARCHAR',
					'constraint' => '50',
			],
			'antologi_peserta'       => [
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
		$this->forge->createTable('antologi');
	}

	public function down()
	{
		$this->forge->dropTable('antologi');
	}
}
