<!-- Begin Page Content -->
<div class="col-mt-3">
<div class="container-fluid">

<!-- Page Heading -->
<div class="alert bg-warning h4 text-center text-white" role="alert">
  <i class="fas fa-quran"></i> <?= $title; ?>
</div>

  <?= $this->session->flashdata('message'); ?>


  <div class="row">
    <div class="col-lg">
        <form action="<?= base_url('quran/index'); ?>" method="post">
          <div class="input-group mb-3">
            <input type="text" name="keyword" class="form-control" placeholder="Cari Quran" autocomplete="off">
            <div class="input-group-append">
              <input type="submit" name="submit" class="btn btn-warning">
            </div>
        </form>
      </div>
      <?php if (empty($juz)): ?>
        <td colspan="5">
          <div class="alert alert-danger" role="alert">
            Data Tidak Ditemukan.!
          </div>
        </td>
      <?php endif ?>
      <div class="d-sm-flex align-items-center mb-4">
        <a href="<?= base_url('quran/ayat'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Urutkan (Jumlah Ayat)</a>
        <a href="<?= base_url('quran/index'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm ml-2">Urutkan (Per Surat)</a>
        <a href="<?= base_url('quran/juz'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm ml-2">Urutkan (Per Juz)</a>
      </div>
    <table class="table table-bordered table-striped table-hover mt-3">
      <tr>
        <th>No.</th>
        <th>Juz</th>
        <th>Baca</th>
      </tr>
      <?php 
      $no = 1;
      foreach ($juz as $j) : ?>
        <tr>
          <td width="20px"><?= $no++; ?></td>
          <td><?= $j->juz; ?></td>
          <td width="20px"><?= anchor('quran/detail_juz/'.$j->id_juz, '<div class="btn btn-sm btn-warning">
            <i class="fa fa-eye"></i>
          </div>'); ?></i>
        </td>
        </tr>
      <?php endforeach; ?>
    </table>
    </div>
  </div>
            
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->