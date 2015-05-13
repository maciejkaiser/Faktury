<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* User class
*/
class Home extends CI_Controller
{
	
	public function index(){
		$title = "Home";
		$data = array('title' => $title, 'content' => "Home sweet home");
		$data['content'] = $this->load->view('home/index', $data, true);
		$this->load->view('layout', $data);
	}
}
?>