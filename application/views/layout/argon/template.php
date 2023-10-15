<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="imagetoolbar" content="no" />
	<title><?= $title ?></title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>fancybox/jquery.fancybox-1.3.4.css" media="screen" />

	<style>
		.mdi-3x {
			font-size: 50px;
		}

	</style>
	<?php require_once('_css.php') ?>
</head>

<body class="">
	<?php require_once('_sidebar.php') ?>
	<div class="main-content">
		<!-- Navbar -->
		<?php require_once('_navbar.php') ?>
		<!-- End Navbar -->
		<div class="container-fluid pb-8 pt-4 pt-md-7">
			<div class="row">
				<?= $contents ?>
			</div>
			<!-- Footer -->
			<?php require_once('_footer.php') ?>
		</div>
	</div>
	<?php require_once('_js.php') ?>
</body>

</html>
