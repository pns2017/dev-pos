<?php
//include 'function_controller';

defined('BASEPATH') OR exit('No direct script access allowed');

class Users_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('users/users_model','users');
	}

	public function index()
	{
		$user = $this->session->username;
	   	if($user == ''){
	   		redirect('/');
	   	}
	   	else{
		$this->load->helper('url');							
   												
	   	$data['title'] = "User's Data";	
	   	$this->load->view('template/dashboard_header');
	    $this->load->view('users/users_view', $data);		// mao lang ni ang replaceable
	    $this->load->view('template/dashboard_navigation');
	    $this->load->view('template/dashboard_footer');
	 }
	}

	public function users_view($id){
		$this->load->helper('url');							
   												
	   	$data['title'] = "Basic Information";	
	   	$data['users'] = $this->users->get_by_user_id($id);
		$this->load->view('template/dashboard_header');
	    $this->load->view('users/users_edit_view', $data);		// mao lang ni ang replaceable
	    $this->load->view('template/dashboard_navigation');
	    $this->load->view('template/dashboard_footer');
	}

	public function users_list()
	{
		$list = $this->users->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $users) {
			$no++;
			$row = array();
			$row[] = $users->user_id;
			
			if ($users->administrator == 0){
				$row[] = 'user' ;
			}else{
				$row[] = 'administrator' ;
			}

			$row[] = $users->username;
			$row[] = $users->password;

			$ln = $users->lastname;
			$fn = $users->firstname;
			$mn = $users->middlename;
			$row[] = $ln .", ".$fn." ".$mn;
			$row[] = $users->contact;
			$row[] = $users->email;
			$row[] = $users->address;
			$row[] = $users->date_registered;
			


                        
                              
                       
			//add html for action
			$row[] = ' <a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Privilege" onclick="_privilege('."'".$users->user_id."'".')"><i class="fa fa-unlock-alt"></i></a>
						<a class="btn btn-sm btn-primary" href=" users-view/'.''.$users->user_id.'" title="View" ><i class="fa fa-eye"></i></a>
				  		<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_user('."'".$users->user_id."'".')"><i class="fa fa-trash-o"></i></a>';
		
			$data[] = $row;

			
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->users->count_all(),
						"recordsFiltered" => $this->users->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function users_edit($id)
	{
		$data = $this->users->get_by_id($id);
		//$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function users_add()
	{
		$this->_validate();
		$this->_validate_password();
		$data = array(
				'username' => $this->input->post('username'),
		        'password' => password_hash($this->input->post('password'),PASSWORD_BCRYPT),
		        'lastname' => $this->input->post('lastname'),
		        'firstname' => $this->input->post('firstname'),
		        'middlename' => $this->input->post('middlename'),
		        'contact' => $this->input->post('contact'),
		        'email' => $this->input->post('email'),
		        'address' => $this->input->post('address'),
		        'date_registered' => date('Y-m-d'),
		        'removed' => '0',
		        'administrator' => '0',
				'cashier' => '0',
				'inventory' => '0',
				'supplier' => '0',
				'customer' =>'0',
				'user' => '0',
				'report' => '0'
			);
		$insert = $this->users->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function users_update()
	{
		$this->_validate();
		$data = array(
				'username' => $this->input->post('username'),
		        'lastname' => $this->input->post('lastname'),
		        'firstname' => $this->input->post('firstname'),
		        'middlename' => $this->input->post('middlename'),
		        'contact' => $this->input->post('contact'),
		        'email' => $this->input->post('email'),
		        'address' => $this->input->post('address')		        
			);
		$this->users->update(array('user_id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function password_update()
	{
		
		$this->_validate_password();
		$data = array(
				'password' => password_hash($this->input->post('password'),PASSWORD_BCRYPT)
			);
		$this->users->update(array('user_id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function privilege_update()
	{
		$data = array(
				'administrator' => $this->input->post('administrator'),
				'cashier' => $this->input->post('cashier'),
				'inventory' => $this->input->post('inventory'),
				'supplier' => $this->input->post('supplier'),
				'customer' => $this->input->post('customer'),
				'user' => $this->input->post('user'),
				'report' => $this->input->post('report')
		  	);
		$this->users->update(array('user_id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function users_delete($id)
	{
		$this->users->delete_by_id($id); 
		echo json_encode(array("status" => TRUE));
	}


	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		///---------------password validation start

		if($this->input->post('password') != $this->input->post('repassword')){
			$data['inputerror'][] = 'repassword';
			$data['error_string'][] = 'Password mismatch';
			$data['status'] = FALSE;
		}

		if($this->input->post('password') == '' AND $this->input->post('id')== 0 ){
			$data['inputerror'][] = 'password';
			$data['error_string'][] = 'Password could not be empty';
			$data['status'] = FALSE;
		}
		if($this->input->post('repassword') == '' AND $this->input->post('id')== 0){
			$data['inputerror'][] = 'repassword';
			$data['error_string'][] = 'Password could not be empty';
			$data['status'] = FALSE;
		}
		///---------------password validation end

		if($this->input->post('username') == '')
		{
			$data['inputerror'][] = 'username';
			$data['error_string'][] = 'username is required and account be empty';
			$data['status'] = FALSE;
		}

		
		if($this->input->post('firstname') == '')
		{
			$data['inputerror'][] = 'firstname';
			$data['error_string'][] = 'First name is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('lastname') == '')
		{
			$data['inputerror'][] = 'lastname';
			$data['error_string'][] = 'Last name is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('middlename') == '')
		{
			$data['inputerror'][] = 'middlename';
			$data['error_string'][] = 'Middle name is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('contact') == '')
		{
			$data['inputerror'][] = 'contact';
			$data['error_string'][] = 'Contact Number is required';
			$data['status'] = FALSE;

		}

		if($this->input->post('email') == '')
		{
			$data['inputerror'][] = 'email';
			$data['error_string'][] = 'Email Address is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('address') == '')
		{
			$data['inputerror'][] = 'address';
			$data['error_string'][] = 'Addess is required';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}


	private function _validate_password()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('password') != $this->input->post('repassword')){
			$data['inputerror'][] = 'repassword';
			$data['error_string'][] = 'Password mismatch';
			$data['status'] = FALSE;
		}

		if($this->input->post('password') == '' AND $this->input->post('id')== 0 ){
			$data['inputerror'][] = 'password';
			$data['error_string'][] = 'Password could not be empty';
			$data['status'] = FALSE;
		}
		if($this->input->post('repassword') == '' AND $this->input->post('id')== 0){
			$data['inputerror'][] = 'repassword';
			$data['error_string'][] = 'Password could not be empty';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}


	
}
