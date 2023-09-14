<!-- Header -->
<div class="header bg-gradient-primary py-5">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
              <h1 class="text-white">Welcome!</h1>
              <p class="text-lead text-light">Silahkan login ke halaman admin dan kontributor</p>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary shadow border-0">
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small>Login dengan akun anda</small>
              </div>
              <form action="<?= base_url('auth/log_in') ?>" method="post" role="form">
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input type="text" name="username" class="form-control <?= $this->session->flashdata('username') != null?'is-invalid':'' ?>" value="<?= $this->session->flashdata('username_val') != null? $this->session->flashdata('username_val') : '' ?>" id="exampleInputEmail1" placeholder="Username">
					<div class="invalid-feedback"><?= $this->session->flashdata('username') ?></div>
				</div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input name="password" class="form-control <?= $this->session->flashdata('password') != null?'is-invalid':'' ?>" placeholder="Password" type="password">
                    <div class="invalid-feedback"><?= $this->session->flashdata('password') ?></div>
				</div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4">Log in</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>