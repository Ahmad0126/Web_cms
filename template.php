<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="utf-8">
    <title><?= $title; ?></title>

    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    <meta name="description" content="This is meta description">
    <meta name="author" content="Themefisher">

    <!-- theme meta -->
    <meta name="theme-name" content="logbook" />

    <!-- plugins -->
    <link rel="preload" href="https://fonts.gstatic.com/s/opensans/v18/mem8YaGs126MiZpBA-UFWJ0bbck.woff2" style="font-display: optional;">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets/logbook/'); ?>plugins/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:600%7cOpen&#43;Sans&amp;display=swap" media="screen">

    <link rel="stylesheet" href="<?= base_url('assets/logbook/'); ?>plugins/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url('assets/logbook/'); ?>plugins/slick/slick.css">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="<?= base_url('assets/carousel-01/'); ?>css/style.css">
    <link rel="stylesheet" href="<?= base_url('assets/logbook/'); ?>css/style.css">

    <style>
        .indent {
            text-indent: 30px;
        }
    </style>

    <!--Favicon-->
    <link rel="shortcut icon" href="<?= base_url('assets/'); ?>image/sb.png" type="image/x-icon">
    <link rel="icon" href="<?= base_url('assets/'); ?>image/sb.png" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- PopUp Img -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/carousel-01/'); ?>css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/carousel-01/'); ?>css/owl.theme.default.min.css">

</head>

<body>
    <!-- navigation -->
    <header class="sticky-top bg-white border-bottom border-default">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-white">
                <a class="navbar-brand" href="<?= base_url('home') ?>">
                    <!-- <img class="img-fluid" width="150px" src="<?= base_url('assets/logbook/'); ?>images/logo.png" alt="LogBook"> -->
                    <h4><?= $konfig->judul_website; ?></h4>
                </a>
                <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navigation">
                    <i class="ti-menu"></i>
                </button>

                <div class="collapse navbar-collapse text-center" id="navigation">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url() ?>">Homepage</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('about'); ?>">About</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Content <i class="ti-angle-down ml-1"></i>
                            </a>
                            <div class="dropdown-menu">
                                <?php foreach ($kategori as $kate) { ?>
                                    <a class="dropdown-item" href="<?= base_url('home/kategori/' . $kate['id_kategori']); ?>"><?= $kate['nama_kategori']; ?></a>
                                <?php } ?>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('galeri'); ?>">Galeri</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('saran'); ?>">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-danger" href="<?= base_url('admin/auth'); ?>">Login</a>
                        </li>
                    </ul>



                    <!-- search -->
                    <!-- <div class="search px-4">
                        <button id="searchOpen" class="search-btn"><i class="ti-search"></i></button>
                        <div class="search-wrapper">
                            <form action="javascript:void(0)" class="h-100">
                                <input class="search-box pl-4" id="search-query" name="s" type="search" placeholder="Type &amp; Hit Enter...">
                            </form>
                            <button id="searchClose" class="search-close"><i class="ti-close text-dark"></i></button>
                        </div>
                    </div> -->

                </div>
            </nav>
        </div>
    </header>
    <!-- /navigation -->

    <?= $contents; ?>

    <footer class="section-sm pb-0 border-top border-default">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-4 mb-4">
                    <a class="mb-4 d-block" href="<?= base_url() ?>">
                        <!-- <img class="img-fluid" width="150px" src="<?= base_url('assets/logbook/'); ?>images/logo.png" alt="LogBook"> -->
                        <h3 class="mt-3"><?= $konfig->judul_website; ?></h3>
                    </a>
                    <strong><?= $konfig->profil_website; ?></strong>
                    <p><?= $konfig->alamat; ?></p>
                    <ul class="list-inline social-icons ml-auto mr-3 d-none d-sm-block">
                        <li class="list-inline-item"><a href="mailto:<?= $konfig->email; ?>"><i class="fa-regular fa-envelope"></i> <?= $konfig->email; ?></a></li>
                    </ul>
                    <ul class="list-inline social-icons ml-auto mr-3 d-none d-sm-block">
                        <li class="list-inline-item"><a href="<?= $konfig->no_wa; ?>" target="_blank"><i class="fa-brands fa-whatsapp fa-lg"></i></a>
                        </li>
                        <li class="list-inline-item"><a href="<?= $konfig->instagram; ?>" target="_blank"><i class="fa-brands fa-instagram fa-lg"></i></a>
                        </li>
                        <li class="list-inline-item"><a href="<?= $konfig->github; ?>" target="_blank"><i class="fa-brands fa-github fa-lg"></i></a>
                        </li>
                                          <li class="list-inline-item"><a href="<?= $konfig->twitter; ?>" target="_blank"><i class="fa-brands fa-twitter fa-lg"></i></a>
                  </li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-3 mb-4">
                    <h4 class="mb-4">Quick Links</h4>
                    <ul class="list-unstyled footer-list">
                        <li><a href="<?= base_url('home') ?>">Homepage</a></li>
                        <li><a href="<?= base_url('about'); ?>">About</a></li>
                        <?php foreach ($kategori as $kate) { ?>
                            <li><a href="<?= base_url('home/kategori/' . $kate['id_kategori']); ?>"><?= $kate['nama_kategori']; ?></a></li>
                        <?php } ?>
                        <li><a href="<?= base_url('saran'); ?>">Contact</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-3 mb-4">
                    <h4 class="mb-4">Recent Post</h4>
                    <ul class="list-unstyled footer-list">
                        <?php foreach ($konten2 as $ten) : ?>
                            <li>
                                <a href="<?= base_url('home/artikel/' . $ten['slug']); ?>">
                                    <i class="fa fa-greater-than mr-1"></i>
                                    <em>
                                        <?= $ten['judul']; ?>
                                    </em>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>


            </div>
            <div class="scroll-top">
                <a href="javascript:void(0);" id="scrollTop"><i class="ti-angle-up"></i></a>
            </div>
            <div class="text-center">
                <p class="content">&copy; <?= date('Y'); ?> - Design &amp; Develop By <a href="<?= $konfig->instagram; ?>" target="_blank">Bgsmhrdka_</a></p>
            </div>
        </div>
    </footer>



    <script src="<?= base_url('assets/carousel-01/'); ?>js/popper.js"></script>
    <script src="<?= base_url('assets/carousel-01/'); ?>js/owl.carousel.min.js"></script>
    <script src="<?= base_url('assets/carousel-01/'); ?>js/main.js"></script>
    <!-- JS Plugins -->
    <script src="<?= base_url('assets/logbook/'); ?>plugins/jQuery/jquery.min.js"></script>
    <script src="<?= base_url('assets/logbook/'); ?>plugins/bootstrap/bootstrap.min.js" async></script>
    <script src="<?= base_url('assets/logbook/'); ?>plugins/slick/slick.min.js"></script>

    <script src="<?= base_url('assets/sweetalert/'); ?>sweetalert2.all.min.js"></script>

    <!-- Main Script -->
    <script src="<?= base_url('assets/logbook/'); ?>js/script.js"></script>
    <script>
        const flashData = $("#flash-data").data("flashdata");

        if (flashData) {
            swal.fire({
                icon: "success",
                text: flashData,
                type: "success",
            });
        }
    </script>
</body>

</html>