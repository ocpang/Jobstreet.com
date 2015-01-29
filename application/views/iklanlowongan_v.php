<?php
	$this->load->view("header_v");
?>  
	<!-- Fungsi Javascript -->
	<script type="text/javascript" charset="utf-8">
	function angka(e) {
	   if (!/^[0-9]+$/.test(e.value)) {
		  e.value = e.value.substring(0,e.value.length-1);
	   }
	}
	</script>

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
    <p>&nbsp;</p>
	<?php
	if(!empty($status)){
		if($status == "tambah"){
	?>
    	<div class="alert alert-success alert-dismissable">
        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Data berhasil disimpan.
        </div>
    <?php
		}
		elseif($status == "ubah"){
	?>
    	<div class="alert alert-success alert-dismissable">
        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Data berhasil diupdate.
        </div>
    <?php
		}
		elseif($status == "hapus"){
	?>
    	<div class="alert alert-success alert-dismissable">
        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Data berhasil dihapus.
        </div>
    <?php
		}
		elseif($status == "hapussemua"){
	?>
    	<div class="alert alert-success alert-dismissable">
        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Data berhasil dihapus semua.
        </div>
    <?php
		}
	}
	?>
	<div class="panel panel-default">    	
        <div class="panel-heading">
            <div class="pull-left">
                <h4>Iklan Lowongan Kerja</h4>
            </div>

            <div class="pull-right">
                <button class="btn btn-primary btn-sm add" title="Tambah" data-toggle="modal" data-target="#modal_lowongan">
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
     
            <div class="clearfix"></div>
        </div>
       
        	<table class="table table-hover table-striped table-condensed" id="table">
				<thead>
                    <tr>
                        <th>No</th>                    
                    	<th>Pekerjaan</th>
                    	<th>Jabatan</th>
                    	<th>Kategori</th>
                    	<th>Tanggal Terbit</th>                
	                    <th>Gaji</th>                    
	                    <th>Keterangan</th>                    
	                    <th>Modifikasi</th>                    
                    </tr>
				</thead>
                <tbody>                
                <?PHP
                	$query = $this->lowongankerja_m->view($this->session->userdata('idperusahaan'));
					$no = 1;
					foreach($query->result() as $row) :
				?>                
                    <tr>
                        <td><?PHP echo $no++; ?></td>
                        <td><?PHP echo $row->namapekerjaan; ?>
                            <input type="hidden" id="idlowongan_<?php echo $row->idlowongan; ?>" value="<?php echo $row->idlowongan; ?>" />
                            <input type="hidden" id="pekerjaan_<?php echo $row->idlowongan; ?>" value="<?php echo $row->idpekerjaan; ?>" />
                        </td>
                        <td><?PHP echo $row->namajabatan; ?></td>
                        <td><?PHP echo $row->namakategori; ?></td>
                        <td><?PHP echo $row->tglterbit; ?>
                            <input type="hidden" id="tglterbit_<?php echo $row->idlowongan; ?>" value="<?php echo $row->tglterbit; ?>" />
                        </td>
                        <td>Rp <?PHP echo number_format($row->gaji,'0',',','.'); ?>
                            <input type="hidden" id="gaji_<?php echo $row->idlowongan; ?>" value="<?php echo $row->gaji; ?>" />
                        </td>
                        <td><?PHP echo $row->keterangan; ?>
                            <input type="hidden" id="keterangan_<?php echo $row->idlowongan; ?>" value="<?php echo $row->keterangan; ?>" />
                        </td>                        
                        <td>
                            <button class="btn btn-warning btn-sm edit" title="Ubah" data-toggle="modal" data-target="#modal_lowongan" id="edit_<?PHP echo $row->idlowongan; ?>">
                                <i class="glyphicon glyphicon-edit"></i> Ubah
                            </button>
                            <button class="btn btn-danger btn-sm delete" title="Hapus" data-toggle="modal" data-target="#modal_confirm" id="delete_<?PHP echo $row->idlowongan; ?>" >
                                <i class="glyphicon glyphicon-trash"></i> Hapus
                            </button>
                        </td>
                    </tr>
                <?PHP
                	endforeach;
				?>
				</tbody>                
            </table>
    </div>
