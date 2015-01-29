<?php

class User extends CI_Controller {

		// Constuctor
		public function __construct(){
			parent::__construct();
			$this->load->model('apesan_m');
			$this->load->model('amemberperusahaan_m');
			$this->load->model('user_m');
		}
	
		public function index(){
			if(empty($this->session->userdata('aid')) && empty($this->session->userdata('anama')) && empty($this->session->userdata('ausername')) && 
				empty($this->session->userdata('apassword')) && empty($this->session->userdata('astatus'))){
				redirect(base_url().'administrator');
			}
			else {
				$this->load->view('user_v');
			}
		}

		public function save()
		{

			if(strtolower($this->input->post('password')) == strtolower($this->input->post('konfpassword'))){				
				$query = $this->user_m->viewidlogin($this->input->post('idlogin'));
				if(!$query->num_rows()){					
					$this->user_m->insert($this->input->post('nama'),strtolower($this->input->post('idlogin')),md5(strtolower($this->input->post('password'))),$this->input->post('status'));
					redirect(base_url().'user');
				}
				else {
					$data["status"] = "idlogin";
					$this->load->view("user_v", $data);
				}							
			}
			else {
				$data["status"] = "error_save";
				$this->load->view("user_v", $data);
			}			
		}
		
		public function update(){
			if(strtolower($this->input->post('password')) == strtolower($this->input->post('konfpassword'))){				
				$this->user_m->update($this->input->post('idadmin_tmp'),$this->input->post('nama'),strtolower($this->input->post('idlogin_tmp')),md5(strtolower($this->input->post('password'))),$this->input->post('status'));
				redirect(base_url().'user');
			}
			else {
				$data["status"] = "error_save";
				$this->load->view("user_v", $data);
			}			
		}

		public function delete()
		{	
			$this->user_m->delete($this->input->post("idadmin"));
			redirect(base_url().'user');
		}
				
		public function export()
		{
			if($this->uri->segment(3) == "excel"){
				header('Content-Type: application/ms-excel'); // msword   atau  yms-excel
				header('Content-Disposition: attachment; filename="Daftar User Jobstreet.xls"');
				
				$this->load->view('user_export_v');
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
				
				$html = $this->parser->parse('user_export_v', array());
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