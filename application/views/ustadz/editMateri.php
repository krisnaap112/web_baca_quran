<div class="main-content">
<section class="section">
<!-- Page Heading -->
<div class="section-header">
    <i class="fas fa-edit"></i><h1 class="ml-3"><?= $title; ?></h1>
  </div>

  <div class="row">
    <div class="col-lg">
      <?= $this->session->flashdata('message'); ?>
      <?php foreach($materi as $m) : ?>
      <form action="<?= base_url('ustadz/editMateriIslami'); ?>" method="post">
        <input type="hidden" name="id_materi_islami" value="<?= $m['id_materi_islami']; ?>">
        <div class="form-group">
          <label for="nama_penulis">Nama Penulis</label>
          <input type="text" name="nama_penulis" id="nama_penulis" class="form-control" autocomplete="off" value="<?= $m['nama_penulis']; ?>" readonly>
          <?= form_error('nama_penulis', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
          <label for="judul">Judul Materi</label>
          <input type="text" name="judul" id="judul" class="form-control" autocomplete="off" value="<?= $m['judul']; ?>">
          <?= form_error('judul', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group row mb-4">
            <label class="col-form-label text-md-left col-md-12 col-lg-12">Content</label>
            <div class="col-sm-12 col-md-12">
                <textarea class="summernote" name="konten"><?= $m['konten']; ?></textarea>
            </div>
            <?= form_error('konten', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Ubah Materi</button>
          <a href="<?= base_url('ustadz/materi_islami'); ?>" class="btn btn-danger">Kembali</a>
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
