<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Review extends Migration
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
			'review_ids'       => [
					'type'       => 'VARCHAR',
					'constraint' => '16',
			],
			'review_token'       => [
					'type'       => 'VARCHAR',
					'constraint' => '12',
			],
			'review_category'       => [
					'type'       => 'VARCHAR',
					'constraint' => '50',
			],
			'review_cover'       => [
					'type'       => 'VARCHAR',
					'constraint' => '100',
			],
			'updated_at'        => [
                    'type'      => 'datetime',
                    'null'      => true,
			],
			'created_at datetime default current_timestamp',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('review');
    }

    public function down()
    {
        $this->forge->dropTable('review');
    }
}
