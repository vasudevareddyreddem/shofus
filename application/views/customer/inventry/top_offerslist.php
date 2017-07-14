<div class="content-wrapper pad_t100">
    <!-- Content Header (Page header) -->
      <div class="container">
         <!-- Main content -->
      <div class="row">
	  <?php //echo '<pre>';print_r($category_list);exit; ?>
      <div class="box data_box_wid">
            <div class="box-header" style="border-bottom:1px solid #ddd;">
              <h3 class="box-title">Top offers List</h3>
              <a class="pull-right btn btn-sm btn-primary" href="<?php echo base_url('inventory/topoffers'); ?>" class="box-title">Back</a>
            </div>
			
            <!-- /.box-header -->
            <div class="box-body">
			<?php if($this->session->flashdata('active')): ?>
					<div class="alert dark alert-success alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button><?php echo $this->session->flashdata('active');?></div>	
					<?php endif; ?>
          <?php if($this->session->flashdata('deactive')): ?>
          <div class="alert dark alert-warning alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button><?php echo $this->session->flashdata('deactive');?></div>  
          <?php endif; ?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
        					<th>Item id</th>
        					<th>Item Name</th>
        					<th>Item Price</th>
        					<th>Offer amount</th>
        					<th>Offer percentage</th>
                  <th>Start Date</th>	
                  <th>End Date</th>				
        					<th>Item Image</th>
                  <th>Status</th>
        					<th>Action</th>
        				</tr>
                </thead>
                <tbody>
                <?php  
                  foreach($top_offerslist as $top_offer) {?>
                <tr>                                    
                  <td><?php echo $top_offer['item_id']; ?></td>
                  <td><?php echo $top_offer['item_name']; ?></td>
                  <td><?php echo $top_offer['item_pirce']; ?></td>                  
                  <td><?php echo $top_offer['offer_amount']; ?></td>
                  <td><?php echo $top_offer['offer_percentage']; ?>%</td>
                  <td><?php echo $top_offer['intialdate'];?></td> 
                  <td><?php echo $top_offer['expairdate'];?></td>                 
                  <td>
                  <?php if($top_offer['item_image']=='') {?>
                  <img src="<?php echo base_url();?>uploads/profile/default.jpg" width="80" height="50" />                  			
                  <?php }else{ ?>
                  			<img src="<?php echo base_url();?>uploads/products/<?php  echo $top_offer['item_image']; ?>" width="80" height="50" />
                  	<?php } ?>                  	
                  </td>
                  <td><?php if($top_offer['status']==0){ echo "Deactive";}else{ echo "Active";} ?></td>                  
            		<td>
		                <a style="color: 
				              <?php 
				              	if($top_offer['status']=='0')
				              	{echo "Blue";} 
				              	else{echo "Red";}
				              ?>" 
				            href="<?php echo base_url('inventory/topoffersstatus/'
                    .base64_encode($top_offer['top_offer_id']).'/'
                    .base64_encode($top_offer['item_id']).'/'
                    .base64_encode($top_offer['seller_id']).'/'
                    .base64_encode($top_offer['status'])); ?>">
				            <?php if($top_offer['status']== '0'){echo "Active";}else{echo "Deactive";} ?>     	
				        </a>
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
