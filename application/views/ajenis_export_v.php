        	<table>
                    <tr>
                        <th>No</th>
                        <th>Jenis</th>
                    </tr>
                <?PHP
                	$query = $this->ajenis_m->view();
					$no = 1;					
					foreach($query->result() as $row) :
				?>                
                    <tr>
                        <td><?PHP echo $no++; ?></td>
                        <td><?PHP echo $row->jenis; ?></td>
                    </tr>
                <?PHP
                	endforeach;
				?>
            </table>