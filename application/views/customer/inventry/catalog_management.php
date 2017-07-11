<div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <div class="container">
         <!-- Main content -->
      <div class="row">
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Catalog Management</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php if(!empty($catalog_management)): ?>
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Seller Id</th>
                  <th>Seller Name</th>                              
                  <th>Mobile Number</th>
                </tr>
                </thead>
                <tbody>
                <?php  
                  foreach($catalog_management as $cmanagement) {?>
                <tr>                                    
                  <td><?php echo $cmanagement->seller_id; ?></td>                                    
                   <td><?php echo $cmanagement->seller_name; ?></td>
                   <td><?php echo $cmanagement->phone_number; ?></td>                   
                </tr>
                 <?php }?>
                </tbody>              
              </table>
              <?php else: ?>
              <center>
                <strong>No Catalog Management Found</strong>
              </center>
              <?php endif; ?>
            </div>
            <!-- /.box-body -->
          </div>

</div>
</div>
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