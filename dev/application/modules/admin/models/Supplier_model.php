<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_model extends MY_Model {

	protected $_table_name 		= 'mst_supplier';
	protected $_primary_key 	= 'id_supplier';
	protected $_order_by 		= 'nama_supplier';
	protected $_order_by_type 	= 'asc';

	public $rules_supplier = [
		'nama_supplier' => [
			'field' => 'nama_supplier',
			'label' => 'Nama Supplier',
			'rules' => 'trim|required|min_length[3]|max_length[50]'
		],
		'kode_supplier' => [
			'field' => 'kode_supplier',
			'label' => 'Kode Supplier',
			'rules' => 'trim|required|min_length[3]|max_length[50]|callback_check_supplier[kode_supplier]'
		],
	];

}

/* End of file Product_kate_model.php */
/* Location: ./application/modules/admin/models/Product_kate_model.php */