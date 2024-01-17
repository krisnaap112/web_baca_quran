<!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?= $title; ?></h1>
          </div>
          <div class="section-body">
            <h2 class="section-title">Daftar Pesan Masuk</h2>
            <p class="section-lead">
              Berikut ini adalah daftar pesan masuk.
            </p>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-2">
                        <?= $this->session->flashdata('message'); ?>
                        <thead class="bg-danger">
                          <tr>
                            <th>No.</th>
                            <th>Email</th>
                            <th>Nama Akun</th>
                            <th>Subject</th>
                            <th>Pesan</th>
                            <th>Hapus</th>
                          </tr>
                        </thead>
                          <tbody>
                            <?php 
                            $no = 1;
                            foreach ($message as $msg) : ?>
                              <tr>
                                <td width="20px"><?= $no++; ?></td>
                                <td><?= $msg['email']; ?></td>
                                <td><?= $msg['name']; ?></td>
                                <td><?= $msg['subject']; ?></td>
                                <td><?= $msg['message']; ?></td>
                                <td width="20px">
                                <?= anchor('administrator/delete/'.$msg['id'], '<div class="btn btn-sm btn-danger">
                                  <i class="fa fa-trash"></i> hapus
                                </div>'); ?>
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

<!-- Begin Page Content -->
<!-- <div class="main-content">
  <section class="section">

<div class="section-header">
    <i class="fas fa-comment"></i><h1 class="ml-3"><?= $title; ?></h1>
</div>

  <?= form_error('kode_jurusan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
  <?= $this->session->flashdata('message'); ?>

	<div class="row">
    <div class="col-lg">
    <table class="table table-bordered table-striped table-hover table-responsive-lg">
      <tr class="text-white" style="background-color: #020280;">
        <th>No.</th>
        <th>Email</th>
        <th>Nama Akun</th>
        <th>Subject</th>
        <th>Pesan</th>
        <th colspan="1">Hapus</th>
      </tr>
      <?php 
      $no = 1;
      foreach ($message as $msg) : ?>
        <tr>
          <td width="20px"><?= $no++; ?></td>
          <td><?= $msg->email; ?></td>
          <td><?= $msg->name; ?></td>
          <td><?= $msg->subject; ?></td>
          <td><?= $msg->message; ?></td>
          <td width="20px">
          <?= anchor('administrator/delete/'.$msg->id, '<div class="btn btn-sm btn-danger">
            <i class="fa fa-edit"></i>
          </div>'); ?>
        </tr>
      <?php endforeach; ?>
    </table>
    </div>
  </div>

</section>
</div> -->
<!-- End of Main Content -->

    