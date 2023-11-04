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
<script>
    <?php if($this->session->flashdata('alert') != null){ ?>
    $('#alertmodal').modal("show");
	<?php } ?>
</script>