<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {

   public function index()
   {
      $this->load->view('template/dashboard_header');
      $this->load->view('template/dashboard_sidebar');
      $this->load->view('inventory/inventory_view');
      $this->load->view('template/dashboard_footer');
   }
}
