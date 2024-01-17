<div class="main-content">

<div class="alert bg-success h4 text-center text-white" role="alert">
  <i class="fas fa-key mx-2 text-gray"></i> <?= $title; ?>
</div>

	<div class="row justify-content-center">
		<div class="col-lg">
			<div class="card">
				<div class="card-body alert-warning">
					<h3 class="card-title text-center">Edit Data Ustadz</h3>
					<?= $this->session->flashdata('message'); ?>
					<form action="<?= base_url('ustadz/editAksesUstadz'); ?>" method="post">
						<div class="form-group">
							<label for="is_active">Akses Ustadz</label>
							<div class="input-group flex-nowrap">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-key"></i></span>
								</div>
		                      <select name="is_active" id="is_active" class="form-control">
		                      	<option value="">Edit Akses</option>
		                        <?php foreach ($ustadz as $u) : ?>
		                        <option value="<?= $u['is_active']; ?>"><?= $u['is_active']; ?></option>
		                        <option>0</option>
		                        <option>1</option>
		                        <?php endforeach; ?>
		                      </select>
						<?= form_error('is_active', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-success">Changed Access</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

