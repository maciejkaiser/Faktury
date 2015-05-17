<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* User class
*/
class Firm extends CI_Controller
{
	
	public function index(){
		if(($this->session->userdata('user_name'))){
			$this->load->model('firmmodel');
			$title = "Firms";
			$data = array('title' => $title);
			$data['firms'] = $this->firmmodel->all();
			$data['content'] = $this->load->view('firm/index', $data, true);
			$this->load->view('layout', $data);
		}else{
			redirect('user', 'refresh');
		}
	}

	public function add(){
		if(($this->session->userdata('user_name'))){
			$this->load->model('firmmodel');
			$title = "Firms";
			$data = array('title' => $title);
			$data['firms'] = $this->firmmodel->all();
			$data['content'] = $this->load->view('firm/add', $data, true);
			$this->load->view('layout', $data);
		}else{
			redirect('user', 'refresh');
		}
	}

	public function addFirm()
	{
		$this->load->model('firmmodel');

		$firm_name = $this->input->post('firm_name');
		
			$data = array('firm_name' => $firm_name );

            $result = $this->firmmodel->add($data);

			if($result)
			{
				redirect('/firm/', 'refresh');
			}
			else
			{
				redirect('/firm/', 'refresh');
			}       
	}

	public function edit($firm_id = 0){
		if($this->session->userdata('user_name')){
			if($firm_id){
				$this->load->model('firmmodel');
				$title = "Edit firm";
				$data = array('title' => $title);

				$firm = $this->firmmodel->getFirm($firm_id);

				foreach ($firm as $key => $value) {
					$data['firm_name'] = $value->firm_name;
				}

				$data['firm_id'] = $firm_id;

				
				$data['content'] = $this->load->view('firm/edit', $data, true);
				$this->load->view('layout', $data);
			}
			
		}else{
			redirect('user', 'refresh');
		}
	}

	public function editFirm(){
		if(($this->session->userdata('user_name'))){
			$this->load->model('firmmodel');
			
			$firm_id = $this->input->post('firm_id');
			$firm_name = $this->input->post('firm_name');


        	$result = $this->firmmodel->editFirm($firm_id, $firm_name);

			if($result)
			{
				redirect('/firm/', 'refresh');
			}
			else
			{
				redirect('/firm/', 'refresh');
			}   
		}
			
	}

	public function delete($firm_id){
		if(($this->session->userdata('user_name'))){
			$title = "Delete firm";
			$data = array('title' => $title, 'content' => "Are you sure to delete this invoice?", 'firm_id' => $firm_id);
			$data['content'] = $this->load->view('firm/delete', $data, true);
			$this->load->view('layout', $data);
		}else{
			redirect('firm', 'refresh');
		}
	}

	public function deleteConfirm($firm_id = 0){
		if(($this->session->userdata('user_name')) && $firm_id != 0){
			$this->load->model('firmmodel');
			$this->firmmodel->delete($firm_id);
			redirect('firm', 'refresh');
		}else{
			redirect('firm', 'refresh');
		}
	}
}
?>