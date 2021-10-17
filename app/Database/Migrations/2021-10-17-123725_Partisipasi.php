<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Partisipasi extends Migration
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
			'partisipasi_ids'       => [
					'type'       => 'VARCHAR',
					'constraint' => '16',
			],
			'partisipasi_token'       => [
					'type'       => 'VARCHAR',
					'constraint' => '12',
			],
			'partisipasi_pameran'       => [
					'type'       => 'VARCHAR',
					'constraint' => '50',
			],
			'partisipasi_festival'       => [
					'type'       => 'VARCHAR',
					'constraint' => '50',
			],
			'partisipasi_kemah'       => [
					'type'       => 'VARCHAR',
					'constraint' => '50',
			],
			'partisipasi_tantangan'       => [
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
        $this->forge->createTable('partisipasi');
    }

    public function down()
    {
        $this->forge->dropTable('partisipasi');
    }
}
