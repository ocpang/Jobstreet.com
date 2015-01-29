<?php
	class Apekerjaan_M extends CI_Model {
	
		// Method	
		public function view(){
			$query = "SELECT * FROM (tbl_pekerjaan as p INNER JOIN tbl_kategori as k ON p.idkategori = k.idkategori) 
														INNER JOIN tbl_jabatan as j ON p.idjabatan = j.idjabatan 
					  ORDER BY k.namakategori";
			return $this->db->query($query);
		}
		
		public function insert($kategori, $jabatan, $pekerjaan)
		{
			$sql = "INSERT INTO tbl_pekerjaan VALUES ('',". $kategori .",". $jabatan .",'".$pekerjaan."')";
					
			$this->db->query($sql);
		}

		public function update($idpekerjaan, $kategori, $jabatan, $pekerjaan)
		{
			$sql = "UPDATE tbl_pekerjaan SET idkategori=". $kategori .", idjabatan=". $jabatan .", namapekerjaan='".$pekerjaan."' WHERE idpekerjaan=".$idpekerjaan;
					
			$this->db->query($sql);
		}

		public function delete($idpekerjaan)
		{
			$sql = "DELETE FROM tbl_pekerjaan WHERE idpekerjaan=".$idpekerjaan;
					
			$this->db->query($sql);
		}

		public function delete_all()
		{
			$sql = "TRUNCATE TABLE tbl_pekerjaan";
			
			$this->db->query($sql);
		}
		
	}
?>