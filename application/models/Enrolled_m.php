<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Enrolled_m extends CI_Model
	{

		public function save_enroll()
		{	
			unset($_POST['submit']);
			$this->db->insert('enrolled',$_POST);
			return 1;
		}

		public function batch_enrolled($id)
		{
			
			$query = $this->db->select('enrolled.student_id,students.id,students.name,students.mobile,students.ref,')
					 ->from('enrolled')
					 ->where('enrolled.batch_id',$id)
					 ->join('students', 'enrolled.student_id = students.student_id','left')
					 ->get()->result();
			return $query;
		}

		public function student_enrolled($id)
		{	
			$student=$this->db->select('student_id')
					 ->from('students')
					 ->where('id',$id)
					 ->get()
					 ->row();

			$enrolled = $this->db->select('enrolled.*,batches.batch_no,batches.batch_shift,batches.batch_status,batches.start_date,batches.end_date,courses.course_name')
					 ->from('enrolled')
					 ->where('enrolled.student_id',$student->student_id)
					 ->join('batches', 'enrolled.batch_id = batches.id','left')
					 ->join('courses', 'enrolled.course_id = courses.id','left')
					 ->get()
					 ->result();

			return $enrolled;
		}


		public function single_student_enrolled($id,$batch_id)
		{	
			$student=$this->db->select('student_id')
					 ->from('students')
					 ->where('id',$id)
					 ->get()
					 ->row();

			$enrolled = $this->db->select('enrolled.*,students.*,batches.id as batches_id,batches.batch_no,batches.start_date,batches.end_date,trainers.trainers_name,courses.course_name,courses.id as courses_id,courses.template,courses.course_hour')
					 ->from('enrolled')
					 ->where('enrolled.student_id',$student->student_id)
					 ->where('enrolled.batch_id',$batch_id)
					 ->join('students', 'enrolled.student_id = students.student_id','left')
					 ->join('batches', 'enrolled.batch_id = batches.id','left')
					 ->join('trainers', 'batches.trainer_id = trainers.id','left')
					 ->join('courses', 'enrolled.course_id = courses.id','left')
					 ->get()
					 ->row();

			return $enrolled;
		}

		public function find_enroll($student_id)
		{

			$enrolled = $this->db->select('*')
					 ->from('students')
					 ->where('student_id',$student_id)
					 ->get()
					 ->row();
			if ($enrolled) {
				return $enrolled->student_id;
			}
			
		}

		public function delete_enrolled($id,$batch_id)
		{	
			$student=$this->db->select('student_id')
					 ->from('students')
					 ->where('id',$id)
					 ->get()
					 ->row();

			$this->db->where('student_id',$student->student_id);
			$this->db->where('batch_id',$batch_id);
			$this->db->delete('enrolled'); 
			return 1;
		}

		// ==================== end enrolled =================
	}

?>