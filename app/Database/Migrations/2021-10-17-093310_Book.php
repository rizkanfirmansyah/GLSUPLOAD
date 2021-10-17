<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Book extends Migration
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
			'book_ids'       => [
					'type'       => 'VARCHAR',
					'constraint' => '16',
			],
			'book_token'       => [
					'type'       => 'VARCHAR',
					'constraint' => '12',
			],
			'book_author'       => [
					'type'       => 'VARCHAR',
					'constraint' => '50',
			],
			'book_publisher'       => [
					'type'       => 'VARCHAR',
					'constraint' => '40',
			],
			'book_year'       => [
					'type'       => 'VARCHAR',
					'constraint' => '4',
			],
			'book_page'       => [
					'type'       => 'VARCHAR',
					'constraint' => '4',
			],
			'book_cover'       => [
					'type'       => 'VARCHAR',
					'constraint' => '100',
			],
			'updated_at' => [
					'type' => 'datetime',
					'null' => true,
			],
			'created_at datetime default current_timestamp',
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('book');
	}

	public function down()
	{
		$this->forge->dropTable('book');
	}
}