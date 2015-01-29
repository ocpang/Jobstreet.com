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
	  <div class="row">
        <div class="col-md-2">
        	&nbsp;
        </div>
        <div class="col-md-8">
			<?php
            if(!empty($status)){
                if($status == "ubah"){
            ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Data berhasil diupdate.
                </div>
            <?php
                }
                elseif($status == "error_save"){
            ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                         Password <b>harus sama</b> dengan Konfirmasi Password anda.
                </div>
            <?php
                }
        
            }
            ?>
            <div class="panel panel-default">    	
                <div class="panel-heading">
                    <div class="pull-left">
                        <h4>Tinjauan Data Diri Member</h4>
                    </div>
                        <?PHP
                            $query = $this->amember_m->viewmember($this->session->userdata('idmember'));
                            $row = $query->row();
                        ?>                
        
                    <div class="pull-right">
                        <button class="btn btn-warning btn-sm edit" title="Ubah" data-toggle="modal" data-target="#modal_member" id="edit_<?PHP echo $row->idmember; ?>">
                              <i class="glyphicon glyphicon-edit"></i> Ubah
                        </button>
                    </div>
             
                    <div class="clearfix"></div>
                </div>
               
                    <table class="table table-striped table-condensed">
                        <tbody>                
                            <tr>
                                <th>Nama Member</th>
                                <td><?PHP echo $row->nama; ?>
                                    <input type="hidden" id="idmember_<?php echo $row->idmember; ?>" value="<?php echo $row->idmember; ?>" />
                                    <input type="hidden" id="nama_<?php echo $row->idmember; ?>" value="<?php echo $row->nama; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <th>Kota Asal</th>
                                <td><?PHP echo $row->namakota; ?>
                                    <input type="hidden" id="namakota_<?php echo $row->idmember; ?>" value="<?php echo $row->idkota; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <th>ID Login</th>
                                <td><?PHP echo $row->idlogin; ?>
                                    <input type="hidden" id="idlogin_<?php echo $row->idmember; ?>" value="<?php echo $row->idlogin; ?>" />
                                </td>
                            </tr>
                        </tbody>                
                    </table>

            </div>
        </div>
	</div>

<div class="modal fade" id="modal_member">
	<div class="modal-dialog">
    	<div class="modal-content">
        	<div class="modal-header">
            	<button class="close" data-dismiss="modal">
                	&times;
                </button>
            	<h4 class="modal-title">Form member</h4>
            </div>
            <div class="modal-body">
            	<form method="post" id="form_member">
                	<div class="form-group">
                    	<label>Nama</label>
                    	<input type="text" class="form-control" name="nama" id="nama" placeholder="Nama member" required>
                        <input type="hidden" name="idmember_tmp" id="idmember_tmp" />
                    </div>
                    <div class="form-group">
                    	<label>Nama Kota</label>
                        <select name="namakota" id="namakota" class="form-control" >
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
                    	<input type="text" class="form-control" name="idlogin" id="idlogin" placeholder="Nama Panggilan" required>
                    </div>
                    <div class="form-group">
                    	<label>Password</label>
                    	<input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                    	<label>Konfirmasi Password</label>
                    	<input type="password" class="form-control" name="konfpassword" id="konfpassword" placeholder="Konfirmasi Password" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            	<button class="btn btn-primary btn-sm" type="submit" form="form_member" id="update">
                	Perbaharui
                </button>
                <button class="btn btn-default btn-sm" data-dismiss="modal">
                	Batal
                </button>
            </div>
        </div>
    </div>
</div>

<?php
	$this->load->view("footer_v");
?>
<script type="text/javascript">
	$(document).ready(function(){
		
		$(".edit").click(function(){

			var id = this.id.substr(5);

			$('#idmember_tmp').val(id);
			$('#nama').val($('#nama_' + id).val());
			$('#idlogin').val($('#idlogin_' + id).val());
			$('#idlogin_tmp').val($('#idlogin_' + id).val());
			$('#namakota').val($('#namakota_' + id).val());
			$('#idlogin').attr('disabled',true);			
			
			$('#form_member').attr('action','<?PHP echo base_url(); ?>tinjauanmember/update');
					
		});
		
	});

</script>