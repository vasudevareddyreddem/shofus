<div class="content-wrapper pad_t100">
    <!-- Content Header (Page header) -->
      <div class="container">
         <!-- Main content -->
      <div class="row">
	  <?php //echo '<pre>';print_r($category_list);exit; ?>
      <div class="box data_box_wid">
            <div class="box-header" style="border-bottom:1px solid #ddd;">
              <h3 class="box-title">Deals Of The day</h3>
              <!-- <a class="pull-right btn btn-sm btn-primary" href="<?php echo base_url('inventory/categoryadd'); ?>" class="box-title">Add</a> -->
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
					<th>Seller Id</th>
					<th>Seller Name</th>
					<th>Item id</th>
					<th>Item Name</th>
					<th>Item Code</th>
					<th>Item Cost</th>
					<th>Offer percentage </th>					
					<th>Offer type</th>	
					<th>Item Image</th>
					<th>Action</th>
				 </tr>
                </thead>
                <tbody>
                <?php  
                  foreach($top_offers as $top_offer) {?>
                <tr>                  
                  <td><?php echo $top_offer['seller_rand_id']; ?></td>
                  <td><?php echo $top_offer['seller_name']; ?></td>
                  <td><?php echo $top_offer['item_id']; ?></td>
                  <td><?php echo $top_offer['item_name']; ?></td>
                  <td><?php echo $top_offer['item_code']; ?></td>                  
                  <td><?php echo $top_offer['item_cost']; ?></td>
                  <td><?php echo $top_offer['offer_percentage']; ?>%</td>                  
                  <td><?php if($top_offer['offer_type']=='1' ){echo "Listing Discount";}
				        elseif($top_offer['offer_type']=='2' ){ ?><?php echo "Cart Discount"; ?> <?php } 
				        elseif($top_offer['offer_type']=='3'){ ?><?php echo "Flat Price Offer";  ?> <?php }
				        elseif($top_offer['offer_type']=='4'){ ?><?php echo "Combo Disoucnt";  ?> <?php }
				        else{
				          echo "NULL";
				        } ?>                  	
                  </td>
                  <td>
                  <?php if($top_offer['item_image']=='') {?>
                  <img src="<?php echo base_url();?>uploads/profile/default.jpg" width="80" height="50" />                  			
                  <?php }else{ ?>
                  			<img src="<?php echo base_url();?>uploads/products/<?php  echo $top_offer['item_image']; ?>" width="80" height="50" />
                  	<?php } ?>                  	
                  </td>
            		<td>
		                <a style="color: 
				              <?php 
				              	if($top_offer['item_status']=='0')
				              	{echo "Blue";} 
				              	else{echo "Red";}
				              ?>" 
				            href="<?php echo base_url('inventory/topoffersstatus/'.base64_encode($top_offer['item_id']).'/'.base64_encode($top_offer['seller_id']).'/'.base64_encode($top_offer['item_status'])); ?>">
				            <?php if($top_offer['item_status']== '0'){echo "Active";}else{echo "Deactive";} ?>     	
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
