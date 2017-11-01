
	<div class="cart_bdy"> 
    <!--Top Category slider Start-->
    <div class="top-cate">
      <div class="featured-pro container_main">
        <div class="row">
		  <div id="sucessmsg" style="display:none;"></div>
		<?php //echo '<pre>';print_r($topoffers);exit;  ?>
		
		 <?php if(isset($type) && $type=='top'){?>
            <div class="new_title">
              <h2>Top Offers </h2>
            </div>
		 <?php }else if(isset($type) && $type=='tren'){?>
		 <div class="new_title">
              <h2>Trending Products </h2>
            </div>
		 <?php }else if(isset($type) && $type=='offer'){?>
		 <div class="new_title">
              <h2>Offers for You</h2>
            </div>
		<?php }else if(isset($type) && $type=='deal'){?>
		 <div class="new_title">
              <h2>Deals of the Day </h2>
            </div>
		 <?php }else if(isset($type) && $type=='season'){?>
		 <div class="new_title">
              <h2>Season Sales </h2>
            </div>
		 <?php } ?>
        
              <div class="row">
			  
			  <?php 
			  $customerdetails=$this->session->userdata('userdetails');
			 $s=6; foreach ($products as $productslist){
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
                <div class="col-md-2 " style="width:20%;height:280px;min-height:350px;overflow:hidden;">
				 <a href="<?php echo base_url('category/productview/'.base64_encode($productslist['item_id'])); ?>">
				<div class="item">
          <div class=" box-product-outer" >
            <div class="box-product">
              <div class="img-wrapper  img_hover">
              <div class="img_size text-center">
               
               <img class=""src="<?php echo base_url('uploads/products/'.$productslist['item_image']); ?>"> 
				 
           
               
				</div>
               
				<?php if($productslist['item_quantity']<=0 || $productslist['item_status']==0){ ?>
				<div  class="text-center out_of_stoc">
					<div style="z-index:1026"><h4>out of stock</h4></div>
				</div>
				<?php } ?>
				
				<div class="option">
				<?php if($productslist['item_quantity']>0 && $productslist['category_id']==18 || $productslist['category_id']==21){ ?>
				<?php 	if (in_array($productslist['item_id'], $cart_item_ids) &&  in_array($customerdetails['customer_id'], $cust_ids)) { ?>
				<a style="cursor:pointer;" onclick="itemaddtocart('<?php echo $productslist['item_id']; ?>','<?php echo $productslist['category_id']; ?>','<?php echo $s; ?>');" id="cartitemtitle<?php echo $productslist['item_id']; ?><?php echo $s; ?>" data-toggle="tooltip" title="Added to Cart"><i id="addticartitem<?php echo $productslist['item_id']; ?><?php echo $s; ?>" class="fa fa-shopping-cart text-primary"></i></a>                  
				<?php }else{ ?>	
				<a style="cursor:pointer;" onclick="itemaddtocart('<?php echo $productslist['item_id']; ?>','<?php echo $productslist['category_id']; ?>','<?php echo $s; ?>');" id="cartitemtitle<?php echo $productslist['item_id']; ?><?php echo $s; ?>" data-toggle="tooltip" title="Add to Cart"><i id="addticartitem<?php echo $productslist['item_id']; ?><?php echo $s; ?>" class="fa fa-shopping-cart"></i></a>                  
				<?php } ?>
				<?php } ?>
				<?php 	if (in_array($productslist['item_id'], $whishlist_item_ids_list) &&  in_array($customerdetails['customer_id'], $customer_ids_list)) { ?>
				<a href="javascript:void(0);" onclick="addwhishlidt('<?php echo $productslist['item_id']; ?>','<?php echo $s; ?>');" id="addwhish<?php echo $productslist['item_id']; ?><?php echo $s; ?>" data-toggle="tooltip" title="Added to Wishlist" class="wishlist"><i id="addwishlistids<?php echo $productslist['item_id']; ?><?php echo $s; ?>" class="fa fa-heart text-primary"></i></a> 
				<?php }else{ ?>	
				<a href="javascript:void(0);" onclick="addwhishlidt('<?php echo $productslist['item_id']; ?>','<?php echo $s; ?>');" id="addwhish<?php echo $productslist['item_id']; ?><?php echo $s; ?>" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i id="addwishlistids<?php echo $productslist['item_id']; ?><?php echo $s; ?>" class="fa fa-heart "></i></a> 
				<?php } ?>	
				</div>
              </div>
              <h6><a href="<?php echo base_url('category/productview/'.base64_encode($productslist['item_id'])); ?>"><?php echo $productslist['item_name']; ?>&nbsp;<?php echo isset($productslist['colour'])?$productslist['colour']:''; ?>&nbsp; <?php echo isset($productslist['internal_memeory'])?$productslist['internal_memeory']:''; ?>&nbsp; <?php echo isset($productslist['internal_memeory'])?'('.$productslist['ram'].'Ram'.')':''; ?></a></h6>
				  <div class="price">
               
				<div class="text-center" style="color:#187a7d;">₹ <?php echo number_format($item_price, 2); ?> 
			<?php if($percentage!=''){ ?> &nbsp;
			<span class="price-old">₹ <?php echo number_format($orginal_price, 2); ?></span>
				<span class="label-tags"><p class=" text-success"> <?php echo number_format($percentage, 2, '.', ''); ?>% off</p></span>
			<?Php }else{ ?>
			<?php } ?>
				</div>
				<div class="clearfix"></div>
            
              </div>
            </div>
          </div>
            </div>
			 </a>
				
				</form>
                 
                </div>
				<?php  $s++;} ?>
				
                <!-- Item -->
              
                
                <!-- End Item --> 
              </div>
			  
		
   
        </div>
      </div>
    </div>
    <!--Top Category silder End--> 


  

 
  
