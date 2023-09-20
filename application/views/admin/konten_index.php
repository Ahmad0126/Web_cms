<div class="container-fluid pt-4 px-4">
	<?= $this->session->flashdata('alert'); ?>
</div>
<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
	<div class="bg-light rounded p-4">
		<div class="d-flex align-items-center justify-content-between mb-4">
			<h4 class="mb-0">Daftar Konten</h4>
			<a href="<?= base_url('admin/konten/tambah') ?>" class="btn btn-primary">Tambah</a>
		</div>
		<div class="table-responsive">
			<table class="table text-start table-hover mb-0">
				<thead>
					<tr class="text-dark table-primary">
						<th class="text-start" scope="col">No</th>
						<th class="text-center" scope="col">Judul</th>
						<th class="text-center" scope="col">Kategori</th>
						<th class="text-center" scope="col">Tanggal</th>
						<th class="text-center" scope="col">Kreator</th>
						<th class="text-center" scope="col">Foto</th>
						<th style="text-align:end;" scope="col">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$no = 1;
					foreach($konten as $fer): 
					?>
					<tr>
						<td class="text-start"><?= $no++ ?></td>
						<td class="text-center"><?= $fer->judul ?></td>
						<td class="text-center">-</td>
						<td class="text-center"><?= $fer->tanggal ?></td>
						<td class="text-center">-</td>
						<td class="text-center">-</td>
						<td style="text-align:end;">
							<a class="btn btn-sm btn-primary" href="<?= base_url('admin/konten/edit/').$fer->id_konten ?>">Edit</a>
							<a class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus konten ini?')" href="<?= base_url('admin/konten/hapus_konten/').$fer->id_konten ?>">Hapus <i class="fa fa-trash"></i></a>
						</td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>