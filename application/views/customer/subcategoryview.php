

<?php if(isset($quick) && $quick=='quick'){ ?>
<script>
   $(document).ready(function() {
      $('#onclicksubcat<?php echo $subcatid; ?>').click();
   });
    
</script>
<?php } ?>
<?php
   if(base64_decode($this->uri->segment(4))=='search'){
   $catids=base64_decode($this->uri->segment(5));
   	?>
<script>
   $(document).ready(function() {
      $('#onclicksubcat<?php echo $catids; ?>').click();
   });
    
</script>
<?php } ?>
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
   /* grossery sidebar	end */
</style>
<!--<div class="" style="margin-top:50px;">
   <img  src="<?php echo base_url(); ?>assets/home/images/ban1.png">
   </div>-->
<body >
<div class="">
<div class="sm_hide">
   <div class="container-fluid fluid_mod " id="containerhigh"></div>
   <div class="container-fluid fluid_mod " id="containerhighold">
      <div class="row ">
         <div class="mar_t20">
            <div class="col-md-12  ">
               <div class="title text-left mar_t10"><span> Grocery list</span></div>
               <!--groffers start-->
               <div class='col-md-12'>
                  <div class="carousel slide media-carousel" id="media">
                     <div class="carousel-inner">
					 
                        <?php $c=0;foreach($subcategory_list as $list){ ?>
							
							<?php if($list[0]['category_id']==21){ ?>
							<script>
							$(document).ready(function() {
							getproduct(<?php echo $list[0]['subcategory_id']; ?>);
							});
							</script>
							<?php } ?>
							
						
						
		 <?php if($c==0){ ?>
          <div class="item  active slid_hig">
            <div class="row">
				<?php if(isset($list[0]['subcategory_name']) && $list[0]['subcategory_name']!=''){ ?>
                	   <div style="cursor:pointer" class="col-md-2 col-sm-2" id="onclicksubcat<?php echo $list[0]['subcategory_id']; ?>"  onclick="getproduct(<?php echo $list[0]['subcategory_id']; ?>)">
						<img  alt="" src="<?php echo base_url('assets/subcategoryimages/'.$list[0]['subcategory_image']);?>">
						<p class="name_gr"><?php echo $list[0]['subcategory_name']; ?></p>
					 </div> 
					<?php } ?>
					<?php if(isset($list[1]['subcategory_name']) && $list[1]['subcategory_name']!=''){ ?>
                	   <div style="cursor:pointer" class="col-md-2 col-sm-2" id="onclicksubcat<?php echo $list[1]['subcategory_id']; ?>"  onclick="getproduct(<?php echo $list[1]['subcategory_id']; ?>)">
						<img  alt="" src="<?php echo base_url('assets/subcategoryimages/'.$list[1]['subcategory_image']);?>">
						<p class="name_gr"><?php echo $list[1]['subcategory_name']; ?></p>
						 </div> 
					<?php } ?>
					<?php if(isset($list[2]['subcategory_name']) && $list[2]['subcategory_name']!=''){ ?>
                	    <div style="cursor:pointer" class="col-md-2 col-sm-2" id="onclicksubcat<?php echo $list[2]['subcategory_id']; ?>"  onclick="getproduct(<?php echo $list[2]['subcategory_id']; ?>)">
							<img  alt="" src="<?php echo base_url('assets/subcategoryimages/'.$list[2]['subcategory_image']);?>">
						<p class="name_gr"><?php echo $list[2]['subcategory_name']; ?></p>
					</div> 
					<?php } ?>
					<?php if(isset($list[3]['subcategory_name']) && $list[3]['subcategory_name']!=''){ ?>
                	     <div style="cursor:pointer" class="col-md-2 col-sm-2" id="onclicksubcat<?php echo $list[3]['subcategory_id']; ?>"  onclick="getproduct(<?php echo $list[3]['subcategory_id']; ?>)">
						<img  alt="" src="<?php echo base_url('assets/subcategoryimages/'.$list[3]['subcategory_image']);?>">
						<p class="name_gr"><?php echo $list[3]['subcategory_name']; ?></p>
						 </div> 
					<?php } ?>
					<?php if(isset($list[4]['subcategory_name']) && $list[4]['subcategory_name']!=''){ ?>
                	     <div style="cursor:pointer" class="col-md-2 col-sm-2" id="onclicksubcat<?php echo $list[4]['subcategory_id']; ?>"  onclick="getproduct(<?php echo $list[4]['subcategory_id']; ?>)">
						  <img  alt="" src="<?php echo base_url('assets/subcategoryimages/'.$list[4]['subcategory_image']);?>">
							<p class="name_gr"><?php echo $list[4]['subcategory_name']; ?></p>
						 </div> 
					<?php } ?>
					<?php if(isset($list[5]['subcategory_name']) && $list[5]['subcategory_name']!=''){ ?>
                	     <div style="cursor:pointer" class="col-md-2 col-sm-2" id="onclicksubcat<?php echo $list[5]['subcategory_id']; ?>"  onclick="getproduct(<?php echo $list[5]['subcategory_id']; ?>)">
						<img  alt="" src="<?php echo base_url('assets/subcategoryimages/'.$list[5]['subcategory_image']);?>">
						<p class="name_gr"><?php echo $list[5]['subcategory_name']; ?></p>
					 </div> 
					<?php } ?>
                      
              			  
            </div>
          </div>
		  
		 <?php }else{ ?>
		  <!--item 1 -->
		  
		  <!--item 2 -->
           <div class="item slid_hig">
            <div class="row">
				<?php if(isset($list[0]['subcategory_name']) && $list[0]['subcategory_name']!=''){ ?>
                	   <div style="cursor:pointer" class="col-md-2 col-sm-2" id="onclicksubcat<?php echo $list[0]['subcategory_id']; ?>"  onclick="getproduct(<?php echo $list[0]['subcategory_id']; ?>)">
						<img  alt="" src="<?php echo base_url('assets/subcategoryimages/'.$list[0]['subcategory_image']);?>">
						<p class="name_gr"><?php echo $list[0]['subcategory_name']; ?></p>
					 </div> 
					<?php } ?>
					<?php if(isset($list[1]['subcategory_name']) && $list[1]['subcategory_name']!=''){ ?>
                	   <div style="cursor:pointer" class="col-md-2 col-sm-2" id="onclicksubcat<?php echo $list[1]['subcategory_id']; ?>"  onclick="getproduct(<?php echo $list[1]['subcategory_id']; ?>)">
						<img  alt="" src="<?php echo base_url('assets/subcategoryimages/'.$list[1]['subcategory_image']);?>">
						<p class="name_gr"><?php echo $list[1]['subcategory_name']; ?></p>
						 </div> 
					<?php } ?>
					<?php if(isset($list[2]['subcategory_name']) && $list[2]['subcategory_name']!=''){ ?>
                	    <div style="cursor:pointer" class="col-md-2 col-sm-2" id="onclicksubcat<?php echo $list[2]['subcategory_id']; ?>"  onclick="getproduct(<?php echo $list[2]['subcategory_id']; ?>)">
							<img  alt="" src="<?php echo base_url('assets/subcategoryimages/'.$list[2]['subcategory_image']);?>">
						<p class="name_gr"><?php echo $list[2]['subcategory_name']; ?></p>
					</div> 
					<?php } ?>
					<?php if(isset($list[3]['subcategory_name']) && $list[3]['subcategory_name']!=''){ ?>
                	     <div style="cursor:pointer" class="col-md-2 col-sm-2" id="onclicksubcat<?php echo $list[3]['subcategory_id']; ?>"  onclick="getproduct(<?php echo $list[3]['subcategory_id']; ?>)">
						<img  alt="" src="<?php echo base_url('assets/subcategoryimages/'.$list[3]['subcategory_image']);?>">
						<p class="name_gr"><?php echo $list[3]['subcategory_name']; ?></p>
						 </div> 
					<?php } ?>
					<?php if(isset($list[4]['subcategory_name']) && $list[4]['subcategory_name']!=''){ ?>
                	     <div style="cursor:pointer" class="col-md-2 col-sm-2" id="onclicksubcat<?php echo $list[4]['subcategory_id']; ?>"  onclick="getproduct(<?php echo $list[4]['subcategory_id']; ?>)">
						  <img  alt="" src="<?php echo base_url('assets/subcategoryimages/'.$list[4]['subcategory_image']);?>">
							<p class="name_gr"><?php echo $list[4]['subcategory_name']; ?></p>
						 </div> 
					<?php } ?>
					<?php if(isset($list[5]['subcategory_name']) && $list[5]['subcategory_name']!=''){ ?>
                	     <div style="cursor:pointer" class="col-md-2 col-sm-2" id="onclicksubcat<?php echo $list[5]['subcategory_id']; ?>"  onclick="getproduct(<?php echo $list[5]['subcategory_id']; ?>)">
						<img  alt="" src="<?php echo base_url('assets/subcategoryimages/'.$list[5]['subcategory_image']);?>">
						<p class="name_gr"><?php echo $list[5]['subcategory_name']; ?></p>
					 </div> 
					<?php } ?> 
            </div>
          </div>
		  
		 <?php } ?>
		 <?php $c++;} ?>
						
						
						
                     </div>
                     <a data-slide="prev" href="#media" class="left carousel-control">‹</a>
                     <a data-slide="next" href="#media" class="right carousel-control">›</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="clearfix">&nbsp;</div>
	  <?php $urlcatid=$this->uri->segment(3); ?>
	<?php if(isset($urlcatid) && base64_decode($urlcatid)==21){  ?>	
      <p style="border-top:1px solid #ddd;">&nbsp;</p>
      
	  <div class="row " id="grocerywisenewsubcategoryfilter">
	  <span id="grocerywisesubcategoryfilter" >
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
												  <a data-toggle="collapse" data-parent="#accordion" href="#znajomi<?php echo $cnt; ?>">
													 <div class="col-md-3">
														<div>
														   <img class="groc_min_h" src="<?php echo base_url('uploads/products/'.$productslist['item_image']); ?>">
														</div>
													 </div>
												  </a>
												  <div class="col-md-6">
													 <div class="gro_tit"><?php echo isset($productslist['item_name'])?$productslist['item_name']:''; ?>&&nbsp;<?php echo isset($productslist['product_code'])?$productslist['product_code']:''; ?></div>
													 <p class=""><?php echo isset($productslist['ingredients'])?$productslist['ingredients']:''; ?></p>
													 <p class="">Available in: &nbsp;&nbsp;
														<span   class="btn_cus btn_cus_acti"><?php echo $productslist['unit'].' Unit'; ?></span>&nbsp;&nbsp;
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
													<a href="javascript:void(0);" onclick="addwhishlidts('<?php echo $productslist['item_id']; ?>','<?php echo $cnt; ?>');" id="addwhish<?php echo $productslist['item_id']; ?><?php echo $cnt; ?>"  ><span id="addwishlistids<?php echo $productslist['item_id']; ?><?php echo $cnt; ?>" class="btn btn-primary btn-sm ">Add to Whishlist</span></a> 
													<?php }else{ ?>	
													<a href="javascript:void(0);" onclick="addwhishlidts('<?php echo $productslist['item_id']; ?>','<?php echo $cnt; ?>');" id="addwhish<?php echo $productslist['item_id']; ?><?php echo $cnt; ?>"  ><span id="addwishlistids<?php echo $productslist['item_id']; ?><?php echo $cnt; ?>" class="btn btn-warning btn-sm" style="background:#aaa;border:#aaa;">Add to Whishlist</span></a> 
													
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
		 </span>
      </div>
            <div class="clearfix">&nbsp;</div>
         </div>
		 </span>
      </div>
	  
	  
	  
      <br>
	  
	  <?php } ?>
     
	  <?php if(isset($urlcatid) && base64_decode($urlcatid)==20){  ?>	
      <!-- Filter Sidebar -->
      <div id="subcategorywise_products" style="">
         <div class="col-sm-3">
            <div class="title"><span>Filters</span></div>
            <form action="<?php echo base_url('category/categorywiseearch'); ?>" method="POST" >
               <div class="example">
                  <h3 class="text-left pad_0"style="padding:0;margin:0z">Price</h3>
                  <div id="html5"  name="html5" onclick="mobileaccessories(this.value, '<?php echo ''; ?>','<?php echo ''; ?>');" class="noUi-target noUi-ltr noUi-horizontal">
                  </div>
                  <select id="input-select" onchange="mobileaccessories(this.value, '<?php echo ''; ?>','<?php echo ''; ?>');" name="min_amount" >
                     <?php for( $i=floor($minimum_price['item_cost']); $i<=floor($maximum_price['item_cost']); $i+=500 ){  ?>
                     <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                     <?php } ?>
                  </select>
                  <input type="text" readonly="true" name="max_amount"   step="1" id="input-number">
               </div>
               <input type="hidden" name="categoryid" id="categoryid" value="<?php echo $this->uri->segment(3);?>">
               <?php if(base64_decode($this->uri->segment(3))=='18'){ ?>
               <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                  <?php if(count($myrestaurant)>0){?>
                  <div class="panel panel-primary">
                     <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                           <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                             My Restaurant
                           </a>
                        </h4>
                     </div>
                     <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                           <?php foreach ($myrestaurant as $reslist){ ?>
                           <div class="checkbox"><label><input type="checkbox" onclick="mobileaccessories(this.value, '<?php echo 'res'; ?>','<?php echo ''; ?>');" id="restrarent" name="products[res][]" value="<?php echo $reslist['seller_id']; ?>"><span>&nbsp;<?php echo $reslist['seller_name']; ?></span></label></div>
                           <?php } ?>
                        </div>
                     </div>
                  </div>
                  <?php } ?>
                  <?php if(count($cusine_list)>0){?>
                  <div class="panel panel-primary">
                     <div class="panel-heading" role="tab" id="headingThree">
                        <h4 class="panel-title">
                           <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                           Cuisine
                           </a>
                        </h4>
                     </div>
                     <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body">
                           <?php foreach ($cusine_list as $list){ ?>
                           <div class="checkbox"><label><input type="checkbox" onclick="mobileaccessories(this.value, '<?php echo 'cusine'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[cusine][]" value="<?php echo $list['cusine']; ?>"><span>&nbsp;<?php echo $list['cusine']; ?></span></label></div>
                           <?php } ?>
                        </div>
                     </div>
                  </div>
                  <?php } ?>
                  <?php if(count($avalibility_list)>0){?>
                  <div class="panel panel-primary">
                     <div class="panel-heading" role="tab" id="headingOne1">
                        <h4 class="panel-title">
                           <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                             Availability
                           </a>
                        </h4>
                     </div>
                     <?php //echo '<pre>';print_r($avalibility_list);exit; ?>
                     <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne1">
                        <div class="panel-body">
                           <select onchange="mobileaccessories(this.value, '<?php echo 'status'; ?>','<?php echo ''; ?>');" name="products[availability]" class="form-control" id="sel1">
                              <option value="">Select</option>
                              <?php foreach ($avalibility_list as $list){ ?>
                              <option value="<?php echo $list; ?>"><?php if($list==1){ echo "Instock";}else{ echo "Out of stock";}; ?></option>
                              <?php } ?>
                           </select>
                        </div>
                     </div>
                  </div>
                  <?php } ?>
               </div>
               <?php }else if(base64_decode($this->uri->segment(3))=='21'){ ?>
               <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                  <?php if(count($offer_list)>0){?>
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
                           <?php foreach ($offer_list as $list){ ?>
                           <div class="checkbox"><label><input type="checkbox" onclick="mobileaccessories(this.value, '<?php echo 'offer'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[offers][]" value="<?php echo $list['offers']; ?>"><span>&nbsp;<?php echo number_format($list['offers'], 2, '.', ''); ?></span></label></div>
                           <?php } ?>
                        </div>
                     </div>
                  </div>
                  <?php } ?>
                  <?php if(count($brand_list)>0){?>
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
                           <?php foreach ($brand_list as $list){ ?>
                           <div class="checkbox"><label><input type="checkbox" onclick="mobileaccessories(this.value, '<?php echo 'brand'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[brand][]" value="<?php echo $list['brand']; ?>"><span>&nbsp;<?php echo $list['brand']; ?></span></label></div>
                           <?php } ?>
                        </div>
                     </div>
                  </div>
                  <?php } ?>
                  <?php if(count($discount_list)>0){ ?>
                  <div class="panel panel-primary">
                     <div class="panel-heading" role="tab" id="headingThree0">
                        <h4 class="panel-title">
                           <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree0" aria-expanded="false" aria-controls="collapseThree0">
                           Discount	
                           </a>
                        </h4>
                     </div>
                     <div id="collapseThree0" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree0">
                        <div class="panel-body">
                           <?php foreach ($discount_list as $list){ ?>
                           <div class="checkbox"><label><input type="checkbox" onclick="mobileaccessories(this.value, '<?php echo 'discount'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[discount][]" value="<?php echo $list['discount']; ?>"><span>&nbsp;<?php echo $list['discount']; ?></span></label></div>
                           <?php } ?>
                        </div>
                     </div>
                  </div>
                  <?php } ?>
                  <?php if(count($avalibility_list)>0){?>
                  <div class="panel panel-primary">
                     <div class="panel-heading" role="tab" id="headingOne10">
                        <h4 class="panel-title">
                           <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne01" aria-expanded="true" aria-controls="collapseOne01">
                             Availability
                           </a>
                        </h4>
                     </div>
                     <?php //echo '<pre>';print_r($avalibility_list);exit; ?>
                     <div id="collapseOne01" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne10">
                        <div class="panel-body">
                           <select onchange="mobileaccessories(this.value, '<?php echo 'status'; ?>','<?php echo ''; ?>');" name="products[availability]" class="form-control" id="sel1">
                              <option value="">Select</option>
                              <?php foreach ($avalibility_list as $list){ ?>
                              <option value="<?php echo $list; ?>"><?php if($list==1){ echo "Instock";}else{ echo "Out of stock";}; ?></option>
                              <?php } ?>
                           </select>
                        </div>
                     </div>
                  </div>
                  <?php } ?>
               </div>
               <?php }else if(base64_decode($this->uri->segment(3))=='19'){ ?>
               <?php if(count($offer_list)>0){ ?>
               <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                  <div class="panel panel-primary">
                     <div class="panel-heading" role="tab" id="headingThree11">
                        <h4 class="panel-title">
                           <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree11" aria-expanded="false" aria-controls="collapseThree11">
                           Offer	
                           </a>
                        </h4>
                     </div>
                     <div id="collapseThree11" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree11">
                        <div class="panel-body">
                           <?php foreach ($offer_list as $list){ ?>
                           <div class="checkbox"><label><input type="checkbox" onclick="mobileaccessories(this.value, '<?php echo 'offer'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[offers][]" value="<?php echo $list['offers']; ?>"><span>&nbsp;<?php echo number_format($list['offers'], 2, '.', ''); ?></span></label></div>
                           <?php } ?>
                        </div>
                     </div>
                  </div>
                  <?php } ?>
                  <?php if(count($brand_list)>0){ ?>
                  <div class="panel panel-primary">
                     <div class="panel-heading" role="tab" id="headingThree">
                        <h4 class="panel-title">
                           <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                           BRAND	
                           </a>
                        </h4>
                     </div>
                     <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body">
                           <?php foreach ($brand_list as $list){ ?>
                           <div class="checkbox"><label><input type="checkbox" onclick="mobileaccessories(this.value, '<?php echo 'brand'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[brand][]" value="<?php echo $list['brand']; ?>"><span>&nbsp;<?php echo $list['brand']; ?></span></label></div>
                           <?php } ?>
                        </div>
                     </div>
                  </div>
                  <?php } ?>
                  <?php if(count($color_list)>0){ ?>
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
                           <?php foreach ($color_list as $list){ ?>
                           <div class="checkbox"><label><input type="checkbox" onclick="mobileaccessories(this.value, '<?php echo 'color'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[color][]" value="<?php echo $list['color_name']; ?>"><span>&nbsp;<?php echo $list['color_name']; ?></span></label></div>
                           <?php } ?>
                        </div>
                     </div>
                  </div>
                  <?php } ?>
                  <?php if(count($sizes_list)>0){ ?>
                  <div class="panel panel-primary">
                     <div class="panel-heading" role="tab" id="headingThr">
                        <h4 class="panel-title">
                           <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                           SIZE	
                           </a>
                        </h4>
                     </div>
                     <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThr">
                        <div class="panel-body">
                           <?php foreach ($sizes_list as $list){ ?>
                           <div class="checkbox"><label><input type="checkbox" onclick="mobileaccessories(this.value, '<?php echo 'size'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[size][]" value="<?php echo $list['p_size_name']; ?>"><span>&nbsp;<?php echo $list['p_size_name']; ?></span></label></div>
                           <?php } ?>
                        </div>
                     </div>
                  </div>
                  <?php } ?>
                  <?php if(count($discount_list)>0){?>
                  <div class="panel panel-primary">
                     <div class="panel-heading" role="tab" id="Discount">
                        <h4 class="panel-title">
                           <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                           Discount	
                           </a>
                        </h4>
                     </div>
                     <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="Discount">
                        <div class="panel-body">
                           <?php foreach ($discount_list as $list){ ?>
                           <div class="checkbox"><label><input type="checkbox" onclick="mobileaccessories(this.value, '<?php echo 'discount'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[discount][]" value="<?php echo $list['discount']; ?>"><span>&nbsp;<?php echo $list['discount']; ?></span></label></div>
                           <?php } ?>
                        </div>
                     </div>
                  </div>
                  <?php } ?>
                  <?php if(count($avalibility_list)>0){?>
                  <div class="panel panel-primary">
                     <div class="panel-heading" role="tab" id="Availability">
                        <h4 class="panel-title">
                           <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                             Availability
                           </a>
                        </h4>
                     </div>
                     <?php //echo '<pre>';print_r($avalibility_list);exit; ?>
                     <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="Availability">
                        <div class="panel-body">
                           <select onchange="mobileaccessories(this.value, '<?php echo 'status'; ?>','<?php echo ''; ?>');" name="products[availability]" class="form-control" id="sel1">
                              <option value="">Select</option>
                              <?php foreach ($avalibility_list as $list){ ?>
                              <option value="<?php echo $list; ?>"><?php if($list==1){ echo "Instock";}else{ echo "Out of stock";}; ?></option>
                              <?php } ?>
                           </select>
                        </div>
                     </div>
                  </div>
                  <?php } ?>
               </div>
               <?php }else if(base64_decode($this->uri->segment(3))=='20'){ ?>
               <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                  <?php if(count($offer_list)>0){ ?>
                  <div class="panel panel-primary">
                     <div class="panel-heading" role="tab" id="Offer">
                        <h4 class="panel-title">
                           <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                           Offer	
                           </a>
                        </h4>
                     </div>
                     <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="Offer">
                        <div class="panel-body">
                           <?php foreach ($offer_list as $list){ ?>
                           <div class="checkbox"><label><input type="checkbox" onclick="mobileaccessories(this.value, '<?php echo 'offer'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[offers][]" value="<?php echo $list['offers']; ?>"><span>&nbsp;<?php echo number_format($list['offers'], 2, '.', ''); ?></span></label></div>
                           <?php } ?>
                        </div>
                     </div>
                  </div>
                  <?php } ?>
                  <?php if(count($brand_list)>0){ ?>
                  <div class="panel panel-primary">
                     <div class="panel-heading" role="tab" id="BRAND">
                        <h4 class="panel-title">
                           <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                           BRAND	
                           </a>
                        </h4>
                     </div>
                     <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="BRAND">
                        <div class="panel-body">
                           <?php foreach ($brand_list as $list){ ?>
                           <div class="checkbox"><label><input type="checkbox" onclick="mobileaccessories(this.value, '<?php echo 'brand'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[brand][]" value="<?php echo $list['brand']; ?>"><span>&nbsp;<?php echo $list['brand']; ?></span></label></div>
                           <?php } ?>
                        </div>
                     </div>
                  </div>
                  <?php } ?>
                  <?php if(count($color_list)>0){ ?>
                  <div class="panel panel-primary">
                     <div class="panel-heading" role="tab" id="Colors">
                        <h4 class="panel-title">
                           <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                           Colors	
                           </a>
                        </h4>
                     </div>
                     <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="Colors">
                        <div class="panel-body">
                           <?php foreach ($color_list as $list){ ?>
                           <div class="checkbox"><label><input type="checkbox" onclick="mobileaccessories(this.value, '<?php echo 'color'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[color][]" value="<?php echo $list['color_name']; ?>"><span>&nbsp;<?php echo $list['color_name']; ?></span></label></div>
                           <?php } ?>
                        </div>
                     </div>
                  </div>
                  <?php } ?>
                  <?php if(count($discount_list)>0){ ?>
                  <!--<div class="panel panel-primary">
                     <div class="panel-heading" role="tab" id="Discount">
                     	 <h4 class="panel-title">
                     <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                       Discount	
                       </a>
                      </h4>
                     
                     </div>
                     <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="Discount">
                     	<div class="panel-body">
                     	<?php $cnt=1;foreach ($discount_list as $list){ ?>
                     	<?php if($cnt<=5){?>
                     		<div class="checkbox"><label><input type="checkbox" onclick="mobileaccessories(this.value, '<?php echo 'discount'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[discount][]" value="<?php echo $list['discount']; ?>"><span>&nbsp;<?php echo $list['discount']; ?></span></label></div>
                     	
                     	<?php }else { ?>
                     
                     			<div style="display:none;"  class="discountseemore checkbox"><label><input type="checkbox"  onclick="mobileaccessories(this.value, '<?php echo 'discount'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[discount][]" value="<?php echo $list['discount']; ?>"><span>&nbsp;<?php echo $list['discount']; ?></span></label></div>
                     
                     	<?php } ?>
                     	<?php $cnt++;}?>
                     	  <p type="button" id="discountmore" >see more</p>
                     
                     	</div>
                     </div>
                     </div>-->
                  <?php } ?>
               </div>
               <?php } ?>
            </form>
         </div>
         <!-- End Filter Sidebar -->
         <!-- Product List -->
         <div id="sucessmsg" style="display:none;"></div>
         <div class="col-md-9">
            <div class="title"><span><?php echo ucfirst(strtolower(isset($category_name['category_name'])?$category_name['category_name']:'')); ?>&nbsp; Category Products lists</span></div>
            <?php //echo '<pre>';print_r($subcategory_porduct_list);exit; ?>
            <div  style="display:none;" class="alert dark alert-success alert-dismissible" id="sucessmsg"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <?php //echo'<pre>';print_r($avg_count);exit;
               $customerdetails=$this->session->userdata('userdetails');
               $cnt=1;foreach($subcategory_porduct_list as $productslist){ 
               //echo'<pre>';print_r($avg_count);exit;
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
               <div class=" col-md-3 box-product-outer" style="width:23%">
                  <a href="<?php echo base_url('category/productview/'.base64_encode($productslist['item_id'])); ?>">
                     <div class="box-product">
                        <div class="img-wrapper item" style="position:relative" >
                           <div class="img_size text-center">
                              <img alt="Product" src="<?php echo base_url('uploads/products/'.$productslist['item_image']); ?>">
                           </div>
                           <?php if($productslist['item_quantity']<=0 || $productslist['item_status']==0){ ?>
                           <div  class="text-center out_of_stoc">
                              <div >
                                 <h4>out of stock</h4>
                              </div>
                           </div>
                           <?php } ?>
                           <div class="option ">
                              <?php if($productslist['item_quantity']>0 && $productslist['category_id']==18 || $productslist['category_id']==21){ ?>
                              <?php 	if (in_array($productslist['item_id'], $cart_item_ids) &&  in_array($customerdetails['customer_id'], $cust_ids)) { ?>
                  <a class="add-to-cart" style="cursor:pointer;" onclick="itemaddtocart('<?php echo $productslist['item_id']; ?>','<?php echo $productslist['category_id']; ?>','<?php echo $cnt; ?>');" id="cartitemtitle<?php echo $productslist['item_id']; ?><?php echo $cnt; ?>" data-toggle="tooltip" title="Added to Cart"><i id="addticartitem<?php echo $productslist['item_id']; ?><?php echo $cnt; ?>" class="fa fa-shopping-cart text-primary"></i></a>                  
                  <?php }else{ ?>	
                  <a class="add-to-cart" style="cursor:pointer;" onclick="itemaddtocart('<?php echo $productslist['item_id']; ?>','<?php echo $productslist['category_id']; ?>','<?php echo $cnt; ?>');" id="cartitemtitle<?php echo $productslist['item_id']; ?><?php echo $cnt; ?>" data-toggle="tooltip" title="Add to Cart"><i id="addticartitem<?php echo $productslist['item_id']; ?><?php echo $cnt; ?>" class="fa fa-shopping-cart"></i></a>                  
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
                  <?php foreach ($avg_count as $li){
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
                  </div>
                  </div>
                  </a>
               </div>
            </form>
            <?php  
               if(($cnt % 4)==0){?> 
            <div class="clearfix"></div>
            <?php } ?>
            <?php  $cnt++;} ?>
            <div class="clearfix"></div>
         </div>
      </div>
	  
	  <?php } ?>
   </div>
   <div class="clearfix"></div>
   <br>
   </div>
   <div class="md_hide">
			<br>
         <div class="mar_res_t150">
		 <span id="mobileviewelectoriccategory" >
            <div class="col-md-12  ">
               <div class="title text-left mar_t10"><span> sub Category</span></div>
               <!--groffers start-->
               <div class='col-md-12'>
                  <div class="carousel slide media-carousel" id="media">
                     <div class="carousel-inner">
					 
                        <?php $c=0;foreach($subcategory_list as $list){ ?>
		 <?php if($c==0){ ?>
          <div class="item  active slid_hig">
            <div class="row">
				<?php if(isset($list[0]['subcategory_name']) && $list[0]['subcategory_name']!=''){ ?>
                	   <div style="cursor:pointer" class="col-md-2 col-sm-2 col-xs-3 img_mobil" id="mobileonclicksubcat<?php echo $list[0]['subcategory_id']; ?>"  onclick="mobileviewsubcatoptions(<?php echo $list[0]['subcategory_id']; ?>)">
						<img  alt="" src="<?php echo base_url('assets/subcategoryimages/'.$list[0]['subcategory_image']);?>">
						<p class="name_gr_mob"><?php echo $list[0]['subcategory_name']; ?></p>
					 </div> 
					 
					<?php } ?>
					<?php if(isset($list[1]['subcategory_name']) && $list[1]['subcategory_name']!=''){ ?>
                	   <div style="cursor:pointer" class="col-md-2 col-sm-2 col-xs-3 img_mobil" id="mobileonclicksubcat<?php echo $list[1]['subcategory_id']; ?>"  onclick="mobileviewsubcatoptions(<?php echo $list[1]['subcategory_id']; ?>)">
						<img  alt="" src="<?php echo base_url('assets/subcategoryimages/'.$list[1]['subcategory_image']);?>">
						<p class="name_gr_mob"><?php echo $list[1]['subcategory_name']; ?></p>
						 </div> 
					<?php } ?>
					<?php if(isset($list[2]['subcategory_name']) && $list[2]['subcategory_name']!=''){ ?>
                	    <div style="cursor:pointer" class="col-md-2 col-sm-2 col-xs-3 img_mobil" id="mobileonclicksubcat<?php echo $list[2]['subcategory_id']; ?>"  onclick="mobileviewsubcatoptions(<?php echo $list[2]['subcategory_id']; ?>)">
							<img  alt="" src="<?php echo base_url('assets/subcategoryimages/'.$list[2]['subcategory_image']);?>">
						<p class="name_gr_mob"><?php echo $list[2]['subcategory_name']; ?></p>
					</div> 
					<?php } ?>
					<?php if(isset($list[3]['subcategory_name']) && $list[3]['subcategory_name']!=''){ ?>
                	     <div style="cursor:pointer" class="col-md-2 col-sm-2 col-xs-3 img_mobil" id="mobileonclicksubcat<?php echo $list[3]['subcategory_id']; ?>"  onclick="mobileviewsubcatoptions(<?php echo $list[3]['subcategory_id']; ?>)">
						<img  alt="" src="<?php echo base_url('assets/subcategoryimages/'.$list[3]['subcategory_image']);?>">
						<p class="name_gr_mob"><?php echo $list[3]['subcategory_name']; ?></p>
						 </div> 
					<?php } ?>
					<?php if(isset($list[4]['subcategory_name']) && $list[4]['subcategory_name']!=''){ ?>
                	     <div style="cursor:pointer" class="col-md-2 col-sm-2 col-xs-3 img_mobil" id="mobileonclicksubcat<?php echo $list[4]['subcategory_id']; ?>"  onclick="mobileviewsubcatoptions(<?php echo $list[4]['subcategory_id']; ?>)">
						  <img  alt="" src="<?php echo base_url('assets/subcategoryimages/'.$list[4]['subcategory_image']);?>">
							<p class="name_gr_mob"><?php echo $list[4]['subcategory_name']; ?></p>
						 </div> 
					<?php } ?>
					<?php if(isset($list[5]['subcategory_name']) && $list[5]['subcategory_name']!=''){ ?>
                	     <div style="cursor:pointer" class="col-md-2 col-sm-2 col-xs-3 img_mobil" id="mobileonclicksubcat<?php echo $list[5]['subcategory_id']; ?>"  onclick="mobileviewsubcatoptions(<?php echo $list[5]['subcategory_id']; ?>)">
						<img  alt="" src="<?php echo base_url('assets/subcategoryimages/'.$list[5]['subcategory_image']);?>">
						<p class="name_gr_mob"><?php echo $list[5]['subcategory_name']; ?></p>
					 </div> 
					<?php } ?>
                      
              			  
            </div>
          </div>
		  
		 <?php }else{ ?>
		  <!--item 1 -->
		  
		  <!--item 2 -->
           <div class="item slid_hig">
            <div class="row">
				<?php if(isset($list[0]['subcategory_name']) && $list[0]['subcategory_name']!=''){ ?>
                	   <div style="cursor:pointer" class="col-md-2" id="mobileonclicksubcat<?php echo $list[0]['subcategory_id']; ?>"  onclick="mobileviewsubcatoptions(<?php echo $list[0]['subcategory_id']; ?>)">
						<img  alt="" src="<?php echo base_url('assets/subcategoryimages/'.$list[0]['subcategory_image']);?>">
						<p class="name_gr_mob"><?php echo $list[0]['subcategory_name']; ?></p>
					 </div> 
					<?php } ?>
					<?php if(isset($list[1]['subcategory_name']) && $list[1]['subcategory_name']!=''){ ?>
                	   <div style="cursor:pointer" class="col-md-2" id="mobileonclicksubcat<?php echo $list[1]['subcategory_id']; ?>"  onclick="mobileviewsubcatoptions(<?php echo $list[1]['subcategory_id']; ?>)">
						<img  alt="" src="<?php echo base_url('assets/subcategoryimages/'.$list[1]['subcategory_image']);?>">
						<p class="name_gr_mob"><?php echo $list[1]['subcategory_name']; ?></p>
						 </div> 
					<?php } ?>
					<?php if(isset($list[2]['subcategory_name']) && $list[2]['subcategory_name']!=''){ ?>
                	    <div style="cursor:pointer" class="col-md-2" id="mobileonclicksubcat<?php echo $list[2]['subcategory_id']; ?>"  onclick="getproduct(<?php echo $list[2]['subcategory_id']; ?>)">
							<img  alt="" src="<?php echo base_url('assets/subcategoryimages/'.$list[2]['subcategory_image']);?>">
						<p class="name_gr_mob"><?php echo $list[2]['subcategory_name']; ?></p>
					</div> 
					<?php } ?>
					<?php if(isset($list[3]['subcategory_name']) && $list[3]['subcategory_name']!=''){ ?>
                	     <div style="cursor:pointer" class="col-md-2" id="mobileonclicksubcat<?php echo $list[3]['subcategory_id']; ?>"  onclick="mobileviewsubcatoptions(<?php echo $list[3]['subcategory_id']; ?>)">
						<img  alt="" src="<?php echo base_url('assets/subcategoryimages/'.$list[3]['subcategory_image']);?>">
						<p class="name_gr_mob"><?php echo $list[3]['subcategory_name']; ?></p>
						 </div> 
					<?php } ?>
					<?php if(isset($list[4]['subcategory_name']) && $list[4]['subcategory_name']!=''){ ?>
                	     <div style="cursor:pointer" class="col-md-2" id="mobileonclicksubcat<?php echo $list[4]['subcategory_id']; ?>"  onclick="mobileviewsubcatoptions(<?php echo $list[4]['subcategory_id']; ?>)">
						  <img  alt="" src="<?php echo base_url('assets/subcategoryimages/'.$list[4]['subcategory_image']);?>">
							<p class="name_gr_mob"><?php echo $list[4]['subcategory_name']; ?></p>
						 </div> 
					<?php } ?>
					<?php if(isset($list[5]['subcategory_name']) && $list[5]['subcategory_name']!=''){ ?>
                	     <div style="cursor:pointer" class="col-md-2" id="mobileonclicksubcat<?php echo $list[5]['subcategory_id']; ?>"  onclick="mobileviewsubcatoptions(<?php echo $list[5]['subcategory_id']; ?>)">
						<img  alt="" src="<?php echo base_url('assets/subcategoryimages/'.$list[5]['subcategory_image']);?>">
						<p class="name_gr_mob"><?php echo $list[5]['subcategory_name']; ?></p>
					 </div> 
					<?php } ?> 
            </div>
          </div>
		  
		 <?php } ?>
		 <?php $c++;} ?>
						
						
						
                     </div>
                     <a data-slide="prev" href="#media" class="left carousel-control sm_hide">‹</a>
                     <a data-slide="next" href="#media" class="right carousel-control sm_hide">›</a>
                  </div>
               </div>
            </div>
			
			</span>
			
			 
         </div>
      </div>
</body>



<!--mobile view-->
<script>
function mobileviewsubcatoptions(id){
	if(id!=''){
		jQuery.ajax({
			
					url: "<?php echo site_url('category/mobileviewsubcategorywiseproducts');?>",
					type: 'post',
					data: {
						form_key : window.FORM_KEY,
						subcatid: id,
						},
					dataType: 'html',
					success: function (data) {
						$("#mobileviewelectoriccategory").empty();
						$("#mobileviewelectoriccategory").append(data);
					}
	   });
	}
	
}
</script>


<!--mobile view end-->
<script>
   $(document).ready(function(){
       $("#discountmore").click(function(){
           $(".discountseemore").toggle();
       });
   });
   
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
   						$('#sucessmsg').html('<div class="alt_cus"><div class="alert_msg1 animated slideInUp btn_suc"> Product Successfully Removed to cart <i class="fa fa-check  text-success ico_bac" aria-hidden="true"></i></div></div>');  
   						}
   						if(data.msg==1){
   						 $("#addticartitem"+itemid+val).addClass("text-primary");
   						$('#cartitemtitle'+itemid+val).prop('title', 'Added to cart');
   						$('#sucessmsg').html('<div class="alt_cus"><div class="alert_msg1 animated slideInUp btn_suc"> Product Successfully added to cart <i class="fa fa-check  text-success ico_bac" aria-hidden="true"></i></div></div>');  
   						}
   				}
   
           }
         });
   
    }
   function mobileaccessories(val,status,check){
   	jQuery.ajax({
   		
   				url: "<?php echo site_url('category/categorywiseearch');?>",
   				type: 'post',
   			
   				data: {
   					form_key : window.FORM_KEY,
   					categoryid: '<?php echo $this->uri->segment(3); ?>',
   					productsvalues: val,
   					searchvalue: status,
   					unchecked: check,
   					mini_mum: $('#input-select').val(),
   					maxi_mum: $('#input-number').val(),
   
   					},
   				dataType: 'html',
   				success: function (data) {
   					$("#containerhigh").empty();
   					$("#containerhighold").hide();
   					$("#containerhigh").show();
   					$("#containerhigh").append(data);
   	}
   });
   }
   function discount(id){
   	var form = document.getElementById("discountform");
   
   document.getElementById("discountform").addEventListener("click", function () {
     form.submit();
   });
   	
   }
   function addwhishlidts(id,val){
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
   				$("#addwishlistids"+id+val).removeClass("text-primary");
   				$('#addwhish'+id+val).prop('title', 'Add to Wishlist');
   						$('#sucessmsg').html('<div class="alt_cus"><div class="alert_msg1 animated slideInUp btn_suc"> Product Successfully Removed to wishlist <i class="fa fa-check  text-success ico_bac" aria-hidden="true"></i></div></div>');  
   				document.getElementById("sucessmsg").focus();
   				
   				}
   				if(data.msg==1){
   				$('#sucessmsg').show('');
   				 $("#addwishlistids"+id+val).addClass("text-primary");
   				 $('#addwhish'+id+val).prop('title', 'Added to Wishlist');
   						$('#sucessmsg').html('<div class="alt_cus"><div class="alert_msg1 animated slideInUp btn_suc"> Product Successfully added to wishlist <i class="fa fa-check  text-success ico_bac" aria-hidden="true"></i></div></div>');  
   				document.getElementById("sucessmsg").focus();				
   				}
   				
   				}
   			
   
   			}
   		});
   	
   	
   }
   function getproduct(id){
   	if(id!=''){
   	jQuery.ajax({
   				url: "<?php echo site_url('category/categorywiseproductslist');?>",
   				type: 'post',
   				data: {
   				subcategoryid: id,
   				},
   				dataType: 'html',
   				success: function (data) {
   					
   					
   					$("#subcategorywise_products").empty();
   					$("#grocerywisesubcategoryfilter").hide();
   					$("#grocerywisenewsubcategoryfilter").empty();
   					$("#subcategorywise_products").append(data);
   					$("#grocerywisenewsubcategoryfilter").append(data);
   				}
   			});
   			
   	}
   	
   	
   }
   (function($) {
       $(function() {
           $('.test').fSelect();
       });
   })(jQuery);
