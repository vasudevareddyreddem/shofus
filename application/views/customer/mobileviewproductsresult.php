<style>
.top-navbar1{
   display:none;
   }
   .product-ratings{
   color:#ddd !important;
   }
   .product-rateing{
   color:#fc0 !important;
   }
   .fa {
   padding-right: 0px !important;
   }
   .panel-title > a:before {
   float: right !important;
   font-family: FontAwesome;
   content:"\f077";
   padding-right: 5px;
   }
   .panel-heading {
   background:#45b1b5 ;
   }
   .panel-title > a.collapsed:before {
   float: right !important;
   content:"\f078";
   }
   .panel-title > a:hover, 
   .panel-title > a:active, 
   .panel-title > a:focus  {
   text-decoration:none;
   }
   
   #input-select,
   #input-number {
   padding: 7px;
   margin: 15px 5px 5px;
   width: 110px;
   } 
   #input-select1,
   #input-number1 {
   padding: 7px;
   margin: 15px 5px 5px;
   width: 110px;
   }
   .wish{
   color:#ef5350;
   }
   #slider-text{
   padding-top: 40px;
   display: block;
   }
   #slider-text .col-md-6{
   overflow: hidden;
   }
   #slider-text h2 {
   font-family: 'Josefin Sans', sans-serif;
   font-weight: 400;
   font-size: 30px;
   letter-spacing: 3px;
   margin: 30px auto;
   padding-left: 40px;
   }
   #slider-text h2::after{
   border-top: 2px solid #c7c7c7;
   content: "";
   position: absolute;
   bottom: 35px;
   width: 100%;
   }
   #itemslider h4{
   font-family: 'Josefin Sans', sans-serif;
   font-weight: 400;
   font-size: 12px;
   margin: 10px auto 3px;
   }
   #itemslider h5{
   font-family: 'Josefin Sans', sans-serif;
   font-weight: bold;
   font-size: 12px;
   margin: 3px auto 2px;
   }
   #itemslider h6{
   font-family: 'Josefin Sans', sans-serif;
   font-weight: 300;;
   font-size: 10px;
   margin: 2px auto 5px;
   }
   .badge {
   background: #b20c0c;
   position: absolute;
   height: 40px;
   width: 40px;
   border-radius: 50%;
   line-height: 31px;
   font-family: 'Josefin Sans', sans-serif;
   font-weight: 300;
   font-size: 14px;
   border: 2px solid #FFF;
   box-shadow: 0 0 0 1px #b20c0c;
   top: 5px;
   right: 25%;
   }
   #slider-control img{
   padding-top: 60%;
   margin: 0 auto;
   }
   @media screen and (max-width: 992px){
   #slider-control img {
   padding-top: 70px;
   margin: 0 auto;
   }
   }
   .carousel-showmanymoveone .carousel-control {
   width: 4%;
   background-image: none;
   }
   .carousel-showmanymoveone .carousel-control.left {
   margin-left: 5px;
   }
   .carousel-showmanymoveone .carousel-control.right {
   margin-right: 5px;
   }
   .carousel-showmanymoveone .cloneditem-1,
   .carousel-showmanymoveone .cloneditem-2,
   .carousel-showmanymoveone .cloneditem-3,
   .carousel-showmanymoveone .cloneditem-4,
   .carousel-showmanymoveone .cloneditem-5 {
   display: none;
   }
   @media all and (min-width: 768px) {
   .carousel-showmanymoveone .carousel-inner > .active.left,
   .carousel-showmanymoveone .carousel-inner > .prev {
   left: -50%;
   }
   .carousel-showmanymoveone .carousel-inner > .active.right,
   .carousel-showmanymoveone .carousel-inner > .next {
   left: 50%;
   }
   .carousel-showmanymoveone .carousel-inner > .left,
   .carousel-showmanymoveone .carousel-inner > .prev.right,
   .carousel-showmanymoveone .carousel-inner > .active {
   left: 0;
   }
   .carousel-showmanymoveone .carousel-inner .cloneditem-1 {
   display: block;
   }
   }
   @media all and (min-width: 768px) and (transform-3d), all and (min-width: 768px) and (-webkit-transform-3d) {
   .carousel-showmanymoveone .carousel-inner > .item.active.right,
   .carousel-showmanymoveone .carousel-inner > .item.next {
   -webkit-transform: translate3d(50%, 0, 0);
   transform: translate3d(50%, 0, 0);
   left: 0;
   }
   .carousel-showmanymoveone .carousel-inner > .item.active.left,
   .carousel-showmanymoveone .carousel-inner > .item.prev {
   -webkit-transform: translate3d(-50%, 0, 0);
   transform: translate3d(-50%, 0, 0);
   left: 0;
   }
   .carousel-showmanymoveone .carousel-inner > .item.left,
   .carousel-showmanymoveone .carousel-inner > .item.prev.right,
   .carousel-showmanymoveone .carousel-inner > .item.active {
   -webkit-transform: translate3d(0, 0, 0);
   transform: translate3d(0, 0, 0);
   left: 0;
   }
   }
   @media all and (min-width: 992px) {
   .carousel-showmanymoveone .carousel-inner > .active.left,
   .carousel-showmanymoveone .carousel-inner > .prev {
   left: -16.666%;
   }
   .carousel-showmanymoveone .carousel-inner > .active.right,
   .carousel-showmanymoveone .carousel-inner > .next {
   left: 16.666%;
   }
   .carousel-showmanymoveone .carousel-inner > .left,
   .carousel-showmanymoveone .carousel-inner > .prev.right,
   .carousel-showmanymoveone .carousel-inner > .active {
   left: 0;
   }
   .carousel-showmanymoveone .carousel-inner .cloneditem-2,
   .carousel-showmanymoveone .carousel-inner .cloneditem-3,
   .carousel-showmanymoveone .carousel-inner .cloneditem-4,
   .carousel-showmanymoveone .carousel-inner .cloneditem-5,
   .carousel-showmanymoveone .carousel-inner .cloneditem-6  {
   display: block;
   }
   }
   @media all and (min-width: 992px) and (transform-3d), all and (min-width: 992px) and (-webkit-transform-3d) {
   .carousel-showmanymoveone .carousel-inner > .item.active.right,
   .carousel-showmanymoveone .carousel-inner > .item.next {
   -webkit-transform: translate3d(16.666%, 0, 0);
   transform: translate3d(16.666%, 0, 0);
   left: 0;
   }
   .carousel-showmanymoveone .carousel-inner > .item.active.left,
   .carousel-showmanymoveone .carousel-inner > .item.prev {
   -webkit-transform: translate3d(-16.666%, 0, 0);
   transform: translate3d(-16.666%, 0, 0);
   left: 0;
   }
   .carousel-showmanymoveone .carousel-inner > .item.left,
   .carousel-showmanymoveone .carousel-inner > .item.prev.right,
   .carousel-showmanymoveone .carousel-inner > .item.active {
   -webkit-transform: translate3d(0, 0, 0);
   transform: translate3d(0, 0, 0);
   left: 0;
   }
   }
   @media (max-width: 1024px) {
   #input-select,
   #input-number {
   padding: 7px;
   margin: 15px 5px 5px;
   width: 77px;
   }
   }
  
  
  
   
