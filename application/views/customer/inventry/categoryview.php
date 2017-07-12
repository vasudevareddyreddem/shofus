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
			<div class="pull-left"><h3 style="padding-bottom:10px;margin:0;color:#c33c12;">Category Details</h3></div>
			<div class="pull-right"><a href="<?php echo base_url('inventory/categorieslist'); ?>" type="button" class="btn btn-warning btn-xs">Back</a></div>
			 <table class="table table-bordered">
					<tbody>
					  <tr>
						<th >Category Name</th>
						<td><?php echo isset($category_details['category_name'])?$category_details['category_name']:''; ?></td>
						
					  </tr> 
					  <tr>
						<th>Commission</th>
						<td><?php echo isset($category_details['commission'])?$category_details['commission']:''; ?></td>
						
					  </tr>
					  <?php if(isset($category_details['documetfile']) && $category_details['documetfile']!=''){  ?><tr>
						<th>Category File</th>
						<td>
						<a href="<?php echo base_url('assets/sellerfile/category/'.$category_details['documetfile']);?>"><?php echo $category_details['documetfile']; ?></a>
						</td>
						
					  </tr>
					  
					  <?php } ?>
					   
					 
					
					  <tr>
						<th >Created date</th>
						<td><?php echo isset($category_details['created_at'])?$category_details['created_at']:''; ?></td>
						
					  </tr> 
					  <tr>
						<th>Status</th>
						<td><?php if($category_details['status']==1){ echo "Active";}else{ echo "Deactive";} ?></td>
						
					  </tr>
					
					 
					
					</tbody>
			</table> 
			<div class="pull-right"><a href="<?php echo base_url('inventory/categoryedit/'.base64_encode($category_details['category_id'])); ?>" type="button" class="btn btn-warning btn-xs">Edit</a></div>
			
		</div>
     

	  </div>
</div>
</div>
