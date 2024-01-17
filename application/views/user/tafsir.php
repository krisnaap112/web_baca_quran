<div class="main-content">
  <section class="section">
    <div class="section-header shadow">
      <i class="fas fa-calendar-alt"></i><h1 class="ml-3"><?= $title; ?></h1>
    </div>
    <div class="row">
      <div class="col-md">
        <div class="card shadow">
          <div class="card-header">
            <h4>Daftar Tafsir Al Quran</h4>
            <div class="card-header-action">
            </div>
          </div>
          <div class="card-body text-muted">
            <h6>Di halaman ini anda bisa melihat berbagai tafsir al quran dari para ulama yang mempunyai pengetahuan di bidang tafsir al quran.</h6>
          </div>
        </div>
      </div>
    </div>
    <div class="card shadow">
        <div class="card-body">
          <form action="<?= base_url('user/tafsir'); ?>" method="post">
            <div class="input-group mb-3">
              <input type="text" name="keyword" class="form-control" placeholder="Cari Tafsir Quran" autocomplete="off" autofocus="on">
              <div class="input-group-append">
                <input type="submit" name="submit" class="btn btn-info">
              </div>
          </form>
        </div>
        <h6 class="text-left">Hasil Pencarian : <?= $jumlah; ?></h6>
        <?php if (empty($tafsir)): ?>
          <td colspan="5">
            <div class="alert alert-danger" role="alert">
              Data Tidak Ditemukan.!
            </div>
          </td>
        <?php endif ?>
      </div>
    </div>
    <div class="row">
      <?php foreach($tafsir as $t) : ?>
        <div class="col-xl-3 col-md-6 my-3">
          <div class="card border-left-primary shadow">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="h6 font-weight-bold text-danger text-uppercase mb-1 mt-3"><?= $t['judul_tafsir']; ?></div>
                  <div class="text-xs mb-2 font-weight-bold text-gray-800">Penulis : <?= $t['penulis']; ?></div>
                  <div class="text-muted mb-0">Dibuat Pada : <?= date('d F Y', strtotime($t['tanggal_buat'])); ?></div>
                  <a class="btn btn-primary my-3 justify-content-end" href="<?= base_url('user/bacaTafsir/'.$t['id_tafsir']); ?>">Baca</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>
</div>