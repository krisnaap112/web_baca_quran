<div class="container-fluid">
<!-- Page Heading -->
  <div class="alert alert-primary h4 text-center" role="alert">
    <i class="fas fa-plus"></i> <?= $title; ?>
  </div>

  <?= $this->session->flashdata('message'); ?>

            <div class="col-md mb-4">
              <div class="card shadow-sm">
                <div class="card-body alert-warning">
                  <h2 class="card-title text-center">Ubah Profil</h2>
                  <hr>
                  <?= $this->session->flashdata('message'); ?>
                  <form action="<?= base_url('ustadz/edit'); ?>" method="post">
                  <div class="form-group">
                    <label for="name">Nama</label>
                      <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                      <input type="text" name="name" id="name" class="form-control" value="<?= $ustadz['name']; ?>">
                      <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="email">Email</label>
                      <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-at"></i></span>
                        </div>
                      <input type="text" name="email" id="email" class="form-control" value="<?= $ustadz['email']; ?>" readonly>
                      <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="no_telp">No. Telp</label>
                      <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        </div>
                      <input type="text" name="no_telp" id="no_telp" class="form-control" value="<?= $ustadz['no_telp']; ?>">
                      <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="tempat_lahir">Tempat Lahir</label>
                      <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-home"></i></span>
                        </div>
                      <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="<?= $ustadz['tempat_lahir']; ?>">
                      <?= form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                      <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                        </div>
                      <input type="text" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="<?= $ustadz['tanggal_lahir']; ?>">
                      <?= form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="keahlian">Keahlian</label>
                      <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-pen"></i></span>
                        </div>
                      <input type="text" name="keahlian" id="keahlian" class="form-control" value="<?= $ustadz['keahlian']; ?>">
                      <?= form_error('keahlian', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="negara">Negara</label>
                      <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-flag"></i></span>
                        </div>
                      <input type="text" name="negara" id="negara" class="form-control" value="<?= $ustadz['negara']; ?>">
                      <?= form_error('negara', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="alamat">Alamat</label>
                      <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                        </div>
                      <input type="text" name="alamat" id="alamat" class="form-control" value="<?= $ustadz['alamat']; ?>">
                      <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    </div>
                    <div class="form-group">
                      <label for="foto">Picture</label>
                            <div class="custom-file">
                              <input type="file" name="foto" class="custom-file-input" id="foto">
                              <label class="custom-file-label" for="foto">Choose File</label>
                            </div>  
                        </div>
                        <img src="<?= base_url('assets/img/profile/') . $ustadz['foto']; ?>" class="img-thumbnail col-sm-3">
                      <div class="form-group mt-3">
                          <button type="submit" class="btn btn-info">Edit</button>
                      </div>
                    </div>
                  </form>
                </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
