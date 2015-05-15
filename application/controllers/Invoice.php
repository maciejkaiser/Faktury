<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* User class
*/
class Invoice extends CI_Controller
{
	
	public function index(){
		if(($this->session->userdata('user_name')!=""))
		{
			$title = "Invoices";
			$this->load->model('invoicemodel');
			$result = $this->invoicemodel->getUserInvoices($this->session->userdata('user_id'));
			// $result  = null;
			$result == null ? $result = "You haven't any invoices" : $result = $result;
			$data = array('title' => $title, 'content' => "Many many many of them :)", 'invoices' => $result);
			$data['content'] = $this->load->view('invoice/index', $data, true);
			$this->load->view('layout', $data);
		}else{
			redirect('user', 'refresh');
		}
	}

	// public function index(){
	// 	if(($this->session->userdata('user_name')!=""))
	// 	{
	// 		$title = "Your Invoices";
	// 		//$this->load->model('invoicemodel');
	// 		//$result = $this->invoicemodel->all();
	// 		$result  = null;
	// 		$result == null ? $result = "You haven't any invoices" : $result = $result;
	// 		$data = array('title' => $title, 'content' => "Many many many of them :)", 'invoices' => $result);
	// 		$data['content'] = $this->load->view('invoice/index', $data, true);
	// 		$this->load->view('layout', $data);
	// 	}else{
	// 		redirect('user', 'refresh');
	// 	}
	// }
}
?>