<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Users extends MY_Controller
{	
	function __construct()
	{	
		parent::__construct();
		$array = array('new_user','save_user','edit_user','update_user','delete_user');
		if ($this->session->userdata('user_role')==2) {
			if (in_array($this->router->method, $array)) {
				$this->session->set_flashdata('failed','Your are not Authenticate to do this');
				redirect('users');
			}
		}
	}
	
	public function index()
	{	$data = array();
		$data['title'] = "Dashboard - Users";
		$data['page_title'] = "All Users";
		$config['base_url'] = base_url('users/index');
		$config['per_page'] = 10;
		$config['total_rows'] = $this->db->get('users')->num_rows();
		$this->pagination->initialize($config);
		$data['users'] = $this->users_m->users($config['per_page'],$this->uri->segment(3));
		$data['content'] = $this->load->view('users_v',$data,true);
		$this->load->view('main_v',$data);
	}

	public function new_user()
	{
		$data = array();
		$data['title'] = "Dashboard - New user";
		$data['page_title'] = "Add new user";
		$data['content'] = $this->load->view('new_user_v',$data,true);
		$this->load->view('main_v',$data);
	}

	public function save_user()
	{	$this->load->library('form_validation');
		$this->form_validation->set_rules('user_name','User Name','required|alpha_dash|is_unique[users.user_name]|max_length[20]|min_length[4]');
		$this->form_validation->set_rules('user_role','Role','required');
		
		$this->form_validation->set_error_delimiters('<small class="error">','</small>');
		if ($this->form_validation->run()) {
			$result = $this->users_m->save_user();
			if ($result) {
				$this->session->set_flashdata('success','New user added successfully');
				redirect('users/new_user');
			}
			else{
				$this->session->set_flashdata('failed','Data not saved');
				redirect('users/new_user');
			}
		}
		else{
			$data = array();
			$data['title'] = "Dashboard - New user";
			$data['page_title'] = "Add new user";
			$data['content'] = $this->load->view('new_user_v',$data,true);
			$this->load->view('main_v',$data);

		}
		
	}

	

	public function single_user($id=null)
	{
		if ($id) {
			$data = array();
			$data['title'] = "Dashboard - User Details";
			$data['page_title'] = "User details";
			$data['user'] = $this->users_m->single_user($id);
			$data['content'] = $this->load->view('single_user_v',$data,true);
			$this->load->view('main_v',$data);
		}
		else{
			redirect('users');
		}
	}

	public function edit_user($id=null)
	{
		if ($id) {
			$data = array();
			$data['title'] = "Dashboard - Edit user";
			$data['page_title'] = "Edit user";
			$data['user'] = $this->users_m->edit_user($id);
			$data['content'] = $this->load->view('edit_user_v',$data,true);
			$this->load->view('main_v',$data);
		}
		else{
			redirect('users');
		}
	}
	public function update_user($id)
	{
		$this->load->library('form_validation');

		$original_value = $this->dashboard_m->edit_unique($id,'users','user_name');
		
		if($this->input->post('user_name')== $original_value->user_name){
			$this->form_validation->set_rules('user_name','User Name','required|alpha_dash|max_length[20]|min_length[4]');
		}
		else{
		$this->form_validation->set_rules('user_name','User Name','required|alpha_dash|is_unique[users.user_name]|max_length[20]|min_length[4]');
		}

		$this->form_validation->set_rules('user_role','Role','required');

		$this->form_validation->set_error_delimiters('<small class="error">','</small>');

		if ($this->form_validation->run()) {
			$result = $this->users_m->update_user($id);
			if ($result) {
				$this->session->set_flashdata('success','User updated successfully');
				redirect('users/edit_user/'.$id);
			}
			else{
				$this->session->set_flashdata('failed','User do not updated');
				redirect('users/edit_user/'.$id);
			}
		}
		else{
			$data = array();
			$data['title'] = "Dashboard - Edit user";
			$data['page_title'] = "Edit user";
			$data['user'] = $this->users_m->edit_user($id);
			$data['content'] = $this->load->view('edit_user_v',$data,true);
			$this->load->view('main_v',$data);

		}
		
	}

	public function change_password()
	{	$id=$this->session->userdata('id');
		if ($id) {
			$data = array();
			$data['title'] = "Dashboard - Change password";
			$data['page_title'] = "Change password";
			$data['user'] = $this->users_m->edit_user($id);
			$data['content'] = $this->load->view('change_password_v',$data,true);
			$this->load->view('main_v',$data);
		}
		else{
			redirect('users');
		}
	}

	public function update_password()
	{	$id=$this->session->userdata('id');
		if ($id) {
			$this->load->library('form_validation');
			$this->form_validation->set_rules('user_password','Password','required|min_length[3]');

			$this->form_validation->set_error_delimiters('<small class="error">','</small>');
			if ($this->form_validation->run()) {
				$result = $this->users_m->update_password($id);
				if ($result) {
					$this->session->set_flashdata('success','User updated successfully');
					redirect('users');
				}
				else{
					$this->session->set_flashdata('failed','User do not updated');
					redirect('users/change_password');
				}
			}
			else{
				$data = array();
				$data['title'] = "Dashboard - Change password";
				$data['page_title'] = "Change password";
				$data['user'] = $this->users_m->edit_user($id);
				$data['content'] = $this->load->view('change_password_v',$data,true);
				$this->load->view('main_v',$data);
			}
		}
		else{
			redirect('users');
		}
	}

	public function delete_user($id=null)
	{	
		
		if ($id) {
			$result=$this->users_m->delete_user($id);
			if ($result==1) {
				$this->session->set_flashdata('success','Data has been  deleted successfully');
				redirect('users');
			}
			else{
				$this->session->set_flashdata('failed','Data can not be deleted');
				redirect('users');
			}
		}
		else{
			$this->session->set_flashdata('failed','Failed to select data');
			redirect('users');
		}
	}

}


?>