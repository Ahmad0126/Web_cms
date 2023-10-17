<div class="container-fluid pt-4 px-4">
	<?= $this->session->flashdata('alert'); ?>
</div>
<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
	<div class="bg-light rounded p-4">
		<div class="d-flex align-items-center justify-content-between mb-4">
			<h4 class="mb-0">Foto Galeri</h4>
			<a href="<?= base_url('admin/galery/tambah') ?>" class="btn btn-primary">Tambah</a>
		</div>
		<div class="table-responsive">
			<table class="table text-start table-hover mb-0">
				<thead>
					<tr class="text-dark table-primary">
						<th class="text-start" scope="col">No</th>
						<th class="text-center" scope="col">Judul</th>
						<th class="text-center" scope="col">Tanggal</th>
						<th class="text-center" scope="col">Foto</th>
						<th style="text-align:end;" scope="col">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$no = 1;
					foreach($galery as $fer): 
					?>
					<tr>
						<td class="text-start"><?= $no ?></td>
						<td class="text-center"><?= $fer->judul ?></td>
						<td class="text-center"><?= $fer->tanggal ?></td>
						<td class="text-center">
                            <a class="btn btn-sm" href="<?= base_url('assets/upload/galery/').$fer->foto ?>" id="c2">
								<i class="fa fa-search"></i> Lihat foto
							</a>
                        </td>
						<td style="text-align:end;">
							<a class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus foto ini?')" href="<?= base_url('admin/galery/hapus_galery/').$fer->id_galery ?>">Hapus <i class="fa fa-trash"></i></a>
						</td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>