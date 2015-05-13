<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_firm extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'firm_id' => array(
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'firm_name' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
		));

		$this->dbforge->add_key('firm_id', TRUE);
		$this->dbforge->create_table('firm');
	}

	public function down()
	{
		$this->dbforge->drop_table('firm');
	}
}

?>