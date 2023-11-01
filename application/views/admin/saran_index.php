<div class="container-fluid pt-4 px-4">
	<?= $this->session->flashdata('alert'); ?>
</div>
<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
	<div class="bg-light rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h4 class="mb-0">Masukan Pengunjung</h4>
			<a href="<?= base_url('admin/saran/hapus_saran') ?>" onclick="return confirm('Yakin ingin menghapus semua saran?')" class="btn btn-danger"><i class="fa fa-trash"></i> kosongkan</a>
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
						<td class="text-center"><?= $this->template->translate_bulan($fer->tanggal) ?></td>
						<td style="text-align:end;">
                            <div class="dropdown">
                                <a class="btn btn-sm btn-primary" href="" data-toggle="modal" data-target="#saranmodal" data-pesan="<?= $fer->pesan ?>" data-nama="<?= $fer->nama ?>">
									<i class="fa fa-search"></i> Lihat
                                </a>
                            </div>
							<a class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus saran ini?')" href="<?= base_url('admin/saran/hapus_saran/').$fer->id_saran ?>"><i class="fa fa-trash"></i> Hapus</a>
						</td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="modal fade" id="saranmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body text-center">
				<p></p>
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary" type="button" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>