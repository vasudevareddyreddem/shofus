<div class="content-wrapper pad_t100">
    <!-- Content Header (Page header) -->
      <div class="container">
         <!-- Main content -->
      <div class="row">
	  <?php //echo '<pre>';print_r($category_list);exit; ?>
      <div class="box data_box_wid">
            <div class="box-header" style="border-bottom:1px solid #ddd;">
              <h3 class="box-title">Category List</h3>
              <a class="pull-right btn btn-sm btn-primary" href="<?php echo base_url('inventory/categoryadd'); ?>" class="box-title">Add</a>
            </div>
			
            <!-- /.box-header -->
            <div class="box-body">
			<?php if($this->session->flashdata('success')): ?>
					<div class="alert dark alert-success alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button><?php echo $this->session->flashdata('success');?></div>	
					<?php endif; ?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
					<th>Category Name</th>
					<th>Commission</th>
					<th>Created Date</th>
					<th>Status</th>
					<th>Action</th>
				 </tr>
                </thead>
                <tbody>
                <?php  
                  foreach($category_list as $catlist) {?>
                <tr>                  
                  <td><a href="<?php echo base_url('inventory/categoryview/'.base64_encode($catlist['category_id'])); ?>"><?php echo $catlist['category_name']; ?></a></td>
                  <td><?php if($catlist['commission']!=0 && $catlist['commission']!='' ){ echo $catlist['commission']; } else { echo "";} ?></td>
				  <td><?php echo $catlist['created_at']; ?></td>    
                  <td><?php if($catlist['status']==1){ echo "Active";}else{ echo "Deactive";} ?></td>                  
				<td>
				<a href="<?php echo base_url('inventory/categoryview/'.base64_encode($catlist['category_id'])); ?>">View</a> | &nbsp;
				<a href="<?php echo base_url('inventory/categoryedit/'.base64_encode($catlist['category_id'])); ?>">Edit</a> | &nbsp;
					<a href="<?php echo base_url('inventory/categorystatus/'.base64_encode($catlist['category_id']).'/'.base64_encode($catlist['status'])); ?>"><?php if($catlist['status']==1){ echo "Active";}else{ echo "Deactive";} ?></a>
				</td>
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
