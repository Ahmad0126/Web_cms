<div class="container-fluid pt-4 px-4">
	<h1>Selamat Datang, <?= $this->session->userdata('nama'); ?></h1>
	<div class="row pt-2">
		<div class="col-xl-3 col-lg-6">
			<div class="card card-stats mb-4 mb-xl-0">
				<div class="card-body">
					<div class="row">
						<div class="col">
							<h5 class="card-title text-uppercase text-muted mb-0">Konten</h5>
							<span class="h2 font-weight-bold mb-0"><?= $jml_konten ?> <span class="h5">artikel</span></span>
						</div>
						<div class="col-auto">
							<div class="icon icon-shape bg-danger text-white rounded-circle shadow">
								<i class="fas fa-chart-bar"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-lg-6">
			<div class="card card-stats mb-4 mb-xl-0">
				<div class="card-body">
					<div class="row">
						<div class="col">
							<h5 class="card-title text-uppercase text-muted mb-0">Galeri</h5>
							<span class="h2 font-weight-bold mb-0"><?= $jml_foto ?> <span class="h5">foto</span></span>
						</div>
						<div class="col-auto">
							<div class="icon icon-shape bg-warning text-white rounded-circle shadow">
								<i class="fas fa-images"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-lg-6">
			<div class="card card-stats mb-4 mb-xl-0">
				<div class="card-body">
					<div class="row">
						<div class="col">
							<h5 class="card-title text-uppercase text-muted mb-0">User</h5>
							<span class="h2 font-weight-bold mb-0"><?= $jml_user ?> <span class="h5">orang</span></span>
						</div>
						<div class="col-auto">
							<div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
								<i class="fas fa-users"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-lg-6">
			<div class="card card-stats mb-4 mb-xl-0">
				<div class="card-body">
					<div class="row">
						<div class="col">
							<h5 class="card-title text-uppercase text-muted mb-0">Saran</h5>
							<span class="h2 font-weight-bold mb-0"><?= $jml_saran ?> <span class="h5">pengirim</span></span>
						</div>
						<div class="col-auto">
							<div class="icon icon-shape bg-info text-white rounded-circle shadow">
								<i class="fas fa-envelope"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row pt-4">
		<div class="col-xl-8 mb-5 mb-xl-0">
            <div class="card shadow bg-gradient-default">
				<div class="card-header bg-transparent">
					<div class="row align-items-center">
						<div class="col">
							<h6 class="text-uppercase text-muted ls-1 mb-1">Laporan bulanan</h6>
							<div class="d-flex justify-content-between">
								<h2 class="mb-0 text-light">Konten yang diupload</h2>
								<h2 class="mb-0 text-light d-flex"> Tahun 
									<form class="ml-1" action="<?= base_url('admin/home/set_tahun') ?>" method="post">
										<select name="tahun" id="" onchange="this.form.submit()">
											<?php for($i = 0; $i < count($tahun); $i++){ ?>
											<option value="<?= $tahun[$i] ?>" <?= $tahun[$i] == $this->session->flashdata('tahun') ? 'selected' : '' ?>><?= $tahun[$i] ?></option>
											<?php } ?>
										</select>
									</form>
								</h2>
							</div>
						</div>
					</div>
				</div>
				<div class="card-body">
					<!-- Chart -->
					<div class="chart">
						<div class="chartjs-size-monitor">
							<div class="chartjs-size-monitor-expand">
								<div class=""></div>
							</div>
							<div class="chartjs-size-monitor-shrink">
								<div class=""></div>
							</div>
						</div>
						<canvas id="report" class="chart-canvas chartjs-render-monitor" style="display: block; width: 765px; height: 350px;" width="765" height="350"></canvas>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-4">
			<div class="card shadow">
				<div class="card-header border-0">
					<div class="row align-items-center">
						<div class="col">
							<h3 class="mb-0">Kategori</h3>
						</div>
						<div class="col text-right">
							<a href="<?= base_url('admin/kategori') ?>" class="btn btn-sm btn-primary">Selengkapnya</a>
						</div>
					</div>
				</div>
				<div class="table-responsive">
					<!-- Projects table -->
					<table class="table align-items-center table-flush">
						<thead class="thead-light">
							<tr>
								<th scope="col">Nama Kategori</th>
								<th scope="col" style="text-align: end;">Jumlah konten</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($konten_per_kategori as $fer){ ?>
							<tr>
								<th scope="row">
									<?= $fer['nama_kategori'] ?>
								</th>
								<td style="text-align: end;">
									<?= $fer['jumlah'] ?>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="<?= base_url('assets/argon/') ?>assets/js/plugins/chart.js/dist/Chart.min.js"></script>
<script src="<?= base_url('assets/argon/') ?>assets/js/plugins/chart.js/dist/Chart.extension.js"></script>
<script>
	(async function() {
		const data = [
			<?php foreach($konten_tahunan as $fer){ ?>
			{ bulan: '<?= $fer['bulan'] ?>', count: '<?= $fer['jml'] ?>' },
			<?php } ?>
		];
		console.log(data);

		new Chart(
			document.getElementById('report'),
			{
				type: 'bar',
				data: {
					labels: data.map(row => row.bulan),
					datasets: [
					{
						label: 'Konten yang diupload',
						data: data.map(row => row.count),
						backgroundColor: 'rgba(235, 158, 52, 1)',
					}
					]
				},
				options: {
					responsive: true,
					maintainAspectRatio: false
				}
			}
		);
	})();
</script>
