<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('dashboard_model');
	}

	public function index(){
		$data =[
			'title'    			=> 'Dashboard',
		];

		$this->template->load('template_admin', set_url('dashboard'), $data);
		// $this->load->view('template_admin', $data, FALSE);
	}


	

}

/* End of file Dashboard.php */
/* Location: ./application/modules/admin/controllers/Dashboard.php */