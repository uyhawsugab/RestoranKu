<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masakan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('masakan_mdl','msk');
	}

	public function index()
	{
		$data['dataMasakan'] = $this->msk->getDataMasakan();
		$data['konten'] = 'admin/v_masakan';
		$this->load->view('template', $data);
	}

	public function tambahMasakan()
	{
		$this->form_validation->set_rules('nama_masakan', 'fieldlabel', 'trim|required', array('required' => 'Harus Diisi'));
		$this->form_validation->set_rules('harga', 'fieldlabel', 'trim|required', array('required' => 'Harus Diisi'));
		$this->form_validation->set_rules('status_masakan', 'fieldlabel', 'trim|required', array('required' => 'Harus Diisi'));

		if ($this->form_validation->run() == TRUE) {
			$dataInsert = $this->msk->insertDataMasakan();
			if ($dataInsert == 1) {
				$this->session->set_flashdata('pesan', 'Berhasil menginputkan data ke Database');
			}else{
				$this->session->set_flashdata('pesan', 'Gagal menginputkan data ke Database'); 
			}redirect(base_url('index.php/masakan'),'refresh');
		} else {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect(base_url('index.php/masakan'),'refresh');
		}
	}

	public function updateMasakan()
	{
		$this->form_validation->set_rules('nama_masakan', 'fieldlabel', 'trim|required', array('required' => 'Harus Diisi'));
		$this->form_validation->set_rules('harga', 'fieldlabel', 'trim|required', array('required' => 'Harus Diisi'));
		$this->form_validation->set_rules('status_masakan', 'fieldlabel', 'trim|required', array('required' => 'Harus Diisi'));

		if ($this->form_validation->run() == TRUE) {
			$dataUpdate = $this->msk->updateDataMasakan();
			if ($dataUpdate == 1) {
				$this->session->set_flashdata('pesan', 'Berhasil menginputkan data ke Database');
			}else{
				$this->session->set_flashdata('pesan', 'Gagal menginputkan data ke Database'); 
			}redirect(base_url('index.php/masakan'),'refresh');
		} else {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect(base_url('index.php/masakan'),'refresh');
		}
	}

	public function deleteMasakan($id_masakan)
	{
		$deleteData = $this->msk->deleteDataMasakan($id_masakan);
		if($deleteData)
		{
			$this->session->set_flashdata('pesan', 'Berhasil mendelete data ke Database');
		}else{
			$this->session->set_flashdata('pesan', 'Gagal mendelete data ke Database');
		}
		redirect(base_url('index.php/masakan'),'refresh');
	}

	public function getDataDetailMasakan($id_masakan)
	{
		$dataDetailMasakan = $this->msk->detailDataMasakan($id_masakan);
		echo json_encode($dataDetailMasakan);
	}

}

/* End of file masakan.php */
/* Location: ./application/controllers/masakan.php */