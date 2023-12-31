<!-- footer -->
<div class="footer-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6">
				<div class="footer-box pages">
					<h2 class="widget-title">Kategori</h2>
					<?php if($kategori == null){ echo "Belum ada kategori"; } ?>
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
					<?php if($recent_post == null){ echo "Belum ada artikel"; } ?>
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
					<p><?= nl2br($konfig['profil_website']) ?></p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="footer-box get-in-touch">
					<h2 class="widget-title">Get in Touch</h2>
					<ul>
						<li><i class="fa fa-map-marker"></i> <?= $konfig['alamat'] ?></li>
						<li><i class="fa fa-envelope"></i> <?= $konfig['email'] ?></li>
						<li><i class="fab fa-whatsapp"></i> <?= $konfig['no_wa'] ?></li>
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
				<p>Copyrights &copy; 2023 - <a href="https://ahmad0126.github.io/" target="_blank">Ahmad Zaid</a>,  All Rights Reserved.</p>
			</div>
			<div class="col-lg-6 text-right col-md-12">
				<div class="social-icons">
					<ul>
						<li><a href="<?= $konfig['github'] ?>" target="_blank"><i class="fab fa-github"></i></a></li>
						<li><a href="<?= $konfig['facebook'] ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
						<li><a href="<?= $konfig['instagram'] ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end copyright -->