<div class="container-fluid pt-4 px-4">
	<?= $this->session->flashdata('alert'); ?>
</div>
<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
	<div class="bg-light rounded p-4">
		<div class="d-flex align-items-center justify-content-between mb-4">
			<h4 class="mb-0">Edit Konfigurasi</h4>
		</div>
		<form action="<?= base_url('admin/konfigurasi/update/') ?>" method="post">
			<div class="form-group mb-3">
				<div class="input-group">
					<div class="input-group-prepend mr-0">
						<span class="input-group-text">Judul Website</span>
					</div>
					<input type="text" name="judul_website" class="form-control pl-2" value="<?= isset($konfig['judul_website'])? $konfig['judul_website']:''?>">
				</div>
			</div>
			<div class="form-group mb-3">
				<div class="input-group">
					<div class="input-group-prepend mr-0">
						<span class="input-group-text">Profil Website</span>
					</div>
					<textarea name="profil_website" rows="5" class="form-control pl-2"><?= isset($konfig['profil_website'])? $konfig['profil_website']:''?></textarea>
				</div>
			</div>
			<div class="form-group mb-3">
				<div class="input-group">
					<div class="input-group-prepend mr-0">
						<span class="input-group-text">Instagram</span>
					</div>
					<input type="text" name="instagram" class="form-control pl-2" value="<?= isset($konfig['instagram'])? $konfig['instagram']:''?>">
				</div>
			</div>
			<div class="form-group mb-3">
				<div class="input-group">
					<div class="input-group-prepend mr-0">
						<span class="input-group-text">Facebook</span>
					</div>
					<input type="text" name="facebook" class="form-control pl-2" value="<?= isset($konfig['facebook'])? $konfig['facebook']:''?>">
				</div>
			</div>
			<div class="form-group mb-3">
				<div class="input-group">
					<div class="input-group-prepend mr-0">
						<span class="input-group-text">Github</span>
					</div>
					<input type="text" name="github" class="form-control pl-2" value="<?= isset($konfig['github'])? $konfig['github']:''?>">
				</div>
			</div>
			<div class="form-group mb-3">
				<div class="input-group">
					<div class="input-group-prepend mr-0">
						<span class="input-group-text">Email</span>
					</div>
					<input type="text" name="email" class="form-control pl-2" value="<?= isset($konfig['email'])? $konfig['email']:''?>">
				</div>
			</div>
			<div class="form-group mb-3">
				<div class="input-group">
					<div class="input-group-prepend mr-0">
						<span class="input-group-text">Alamat</span>
					</div>
					<input type="text" name="alamat" class="form-control pl-2" value="<?= isset($konfig['alamat'])? $konfig['alamat']:''?>">
				</div>
			</div>
			<div class="form-group mb-3">
				<div class="input-group">
					<div class="input-group-prepend mr-0">
						<span class="input-group-text">Whatsapp</span>
					</div>
					<input type="text" name="no_wa" class="form-control pl-2" value="<?= isset($konfig['no_wa'])? $konfig['no_wa']:''?>">
				</div>
			</div>
            <button type="submit" class="btn btn-primary m-2">Simpan</button>
		</form>
	</div>
</div>
