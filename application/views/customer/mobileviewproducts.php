<style>
.mobile_wish{
color:#009688 !important;	
}
.mobile_wish_remove{
color:#eee !important;	
}

</style>
<!--filters-->
			<div class="container pos_re">
		
			<div class="filter_btn">
			<a  data-toggle="modal" data-target="#myModal">
				<span  style="padding:10px;border-radius:50%;" class="glyphicon glyphicon-filter  bg-primary"></span><span style="color:#fff;"> Filters</span>
			</a>
			</div>
		
			
			
			 <div class="modal animated slideInLeft"  style="" id="myModal" role="dialog">
				<div class="modal-dialog">
				
				
				  <div class="modal-content">
				  <form action="<?php echo base_url('category/mobileviewfilers'); ?>" method="post" >
					<div class="modal-header bg-primary">
					  <button type="button" class="close" data-dismiss="modal">&times;</button>
					  <h4 class="modal-title">Filters</h4>
					</div>
					<div class="modal-body">
				   <div class="example">
					  <h3 class="text-left pad_0"style="padding:0;margin:0z">Price</h3>
					  <div id="html6"  name="html6" onclick="" class="noUi-target noUi-ltr noUi-horizontal">
					  </div>
					  <select id="input-select1" onchange="" name="min_amount" >
						 <?php for( $i=floor($minimum_price['item_cost']); $i<=floor($maximum_price['item_cost']); $i+=500 ){  ?>
						 <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
						 <?php } ?>
					  </select>
					  <input type="text" readonly="true" name="max_amount"   step="1" id="input-number1">
				   </div>
				   <input type="hidden" name="categoryid" id="categoryid" value="<?php echo isset($categoryid)?$categoryid:'';?>">
				   <input type="hidden" name="subcategory_id" id="subcategory_id" value="<?php echo isset($subcategory_id)?$subcategory_id:'';?>">
	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                  
  <div class="panel panel-primary">
	 <?php if(count($brand_list)>0){ ?>
	 <div class="panel-heading" role="tab" id="headingThreesm">
		<h4 class="panel-title">
		   <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThreesm" aria-expanded="false" aria-controls="collapseThreesm">
		   BRAND	
		   </a>
		</h4>
	 </div>
	 <div id="collapseThreesm" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThreesm">
		<div class="panel-body">
		    <?php foreach ($brand_list as $list){ ?>
		   <div class="checkbox">
		   <label>
			<input type="checkbox"  id="brand" name="brand[]" value="<?php echo $list['brand']; ?>">
				<span>&nbsp; <?php echo $list['brand']; ?></span>
		   </label>
		   </div>
			<?php } ?>
		   
		  
		</div>
	</div>
	 <?php } ?>
  <div class="panel panel-primary">
	  <?php if(count($offer_list)>0){ ?>
	 <div class="panel-heading" role="tab" id="headingThreesm1">
		<h4 class="panel-title">
		   <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThreesm1" aria-expanded="false" aria-controls="collapseThreesm">
		   Offer	
		   </a>
		</h4>
	 </div>
	  <div id="collapseThreesm1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThreesm1">
		<div class="panel-body">
		    <?php foreach ($offer_list as $list){ ?>
		   <div class="checkbox">
		   <label>
			<input type="checkbox"  id="offers" name="offers[]" value="<?php echo number_format($list['offers'], 2); ?>">
				<span>&nbsp; <?php echo number_format($list['offers'], 2); ?></span>
		   </label>
		   </div>
			<?php } ?>
		   
		  
		</div>
	</div>
	  <?php } ?>
	  <?php if(count($color_list)>0){ ?>
	 <div class="panel-heading" role="tab" id="headingThreesm2">
		<h4 class="panel-title">
		   <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThreesm2" aria-expanded="false" aria-controls="collapseThreesm">
		   Color	
		   </a>
		</h4>
	 </div>
	  <div id="collapseThreesm2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThreesm2">
		<div class="panel-body">
		    <?php foreach ($color_list as $list){ ?>
		   <div class="checkbox">
		   <label>
			<input type="checkbox"  id="colors" name="colors[]" value="<?php echo $list['color_name']; ?>">
				<span>&nbsp; <?php echo $list['color_name']; ?></span>
		   </label>
		   </div>
			<?php } ?>
		   
		  
		</div>
	</div>
	  <?php } ?>
	 
	 </div>
	 
  </div>
