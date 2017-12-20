<?php 
foreach($previousdata as $predata){ 
				
				
				$offers[]=$predata['offers'];
				$brands[]=$predata['brand'];
				$colours[]=$predata['colour'];
				$sizes[]=$predata['size'];
				$rams[]=$predata['ram'];
				$oss[]=$predata['os'];
				
				$minimum_prices=$predata['mini_amount'];
				$maximum_prices=$predata['max_amount'];
			
			//echo '<pre>';print_r($offers);
		  }

?>
	<span id="filtersubitemwisedata">
	<div class="col-md-3">
			<div class="title"><span>Filters</span></div>
					  <div class="row">
						   <div class="col-md-6">
				  <h4>Min:<span class="site_col"><?php echo $minimum_prices; ?></span></h4>
				  </div>
				  <div class="col-md-6">
				 <h4>Max:<span class="site_col"><?php echo $maximum_prices; ?></span></h4>
				  </div>
					</div>
				   <div class="row">
		  <div class="col-md-6">
		   <select class="form-control" name="mimimum_price" id="mimimum_price" onchange="subcatehorywise(this.value, '<?php echo 'mimimum_price'; ?>','<?php echo ''; ?>');">
				 <?php for( $i=floor($minimum_price['item_cost']); $i<=floor($maximum_price['item_cost']); $i+=1000 ){  ?>
					<?Php if($minimum_prices==$i){ ?>
						<option value="<?php echo $i; ?>" selected><?php echo $i; ?></option>
					<?php }else{ ?>
						<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
						<?php } ?>
				<?php $min_amt=$i;
				} ?>
				
			  </select>
		  </div>
		  <div class="col-md-6">
		    <select class="form-control" id="maximum_price" name="maximum_price" onchange="subcatehorywise(this.value, '<?php echo 'maximum_price'; ?>','<?php echo ''; ?>');">
				 <?php for( $i=floor($minimum_prices); $i<=floor($maximum_price['item_cost']); $i+=1000 ){  ?>
					<?Php if($maximum_prices==$i){ ?>
						<option value="<?php echo $i; ?>" selected><?php echo $i; ?></option>
					<?php }else{ ?>
						<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
						<?php } ?>
				<?php } ?>

			  </select>
		  </div>
		  </div><br>
		  <input type="hidden" name="categoryid" id="categoryid" value="<?php echo $caterory_id;?>">
			<input type="hidden" name="subcategoryid" id="subcategoryid" value="<?php echo $subcaterory_id;?>">
			
		  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			<?php if(isset($brand_list) && count($brand_list)>0){?>
                  <div class="panel panel-primary">
                     <div class="panel-heading" role="tab" id="headingThree2">
                        <h4 class="panel-title">
                           <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree1" aria-expanded="false" aria-controls="collapseThree1">
                           BRAND	
                           </a>
                        </h4>
                     </div>
                     <div id="collapseThree1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree2">
                        <div class="panel-body">
                           <?php foreach ($brand_list as $list){
							   if (in_array($list['brand'], $brands)) { ?>
							<div class="checkbox"><label><input type="checkbox" checked="checked" onclick="subcatehorywise(this.value, '<?php echo 'brand'; ?>','<?php echo 'uncheck'; ?>');" id="checkbox1" name="products[brand][]" value="<?php echo $list['brand']; ?>"><span>&nbsp;<?php echo $list['brand']; ?></span></label></div>
						<?php } else{  ?>
                           <div class="checkbox"><label><input type="checkbox" onclick="subcatehorywise(this.value, '<?php echo 'brand'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[brand][]" value="<?php echo $list['brand']; ?>"><span>&nbsp;<?php echo $list['brand']; ?></span></label></div>
                           <?php } } ?>
                        </div>
                     </div>
                  </div>
                  <?php } ?>
				   <?php if(isset($offer_list) && count($offer_list)>0){?>
                  <div class="panel panel-primary">
                     <div class="panel-heading" role="tab" id="headingThree">
                        <h4 class="panel-title">
                           <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                           Offer	
                           </a>
                        </h4>
                     </div>
                     <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body">
                           <?php foreach ($offer_list as $list){ 
						   	if (in_array($list['offers'], $offers)) { ?>
							<div class="checkbox"><label><input type="checkbox" checked="checked" onclick="subcatehorywise(this.value, '<?php echo 'offer'; ?>','<?php echo 'uncheck'; ?>');" id="checkbox1" name="products[offers][]" value="<?php echo $list['offers']; ?>"><span>&nbsp;<?php echo number_format($list['offers'], 2, '.', ''); ?></span></label></div>
						<?php } else{  ?>
                           <div class="checkbox"><label><input type="checkbox" onclick="subcatehorywise(this.value, '<?php echo 'offer'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[offers][]" value="<?php echo $list['offers']; ?>"><span>&nbsp;<?php echo number_format($list['offers'], 2, '.', ''); ?></span></label></div>
                           <?php }  }?>
                        </div>
                     </div>
                  </div>
                  <?php } ?>
				  <?php if(isset($color_list) && count($color_list)>0){ ?>
                  <div class="panel panel-primary">
                     <div class="panel-heading" role="tab" id="headingThree45">
                        <h4 class="panel-title">
                           <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                           Colors	
                           </a>
                        </h4>
                     </div>
                     <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree45">
                        <div class="panel-body">
                           <?php foreach ($color_list as $list){ 
							   if (in_array($list['colour'], $colours)) { ?>
							<div class="checkbox"><label><input type="checkbox" checked="checked" onclick="subcatehorywise(this.value, '<?php echo 'colour'; ?>','<?php echo 'uncheck'; ?>');" id="checkbox1" name="products[colour][]" value="<?php echo $list['colour']; ?>"><span>&nbsp;<?php echo $list['colour']; ?></span></label></div>
							<?php } else{  ?>
                           <div class="checkbox"><label><input type="checkbox" onclick="subcatehorywise(this.value, '<?php echo 'colour'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[colour][]" value="<?php echo $list['colour']; ?>"><span>&nbsp;<?php echo $list['colour']; ?></span></label></div>
                           <?php } } ?>
                        </div>
                     </div>
                  </div>
                  <?php } ?>
				  		<?php  if(isset($sizes_list) && count($sizes_list)>0){ ?>
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="headingThree">
						 <h4 class="panel-title">
					<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
					  SIZE	
					  </a>
				  </h4>

					</div>
					<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
						<div class="panel-body">
						<?php foreach ($sizes_list as $list){ 
							   if (in_array($list['size'], $sizes)) { ?>
							<div class="checkbox"><label><input type="checkbox" checked="checked" onclick="subcatehorywise(this.value, '<?php echo 'size'; ?>','<?php echo 'uncheck'; ?>');" id="checkbox1" name="products[size][]" value="<?php echo $list['size']; ?>"><span>&nbsp;<?php echo $list['size']; ?></span></label></div>
							<?php } else{  ?>
							<div class="checkbox"><label><input type="checkbox" onclick="subcatehorywise(this.value, '<?php echo 'size'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[size][]" value="<?php echo $list['size']; ?>"><span>&nbsp;<?php echo $list['size']; ?></span></label></div>
						
						<?php }  } ?>
						</div>
					</div>
				</div>
				<?php  } ?>
				<?php if(isset($ram_list) && count($ram_list)>0){?>
					<div class="panel panel-primary">
						<div class="panel-heading" role="tab" id="headingThreecomram">
							<h4 class="panel-title">
							<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
							RAM	
							</a>
							</h4>

						</div>
						<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThreecomram">
							<div class="panel-body">
							<?php foreach ($ram_list as $list){ 
							   if (in_array($list['ram'], $rams)) { ?>
							<div class="checkbox"><label><input type="checkbox" checked="checked" onclick="subcatehorywise(this.value, '<?php echo 'ram'; ?>','<?php echo 'uncheck'; ?>');" id="checkbox1" name="products[ram][]" value="<?php echo $list['ram']; ?>"><span>&nbsp;<?php echo $list['ram']; ?></span></label></div>
							<?php } else{  ?>
								<div class="checkbox"><label><input type="checkbox" onclick="subcatehorywise(this.value, '<?php echo 'ram'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[ram][]" value="<?php echo $list['ram']; ?>"><span>&nbsp;<?php echo $list['ram']; ?></span></label></div>

							<?php } } ?>
							</div>
						</div>
					</div>
					<?php } ?>
					<?php if(isset($os_list) && count($os_list)>0){?>
					<div class="panel panel-primary">
						<div class="panel-heading" role="tab" id="headingos">
							<h4 class="panel-title">
							<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseos" aria-expanded="false" aria-controls="collapseos">
							OS	
							</a>
							</h4>

						</div>
						<div id="collapseos" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingos">
							<div class="panel-body">
							<?php foreach ($os_list as $list){ 
							   if (in_array($list['os'], $oss)) { ?>
							<div class="checkbox"><label><input type="checkbox" checked="checked" onclick="subcatehorywise(this.value, '<?php echo 'os'; ?>','<?php echo 'uncheck'; ?>');" id="checkbox1" name="products[os][]" value="<?php echo $list['os']; ?>"><span>&nbsp;<?php echo $list['os']; ?></span></label></div>
							<?php } else{  ?>
								<div class="checkbox"><label><input type="checkbox" onclick="subcatehorywise(this.value, '<?php echo 'os'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[os][]" value="<?php echo $list['os']; ?>"><span>&nbsp;<?php echo $list['os']; ?></span></label></div>

							<?php } } ?>
							</div>
						</div>
					</div>
					<?php } ?>
				  
		</div>
	</div>
   
   <div class="col-sm-9" id="aftercategorysearch">
	 <div id="sucessmsg" style="display:none;"></div>
	 <div  style="display:none;" class="alert dark alert-success alert-dismissible" id="sucessmsg"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
            </button>
		</div>
          <div class="title"><span><?php echo ucfirst(strtolower(isset($subitemwise[0]['subitem_name'])?$subitemwise[0]['subitem_name']:'')); ?>&nbsp; subitem wise Products lists</span></div>
		
		<?php 
		if( isset($productlist) && count($productlist)>0){
		 $customerdetails=$this->session->userdata('userdetails');
		$cnt=1;foreach($productlist as $productslist){ 
		//echo'<pre>';print_r($whishlist_item_ids_list);exit;
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
		 <form action="<?php echo base_url('customer/addcart'); ?>" method="Post" name="addtocart" id="addtocart" >
			<input type="hidden" name="producr_id" id="producr_id" value="<?php echo $productslist['item_id']; ?>" >
			<input type="hidden" name="category_id" id="category_id" value="<?php echo $productslist['category_id']; ?>" >
			<input type="hidden" name="qty" id="qty" value="1" >
			
          <div class=" col-md-3 col-xs-6 col-sm-6 box-product-outer sub_ct_width" >
            <div class="box-product">
             <div class="img-wrapper  img_hover item" style="position:relative">
			  <div class="text-center img_size">
                <a href="<?php echo base_url('category/productview/'.base64_encode($productslist['item_id'])); ?>">
                  <img alt="Product" src="<?php echo base_url('uploads/products/'.$productslist['item_image']); ?>">
                </a>
				</div>
                
				<?php if($productslist['item_quantity']<=0 || $productslist['item_status']==0){ ?>
				<div  class="text-center out_of_stoc">
					<div style="z-index:1026"><h4>out of stock</h4></div>
				</div>
				<?php } ?>
				
				<div class="option">
				<?php if($productslist['item_quantity']>0 && $productslist['category_id']==18 || $productslist['category_id']==21){ ?>
				<?php 	if (in_array($productslist['item_id'], $cart_item_ids) &&  in_array($customerdetails['customer_id'], $cust_ids)) { ?>
				<a style="cursor:pointer;" onclick="itemaddtocart('<?php echo $productslist['item_id']; ?>','<?php echo $productslist['category_id']; ?>','<?php echo $cnt; ?>');" id="cartitemtitle<?php echo $productslist['item_id']; ?><?php echo $cnt; ?>" data-toggle="tooltip" title="Added to Cart"><i id="addticartitem<?php echo $productslist['item_id']; ?><?php echo $cnt; ?>" class="fa fa-shopping-cart text-primary"></i></a>                  
				<?php }else{ ?>	
				<a style="cursor:pointer;" onclick="itemaddtocart('<?php echo $productslist['item_id']; ?>','<?php echo $productslist['category_id']; ?>','<?php echo $cnt; ?>');" id="cartitemtitle<?php echo $productslist['item_id']; ?><?php echo $cnt; ?>" data-toggle="tooltip" title="Add to Cart"><i id="addticartitem<?php echo $productslist['item_id']; ?><?php echo $cnt; ?>" class="fa fa-shopping-cart"></i></a>                  
				<?php } ?>
				<?php } ?>
				<?php 	if (in_array($productslist['item_id'], $whishlist_item_ids_list) &&  in_array($customerdetails['customer_id'], $customer_ids_list)) { ?>
				<a href="javascript:void(0);" onclick="addwhishlidts('<?php echo $productslist['item_id']; ?>','<?php echo $cnt; ?>');" id="addwhish<?php echo $productslist['item_id']; ?><?php echo $cnt; ?>" data-toggle="tooltip" title="Added to Wishlist" class="wishlist"><i id="addwishlistids<?php echo $productslist['item_id']; ?><?php echo $cnt; ?>" class="fa fa-heart text-primary"></i></a> 
				<?php }else{ ?>	
				<a href="javascript:void(0);" onclick="addwhishlidts('<?php echo $productslist['item_id']; ?>','<?php echo $cnt; ?>');" id="addwhish<?php echo $productslist['item_id']; ?><?php echo $cnt; ?>" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i id="addwishlistids<?php echo $productslist['item_id']; ?><?php echo $cnt; ?>" class="fa fa-heart "></i></a> 
				<?php } ?>	
				</div>
              </div>
              <h6><a href="<?php echo base_url('category/productview/'.base64_encode($productslist['item_id'])); ?>"><?php echo $productslist['item_name']; ?></a></h6>
               <div class="price">
               
				<div class="text-center" style="color:#187a7d;">₹ <?php echo number_format($item_price, 2 ); ?> 
			<?php if($percentage!=''){ ?> &nbsp;
			<span class="price-old">₹ <?php echo number_format($orginal_price, 2); ?></span>
				<span class="label-tags"><p class=" text-success"> <?php echo number_format($percentage, 2, '.', ''); ?>% off</p></span>
			<?Php }else{ ?>
			<?php } ?>
				</div>
				<div class="clearfix"></div>
            
              </div>
               <div class="rating text-center">
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
          </div>
		  </form>
		  <?php  
			if(($cnt % 4)==0){?> 
			<div class="clearfix"></div>
			<?php } ?>
		   
		  <?php  $cnt++;} ?>
		  
		<?php } else{  ?>
		<div > No Products are available</div>
		<?php } ?>
         
        </div>
		</span>
	
	 <div class="clearfix"></div>
	 <br>
	
</body>
<script>
function subcatehorywise(val,status,check){
	
	jQuery.ajax({
		
				url: "<?php echo site_url('category/subcategorywiseearch');?>",
				type: 'post',
			
				data: {
					form_key : window.FORM_KEY,
					categoryid: $('#categoryid').val(),
					subcategoryid: $('#subcategoryid').val(),
					productsvalues: val,
					searchvalue: status,
					unchecked: check,
					mini_mum: $('#mimimum_price').val(),
					maxi_mum: $('#maximum_price').val(),

					},
				dataType: 'html',
				success: function (data) {
					//alert(data);
					$("#withoursearchsubcategory").empty();
					$("#withoursearchsubcategory").hide();
					$("#filtersubitemwisedata").empty();
					$("#filtersubitemwisedata").append(data);
	}
});
}

</script>
