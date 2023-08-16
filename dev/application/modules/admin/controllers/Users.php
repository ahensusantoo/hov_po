<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends Admin_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('users_model');
	}

	public function index(){
		$data =[
			'title'    			=> 'Users',
		];

		$this->template->load('template_admin', set_url('system/users/index'), $data);	
	}

	function get_record(){
		global $SConfig;
		if(!$this->input->is_ajax_request()){
			$msg = [
				'status' => false,
				'pesan' => 'Permintaan anda tidak dapat diproses',
			];
			echo json_encode($msg); die();
		}
		
		// if(@$_GET['page'] != "" || !empty($_GET['page'])) {
		// 	$offset = ($_GET['page'] - 1) * $SConfig->_limit_perpage;
		// 	$hal_aktif = $_GET['page'];
		// 	// print_r($offset); die();
		// }else{
		// 	$offset 	= 0;
		// 	$hal_aktif = 1;
		// }
	
		$where = [
			// 'stts_aktif_users' => TRUE,
			'stts_rmv_users' => NULL
		];

		// if(@$_GET['pencarian'] != "" || !empty($_GET['pencarian'])) { 
		// 	$cari = "kode_kategori_manual LIKE '%$_GET[pencarian]%' OR nama_kategori LIKE '%$_GET[pencarian]%' ";
		// }
		

		$total_row 	= $this->users_model->count($where, @$cari);
		$record 	= $this->users_model->get_by($where, $SConfig->_limit_perpage, 0, false, null, @$cari, null, "username_users asc");
		// print_r("<pre>"); print_r($record); die();

		$data =[
			'title' 		=> 'Manajemen Usurs',
			'total_rows' 	=> $total_row,
			'perpage' 		=> $SConfig->_limit_perpage,
			'record' 		=> $record,
			// 'hal_aktif' 	=> $hal_aktif,
			'jumlah_hal' 	=> ceil($total_row/$SConfig->_limit_perpage),
		];

		echo json_encode($data);
		
	}


	function add_update(){
		$post = $this->input->post(null, true);
		if(!$this->input->is_ajax_request()){
			$msg = [
				'status' => false,
				'pesan' => 'Permintaan anda tidak dapat diproses',
			];
			echo json_encode($msg); die();
		}

		$rules_users = $this->users_model->rules_users;
			$this->form_validation->set_rules(['password' => [
													'field' => 'password',
													'label' => 'Password',
													'rules' => 'trim|'.(empty($post['id']) ? 'required':null).'|min_length[5]|max_length[30]'
												],
												'passwordConf' => [
													'field' => 'passwordConf',
													'label' => 'Password Confirmation',
													'rules' => 'trim|'.(empty($post['id']) ? 'required':null).'|matches[password]'
												]]);
		$this->form_validation->set_rules($rules_users);
		$this->form_validation->set_message($this->mesage);
		$this->form_validation->set_error_delimiters('<div class="invalid-feedback">', '</div>');
		if($this->form_validation->run() == TRUE) {
			$send_model = [
				'nama_users' => $post['nama'],
				'username_users' => $post['username'],
				'email_users' => $post['email'],
				'stts_aktif_users' => (isset($post['stts_aktif']) ? 1:0),
			];
			if( empty($post['id']) ){
				//proses Insert
				$send_model['id_users'] 	= $this->users_model->get_id_uuid();
				$send_model['password_users'] = password_hash($post['password'], PASSWORD_DEFAULT);
				$send_model['created_by_users'] = $_SESSION['id_users'];

				$query = $this->users_model->insert($send_model);
			}else{
				//proses Update
				$count = $this->users_model->count(['id_perusahaan' => $id_dekripsi]);
				if($count > 0 ){
					$query = $this->users_model->insertUpdatePerusahaan($post);
				}else{
					redirect(set_url('instansi'),'refresh');
				}

			}

			if($query){
				$msg = [
					'status' => true,
					'url'    => base_url(set_url('users')),
					'pesan'  => 'Data berhasil di '.(empty($post['id']) ? 'tambah' : 'edit')
				];
			}else{
				$msg = [
					'status' => false,
					'url'    => base_url(set_url('users')),
					'pesan'  => 'Data gagal di '.(empty($post['id']) ? 'tambah' : 'edit')
				];
			}
		} else {
			//validation salah
			$msg = [
				'status' => false, 
				'errors' => $this->form_validation->error_array(),
			];
		}
		echo json_encode($msg);
	}


	function check_users($value, $index){
		$post = $this->input->post(null, true);
		$data = ['stts_aktif_users' => true, 'stts_rmv_users' => null, 'username_users' => $value];
		
		$check_data = $this->users_model->count($data);
		if($check_data > 0){
			$this->form_validation->set_message('check_users', '%s sudah digunakan, silahkan ganti');
			return FALSE;
		}else{
			return TRUE;
		}
	}

}

/* End of file Users.php */
/* Location: ./application/modules/admin/controllers/Users.php */