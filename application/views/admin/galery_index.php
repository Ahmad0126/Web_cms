<div class="modal fade" id="alertmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<?= $this->session->flashdata('alert'); ?>
	</div>
</div>
<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
	<div class="bg-light rounded p-4">
		<div class="d-flex align-items-center justify-content-between mb-4">
			<h4 class="mb-0">Foto Galeri</h4>
			<button data-toggle="modal" type="button" data-target="#tambahModal" class="btn btn-primary">Tambah</button>
		</div>
		<div class="table-responsive">
			<table id="tabel" class="table text-start table-hover mb-0">
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
						<td class="text-start"><?= $no++ ?></td>
						<td class="text-center"><?= $fer->judul ?></td>
						<td class="text-center"><?= $this->template->translate_bulan($fer->tanggal) ?></td>
						<td class="text-center">
							<a data-toggle="modal" href="" type="button" data-foto="<?= base_url('assets/upload/galeri/').$fer->foto ?>" data-judul="<?= $fer->judul ?>" data-target="#fotomodal" class="btn btn-sm">
								<i class="fa fa-search"></i> Lihat foto
							</a>
                        </td>
						<td style="text-align:end;">
							<a class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus foto ini?')" href="<?= base_url('admin/galery/hapus_galery/').$fer->id_galeri ?>">Hapus <i class="fa fa-trash"></i></a>
						</td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Foto</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('admin/galery/simpan')?>" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="form-group mb-3">
						<label for="floatingPassword">Judul</label>
						<input type="text" name="judul" class="form-control" placeholder="Judul" id="floatingPassword" required>
					</div>
					<div class="form-group mb-3">
						<label for="Tanggal">Tanggal</label>
						<input type="date" name="tanggal" class="form-control" placeholder="Tanggal" id="Tanggal" required>
					</div>
					<div class="form-group mb-3">
						<label for="floatingSelect">Foto</label>
						<input type="file" name="foto" class="form-control" id="floatingSelect" accept="image/jpeg" required>
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
<div class="modal fade" id="fotomodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="max-width: 1024px;width: fit-content;" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body p-0 text-center">
				<img class="img-fluid" id="foto" src="" alt="foto">
			</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>