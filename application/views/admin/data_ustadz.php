 <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?= $title; ?></h1>
          </div>
          <div class="section-body">
            <h2 class="section-title">Daftar Ustadz</h2>
            <p class="section-lead">
              Berikut ini adalah daftar ustadz di website ini
            </p>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-2">
                        <?= $this->session->flashdata('message'); ?>
                        <thead class="bg-info">
                          <tr>
                            <th>No.</th>
                            <th>Nama Ustadz</th>
                            <th>Email</th>
                            <th>Bidang Keahlian</th>
                            <th>Status</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                          <tbody>
                            <?php 
                            $no = 1; 
                            foreach($ustadz as $u) : ?>
                              <tr>
                                <td width="20px"><?= $no++; ?></td>
                                <td><?= $u->name; ?></td>
                                <td><?= $u->email; ?></td>
                                <td><?= $u->keahlian; ?></td>
                                <td><?php if($u->is_active == 1) : ?>
                                  <div class="badge badge-primary">Aktif</div>
                                <?php else: ?> 
                                  <div class="badge badge-danger">Blok</div>
                                <?php endif; ?>
                              </td>
                                <td width="20px">
                                  <ul class="pagination">
                                    <li class="mx-1">
                                      <?= anchor('ustadz/editUstadz/'.$u->id_ustadz, '<div class="btn btn-sm btn-primary">
                                      <i class="fa fa-edit"></i> Edit
                                      </div>'); ?>
                                    </li>
                                    <li class="mx-1">
                                      <?= anchor('ustadz/detail/'.$u->id_ustadz, '<div class="btn btn-sm btn-success">
                                      <i class="fa fa-eye"></i> Detail
                                      </div>'); ?></i>
                                    </li>
                                    <li class="mx-1">
                                      <?= anchor('ustadz/delete/'.$u->id_ustadz, '<div class="btn btn-sm btn-danger">
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
          </div>
        </section>
      </div>

