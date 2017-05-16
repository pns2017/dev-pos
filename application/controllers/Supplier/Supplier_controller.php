<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('supplier/supplier_model','supply');
    }

   public function index()						/** Note: ayaw ilisi ang sequence sa page load sa page **/
   {
   	
   	  $this->load->helper('url');							
   													
   	  $data['title'] = 'Supplier Data';					
      $this->load->view('template/dashboard_header');
      $this->load->view('supplier/supplier_view',$data);   //Kani lang ang ilisi kung mag dungag mo ug Page
      $this->load->view('template/dashboard_navigation');
      $this->load->view('template/dashboard_footer');

   }
    public function ajax_list()
    {
        $list = $this->supply->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $supply) {
            $no++;
            $row = array();
            $row[] = $supply->name;
            $row[] = $supply->address;
            $row[] = $supply->city;
            $row[] = $supply->contact;
            $row[] = $supply->email;
            $row[] = $supply->status;
            $row[] = $supply->products;
            //add html for action
            $row[] = '<a class="btn btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_supplier('."'".$supply->supplier_id."'".')"><i class="fa fa-pencil-square-o"></i></a>
                  <a class="btn btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_supplier('."'".$supply->supplier_id."'".')"><i class="fa fa-trash"</i></a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->supply->count_all(),
                        "recordsFiltered" => $this->supply->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
    public function ajax_edit($id)
    {
        $data = $this->supply->get_by_id($id);
        echo json_encode($data);
    }
 
    public function ajax_add()
    {

        $data = array(
                'name' => $this->input->post('name'),
                'address' => $this->input->post('address'),
                'city' => $this->input->post('city'),
                'contact' => $this->input->post('contact'),
                'email' => $this->input->post('email'),
                'status' => $this->input->post('status'),
                'products' => $this->input->post('products'),
            );
        $insert = $this->supply->save($data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_update()
    {

        $data = array(
                'name' => $this->input->post('name'),
                'address' => $this->input->post('address'),
                'city' => $this->input->post('city'),
                'contact' => $this->input->post('contact'),
                'email' => $this->input->post('email'),
                'status' => $this->input->post('status'),
                'products' => $this->input->post('products'),
            );
        $this->supply->update(array('supplier_id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id)
    {
        $this->supply->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }


 }