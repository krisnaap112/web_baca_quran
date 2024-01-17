<footer class="main-footer">
        <div class="footer text-center">
          Copyright &copy; <?= date('Y'); ?> <div class="bullet"></div> Creator By Pramudya, Restu Maulana, Krisna
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
  </div>
  
  <!-- General JS Scripts -->
  <script src="<?= base_url("assets/dist/"); ?>assets/modules/jquery.min.js"></script>
  <script src="<?= base_url("assets/dist/"); ?>assets/modules/popper.js"></script>
  <script src="<?= base_url("assets/dist/"); ?>assets/modules/tooltip.js"></script>
  <script src="<?= base_url("assets/dist/"); ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?= base_url("assets/dist/"); ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="<?= base_url("assets/dist/"); ?>assets/modules/moment.min.js"></script>
  <script src="<?= base_url("assets/dist/"); ?>assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->
  <script src="<?= base_url("assets/dist/"); ?>assets/modules/datatables/datatables.min.js"></script>
  <script src="<?= base_url("assets/dist/"); ?>assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url("assets/dist/"); ?>assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
  <script src="<?= base_url("assets/dist/"); ?>assets/modules/jquery-ui/jquery-ui.min.js"></script>

   <!-- JS Libraies -->
   <script src="<?= base_url("assets/"); ?>js/summernote-bs4.js"></script>
   <script src="<?= base_url("assets/"); ?>js/codemirror.js"></script>
   <script src="<?= base_url("assets/"); ?>js/javascript.js"></script>
   <script src="<?= base_url("assets/"); ?>js/jquery.selectric.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="<?= base_url("assets/dist/"); ?>assets/js/page/modules-datatables.js"></script>
  

  <!-- Page Specific JS File -->
  <script src="<?= base_url("assets/dist/"); ?>assets/js/page/index-0.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
  <script>
    $('.custom-file-input').on('change', function(){
      let fileName = $(this).val().split('\\').pop();
      $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });

    $('.1').on('click', function(){
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        // jalankan ajax
        $.ajax({
          url: "<?= base_url('administrator/changeaccess'); ?>",
          type: "post",
          data: {
            menuId: menuId,
            roleId: roleId
          },
          success: function() {
            document.location.href = "<?= base_url('administrator/roleaccess/'); ?>" + roleId;
          }
        });
    });
  </script>

  

  <!-- Template JS File -->
  <script src="<?= base_url("assets/dist/"); ?>assets/js/scripts.js"></script>
  <script src="<?= base_url("assets/dist/"); ?>assets/js/custom.js"></script>
</body>
</html>