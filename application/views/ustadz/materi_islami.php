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
            <h2 class="section-title"><?= $title; ?></h2>
            <p class="section-lead">
              Berikut ini adalah daftar <?= $title; ?> anda <?= $ustadz['name']; ?>
            </p>
            <?= $this->session->flashdata('message'); ?>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <div class="card-header">
                      <a href="" class="btn btn-warning mb-3" data-toggle="modal" data-target="#MateriModal"><i class="fas fa-bookmark"></i> Tulis Materi Islami</a>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead class="bg-warning text-center">                                 
                          <tr>
                            <th>No.</th>
                            <th>Nama Penulis</th>
                            <th>Judul</th>
                            <th>Isi Konten</th>
                            <th width="20px">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>                                 
                          <?php 
                              $no = 1;
                              foreach( $materi as $m ) : ?>
                              <td><?= $no++; ?></td>
                              <td><?= $m['nama_penulis']; ?></td>
                              <td><?= $m['judul']; ?></td>
                              <td><?= $m['konten']; ?></td>
                              <td align="center">
                                <ul class="pagination">
                                   <li class="mx-1">
                                    <?= anchor('ustadz/detailMateri/'.$m['id_materi_islami'], '<div class="btn btn-sm btn-warning">
                                    <i class="fa fa-edit"></i> Detail
                                    </div>'); ?>
                                  </li>
                                  <li class="mx-1">
                                    <?= anchor('ustadz/editMateri/'.$m['id_materi_islami'], '<div class="btn btn-sm btn-primary">
                                    <i class="fa fa-edit"></i> Edit
                                    </div>'); ?>
                                  </li>
                                  <li class="mx-1">
                                    <?= anchor('ustadz/hapusMateri/'.$m['id_materi_islami'], '<div class="btn btn-sm btn-danger">
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
        </section>
      </div>

<!-- Materi Modal -->
<div class="modal fade" id="MateriModal" tabindex="-1" role="dialog" aria-labelledby="MateriModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="MateriModalLabel">Tulis Materi Islami</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open_multipart('ustadz/materi_islami'); ?>
      <div class="modal-body">
        <input type="hidden" name="id_ustadz" value="<?= $ustadz['id_ustadz']; ?>">
        <input type="hidden" name="email" value="<?= $ustadz['email']; ?>">
          <div class="form-group">
            <label for="nama_penulis">Nama Penulis</label>
            <input type="text" name="nama_penulis" id="nama_penulis" class="form-control" autocomplete="off" value="<?= $ustadz['name']; ?>" readonly>
            <?= form_error('nama_penulis', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control" autocomplete="off">
            <?= form_error('judul', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group row mb-4">
            <label class="col-form-label text-md-left col-md-12 col-lg-12">Content</label>
            <div class="col-sm-12 col-md-12">
                <textarea class="summernote" name="konten"></textarea>
            </div>
             <?= form_error('konten', '<small class="text-danger pl-3">', '</small>'); ?>
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

