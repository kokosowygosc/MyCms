<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Config extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => "INT",
				'constraint' => 10,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
				),
			'option' => array(
				'type' => "VARCHAR",
				'constraint' => 255
				),
			'value' => array(
				'type' => "VARCHAR",
				'constraint' => 255
				),
		));
		$this->dbforge->add_key('id');

		$this->dbforge->create_table('config');

		$data = array(
					array(
						'option' => 'site_name',
						'value' => '',
					),
					array(
						'option' => 'meta_desc',
						'value' => '',
					),
					array(
						'option' => 'front_theme',
						'value' => '',
					),
					array(
						'option' => 'back_theme',
						'value' => '',
					),
					array(
						'option' => 'num_posts',
						'value' => '',
					),
					array(
						'option' => 'num_gal',
						'value' => '',
					),
					array(
						'option' => 'text_foot',
						'value' => '',
					),
					array(
						'option' => 'gallery',
						'value' => '',
					),
					array(
						'option' => 'fb_link',
						'value' => '',
					),
					array(
						'option' => 'tweet_link',
						'value' => '',
					),
					array(
						'option' => 'yt_link',
						'value' => '',
					),
				);
		$this->db->insert_batch('config', $data);

	}

	public function down()
	{
		$this->dbforge->drop_table('config');
	}
}
