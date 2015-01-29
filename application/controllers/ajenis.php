<?php

class Ajenis extends CI_Controller {

		// Constuctor
		public function __construct(){
			parent::__construct();
			$this->load->model('apesan_m');
			$this->load->model('amemberperusahaan_m');
			$this->load->model('ajenis_m');
		}
	
		public function index(){
			if(empty($this->session->userdata('aid')) && empty($this->session->userdata('anama')) && 
				empty($this->session->userdata('username')) && empty($this->session->userdata('apassword')) && 
				  empty($this->session->userdata('astatus'))){
				redirect(base_url().'administrator');
			}
			else {
				$this->load->view('ajenis_v');
			}
		}

		public function save()
		{
			$this->ajenis_m->insert($this->input->post('jenis'));
			redirect(base_url().'ajenis');
		}
		
		public function update(){
			$this->ajenis_m->update($this->input->post('idjenis_tmp'),$this->input->post('jenis'));
			redirect(base_url().'ajenis');
		}

		public function delete()
		{	
			$this->ajenis_m->delete($this->input->post("idjenis"));
			redirect(base_url().'ajenis');
		}
				
		public function delete_all()
		{
			$this->ajenis_m->delete_all();
			redirect(base_url().'ajenis');
		}

		public function export()
		{
			if($this->uri->segment(3) == "excel"){
				header('Content-Type: application/ms-excel'); // msword   atau  yms-excel
				header('Content-Disposition: attachment; filename="Daftar Jenis Jobstreet.xls"');
				
				$this->load->view('ajenis_export_v');
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
				
				$html = $this->parser->parse('ajenis_export_v', array());
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