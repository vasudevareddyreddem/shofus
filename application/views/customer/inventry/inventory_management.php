<div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <div class="container">
         <!-- Main content -->
      <div class="row">
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Inventory Management</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php if(!empty($inventory_management)): ?>
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Seller Id</th>
                  <th>Seller Name</th>                              
                  <th>Mobile Number</th>
                </tr>
                </thead>
                <tbody>
                <?php  
                  foreach($inventory_management as $imanagement) {?>
                <tr>                                    
                  <td><?php echo $imanagement->seller_id; ?></td>                                    
                   <td><?php echo $imanagement->seller_name; ?></td>
                   <td><?php echo $imanagement->phone_number; ?></td>                   
                </tr>
                 <?php }?>
                </tbody>              
              </table>
              <?php else: ?>
              <center>
                <strong>No Inventory Management Found</strong>
              </center>
              <?php endif; ?>
            </div>
            <!-- /.box-body -->
          </div>

</div>
</div>
</div>