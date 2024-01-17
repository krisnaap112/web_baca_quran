<div class="main-content">
<section class="section">
<!-- Page Heading -->
<div class="section-header">
    <i class="fas fa-edit"></i><h1 class="ml-3"><?= $title; ?></h1>
  </div>

  <div class="row">
    <div class="col-lg-6">
      <?= $this->session->flashdata('message'); ?>
      <?php foreach($subMenu as $sm) : ?>
      <form action="<?= base_url('menu/update_menu'); ?>" method="post">
        <input type="hidden" name="id" value="<?= $sm->id ?>">
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" name="title" id="title" class="form-control" autocomplete="off" value="<?= $sm->title ?>">
          <?= form_error('title', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
          <label for="menu_id">Menu Id</label>
          <input type="text" name="menu_id" id="menu_id" class="form-control" autocomplete="off" value="<?= $sm->menu_id ?>">
          <?= form_error('menu_id', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
          <label for="url">URL</label>
          <input type="text" name="url" id="url" class="form-control" autocomplete="off" value="<?= $sm->url ?>">
          <?= form_error('url', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
          <label for="icon">Icon</label>
          <input type="text" name="icon" id="icon" class="form-control" autocomplete="off" value="<?= $sm->icon ?>">
          <?= form_error('icon', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" value="<?= $sm->is_active ?>" checked>
            <label class="form-check-label" for="is_active">Active?</label>
          </div>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Ubah Submenu</button>
        </div>
      </form>
    <?php endforeach; ?>
    </div>
  </div>


</div>
<!-- /.container-fluid -->

</section>
</div>
<!-- End of Main Content -->
