


 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Sellers</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Seller Names</a></li>
      </ol>
    </section>
 <section class="content">
      <div class="row">
        <div class="col-xs-12">
        <a class="btn btn-primary" href="<?php echo base_url('customer/categories');?>">BAck</a>
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Seller ID Database</h3>
            </div>

            <!-- /.box-header -->
            <div class="box-body">

            <?php if(!empty($seller_category)): ?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Seller ID</th>
                  <th>Seller Name</th>              
                </tr>
                </thead>
                <tbody>
                <?php $count = $this->uri->segment(4, 0); 
                foreach($seller_category as $sellers) { ?>
                <tr>                  
                  <td><?php echo ++$count ?></td>
              <td>
                <?php echo $sellers['seller_name']; ?>
              </td>
                </tr>
                 <?php } ?>                
                </tbody>                
              </table>
              <?php else: ?>
                <center>
                <strong>No Sellers In Db</strong>
              </center>
              <?php endif; ?>
            </div>
            <!-- /.box-body -->
          </div>
          </div>
          </section>
      </div>
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
