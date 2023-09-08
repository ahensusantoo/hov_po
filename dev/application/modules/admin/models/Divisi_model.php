<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Divisi_model extends MY_Model {

	protected $_table_name 		= 'mst_divisi';
	protected $_primary_key 	= 'id_divisi';
	protected $_order_by 		= 'nama_divisi';
	protected $_order_by_type 	= 'asc';

	public $rules_divisi = [
		'nama_divisi' => [
			'field' => 'nama_divisi',
			'label' => 'Nama Divisi',
			'rules' => 'trim|required|min_length[3]|max_length[50]'
		],
		'kode_divisi' => [
			'field' => 'kode_divisi',
			'label' => 'Kode Divisi',
			'rules' => 'trim|required|min_length[3]|max_length[50]|callback_check_divisi[kode_divisi]'
		],
	];

}

/* End of file Product_kate_model.php */
/* Location: ./application/modules/admin/models/Product_kate_model.php */