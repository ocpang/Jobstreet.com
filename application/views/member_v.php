<?php
	$this->load->view("header_v");
?>
    <div class="jumbotron" style="margin-bottom:0px;margin-top:-20px">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-9 text-muted">
                	<p style="color:#333">
                       	<img src="<?php echo base_url(); ?>assets/img/jobstreet-logo.png" width="250" /> <br />
                       	Pencarian member Pekerjaan Terlengkap Di Indonesia
                    </p>
                </div>
            </div>
        </div>
    </div>

	<div class="container">
		<p>&nbsp;</p>
        <p align="justify">
        Silahkan pilih menu di atas atau di bawah sesuai dengan keinginan anda. 
		</p>
		<div class="row">
          <div class="col-md-3"></div>
          <div class="col-xs-6 col-md-2" align="center">
            <a href="<?php echo base_url(); ?>carilowongan" class="thumbnail">
              <img src="<?php echo base_url(); ?>assets/img/search.png" data-src="holder.js/100%x180" alt="..."> Cari Lowongan
            </a>
          </div>
          <div class="col-xs-6 col-md-2" align="center">
            <a href="<?php echo base_url(); ?>pengajuanberkas" class="thumbnail">
              <img src="<?php echo base_url(); ?>assets/img/message.png" data-src="holder.js/100%x180" alt="..."> Pengajuan Berkas
                <?php
//					$query = $this->apesan_m->jumlahpesanbaru();	// mysql_query("");
				?>
              <span class="badge"><?php //echo $query->num_rows(); ?></span>
           </a>
          </div>
          <div class="col-xs-6 col-md-2" align="center">
            <a href="<?php echo base_url(); ?>tinjauanmember" class="thumbnail">
              <img src="<?php echo base_url(); ?>assets/img/user-icon.png" data-src="holder.js/100%x180" alt="..."> Akun Saya
            </a>
          </div>          
        </div>

  
	</div>

<?php
	$this->load->view("footer_v");
?>