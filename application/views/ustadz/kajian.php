      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?= $title; ?></h1>
          </div>
          <div class="row">
            <div class="col-md">
              <div class="card">
                <div class="card-header">
                  <h4>Selamat Datang <?= $ustadz['name']; ?></h4>
                  <div class="card-header-action">
                    <a href="<?= base_url('quran/murottal'); ?>" class="btn btn-info"><i class="fas fa-headphones"></i> Dengarkan Al Quran</a>
                    <a href="<?= base_url('quran'); ?>" class="btn btn-warning">Baca Quran</a>
                    <a href="<?= base_url('auth/logout1'); ?>" class="btn btn-danger">Logout <i class="fas fa-sign-out-alt"></i></a>
                  </div>
                </div>
                <div class="card-body text-muted">
                  <h6>Ini adalah dashboard anda, di sini anda bisa mengelola jadwal kajian, membuat materi islami yang dapat di baca oleh member lain, membuat tafsir al quran, dan sebagainya.</h6>
                </div>
              </div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Jadwal Kajian Saya</h2>
            <p class="section-lead">
              Berikut ini adalah daftar kajian anda <?= $ustadz['name']; ?>
            </p>
            <?= $this->session->flashdata('pesan'); ?>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <a href="" class="btn btn-info mb-3" data-toggle="modal" data-target="#KajianModal"><i class="fas fa-plus"></i> Buat Jadwal Kajian</a>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-2">
                        <thead class="bg-info">
                          <tr>
                            <th>No.</th>
                            <th>Nama Ustadz</th>
                            <th>Tempat</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Materi</th>
                            <th>Status</th>
                            <th>Gambar</th>
                            <th width="20px">Aksi</th>
                          </tr>
                        </thead>
                          <tbody>
                            <?php 
                              $no = 1;
                              foreach( $kajian as $k ) : ?>
                              <td><?= $no++; ?></td>
                              <td><?= $k['nama_ustadz']; ?></td>
                              <td><?= $k['tempat_kajian']; ?></td>
                              <td><?= date('d F Y', strtotime($k['tanggal_kajian'])); ?></td>
                              <td><?= $k['waktu']; ?></td>
                              <td><?= $k['materi_kajian']; ?></td>
                              <td>
                                <?php if($k['is_active'] == 1) : ?>
                                  <div class="badge badge-primary">Aktif</div>
                                <?php else: ?> 
                                  <div class="badge badge-danger">Blok</div>
                                <?php endif; ?>
                              </td>
                              <td><img src="<?= base_url('assets/img/kajian/'.$k['gambar']); ?>" width="100px" height="100px" class="img-thumbnail my-1"></td>
                              <td>
                                <ul class="pagination">
                                  <li class="mx-1">
                                    <?= anchor('ustadz/editKajian/'.$k['id'], '<div class="btn btn-sm btn-primary">
                                    <i class="fa fa-edit"></i> Edit
                                    </div>'); ?>
                                  </li>
                                  <li class="mx-1">
                                    <?= anchor('ustadz/hapusKajian/'.$k['id'], '<div class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i> Hapus
                                    </div>'); ?></i>
                                  </li>
                                </ul>
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
        </div>
      </section>
    </div>

<<!-- Modal Kajian -->
<div class="modal fade" id="KajianModal" tabindex="-1" role="dialog" aria-labelledby="KajianModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="KajianModalLabel">Tambah Jadwal Kajian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open_multipart('ustadz/kajian'); ?>
      <div class="modal-body">
          <input type="hidden" name="id_ustadz" value="<?= $ustadz['id_ustadz']; ?>">
          <div class="form-group">
            <label for="nama_ustadz">Nama Ustadz</label>
            <input type="hidden" name="email" value="<?= $ustadz['email']; ?>" >
            <input type="text" name="nama_ustadz" id="nama_ustadz" class="form-control" autocomplete="off" value="<?= $ustadz['name']; ?>" readonly>
            <?= form_error('nama_ustadz', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="tempat_kajian">Tempat Kajian</label>
            <input type="text" name="tempat_kajian" id="tempat_kajian" class="form-control" autocomplete="off">
            <?= form_error('tempat_kajian', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="tanggal_kajian">Tanggal Kajian</label>
            <input type="date" name="tanggal_kajian" id="tanggal_kajian" class="form-control" autocomplete="off">
            <?= form_error('tanggal_kajian', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="waktu">Waktu Kajian</label>
            <input type="time" name="waktu" id="waktu" class="form-control" autocomplete="off">
            <?= form_error('waktu', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="materi_kajian">Materi Kajian</label>
            <input type="text" name="materi_kajian" id="materi_kajian" class="form-control" autocomplete="off">
            <?= form_error('materi_kajian', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="gambar">Upload Gambar</label>
              <div class="custom-file">
                  <input type="file" name="gambar" class="custom-file-input" id="gambar">
                <label class="custom-file-label" for="gambar">Choose File</label>
              </div>
            <?= form_error('gambar', '<small class="text-danger pl-3">', '</small>'); ?> 
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
