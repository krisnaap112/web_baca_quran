<body style="background-color: #000b29;">
<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-lg-7">
        <div class="card o-hidden border-0 shadow-lg my-5" style="background-color: #FFF6D4;">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <div class="col-auto">
                      <i class="fas fa-user-edit fa-3x text-center mt-2 mb-3"></i>
                    </div>
                    <h1 class="h4 text-gray-900 mb-4">Registration Ustadz  To <b>Quran Ku</b></b></h1>
                  </div>
                  <!-- form registration -->
                  <form class="user" method="post" action="<?= base_url('auth/registration_ustadz'); ?>">
                    <div class="form-group">
                      <input type="hidden" class="form-control" name="id_ustadz" value="<?= $kode; ?>" readonly>
                      <label for="name" id="email">Nama</label>
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
                      <label for="no_telp" id="no_telp">No. Telp</label>
                      <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        </div>
                      <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Input Your Phone Number" value="<?= set_value('no_telp'); ?>" autocomplete="off">
                      </div>
                    <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                    <div class="form-group">
                      <label for="tempat_lahir" id="tempat_lahir">Tempat Lahir</label>
                      <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-home"></i></span>
                        </div>
                      <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Input Your Birth Place" value="<?= set_value('tempat_lahir'); ?>" autocomplete="off">
                        </div>
                      <?= form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                      <label for="tanggal_lahir" id="tanggal_lahir">Tanggal Lahir</label>
                      <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                        </div>
                      <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Input Your Birhtday" value="<?= set_value('tanggal_lahir'); ?>" autocomplete="off">
                      <?= form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="keahlian" id="keahlian">Bidang Keahlian</label>
                      <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-pen"></i></span>
                        </div>
                      <input type="text" class="form-control" id="keahlian" name="keahlian" placeholder="Input Your Skill" value="<?= set_value('keahlian'); ?>" autocomplete="off">
                      </div>
                      <?= form_error('keahlian', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                      <label for="negara" id="negara">Pilih Negara</label>
                      <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-flag"></i></span>
                        </div>
                      <select name="negara" id="negara" class="form-control">
                        <option value="">Select Country</option>
                        <?php foreach ($negara as $n) : ?>
                        <option value="<?= $n['country']; ?>"><?= $n['country']; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                    <div class="form-group">
                      <label for="alamat" id="alamat">Alamat</label>
                      <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                        </div>
                      <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="Input Your Address" value="<?= set_value('alamat'); ?>" autocomplete="off"></textarea>
                      </div>
                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                    <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="password" id="password">Password</label>
                        <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                      <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                      <div class="col-sm-6">
                        <label for="password1" id="password1">Repeat Password</label>
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
                    <p>Login</p>
                  </div>
                  <div class="my-2">
                    <a href="<?= base_url('auth/index1'); ?>" type="submit" class="btn btn-success btn-user btn-block">Login Ustadz</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

