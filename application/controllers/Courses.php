<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Courses extends MY_Controller
{	
	function __construct()
	{	
		parent::__construct();
		$array = array('new_course','save_course','edit_course','update_course','delete_course');
		if ($this->session->userdata('user_role')==2) {
			if (in_array($this->router->method, $array)) {
				$this->session->set_flashdata('failed','Your are not Authenticate to do this');
				redirect('courses');
			}
		}
	}
	
	public function index()
	{	$data = array();
		$data['title'] = "Dashboard - Courses";
		$data['page_title'] = "All Courses";
		$config['base_url'] = base_url('courses/index');
		$config['per_page'] = 20;
		$config['total_rows'] = $this->db->get('courses')->num_rows();
		$this->pagination->initialize($config);
		$data['courses'] = $this->courses_m->courses($config['per_page'],$this->uri->segment(3));
		$data['content'] = $this->load->view('courses_v',$data,true);
		$this->load->view('main_v',$data);
	}

	public function new_course()
	{
		$data = array();
		$data['title'] = "Dashboard - New course";
		$data['page_title'] = "Add new course";
		$data['content'] = $this->load->view('new_course_v',$data,true);
		$this->load->view('main_v',$data);
	}

	public function save_course()
	{	$this->load->library('form_validation');
		$this->form_validation->set_rules('course_name','Course Name','required');

		$this->form_validation->set_rules('course_code','Course code','required|numeric|is_unique[courses.course_code]|min_length[2]');

		$this->form_validation->set_rules('course_hour','Course hour','required|numeric|max_length[3]');
		
		$this->form_validation->set_error_delimiters('<small class="error">','</small>');
		if ($this->form_validation->run()) {
			$result = $this->courses_m->save_course();
			if ($result) {
				$this->session->set_flashdata('success','New course added successfully');
				redirect('courses/new_course');
			}
			else{
				$this->session->set_flashdata('failed','Data not saved');
				redirect('courses/new_course');
			}
		}
		else{
			$data = array();
			$data['title'] = "Dashboard - New course";
			$data['page_title'] = "Add new course";
			$data['content'] = $this->load->view('new_course_v',$data,true);
			$this->load->view('main_v',$data);

		}
		
	}

	

	public function single_course($id=null)
	{
		if ($id) {
			$data = array();
			$data['title'] = "Dashboard - Course details";
			$data['page_title'] = "Course details";
			$data['course'] = $this->courses_m->single_course($id);
			$data['batches'] = $this->batches_m->batches_of_this_course($id);
			$data['content'] = $this->load->view('single_course_v',$data,true);
			$this->load->view('main_v',$data);
		}
		else{
			redirect('courses');
		}
	}

	public function edit_course($id=null)
	{
		if ($id) {
			$data = array();
			$data['title'] = "Dashboard - Edit course";
			$data['page_title'] = "Edit course";
			$data['course'] = $this->courses_m->edit_course($id);
			$data['content'] = $this->load->view('edit_course_v',$data,true);
			$this->load->view('main_v',$data);
		}
		else{
			redirect('courses');
		}
	}
	public function update_course($id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('course_name','Course Name','required');

		$original_value = $this->dashboard_m->edit_unique($id,'courses','course_code');

		$this->form_validation->set_rules('course_hour','Course hour','required|numeric|max_length[3]');
		
		if($this->input->post('course_code')== $original_value->course_code){
			$this->form_validation->set_rules('course_code','Course code','required|numeric|min_length[2]');
		}
		else{
		$this->form_validation->set_rules('course_code','Course code','required|numeric|is_unique[courses.course_code]|min_length[2]');
		}

		$this->form_validation->set_rules('course_content','Course content');

		$this->form_validation->set_error_delimiters('<small class="error">','</small>');

		if ($this->form_validation->run()) {
			$result = $this->courses_m->update_course($id);
			if ($result) {
				$this->session->set_flashdata('success','Course updated successfully');
				redirect('courses/update_course/'.$id);
			}
			else{
				$this->session->set_flashdata('failed','Course do not updated');
				redirect('courses/update_course/'.$id);
			}
		}
		else{
			$data = array();
			$data['title'] = "Dashboard | Edit course";
			$data['page_title'] = "Edit course";
			$data['course'] = $this->courses_m->edit_course($id);
			$data['content'] = $this->load->view('edit_course_v',$data,true);
			$this->load->view('main_v',$data);
		}
		
	}

	public function delete_course($id=null)
	{	
		
		if ($id) {
			$result=$this->courses_m->delete_course($id);
			if ($result==1) {
				$this->session->set_flashdata('success','Data has been  deleted successfully');
				redirect('courses');
			}
			else{
				$this->session->set_flashdata('failed','Data can not be deleted');
				redirect('courses');
			}
		}
		else{
			$this->session->set_flashdata('failed','Failed to select data');
			redirect('courses');
		}
	}

}


?>