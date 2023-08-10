<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends Admin_Controller {

	public function index(){
		$data =[
			'title'    			=> 'Users',
		];

		$this->template->load('template_admin', set_url('system/users/index'), $data);	
	}

}

/* End of file Users.php */
/* Location: ./application/modules/admin/controllers/Users.php */