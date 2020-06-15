<?php 

defined('BASEPATH') OR exit('No direct script access allowed');



/**

* 

*/

class Login extends CI_Controller

{

	function __construct()

	{

		parent::__construct();

		if ($this->session->has_userdata('id')){
			redirect('dashboard');	
		}
	}

	
	public function index()

	{
	
		$data = array();
		$data['title'] = 'User Login';
		$data['page_title'] = 'User Login';
		$data['content'] = $this->load->view('login_v',$data,true);
		$this->load->view('main_v',$data);
	}

	public function check_login()

	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('user_name','User Name','required|alpha_dash');
		
		$this->form_validation->set_rules('user_password','Password','required');
		
		$this->form_validation->set_error_delimiters('<small class="error">','</small>');
		if ($this->form_validation->run()) {
			$user_name = $this->input->post('user_name',true);
			$user_password = $this->input->post('user_password',true);
			$this->load->model('login_m');
			$result=$this->login_m->check_login($user_name,$user_password);
			if ($result) {
				$sdata = array();
				$sdata['id'] = $result->id; 
				$sdata['user_name'] = $result->user_name; 
				$sdata['user_role'] = $result->user_role; 
				$this->session->set_userdata($sdata);
				redirect('dashboard');
			}
			else{
				$this->session->set_flashdata('failed','User name and password do not match');
				redirect('login');
			}
		}
		else{
			
			$data = array();
			$data['title'] = 'User Login';
			$data['page_title'] = 'User Login';
			$data['content'] = $this->load->view('login_v',$data,true);
			$this->load->view('main_v',$data);
		}
		

	}



}



?>