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
	  		<h1><small>Perusahaan</small></h1>
	    </div>
        <div class="row">
        	<div class="col-md-5">
       	       	<img src="<?php echo base_url(); ?>assets/images/perusahaan.jpg" width="450" /> <br />
            </div>
        	<div class="col-md-7">
				<?php
                if(!empty($status)){
                    if($status == "error_save"){
                ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Password <b>harus sama</b> dengan Konfirmasi Password anda.
                    </div>
                <?php
                    }
					elseif($status == "error"){
                ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Login anda gagal.
                    </div>
                <?php
					}
					elseif($status == "berhasil"){
                ?>
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Data terkirim, silahkan menunggu untuk divalidasi oleh admin. Terima Kasih
                    </div>
                <?php
					}
					elseif($status == "idlogin"){
				?>
					<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						ID Login sudah digunakan, mohon ganti dengan ID Login yang lain.
					</div>
				<?php
					}
                }
                ?>
            	<div class="panel panel-info">
                  <div class="panel-heading">
                  	<div class="row">
                    	<div class="col-md-8">
		                    Form Pendaftar Akun Jobstreet Indonesia
                    	</div>
                    	<div class="col-md-4">
		                    <a href="<?php echo base_url(); ?>#" data-toggle="modal" data-target="#loginperusahaan" class="btn btn-primary">Login</a>
                    	</div>
                  	</div>
                  </div>
                  <div class="panel-body">
		        	<form method="post" id="daftar" action="<?PHP echo base_url(); ?>perusahaan/save">
                    <table class="table table-striped table-condensed">
                        <tr>
                        	<th>Nama</th>
                            <td><input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Perusahaan" required></td>
                        </tr>
                        <tr>
                            <th>Jenis</th>
							<td>
                            <select name="jenis" id="jenis" class="form-control" >
                            <?PHP
                                $query = $this->amemberperusahaan_m->jenis();                            
                                foreach($query->result() as $row) :
                            ?>
                                <option value="<?php echo $row->idjenis; ?>"><?php echo $row->jenis; ?></option>
                            <?php
                            endforeach;
                            ?>
                            </select>
							</td>
                        </tr>
                        <tr>
                        	<th>Kota</th>
                        	<td>
                            <select name="namakota" id="namakota" class="form-control" required>
                            <?PHP
                                $query = $this->akota_m->daftarkota();                            
                                foreach($query->result() as $row) :
                            ?>
                                <option value="<?php echo $row->idkota; ?>"><?php echo $row->namakota; ?></option>
                            <?php
                            endforeach;
                            ?>
                            </select>
                             </td>
                        </tr>
                        <tr>
							<th>ID Login</th>
                            <td><input type="text" class="form-control" name="idlogin" id="idlogin" placeholder="Email atau ID" required></td>
                        </tr>
                        <tr>
							<th>Password</th>
                            <td><input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
</td>
                        </tr>
                        <tr>
                        	<th>Konfirmasi Password</th>
                            <td><input type="password" class="form-control" name="konfpassword" id="konfpassword" placeholder="Konfirmasi Password" required></td>
                        </tr>
                        <tr>
                        	<th>Website</th>
                            <td><input type="text" class="form-control" name="website" id="website" placeholder="Halaman Website" required></td>
                        </tr>
                        <tr>
                        	<th>&nbsp;</th>
                        	<td>
                        		<input type="submit" value="Daftar Sekarang" class="btn btn-primary" id="save">
                                <input type="reset" value="Hapus" class="btn btn-danger">
                            </td>
                        </tr>
                    </table>
                    </form>
                  
                  </div>
                </div>
        
            </div>
		</div>
	</div>
    
    <div class="modal fade" id="loginperusahaan">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal">
                        &times;
                    </button>
                    <h4 class="modal-title">Login Member Perusahaan Jobstreet</h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo base_url(); ?>perusahaan/loginperusahaan" id="frmloginperusahaan" >
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
                            <button class="btn btn-primary btn-sm" type="submit" form="frmloginperusahaan" id="masuk">Masuk</button>
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

<?php
	$this->load->view("footer_v");
?>