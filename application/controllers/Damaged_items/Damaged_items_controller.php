<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Damaged_items_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('damaged_items/damaged_items_model','damaged_items');
		$this->load->model('inventory/inventory_model','inventory');
	}

	public function index()
	{
   	$user = $this->session->username;
   	if($user == ''){
   		redirect('/');
   	}
   	else{

		$this->load->helper('url');

		$data['title'] = 'Inventory';
		$this->load->view('template/dashboard_header');
        $this->load->view('damaged_items/damaged_items_view', $data);
        $this->load->view('template/dashboard_navigation');
        $this->load->view('template/dashboard_footer');
	}
	}
	public function ajax_list()
	{
		$list = $this->damaged_items->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $damaged_items) {
			$no++;
			$row = array();
			$row[] = $damaged_items->damaged_id;
			$row[] = $damaged_items->sku;
			$row[] = $this->inventory->get_product_name($damaged_items->sku);
			$row[] = $damaged_items->quantity;
			$row[] = $damaged_items->remarks;
			$row[] = $damaged_items->date_time;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="View Product" onclick="view_product('."'".$damaged_items->sku."'".')"><i class="fa fa-eye"></i> View Product</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->damaged_items->count_all(),
						"recordsFiltered" => $this->damaged_items->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
}
