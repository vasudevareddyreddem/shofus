<footer class="main-footer">
    <div class="pull-right hidden-xs">
    </div>
    <?php function auto_copyright($year = 'auto'){ ?>
   <?php if(intval($year) == 'auto'){ $year = date('Y'); } ?>
   <?php if(intval($year) == date('Y')){ echo intval($year); } ?>
   <?php if(intval($year) < date('Y')){ echo intval($year) . ' - ' . date('Y'); } ?>
   <?php if(intval($year) > date('Y')){ echo date('Y'); } ?>
<?php } ?>
    <strong>Copyright &copy; <?php auto_copyright("2016");?><a href="#">cartinhour</a>.</strong> All rights
    reserved.
  </footer>
 <div class="control-sidebar-bg"></div>

</div>
<!-- core functionality purpose-->
<script src="<?php echo base_url(); ?>assets/vendor/inventry/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/inventry/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/inventry/plugins/fastclick/fastclick.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/inventry/dist/js/app.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/inventry/plugins/sparkline/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/inventry/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/inventry/plugins/datatables/dataTables.bootstrap.min.js
"></script>


<script src="<?php echo base_url(); ?>assets/vendor/inventry/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/inventry/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/inventry/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/inventry/plugins/chartjs/Chart.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/inventry/dist/js/pages/dashboard2.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/inventry/dist/js/demo.js"></script>
</body>
</html>
