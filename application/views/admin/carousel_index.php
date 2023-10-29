<div class="container-fluid pt-4 px-4">
	<?= $this->session->flashdata('alert'); ?>
</div>
<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
	<div class="bg-light text-center rounded p-4">
		<div class="d-flex align-items-center justify-content-between">
			<h4 class="mb-0">Foto Carousel</h4>
			<button data-toggle="modal" type="button" data-target="#tambahModal" class="btn btn-primary">Tambah</button>
		</div>
		<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
			aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Tambah Foto</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          					<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="<?= base_url('admin/carousel/simpan')?>" method="post" enctype="multipart/form-data">
						<div class="modal-body">
							<div class="form-group mb-3">
								<label for="floatingPassword">Judul</label>
								<input type="text" name="judul" class="form-control" placeholder="Judul"
									id="floatingPassword" required>
							</div>
							<div class="form-group mb-3">
								<label for="floatingSelect">Foto</label>
								<input type="file" name="foto" class="form-control" id="floatingSelect"
									accept="image/jpeg" required>
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
	</div>
</div>
<?php foreach($carousel as $fer){ ?>
<div class="container-fluid pt-4 px-4">
    <div class="card bg-light">
        <img class="card-img-top" src="<?= base_url('assets/upload/carousel/').$fer->foto ?>" alt="">
        <div class="card-body d-flex align-items-center justify-content-between">
            <h4><?= $fer->judul ?></h4>
            <a class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus foto ini?')" href="<?= base_url('admin/carousel/hapus_carousel/').$fer->foto ?>"><i class="fa fa-trash"></i> Hapus</a>
        </div>
    </div>
</div>
<?php } ?>
