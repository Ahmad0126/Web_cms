<div class="container-fluid pt-4 px-4">
	<?= $this->session->flashdata('alert'); ?>
</div>
<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
	<div class="bg-light rounded p-4">
		<div class="d-flex align-items-center justify-content-between mb-4">
			<h4 class="mb-0">Daftar Kategori</h4>
			<button data-toggle="modal" type="button" data-target="#tambahmodal" class="btn btn-primary">Tambah</button>
		</div>
		<div class="table-responsive">
			<table class="table text-start table-hover mb-0">
				<thead>
					<tr class="text-dark table-primary">
						<th class="text-start" scope="col">No</th>
						<th class="text-center" scope="col">Nama Kategori</th>
						<th class="text-center" scope="col">Tampilkan di sidebar</th>
						<th style="text-align:end;" scope="col">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$no = 1;
					foreach($kategori as $fer): 
					?>
					<tr>
						<td class="text-start"><?= $no ?></td>
						<td class="text-center"><?= $fer->nama_kategori ?></td>
						<td class="text-center">
							<form action="<?= base_url('admin/kategori/include/').$fer->id_kategori ?>" method="post">
								<input type="checkbox" value="<?= $fer->id_kategori ?>" <?= $fer->sidebar == 'on' ? 'checked' : '' ?> name="id" id="kategori<?= $no ?>" onchange="this.form.submit()">
								<label for="kategori<?= $no++ ?>">Tampilkan</label>
							</form>
						</td>
						<td style="text-align:end;">
							<a class="btn btn-sm btn-primary" href="" data-toggle="modal" data-target="#editkate" data-urlaction="<?= base_url('admin/kategori/update_kategori/').$fer->id_kategori ?>" data-valuenama="<?= $fer->nama_kategori ?>">Edit <i class="fa fa-edit"></i></a>
							<a class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus kategori ini?')" href="<?= base_url('admin/kategori/hapus_kategori/').$fer->id_kategori ?>"><i class="fa fa-trash"></i> Hapus</a>
						</td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="modal fade" id="tambahmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambahkan Kategori</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('admin/kategori/simpan') ?>" method="post">
			<div class="modal-body">
				<div class="form-group mb-3">
					<label for="floatingPassword">Nama Kategori</label>
					<input type="text" name="kategori" class="form-control" placeholder="Nama Kategori" id="floatingPassword">
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
				<button type="submit" class="btn btn-primary m-2">Simpan</button>
			</div>
			</form>
		</div>
	</div>
</div>
<div class="modal fade" id="editkate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="" id="form" method="post">
			<div class="modal-body">
				<div class="form-group mb-3">
					<label for="nama">Nama Kategori</label>
					<input type="text" name="kategori" class="form-control" placeholder="Nama Kategori" id="nama">
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
				<button type="submit" class="btn btn-primary m-2">Simpan</button>
			</div>
			</form>
		</div>
	</div>
</div>