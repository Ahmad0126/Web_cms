<div class="container-fluid pt-4 px-4">
	<?= $this->session->flashdata('alert'); ?>
</div>
<div class="container-fluid pt-4 px-4">
	<div class="row">
		<div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
			<div class="card card-profile shadow">
				<div class="row">
					<div class="col col-xl-12 col-lg-6">
						<div class="card-profile-image text-center mt-3">
							<a data-toggle="modal" data-target="#profilmodal" href="#">
								<img style="transform: none; max-width: 180px; position: unset;" src="<?= $user['profil'] == null ? base_url('assets/argon/assets/img/theme/undraw_profile.svg') : base_url('assets/upload/profil/').$user['profil'] ?>" class="rounded-circle">
							</a>
						</div>
					</div>
					<div class="col-xl-12 col-lg-6 pt-4 pt-md-4 text-center">
						<h3><?= $user['nama'] ?></h3>
						<div class="h5 font-weight-300"><?= $user['username'] ?></div>
						<div class="h5 mt-4 mb-3"><?= $user['level'] ?></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-8 order-xl-1">
			<div class="card bg-secondary shadow">
				<div class="card-header bg-white border-0">
					<div class="row align-items-center">
						<div class="col-8">
							<h3 class="mb-0">My account</h3>
						</div>
						<div class="col-4 text-right">
							<button data-toggle="modal" type="button" data-target="#passwordmodal" class="btn btn-sm btn-primary">Password</button>
						</div>
					</div>
				</div>
				<div class="card-body">
					<form action="<?= base_url('admin/home/update_user/').$this->session->userdata('id') ?>" method="post" enctype="multipart/form-data">
						<h6 class="heading-small text-muted mb-4">User information</h6>
						<div class="pl-lg-4">
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label class="form-control-label" for="input-username">Username</label>
										<input type="text" name="username" id="input-username" class="form-control form-control-alternative" placeholder="Username" value="<?= $user['username'] ?>" readonly>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label class="form-control-label" for="input-email">Level</label>
										<input type="text" name="level" id="input-email" class="form-control form-control-alternative" placeholder="Level" readonly value="<?= $user['level'] ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label class="form-control-label" for="input-first-name">Nama</label>
										<input type="text" name="nama" id="input-first-name" class="form-control form-control-alternative" placeholder="Nama" value="<?= $user['nama'] ?>">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label class="form-control-label" for="input-last-name">Foto Profil</label>
										<input type="file" name="profil" accept="image/jpeg" id="input-last-name" class="form-control form-control-alternative" placeholder="Foto Profil">
									</div>
									<button type="submit" class="btn btn-primary m-2 float-right">Simpan</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="profilmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<img class="img-fluid" src="<?= $user['profil'] == null ? base_url('assets/argon/assets/img/theme/undraw_profile.svg') : base_url('assets/upload/profil/').$user['profil'] ?>">
	</div>
</div>
<div class="modal fade" id="passwordmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ganti Password</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('admin/home/update_pass/').$this->session->userdata('id') ?>" method="post">
			<div class="modal-body">
				<div class="form-group mb-3">
					<label for="floatingInput">Password Lama</label>
					<input type="password" name="pl" class="form-control <?= $this->session->flashdata('password') != null?'is-invalid':'' ?>" value="<?= $this->session->flashdata('pl_val') != null? $this->session->flashdata('pl_val') : '' ?>" placeholder="Masukkan Password Lama" id="floatingInput">
					<div class="invalid-feedback"><?= $this->session->flashdata('password') ?></div>
				</div>
				<div class="form-group mb-3">
					<label for="f2">Password Baru</label>
					<input type="password" name="password" class="form-control" value="<?= $this->session->flashdata('pp_val') != null? $this->session->flashdata('pp_val') : '' ?>" placeholder="Masukkan Password Baru" id="f2">
				</div>
				<div class="form-group mb-3">
					<label for="floatingPassword">Konfirmasi Password Baru</label>
					<input type="password" name="pk" class="form-control <?= $this->session->flashdata('konf') != null?'is-invalid':'' ?>" value="<?= $this->session->flashdata('pk_val') != null? $this->session->flashdata('pk_val') : '' ?>" placeholder="Masukkan Kembali Password Baru" id="floatingPassword">
					<div class="invalid-feedback"><?= $this->session->flashdata('konf') ?></div>
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