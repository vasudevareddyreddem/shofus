<div class="content-wrapper pad_t100">
    <!-- Content Header (Page header) -->
      <div class="container">
         <!-- Main content -->
      <div class="row">
	  <?php //echo '<pre>';print_r($category_list);exit; ?>
      <div class="box data_box_wid">
            <div class="box-header" style="border-bottom:1px solid #ddd;">
              <h3 class="box-title">Sub Item List</h3>
              <a class="pull-right btn btn-sm btn-primary" href="<?php echo base_url('inventory/subitemadd'); ?>" class="box-title">Add</a>
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
					<?php if(count($sublitem_list)>0){ ?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
					<th>Category Name</th>
					<th>Subcategory Name</th>
					<th>Sub Item Name</th>
					<th>Created Date</th>
					<th>Status</th>
					<th>Action</th>
				 </tr>
                </thead>
                <tbody>
                <?php 
							
                  foreach($sublitem_list as $subitem) { ?>
                <tr>                  
                <td><?php echo $subitem['category_name']; ?></a></td>
					 <td><?php echo $subitem['subcategory_name']; ?></a></td>
					 <td><?php echo $subitem['subitem_name']; ?></a></td>
					 <td><?php echo $subitem['created_at']; ?></a></td>
						<td><a href="<?php echo base_url('inventory/subitemstatus/'.base64_encode($subitem['subitem_id']).'/'.base64_encode($subitem['status'])); ?>"><?php if($subitem['status']==1){ echo "Active";}else{ echo "Deactive";} ?></a></td>
					 <td><a href="<?php echo base_url('inventory/addsubitemedit/'.base64_encode($subitem['subitem_id'])); ?>">Edit</a></td>

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

