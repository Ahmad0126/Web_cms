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
                            <span class="date"><i class="fas fa-calendar"></i> <?= $konten->tanggal ?></span>
                        </p>
                        <h2><?= $konten->judul ?></h2>
                        <p><?= nl2br($konten->keterangan) ?></p>
                    </div>
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
    </div>
</div>
<!-- end single article section -->