<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Enrolled extends MY_Controller
{
	function __construct()
	{	
		parent::__construct();
		$array = array('delete_enroll');
		if ($this->session->userdata('user_role')==2) {
			if (in_array($this->router->method, $array)) {
				$this->session->set_flashdata('failed','Your are not authenticate to do this');
				redirect('students');
			}
		}
	}

	public function index()
	{	
		redirect('enrolled/new_enroll');
	}


	public function new_enroll($id=null)
	{
		$data = array();
		$data['title'] = "Dashboard | New enroll";
		$data['page_title'] = "New enroll";
		if ($id!=null) {
			$data['student']=$this->students_m->single_student($id);
		}
		$data['courses'] = $this->courses_m->courses();
		$data['content'] = $this->load->view('new_enroll_v',$data,true);
		$this->load->view('main_v',$data);
	}


	public function save_enroll()
	{	$this->load->library('form_validation');
		
		$student_id = $this->input->post('student_id');
		
		$student_id = $this->enrolled_m->find_enroll($student_id);
		
		$this->form_validation->set_rules('student_id','Student Id','required|numeric|in_list['.$student_id.']', array('in_list' => 'Student Id should be registered'));
		
		$this->form_validation->set_rules('course_id','Course Id','required');

		$this->form_validation->set_rules('batch_id','Batch id ','required');
		
		$this->form_validation->set_error_delimiters('<small class="error">','</small>');
		if ($this->form_validation->run()) {
			$result = $this->enrolled_m->save_enroll();
			if ($result) {
				$this->session->set_flashdata('success','Student enrolled successfully');
				redirect('enrolled/new_enroll');
			}
			else{
				$this->session->set_flashdata('failed','Data not saved');
				redirect('enrolled/new_enroll');
			}
		}
		else{
			$data = array();
			$data['title'] = "Dashboard - New enroll";
			$data['page_title'] = "New enroll";
			$data['courses'] = $this->courses_m->courses();
			$data['content'] = $this->load->view('new_enroll_v',$data,true);
			$this->load->view('main_v',$data);

		}
		
	}

	public function delete_enroll($id=null,$batch_id=null)
	{
		if ($id) {
			$result=$this->enrolled_m->delete_enrolled($id,$batch_id);
			if ($result==1) {
				$this->session->set_flashdata('success','Data has been  deleted successfully');
				redirect('students/single_student/'.$id);
			}
			else{
				$this->session->set_flashdata('failed','Data can not be deleted');
				redirect('students/single_student/'.$id);
			}
		}
		else{
			$this->session->set_flashdata('failed','Failed to select data');
			redirect('students/single_student/'.$id);
		}
	}

}


?>