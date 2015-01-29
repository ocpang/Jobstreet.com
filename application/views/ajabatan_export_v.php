        	<table>
            	<thead>
                    <tr>
                        <th>No</th>
                        <th>Jabatan</th>
                    </tr>
                </thead>
                <tbody>
                <?PHP
                	$query = $this->ajabatan_m->view();
					$no = 1;					
					foreach($query->result() as $row) :
				?>                
                    <tr>
                        <td><?PHP echo $no++; ?></td>
                        <td><?PHP echo $row->namajabatan; ?></td>
                    </tr>
                <?PHP
                	endforeach;
				?>
                </tbody>
            </table>