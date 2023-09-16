<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?= $title ?></title>
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
