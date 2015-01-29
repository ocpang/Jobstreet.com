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
            Data gagal tersimpan.
        </div>
    <?php
		}
	}
	?>
	<div class="panel panel-default">    	
        <div class="panel-heading">
            <div class="pull-left">
                <h4>Pekerjaan</h4>
            </div>

        <?PHP
        	if($this->session->userdata('astatus') == 'admin')
			{
		?>            
            <div class="pull-right">
                <button class="btn btn-primary btn-sm add" title="Tambah" data-toggle="modal" data-target="#modal_pekerjaan">
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
                        <th>No</th>                    
                    	<th>Kategori</th>
                    	<th>Jabatan</th>
                        <th>Pekerjaan</th>
                    <?PHP
                        if($this->session->userdata('astatus') == 'admin')
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
                	$query = $this->apekerjaan_m->view();
					$no = 1;
					foreach($query->result() as $row) :
				?>
                
                    <tr>
                        <td><?PHP echo $no++; ?></td>
                        <td><?PHP echo $row->namakategori; ?>
                            <input type="hidden" id="idpekerjaan_<?php echo $row->idpekerjaan; ?>" value="<?php echo $row->idpekerjaan; ?>" />
                            <input type="hidden" id="kategori_<?php echo $row->idpekerjaan; ?>" value="<?php echo $row->idkategori; ?>" />
                        </td>
                        <td><?PHP echo $row->namajabatan; ?>
                            <input type="hidden" id="jabatan_<?php echo $row->idpekerjaan; ?>" value="<?php echo $row->idjabatan; ?>" />
                        </td>
                        <td><?PHP echo $row->namapekerjaan; ?>
                            <input type="hidden" id="pekerjaan_<?php echo $row->idpekerjaan; ?>" value="<?php echo $row->namapekerjaan; ?>" />
                        </td>
                        	                       
                        <?PHP
                            if($this->session->userdata('astatus') == 'admin')
                            {
                        ?>
                        
                        <td>
                            <button class="btn btn-warning btn-sm edit" title="Ubah" data-toggle="modal" data-target="#modal_pekerjaan" id="edit_<?PHP echo $row->idpekerjaan; ?>">
                                <i class="glyphicon glyphicon-edit"></i> Ubah
                            </button>
                            <button class="btn btn-danger btn-sm delete" title="Hapus" data-toggle="modal" data-target="#modal_confirm" id="delete_<?PHP echo $row->idpekerjaan; ?>" >
                                <i class="glyphicon glyphicon-trash"></i> Hapus
                            </button>
                        </td>
                        
                        <?PHP
                            }
                        ?>
                    </tr>
                <?PHP
                	endforeach;
				?>
				</tbody>                
            </table>
    </div>
</div>
<div class="modal fade" id="modal_pekerjaan">
	<div class="modal-dialog">
    	<div class="modal-content">
        	<div class="modal-header">
            	<button class="close" data-dismiss="modal">
                	&times;
                </button>
            	<h4 class="modal-title">Form Pekerjaan</h4>
            </div>
            <div class="modal-body">
            	<form method="post" id="form_pekerjaan">

                	<div class="form-group">
                    	<label>Kategori</label>
						<input type="hidden" name="idpekerjaan_tmp" id="idpekerjaan_tmp" />
                    	<select name="kategori" id="kategori" class="form-control" required >
						<?PHP
                            $query = $this->akategori_m->view();                            
                            foreach($query->result() as $row) :
                        ?>
                        	<option value="<?php echo $row->idkategori; ?>"><?php echo $row->namakategori; ?></option>
                        <?php
						endforeach;
						?>
                        </select>
                    </div>
                	<div class="form-group">
                    	<label>Jabatan</label>
                    	<select name="jabatan" id="jabatan" class="form-control" required >
						<?PHP
                            $query = $this->ajabatan_m->view();                            
                            foreach($query->result() as $row) :
                        ?>
                        	<option value="<?php echo $row->idjabatan; ?>"><?php echo $row->namajabatan; ?></option>
                        <?php
						endforeach;
						?>
                        </select>
                    </div>
                	<div class="form-group">
                    	<label>Pekerjaan</label>
                    	<input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Nama Pekerjaan" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            	<button class="btn btn-primary btn-sm" type="submit" form="form_pekerjaan" id="save">
                	Simpan
                </button>
            	<button class="btn btn-primary btn-sm" type="submit" form="form_pekerjaan" id="update">
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
			
			$('#kategori').val('');
			$('#jabatan').val('');
			$('#pekerjaan').val('');
			
			$('#form_pekerjaan').attr('action','<?PHP echo base_url(); ?>apekerjaan/save');
			
		});	
		
		$(".edit").click(function(){
			$('#save').hide();
			$('#update').show();
			
			var id = this.id.substr(5);
			
			$('#idpekerjaan_tmp').val(id);
			$('#kategori').val($('#kategori_' + id).val());
			$('#jabatan').val($('#jabatan_' + id).val());
			$('#pekerjaan').val($('#pekerjaan_' + id).val());

			$('#form_pekerjaan').attr('action','<?PHP echo base_url(); ?>apekerjaan/update');
					
		});
		
		$(".delete").click(function() {
			$("#delete").show();
			$("#delete_all").hide();
			
			$("#confirm_str").html("Apakah Anda yakin akan menghapus data ?");
			
			var id = this.id.substr(7);
			
			$("#idpekerjaan_tmp").val(id);
		});
		
		$(".delete_all").click(function() {
			$("#delete").hide();
			$("#delete_all").show();
			
			$("#confirm_str").html("Apakah Anda yakin akan menghapus semua data ?");
		});
		
		$("#delete").click(function() {
			$.post("<?PHP echo base_url(); ?>apekerjaan/delete", { 
				idpekerjaan: $("#idpekerjaan_tmp").val() }, 
				function() {
					window.location = "<?PHP echo base_url(); ?>apekerjaan";
				}
			);
//			 	window.location = "<PHP echo base_url(); ?>program_keahlian/" + $("#id_program_keahlian").val();
		});
		
		$("#delete_all").click(function() {
			$.post("<?PHP echo base_url(); ?>apekerjaan/delete_all", {}, 
				function() {
					window.location = "<?PHP echo base_url(); ?>apekerjaan";
				}
			);
		});

		$('.excel').click(function() {
			window.location = '<?PHP echo base_url(); ?>apekerjaan/export/excel';
		});

		$('.pdf').click(function() {
			window.location = '<?PHP echo base_url(); ?>apekerjaan/export/pdf';
		});
		
		$('.table').dataTable();
		
	});
	
</script>