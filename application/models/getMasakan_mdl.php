<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GetMasakan_mdl extends CI_Model {

	public function getDataMasakan()
	{
		$dataMasakan = $this->db->get('masakan')->result();
		return $dataMasakan;
	}

	public function getOrderTerakhir()
	{
		$dataOrderTerakhir = $this->db->where('id_pel', $this->session->userdata('id_pel'))
		                              ->limit('1')
		                              ->order_by('id_pesan', 'desc')
		                              ->limit('1')
		                              ->get('pesan')
		                              ->row();
		return $dataOrderTerakhir;
	}

	public function createPesan()
	{
		$dataPesan = array('id_pel' => $this->session->userdata('id_pel'),
						   'tanggal' => date('Y-m-d'),
						   'status_order' => ('Belum Lunas')
		);

		$insertDataPesan = $this->db->insert('pesan', $dataPesan);
		return $insertDataPesan;
	}

	public function updateTotalBayar($id_pesan)
	{
		$data = array(
			'total_bayar' => $this->cart->total()
		);

		$updateBayar = $this->db->where('id_pesan', $id_pesan)->update('pesan', $data);
		return $updateBayar;
	}
	public function getDetailMsk($id_masakan)
	{
		$dataDetail = $this->db->where('id_masakan', $id_masakan)->get('masakan')->row();
		return $dataDetail;
	}

}

/* End of file getMasakan_mdl.php */
/* Location: ./application/models/getMasakan_mdl.php */