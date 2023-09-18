<div class="container-fluid pt-4 px-4">
	<?= $this->session->flashdata('alert'); ?>
</div>
<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
	<div class="bg-light rounded p-4">
		<div class="d-flex align-items-center justify-content-between mb-4">
			<h4 class="mb-0">Daftar Kategori</h4>
			<a href="<?= base_url('admin/kategori/tambah') ?>" class="btn btn-primary">Tambah</a>
		</div>
		<div class="table-responsive">
			<table class="table text-start table-hover mb-0">
				<thead>
					<tr class="text-dark table-primary">
						<th class="text-start" scope="col">No</th>
						<th class="text-center" scope="col">Nama Kategori</th>
						<th style="text-align:end;" scope="col">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$no = 1;
					foreach($kategori as $fer): 
					?>
					<tr>
						<td class="text-start"><?= $no++ ?></td>
						<td class="text-center"><?= $fer->nama_kategori ?></td>
						<td style="text-align:end;">
							<a class="btn btn-sm btn-primary" href="<?= base_url('admin/kategori/edit/').$fer->id_kategori ?>">Edit</a>
							<a class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus kategori ini?')" href="<?= base_url('admin/kategori/hapus_kategori/').$fer->id_kategori ?>">Hapus <i class="fa fa-trash"></i></a>
						</td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>