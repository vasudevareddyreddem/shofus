
<div class="" style="padding-bottom:20px;margin-top:-20px">
	<!--<img class="img-responsive" src="<?php echo base_url(); ?>assets/home/images/ban_list.png" />-->
	<img class="img-responsive" src="<?php echo base_url(); ?>assets/home/images/nearbystores.png" />
</div>
<div class="container">
	<div class="row">
	<?php foreach ($seller_cat_list as $list){  ?>
	<div class="col-md-3 col-sm-4">
      <div class="wrimagecard wrimagecard-topimage">
          <a href="<?php echo base_url('category/subcategoryview/'.base64_encode($list['seller_category_id']).'/'.base64_encode($list['seller_id'])); ?>">
        
          <div class="pad_10 text-center bord_ri">
            <h4><?php echo $list['category_name']; ?></h4>
		  </div>
          </div>
          
        </a>
      </div>
	  
	<?php } ?>
	  
	 
	
	  
	  
	 
	</div>
</div>
</div>
<div style="margin-top:150px;" class="clearfix">&nbsp;</div>