<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lap extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('lap_model');
	}

	function omset(){
		global $SConfig;

		if( isset($_GET['tgl_awal']) AND isset($_GET['tgl_akhir']) ){
			$tgl_awal  = date("Y-m-d", strtotime($_GET['tgl_awal']));
			$tgl_akhir = date("Y-m-d", strtotime($_GET['tgl_akhir']));
		}else{
			$tgl_awal  = date('Y-m-d');
			$tgl_akhir = date('Y-m-d');
		}

		$record = $this->db->query("
			SELECT * 
			FROM transaksi a
			WHERE a.uniqe_code = '$_SESSION[uniqe_code]'
			    AND DATE(a.tanggal) BETWEEN '$tgl_awal' AND '$tgl_akhir'
		    ORDER BY a.tanggal ASC
		")->result();
		// $where = [
		// 	"uniqe_code" => "PadpsjU5l8iFByzmb9cD"
		// ];

			// if(@$_POST['pencarian'] != "" || !empty($_POST['pencarian'])) { 
			// 	$cari = "nama_user LIKE '%$_POST[pencarian]%' OR username_user LIKE '%$_POST[pencarian]%' ";
			// }

		// $total_row 		= $this->lap_model->count($where, @$cari);
		// $record 		= $this->lap_model->get_by($where, null, null, false, null, @$cari, null, "tanggal asc");

		// print_r("<pre>"); print_r($record); die();

		$data =[
			'title' 	=> 'Laporan Penjualan',
			'record'	=> $record
		];
		$this->template->load('template_admin', set_url('lap/omset'), $data);
	}

	function grafik_omset(){

		if( isset($_GET['tgl_awal']) AND isset($_GET['tgl_akhir']) ){
			$tgl_awal  = date("Y-m-d", strtotime($_GET['tgl_awal']));
			$tgl_akhir = date("Y-m-d", strtotime($_GET['tgl_akhir']));
		}else{
			$tgl_awal  = date('Y-m-d');
			$tgl_akhir = date('Y-m-d');
		}



		$record = $this->db->query("
			SELECT COALESCE(SUM(a.total_transaksi), 0) as total, DATE_FORMAT(tanggal, '%d-%m-%Y') AS tanggal
			FROM transaksi a
			WHERE a.uniqe_code = '$_SESSION[uniqe_code]'
			    AND DATE(a.tanggal) BETWEEN '$tgl_awal' AND '$tgl_akhir'
			GROUP BY DATE(a.tanggal)
			ORDER BY a.tanggal ASC

		")->result();

		// $a=[];
		// while($tgl_awal <= $tgl_akhir) {
		// 	$tgl['tanggal'] = $tgl_awal;
		// 	$tgl  = array_column($tgl, 'tanggal');  
		// 	$data = array_column($record, 'tanggal');  
		// 	$hasil  =  array_diff_assoc($tgl, $data);
		// 	$record['tanggal'] = $hasil;
		// 	$record['total'] = 0;
		// 	$tgl_awal = strtotime($tgl_awal);
		// 	$tgl_awal = strtotime("+1 days", $tgl_awal);
		// }
		// print("<pre>"); print_r($record); die();


		$data =[
			'title' => 'Laporan Grafik Omset',
			'record'	=> $record
		];
		$this->template->load('template_admin', set_url('lap/grafik_omset'), $data);
	}

}

/* End of file Lap.php */
/* Location: ./application/modules/admin/controllers/Lap.php */