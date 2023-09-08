<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ErrorHook {
    public function show_database_error() {
        $CI =& get_instance();
        if ($CI->db->conn_id === false) {
            $CI->load->view('errors/html/error_db'); // Ganti dengan nama view yang sesuai
            exit;
        }
    }
}