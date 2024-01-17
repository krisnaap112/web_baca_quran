
  <!-- Main Content -->
              <div class="main-content">
                <section class="section">
                  <div class="section-header">
                    <i class="fas fa-address-card"></i><h1 class="ml-3"><?= $title; ?></h1>
                  </div>
                  <div class="section-body">
                    <?php if (empty($ustadz)): ?>
                      <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#profilModal"><i class="fas fa-address-card"></i> Lengkapi Profilmu</a>
                      <a href="" class="btn btn-warning mb-3" data-toggle="modal" data-target="#EditModal"><i class="fas fa-edit"></i> Edit Profil</a>
                      <a href="<?= base_url('ustadz/pesan'); ?>" class="btn btn-danger mb-3" data-toggle="modal" data-target="#TambahPesan"><i class="fas fa-envelope"></i> Beri Masukan</a>
                    <?php else: ?>
                      <a href="" class="btn btn-warning mb-3" data-toggle="modal" data-target="#EditModal"><i class="fas fa-edit"></i> Edit Profile</a>
                      <a href="<?= base_url('ustadz/pesan'); ?>" class="btn btn-danger mb-3" data-toggle="modal" data-target="#TambahPesan"><i class="fas fa-envelope"></i> Beri Masukan</a>
                    <?php endif ?>
                    <h2 class="section-title"><?= $ustadz['name']; ?></h2>
                    <p class="section-lead">
                      This is information about you.
                    </p>
                    <?= $this->session->flashdata('message'); ?>
                    <div class="row mt-sm-4">
                      <div class="col-12 col-md-12 col-lg-12">
                        <div class="card profile-widget">
                          <div class="profile-widget-header"> 
                          <?php if(empty($ustadz['foto'])) : ?>                   
                            <img alt="image" src="<?= base_url('assets/img/profile/') . $user['image']; ?>
                            " class="profile-widget-picture my-4">
                          <?php else: ?>
                            <img alt="image" src="<?= base_url('assets/img/profile/') . $ustadz['foto']; ?>
                            " class="profile-widget-picture my-4">
                          <?php endif; ?>
                            <div class="profile-widget-items">
                              <div class="profile-widget-item">
                                <div class="profile-widget-item-label"><i class="fas fa-flag"></i></div>
                                <div class="profile-widget-item-label">Negara</div>
                                <div class="profile-widget-item-value"><?= $ustadz['negara']; ?></div>
                              </div>
                              <div class="profile-widget-item">
                                <div class="profile-widget-item-label"><i class="fas fa-calendar-alt"></i></div>
                                <div class="profile-widget-item-label">Join</div>
                                <div class="profile-widget-item-value"><?= date('d F Y', $ustadz['date_created']); ?></div>
                              </div>
                              <div class="profile-widget-item">
                                <div class="profile-widget-item-label"><i class="fas fa-pen"></i></div>
                                <div class="profile-widget-item-label">Status</div>
                                <div class="profile-widget-item-value"><?php
                                if($ustadz['is_active'] > 0){
                                  echo "Aktif";
                                } else {
                                  echo "Tidak Aktif";
                                }
                                 ?></div>
                              </div>
                            </div>
                            <div class="profile-widget-items">
                              <div class="profile-widget-item">
                                <div class="profile-widget-item-label"><i class="fas fa-phone"></i></div>
                                <div class="profile-widget-item-label">No. Telpon</div>
                                <div class="profile-widget-item-value"><?= $ustadz['no_telp']; ?></div>
                              </div>
                              <div class="profile-widget-item">
                                <div class="profile-widget-item-label"><i class="fas fa-address-card"></i></div>
                                <div class="profile-widget-item-label">Tempat Tanggal Lahir</div>
                                <div class="profile-widget-item-value"><?= $ustadz['tempat_lahir']. ', '. date('d M Y', strtotime($ustadz['tanggal_lahir'])); ?></div>
                              </div>
                              <div class="profile-widget-item">
                                <div class="profile-widget-item-label"><i class="fas fa-edit"></i></div>
                                <div class="profile-widget-item-label">Bidang Keahlian</div>
                                <div class="profile-widget-item-value"><?= $ustadz['keahlian']; ?></div>
                              </div>
                            </div>
                          </div>
                          <div class="profile-widget-description">
                            <div class="profile-widget-name"><?= $ustadz['name']; ?> <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> Ustadz </div></div>
                            <?= $ustadz['name']; ?> is a superhero name in <b>Indonesia</b>, especially in my family. He is not a fictional character but an original hero in my family, a hero for his children and for his wife. So, I use the name as a user in this template. Not a tribute, I'm just bored with <b>'John Doe'</b>.
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>
                <!-- End of Main Content -->


