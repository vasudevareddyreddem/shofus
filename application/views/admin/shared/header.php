 <header class="header dark-bg">
    <div class="toggle-nav">
      <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
    </div>
    
    <!--logo start--> 
    <a href="<?php echo base_url('admin/dashboard'); ?>" class="logo">CART IN HOUR<span class="lite"> Admin</span></a> 
    <!--logo end-->
    
    <div class="nav search-row" id="top_menu"> 
      <!--  search form start -->
     <!-- <ul class="nav top-menu">
        <li>
          <form class="navbar-form">
            <input class="form-control" placeholder="Search" type="text">
          </form>
        </li>
      </ul>-->
      <!--  search form end --> 
    </div>
    <div class="top-nav notification-row"> 
      <!-- notificatoin dropdown start-->
      <ul class="nav pull-right top-menu">
        
        <!-- user login dropdown start-->
        <li class="dropdown"> <a data-toggle="dropdown" class="dropdown-toggle" href="#"> <span class="profile-ava"> <img alt="" src="<?php echo base_url(); ?>assets/admin/img/avatar1_small.jpg"> </span> <span class="username"><?php //echo current_admin()->admin_name;  ?></span> <b class="caret"></b> </a>
          <ul class="dropdown-menu extended logout">
            <div class="log-arrow-up"></div>
            <!--<li class="eborder-top"> <a href="#"><i class="icon_profile"></i> My Profile</a> </li>-->
            <li> <a href="<?php echo base_url(); ?>admin/login/logout"><i class="icon_key_alt"></i> Log Out</a> </li>
          </ul>
        </li>
        <!-- user login dropdown end -->
      </ul>
      <!-- notificatoin dropdown end--> 
    </div>
  </header>
  <!--header end--> 