
    <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?= $title; ?></h1>
          </div>
          <div class="row">
            <div class="col-md">
              <div class="card">
                <div class="card-header">
                  <h4>Selamat Datang <?= $ustadz['name']; ?></h4>
                  <div class="card-header-action">
                    <a href="<?= base_url('quran/murottal'); ?>" class="btn btn-info"><i class="fas fa-headphones"></i> Dengarkan Al Quran</a>
                    <a href="<?= base_url('quran'); ?>" class="btn btn-warning">Baca Quran</a>
                    <a href="<?= base_url('auth/logout1'); ?>" class="btn btn-danger">Logout <i class="fas fa-sign-out-alt"></i></a>
                  </div>
                </div>
                <div class="card-body text-muted">
                  <h6>Ini adalah dashboard anda, di sini anda bisa mengelola jadwal kajian, membuat materi islami yang dapat di baca oleh member lain, membuat tafsir al quran, dan sebagainya.</h6>
                </div>
              </div>
            </div>
          </div>
          <div class="d-sm-flex align-items-center justify-content-between mb-3">
            <h3>Data Saya</h3>
          </div>

          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-calendar-alt"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Kajian Saya</h4>
                  </div>
                  <div class="card-body">
                    <?= $this->db->get('kajian')->num_rows(); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="fas fa-layer-group"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Materi Islami Yang Saya Buat</h4>
                  </div>
                  <div class="card-body">
                  <?= $this->db->get('materi_islami')->num_rows(); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-book-open"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Tafsir Saya</h4>
                  </div>
                  <div class="card-body">
                  <?= $this->db->get('tafsir')->num_rows(); ?>
                  </div>
                </div>
              </div>
            </div>                 
          </div>
        </section>
      </div>



