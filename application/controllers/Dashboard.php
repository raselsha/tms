<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Dashboard extends MY_Controller
{	
	
	public function index()
	{
		$data = array();
		$data['title'] = "Dashboard | Home";
		$data['page_title'] = "Dashboard";
		$data['content'] = $this->load->view('dashboard_v',$data,true);
		$this->load->view('main_v',$data);
	}

	public function search()
	{
		$search=$this->input->post('search',true);

		if ($search=='') {
			$this->session->set_flashdata('failed','Please search by student ID');
			redirect('students');
		}
		else{
			$result = $this->dashboard_m->search($search);
			if ($result) {
				redirect('students/single_student/'.$result);
			}
			else{
				$this->session->set_flashdata('failed','No record found!');
				redirect('students');
			}
		}
	}


	public function logout()
	{
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('user_name');
		$this->session->unset_userdata('user_role');
		$this->session->set_flashdata('success',"Successfully Loged out!");
		redirect('login');
	}
}


?>