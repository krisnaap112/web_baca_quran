<div class="main-content">
  <section class="section">
    <div class="section-header shadow">
      <i class="fas fa-calendar-alt"></i><h1 class="ml-3"><?= $title; ?></h1>
    </div>
    <div class="row">
      <div class="col-md">
        <div class="card shadow">
          <div class="card-header">
            <h4>Daftar Jadwal Kajian</h4>
            <div class="card-header-action">
            </div>
          </div>
          <div class="card-body text-muted">
            <h6>Di halaman ini anda bisa melihat berbagai jadwal kajian dari para ustadz atau ulama yang ada.</h6>
          </div>
        </div>
      </div>
    </div>
      <div class="card shadow">
        <div class="card-body">
          <form action="<?= base_url('user/kajian'); ?>" method="post">
            <div class="input-group mb-3">
              <input type="text" name="keyword" class="form-control" placeholder="Cari Jadwal Kajian" autocomplete="off" autofocus="on">
              <div class="input-group-append">
                <input type="submit" name="submit" class="btn btn-info">
              </div>
          </form>
        </div>
        <h6 class="text-left">Hasil Pencarian : <?= $jumlah; ?></h6>
        <?php if (empty($kajian)): ?>
          <td colspan="5">
            <div class="alert alert-danger" role="alert">
              Data Tidak Ditemukan.!
            </div>
          </td>
        <?php endif ?>
      </div>
    </div>
    <div class="row">
      <?php foreach($kajian as $k) : ?>
        <div class="col-xl-3 col-md-6 my-3">
          <div class="card border-left-primary shadow">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="h6 font-weight-bold text-danger text-uppercase mb-1 mt-3"><?= $k['materi_kajian']; ?></div>
                  <div class="text-xs font-weight-bold text-gray-800 mb-3">Pemateri : <?= $k['nama_ustadz']; ?></div>
                  <div class="text-muted mb-0">Pukul : <?= date('d F Y', strtotime($k['tanggal_kajian'])); ?></div>
                  <div class="text-muted my-2">Tempat : <?= $k['tempat_kajian']; ?></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>
</div>