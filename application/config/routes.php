<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'login_controller/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;


// $route['log-user'] = 'login_controller/login_validation';


$route['dashboard'] = 'dashboard_controller/index';
$route['user-logout'] = 'login_controller/logout';

//************************************** CUSTOMER ROUTES
//**************************************

$route['customer-page'] = 'customer/customer_controller';

$route['showlist-customer'] = 'customer/customer_controller/ajax_list';

$route['edit-customer/(:num)'] = 'customer/customer_controller/ajax_edit/$1';

$route['add-customer/(:num)'] = 'customer/customer_controller/ajax_add/$1';

$route['update-customer/(:num)'] = 'customer/customer_controller/ajax_update/$1';

$route['delete-customer/(:num)'] = 'customer/customer_controller/ajax_delete/$1';


//************************************** SUPPLIER
//**************************************
$route['supplier-page'] = 'supplier/supplier_controller/index';

$route['showlist-supplier'] = 'supplier/supplier_controller/ajax_list';

$route['edit-supplier/(:num)'] = 'supplier/supplier_controller/ajax_edit/$1';

$route['add-supplier/(:num)'] = 'supplier/supplier_controller/ajax_add/$1';

$route['update-supplier/(:num)'] = 'supplier/supplier_controller/ajax_update/$1';

$route['delete-supplier/(:num)'] = 'supplier/supplier_controller/ajax_delete/$1';


//************************************** USERS
//**************************************

$route['users-page'] = 'users/users_controller/users_list';
$route['users/delete/(:any)'] = 'users_controller/delete/$1';
$route['users/(:any)'] = 'users_controller/view/$1';