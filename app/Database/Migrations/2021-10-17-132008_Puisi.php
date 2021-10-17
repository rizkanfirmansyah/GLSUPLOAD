<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Puisi extends Migration
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
			'puisi_ids'       => [
					'type'       => 'VARCHAR',
					'constraint' => '16',
			],
			'puisi_token'       => [
					'type'       => 'VARCHAR',
					'constraint' => '12',
			],
			'karya_id'       => [
                    'type'           => 'INT',
                    'constraint'     => 5,
			],
			'puisi_naskah'       => [
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
        $this->forge->createTable('puisi');
    }

    public function down()
    {
        $this->forge->dropTable('puisi');
    }
}
