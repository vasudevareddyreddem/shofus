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
                        
                        <li class="treeview" >
                            <a href="#">
                                <i class="fa fa-list"></i><span>Listings</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu" style="width:220px;">
                                <li><a href="<?php echo base_url();?>seller/products">My Listing</a></li>
                                <li><a  href="<?php echo base_url();?>seller/products/track_requests">Track Approval Requests</a></li>
                                
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
                                <li><a href="<?php echo base_url();?>seller/showups/homepagebanner">Home Page Banners</a></li>
                                <li><a href="<?php echo base_url('seller/showups/topoffers');?>">Top Offers</a></li>
                                <li><a href="<?php echo base_url('seller/showups/dealsofday');?>">Deals Of the Day</a></li>
                                <li><a href="<?php echo base_url('seller/showups/seasonsale');?>">Season Sales</a></li>
                                
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
					<li class="treeview">
                        <a href="<?php echo base_url('seller/services/notications');?>">
                            <i class="fa fa-envelope-open-o"></i><span>Seller Support</span>
                        </a>                        
                    </li>
					<li class="treeview">
                        <a href="<?php echo base_url('seller/products/imageurllist');?>">
                            <i class="fa fa-envelope-open-o"></i><span>Imageurl</span>
                        </a>                        
                    </li>
                    <!-- <?php if($bank_link['0']['bank_complete']==1) {?> -->
                    <!-- <li class="treeview">
                        <a href="<?php echo base_url('seller/dashboard/linkaccout');?>">
                            <i class="fa fa-credit-card"></i><span>Link your account</span>
                        </a>                        
                    </li> -->
                    <!-- <?php }?> -->
                           
            </ul>
        </div> <!-- /.sidebar -->
    </aside>
    <script type="text/javascript">
        $("ul li a").removeClass('active');
var urlType = document.URL.split("/");
$("a[href*='/" + urlType + "']").addClass("active");
    </script>