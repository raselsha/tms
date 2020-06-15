<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Dashboard_m extends CI_Model
{

	public function search($search)
	{
		$result=$this->db->get_where('students',array('student_id'=>$search))->row();
		if ($result) {
			return $result->id;
		}
		
	}

	// ===================== users===================
	
	
	public function edit_unique($id,$table,$field)
	{
		$this->db->select($field)
						->from($table)
						->where('id',$id);

		return $this->db->get()->row();
	}

}

 ?>