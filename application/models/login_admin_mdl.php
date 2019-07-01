<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_admin_mdl extends CI_Model {

	public function checkDataAdmin()
		{
		
        $dataAdmin = $this->db->join('level', 'level.id_level = user.id_level')
                              ->where('username', $this->input->post('username'))
                              ->where('password', $this->input->post('password'))
                              ->get('user');

        return $dataAdmin;
		}	

}

/* End of file login_admin_mdl.php */
/* Location: ./application/models/login_admin_mdl.php */