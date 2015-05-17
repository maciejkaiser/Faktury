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
			$data = array('title' => $title, 'invoices' => $result);
			$data['content'] = $this->load->view('invoice/index', $data, true);
			$this->load->view('layout', $data);
		}else{
			redirect('user', 'refresh');
		}
	}

	public function show($invoice_id = 0){
		if(($this->session->userdata('user_name')!=""))
		{
			$this->load->model('invoicemodel');
			$query = $this->invoicemodel->getInvoice($invoice_id);
			foreach ($query as $key => $value) {
				$data['invoice_id'] = $value->invoice_id;
				$data['user_id']	= $value->user_id;
				$data['firm_id']	= $value->firm_id;
				$data['firm_name'] = $value->firm_name;
				$data['invoice_title'] = $value->invoice_title;
				$data['invoice_cost'] = $value->invoice_cost;
				$data['invoice_status'] = $value->invoice_status;
				$data['invoice_file'] = $value->invoice_file;
			}

			$data['content'] = $this->load->view('invoice/show', $data, true);
			$this->load->view('layout', $data);
		}else{
			redirect('user', 'refresh');
		}
	}

	public function add(){
		if(($this->session->userdata('user_name')!=""))
		{
			$this->load->model('invoicemodel');
			$firms = $this->invoicemodel->getFirms();
			$data = array('firms' =>$firms);
			$data['content'] = $this->load->view('invoice/add', $data, true);
			$this->load->view('layout', $data);
		}else{
			redirect('user', 'refresh');
		}
	}

	public function addInvoice()
	{
		$this->load->model('invoicemodel');

		$user = $this->session->userdata('user_id');
		$firm = $this->input->post('invoice_firm');
		$name = $this->input->post('invoice_name');
		$cost = $this->input->post('invoice_cost');

		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'pdf|jpg|png';
		$config['max_size'] = 1024 * 8;
        $config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);
		
 
        if (!$this->upload->do_upload('invoice_file'))
        {
           echo $this->upload->display_errors('', '');
        }
        else
        {
            $data = $this->upload->data();
            $invoice_file = $data['file_name'];

            $invoice = array(
            	'invoice_user' => $user, 
            	'invoice_firm' => $firm,
            	'invoice_title' => $name,
            	'invoice_cost' => $cost,
            	'invoice_file' => $invoice_file
            	);

            $result = $this->invoicemodel->addInvoice($invoice);

			if($result)
			{
				redirect('/invoice/', 'refresh');
			}
			else
			{
				redirect('/invoice/', 'refresh');
			}       
        } 
	}

	public function download($user_id = 0, $invoice_file = null){
	if($this->session->userdata('user_id')===$user_id)
		{
			//download
			header ( 'Content-type: application/pdf' );
			header ( 'Content-Disposition: inline; filename="faktura"' );
			echo file_get_contents('./uploads/'.$invoice_file);
		}else{
			echo "You have no permission";
			//redirect('invoice', 'refresh');
		}
	}

	public function edit($invoice_id = 0){
	if(($this->session->userdata('user_name')!=""))
		{
			$this->load->model('invoicemodel');
			$data['firms'] = $this->invoicemodel->getFirms();

			$query = $this->invoicemodel->getInvoice((int)$invoice_id);

			foreach ($query as $key => $value) {
				$data['invoice_id'] = $value->invoice_id;
				$data['user_id']	= $value->user_id;
				$data['firm_id']	= $value->firm_id;
				$data['firm_name'] = $value->firm_name;
				$data['invoice_title'] = $value->invoice_title;
				$data['invoice_cost'] = $value->invoice_cost;
				$data['invoice_status'] = $value->invoice_status;
				$data['invoice_file'] = $value->invoice_file;
			}

			$data['content'] = $this->load->view('invoice/edit', $data, true);
			$this->load->view('layout', $data);
		}else{
			redirect('invoice', 'refresh');
		}
	}

	public function editInvoice()
	{
		$this->load->model('invoicemodel');

		$invoice_id = $this->input->post('invoice_id');
		$user = $this->session->userdata('user_id');
		$firm = $this->input->post('invoice_firm');
		$name = $this->input->post('invoice_name');
		$cost = $this->input->post('invoice_cost');


        $invoice = array(
        	'invoice_user' => $user, 
        	'invoice_firm' => $firm,
        	'invoice_title' => $name,
        	'invoice_cost' => $cost
        	);

        $result = $this->invoicemodel->editInvoice($invoice_id, $invoice);

		if($result)
		{
			redirect('/invoice/', 'refresh');
		}
		else
		{
			redirect('/invoice/', 'refresh');
		}       
       
	}

	public function pay($invoice_id = 0){
		if(($this->session->userdata('user_id')))
		{
			$this->load->model('invoicemodel');
			$this->invoicemodel->pay($invoice_id);
			redirect('invoice', 'refresh');
		}else{
			redirect('invoice', 'refresh');
		}
	}

	public function delete($invoice_id = 0){
		if(($this->session->userdata('user_name')!=""))
		{
			$title = "Delete invoice";
			$data = array('invoice_id' => $invoice_id, 'title' => $title, 'content' => "Are you sure to delete this invoice?");
			$data['content'] = $this->load->view('invoice/delete', $data, true);
			$this->load->view('layout', $data);
		}else{
			redirect('user', 'refresh');
		}
	}

	public function deleteConfirm($user_id = 0, $invoice_id = 0){
		if(($this->session->userdata('user_id')=== $user_id))
		{
			$this->load->model('invoicemodel');
			$q = $this->invoicemodel->getInvoice($invoice_id);
			$invoice_file = $q[0]->invoice_file;

			$result = $this->invoicemodel->deleteInvoice($invoice_id);
			if($result){
				unlink('./uploads/' . $invoice_file);
			}
			redirect('invoice', 'refresh');
		}else{
			redirect('invoice', 'refresh');
		}
	}
}
?>