<?php
	class Amember_M extends CI_Model {
	
		// Method	
		public function view(){
			$query = "SELECT * FROM tbl_member as m INNER JOIN tbl_kota as k ON m.idkota = k.idkota ORDER BY m.nama";
			return $this->db->query($query);
		}
		
		public function viewmember($idmember){
			$query = "SELECT * FROM tbl_member as m INNER JOIN tbl_kota as k ON m.idkota = k.idkota
					  WHERE m.idmember=". $idmember;
			return $this->db->query($query);
		}

		public function viewidlogin($idlogin){
			$query = "SELECT * FROM tbl_member WHERE idlogin='". $idlogin."'";
			return $this->db->query($query);
		}

		public function insert($nama, $namakota, $idlogin, $password)
		{
			$sql = "INSERT INTO tbl_member VALUES ('','".$nama."',".$namakota.",'".$idlogin."','".$password."','','')";
					
			$this->db->query($sql);
		}

		public function update($idmember, $nama, $namakota, $idlogin, $password)
		{
			$sql = "UPDATE tbl_member SET nama='".$nama."', 
										  idkota=".$namakota.", 
										  idlogin='".$idlogin."', 
										  password='".$password."' 
					WHERE idmember=".$idmember;
					
			$this->db->query($sql);
		}

		public function delete($idmember)
		{
			$sql = "DELETE FROM tbl_member WHERE idmember=".$idmember."";
					
			$this->db->query($sql);
		}

		public function delete_all()
		{
			$sql = "TRUNCATE TABLE tbl_member";
			
			$this->db->query($sql);
		}
		
	}
?>