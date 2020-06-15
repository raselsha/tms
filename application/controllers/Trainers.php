<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Trainers extends MY_Controller
{	
	function __construct()
	{	
		parent::__construct();
		$array = array('new_trainer','save_trainer','edit_trainer','update_trainer','delete_trainer');
		if ($this->session->userdata('user_role')==2) {
			if (in_array($this->router->method, $array)) {
				$this->session->set_flashdata('failed','Your are not Authenticate to do this');
				redirect('trainers');
			}
		}
	}
	
	public function index()
	{	$data = array();
		$data['title'] = "Dashboard - Trainers";
		$data['page_title'] = "All Trainers";
		$config['base_url'] = base_url('trainers/index');
		$config['per_page'] = 10;
		$config['total_rows'] = $this->db->get('trainers')->num_rows();
		$this->pagination->initialize($config);
		$data['trainers'] = $this->trainers_m->trainers($config['per_page'],$this->uri->segment(3));
		$data['content'] = $this->load->view('trainers_v',$data,true);
		$this->load->view('main_v',$data);
	}

	public function new_trainer()
	{
		$data = array();
		$data['title'] = "Dashboard - New trainer";
		$data['page_title'] = "Add new trainer";
		$data['content'] = $this->load->view('new_trainer_v',$data,true);
		$this->load->view('main_v',$data);
	}

	public function save_trainer()
	{	$this->load->library('form_validation');
		$this->form_validation->set_rules('trainers_name','Name','required');

		$this->form_validation->set_rules('trainers_mobile','Mobile','required|numeric|max_length[11]');

		$this->form_validation->set_rules('trainers_email','Email','required|valid_email|is_unique[trainers.trainers_email]');
		
		$this->form_validation->set_error_delimiters('<small class="error">','</small>');
		if ($this->form_validation->run()) {
			$result = $this->trainers_m->save_trainer();
			if ($result) {
				$this->session->set_flashdata('success','New trainer added successfully');
				redirect('trainers/new_trainer');
			}
			else{
				$this->session->set_flashdata('failed','Data not saved');
				redirect('trainers/new_trainer');
			}
		}
		else{
			$data = array();
			$data['title'] = "Dashboard - New trainer";
			$data['page_title'] = "Add new trainer";
			$data['content'] = $this->load->view('new_trainer_v',$data,true);
			$this->load->view('main_v',$data);

		}
		
	}

	

	public function single_trainer($id=null)
	{
		if ($id) {
			$data = array();
			$data['title'] = "Dashboard - Trainer details";
			$data['page_title'] = "Trainer details";
			$data['trainer'] = $this->trainers_m->single_trainer($id);
			$data['content'] = $this->load->view('single_trainer_v',$data,true);
			$this->load->view('main_v',$data);
		}
		else{
			redirect('trainers');
		}
	}

	public function edit_trainer($id=null)
	{
		if ($id) {
			$data = array();
			$data['title'] = "Dashboard - Edit trainer";
			$data['page_title'] = "Edit trainer";
			$data['trainer'] = $this->trainers_m->edit_trainer($id);
			$data['content'] = $this->load->view('edit_trainer_v',$data,true);
			$this->load->view('main_v',$data);
		}
		else{
			redirect('trainers');
		}
	}
	public function update_trainer($id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('trainers_name','Name','required');

		$this->form_validation->set_rules('trainers_mobile','Mobile','required|numeric|max_length[11]');
		
		$original_value = $this->dashboard_m->edit_unique($id,'trainers','trainers_email');

		if($this->input->post('trainers_email')== $original_value->trainers_email){
			$this->form_validation->set_rules('trainers_email','Email','required|valid_email');
		}
		else{
			$this->form_validation->set_rules('trainers_email','Email','required|valid_email|is_unique[trainers.trainers_email]');
		}

		$this->form_validation->set_error_delimiters('<small class="error">','</small>');

		if ($this->form_validation->run()) {
			$result = $this->trainers_m->update_trainer($id);
			if ($result) {
				$this->session->set_flashdata('success','Trainer updated successfully');
				redirect('trainers/update_trainer/'.$id);
			}
			else{
				$this->session->set_flashdata('failed','Trainer do not updated');
				redirect('trainers/update_trainer/'.$id);
			}
		}
		else{
			$data = array();
			$data['title'] = "Dashboard - Edit trainer";
			$data['page_title'] = "Edit trainer";
			$data['trainer'] = $this->trainers_m->edit_trainer($id);
			$data['content'] = $this->load->view('edit_trainer_v',$data,true);
			$this->load->view('main_v',$data);
		}
	}

	public function delete_trainer($id=null)
	{	
		
		if ($id) {
			$result=$this->trainers_m->delete_trainer($id);
			if ($result==1) {
				$this->session->set_flashdata('success','Data has been  deleted successfully');
				redirect('trainers');
			}
			else{
				$this->session->set_flashdata('failed','Data can not be deleted');
				redirect('trainers');
			}
		}
		else{
			$this->session->set_flashdata('failed','Failed to select data');
			redirect('trainers');
		}
	}

}


?>