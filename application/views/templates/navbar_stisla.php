

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar" style="background-color: #A32F33;"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <ul class="navbar-nav mr-3">
          <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
          <!-- gambar member -->
          <?php if ( $user ): ?>
            <img alt="image" src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="rounded-circle mr-1">
          <?php else: ?>
            <img alt="image" src="<?= base_url('assets/img/profile/') . $ustadz['foto']; ?>" class="rounded-circle mr-1">
          <?php endif; ?>
          <!-- nama member -->
          <?php if ($user): ?>
            <div class="d-sm-none d-lg-inline-block"><?= $user['name_user']; ?></div></a>
          <?php else: ?>
            <div class="d-sm-none d-lg-inline-block"><?= $ustadz['name']; ?></div></a>
          <?php endif; ?>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Logged in 5 min ago</div>
              <?php if ($user) : ?>
                <a href="<?= base_url('user'); ?>" class="dropdown-item has-icon">
                  <i class="far fa-user"></i> Profile
                </a>
              <?php else: ?>
                <a href="<?= base_url('ustadz'); ?>" class="dropdown-item has-icon">
                  <i class="far fa-user"></i> Profile
                </a>
              <?php endif; ?>
              <div class="dropdown-divider"></div>
              <a href="<?= base_url('auth/logout'); ?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      