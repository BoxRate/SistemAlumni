<footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Unsyiah 2019</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>

       <!-- Logout Modal-->
       <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Anda Ingin Keluar ?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Pilih Logout Untuk Melanjutkan</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal"> Cancel </button>
            <a class="btn btn-danger" href="<?php echo base_url() ?>index.php/Mahasiswa/dashboard/logout">Logout</a>
          </div>
        </div>
      </div>
    </div>
   
   
  </div>
</body>

   
    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url()?>asset/sb-admin/js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="<?php echo base_url()?>asset/sb-admin/js/sb-admin-datatables.min.js"></script>
    <script src="<?php echo base_url()?>asset/sb-admin/js/sb-admin-charts.min.js"></script>

</html>