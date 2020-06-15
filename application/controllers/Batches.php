<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Batches extends MY_Controller
{
	function __construct()
	{	
		parent::__construct();
		$array = array('new_batch','save_batch','edit_batch','update_batch','delete_batch');
		if ($this->session->userdata('user_role')==2) {
			if (in_array($this->router->method, $array)) {
				$this->session->set_flashdata('failed','Your are not authenticate to do this');
				redirect('batches');
			}
		}
	}

	public function index()
	{	$data = array();
		$data['title'] = "Dashboard - Batches";
		$data['page_title'] = "All Batches";
		$config['base_url'] = base_url('batches/index');
		$config['per_page'] = 10;
		$config['total_rows'] = $this->db->get('batches')->num_rows();
		$this->pagination->initialize($config);
		$data['batches'] = $this->batches_m->batches($config['per_page'],$this->uri->segment(3));
		$data['content'] = $this->load->view('batches_v',$data,true);
		$this->load->view('main_v',$data);
	}


	public function new_batch()
	{
		$data = array();
		$data['title'] = "Dashboard - New batch";
		$data['page_title'] = "Add new batch";
		$data['courses'] = $this->courses_m->courses();
		$data['trainers'] = $this->trainers_m->trainers();
		$data['content'] = $this->load->view('new_batch_v',$data,true);
		$this->load->view('main_v',$data);
	}

	public function save_batch()
	{	$this->load->library('form_validation');
		$this->form_validation->set_rules('batch_course_id','Course Name','required');

		$this->form_validation->set_rules('batch_shift','Batch Shift','required');

		$this->form_validation->set_rules('batch_status','Batch Status','required');

		$this->form_validation->set_rules('trainer_id','Trainer','required');

		$this->form_validation->set_rules('start_date','Start date','required');

		$this->form_validation->set_rules('end_date','End date','required');
		
		$this->form_validation->set_error_delimiters('<small class="error">','</small>');
		if ($this->form_validation->run()) {
			$result = $this->batches_m->save_batch();
			if ($result) {
				$this->session->set_flashdata('success','New Batch added successfully');
				redirect('batches/new_batch');
			}
			else{
				$this->session->set_flashdata('failed','Data not saved');
				redirect('batches/new_batch');
			}
		}
		else{
			$data = array();
			$data['title'] = "Dashboard - New Batch";
			$data['page_title'] = "Add new batch";
			$data['courses'] = $this->courses_m->courses();
			$data['trainers'] = $this->trainers_m->trainers();
			$data['content'] = $this->load->view('new_batch_v',$data,true);
			$this->load->view('main_v',$data);

		}
		
	}

	

	public function single_batch($id=null)
	{
		if ($id) {
			$data = array();
			$data['title'] = "Dashboard - Batch details";
			$data['page_title'] = "Batch details";
			$data['batch'] = $this->batches_m->single_batch($id);
			$data['students'] = $this->batches_m->student_of_this_batch_enrolled($id);
			$data['content'] = $this->load->view('single_batch_v',$data,true);
			$this->load->view('main_v',$data);
		}
		else{
			redirect('batches');
		}
	}

	public function edit_batch($id=null)
	{
		if ($id) {
			$data = array();
			$data['title'] = "Dashboard - Edit batch";
			$data['page_title'] = "Edit batch";
			$data['courses'] = $this->courses_m->courses();
			$data['trainers'] = $this->trainers_m->trainers();
			$data['batch'] = $this->batches_m->edit_batch($id);
			$data['content'] = $this->load->view('edit_batch_v',$data,true);
			$this->load->view('main_v',$data);
		}
		else{
			redirect('batches');
		}
	}
	public function update_batch($id)
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('batch_course_id','Course Name','required');

		$this->form_validation->set_rules('batch_shift','Batch Shift','required');

		$this->form_validation->set_rules('batch_status','Batch Status','required');
		$this->form_validation->set_rules('trainer_id','Trainer','required');
		
		$this->form_validation->set_rules('start_date','Start date','required');

		$this->form_validation->set_rules('end_date','End date','required');

		$this->form_validation->set_error_delimiters('<small class="error">','</small>');

		if ($this->form_validation->run()) {
			$result = $this->batches_m->update_batch($id);
			if ($result) {
				$this->session->set_flashdata('success','Batch updated successfully');
				redirect('batches/update_batch/'.$id);
			}
			else{
				$this->session->set_flashdata('failed','Course do not updated');
				redirect('batches/update_batch/'.$id);
			}
		}
		else{
			$data = array();
			$data['title'] = "Dashboard - Edit batch";
			$data['page_title'] = "Edit batch";
			$data['courses'] = $this->courses_m->courses();
			$data['trainers'] = $this->trainers_m->trainers();
			$data['batch'] = $this->batches_m->edit_batch($id);
			$data['content'] = $this->load->view('edit_batch_v',$data,true);
			$this->load->view('main_v',$data);

		}
		
	}
	public function delete_batch($id=null)
	{
		if ($id) {
			$result=$this->batches_m->delete_batch($id);
			if ($result==1) {
				$this->session->set_flashdata('success','Data has been  deleted successfully');
				redirect('batches');
			}
			else{
				$this->session->set_flashdata('failed','Data can not be deleted');
				redirect('batches');
			}
		}
		else{
			$this->session->set_flashdata('failed','Failed to select data');
			redirect('batches');
		}
	}

	public function ajax_batch()
	{	$data = array();
		$course_id = $this->input->post('batch_course_id');
		$results = $this->batches_m->ajax_batch($course_id);
		if ($results) {
			$select_batch = '';
			$select_batch .= '<option value="">Select batch</option>';
			foreach ($results as $result) {
				if ($result->batch_shift==1) {
					$select_batch .= '<option value="'.$result->id.'">'.$result->id.' Morning-'.$result->batch_no.'</option>';
				}
				if ($result->batch_shift==2) {
					$select_batch .= '<option value="'.$result->id.'">'.$result->id.' After noon-'.$result->batch_no.'</option>';
				}
				if ($result->batch_shift==3) {
					$select_batch .= '<option value="'.$result->id.'">'.$result->id.' Evening-'.$result->batch_no.'</option>';
				}
				
			}
			echo json_encode($select_batch);
		}
		else{
			echo 'failed';
		}
	}

}


?>