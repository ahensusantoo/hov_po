<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction_model extends MY_Model {

	protected $_table_name 		= 'po_transaksi';
	protected $_primary_key 	= 'id_transaksi';
	protected $_order_by 		= 'tgl_created_detail';
	protected $_order_by_type 	= 'desc';


	public $rules_transaksi = [
		'users' => [
			'field' => 'users',
			'label' => 'Users',
			'rules' => 'trim|xss_clean|required|max_length[50]'
		],
		'no_transaksi' => [
			'field' => 'no_transaksi',
			'label' => 'Nomor Transaksi',
			'rules' => 'trim|xss_clean'
		],
		'tgl_po' => [
			'field' => 'tgl_po',
			'label' => 'Tanggal Purchase Order',
			'rules' => 'trim|required|xss_clean'
		],
		'divisi' => [
			'field' => 'divisi',
			'label' => 'Divisi',
			'rules' => 'trim|required|xss_clean'
		],
		'supplier' => [
			'field' => 'supplier',
			'label' => 'Supplier',
			'rules' => 'trim|required|xss_clean'
		],'jenis_po' => [
			'field' => 'jenis_po',
			'label' => 'Jenis Purchase Order',
			'rules' => 'trim|required|xss_clean'
		],'keterangan' => [
			'field' => 'keterangan',
			'label' => 'Keterangan',
			'rules' => 'trim|xss_clean'
		],'tgl_tempo' => [
			'field' => 'tgl_tempo',
			'label' => 'Tanggal Jatuh Tempo',
			'rules' => 'trim|required|xss_clean'
		]
	];


	function proses_transaction($post){
		$this->db->trans_begin();
			$id_transaksi = $post['id_transaksi'];
			$no_transaksi = $post['no_transaksi'];

			$transaksi = [
				'fk_users' => $post['id_users'],
				'fk_divisi' => $post['divisi'],
				'fk_supplier' => $post['supplier'],
				'fk_jenis_po' => $post['jenis_po'],
				'tgl_po_transaksi' => date("Y-m-d", strtotime($post['tgl_po'])),
				'tgl_tempo_transaksi' => date("Y-m-d", strtotime($post['tgl_tempo'])),
				'keterangan_transkasi' => $post['keterangan'],
			];
			if( empty($id_transaksi) && empty($no_transaksi) ){
				//proses insert
				$id_transaksi = parent::get_id_uuid();
				$nomor_transaksi = $this->db->query("SELECT po_invoice() AS `po_invoice`")->row();
				$no_transaksi = $nomor_transaksi->po_invoice;

				$transaksi['id_transaksi'] = $id_transaksi;
				$transaksi['no_transaksi'] = $no_transaksi;
				$this->db->insert('po_transaksi', $transaksi);


				$cart = $this->db->query("SELECT * FROM po_cart WHERE fk_users_cart_po = '$post[id_users]' ")->result();
				$jml_item_transkasi = 0;
				$sub_total_transaksi = 0;
				$grand_total_transaksi = 0;
				foreach($cart as $key => $value){
					$jml_item_transkasi += $value->qty_po_cart;
					$sub_total_transaksi += $value->sub_total_cart_po;
					$grand_total_transaksi += $value->grand_total_cart_po;
					$id_transaksi_detail = parent::get_id_uuid();
					$this->db->query("
						INSERT INTO po_transaksi_detail
						SET id_transaksi_detail = '$id_transaksi_detail',
						fk_transaksi = '$id_transaksi',
						nama_item_detail = '$value->item_cart_po',
						qty_item_detail = '$value->qty_po_cart',
						harga_satuan_detail = '$value->harga_cart_po',
						sub_total_detail = '$value->sub_total_cart_po',
						grand_total_detail = '$value->grand_total_cart_po'
					");
				}
				
				$this->db->query("
					UPDATE po_transaksi SET
					jml_item_transkasi = '$jml_item_transkasi',
					sub_total_transaksi = '$sub_total_transaksi',
					grand_total_transaksi = '$grand_total_transaksi'
				");

				$this->db->query("
					DELETE FROM po_cart WHERE fk_users_cart_po = '$post[id_users]'
				");
			}
		$this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            # Something went wrong.
            $this->db->trans_rollback();
            return FALSE;
        }else {
            # Everything is Perfect. 
            # Committing data to the database.
            $this->db->trans_commit();
            return TRUE;
        }
	}

}

/* End of file Transaction_model.php */
/* Location: ./application/modules/admin/models/Transaction_model.php */