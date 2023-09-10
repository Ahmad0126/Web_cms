<?php $menu = $this->uri->segment(1); ?>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
	<ul class="nav">
		<li class="nav-item <?= $menu == null ? 'active' : '' ?>">
			<a class="nav-link" href="<?= base_url('admin/home') ?>">
				<i class="icon-grid menu-icon"></i>
				<span class="menu-title">Dashboard</span>
			</a>
		</li>
		<li class="nav-item <?= $menu == null ? 'active' : '' ?>">
			<a class="nav-link" href="<?= base_url('admin/carousel') ?>">
				<i class="mdi mdi-calendar-multiple menu-icon"></i>
				<span class="menu-title">Carousel</span>
			</a>
		</li>
		<li class="nav-item <?= $menu == null ? 'active' : '' ?>">
			<a class="nav-link" href="<?= base_url('admin/kategori') ?>">
				<i class="mdi mdi-file-tree menu-icon"></i>
				<span class="menu-title">Kategori Konten</span>
			</a>
		</li>
		<li class="nav-item <?= $menu == null ? 'active' : '' ?>">
			<a class="nav-link" href="<?= base_url('admin/konten') ?>">
				<i class="mdi mdi-calendar-text menu-icon"></i>
				<span class="menu-title">Konten</span>
			</a>
		</li>
		<?php if($this->session->userdata('level')=='admin'){ ?>
		<li class="nav-item <?= $menu == null ? 'active' : '' ?>">
			<a class="nav-link" href="<?= base_url('admin/user') ?>">
				<i class="mdi mdi-account menu-icon"></i>
				<span class="menu-title">User</span>
			</a>
		</li>
		<li class="nav-item <?= $menu == null ? 'active' : '' ?>">
			<a class="nav-link" href="<?= base_url('admin/konfigurasi') ?>">
				<i class="mdi mdi-settings menu-icon"></i>
				<span class="menu-title">Konfigurasi</span>
			</a>
		</li>
		<?php } ?>
	</ul>
</nav>