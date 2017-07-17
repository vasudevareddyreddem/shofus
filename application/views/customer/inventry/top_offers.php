<div class="content-wrapper pad_t100">
    <!-- Content Header (Page header) -->
      <div class="container">
         <!-- Main content -->
      <div class="row">
    <?php //echo '<pre>';print_r($category_list);exit; ?>
      <div class="box data_box_wid">
            <div class="box-header" style="border-bottom:1px solid #ddd;">
              <h3 class="box-title">Top Offers Item</h3>
              <!-- <a class="pull-right btn btn-sm btn-primary" href="<?php echo base_url('inventory/categoryadd'); ?>" class="box-title">Add</a> -->
            </div>
      
            <!-- /.box-header -->
            <div class="box-body">
      <?php if($this->session->flashdata('success')): ?>
          <div class="alert dark alert-success alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button><?php echo $this->session->flashdata('success');?></div> 
          <?php endif; ?>
          <?php   //echo '<pre>';print_r($season_sales);exit; ?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
          <th>Seller Id</th>
          <th>Seller Name</th>
          <th>ItemsCount</th>
          <th>Action</th>
         </tr>
                </thead>
                <tbody>
                <?php   foreach($top_offers as $offer) {?>
				<tr>                  
				<td><a href="<?php echo base_url('inventory/sellerdetails/'.base64_encode($offer['seller_id']).'/'.'topoffers'); ?>"><?php echo $offer['seller_rand_id']; ?></a></td>    
				<td><?php echo $offer['seller_name']; ?></td>
				<td><a href="<?php echo base_url('inventory/sellertopoffresdetails/'.base64_encode($offer['seller_id'])); ?>"><?php echo $offer['itemscount']; ?><?php if($offer['count'][0]['activecount']!=0){ ?>&nbsp;<span style="color:darkslateblue;">(<?php  echo $offer['count'][0]['activecount'];  ?> &nbsp; Item active)</span><?php }  ?></a></td>
				<td><a href="<?php echo base_url('inventory/overaall_topoffers_home_page_status/'.base64_encode($offer['seller_id']).'/'.base64_encode(0)); ?>">All Active</a> &nbsp; | &nbsp;
				<a href="<?php echo base_url('inventory/overaall_topoffers_home_page_status/'.base64_encode($offer['seller_id']).'/'.base64_encode(1)); ?>">All Deactive</a></td>

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
