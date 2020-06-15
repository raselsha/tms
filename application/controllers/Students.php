<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Students extends MY_Controller
{	
	function __construct()
	{	
		parent::__construct();
		$array = array('delete_student');
		if ($this->session->userdata('user_role')==2) {
			if (in_array($this->router->method, $array)) {
				$this->session->set_flashdata('failed','Your are not authenticate to Delete');
				redirect('students');
			}
		}
	}

	public function index()
	{	$data = array();
		$data['title'] = "Dashboard - Students";
		$data['page_title'] = "All Students";
		$config['base_url'] = base_url('students/index');
		$config['per_page'] = 20;
		$config['total_rows'] = $this->db->get('students')->num_rows();
		$this->pagination->initialize($config);
		$data['students'] = $this->students_m->students($config['per_page'],$this->uri->segment(3));
		$data['content'] = $this->load->view('students_v',$data,true);
		$this->load->view('main_v',$data);
	}

	public function new_student()
	{
		$data = array();
		$data['title'] = "Dashboard - New student";
		$data['page_title'] = "Add new student";
		$data['courses'] = $this->courses_m->courses();
		$data['content'] = $this->load->view('new_student_v',$data,true);
		$this->load->view('main_v',$data);
	}

	public function save_student()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('name','Student Name','required|alpha_numeric_spaces');
		
		$this->form_validation->set_rules('student_id','Student Id','required|numeric|is_unique[students.student_id]|min_length[2]');
		
		$this->form_validation->set_rules('mobile','Mobile number','required|numeric|exact_length[11]');

		$this->form_validation->set_rules('emergency','Emergency mobile number','required|numeric|exact_length[11]');

		$this->form_validation->set_rules('course_id','Course','required');

		
		$this->form_validation->set_rules('batch','Batch','required');
		

		$this->form_validation->set_rules('present_address','Present address','required');

		$this->form_validation->set_rules('permanent_address','Permanent address','required');

		$this->form_validation->set_rules('gender','Gender','required');

		$this->form_validation->set_rules('bid','Birth Id','required|numeric|exact_length[17]|is_unique[students.bid]');
		
		$this->form_validation->set_rules('nid','National Id','numeric|exact_length[17]|is_unique[students.nid]');

		$this->form_validation->set_rules('blood','Blood','max_length[3]');
		
		$this->form_validation->set_error_delimiters('<p class="error">','</p>');
		if ($this->form_validation->run()) {
			$result = $this->students_m->save_student();
			if ($result) {
				$this->session->set_flashdata('success','New student added successfully');
				redirect('students/new_student');
			}
			else{
				$this->session->set_flashdata('failed','Registration failed');
				redirect('students/new_student');
			}
		}
		else
		{
			$data = array();
			$data['title'] = "Dashboard | New student";
			$data['page_title'] = "Add new student";
			$data['courses'] = $this->courses_m->courses();
			$data['content'] = $this->load->view('new_student_v',$data,true);
			$this->load->view('main_v',$data);
		}
	}

	
	public function single_student($id=null)
	{
		if ($id) {
			$data = array();
			$data['title'] = "Dashboard | Student details";
			$data['page_title'] = "Student details";
			$data['student'] = $this->students_m->single_student($id);
			
			$data['enrolled'] = $this->enrolled_m->student_enrolled($id);
			
			$data['content'] = $this->load->view('single_student_v',$data,true);
			$this->load->view('main_v',$data);
		}
		else{
			redirect('students');
		}
	}

	
	public function edit_student($id=null){
		if ($id) {
			$data = array();
			$data['title'] = "Dashboard | Edit student";
			$data['page_title'] = "Edit student";
			$data['student'] = $this->students_m->edit_student($id);
			$data['courses'] = $this->courses_m->courses();
			$data['content'] = $this->load->view('edit_student_v',$data,true);
			$this->load->view('main_v',$data);
		}
		else{
			redirect('students');
		}
	}
	public function update_student($id=null){
		if ($id) {

			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('name','Student Name','required|alpha_numeric_spaces');

			$original_value = $this->dashboard_m->edit_unique($id,'students','student_id');
		   
		   if($this->input->post('student_id')== $original_value->student_id) {
		      $this->form_validation->set_rules('student_id','Student Id','required|numeric|min_length[2]');
		    } else {
			   $this->form_validation->set_rules('student_id','Student Id','required|numeric|is_unique[students.student_id]|min_length[2]');	      
		   }			
			$this->form_validation->set_rules('mobile','Mobile number','required|numeric|exact_length[11]');

			$this->form_validation->set_rules('emergency','Emergency mobile number','required|numeric|exact_length[11]');

			$this->form_validation->set_rules('present_address','Present address','required');

			$this->form_validation->set_rules('permanent_address','Permanent address','required');
			
			$nid_value = $this->dashboard_m->edit_unique($id,'students','nid');
			$bid_value = $this->dashboard_m->edit_unique($id,'students','bid');
			
			if($this->input->post('bid')!=$bid_value->bid){
				$this->form_validation->set_rules('bid','Birth Id','required|numeric|exact_length[17]|is_unique[students.bid]');
			}

			if($this->input->post('nid')!= $nid_value->nid){
				$this->form_validation->set_rules('nid','National Id','numeric|exact_length[17]|is_unique[students.nid]');
			}			

			$this->form_validation->set_error_delimiters('<p class="error">','</p>');

			if ($this->form_validation->run()) {
				$result = $this->students_m->update_student($id);

				if ($result==1) {
					$this->session->set_flashdata('success','Student data updated successfully');
					redirect('students/edit_student/'.$id);
				}
				else{
					$this->session->set_flashdata('failed','Failed Data in update');
					redirect('students/edit_student/'.$id);
				}
			}
			else
			{
				$data = array();
				$data['title'] = "Dashboard | Edit student";
				$data['page_title'] = "Edit student";
				$data['student'] = $this->students_m->edit_student($id);
				$data['courses'] = $this->courses_m->courses();
				$data['content'] = $this->load->view('edit_student_v',$data,true);
				$this->load->view('main_v',$data);
			}
		}
		else{
			redirect('students');
		}
	}
	public function delete_student($id=null)
	{	

		if ($id) {
			$sdata= array();
			$image=$this->students_m->single_student($id);
			$result=$this->students_m->delete_student($id,$image);
			if ($result==1) {
				$this->session->set_flashdata('success','Data has been  deleted successfully');
				redirect('students');
			}
			else{
				$this->session->set_flashdata('failed','Data can not be deleted');
				redirect('students');
			}
		}
		else{
			$this->session->set_flashdata('failed','Failed to select data');
			redirect('students');
		}
	}
	
	public function print_id_card($id=null,$batch_id=null)
	{	$data = array();
		$data['student'] = $this->enrolled_m->single_student_enrolled($id,$batch_id);
		$data['title'] = "Dashboard - ID card preview";
		$this->load->view('print_id_card_v',$data);
	}

	public function print_certificate($id=null,$batch_id=null)
	{	
		if ($id) {
			$data = array();
			$data['student'] = $this->enrolled_m->single_student_enrolled($id,$batch_id);
			$student = $data['student'];
			
			$string = $student->name." (".$student->student_id.")";
			$file_name = $student->student_id;
			$this->get_qr_code($string,$file_name);

			$data['title'] = $string;
			$html = $this->load->view('print_certificate_v',$data,true);
			
			$this->load->library('pdf');

			$this->pdf->load_html($html);
			$this->pdf->setPaper('A4','landscape');;
			$this->pdf->render();
			//$this->pdf->stream($file_name);

			$file_name = str_replace(" ","_",$student->name)."_".$student->student_id.".pdf";
			$this->pdf->stream($file_name,array("Attachment" => false));
		}
		else{
			redirect('students');
		}
	}

	public function get_qr_code($string,$file_name)
	{
		$this->load->library('Ciqrcode');
		$params['data'] = $string;
		$params['level'] = 'H';
		$params['size'] = 10;
		$params['savename'] = FCPATH.'images/qr_code/'.$file_name.'.png';
		$this->ciqrcode->generate($params);
	}


}

?>