<!-- Modal Edit Profile -->
<div class="modal fade" id="profilModal" tabindex="-1" role="dialog" aria-labelledby="profilModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="profilModalLabel">Lengkapi Profilmu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open_multipart('ustadz'); ?>
      <div class="modal-body">
        <input type="hidden" name="is_active" value="<?= $user['is_active']; ?>">
        <input type="hidden" name="password"  value="<?= $user['password']; ?>">
        <input type="hidden" name="date_created" value="<?= $user['date_created']; ?>">
          <div class="form-group">
            <label for="name">Nama Ustadz</label>
            <input type="text" name="name" id="name" class="form-control" autocomplete="off" value="<?= $user['name_user']; ?>">
            <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control" autocomplete="off" value="<?= $user['email']; ?>" readonly>
            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="no_telp">No. Telpon</label>
            <input type="text" name="no_telp" id="no_telp" class="form-control" autocomplete="off">
            <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="tempat_lahir">Tempat Lahir</label>
            <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" autocomplete="off">
            <?= form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" autocomplete="off">
            <?= form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="keahlian">Keahlian</label>
            <input type="text" name="keahlian" id="keahlian" class="form-control" autocomplete="off">
            <?= form_error('keahlian', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="negara">Negara</label>
            <input type="text" name="negara" id="negara" class="form-control" autocomplete="off" value="<?= $user['country']; ?>" readonly>
            <?= form_error('negara', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control" autocomplete="off">
            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="gambar">Upload Gambar</label>
              <div class="custom-file">
                  <input type="file" name="foto" class="custom-file-input" id="foto">
                <label class="custom-file-label" for="foto">Choose File</label>
              </div> 
              <?= form_error('foto', '<small class="text-danger pl-3">', '</small>'); ?> 
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
      <?= form_close(); ?>
    </div>
  </div>
</div>





<!-- Modal Edit Profile -->
<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="EditModalLabel">Edit Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open_multipart('ustadz/editProfile'); ?>
      <div class="modal-body">
        <input type="hidden" name="id_ustadz">
          <div class="form-group">
            <label for="name">Nama Ustadz</label>
            <input type="text" name="name" id="name" class="form-control" autocomplete="off" value="<?= $ustadz['name']; ?>">
            <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control" autocomplete="off" value="<?= $ustadz['email']; ?>" readonly>
            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="no_telp">No. Telpon</label>
            <input type="text" name="no_telp" id="no_telp" class="form-control" autocomplete="off" value="<?= $ustadz['no_telp']; ?>">
            <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="tempat_lahir">Tempat Lahir</label>
            <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" autocomplete="off" value="<?= $ustadz['tempat_lahir']; ?>">
            <?= form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" autocomplete="off" value="<?= $ustadz['tanggal_lahir']; ?>">
            <?= form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="keahlian">Keahlian</label>
            <input type="text" name="keahlian" id="keahlian" class="form-control" autocomplete="off" value="<?= $ustadz['keahlian']; ?>">
            <?= form_error('keahlian', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="negara">Negara</label>
            <input type="text" name="negara" id="negara" class="form-control" autocomplete="off" value="<?= $ustadz['negara']; ?>">
            <?= form_error('negara', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control" autocomplete="off" value="<?= $ustadz['alamat']; ?>">
            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="gambar">Upload Gambar</label>
              <div class="custom-file">
                  <input type="file" name="foto" class="custom-file-input" id="foto" value="<?= $ustadz['foto']; ?>">
                <label class="custom-file-label" for="foto">Choose File</label>
              </div>  
          </div>
          <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
              <label class="form-check-label" for="is_active">Active?</label>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
      <?= form_close(); ?>
    </div>
  </div>
</div>






<!-- Modal Tambah Pesan -->
<div class="modal fade" id="TambahPesan" tabindex="-1" role="dialog" aria-labelledby="TambahPesanLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="TambahPesanLabel">Punya Ide Menarik Yang Bisa Di Kembangkan? Yuk Sampaikan Idemu Kepada Kami...</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="materi_islam/pesan" method="post">
      <div class="modal-body">
          <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="name" id="name" class="form-control" autocomplete="off" value="<?php if($ustadz) 
            {
              echo $ustadz['name'];
            } else {
              echo $user['name_user'];
            }
            ?>">
            <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control" autocomplete="off" value="<?php if($ustadz) 
            {
              echo $ustadz['email'];
            } else {
              echo $user['email'];
            }
            ?>" readonly>
            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" name="subject" id="subject" class="form-control" autocomplete="off">
            <?= form_error('subject', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="message">Pesanmu</label>
            <textarea type="text" name="message" id="message" class="form-control" autocomplete="off"></textarea>
            <?= form_error('message', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
      <?= form_close(); ?>
    </div>
  </div>
</div>

