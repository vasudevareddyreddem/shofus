<div class="content-wrapper pad_t100">
    <!-- Content Header (Page header) -->
      <div class="container">
         <!-- Main content -->
      <div class="row">
	  <?php //echo '<pre>';print_r($category_list);exit; ?>
      <div class="box data_box_wid">
            <div class="box-header" style="border-bottom:1px solid #ddd;">
              <h3 class="box-title">Brand List</h3>
              <a class="pull-right btn btn-sm btn-primary" href="<?php echo base_url('inventory/addbrandlogo'); ?>" class="box-title">Add</a>
            </div>
			
            <!-- /.box-header -->
			<?php //echo '<pre>';print_r($sublitem_list);exit;

			?>
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
					<?php if(count($brand_list)>0){ ?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
					<th> Name</th>
					<th> Logo </th>
					<th>Created Date</th>
					<th>Status</th>
					<th>Action</th>
				 </tr>
                </thead>
                <tbody>
                <?php  foreach($brand_list as $item) { ?>
					<tr>                  
						<td><?php echo $item['brand']; ?></a></td>
						<td><img src="<?php echo base_url();?>assets/brands/<?php  echo $item['image']; ?>" width="80" height="50" /></td>
						<td><?php echo $item['create_at']; ?></a></td>
						<td><?php if($item['status']==1){ echo "Active";}else{ echo "Deactive";} ?></td> 
						<td><a href="<?php echo base_url('inventory/brandstatus/'.base64_encode($item['bid']).'/'.base64_encode($item['status'])); ?>"><?php if($item['status']==1){ echo "Active";}else{ echo "Deactive";} ?></a> | <a href="<?php echo base_url('inventory/brandedit/'.base64_encode($item['bid'])); ?>">Edit</a></td>

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

