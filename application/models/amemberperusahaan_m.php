<?php
	class Amemberperusahaan_M extends CI_Model {

		// Method	
		public function view(){
			$query = "SELECT * FROM ((tbl_perusahaan as m INNER JOIN tbl_kota as k ON m.idkota = k.idkota) 
														INNER JOIN tbl_jenisperusahaan as j ON m.idjenis =  j.idjenis) 
														INNER JOIN tbl_admin as a ON m.idadmin = a.idadmin ORDER BY m.namaperusahaan";
			return $this->db->query($query);
		}

		public function viewperusahaan($idperusahaan){
			$query = "SELECT * FROM ((tbl_perusahaan as m INNER JOIN tbl_kota as k ON m.idkota = k.idkota) 
														INNER JOIN tbl_jenisperusahaan as j ON m.idjenis =  j.idjenis) 
														INNER JOIN tbl_admin as a ON m.idadmin = a.idadmin 
					  WHERE m.idperusahaan=". $idperusahaan;
			return $this->db->query($query);
		}

		public function viewidlogin($idlogin){
			$query = "SELECT * FROM tbl_perusahaan WHERE idloginperusahaan='". $idlogin."'";
			return $this->db->query($query);
		}

		public function view_perusahaan_by_email_pass($email, $password){
			$query = "SELECT * FROM tbl_perusahaan WHERE idloginperusahaan='". $email ."' AND passwordperusahaan='". $password ."' AND statusperusahaan='Aktif' "; 
			return $this->db->query($query);
		}

		public function jumlahperusahaanbaru(){
			$query = "SELECT * FROM tbl_perusahaan WHERE statusperusahaan='Tidak Aktif'";
			return $this->db->query($query);
		}

		public function jenis(){
			$query = "SELECT * FROM tbl_jenisperusahaan ORDER BY jenis";
			return $this->db->query($query);
		}
		
		public function insert($namaperusahaan, $idlogin, $password, $jenis, $namakota, $website, $status, $admin)
		{
			$sql = "INSERT INTO tbl_perusahaan VALUES ('','".$namaperusahaan."',
														'".$idlogin."',
														'".$password."',
														".$jenis.",
														".$namakota.",
														'". $website ."',
														'". $status ."',
														". $admin ." )";
					
			$this->db->query($sql);
		}

		public function update($idperusahaan, $namaperusahaan, $idlogin, $password, $jenis, $namakota, $website, $status, $admin)
		{
			$sql = "UPDATE tbl_perusahaan SET namaperusahaan='".$namaperusahaan."', 
										  idloginperusahaan='".$idlogin."', 
										  passwordperusahaan='".$password."', 
										  idjenis=".$jenis.", 
										  idkota=".$namakota.", 
										  website='".$website."', 
										  statusperusahaan='".$status."'
					WHERE idperusahaan=".$idperusahaan;

			$this->db->query($sql);
		}

		public function updatestatus($idperusahaan, $status)
		{
			$sql = "UPDATE tbl_perusahaan SET statusperusahaan = '". $status ."', idadmin=". $this->session->userdata('aid') ."   
					WHERE idperusahaan=".$idperusahaan;
					
			$this->db->query($sql);
		}

		public function delete($idperusahaan)
		{
			$sql = "DELETE FROM tbl_perusahaan WHERE idperusahaan=".$idperusahaan;
					
			$this->db->query($sql);
		}

		public function delete_all()
		{
			$sql = "TRUNCATE TABLE tbl_perusahaan";
			
			$this->db->query($sql);
		}
		
	}
?>