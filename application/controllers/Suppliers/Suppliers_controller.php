<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suppliers_controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('suppliers/suppliers_model','suppliers');
    }

   public function index()						/** Note: ayaw ilisi ang sequence sa page load sa page **/
   { 	
    $user = $this->session->username;
    if($user == ''){
        redirect('/');
    }
    else{

   	  $this->load->helper('url');							
   													
   	  $data['title'] = 'Suppliers List';					
      $this->load->view('template/dashboard_header');
      $this->load->view('suppliers/suppliers_view',$data);   //Kani lang ang ilisi kung mag dungag mo ug Page
      $this->load->view('template/dashboard_navigation');
      $this->load->view('template/dashboard_footer');
    }
   }

    public function ajax_list()
    {
        $list = $this->suppliers->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $suppliers) {
            $no++;
            $row = array();
            $row[] = $suppliers->supplier_id;
            $row[] = $suppliers->name;
            $row[] = $suppliers->address;
            $row[] = $suppliers->city;
            $row[] = $suppliers->contact;
            $row[] = $suppliers->email;
            $row[] = $suppliers->status;
            $row[] = $suppliers->products;
            //add html for action
            $row[] = '<a class="btn btn-info" href="javascript:void(0)" title="Edit" onclick="edit_supplier('."'".$suppliers->supplier_id."'".')"><i class="fa fa-pencil-square-o"></i></a>
                  <a class="btn btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_supplier('."'".$suppliers->supplier_id."'".')"><i class="fa fa-trash"></i></a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->suppliers->count_all(),
                        "recordsFiltered" => $this->suppliers->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
    public function ajax_edit($supplier_id)
    {
        $data = $this->suppliers->get_by_id($supplier_id);
        echo json_encode($data);
    }
 
    public function ajax_add()
    {
        $this->_validate();
        $data = array(
                'name' => $this->input->post('name'),
                'address' => $this->input->post('address'),
                'city' => $this->input->post('city'),
                'contact' => $this->input->post('contact'),
                'email' => $this->input->post('email'),
                'status' => $this->input->post('status'),
                'products' => $this->input->post('products'),
                'removed' => '0',
            );
        $insert = $this->suppliers->save($data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_update()
    {
        $this->_validate();
        $data = array(
                'name' => $this->input->post('name'),
                'address' => $this->input->post('address'),
                'city' => $this->input->post('city'),
                'contact' => $this->input->post('contact'),
                'email' => $this->input->post('email'),
                'status' => $this->input->post('status'),
                'products' => $this->input->post('products'),
            );
        $this->suppliers->update(array('supplier_id' => $this->input->post('supplier_id')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($supplier_id)
    {
        $data = array(
                'removed' => '1'
            );
        $this->suppliers->update(array('supplier_id' => $supplier_id), $data);
        echo json_encode(array("status" => TRUE));
    }

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if($this->input->post('name') == '')
        {
            $data['inputerror'][] = 'name';
            $data['error_string'][] = 'Supplier name is required';
            $data['status'] = FALSE;
        }
        // validation for duplicates
        else
        {
            $new_name = $this->input->post('name');
            // check if name has a new value or not
            if ($this->input->post('current_name') != $new_name)
            {
                // validate if name already exist in the databaase table
                $duplicates = $this->suppliers->get_duplicates($this->input->post('name'));

                if ($duplicates->num_rows() != 0)
                {
                    $data['inputerror'][] = 'name';
                    $data['error_string'][] = 'Supplier name is already registered';
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

        if($this->input->post('status') == '')
        {
            $data['inputerror'][] = 'status';
            $data['error_string'][] = 'Status is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('products') == '')
        {
            $data['inputerror'][] = 'products';
            $data['error_string'][] = 'Products is required';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }
 }