<div class="main-content">
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <div class="row">
    <div class="col-lg-6">
      <?= $this->session->flashdata('message'); ?>
      <?php foreach($role as $r) : ?>
      <form action="<?= base_url('administrator/updateAccess'); ?>" method="post">
        <input type="hidden" name="id" value="<?= $r->id; ?>">
        <div class="form-group">
          <label for="access">Access</label>
          <input type="text" name="access" id="access" class="form-control" autocomplete="off" value="<?= $r->access ?>">
          <?= form_error('access', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    <?php endforeach; ?>
    </div>
  </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
