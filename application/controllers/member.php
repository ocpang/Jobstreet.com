<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller {

	public function index()
	{
		if(empty($this->session->userdata('idmember')) && empty($this->session->userdata('nama')) && empty($this->session->userdata('idlogin')) && 
			empty($this->session->userdata('password')) && empty($this->session->userdata('status'))){
			redirect(base_url());
		}
		else{
			if($this->session->userdata('status') == 'member'){
				$this->load->view('member_v');
			}
			elseif($this->session->userdata('status') == 'perusahaan'){
				echo "<script>alert('Anda tidak dapat mengakses halaman ini');</script>";	
				redirect(base_url().'memberperusahaan');
			}
		}
	}
		
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */