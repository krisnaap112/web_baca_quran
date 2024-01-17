<div class="main-content">
<section class="section">
<!-- Page Heading -->
<div class="section-header">
    <i class="fas fa-edit"></i><h1 class="ml-3"><?= $title; ?></h1>
  </div>

  <div class="row">
    <div class="col-lg">
      <?= $this->session->flashdata('message'); ?>
      <?php foreach($tafsir as $t) : ?>
      <form action="<?= base_url('ustadz/editTafsirSaya'); ?>" method="post">
        <input type="hidden" name="id_tafsir" value="<?= $t['id_tafsir']; ?>">
        <input type="hidden" name="id_ustadz" value="<?= $t['id_ustadz']; ?>">
        <input type="hidden" name="email" value="<?= $ustadz['email']; ?>">
        <div class="form-group">
          <label for="penulis">Nama Penulis</label>
          <input type="text" name="penulis" id="penulis" class="form-control" autocomplete="off" value="<?= $t['penulis']; ?>" readonly>
          <?= form_error('penulis', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
          <label for="judul_tafsir">Judul Tafsir</label>
          <input type="text" name="judul_tafsir" id="judul_tafsir" class="form-control" autocomplete="off" value="<?= $t['judul_tafsir']; ?>">
          <?= form_error('judul_tafsir', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group row mb-4">
            <label class="col-form-label text-md-left col-md-12 col-lg-12">Content</label>
            <div class="col-sm-12 col-md-12">
                <textarea class="summernote" name="isi_tafsir"><?= $t['isi_tafsir']; ?></textarea>
            </div>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Ubah Tafsir</button>
          <a href="<?= base_url('ustadz/tafsir'); ?>" class="btn btn-danger">Kembali</a>
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
