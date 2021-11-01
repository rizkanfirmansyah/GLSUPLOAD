<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class NewTable extends Migration
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
				'assestment_ids'       => [
						'type'       => 'VARCHAR',
						'constraint' => '16',
				],
				'assestment_token'       => [
						'type'       => 'VARCHAR',
						'constraint' => '12',
				],
				'assestment_jenis'       => [
						'type'           => 'VARCHAR',
						'constraint'     => '50',
				],
				'assestment_analisa'       => [
						'type'       => 'VARCHAR',
						'constraint' => '50',
				],
				'updated_at'        => [
						'type'      => 'datetime',
						'null'      => true,
				],
				'created_at datetime default current_timestamp',
		]);
		// $this->forge->addForeignKey('karya_id','karya','id','CASCADE','CASCADE');
		$this->forge->addKey('id', true);
		$this->forge->createTable('assestment');
	}

	public function down()
	{
			$this->forge->dropTable('assestment');
	}
}
