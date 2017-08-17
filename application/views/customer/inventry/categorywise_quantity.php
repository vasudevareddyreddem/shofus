<div class="content-wrapper pad_t100">
    <!-- Content Header (Page header) -->
      <div class="container">
         <!-- Main content -->
      <div class="row">
      <div class="box data_box_wid">
            <div class="box-header" style="border-bottom:1px solid #ddd;">
              <h3 class="box-title" >Category wise Quantity</h3>
              <a class="pull-right btn btn-sm btn-primary" href="<?php echo base_url('inventory/productquantity'); ?>" class="box-title">Back</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
				  <tr>
					<th>Seller id</th>
					<th>Seller Name</th>
					<th>Category Name</th>
					<th>Total Quantity</th>
					
				 </tr>
                </thead>
                <tbody>
                <?php  
                  foreach($category_wise as $category) {?>
                <tr>  
                  <td><?php echo $category['seller_rand_id'] ?></td>
                  <td><?php echo $category['seller_name'] ?></td>
                  <td><?php echo $category['category_name'] ?></td>
                  <td><?php echo $category['qty'] ?></td>                  
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