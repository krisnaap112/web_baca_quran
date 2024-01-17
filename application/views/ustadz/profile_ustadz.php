
 <!-- Main Content -->
              <div class="main-content">
                <section class="section">
                  <div class="section-header">
                    <i class="fas fa-address-card"></i><h1 class="ml-3"><?= $title; ?></h1>
                  </div>
                  <div class="section-body">
                    <?php foreach ($detail as $dt) : ?>
                    <h2 class="section-title"><?= $dt->name; ?></h2>
                    <p class="section-lead">
                      This is information about <?= $dt->name; ?>.
                    </p>
                    <?= $this->session->flashdata('message'); ?>
                    <?= $this->session->flashdata('pesan'); ?>
                    <div class="row mt-sm-4">
                      <div class="col-12 col-md-12 col-lg-12">
                        <div class="card profile-widget">
                          <div class="profile-widget-header">                     
                            <img alt="image" src="<?= base_url('assets/img/profile/') . $dt->foto; ?>" class="profile-widget-picture my-4">
                            <div class="profile-widget-items">
                              <div class="profile-widget-item">
                                <div class="profile-widget-item-label"><i class="fas fa-flag"></i></div>
                                <div class="profile-widget-item-label">Negara</div>
                                <div class="profile-widget-item-value"><?= $dt->negara; ?></div>
                              </div>
                              <div class="profile-widget-item">
                                <div class="profile-widget-item-label"><i class="fas fa-calendar-alt"></i></div>
                                <div class="profile-widget-item-label">Join</div>
                                <div class="profile-widget-item-value"><?= date('d F Y', $dt->date_created); ?></div>
                              </div>
                              <div class="profile-widget-item">
                                <div class="profile-widget-item-label"><i class="fas fa-pen"></i></div>
                                <div class="profile-widget-item-label">Status</div>
                                <div class="profile-widget-item-value"><?php
                                if($dt->is_active > 0){
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
                                <div class="profile-widget-item-value"><?= $dt->no_telp; ?></div>
                              </div>
                              <div class="profile-widget-item">
                                <div class="profile-widget-item-label"><i class="fas fa-address-card"></i></div>
                                <div class="profile-widget-item-label">Tempat Tanggal Lahir</div>
                                <div class="profile-widget-item-value"><?= $dt->tempat_lahir. ', '. date('d M Y', strtotime($dt->tanggal_lahir)); ?></div>
                              </div>
                              <div class="profile-widget-item">
                                <div class="profile-widget-item-label"><i class="fas fa-edit"></i></div>
                                <div class="profile-widget-item-label">Bidang Keahlian</div>
                                <div class="profile-widget-item-value"><?= $dt->keahlian; ?></div>
                              </div>
                            </div>
                          </div>
                          <div class="profile-widget-description">
                            <div class="profile-widget-name"><?= $dt->name; ?> <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> Ustadz </div></div>
                            <div class="profile-widget-name">Email : <?= $dt->name; ?></div>
                            <?= $dt->name; ?> is a superhero name in <b>Indonesia</b>, especially in my family. He is not a fictional character but an original hero in my family, a hero for his children and for his wife. So, I use the name as a user in this template. Not a tribute, I'm just bored with <b>'John Doe'</b>.
                          </div>
                        </div>
                      <?php endforeach; ?>
                      </div>
                    </div>
                  </section>
                <!-- End of Main Content -->