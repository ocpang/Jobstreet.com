        	<table>
                    <tr>
                        <th>No</th>
                        <th>Nama Perusahaan</th>
                        <th>ID Login</th>
                        <th>Jenis</th>
                        <th>Kota</th>
                        <th>Website</th>
                        <th>Status</th>
                        <th>Verifikasi Admin</th>
                    </tr>
                <?PHP
                	$query = $this->amemberperusahaan_m->view();
					$no = 1;					
					foreach($query->result() as $row) :
				?>                
                    <tr>
                        <td><?PHP echo $no++; ?></td>
                        <td><?PHP echo $row->namaperusahaan; ?></td>
                        <td><?PHP echo $row->idloginperusahaan; ?></td>
                        <td><?PHP echo $row->jenis; ?></td>
                        <td><?PHP echo $row->namakota; ?></td>
                        <td><?PHP echo $row->website; ?></td>
                        <td><?PHP echo $row->statusperusahaan; ?></td>
                        <td><?PHP echo $row->nama; ?></td>
                    </tr>
                <?PHP
                	endforeach;
				?>
            </table>