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
			<div class="pull-left"><h3 style="padding-bottom:10px;margin:0;color:#c33c12;">SubCategory Details</h3></div>
			<div class="pull-right"><a href="<?php echo base_url('inventory/subcategorieslist'); ?>" type="button" class="btn btn-warning btn-xs">Back</a></div>
			 <table class="table table-bordered">
					<tbody>
					  <tr>
						<th >SubCategory Name</th>
						<td><?php echo isset($subcategory_details['subcategory_name'])?$subcategory_details['subcategory_name']:''; ?></td>
						
					  </tr> 
					   <tr>
						<th>Commission</th>
						<td><?php echo isset($subcategory_details['commission'])?$subcategory_details['commission']:''; ?></td>
						
					  </tr>
					  <tr>
						<th >Category Name</th>
						<td><?php echo isset($subcategory_details['category_name'])?$subcategory_details['category_name']:''; ?></td>
						
					  </tr> 
					  <tr>
						<th >Created date</th>
						<td><?php echo isset($subcategory_details['created_at'])?$subcategory_details['created_at']:''; ?></td>
						
					  </tr> 
					  <tr>
						<th>Status</th>
						<td><?php if($subcategory_details['status']==1){ echo "Active";}else{ echo "Deactive";} ?></td>
						
					  </tr>
					   <tr>
						<th >Created By</th>
						<td><?php echo isset($subcategory_details['cust_firstname'])?$subcategory_details['cust_firstname']:''; ?>&nbsp;<?php echo isset($subcategory_details['cust_lastname'])?$subcategory_details['cust_lastname']:''; ?></td>
						
					  </tr> 
					
					 
					
					</tbody>
			</table> 
			<div class="pull-right"><a href="<?php echo base_url('inventory/subcategoryedit/'.base64_encode($subcategory_details['subcategory_id'])); ?>" type="button" class="btn btn-warning btn-xs">Edit</a></div>
			
		</div>
     

	  </div>
</div>
</div>
