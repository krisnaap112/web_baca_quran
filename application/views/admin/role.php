<!-- Begin Page Content -->
<div class="main-content">
  <section class="section">

  <div class="section-header">
    <i class="fas fa-key"></i><h1 class="ml-3"><?= $title; ?></h1>
  </div>

  <?= form_error('role', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
  <?= $this->session->flashdata('message'); ?>

<div class="row">
    <div class="col-lg">
    <a href="" style="background-color: #020280;" class="btn mb-3 text-white" data-toggle="modal" data-target="#newRoleModal">Tambah Access</a>
    <table class="table table-bordered table-striped table-hover">
      <tr class="text-white text-center" style="background-color: #020280;">
        <th>No.</th>
        <th>Role</th>
        <th colspan="3">Action</th>
      </tr>
      <?php 
      $no = 1;
      foreach ($role as $r) : ?>
        <tr>
          <td width="20px"><?= $no++; ?></td>
          <td><?= $r['access']; ?></td>
          <td width="20px">
            <ul class="pagination">
              <li class="mx-1">
                <?= anchor('administrator/roleaccess/'.$r['id'], '<div class="btn btn-sm btn-warning">
                <i class="fa fa-edit"></i> Detail
                </div>'); ?>
              </li>
              <li class="mx-1">
                <?= anchor('administrator/roleupdate/'.$r['id'], '<div class="btn btn-sm btn-primary">
                <i class="fa fa-trash"></i> Edit
                </div>'); ?></i>
              </li>
              <li class="mx-1">
                <?= anchor('administrator/deleterole/'.$r['id'], '<div class="btn btn-sm btn-danger">
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

</section>
</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newRoleModalLabel">Add New Access</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('administrator/addRole'); ?>" method="post">
      <div class="modal-body">
        <div class="form-group">
        	<input type="text" class="form-control" name="access" id="access" placeholder="Role Name">
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