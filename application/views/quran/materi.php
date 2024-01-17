      <!-- Begin Page Content -->
        <div class="main-content">
          <section class="section">

            <div class="section-header">
              <i class="fas fa-book"></i><h1 class="ml-3"><?= $title; ?></h1>
            </div>

          <?= $this->session->flashdata('message'); ?>
          <div class="row">
          <?php foreach($materi as $m) : ?>
          <div class="card-deck col-md-4 my-2">
              <div class="card shadow-sm">
                <img src="<?= base_url('assets/img/profile/') . $m['image']; ?> ?>" class="card-img-top" alt="...">
                <div class="card-body">
                  <h3 class="card-title text-center"><?= $m['judul'] ?></h3>
                  <h6 class="card-text text-center"><?= $m['penulis']; ?></h6>
                  <p class="card-text text-center"><small class="text-muted"><?= date('d F Y', $m['tanggal_buat']); ?></small></p>
                  <a href="#" class="btn btn-primary">Baca</a>
                </div>
              </div>
          </div>
          <?php endforeach; ?>
          </div>

        
        </section>
        </div>
        <!-- /.container-fluid -->

      