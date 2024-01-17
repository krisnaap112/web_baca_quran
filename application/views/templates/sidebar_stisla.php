<div class="main-sidebar sidebar-style-2" style="background-color: #6A2D4E;">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand mt-3">
            <!-- gambar user -->
            <?php if( $user ) : ?>
              <img alt="image" src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="rounded-circle mr-1" width="100px" height="100px">
            <?php else: ?>
              <img alt="image" src="<?= base_url('assets/img/profile/') . $ustadz['foto']; ?>" class="rounded-circle mr-1" width="100px" height="100px">
            <?php endif; ?>
            <div class="mb-3">
            <!-- nama member -->
            <?php if( $user ) : ?>
              <a href="#" class="text-white"><?= $user['name_user']; ?></a>
            <?php else: ?>
              <a href="#" class="text-white"><?= $ustadz['name']; ?></a>
            <?php endif; ?>
            </div>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">AS</a>
          </div>
          <ul class="sidebar-menu" style="background-color: #6A2D4E;">
            <li class="dropdown active">

            <!-- QUERY MENU -->
      <?php
      
      $role_id = $this->session->userdata('role_id');
      $queryMenu = "SELECT `user_menu`.`id`, `menu`
                      FROM `user_menu` JOIN `user_access_menu`
                        ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                     WHERE `user_access_menu`.`role_id` = $role_id
                  ORDER BY `user_access_menu`.`menu_id` ASC
                  ";
                  $menu = $this->db->query($queryMenu)->result_array();
      ?>

      <!-- LOOPING MENU -->
      <?php foreach ($menu as $m) : ?>
      <div class="sidebar-heading menu-header text-white ml-3 mt-3">
      <?= $m['menu']; ?>
      </div>

      <!-- SIAPKAN SUB-MENU SESUAI MENU -->
      <?php
        $menuId = $m['id'];
        $querySubMenu = "SELECT *
                           FROM `user_sub_menu` JOIN `user_menu`
                             ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                          WHERE `user_sub_menu`.`menu_id` = $menuId
                          AND   `user_sub_menu`.`is_active` = 1
                        ";
                $subMenu = $this->db->query($querySubMenu)->result_array();
      ?>

      <?php foreach($subMenu as $sm) : ?>
        <?php if ($title == $sm['title']) : ?>
       <!-- Nav Item - Charts -->
       <li class="nav-item active">
        <?php else : ?>
           <li class="nav-item">
        <?php endif; ?>
        <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
          <i class="<?= $sm['icon']; ?>"></i>
          <span><?= $sm['title']; ?></span></a>
      </li>
      

      <?php endforeach; ?>
      
       <hr class="sidebar-divider mt-3">

      <?php endforeach; ?>

     

      <!-- Divider -->
      <li class="nav-item">
        <?php if( $user ) : ?>
          <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
            <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span></a>
        <?php else: ?>
          <a class="nav-link" href="<?= base_url('auth/logout1'); ?>">
            <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span></a>
        <?php endif; ?>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

      </ul>
              
            </li>
          </ul>

        </aside>
      </div>
