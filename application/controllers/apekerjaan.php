<?php

class Apekerjaan extends CI_Controller {

		// Constuctor
		public function __construct(){
			parent::__construct();
			$this->load->model('apesan_m');
			$this->load->model('amemberperusahaan_m');
			$this->load->model('akategori_m');
			$this->load->model('ajabatan_m');
			$this->load->model('apekerjaan_m');
		}
	
		public function index(){
			if(empty($this->session->userdata('aid')) && empty($this->session->userdata('anama')) && 
				empty($this->session->userdata('username')) && empty($this->session->userdata('apassword')) && 
				  empty($this->session->userdata('astatus'))){
				redirect(base_url().'administrator');
			}
			else {
				$this->load->view('apekerjaan_v');
			}
		}

		public function save()
		{
			$this->apekerjaan_m->insert($this->input->post('kategori'), $this->input->post('jabatan'), $this->input->post('pekerjaan'));
			redirect(base_url().'apekerjaan');
		}
		
		public function update(){
			$this->apekerjaan_m->update($this->input->post('idpekerjaan_tmp'),$this->input->post('kategori'),$this->input->post('jabatan'),$this->input->post('pekerjaan'));
			redirect(base_url().'apekerjaan');
		}

		public function delete()
		{	
			$this->apekerjaan_m->delete($this->input->post("idpekerjaan"));
			redirect(base_url().'apekerjaan');
		}
				
		public function delete_all()
		{
			$this->apekerjaan_m->delete_all();
			redirect(base_url().'apekerjaan');
		}

		public function export()
		{
			if($this->uri->segment(3) == "excel"){
				header('Content-Type: application/ms-excel'); // msword   atau  yms-excel
				header('Content-Disposition: attachment; filename="Daftar Pekerjaan di Jobstreet.xls"');
				
				$this->load->view('apekerjaan_export_v');
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
				
				$html = $this->parser->parse('apekerjaan_export_v', array());
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