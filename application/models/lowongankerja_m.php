<?php
	class LowonganKerja_M extends CI_Model {
	
		// Method	
		public function view($idperusahaan){
			$query = "SELECT * FROM (((tbl_lowongankerja as l INNER JOIN tbl_perusahaan as p ON l.idperusahaan = p.idperusahaan) 
															INNER JOIN tbl_pekerjaan as pek ON l.idpekerjaan = pek.idpekerjaan)
															INNER JOIN tbl_kategori as k ON pek.idkategori = k.idkategori)	
															INNER JOIN tbl_jabatan as j ON pek.idjabatan = j.idjabatan																														
					  WHERE	p.idperusahaan = ". $idperusahaan ."
					  ORDER BY l.tglterbit DESC";
			return $this->db->query($query);
		}

		public function viewall(){
			$query = "SELECT * FROM (((((tbl_lowongankerja as l INNER JOIN tbl_perusahaan as p ON l.idperusahaan = p.idperusahaan) 
                                       INNER JOIN tbl_pekerjaan as pek ON l.idpekerjaan=pek.idpekerjaan)
                                       INNER JOIN tbl_kota as k ON p.idkota = k.idkota)
                                       INNER JOIN tbl_jenisperusahaan as j ON p.idjenis = j.idjenis)
                                       INNER JOIN tbl_kategori as kat ON pek.idkategori =kat.idkategori) 
                                       INNER JOIN tbl_jabatan as jab ON pek.idjabatan =jab.idjabatan
					  ORDER BY l.tglterbit DESC";
			return $this->db->query($query);
		}

		public function hasilpencarian($idpekerjaan, $idkota, $gaji){
			if(empty($idkota) && empty($gaji)){
				$query = "SELECT * FROM (((((tbl_lowongankerja as l INNER JOIN tbl_perusahaan as p ON l.idperusahaan = p.idperusahaan) 
										   INNER JOIN tbl_pekerjaan as pek ON l.idpekerjaan=pek.idpekerjaan)
										   INNER JOIN tbl_kota as k ON p.idkota = k.idkota)
										   INNER JOIN tbl_jenisperusahaan as j ON p.idjenis = j.idjenis)
										   INNER JOIN tbl_kategori as kat ON pek.idkategori =kat.idkategori) 
										   INNER JOIN tbl_jabatan as jab ON pek.idjabatan =jab.idjabatan
						  WHERE l.idpekerjaan = ". $idpekerjaan ."
						  ORDER BY l.tglterbit DESC";
			}
			elseif(empty($idpekerjaan) && empty($gaji)){
				$query = "SELECT * FROM (((((tbl_lowongankerja as l INNER JOIN tbl_perusahaan as p ON l.idperusahaan = p.idperusahaan) 
										   INNER JOIN tbl_pekerjaan as pek ON l.idpekerjaan=pek.idpekerjaan)
										   INNER JOIN tbl_kota as k ON p.idkota = k.idkota)
										   INNER JOIN tbl_jenisperusahaan as j ON p.idjenis = j.idjenis)
										   INNER JOIN tbl_kategori as kat ON pek.idkategori =kat.idkategori) 
										   INNER JOIN tbl_jabatan as jab ON pek.idjabatan =jab.idjabatan
						  WHERE p.idkota = ". $idkota."
						  ORDER BY l.tglterbit DESC";
			}
			elseif(empty($idpekerjaan) && empty($idkota)){
				$query = "SELECT * FROM (((((tbl_lowongankerja as l INNER JOIN tbl_perusahaan as p ON l.idperusahaan = p.idperusahaan) 
										   INNER JOIN tbl_pekerjaan as pek ON l.idpekerjaan=pek.idpekerjaan)
										   INNER JOIN tbl_kota as k ON p.idkota = k.idkota)
										   INNER JOIN tbl_jenisperusahaan as j ON p.idjenis = j.idjenis)
										   INNER JOIN tbl_kategori as kat ON pek.idkategori =kat.idkategori) 
										   INNER JOIN tbl_jabatan as jab ON pek.idjabatan =jab.idjabatan
						  WHERE l.gaji <= ". $gaji."
						  ORDER BY l.tglterbit DESC";
			}
			elseif(!empty($idpekerjaan) && !empty($idkota)){
				$query = "SELECT * FROM (((((tbl_lowongankerja as l INNER JOIN tbl_perusahaan as p ON l.idperusahaan = p.idperusahaan) 
										   INNER JOIN tbl_pekerjaan as pek ON l.idpekerjaan=pek.idpekerjaan)
										   INNER JOIN tbl_kota as k ON p.idkota = k.idkota)
										   INNER JOIN tbl_jenisperusahaan as j ON p.idjenis = j.idjenis)
										   INNER JOIN tbl_kategori as kat ON pek.idkategori =kat.idkategori) 
										   INNER JOIN tbl_jabatan as jab ON pek.idjabatan =jab.idjabatan
						  WHERE l.idpekerjaan = ". $idpekerjaan ." AND p.idkota = ". $idkota."
						  ORDER BY l.tglterbit DESC";
			}
			elseif(!empty($idpekerjaan) && !empty($gaji)){
				$query = "SELECT * FROM (((((tbl_lowongankerja as l INNER JOIN tbl_perusahaan as p ON l.idperusahaan = p.idperusahaan) 
										   INNER JOIN tbl_pekerjaan as pek ON l.idpekerjaan=pek.idpekerjaan)
										   INNER JOIN tbl_kota as k ON p.idkota = k.idkota)
										   INNER JOIN tbl_jenisperusahaan as j ON p.idjenis = j.idjenis)
										   INNER JOIN tbl_kategori as kat ON pek.idkategori =kat.idkategori) 
										   INNER JOIN tbl_jabatan as jab ON pek.idjabatan =jab.idjabatan
						  WHERE l.idpekerjaan = ". $idpekerjaan ." AND l.gaji <= ". $gaji."
						  ORDER BY l.tglterbit DESC";
			}
			elseif(!empty($idkota) && !empty($gaji)){
				$query = "SELECT * FROM (((((tbl_lowongankerja as l INNER JOIN tbl_perusahaan as p ON l.idperusahaan = p.idperusahaan) 
										   INNER JOIN tbl_pekerjaan as pek ON l.idpekerjaan=pek.idpekerjaan)
										   INNER JOIN tbl_kota as k ON p.idkota = k.idkota)
										   INNER JOIN tbl_jenisperusahaan as j ON p.idjenis = j.idjenis)
										   INNER JOIN tbl_kategori as kat ON pek.idkategori =kat.idkategori) 
										   INNER JOIN tbl_jabatan as jab ON pek.idjabatan =jab.idjabatan
						  WHERE p.idkota = ". $idkota." AND l.gaji <= ". $gaji."
						  ORDER BY l.tglterbit DESC";
			}
			else{
				$query = "SELECT * FROM (((((tbl_lowongankerja as l INNER JOIN tbl_perusahaan as p ON l.idperusahaan = p.idperusahaan) 
										   INNER JOIN tbl_pekerjaan as pek ON l.idpekerjaan=pek.idpekerjaan)
										   INNER JOIN tbl_kota as k ON p.idkota = k.idkota)
										   INNER JOIN tbl_jenisperusahaan as j ON p.idjenis = j.idjenis)
										   INNER JOIN tbl_kategori as kat ON pek.idkategori =kat.idkategori) 
										   INNER JOIN tbl_jabatan as jab ON pek.idjabatan =jab.idjabatan
						  WHERE l.idpekerjaan = ". $idpekerjaan ." OR p.idkota = ". $idkota." OR l.gaji <= ". $gaji." 
						  ORDER BY l.tglterbit DESC";
			}
			
			return $this->db->query($query);
		}
		
		public function insert($idperusahaan, $idpekerjaan, $gaji, $keterangan)
		{
			$sql = "INSERT INTO tbl_lowongankerja VALUES ('',". $idperusahaan .",". $idpekerjaan .",NOW(),". $gaji .",'". $keterangan ."')";
					
			$this->db->query($sql);
		}

		public function update($idlowongan, $idpekerjaan, $gaji, $keterangan)
		{
			$sql = "UPDATE tbl_lowongankerja SET idpekerjaan=". $idpekerjaan .", gaji=". $gaji .", 
					keterangan='". $keterangan ."' WHERE idlowongan=".$idlowongan;
					
			$this->db->query($sql);
		}

		public function delete($idlowongankerja)
		{
			$sql = "DELETE FROM tbl_lowongankerja WHERE idlowongan=".$idlowongankerja;
					
			$this->db->query($sql);
		}

		public function delete_all()
		{
			$sql = "TRUNCATE TABLE tbl_lowongankerja";
			
			$this->db->query($sql);
		}
		
	}
?>