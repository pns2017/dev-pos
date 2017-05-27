<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supply_logs_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('supply_logs/supply_logs_model','supply_logs');
		$this->load->model('inventory/inventory_model','inventory');
		$this->load->model('suppliers/suppliers_model','suppliers');
	}

	public function index()
	{
		$this->load->helper('url');

		$data['title'] = 'Inventory';
		$this->load->view('template/dashboard_header');
        $this->load->view('supply_logs/supply_logs_view', $data);
        $this->load->view('template/dashboard_navigation');
        $this->load->view('template/dashboard_footer');

	}

	public function ajax_list()
	{
		$list = $this->supply_logs->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $supply_logs) {
			$no++;
			$row = array();
			$row[] = $supply_logs->supply_id;
			$row[] = $this->suppliers->get_supplier_name($supply_logs->supplier_id);
			$row[] = $supply_logs->sku;
			$row[] = $this->inventory->get_product_name($supply_logs->sku);
			$row[] = $supply_logs->quantity;
			$row[] = $supply_logs->expense;
			$row[] = $supply_logs->date_time;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="View Product" onclick="view_product('."'".$supply_logs->sku."'".')"><i class="fa fa-eye"></i> View Product</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->supply_logs->count_all(),
						"recordsFiltered" => $this->supply_logs->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
}
