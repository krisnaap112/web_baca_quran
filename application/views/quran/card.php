      <!-- Begin Page Content -->
            <div class="main-content">
              <section class="section">
              <?= $this->session->flashdata('message'); ?>
              <div class="card">
                <div class="card-header">
                  <h4><?= $title; ?></h4>
                    <div class="card-header-form">
                      <form action="<?= base_url('quran/card'); ?>" method="post">
                        <div class="input-group">
                          <div class="input-group mb-3">
                            <input type="text" name="keyword" class="form-control" placeholder="Cari Quran" autocomplete="off">
                            <div class="input-group-btn">
                              <input type="submit" name="submit" class="btn btn-danger">
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-header">
                    <p class="text-left">Hasil Pencarian : <?= $jumlah; ?></p>
                  </div>
                  <div class="card-body p-0">
                    <?php if (empty($surat)): ?>
                      <td colspan="5">
                        <div class="alert alert-danger" role="alert">
                          Data Tidak Ditemukan.!
                        </div>
                      </td>
                    <?php endif ?>
                    <div class="d-sm-flex align-items-center mb-3 ml-4">
                      <a href="<?= base_url('quran/cardAyat'); ?>" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm">Urutkan (Per Ayat)</a>
                      <a href="<?= base_url('quran/index'); ?>" class="d-sm-inline-block btn btn-sm btn-danger shadow-sm ml-2">View (Table)</a>
                    </div>
                     <div class="row">
                      <!-- Earnings (Monthly) Card Example -->
                      <?php foreach($surat as $s) : ?>
                      <div class="col-xl-3 col-md-6 my-2">
                        <div class="card border-left-primary shadow-sm py-2">
                          <div class="card-body alert-warning">
                            <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                <div class="h6 font-weight-bold text-danger text-uppercase mb-1"><?= $s['surah']; ?></div>
                                <div class="text-xs mb-0 font-weight-bold text-gray-800">Arti : <?= $s['arti_surah']; ?></div>
                                <div class="text-xs mb-0 font-weight-bold text-gray-800"><?= $s['jumlah_ayat']; ?> Ayat</div>
                                <div class="text-xs mb-0 font-weight-bold text-gray-800"><?= $s['jenis_surah']; ?></div>
                                <a href="<?= base_url('quran/detail/') . $s['id_surah']; ?>" class="btn btn-sm btn-primary my-2 justify-content-end">Baca</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php endforeach; ?>
                  </div>
                </div>
              </section>
            </div>
          <!-- /.container-fluid -->