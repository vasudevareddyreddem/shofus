<div class="content-wrapper pad_t100">
    <!-- Content Header (Page header) -->
      <div class="container">
         <!-- Main content -->
      <div class="row">
	  <?php //echo '<pre>';print_r($category_list);exit; ?>
      <div class="box data_box_wid">
            <div class="box-header" style="border-bottom:1px solid #ddd;">
              <h3 class="box-title">Middle home page Banners List</h3>
              <a class="pull-right btn btn-sm btn-primary" href="<?php echo base_url('inventory/addmiddlehomebanners'); ?>" class="box-title">Add</a>
            </div>
			
            <div class="box-body">
			<?php if($this->session->flashdata('success')): ?>
					<div class="alert dark alert-success alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button><?php echo $this->session->flashdata('success');?></div>	
					<?php endif; ?>
					<?php if($this->session->flashdata('error')): ?>
					<div class="alert dark alert-warning alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button><?php echo $this->session->flashdata('error');?></div>	
					<?php endif; ?>
					
		<?php if(count($bannerslist)>0){ ?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
					<th>Store Name</th>
					<th>Name</th>
					<th>Image</th>
					<th>Category page Position</th>
					<th>Link Page</th>
					<th>Created Date</th>
					<th>Expiry Date</th>
					<th>Seller Image Status</th>
					<th>Home page Status</th>
				 </tr>
                </thead>
                <tbody>
                <?php  foreach($bannerslist as $banner) { ?>
                <tr>                  
                  <td><?php if($banner['store_name']!=''){ echo $banner['store_name']; } else{ echo "Inventory"; } ?></td>
                  <td><?php echo $banner['name']; ?></td>
		          <td><img src="<?php echo base_url();?>assets/homebanners/<?php  echo $banner['name']; ?>" width="80" height="50" /></td>

                  <td><?php if($banner['position']==1){
					  echo "First position";
					  }else if($banner['position']==2){
						  echo "Second position"; 
					  }else if($banner['position']==3){
						  echo "third position"; 
					  }else if($banner['position']==4){
						  echo "Fourth position"; 
					  } ?></td><td><?php if($banner['link']==1){
					  echo "Category";
					  }else if($banner['link']==2){
						  echo "Subcategory"; 
					  }else if($banner['link']==3){
						  echo "Subitem"; 
					  }else if($banner['link']==4){
						  echo "Item"; 
					  }else if($banner['link']==5){
						  echo "Single Product"; 
					  } ?></td>
					   <td><?php echo $banner['created_at']; ?></td>
                  <td><?php echo $banner['expirydate']; ?></td>
                  <td><?php if($banner['status']==1){ echo "Active";}else{ echo "Deactive";} ?></td>                  
				   <td><a href="<?php echo base_url('inventory/homepagemiddlebannerstatus/'.base64_encode($banner['baneer_id']).'/'.base64_encode($banner['admin_status']).'/'.base64_encode($banner['position'])); ?>"><?php if($banner['admin_status']==1){ echo "Active";}else{ echo "Deactive";} ?></a></td>

                 </tr>
				<?php } ?>
                </tbody>              
              </table>
			  <?php }else{ ?>
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

