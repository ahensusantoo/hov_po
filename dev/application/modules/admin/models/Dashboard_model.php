<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends MY_Model {
	
	// protected $_table_name 		= 'merchant_employee';
	// protected $_primary_key 	= 'id_merchant_employee';
	// protected $_order_by 		= 'id_merchant_employee';
	// protected $_order_by_type 	= 'desc';


	function info_carousel(){
		$query = $this->db->query("
			SELECT 
			    COALESCE(SUM(CASE WHEN DATE(a.tanggal) = CURDATE() THEN a.total_transaksi END), 0) AS hari_ini,
			    COALESCE(SUM(CASE WHEN WEEK(a.tanggal) = WEEK(CURDATE()) THEN a.total_transaksi END), 0) AS minggu_ini,
			    COALESCE(SUM(CASE WHEN MONTH(a.tanggal) = MONTH(CURDATE()) AND YEAR(a.tanggal) = YEAR(CURDATE()) THEN a.total_transaksi END), 0) AS bulan_ini,
			    COALESCE(SUM(CASE WHEN YEAR(a.tanggal) = YEAR(CURDATE()) THEN a.total_transaksi END), 0) AS tahun_ini
			FROM transaksi a
			WHERE a.uniqe_code ='$_SESSION[uniqe_code]';

		")->row();

		return $query;
	}

	function stat_mingguan(){
	// 	$sales_now = $this->db->query("
	// 				SELECT 
	// 			    id_customer,
	// 			    SUM(total_transaksi) AS total_transaksi,
	// 			    MAX(produk_terbaik) AS produk_terbaik,
	// 			    MAX(sales_terbaik) AS sales_terbaik
	// 			    FROM transaksi 
	// 			    WHERE WEEK(transaksi.tanggal) = WEEK(CURRENT_DATE())
	// 			    GROUP BY id_customer 
	// 			    ORDER BY total_transaksi DESC 
	// 			    LIMIT 1
	// 			")->row();

	// 	return $data = [
	// 		'sales_now' => $sales_now,
	// 	];
	}

	function grafik_mingguan(){
		$query = $this->db->query("
			SELECT DATE_FORMAT(a.tanggal, '%d-%m-%Y') AS tanggal,
		       COALESCE(SUM(a.total_transaksi), 0) as total
			FROM transaksi a
			WHERE DATE(a.tanggal) BETWEEN DATE_SUB(CURDATE(), INTERVAL 1 WEEK) AND CURDATE()
			      AND a.uniqe_code = '$_SESSION[uniqe_code]'
			GROUP BY DATE(a.tanggal)
			ORDER BY DATE(a.tanggal);
		")->result();

		return $query;
	}

	function transaks_terkini(){
		$query = $this->db->query("
			SELECT DATE_FORMAT(a.tanggal, '%H:%i') AS waktu,
				a.total_transaksi, a.idtransaksi
			FROM transaksi a
			WHERE DATE(a.tanggal) = CURDATE() AND a.uniqe_code ='$_SESSION[uniqe_code]'
			ORDER BY a.tanggal DESC
			LIMIT 6 
		")->result();

		return $query;
	}

}

/* End of file Employee_model.php */
/* Location: ./application/modules/admin/models/Employee_model.php */