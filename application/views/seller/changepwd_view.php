<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
.forgot {
	    margin-left: 17px;
	
}
.footerdown {
    background: #333333 none repeat scroll 0 0;
    color: #adadad;
    float: left;
    font-size: 14px;
    line-height: 18px;
    padding: 16px 0;
    width: 100%;
    position: absolute;
    bottom: 0px;
}

</style>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Shofus Seller</title>
<link rel="icon" href="<?php echo base_url(); ?>assets/images/fav.png" type="image/x-icon" />
<!--css start here -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/home/css/font1.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/responsive.css" />
<!--java script start here -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<!--java script end here -->

<!--css end here -->

</head>

<body>
<!--header part start here -->
<div class="nav-wrapper">
  <div class="container">
    <div class="header">
      <div class="col-md-6 col-xs-12">
        <div class="logo">
        
        </div>
      </div>
      <div class="col-md-6 col-xs-12 hidden-xs">
       <!-- <div class="loginfields">
          <form action="<?php echo base_url();?>admin/login/do_login" method="post">
            <div class="form-group">
              <div class="col-md-1"> &nbsp </div>
              <div class="col-md-4 hdr-form-input_s paddingRightZero">
                <label for="usr">Username :</label>
                <input type="text" class="form-control" name="admin_name" id="admin_name" value="<?php echo set_value('admin_name'); ?>" placeholder="Username"/>
                 <span class="error" style="color:red"><?php echo form_error('admin_password'); ?></span>
              </div>
              <div class="col-md-4 hdr-form-input_s paddingRightZero">
                <label for="pwd">Password :</label>
                 <input type="password" name="admin_password" class="form-control" placeholder="Password" />
                <span class="error" style="color:red"><?php echo form_error('admin_password'); ?></span>
              </div>
              <div class="col-md-3 paddingRightZero">
                <div class="pswrd text-right"><a href="#">Unable to Login?</a></div>
                <input type="submit" class="btn btn-info san_submit" value="Login">
              </div>
            </div>
          </form>
        </div>-->
      </div>
    </div>
  </div>
</div>

<!--header part end here --> 
<!--navigation start here -->
<div class="header_main">
  <div class="container">
    <nav class="navbar navbar-default san_menu"> 
      
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a class="navbar-brand hidden-md hidden-sm hidden-lg" href="#">Infinity Seller</a> </div>
      
      <!-- Collect the nav links, forms, and other content for toggling -->
      <!--<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav san_act">
          <li class="active san_active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
          <li><a href="#">Infinity Sellers</a></li>
          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">FAQ's <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Action</a></li>
            </ul>
          </li>
        </ul>
      </div>-->
      <!-- /.navbar-collapse --> 
      <!-- /.container-fluid --> 
    </nav>
  </div>
</div>
<!--navigation part end here --> 

<!--banners start here -->
<div class="banner">
  <div class="container">
   <div class="col-md-4">&nbsp</div>
    <div class="col-md-5">
      <div class="bnr_rgt">
        <h1 align="center"> Change Password </h1>
        
          <div class="form-group">
		  <form action="<?php echo base_url();?>seller/login/changepassword/<?php echo $this->uri->segment('4'); ?>" method="post" enctype="multipart/form-data" onSubmit="return validateof();">
            <div class="col-md-12">
              <div class="row">
             <?php if($this->session->flashdata('msg1')): ?>
    <p><?php echo $this->session->flashdata('msg1'); ?></p>
<?php endif; ?>
               
                <div class="col-xs-12 inf_cmpy">
                  <label for="ex1"><strong>Password</strong></label>
                    <input type="password" name="npassword" id="npassword" class="form-control" placeholder="Password" />
                   <span id="errorpassword" style="color:red"></span>
                </div>
				
				  <div class="col-xs-12 inf_cmpy">
                  <label for="ex1"><strong>Confirm Password</strong></label>
                    <input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Confirm Password" />
                <span id="errorcpassword" style="color:red"></span>
                </div>
              
                <div class="col-xs-12 inf_cmpy">
                  <input type="submit" class="btn btn-block" value="Submit" id="submit" name="submit">
                </div>
              </div>
            </div>
			 </form>
			 
          </div>
       
		
      </div>
    </div>
	<div class="col-md-4">&nbsp</div>
  </div>
</div>
<!--banners end here --> 
<!--header section start here -->

<!--footer part end here -->

<script>
$(document).ready(function() {
  //carousel options
  $('#quote-carousel').carousel({
    pause: true, interval: 10000,
  });
});
</script>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
	<script>
	
	function validateof()

{

var npassword=document.getElementById('npassword');

var cpassword=document.getElementById('cpassword');



var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");



if(npassword.value!=""){

if (!strongRegex.test(npassword.value)) {

document.getElementById('errorpassword').innerHTML="Password minimum length is 8 characters and should contain letters (One Letter in Caps), symbols, numbers";

$("#npassword").focus();

return false;

}	

else{

	document.getElementById('errorpassword').innerHTML="";

}

}

else{



document.getElementById('errorpassword').innerHTML="Please enter the password!";

$("#npassword").focus();

return false;

}
if(cpassword.value!=""){

 if (npassword.value != cpassword.value) {
         
document.getElementById('errorcpassword').innerHTML="Passwords do not match";

$("#cpassword").focus();
            return false;
        }
else{
	
	document.getElementById('errorcpassword').innerHTML="";
}

}
else{



document.getElementById('errorcpassword').innerHTML="Please enter the confirm password!";

$("#cpassword").focus();

return false;

}

}
</script>
</body>
</html>
