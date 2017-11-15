<div class="content-wrapper pad_t100">
    <!-- Content Header (Page header) -->
      <div class="container">
         <!-- Main content -->
      <div class="row">
	  <?php //echo '<pre>';print_r($category_list);exit; ?>
      <div class="box data_box_wid">
            <div class="box-header" style="border-bottom:1px solid #ddd;">
              <h3 class="box-title">Total orders List (<?php if(isset($orderslists) && count($orderslists)>0){echo count($orderslists); } ?>)</h3>
              <a class="pull-right btn btn-sm btn-primary" href="<?php echo base_url('inventory/categoryadd'); ?>" class="box-title">Add</a>
            </div>
			
            <!-- /.box-header -->
			<?php //echo '<pre>';print_r($category_list);exit;

			?>
            <div class="box-body">
			<?php if($this->session->flashdata('success')): ?>
					<div class="alert dark alert-success alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button><?php echo $this->session->flashdata('success');?></div>	
					<?php endif; ?>
					<?php 	if(count($orderslists)>0){ ?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
					<th>Order Id</th>
					<th>Order Item Id</th>
					<th>Qty</th>
					<th>Amount</th>
					<th>Customer Name</th>
					<th>Customer Mobile Number</th>
					<th>Billng name</th>
					<th>Billng Mobile Number</th>
					<th>Payment Type</th>
					<th>Store Name</th>
					<th>Order Date</th>
				 </tr>
                </thead>
                <tbody>
                <?php 
							
                  foreach($orderslists as $list) { ?>
                <tr>                  
                 <td><?php echo isset($list['order_id'])?$list['order_id']:''; ?></td>
                 <td><?php echo isset($list['order_item_id'])?$list['order_item_id']:''; ?></td>
                 <td><?php echo isset($list['qty'])?$list['qty']:''; ?></td>
                 <td><?php echo isset($list['total_price'])?$list['total_price']:''; ?></td>
				 <td><?php echo isset($list['cust_firstname'])?$list['cust_firstname']:''; ?>&nbsp;<?php echo isset($list['cust_lastname'])?$list['cust_lastname']:''; ?></td>
				<td><?php echo isset($list['cust_mobile'])?$list['cust_mobile']:''; ?></td>
				<td><?php echo isset($list['billingname'])?$list['billingname']:''; ?></td>
				<td><?php echo isset($list['billingmobile'])?$list['billingmobile']:''; ?></td>
				<td>
				<?php echo if($list['payment_type']){
					
				}
					?>
				</td>
				<td><?php echo isset($list['store_name'])?$list['store_name']:''; ?></td>
				<td><?php echo isset($list['create_at'])?$list['create_at']:''; ?></td>
				 </tr>
				<?php } ?>
                </tbody>              
              </table>
			  <?php } else{?>
				<p>No data available</p>
				<?php } ?>
             
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

