<?php
	$this->load->view("header_v");
?>
    <div class="jumbotron" style="margin-bottom:0px;margin-top:-20px">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-9 text-muted">
                	<p style="color:#333">
                       	<img src="<?php echo base_url(); ?>assets/img/jobstreet-logo.png" width="250" /> <br />
                       	Pencarian Lowongan Pekerjaan Terlengkap Di Indonesia
                    </p>
                </div>
            </div>
        </div>
    </div>

	<div class="container">
        <div class="page-header">
	  		<h1><small>Kontak</small></h1>
	    </div>
        
        <div class="row">
        	<div class="col-md-6">
            	<div class="panel panel-info">
                  <div class="panel-heading">Kunjungi Kantor Jobstreet</div>
                  <div class="panel-body">
                    <p><span class="glyphicon glyphicon-map-marker"></span> &nbsp; <b>Alamat</b> Jln. Kumbang No. 13 Kota Bogor</p>
                    <p><span class="glyphicon glyphicon-earphone"></span> &nbsp; <b>Telepon</b> (0251) 12112014</p>
                    <p><span class="glyphicon glyphicon-envelope"></span> &nbsp; <b>Email</b> admin@jobstreet.com</p>
                  </div>
                </div>
            </div>
        	<div class="col-md-6">
				<?php
                    if(!empty($status)){
                        if($status == "berhasil"){
                ?>
                            <div class="alert alert-success alert-dismissable" style="margin-bottom:-3px;margin-top:27px">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    Pesan anda terkirim. Terima kasih
                            </div>
                <?php
                        }
                    }
                ?>
            	<div class="panel panel-info">
                  <div class="panel-heading">Kirim Pesan</div>
                  <div class="panel-body">
                    <form action="<?php echo base_url(); ?>kontak/pesan" method="post">
                    	<p><input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required /></p>
                      	<p><input type="email" name="email" class="form-control" placeholder="Email" required /></p>
                    	<p><input type="text" name="pesan" class="form-control" placeholder="Pesan" required /></p>                        
                        <p><input type="submit" name="kirim" class="btn btn-success" value="Kirim Pesan" required /> <input type="reset" name="kirim" class="btn btn-danger" value="Batal" required /></p>                        
                    </form>
                  </div>
                </div>
            </div>
        </div>    
	</div>
    
<?php
	$this->load->view("footer_v");
?>