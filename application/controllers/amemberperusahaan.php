<?php

class Amemberperusahaan extends CI_Controller {

		// Constuctor
		public function __construct(){
			parent::__construct();
			$this->load->model('apesan_m');
			$this->load->model('akota_m');
			$this->load->model('amemberperusahaan_m');
		}
	
		public function index(){
			if(empty($this->session->userdata('aid')) && empty($this->session->userdata('anama')) && empty($this->session->userdata('ausername')) && 
				empty($this->session->userdata('apassword')) && empty($this->session->userdata('astatus'))){
				redirect(base_url().'administrator');
			}
			else {
				$this->load->view('amemberperusahaan_v');
			}
		}

		public function save()
		{

			if(strtolower($this->input->post('password')) == strtolower($this->input->post('konfpassword'))){				
				$query = $this->amemberperusahaan_m->viewidlogin($this->input->post('idlogin'));
				if(!$query->num_rows()){	
					$this->amemberperusahaan_m->insert($this->input->post('nama'),
													strtolower($this->input->post('idlogin')),
													md5(strtolower($this->input->post('password'))),
													$this->input->post('jenis'),
													$this->input->post('namakota'),
													$this->input->post('website'),
													$this->input->post('status'),
													$this->session->userdata('aid'));
					redirect(base_url().'amemberperusahaan');
				}
				else {
					$data["status"] = "idlogin";
					$this->load->view("amemberperusahaan_v", $data);
				}							
				
			}
			else {
				$data["status"] = "error_save";
				$this->load->view("amemberperusahaan_v", $data);
			}			
		}
		
		public function update(){
			if(strtolower($this->input->post('password')) == strtolower($this->input->post('konfpassword'))){				
				$this->amemberperusahaan_m->update($this->input->post('idperusahaan_tmp'),
													$this->input->post('nama'),
													strtolower($this->input->post('idlogin_tmp')),
													md5(strtolower($this->input->post('password'))),
													$this->input->post('jenis'),
													$this->input->post('namakota'),
													$this->input->post('website'),
													$this->input->post('status'),
													$this->session->userdata('aid'));
													
				redirect(base_url().'amemberperusahaan');
			}
			else {
				$data["status"] = "error_save";
				$this->load->view("amemberperusahaan_v", $data);
			}			
		}

		public function updatestatus()
		{	
			$this->amemberperusahaan_m->updatestatus($this->input->post("idperusahaan"), $this->input->post('statusperusahaan'));
			redirect(base_url().'amemberperusahaan');
		}

		public function delete()
		{	
			$this->amemberperusahaan_m->delete($this->input->post("idperusahaan"));
			redirect(base_url().'amemberperusahaan');
		}
				
		public function delete_all()
		{
			$this->amemberperusahaan_m->delete_all();
			redirect(base_url().'amemberperusahaan');
		}

		public function export()
		{
			if($this->uri->segment(3) == "excel"){
				header('Content-Type: application/ms-excel'); // msword   atau  yms-excel
				header('Content-Disposition: attachment; filename="Daftar Member Perusahaan Jobstreet.xls"');
				
				$this->load->view('amemberperusahaan_export_v');
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
				
				$html = $this->parser->parse('amemberperusahaan_export_v', array());
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