<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('customer/customer_model','person');
    }

   public function index()						/** Note: ayaw ilisi ang sequence sa page load sa page **/
   {
   	
   	  $this->load->helper('url');							
   													
   	  $data['title'] = 'Customer Data';					
      $this->load->view('template/dashboard_header');
      $this->load->view('customer/customer_view',$data);   //Kani lang ang ilisi kung mag dungag mo ug Page
      $this->load->view('template/dashboard_navigation');
      $this->load->view('template/dashboard_footer');

   }
   
    public function ajax_list()
    {
        $list = $this->person->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->lastname;
            $row[] = $person->firstname;
            $row[] = $person->middlename;
            $row[] = $person->address;
            $row[] = $person->city;
            $row[] = $person->contact;
            $row[] = $person->email;
            //add html for action
            $row[] = '<a class="btn btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$person->customer_id."'".')"><i class="fa fa-pencil-square-o"></i></a>
                  <a class="btn btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_person('."'".$person->customer_id."'".')"><i class="fa fa-trash"</i></a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->person->count_all(),
                        "recordsFiltered" => $this->person->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
    public function ajax_edit($id)
    {
        $data = $this->person->get_by_id($id);
        echo json_encode($data);
    }
 
    public function ajax_add()
    {
        $data = array(
                'lastname' => $this->input->post('lastname'),
                'firstname' => $this->input->post('firstname'),
                'middlename' => $this->input->post('middlename'),
                'address' => $this->input->post('address'),
                'city' => $this->input->post('city'),
                'contact' => $this->input->post('contact'),
                'email' => $this->input->post('email'),
            );
        $insert = $this->person->save($data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_update()
    {

        $data = array(
                'lastname' => $this->input->post('lastname'),
                'firstname' => $this->input->post('firstname'),
                'middlename' => $this->input->post('middlename'),
                'address' => $this->input->post('address'),
                'city' => $this->input->post('city'),
                'contact' => $this->input->post('contact'),
                'email' => $this->input->post('email'),
            );
        $this->person->update(array('customer_id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id)
    {
        $this->person->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

 }