<!-- footer -->
<div class="footer-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6">
				<div class="footer-box pages">
					<h2 class="widget-title">Kategori</h2>
					<ul>
						<?php foreach($kategori as $fer){ ?>
						<li><a href="<?= base_url('home/kategori/').$fer->nama_kategori ?>"><?= $fer->nama_kategori ?></a></li>
						<?php } ?>
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="footer-box pages">
					<h2 class="widget-title">Artikel Terbaru</h2>
					<ul>
						<?php foreach($recent_post as $fer){ ?>
						<li><a href="<?= base_url('home/artikel/').$fer->slug ?>"><?= $fer->judul ?></a></li>
						<?php } ?>
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="footer-box about-widget">
					<h2 class="widget-title">About us</h2>
					<p><?= $konfig['profil_website'] ?></p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="footer-box get-in-touch">
					<h2 class="widget-title">Get in Touch</h2>
					<ul>
						<li><?= $konfig['alamat'] ?></li>
						<li><?= $konfig['email'] ?></li>
						<li><?= $konfig['no_wa'] ?></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end footer -->

<!-- copyright -->
<div class="copyright">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-12">
				<p>Copyrights &copy; 2019 - <a href="https://imransdesign.com/">Imran Hossain</a>,  All Rights Reserved.<br>
					Distributed By - <a href="https://themewagon.com/">Themewagon</a>
				</p>
			</div>
			<div class="col-lg-6 text-right col-md-12">
				<div class="social-icons">
					<ul>
						<li><a href="<?= $konfig['facebook'] ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
						<li><a href="<?= $konfig['instagram'] ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end copyright -->