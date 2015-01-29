<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">

    <title>Halaman Administrator</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets/css/carousel.css" rel="stylesheet">

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url(); ?>assets/js/ie10-viewport-bug-workaround.js"></script>

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo base_url(); ?>assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- dataTables	-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.dataTables.min.css" /> 
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.js"></script>
  </head>
<!-- NAVBAR
================================================== -->
  <body>
    <div class="navbar-wrapper">
      <div class="container">

        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#"><img src="<?php echo base_url(); ?>assets/img/jobstreet-logo.png" width="200" style="margin-top:-13px"/></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              	<?php   
				   	if(!empty($this->session->userdata('aid')) && !empty($this->session->userdata('anama')) && !empty($this->session->userdata('ausername')) && !empty($this->session->userdata('apassword')) && !empty($this->session->userdata('astatus')))
					{
				?>
	                <ul class="nav navbar-nav">
						<li <?php if($this->uri->segment(1) == "beranda") echo "class='active'"; ?> >
							<a href="<?php echo base_url(); ?>beranda">Beranda</a>
						</li>
						<li <?php if($this->uri->segment(1) == "user") echo "class='active'"; ?> >
							<a href="<?php echo base_url(); ?>user">User</a>
						</li>
						<li class="dropdown <?php if($this->uri->segment(1) == "amember" || $this->uri->segment(1) == "amemberperusahaan") echo "active"; ?>" >
                          <a href="<?php echo base_url(); ?>#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Member <span class="caret"></span></a>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="<?php echo base_url(); ?>amember">Member</a></li>
                            <li><a href="<?php echo base_url(); ?>amemberperusahaan">Perusahaan
                            	<?php
									$query = $this->amemberperusahaan_m->jumlahperusahaanbaru();	// mysql_query("");
								?>
	                                <span class="badge"><?php echo $query->num_rows(); ?></span>
								</a>
                            </li>
                          </ul>
                        </li>
						<li class="dropdown <?php if($this->uri->segment(1) == "akategori" || $this->uri->segment(1) == "apekerjaan" || $this->uri->segment(1) == "ajabatan") echo "active"; ?>" >
                          <a href="<?php echo base_url(); ?>#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Pekerjaan <span class="caret"></span></a>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="<?php echo base_url(); ?>akategori">Kategori</a></li>
                            <li><a href="<?php echo base_url(); ?>ajabatan">Jabatan</a></li>
                            <li><a href="<?php echo base_url(); ?>apekerjaan">Pekerjaan</a></li>
                          </ul>
                        </li>
						<li class="dropdown <?php if($this->uri->segment(1) == "akota" || $this->uri->segment(1) == "aprovinsi") echo "active"; ?>" >
                          <a href="<?php echo base_url(); ?>#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Lokasi <span class="caret"></span></a>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="<?php echo base_url(); ?>aprovinsi">Provinsi</a></li>
                            <li><a href="<?php echo base_url(); ?>akota">Kota</a></li>
                          </ul>
                        </li>
						<li <?php if($this->uri->segment(1) == "apesan") echo "class='active'"; ?> >
							<a href="<?php echo base_url(); ?>apesan">Pesan 
                            	
                                <?php
								$query = $this->apesan_m->jumlahpesanbaru();	// mysql_query("");
								?>
                                <span class="badge"><?php echo $query->num_rows(); ?></span>
                            </a>
						</li>
						<li class="dropdown <?php if($this->uri->segment(1) == "ajenis") echo "active"; ?>" >
                          <a href="<?php echo base_url(); ?>#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Pengaturan <span class="caret"></span></a>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="<?php echo base_url(); ?>ajenis">Jenis Perusahaan</a></li>
                          </ul>
                        </li>
                        
	                 </ul> 
                   <?php
					 }
				   ?>
       
              
              <div class="navbar-right">
              	<?php   
				   	if(!empty($this->session->userdata('aid')) && !empty($this->session->userdata('anama')) && !empty($this->session->userdata('ausername')) && !empty($this->session->userdata('apassword')) && !empty($this->session->userdata('astatus')) )
					{
				?>
		              <ul class="nav" style="margin-top:5px;">                    
						<li class="dropdown">
                          <a href="<?php echo base_url(); ?>#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> &nbsp; <?php echo $this->session->userdata('anama'); ?> <span class="caret"></span></a>
                          <ul class="dropdown-menu" role="menu">      
                            <li><a href="<?php echo base_url(); ?>administrator/logout">Logout</a></li>                            
                          </ul>
                        </li>
                      </ul>
					<?php	
  					 }
					?>
                    
              </div>

            </div>
          </div>
		</nav>
      </div>
    </div>

    <p>&nbsp;</p>
