
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      
      <ul class="sidebar-menu">
        <li class="active ">
          <a href="<?php echo base_url('inventory/dashboard'); ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
            </span>
          </a>
         
        </li>
     
		<li class="">
          <a href="<?php echo base_url('inventory/sellerlist'); ?>">
             <i class="fa fa-dashboard"></i> <span>Seller Lists</span>
          </a>
        </li>
		<li class="">
          <a href="<?php echo base_url('inventory/sellerpayments'); ?>">
             <i class="fa fa-dashboard"></i> <span>Seller payments</span>
          </a>
        </li>
     
		<li class="treeview">
          <a href="<?php echo base_url('inventory/sellerservicerequests'); ?>">
		  <i class="fa fa-dashboard"></i> <span>Service requests</span>
          </a>
        </li>
        <li class="treeview">
          <a href="">
           <i class="fa fa-dashboard"></i> <span>Show ups :</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('inventory/homepagebanner'); ?>"><i class="fa fa-circle-o"></i> Home page banner </a></li>
            <li><a href="<?php echo base_url('inventory/topoffers'); ?>"><i class="fa fa-circle-o"></i> Top offers</a></li>
            <li><a href="<?php echo base_url('inventory/dealsoftheday'); ?>"><i class="fa fa-circle-o"></i> Deals of the day</a></li>
            <li><a href="<?php echo base_url('inventory/seasonsales'); ?>"><i class="fa fa-circle-o"></i> Season sales</a></li>
            
          </ul>
        </li>
		<li class="">
          <a href="<?php echo base_url('inventory/homepagepreview'); ?>">
             <i class="fa fa-dashboard"></i> <span>Customer Home page preview</span>
          </a>
        </li>
		<li class="">
          <a href="<?php echo base_url('inventory/sellernitificationlist'); ?>">
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
            <li><a href="<?php echo base_url('inventory/categorieslist'); ?>"><i class="fa fa-circle-o"></i> Add Category & commission</a></li>
            <li><a href="<?php echo base_url('inventory/subcategorieslist'); ?>"><i class="fa fa-circle-o"></i> Add sub category</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  