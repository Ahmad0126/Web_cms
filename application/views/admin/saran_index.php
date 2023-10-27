<div class="container-fluid pt-4 px-4">
	<?= $this->session->flashdata('alert'); ?>
</div>
<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
	<div class="bg-light rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h4 class="mb-4">Masukan Pengunjung</h4>
			<a href="<?= base_url('admin/saran/hapus_saran') ?>" onclick="return confirm('Yakin ingin menghapus semua saran?')" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus semua</a>
		</div>
		<div class="table-responsive">
			<table class="table text-start table-hover mb-0">
				<thead>
					<tr class="text-dark table-primary">
						<th class="text-start" scope="col">No</th>
						<th class="text-center" scope="col">Nama Pengunjung</th>
						<th class="text-center" scope="col">Email</th>
						<th class="text-center" scope="col">Tanggal</th>
						<th style="text-align:end;" scope="col">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$no = 1;
					foreach($saran as $fer): 
					?>
					<tr>
						<td class="text-start"><?= $no ?></td>
						<td class="text-center"><?= $fer->nama ?></td>
						<td class="text-center"><?= $fer->email ?></td>
						<td class="text-center"><?= $fer->tanggal ?></td>
						<td style="text-align:end;">
                            <div class="dropdown">
                                <a class="btn btn-sm btn-primary" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Lihat
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <p class="dropdown-item"><?= nl2br($fer->pesan) ?></p>
                                </div>
                            </div>
							<a class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus saran ini?')" href="<?= base_url('admin/saran/hapus_saran/').$fer->id_saran ?>">Hapus <i class="fa fa-trash"></i></a>
						</td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>