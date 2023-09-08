<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_po_model extends MY_Model {

	protected $_table_name 		= 'mst_jenis_po';
	protected $_primary_key 	= 'id_jenis_po';
	protected $_order_by 		= 'nama_jenis_po';
	protected $_order_by_type 	= 'asc';

	public $rules_jenis_po = [
		'nama_jenis_po' => [
			'field' => 'nama_jenis_po',
			'label' => 'Nama Jenis_po',
			'rules' => 'trim|required|min_length[3]|max_length[50]'
		],
		'kode_jenis_po' => [
			'field' => 'kode_jenis_po',
			'label' => 'Kode Jenis_po',
			'rules' => 'trim|required|min_length[3]|max_length[50]|callback_check_jenis_po[kode_jenis_po]'
		],
	];

}

/* End of file Product_kate_model.php */
/* Location: ./application/modules/admin/models/Product_kate_model.php */