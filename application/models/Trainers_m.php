<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Trainers_m extends CI_Model
	{

		public function save_trainer()
		{	
			unset($_POST['submit']);
			return $this->db->insert('trainers',$_POST);
		}
		public function trainers($limit=null,$offset=null)
		{
			return $this->db->get('trainers',$limit,$offset)->result();
		}
		public function single_trainer($id)
		{
			return $this->db->get_where('trainers', array('id' => $id))->row();
		}
		public function edit_trainer($id)
		{
			return $this->db->get_where('trainers', array('id' => $id))->row();
		}
		public function update_trainer($id)
		{	
			unset($_POST['submit']);
			$check=$this->db->query("select id,trainers_email from trainers where trainers_email='".$_POST['trainers_email']."' and id != ".$id)->num_rows();
			if ($check==0) {

				$this->db->where('id', $id);
				$this->db->update('trainers',$_POST);
				return 1;
			}
			return 0;

		}
		public function delete_trainer($id)
		{
			$this->db->where('id', $id);
			$this->db->delete('trainers'); 
			return 1;
		}

		// =====================end Trainers===================
	}

?>