-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2014 at 09:28 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_jobstreet`
--
CREATE DATABASE IF NOT EXISTS `db_jobstreet` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_jobstreet`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `idadmin` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `idlogin` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` enum('admin','user') NOT NULL,
  `timelogin` datetime NOT NULL,
  `timelogout` datetime NOT NULL,
  PRIMARY KEY (`idadmin`),
  UNIQUE KEY `idlogin` (`idlogin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`idadmin`, `nama`, `idlogin`, `password`, `status`, `timelogin`, `timelogout`) VALUES
(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '2014-12-07 10:28:07', '2014-12-07 10:29:40'),
(2, 'Octavian Panggestu', 'ocpang', '9acb44549b41563697bb490144ec6258', 'user', '2014-12-01 13:20:29', '2014-12-01 13:31:10'),
(3, 'tes', 'tes', '28b662d883b6d76fd96e4ddc5e9ba780', 'user', '2014-12-07 10:30:47', '2014-12-07 10:31:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jabatan`
--

CREATE TABLE IF NOT EXISTS `tbl_jabatan` (
  `idjabatan` int(11) NOT NULL AUTO_INCREMENT,
  `namajabatan` varchar(50) NOT NULL,
  PRIMARY KEY (`idjabatan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_jabatan`
--

INSERT INTO `tbl_jabatan` (`idjabatan`, `namajabatan`) VALUES
(1, 'CEO/GM/Direktur/Manajer Senior'),
(3, 'Manajer/Asisten Manajer');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenisperusahaan`
--

CREATE TABLE IF NOT EXISTS `tbl_jenisperusahaan` (
  `idjenis` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(50) NOT NULL,
  PRIMARY KEY (`idjenis`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_jenisperusahaan`
--

INSERT INTO `tbl_jenisperusahaan` (`idjenis`, `jenis`) VALUES
(2, 'Developer');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE IF NOT EXISTS `tbl_kategori` (
  `idkategori` int(11) NOT NULL AUTO_INCREMENT,
  `namakategori` varchar(50) NOT NULL,
  PRIMARY KEY (`idkategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`idkategori`, `namakategori`) VALUES
(1, 'Akuntansi/Keuangan'),
(2, 'Administrasi/Personalia'),
(3, 'Seni/Media/Komunikasi'),
(5, 'Komputer/IT');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kota`
--

CREATE TABLE IF NOT EXISTS `tbl_kota` (
  `idkota` int(11) NOT NULL AUTO_INCREMENT,
  `idprovinsi` int(6) NOT NULL,
  `namakota` varchar(50) NOT NULL,
  PRIMARY KEY (`idkota`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_kota`
--

INSERT INTO `tbl_kota` (`idkota`, `idprovinsi`, `namakota`) VALUES
(1, 1, 'Purwakarta'),
(2, 1, 'Bogor'),
(4, 4, 'Solo'),
(5, 4, 'Semarang');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lowongankerja`
--

CREATE TABLE IF NOT EXISTS `tbl_lowongankerja` (
  `idlowongan` int(7) NOT NULL AUTO_INCREMENT,
  `idperusahaan` int(7) NOT NULL,
  `idpekerjaan` int(7) NOT NULL,
  `tglterbit` datetime NOT NULL,
  `gaji` int(10) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  PRIMARY KEY (`idlowongan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_lowongankerja`
--

INSERT INTO `tbl_lowongankerja` (`idlowongan`, `idperusahaan`, `idpekerjaan`, `tglterbit`, `gaji`, `keterangan`) VALUES
(1, 1, 2, '2014-11-27 17:57:13', 1000, 'ganteng'),
(2, 1, 2, '2014-12-01 12:29:07', 100000, 'Alhamdulillaah, selesai'),
(3, 1, 1, '2014-12-01 13:15:30', 2000000, 'Dibutuhkan segera.'),
(4, 4, 3, '2014-12-07 00:12:35', 1000000, 'Untuk speedy');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE IF NOT EXISTS `tbl_member` (
  `idmember` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `idkota` int(6) NOT NULL,
  `idlogin` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `timelogin` datetime NOT NULL,
  `timelogout` datetime NOT NULL,
  PRIMARY KEY (`idmember`),
  UNIQUE KEY `idlogin` (`idlogin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`idmember`, `nama`, `idkota`, `idlogin`, `password`, `timelogin`, `timelogout`) VALUES
(1, 'Octavian Panggestu', 2, 'ocpang', '6338cf6e705f028139d42a8093c4a813', '2014-12-07 10:26:01', '2014-12-07 10:26:34'),
(7, 'Octavian', 1, 'octavian', 'd81a7342eb17a5ce39b69b8726686311', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Member', 1, 'member', 'aa08769cdcb26674c6706093503ff0a3', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Tes Aja', 4, 'tes', '28b662d883b6d76fd96e4ddc5e9ba780', '2014-12-07 00:16:27', '2014-12-07 01:48:20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pekerjaan`
--

CREATE TABLE IF NOT EXISTS `tbl_pekerjaan` (
  `idpekerjaan` int(11) NOT NULL AUTO_INCREMENT,
  `idkategori` int(2) NOT NULL,
  `idjabatan` int(11) NOT NULL,
  `namapekerjaan` varchar(50) NOT NULL,
  PRIMARY KEY (`idpekerjaan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_pekerjaan`
--

INSERT INTO `tbl_pekerjaan` (`idpekerjaan`, `idkategori`, `idjabatan`, `namapekerjaan`) VALUES
(1, 1, 1, 'Manajer HRD'),
(2, 1, 3, 'Manajer HRD'),
(3, 5, 3, 'Sistem Analisis');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengajuan`
--

CREATE TABLE IF NOT EXISTS `tbl_pengajuan` (
  `idpengajuan` int(11) NOT NULL AUTO_INCREMENT,
  `idmember` int(11) NOT NULL,
  `idlowongan` int(11) NOT NULL,
  `portofolio` text NOT NULL,
  `tanggal` datetime NOT NULL,
  PRIMARY KEY (`idpengajuan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tbl_pengajuan`
--

INSERT INTO `tbl_pengajuan` (`idpengajuan`, `idmember`, `idlowongan`, `portofolio`, `tanggal`) VALUES
(14, 13, 4, '<p style="text-align: center;">Ada lowongan ga ?</p>\r\n', '2014-12-07 00:55:35'),
(17, 13, 3, '<div>\r\n<p style="margin-left:7.1pt"><strong>DAFTAR RIWAYAT HIDUP</strong></p>\r\n\r\n<p style="margin-left:7.1pt"><em>Curriculum Vitae</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>I. </strong><strong>Data Pribadi </strong></p>\r\n\r\n<p style="margin-left:1.0cm">1. Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp; Octavian Panggestu</p>\r\n\r\n<p style="margin-left:1.0cm">2. Tempat, tanggal lahir&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp; Bogor, 7 Oktober 1994</p>\r\n\r\n<p style="margin-left:1.0cm">3. Jenis Kelamin&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp; Laki - laki</p>\r\n\r\n<p style="margin-left:1.0cm">4. Agama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp; Islam</p>\r\n\r\n<p style="margin-left:1.0cm">5. Status Pernikahan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp; Belum Kawin</p>\r\n\r\n<p style="margin-left:1.0cm">6. Warga Negara&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp; Indonesia</p>\r\n\r\n<p style="margin-left:1.0cm">7. Alamat KTP&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp; Kedung Halang Wesel RT 04/03 No.6</p>\r\n\r\n<p style="margin-left:1.0cm">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Kel. Sukaresmi Kec. Tanah Sareal</p>\r\n\r\n<p style="margin-left:1.0cm">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Kota Bogor</p>\r\n\r\n<p style="margin-left:1.0cm">8. Alamat Sekarang&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp; Kedung Halang Wesel RT 04/03 No.6</p>\r\n\r\n<p style="margin-left:1.0cm">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Kel. Sukaresmi Kec. Tanah Sareal</p>\r\n\r\n<p style="margin-left:1.0cm">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Kota Bogor</p>\r\n\r\n<p>9. Nomor Telepon / HP&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp; 083806441871</p>\r\n\r\n<p style="margin-left:1.0cm">10. E-mail&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp; octavian91011@gmail.com</p>\r\n\r\n<p style="margin-left:1.0cm">11. Kode Pos&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp; 16165</p>\r\n\r\n<p><strong>II.&nbsp; </strong><strong>Pendidikan Formal</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<table border="0" cellpadding="0" cellspacing="0" style="width:614px">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan="3" style="height:41px; width:142px">\r\n			<p><strong>Periode</strong></p>\r\n\r\n			<p><strong>(Tahun)</strong></p>\r\n			</td>\r\n			<td style="height:41px; width:189px">\r\n			<p><strong>Sekolah / Institusi / Universitas</strong></p>\r\n			</td>\r\n			<td style="height:41px; width:189px">\r\n			<p><strong>Jurusan</strong></p>\r\n			</td>\r\n			<td style="height:41px; width:94px">\r\n			<p><strong>Jenjang</strong></p>\r\n\r\n			<p><strong>Pendidikan</strong></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="height:20px; width:47px">\r\n			<p>2000</p>\r\n			</td>\r\n			<td style="height:20px; width:19px">\r\n			<p>-</p>\r\n			</td>\r\n			<td style="height:20px; width:76px">\r\n			<p>2006</p>\r\n			</td>\r\n			<td style="height:20px; width:189px">\r\n			<p>SDN Cangkingan 1</p>\r\n			</td>\r\n			<td style="height:20px; width:189px">\r\n			<p>-</p>\r\n			</td>\r\n			<td style="height:20px; width:94px">\r\n			<p>SD</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="height:20px; width:47px">\r\n			<p>2006</p>\r\n			</td>\r\n			<td style="height:20px; width:19px">\r\n			<p>-</p>\r\n			</td>\r\n			<td style="height:20px; width:76px">\r\n			<p>2009</p>\r\n			</td>\r\n			<td style="height:20px; width:189px">\r\n			<p>SMP PGRI 5 Bogor</p>\r\n			</td>\r\n			<td style="height:20px; width:189px">\r\n			<p>-</p>\r\n			</td>\r\n			<td style="height:20px; width:94px">\r\n			<p>SMP</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="height:22px; width:47px">\r\n			<p>2009</p>\r\n			</td>\r\n			<td style="height:22px; width:19px">\r\n			<p>-</p>\r\n			</td>\r\n			<td style="height:22px; width:76px">\r\n			<p>2012</p>\r\n			</td>\r\n			<td style="height:22px; width:189px">\r\n			<p>SMK Informatika Pesat</p>\r\n			</td>\r\n			<td style="height:22px; width:189px">\r\n			<p>Rekayasa Perangkat Lunak</p>\r\n			</td>\r\n			<td style="height:22px; width:94px">\r\n			<p>SMA</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="height:51px; width:47px">\r\n			<p>2012</p>\r\n			</td>\r\n			<td style="height:51px; width:19px">\r\n			<p>-</p>\r\n			</td>\r\n			<td style="height:51px; width:76px">\r\n			<p>sekarang</p>\r\n			</td>\r\n			<td style="height:51px; width:189px">\r\n			<p>Program Diploma IPB</p>\r\n			</td>\r\n			<td style="height:51px; width:189px">\r\n			<p>Manajemen Informatika</p>\r\n			</td>\r\n			<td style="height:51px; width:94px">\r\n			<p>D3</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><strong>III. </strong><strong>Pendidikan Non Formal / Training &ndash; Seminar</strong></p>\r\n\r\n<table border="0" cellpadding="0" cellspacing="0">\r\n	<tbody>\r\n		<tr>\r\n			<td style="width:132px">\r\n			<p><strong>Tahun</strong></p>\r\n			</td>\r\n			<td style="width:208px">\r\n			<p><strong>Lembaga / Instansi</strong></p>\r\n			</td>\r\n			<td style="width:246px">\r\n			<p><strong>Keterampilan</strong></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width:132px">\r\n			<p>2008</p>\r\n			</td>\r\n			<td style="width:208px">\r\n			<p>BBC</p>\r\n			</td>\r\n			<td style="width:246px">\r\n			<p>Bahasa Inggris</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>IV.</strong>&nbsp; <strong>Kemampuan</strong></p>\r\n\r\n<ul>\r\n	<li>Menguasai bahasa HTML, XML, PHP, Basica, Pascal, C, C++, Java, Javascript.</li>\r\n	<li>Menguasai MySQL, CSS, CodeIgniter, JQuery, JSON, .NET, Android, Oracle.</li>\r\n</ul>\r\n\r\n<p><strong>V. </strong><strong>&nbsp;Riwayat Pengalaman Kerja</strong></p>\r\n\r\n<table border="1" cellpadding="0" cellspacing="0">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan="3" style="width:208px">\r\n			<p><strong>Periode</strong></p>\r\n			</td>\r\n			<td style="width:198px">\r\n			<p><strong>Instansi / Perusahaan</strong></p>\r\n			</td>\r\n			<td style="width:142px">\r\n			<p><strong>Posisi</strong></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width:94px">\r\n			<p>27-01-2011</p>\r\n			</td>\r\n			<td style="width:19px">\r\n			<p>-</p>\r\n			</td>\r\n			<td style="width:94px">\r\n			<p>27-02-2011</p>\r\n			</td>\r\n			<td style="width:198px">\r\n			<p>PUSKOM KEMLU</p>\r\n			</td>\r\n			<td style="width:142px">\r\n			<p>Magang / Prakerin</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width:94px">\r\n			<p>5-12-2012</p>\r\n			</td>\r\n			<td style="width:19px">\r\n			<p>-</p>\r\n			</td>\r\n			<td style="width:94px">\r\n			<p>5-04-2013</p>\r\n			</td>\r\n			<td style="width:198px">\r\n			<p>PT. Cyberindo Persada</p>\r\n			</td>\r\n			<td style="width:142px">\r\n			<p>Programmer</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>VI.&nbsp; Pengalaman Organisasi</strong></p>\r\n\r\n<table border="1" cellpadding="0" cellspacing="0">\r\n	<tbody>\r\n		<tr>\r\n			<td style="width:54px">\r\n			<p><strong>No.</strong></p>\r\n			</td>\r\n			<td style="width:144px">\r\n			<p><strong>Jabatan</strong></p>\r\n			</td>\r\n			<td style="width:275px">\r\n			<p><strong>Nama Lembaga</strong></p>\r\n			</td>\r\n			<td style="width:148px">\r\n			<p><strong>Masa Jabatan</strong></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width:54px">\r\n			<p>1</p>\r\n			</td>\r\n			<td style="width:144px">\r\n			<p>Ketua MPK</p>\r\n			</td>\r\n			<td style="width:275px">\r\n			<p>Majelis Permusyawaratan Kelas</p>\r\n			</td>\r\n			<td style="width:148px">\r\n			<p>1 Tahun</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width:54px">\r\n			<p>2</p>\r\n			</td>\r\n			<td style="width:144px">\r\n			<p>Seksi Humas</p>\r\n			</td>\r\n			<td style="width:275px">\r\n			<p>ROHIS</p>\r\n			</td>\r\n			<td style="width:148px">\r\n			<p>3 Tahun</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width:54px">\r\n			<p>3</p>\r\n			</td>\r\n			<td style="width:144px">\r\n			<p>Seksi Olahraga</p>\r\n			</td>\r\n			<td style="width:275px">\r\n			<p>OSIS</p>\r\n			</td>\r\n			<td style="width:148px">\r\n			<p>6 Bulan</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width:54px">\r\n			<p>4</p>\r\n			</td>\r\n			<td style="width:144px">\r\n			<p>CO Divisi Web</p>\r\n			</td>\r\n			<td style="width:275px">\r\n			<p>MICRO IPB</p>\r\n			</td>\r\n			<td style="width:148px">\r\n			<p>1 tahun &ndash; sekarang</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Demikian daftar riwayat hidup (CV) ini saya buat dengan sebenar - benarnya.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bogor, 14 Juni 2014</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Octavian Panggestu</p>\r\n\r\n<p style="margin-left:27.0pt">&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '2014-12-07 01:03:30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_perusahaan`
--

CREATE TABLE IF NOT EXISTS `tbl_perusahaan` (
  `idperusahaan` int(11) NOT NULL AUTO_INCREMENT,
  `namaperusahaan` varchar(50) NOT NULL,
  `idloginperusahaan` varchar(50) NOT NULL,
  `passwordperusahaan` varchar(100) NOT NULL,
  `idjenis` int(11) NOT NULL,
  `idkota` int(5) NOT NULL,
  `website` varchar(50) NOT NULL,
  `statusperusahaan` enum('Aktif','Tidak Aktif') NOT NULL,
  `idAdmin` int(6) NOT NULL,
  PRIMARY KEY (`idperusahaan`),
  UNIQUE KEY `idloginperusahaan` (`idloginperusahaan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_perusahaan`
--

INSERT INTO `tbl_perusahaan` (`idperusahaan`, `namaperusahaan`, `idloginperusahaan`, `passwordperusahaan`, `idjenis`, `idkota`, `website`, `statusperusahaan`, `idAdmin`) VALUES
(1, 'Appsindo', 'appsindo', '4cef8a85af5ed1b33ee5e3627cb86c46', 2, 1, 'appsindo.com', 'Aktif', 1),
(2, 'Apps Media', 'aaaa', '83e0871325d12ea06e57aa2c24273e44', 2, 1, 'appsmedia.co.id', 'Tidak Aktif', 1),
(3, 'Tes Aja', 'tes', '28b662d883b6d76fd96e4ddc5e9ba780', 2, 4, 'tes', 'Tidak Aktif', 1),
(4, 'Telkom Indonesia', 'telkom', 'a2ed39c417316adbd5cd1d0211a5d711', 2, 2, 'telkom.co.id', 'Aktif', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pesan`
--

CREATE TABLE IF NOT EXISTS `tbl_pesan` (
  `idpesan` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pesan` text NOT NULL,
  `status` enum('Dibaca','Belum Dibaca') NOT NULL,
  PRIMARY KEY (`idpesan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_provinsi`
--

CREATE TABLE IF NOT EXISTS `tbl_provinsi` (
  `idprovinsi` int(11) NOT NULL AUTO_INCREMENT,
  `namaprovinsi` varchar(50) NOT NULL,
  PRIMARY KEY (`idprovinsi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_provinsi`
--

INSERT INTO `tbl_provinsi` (`idprovinsi`, `namaprovinsi`) VALUES
(1, 'Jawa Barat'),
(4, 'Jawa Tengah');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
