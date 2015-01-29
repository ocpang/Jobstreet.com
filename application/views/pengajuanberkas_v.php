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
        <div class="panel panel-default">    	
            <div class="panel-heading">
                <h4>Pengajuan Berkas</h4>
            </div>
        	<table class="table table-hover table-striped table-condensed" id="table">
                    <thead>
                        <tr>
                            <th>Nama Pekerjaan</th>
                            <th>Jabatan</th>
                            <th>Kategori</th>
                            <th>Nama Perusahaan</th>
                            <th>Nama Kota</th>
                            <th>Waktu Pengajuan</th> 
                            <th>Modifikasi</th> 
                        </tr>
                    </thead>
                    <tbody>                
                    <?PHP
                        $query = $this->pengajuanberkas_m->view($this->session->userdata('idmember'));
                        foreach($query->result() as $row) :
                    ?>
                    
                        <tr>
                            <td><?PHP echo $row->namapekerjaan; ?></td>
                            <td><?PHP echo $row->namajabatan; ?></td>
                            <td><?PHP echo $row->namakategori; ?></td>
                            <td><?PHP echo $row->namaperusahaan; ?></td>
                            <td><?PHP echo $row->namakota; ?></td>
                            <td><?PHP echo $row->tanggal; ?></td>
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

		$(".delete").click(function() {
			
			$("#confirm_str").html("Apakah Anda yakin akan menghapus data ?");
			
			var id = this.id.substr(7);
			
			$("#idpengajuan_tmp").val(id);
		});

		$("#delete").click(function() {
			$.post("<?PHP echo base_url(); ?>pengajuanberkas/delete", { 
				idpengajuan: $("#idpengajuan_tmp").val() }, 
				function() {
					window.location = "<?PHP echo base_url(); ?>pengajuanberkas";
				}
			);
//			 	window.location = "<PHP echo base_url(); ?>program_keahlian/" + $("#id_program_keahlian").val();
		});

		$('.table').dataTable();
		
	});
	
</script>