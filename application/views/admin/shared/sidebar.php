 <!--sidebar start-->
  <aside>
    <div id="sidebar"  class="nav-collapse "> 
      <!-- sidebar menu start-->
      <ul class="sidebar-menu">
        <li class="active"> <a class="" href="<?php echo base_url(); ?>admin/dashboard"> <i class="icon_house_alt"></i> <span>Home</span> </a> </li>
        <li> <a class="" href="<?php echo base_url(); ?>admin/admin_users"> <i class="fa fa-users"></i> <span>Admin users</span> </a> </li>
        
         <li class="sub-menu"> <a href="javascript:;" class=""> <i class="fa fa-list-ol" aria-hidden="true"></i> <span>Orders</span> <span class="menu-arrow arrow_carrot-right"></span> </a>
          <ul class="sub">
           <!-- <li><a class="" href="<?php echo base_url();?>admin/orders/new_orders">New Orders</a></li>-->
           <li> <a class="" href="<?php echo base_url();?>admin/new_orders"> <i class="fa fa-sort-amount-asc"></i> <span>New Orders</span> </a> </li>
            <li><a class="" href="<?php echo base_url();?>admin/orders/assigned_orders">Assigned Orders</a></li>
            <li><a class="" href="<?php echo base_url();?>admin/orders/inprogress_orders">In-progress Orders</a></li>
            <li><a class="" href="<?php echo base_url();?>admin/orders/delivered_orders">Delivered Orders</a></li>  

            <li><a class="" href="<?php echo base_url();?>admin/orders/rejected_orders">Rejected Orders</a></li>        
          </ul>
        </li>
        <!-- <li> <a class="" href="<?php echo base_url();?>admin/addcategories"> <i class="fa fa-list"></i> <span>Categories</span> </a> </li> -->
    <li> <a class="" href="<?php echo base_url();?>admin/Categories"> <i class="fa fa-list"></i> <span>Categories</span> </a> </li>
    <li> <a class="" href="<?php echo base_url();?>admin/subcategories"> <i class="fa fa-list"></i> <span>SubCategories</span> </a> </li>
    <li> <a class="" href="<?php echo base_url();?>admin/Locations"> <i class="fa fa-location-arrow" aria-hidden="true"></i> <span>Locations</span> </a> </li>
      
          <li> <a class="" href="<?php echo base_url();?>admin/deliveryboy_location"> <i class="fa fa-angle-right"></i> <span>Deliveryboys Locations</span> </a> </li>
          <li> <a class="" href="<?php echo base_url();?>admin/deliveryboy_ratings"> <i class="fa fa-angle-right"></i> <span>Deliveryboys Ratings</span> </a> </li>

     

        <!--<li> <a class="" href="<?php //echo base_url();?>admin/orders"> <i class="fa fa-list-ol"></i> <span>All Orders</span> </a> </li>-->
      <!--  <li> <a class="" href="<?php echo base_url();?>admin/assign_orders"> <i class="fa fa-sort-amount-asc"></i> <span>Assign Orders</span> </a> </li>
        <li> <a class="" href="<?php echo base_url();?>admin/new_orders"> <i class="fa fa-sort-amount-asc"></i> <span>New Orders</span> </a> </li> -->
        <li class="sub-menu"> <a href="javascript:;" class=""> <i class="fa fa-list-ol" aria-hidden="true"></i> <span>Payments</span> <span class="menu-arrow arrow_carrot-right"></span> </a>
          <ul class="sub">
        <li> <a class="" href="<?php echo base_url();?>admin/payments/customer_payments">Customer Payments</a> </li>
        <li> <a class="" href="<?php echo base_url();?>admin/payments/seller_payments">Seller Payments</a> </li>
        </ul>
        </li>
        
        
          <li> <a class="" href="<?php echo base_url(); ?>admin/sellers"> <i class="icon_genius"></i> <span>Sellers</span> </a> </li>
        <li> <a class="" href="<?php echo base_url(); ?>admin/cih"> <i class="fa fa-money"></i> <span>CIH Fee</span> </a> </li>
        <li> <a class="" href="<?php echo base_url(); ?>admin/shipping"> <i class="fa fa-credit-card"></i> <span>Shipping Charges</span> </a> </li>
    <li> <a class="" href="<?php echo base_url(); ?>admin/closingfee"> <i class="fa fa-money"></i> <span>Closing Fee</span> </a> </li>
     <li> <a class="" href="<?php echo base_url(); ?>admin/servicefee"> <i class="fa fa-money"></i> <span>Delivery Service Fee</span> </a> </li>
        <li> <a class="" href="<?php echo base_url();?>admin/deliveryboy"> <i class="fa fa-spinner"></i> <span>Delivery Boys</span> </a> </li>
        <li> <a class="" href="<?php echo base_url();?>admin/contactus"> <i class="fa fa-phone"></i> <span>Contact Requests</span> </a> </li>
        <li> <a class="" href="<?php echo base_url();?>admin/request"> <i class="fa fa-bell-o"></i> <span>Seller Notification</span> </a> </li>
        <li> <a class="" href="<?php echo base_url();?>admin/promotions"> <i class="fa fa-bell-o"></i> <span>Promotion Requests</span> </a> </li>
        <li> <a class="" href="<?php echo base_url();?>admin/service"> <i class="fa fa-bell-o"></i> <span>Service Requests</span> </a> </li>
        <li> <a class="" href="<?php echo base_url();?>admin/sellerads"> <i class="fa fa-angle-right"></i> <span>Service Ads</span> </a> </li>

       <!-- <li class="sub-menu"> <a href="javascript:;" class=""> <i class="fa fa-cutlery" aria-hidden="true"></i> <span>Food</span> <span class="menu-arrow arrow_carrot-right"></span> </a>
          <ul class="sub">
            <li><a class="" href="starters.html">Starters </a></li>
            <li><a class="" href="#">Veg items</a></li>
            <li><a class="" href="#">Non veg items </a></li>
            <li><a class="" href="#">Main course </a></li>
            <li><a class="" href="#">Soups </a></li>
            <li><a class="" href="#">Desserts </a></li>
          </ul>
        </li>
        <li class="sub-menu"> <a href="javascript:;" class=""> <i class="fa fa-shopping-cart"></i> <span>Grocery</span> <span class="menu-arrow arrow_carrot-right"></span> </a>
          <ul class="sub">
            <li><a class="" href="#">Elements</a></li>
            <li><a class="" href="#">Buttons</a></li>
            <li><a class="" href="#">Grids</a></li>
          </ul>
        </li>
        <li class="sub-menu"> <a href="javascript:;" class=""><i class="fa fa-bolt" aria-hidden="true"></i> <span>Electronics</span> <span class="menu-arrow arrow_carrot-right"></span> </a>
          <ul class="sub">
            <li><a class="" href="#">Elements</a></li>
            <li><a class="" href="#">Buttons</a></li>
            <li><a class="" href="#">Grids</a></li>
          </ul>
        </li>
        <li class="sub-menu"> <a href="javascript:;" class=""> <i class="fa fa-spinner" aria-hidden="true"></i> <span>Fashion</span> <span class="menu-arrow arrow_carrot-right"></span> </a>
          <ul class="sub">
            <li><a class="" href="#">Basic Table</a></li>
          </ul>
        </li>
        <li class="sub-menu"> <a href="javascript:;" class=""> <i class="icon_documents_alt"></i> <span>Categerious</span> <span class="menu-arrow arrow_carrot-right"></span> </a>
          <ul class="sub">
            <li><a class="" href="#">Profile</a></li>
            <li><a class="" href="#"><span>Login Page</span></a></li>
          </ul>
        </li>-->
        
      </ul>
      <!-- sidebar menu end--> 
    </div>
  </aside>
  <!--sidebar end--> 