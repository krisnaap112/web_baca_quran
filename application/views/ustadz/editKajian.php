<div class="main-content">
<section class="section">
<!-- Page Heading -->
<div class="section-header">
    <i class="fas fa-edit"></i><h1 class="ml-3"><?= $title; ?></h1>
  </div>

  <div class="row">
    <div class="col-lg-6">
      <?= $this->session->flashdata('message'); ?>
      <?php foreach($kajian as $k) : ?>
      <form action="<?= base_url('ustadz/editJadwalKajian'); ?>" method="post">
        <input type="hidden" name="id" value="<?= $k['id']; ?>">
        <input type="hidden" name="email" value="<?= $ustadz['email']; ?>">
        <div class="form-group">
          <label for="nama_ustadz">Nama Ustadz</label>
          <input type="text" name="nama_ustadz" id="nama_ustadz" class="form-control" autocomplete="off" value="<?= $k['nama_ustadz']; ?>" readonly>
          <?= form_error('nama_ustadz', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
          <label for="tempat_kajian">Tempat Kajian</label>
          <input type="text" name="tempat_kajian" id="tempat_kajian" class="form-control" autocomplete="off" value="<?= $k['tempat_kajian']; ?>">
          <?= form_error('tempat_kajian', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
          <label for="tanggal_kajian">tanggal_kajian</label>
          <input type="date" name="tanggal_kajian" id="tanggal_kajian" class="form-control" autocomplete="off" value="<?= $k['tanggal_kajian']; ?>">
          <?= form_error('tanggal_kajian', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
          <label for="waktu">Waktu</label>
          <input type="time" name="waktu" id="waktu" class="form-control" autocomplete="off" value="<?= $k['waktu']; ?>">
          <?= form_error('waktu', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
          <label for="materi_kajian">Materi Kajian</label>
          <input type="text" name="materi_kajian" id="materi_kajian" class="form-control" autocomplete="off" value="<?= $k['materi_kajian']; ?>">
          <?= form_error('materi_kajian', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="gambar">Upload Gambar</label>
              <div class="custom-file">
                  <input type="file" name="gambar" class="custom-file-input" id="gambar" value="<?= $k['gambar']; ?>">
                <label class="custom-file-label" for="gambar">Choose File</label>
              </div>  
          </div>
        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" value="<?= $k['is_active']; ?>" checked>
            <label class="form-check-label" for="is_active">Active?</label>
          </div>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Ubah Jadwal</button>
          <a href="<?= base_url('ustadz/dashboard/'.$ustadz['id_ustadz']); ?>" class="btn btn-danger">Kembali</a>
        </div>
      </form>
    <?php endforeach; ?>
    </div>
  </div>


</div>
<!-- /.container-fluid -->

</section>
</div>
<!-- End of Main Content -->
