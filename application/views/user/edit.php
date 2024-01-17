<!-- Begin Page Content -->
<div class="main-content">
	<section class="section">

<div class="section-header">
    <i class="fas fa-user-edit"></i><h1 class="ml-3"><?= $title; ?></h1>
  </div>

	<div class="row justify-content-center">
		<div class="col-lg">
			<div class="card">
				<div class="card-body alert-warning">
					<h3 class="card-title text-center">Changed Your Profile</h3>
					<?= form_open_multipart('user/edit'); ?>
			<div class="form-group row">
				<label for="email" class="col-sm-2 col-form-label">Email</label>
				<div class="col-sm-10 input-group flex-nowrap">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-at"></i></span>
					</div>
					<input type="text" name="email" id="email" class="form-control" value="<?= $user['email']; ?>" readonly>
				</div>
			</div>
				<div class="form-group row">
					<label for="name_user" class="col-sm-2 col-form-label">Full Name</label>
					<div class="col-sm-10 input-group flex-nowrap">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-address-card"></i></span>
						</div>
						<input type="text" name="name_user" id="name" class="form-control" value="<?= $user['name_user']; ?>">
						<?= form_error('name_user', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
				</div>
				<div class="form-group row">
				<label for="facebook" class="col-sm-2 col-form-label">Facebook</label>
				<div class="col-sm-10 input-group flex-nowrap">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fab fa-facebook"></i></span>
						<span class="input-group-text bg-secondary">https://facebook.com/</i></span>
					</div>
					<input type="text" name="facebook" id="name" class="form-control" value="<?= $user['facebook']; ?>">
					<?= form_error('facebook', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
			</div>
			<div class="form-group row">
				<label for="twitter" class="col-sm-2 col-form-label">Twitter</label>
				<div class="col-sm-10 input-group flex-nowrap">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fab fa-twitter"></i></span>
						<span class="input-group-text bg-secondary">https://twitter.com/</i></span>
					</div>
					<input type="text" name="twitter" id="name" class="form-control" value="<?= $user['twitter']; ?>">
					<?= form_error('twitter', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
			</div>
			<div class="form-group row">
				<label for="github" class="col-sm-2 col-form-label">Github</label>
				<div class="col-sm-10 input-group flex-nowrap">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fab fa-github"></i></span>
						<span class="input-group-text bg-secondary">https://github.com/</i></span>
					</div>
					<input type="text" name="github" id="name" class="form-control" value="<?= $user['github']; ?>">
					<?= form_error('github', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
			</div>
			<div class="form-group row">
				<label for="instagram" class="col-sm-2 col-form-label">Instagram</label>
				<div class="col-sm-10 input-group flex-nowrap">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fab fa-instagram"></i></span>
						<span class="input-group-text bg-secondary">https://instagram.com/</i></span>
					</div>
					<input type="text" name="instagram" id="name" class="form-control" value="<?= $user['instagram']; ?>">
					<?= form_error('instagram', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-2">Picture</div>
				<div class="col-sm-10">
					<div class="row">
						<div class="col-sm-3">
							<img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
						</div>
						<div class="col-sm-9">
							<div class="custom-file">
								<input type="file" name="image" class="custom-file-input" id="image">
								<label class="custom-file-label" for="image">Choose File</label>
							</div>	
						</div>
					</div>
				</div>
			</div>
			<div class="form-group row justify-content-end">
				<div class="col-sm-10">
					<button type="submit" class="btn btn-success">Edit</button>
				</div>
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