.mobile_wish{
color:#d32134 !important;	
}
.mobile_wish_remove{
color:#eee !important;	
}
@media (max-width: 768px){
.filter_btn {
    position: absolute;
   top: 20px;
    right: 20px;
    background: #d32134;
    padding: 2px 20px 5px 5px;
    border-radius: 10px;
}
}
</style>
<!--filters-->
			<div class="container pos_re mar_res_t150">
		
			<br>
			<?php 
			//echo '<pre>';print_r($previousdata);exit;
			foreach($previousdata as $li){
			$cusine[]=$li['cusine'];
				$restraent[]=$li['restraent'];
				$offers[]=$li['offers'];
				$brands[]=$li['brand'];
				$discount[]=$li['discount'];
				$colors[]=$li['color'];
				$min_amt=$li['mini_amount'];
				$max_amt=$li['max_amount'];
				
			}
				
				?>
		
			<div class="filter_btn">
			<a  data-toggle="modal" data-target="#myModal">
				<span  style="padding:10px;border-radius:50%;" class="glyphicon glyphicon-filter  bg-primary"></span><span style="color:#fff;"> Filters</span>
			</a>
			</div>
			<div class="clearfix">&nbsp;</div>
		
			
			
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
				<?php if (in_array($list['brand'], $brands)) { ?>
				   <div class="checkbox">
				   <label>
					<input type="checkbox" checked="checked" id="brand" name="brand[]" value="<?php echo $list['brand']; ?>">
						<span>&nbsp; <?php echo $list['brand']; ?></span>
				   </label>
				   </div>
				<?php }else{ ?>
					<div class="checkbox">
				   <label>
					<input type="checkbox"  id="brand" name="brand[]" value="<?php echo $list['brand']; ?>">
						<span>&nbsp; <?php echo $list['brand']; ?></span>
				   </label>
				   </div>
				<?php } ?>
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
			<?php if (in_array($list['offers'], $offers)) { ?>
		   <div class="checkbox">
		   <label>
			<input type="checkbox" checked="checked"  id="offers" name="offers[]" value="<?php echo number_format($list['offers'], 2); ?>">
				<span>&nbsp; <?php echo number_format($list['offers'], 2); ?></span>
		   </label>
		   </div>
			<?php }else{ ?>
			 <div class="checkbox">
		   <label>
			<input type="checkbox"  id="offers" name="offers[]" value="<?php echo number_format($list['offers'], 2); ?>">
				<span>&nbsp; <?php echo number_format($list['offers'], 2); ?></span>
		   </label>
		   </div>
			<?php } ?>
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
					<?php if (in_array($list['color_name'], $colors)) { ?>
							   <div class="checkbox">
							   <label>
								<input type="checkbox" checked="checked" id="colors" name="colors[]" value="<?php echo $list['color_name']; ?>">
									<span>&nbsp; <?php echo $list['color_name']; ?></span>
							   </label>
							   </div>
					<?php }else{ ?>
							<div class="checkbox">
							   <label>
								<input type="checkbox"  id="colors" name="colors[]" value="<?php echo $list['color_name']; ?>">
									<span>&nbsp; <?php echo $list['color_name']; ?></span>
							   </label>
							   </div>
					<?php } ?>
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
			 
			 
			 
			  <div class="container bg-primary pad_t15">
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
					<span  class="whis_cus_m">
					
				<?php 	if (in_array($productslist['item_id'], $whishlist_item_ids_list) &&  in_array($customerdetails['customer_id'], $customer_ids_list)) { ?>
				<a href="javascript:void(0);" onclick="mobileaddwhishlidts('<?php echo $productslist['item_id']; ?>','<?php echo $cnt; ?>');" id="addwhish<?php echo $productslist['item_id']; ?><?php echo $cnt; ?>" data-toggle="tooltip" title="Added to Wishlist" class=" "><i id="addwishlistids<?php echo $productslist['item_id']; ?><?php echo $cnt; ?>" class="fa fa-heart mobile_wish"></i></a> 
				<?php }else{ ?>	
				<a href="javascript:void(0);" onclick="mobileaddwhishlidts('<?php echo $productslist['item_id']; ?>','<?php echo $cnt; ?>');" id="addwhish<?php echo $productslist['item_id']; ?><?php echo $cnt; ?>" data-toggle="tooltip" title="Add to Wishlist" class=""><i id="addwishlistids<?php echo $productslist['item_id']; ?><?php echo $cnt; ?>" class="fa fa-heart mobile_wish_remove"></i></a> 
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
				alert('Product Successfully Removed to wishlist');
				
				}
				if(data.msg==1){
				alert('Product Successfully added to wishlist');
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
   'min': <?php echo floor($min_amt); ?>,
   'max': <?php echo floor($max_amt); ?>
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