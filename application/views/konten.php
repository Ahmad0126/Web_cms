<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Read the Details</p>
                    <h1>Single Article</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- single article section -->
<div class="mt-150 mb-150">
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
                        <h2><?= $konten->judul ?></h2>
                        <p><?= nl2br($konten->keterangan) ?></p>
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