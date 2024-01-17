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
                      <i class="fas fa-user-edit fa-3x text-center mt-2 mb-3"></i>
                    </div>
                    <h1 class="h4 text-gray-900 mb-4">Registration To <b>Quran Ku</b></b></h1>
                  </div>
                  <!-- form registration -->
                  <form class="user" method="post" action="<?= base_url('auth/registration'); ?>">
                    <div class="form-group">
                      <label for="email" id="email">Username</label>
                      <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                        </div>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Full Name..." value="<?= set_value('name'); ?>" autocomplete="off">
                        </div>
                      <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                      <label for="email" id="email">Email</label>
                      <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-at"></i></span>
                        </div>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email Address" value="<?= set_value('email'); ?>" autocomplete="off">
                        </div>
                      <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                      <label for="country" id="country">Pilih Negara</label>
                      <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-flag"></i></span>
                        </div>
                        <select name="country" id="country" class="form-control">
                          <option value="">Select Country</option>
                          <?php foreach ($negara as $n) : ?>
                          <option value="<?= $n['country']; ?>"><?= $n['country']; ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="country" id="country">Daftar Sebagai..???</label>
                      <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <select name="role_id" id="role_id" class="form-control">
                          <option>Member</option>
                          <option>Ustadz</option>
                        </select>
                      </div>
                      <?= form_error('role_id', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="email" id="email">Password</label>
                        <div class="input-group flex-nowrap">
                          <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-key"></i></span>
                          </div>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            </div>
                          <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                      <div class="col-sm-6">
                        <label for="email" id="email">Repeat Password</label>
                        <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-redo-alt"></i></span>
                        </div>
                        <input type="password" class="form-control" id="password1" name="password1" placeholder="Repeat Password">
                      </div>
                    </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">
                      Register Account
                    </button>
                  </form>
                  <div class="text-center my-2">
                    <p>Have Account? Login Nowk</p>
                  </div>
                  <div class="my-2">
                    <a href="<?= base_url('auth'); ?>" type="submit" class="btn btn-success btn-user btn-block">Login</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

