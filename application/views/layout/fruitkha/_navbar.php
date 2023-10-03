<!--PreLoader-->
<div class="loader">
	<div class="loader-inner">
		<div class="circle"></div>
	</div>
</div>
<!--PreLoader Ends-->

<!-- header -->
<div class="top-header-area" id="sticker">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-sm-12 text-center">
				<div class="main-menu-wrap">
					<!-- logo -->
					<div class="site-logo">
						<a href="<?= base_url() ?>">
							<img src="<?= base_url('assets/fruitkha/') ?>assets/img/favicon.png" alt="">
							<h4 class="orange-text"><?= $konfig['judul_website'] ?></h4>
						</a>
					</div>
					<!-- logo -->

					<!-- menu start -->
					<nav class="main-menu">
						<ul>
							<li><a href="<?= base_url() ?>">Home</a></li>
							<?php foreach($kategori as $fer){ ?>
							<li><a href="<?= base_url('home/kategori/').$fer->nama_kategori ?>"><?= $fer->nama_kategori ?></a></li>
							<?php } ?>
							<li>
								<div class="header-icons">
									<a class="shopping-cart" href="<?= base_url('auth') ?>"><i class="fas fa-shopping-cart"></i></a>
									<a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>
								</div>
							</li>
						</ul>
					</nav>
					<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
					<div class="mobile-menu"></div>
					<!-- menu end -->
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end header -->

<!-- search area -->
<div class="search-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<span class="close-btn"><i class="fas fa-window-close"></i></span>
				<div class="search-bar">
					<div class="search-bar-tablecell">
						<form action="<?= base_url('home/cari') ?>" method="get">
							<div class="d-flex justify-content-center">
								<h3>Cari Artikel:</h3>
								<select name="berdasarkan" class="form-control w-auto">
									<option value="judul">Berdasarkan judul</option>
									<option value="keterangan">Berdasarkan isi konten</option>
								</select>
							</div>
							<input type="text" name="key" placeholder="Masukkan Kata Kunci" required minlength="3">
							<button type="submit">Cari <i class="fas fa-search"></i></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end search area -->