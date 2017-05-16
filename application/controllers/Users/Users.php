<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

   public function index()
   {
      $this->load->view('template/dashboard_header');
      $this->load->view('template/dashboard_sidebar');
      $this->load->view('users/users_view');
      $this->load->view('template/dashboard_footer');
   }

 }