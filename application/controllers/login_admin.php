
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login_admin extends CI_Controller {

	public function index()
	{
        
		$this->load->view('admin/login');	
	}

	public function prosesLogin()
	{
		$this->load->model('login_admin_mdl');
		$login = $this->login_admin_mdl->checkDataAdmin();
		if($login->num_rows()>0)
		{
			$dataAdmin = $login->row();
			$data = array(
				'id_user' => $dataAdmin->id_user,
				'username' => $dataAdmin->username,
				'password' => $dataAdmin->password,
				'nama_user' => $dataAdmin->nama_user,
				'id_level' => $dataAdmin->id_level,
				'login' => TRUE,
			);
			
			$this->session->set_userdata($data);
			$data['status'] = 1;
			echo json_encode($data);
		}else{
			$data['status'] = 0;
			echo json_encode($data);
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();

		redirect(base_url('index.php/login_admin'), 'refresh');
	}
}

/* End of file login_admin.php */
/* Location: ./application/controllers/login_admin.php */