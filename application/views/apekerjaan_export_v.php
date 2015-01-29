        	<table>
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Jabatan</th>
                        <th>Pekerjaan</th>
                    </tr>
                <?PHP
                	$query = $this->apekerjaan_m->view();
					$no = 1;					
					foreach($query->result() as $row) :
				?>                
                    <tr>
                        <td><?PHP echo $no++; ?></td>
                        <td><?PHP echo $row->namakategori; ?></td>
                        <td><?PHP echo $row->namajabatan; ?></td>
                        <td><?PHP echo $row->namapekerjaan; ?></td>
                    </tr>
                <?PHP
                	endforeach;
				?>
            </table>