<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Video extends Migration
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
			'video_ids'       => [
					'type'       => 'VARCHAR',
					'constraint' => '16',
			],
			'video_token'       => [
					'type'       => 'VARCHAR',
					'constraint' => '12',
			],
			'video_link_kegiatan'       => [
                    'type'           => 'VARCHAR',
                    'constraint'     => '255',
			],
			'video_link_cerita'       => [
					'type'       => 'VARCHAR',
					'constraint' => '255',
			],
			'updated_at'        => [
                    'type'      => 'datetime',
                    'null'      => true,
			],
			'created_at datetime default current_timestamp',
        ]);
        // $this->forge->addForeignKey('karya_id','karya','id','CASCADE','CASCADE');
        $this->forge->addKey('id', true);
        $this->forge->createTable('video');
    }

    public function down()
    {
        $this->forge->dropTable('video');
    }//
}
