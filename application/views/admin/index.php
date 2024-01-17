

<!-- Main Content -->
      <div class="main-content">
        <section class="section">

          <div class="section-header">
            <i class="fas fa-tachometer-alt"></i><h1 class="ml-3"><?= $title; ?></h1>
          </div>

          <div class="row">
            <div class="col-md">
              <div class="card">
                <div class="card-header">
                  <h4>Selamat Datang <?= $user['name_user']; ?></h4>
                  <div class="card-header-action">
                    <a href="<?= base_url('administrator/data_ustadz'); ?>" class="btn btn-info"><i class="fas fa-user-cog"></i> Kelola Ustadz</a>
                    <a href="<?= base_url('user/member'); ?>" class="btn btn-warning mx-1">Kelola User</a>
                    <a href="<?= base_url('auth/logout'); ?>" class="btn btn-danger">Logout <i class="fas fa-sign-out-alt"></i></a>
                  </div>
                </div>
                <div class="card-body text-muted">
                  <h6>Sebagai seorang administrator, anda berhak mengelola website ini. Mulai dari mengelola postingan, member, ustadz, dan lainnya.</h6>
                </div>
              </div>
            </div>
          </div>

          <!-- <div class="row">
          <div class="col-lg col-md col-sm-12">
              <div class="card card-statistic-2">
               
                <div class="card-wrap">
                  <div class="card-header">
                    <h2>Welcome Back <?= $user['name_user']; ?>.</h2>
                  </div>
                  <div class="card-body">
                    <h6 class="text-muted">Sebagai Seorang Administrator, Anda Berhak Untuk Mengelola Website Ini.</h6>
                  </div>
                </div>
              </div>
            </div>
          </div> -->

          <div class="d-sm-flex align-items-center justify-content-between mb-3">
            <h3>Data Aplikasi</h3>
          </div>

          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-folder"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Menu</h4>
                  </div>
                  <div class="card-body">
                    <?= $this->db->get('user_menu')->num_rows(); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="far fa-folder-open"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Jumlah Sub Menu</h4>
                  </div>
                  <div class="card-body">
                  <?= $this->db->get('user_sub_menu')->num_rows(); ?>
                  </div>
                </div>
              </div>
            </div>              
          </div>

          <div class="d-sm-flex align-items-center justify-content-between mb-3">
            <h3>Data Member</h3>
          </div>

          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Jumlah Member</h4>
                  </div>
                  <div class="card-body">
                    <?= $this->db->get('user')->num_rows(); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="fas fa-user-edit"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Jumlah Admin</h4>
                  </div>
                  <div class="card-body">
                  <?= $this->db->get_where('user', ['role_id' => 1])->num_rows(); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="fas fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Jumlah User</h4>
                  </div>
                  <div class="card-body">
                  <?= $this->db->get_where('user', ['role_id' => 2])->num_rows(); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-user-tie"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Member Aktif</h4>
                  </div>
                  <div class="card-body">
                    <?= $this->db->get_where('user', ['is_active' => 1])->num_rows(); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="fas fa-key"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Hak Akses</h4>
                  </div>
                  <div class="card-body">
                  <?= $this->db->get('access')->num_rows(); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="far fa-comment"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Jumlah Pesan</h4>
                  </div>
                  <div class="card-body">
                    <?= $this->db->get('message')->num_rows(); ?>
                  </div>
                </div>
              </div>
            </div>                      
          </div>

          <div class="d-sm-flex align-items-center justify-content-between mb-3">
            <h3>Data Ustadz</h3>
          </div>

          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="fas fa-user-friends"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Jumlah Ustadz</h4>
                  </div>
                  <div class="card-body">
                    <?= $this->db->get('ustadz')->num_rows(); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="fas fa-user-tie"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Jumlah Ustadz Aktif</h4>
                  </div>
                  <div class="card-body">
                  <?= $this->db->get_where('ustadz', ['is_active' => 1])->num_rows(); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="fas fa-bookmark"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Jumlah Kajian</h4>
                  </div>
                  <div class="card-body">
                  <?= $this->db->get('kajian')->num_rows(); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-ban"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Jumlah Ustadz Non Aktif</h4>
                  </div>
                  <div class="card-body">
                  <?= $this->db->get_where('ustadz', ['is_active' => 0])->num_rows(); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>




          <div class="d-sm-flex align-items-center justify-content-between mb-3">
            <h3>Data Quran</h3>
          </div>

          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fas fa-fw fa-quran"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Jumlah Surah</h4>
                  </div>
                  <div class="card-body">
                    <?= $this->db->get_where('surah', ['surah'])->num_rows(); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Jumlah Ayat</h4>
                  </div>
                  <div class="card-body">
                  <?= $this->db->get_where('quran_id', ['ayahText'])->num_rows(); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="fas fa-kaaba"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Jenis Surah (Makkiyah)</h4>
                  </div>
                  <div class="card-body">
                  <?= $this->db->get_where('surah', ['jenis_surah' => 'Makkiyah'])->num_rows(); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-mosque"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Jenis Surah (Madaniyyah)</h4>
                  </div>
                  <div class="card-body">
                    <?= $this->db->get_where('surah', ['jenis_surah' => 'Madaniyyah'])->num_rows(); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="fas fa-book-open"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Jumlah Tafsir</h4>
                  </div>
                  <div class="card-body">
                    <?= $this->db->get('tafsir')->num_rows(); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="fas fa-print"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Jumlah Materi Quran</h4>
                  </div>
                  <div class="card-body">
                    <?= $this->db->get('materi_quran')->num_rows(); ?>
                  </div>
                </div>
              </div>
            </div>
 
          </div>

        </section>
      </div>
