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
		<p>&nbsp;</p>
        <div class="panel panel-info">
          <div class="panel-heading">
            <div class="row">
                <div class="col-md-12">
		        	<form method="get" id="frmcari" action="<?PHP echo base_url(); ?>carilowongan">
                        <table class="table table-hover table-striped table-condensed">
                        	<tr>
                            	<td style="color:#333">Cari berdasarkan</td>
                            	<td>
                                    <select name="pekerjaan" id="pekerjaan" class="form-control" >
                                    	<option value="">-- Kategori Pekerjaan --</option>
                                    <?PHP
                                        $query = $this->apekerjaan_m->view();                            
                                        foreach($query->result() as $row) :
                                    ?>
                                        <option value="<?php echo $row->idpekerjaan; ?>">
											<?php echo $row->namapekerjaan; ?> - <?php echo $row->namajabatan; ?> &nbsp; | &nbsp; <?php echo $row->namakategori; ?>                                        
                                        </option>
                                    <?php
                                    endforeach;
                                    ?>
                                    </select>
                                </td>
                            	<td>
                                    <select name="namakota" id="namakota" class="form-control" >
                                    	<option value="">-- Nama Kota --</option>
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
                                 <td>
                                    <select name="gaji" id="gaji" class="form-control" >
                                    	<option value="">-- Ukuran Gaji --</option>
                                        <option value="3000000"><= Rp. 3.000.000 </option>
                                        <option value="5000000"><= Rp. 5.000.000 </option>
                                        <option value="10000000"><= Rp. 10.000.000 </option>
                                        <option value="20000000"><= Rp. 20.000.000 </option>
                                        <option value="50000000"><= Rp. 50.000.000 </option>
                                    </select>
                                 </td>
                                 <td>
			         	          	<input type="submit" class="form-control btn-primary" value="Cari">                        
                                 </td>
                             </tr>
                        </table>
                    </form>                    
                </div>
            </div>
          </div>
        </div>

<?php
		if(empty($_GET['pekerjaan']) && empty($_GET['namakota']) && empty($_GET['gaji'])){
			$query = $this->lowongankerja_m->viewall();
		}
		else{
			$query = $this->lowongankerja_m->hasilpencarian($_GET['pekerjaan'], $_GET['namakota'], $_GET['gaji']);
		}
		foreach($query->result() as $row) :
	
?>	
			<div class="row">
                <div class="col-md-1">&nbsp;</div>
            	<div class="col-md-10">	
                	<div class="row">
		            	<div class="col-md-5">	
			                <input type="hidden" id="idlowongan_<?php echo $row->idlowongan; ?>" value="<?php echo $row->idlowongan; ?>" />
            				<h3><?php echo $row->namapekerjaan; ?></h3>
                		</div>
                        <div class="col-md-4">	
                           <h4><?php echo $row->namaperusahaan; ?></h4><?php echo $row->namakota; ?>, Indonesia
                		</div>
                        <div class="col-md-3">		
                            <h3 style="color:#0C0">Rp. <?php echo number_format($row->gaji,'0',',','.'); ?></h3>
            			</div>
                     </div>
                	<div class="row">
		            	<div class="col-md-5">	
		                	<?php echo $row->namajabatan; ?>, <?php echo $row->namakategori; ?>
		        		</div>
                    	<div class="col-md-4" style="color:#09F">	
				        	<?php echo $row->jenis; ?>
						</div>
                        <div class="col-md-3">	
		               	 	<?php echo $row->tglterbit; ?>
                        </div>
                    </div>
                	<div class="row">
		            	<div class="col-md-9" style="color:#F30">
                        	<?php echo $row->keterangan; ?>
                        </div>
                        <div class="col-md-3">
		                    <button class="btn btn-primary btn-sm kirimportofolio" title="Kirim Portofolio" data-toggle="modal" data-target="#modal_pengirimanportofolio" id="kirim_<?PHP echo $row->idlowongan; ?>"> Buat Portofolio </button>
                        </div>
                    </div>
        		</div>
                <div class="col-md-1">&nbsp;</div>
            </div>
            <div class="row">
            	<div class="col-md-12"><hr /></div>
            </div>
<?php
		endforeach;
?>
	</div>

    <div class="modal fade" id="modal_pengirimanportofolio">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal">
                        &times;
                    </button>
                    <h4 class="modal-title">Pembuatan Portofolio</h4>
                </div>
                                               
                <div class="modal-body">
                    <div class="form-group">
                        <form method="post" name="form_kirimportofolio" id="form_kirimportofolio">
      		               <input type="hidden" name="idlowongan" id="idlowongan" />
						   <textarea class="ckeditor" name="portofolio" id="portofolio" placeholder="Masukkan CV anda"></textarea>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary btn-sm" type="submit" form="form_kirimportofolio">
                        Kirim
                    </button>
                    <button class="btn btn-default btn-sm" data-dismiss="modal">
                        Batal
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>

<?php
	$this->load->view("footer_v");
?>

<script type="text/javascript">
	$(document).ready(function(){
		$(".kirimportofolio").click(function(){
			
			var id = this.id.substr(6);

			$('#idlowongan').val(id);
			$('#portofolio').val('');

			$('#form_kirimportofolio').attr('action','<?PHP echo base_url(); ?>pengajuanberkas/save');
					
		});


	});
	
</script>