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
                          <?php foreach ($materi as $m) : ?>
                            <div class="profile-widget-name text-center"><h3><?= $m['judul']; ?></h3></div>
                            <div class="profile-widget-name text-center">Nama Penulis : <?= $m['nama_penulis']; ?></div>
                            <div class="profile-widget-name text-center">Ditulis Pada : <?= date('d F Y', strtotime($m['tanggal_buat'])); ?></div>
                            <div class="profile-widget-name"><p><?= $m['konten']; ?></p></div>
                            <a href="<?= base_url('user/materi_islami'); ?>" class="btn btn-warning">Kembali</a>
                          <?php endforeach; ?>
                        </div>
                      </div>
                    </div>
                  </section>
                </div>
                <!-- End of Main Content -->