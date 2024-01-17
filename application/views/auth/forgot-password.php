  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-lg-7">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                  <div class="col-auto">
                      <i class="fas fa-key fa-3x text-center mt-2 mb-3"></i>
                    </div>
                    <h1 class="h4 text-gray-900 mb-4">Forgot Password?</h1>
                  </div>
                  <?= $this->session->flashdata('message'); ?>
                  <!-- form login -->
                  <form class="user" method="post" action="<?= base_url('auth/forgotPassword'); ?>">
                    <div class="form-group">
                      <label for="email" id="email">Email</label>
                      <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-at"></i></span>
                        </div>
                      <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email Address..." value="<?= set_value('email'); ?>" autocomplete="off">
                      <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>
                    <button type="submit" class="btn btn-primary btn-block">
                      Reset Password
                    </button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="<?= base_url('auth/index'); ?>">Back To Login</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

 