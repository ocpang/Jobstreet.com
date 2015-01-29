<?php
	class PengajuanBerkas_M extends CI_Model {

		// Method	
		public function view($idmember){
			$query = "SELECT * FROM (((((tbl_pengajuan as peng INNER JOIN tbl_lowongankerja as l ON peng.idlowongan = l.idlowongan)  
															   INNER JOIN tbl_perusahaan as p ON l.idperusahaan = p.idperusahaan) 
															   INNER JOIN tbl_pekerjaan as pek ON l.idpekerjaan=pek.idpekerjaan)
															   INNER JOIN tbl_kota as k ON p.idkota = k.idkota)
															   INNER JOIN tbl_kategori as kat ON pek.idkategori =kat.idkategori) 
															   INNER JOIN tbl_jabatan as jab ON pek.idjabatan =jab.idjabatan
					  WHERE peng.idmember = ". $idmember ."
					  ORDER BY peng.tanggal DESC";
			return $this->db->query($query);
		}

		public function viewlamaranperusahaan($idperusahaan){
			$query = "SELECT * FROM ((((((tbl_pengajuan as peng INNER JOIN tbl_lowongankerja as l ON l.idlowongan = peng.idlowongan)  
                                       INNER JOIN tbl_perusahaan as p ON l.idperusahaan = p.idperusahaan) 
                                       INNER JOIN tbl_pekerjaan as pek ON l.idpekerjaan=pek.idpekerjaan)
					                   INNER JOIN tbl_kategori as kat ON pek.idkategori =kat.idkategori) 
                                       INNER JOIN tbl_jabatan as jab ON pek.idjabatan =jab.idjabatan)
                                       INNER JOIN tbl_member as m ON peng.idmember = m.idmember)
									   INNER JOIN tbl_kota as k ON p.idkota = k.idkota
					  WHERE l.idperusahaan = ". $idperusahaan ."
					  ORDER BY peng.tanggal DESC";
			return $this->db->query($query);
		}

		public function insert($idlowongan, $portofolio)
		{
			$sql = "INSERT INTO tbl_pengajuan VALUES ('',". $this->session->userdata('idmember') .",". $idlowongan .",'". $portofolio ."',NOW())";
					
			$this->db->query($sql);
		}

		public function delete($idpengajuan)
		{
			$sql = "DELETE FROM tbl_pengajuan WHERE idpengajuan=".$idpengajuan;
					
			$this->db->query($sql);
		}

	}
?>