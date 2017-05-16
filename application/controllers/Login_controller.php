<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Login_controller extends CI_Controller{ 				/** Note: ayaw ilisi ang sequence sa page load sa page **/	

	   public function index()
	   {						
	   	  $this->load->helper('url');							
	      $this->load->view('login_view');						// mao lang ni ang replaceable
	   }

	   public function login_validation(){

	   	$this->load->library('form_validation');
	   	$this->form_validation->set_rules('username','Username','required');
	   	$this->form_validation->set_rules('password', 'Password','required');
	
		if($this->form_validation->run()){
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$this->load->model('login/login_user_model','login_model');
			if($this->login_model->can_login($username, $password)){
				$session_data = array(
					'username' => $username
					);
				$this->session->set_userdata($session_data);

				redirect(base_url().'dashboard');
			}else{
				redirect(base_url());
				$this->session->set_flashdata('error', 'Invalid Username and Password');
				
			}
		}else{
			$this->index();//false
		}
			
	   }
	   public function enter(){
	   	if($this->session->userdata('username') != ''){
	   		$data['username'] = $this->session->userdata('username');
	   	}else{
	   		redirect(base_url());
	   	}

	   }

	   public function logout(){
	   		$this->session->unset_userdata('username');
	   		redirect(base_url());
	   }

	}