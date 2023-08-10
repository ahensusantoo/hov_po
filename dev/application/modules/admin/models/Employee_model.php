<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_model extends MY_Model {
	
	protected $_table_name 		= 'merchant_employee';
	protected $_primary_key 	= 'id_merchant_employee';
	protected $_order_by 		= 'id_merchant_employee';
	protected $_order_by_type 	= 'desc'; 	

}

/* End of file Employee_model.php */
/* Location: ./application/modules/admin/models/Employee_model.php */