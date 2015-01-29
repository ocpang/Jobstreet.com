<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">

    <title>Jobstreet</title>

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

    <!-- ckeditor	-->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
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
              <ul class="nav navbar-nav">
              	<?php   
				   	if($this->session->userdata('status') == 'member')
					{
				?>
						<li <?php if($this->uri->segment(1) == "member") echo "class='active'"; ?> >
							<a href="<?php echo base_url(); ?>member">Beranda</a>
						</li>
						<li <?php if($this->uri->segment(1) == "carilowongan") echo "class='active'"; ?> >
							<a href="<?php echo base_url(); ?>carilowongan">Cari Lowongan</a>
						</li>
						<li class="dropdown <?php if($this->uri->segment(1) == "tinjauanmember" || $this->uri->segment(1) == "pengajuanberkas") echo "active"; ?>" >
                          <a href="<?php echo base_url(); ?>#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Akun Saya <span class="caret"></span></a>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="<?php echo base_url(); ?>tinjauanmember">Tinjauan Data</a></li>
                            <li><a href="<?php echo base_url(); ?>pengajuanberkas">Pengajuan Berkas</a></li>
                          </ul>
                        </li>
				<?php		
					}
					elseif($this->session->userdata('status') == 'perusahaan'){
				?>
						<li <?php if($this->uri->segment(1) == "memberperusahaan") echo "class='active'"; ?> >
							<a href="<?php echo base_url(); ?>memberperusahaan">Beranda</a>
						</li>
						<li <?php if($this->uri->segment(1) == "iklanlowongan") echo "class='active'"; ?> >
							<a href="<?php echo base_url(); ?>iklanlowongan">Iklan Lowongan</a>
						</li>
						<li class="dropdown <?php if($this->uri->segment(1) == "tinjauanperusahaan" || $this->uri->segment(1) == "pengajuanlamaran") echo "active"; ?>" >
                          <a href="<?php echo base_url(); ?>#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Akun Perusahaan <span class="caret"></span></a>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="<?php echo base_url(); ?>tinjauanperusahaan">Tinjauan Data</a></li>
                            <li><a href="<?php echo base_url(); ?>pengajuanlamaran">Pengajuan Lamaran</a></li>
                          </ul>
                        </li>
				<?php	
					}
					else{
				 ?>
                	<li <?php if($this->uri->segment(1) == "" || $this->uri->segment(1) == "home") echo "class='active'"; ?> >
                    	<a href="<?php echo base_url(); ?>">Beranda</a>
                    </li>
                	<li <?php if($this->uri->segment(1) == "tentangkami") echo "class='active'"; ?> >
                    	<a href="<?php echo base_url(); ?>tentangkami">Tentang Kami</a>
                    </li>
                	<li <?php if($this->uri->segment(1) == "kontak") echo "class='active'"; ?> >
                    	<a href="<?php echo base_url(); ?>kontak">Kontak</a>
                    </li>
                <?php 
					}
				?>
              </ul>
        
              <div class="navbar-right">
              	<?php   
				   	if(empty($this->session->userdata('idmember')) && empty($this->session->userdata('idperusahaan')) && empty($this->session->userdata('namaperusahaan')) && empty($this->session->userdata('nama')) && empty($this->session->userdata('idloginperusahaan')) && empty($this->session->userdata('idlogin')) && empty($this->session->userdata('passwordperusahaan')) && empty($this->session->userdata('password')) && empty($this->session->userdata('status')))
					{
				?>
                            <a href="<?php echo base_url(); ?>#" data-toggle="modal" data-target="#login">Masuk</a> &nbsp; &nbsp;
                            <a href="<?php echo base_url(); ?>buatakun">Buat Akun</a> &nbsp; &nbsp;  &nbsp; &nbsp; 
                            <a href="<?php echo base_url(); ?>perusahaan" class="btn btn-success navbar-btn"><span class="glyphicon glyphicon-briefcase"></span>&nbsp; Perusahaan</a>
                	<?php
					}
					else{
					?>
		              <ul class="nav" style="margin-top:5px;">                    
						<li class="dropdown">
                          <a href="<?php echo base_url(); ?>#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> &nbsp; <?php echo $this->session->userdata('namaperusahaan').$this->session->userdata('nama'); ?> <span class="caret"></span></a>
                          <ul class="dropdown-menu" role="menu">
                            <?php 
								if($this->session->userdata('status') == 'member'){
						 	?>                       
                            		<li><a href="<?php echo base_url(); ?>header/logout">Logout</a></li>                            
                            <?php
								}
								else{
							?>
                            		<li><a href="<?php echo base_url(); ?>perusahaan/logout">Logout</a></li>                            
                            <?php
								}
                            ?>
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

      <div class="modal fade" id="login">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal">
                        &times;
                    </button>
                    <h4 class="modal-title">Login Jobstreet</h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo base_url(); ?>header/login" id="frmlogin" >
                        <div class="form-group">
                            <label>ID Login</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="Email or ID" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="sandi" id="sandi" placeholder="Password" required>
                        </div>
                    </form>
                        <div class="form-group">
                            <button class="btn btn-primary btn-sm" type="submit" form="frmlogin" id="masuk">Masuk</button>
                            <button class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
                        </div>
                </div>
                <div class="modal-footer">
                	<div class="row">
                        <div class="col-md-4">&nbsp;</div>
                        <div class="col-md-8"></div>
                    </div>
                </div>
            </div>
        </div>
      </div>

	  <p>&nbsp;</p>
