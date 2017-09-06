<style>
.card {
 -webkit-box-shadow: 0px 0px 5px 2px rgba(221,221,221,1);
-moz-box-shadow: 0px 0px 5px 2px rgba(221,221,221,1);
box-shadow: 0px 0px 5px 2px rgba(221,221,221,1);
}
</style>
<div class=" container">
	<div class="row">
	<?php //echo '<pre>';print_r($seller_list);exit; ?>
	<?php 
	
	
	
	foreach($seller_list as $lists){ ?>
		<?php if(count($lists)>0){ ?>
		<?php $cnt=1;foreach($lists as $ls){ ?>
				
				<a href="<?php echo base_url('customer/productlist/'.base64_encode($ls['seller_id']));?>">
				<div class="col-md-6 " >
					<div class=" card"  >
					  <div class="media">
						<div class="media-left" style="padding:10px 10px;">
						<img class=" thumbnail media-object" style="width:80px" src="<?php echo base_url(); ?>assets/home/images/shop.png" />
						 
						</div>
						<div class="media-body" style="padding:5px 10px;">
						  <h4 class="media-heading"><?php echo $ls['seller_name']; ?></h4>
							<p> <?php foreach ($ls['catergories'] as $list){ 
							echo $list['category_name'].',';

							}?> </p>
							<div style="border-top:1px solid #ddd;padding:4px">&nbsp;</div>
								
									<div class="rating pull-left">
									<i class="fa fa-star"></i><span class="text-primary"><?php echo number_format($ls['average']['avg'], 2, '.', ''); ?></span>
								   
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
		   
		  <?php  $cnt++;} ?>
		  
		<?php }else{  ?>
			<div>No Stores are available. Please  change location search</div>

		<?php } ?>
		
		<?php }?>
		
	
		
			
			<div class="clearfix"> &nbsp;</div>
			
			
			
		
			
			
			
	</div>
	</div>

<div style="margin-top:50px;" class="clearfix">&nbsp;</div>