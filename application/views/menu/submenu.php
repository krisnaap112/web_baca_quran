    <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?= $title; ?></h1>
            <div class="section-header-breadcrumb">
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Daftar Sub Menu</h2>
            <p class="section-lead">
              Berikut Ini adalah daftar sub menu yang ada di website ini.
            </p>

            
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Daftar Sub Menu</h4>
                  </div>
                  <div class="card-body">
                    <div class="card-header">
                      <a href="" class="btn btn-success mb-3" data-toggle="modal" data-target="#newSubMenuModal">Add New Sub Menu</a>
                    </div>
                    <div class="table-responsive">
                      <?= $this->session->flashdata('message'); ?>
                      <table class="table table-striped" id="table-2">
                        <thead class="bg-success">
                          <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Menu</th>
                            <th>Url</th>
                            <th>Icon</th>
                            <th>Active</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $no = 1; 
                          foreach($subMenu as $sm) : ?>
                          <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $sm['title']; ?></td>
                            <td><?= $sm['menu_id']; ?></td>
                            <td><?= $sm['url']; ?></td>
                            <td><?= $sm['icon']; ?></td>
                            <td><?= $sm['is_active']; ?></td>
                            </td>
                            <td>
                              <ul class="pagination">
                                <li class="mx-1">
                                  <?= anchor('menu/update/'.$sm['id'], '<div class="btn btn-sm btn-primary">
                                  <i class="fa fa-edit"></i> Edit Menu
                                  </div>'); ?>
                                </li>
                                <li class="mx-1">
                                  <?= anchor('menu/delete/'.$sm['id'], '<div class="btn btn-sm btn-danger">
                                  <i class="fa fa-trash"></i> Hapus
                                  </div>'); ?></i>
                                </li>
                                </ul>
                              </td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

<!-- Modal -->
<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newSubMenuModalLabel">Add New Submenu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('menu/submenu'); ?>" method="post">
      <div class="modal-body">
        <div class="form-group">
          <label for="title" id="title">Masukkan Title</label>
          <input type="text" class="form-control" name="title" id="title" placeholder="Submenu Title" autocomplete="off">
        </div>
        <div class="form-group">
          <label for="menu_id" id="menu_id">Pilih Menu</label>
          <select name="menu_id" id="menu_id" class="form-control">
            <option value="">Select Menu</option>
            <?php foreach ($menu as $m) : ?>
            <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <label for="url" id="url">Masukkan URL</label>
          <input type="text" class="form-control" name="url" id="url" placeholder="Submenu Url" autocomplete="off">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="icon" id="icon" placeholder="Submenu Icon" autocomplete="off">
        </div>
        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
            <label class="form-check-label" for="is_active">Active?</label>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
      </form>
    </div>
  </div>
</div>
 


 <!-- Main Content -->
      <!-- <div class="main-content">
        <section class="section">
          <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4><?= $title; ?></h4>
                        <div class="card-header-form">
                            <form action="<?= base_url('menu/submenu'); ?>" method="post">
                              <div class="input-group">
                              <div class="input-group mb-3">
                                <input type="text" name="keyword_menu" class="form-control" placeholder="Cari Submenu" autocomplete="off">
                                <div class="input-group-btn">
                                  <input type="submit" name="submit" class="btn btn-info">
                                </div>
                            </form>
                          </div>
                        </div>
                    </div>
                  </div>
                  <div class="card-header">
                    <p class="text-left">Hasil Pencarian : <?= $jumlah; ?></p>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                    <?php if (empty($subMenu)): ?>
                      <td colspan="5">
                        <div class="alert alert-danger" role="alert">
                          Data Tidak Ditemukan.!
                        </div>
                      </td>
                    <?php endif ?>
                    <div class="col-mt-3">
                      <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuModal">Add New Menu</a>
                    </div>
                    <?= $this->session->flashdata('message'); ?>
                      <table class="table table-striped">
                        <tr class="text-center bg-primary text-white">
                          <th>No</th>
                          <th>Title</th>
                          <th>Menu</th>
                          <th>Url</th>
                          <th>Icon</th>
                          <th>Active</th>
                          <th colspan="3">Action</th>
                        </tr>
                        <?php 
                          $no = 1; 
                          foreach($subMenu as $sm) : ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $sm['title']; ?></td>
                          <td><?= $sm['menu_id']; ?></td>
                          <td><?= $sm['url']; ?></td>
                          <td><?= $sm['icon']; ?></td>
                          <td><?= $sm['is_active']; ?></td>
                          </td>
                          <td>
                            <ul class="pagination">
                              <li class="mx-1">
                                <?= anchor('menu/update/'.$sm['id'], '<div class="btn btn-sm btn-primary">
                                <i class="fa fa-edit"></i> Edit Menu
                                </div>'); ?>
                              </li>
                              <li class="mx-1">
                                <?= anchor('menu/delete/'.$sm['id'], '<div class="btn btn-sm btn-danger">
                                <i class="fa fa-trash"></i> Hapus
                                </div>'); ?></i>
                              </li>
                              </ul>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      </table>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <nav class="d-inline-block">
                      <ul class="pagination mb-0">
                        <li class="page-item disabled">
                          <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                        <li class="page-item">
                          <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                          <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                        </li>
                      </ul>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section> -->
<!-- End of Main Content -->

    