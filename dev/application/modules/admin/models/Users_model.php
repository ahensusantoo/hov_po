<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends MY_Model {
	
	protected $_table_name 		= 'users';
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

}

/* End of file Employee_model.php */
/* Location: ./application/modules/admin/models/Employee_model.php */