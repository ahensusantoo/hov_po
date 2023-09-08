<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ErrorsController extends MY_Controller {

	

    public function database()
    {
        $this->load->view('errors/html/error_404');
    }

    public function not_found()
    {
        $this->load->view('errors/html/error_404');
    }

}

/* End of file Error404.php */
/* Location: ./application/controllers/Error404.php */