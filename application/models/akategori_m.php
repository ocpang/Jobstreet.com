<?php
	class Akategori_M extends CI_Model {
	
		// Method	
		public function view(){
			$query = "SELECT * FROM tbl_kategori ORDER BY namakategori";
			return $this->db->query($query);
		}
		
		public function insert($kategori)
		{
			$sql = "INSERT INTO tbl_kategori VALUES ('','".$kategori."')";
					
			$this->db->query($sql);
		}

		public function update($idkategori, $kategori)
		{
			$sql = "UPDATE tbl_kategori SET namakategori='".$kategori."' WHERE idkategori=".$idkategori;
					
			$this->db->query($sql);
		}

		public function delete($idkategori)
		{
			$sql = "DELETE FROM tbl_kategori WHERE idkategori=".$idkategori;
					
			$this->db->query($sql);
		}

		public function delete_all()
		{
			$sql = "TRUNCATE TABLE tbl_kategori";
			
			$this->db->query($sql);
		}
		
	}
?>