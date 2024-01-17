<div class="main-content">
  <section class="section">
    <div class="section-header shadow">
      <i class="fas fa-layer-group"></i><h1 class="ml-3"><?= $title; ?></h1>
    </div>
    <div class="row">
      <div class="col-md">
        <div class="card shadow">
          <div class="card-header">
            <h4>Daftar Artikel Islami</h4>
            <div class="card-header-action">
            </div>
          </div>
          <div class="card-body text-muted">
            <h6>Di halaman ini anda bisa melihat berbagai artikel islami yang menarik dan tentu saja bisa menambah wawasan anda dalam dunia islam.</h6>
          </div>
        </div>
      </div>
    </div>
    <div class="card shadow">
        <div class="card-body">
          <form action="<?= base_url('user/materi_islami'); ?>" method="post">
            <div class="input-group mb-3">
              <input type="text" name="keyword" class="form-control" placeholder="Cari Artikel" autocomplete="off" autofocus="on">
              <div class="input-group-append">
                <input type="submit" name="submit" class="btn btn-info">
              </div>
          </form>
        </div>
        <h6 class="text-left">Hasil Pencarian : <?= $jumlah; ?></h6>
        <?php if (empty($materi)): ?>
          <td colspan="5">
            <div class="alert alert-danger" role="alert">
              Data Tidak Ditemukan.!
            </div>
          </td>
        <?php endif ?>
      </div>
    </div>
    <div class="row">
      <?php foreach($materi as $m) : ?>
        <div class="col-xl-3 col-md-6 my-3">
          <div class="card border-left-primary shadow">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="h6 font-weight-bold text-danger text-uppercase mb-1 mt-3"><?= $m['judul']; ?></div>
                  <div class="text-xs font-weight-bold text-gray-800 mb-3">Ditulis Oleh : <?= $m['nama_penulis']; ?></div>
                  <a class="btn btn-primary my-3 justify-content-end" href="<?= base_url('user/bacaMateri/'.$m['id_materi_islami']); ?>">Baca</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>
</div>