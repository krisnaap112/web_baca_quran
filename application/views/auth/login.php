  <body style="background-color: #000b29;">
    
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
                      <i class="fas fa-user fa-5x text-center mt-2 mb-3"></i>
                    </div>
                    <h1 class="h4 text-gray-900 mb-4">Login Member | <b>Quran Ku</b></h1>
                  </div>
                  <?= $this->session->flashdata('message'); ?>
                  <!-- form login -->
                  <form class="user" method="post" action="<?= base_url('auth'); ?>">
                    <div class="form-group">
                      <label for="email" id="email">Email</label>
                      <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-at"></i></span>
                        </div>
                      <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email Address..." value="<?= set_value('email'); ?>" autocomplete="off">
                    </div>
                  <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                    <div class="form-group">
                      <label for="password" id="password">Password</label>
                      <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                      <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off">
                      </div>
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                    <button type="submit" class="btn btn-primary btn-block">
                      Login
                    </button>
                  </form>
                  <!--<div class="my-2">
                    <a href="<?= base_url('auth/forgotpassword'); ?>" type="submit" class="btn btn-danger btn-user btn-block">Forgot Password</a>
                  </div> -->
                  <div class="text-center">
                    <p>Don't Have Account? Register Now..!</p>
                  </div>
                  <div>
                    <a href="<?= base_url('auth/registration'); ?>" type="submit" class="btn btn-warning btn-user btn-block">Register</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

 