<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class IklanLowongan extends CI_Controller {

	// Constuctor
	public function __construct(){
		parent::__construct();
		$this->load->model('apekerjaan_m');
		$this->load->model('lowongankerja_m');
	}

	public function index()
	{
		if(empty($this->session->userdata('idperusahaan')) && empty($this->session->userdata('namaperusahaan')) && empty($this->session->userdata('idloginperusahaan')) && empty($this->session->userdata('passwordperusahaan')) && empty($this->session->userdata('status'))){
			redirect(base_url().'perusahaan');
		}
		else {
			if($this->session->userdata('status') == 'member'){
				echo "<script>alert('Anda tidak dapat mengakses halaman ini');</script>";	
				redirect(base_url().'member');
			}
			elseif($this->session->userdata('status') == 'perusahaan'){
				$this->load->view('iklanlowongan_v');
			}
		}
	}
	
	public function save(){
		$this->lowongankerja_m->insert($this->session->userdata('idperusahaan'),$this->input->post('pekerjaan'),$this->input->post('gaji'),$this->input->post('keterangan'));

		$data["status"] = "tambah";
		$this->load->view("iklanlowongan_v", $data);
	}

		public function update(){
			$this->lowongankerja_m->update($this->input->post('idlowongan_tmp'),$this->input->post('pekerjaan'),$this->input->post('gaji'),$this->input->post('keterangan'));
			$data["status"] = "ubah";
			$this->load->view("iklanlowongan_v", $data);
		}

		public function delete()
		{	
			$this->lowongankerja_m->delete($this->input->post("idlowongan"));
			
			$data["status"] = "hapus";
			$this->load->view("iklanlowongan_v", $data);
		}
				
		public function delete_all()
		{
			$this->lowongankerja_m->delete_all();
			$data["status"] = "hapussemua";
			$this->load->view("iklanlowongan_v", $data);
		}

		public function export()
		{
			if($this->uri->segment(3) == "excel"){
				header('Content-Type: application/ms-excel'); // msword   atau  yms-excel
				header('Content-Disposition: attachment; filename="Daftar Lowongan Kerja di Jobstreet.xls"');
				
				$this->load->view('lowongankerja_export_v');
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
				
				$html = $this->parser->parse('lowongankerja_export_v', array());
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