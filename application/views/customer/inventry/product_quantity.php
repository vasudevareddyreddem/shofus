<div class="content-wrapper pad_t100">
    <!-- Content Header (Page header) -->
      <div class="container">
         <!-- Main content -->
      <div class="row">
      <div class="box data_box_wid">
            <div class="box-header" style="border-bottom:1px solid #ddd;">
              <h3 class="box-title" >Product Quantity</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
				  <tr>
					<th>Seller id</th>
					<th>Seller Name</th>
					<th>Total Quantity</th>
					
				 </tr>
                </thead>
                <tbody>
                <?php  
                  foreach($quantity as $qty) {?>
                <tr>  
                  <td><a href="<?php echo base_url('inventory/categorywisequantity/'.base64_encode($qty['seller_id'])); ?>">
                  <?php echo $qty['seller_rand_id'] ?></a></td>
                  <td><?php echo $qty['seller_name'] ?></td>
                  <td><?php echo $qty['quantity'] ?></td>                  
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
$(document).ready(function() {
    $('#example1').DataTable( {
        "order": [[ 2, "desc" ]]
    } );
} );
</script>