<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_invoice_file_column extends CI_Migration {

	public function up()
	{
		$fields = array('invoice_file' => array('type' => 'VARCHAR', 'constraint' => '200'));
		$this->dbforge->add_column('invoice', $fields);

	}

	public function down()
	{
		$this->dbforge->drop_column('invoice', 'invoice_file');
	}
}

?>