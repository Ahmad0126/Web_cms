<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Get the best Support</p>
                    <h1>Contact us</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- contact form -->
<div class="contact-from-section mt-5 mb-150">
    <div class="container">
        <div class="row mb-5">
            <div class="col">
                <h2 class="text-center">About Us</h2>
                <p class="text-center"><?= nl2br($konfig['profil_website']) ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="form-title">
                    <h2>Punya pertanyaan, saran, atau masukan?</h2>
                    <p>Tanya apapun tentang website kami. Masukan dari Anda sangat berharga bagi kami untuk mengembangkan website ini</p>
                </div>
                <div id="form_status"></div>
                <div class="contact-form">
                    <form action="<?= base_url('home/kirim') ?>" method="post">
                        <p>
                            <input type="text" placeholder="Nama" name="nama" id="name">
                            <input type="email" placeholder="Email" name="email" id="email">
                        </p>
                        <p><textarea name="pesan" id="message" cols="30" rows="10" placeholder="Masukkan saran"></textarea></p>
                        <p><input type="submit" value="Kirim"></p>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="contact-form-wrap">
                    <div class="contact-form-box">
                        <h4><i class="fas fa-map"></i> Alamat</h4>
                        <p><?= $konfig['alamat'] ?></p>
                    </div>
                    <div class="contact-form-box">
                        <h4><i class="fas fa-address-book"></i> Contact</h4>
                        <p>Phone: +62 <?= substr($konfig['no_wa'], 1) ?> <br> Email: <?= $konfig['email'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end contact form -->
<div class="modal fade" id="alertmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<?= $this->session->flashdata('alert'); ?>
	</div>
</div>