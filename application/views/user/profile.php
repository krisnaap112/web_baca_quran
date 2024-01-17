

            <!-- Main Content -->
              <div class="main-content">
                <section class="section">
                  <div class="section-header">
                    <i class="fas fa-address-card"></i><h1 class="ml-3"><?= $title; ?></h1>
                  </div>
                  <div class="section-body">
                    <a href="<?= base_url('ustadz/pesan'); ?>" class="btn btn-danger mb-3" data-toggle="modal" data-target="#TambahPesan"><i class="fas fa-envelope"></i> Beri Masukan</a>
                    <h2 class="section-title"><?= $user['name_user']; ?></h2>
                    <p class="section-lead">
                      This is information about you.
                    </p>

                    <?= $this->session->flashdata('message'); ?>
                    <?= $this->session->flashdata('pesan'); ?>

                    <div class="row mt-sm-4">
                      <div class="col-12 col-md-12 col-lg-12">
                        <div class="card profile-widget">
                          <div class="profile-widget-header">                     
                            <img alt="image" src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="rounded-circle profile-widget-picture">
                            <div class="profile-widget-items">
                              <div class="profile-widget-item">
                                <div class="profile-widget-item-label"><i class="fas fa-flag"></i></div>
                                <div class="profile-widget-item-label">Negara</div>
                                <div class="profile-widget-item-value"><?= $user['country']; ?></div>
                              </div>
                              <div class="profile-widget-item">
                                <div class="profile-widget-item-label"><i class="fas fa-calendar-alt"></i></div>
                                <div class="profile-widget-item-label">Join</div>
                                <div class="profile-widget-item-value"><?= date('d F Y', $user['date_created']); ?></div>
                              </div>
                              <div class="profile-widget-item">
                                <div class="profile-widget-item-label"><i class="fas fa-pen"></i></div>
                                <div class="profile-widget-item-label">Status</div>
                                <div class="profile-widget-item-value"><?php 
                                $user['is_active'];
                                if($user['is_active'] > 0){
                                  echo "Aktif";
                                } else {
                                  echo "Tidak Aktif";
                                }
                                 ?></div>
                              </div>
                            </div>
                          </div>
                          <div class="profile-widget-description">
                            <div class="profile-widget-name"><?= $user['name_user']; ?> <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> <?php 
                            $user['role_id']; 
                            if( $user['role_id'] == 1){
                              echo "Administrator";
                            } else {
                              echo "Member";
                            }
                            ?></div></div>
                            <div class="profile-widget-name">Email : <?= $user['email']; ?></div>
                            <?= $user['name_user']; ?> is a superhero name in <b>Indonesia</b>, especially in my family. He is not a fictional character but an original hero in my family, a hero for his children and for his wife. So, I use the name as a user in this template. Not a tribute, I'm just bored with <b>'John Doe'</b>.
                          </div>
                          <div class="card-footer text-center">
                            <div class="font-weight-bold mb-2">Follow <?= $user['name_user']; ?> On :</div>
                            <a href="https://facebook.com/<?= $user['facebook']; ?>" class="btn btn-social-icon btn-facebook mr-1 bg-primary">
                              <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://twitter.com/<?= $user['twitter']; ?>" class="btn btn-social-icon btn-twitter mr-1 bg-info">
                              <i class="fab fa-twitter"></i>
                            </a>
                            <a href="https://github.com/<?= $user['github']; ?>" class="btn btn-social-icon btn-github mr-1 bg-danger">
                              <i class="fab fa-github"></i>
                            </a>
                            <a href="https://www.instagram.com/<?= $user['instagram']; ?>" class="btn btn-social-icon btn-instagram bg-warning">
                              <i class="fab fa-instagram"></i>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
      <!-- End of Main Content -->

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