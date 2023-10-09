<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Organic Information</p>
                    <h1>News Article</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- latest news -->
<div class="latest-news mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                <?php foreach($konten as $fer){ ?>
                    <div class="col-md-6">
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
                                <p class="excerpt"><?= strlen($fer->keterangan) > 120 ? substr($fer->keterangan, 0, 120).'...' : $fer->keterangan ?></p>
                                <a href="<?= base_url('home/artikel/').$fer->slug ?>" class="read-more-btn">baca selengkapnya <i class="fas fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar-section">
                    <div class="recent-posts">
                        <h4>Recent Posts</h4>
                        <ul>
                            <?php foreach($recent_post as $fer){ ?>
                            <li><a href="<?= base_url('home/artikel/').$fer->slug ?>"><?= $fer->judul ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="archive-posts">
                        <h4>Archive Posts</h4>
                        <ul>
                            <li><a href="single-news.html">JAN 2019 (5)</a></li>
                            <li><a href="single-news.html">FEB 2019 (3)</a></li>
                            <li><a href="single-news.html">MAY 2019 (4)</a></li>
                            <li><a href="single-news.html">SEP 2019 (4)</a></li>
                            <li><a href="single-news.html">DEC 2019 (3)</a></li>
                        </ul>
                    </div>
                    <div class="tag-section">
                        <h4>Tags</h4>
                        <ul>
                            <li><a href="single-news.html">Apple</a></li>
                            <li><a href="single-news.html">Strawberry</a></li>
                            <li><a href="single-news.html">BErry</a></li>
                            <li><a href="single-news.html">Orange</a></li>
                            <li><a href="single-news.html">Lemon</a></li>
                            <li><a href="single-news.html">Banana</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        

        <div class="row">
            <div class="container">
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
    </div>
</div>
<!-- end latest news -->