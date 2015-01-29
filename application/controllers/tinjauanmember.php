<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TinjauanMember extends CI_Controller {

	// Constuctor
	public function __construct(){
		parent::__construct();
		$this->load->model('amember_m');
		$this->load->model('akota_m');
	}

	public function index()
	{
		if(empty($this->session->userdata('idmember')) && empty($this->session->userdata('nama')) && empty($this->session->userdata('idlogin')) && empty($this->session->userdata('password')) && empty($this->session->userdata('status'))){
			redirect(base_url().'perusahaan');
		}
		else {
			if($this->session->userdata('status') == 'perusahaan'){
				echo "<script>alert('Anda tidak dapat mengakses halaman ini');</script>";	
				redirect(base_url().'perusahaan');
			}
			elseif($this->session->userdata('status') == 'member'){
				$this->load->view('tinjauanmember_v');
			}
		}
	}

	public function update(){
			if(strtolower($this->input->post('password')) == strtolower($this->input->post('konfpassword'))){				

				$this->amember_m->update($this->input->post('idmember_tmp'),
													$this->input->post('nama'),
													$this->input->post('namakota'),
													strtolower($this->input->post('idlogin_tmp')),
													md5(strtolower($this->input->post('password'))));
				$data["status"] = "ubah";
				$this->load->view("tinjauanmember_v", $data);
				
			}
			else {
				$data["status"] = "error_save";
				$this->load->view("tinjauanmember_v", $data);
			}			

	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */