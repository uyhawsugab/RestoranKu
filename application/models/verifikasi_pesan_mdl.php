<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class verifikasi_pesan_mdl extends CI_Model {

    public function getVerif()
    {
        $dataVerif = $this->db->join('pelanggan', 'pelanggan.id_pel = pesan.id_pel')
                              ->join('user', 'user.id_user = pesan.id_user')
                              ->order_by('id_pesan', 'asc')
                              ->get('pesan')
                              ->result();
        return $dataVerif;
    }

    public function printData($id_pesan)
    {
        $dataPrint = $this->db->join('pelanggan', 'pelanggan.id_pel = pesan.id_pel')
                              ->where('id_pesan', $id_pesan)
                              ->join('detail_pesan', 'detail_pesan.id_pesan = pesan.id_pesan')
                              ->join('masakan', 'masakan.id_masakan = detail_pesan.id_masakan')
                              ->get('pesan')
                              ->result();

        return $dataPrint;
    }

    public function detailVerif($id_pesan)
    {
        $dataDetailVerif = $this->db->join('pelanggan', 'pelanggan.id_pel = pesan.id_pel')
                                    ->where('id_pesan', $id_pesan)
                                    ->get('pesan')
                                    ->row();

        return $dataDetailVerif;
    }

    public function updateVerif()
    {
        $dataUpdate = array(
            'status_order' => $this->input->post('status_order'),
            'keterangan' => $this->input->post('keterangan'),
            'id_user' => $this->input->post('id_user')
        );
        $updateData = $this->db->where('id_pesan', $this->input->post('id_pesan'))
                               ->update('pesan', $dataUpdate);
        return $updateData;
    }

    public function detail($id_pesan)
    {
        $detail = $this->db->select('detail_pesan.id_pesan, pelanggan.nama_pelanggan, pesan.tanggal, detail_pesan.no_meja, pesan.total_bayar')
                           ->join('pesan','pesan.id_pesan = detail_pesan.id_pesan')
                           ->join('pelanggan','pelanggan.id_pel = pesan.id_pel')
                           ->where('id_detail_pesan', $id_pesan)
                           ->get('detail_pesan')
                           ->result();
        return $detail;
    }

}

/* End of file verifikasi_pesan_mdl.php */
