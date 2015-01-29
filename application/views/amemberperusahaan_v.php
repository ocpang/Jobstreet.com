<?php
	$this->load->view("aheader_v");
?>

<div class="container">
    <p>&nbsp;</p>
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
	<div class="panel panel-default">    	
        <div class="panel-heading">
            <div class="pull-left">
                <h4>Perusahaan</h4>
            </div>
        <?PHP
        	if($this->session->userdata('astatus') == 'admin')
			{
		?>            
            <div class="pull-right">
                <button class="btn btn-primary btn-sm add" title="Tambah" data-toggle="modal" data-target="#modal_perusahaan">
                    <i class="glyphicon glyphicon-plus"></i> Tambah
                </button>
              	<button class="btn btn-danger btn-sm delete_all" title="Hapus Semua" data-toggle="modal" data-target="#modal_confirm">
                    <i class="glyphicon glyphicon-trash"></i> Hapus Semua
                </button>
              	<button class="btn btn-success btn-sm excel" title="Export ke Excel" >
                    <i class="glyphicon glyphicon-export"></i> Export ke Excel
                </button>
              	<button class="btn btn-success btn-sm pdf" title="Export ke Excel" >
                    <i class="glyphicon glyphicon-export"></i> Export ke PDF
                </button>
            </div>
        <?PHP
			}
			elseif($this->session->userdata('astatus') == 'user')
			{
		?>            
            <div class="pull-right">
              	<button class="btn btn-success btn-sm excel" title="Export ke Excel" >
                    <i class="glyphicon glyphicon-export"></i> Export ke Excel
                </button>
              	<button class="btn btn-success btn-sm pdf" title="Export ke Excel" >
                    <i class="glyphicon glyphicon-export"></i> Export ke PDF
                </button>
            </div>
        <?PHP
			}
		?>
            
            <div class="clearfix"></div>
        </div>

        	<table class="table table-hover table-striped table-condensed" id="table">
				<thead>
                    <tr>
                        <th>Nama</th>
                        <th>ID Login</th>
                        <th>Jenis</th>
                        <th>Kota</th>
                        <th>Website</th> 
                        <th>Status</th>                    
                    <?PHP
                        if($this->session->userdata('astatus') == 'admin')
                        {
                    ?>
                        <th>Ver. Admin</th>                                    
    	                <th>Modifikasi</th>
                    
                    <?PHP
                        }
                        elseif($this->session->userdata('astatus') == 'user')
                        {
                    ?>
    	                <th>Modifikasi</th>                    
                    <?PHP
                        }
                    ?>
                    </tr>
				</thead>
                <tbody>                
                <?PHP
                	$query = $this->amemberperusahaan_m->view();
					
					foreach($query->result() as $row) :
				?>
                
                    <tr>
                        <td><?PHP echo $row->namaperusahaan; ?>
                        <input type="hidden" id="idperusahaan_<?php echo $row->idperusahaan; ?>" value="<?php echo $row->idperusahaan; ?>" />
                        <input type="hidden" id="nama_<?php echo $row->idperusahaan; ?>" value="<?php echo $row->namaperusahaan; ?>" />
                        </td>
                        <td><?PHP echo $row->idloginperusahaan; ?>
                        <input type="hidden" id="idlogin_<?php echo $row->idperusahaan; ?>" value="<?php echo $row->idloginperusahaan; ?>" />
                        </td>
                        <td><?PHP echo $row->jenis; ?>
                        <input type="hidden" id="jenis_<?php echo $row->idperusahaan; ?>" value="<?php echo $row->idjenis; ?>" />
                        </td>
                        <td><?PHP echo $row->namakota; ?>
                        <input type="hidden" id="namakota_<?php echo $row->idperusahaan; ?>" value="<?php echo $row->idkota; ?>" />
                        </td>
						<td><?PHP echo $row->website; ?>
                        <input type="hidden" id="website_<?php echo $row->idperusahaan; ?>" value="<?php echo $row->website; ?>" />
                        </td>
						<td><?PHP echo $row->statusperusahaan; ?>
                        <input type="hidden" id="status_<?php echo $row->idperusahaan; ?>" value="<?php echo $row->statusperusahaan; ?>" />
                        </td>
                                                	                        
                        <?PHP
	                        if($this->session->userdata('astatus') == 'admin'){
                        ?>
						<td><?PHP echo $row->nama; ?>
                        <input type="hidden" id="admin_<?php echo $row->idperusahaan; ?>" value="<?php echo $row->nama; ?>" />
                        </td>
                        
                        <td>
                            <button class="btn btn-warning btn-sm editstatus" title="Ubah" data-toggle="modal" data-target="#modal_statusperusahaan" id="edit_<?PHP echo $row->idperusahaan; ?>">
                                <i class="glyphicon glyphicon-edit"></i> Status
                            </button>
                            <button class="btn btn-warning btn-sm edit" title="Ubah" data-toggle="modal" data-target="#modal_perusahaan" id="edit_<?PHP echo $row->idperusahaan; ?>">
                                <i class="glyphicon glyphicon-edit"></i> Ubah
                            </button>
                            <button class="btn btn-danger btn-sm delete" title="Hapus" data-toggle="modal" data-target="#modal_confirm" id="delete_<?PHP echo $row->idperusahaan; ?>" >
                                <i class="glyphicon glyphicon-trash"></i> Hapus
                            </button>
                        </td>
                        
                        <?PHP
                            }
							elseif($this->session->userdata('astatus') == 'user'){
                        ?>
                        <td>
                            <button class="btn btn-warning btn-sm editstatus" title="Ubah" data-toggle="modal" data-target="#modal_statusperusahaan" id="edit_<?PHP echo $row->idperusahaan; ?>">
                                <i class="glyphicon glyphicon-edit"></i> Status
                            </button>
						</td>
                        <?php } ?>
                    </tr>
                    
                <?PHP
                	endforeach;
				?>
				</tbody>                
            </table>
    </div>
