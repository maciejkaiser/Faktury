<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_invoice extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'invoice_id' => array(
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'invoice_user' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
				'constraint' => '5',
			),
			'invoice_firm' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
				'constraint' => '5',
			),
			'invoice_title' => array(
				'type' => 'VARCHAR',
				'constraint' => '100'
			),
			'invoice_cost' => array(
				'type' => 'DECIMAL',
				'constraint' => '5.2'
			),
			'invoice_status' => array(
				'type' => 'INT',
				'constraint' => '5',
				'default' => "0"
			),
		));



		$this->dbforge->add_key('invoice_id', TRUE);
		$this->dbforge->add_key('invoice_user');
		$this->dbforge->add_key('invoice_firm');

		$this->dbforge->create_table('invoice');

		$this->dbforge->add_key_foreign('invoice','invoice_user','user','user_id', 'CASCADE', 'CASCADE');
		$this->dbforge->add_key_foreign('invoice','invoice_firm','firm','firm_id', 'CASCADE', 'CASCADE');
	}

	public function down()
	{
		$this->dbforge->drop_table('invoice');
	}
}

?>