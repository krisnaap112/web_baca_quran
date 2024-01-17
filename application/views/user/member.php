    <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?= $title; ?></h1>
          </div>
          <div class="section-body">
            <h2 class="section-title">Daftar Member</h2>
            <p class="section-lead">
              Berikut ini adalah daftar member website ini
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
                            <th>Nama Akun</th>
                            <th>Email</th>
                            <th>Negara</th>
                            <th>Level</th>
                            <th>Status</th>
                            <th>Tanggal Daftar</th>
                            <th width="20px">Aksi</th>
                          </tr>
                        </thead>
                          <tbody>
                            <?php 
                            $no = 1; 
                            foreach($member as $mem) : ?>
                            <tr>
                              <td><?= $no++; ?></td>
                              <td><?= $mem->name_user; ?></td>
                              <td><?= $mem->email; ?></td>
                              <td><?= $mem->country; ?></td>
                              <td>
                              <?php if($mem->role_id == 1) : ?>
                                <div class="badge badge-primary"><i class="fas fa-user-edit"></i> Admin</div>
                              <?php elseif($mem->role_id == 2): ?> 
                                <div class="badge badge-danger"><i class="fas fa-user"></i> Member</div>
                              <?php else: ?>
                                <div class="badge badge-warning"><i class="fas fa-user"></i> Ustadz</div>
                              <?php endif; ?>
                            </td>
                              <td>
                              <?php if($mem->is_active == 1) : ?>
                                <div class="badge badge-primary">Aktif</div>
                              <?php else: ?> 
                                <div class="badge badge-danger">Blok</div>
                              <?php endif; ?>
                            </td>
                              <td><?= date('d F Y', $mem->date_created); ?></td>
                              <td>
                                <ul class="pagination">
                                  <li class="mx-1">
                                    <?= anchor('user/editMember/'.$mem->id, '<div class="btn btn-sm btn-primary">
                                    <i class="fa fa-edit"></i> Edit
                                    </div>'); ?>
                                  </li>
                                  <li class="mx-1">
                                    <?= anchor('user/deleteMember/'.$mem->id, '<div class="btn btn-sm btn-danger">
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

