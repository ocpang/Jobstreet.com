<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PengajuanBerkas extends CI_Controller {

	// Constuctor
	public function __construct(){
		parent::__construct();
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
				$this->load->view('pengajuanberkas_v');
			}
			elseif($this->session->userdata('status') == 'perusahaan'){
				echo "<script>alert('Anda tidak dapat mengakses halaman ini');</script>";	
				redirect(base_url().'memberperusahaan');
			}
		}
	}
	
	public function save()
	{
		
//		Memasukkan url berkas ke dalam database
		$this->pengajuanberkas_m->insert($this->input->post('idlowongan'),$this->input->post('portofolio'));
		redirect(base_url().'pengajuanberkas');
	}

	public function delete()
	{	
		$this->pengajuanberkas_m->delete($this->input->post("idpengajuan"));
		redirect(base_url().'pengajuanberkas');
	}
		
}
