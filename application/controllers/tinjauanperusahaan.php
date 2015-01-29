<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TinjauanPerusahaan extends CI_Controller {

	// Constuctor
	public function __construct(){
		parent::__construct();
		$this->load->model('amemberperusahaan_m');
		$this->load->model('akota_m');
	}

	public function index()
	{
		if(empty($this->session->userdata('idperusahaan')) && empty($this->session->userdata('namaperusahaan')) && empty($this->session->userdata('idloginperusahaan')) && empty($this->session->userdata('passwordperusahaan')) && empty($this->session->userdata('status'))){
			redirect(base_url().'perusahaan');
		}
		else {
			if($this->session->userdata('status') == 'member'){
				echo "<script>alert('Anda tidak dapat mengakses halaman ini');</script>";	
				redirect(base_url().'member');
			}
			elseif($this->session->userdata('status') == 'perusahaan'){
				$this->load->view('tinjauanperusahaan_v');
			}
		}
	}

	public function update(){
			if(strtolower($this->input->post('password')) == strtolower($this->input->post('konfpassword'))){				
				$this->amemberperusahaan_m->update($this->input->post('idperusahaan_tmp'),
													$this->input->post('nama'),
													strtolower($this->input->post('idlogin_tmp')),
													md5(strtolower($this->input->post('password'))),
													$this->input->post('jenis'),
													$this->input->post('namakota'),
													$this->input->post('website'),
													$this->session->userdata('validasi'),
													'');
				$data["status"] = "ubah";
				$this->load->view("tinjauanperusahaan_v", $data);
				
			}
			else {
				$data["status"] = "error_save";
				$this->load->view("tinjauanperusahaan_v", $data);
			}			

	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */