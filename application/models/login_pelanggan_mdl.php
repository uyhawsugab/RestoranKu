<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_pelanggan_mdl extends CI_Model {

	public function checkDataPelanggan()
    {
        $dataPelanggan = $this->db->where('username', $this->input->post('username'))
                                  ->where('password', md5($this->input->post('password')))
                                  ->get('pelanggan');
        
        return $dataPelanggan;
    }

    public function tambahPelanggan()
    {
        $data = array(
            'nama_pel' => $this->input->post('nama_pel'),
            'alamat_pel' => $this->input->post('alamat_pel'),
            'telp_pel' => $this->input->post('telp_pel'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password'))
        );

        $insert = $this->db->insert('pelanggan', $data);
        return $insert;
    }

}

/* End of file login_pelanggan_mdl.php */
/* Location: ./application/models/login_pelanggan_mdl.php */