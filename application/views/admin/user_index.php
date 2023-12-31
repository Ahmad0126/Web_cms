<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
	<div class="bg-light text-center rounded p-4">
		<div class="d-flex align-items-center justify-content-between mb-4">
			<h4 class="mb-0">Daftar User</h4>
			<a href="<?= base_url('admin/user/tambah') ?>" class="btn btn-primary">Tambah</a>
		</div>
		<div class="table-responsive">
			<table id="tabel" class="table text-start align-middle table-hover mb-0">
				<thead>
					<tr class="text-dark">
						<th scope="col" class="text-center">No</th>
						<th scope="col" class="text-center">Username</th>
						<th scope="col" class="text-center">Nama</th>
						<th scope="col" class="text-center">Level</th>
						<th scope="col" class="text-center">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$no = 1;
					foreach($user as $fer): 
					?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $fer->username ?></td>
						<td><?= $fer->nama ?></td>
						<td><?= $fer->level ?></td>
						<td>
							<a class="btn btn-sm btn-primary" href="<?= base_url('admin/user/edit/').$fer->id_user ?>"><i class="fa fa-edit"></i> Edit</a>
							<?php if($fer->id_user != $this->session->userdata('id')){ ?>
							<a class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus user ini?')" href="<?= base_url('admin/user/hapus_user/').$fer->id_user ?>"><i class="fa fa-trash"></i> Hapus</a>
							<?php } ?>
						</td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="modal fade" id="alertmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<?= $this->session->flashdata('alert'); ?>
	</div>
</div>