<?php

class Header extends CI_Controller {

	// Constuctor
	public function __construct(){
		parent::__construct();
		$this->load->model('pengguna_m');
	}

	public function login(){
		$this->pengguna_m->set_email(strtolower($this->input->post('email')));		// $_POST['username']
		$this->pengguna_m->set_password(md5(strtolower($this->input->post('sandi'))));		
			
		$query = $this->pengguna_m->view_pengguna_by_email_pass();	// mysql_query("");
				
		if($query->num_rows() > 0){		// mysql_num_rows();
			$row = $query->row();	// eq: fetch object
			$this->session->set_userdata('idmember',$row->idmember);
			$this->session->set_userdata('nama',$row->nama);
			$this->session->set_userdata('idlogin',strtolower($row->idlogin));
			$this->session->set_userdata('password',md5(strtolower($row->password)));
			$this->session->set_userdata('status','member');
			$this->pengguna_m->updatetimelogin();
			redirect(base_url().'member');	# redirect(site_url());
		}
		else {
			$data["status"] = "error";
			$this->load->view("home_v", $data);
		}					
	}
		
	public function logout(){
		$this->pengguna_m->updatetimelogout();
		$this->session->unset_userdata('idmember');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('idlogin');
		$this->session->unset_userdata('password');
		$this->session->unset_userdata('status');
		redirect(base_url().'home');
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */