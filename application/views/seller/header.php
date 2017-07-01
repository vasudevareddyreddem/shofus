<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>::Cart in Hour::</title>
<link rel="icon" href="<?php echo base_url();?>assets/seller_login/images/fav.ico" type="image/x-icon" />
<link href="https://fonts.googleapis.com/css?family=Mogra|Roboto" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/seller_login/css/font-awesome.min.css" />
<!--style start here -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/seller_login/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/seller_login/css/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/seller_login/css/animate.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/seller_login/css/animate2.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/seller_login/css/custom.min.css" />
<!--style end here -->
<!--javascript start here -->
<script src="<?php echo base_url();?>assets/seller_login/js/jquery.js"></script>
<script src="<?php echo base_url();?>assets/seller_login/js/jquery-3.1.1.min.js"></script>
<script src="<?php echo base_url();?>assets/seller_login/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/seller_login/js/custom.js"></script>
<script src="<?php echo base_url();?>assets/seller_login/js/animate-it.js"></script>
<script src="<?php echo base_url();?>assets/seller_login/js/jquery.easing.min.js"></script>
<script src="<?php echo base_url();?>assets/seller_login/js/jquery.smartWizard"></script>
<script src="http://code.jquery.com/jquery-latest.js"></script>


<!--javascript end here -->


</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">
<!--<div class="loader"></div>-->
<div class="main_wrapper"> 
  <!--header part start here -->
  <div class="nav-wrapper">
    <div class="">
      <div class="header hm_nav " >
       
    <div class="">
    
    
  <nav class="navbar  " style="z-index:1024;width:100%; ">
    <div class="">
   <div class="navbar-header">
      <a class="navbar-brand" href="#">
            <p><a href="<?php echo base_url(); ?>seller/login"><img style="width:57%;" class="img-responsive" src="<?php echo base_url();?>assets/seller_login/images/logo.png" /></a>
      </p>
          </a>
    </div>
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="true"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <!--<a class="navbar-brand" href="#">Brand</a>--> 
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1 myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li class="active"><a href="<?php echo base_url('seller/login');?>#home_scr">HOME <span class="sr-only">(current)</span></a></li>
         <!-- <li><a href="#benifits_sc">BENIFITS</a></li>-->
      <li><a href="#how_its_w">HOW IT WORKS</a></li>
         
          <li><a href="#pricing_scr">PRICING</a></li>
         
          <!--<li><a href="#ourservices_scr">OUR SERVICES</a></li>-->
            <li><a href="#about_sc">ABOUT US</a></li>
       <li><a href="#faq_sc">FAQ's</a></li>
        <li><a href="#contact_sc">CONTACT US</a></li>
		 <li class="point_h"><a id="sign_log" data-toggle="modal" data-target="#myModa2">SIGN UP / LOGIN</a></li>
         
     
        </ul>
 
      </div>
      <!-- /.navbar-collapse --> 
    </div>
    <!-- /.container-fluid
    <div class="underline"></div> -->
  </nav>
    
      <?php echo $this->session->flashdata('msg'); ?>
        </div>
      </div>
    </div>
  </div>
  <!--header part end here --> 
  <!--login  Modal -->
   <div class="modal animated  zoomIn" id="myModa2" role="dialog"style="top:80px;">
    <div class="modal-dialog modal-md "  >
      <div class="modal-content ">
        <div class="modal-header modal-header_ad">
          <ul class="nav-tabs final-login">
            <li class=""><a data-toggle="tab" >Sign In</a></li>
            <li><a data-toggle="tab" >Register</a></li>
          </ul>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
       <div class="modal-body">
          
        <div class="form-body">
          
          <div class="tab-content">
            <div id="sectionA" class="tab-pane fade in active">
            <div class="row">
            <div class="col-xs-6 bor_lef">
            <div class="innter-form">
              <form method="post"  name="login_form" id="login_submit">
              <div id="login-response"></div>
                <div id="EmptyforError"></div>
			<div class="form-group">
              <label >Email Address / Mobile Number</label>
              <input  name="login_email" id="login_email" class="form-control" type="text" name="username" autofocus>
			</div>
			<div class="form-group">
              <label>Password</label>
              <input  id="login_password" name="login_password" class="form-control" type="password" name="password">
			  </div>
			  <div class="col-md-6 paddingRightZero">
				<div class="pswrd ">
					<a href="#" tabindex="5" class="forgot-password" class="btn btn-info " data-toggle="modal" data-target="#myModal1">Unable to Login?</a>
				</div>
              </div>
              <button class="btn btn-primary pull-right  btn-block " type="submit" id="login_do">Sign In</button>
					
              </form>
            </div>
            </div>
            <div class="col-xs-6 ">
              <div class="innter-form">
              <div id="register-response"></div>
                <div id="Emptyforregister"></div>
                <form  name="register_form" id="register_submit" method="POST">
                <label>Enter your Mobile Number</label>
                <input   class="form-control" type="text" maxlength="10" id="seller_mobile" name="seller_mobile" autofocus>
              <a href="<?php echo base_url('seller/login/termsandconditions'); ?>">Terms and Conditions</a>
			  </div>
              <div class="clearfix"></div>
              <input type="submit" class="btn btn-primary  btn-block btn-sm mar_t10" name="register_do" id="register_do" value="Get OTP">
              <!-- <button class="btn btn-primary btn-sm mar_t10" type="submit">Get OTP</button> -->
              </form>
            </div>
            </div>
            <div class="clearfix"></div>
            <!--  <div class="social-login">
              <p>- - - - - - - - - - - - - Sign In With - - - - - - - - - - - - - </p>
              <ul>
              <li><a href=""><i class="fa fa-facebook"></i> Facebook</a></li>
              <li><a href=""><i class="fa fa-google-plus"></i> Google+</a></li>
              <li><a href=""><i class="fa fa-twitter"></i> Twitter</a></li>
              </ul>
              </div>-->
              <div class="clearfix"></div>
            </div>
            <!--<div id="" class="tab-pane fade">
              <div class="innter-form">
              <form class="sa-innate-form" method="post">
                <div class="form-group">
                  <?php echo $this->session->flashdata('msg1'); ?>
                  <div class="col-xs-12 col-md-6 nopaddingright reginput">
                    <label for="ex1">Name</label>
                    <input class="form-control" id="seller_fullname" name="seller_fullname" type="text" autofocus>
                    <span id="errorname1" style="color:red; font-size: 13px;"></span>
                  </div>
                  <div class="col-xs-12 col-md-6 nopaddingright reginput">
                    <label for="ex2">Email Id</label>
                    <input class="form-control" id="seller_email" name="seller_email" type="text">
                    <span id="erroremail" style="color:red; font-size: 13px;"></span>
                  </div>
                  
                  <div class="col-xs-12 col-md-6 nopaddingright reginput">
                    <label for="ex4">Mobile Number</label>
                    <input class="form-control" id="seller_mobile" name="seller_mobile" maxlength="10" type="text">
                    <span id="errorphone" style="color:red; font-size: 13px;"></span>
                  </div>
                  <div class="col-xs-12 col-md-6 nopaddingright reginput">
                    <label for="ex5">Shop Name</label>
                    <input class="form-control" id="seller_shop" name="seller_shop" type="text">
                    <span id="errorshop" style="color:red; font-size: 13px;"></span>
                  </div>
                  <div class="col-xs-12 col-md-6 nopaddingright reginput">
                    <label for="ex6">Shop Location</label>
                    <select class="form-control" id="location_name" name="location_name">
                       <option value="">-Select Location-</option>
                       <?php //foreach($locationdata as $location_data)  { ?>
                       <option value="<?php //echo $location_data->location_name;?>"><?php //echo $location_data->location_name;?></option>
                       
                       <?php //} ?>
                      </select>
                      <span id="errorlocation" style="color:red; font-size: 13px;"></span>
                  </div>
                  <div class="col-xs-12 col-md-6 nopaddingright reginput">
                    <label for="ex7">VAT/TIN Number</label>
                    <input class="form-control" id="seller_license" name="seller_license" type="text">
                    <span id="errorlicense" style="color:red; font-size: 13px;"></span>
                  </div>
                  
                   
                  <div class="col-xs-12 col-md-6 nopaddingright reginput">
                    <label for="ex12">Address</label>
                    <textarea class="form-control" id="seller_address" name="seller_address"></textarea>
                    <span id="erroraddress" style="color:red; font-size: 13px;"></span>
                  </div>
                  <div class="col-xs-12 col-md-6 " style="margin-top:30px">
                    <label for="ex12"></label><br>
                    <button class="btn btn-primary">Detect my Location</button>
                   
                   
                  </div>
                  </div>
                   <label>
                  <input type="checkbox" name="checkbox" value="check" id="terms_condition">
                  If you have read and agree to the <a href="#">Terms and Conditions,</a> please continue</label>
              <button type="submit">Register now</button>
              
              </form>
              </div>
            
              <div class="clearfix"></div>
            </div>-->
          </div>
        </div>
          </div>
         
      </div>
    </div>
  </div>
  
  
  
  <!--Just fill form to Select plan modal -->
  <div class="modal fade" id="myModal_sel_mod" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
     <div class="modal-content">
   
        <div class="modal-header " style="background-color:#006a99;color:#fff;padding:10px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"> Enquiry form</h4>
        </div>
        <div class="modal-body">
          <div class="container">
  <div class="row">
       
  
    <div class="col-md-6">
   <form class="form-horizontal" action="/action_page.php">
    <div class="form-group">
      <label class="control-label col-sm-4" for="">Buiness Name:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="" placeholder="Enter Buiness Name" name="" reqired>
      </div>
    </div>
  <div class="form-group">
      <label class="control-label col-sm-4" for="">First Name:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="" placeholder="Enter First Name" name="" reqired>
      </div>
    </div>
  <div class="form-group">
      <label class="control-label col-sm-4" for="">Mobile/Phone No:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="" placeholder="Enter Mobile/Phone No" name="" reqired>
      </div>
    </div> 
  <div class="form-group">
      <label class="control-label col-sm-4" for="email">Valid Email Id:</label>
      <div class="col-sm-8">
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="">Business OPeration:</label>
      <div class="col-sm-8">          
        <select class="form-control" id="sel1">
        <option>select your Business OPeration</option>
        <option>Business OPeration1</option>
        <option>Business OPeration 2</option>
        <option>Business OPeration 3</option>
      </select>
      </div>
    </div> 
  <div class="form-group">
      <label class="control-label col-sm-4" for="">Select Plan :</label>
      <div class="col-sm-8">          
        <select class="form-control" id="sel1">
        <option>select plan</option>
        <option>plan1</option>
        <option>plan 2</option>
        <option>plan 3</option>
      </select>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-4 col-sm-8">
        <div class="checkbox">
          <label><input type="checkbox" name="remember"> Remember me</label>
        </div>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-4 col-sm-8">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </form>
      </div>
      <div class="col-md-3">&nbsp;</div>
      
  </div>
