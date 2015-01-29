<?php
	$this->load->view("header_v");

    if(!empty($status)){
		if($status == "error"){
?>
			<div class="alert alert-danger alert-dismissable" style="margin-bottom:-3px;margin-top:27px">
            	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					Login anda gagal.
            </div>
<?php
		}
	}
?>

    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="<?php echo base_url(); ?>assets/images/bg1.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Mudah Diakses</h1>
              <p>Anda cukup membuka website kami untuk melihat langsung informasi terkini mengenai pekerjaan yang sesuai untuk anda.</p>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="<?php echo base_url(); ?>assets/images/bg2.jpg" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Situs Pencarian Kerja Terpopuler</h1>
              <p>Menurut survei dari Kementerian Perindustrian Republik Indonesia, situs <b>Jobstreet.com</b> sangat membantu para pencari kerja di Indonesia, sehingga dapat mengurangi jumlah pengangguran yang ada.</p>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="<?php echo base_url(); ?>assets/images/bg3.jpg" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Mudah untuk Menjadi Partner Dalam Bekerjasama</h1>
              <p>Bersedia menjadi partner dalam mengadakan kegiatan JobFair dan lain-lain.</p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->
    
    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
          <img class="img-circle" src="<?php echo base_url(); ?>assets/img/free-fast-sign-up-feature.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
          <h2><font color="#0066FF">Daftar Cepat</font></h2>
          <p>Beritahu kami preferensi pekerjaan Anda untuk mendapatkan lowongan kerja yang sesuai.</p>
          <p>&nbsp;</p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="<?php echo base_url(); ?>assets/img/personal-job-page.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
          <h2><font color="#0066FF">Profil Anda</font></h2>
          <p>Login ke halaman pribadi Anda dan lihat lowongan yang sesuai dengan Anda.</p>
          <p>&nbsp;</p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="<?php echo base_url(); ?>assets/img/richer-job-ad.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
          <h2><font color="#0066FF">Iklan Lowongan Lengkap</font></h2>
          <p>Dapatkan daftar gaji yang sesuai, peta lokasi dan Informasi Perusahaan.</p>
          <p>&nbsp;</p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->
	</div>

<?php
	$this->load->view("footer_v");
?>