<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Login_m extends CI_Model
{

	public function check_login($user_name,$user_password)
	{
		$result=$this->db->get_where('users',array('user_name'=>$user_name,'user_password'=>md5($user_password)))->row();
		return $result;
	}

}

 ?>