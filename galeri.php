    <section class="section-sm">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title text-center">
                        <h2 class="mb-5">Galeri</h2>
                    </div>
                </div>
                <?php foreach ($galeri as $ten) : ?>
                    <div class="col-lg-3 col-sm-6 mb-4">
                        <article class="mb-5">
                            <div class="post-slider slider-sm">
                                <a href="<?= base_url('assets/upload/galeri/' . $ten['foto']); ?>" class="fancybox" data-fancybox="gallery">
                                    <img src="<?= base_url('assets/upload/galeri/' . $ten['foto']); ?>" class="img-fluid" alt="post-thumb">
                                </a>
                            </div>
                            <h3 class="h5 post-title"><?= word_limiter($ten['judul'], 5);  ?>.</h3>
                            <ul class="list-inline post-meta mb-2">
                                <li class="list-inline-item">Date : <?= $ten['tanggal']; ?></li>
                            </ul>
                        </article>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>