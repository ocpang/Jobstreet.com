        	<table>
                    <tr>
                        <th>No</th>
                        <th>Provinsi</th>
                        <th>Kota</th>
                    </tr>
                <?PHP
                	$query = $this->akota_m->view();
					$no = 1;					
					foreach($query->result() as $row) :
				?>                
                    <tr>
                        <td><?PHP echo $no++; ?></td>
                        <td><?PHP echo $row->namaprovinsi; ?></td>
                        <td><?PHP echo $row->namakota; ?></td>
                    </tr>
                <?PHP
                	endforeach;
				?>
            </table>