</div>

					</div>
					<div class="modal-footer">
					  <button type="submit	" onclick ="mobilewiewfilter()" class="btn btn-default" >Submit</button>
					</div>
					</form>
				  </div>
				  
				</div>
			  </div>
				
		  
				</div>
			  <div id="sucessmsg" style="display:none;"></div>
			 
			 
			 
			  <div class="container bg-primary pad_t15 mar_t_m_30">
			  <?php if($product_list){ ?>
			  <?php 
			   $customerdetails=$this->session->userdata('userdetails');
				$cnt=1;foreach ($product_list as $productslist){

				$currentdate=date('Y-m-d h:i:s A');
				if($productslist['offer_expairdate']>=$currentdate){
				$item_price= ($productslist['item_cost']-$productslist['offer_amount']);
				$percentage= $productslist['offer_percentage'];
				$orginal_price=$productslist['item_cost'];
				}else{
					//echo "expired";
					$item_price= $productslist['special_price'];
					$prices= ($productslist['item_cost']-$productslist['special_price']);
					$percentage= (($prices) /$productslist['item_cost'])*100;
					$orginal_price=$productslist['item_cost'];
				}
			  ?>
			  <div class=" card_mob">
					<div class="col-xs-3" style="border-right:1px solid #f1f1f1">
						<img class="img-responsive img_res_mob_sub" src="<?php echo base_url('uploads/products/'.$productslist['item_image']); ?>">
					</div>
					<div class="col-xs-9">
						<h6><a href="<?php echo base_url('category/productview/'.base64_encode($productslist['item_id'])); ?>"><?php echo $productslist['item_name']; ?></a></h6>
						<div class="" style="color:#187a7d;">₹ <?php echo number_format($orginal_price, 2); ?> 
							&nbsp;
							<span class="price-old">₹ <?php echo number_format($item_price, 2 ); ?></span>
							<span class="label-tags"><p class=" text-success"> <?php echo number_format($percentage, 2, '.', ''); ?>% off</p></span>
                       </div>
					   <div class="rating " style="color:#222">
							<?php if(count($avg_count)>0){foreach ($avg_count as $li){
				$idslist[]=$li['item_id'];			
				if($productslist['item_id']==$li['item_id']){?>
				<?php if(round($li['avg'])==1){  ?>
					    <i class="fa fa-star product-rateing"> </i>
						<i class="fa fa-star product-ratings"></i>
						<i class="fa fa-star product-ratings"></i>
						<i class="fa fa-star product-ratings"></i>
						<i class="fa fa-star product-ratings"></i>
					 	<?php }else if(round($li['avg'])==2){  ?>
							<i class="fa fa-star product-rateing"> </i>
							<i class="fa fa-star product-rateing"> </i>
							<i class="fa fa-star product-ratings"> </i>
							<i class="fa fa-star product-ratings"> </i>
							<i class="fa fa-star product-ratings"> </i>
						<?php }else if(round($li['avg'])==3){  ?>
							<i class="fa fa-star product-rateing"> </i>
							<i class="fa fa-star product-rateing"> </i>
							<i class="fa fa-star product-rateing"> </i>
							<i class="fa fa-star product-ratings"> </i>
							<i class="fa fa-star product-ratings"> </i>
						<?php }else if(round($li['avg'])==4){  ?>
							<i class="fa fa-star product-rateing"> </i>
							<i class="fa fa-star product-rateing"> </i>
							<i class="fa fa-star product-rateing"> </i>
							<i class="fa fa-star product-rateing"> </i>
							<i class="fa fa-star product-ratings"> </i>
					  <?php }else if(round($li['avg'])==5){  ?>
					  <i class="fa fa-star product-rateing"> </i>
					  <i class="fa fa-star product-rateing"> </i>
					  <i class="fa fa-star product-rateing"> </i>
					  <i class="fa fa-star product-rateing"> </i>
					  <i class="fa fa-star product-rateing"> </i>
					  <?php } ?>			
				
				<?php }?>
					 <?php } ?>	
					 	<?php 	if (!in_array($productslist['item_id'], $idslist)){ ?>
							<i class="fa fa-star product-ratings"></i>
						<i class="fa fa-star product-ratings"></i>
						<i class="fa fa-star product-ratings"></i>
						<i class="fa fa-star product-ratings"></i>
						<i class="fa fa-star product-ratings"></i>
							
						<?php } ?>
				<?php foreach ($rating_count as $li){ 
				if($productslist['item_id']==$li['item_id']){?>
				<a href="<?php echo base_url('category/productview/'.base64_encode($li['item_id'])); ?>">(<?php echo $li['count']; ?>  reviews)</a>
				<?php }} ?>
				
				<?php } ?>
						</div>
					</div>
					<div class="clearfix" style="margin:0">&nbsp;</div>
					<span  class="whis_cus_m mobile_wish_remove">
					
				<?php 	if (in_array($productslist['item_id'], $whishlist_item_ids_list) &&  in_array($customerdetails['customer_id'], $customer_ids_list)) { ?>
                  <a href="javascript:void(0);" onclick="addwhishlidts('<?php echo $productslist['item_id']; ?>','<?php echo $cnt; ?>');" id="addwhish<?php echo $productslist['item_id']; ?><?php echo $cnt; ?>" data-toggle="tooltip" title="Added to Wishlist" class="wishlist"><i id="addwishlistids<?php echo $productslist['item_id']; ?><?php echo $cnt; ?>" class="fa fa-heart"></i></a> 
                  <?php }else{ ?>	
                  <a href="javascript:void(0);" onclick="addwhishlidts('<?php echo $productslist['item_id']; ?>','<?php echo $cnt; ?>');" id="addwhish<?php echo $productslist['item_id']; ?><?php echo $cnt; ?>" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i id="addwishlistids<?php echo $productslist['item_id']; ?><?php echo $cnt; ?>" class="fa fa-heart "></i></a> 
                  <?php } ?>
				</span>
			  </div>
			  <?php $cnt++;} ?>
			  
			  <?php }else{  ?>
			  <div class=" card_mob">No products are available</div>
			  <?php } ?>
			  
			  
			  
			  
			  </div>
			  <script>
			  
			  function mobileaddwhishlidts(id,val){
			jQuery.ajax({
			url: "<?php echo site_url('customer/addwhishlist');?>",
			type: 'post',
			data: {
				form_key : window.FORM_KEY,
				item_id: id,
				},
			dataType: 'JSON',
			success: function (data) {
			 if(data.msg==0){
					window.location='<?php echo base_url("customer/"); ?>'; 
				}else{
				
				jQuery('#sucessmsg').show();
				//alert(data.msg);
				if(data.msg==2){
				$('#sucessmsg').show('');
				$("#addwishlistids"+id+val).removeClass("mobile_wish");
				$("#addwishlistids"+id+val).addClass("mobile_wish_remove");
				$('#addwhish'+id+val).prop('title', 'Add to Wishlist');
				('#sucessmsg').html('<div class="alt_cus"><div class="alert_msg1 animated slideInUp btn_suc"> Product Successfully Removed to wishlist <i class="fa fa-check  text-success ico_bac" aria-hidden="true"></i></div></div>');  
				
				}
				if(data.msg==1){
				$('#sucessmsg').show('');
				$("#addwishlistids"+id+val).addClass("mobile_wish_remove");
				$("#addwishlistids"+id+val).removeClass("mobile_wish");
				 $('#addwhish'+id+val).prop('title', 'Added to Wishlist');
				$('#sucessmsg').html('<div class="alt_cus"><div class="alert_msg1 animated slideInUp btn_suc"> Product Successfully added to wishlist <i class="fa fa-check  text-success ico_bac" aria-hidden="true"></i></div></div>');  
				document.getElementById("sucessmsg").focus();				
				}
			}
			

			}
		});
	
	
}
   var mobileselect = document.getElementById('input-select1');
   
   // Append the option elements
   for ( var i = '<?php echo floor($minimum_price['item_cost']); ?>'; i <= '<?php echo floor($maximum_price['item_cost']); ?>'; i++ ){
   
   var option = document.createElement("option");
   option.text = i;
   option.value = i;
   
   mobileselect.appendChild(option);
   }
   
   var html5Slider = document.getElementById('html6');
   
   noUiSlider.create(html5Slider, {
   start: [ '<?php echo floor($minimum_price['item_cost']); ?>', '<?php echo floor($maximum_price['item_cost']); ?>' ],
   connect: true,
   range: {
   'min': <?php echo floor($minimum_price['item_cost']); ?>,
   'max': <?php echo floor($maximum_price['item_cost']); ?>
   }
   });
   
   var inputNumber = document.getElementById('input-number1');
   
   html5Slider.noUiSlider.on('update', function( values, handle ) {
   
   var value = values[handle];
   
   if ( handle ) {
   inputNumber.value = value;
   } else {
   mobileselect.value = Math.round(value);
   }
   });
   html5Slider.noUiSlider.on('change', function(){
   });
   select.addEventListener('change', function(){
   html5Slider.noUiSlider.set([this.value, null]);
   });
   
   inputNumber.addEventListener('change', function(){
   html5Slider.noUiSlider.set([null, this.value]);
   });
</script>