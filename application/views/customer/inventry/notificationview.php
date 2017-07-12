<style>
	.detail_ta th{
		width:40%;
	}
	.detail_ta {
		background-color:#fff;
	}
</style>
<div class="content-wrapper" style="padding-top:80px;">

    <!-- Content Header (Page header) -->
      <div class="container">
         <!-- Main content -->
      <div class="row">
		<div class="col-md-6 well detail_ta col-md-offset-3">
			<div class="pull-left"><h3 style="padding-bottom:10px;margin:0;color:#c33c12;">Notification Details</h3></div>
			<div class="pull-right"><a href="<?php echo base_url('inventory/sellernotifications'); ?>" type="button" class="btn btn-warning btn-xs">Back</a></div>
			 <table class="table table-bordered">
					<tbody>
					  <tr>
						<th >Seller Id</th>
						<td><?php echo isset($notification_details['seller_rand_id'])?$notification_details['seller_rand_id']:''; ?></td>
						
					  </tr> 
					  <tr>
						<th >Notification Purpose</th>
						<td><?php echo isset($notification_details['select_plan'])?$notification_details['select_plan']:''; ?></td>
						
					  </tr>
					   <tr>
						<th >Seller Name</th>
						<td><?php echo isset($notification_details['seller_name'])?$notification_details['seller_name']:''; ?></td>
						
					  </tr>
					  <tr>
						<th >Seller Email</th>
						<td><?php echo isset($notification_details['seller_email'])?$notification_details['seller_email']:''; ?></td>
						
					  </tr> 
					  <tr>
						<th >Seller Mobile</th>
						<td><?php echo isset($notification_details['seller_mobile'])?$notification_details['seller_mobile']:''; ?></td>
						
					  </tr> 
					  <tr>
						<th >Created date</th>
						<td><?php echo isset($notification_details['created_at'])?$notification_details['created_at']:''; ?></td>
						
					  </tr> 
					  <tr>
						<th >Status</th>
						<td><?php if($notification_details['status']==1){ echo "Replied";}else{echo "Replay";} ?></td>
						
					  </tr>
					
					 
					
					</tbody>
			</table> 
			<?php if($notification_details['status']==0) { ?>
			<div class="pull-right"><a href="<?php echo base_url('inventory/notificationreply/'.base64_encode($notification_details['service_id']).'/'.base64_encode($notification_details['seller_id'])); ?>" type="button" class="btn btn-warning btn-xs">Replay</a></div>
			<?php }  ?>
			
		</div>
     

	  </div>
</div>
</div>
