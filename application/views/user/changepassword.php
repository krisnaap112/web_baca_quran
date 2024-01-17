<div class="main-content">
	<section class="section">

<div class="section-header">
    <i class="fas fa-key"></i><h1 class="ml-3"><?= $title; ?></h1>
  </div>

	<div class="row justify-content-center">
		<div class="col-lg">
			<div class="card">
				<div class="card-body alert-warning">
					<h3 class="card-title text-center">Changed Your Password</h3>
					<?= $this->session->flashdata('message'); ?>
					<form action="<?= base_url('user/changepassword'); ?>" method="post">
						<div class="form-group">
							<label for="currentPassword">Current Password</label>
							<div class="input-group flex-nowrap">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-key"></i></span>
								</div>
							<input type="password" name="currentPassword" id="currentPassword" class="form-control">
							<?= form_error('currentPassword', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						</div>
						<div class="form-group">
							<label for="newPassword">New Password</label>
							<div class="input-group flex-nowrap">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-plus"></i></span>
								</div>
							<input type="password" name="newPassword" id="newPassword" class="form-control">
							<?= form_error('newPassword', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						</div>
						<div class="form-group">
							<label for="newPassword1">Repeat Password</label>
							<div class="input-group flex-nowrap">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-redo-alt"></i></span>
								</div>
							<input type="password" name="newPassword1" id="newPassword1" class="form-control">
							<?= form_error('newPassword1', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-success">Change Password</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


</div>
<!-- /.container-fluid -->

</section>
</div>
<!-- End of Main Content -->

