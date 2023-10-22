<!--   Core   -->
<script src="<?= base_url('assets/argon/') ?>assets/js/plugins/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url('assets/argon/') ?>assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- Optional JS -->

<script type="text/javascript" src="<?= base_url('assets/') ?>fancybox/jquery.1.4.min.js"></script>
<script>
    !window.jQuery && document.write('<script src="jquery-1.4.3.min.js"><\/script>');
</script>
<script type="text/javascript" src="<?= base_url('assets/') ?>fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="<?= base_url('assets/') ?>fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script>
	$(document).ready(function(){
		$("a#c2").fancybox({
			'overlayShow'	: false,
			'transitionIn'	: 'elastic',
			'transitionOut'	: 'elastic'
		});
	});
</script>
<!--   Argon JS   -->
<script src="<?= base_url('assets/argon/') ?>assets/js/argon-dashboard.min.js?v=1.1.2"></script>
<script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
<script>
    window.TrackJS &&
        TrackJS.install({
            token: "ee6fab19c5a04ac1a32a645abde4613a",
            application: "argon-dashboard-free"
        });
    $('.notifikasi').delay('slow').slideDown('slow').delay(4000).slideUp(600);
</script>