</div>
<div class="modal fade" id="modal_perusahaan">
	<div class="modal-dialog">
    	<div class="modal-content">
        	<div class="modal-header">
            	<button class="close" data-dismiss="modal">
                	&times;
                </button>
            	<h4 class="modal-title">Form Perusahaan</h4>
            </div>
            <div class="modal-body">
            	<form method="post" id="form_perusahaan">
                <div class="row">
                <div class="col-md-6">
                	<div class="form-group">
                    	<label>Nama</label>
                    	<input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Perusahaan" required>
                        <input type="hidden" name="idperusahaan_tmp" id="idperusahaan_tmp" />
                    </div>
                    <div class="form-group">
                    	<label>Jenis</label>
                    	<select name="jenis" id="jenis" class="form-control" required >
						<?PHP
                            $query = $this->amemberperusahaan_m->jenis();                            
                            foreach($query->result() as $row) :
                        ?>
                        	<option value="<?php echo $row->idjenis; ?>"><?php echo $row->jenis; ?></option>
                        <?php
						endforeach;
						?>
                        </select>
                    </div>
                    <div class="form-group">
                    	<label>Nama Kota</label>
                        <select name="namakota" id="namakota" class="form-control" required >
						<?PHP
                            $query = $this->akota_m->daftarkota();                            
                            foreach($query->result() as $row) :
                        ?>
                        	<option value="<?php echo $row->idkota; ?>"><?php echo $row->namakota; ?></option>
                        <?php
						endforeach;
						?>
                        </select>
                    </div>
                    <div class="form-group">
                    	<label>ID Login</label>
                        <input type="hidden" name="idlogin_tmp" id="idlogin_tmp" />
                    	<input type="text" class="form-control" name="idlogin" id="idlogin" placeholder="Email atau ID" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    	<label>Password</label>
                    	<input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                    	<label>Konfirmasi Password</label>
                    	<input type="password" class="form-control" name="konfpassword" id="konfpassword" placeholder="Konfirmasi Password" required>
                    </div>
                    <div class="form-group">
                    	<label>Website</label>
                    	<input type="text" class="form-control" name="website" id="website" placeholder="Halaman Website" required>
                    </div>
                    <div class="form-group">
                    	<label>Status</label>
                    	<select name="status" id="status" class="form-control" required >
                        	<option value="Aktif">Aktif</option>
                        	<option value="Tidak Aktif">Tidak Aktif</option>
                        </select>
                    </div>
				</div>
                </div>
                </form>
            </div>
            <div class="modal-footer">
            	<button class="btn btn-primary btn-sm" type="submit" form="form_perusahaan" id="save">
                	Simpan
                </button>
            	<button class="btn btn-primary btn-sm" type="submit" form="form_perusahaan" id="update">
                	Perbaharui
                </button>
                <button class="btn btn-default btn-sm" data-dismiss="modal">
                	Batal
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_statusperusahaan">
	<div class="modal-dialog">
    	<div class="modal-content">
        	<div class="modal-header">
            	<button class="close" data-dismiss="modal">
                	&times;
                </button>
            	<h4 class="modal-title">Form Perusahaan</h4>
            </div>
            <div class="modal-body">
            	<form method="post" id="form_statusperusahaan">
                    <div class="form-group">
                    	<label>Status</label>
                        <input type="hidden" name="idperusahaan" id="idperusahaan" />
                    	<select name="statusperusahaan" id="statusperusahaan" class="form-control" >
                        	<option value="Aktif">Aktif</option>
                        	<option value="Tidak Aktif">Tidak Aktif</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            	<button class="btn btn-primary btn-sm" type="submit" form="form_statusperusahaan" id="update">
                	Perbaharui
                </button>
                <button class="btn btn-default btn-sm" data-dismiss="modal">
                	Batal
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_confirm" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-left">Konfirmasi</h4>
            </div>
            <div class="modal-body">
                <p class="text-left" id="confirm_str">&nbsp;  </p>
            </div>
            <div class="modal-footer">
                <a href="javascript:void(null);" class="btn btn-primary" id="delete_all">Hapus Semua</a>
                <a href="javascript:void(null);" class="btn btn-primary" id="delete">Hapus</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<?PHP
	$this->load->view('afooter_v');
