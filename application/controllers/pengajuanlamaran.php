<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PengajuanLamaran extends CI_Controller {

	// Constuctor
	public function __construct(){
		parent::__construct();
		$this->load->model('pengajuanberkas_m');
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
				$this->load->view('pengajuanlamaran_v');
			}
		}
	}

	public function delete()
	{	
		$this->pengajuanberkas_m->delete($this->input->post("idpengajuan"));
		redirect(base_url().'pengajuanlamaran');
	}
		
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */