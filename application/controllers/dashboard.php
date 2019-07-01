<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

	public function index()
	{
        $data['konten'] = 'admin/v_dashboard';
		$this->load->view('template', $data);
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/Laporan.php */