</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <!--end Just fill form to Select plan Modal -->
   <!--Just fill form to Select plan modal -->
  <div class="modal animated  zoomIn" id="myModal_ser" role="dialog">
    <div class="modal-dialog modal-lg " style="width: 1200px;">
    
      <!-- Modal content-->
     <div class="modal-content"  >
   
        <!--<div class="modal-header " style="background-color:#006a99;color:#fff;padding:10px;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"> Enquiry form</h4>
        </div>-->
        <div class="modal-body" style="padding:0px">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<img style="width:100%;" class="img-responsive" src="<?php echo base_url();?>assets/seller_login/images/price_hide.png" />
		<div style="position: absolute;top:50%;color:#ddd;right:42%;">
			<p style="font-size:20px;"><b>Limited period offer</b></p>		
			<p style="font-size:20px;margin-left: 25px;">Free for 1 month</p>		<br>
			<span style="background:#006a99;padding:5px 10px ;border-radius:5px;font-size:18px;margin-left: 50px;cursor: pointer;" class="" data-dismiss="modal"  data-toggle="modal"
			data-target="#myModa2">Register Now</span>
		</div>
     
</div>
        </div>
        
      </div>
      
    </div>
  </div>
  
  <!--end Just fill form to Select plan Modal -->
  <!--Forget Password Modal -->
          <div class="modal fade" id="myModal1" role="dialog">
		  
              <div class="modal-dialog modal-sm">
			  <button type="button" id="poupclose" style="color:#444;z-index:1024;opacity:0.5;" class="close" data-dismiss="modal">&times;</button>
                <div class="modal-content">
                  <div class="modal-body pass_list">                
                      <h4>How do you want temporary password to be send:</h4>                       
                        <form id="login_pass" name="login_pass" method="post"> 
						<input type="radio" name="unable_login" id="unable_login" value="1" > E-Mail 
						<input type="radio" name="unable_login" id="unable_login" value="0" > Mobile
						<div id="forgoterror"></div>
            <div id="forgot-response"></div>
                        <input type="text" class="form-control" id="forgot_mobile" name="forgot_mobile">
                         <span id="MobileforErr"></span>
                      
                      <br>
                      <a href="javascript:void(0)"  onclick="validationcheckings();"  class="btn btn-success">Submit</a>
				</div>
				     </form>           
				 </div>
                </div>
              </div>
            </div>
      
      
      

