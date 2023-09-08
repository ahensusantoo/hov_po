<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_model extends MY_Model {

	protected $_table_name 		= 'po_cart';
	protected $_primary_key 	= 'id_cart_po';
	protected $_order_by 		= 'tgl_created_item_po';
	protected $_order_by_type 	= 'asc';

	public $rules_cart = [
		'nama_item_po' => [
			'field' => 'nama_item_po',
			'label' => 'Nama Item',
			'rules' => 'trim|required|max_length[50]'
		],
		'qty_po' => [
			'field' => 'qty_po',
			'label' => 'Jumlah',
			'rules' => 'trim|required'
		],
		'harga_po' => [
			'field' => 'harga_po',
			'label' => 'Harga',
			'rules' => 'trim|required'
		],
	];

}

/* End of file Product_kate_model.php */
/* Location: ./application/modules/admin/models/Product_kate_model.php */