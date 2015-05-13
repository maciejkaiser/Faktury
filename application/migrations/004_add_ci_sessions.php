<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_ci_sessions extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'VARCHAR',
				'constraint' => 40,
				'null' => FALSE
			),
			'ip_address' => array(
				'type' => 'VARCHAR',
				'constraint' => '45',
				'null' => FALSE
			),
			'timestamp' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
				'null' => FALSE,
				'constraint' => '10',
				'default' => 0
			),
			'data' => array(
				'type' => 'TEXT',
				'null' => FALSE
			)
		));



		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->add_key('timestamp');
		
		$this->dbforge->create_table('ci_sessions');
	}

	public function down()
	{
		$this->dbforge->drop_table('ci_sessions');
	}
}

?>