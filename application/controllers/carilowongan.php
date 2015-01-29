<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CariLowongan extends CI_Controller {

	// Constuctor
	public function __construct(){
		parent::__construct();
		$this->load->model('apekerjaan_m');
		$this->load->model('akota_m');
		$this->load->model('lowongankerja_m');
		$this->load->model('pengajuanberkas_m');
	}

	public function index()
	{
		if(empty($this->session->userdata('idmember')) && empty($this->session->userdata('nama')) && empty($this->session->userdata('idlogin')) && 
			empty($this->session->userdata('password')) && empty($this->session->userdata('status'))){
			redirect(base_url());
		}
		else{
			if($this->session->userdata('status') == 'member'){
				$this->load->view('carilowongan_v');
			}
			elseif($this->session->userdata('status') == 'perusahaan'){
				echo "<script>alert('Anda tidak dapat mengakses halaman ini');</script>";	
				redirect(base_url().'memberperusahaan');
			}
		}
	}
	
	public function pencarian()
	{
		$this->lowongankerja_m->hasilpencarian($this->input->post('pekerjaan'), $this->input->post('namakota'), $this->input->post('gaji'));
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */