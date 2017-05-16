<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	* 
	*/
	class Login_user_model extends CI_Model{
		
		function can_login($username, $password){

			$this->db->select('user_id, user_type, username, password, lastname, firstname');
			$this->db->from('users');
			$this->db->where('username', $username);
			$this->db->where('password', $password);
			$this->db->limit(1);
			$query = $this->db->get();
			// $this->db->where('username', $username);
			// $this->db->where('password', $password);
			// $query = $this->db->get('users');
			//SELECT * FROM users WHERE username = '$username' AND password = '$password'

			if($query->num_rows() > 0){
				return true;
			}else{
				return false;
			}
		}
	}