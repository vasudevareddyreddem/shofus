<div class="header_main">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="logo">
            <p><a href="<?php echo base_url();?>seller_admin/dashboard"> <img src="<?php echo base_url(); ?>assets/seller_admin/images/logo.png" class="img-responsive" /></a></p>
          </div>
        </div>
        
      </div>
    </div>
  </div>
  
  <!--navigation start here -->
  <div class="navigation_main">
    <nav class="navbar navbar-inverse hm_nav">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <!--<a class="navbar-brand" href="#">WebSiteName</a>--> 
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo base_url();?>seller_admin/dashboard">Home</a></li>
            <!--<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Page 1-1</a></li>
            <li><a href="#">Page 1-2</a></li>
            <li><a href="#">Page 1-3</a></li>
          </ul>
        </li>-->
            <li><a href="#">About Us</a></li>
            <li><a href="<?php echo base_url();?>seller_admin/faqs">FAQ's</a></li>
            <!--<li><a href="#">Help</a></li>-->
            <li><a href="<?php echo base_url();?>seller_admin/contactus">Contact Us</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <!--<li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>-->
            <!--<li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Notification (<b>2</b>)</a>
              <ul class="dropdown-menu notify-drop">
                <div class="notify-drop-title">
                  <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6">Bildirimler (<b>2</b>)</div>
                    <div class="col-md-6 col-sm-6 col-xs-6 text-right"><a href="" class="rIcon allRead" data-tooltip="tooltip" data-placement="bottom" title="tümü okundu."><i class="fa fa-dot-circle-o"></i></a></div>
                  </div>
                </div>
                <!-- end notify title --> 
                <!-- notify content -->
               <!-- <div class="drop-content">
                  <li>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                      <div class="notify-img"><img src="http://placehold.it/45x45" alt=""></div>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-9 pd-l0"><a href="">Ahmet</a> yorumladı. <a href="">Çicek bahçeleri...</a> <a href="" class="rIcon"><i class="fa fa-dot-circle-o"></i></a>
                      <hr>
                      <p class="time">Şimdi</p>
                    </div>
                  </li>
                  <li>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                      <div class="notify-img"><img src="http://placehold.it/45x45" alt=""></div>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-9 pd-l0"><a href="">Ahmet</a> yorumladı. <a href="">Çicek bahçeleri...</a> <a href="" class="rIcon"><i class="fa fa-dot-circle-o"></i></a>
                      <p>Lorem ipsum sit dolor amet consilium.</p>
                      <p class="time">1 Saat önce</p>
                    </div>
                  </li>
                  <li>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                      <div class="notify-img"><img src="http://placehold.it/45x45" alt=""></div>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-9 pd-l0"><a href="">Ahmet</a> yorumladı. <a href="">Çicek bahçeleri...</a> <a href="" class="rIcon"><i class="fa fa-dot-circle-o"></i></a>
                      <p>Lorem ipsum sit dolor amet consilium.</p>
                      <p class="time">29 Dakika önce</p>
                    </div>
                  </li>
                  <li>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                      <div class="notify-img"><img src="http://placehold.it/45x45" alt=""></div>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-9 pd-l0"><a href="">Ahmet</a> yorumladı. <a href="">Çicek bahçeleri...</a> <a href="" class="rIcon"><i class="fa fa-dot-circle-o"></i></a>
                      <p>Lorem ipsum sit dolor amet consilium.</p>
                      <p class="time">Dün 13:18</p>
                    </div>
                  </li>
                  <li>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                      <div class="notify-img"><img src="http://placehold.it/45x45" alt=""></div>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-9 pd-l0"><a href="">Ahmet</a> yorumladı. <a href="">Çicek bahçeleri...</a> <a href="" class="rIcon"><i class="fa fa-dot-circle-o"></i></a>
                      <p>Lorem ipsum sit dolor amet consilium.</p>
                      <p class="time">2 Hafta önce</p>
                    </div>
                  </li>
                </div>
                <div class="notify-drop-footer text-center"> <a href=""><i class="fa fa-eye"></i> Tümünü Göster</a> </div>
              </ul>
            </li>-->
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> <?php echo ucfirst($this->session->userdata('seller_name'));    ?></a>
			<ul class="dropdown-menu extended logout">
            <div class="log-arrow-up"></div>
            <!--<li class="eborder-top"> <a href="#"><i class="icon_profile"></i> My Profile</a> </li>-->
             <li> <a href="<?php echo base_url(); ?>seller_admin/dashboard/change_password"><i class="fa fa-lock" aria-hidden="true"></i> Change Password</a> </li>
            <li> <a href="<?php echo base_url() ; ?>/seller_admin/login/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a> </li>
          </ul>
			
			</li>
          </ul>
          
        </div>
      </div>
    </nav>
  </div>
  <!--navigation end here --> 