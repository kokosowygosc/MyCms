<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Pages extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => "INT",
				'constraint' => 10,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
				),
			'title' => array(
				'type' => "VARCHAR",
				'constraint' => 255
				),
			'alias' => array(
				'type' => "VARCHAR",
				'constraint' => 255
				),
			'content' => array(
				'type' => "VARCHAR",
				'constraint' => 2000,
				),
			'order' => array(
				'type' => 'INT',
				'constrain' => 10,
				),
		));
		$this->dbforge->add_key('id');

		$this->dbforge->create_table('pages');
	}

	public function down()
	{
		$this->dbforge->drop_table('pages');
	}
}