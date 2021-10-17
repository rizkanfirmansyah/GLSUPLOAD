<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pantun extends Migration
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
			'pantun_ids'       => [
					'type'       => 'VARCHAR',
					'constraint' => '16',
			],
			'pantun_token'       => [
					'type'       => 'VARCHAR',
					'constraint' => '12',
			],
			'karya_id'       => [
                    'type'           => 'INT',
                    'constraint'     => 5,
			],
			'pantun_naskah'       => [
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
        $this->forge->createTable('pantun');
    }

    public function down()
    {
        $this->forge->dropTable('pantun');
    }
}