?>

<script type="text/javascript">
	$(document).ready(function(){
		$('.add').click(function(){
			$('#save').show();
			$('#update').hide();
			
			$('#namaperusahaan').val('');
			$('#idlogin').val('');
			$('#password').val('');
			$('#konfpassword').val('');
			$('#jenis').val('');
			$('#namakota').val('');
			$('#website').val('');
			$('#status').val('');
			$('#idlogin').attr('disabled',false);			
			
			$('#form_perusahaan').attr('action','<?PHP echo base_url(); ?>amemberperusahaan/save');
			
		});	
		
		$(".edit").click(function(){
			$('#save').hide();
			$('#update').show();
			
			var id = this.id.substr(5);

			$('#idperusahaan_tmp').val(id);
			$('#nama').val($('#nama_' + id).val());
			$('#idlogin').val($('#idlogin_' + id).val());
			$('#idlogin_tmp').val($('#idlogin_' + id).val());
			$('#jenis').val($('#jenis_' + id).val());
			$('#namakota').val($('#namakota_' + id).val());
			$('#website').val($('#website_' + id).val());
			$('#status').val($('#status_' + id).val());
			$('#idlogin').attr('disabled',true);			

			$('#form_perusahaan').attr('action','<?PHP echo base_url(); ?>amemberperusahaan/update');
					
		});

		$(".editstatus").click(function(){
			
			var id = this.id.substr(5);

			$('#idperusahaan').val(id);
			$('#statusperusahaan').val($('#status_' + id).val());

			$('#form_statusperusahaan').attr('action','<?PHP echo base_url(); ?>amemberperusahaan/updatestatus');
					
		});
		
		$(".delete").click(function() {
			$("#delete").show();
			$("#delete_all").hide();
			
			$("#confirm_str").html("Apakah Anda yakin akan menghapus data ?");
			
			var id = this.id.substr(7);
			
			$("#idperusahaan_tmp").val(id);
		});
		
		$(".delete_all").click(function() {
			$("#delete").hide();
			$("#delete_all").show();
			
			$("#confirm_str").html("Apakah Anda yakin akan menghapus semua data ?");
		});
		
		$("#delete").click(function() {
			$.post("<?PHP echo base_url(); ?>amemberperusahaan/delete", { 
				idperusahaan: $("#idperusahaan_tmp").val() }, 
				function() {
					window.location = "<?PHP echo base_url(); ?>amemberperusahaan";
				}
			);
//			 	window.location = "<PHP echo base_url(); ?>program_keahlian/" + $("#id_program_keahlian").val();
		});
		
		$("#delete_all").click(function() {
			$.post("<?PHP echo base_url(); ?>amemberperusahaan/delete_all", {}, 
				function() {
					window.location = "<?PHP echo base_url(); ?>amemberperusahaan";
				}
			);
		});

		$('.excel').click(function() {
			window.location = '<?PHP echo base_url(); ?>amemberperusahaan/export/excel';
		});

		$('.pdf').click(function() {
			window.location = '<?PHP echo base_url(); ?>amemberperusahaan/export/pdf';
		});
		
		$('.table').dataTable();
		
	});
	
</script>