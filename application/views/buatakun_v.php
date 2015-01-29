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
	  		<h1><small>Buat Akun</small></h1>
	    </div>
        <div class="row">
        	<div class="col-md-3"></div>
        	<div class="col-md-6">
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
                  <div class="panel-heading">Form Pendaftar Akun Jobstreet Indonesia</div>
                  <div class="panel-body">
		        	<form method="post" id="login" action="<?PHP echo base_url(); ?>buatakun/save">
                    <table class="table table-striped table-condensed">
                        <tr>
                        	<th>Nama Lengkap</th>
                            <td><input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap" required></td>
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
                            <td><input type="password" class="form-control" name="konfpassword" id="konfpassword" placeholder="Konfirmasi Password" required>
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
<?php
	$this->load->view("footer_v");
?>