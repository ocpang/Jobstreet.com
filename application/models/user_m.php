<?php
	class User_M extends CI_Model {
	
		// Method	
		public function view(){
			$query = "SELECT * FROM tbl_admin ORDER BY nama";
			return $this->db->query($query);
		}
		
		public function viewidlogin($idlogin){
			$query = "SELECT * FROM tbl_admin WHERE idlogin='". $idlogin."'";
			return $this->db->query($query);
		}

		public function insert($nama, $idlogin, $password, $status)
		{
			$sql = "INSERT INTO tbl_admin VALUES ('','".$nama."','".$idlogin."','".$password."','".$status."','','')";
					
			$this->db->query($sql);
		}

		public function update($idadmin, $nama, $idlogin, $password, $status)
		{
			$sql = "UPDATE tbl_admin SET nama='".$nama."', idlogin='".$idlogin."',password='".$password."', status='".$status."' 
					WHERE idadmin=".$idadmin;
					
			$this->db->query($sql);
		}

		public function delete($idadmin)
		{
			$sql = "DELETE FROM tbl_admin WHERE idadmin=".$idadmin."";
					
			$this->db->query($sql);
		}
		
	}
?>