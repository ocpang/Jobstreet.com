<?php
	class Admin_M extends CI_Model {
		// Property -> Tipe data harus private
		private $username;
		private $password;
		private $status;
		
		//Setter - Mutator
		public function set_username($value){
			$this->username = $value;
		}
		
		public function set_password($value){
			$this->password = $value;
		}
		
		public function set_status($value){
			$this->status = $value;
		}
		
		//Getter - Accessor
		public function get_username(){
			return $this->username;
		}
		public function get_password(){
			return $this->password;
		}
		public function get_status(){
			return $this->status;
		}
	
		// Method
		public function view_pengguna_by_username_pass(){
			$query = "SELECT * FROM tbl_admin WHERE idlogin='". $this->get_username() ."' AND password='". $this->get_password() ."'";
			return $this->db->query($query);
		}	

		public function updatetimelogin(){
			$query = "UPDATE tbl_admin SET timelogin=NOW() WHERE idadmin=". $this->session->userdata('aid');

			$this->db->query($query);
		}	

		public function updatetimelogout(){
			$query = "UPDATE tbl_admin SET timelogout=NOW() WHERE idadmin=". $this->session->userdata('aid');

			$this->db->query($query);
		}	

		
	}
?>