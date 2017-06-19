<div id="page">
  <header>
    <div class="header-banner">
      <div class="assetBlock">
       <!-- <div style="height: 20px; overflow: hidden;" id="">
         <p style="display: block; margin-left: 918px;"><i class="fa fa-map-marker" aria-hidden="true"></i> Location : <?php //echo $this->session->userdata('location_name'); ?></p>
       
		
		</div>-->
		
		<div class="fl-header-right">
          <div class="fl-links locv">
            <div class="no-js">
              <h2 align="right" class="hm_lcao"><i class="fa fa-map-marker" aria-hidden="true"></i> Location : <?php echo $this->session->userdata('location_name');   ?></h2>
              <div class="fl-nav-links">
                <div class="input-box">
        <select name="location_name" id="location_name" class="validate-select sel_are">
        <option value="">Select Area </option>
		<?php foreach($locationdata as $location_data) {?>
        <option value="<?php echo $location_data->location_name; ?>"><?php echo $location_data->location_name; ?></option>
       
		<?php } ?>
        </select>     
          <!-- <button type="submit" class="button subscribe" name="location_submit" id="location_submit"><span>submit</span></button>-->
         
        </div> 


				</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="header">
      <div class="header-container container">
        <div class="row">
          <div class="logo"> <a href="<?php echo base_url(); ?>">
            <div><img src="<?php echo base_url(); ?>assets/home/images/logo.png" alt=""></div>
            </a> </div>
          <div class="fl-nav-menu">
            <nav>
              <div class="mm-toggle-wrap">
                <div class="mm-toggle"><i class="icon-align-justify"></i><span class="mm-label">Menu</span> </div>
              </div>
              <div class="nav-inner"> 
                <!-- BEGIN NAV -->
                <ul id="nav" class="hidden-xs">
                  <li id="nav-home" class="level0 parent drop-menu"><a class="level-top active" href="<?php echo base_url(); ?>"><span>Home</span></a> 
                    <!--<ul class="level1" style="display: none;">
                      <li class="level1 parent"><a href="#"><span>Home Version 1</span></a></li>
                      <li class="level1 parent"><a href="#"><span>Home Version 2</span></a></li>
                    </ul>--> 
                  </li>
				  
				  <?php foreach($catdata as $cat_data){?>
                  <li class="mega-menu"> <a class="level-top" href="#"><span><?php echo $cat_data->category_name;  ?></span></a>
                    <div class="level0-wrapper dropdown-6col" style="left: 0px; display: none;">
                      <div class="container">
                        <div class="level0-wrapper2">
                          <div class="nav-block nav-block-center"> 
                            <!--mega menu-->
                            
                            <ul class="level0">
                              <li class="level3 nav-6-1 parent item"> <a href="#"><span><?php echo $cat_data->category_name;  ?></span></a> 
                                <!--sub sub category-->
                                <ul class="level1">
								
                                 <?php if(!empty($cat_data->subcat[0]))  { ?> <li class="level2 nav-6-1-1"> <a href="<?php echo base_url(); ?>home/productsview/<?php echo $cat_data->category_name;  ?>/<?php echo $cat_data->subcat[0]['subcategory_name'];  ?>"><span><?php echo $cat_data->subcat[0]['subcategory_name'];  ?></span></a> </li><?php } ?>
                                  <?php if(!empty($cat_data->subcat[1]))  { ?><li class="level2 nav-6-1-1"> <a href="<?php echo base_url(); ?>home/productsview/<?php echo $cat_data->category_name;  ?>/<?php echo $cat_data->subcat[1]['subcategory_name'];  ?>"><span><?php echo $cat_data->subcat[1]['subcategory_name'];  ?></span></a> </li><?php } ?>
                                  <?php if(!empty($cat_data->subcat[2]))  { ?><li class="level2 nav-6-1-1"> <a href="<?php echo base_url(); ?>home/productsview/<?php echo $cat_data->category_name;  ?>/<?php echo $cat_data->subcat[2]['subcategory_name'];  ?>"><span><?php echo $cat_data->subcat[2]['subcategory_name'];  ?></span></a> </li><?php } ?>
								
                                </ul>
                                <!--level1--> 
                                <!--sub sub category--> 
                              </li>
                              <!--level3 nav-6-1 parent item-->
                              <li class="level3 nav-6-1 parent item"> <a href="#"><span><?php echo $cat_data->category_name;  ?></span></a> 
                                <!--sub sub category-->
                                <ul class="level1">
                                  <?php if(!empty($cat_data->subcat[3]))  { ?><li class="level2 nav-6-1-1"> <a href="<?php echo base_url(); ?>home/productsview/<?php echo $cat_data->category_name;  ?>/<?php echo $cat_data->subcat[3]['subcategory_name'];  ?>"><span><?php echo $cat_data->subcat[3]['subcategory_name'];  ?></span></a> </li><?php } ?>
                                  <?php if(!empty($cat_data->subcat[4]))  { ?><li class="level2 nav-6-1-1"> <a href="<?php echo base_url(); ?>home/productsview/<?php echo $cat_data->category_name;  ?>/<?php echo $cat_data->subcat[4]['subcategory_name'];  ?>"><span><?php echo $cat_data->subcat[4]['subcategory_name'];  ?></span></a> </li><?php } ?>
								  <?php if(!empty($cat_data->subcat[5]))  { ?><li class="level2 nav-6-1-1"> <a href="<?php echo base_url(); ?>home/productsview/<?php echo $cat_data->category_name;  ?>/<?php echo $cat_data->subcat[5]['subcategory_name'];  ?>"><span><?php echo $cat_data->subcat[5]['subcategory_name'];  ?></span></a> </li><?php } ?>
                                </ul>
                                <!--level1--> 
                                <!--sub sub category--> 
                              </li>
                              <!--level3 nav-6-1 parent item-->
                              <li class="level3 nav-6-1 parent item"> <a href="#"><span><?php echo $cat_data->category_name;  ?></span></a> 
                                <!--sub sub category-->
                                <ul class="level1">
                                 <?php if(!empty($cat_data->subcat[6]))  { ?><li class="level2 nav-6-1-1"> <a href="<?php echo base_url(); ?>home/productsview/<?php echo $cat_data->category_name;  ?>/<?php echo $cat_data->subcat[6]['subcategory_name'];  ?>"><span><?php echo $cat_data->subcat[6]['subcategory_name'];  ?></span></a> </li><?php } ?>
                                 <?php if(!empty($cat_data->subcat[7]))  { ?><li class="level2 nav-6-1-1"> <a href="<?php echo base_url(); ?>home/productsview/<?php echo $cat_data->category_name;  ?>/<?php echo $cat_data->subcat[7]['subcategory_name'];  ?>"><span><?php echo $cat_data->subcat[7]['subcategory_name'];  ?></span></a> </li><?php } ?>
								 <?php if(!empty($cat_data->subcat[8]))  { ?><li class="level2 nav-6-1-1"> <a href="<?php echo base_url(); ?>home/productsview/<?php echo $cat_data->category_name;  ?>/<?php echo $cat_data->subcat[8]['subcategory_name'];  ?>"><span><?php echo $cat_data->subcat[8]['subcategory_name'];  ?></span></a> </li><?php } ?>
                                </ul>
                                <!--level1--> 
                                <!--sub sub category--> 
                              </li>
                              <!--level3 nav-6-1 parent item-->
                              <li class="level3 nav-6-1 parent item"> <a href="#"><span><?php echo $cat_data->category_name;  ?></span></a> 
                                <!--sub sub category-->
                                <ul class="level1">
                                  <?php if(!empty($cat_data->subcat[9]))  { ?><li class="level2 nav-6-1-1"> <a href="<?php echo base_url(); ?>home/productsview/<?php echo $cat_data->category_name;  ?>/<?php echo $cat_data->subcat[9]['subcategory_name'];  ?>"><span><?php echo $cat_data->subcat[9]['subcategory_name'];  ?></span></a> </li><?php } ?>
                                  <?php if(!empty($cat_data->subcat[10]))  { ?><li class="level2 nav-6-1-1"> <a href="<?php echo base_url(); ?>home/productsview/<?php echo $cat_data->category_name;  ?>/<?php echo $cat_data->subcat[10]['subcategory_name'];  ?>"><span><?php echo $cat_data->subcat[10]['subcategory_name'];  ?></span></a> </li><?php } ?>
								  <?php if(!empty($cat_data->subcat[11]))  { ?><li class="level2 nav-6-1-1"> <a href="<?php echo base_url(); ?>home/productsview/<?php echo $cat_data->category_name;  ?>/<?php echo $cat_data->subcat[11]['subcategory_name'];  ?>"><span><?php echo $cat_data->subcat[11]['subcategory_name'];  ?></span></a> </li><?php } ?>
                                </ul>
                                <!--level1--> 
                                <!--sub sub category--> 
                              </li>
                              <!--level3 nav-6-1 parent item-->
                              <li class="level3 nav-6-1 parent item"> <a href="#"><span><?php echo $cat_data->category_name;  ?></span></a> 
                                <!--sub sub category-->
                                <ul class="level1">
                                  <?php if(!empty($cat_data->subcat[12]))  { ?><li class="level2 nav-6-1-1"> <a href="<?php echo base_url(); ?>home/productsview/<?php echo $cat_data->category_name;  ?>/<?php echo $cat_data->subcat[12]['subcategory_name'];  ?>"><span><?php echo $cat_data->subcat[12]['subcategory_name'];  ?></span></a> </li><?php } ?>
								  <?php if(!empty($cat_data->subcat[13]))  { ?><li class="level2 nav-6-1-1"> <a href="<?php echo base_url(); ?>home/productsview/<?php echo $cat_data->category_name;  ?>/<?php echo $cat_data->subcat[13]['subcategory_name'];  ?>"><span><?php echo $cat_data->subcat[13]['subcategory_name'];  ?></span></a> </li><?php } ?>
                                  <?php if(!empty($cat_data->subcat[14]))  { ?><li class="level2 nav-6-1-1"> <a href="<?php echo base_url(); ?>home/productsview/<?php echo $cat_data->category_name;  ?>/<?php echo $cat_data->subcat[14]['subcategory_name'];  ?>"><span><?php echo $cat_data->subcat[14]['subcategory_name'];  ?></span></a> </li><?php } ?>
                                </ul>
                                <!--level1--> 
                                <!--sub sub category--> 
                              </li>
                              <!--level3 nav-6-1 parent item-->
                              <li class="level3 nav-6-1 parent item"> <a href="#"><span><?php echo $cat_data->category_name;  ?></span></a> 
                                <!--sub sub category-->
                                <ul class="level1">
                                  <?php if(!empty($cat_data->subcat[15]))  { ?><li class="level2 nav-6-1-1"> <a href="<?php echo base_url(); ?>home/productsview/<?php echo $cat_data->category_name;  ?>/<?php echo $cat_data->subcat[15]['subcategory_name'];  ?>"><span><?php echo $cat_data->subcat[15]['subcategory_name'];  ?></span></a> </li><?php } ?>
                                  <?php if(!empty($cat_data->subcat[16]))  { ?><li class="level2 nav-6-1-1"> <a href="<?php echo base_url(); ?>home/productsview/<?php echo $cat_data->category_name;  ?>/<?php echo $cat_data->subcat[16]['subcategory_name'];  ?>"><span><?php echo $cat_data->subcat[16]['subcategory_name'];  ?></span></a> </li><?php } ?>
								  <?php if(!empty($cat_data->subcat[17]))  { ?><li class="level2 nav-6-1-1"> <a href="<?php echo base_url(); ?>home/productsview/<?php echo $cat_data->category_name;  ?>/<?php echo $cat_data->subcat[17]['subcategory_name'];  ?>"><span><?php echo $cat_data->subcat[17]['subcategory_name'];  ?></span></a> </li><?php } ?>
                                </ul>
                                <!--level1--> 
                                <!--sub sub category--> 
                              </li>
                              <!--level3 nav-6-1 parent item-->
                            </ul>
                            <!--level0--> 
                          </div>
                          <!--nav-block nav-block-center--> 
                        </div>
                        <!--level0-wrapper2--> 
                      </div>
                      <!--container--> 
                    </div>
                    <!--level0-wrapper dropdown-6col--> 
                    <!--mega menu--> 
                  </li>
                 
                  <?php } ?>
                  
                  
                  
                  <!--<li class="mega-menu"> <a class="level-top" href="#"><span>Sandwiches‎</span></a> </li>-->
                  <li class="level0 parent drop-menu"><a href="#"><span>Pages</span> </a> 
                    <!--sub sub category-->
                    <ul class="level1" style="">
                      <li class="level1 nav-10-4"> <a href="#"> <span>About Us</span> </a> </li>
                      <li class="level1 first parent"><a href="#"><span>Blog</span></a> 
                        <!--sub sub category-->
                        <ul class="level2 right-sub">
                          <li class="level2 nav-2-1-1 first"><a href="#"><span>Blog Detail</span></a></li>
                        </ul>
                        <!--sub sub category--> 
                      </li>
                    </ul>
                  </li>
                  <li class="fl-custom-tabmenulink mega-menu"> <a href="#" class="level-top"> <span>Custom</span> </a>
                    <div class="level0-wrapper fl-custom-tabmenu" style="left: 0px; display: none;">
                      <div class="container">
                        <div class="header-nav-dropdown-wrapper clearer">
                          <div class="grid12-3">
                            <div><img src="<?php echo base_url(); ?>assets/home/images/custom-img1.jpg" alt=""></div>
                            <h4 class="heading">SALE UP TO 30% OFF</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                          </div>
                          <div class="grid12-3">
                            <div><img src="<?php echo base_url(); ?>assets/home/images/custom-img2.jpg" alt=""></div>
                            <h4 class="heading">SALE UP TO 30% OFF</h4>
                            <p>Sed et quam lacus. Fusce condimentum eleifend enim a feugiat.</p>
                          </div>
                          <div class="grid12-3">
                            <div><img src="<?php echo base_url(); ?>assets/home/images/custom-img1.jpg" alt=""></div>
                            <h4 class="heading">SALE UP TO 30% OFF</h4>
                            <p>Sed et quam lacus. Fusce condimentum eleifend enim a feugiat.</p>
                          </div>
                          <div class="grid12-3">
                            <div><img src="<?php echo base_url(); ?>assets/home/images/custom-img4.jpg" alt=""></div>
                            <h4 class="heading">SALE UP TO 30% OFF</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
                <!--nav--> 
              </div>
            </nav>
          </div>
          <!--row--> 
        </div>
        <div class="fl-header-right">
          <div class="fl-links">
            <div class="no-js"> <a title="Company" class="clicker"></a>
              <div class="fl-nav-links">
                <?php if($this->session->userdata('user_id') == "")  {?>
                <ul class="links">
                 <!-- <li><a href="#" title="My Account">My Account</a></li>-->
                  <!--<li><a href="#" title="Wishlist">Wishlist</a></li>-->
                  <!--<li><a href="#" title="Checkout">Checkout</a></li>-->
                  <!--<li><a href="#" title="Blog"><span>Blog</span></a></li>-->
                 <li>
                    <button class="btn btn-danger hm_login cust_btn md-trigger" data-modal="modal-8" onClick="registershow()"> Login/Sign Up</button>
                  </li>
                </ul>
				
				<?php } else { ?>
				
				<ul class="links">
                 <!-- <li><a href="#" title="My Account">My Account</a></li>-->
                  <!--<li><a href="#" title="Wishlist">Wishlist</a></li>-->
                  <!--<li><a href="#" title="Checkout">Checkout</a></li>-->
                  <!--<li><a href="#" title="Blog"><span>Blog</span></a></li>-->
                 <li>
                    <button class="btn btn-danger hm_login cust_btn md-trigger"> <?php echo $this->session->userdata('user_name'); ?></button>
                  </li>
				   
				   <li><a href="<?php echo base_url(); ?>users/viewprofile" title="Blog"><span>View Profile</span></a></li>
              
                <li><a href="<?php echo base_url(); ?>users/change_password" title="Blog"><span>Change Password</span></a></li>
              
				  <li><a href="<?php echo base_url(); ?>home/logout" title="Blog"><span>Logout</span></a></li>
                </ul>
				
				
				<?php } ?>
				
              </div>
            </div>
          </div>
          <div class="fl-cart-contain">
          <div class="mini-cart">
	        <?php $cart = $this->cart->contents();  ?>
            <div class="basket"> <a href="<?php echo base_url();?>home/addtocart"><span> <?php echo count($cart);   ?> </span></a> </div>
			 <?php
                  // All values of cart store in "$cart". 
                  if ($cart = $this->cart->contents()): ?>
			 
			<form action="<?php echo base_url(); ?>home/addtocart" method="post">
            <div class="fl-mini-cart-content" style="display: none;">
              <div class="block-subtitle">
                <div class="top-subtotal"><?php echo count($cart);   ?> items, <!--<span class="price">RS 259.99</span>--> </div>
                <!--top-subtotal-->
                <!--pull-right-->
              </div>
              <!--block-subtitle-->
              <ul class="mini-products-list" id="cart-sidebar">
			 <?php
                     // Create form and send all values in "shopping/update_cart" function.
                    
                    $i = 1;

                    foreach ($cart as $item):
					 echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                        echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
                        echo form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
                        echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
						echo form_hidden('cart[' . $item['id'] . '][pro_image]', $item['pro_image']);
                        echo form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']);
						echo form_hidden('cart[' . $item['id'] . '][item_quantity]', $item['item_quantity']);
					?>
                <li class="item first">
                  <div class="item-inner">
                  <a class="product-image" href="<?php echo base_url();?>home/addtocart"><img alt="" src="<?php echo base_url();?>uploads/products/<?php  echo $item['pro_image']; ?>"></a>
                    <div class="product-details">
                      <div class="access"><a class="btn-remove1" title="Remove This Item" href="#">Remove</a> 
                      <a class="btn-edit" title="Edit item" href="#"><i class="icon-pencil"></i><span class="hidden">Edit item</span></a> </div>
                      <!--access-->
                      <strong><?php echo $item['qty'];?></strong> x <span class="price">RS <?php echo $item['price'];?></span>
                      <p class="product-name"><a href="<?php echo base_url();?>home/addtocart"><?php echo $item['name'];?></a></p>
                    </div>
                  </div>
                </li>
				<?php endforeach; ?>
              
              </ul>
              <div class="actions">
                <button class="btn-checkout" title="Checkout" type="submit" name="submit"><span>Checkout</span></button>
              </div>
              <!--actions-->
            </div>
            <!--fl-mini-cart-content-->
			</form>
			<?php endif; ?>
			
          </div>
        </div>
          <!--mini-cart-->
          <div class="collapse navbar-collapse">
            <form class="navbar-form" role="search">
              <div class="input-group">
                <input class="form-control" placeholder="Search" type="text">
                <span class="input-group-btn">
                <button type="submit" class="search-btn"> <span class="glyphicon glyphicon-search"> <span class="sr-only">Search</span> </span> </button>
                </span> </div>
            </form>
          </div>
          <!--links--> 
        </div>
      </div>
    </div>
  </header>
  <!-- content related to popup -->
