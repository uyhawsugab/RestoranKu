<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class verifikasi_pesan extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('verifikasi_pesan_mdl','verif');
        
    }
    

    public function index()
    {
        $data['dataVerif'] = $this->verif->getVerif();
        $data['konten'] = 'admin/v_verifikasi';
        $this->load->view('template', $data);
        
    }

    public function updateData()
    {
        $this->form_validation->set_rules('status_order', 'fieldlabel', 'trim|required', array('required' => 'Harus diisi'));
        $this->form_validation->set_rules('keterangan', 'fieldlabel', 'trim|required', array('required' => 'Harus diisi'));
        $this->form_validation->set_rules('id_user', 'fieldlabel', 'trim|required', array('required' => 'Harus diisi'));
        
        
        if ($this->form_validation->run() == TRUE) {
            $update = $this->verif->updateVerif();
            if ($update) {
                $this->session->set_flashdata('pesan', 'Berhasil mengubah data di Database');
                
            }else {
                $this->session->set_flashdata('pesan', 'Gagal mengubah data di Database');
                
            }
            redirect(base_url('index.php/verifikasi_pesan'),'refresh');
            
        } else {
            $this->session->set_flashdata('pesan', validation_errors());
            
            redirect(base_url('index.php/verifikasi_pesan'),'refresh');
            
        }
        
    }

    public function detailDataVerif($id_pesan)
    {
        $dataDetail = $this->verif->detailVerif();
        echo json_encode($dataDetail);
    }

    public function Cetak($id_pesan)
    {
        $data['dataPesan'] = $this->verif->printData();
        $this->load->view('admin/v_nota', $data);
    }

}

/* End of file verifikasi_pesan.php */
