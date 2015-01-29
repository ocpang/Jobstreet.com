<?php
	class Ajabatan_M extends CI_Model {
	
		// Method	
		public function view(){
			$query = "SELECT * FROM tbl_jabatan ORDER BY namajabatan";
			return $this->db->query($query);
		}
		
		public function insert($jabatan)
		{
			$sql = "INSERT INTO tbl_jabatan VALUES ('','".$jabatan."')";
					
			$this->db->query($sql);
		}

		public function update($idjabatan, $jabatan)
		{
			$sql = "UPDATE tbl_jabatan SET namajabatan='".$jabatan."' WHERE idjabatan=".$idjabatan;
					
			$this->db->query($sql);
		}

		public function delete($idjabatan)
		{
			$sql = "DELETE FROM tbl_jabatan WHERE idjabatan=".$idjabatan;
					
			$this->db->query($sql);
		}

		public function delete_all()
		{
			$sql = "TRUNCATE TABLE tbl_jabatan";
			
			$this->db->query($sql);
		}
		
	}
?>