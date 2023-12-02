<div class="sidebar-section">
	<div class="recent-posts">
		<h4>Recent Posts</h4>
		<ul>
			<?php if($recent_post == null){ echo "<li>Belum ada artikel</li>"; } ?>
			<?php foreach($recent_post as $fer){ ?>
			<li><a href="<?= base_url('home/artikel/').$fer->slug ?>"><?= $fer->judul ?></a></li>
			<?php } ?>
		</ul>
	</div>
	<?php foreach($sidebar_kategori as $fer){ ?>
	<div class="archive-posts">
		<h4><?= $fer['kategori'] ?></h4>
		<ul>
			<?php foreach($fer['data'] as $data){ ?>
			<li><a href="<?= base_url('home/artikel/').$data->slug ?>"><?= $data->judul ?></a></li>
			<?php } ?>
		</ul>
	</div>
	<?php } ?>
</div>