</script>

<script>
   var select = document.getElementById('input-select');
   
   // Append the option elements
   for ( var i = '<?php echo floor($minimum_price['item_cost']); ?>'; i <= '<?php echo floor($maximum_price['item_cost']); ?>'; i++ ){
   
   var option = document.createElement("option");
   option.text = i;
   option.value = i;
   
   select.appendChild(option);
   }
   
		var html5Slider = document.getElementById('html5');
   
   noUiSlider.create(html5Slider, {
   start: [ '<?php echo floor($minimum_price['item_cost']); ?>', '<?php echo floor($maximum_price['item_cost']); ?>' ],
   connect: true,
   range: {
   'min': <?php echo floor($minimum_price['item_cost']); ?>,
   'max': <?php echo floor($maximum_price['item_cost']); ?>
   }
   });
   
   var inputNumber = document.getElementById('input-number');
   
   html5Slider.noUiSlider.on('update', function( values, handle ) {
   
   var value = values[handle];
   
   if ( handle ) {
   inputNumber.value = value;
   } else {
   select.value = Math.round(value);
   }
   });
   html5Slider.noUiSlider.on('change', function(){
   mobileaccessories('','','');
   });
   select.addEventListener('change', function(){
   html5Slider.noUiSlider.set([this.value, null]);
   });
   
   inputNumber.addEventListener('change', function(){
   html5Slider.noUiSlider.set([null, this.value]);
   });
</script>
<script>
   $('.add-to-cart').on('click', function () {
           var cart = $('.shopping_cart');
           var imgtodrag = $(this).parent().parent('.item').find("img").eq(0);
           if (imgtodrag) {
   			//alert();
               var imgclone = imgtodrag.clone()
                   .offset({
                   top: imgtodrag.offset().top,
                   left: imgtodrag.offset().left
               })
                   .css({
                   'opacity': '0.5',
                       'position': 'absolute',
                       'height': '150px',
                       'width': '150px',
                       'z-index': '1026'
               })
                   .appendTo($('body'))
                   .animate({
                   'top': cart.offset().top + 10,
                       'left': cart.offset().left + 10,
                       'width': 75,
                       'height': 75
               }, 1000, 'easeInOutExpo');
               
               setTimeout(function () {
                   cart.effect("shake", {
                       times: 2
                   }, 200);
               }, 1500);
   
               imgclone.animate({
                   'width': 0,
                       'height': 0
               }, function () {
                   $(this).detach()
               });
           }
       });
</script>
<!--grocery-->
	  <script>
	  
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
  

