<div class="content-wrapper pad_t100">
    <!-- Content Header (Page header) -->
      <div class="container">
         <!-- Main content -->
      <div class="row">
      <div class="box data_box_wid">
            <div class="box-header">
              <h3 class="box-title">Seller List</h3>
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
                  <th>Seller Email</th>
                  <th>Seller mobile</th>
                  <th>Status</th>
                  <th>Action</th>
				</tr>
                </thead>
                <tbody>
                <?php  
                  foreach($seller_details as $details) {?>
						  <?php if($details['readcount']==0){ ?>
								<tr style="background: darkseagreen none repeat scroll 0% 0%; color: white;">                   
								  <td><a href="<?php echo base_url('inventory/sellerdetails/'.base64_encode($details['seller_id'])); ?>"><?php echo $details['seller_rand_id']; ?></a></td>
								  <td><?php echo $details['seller_name']; ?></td>
								  <td><?php echo $details['seller_email']; ?></td>                  
								  <td><?php echo $details['seller_mobile']; ?></td>                  
								  <td><?php if($details['status']==1){ echo "Active";}else{ echo "Deactive";} ?></td>                
								  <td><a href="<?php echo base_url('inventory/sellerdetails/'.base64_encode($details['seller_id'])); ?>">View</a> |&nbsp;
									<a href="<?php echo base_url('inventory/status/'.base64_encode($details['seller_id']).'/'.base64_encode($details['status'])); ?>"><?php if($details['status']==1){ echo "Active";}else{ echo "Deactive";} ?></a></td>
								
								</tr>
						  <?php } else{ ?>
								<tr>                  
								  <td><a href="<?php echo base_url('inventory/sellerdetails/'.base64_encode($details['seller_id'])); ?>"><?php echo $details['seller_rand_id']; ?></a></td>
								  <td><?php echo $details['seller_name']; ?></td>
								  <td><?php echo $details['seller_email']; ?></td>                  
								  <td><?php echo $details['seller_mobile']; ?></td>                  
								  <td><?php if($details['status']==1){ echo "Active";}else{ echo "Deactive";} ?></td>                
								  <td><a href="<?php echo base_url('inventory/sellerdetails/'.base64_encode($details['seller_id'])); ?>">View</a> |&nbsp;
									<a href="<?php echo base_url('inventory/status/'.base64_encode($details['seller_id']).'/'.base64_encode($details['status'])); ?>"><?php if($details['status']==1){ echo "Active";}else{ echo "Deactive";} ?></a></td>
								
								</tr>
						  <?php }  ?>
                 <?php }?>
                </tbody>              
              </table>
             
            </div>
            <!-- /.box-body -->
          </div>

</div>
</div>
</div><br><br>
