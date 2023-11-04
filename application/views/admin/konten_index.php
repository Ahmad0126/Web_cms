<div class="modal fade" id="alertmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<?= $this->session->flashdata('alert'); ?>
	</div>
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
						<td class="text-center"><?= $fer->nama_kategori ?></td>
						<td class="text-center"><?= $this->template->translate_bulan($fer->tanggal) ?></td>
						<td class="text-center"><?= $fer->nama ?></td>
						<td class="text-center">
							<a href="" data-toggle="modal" type="button" data-foto="<?= base_url('assets/upload/konten/').$fer->foto ?>" data-judul="<?= $fer->judul ?>" data-target="#fotomodal" class="btn btn-sm">
								<i class="fa fa-search"></i> Lihat foto
							</a>
						</td>
						<td style="text-align:end;">
							<a class="btn btn-sm btn-secondary" href="<?= base_url('home/artikel/').$fer->slug ?>" target="_blank"><i class="fa fa-external-link-alt"></i></a>
							<a class="btn btn-sm btn-primary" href="<?= base_url('admin/konten/edit/').$fer->id_konten ?>"><i class="fa fa-edit"></i></a>
							<a class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus konten ini?')" href="<?= base_url('admin/konten/hapus_konten/').$fer->id_konten ?>">
								<i class="fa fa-trash"></i>
							</a>
						</td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="modal fade" id="fotomodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="max-width: 1024px;" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body text-center">
				<img class="img-fluid" id="foto" src="" alt="foto">
			</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