<div class="md-modal md-effect-8" id="modal-8">
  <div class="md-content">
    <div id="log_sign"> 
      
      <!-- Nav tabs -->
      <button class="md-close cls pull-right">Close me!</button>
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#login" aria-controls="home" role="tab" data-toggle="tab"> <i class="fa fa-lock" aria-hidden="true"></i> Login</a></li>
        <li role="presentation"><a href="#signup" aria-controls="profile" role="tab" data-toggle="tab"> <i class="fa fa-user" aria-hidden="true"></i> Sign Up</a></li>
      </ul>
      
      <!-- Tab panes -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="login">
		 <div id="login-response" style="font-size:100%;"></div>
          <form id="login-form" method="post">
            <div class="form-group">
              <label for="email">Email address:</label>
              <input type="text" class="form-control" name="login_email" id="login_email">
			  <span class="all_errors"><p id="NameErr1" class="Error_msge"></p></span>
            </div>
            <div class="form-group">
              <label for="pwd">Password:</label>
              <label class="pull-right" id="frgt_pass"><a href="#" class="pull-right" style="text-decoration: none;"><i class="icon-question-sign"></i>&nbsp; <i class="fa fa-question-circle" aria-hidden="true"></i> Forgot Password ?</a> </label>
              <input type="password" class="form-control" name="login_password" id="login_password">
			  <span class="all_errors"><p id="PasswordErr5" class="Error_msge"></p></span>
            </div>
            <!--<div class="checkbox">
              <label>
                <input type="checkbox">
                Remember me</label>
            </div>-->
            <button type="submit" class="btn btn-danger cls pull-left" id="login_submit" name="submit">SIGN IN</button>
          </form>
        </div>
        <div role="tabpanel" class="tab-pane" id="signup">
		<div id="signup-response" style="font-size:100%;"></div>
          <form method="post" id="register-form">
            <div class="form-group">
              <label for="user name">User Name:</label>
              <input type="text" name="user_name" id="user_name" class="form-control">
			  <span class="all_errors"><p id="NameErr" class="Error_msge"></p></span>
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="text" class="form-control" name="user_email" id="user_email">
			  <span class="all_errors"><p id="EmailErr" class="Error_msge"></p></span>
            </div>
			 <div class="form-group">
              <label for="phone">Phone No:</label>
              <input type="text" class="form-control" name="user_phone" id="user_phone">
			  <span class="all_errors"><p id="PhoneErr" class="Error_msge"></p></span>
            </div>
            <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" class="form-control" name="user_password" id="user_password">
			  <span class="all_errors"><p id="PassErr1" class="Error_msge"></p></span>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" id="chkterms2">
                By signing up I agree to terms & conditions</label>
				<span class="all_errors"><p id="TermsErr" class="Error_msge"></p></span>
            </div>
            <button type="submit" class="btn btn-danger cls pull-left" id="register_submit" name="submit">Submit</button>
          </form>
        </div>
      </div>
    </div>
    <div id="show_pass" style="display: none;">
      <button class="md-close cls pull-right" style="margin-bottom: 15px;">Close me!</button>
      Forgot Your Password ?
	  <div id="lost-response" style="font-size:100%;"></div>
	  <form method="post" id="lost-form">
      <div class="form-group">
        <input type="password" class="form-control" name="lost_email" id="lost_email" placeholder="Please Enter Your Email Here">
      </div>
      <button type="submit" class="btn btn-danger cls pull-left" id="lost_submit">Submit</button>
	  </form>
      <label id="show_login" class="pull-right lgo"><i class="fa fa-user-plus"></i> Login</label>
    </div>
  </div>
