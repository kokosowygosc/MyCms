<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Users extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => "INT",
				'constraint' => 10,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
				),
			'name' => array(
				'type' => "VARCHAR",
				'constraint' => 50
				),
			'email' => array(
				'type' => "VARCHAR",
				'constraint' => 50
				),
			'password' => array(
				'type' => "VARCHAR",
				'constraint' => 90,
				),
			'dostep' => array(
				'type' => 'VARCHAR',
				'constraint' => 10,
				),
			'conf' => array(
				'type' => "TINYINT",
				'constraint' => 1,
				),
			'names' => array(
				'type' => "VARCHAR",
				'constraint' => 50,
				),
			'names1' => array(
				'type' => "VARCHAR",
				'constraint' => 50,
				),
			'place' => array(
				'type' => "VARCHAR",
				'constraint' => 30,
				),
			'number' => array(
				'type' => "VARCHAR",
				'constraint' => 10,
				),
			'code' => array(
				'type' => "VARCHAR",
				'constraint' => 10,
				),
			'post' => array(
				'type' => "VARCHAR",
				'constraint' => 20,
				),
			'phone' => array(
				'type' => "INT",
				'constraint' => 24,
				),
			'extra' => array(
				'type' => "VARCHAR",
				'constraint' => 255,
				),
		));
		$this->dbforge->add_key('id');

		$this->dbforge->create_table('users');
	}

	public function down()
	{
		$this->dbforge->drop_table('users');
	}
}