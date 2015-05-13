<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* User class
*/
class User extends CI_Controller
{
	
	public function index(){
		if(($this->session->userdata('user_name')!=""))
		{
			$title = "User ".$this->session->userdata('user_name');
			$data = array('title' => $title, 'content' => "Hello User");
			$data['content'] = $this->load->view('user/index', $data, true);
			$this->load->view('layout', $data);
		}else{
			$this->login();
		}
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

	public function logout()
	{
		$newdata = array(
			'user_id'   =>'',
			'user_name'  =>'',
			'logged_in' => FALSE,
			);
		$this->session->unset_userdata($newdata);
		$this->session->sess_destroy();
		redirect('/user/', 'refresh');
	}

	public function loginUser()
	{
		$this->load->model('usermodel');
		$name = $this->input->post('user_name');
		$password = md5($this->input->post('user_password'));

		$result  = $this->usermodel->login($name,$password);
		if($result)
		{
			redirect('/user/', 'refresh');
		}
		else
		{
			redirect('/user/login', 'refresh');
		}        
	}

	public function registerUser()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('user_name', 'Name', 'trim|required|min_length[4]|xss_clean');
		$this->form_validation->set_rules('user_password', 'Pass', 'trim|required|min_length[4]|max_length[32]');

		if($this->form_validation->run() == FALSE)
		{
			redirect('/user/', 'refresh');
		}
		else
		{
			$this->load->model('usermodel');
			$this->usermodel->add_user();
			redirect('/user/', 'refresh');
		}
	}

}
?>