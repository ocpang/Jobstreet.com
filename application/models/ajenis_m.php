<?php
	class Ajenis_M extends CI_Model {
	
		// Method	
		public function view(){
			$query = "SELECT * FROM tbl_jenisperusahaan ORDER BY jenis";
			return $this->db->query($query);
		}
		
		public function insert($jenis)
		{
			$sql = "INSERT INTO tbl_jenisperusahaan VALUES ('','".$jenis."')";
					
			$this->db->query($sql);
		}

		public function update($idjenis, $jenis)
		{
			$sql = "UPDATE tbl_jenisperusahaan SET jenis='".$jenis."' WHERE idjenis=".$idjenis;
					
			$this->db->query($sql);
		}

		public function delete($idjenis)
		{
			$sql = "DELETE FROM tbl_jenisperusahaan WHERE idjenis=".$idjenis;
					
			$this->db->query($sql);
		}

		public function delete_all()
		{
			$sql = "TRUNCATE TABLE tbl_jenisperusahaan";
			
			$this->db->query($sql);
		}
		
	}
?>