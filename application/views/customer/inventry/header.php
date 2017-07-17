<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Inventory</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
   
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/inventry/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/inventry/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/inventry/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/inventry/plugins/datatables/jquery.dataTables.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/inventry/dist/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/inventry/dist/css/cartin.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/inventry/dist/css/skins/_all-skins.min.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/bootstrapValidator.css" />
	<script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header" style="position:fixed;top:0px;width:100%">

    <a href="" class="logo">
	  
      <span class="logo-mini"><img style="width:75%" src="<?php echo base_url(); ?>assets/vendor/inventry/dist/img/mini-logo.png" class="img-responsive" ></span>
      <span class="logo-lg"><img style="width:75%" src="<?php echo base_url(); ?>assets/vendor/inventry/dist/img/logo.png" class="img-responsive" ></span>
    </a>

    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o" style="margin-top:5px;font-size:16px;"></i>
              <span class="label label-warning"><?php if($unreadcount >0){ echo count($unreadcount);} ?></span>
            </a>
            <ul class="dropdown-menu" style="padding:2px 10px;">
              <li class="header">You have <?php if($unreadcount >0){ echo count($unreadcount);} ?> Messages</li>
              
			  <?php if($unreadcount >0){ ?>
			  <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
				<?php foreach($unreadcount as $list){ ?>
                  <li>
                   <i class="fa fa-warning text-yellow"></i>
				   <?php 
				   
						$letters=30; 
						$messageword=$list['seller_message'];
						$postmessage = substr($messageword, 0, $letters);
						echo $postmessage;
				   ?>
                </li>
				  <?php }  ?>
                </ul>
              </li>
			  
			  <?php } ?>
              <li class="footer"><a href="<?php echo base_url('inventory/sellernitificationlist'); ?>">View all Messages</a></li>
            </ul>
          </li>
         
          <!-- User Account: style can be found in dropdown.less -->
         <li class="dropdown user user-menu">
		  
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			<?php 
			if($customerdetails['cust_propic']!=''){ ?>
			<img  src="<?php echo base_url('uploads/profile/'.$customerdetails['cust_propic']); ?>" class="user-image" alt="<?php echo $customerdetails['cust_propic']; ?>">
			<?php }else{ ?>
			<img  src="<?php echo base_url(); ?>uploads/profile/default.jpg" class="user-image" alt="Logo">
			<?php } ?>
			  <span class="hidden-xs"><?php echo $customerdetails['cust_firstname'].'/'.$customerdetails['cust_lastname'] ?>	</span>
            </a><ul class="dropdown-menu pad_prof" >
			<a href="<?php echo base_url('inventory/account');?>"><li class="user-body">My Account</li></a>
              <a href="<?php echo base_url('inventory/changepassword');?>"><li class="user-body">Change Password</li></a>
               <a href="<?php echo base_url('inventory/logout');?>"><li class="user-body">Logout</li></a>

            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
         
        </ul>
      </div>

    </nav>
  </header>