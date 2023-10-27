<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Fresh and Organic</p>
                    <h1>Galeri Foto</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- products -->
<div class="product-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <?php foreach($galeri as $fer){ ?>
            <div class="col-lg-6 col-md-12 text-center">
                <div class="single-latest-news">
                    <a data-fancybox="gallery" href="<?= base_url('assets/upload/galeri/').$fer->foto ?>">
                        <img src="<?= base_url('assets/upload/galeri/').$fer->foto ?>">
                    </a>
                    <div class="news-text-box d-flex justify-content-between">
                        <h3><?= $fer->judul ?></h3>
                        <p class="blog-meta">
                            <span class="date"><i class="fas fa-calendar"></i> <?= $fer->tanggal ?></span>
                        </p>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>

        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="pagination-wrap">
                    <ul>
                        <?= $this->pagination->create_links(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end products -->