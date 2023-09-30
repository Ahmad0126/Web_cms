<!-- home page slider -->
<div class="homepage-slider">
    <!-- single home slider -->
    <?php foreach($carousel as $fer){ ?>
    <div class="single-homepage-slider" style="background-image: url(<?= base_url('assets/upload/carousel/').$fer->foto ?>);">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
                    <div class="hero-text">
                        <div class="hero-text-tablecell">
                            <p class="subtitle">Fresh & Organic</p>
                            <h1>Delicious Seasonal Fruits</h1>
                            <div class="hero-btns">
                                <a href="shop.html" class="boxed-btn">Fruit Collection</a>
                                <a href="contact.html" class="bordered-btn">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>
<!-- end home page slider -->

<!-- latest news -->
<div class="latest-news py-5">
    <div class="container">

        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title mb-5">	
                    <h3>Lihat <span class="orange-text">Artikel</span></h3>
                </div>
            </div>
        </div>

        <div class="row">
            <?php foreach($konten as $fer){ ?>
            <div class="col-lg-4 col-md-6">
                <div class="single-latest-news">
                    <a href="<?= base_url('home/artikel/').$fer->slug ?>">
                        <div class="latest-news-bg" style="background-image: url(<?= base_url('assets/upload/konten/').$fer->foto ?>);"></div>
                    </a>
                    <div class="news-text-box">
                        <h3><a href="<?= base_url('home/artikel/').$fer->slug ?>"><?= $fer->judul ?></a></h3>
                        <p class="blog-meta">
                            <span class="author"><i class="fas fa-user"></i> <?= $fer->nama ?></span>
                            <span class="date"><i class="fas fa-calendar"></i> <?= $fer->tanggal ?></span>
                        </p>
                        <p class="excerpt"><?= substr($fer->keterangan, 0, 120) ?><?= strlen($fer->keterangan) > 120 ? '...' : '' ?></p>
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