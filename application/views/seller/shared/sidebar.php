<!-- <div class="ser_mian">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          <div class="nav-side-menu" style="position: fixed;top:100px; left:0;height:600px;">
            <div class="brand">Welcome</div>
            <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
            <div class="menu-list">
              <ul id="menu-content" class="menu-content collapse out">

                <li  data-toggle="collapse" data-target="#listings" class="collapsed active"> <a href="#"><i class="fa fa-list" aria-hidden="true"></i> Listings <span class="arrow"></span></a> </li>
                <ul class="sub-menu collapse" id="listings">
                  <li class="active"><a href="<?php echo base_url();?>seller/products">My Listing</a></li>
                  <li><a href="<?php echo base_url();?>seller/products/track_requests">Track Approval Requests</a></li>
                </ul>
                <li data-toggle="collapse" data-target="#orders" class="collapsed"> <a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Orders <span class="arrow"></span></a> </li>
                <ul class="sub-menu collapse" id="orders">
				<li><a href="<?php echo base_url();?>seller/orders/new_orders">New Orders</a></li>
                  <li><a href="<?php echo base_url();?>seller/orders/assigned_orders">Assigned Orders</a></li>
                  <li><a href="<?php echo base_url();?>seller/orders/inprogress_orders">In-progress Orders</a></li>
				   <li><a href="<?php echo base_url();?>seller/orders/delivered_orders">Delivered Orders</a></li>
				    <li><a href="<?php echo base_url();?>seller/orders/rejected_orders">Cancelled Orders</a></li>
                </ul>
                 <li data-toggle="collapse" data-target="#returns" class="collapsed"> <a href="#"><i class="fa fa-retweet" aria-hidden="true"></i> Returns <span class="arrow"></span></a> </li>
                <ul class="sub-menu collapse" id="returns">
                 
                  <li><a href="<?php echo base_url();?>seller/products/returns">Returns</a></li>
                </ul>
                <li> <a href="<?php echo base_url();?>seller/payments"><i class="fa fa-credit-card" aria-hidden="true"></i> Payments Overview </a> </li>
                 <li> <a href="<?php echo base_url();?>seller/performance"><i class="fa fa-credit-card" aria-hidden="true"></i> Performance </a> </li>

                <li> <a href="<?php echo base_url();?>seller/promotions"><i class="fa fa-upload" aria-hidden="true"></i> Promotions </a> </li>
                

              </ul>
            </div>
          </div>
        </div> -->


        <!-- =============================================== -->
            <!-- Left side column. contains the sidebar -->
          <aside class="main-sidebar" >
                <!-- sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel -->
               <div class="user-panel">
                        <div class="info">
                            <span class="wel_tit" >Welcome:</span>&nbsp;&nbsp;&nbsp;<span class="wel_tit_name"><?php echo ucfirst($sellerdetails['seller_name']);    ?></span>                            
                        </div>
                    </div>
                   
                    <!-- sidebar menu -->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="<?php echo base_url(); ?>seller/dashboard"><i class="fa fa-tachometer"></i><span>Dashboard</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-list"></i><span>Listings</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url();?>seller/products">My Listing</a></li>
                                <li><a href="<?php echo base_url();?>seller/products/track_requests">Track Approval Requests</a></li>
                                
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-pencil-square-o"></i><span>Orders</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                            <li>
                            <a href="<?php echo base_url();?>seller/orders">Total Orders</a>
                            </li>
                                <li><a href="<?php echo base_url();?>seller/orders/new_orders">New Orders</a></li>
                                <li><a href="<?php echo base_url();?>seller/orders/assigned_orders">Assigned Orders</a></li>
                                <li><a href="<?php echo base_url();?>seller/orders/inprogress_orders">In-progress Orders</a></li>
                                <li><a href="<?php echo base_url();?>seller/orders/delivered_orders">Delivered Orders</a></li>
                                <li><a href="<?php echo base_url();?>seller/orders/rejected_orders">Cancelled Orders</a></li>
                            </ul>
                        </li>
                        <!-- <li class="treeview">
                            <a href="<?php echo base_url();?>seller/products/returns">
                                <i class="fa fa-retweet"></i><span>Returns</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            
                        </li> -->
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-pencil-square-o"></i><span>Show Ups</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">                            
                                <li><a href="<?php echo base_url();?>seller/showups/home_page_banner">Home Page Banners</a></li>
                                <li><a href="<?php echo base_url();?>seller/">Top Offers</a></li>
                                <li><a href="<?php echo base_url();?>seller/">Deals Of the Day</a></li>
                                <li><a href="<?php echo base_url();?>seller/">Season Sales</a></li>
                                
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="<?php echo base_url();?>seller/payments">
                                <i class="fa fa-credit-card"></i> <span>Payments Overview</span>    
                            </a>   
                        </li> 
                    <li class="treeview">
                        <a href="<?php echo base_url();?>seller/performance">
                            <i class="fa fa-line-chart"></i><span>Performance</span>    
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="<?php echo base_url();?>seller/promotions">
                            <i class="fa fa-upload"></i><span>Promotions</span>
                        </a>                        
                    </li>
                    <li class="treeview">
                        <a href="<?php echo base_url();?>seller/services">
                            <i class="fa fa-envelope-open-o"></i><span>Request For Services</span>
                        </a>                        
                    </li>
                           
            </ul>
        </div> <!-- /.sidebar -->
    </aside>
    <script type="text/javascript">
        $("ul li a").removeClass('active');
var urlType = document.URL.split("/");
$("a[href*='/" + urlType + "']").addClass("active");
    </script>