<div class="content-wrapper pad_t100">
    <!-- Content Header (Page header) -->
      <div class="container">
         <!-- Main content -->
      <div class="row">
	  <?php //echo '<pre>';print_r($category_list);exit; ?>
      <div class="box data_box_wid">
            <div class="box-header" style="border-bottom:1px solid #ddd;">
              <h3 class="box-title">Top Offers</h3>
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
          <th>Item Id</th>
					<th>Count</th>
				 </tr>
                </thead>
                <tbody>
                <?php  
                  foreach($top_offers as $top_offer) {?>
                <tr>                  
                  <td><?php echo $top_offer['seller_rand_id']; ?></td>
                  <td><?php echo $top_offer['seller_name']; ?></td>
                  <td><?php echo $top_offer['item_id']; ?></td>
                  <td><a href="<?php echo base_url('inventory/topofferslist/'.base64_encode($top_offer['seller_id'])); ?>"><?php echo $top_offer['topcount']; ?></td>
                  
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
