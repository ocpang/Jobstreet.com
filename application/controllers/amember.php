<?php

class Amember extends CI_Controller {

		// Constuctor
		public function __construct(){
			parent::__construct();
			$this->load->model('apesan_m');
			$this->load->model('amemberperusahaan_m');
			$this->load->model('amember_m');
			$this->load->model('akota_m');
		}
	
		public function index(){
			if(empty($this->session->userdata('aid')) && empty($this->session->userdata('anama')) && empty($this->session->userdata('ausername')) && 
				empty($this->session->userdata('apassword')) && empty($this->session->userdata('astatus'))){
				redirect(base_url().'memberistrator');
			}
			else {
				$this->load->view('amember_v');
			}
		}

		public function save()
		{
			if(strtolower($this->input->post('password')) == strtolower($this->input->post('konfpassword'))){				
				$query = $this->amember_m->viewidlogin($this->input->post('idlogin'));
				if(!$query->num_rows()){	
					$this->amember_m->insert($this->input->post('nama'),$this->input->post('namakota'),strtolower($this->input->post('idlogin')),md5(strtolower($this->input->post('password'))));
					redirect(base_url().'amember');
				}
				else {
					$data["status"] = "idlogin";
					$this->load->view("amember_v", $data);
				}							
			}
			else {
				$data["status"] = "error_save";
				$this->load->view("amember_v", $data);
			}			
		}
		
		public function update(){
			if(strtolower($this->input->post('password')) == strtolower($this->input->post('konfpassword'))){				
				$this->amember_m->update($this->input->post('idmember_tmp'),$this->input->post('nama'),$this->input->post('namakota'),strtolower($this->input->post('idlogin_tmp')),md5(strtolower($this->input->post('password'))));
				redirect(base_url().'amember');
			}
			else {
				$data["status"] = "error_save";
				$this->load->view("amember_v", $data);
			}			
		}

		public function delete()
		{	
			$this->amember_m->delete($this->input->post("idmember"));
			redirect(base_url().'amember');
		}
				
		public function delete_all()
		{
			$this->amember_m->delete_all();
			redirect(base_url().'amember');
		}

		public function export()
		{
			if($this->uri->segment(3) == "excel"){
				header('Content-Type: application/ms-excel'); // msword   atau  yms-excel
				header('Content-Disposition: attachment; filename="Daftar Member Jobstreet.xls"');
				
				$this->load->view('amember_export_v');
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
				
				$html = $this->parser->parse('amember_export_v', array());
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