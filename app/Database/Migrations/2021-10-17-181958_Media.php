<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Media extends Migration
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
			'media_ids'       => [
					'type'       => 'VARCHAR',
					'constraint' => '16',
			],
			'media_token'       => [
					'type'       => 'VARCHAR',
					'constraint' => '12',
			],
			'media_majalah'       => [
					'type'           => 'VARCHAR',
					'constraint'     => '50',
			],
			'media_majalah_2'       => [
					'type'           => 'VARCHAR',
					'constraint'     => '50',
			],
			'media_majalah_3'       => [
					'type'           => 'VARCHAR',
					'constraint'     => '50',
			],
			'media_majalah_4'       => [
					'type'           => 'VARCHAR',
					'constraint'     => '50',
			],
			'media_ssig'       => [
					'type'           => 'VARCHAR',
					'constraint'     => '50',
			],
			'media_ssfb'       => [
					'type'           => 'VARCHAR',
					'constraint'     => '50',
			],
			'media_ssyt'       => [
					'type'           => 'VARCHAR',
					'constraint'     => '50',
			],
			'media_kegiatan_ig'       => [
					'type'           => 'VARCHAR',
					'constraint'     => '50',
			],
			'media_kegiatan_fb'       => [
					'type'           => 'VARCHAR',
					'constraint'     => '50',
			],
			'media_kegiatan_yt'       => [
					'type'           => 'VARCHAR',
					'constraint'     => '50',
			],
			'media_kegiatan_wa'       => [
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
		$this->forge->createTable('media');
	}

	public function down()
	{
		$this->forge->dropTable('media');
	}
}
