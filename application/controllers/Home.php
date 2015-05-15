<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* User class
*/
class Home extends CI_Controller
{
	
	public function index(){
		if(($this->session->userdata('user_name'))){
			redirect('user', 'refresh');
		}else{
			$title = "Home";

			$data = array('title' => $title, 'content' => date("Y-m-d"));
			$data['content'] = $this->load->view('home/index', $data, true);
			$this->load->view('layout', $data);
		}
	}
}
?>