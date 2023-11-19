<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg pb-0" style="padding-top: 100px;"> </div>
<!-- end breadcrumb section -->

<!-- single article section -->
<div style="margin: 75px 0px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="single-article-section">
                    <div class="single-article-text">
                        <div class="single-artcile-bg" style="background-image: url(<?= base_url('assets/upload/konten/').$konten->foto ?>);"></div>
                        <p class="blog-meta">
                            <span class="author"><i class="fas fa-user"></i> <?= $konten->nama ?></span>
                            <span class="date"><i class="fas fa-calendar"></i> <?= $this->template->translate_bulan($konten->tanggal) ?></span>
                        </p>
                        <h2 class="mb-4"><?= $konten->judul ?></h2>
                        <?= $konten->keterangan ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <?php require_once('layout/fruitkha/_sidebar.php') ?>
            </div>
        </div>
    </div>
</div>
<!-- end single article section -->