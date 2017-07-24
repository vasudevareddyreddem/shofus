<footer class="footer ">
    <strong>Copyright &copy; 2016- <?php echo date('Y');?><a href="#">cartinhour</a>.</strong> All rights
    reserved.
</footer>



<!-- core functionality purpose-->

<script src="<?php echo base_url(); ?>assets/home/js/jquery.js"></script>

<script src="<?php echo base_url(); ?>assets/vendor/inventry/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/inventry/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/inventry/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/inventry/plugins/chartjs/Chart.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/inventry/dist/js/pages/dashboard2.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/inventry/dist/js/demo.js"></script>

<script src="<?php echo base_url(); ?>assets/vendor/inventry/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/inventry/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/inventry/plugins/fastclick/fastclick.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/inventry/dist/js/app.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/inventry/plugins/sparkline/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/inventry/plugins/datatables/dataTables.bootstrap.min.js
"></script>
<script src="<?php echo base_url(); ?>assets/vendor/inventry/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/bootstrapValidator.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/customer/css/animate.css">
<!--Style start here -->




<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>