</div>
<div class="md-overlay"></div>
<!-- the overlay element --> 

<!-- classie.js by @desandro: https://github.com/desandro/classie --> 

<script src="<?php echo base_url(); ?>assets/home/js/classie.js"></script> 
<script src="<?php echo base_url(); ?>assets/home/js/modalEffects.js"></script> 

<!-- for the blur effect --> 
<!-- by @derSchepp https://github.com/Schepp/CSS-Filters-Polyfill --> 
<script>
      // this is important for IEs
      var polyfilter_scriptpath = '/js/';
    </script> 
<!--<script src="<?php echo base_url(); ?>assets/home/js/cssParser.js"></script> -->
<script src="<?php echo base_url(); ?>assets/home/js/css-filters-polyfill.js"></script> 
<!--slider --> 

<script type="text/javascript">
    $(document).ready(function(){
      $('#frgt_pass').click(function(){
          $('#log_sign').hide();
          $('#show_pass').show();

      });
       $('.md-close').click(function(){
            $('#modal-8').hide();
            $('.md-overlay').hide();
          });
       $('#show_login').click(function(){
          $('#log_sign').show();
          $('#show_pass').hide();
       })
    });
  </script>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>

    <script type="text/javascript">
$(document).ready(function()
{
$("#location_name").change(function()
{

  
var id=$(this).val();

var dataString = 'location_name='+ id;
$.ajax
({
type: "POST",
 url: "<?php echo base_url();?>home/location",
data: dataString,
cache: false,
success: function(data)
{
  //alert(data);
//location.reload();
window.location.href="<?php echo base_url(); ?>";
} 
});

});
});
</script>
<script>
function registershow(){
	
$("#modal-8").show();	
} 
</script>
<script type="text/javascript" language="javascript">
      $(document).ready(function(){
    $('#register_submit').click(function(e){
    e.preventDefault();
 
    //if ($('#chkterms2').is(':checked')) {
    var user_name = $("#user_name").val();
    var user_email= $("#user_email").val();
	var user_phone = $("#user_phone").val();
    var user_password = $("#user_password").val();
	var terms_conditions = $('#chkterms2').is(':checked');
     
    
    var letters = /^[0-9a-zA-Z]+$/; 
    var number = /^\d{10}$/;
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var name=/^[^-\s][a-zA-Z0-9_\s-]+$/;
    var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
    
    if (user_name == "")
    {
    $("#NameErr").html("Enter Your Name ").css("color", "red");
    $("#user_name").focus();
    return false;
    }
    else{
      if(user_name!="" && user_name.match(letters)) 
      {
        $("#NameErr").html("");
      }
      else{
        
        $("#NameErr").html("Name Accepts Alphanumeric Only");
        $("#user_name").focus();
        return false;
        }
    }
    
    
    if (user_email == "")
    {
    $("#EmailErr").html("Enter Your Email ID ").css("color", "red");
    $("#user_email").focus();
    return false;
    }
    else{
      if(user_email!="" && user_email.match(mailformat)) 
      {
        $("#EmailErr").html("");
      }
      else{
        
        $("#EmailErr").html("Invalid Email Format");
        $("#user_email").focus();
        return false;
        }
      
    }
	
	
	
	if (user_phone == "")
    {
    $("#PhoneErr").html("Enter Your Phone Number").css("color", "red");
    $("#user_phone").focus();
    return false;
    }
    else{
      if(user_phone!="" && user_phone.match(number)) 
      {
        $("#PhoneErr").html("");
      }
      else{
        
        $("#PhoneErr").html("Invalid Phone Number");
        $("#user_phone").focus();
        return false;
        }
      
    }
    
   
    /************************************************************************/
      if(user_password==""){
      $("#PassErr1").html("Enter Your Password ").css("color", "red");
      $("#user_password").focus();
      return false; 
      }
      else{
      if(user_password!="" && user_password.match(strongRegex)) 
      {
      $("#PassErr1").html("");
      }
      else{
      $("#PassErr1").html("Password minimum length is 8 characters and should contain letters (One Letter in Caps), symbols, numbers");
      $("#user_password").focus();
      return false;
      } 
      }
	  if (terms_conditions == "")
		{
		$("#TermsErr").html("Please Accept Terms & Conditions").css("color", "red");
		return false;
		}
		else{
			$("#TermsErr").html("");
		}
  
    $.ajax({
    type: "POST",
    url: '<?php echo base_url() ?>Home/signup',
    data: {user_name:user_name,user_email:user_email,user_phone:user_phone,user_password:user_password},
    success:function(data)
    {
      //alert(data);
    if(data == 1)
    {
      
    $("#signup-response").html("You are Successfully Registered! Please Login to Continue. ").css("color", "green");
    $('#register-form')[0].reset();
    }

    else if(data == 2){
    
    $("#EmailErr").html("The Mail Id you gave is already registered, Please try again.").css("color", "red");
    $("#user_email").val("");
    $('#register-form')[0].reset();
    
    }
    else
    {
    $("#signup-response").html("Oops! Error.  Please try again later").css("color", "red");
    
    $('#register-form')[0].reset();

    }
    
    },
    error:function()
    {
    //alert('fail');
    $("#signup-response").html("Please try again later for signup").css("color", "red");

    $('#register-form')[0].reset();
    }
    });
    });
    
    });
  

</script>

<script type="text/javascript" language="javascript">
 
		$(document).ready(function(){
		$("#login_submit").click(function(e){
		e.preventDefault();
		
		var user_email= $("#login_email").val();
		var user_password = $("#login_password").val();
		if (user_email == "")
    {
    $("#NameErr1").html("Enter Email").css("color", "red");
    $("#login_email").focus();
    return false;
    }
    else{
      $("#NameErr1").html("");
    }
	if (user_password == "")
    {
    $("#PasswordErr5").html("Enter Password").css("color", "red");
    $("#login_password").focus();
    return false;
    }
    else{
      $("#PasswordErr5").html("");
    }
		$.ajax({
		type: "POST",
		url: '<?php echo base_url() ?>Home/login',
		data: {user_email:user_email,user_password:user_password},
		success:function(data)
		{
		if(data == 1)
		{
			location.reload();
		}
		else{
		
		$("#login-response").html("Invalid User Name or Password").css("color", "red");
		$('#login-form')[0].reset();	
		}
		},
		error:function()
		{
		//$("#signupsuccess").html("Oops! Error.  Please try again later!!!");
		}
		});
		
		});
		});
	
	
</script>