<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GetMasakan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('getMasakan_mdl','gtmsk');
		
	}

	public function index()
	{
		$dataMasakan = $this->gtmsk->getDataMasakan();
		echo json_encode($dataMasakan);
	}
	public function detailData($id_masakan)
	{
		$dataMasakan = $this->gtmsk->getDetailMsk($id_masakan);
		echo json_encode($dataMasakan);
	}

}

/* End of file getMasakan.php */
/* Location: ./application/controllers/getMasakan.php */