<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PurchaseOrder extends Admin_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(['cart_model', 'divisi_model', 'supplier_model', 'jenis_po_model']);
	}

	public function index(){
		$divisi = $this->divisi_model->get_by(['stts_aktif_divisi'=> true, 'stts_rmv_divisi' => NULL], null, null, false);
		$supplier = $this->supplier_model->get_by(['stts_aktif_supplier'=> true, 'stts_rmv_supplier' => NULL], null, null, false);
		$jns_po = $this->jenis_po_model->get_by(['stts_aktif_jenis_po'=> true, 'stts_rmv_jenis_po' => NULL], null, null, false);

		// print_r("<pre>"); print_r($jns_po); die();
		$data =[
			'title'		=> 'Purchase Order',
			'divisi' 	=> $divisi,
			'supplier' 	=> $supplier,
			'jns_po' 	=> $jns_po,
		];

		$this->template->load('template_admin', set_url('purchase_order/index'), $data);	
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
			// 'stts_aktif_divisi' => TRUE,
			'stts_rmv_divisi' => NULL
		];
		if(!empty($post['id'])){
			$id = $post['id'];
			$count = $this->cart_model->count(['id_divisi' => $id]);
			if($count < 1 ){
				echo json_encode([
					'status' => false,
					'url' 	=> '',
					'pesan' => 'Data yang di pilih tidak dapat di temukan, silahkan refresh ulang halaman'
				]);
				die(); exit();
			}
			$where['id_divisi'] = $id;
			$record = $this->cart_model->get_by($where, null, null, true, null, null, null);
			echo json_encode([
				'status' => true,
				'record' => $record,
			]);
			die();
		}else{
			$where_cart = [
				'fk_users_cart_po' => $_SESSION['id_users'],
				'fk_divisi_cart_po' => $_SESSION['fk_divisi']
			];
			$record 	= $this->cart_model->get_by($where_cart, null, null, false);
			$data =[
				'title' 		=> 'Cart Purchase Order',
				'record' 		=> $record,
			];

			echo json_encode($data);
			die();
		}
		
	}


	function cart_add_update(){
		$post = $this->input->post(null, true);
		// print_r("<pre>"); print_r($post); die();
		if(!$this->input->is_ajax_request()){
			$msg = [
				'status' => false,
				'pesan' => 'Permintaan anda tidak dapat diproses',
			];
			echo json_encode($msg); die();
		}

		$rules_cart = $this->cart_model->rules_cart;
		$this->form_validation->set_rules($rules_cart);
		$this->form_validation->set_message($this->mesage);
		$this->form_validation->set_error_delimiters('<div class="invalid-feedback">', '</div>');
		if($this->form_validation->run() == TRUE) {
			$sub_total = (just_number($post['qty_po']) * just_number($post['harga_po']));
			$send_model = [
				'fk_users_cart_po' => $_SESSION['id_users'],
				'fk_divisi_cart_po' => $_SESSION['fk_divisi'],
				'item_cart_po' => $post['nama_item_po'],
				'qty_po_cart' => just_number($post['qty_po']),
				'harga_cart_po' => just_number($post['harga_po']),
				'sub_total_cart_po' => $sub_total,
				'grand_total_cart_po' => $sub_total,
			];
			$id = $post['id_item_po'];
			if( empty($id) ){
				//proses Insert
				$send_model['id_cart_po'] 	= $this->cart_model->get_id_uuid();
				$query = $this->cart_model->insert($send_model);
			}else{
				//proses Update
				$count = $this->cart_model->count(['id_cart' => $id]);
				if($count < 1 ){
					$msg = [
						'status' => false,
						'pesan' => 'Permintaan anda tidak dapat diproses',
					];
					echo json_encode($msg); die();
					
				}
				$query = $this->cart_model->update($send_model, ['id_cart'=>$id]);
			}

			if($query){
				$msg = [
					'status' => true,
					'url'    => base_url(set_url('cart')),
					'pesan'  => 'Data berhasil di '.(empty($id) ? 'tambah' : 'edit')
				];
			}else{
				$msg = [
					'status' => false,
					'url'    => base_url(set_url('cart')),
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


	function cart_data(){
		$where_cart = [
			'fk_users_cart_po' => $_SESSION['id_users'],
			'fk_divisi_cart_po' => $_SESSION['fk_divisi']
		];
		$cart = $this->cart_model->get_by($where_cart, null, null, false);

	
		$data = [
			'cart'		=> $cart,
		];
		$this->load->view(set_url('purchase_order/cart_data'), $data, FALSE);
	}


	function delete_item_cart(){
		$post = $this->input->post(null, true);
		if(!$this->input->is_ajax_request()){
			$msg = [
				'status' => false,
				'pesan' => 'Permintaan anda tidak dapat diproses',
			];
			echo json_encode($msg); die();
		}
		$id = $post['id'];
		$count = $this->cart_model->count(['id_cart_po' => $id]);
		if($count < 1 ){
			$msg = [
				'status' => false,
				'pesan' => 'Permintaan anda tidak dapat diproses',
			];
			echo json_encode($msg); die();
			
		}
		$query = $this->cart_model->delete($id);

		if($query){
			$msg = [
				'status' => true,
				'url'    => base_url(set_url($this->uri->segment(2))),
				'pesan'  => 'Data berhasil di hapus'
			];
		}else{
			$msg = [
				'status' => false,
				'url'    => base_url(set_url($this->uri->segment(2))),
				'pesan'  => 'Data gagal di hapus'
			];
		}

		echo json_encode($msg); die();
	}

}

/* End of file purchaseOrder.php */
/* Location: ./application/modules/admin/controllers/purchaseOrder.php */