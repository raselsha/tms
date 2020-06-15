<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Courses_m extends CI_Model
	{

	public function save_course()
	{	
		unset($_POST['submit']);
		return $this->db->insert('courses',$_POST);
	}
	public function courses($limit=null,$offset=null)
	{
		return $this->db->get('courses',$limit,$offset)->result();
	}
	public function single_course($id)
	{
		return $this->db->get_where('courses', array('id' => $id))->row();
	}
	public function edit_course($id)
	{
		return $this->db->get_where('courses', array('id' => $id))->row();
	}
	public function update_course($id)
	{	
		unset($_POST['submit']);
		$check=$this->db->query("select id,course_code from courses where course_code='".$_POST['course_code']."' and id != ".$id)->num_rows();
		if ($check==0) {

			$this->db->where('id', $id);
			$this->db->update('courses',$_POST);
			return 1;
		}
		return 0;

	}
	public function delete_course($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('courses'); 
		return 1;
	}

	// =====================end courses===================
}

?>