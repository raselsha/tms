<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Batches_m extends CI_Model
	{

		public function save_batch()
		{	

			unset($_POST['submit']);
			$count = $this->db->where('batch_course_id', $_POST['batch_course_id'])
					->from('batches')
					->count_all_results();
			$count = $count+1;
			$_POST['batch_no']= '0'.$count;

			$this->db->insert('batches',$_POST);

			return 1;
		}

		public function batches($limit=null,$offset=null)
		{
			$this->db->select('batches.*')
					 ->select('courses.id as courses_id')
					 ->select('courses.course_name')
					 ->from('batches')
					 ->join('courses', 'batches.batch_course_id = courses.id','left',$limit,$offset)
					 ->order_by('batches.id','desc');
			$query = $this->db->get('',$limit,$offset)->result();

			return $query;
		}

		public function batches_of_this_course($id)
		{
			$this->db->select('batches.*')
					 ->select('courses.id as courses_id')
					 ->select('courses.course_name')
					 ->from('batches')
					 ->where('batches.batch_course_id',$id)
					 ->join('courses', 'batches.batch_course_id = courses.id','left')
					 ->order_by('batches.id','desc');
			$query = $this->db->get()->result();

			return $query;
		}

		public function single_batch($id)
		{
			
			$this->db->select('batches.*')
					 ->select('courses.id as courses_id')
					 ->select('courses.course_name')
					 ->select('trainers.trainers_name')
					 ->from('batches')
					 ->join('courses', 'batches.batch_course_id = courses.id','left')
					 ->join('trainers', 'batches.trainer_id = trainers.id','left')
					 ->where('batches.id',$id);
			$query = $this->db->get()->row();

			return $query;
		}

		
		public function edit_batch($id)
		{
			
			return $this->db->get_where('batches', array('id' => $id))->row();
		}

		public function update_batch($id)
		{	
			unset($_POST['submit']);

			$this->db->where('id', $id);
			$this->db->update('batches',$_POST);
			return 1;


		}

		public function delete_batch($id=null){
			$this->db->where('id', $id);
			$this->db->delete('batches'); 
			return 1;
		}


		public function student_of_this_batch_enrolled($id)
		{
			
			$query = $this->db->select('enrolled.student_id,students.id,students.name,students.mobile,students.ref,students.gender')
					 ->from('enrolled')
					 ->where('enrolled.batch_id',$id)
					 ->join('students', 'enrolled.student_id = students.student_id','left')
					 ->get()->result();
			return $query;
		}
		
		public function ajax_batch($course_id)
		{
			$query = $this->db->where(array('batch_course_id' =>  $course_id,'batch_status'=>1))->get('batches');
			return $query->result();
		}
		// =====================end batches===================
	}

?>