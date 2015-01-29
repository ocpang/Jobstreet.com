<?php
	class Akota_M extends CI_Model {
	
		// Method	
		public function view(){
			$query = "SELECT * FROM tbl_kota as k INNER JOIN tbl_provinsi as p ON k.idprovinsi = p.idprovinsi   
					  ORDER BY p.namaprovinsi";
			return $this->db->query($query);
		}

		public function daftarkota(){
			$query = "SELECT * FROM tbl_kota as k INNER JOIN tbl_provinsi as p ON k.idprovinsi = p.idprovinsi   
					  ORDER BY k.namakota";
			return $this->db->query($query);
		}
		
		public function insert($provinsi, $kota)
		{
			$sql = "INSERT INTO tbl_kota VALUES ('',". $provinsi .",'".$kota."')";
					
			$this->db->query($sql);
		}

		public function update($idkota, $provinsi, $kota)
		{
			$sql = "UPDATE tbl_kota SET idprovinsi=". $provinsi .", namakota='".$kota."' WHERE idkota=".$idkota;
					
			$this->db->query($sql);
		}

		public function delete($idkota)
		{
			$sql = "DELETE FROM tbl_kota WHERE idkota=".$idkota;
					
			$this->db->query($sql);
		}

		public function delete_all()
		{
			$sql = "TRUNCATE TABLE tbl_kota";
			
			$this->db->query($sql);
		}
		
	}
?>