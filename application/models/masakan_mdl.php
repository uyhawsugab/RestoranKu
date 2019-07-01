<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masakan_mdl extends CI_Model {

	public function getDataMasakan()
	{
		$dataMasakan = $this->db->get('masakan')->result();
		return $dataMasakan;
	}

	public function insertDataMasakan()
	{
		$config['upload_path'] = './assets/img/gambar';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = '10000000';
		$config['max_width']  = '10240000';
		$config['max_height']  = '7680000';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('gambar')){
			$this->session->set_flashdata('pesan', $this->upload->display_errors());
			return false;
		}
		else{
			$dataMasakan = array(
				'nama_masakan' => $this->input->post('nama_masakan'),
				'harga' => $this->input->post('harga'),
				'status_masakan' => $this->input->post('status_masakan'),
				'gambar' => $this->upload->data('file_name'),
			);
			$insertToDB = $this->db->insert('masakan', $dataMasakan);
			return $insertToDB;
		}
	}

	public function updateDataMasakan()
	{
		$namaGambar = $_FILES['gambar']['name'];
		if($namaGambar != ''){

			$config['upload_path'] = './assets/img/gambar';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '10000000';
			$config['max_width']  = '10240000';
			$config['max_height']  = '7680000';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('gambar')){
				$this->session->set_flashdata('pesan',$this->upload->display_errors());
				return false;
			}
			else{
				$dataMasakan = array(
					'nama_masakan' => $this->input->post('nama_masakan'),
					'harga' => $this->input->post('harga'),
					'status_masakan' => $this->input->post('status_masakan'),
					'gambar' => $this->upload->data('file_name'),
				);
				$updateToDB = $this->db->where('id_masakan', $this->input->post('id_masakan'))->update('masakan', $dataMasakan);
				return $updateToDB;
			}
		
		}else{
				$dataMasakan = array(
				'nama_masakan' => $this->input->post('nama_masakan'),
				'harga' => $this->input->post('harga'),
				'status_masakan' => $this->input->post('status_masakan'),
			);
				$updateToDB = $this->db->where('id_masakan', $this->input->post('id_masakan'))->update('masakan', $dataMasakan);
				return $updateToDB;
		}

	}

	public function detailDataMasakan($id_masakan)
	{
		$dataDetail = $this->db->where('id_masakan', $id_masakan)->get('masakan')->row();
		return $dataDetail;
	}

	public function deleteDataMasakan($id_masakan)
	{
		$deleteData = $this->db->where('id_masakan', $id_masakan)->delete('masakan');
		return $deleteData;
	}

}

/* End of file masakan_mdl.php */
/* Location: ./application/models/masakan_mdl.php */