<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Karya extends Migration
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
			'karya_ids'       => [
					'type'       => 'VARCHAR',
					'constraint' => '16',
			],
			'karya_token'       => [
					'type'       => 'VARCHAR',
					'constraint' => '12',
			],
			'karya_cerpen'       => [
					'type'       => 'VARCHAR',
					'constraint' => '50',
			],
			'karya_carpon'       => [
					'type'       => 'VARCHAR',
					'constraint' => '50',
			],
			'karya_story'       => [
					'type'       => 'VARCHAR',
					'constraint' => '50',
			],
			'karya_artikel'       => [
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
        $this->forge->createTable('karya');
    }

    public function down()
    {
        $this->forge->dropTable('karya');
    }
}
