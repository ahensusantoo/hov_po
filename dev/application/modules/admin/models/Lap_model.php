<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lap_model extends MY_Model {

	protected $_table_name 		= 'transaksi';
	protected $_primary_key 	= 'tanggal';
	protected $_order_by 		= 'tanggal';
	protected $_order_by_type 	= 'asc'; 	

}

/* End of file Lap_model.php */
/* Location: ./application/modules/admin/models/Lap_model.php */