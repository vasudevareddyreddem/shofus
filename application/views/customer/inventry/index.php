<div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <div class="container">
         <!-- Main content -->
      <div class="row">
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Seller List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Seller Id</th>
                  <th>Seller Name</th>
                  <th>Seller Email</th>
                  <th>Seller mobile</th>
				  
                </tr>
                </thead>
                <tbody>
                <?php  
                  foreach($seller_details as $details) {?>
                <tr>                  
                  <td><?php echo $details['seller_rand_id']; ?></td>
                  <td><?php echo $details['seller_name']; ?></td>
                  <td><?php echo $details['seller_email']; ?></td>                  
                  <td><?php echo $details['seller_mobile']; ?></td>                  
                
                </tr>
                 <?php }?>
                </tbody>              
              </table>
             
            </div>
            <!-- /.box-body -->
          </div>

</div>
</div>
</div>
<script>
  $(function () {
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>