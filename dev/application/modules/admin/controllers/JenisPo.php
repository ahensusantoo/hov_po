<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JenisPo extends Admin_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('jenis_po_model');
	}

	public function index(){
		$data =[
			'title'    			=> 'Jenis_po',
		];

		$this->template->load('template_admin', set_url('system/jenis_po/index'), $data);	
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
			// 'stts_aktif_jenis_po' => TRUE,
			'stts_rmv_jenis_po' => NULL
		];
		if(!empty($post['id'])){
			$id = $post['id'];
			$count = $this->jenis_po_model->count(['id_jenis_po' => $id]);
			if($count < 1 ){
				echo json_encode([
					'status' => false,
					'url' 	=> '',
					'pesan' => 'Data yang di pilih tidak dapat di temukan, silahkan refresh ulang halaman'
				]);
				die(); exit();
			}
			$where['id_jenis_po'] = $id;
			$record = $this->jenis_po_model->get_by($where, null, null, true, null, null, null);
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
				$cari = "nama_jenis_po LIKE '%$search%' OR kode_jenis_po LIKE '%$search%' ";
			}

			// print_r("<pre>"); print_r($post); die();

			$total_row 	= $this->jenis_po_model->count($where, @$cari);
			$record 	= $this->jenis_po_model->get_by($where, $SConfig->_limit_perpage, $offset, false, null, @$cari, null, "nama_jenis_po asc");
			$data =[
				'title' 		=> 'Manajemen Jenis_po',
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

		$rules_jenis_po = $this->jenis_po_model->rules_jenis_po;
		$this->form_validation->set_rules($rules_jenis_po);
		$this->form_validation->set_message($this->mesage);
		$this->form_validation->set_error_delimiters('<div class="invalid-feedback">', '</div>');
		if($this->form_validation->run() == TRUE) {
			$send_model = [
				'nama_jenis_po' => $post['nama_jenis_po'],
				'kode_jenis_po' => $post['kode_jenis_po'],
				'stts_aktif_jenis_po' => (isset($post['stts_aktif']) ? 1:0),
				'updated_by_jenis_po' => $_SESSION['id_users'],
			];
			$id = $post['id'];
			if( empty($id) ){
				//proses Insert
				$send_model['id_jenis_po'] 	= $this->jenis_po_model->get_id_uuid();
				$query = $this->jenis_po_model->insert($send_model);
			}else{
				//proses Update
				$count = $this->jenis_po_model->count(['id_jenis_po' => $id]);
				if($count < 1 ){
					$msg = [
						'status' => false,
						'pesan' => 'Permintaan anda tidak dapat diproses',
					];
					echo json_encode($msg); die();
					
				}
				$query = $this->jenis_po_model->update($send_model, ['id_jenis_po'=>$id]);
			}

			if($query){
				$msg = [
					'status' => true,
					'url'    => base_url(set_url('jenis_po')),
					'pesan'  => 'Data berhasil di '.(empty($id) ? 'tambah' : 'edit')
				];
			}else{
				$msg = [
					'status' => false,
					'url'    => base_url(set_url('jenis_po')),
					'pesan'  => 'Data gagal di '.(empty($id) ? 'tambah' : 'edit')
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
		$count = $this->jenis_po_model->count(['id_jenis_po' => $id]);
		if($count < 1 ){
			$msg = [
				'status' => false,
				'pesan' => 'Permintaan anda tidak dapat diproses',
			];
			echo json_encode($msg); die();
			
		}
		$send_model = [
			'stts_rmv_jenis_po' => date('Y-m-d H:i:s'),
			'rmv_by_jenis_po' 	 => $_SESSION['id_users'],
		];
		$query = $this->jenis_po_model->update($send_model, ['id_jenis_po'=>$id]);

		if($query){
			$msg = [
				'status' => true,
				'url'    => base_url(set_url('jenis_po')),
				'pesan'  => 'Data berhasil di hapus'
			];
		}else{
			$msg = [
				'status' => false,
				'url'    => base_url(set_url('jenis_po')),
				'pesan'  => 'Data gagal di hapus'
			];
		}

		echo json_encode($msg); die();
	}

	function check_jenis_po($value, $index){
		$post = $this->input->post(null, true);
		$data = ['stts_rmv_jenis_po' => null, 'kode_jenis_po' => $value];
		if(isset($post['id'])){
			$data['id_jenis_po !='] = $post['id'];
		}
		$check_data = $this->jenis_po_model->count($data);
		if($check_data > 0){
			$this->form_validation->set_message('check_jenis_po', '%s sudah digunakan, silahkan ganti');
			return FALSE;
		}else{
			return TRUE;
		}
	}

}

/* End of file jenis_po.php */
/* Location: ./application/modules/admin/controllers/jenis_po.php */