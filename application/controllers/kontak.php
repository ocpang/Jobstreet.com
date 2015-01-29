<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kontak extends CI_Controller {

	// Constuctor
	public function __construct(){
		parent::__construct();
		$this->load->model('kontak_m');
	}

	public function index()
	{
		$this->load->view('kontak_v');
	}
	
	public function pesan()
	{
		$this->kontak_m->insert($this->input->post('nama'), $this->input->post('email'), $this->input->post('pesan'));

		$data["status"] = "berhasil";
		$this->load->view("kontak_v", $data);
	}	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */