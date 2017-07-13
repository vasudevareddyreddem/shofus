<div class="content-wrapper pad_t100">
    <!-- Content Header (Page header) -->
      <div class="container">
         <!-- Main content -->
      <div class="row">
	  <?php //echo '<pre>';print_r($category_list);exit; ?>
      <div class="box data_box_wid">
            <div class="box-header" style="border-bottom:1px solid #ddd;">
              <h3 class="box-title" >Service Request List</h3>
              <a class="pull-right btn btn-sm btn-primary" href="<?php echo base_url('inventory/dashboard'); ?>" class="box-title">Add</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			<?php if($this->session->flashdata('error')): ?>
					<div class="alert dark alert-warning alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button><?php echo $this->session->flashdata('error');?></div>	
					<?php endif; ?>
						<?php if($this->session->flashdata('success')): ?>
					<div class="alert dark alert-success alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button><?php echo $this->session->flashdata('success');?></div>	
					<?php endif; ?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Service Request Id</th>
                  <th>Service Request Purpose</th>
                  <th>Seller Name</th>
                  <th>Seller Email</th>
                  <th>Seller mobile</th>
                  <th>Action</th>
				  
                </tr>
                </thead>
                <tbody>
                <?php  
                  foreach($seller_details as $details) {?>
                <tr>                  
                  <td><a href="<?php echo base_url('inventory/servicerequestview/'.base64_encode($details['service_id'])); ?>"><?php echo $details['service_id']; ?></a></td>
                  <td><?php echo $details['select_plan']; ?></td>
                  <td><?php echo $details['seller_name']; ?></td>
                  <td><?php echo $details['seller_email']; ?></td>                  
                  <td><?php echo $details['seller_mobile']; ?></td>                  
                  <td><a href="<?php echo base_url('inventory/servicerequestview/'.base64_encode($details['service_id'])); ?>">View</a> |&nbsp;
					<?php if($details['status']==0){  ?>
					<a href="<?php echo base_url('inventory/servicerequestreply/'.base64_encode($details['service_id']).'/'.base64_encode($details['seller_id'])); ?>"><?php if($details['status']==0){ echo "Reply";}else{ echo "Replied";} ?></a></td>
					<?php }else{ ?>
					Replied
					<?php } ?>
                
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