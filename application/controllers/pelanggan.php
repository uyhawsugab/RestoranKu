<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('pelanggan_mdl','pelan');
	}
    
	public function index()
	{
        $data['dataPelanggan'] = $this->pelan->getPelanggan();
        $data['konten'] = 'admin/v_pelanggan';
		$this->load->view('template',$data);
    }
    
    public function insertPelanggan()
    {
     	$this->form_validation->set_rules('nama_pel', 'fieldlabel', 'trim|required', array('required' => 'Harus Diisi'));   
     	$this->form_validation->set_rules('alamat_pel', 'fieldlabel', 'trim|required', array('required' => 'Harus Diisi'));   
     	$this->form_validation->set_rules('telp_pel', 'fieldlabel', 'trim|required', array('required' => 'Harus Diisi'));   
     	$this->form_validation->set_rules('username', 'fieldlabel', 'trim|required', array('required' => 'Harus Diisi'));   
     	$this->form_validation->set_rules('password', 'fieldlabel', 'trim|required', array('required' => 'Harus Diisi'));
     	if ($this->form_validation->run() == TRUE) {
                $insert = $this->pelan->insertDataPelanggan();
                if ($insert == TRUE) {
                    $this->session->set_flashdata('pesan', 'Berhasil menginputkan data ke Database');
                }else{
                    $this->session->set_flashdata('pesan', 'Gagal menginputkan data ke Database');
                }
                redirect(base_url('index.php/pelanggan'),'refresh');
     	   } else {
				$this->session->set_flashdata('pesan', validation_errors());
                redirect(base_url('index.php/pelanggan'),'refresh');
     	   }
    }
    public function updatePelanggan()
    {
        $this->form_validation->set_rules('nama_pel', 'fieldlabel', 'trim|required', array('required' => 'Harus Diisi'));   
        $this->form_validation->set_rules('alamat_pel', 'fieldlabel', 'trim|required', array('required' => 'Harus Diisi'));   
        $this->form_validation->set_rules('telp_pel', 'fieldlabel', 'trim|required', array('required' => 'Harus Diisi'));   
        $this->form_validation->set_rules('username', 'fieldlabel', 'trim|required', array('required' => 'Harus Diisi'));   
        $this->form_validation->set_rules('password', 'fieldlabel', 'trim|required', array('required' => 'Harus Diisi'));
        if ($this->form_validation->run() == TRUE) {
               $insert = $this->pelan->updateDataPelanggan();
               if ($insert == TRUE) {
                   $this->session->set_flashdata('pesan', 'Berhasil mengupdate data ke Database');
               }else{
                   $this->session->set_flashdata('pesan', 'Gagal mengupdate data ke Database');
               }
               redirect(base_url('index.php/pelanggan'),'refresh');
           } else {
               $this->session->set_flashdata('pesan', validation_errors());
               redirect(base_url('index.php/pelanggan'),'refresh');     	   		
           }   
    }

    public function deletePelanggan($id_pel)
    {
        $deleteDataPelanggan = $this->pelan->deleteDataPelanggan();

        if ($deleteDataPelanggan == TRUE) {
     		$this->session->set_flashdata('pesan', 'Berhasil mendelete data dari Database');       
        }else{
        	$this->session->set_flashdata('pesan', 'Gagal mendelete data dari Database');
        }
        redirect(base_url('index.php/pelanggan'),'refresh');
    }

    public function getDetailDataPelanggan($id_pel)
    {
        $dataDetailPelanggan = $this->pelan->detailDataPelanggan($id_pel);
        echo json_encode($dataDetailPelanggan);
    }

}

/* End of file pelanggan.php */
/* Location: ./application/controllers/pelanggan.php */