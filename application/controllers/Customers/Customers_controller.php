<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers_controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('customers/customers_model','customers');
    }

   public function index()						/** Note: ayaw ilisi ang sequence sa page load sa page **/
   {
   	  $this->load->helper('url');							
   													
   	  $data['title'] = 'Customers List';					
      $this->load->view('template/dashboard_header');
      $this->load->view('customers/customers_view',$data);   //Kani lang ang ilisi kung mag dungag mo ug Page
      $this->load->view('template/dashboard_navigation');
      $this->load->view('template/dashboard_footer');

   }
   
    public function ajax_list()
    {
        $list = $this->customers->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $customers) {
            $no++;
            $row = array();
            $row[] = $customers->customer_id;
            $row[] = $customers->lastname;
            $row[] = $customers->firstname;
            $row[] = $customers->middlename;
            $row[] = $customers->address;
            $row[] = $customers->city;
            $row[] = $customers->contact;
            $row[] = $customers->email;
            //add html for action
            $row[] = '<a class="btn btn-info" href="javascript:void(0)" title="Edit" onclick="edit_customer('."'".$customers->customer_id."'".')"><i class="fa fa-pencil-square-o"></i></a>
                  <a class="btn btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_customer('."'".$customers->customer_id."'".')"><i class="fa fa-trash"></i></a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->customers->count_all(),
                        "recordsFiltered" => $this->customers->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
    public function ajax_edit($customer_id)
    {
        $data = $this->customers->get_by_id($customer_id);
        echo json_encode($data);
    }
 
    public function ajax_add()
    {
        $this->_validate();
        $data = array(
                'lastname' => $this->input->post('lastname'),
                'firstname' => $this->input->post('firstname'),
                'middlename' => $this->input->post('middlename'),
                'address' => $this->input->post('address'),
                'city' => $this->input->post('city'),
                'contact' => $this->input->post('contact'),
                'email' => $this->input->post('email'),
                'removed' => '0',
            );
        $insert = $this->customers->save($data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_update()
    {
        $this->_validate();
        $data = array(
                'lastname' => $this->input->post('lastname'),
                'firstname' => $this->input->post('firstname'),
                'middlename' => $this->input->post('middlename'),
                'address' => $this->input->post('address'),
                'city' => $this->input->post('city'),
                'contact' => $this->input->post('contact'),
                'email' => $this->input->post('email'),
            );
        $this->customers->update(array('customer_id' => $this->input->post('customer_id')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($customer_id)
    {
        $data = array(
                'removed' => '1'
            );
        $this->customers->update(array('customer_id' => $customer_id), $data);
        echo json_encode(array("status" => TRUE));
    }

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if($this->input->post('lastname') == '')
        {
            $data['inputerror'][] = 'lastname';
            $data['error_string'][] = 'Last name is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('firstname') == '')
        {
            $data['inputerror'][] = 'firstname';
            $data['error_string'][] = 'First name is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('middlename') == '')
        {
            $data['inputerror'][] = 'middlename';
            $data['error_string'][] = 'Middle name is required';
            $data['status'] = FALSE;
        }
        // validation for duplicates
        else
        {
            $new_name = $this->input->post('lastname') . $this->input->post('firstname') . $this->input->post('middlename');
            // check if name has a new value or not
            if ($this->input->post('current_name') != $new_name)
            {
                // validate if name already exist in the databaase table
                $duplicates = $this->customers->get_duplicates($this->input->post('lastname'), $this->input->post('firstname'), $this->input->post('middlename'));

                if ($duplicates->num_rows() != 0)
                {
                    $data['inputerror'][] = 'lastname';
                    $data['error_string'][] = 'Customer name (full name) is already registered';
                    $data['status'] = FALSE;
                }
            }
        }

        if($this->input->post('address') == '')
        {
            $data['inputerror'][] = 'address';
            $data['error_string'][] = 'Address is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('city') == '')
        {
            $data['inputerror'][] = 'city';
            $data['error_string'][] = 'City is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('contact') == '')
        {
            $data['inputerror'][] = 'contact';
            $data['error_string'][] = 'Contact is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('email') == '')
        {
            $data['inputerror'][] = 'email';
            $data['error_string'][] = 'Email is required';
            $data['status'] = FALSE;
        }        


        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }
 }