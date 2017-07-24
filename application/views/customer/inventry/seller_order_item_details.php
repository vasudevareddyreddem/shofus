<div class="content-wrapper pad_t100">
    <!-- Content Header (Page header) -->
      <div class="container">
         <!-- Main content -->
      <div class="row">
	  <?php //echo '<pre>';print_r($seller_order_items);exit; ?>
      <div class="box data_box_wid">
            <div class="box-header" style="border-bottom:1px solid #ddd;">
              <h3 class="box-title" >Seller Ordered Items List</h3>
              <a class="pull-right btn btn-sm btn-primary" href="<?php echo base_url('inventory/sellerpayments'); ?>" class="box-title">Back</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body"><?php if($this->session->flashdata('success')): ?>
					<div class="alert dark alert-success alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button><?php echo $this->session->flashdata('success');?></div>	
					<?php endif; ?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
				  <tr>
					<th>Order Id</th>
					<th>Order Transaction Number</th>
					<th>payment Mode</th>
					<th>Customer Name</th>
					<th>Item Name</th>
					<th>Amount</th>
					<th>Created Date</th>
					<th>Status</th>
				 </tr>
                </thead>
                <tbody>
                <?php  
                  foreach($seller_order_items as $items) {?>
                <tr>                  
                  <td><?php echo $items['order_id']; ?></td>
                  <td><?php echo $items['transaction_id']; ?></td>
                  <td><?php echo $items['payment_mode']; ?></td>
				  <td><?php echo $items['cust_firstname'].' '.$items['cust_lastname']; ?></td>    
				  <td><?php echo $items['item_name']; ?></td>    
				  <td><?php echo $items['total_price']; ?></td>    
				  <td><?php echo Date('d-M-Y',strtotime(htmlentities($items['create_at'])));?></td> 				  
                  <td><?php if($items['order_status']==1){ echo "Active";}else{ echo "Deactive";} ?></td>                  
				
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
        "order": [[ 1, "desc" ]]
    } );
} );
</script>