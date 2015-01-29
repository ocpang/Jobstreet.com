<?php
	$this->load->view("header_v");
?>

<div class="container">
        <div class="page-header">
	  		<h1><small>Pengajuan Berkas</small></h1>
	    </div>
        	<div class="panel panel-default">    	
                <div class="panel-heading">
                    <h4>Daftar lamaran yang telah masuk</h4>
                </div>
	        	<table class="table table-hover table-striped table-condensed" id="table">
                    <thead>
                        <tr>
                            <th>Nama Lengkap</th>
                            <th>Kota Asal</th>
                            <th>Kategori</th>
                            <th>Jabatan</th>
                            <th>Waktu Terbit Lowongan</th> 
                            <th>Waktu Pengajuan</th> 
                            <th>Portofolio</th> 
                            <th>Modifikasi</th>
                        </tr>
                    </thead>
                    <tbody>                
                    <?PHP
                        $query = $this->pengajuanberkas_m->viewlamaranperusahaan($this->session->userdata('idperusahaan'));
                        
                        foreach($query->result() as $row) :
						$teks = $row->portofolio; 
                    ?>
                    
                        <tr>
                            <td><?PHP echo $row->nama; ?></td>
                            <td><?PHP echo $row->namakota; ?></td>
                            <td><?PHP echo $row->namakategori; ?></td>
                            <td><?PHP echo $row->namajabatan; ?></td>
                            <td><?PHP echo $row->tglterbit; ?></td>
                            <td><?PHP echo $row->tanggal; ?></td>
                            <td><a href="#" class="bacaportofolio" title="Baca Portofolio" data-toggle="modal" data-target="#modal_bacaportofolio" id='baca_<?PHP echo $row->portofolio; ?>'> Baca Portofolio </a>
                            </td>
							<td>
                                <button class="btn btn-danger btn-sm delete" title="Hapus" data-toggle="modal" data-target="#modal_confirm" id="delete_<?PHP echo $row->idpengajuan; ?>" >
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
</div>

<div class="modal fade" id="modal_bacaportofolio">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title">Portofolio Anda</h4>
            </div>
                                           
            <div class="modal-body">
                <div class="form-group">
                   <textarea class="ckeditor" disabled="disabled" name="portofolio" id="portofolio" value="Hay"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default btn-sm" data-dismiss="modal">
                    Keluar
                </button>
            </div>
            </form>
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
            	<input type="hidden" name="idpengajuan_tmp" id="idpengajuan_tmp"  />
                <p class="text-left" id="confirm_str">&nbsp;  </p>
            </div>
            <div class="modal-footer">
                <a href="javascript:void(null);" class="btn btn-primary" id="delete">Hapus</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<?PHP
	$this->load->view('footer_v');
?>

<script type="text/javascript">
	$(document).ready(function(){
		$(".bacaportofolio").click(function(){
			
			var baca = this.id.substr(5);

			$('#portofolio').val(baca);
					
		});

		$(".delete").click(function() {
			
			$("#confirm_str").html("Apakah Anda yakin akan menghapus data ?");
			
			var id = this.id.substr(7);
			
			$("#idpengajuan_tmp").val(id);
		});

		$("#delete").click(function() {
			$.post("<?PHP echo base_url(); ?>pengajuanlamaran/delete", { 
				idpengajuan: $("#idpengajuan_tmp").val() }, 
				function() {
					window.location = "<?PHP echo base_url(); ?>pengajuanlamaran";
				}
			);
//			 	window.location = "<PHP echo base_url(); ?>program_keahlian/" + $("#id_program_keahlian").val();
		});
		
		$('.table').dataTable();
		
	});
	
</script>