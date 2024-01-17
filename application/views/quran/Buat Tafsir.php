 <!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="alert bg-warning h4 text-center text-white" role="alert">
            <i class="fas fa-book-open"></i> <?= $title; ?>
          </div>

          <?= $this->session->flashdata('message'); ?>

      </div>
        <!-- /.container-fluid -->