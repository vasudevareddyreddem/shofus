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
<title>::Cart In Hour Seller::</title>
<link rel="icon" href="<?php echo base_url(); ?>assets/images/fav.png" type="image/x-icon" />
<!--css start here -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,600i,700,800" rel="stylesheet">
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
          <h3><a href="index.html">CART IN HOUR<span> SELLER</span></a></h3>
        </div>
      </div>
      <div class="col-md-6 col-xs-12 hidden-xs">
      
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
        <h1 align="center"> Lost Password Form </h1>
         <div id="lost-response" style="font-size:100%;"></div>
          <div class="form-group">
		  <form method="post" id="lost-form">
            <div class="col-md-12">
              <div class="row">
              <?php echo $this->session->flashdata('msg'); ?>
                <div class="col-xs-12 inf_cmpy">
                  <label for="ex1"><strong>Email</strong></label>
                   <input type="text" class="form-control" name="admin_email" id="admin_email"  placeholder="Email"/>
                
                </div>
               
              
                <div class="col-xs-12 inf_cmpy">
                  <input type="submit" class="btn btn-block" value="Submit" id="lost_submit">
                </div>
              </div>
            </div>
			 </form>
			  <div class="forgot">
                <a href="<?php echo base_url();?>seller/login" >Login</a>
              </div>
          </div>
       
		
      </div>
    </div>
	<div class="col-md-4">&nbsp</div>
  </div>
</div>
<!--banners end here --> 
<!--header section start here -->

<!--footer part end here -->
<div class="footerdown">
  <div class="container">
    <div class="row">
      <div class="col-md-12">&copy; <span class="year">2017</span> Cart In Hour Seller. All rights reserved.</div>
    </div>
  </div>
</div>
<script>
$(document).ready(function() {
  //carousel options
  $('#quote-carousel').carousel({
    pause: true, interval: 10000,
  });
});
</script>
 <script src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
	<script type="text/javascript" language="javascript">
 
		$(document).ready(function(){
		$("#lost_submit").click(function(e){
		e.preventDefault();
		
		var admin_email= $("#admin_email").val();
	
		if (admin_email == "")
    {
    $("#NameErr1").html("Enter Email").css("color", "red");
    $("#login_email").focus();
    return false;
    }
    else{
      $("#NameErr1").html("");
    }
	
		$.ajax({
		type: "POST",
		url: '<?php echo base_url() ?>seller/login/doforget',
		data: {admin_email:admin_email},
		success:function(data)
		{
		if(data == 1)
		{
		$("#lost-response").html("Please Check your email to reset the password").css("color", "green");
		$('#lost-form')[0].reset();	
		}
		else{
		$("#lost-response").html("Its not a Registered Email ID").css("color", "red");
		$('#lost-form')[0].reset();	
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
</body>
</html>