<!--home page product scroller start here --> 



<script type="text/javascript">
function addwhishlidt(id,val){
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
							$("#addwishlistids"+id+val).removeClass("text-primary");
							$('#addwhish'+id+val).prop('title', 'Add to Wishlist');
						$('#sucessmsg').html('<div class="alt_cus"><div class="alert_msg1  btn_suc"> Product Successfully Removed to Wishlist <i class="fa fa-check  text-success ico_bac" aria-hidden="true"></i></div></div>');  
						}
						if(data.msg==1){
						 $("#addwishlistids"+id+val).addClass("text-primary");
						 $('#addwhish'+id+val).prop('title', 'Added to Wishlist');
						//$('#addwhish').css("color", "yellow");
						$('#sucessmsg').html('<div class="alt_cus"><div class="alert_msg1  btn_suc"> Product Successfully added to Wishlist <i class="fa fa-check  text-success ico_bac" aria-hidden="true"></i></div></div>');  
						}
				}

      }
    });
  
  
}

function itemaddtocart(itemid,catid,val){

jQuery.ajax({
        url: "<?php echo site_url('customer/onclickaddcart');?>",
        type: 'post',
          data: {
          form_key : window.FORM_KEY,
          producr_id: itemid,
		  category_id: catid,
		  qty: '1',
          },
        dataType: 'json',
        success: function (data) {
           if(data.msg==0){
					window.location='<?php echo base_url("customer/"); ?>'; 
				}else{
						jQuery('#sucessmsg').show();
						$("#supcount").empty();
						$("#supcount").append(data.count);
						if(data.msg==2){
						$("#addticartitem"+itemid+val).removeClass("text-primary");
						$('#cartitemtitle'+itemid+val).prop('title', 'Add to cart');
						$('#sucessmsg').html('<div class="alt_cus"><div class="alert_msg1  btn_suc"> Product Successfully Removed to Cart <i class="fa fa-check  text-success ico_bac" aria-hidden="true"></i></div></div>');  
						}
						if(data.msg==1){
						 $("#addticartitem"+itemid+val).addClass("text-primary");
						$('#cartitemtitle'+itemid+val).prop('title', 'Added to cart');
						$('#sucessmsg').html('<div class="alt_cus"><div class="alert_msg1  btn_suc"> Product Successfully added to Cart <i class="fa fa-check  text-success ico_bac" aria-hidden="true"></i></div></div>');  
						}
				}

        }
      });

 }
</script>



