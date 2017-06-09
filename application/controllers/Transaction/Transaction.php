<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {

   public function index()
   {
   	   $user = $this->session->username;
	   	if($user == ''){
	   		redirect('/');
	   	}
	   	else{

      $this->load->view('template/dashboard_header');
      $this->load->view('template/dashboard_sidebar');
      $this->load->view('transaction/transaction_view');
      $this->load->view('template/dashboard_footer');
   }
 }
}
