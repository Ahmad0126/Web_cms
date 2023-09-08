<?php $menu = $this->uri->segment(1); ?>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
	<ul class="nav">
		<li class="nav-item <?= $menu == null ? 'active' : '' ?>">
			<a class="nav-link" href="<?= base_url() ?>">
				<i class="icon-grid menu-icon"></i>
				<span class="menu-title">Dashboard</span>
			</a>
		</li>
	</ul>
</nav>