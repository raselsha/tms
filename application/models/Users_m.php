<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Users_m extends CI_Model
	{

		public function save_user()
		{	
			unset($_POST['submit']);
			$_POST['user_name']=strtolower($_POST['user_name']);
			$_POST['user_password']=md5($_POST['user_name']);
			return $this->db->insert('users',$_POST);
		}
		public function users($limit=null,$offset=null)
		{
			return $this->db->get('users',$limit,$offset)->result();
		}
		public function single_user($id)
		{
			return $this->db->get_where('users', array('id' => $id))->row();
		}
		public function edit_user($id)
		{
			return $this->db->get_where('users', array('id' => $id))->row();
		}
		public function update_user($id)
		{	
			unset($_POST['submit']);
			$this->db->where('id', $id);
			$this->db->update('users',$_POST);
			if ($id==$this->session->userdata('id')) {
				$sdata=array();
				$sdata['user_role'] = $_POST['user_role']; 
				$this->session->set_userdata($sdata);
			}
			return 1;
		}
		public function update_password($id)
		{	
			unset($_POST['submit']);
			$_POST['user_password']=md5($_POST['user_password']);
			$this->db->where('id', $id);
			$this->db->update('users',$_POST);
			
			return 1;
		}

		public function delete_user($id)
		{
			$this->db->where('id', $id);
			$this->db->delete('users'); 
			return 1;
		}

	}

?>