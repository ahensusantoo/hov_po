<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends MY_Model {
	
	protected $_table_name 		= 'mst_users';
	protected $_primary_key 	= 'id_users';
	protected $_order_by 		= 'username_users';
	protected $_order_by_type 	= 'asc';

	public $rules_users = [
		'nama' => [
			'field' => 'nama',
			'label' => 'Nama Lengkap',
			'rules' => 'trim|required|min_length[3]|max_length[50]'
		],
		'username' => [
			'field' => 'username',
			'label' => 'Username',
			'rules' => 'trim|required|min_length[3]|max_length[50]|callback_check_users[username]'
		],
		'email' => [
			'field' => 'email',
			'label' => 'E-mail',
			'rules' => 'trim|max_length[100]|valid_email'
		],
	];


	function get_users($where = NULL, $limit = NULL, $offset = NULL, $single = FALSE, $select = NULL, $cari_string = NULL, $enkripsi = null, $order_data = null){
		$this->db->join('mst_divisi b', 'mst_users.fk_divisi = b.id_divisi');

		return parent::get_by($where, $limit, $offset, $single, $select, $cari_string, $enkripsi, $order_data);
	}

	function count_users($where = NULL, $cari_string=null){
		$this->db->join('mst_divisi b', 'mst_users.fk_divisi = b.id_divisi');
		return parent::count($where, $cari_string);
	}


}

/* End of file Employee_model.php */
/* Location: ./application/modules/admin/models/Employee_model.php */