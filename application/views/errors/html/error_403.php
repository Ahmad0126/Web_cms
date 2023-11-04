<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title><?= $konfig['judul_website'] ?> | 403!</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="<?= base_url('assets/fruitkha/') ?>assets/img/favicon.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="<?= base_url('assets/fruitkha/') ?>assets/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="<?= base_url('assets/fruitkha/') ?>assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="<?= base_url('assets/fruitkha/') ?>assets/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="<?= base_url('assets/fruitkha/') ?>assets/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="<?= base_url('assets/fruitkha/') ?>assets/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="<?= base_url('assets/fruitkha/') ?>assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="<?= base_url('assets/fruitkha/') ?>assets/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="<?= base_url('assets/fruitkha/') ?>assets/css/responsive.css">

</head>
<body>
	
	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->

		<!-- error section -->
		<div class="full-height-section error-section">
			<div class="full-height-tablecell">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 offset-lg-2 text-center">
							<div class="error-text">
								<i class="far fa-sad-cry"></i>
								<h1>Oops! 403 - Forbidden</h1>
								<p>You don't have permission to access this page</p>
								<a href="<?= base_url() ?>" class="boxed-btn">Back to Home</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end error section -->
	
	<!-- copyright -->
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<p>Copyrights &copy; 2023 - <a href="https://ahmad0126.github.io/">Ahmad Zaid</a>,  All Rights Reserved.</p>
				</div>
				<div class="col-lg-6 text-right col-md-12">
                    <div class="social-icons">
                        <ul>
                            <li><a href="<?= $konfig['github'] ?>" target="_blank"><i class="fab fa-github"></i></a></li>
                            <li><a href="<?= $konfig['facebook'] ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="<?= $konfig['instagram'] ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
			</div>
		</div>
	</div>
	<!-- end copyright -->
	
	<!-- jquery -->
	<script src="<?= base_url('assets/fruitkha/') ?>assets/js/jquery-1.11.3.min.js"></script>
	<!-- bootstrap -->
	<script src="<?= base_url('assets/fruitkha/') ?>assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- count down -->
	<script src="<?= base_url('assets/fruitkha/') ?>assets/js/jquery.countdown.js"></script>
	<!-- isotope -->
	<script src="<?= base_url('assets/fruitkha/') ?>assets/js/jquery.isotope-3.0.6.min.js"></script>
	<!-- waypoints -->
	<script src="<?= base_url('assets/fruitkha/') ?>assets/js/waypoints.js"></script>
	<!-- owl carousel -->
	<script src="<?= base_url('assets/fruitkha/') ?>assets/js/owl.carousel.min.js"></script>
	<!-- magnific popup -->
	<script src="<?= base_url('assets/fruitkha/') ?>assets/js/jquery.magnific-popup.min.js"></script>
	<!-- mean menu -->
	<script src="<?= base_url('assets/fruitkha/') ?>assets/js/jquery.meanmenu.min.js"></script>
	<!-- sticker js -->
	<script src="<?= base_url('assets/fruitkha/') ?>assets/js/sticker.js"></script>
	<!-- main js -->
	<script src="<?= base_url('assets/fruitkha/') ?>assets/js/main.js"></script>
	
	</body>
</html>