<!-- Begin Page Content -->
<div class="main-content">
	<section class="section">

	<div class="section-header">
    <i class="fas fa-folder"></i><h1 class="ml-3"><?= $title; ?></h1>
  </div>

<!-- Page Heading -->
	<div class="row">
		<div class="col-lg">
			<?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
			<?= $this->session->flashdata('message'); ?>
  			<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal">Add New Menu</a>
  			<table class="table table-bordered table-striped table-hover">
  					<tr class="bg-primary text-white text-center">
  						<th>No.</th>
  						<th>Menu</th>
  						<th colspan="2">Action</th>
  					</tr>
  			  	<?php $i = 1; ?>
  					<?php 
  					$no = 1;
  					foreach ($menu as $m) : ?>
  						<tr>
  							<td width="20px"><?= $no++; ?></td>
  							<td><?= $m['menu']; ?></td>
  							<td width="20px">
                  <ul class="pagination">
                    <li class="mx-1">
                      <?= anchor('menu/roleupdate/'.$m['id'], '<div class="btn btn-sm btn-primary">
                      <i class="fa fa-edit"></i> Edit
                      </div>'); ?>
                    </li>
                    <li class="mx-1">
                      <?= anchor('menu/delete_menu/'.$m['id'], '<div class="btn btn-sm btn-danger">
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
<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newMenuModalLabel">Add New Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('menu'); ?>" method="post">
      <div class="modal-body">
        <div class="form-group">
        	<input type="text" class="form-control" name="menu" id="menu" placeholder="Menu Name">
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