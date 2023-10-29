<?php $menu = $this->uri->segment(2); ?>
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
	<div class="container-fluid">
		<!-- Toggler -->
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
			aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<!-- Brand -->
		<a class="navbar-brand pt-0" href="<?= base_url() ?>">
			<img src="<?= base_url('assets/argon/') ?>assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
		</a>
		<!-- User -->
		<ul class="nav align-items-center d-md-none">
			<li class="nav-item">
				<a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
					aria-expanded="false">
					<div class="media align-items-center">
						<span class="avatar avatar-sm rounded-circle">
							<img alt="Image placeholder" src="<?= $this->session->userdata('profil') == null ? base_url('assets/argon/assets/img/theme/undraw_profile.svg') : base_url('assets/upload/profil/').$this->session->userdata('profil') ?>">
						</span>
					</div>
				</a>
				<div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
					<div class=" dropdown-header noti-title">
						<h6 class="text-overflow m-0">Welcome!</h6>
					</div>
					<a href="<?= base_url('admin/home/profil') ?>" class="dropdown-item">
						<i class="ni ni-single-02"></i>
						<span>My profile</span>
					</a>
					<div class="dropdown-divider"></div>
					<a href="<?= base_url('logout') ?>" class="dropdown-item">
						<i class="ni ni-user-run"></i>
						<span>Logout</span>
					</a>
				</div>
			</li>
		</ul>
		<!-- Collapse -->
		<div class="collapse navbar-collapse" id="sidenav-collapse-main">
			<!-- Collapse header -->
			<div class="navbar-collapse-header d-md-none">
				<div class="row">
					<div class="col-6 collapse-brand">
						<a href="<?= base_url() ?>">
							<img src="<?= base_url('assets/argon/') ?>assets/img/brand/blue.png">
						</a>
					</div>
					<div class="col-6 collapse-close">
						<button type="button" class="navbar-toggler" data-toggle="collapse"
							data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
							aria-label="Toggle sidenav">
							<span></span>
							<span></span>
						</button>
					</div>
				</div>
			</div>
			<!-- Navigation -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link <?= $menu == 'home' ? 'active' : '' ?>" href="<?= base_url('admin/home') ?>">
						<i class="ni ni-tv-2 text-primary"></i> Dashboard
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?= $menu == 'carousel' ? 'active' : '' ?>" href="<?= base_url('admin/carousel') ?>">
						<i class="ni ni-planet text-blue"></i> Carousel
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?= $menu == 'kategori' ? 'active' : '' ?>" href="<?= base_url('admin/kategori') ?>">
						<i class="ni ni-pin-3 text-orange"></i> Kategori Konten
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?= $menu == 'konten' ? 'active' : '' ?>" href="<?= base_url('admin/konten') ?>">
						<i class="ni ni-bullet-list-67 text-red"></i> Konten
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?= $menu == 'galery' ? 'active' : '' ?>" href="<?= base_url('admin/galery') ?>">
						<i class="fa fa-images text-success"></i> Galeri Foto
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?= $menu == 'saran' ? 'active' : '' ?>" href="<?= base_url('admin/saran') ?>">
						<i class="ni ni-email-83 text-gray"></i> Saran
					</a>
				</li>
				<?php if($this->session->userdata('level')=='admin'){ ?>
				<li class="nav-item">
					<a class="nav-link <?= $menu == 'user' ? 'active' : '' ?>" href="<?= base_url('admin/user') ?>">
						<i class="ni ni-single-02 text-yellow"></i> User
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?= $menu == 'konfigurasi' ? 'active' : '' ?>" href="<?= base_url('admin/konfigurasi') ?>">
						<i class="ni ni-key-25 text-info"></i> Konfigurasi
					</a>
				</li>
				<?php } ?>
			</ul>
		</div>
	</div>
</nav>