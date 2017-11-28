<style>
.card {
 -webkit-box-shadow: 0px 0px 5px 2px rgba(221,221,221,1);
-moz-box-shadow: 0px 0px 5px 2px rgba(221,221,221,1);
box-shadow: 0px 0px 5px 2px rgba(221,221,221,1);
}

</style>
<div class=" container mar_res_t150">
 <div class="bac_n_l " style="border:1px solid #ddd;height:220px;">
	 <form  onSubmit="return validations();" action="<?php echo base_url('customer/nearstores'); ?>" method="post" >
        <div class="form-group"  >
		<?php if($this->session->userdata('location_area')!=''){ ?>
			<div class="row">
			<div class="col-md-12" style="border-bottom:1px solid #ddd;
			background:#009688;padding:10px;color:#fff; ">
				<label >Selected locations </label> &nbsp;<span id="selectedlocation"> : &nbsp;<b class=""><?php echo $this->session->userdata('location_area'); ?></b> </span>
			</div>
			</div>
			<!--<hr>-->
			<div class="clearfix"> &nbsp;</div>
		<?php } ?>
			<div class="row" >
			<div class="col-md-4 col-xs-8  col-md-offset-3">
			<div class="">
			  <label >Select Your  Shop location</label>
		  
          <select style="border-radius:0"data-placeholder="select your nearest area"  name="locationarea[]" id="locationarea" multiple  class="chosen-select" tabindex="1">
              <option value=""></option>
              <?php foreach($locationdata as $location_data) {?>
			  <option value="<?php echo $location_data['location_id']; ?>"><?php echo $location_data['location_name']; ?></option>
          	<?php }  ?>
            </select>
			<span id="locationmsg"></span>
			<button  type="submit" id="formsubmmition" class="btn btn-primary btn_near_s">Submit</button>
	
			</div>
			</div>
			</div>
        </div>
      </form>
	  <div class="clearfix"></div>
</div>
	<div class="row mar_t20" >
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
							echo $list['category_name'].',';

							}?> </p>
							<div style="border-top:1px solid #ddd;padding:4px">&nbsp;</div>
								
									<div class="rating pull-left">
									<i class="fa fa-star"></i><span class="text-primary"><?php echo number_format($lists['avg']['avg'], 2, '.', ''); ?></span>
								   
								  </div>
								 
					  
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