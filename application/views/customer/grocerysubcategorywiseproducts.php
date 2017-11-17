<style>
   /* grossery sidebar	 */
   .sidebar{ 
   margin-top:0;
   background-color:#000;
   transition: all 0.5s  ease-in-out;
   }
   .bg-defoult{
   background-color:#fff;
   color:#222;
   }
   .sidebar ul{ list-style:none; margin:0px; padding:0px; }
   .sidebar li a,.sidebar li a.collapsed.active{
   display:block; 
   padding:8px 12px;
   border-left:0px solid #dedede;
   text-decoration:none
   }
   .sidebar li a.active{
   background-color:#335866;
   color:#fff;
   border-left:5px solid #009688;
   transition: all 0.5s  ease-in-out;
   margin:4px 0px
   }
   .sidebar li a:hover{
   background-color:#009688  !important;
   color:#fff;
   }
   .sidebar li a i{ padding-right:5px;}
   .sidebar ul li .sub-menu li a{ position:relative}
   .sidebar ul li .sub-menu li a:before{
   font-family: FontAwesome;
   content: "\f105";
   display: inline-block;
   padding-left: 0px;
   padding-right: 10px;
   vertical-align: middle;
   }
   .sidebar ul li .sub-menu li a:hover:after {
   content: "";
   position: absolute;
   left: -5px;
   top: 0;
   width: 5px;
   background-color: #111;
   height: 100%;
   }
   .sidebar ul li .sub-menu li a:hover{ background-color:#222; padding-left:20px; transition: all 0.5s  ease-in-out}
   .sub-menu{ border-left:5px solid #009688;}
   .sidebar li a .nav-label,.sidebar li a .nav-label+span{ transition: all 0.5s  ease-in-out}
   .sidebar.fliph li a .nav-label,.sidebar.fliph li a .nav-label+span{ display:none;transition: all 0.5s  ease-in-out}
   .bg_defa{
   background:#fff !important;
   border-bottom:1px solid #ddd;
   }
   .wishadd{
	 background:#aaa;border:#aaa;  
   }
   /* grossery sidebar	end *
   </style>
	
	 <div class=" clearfix"></div>
	 <!-- Filter Sidebar -->
	 
	 
	<div class="row ">
         <div class="mar_t20">
            <div class="col-md-12  ">
               <br>
			
               <div class='col-md-3'>
                  <div class="sidebar left ">
                     <ul class="list-sidebar bg-defoult">
					 <?php $s=1;foreach ($subitem_list as $list){ ?>
                        <li>
                           <a style="cursor:pointer" onclick="subitemswiseproducts('<?php echo $list['subitem_id']; ?>', '<?php echo $s; ?>')" class="collapsed active" > </i> <span class="nav-label"> <?php echo isset($list['subitem_name'])?$list['subitem_name']:''; ?> </span> <span class="fa fa-chevron-right pull-right"></span> </a>
                           
                        </li>
						
					 <?php $s++;} ?>
                       
                     </ul>
                  </div>
               </div>
			   	<div id="sucessmsg" style="display:none;"></div>

			   <span id="subitemwisefiltersdata">
               <div class='col-md-9'>
                  <div class="panel-group" id="accordion">
				  
				  <?php if(count($subcategory_porduct_list)>0) { ?>
				  
				  <?php 
				  $customerdetails=$this->session->userdata('userdetails');
				  $cnt=0;foreach ($subcategory_porduct_list as $productslist){ ?>
				  <div id="unitwusechanges<?php echo $cnt; ?>">
											<?php $currentdate=date('Y-m-d h:i:s A');
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

										 <input type="hidden" name="orginalqty" id="orginalqty<?php echo $cnt; ?>" value="<?php echo $productslist['item_quantity']; ?>" >
										<input type="hidden" name="product_id" id="product_id<?php echo $cnt; ?>"  value="<?php echo $productslist['item_id']; ?>">
										<input type="hidden" name="amount" id="amount<?php echo $cnt; ?>"  value="<?php echo $item_price; ?>">
											<input type="hidden" name="producr_id" id="producr_id" value="<?php echo $productslist['item_id']; ?>" >
										 <div class="panel panel-default ">
											<div class="panel-heading bg_defa ">
											   <div class="row">
												 
													 <div class="col-md-3">
														<a href="<?php echo base_url('category/productview/'.base64_encode($productslist['item_id'])); ?>">
														<div>
														   <img class="groc_min_h" src="<?php echo base_url('uploads/products/'.$productslist['item_image']); ?>">
														</div>
														</a>
													 </div>
												
												  <div class="col-md-6">
													 <div class="gro_tit"><?php echo isset($productslist['item_name'])?$productslist['item_name']:''; ?></div>
													 <p class=""><?php echo isset($productslist['ingredients'])?$productslist['ingredients']:''; ?></p>
													 <p class="">Available in: &nbsp;&nbsp;
													 <?php foreach ($productslist['unitproducts_list'] as $list){ ?>
													 
													 <?php if($list['item_id']==$productslist['item_id']){ ?>
															<span  onclick="getunitwiseproducts('<?php echo $list['item_id']; ?>','<?php echo $cnt; ?>')" class="btn_cus btn_cus_acti"><?php echo $list['unit'].' Unit'; ?></span>&nbsp;&nbsp;

													 <?php }else{ ?>
															<span onclick="getunitwiseproducts('<?php echo $list['item_id']; ?>','<?php echo $cnt; ?>')" class="btn_cus"><?php echo $list['unit'].' Unit'; ?></span>&nbsp;&nbsp;

													 <?php  } ?>
													<?php } ?>
													
													 </p>
													
													 <div  class="input-group incr_btn pull-left">
																			<span class="input-group-btn">
																			<button style="width:20px;padding:6px;"type="button" onclick="productqty('<?php echo $cnt; ?>');" class="btn btn-primary btn-number btn-small"  data-type="minus" data-field="quant[2]">
																	<span style="margin:-4px" class="glyphicon glyphicon-minus"></span>
																			</button>
																			</span>
																			<input type="text" name="qty" id="qty<?php echo $cnt; ?>" readonly  class="form-control input-number" value="1" min="1" max="<?php echo $productslist['item_quantity']; ?>">
																			<span class="input-group-btn">
																  <button style="width:20px;padding:6px" onclick="productqtyincreae('<?php echo $cnt; ?>');" type="button" class="btn btn-primary btn-number btn-small" data-type="plus" data-field="quant[2]">
																	  <span style="margin:-4px" class="glyphicon glyphicon-plus"></span>
																			</button>
																			</span>
																			
																			
													  </div>
													  <div class="pull-right">
													  <?php 	if (in_array($productslist['item_id'], $whishlist_item_ids_list) &&  in_array($customerdetails['customer_id'], $customer_ids_list)) { ?>
													<a href="javascript:void(0);" onclick="unitaddwhishlidts('<?php echo $productslist['item_id']; ?>','<?php echo $cnt; ?>');" id="addwhish<?php echo $productslist['item_id']; ?><?php echo $cnt; ?>"  ><span id="addwishlistids<?php echo $productslist['item_id']; ?><?php echo $cnt; ?>" class="btn btn-primary btn-sm ">Add to Whishlist</span></a> 
													<?php }else{ ?>	
													<a href="javascript:void(0);" onclick="unitaddwhishlidts('<?php echo $productslist['item_id']; ?>','<?php echo $cnt; ?>');" id="addwhish<?php echo $productslist['item_id']; ?><?php echo $cnt; ?>"  ><span id="addwishlistids<?php echo $productslist['item_id']; ?><?php echo $cnt; ?>" class="btn btn-warning btn-sm wishadd" >Add to Whishlist</span></a> 
													<?php } ?>
													  <span id="qtymesage<?php echo $cnt; ?>" style="color:red"></span>
													 
													</div>
												  </div>
												  <div class="col-md-3">
													 <p class="">MRP:₹ <?php echo number_format($item_price, 2); ?></p>
													 <p class=""> Total Amount:₹ <span id="totalamount<?php echo $cnt; ?>"><?php echo number_format($item_price, 2); ?></span></p>
													
													 <div class="clearfix">&nbsp;</div>
													 <a onclick="singleitemaddtocart('<?php echo $productslist['item_id']; ?>','<?php echo $productslist['category_id']; ?>','single')" class="btn btn-primary btn-sm">Add To Cart</a>
													
													<button type="submit" class="btn btn-warning btn-sm">Buy Now</button>
												  </div>
												  <div class="clearfix">&nbsp;</div>
												  <a data-toggle="collapse" data-parent="#accordion" href="#znajomi<?php echo $cnt; ?>"> <div class="text-center "><span class="glyphicon glyphicon-chevron-down down_btn_mod"></span></div></a>
											   </div>
											</div>
											</form>
											<div id="znajomi<?php echo $cnt; ?>" class="panel-collapse collapse ">
											   <div class="panel-body">
												  <div class="row">
													 <div class="col-md-12">
														<h4>About The Product</h4>
														<?php if(isset($productslist['descriptions_list']) && count($productslist['descriptions_list'])>0){ ?>

														<div class="descr">
														   <p class="sub_tit">Description</p>
														   <?php foreach ($productslist['descriptions_list'] as $list) { ?>
														   <p class="font_si14"><?php echo isset($list['description'])?$list['description']:''; ?>.</p>
														   <?php } ?>
														</div>
														<?php } ?>
														<?php if(isset($productslist['ingredients']) && $productslist['ingredients']!=''){ ?>
														<div class="descr">
														   <p class="sub_tit">Ingredients</p>
														   <p class="font_si14">
															  <?php echo isset($productslist['ingredients'])?$productslist['ingredients']:''; ?>.
														   </p>
														</div>
														<?php } ?>
														<?php if(isset($productslist['disclaimer']) && $productslist['disclaimer']!=''){ ?>
														<div class="descr">
														   <p class="sub_tit">Disclaimer</p>
														   <p class="font_si14">
															  <?php echo isset($productslist['disclaimer'])?$productslist['disclaimer']:''; ?>.
														   </p>
														</div>
														<?php } ?>
													 </div>
												  </div>
											   </div>
											</div>
										 </div>
					 </div>
					 
				  <?php $cnt++;} ?>
					 
					 
				  <?php }else{ ?>
				  <div>NO products are available<div>
				  <?php } ?>
                     
                  </div>
               </div>
			    </span>
            </div>
            <div class="clearfix">&nbsp;</div>
         </div>
		
      </div>
	  
	  <script>
	  function unitaddwhishlidts(id,val){
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
				$("#addwishlistids"+id+val).addClass("wishadd");
				$('#addwhish'+id+val).prop('title', 'Add to Wishlist');
						$('#sucessmsg').html('<div class="alt_cus"><div class="alert_msg1 animated slideInUp btn_suc"> Product Successfully Removed to wishlist <i class="fa fa-check  text-success ico_bac" aria-hidden="true"></i></div></div>');  
				document.getElementById("sucessmsg").focus();
				
				}
				if(data.msg==1){
				$('#sucessmsg').show('');
				 $("#addwishlistids"+id+val).removeClass("wishadd");
				 $('#addwhish'+id+val).prop('title', 'Added to Wishlist');
						$('#sucessmsg').html('<div class="alt_cus"><div class="alert_msg1 animated slideInUp btn_suc"> Product Successfully added to wishlist <i class="fa fa-check  text-success ico_bac" aria-hidden="true"></i></div></div>');  
				document.getElementById("sucessmsg").focus();				
				}
				}
			

			}
		});
	
	
}
  function getunitwiseproducts(itemid,cnt){
	  if(itemid!=''){
			  jQuery.ajax({
					url: "<?php echo site_url('category/unitwiseproduct_details');?>",
					type: 'post',
					data: {
							form_key : window.FORM_KEY,
							item_id: itemid,
						},
					dataType: 'html',
					success: function (data) {
							$("#unitwusechanges"+cnt).empty();
							$("#unitwusechanges"+cnt).append(data);
					}
				});

		}
	  
  }
  function subitemswiseproducts(sid){
	  if(sid!=''){
			  jQuery.ajax({
					url: "<?php echo site_url('category/suitemwiseproductslist');?>",
					type: 'post',
					data: {
							form_key : window.FORM_KEY,
							subitem_id: sid,
						},
					dataType: 'html',
					success: function (data) {
							$("#subitemwisefiltersdata").empty();
							$("#subitemwisefiltersdata").append(data);
					}
				});

		}
 }
function productqty(id){
	

	var pid=document.getElementById("product_id"+id).value;
	var qtycnt=document.getElementById("qty"+id).value;
	var amount=document.getElementById("amount"+id).value;
	var qty=parseInt(qtycnt);
	var totalamount=(qty - 1)*amount;
	if(qty==1){
		
		$('#qty'+id).val(qty);
	}else{
		$('#qty'+id).val(qty - 1);
		$("#qtymesage"+id).html('');
			jQuery.ajax({
				url: "<?php echo site_url('customer/qtyupdatecart');?>",
				type: 'post',
				data: {
					form_key : window.FORM_KEY,
					product_id: pid,
					qty: qty - 1,
					ajax: 1,
					},
				dataType: 'html',
				success: function (data) {
					//$("#oldcartqty").hide();
					$("#totalamount"+id).empty();
					$("#totalamount"+id).append(totalamount.toFixed(2));
					$("#oldcartqty").empty();
					$("#oldcartqty").empty();
					$("#oldcartqty").append(data);
				
				}
			});
	}
	
	
}
function productqtyincreae(id){
	var pid=document.getElementById("product_id"+id).value;
	var qtycnt1=document.getElementById("qty"+id).value;
	var orginalqtycnt=document.getElementById("orginalqty"+id).value;
	var amount=document.getElementById("amount"+id).value;
	var qty1=parseInt(qtycnt1);
	var totalamount=(qty1 + 1)*amount;
	if(qty1==orginalqtycnt){
		$("#qtymesage"+id).html("Available Quantity is " +orginalqtycnt);
	}else if(qty1==10){
	$("#qtymesage"+id).html("Maximum allowed Quantity is 10 ");
	}else{
		$("#qtymesage"+id).html("");
		$('#qty'+id).val(qty1 + 1);
			jQuery.ajax({
				url: "<?php echo site_url('customer/qtyupdatecart');?>",
				type: 'post',
				data: {
					form_key : window.FORM_KEY,
					product_id: pid,
					qty: qty1 + 1,
					ajax: 1,
					},
				dataType: 'html',
				success: function (data) {
					//$("#oldcartqty").hide();
					$("#totalamount"+id).empty();
					$("#totalamount"+id).append(totalamount.toFixed(2));
					$("#oldcartqty").empty();
					$("#oldcartqty").empty();
					$("#oldcartqty").append(data);
				
				}
			});
	}
	
}
function singleitemaddtocart(itemid,catid,val){

jQuery.ajax({
        url: "<?php echo site_url('customer/productviewonclickaddcart');?>",
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
						jQuery('#supcounts').show();
						jQuery('#sucessmsg').show();
						$("#supcounts").empty();
						$("#supcount").empty();
						$("#supcount").append(data.count);
						$("#supcounts").append(data.count);
						if(data.msg==2){
						$('#sucessmsg').html('<div class="alt_cus"><div class="alert_msg1 animated slideInUp btn_war"> Product already exits <i class="fa fa-check  text-success ico_bac" aria-hidden="true"></i></div></div>');  
						}
						if(data.msg==1){
						$('#sucessmsg').html('<div class="alt_cus"><div class="alert_msg1 animated slideInUp btn_suc"> Product added successfully <i class="fa fa-check  text-success ico_bac" aria-hidden="true"></i></div></div>');  
						}
				}

        }
      });

 }
</script>