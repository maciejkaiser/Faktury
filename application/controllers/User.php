<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* User class
*/
class User extends CI_Controller
{
	
	public function index(){
		$title = "User";
		$data = array('title' => $title, 'content' => "Hello User");
		$data['content'] = $this->load->view('user/index', $data, true);
		$this->load->view('layout', $data);
	}

	public function register(){
		$title = "Register";
		$data = array('title' => $title, 'content' => "Hello User");
		$data['content'] = $this->load->view('user/register', $data, true);
		$this->load->view('layout', $data);
	}

	public function login(){
		$title = "Login";
		$data = array('title' => $title, 'content' => "Hello User");
		$data['content'] = $this->load->view('user/login', $data, true);
		$this->load->view('layout', $data);
	}
}
?>