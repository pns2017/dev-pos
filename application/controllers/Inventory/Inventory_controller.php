<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('inventory/inventory_model','inventory');
		$this->load->model('supply_logs/supply_logs_model','supply_logs');
		$this->load->model('suppliers/suppliers_model','suppliers');
		$this->load->model('damaged_items/damaged_items_model','damaged_items');
	}

	public function index()
	{
		   	$user = $this->session->username;
		   	if($user == ''){
		   		redirect('/');
		   	}
		   	else{
		// get suppliers list for dropdown on the add stock form
		$data['suppliers'] = $this->suppliers->get_suppliers();

		$this->load->helper('url');

		$data['title'] = 'Inventory';
		$this->load->view('template/dashboard_header');
        $this->load->view('inventory/inventory_view', $data);
        $this->load->view('template/dashboard_navigation');
        $this->load->view('template/dashboard_footer');
     }
	}

	public function ajax_list()
	{
		$list = $this->inventory->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $inventory) {
			$no++;
			$row = array();
			$row[] = $inventory->sku;
			$row[] = $inventory->name;
			$row[] = $inventory->description;
			$row[] = $inventory->category;
			$row[] = $inventory->unit_price;
			$row[] = $inventory->unit_cost;
			$row[] = $inventory->in_stock;
			$row[] = $inventory->unit_sold;
			$row[] = $inventory->reorder_point;


			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="View Product" onclick="view_product('."'".$inventory->sku."'".')"><i class="fa fa-eye"></i> </a>
					<a class="btn btn-sm btn-success" href="javascript:void(0)" title="Add Stock" onclick="add_stock('."'".$inventory->sku."'".')"><i class="fa fa-plus-circle"></i> </a>
					<a class="btn btn-sm btn-info" href="javascript:void(0)" title="Edit" onclick="edit_product('."'".$inventory->sku."'".')"><i class="fa fa-pencil-square-o"></i> </a>
					<a class="btn btn-sm btn-warning" href="javascript:void(0)" title="Damaged Stock" onclick="damaged_items('."'".$inventory->sku."'".')"><i class="fa fa-chain-broken"></i> </a>
					  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_product('."'".$inventory->sku."'".')"><i class="fa fa-trash-o"></i> </a>'
				  ;
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->inventory->count_all(),
						"recordsFiltered" => $this->inventory->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($sku)
	{
		$data = $this->inventory->get_by_id($sku);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		$data = array(
				'name' => $this->input->post('name'),
				'description' => $this->input->post('description'),
				'category' => $this->input->post('category'),
				'unit_price' => $this->input->post('unit_price'),
				'unit_cost' => $this->input->post('unit_cost'),
				'in_stock' => 0,
				'unit_sold' => 0,
				'unit_damaged' => 0,
				'unit_lost' => 0,
				'reorder_point' => $this->input->post('reorder_point'),
				'imgpath' => 'none.jpg',
				'removed' => '0',
			);
		$insert = $this->inventory->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
				'name' => $this->input->post('name'),
				'description' => $this->input->post('description'),
				'category' => $this->input->post('category'),
				'unit_price' => $this->input->post('unit_price'),
				'unit_cost' => $this->input->post('unit_cost'),
				'reorder_point' => $this->input->post('reorder_point')
			);
		$this->inventory->update(array('sku' => $this->input->post('sku')), $data);
		echo json_encode(array("status" => TRUE));
	}

	// adding stock method for each product
	public function ajax_add_stock()
	{
		$this->_validate_stock();

		$cost = $this->input->post('cost');
		$quantity = $this->input->post('quantity');
		$expense = $cost * $quantity;

		$data = array(
				'supplier_id' => $this->input->post('supplier_id'),
				'sku' => $this->input->post('sku'),
				'quantity' => $quantity,
				'expense' => $expense,
				'date_time' => date("Y-m-d H:i:s")
			);
		$this->supply_logs->save($data);

		$this->inventory->update_stock($this->input->post('sku'), $this->input->post('quantity'));

		echo json_encode(array("status" => TRUE));
	}

	// damaged items method for each product
	public function ajax_damaged_items()
	{
		$this->_validate_damaged();

		$data = array(
				'sku' => $this->input->post('sku'),
				'quantity' => $this->input->post('quantity'),
				'remarks' => $this->input->post('remarks'),
				'date_time' => date("Y-m-d H:i:s")
			);
		$this->damaged_items->save($data);

		// multiply by negative 1 to get a negative result to minus the stock
		$this->inventory->update_stock($this->input->post('sku'), $this->input->post('quantity') * -1);
		// update unit_damaged for product on inventory table
		$this->inventory->update_damaged($this->input->post('sku'), $this->input->post('quantity'));

		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($sku)
	{
		$data = array(
				'removed' => '1'
			);
		$this->inventory->update(array('sku' => $sku), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function do_upload() 
	{
         $config['upload_path']   = './uploads/'; 
         $config['allowed_types'] = 'jpg'; 
         $config['max_size']      = 100; 
         $config['max_width']     = 1024; 
         $config['max_height']    = 768;
         $new_name = $this->input->post('sku') . '.jpg';
		 $config['file_name'] = $new_name;
		 $config['overwrite'] = TRUE;

         $this->load->library('upload', $config);
			
         if ( ! $this->upload->do_upload('userfile')) // upload fail
         {
            $error = array('error' => $this->upload->display_errors()); 
            $this->load->view('upload_form', $error);
         }
         else // upload success
         { 
            $data = array('upload_data' => $this->upload->data()); 
            
            $data = array(
				'imgpath' => $new_name
			);
			$this->inventory->update(array('sku' => $this->input->post('sku')), $data);
			redirect('/inventory-page');
         } 
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
			$data['error_string'][] = 'Product name is required';
			$data['status'] = FALSE;
		}
		else
		{
			// check if name has a new value or not
			if ($this->input->post('current_name') != $this->input->post('name'))
			{
				// validate if name already exist in the databaase table
				$duplicates = $this->inventory->get_duplicates($this->input->post('name'));

				if ($duplicates->num_rows() != 0)
				{
					$data['inputerror'][] = 'name';
					$data['error_string'][] = 'Product name is already registered';
					$data['status'] = FALSE;
				}
			}
		}

		if($this->input->post('description') == '')
		{
			$data['inputerror'][] = 'description';
			$data['error_string'][] = 'Product description is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('category') == '')
		{
			$data['inputerror'][] = 'category';
			$data['error_string'][] = 'Product category is required';
			$data['status'] = FALSE;
		}

		// initialize unit price and unit cost for validation
		$price = 0;
		$cost = 0;

		if($this->input->post('unit_price') == '')
		{
			$data['inputerror'][] = 'unit_price';
			$data['error_string'][] = 'Unit price is required';
			$data['status'] = FALSE;
		}
		// if not float
		else if(!is_float($this->input->post('unit_price') + 0))
		{
			$data['inputerror'][] = 'unit_price';
			$data['error_string'][] = 'Unit price should be a monetary value';
			$data['status'] = FALSE;	
		}
		// if less than 1 which is min
		else if($this->input->post('unit_price') < 1)
		{
			$data['inputerror'][] = 'unit_price';
			$data['error_string'][] = 'Unit price should be greater than 0';
			$data['status'] = FALSE;	
		}
		// assign value to variable
		else
		{
			$price = $this->input->post('unit_price');
		}

		if($this->input->post('unit_cost') == '')
		{
			$data['inputerror'][] = 'unit_cost';
			$data['error_string'][] = 'Unit cost is required';
			$data['status'] = FALSE;
		}
		// if not float
		else if(!is_float($this->input->post('unit_cost') + 0))
		{
			$data['inputerror'][] = 'unit_cost';
			$data['error_string'][] = 'Unit cost should be a monetary value';
			$data['status'] = FALSE;	
		}
		// if less than 1 which is min
		else if($this->input->post('unit_cost') < 1)
		{
			$data['inputerror'][] = 'unit_cost';
			$data['error_string'][] = 'Unit cost should be greater than 0';
			$data['status'] = FALSE;	
		}
		// assign value to variable
		else
		{
			$cost = $this->input->post('unit_cost');
		}

		// check if price and cost inputs are valid (price should be greater than cost)
		if ($price != 0 && $cost != 0 && $price <= $cost)
		{
			$data['inputerror'][] = 'unit_price';
			$data['error_string'][] = 'Unit price should be greater than unit cost to profit';
			$data['status'] = FALSE;		
		}


		if($this->input->post('reorder_point') == '')
		{
			$data['inputerror'][] = 'reorder_point';
			$data['error_string'][] = 'Reorder point is required';
			$data['status'] = FALSE;
		}
		// if not int
		else if (!is_numeric($this->input->post('reorder_point')))
		{
			$data['inputerror'][] = 'reorder_point';
			$data['error_string'][] = 'Reorder point should be an integer';
			$data['status'] = FALSE;	
		}
		// if less than 1 which is min
		else if ($this->input->post('reorder_point') < 1)
		{
			$data['inputerror'][] = 'reorder_point';
			$data['error_string'][] = 'Reorder point should be greater than 0';
			$data['status'] = FALSE;	
		}


		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
	// error trapping (form validation) for add stock form
	private function _validate_stock()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('supplier_id') == '')
		{
			$data['inputerror'][] = 'supplier_id';
			$data['error_string'][] = 'Please select supplier';
			$data['status'] = FALSE;
		}

		// validation for quantity
		if($this->input->post('quantity') == '')
		{
			$data['inputerror'][] = 'quantity';
			$data['error_string'][] = 'Quantity is required';
			$data['status'] = FALSE;
		}
		else
		{
			// if not a number
			if (!is_numeric($this->input->post('quantity')))
			{
				$data['inputerror'][] = 'quantity';
				$data['error_string'][] = 'Quantity should be a number';
				$data['status'] = FALSE;	
			}
			else
			{
				// if not int
				if (!is_int($this->input->post('quantity') + 0))
				{
					$data['inputerror'][] = 'quantity';
					$data['error_string'][] = 'Quantity should be an integer';
					$data['status'] = FALSE;	
				}
				else
				{
					// if equal to 0
					if ($this->input->post('quantity') == 0)
					{
						$data['inputerror'][] = 'quantity';
						$data['error_string'][] = 'Quantity should not be equal to 0';
						$data['status'] = FALSE;	
					}
					// if less than 0 (negative value)
					else if ($this->input->post('quantity') < 0)
					{
						// validate if allowed (stock out should not be greater than the current in stock value)
						$in_stock = $this->inventory->get_in_stock($this->input->post('sku'));

						// if greater than the current in stock value
						if ($this->input->post('quantity') < $in_stock * -1)
						{
							$data['inputerror'][] = 'quantity';
							$data['error_string'][] = 'Subtracting In Stock should not result in having a value less than 0';
							$data['status'] = FALSE;	
						}
					}
				}
			}
		}	

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
	// error trapping (form validation) for damaged items form
	private function _validate_damaged()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('remarks') == '')
		{
			$data['inputerror'][] = 'remarks';
			$data['error_string'][] = 'Remarks input is required';
			$data['status'] = FALSE;
		}

		// validation for quantity
		if($this->input->post('quantity') == '')
		{
			$data['inputerror'][] = 'quantity';
			$data['error_string'][] = 'Quantity is required';
			$data['status'] = FALSE;
		}
		else
		{
			// if not a number
			if (!is_numeric($this->input->post('quantity')))
			{
				$data['inputerror'][] = 'quantity';
				$data['error_string'][] = 'Quantity should be a number';
				$data['status'] = FALSE;	
			}
			else
			{
				// if not int
				if (!is_int($this->input->post('quantity') + 0))
				{
					$data['inputerror'][] = 'quantity';
					$data['error_string'][] = 'Quantity should be an integer';
					$data['status'] = FALSE;	
				}
				else
				{
					// if equal to 0
					if ($this->input->post('quantity') == 0)
					{
						$data['inputerror'][] = 'quantity';
						$data['error_string'][] = 'Quantity should not be equal to 0';
						$data['status'] = FALSE;	
					}
					// if less than 0 (negative value) -  for damaged data alteration
					else if ($this->input->post('quantity') < 0)
					{
						// validate if allowed (damaged fix/edit should not be greater than the current unit damaged value)
						$unit_damaged = $this->inventory->get_unit_damaged($this->input->post('sku'));

						// if greater than the current unit damaged value
						if ($this->input->post('quantity') < $unit_damaged * -1)
						{
							$data['inputerror'][] = 'quantity';
							$data['error_string'][] = 'Subtracting Unit Damaged should not result in having a value less than 0';
							$data['status'] = FALSE;	
						}
					}
					// if more than 0 (positive value)
					else
					{
						// validate if allowed (stock out should not be greater than the current in stock value)
						$in_stock = $this->inventory->get_in_stock($this->input->post('sku'));

						// if greater than the current in stock value
						if ($this->input->post('quantity') > $in_stock)
						{
							$data['inputerror'][] = 'quantity';
							$data['error_string'][] = 'Quantity should not be greater than the current In Stock value';
							$data['status'] = FALSE;	
						}							
					}
				}
			}
		}	

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}	
}