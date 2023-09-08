<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(['transaction_model', 'cart_model']);
	}

	function proses_transaction(){
		$post = $this->input->post(null, true);
		// print_r("<pre>"); print_r($post); die();
		if(!$this->input->is_ajax_request()){
			$msg = [
				'status' => false,
				'pesan' => 'Permintaan anda tidak dapat diproses',
			];
			echo json_encode($msg); die();
		}

		$rules_transaksi = $this->transaction_model->rules_transaksi;
		$this->form_validation->set_rules($rules_transaksi);
		$this->form_validation->set_message($this->mesage);
		$this->form_validation->set_error_delimiters('<div class="invalid-feedback">', '</div>');
		if($this->form_validation->run() == TRUE) {
			if( empty($post['id_transaksi']) && empty($post['no_transaksi']) ){
				$count_cart = $this->cart_model->count(['fk_users_cart_po' => $post['id_users']]);
				if($count_cart < 1){
					$msg = [
						'status' => false,
						'pesan' => 'List Item Purchase Order Tidak Boleh Kosong',
					];
					echo json_encode($msg); die();
				}
			}
			$query = $this->transaction_model->proses_transaction($post);
			

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

}

/* End of file Transaction.php */
/* Location: ./application/modules/admin/controllers/Transaction.php */