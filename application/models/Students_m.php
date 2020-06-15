<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Students_m extends CI_Model
	{

		public function save_student()
		{	
			unset($_POST['submit']);
			$_POST['image'] = $_FILES['image']['name'];
			$_POST['ref'] = $this->session->userdata('user_name');
			$check=$this->db->get_where('students', array('student_id' => $_POST['student_id']))->num_rows();
			$name = $_FILES['image']['name'];
			$sp =$_FILES['image']['tmp_name'];

			if ($check==0) {
				$data = array();
				$data['student_id']=$_POST['student_id'];
				$data['course_id']= $_POST['course_id'];
				$data['batch_id']= $_POST['batch'];
				$this->db->insert('enrolled',$data);

				unset($_POST['course_id']);
				unset($_POST['batch']);

				$this->db->insert('students',$_POST);
				$id=$this->db->insert_id();

				$dp ='images/students/'.$id.'_'.$name;
				move_uploaded_file($sp,$dp);
				return 1;
			}
			return 0;
			
		}

		public function students($limit,$offset)
		{
			$this->db->select('students.*')
					 ->from('students',$limit,$offset)
					 ->order_by('student_id');
			$query = $this->db->get('',$limit,$offset)->result();

			return $query;
		}


		public function single_student($id)
		{
			
			$this->db->select('students.*')
					 ->from('students')
					 ->where('students.id',$id);
			$query = $this->db->get()->row();
			
			return $query;
		}

		public function edit_student($id)
		{
			
			return $this->db->get_where('students', array('id' => $id))->row();
		}

		public function update_student($id)
		{	
			unset($_POST['submit']);
			$check=$this->db->query("select id,student_id from students where student_id='".$_POST['student_id']."' and id != ".$id)->num_rows();

			$_POST['image'] = $_FILES['image']['name'];
			$name = $_FILES['image']['name'];
			$sp =$_FILES['image']['tmp_name'];
			
			if ($_FILES['image']['name']==''){
				$_POST['image'] = $_POST['photo'];
				unset($_POST['photo']);
			}
			unset($_POST['photo']);
			if ($check==0) {
				$this->db->where('id', $id);
				$this->db->update('students',$_POST);
				$dp ='images/students/'.$id.'_'.$name;
				move_uploaded_file($sp,$dp);
				return 1;
			}
			return 0;

		}

		public function delete_student($id=null,$image=null){
			
			$student=$this->db->select('student_id')
					 ->from('students')
					 ->where('id',$id)
					 ->get()
					 ->row();

			$this->db->where('student_id',$student->student_id);
			$this->db->delete('enrolled');

			$this->db->where('id', $id);
			$this->db->delete('students'); 
			$image='images/students/'.$id.'_'.$image->image;
			unlink($image);

			return 1;
		}
		// ==================== end student =================
	}

?>