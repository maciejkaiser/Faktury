<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* User class
*/
class User extends CI_Controller
{
	
	/**
	* index
	*/
	public function index(){
		if(($this->session->userdata('user_name')!=""))
		{
			$this->load->model('invoicemodel');
			$q = $this->invoicemodel->countInvoices($this->session->userdata('user_id'));

			$title = "User ".$this->session->userdata('user_name');
			$data = array('title' => $title, 'content' => "Hello User");

			if($q){
				$data['count'] = count($q);
			}else{
				$data['count'] = 0;
			}
			
			$data['content'] = $this->load->view('user/index', $data, true);
			$this->load->view('layout', $data);
		}else{
			$this->login();
		}
	}
	/**
	* register
	*/
	public function register($msg = ""){
		$title = "Register";
		$data = array('title' => $title, 'content' => "Hello User", 'message' => $msg);
		$data['content'] = $this->load->view('user/register', $data, true);
		$this->load->view('layout', $data);
	}
	/**
	* login
	*/
	public function login($msg = ""){

		$title = "Login";
		$data = array('title' => $title, 'content' => "Hello User", 'message' => $msg);
		$data['content'] = $this->load->view('user/login', $data, true);
		$this->load->view('layout', $data);

	}
	/**
	* logout
	*/
	public function logout()
	{
		$newdata = array(
			'user_id'   =>'',
			'user_name'  =>'',
			'logged_in' => FALSE,
			);
		$this->session->unset_userdata($newdata);
		$this->session->sess_destroy();
		redirect('/home/', 'refresh');
	}
	/**
	* loginUser
	*/
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
			$msg = "Invalid username or password";
			$this->login($msg);
		}        
	}
	/**
	* registerUser
	*/
	public function registerUser()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('user_name', 'Name', 'trim|required|min_length[4]|xss_clean');
		$this->form_validation->set_rules('user_password', 'Pass', 'trim|required|matches[user_password_confirm]');
		$this->form_validation->set_rules('user_password_confirm', 'Confirm Pass', 'trim|required|min_length[4]|max_length[32]');


		if($this->form_validation->run() == FALSE)
		{
			$msg = "Invalid username or password!";
			$this->register($msg);
		}
		else
		{
			$this->load->model('usermodel');
			 $data=array(
	            'user_name'=> $this->input->post('user_name'),
	            'user_password'=> md5($this->input->post('user_password'))
            );

			$result = $this->usermodel->register($data);

			if($result){
				$msg = "Registration succesfull!";
				$this->login($msg);
			}else{
				$msg = "User already exist!";
				$this->register($msg);
			}
		}
	}
	/**
	* delete
	*/
	public function delete(){
		if(($this->session->userdata('user_name')!=""))
		{
			$title = "Delete user ".$this->session->userdata('user_name');
			$data = array('title' => $title, 'content' => "Are you sure to delete an account?");
			$data['content'] = $this->load->view('user/delete', $data, true);
			$this->load->view('layout', $data);
		}else{
			$this->login();
		}
	}
	/**
	* deleteConfirm
	*/
	public function deleteConfirm($user_id = 0){
		if(($this->session->userdata('user_name')!=""))
		{
			$this->load->model('usermodel');
			$this->usermodel->delete((int)$user_id);
			$this->logout();
			
		}else{
			$this->login();
		}
	}
	/**
	* actions
	*/
	public function actions(){
		if(($this->session->userdata('user_name')!=""))
		{
			$title = "Actions : ".$this->session->userdata('user_name');
			$data = array('title' => $title);
			$data['content'] = $this->load->view('user/actions', $data, true);
			$this->load->view('layout', $data);
		}else{
			$this->login();
		}
	}
	/**
	* settings
	*/
	public function settings(){
		if(($this->session->userdata('user_name')!=""))
		{
			$title = "Settings : ".$this->session->userdata('user_name');
			$data = array('title' => $title);
			$data['content'] = $this->load->view('user/settings', $data, true);
			$this->load->view('layout', $data);
		}else{
			$this->login();
		}
	}

}
?>