<?php
	class Aprovinsi_M extends CI_Model {
	
		// Method	
		public function view(){
			$query = "SELECT * FROM tbl_provinsi ORDER BY namaprovinsi";
			return $this->db->query($query);
		}
		
		public function insert($provinsi)
		{
			$sql = "INSERT INTO tbl_provinsi (namaprovinsi) VALUES ('".$provinsi."')";
					
			$this->db->query($sql);
		}

		public function update($idprovinsi, $provinsi)
		{
			$sql = "UPDATE tbl_provinsi SET namaprovinsi='".$provinsi."' WHERE idprovinsi=".$idprovinsi;
					
			$this->db->query($sql);
		}

		public function delete($idprovinsi)
		{
			$sql = "DELETE FROM tbl_provinsi WHERE idprovinsi=".$idprovinsi;
					
			$this->db->query($sql);
		}

		public function delete_all()
		{
			$sql = "TRUNCATE TABLE tbl_provinsi";
			
			$this->db->query($sql);
		}
		
	}
?>