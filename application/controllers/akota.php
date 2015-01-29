<?php

class Akota extends CI_Controller {

		// Constuctor
		public function __construct(){
			parent::__construct();
			$this->load->model('apesan_m');
			$this->load->model('akota_m');
			$this->load->model('amemberperusahaan_m');
			$this->load->model('aprovinsi_m');
		}
	
		public function index(){
			if(empty($this->session->userdata('aid')) && empty($this->session->userdata('anama')) && 
				empty($this->session->userdata('username')) && empty($this->session->userdata('apassword')) && 
				  empty($this->session->userdata('astatus'))){
				redirect(base_url().'administrator');
			}
			else {
				$this->load->view('akota_v');
			}
		}

		public function save()
		{
			$this->akota_m->insert($this->input->post('provinsi'), $this->input->post('kota'));
			redirect(base_url().'akota');
		}
		
		public function update(){
			$this->akota_m->update($this->input->post('idkota_tmp'),$this->input->post('provinsi'),$this->input->post('kota'));
			redirect(base_url().'akota');
		}

		public function delete()
		{	
			$this->akota_m->delete($this->input->post("idkota"));
			redirect(base_url().'akota');
		}
				
		public function delete_all()
		{
			$this->akota_m->delete_all();
			redirect(base_url().'akota');
		}

		public function export()
		{
			if($this->uri->segment(3) == "excel"){
				header('Content-Type: application/ms-excel'); // msword   atau  yms-excel
				header('Content-Disposition: attachment; filename="Daftar Kota di Jobstreet.xls"');
				
				$this->load->view('akota_export_v');
			}
			else if($this->uri->segment(3) == "pdf"){
				$this->load->library('tcpdf');
				$this->load->library('parser');
				$pdf = new tcpdf();
				
				$orientation = 'L';
				$format = 'A4';
				$keepmargins = false;
				$tocpage = false;
				
				$pdf->AddPage($orientation, $format, $keepmargins, $tocpage);
				
				$family = "dejavusans";
				$style = "";
				$size = "11";
				
				$pdf->SetFont($family, $style, $size);
				
				$html = $this->parser->parse('akota_export_v', array());
				$ln = true;
				$fill = false;
				$reseth = false;
				$cell = false;
				$align = "";
				
				$pdf->WriteHTML($html, $ln, $fill, $reseth, $cell, $align);
				$pdf->output();
	
			}			
		}	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */