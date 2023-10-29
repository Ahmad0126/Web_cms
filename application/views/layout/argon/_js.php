<!--   Core   -->
<script src="<?= base_url('assets/argon/') ?>assets/js/plugins/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url('assets/argon/') ?>assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- Optional JS -->

<!--   Argon JS   -->
<script src="<?= base_url('assets/argon/') ?>assets/js/argon-dashboard.min.js?v=1.1.2"></script>
<script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
<script>
    window.TrackJS && TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
    });
    $('.notifikasi').delay('slow').slideDown('slow').delay(4000).slideUp(600);
    $('#fotomodal').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget);
		var foto = button.data('foto');
		var judul = button.data('judul');
		var modal = $(this);
		modal.find('.modal-body img').attr('src', foto);
		modal.find('.modal-title').text(judul);
	});
    $('#saranmodal').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget);
		var pesan = button.data('pesan');
		var nama = button.data('nama');
		var modal = $(this);
		modal.find('.modal-body p').text(pesan);
		modal.find('.modal-title').text("Pesan dari "+nama);
	});
    $('#editkate').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget);
		var urlaction = button.data('urlaction');
		var valuenama = button.data('valuenama');
		var modal = $(this);
		modal.find('#form').attr('action', urlaction);
		modal.find('#nama').val(valuenama);
	});
</script>
