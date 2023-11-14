<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
	<div class="bg-light text-center rounded p-4">
		<div class="d-flex align-items-center justify-content-between mb-4">
			<h4 class="mb-0">Aktivitas User</h4>
		</div>
		<div class="table-responsive">
			<table id="tabel" class="table text-start align-middle table-hover mb-0">
				<thead>
					<tr class="text-dark">
						<th scope="col" class="text-center">No</th>
						<th scope="col" class="text-center">Username</th>
						<th scope="col" class="text-center">Nama</th>
						<th scope="col" class="text-center">Tanggal</th>
						<th scope="col" class="text-center">Waktu</th>
						<th scope="col" class="text-center">Aktivitas</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$no = 1;
					foreach($log as $fer): 
						$time = explode(" ", $fer->waktu);
					?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $fer->username ?></td>
						<td><?= $fer->nama ?></td>
						<td><?= $this->template->translate_bulan($time[0]) ?></td>
						<td><?= $time[1].' WIB' ?></td>
						<td><?= $fer->aktivitas ?></td>
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