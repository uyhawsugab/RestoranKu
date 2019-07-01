<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_mdl extends CI_Model {

    public function getPelanggan()
    {
        $dataPelanggan = $this->db->get('pelanggan')->result();
        return $dataPelanggan;
    }

    public function insertDataPelanggan()
    {
        $dataPelanggan = array(
            'nama_pel' => $this->input->post('nama_pel'),
            'almat_pel' => $this->input->post('alamat_pel'),
            'telp_pel' => $this->input->post('telp_pel'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password'))
        );
        $inserToDB = $this->db->insert('pelanggan', $dataPelanggan);

        return $inserToDB;
    }

    public function updateDataPelanggan()
    {
        $dataPelanggan = array(
            'nama_pel' => $this->input->post('nama_pel'),
            'almat_pel' => $this->input->post('alamat_pel'),
            'telp_pel' => $this->input->post('telp_pel'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password'))
        );

        $updateToDB = $this->db->where('id_pel', $this->input->post('id_pel'))
                               ->update('pelanggan', $dataPelanggan);
        return $updateToDB;
    }

    public function deleteDataPelanggan($id_pel)
    {
        $deleteFromDB = $this->db->where('id_pel', $id_pel)->delete('pelanggan');
        return $deleteFromDB;
    }

    public function detailDataPelanggan($id_pel)
    {
        $detailFromDB = $this->db->where('id_pel', $id_pel)->get('pelanggan')->row();
        return $detailFromDB;
    }

}

/* End of file pelanggan_mdl.php */
/* Location: ./application/models/pelanggan_mdl.php */