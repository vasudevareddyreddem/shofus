
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      
      <ul class="sidebar-menu">
        <li class="active ">
          <a href="<?php echo base_url('customer/inve_dashboard'); ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
            </span>
          </a>
         
        </li>
        <li class="">
          <a href="<?php echo base_url('customer/categories'); ?>">
             <i class="fa fa-dashboard"></i> <span>Category wise sellers</span>
          </a>
        </li>
		<li class="">
          <a href="<?php echo base_url('customer/seller_id_database'); ?>">
             <i class="fa fa-dashboard"></i> <span>Seller ID database</span>
          </a>
        </li>
		<li class="">
          <a href="<?php echo base_url('customer/seller_payments'); ?>">
             <i class="fa fa-dashboard"></i> <span>Seller payments</span>
          </a>
        </li>
     
        <li class="treeview">
          <a href="#">
		  <i class="fa fa-dashboard"></i> <span>Service requests</span>
           
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('customer/inventory_management'); ?>"><i class="fa fa-circle-o"></i> Inventory management</a></li>
            <li><a href="<?php echo base_url('customer/catalog_management'); ?>"><i class="fa fa-circle-o"></i> Catalogue management</a></li>
            <li><a href="<?php echo base_url('customer/both'); ?>"><i class="fa fa-circle-o"></i> Both</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="">
           <i class="fa fa-dashboard"></i> <span>Show ups :</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('customer/home_page_banner'); ?>"><i class="fa fa-circle-o"></i> Home page banner </a></li>
            <li><a href="<?php echo base_url('customer/top_offers'); ?>"><i class="fa fa-circle-o"></i> Top offers</a></li>
            <li><a href="<?php echo base_url('customer/deals_of_day'); ?>"><i class="fa fa-circle-o"></i> Deals of the day</a></li>
            <li><a href="<?php echo base_url('customer/season_sales'); ?>"><i class="fa fa-circle-o"></i> Season sales</a></li>
            <li><a href="<?php echo base_url('customer/others'); ?>"><i class="fa fa-circle-o"></i> Others</a></li>
          </ul>
        </li>
		<li class="">
          <a href="#">
             <i class="fa fa-dashboard"></i> <span>Customer Home page preview</span>
          </a>
        </li>
		<li class="">
          <a href="#">
             <i class="fa fa-dashboard"></i> <span>Seller notification</span>
          </a>
        </li>
    
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a><i class="fa fa-circle-o"></i> Category & commission</a></li>
            <li><a><i class="fa fa-circle-o"></i> Add category requests (seller)</a></li>
            <li><a><i class="fa fa-circle-o"></i> Add category, sub category, <br>sub item & its commission</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  