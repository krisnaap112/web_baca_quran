    <!-- Start of Content -->
     <!--  <div class="main-content">
        <section class="section">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4><?= $title; ?></h4>
                    <div class="card-header-form">
                      <form action="<?= base_url('quran/index'); ?>" method="post">
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
                    <div class="table-responsive">
                    <?php if (empty($surat)): ?>
                      <td colspan="5">
                        <div class="alert alert-danger" role="alert">
                          Data Tidak Ditemukan.!
                        </div>
                      </td>
                    <?php endif ?>
                    <div class="d-sm-flex align-items-center mb-2">
                      <a href="<?= base_url('quran/ayat'); ?>" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm">Urutkan (Jumlah Ayat)</a>
                      <a href="<?= base_url('quran/card'); ?>" class="d-sm-inline-block btn btn-sm btn-success shadow-sm ml-2">View (Card)</a>
                    </div>
                    <?= $this->session->flashdata('message'); ?>
                      <table class="table table-striped">
                        <tr class="text-center bg-danger text-white">
                          <th>No.</th>
                          <th>Surat</th>
                          <th>Arti</th>
                          <th>Jumlah Ayat</th>
                          <th>Jenis Surah</th>
                          <th>Baca</th>
                        </tr>
                        <?php 
                        $no = 1;
                        foreach ($surat as $s) : ?>
                          <tr>
                              <td width="20px"><?= $no++; ?></td>
                              <td><?= $s->surah; ?></td>
                              <td align="right"><?= $s->arti_surah; ?></td>
                              <td align="right"><?= $s->jumlah_ayat; ?></td>
                              <td align="center">
                                <?php if($s->jenis_surah == "Makkiyah") : ?>
                              <div class="badge badge-primary">Makkiyah</div>
                                <?php else: ?> 
                              <div class="badge badge-danger">Madaniyyah</div>
                                <?php endif; ?>
                              </td>
                              <td width="20px"><?= anchor('quran/detail/'.$s->id_surah, '<div class="btn btn-sm btn-warning">
                                <i class="fa fa-eye"></i>
                              </div>'); ?></i>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      </table>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <nav class="d-inline-block">
                      <ul class="pagination mb-0">
                        <li class="page-item disabled">
                          <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                        <li class="page-item">
                          <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                          <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                        </li>
                      </ul>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section> -->
<!-- End of Main Content -->

  <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?= $title; ?></h1>
          </div>
          <div class="section-body">
            <div class="row">
              <div class="col-lg">
                <div class="card">
                  <div class="card-header">
                    <h4>Pilih Quran</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-2">
                        <thead>
                          <tr class="bg-warning text-center">
                            <th>No</th>
                            <th>Surat</th>
                            <th>Arti Surat</th>
                            <th>Jumlah Ayat</th>
                            <th>Jenis Surat</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                          $no = 1;
                          foreach( $quran as $q ) : ?>
                            <tr>
                              <td><?= $no++; ?></td>
                              <td><?= $q['surah']; ?></td>
                              <td align="center"><?= $q['arti_surah']; ?></td>
                              <td align="center"><?= $q['jumlah_ayat']; ?></td>
                              <td align="center">
                                  <?php if($q['jenis_surah'] == "Makkiyah") : ?>
                                <div class="badge badge-primary">Makkiyah</div>
                                  <?php else: ?> 
                                <div class="badge badge-danger">Madaniyyah</div>
                                  <?php endif; ?>
                                </td>
                              <td width="20px"><?= anchor('quran/detail/'.$q['id_surah'], '<div class="btn btn-sm btn-warning">
                                  <i class="fa fa-eye"></i>
                                </div>'); ?></i>
                              </td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
