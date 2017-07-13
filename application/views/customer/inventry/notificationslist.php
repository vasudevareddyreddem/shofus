<div class="content-wrapper pad_t100">
    <!-- Content Header (Page header) -->
      <div class="container">
         <!-- Main content -->
      <div class="row">
	  <?php //echo '<pre>';print_r($category_list);exit; ?>
      <div class="box data_box_wid">
            <div class="box-header" style="border-bottom:1px solid #ddd;">
              <h3 class="box-title" >Notification List</h3>
              <a class="pull-right btn btn-sm btn-primary" href="<?php echo base_url('inventory/dashboard'); ?>" class="box-title">Back</a>
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
                  <th>Seller Id</th>
                  <th>Seller Name</th>
                  <th>Subject</th>
                  <th>Message</th>
                  <th>Date</th>
                  <th>Action</th>
				  
                </tr>
                </thead>
                <tbody>
                <?php  
                  foreach($notification_details as $details) {?>
                <tr>                  
                <td><?php echo $details['seller_rand_id']; ?></td>
                <td><?php echo $details['seller_name']; ?></td>
                <td><?php echo $details['subject']; ?></td>
                <td><?php echo $details['seller_message']; ?></td>
				<td><?php echo Date('d-M-Y',strtotime(htmlentities($details['created_at'])));?></td>
                <td><a href="<?php echo base_url('inventory/notificationview/'.base64_encode($details['seller_id'])); ?>"><?php echo $details['message_type']; ?></a></td>
                
                </tr>
                 <?php }?>
                </tbody>              
                </table> <br><br><br>
            </div>
            <!-- /.box-body -->
          </div>

</div>
</div>
</div>
