<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {

   public function index()
   {
      $this->load->view('template/dashboard_header');
      $this->load->view('template/dashboard_sidebar');
      $this->load->view('report/report_view');
      $this->load->view('template/dashboard_footer');
   }

   public function daily_report(){

   	  $this->load->view('template/dashboard_header');
      $this->load->view('template/dashboard_sidebar');
      $this->load->view('report/daily_report_view');
      $this->load->view('template/dashboard_footer');

   }

   public function weekly_report(){

   	  $this->load->view('template/dashboard_header');
      $this->load->view('template/dashboard_sidebar');
      $this->load->view('report/weekly_report_view');
      $this->load->view('template/dashboard_footer');
   }
   public function monthly_report(){

   	  $this->load->view('template/dashboard_header');
      $this->load->view('template/dashboard_sidebar');
      $this->load->view('report/monthly_report_view');
      $this->load->view('template/dashboard_footer');
   }
   public function yearly_report(){

   	  $this->load->view('template/dashboard_header');
      $this->load->view('template/dashboard_sidebar');
      $this->load->view('report/yearly_report_view');
      $this->load->view('template/dashboard_footer');
   }
}
