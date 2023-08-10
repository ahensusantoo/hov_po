<?php 

	function set_url($sub){
		// print_r($this->uri->segment()); die();
		$_this =& get_instance();
		if(!empty($_this->uri->segment(1))){
			return ($_this->uri->segment(1).'/'.$sub);
		}else{
			return ($sub);
		}		
	}

	function status_display($kode){
		switch ($kode) {
	     	case 1:
	       		return '<span class="badge light badge-success">Dsiplay</span>';
	       		break;
	     	case 0:
	       		return '<span class="badge light badge-warning">Hide</span>';
	       		break;

	     	default:
	    	return 'Status tidak terdaftar';
	   }
	}

	function indo_date($date){
		$d = substr($date,8,2);
		$m = substr($date,5,2);
		$y = substr($date,0,4);
		return $d.'-'.$m.'-'.$y;
	}

	function date_month_name($date){
		if($date == ""){
			return $date;
		}else{
			return date_format(date_create(trim($date)),'d F Y');
		}
	}

	function count_age($tgl_lahir){
		$lahir    =new DateTime($tgl_lahir);
    	$today    =new DateTime();
    	$umur 	  = $today->diff($lahir);
    	
		if($umur->y > 0){
			$hasil = $umur->y . " Thn " . $umur->m . " Bln " . $umur->d . " Hari";
		}else if($umur->m > 0 ){
			$hasil = $umur->m . " Bln " . $umur->d . " Hari";
		}else{
			$hasil = $umur->d . " Hari";
		}

		return $hasil;
	}

?>