</div>
<div class="modal fade" id="modal_lowongan">
	<div class="modal-dialog">
    	<div class="modal-content">
        	<div class="modal-header">
            	<button class="close" data-dismiss="modal">
                	&times;
                </button>
            	<h4 class="modal-title">Form Lowongan</h4>
            </div>
            <div class="modal-body">
            	<form method="post" id="form_lowongan">
                	<div class="form-group">
                    	<label>Pekerjaan</label>
						<input type="hidden" name="idlowongan_tmp" id="idlowongan_tmp" />
                            <select name="pekerjaan" id="pekerjaan" class="form-control" required>
                            <?PHP
                                $query = $this->apekerjaan_m->view();                            
                                foreach($query->result() as $row) :
                            ?>
                                <option value="<?php echo $row->idpekerjaan; ?>">
									<?php echo $row->namapekerjaan; ?> - <?php echo $row->namajabatan; ?> - <?php echo $row->namakategori; ?>
                                </option>
                            <?php
                            endforeach;
                            ?>
                            </select>
                    </div>
                	<div class="form-group">
                    	<label>Gaji</label>
         	          	<input type="text" class="form-control" name="gaji" id="gaji" onkeyup="angka(this);" required>
                    </div>
                	<div class="form-group">
                    	<label>Keterangan</label>
         	          	<input type="text" class="form-control" name="keterangan" id="keterangan" required>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
            	<button class="btn btn-primary btn-sm" type="submit" form="form_lowongan" id="save">
                	Simpan
                </button>
            	<button class="btn btn-primary btn-sm" type="submit" form="form_lowongan" id="update">
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

<?php
	$this->load->view("footer_v");
?>

<script type="text/javascript">
	$(document).ready(function(){

		$('.add').click(function(){
			$('#save').show();
			$('#update').hide();
			
			$('#pekerjaan').val('');
			$('#gaji').val('');
			$('#keterangan').val('');
			
			$('#form_lowongan').attr('action','<?PHP echo base_url(); ?>iklanlowongan/save');
			
		});	
		
		$(".edit").click(function(){
			$('#save').hide();
			$('#update').show();
			
			var id = this.id.substr(5);
			
			$('#idlowongan_tmp').val(id);
			$('#pekerjaan').val($('#pekerjaan_' + id).val());
			$('#gaji').val($('#gaji_' + id).val());
			$('#keterangan').val($('#keterangan_' + id).val());

			$('#form_lowongan').attr('action','<?PHP echo base_url(); ?>iklanlowongan/update');
					
		});
		
		$(".delete").click(function() {
			$("#delete").show();
			$("#delete_all").hide();
			
			$("#confirm_str").html("Apakah Anda yakin akan menghapus data ?");
			
			var id = this.id.substr(7);
			
			$("#idlowongan_tmp").val(id);
		});
		
		$(".delete_all").click(function() {
			$("#delete").hide();
			$("#delete_all").show();
			
			$("#confirm_str").html("Apakah Anda yakin akan menghapus semua data ?");
		});
		
		$("#delete").click(function() {
			$.post("<?PHP echo base_url(); ?>iklanlowongan/delete", { 
				idlowongan: $("#idlowongan_tmp").val() }, 
				function() {
					window.location = "<?PHP echo base_url(); ?>iklanlowongan";
				}
			);
//			 	window.location = "<PHP echo base_url(); ?>program_keahlian/" + $("#id_program_keahlian").val();
		});
		
		$("#delete_all").click(function() {
			$.post("<?PHP echo base_url(); ?>iklanlowongan/delete_all", {}, 
				function() {
					window.location = "<?PHP echo base_url(); ?>iklanlowongan";
				}
			);
		});

		$('.excel').click(function() {
			window.location = '<?PHP echo base_url(); ?>iklanlowongan/export/excel';
		});

		$('.pdf').click(function() {
			window.location = '<?PHP echo base_url(); ?>iklanlowongan/export/pdf';
		});
		
		$('.table').dataTable();
		
	});
	
</script>