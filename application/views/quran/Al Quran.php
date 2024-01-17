<!-- Begin Page Content -->
<div class="main-content">
  <!-- Page Heading -->

<!-- Page Heading -->
<div class="text-center mb-5">
  <h3><strong><?= $title; ?></strong></h3>
  <?php foreach ($surah as $s) : ?>
    <h5><?= $s['arti_surah']; ?></h5>
    <h6><?= $s['jumlah_ayat']; ?> Ayat</h6>
  <?php endforeach; ?>
  <hr>
   <?php foreach($bismillah as $b) : ?>
          <h3><?= $b['ayat']; ?></h3>
          <h5><?= $b['arti_ayat']; ?></h5>
   <?php endforeach; ?>
  <hr>
</div>


  <?= $this->session->flashdata('message'); ?>


  <div class="row">
    <div class="col-lg mx-2">
      <?php 
      $no = 1;
      foreach ($quran as $q) : ?>
        <div class="btn btn-danger mb-3"><h6 class="text-left"><?= $q->nomor_ayat; ?></h6></div>
        <h4 class="text-right mb-3 text-dark"><?= $q->ayat; ?></h4>
        <h5 class="text-left mb-3"><?= $q->latin; ?></h5>
        <h6 class="text-left"><?= $q->arti_ayat; ?></h6>
        <hr>
      <?php endforeach; ?>
    <?= anchor('quran', '<div class="btn btn-sm btn-primary"> Kembali </div>'); ?>
    </div>
  </div>
       