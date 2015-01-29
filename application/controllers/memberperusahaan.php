<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MemberPerusahaan extends CI_Controller {

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
				$this->load->view('memberperusahaan_v');
			}
		}
	}
		
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */