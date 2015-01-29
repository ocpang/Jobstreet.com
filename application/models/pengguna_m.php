<?php
	class Pengguna_M extends CI_Model {
		// Property -> Tipe data harus private
		private $email;
		private $password;
		
		//Setter - Mutator
		public function set_email($value){
			$this->email = $value;
		}
		
		public function set_password($value){
			$this->password = $value;
		}		
		
		//Getter - Accessor
		public function get_email(){
			return $this->email;
		}
		public function get_password(){
			return $this->password;
		}
	
		// Method
		public function view_pengguna_by_email_pass(){
			$query = "SELECT * FROM tbl_member WHERE idlogin='". $this->get_email() ."' AND password='". $this->get_password() ."'";
			return $this->db->query($query);
		}

		public function viewidlogin($idlogin){
			$query = "SELECT * FROM tbl_member WHERE idlogin='". $idlogin."'";
			return $this->db->query($query);
		}

		public function updatetimelogin(){
			$query = "UPDATE tbl_member SET timelogin=NOW() WHERE idmember=". $this->session->userdata('idmember');

			$this->db->query($query);
		}	

		public function updatetimelogout(){
			$query = "UPDATE tbl_member SET timelogout=NOW() WHERE idmember=". $this->session->userdata('idmember');

			$this->db->query($query);
		}	

		public function insert($nama, $namakota, $idlogin, $password)
		{
			$sql = "INSERT INTO tbl_member VALUES ('','".$nama."',".$namakota.",'".$idlogin."','".$password."','','')";
					
			$this->db->query($sql);
		}

	}
?>