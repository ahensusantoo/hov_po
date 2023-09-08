<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends Admin_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('users_model');
	}

	public function index(){
		$this->load->model('divisi_model');
		$divisi = $this->divisi_model->get_by(['stts_aktif_divisi' => true, 'stts_rmv_divisi'=>null], null, null, false);
		$data =[
			'title'    			=> 'Users',
			'divisi'    		=> $divisi,
		];

		$this->template->load('template_admin', set_url('system/users/index'), $data);	
	}

	function get_record(){
		global $SConfig;
		$post = $this->input->post(null, true);
		if(!$this->input->is_ajax_request()){
			$msg = [
				'status' => false,
				'pesan' => 'Permintaan anda tidak dapat diproses',
			];
			echo json_encode($msg); die();
		}
		$where = [
			// 'stts_aktif_users' => TRUE,
			'stts_rmv_users' => NULL
		];
		if(!empty($post['id'])){
			$id = $post['id'];
			$count = $this->users_model->count(['id_users' => $id]);
			if($count < 1 ){
				echo json_encode([
					'status' => false,
					'url' 	=> '',
					'pesan' => 'Data yang di pilih tidak dapat di temukan, silahkan refresh ulang halaman'
				]);
				die(); exit();
			}
			$where['id_users'] = $id;
			$record = $this->users_model->get_users($where, null, null, true, null, null, null);
			echo json_encode([
				'status' => true,
				'record' => $record,
			]);
			die();
		}else{
			if(!empty($post['page']) && $post['page'] > 1 ){
				$offset = ($post['page'] - 1) * $SConfig->_limit_perpage;
				$page = $post['page'];
			}else{
				$offset 	= null;
				$page = 1;
			}

			if(@$post['search'] != "" || !empty($post['search'])) { 
				$search = $post['search'];
				$cari = "nama_users LIKE '%$search%' OR username_users LIKE '%$search%' ";
			}

			// print_r("<pre>"); print_r($post); die();

			$total_row 	= $this->users_model->count_users($where, @$cari);
			$record 	= $this->users_model->get_users($where, $SConfig->_limit_perpage, $offset, false, null, @$cari, null, "username_users asc");
			// print_r("<pre>"); print_r($total_row); die();
			$data =[
				'title' 		=> 'Manajemen Usurs',
				'total_rows' 	=> $total_row,
				'perpage' 		=> $SConfig->_limit_perpage,
				'record' 		=> $record,
				'page' 			=> $page,
				'jumlah_hal' 	=> ceil($total_row/$SConfig->_limit_perpage),
			];

			echo json_encode($data);
			die();
		}
		
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
				'fk_divisi' => $post['divisi'],
				'stts_aktif_users' => (isset($post['stts_aktif']) ? 1:0),
				'updated_by_users' => $_SESSION['id_users'],
			];
			$id = $post['id'];
			if( empty($id) ){
				//proses Insert
				$send_model['id_users'] 	= $this->users_model->get_id_uuid();
				$send_model['password_users'] = password_hash($post['password'], PASSWORD_DEFAULT);

				$query = $this->users_model->insert($send_model);
			}else{
				//proses Update
				$count = $this->users_model->count(['id_users' => $id]);
				if($count < 1 ){
					$msg = [
						'status' => false,
						'pesan' => 'Permintaan anda tidak dapat diproses',
					];
					echo json_encode($msg); die();
					
				}
				if(!empty($post['password'])){
					$send_model['password_users'] = password_hash($post['password'], PASSWORD_DEFAULT);
				}
				$query = $this->users_model->update($send_model, ['id_users'=>$id]);
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


	function delete_record(){
		$post = $this->input->post(null, true);
		if(!$this->input->is_ajax_request()){
			$msg = [
				'status' => false,
				'pesan' => 'Permintaan anda tidak dapat diproses',
			];
			echo json_encode($msg); die();
		}
		$id = $post['id'];
		$count = $this->users_model->count(['id_users' => $id]);
		if($count < 1 ){
			$msg = [
				'status' => false,
				'pesan' => 'Permintaan anda tidak dapat diproses',
			];
			echo json_encode($msg); die();
			
		}
		$send_model = [
			'stts_rmv_users' => date('Y-m-d H:i:s'),
			'rmv_by_users' 	 => $_SESSION['id_users'],
		];
		$query = $this->users_model->update($send_model, ['id_users'=>$id]);

		if($query){
			$msg = [
				'status' => true,
				'url'    => base_url(set_url('users')),
				'pesan'  => 'Data berhasil di hapus'
			];
		}else{
			$msg = [
				'status' => false,
				'url'    => base_url(set_url('users')),
				'pesan'  => 'Data gagal di hapus'
			];
		}

		echo json_encode($msg); die();
	}

	function check_users($value, $index){
		$post = $this->input->post(null, true);
		$data = ['stts_rmv_users' => null, 'username_users' => $value];
		if(isset($post['id'])){
			$data['id_users !='] = $post['id'];
		}
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