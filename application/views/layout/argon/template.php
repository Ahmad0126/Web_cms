<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
		<div class="container-fluid pt-4 pt-md-7">
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
