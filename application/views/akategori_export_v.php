        	<table>
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                    </tr>
                <?PHP
                	$query = $this->akategori_m->view();
					$no = 1;					
					foreach($query->result() as $row) :
				?>                
                    <tr>
                        <td><?PHP echo $no++; ?></td>
                        <td><?PHP echo $row->namakategori; ?></td>
                    </tr>
                <?PHP
                	endforeach;
				?>
            </table>