<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perusahaan extends CI_Controller {
	
	// Constuctor
	public function __construct(){
		parent::__construct();
		$this->load->model('akota_m');
		$this->load->model('amemberperusahaan_m');
	}

	public function index()
	{
		if(empty($this->session->userdata('idperusahaan')) && empty($this->session->userdata('namaperusahaan')) && empty($this->session->userdata('idloginperusahaan')) && empty($this->session->userdata('passwordperusahaan')) && empty($this->session->userdata('status'))){
			$this->load->view('perusahaan_v');
		}
		else {
			redirect(base_url().'memberperusahaan');
		}
	}

	public function save()
	{

			if(strtolower($this->input->post('password')) == strtolower($this->input->post('konfpassword'))){				
				$query = $this->amemberperusahaan_m->viewidlogin($this->input->post('idlogin'));
				if(!$query->num_rows()){	
					$this->amemberperusahaan_m->insert($this->input->post('nama'),
													strtolower($this->input->post('idlogin')),
													md5(strtolower($this->input->post('password'))),
													$this->input->post('jenis'),
													$this->input->post('namakota'),
													$this->input->post('website'),
													'Tidak Aktif',
													1);
					$data["status"] = "berhasil";
					$this->load->view("perusahaan_v", $data);
				}
				else {
					$data["status"] = "idlogin";
					$this->load->view("perusahaan_v", $data);
				}							
				
			}
			else {
				$data["status"] = "error_save";
				$this->load->view("perusahaan_v", $data);
			}			
	}

	public function loginperusahaan(){
		
		$query = $this->amemberperusahaan_m->view_perusahaan_by_email_pass(strtolower($this->input->post('email')), md5(strtolower($this->input->post('sandi'))));
				
		if($query->num_rows() > 0){		// mysql_num_rows();
			$row = $query->row();	// eq: fetch object
			$this->session->set_userdata('idperusahaan',$row->idperusahaan);
			$this->session->set_userdata('namaperusahaan',$row->namaperusahaan);
			$this->session->set_userdata('idloginperusahaan',strtolower($row->idloginperusahaan));
			$this->session->set_userdata('passwordperusahaan',md5(strtolower($row->passwordperusahaan)));
			$this->session->set_userdata('validasi',$row->statusperusahaan);
			$this->session->set_userdata('status','perusahaan');
			redirect(base_url().'memberperusahaan');	# redirect(site_url());
		}
		else {
			$data["status"] = "error";
			$this->load->view("perusahaan_v", $data);
		}					
	}
		
	public function logout(){
		$this->session->unset_userdata('idperusahaan');
		$this->session->unset_userdata('namaperusahaan');
		$this->session->unset_userdata('idloginperusahaan');
		$this->session->unset_userdata('passwordperusahaan');
		$this->session->unset_userdata('validasi');
		$this->session->unset_userdata('status');
		redirect(base_url().'perusahaan');
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */