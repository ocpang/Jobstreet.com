<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Buatakun extends CI_Controller {

	// Constuctor
	public function __construct(){
		parent::__construct();
		$this->load->model('akota_m');
		$this->load->model('pengguna_m');
	}

	public function index()
	{
		$this->load->view('buatakun_v');
	}

	public function save(){
			if(strtolower($this->input->post('password')) == strtolower($this->input->post('konfpassword'))){				
				$query = $this->pengguna_m->viewidlogin($this->input->post('idlogin'));
				if(!$query->num_rows()){	
					$this->pengguna_m->insert($this->input->post('nama'),$this->input->post('namakota'),strtolower($this->input->post('idlogin')),md5(strtolower($this->input->post('password'))));
					redirect(base_url().'home');
				}
				else {
					$data["status"] = "idlogin";
					$this->load->view("buatakun_v", $data);
				}							
			}
			else {
				$data["status"] = "error_save";
				$this->load->view("buatakun_v", $data);
			}			
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */