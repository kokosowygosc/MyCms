<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Order extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => "INT",
				'constraint' => 10,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
				),
			'id_sprzedawcy' => array(
				'type' => "INT",
				'constraint' => 10,
				),
			'status_transakcji' => array(
				'type' => "VARCHAR",
				'constraint' => 255
				),
			'id_transakcji' => array(
				'type' => "VARCHAR",
				'constraint' => 500
				),
			'kwota_transakcji' => array(
				'type' => "VARCHAR",
				'constraint' => 255
				),
			'kwota_zaplacona' => array(
				'type' => "VARCHAR",
				'constraint' => 255
				),
			'blad' => array(
				'type' => "VARCHAR",
				'constraint' => 255
				),
			'data_transakcji' => array(
				'type' => "VARCHAR",
				'constraint' => 255
				),
			'opis_transakcji' => array(
				'type' => "VARCHAR",
				'constraint' => 255
				),
			'ciag_pomocniczy' => array(
				'type' => "VARCHAR",
				'constraint' => 255
				),
			'email_klienta' => array(
				'type' => "VARCHAR",
				'constraint' => 255
				),
			'suma_kontrolna' => array(
				'type' => "VARCHAR",
				'constraint' => 255
				),
		));
		$this->dbforge->add_key('id');

		$this->dbforge->create_table('order');
	}

	public function down()
	{
		$this->dbforge->drop_table('order');
	}
}