<script>
function IsMobile(reasontype) {
        var regex = /^[0-9]{10}$/;
        return regex.test(reasontype);
		}
function emailchecking(reasontype) {
	var regex = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;
	return regex.test(reasontype);
}
 function validationcheckings (){
	 
	 $("#forgot-response").html("");
	  var radiovalue=$('input[name="unable_login"]:checked').val();
	  //alert(radiovalue);
	  if(radiovalue==1 || radiovalue==0){
		
	  if(radiovalue==0){
		  var mobile = document.getElementById('forgot_mobile').value;
		  
		  if(mobile==''){
			  
			  $("#forgoterror").html("Please Enter Mobile Number").css("color", "red");
			  return false;
		  }else{
			  
			 
			 var mobile = document.getElementById('forgot_mobile').value;
			if (!IsMobile(mobile)) {
			$("#forgoterror").html("Please Enter Correct Mobile Number").css("color", "red");
			jQuery('#seller_mobile').focus();
			return false;
			} 
		  }
		  $("#forgoterror").html("");
			$("#forgot_submit").html("");
			$.ajax({
			  
					type: 'post',
					data: {
					form_key : window.FORM_KEY,
					mobile_number: jQuery('#forgot_mobile').val(),
					option: 0,
					},
					
					dataType: 'json',
					url: '<?php echo base_url("seller/login/forgot"); ?>',
					success:function(data)
					{
					//alert(data);
					if(data.sendmsg==1){
							$("#myModal1").fadeOut(1);
							$("#forgot_mobile").val('');
							$("#forgot-response").html("Temporary Password Successfully Sent").css("color", "Green");
							
							return true;
						}if(data.sendmsg==0){
							$("#forgot-response").html("Some technical problem are occured").css("color", "red");
							$('#forgot_submit')[0].reset();
						}
						if(data.nomobile==0){
							$("#forgoterror").html("The Mobile you entered is not a registered Mobile. Please try again").css("color", "red");
							$('#forgot_submit')[0].reset();
							return false;
						}
					}
					
			});
		
		  
	  }
		
	  if(radiovalue==1){
		  var email = document.getElementById('forgot_mobile').value;
		  if(email==''){
			  $("#forgoterror").html("Please Enter Email").css("color", "red");
		  }else{
			  
			  if (!emailchecking(email)) {
			$("#forgoterror").html("Please enter a valid email address. For example johndoe@domain.com").css("color", "red");
			jQuery('#seller_mobile').focus();
			return false;
			}
		  }
			$("#forgoterror").html("");
			$("#forgot_submit").html("");
				$.ajax({
					type: 'post',
					data: {
					form_key : window.FORM_KEY,
					mobile_number: jQuery('#forgot_mobile').val(),
					option: 1,
					},
					
					dataType: 'json',
					url: '<?php echo base_url("seller/login/forgot"); ?>',
					success:function(data)
					{
						//alert(data.mailsend);return false;
						if(data.mailsend==1){
							$("#myModal1").fadeOut(1);
							$("#forgot_mobile").val('');
							$("#forgot-response").html("Temporary Password Successfully Sent").css("color", "Green");
							$('#forgot_submit')[0].reset();
							
							return true;
						}
						if(data.noemail==0){
							$("#forgot-response").html("The Email you entered is not a registered email. Please try again").css("color", "red");
							$('#forgot_submit')[0].reset();
							return false;
						}
					}
			});
	  
	  }
	 	
		  
	
 }else{
	 $("#forgoterror").html("Please select one option").css("color", "red");
	 return false;
 }
 
 }

