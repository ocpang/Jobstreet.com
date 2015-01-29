        	<table>
                    <tr>
                        <th>No</th>
                        <th>Provinsi</th>
                    </tr>
                <?PHP
                	$query = $this->aprovinsi_m->view();
					$no = 1;					
					foreach($query->result() as $row) :
				?>                
                    <tr>
                        <td><?PHP echo $no++; ?></td>
                        <td><?PHP echo $row->namaprovinsi; ?></td>
                    </tr>
                <?PHP
                	endforeach;
				?>
            </table>