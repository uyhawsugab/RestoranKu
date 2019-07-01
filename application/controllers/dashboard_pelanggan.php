<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard_pelanggan extends CI_Controller {

    public function index()
    {
        $data['konten'] = 'pelanggan/v_dashboard';
        $this->load->view('template', $data);
        
    }

}

/* End of file dashboard_pelanggan.php */
