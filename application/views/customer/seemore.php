


<div >
<div class="" >
		
	<div class="cart_bdy"> 
    <!--Top Category slider Start-->
    <div class="top-cate">
      <div class="featured-pro container_main">
        <div class="row">
		  <div  style="display:none;" class="alert dark alert-success alert-dismissible" id="sucessmsg"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
            </button>
		</div>
		<?php //echo '<pre>';print_r($topoffers);exit; ?>
            <div class="new_title">
              <h2>Top Offers </h2>
            </div>
        
              <div class="row">
			  
			  <?php 
			  $customerdetails=$this->session->userdata('userdetails');
			  foreach ($topoffers as $productslist){
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
                <div class="col-md-2 ">
				
				<div class="item">
          <div class=" box-product-outer" >
            <div class="box-product">
              <div class="img-wrapper  img_hover">
                <a href="<?php echo base_url('category/productview/'.base64_encode($productslist['item_id'])); ?>">
               <img class="thumbnail"src="<?php echo base_url('uploads/products/'.$productslist['item_image']); ?>"> 
				 
           
                </a>
                <div class="tags">
                  <span class="label-tags"><span class="label label-default arrowed">Featured</span></span>
                </div>
                <div class="tags tags-left">
                  <span class="label-tags"><span class="label label-danger arrowed-right">Sale</span></span>
                </div>
				<?php if($productslist['item_quantity']<=0){ ?>
				<div style="background:#45b1b5;color:#fff;padding:2px;" class="text-center">
					<div style="z-index:1026"><h4>out of stock</h4></div>
				</div>
				<?php } ?>
				
				<div class="option">
				<?php if($productslist['item_quantity']>0){ ?>
				<button type="submit" data-toggle="tooltip" title="Add to Cart"><i class="fa fa-shopping-cart"></i></button>                  
				<?php } ?>
				<?php 	if (in_array($productslist['item_id'], $whishlist_item_ids_list) &&  in_array($customerdetails['customer_id'], $customer_ids_list)) { ?>
				<a href="javascript:void(0);" onclick="addwhishlidt(<?php echo $productslist['item_id']; ?>);" id="addwhish<?php echo $productslist['item_id']; ?>" data-toggle="tooltip" title="Add to Wishlist" class="wishlist btn-danger"><i id="addwishlistids" class="fa fa-heart"></i></a> 
				<?php }else{ ?>	
				<a href="javascript:void(0);" onclick="addwhishlidt(<?php echo $productslist['item_id']; ?>);" id="addwhish" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i  id="addwishlistids" class="fa fa-heart"></i></a> 
				<?php } ?>	
				</div>
              </div>
              <h6><a href="<?php echo base_url('category/productview/'.base64_encode($productslist['item_id'])); ?>"><?php echo $productslist['item_name']; ?></a></h6>
				<div class="price">
               
				<div class="pull-left" ><?php echo ($item_price); ?> 
				<span class="label-tags"><span class="label label-default">-<?php echo $percentage; ?>%</span></span>
				</div>
				<span class="price-old"><?php echo $orginal_price; ?></span>
            
              </div>
            
              
              <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-o"></i>
                <a href="#">(5 reviews)</a>
              </div>
            </div>
          </div>
            </div>
				
				</form>
                 
                </div>
				<?php  } ?>
				
                <!-- Item -->
              
                
                <!-- End Item --> 
              </div>
			  
		
   
        </div>
      </div>
    </div>
    <!--Top Category silder End--> 
  </div>
 </div>
   </div>
  

 
  
<!--home page product scroller start here --> 

</html>

<script type="text/javascript">
function addwhishlidt(id){
jQuery.ajax({
      url: "<?php echo site_url('customer/addwhishlist');?>",
      type: 'post',
      data: {
        form_key : window.FORM_KEY,
        item_id: id,
        },
      dataType: 'JSON',
      success: function (data) {
		  var property = document.getElementById(addwishlistids);
        jQuery('#sucessmsg').show();
        //alert(data.msg);
        if(data.msg==2){
			$("#addwhish"+id).removeClass("btn-danger");
        $('#sucessmsg').html('Product Successfully removed to Whishlist');  
        }
        if(data.msg==1){
		 $("#addwhish"+id).addClass("btn-danger");
        //$('#addwhish').css("color", "yellow");
        $('#sucessmsg').html('Product Successfully added to Whishlist');  
        }
      

      }
    });
  
  
}
</script>



