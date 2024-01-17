          <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                  <div class="section-header">
                    <i class="fas fa-address-card"></i><h1 class="ml-3"><?= $title; ?></h1>
                  </div>
                    <div class="row mt-sm-4">
                      <div class="col-12 col-md-12 col-lg-12">
                        <div class="card profile-widget">
                          <div class="profile-widget-description">
                          <?php foreach ($tafsir as $t) : ?>
                            <div class="profile-widget-name text-center"><h3><?= $t['judul_tafsir']; ?></h3></div>
                            <div class="profile-widget-name text-center">Nama Penulis : <?= $t['penulis']; ?></div>
                            <div class="profile-widget-name"><p><?= $t['isi_tafsir']; ?></p></div>
                            <a href="<?= base_url('ustadz/tafsir'); ?>" class="btn btn-warning">Kembali</a>
                          <?php endforeach; ?>
                        </div>
                      </div>
                    </div>
                  </section>
                </div>
                <!-- End of Main Content -->