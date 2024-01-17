<div class="main-content">
  <section class="section">
<!-- Page Heading -->

<div class="row justify-content-center">
    <div class="col-lg">
      <div class="card">
        <div class="card-body alert-warning">
          <h3 class="card-title text-center">Changed Access Member</h3>
          <?php foreach($member as $mem) : ?>
          <form action="<?= base_url('user/updateAccountMember'); ?>" method="post">
            <input type="hidden" name="id" value="<?= $mem->id; ?>">
            <div class="form-group row">
              <label for="name_user" class="col-sm-2 col-form-label">Name</label>
              <div class="col-sm-10 input-group flex-nowrap">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                </div>
                <input type="text" name="name_user" id="name_user" class="form-control" value="<?= $mem->name_user; ?>" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label for="email" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10 input-group flex-nowrap">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-at"></i></span>
                </div>
                <input type="text" name="email" id="email" class="form-control" value="<?= $mem->email; ?>" readonly>
              </div>
            </div>
            <div class="form-group row">
             <label for="role_id" class="col-sm-2 col-form-label">Access</label>
              <div class="col-sm-10 input-group flex-nowrap">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-pen"></i></span>
                </div>
              <select name="role_id" class="form-control">
                <option value="<?= $mem->role_id ?>"><?= $mem->role_id ?></option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <?= form_error('role_id', '<small class="text-danger pl-3">', '</small>'); ?>
            </select>
            </div>
          </div>
            <div class="form-group row">
             <label for="is_active" class="col-sm-2 col-form-label">Status</label>
              <div class="col-sm-10 input-group flex-nowrap">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-key"></i></span>
                </div>
              <select name="is_active" class="form-control">
                <option value="<?= $mem->is_active ?>"><?= $mem->is_active ?></option>
                <option>0</option>
                <option>1</option>
                <?= form_error('is_active', '<small class="text-danger pl-3">', '</small>'); ?>
              </select>
            </div>
          </div>
            <div class="form-group row justify-content-end">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-success">Save</button>
              </div>
            </form>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>



</div>
<!-- /.container-fluid -->

</section>
</div>
<!-- End of Main Content -->