//jQuery to collapse the navbar on scroll
$(window).scroll(function() {
    if ($(".navbar").offset().top > 50) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
        $(".navbar-fixed-top").addClass("mar_t50");
    }
});

//jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $(document).on('click', 'a.page-scroll', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});

</script>
<script type="text/javascript" language="javascript">

   
  
   $(window).scroll(function() {
if ($(this).scrollTop() > 650) {
$('.hm_nav').addClass('affix');
$('.hm_nav').addClass('animated fadeInDown');
}
else{
$('.hm_nav').removeClass('affix');
$('.hm_nav').removeClass('animated fadeInDown');
}
 });
</script>

<!--script for scrolling pages-->
  <script>
$(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top -100
      }, 1500, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});


</script>




<script type="text/javascript">
$(document).ready(function(){
    $("#login_do").click(function(e){
    e.preventDefault();
    var login_email = $("#login_email").val();
  var login_password = $("#login_password").val();
   var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
   if(login_email == "" && login_password == "" )
  {
  $("#EmptyforError").html("Please Enter email and password").css("color", "red");
        $("#login_email").focus();
        return false;
  }
  else{
  $("#EmptyforError").html(""); 
  }
    // if(login_email !="" && login_email .match(mailformat)) 
    //   {
    //     $("#EmptyforError").html("");
    //   }
    //   else if(login_email !="" && !login_email .match(mailformat)){  
    //     $("#EmptyforError").html("Invalid Email Format").css("color", "red");
    //     $("#login_email").focus();
    //     return false;
    //     }
    $.ajax({
    type: "POST",
    url: '<?php echo base_url(); ?>seller/login/do_login',
    data: {login_email:login_email,login_password:login_password},
    success:function(data)
    {
    if(data == 1)
    {
   $("#login-response").html("Invalid Email / Mobile Number  or password.").css("color", "red");
     $('#login_submit')[0].reset(); 
    }
    else if(data == 0)
    {
    window.location='<?php echo base_url("seller/dashboard"); ?>'; 
	}
    },
    error:function()
    {
    $("#login-response").html("Oops! Error.  Please try again later!!");
    }
    });
    });
    });
</script>



<!-- register script -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script type="text/javascript">

function register(){

}

function IsLcemail(reasontype) {
        var regex = /^[0-9]{10}$/;
        return regex.test(reasontype);
		}
$(document).ready(function(){
    $("#register_do").click(function(e){
    e.preventDefault();

    var register;
    register = $("#seller_mobile").val();
    //alert(register);
    var phone =  /^(?=.*?[1-9])[0-9()-+]+$/;
   
   if(register=="")
  {
  $("#Emptyforregister").html("Please Enter Mobile Number").css("color", "red");
    $("#seller_mobile").focus();
        return false;
  }
  else{
  $("#Emptyforregister").html(""); 
  }
    if(register!=''){
		var lcemail = document.getElementById('seller_mobile').value;
			if (!IsLcemail(lcemail)) {
			$("#Emptyforregister").html("Please Enter Correct Mobile Number").css("color", "red");
			jQuery('#seller_mobile').focus();
			return;
			}else{
					$.ajax({
						type: "POST",
						   url: '<?php echo base_url(); ?>seller/login/insert',
							data: {seller_mobile:register},
						success:function(data)
						{
						  //alert(data);
						if(data == 0)
						{
					   $("#Emptyforregister").html("The Phone Number you entered already exist..").css("color", "red");
						 $('#login_submit')[0].reset(); 
						}
						else if(data == 1)
								{
								document.location.href='<?php echo base_url('seller/adddetails'); ?>'; 
							 }
						},
						});
				}
			}
    });
    });
</script>
