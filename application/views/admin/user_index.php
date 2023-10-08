<div class="container-fluid pt-4 px-4">
	<?= $this->session->flashdata('alert'); ?>
</div>
<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
	<div class="bg-light text-center rounded p-4">
		<div class="d-flex align-items-center justify-content-between mb-4">
			<h4 class="mb-0">Daftar User</h4>
			<a href="<?= base_url('admin/user/tambah') ?>" class="btn btn-primary">Tambah</a>
		</div>
		<div class="table-responsive">
			<table class="table text-start align-middle table-hover mb-0">
				<thead>
					<tr class="text-dark">
						<th scope="col">No</th>
						<th scope="col">Username</th>
						<th scope="col">Nama</th>
						<th scope="col">Level</th>
						<th scope="col">Terakhir login</th>
						<th scope="col">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$no = 1;
					date_default_timezone_set('Asia/bangkok');
					$now = date('Y-m-d H:i:s');
					foreach($user as $fer): 
					?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $fer->username ?></td>
						<td><?= $fer->nama ?></td>
						<td><?= $fer->level ?></td>
						<td>
							<a data-toggle="tooltip" data-placement="top" data-title="<?= $fer->last_login ?>">
								<?= $this->template->translate_waktu($fer->last_login, $now) ?>
							</a>
						</td>
						<td>
							<?php if($fer->id_user != $this->session->userdata('id')){ ?>
							<a class="btn btn-sm btn-primary" href="<?= base_url('admin/user/edit/').$fer->id_user ?>">Edit</a>
							<a class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus user ini?')" href="<?= base_url('admin/user/hapus_user/').$fer->id_user ?>">Hapus <i class="fa fa-trash"></i></a>
							<?php }else{ echo "Tidak ada"; } ?>
						</td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>