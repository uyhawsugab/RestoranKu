<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_pelanggan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_pelanggan_mdl','login');
	}

	public function index()
	{
		$this->load->view('pelanggan/login');
	}

	public function loginProses()
	{
		$login = $this->login->checkDataPelanggan();
		if($login->num_rows()>0)
		{
			$dataPelanggan = $login->row();
			$data = array(
				'id_pel' => $dataPelanggan->id_pel,
				'nama_pel' => $dataPelanggan->nama_pel,
				'username' => $dataPelanggan->username,
				'password' => md5($dataPelanggan->password),
				'login' => TRUE
			);

			$this->session->set_userdata($data);
			$data['status'] =1;
			echo json_encode($data);
		}else{
			$data['status'] = 0;
			echo json_encode($data);
		}
	}

	public function simpanDataPelanggan()
	{
		$checkData = $this->login->tambahPelanggan();
		if($checkData)
		{
			$data['status'] = 1;
			$data['keterangan'] = "Sukses menambah Data Anda";
			echo json_encode($data);
		}
		else
		{
			$data['status'] = 0;
			$data['keterangan'] = "Gagal menambah Data Anda";
			echo json_encode($data);
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('index.php/login_pelanggan'),'refresh');
	}

}

/* End of file login_pelanggan.php */
/* Location: ./application/controllers/login_pelanggan.php */