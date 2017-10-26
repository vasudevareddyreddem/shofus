<style>
.card {
 -webkit-box-shadow: 0px 0px 5px 2px rgba(221,221,221,1);
-moz-box-shadow: 0px 0px 5px 2px rgba(221,221,221,1);
box-shadow: 0px 0px 5px 2px rgba(221,221,221,1);
}
</style>
<div class=" container">
	<div class="row">
	<?php //echo '<pre>';print_r($seller_list);exit;?>
	<?php  if(count($seller_list)>0){
		$cnt=1;foreach($seller_list as $lists){
			//echo '<pre>';print_r($lists);exit;
			?>
				
				<a href="<?php echo base_url('customer/productlist/'.base64_encode($lists['seller_id']));?>">
				<div class="col-md-6 " style="padding:10px" >
					<div class=" card"  >
					  <div class="media">
						<div class="media-left" style="padding:10px 10px;">
						<img class=" thumbnail media-object" style="width:80px" src="<?php echo base_url(); ?>assets/home/images/shop.png" />
						 
						</div>
						<div class="media-body" style="padding:5px 10px;">
						  <h4 class="media-heading"><?php echo $lists['store_name']; ?>&nbsp; (Location :<?php echo $lists['location_name']; ?>)</h4>
							<p> <?php foreach ($lists['categories'] as $list){ 
							//echo '<pre>';print_r($list );
							echo $list['category_name'].' ';

							}?> </p>
							<div style="border-top:1px solid #ddd;padding:4px">&nbsp;</div>
								
									<div class="rating pull-left">
									<i class="fa fa-star"></i><span class="text-primary"><?php echo number_format($lists['avg']['avg'], 2, '.', ''); ?></span>
								   
								  </div>
								  <!--<div class="pull-right" style="padding-right:20px;">
									Dist: &nbsp;5km
								  </div>-->
					  
						</div>
					  </div>
					</div>
					</div>
					</a>
					 <?php  
			if(($cnt % 2)==0){?> 
			<div class="clearfix"></div>
			<?php } ?>
				
					
			
			
	
	<?php $cnt++;} ?>
	<?php }else{ ?>
		<div>No Stores are available. Please  change location search</div>

	<?php }	?>
		
	
		
			
			<div class="clearfix"> &nbsp;</div>
			
			
			
		
			
			
			
	</div>
	</div>

<div style="margin-top:150px;" class="clearfix">&nbsp;</div>