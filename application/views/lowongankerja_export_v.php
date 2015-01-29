        	<table>
                    <tr>
                        <th>No</th>
                        <th>Nama Perusahaan</th>
                        <th>Pekerjaan</th>
                        <th>Tanggal Terbit</th>
                        <th>Gaji</th>
                        <th>Keterangan</th>
                    </tr>
                <?PHP
                	$query = $this->lowongankerja_m->view($this->session->userdata('idperusahaan'));
					$no = 1;
					foreach($query->result() as $row) :
				?>                
                    <tr>
                        <td><?PHP echo $no++; ?></td>
                        <td><?PHP echo $row->namaperusahaan; ?></td>
                        <td><?PHP echo $row->namapekerjaan; ?></td>
                        <td><?PHP echo $row->tglterbit; ?></td>
                        <td>Rp <?PHP echo $row->gaji; ?></td>
                        <td><?PHP echo $row->keterangan; ?></td>
                    </tr>
                <?PHP
                	endforeach;
				?>
            </table>