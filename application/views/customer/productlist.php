<style>
.wrimagecard{	
	margin-top: 0;
    margin-bottom: 1.5rem;
    text-align: left;
    position: relative;
    background: #fff;
    box-shadow: 12px 15px 20px 0px rgba(46,61,73,0.15);
    border-radius:0px 10px 10px 0px;
    transition: all 0.3s ease;
}


.pad_10{
padding: 10px;
}
a.wrimagecard:hover, .wrimagecard-topimage:hover {
    box-shadow: 2px 4px 8px 0px rgba(46,61,73,0.2);
}
.bord_ri{
	border-left:5px solid #009688;
	
	}
</style>
<div class="" style="padding-bottom:20px;margin-top:-20px">
	<!--<img class="img-responsive" src="<?php echo base_url(); ?>assets/home/images/ban_list.png" />-->
	<img class="img-responsive" src="http://www.eautoappraise.com/wp-content/uploads/eAutoAppraise-2000x400.jpg" />
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