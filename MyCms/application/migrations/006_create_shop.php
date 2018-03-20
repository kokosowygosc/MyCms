<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Shop extends CI_Migration {

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
				'constraint' => 255
				),
			'price' => array(
				'type' => "DOUBLE",
				),
			'options' => array(
				'type' => "VARCHAR",
				'constraint' => 800,
				),
			'qtys' => array(
				'type' => "INT",
				),
		));
		$this->dbforge->add_key('id');

		$this->dbforge->create_table('shop');
	}

	public function down()
	{
		$this->dbforge->drop_table('shop');
	}
}