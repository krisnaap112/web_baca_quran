<div class="container-fluid">
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <div class="row">
    <div class="col-lg-6">
      <?= $this->session->flashdata('message'); ?>
      <?php foreach($ustad as $u) : ?>
      <form action="<?= base_url('prodi/update_prodi'); ?>" method="post">
        <input type="hidden" name="id" value="<?= $u->id_ustadz ?>">
        <div class="form-group">
          <label for="name">Nama Ustadz</label>
          <input type="text" name="name" id="name" class="form-control" autocomplete="off" value="<?= $u->name ?>">
          <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" name="email" id="email" class="form-control" autocomplete="off" value="<?= $u->email; ?>">
          <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
          <label for="no_telp">No. Telpon</label>
          <input type="text" name="no_telp" id="no_telp" class="form-control" autocomplete="off" value="<?= $u->no_telp ?>">
          <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
          <label for="tempat_lahir">Tempat Lahir</label>
          <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" autocomplete="off" value="<?= $u->tempat_lahir ?>">
          <?= form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
          <label for="tanggal_lahir">Tanggal Lahir</label>
          <input type="text" name="tanggal_lahir" id="tanggal_lahir" class="form-control" autocomplete="off" value="<?= $u->tanggal_lahir ?>">
          <?= form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
          <label for="keahlian">Keahlian</label>
          <input type="text" name="keahlian" id="keahlian" class="form-control" autocomplete="off" value="<?= $u->keahlian ?>">
          <?= form_error('keahlian', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
          <label for="negara">Negara</label>
          <input type="text" name="negara" id="negara" class="form-control" autocomplete="off" value="<?= $u->negara ?>">
          <?= form_error('negara', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
          <label for="alamat">Alamat</label>
          <textarea type="text" name="alamat" id="alamat" class="form-control" autocomplete="off" value="<?= $u->alamat ?>"></textarea>
          <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Ubah Jurusan</button>
        </div>
      </form>
    <?php endforeach; ?>
    </div>
  </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->