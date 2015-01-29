<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
			if($this->session->userdata('status') == 'member'){
				redirect(base_url().'member');
			}
			elseif($this->session->userdata('status') == 'perusahaan'){
				redirect(base_url().'perusahaan');
			}
			else{
				$this->load->view('home_v');
			}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */