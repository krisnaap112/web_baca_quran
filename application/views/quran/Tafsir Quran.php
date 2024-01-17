<!-- Begin Page Content -->
<div class="col-mt-3">
<div class="container-fluid">

  <!-- Page Heading -->

<!-- Page Heading -->
<div class="text-center mb-5">
  <?php foreach($detail as $d) : ?>
    <h3><?= $d->judul_tafsir; ?></h3>
    <h6>Penulis : <?= $d->penulis; ?></h6>
  <?php endforeach; ?>
</div>


  <?= $this->session->flashdata('message'); ?>


  <div class="row">
    <div class="col-lg mx-2">
        <h4 class="mb-3 text-dark"></h4>
        <?php foreach($detail as $d) : ?>
          <h5>Penulis : <?= $d->isi_tafsir; ?></h5>
        <?php endforeach; ?>
        <hr>
    <?= anchor('quran/tafsir', '<div class="btn btn-sm btn-primary"> Kembali </div>'); ?>
    </div>
  </div>
            
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->