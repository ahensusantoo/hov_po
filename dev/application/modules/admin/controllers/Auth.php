<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->model(['employee_model']);
	}

	public function index(){
		$data = [
			'title' => 'Form Login',
		];
		$this->load->view('auth/auth', $data, FALSE);
	}


	function proses_login(){
		$post = $this->input->post(null, true);

		if(!isset($post['login'])){
			$this->session->set_flashdata('danger', 'Maaf permintaan anda tidak dapat di proses!!!');
			redirect(site_url('login'), 'refresh');
			die();
		}

		$username 		= antiSqli($post['username']);
		$password 	= antiSqli($post['password']);
		
		$users = $this->db->query("SELECT * FROM mst_users WHERE (username_users='$username' OR email_users='$username') AND stts_rmv_users IS NULL")->row();

		if(empty($users)) {
			$this->session->set_flashdata('danger', 'username/password anda salah!!!');
			redirect(site_url('auth'),'refresh');
		}

		if ($users->stts_aktif_users != 1){
			$this->session->set_flashdata('danger', 'akun anda sudah dinonaktifkan, bisa hubungi admin untuk di aktifkan');
			redirect(site_url('auth'),'refresh');
		}

		if (!password_verify($password, $users->password_users)) {
		   	$this->session->set_flashdata('danger', 'username/password anda salah!!!');
			redirect(site_url('auth'),'refresh');
		}

		$data = [
            'id_users' 			=> $users->id_users,
            'nama_users' 		=> $users->nama_users,
            'fk_divisi' 		=> $users->fk_divisi,
            'username_users' 	=> $users->username_users,
            'email_users' 		=> $users->email_users,
            'logged_in' 		=> TRUE,
        ];

        $this->session->set_userdata($data);
    	// redirect('admin/dashboard','refresh');
    	redirect('admin/dashboard','refresh');
	}

	function logout(){
		$this->session->unset_userdata('id_users');
		$this->session->unset_userdata('nama_users');
		$this->session->unset_userdata('username_users');
		$this->session->unset_userdata('fk_divisi');
		$this->session->unset_userdata('email_users');
		$this->session->unset_userdata('logged_in');
	
		$this->session->set_flashdata('success', 'Berhasil Logout');
		redirect(site_url('login'),'refresh');
	}

}

/* End of file Auth.php */
/* Location: ./application/modules/staf/controllers/Auth.php */