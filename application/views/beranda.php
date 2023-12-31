<!-- home page slider -->
<div class="homepage-slider">
    <!-- single home slider -->
    <?php $no = 1; foreach($carousel as $fer){ ?>
    <div class="single-homepage-slider" style="background-image: url(<?= base_url('assets/upload/carousel/').$fer->foto ?>);">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
                    <div class="hero-text">
                        <div class="hero-text-tablecell">
                            <?php if($no == 1){ ?>
                                <p class="subtitle">Join with us</p>
                                <h1>Web Blogger iseng isengan</h1>
                                <div class="hero-btns">
                                    <a href="<?= base_url('home/galeri') ?>" class="boxed-btn">Galeri Foto</a>
                                    <a href="<?= base_url('home/saran') ?>" class="bordered-btn">Contact Us</a>
                                </div>
                            <?php }else{ ?>
                            <h1><?= $fer->judul ?></h1>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $no++; } ?>
</div>
<!-- end home page slider -->

<!-- latest news -->
<div class="latest-news py-5">
    <div class="container">

        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title mb-5">	
                    <h3>Artikel <span class="orange-text">Terbaru</span></h3>
                </div>
            </div>
        </div>

        <div class="row">
            <?php 
                if($konten == null){
                    echo '<div class="col text-center">Belum ada Artikel</div>';
                }
                foreach($konten as $fer){ 
            ?>
            <div class="col-lg-4 col-md-6">
                <div class="single-latest-news">
                    <a href="<?= base_url('home/artikel/').$fer->slug ?>">
                        <div class="latest-news-bg" style="background-image: url(<?= base_url('assets/upload/konten/').$fer->foto ?>);"></div>
                    </a>
                    <div class="news-text-box">
                        <h3><a href="<?= base_url('home/artikel/').$fer->slug ?>"><?= $fer->judul ?></a></h3>
                        <p class="blog-meta">
                            <span class="author"><i class="fas fa-user"></i> <?= $fer->nama ?></span>
                            <span class="date"><i class="fas fa-calendar"></i> <?= $this->template->translate_bulan($fer->tanggal) ?></span>
                        </p>
                        <p class="excerpt"><?= substr(strip_tags($fer->keterangan), 0, 120) ?><?= strlen(strip_tags($fer->keterangan)) > 120 ? '...' : '' ?></p>
                        <a href="<?= base_url('home/artikel/').$fer->slug ?>" class="read-more-btn">baca selengkapnya <i class="fas fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <a href="<?= base_url('home/artikel') ?>" class="boxed-btn mt-5">Artikel lainnya</a>
            </div>
        </div>
    </div>
</div>
<!-- end latest news -->