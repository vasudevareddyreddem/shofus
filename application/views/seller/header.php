<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>::Cart In Hours::</title>
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
            <p><a href="<?php echo base_url(); ?>seller/login"><img  class="img-responsive widt_img_lo" src="<?php echo base_url();?>assets/seller_login/images/logo.png" /></a>
      </p>
          </a>
    </div>
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" id="togg_menu" > <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <!--<a class="navbar-brand" href="#">Brand</a>--> 
      </div>
     <!-- customise toogle start-->
      <div class=" " style="display:none">
           <ul class=" ">
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
       <!-- customise toogle end-->
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
          <button  type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
       <div class="modal-body">
          
        <div class="form-body">
          
          <div class="tab-content">
            <div id="sectionA" class="tab-pane fade in active">
            <div class="row">
            <div class="col-xs-6 bor_lef">
            <div class="innter-form" id="temp_pas_hi" >
              <form method="post"  name="login_form" id="login_submit">
              <div id="login-response"></div>
                <div id="EmptyforError"></div><div id="forgot-response1"></div>
            <div class="form-group">
              <label >Email Address / Mobile Number</label>
              <input  name="login_email" id="login_email" class="form-control" type="text" name="username" autofocus>
            </div>
            <div class="form-group" >
              
              <label >Password</label>
              <input  id="login_password" name="login_password" class="form-control" type="password" name="password">
              </div>
              <div class="col-md-6 paddingRightZero">
                <div class="pswrd ">
                    <a href="#" tabindex="5" class="forgot-password" id="un_log" >Unable to Login?</a>
                </div>
              </div>
              <button class="btn btn-primary pull-right  btn-block " type="submit" id="login_do">Sign In</button>
                    
              </form>
            </div>
			<div class="clearfix"></div>
			
			<div class=" pass_list" style="display:none" id="temp_pass">
			<h4 class="text-primary" > Temporary Password </h4> 
		
                      <label style="font-size:15px;margin-bottom:10px">How do you want temporary password to be send:</label>  
						<div class="clearfix"> </div>                    
                        <form id="login_pass" name="login_pass" method="post"> 
                        <input type="radio" name="unable_login" id="unable_login" value="1" > E-Mail 
                        <input type="radio" name="unable_login" id="unable_login" value="0" > Mobile
                        <div id="forgoterror"></div>
                        <div id="forgot-response"></div>
                        <input type="text" class="form-control" id="forgot_mobile" name="forgot_mobile">
                         <span id="MobileforErr"></span>
						<span id="otp_code" style="display:none;">
						  <div style="font-size:15px;margin-bottom:10px;">OTP CODE:
							<input type="text" class="form-control" id="otp_number" name="otp_number">
						 </div>
						  <div style="font-size:15px;margin-bottom:10px">Password:
							<input type="password" class="form-control" id="forgot_password" name="forgot_password">
						 </div>
						 <div style="font-size:15px;margin-bottom:10px">Confirm Password:
							<input type="password" class="form-control" id="confirm_password" name="confirm_password">
						 </div>
						</span>
						
                      <a id="log_f" class="pull-right" style="margin:3px 0px;cursor: pointer;text-decoration: none;">Login</a>
					  <div class="clearfix"></div>
                     
                      <a href="javascript:void(0)"  onclick="validationcheckings();"   id="unableloginfield" class="btn btn-success btn-block">Submit</a>
					  <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-xs-6 ">
              <div class="innter-form">
              <div id="register-response"></div>
                <div id="Emptyforregister"></div>
                <form  name="register_form" id="register_submit" method="POST">
                <label>Enter your Mobile Number</label>
                <input   class="form-control" type="text" maxlength="10" id="seller_mobile" name="seller_mobile" autofocus>
                <input type="checkbox" name="check_tac" id="check_tac" >
              <a href="<?php echo base_url('seller/login/termsandconditions'); ?>">Terms and Conditions</a>
              <label>Enter Refer Code</label>
              <input   class="form-control" type="text" maxlength="6" id="any_ref" name="any_ref" value="">
              </div>
              <div class="clearfix"></div>
			  <label>&nbsp;</label>
              <input type="button" onclick="newregister();" class="btn btn-primary  btn-block  " name="register_do" id="register_do" value="Register">
              <!-- <button class="btn btn-primary btn-sm mar_t10" type="submit">Get OTP</button> -->
              </form>
            </div>
            </div>
           
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
      <label class="control-label col-sm-4" for="">Businessiness Name:</label>
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
        <img style="width:100%;" class="img-responsive" src="<?php echo base_url();?>assets/seller_login/images/pacban1.png" />
        <div style="position: absolute;top:50%;color:#ddd;right:42%;">
            <p style="font-size:20px;"><b>Limited period offer</b></p>      
            <p style="font-size:20px;margin-left: 25px;">Free for 1 month</p>       <br>
            <span id="bnt" style="background:#006a99;padding:5px 10px ;border-radius:5px;font-size:18px;margin-left: 50px;cursor: pointer;" class="" data-dismiss="modal"  data-toggle="modal"
            data-target="#myModa2">Register Now</span>
        </div>
     
</div>
        </div>
        
      </div>
      
    </div>
  </div>
  
  <!--end Just fill form to Select plan Modal -->
  <!--Forget Password Modal -->
          <div class="modal   animated rollIn" id="myModal1" role="dialog">
          
              <div class="modal-dialog modal-sm">
              <button type="button" id="poupclose" style="color:#444;z-index:1024;opacity:0.5;" class="close" data-dismiss="modal">&times;</button>
                <div class="modal-content bac_img_pop">
    <div class="modal-header " style="background-color:#006a99;color:#fff;padding:10px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"> Temporary Password </h4>
        </div>
                  <div class="modal-body pass_list">                
                      <div style="font-size:15px;margin-bottom:10px">How do you want temporary password to be send:</div>  
						<div class="clearfix"> </div>                    
                        <form id="login_pass" name="login_pass" method="post"> 
                        <input type="radio" name="unable_login" id="unable_login" value="1" > E-Mail 
                        <input type="radio" name="unable_login" id="unable_login" value="0" > Mobile
                        <div id="forgoterror"></div>
                        <div id="forgot-response"></div>
                        <input type="text" class="form-control" id="forgot_mobile" name="forgot_mobile">
                         <span id="MobileforErr"></span>
						<span id="otp_code" style="display:none;">
						  <div style="font-size:15px;margin-bottom:10px;">OTP CODE:
							<input type="text" class="form-control" id="otp_number" name="otp_number">
						 </div>
						  <div style="font-size:15px;margin-bottom:10px">Set Password:
							<input type="password" class="form-control" id="forgot_password" name="forgot_password">
						 </div>
						</span>
                      
                      <br>
                      <a href="javascript:void(0)"  onclick="validationcheckings();"   id="unableloginfield" class="btn btn-success">Submit</a>
                </div>
                     </form>           
                 </div>
                </div>
              </div>
            </div>
      
      
      
<script>
	$(document).ready(function(){
		$("#un_log").click(function(){
			$("#temp_pas_hi").hide();
			$("#temp_pass").show();
		});
		
	});
	$(document).ready(function(){
		$("#log_f").click(function(){
			$("#temp_pass").hide();
			$("#temp_pas_hi").show();
		});
		
	});
</script>
<script>
function IcsLemail(reasontype) {
        var regex = /^[0-9]{10}$/;
        return regex.test(reasontype);
 }
function newregister(){
	    var register = $("#seller_mobile").val();
		var any_refer = $('#any_ref').val();
		if(register=="")
		{
			$("#Emptyforregister").html("Please Enter Mobile Number").css("color", "red");
			$("#seller_mobile").focus();
			return false;
		}else if(register!=''){
			var lcemail = document.getElementById('seller_mobile').value;
            if (!IcsLemail(lcemail)) {
            $("#Emptyforregister").html("Please Enter Correct Mobile Number").css("color", "red");
            jQuery('#seller_mobile').focus();
            return false;;
            }
		}
		 var chkPassport = document.getElementById("check_tac");
        if (chkPassport.checked) {
        } else {
			$("#Emptyforregister").html("Please agree Terms and Conditions").css("color", "red");
			return false;
        }
		$("#Emptyforregister").html('');
		$.ajax({
				type: "POST",
				url: '<?php echo base_url(); ?>seller/login/insert',
				data: {seller_mobile:register,any_ref:any_refer},
				success:function(data)
					{
						if(data == 0)
						{
						$("#Emptyforregister").html("The Phone Number you entered already exist..").css("color", "red");
						}else if(data == 1)
							{
							document.location.href='<?php echo base_url('seller/adddetails'); ?>'; 
							}
					},
				});
						
	
}
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
     $("#Emptyforregister").html("");
	 
	 var styles=document.getElementById("otp_code").style.display;
	 if(styles==''){
		  var otpval = document.getElementById('otp_number').value;
		  var passwords = document.getElementById('forgot_password').value;
		  var confirmpasswords = document.getElementById('confirm_password').value;
		 if(otpval==''){
             $("#forgoterror").html("Please Enter OTP").css("color", "red");
              return false;
          }
		  if(passwords==''){
             $("#forgoterror").html("Please Enter your password").css("color", "red");
              return false;
          }else if(passwords!=''){
			  if(passwords.length>5){
				  
			  }else{
				 $("#forgoterror").html("Password length must be at least six characters").css("color", "red");
				 return false;
			  }
			  
			  
		  }
		  if(confirmpasswords==''){
             $("#forgoterror").html("Please Enter your Confirmpassword").css("color", "red");
              return false;
          }else if(passwords!=''){
			  if(confirmpasswords.length>5){
				  
			  }else{
				 $("#forgoterror").html("Confirmpassword length must be at least six characters").css("color", "red");
				 return false;
			  }
			  
			  
		  }
	 }
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
            document.getElementById("unableloginfield").disabled = true;
            $.ajax({
              
                    type: 'post',
                    data: {
                    form_key : window.FORM_KEY,
                    mobile_number: jQuery('#forgot_mobile').val(),
                    otp: jQuery('#otp_number').val(),
                    password: jQuery('#forgot_password').val(),
                    conpassword: jQuery('#confirm_password').val(),
                    option: 0,
                    },
                    
                    dataType: 'json',
                    url: '<?php echo base_url("seller/login/forgot"); ?>',
                    success:function(data)
                    {
                    //document.getElementById("unableloginfield").disabled = false;
                    if(data.sendmsg==1){
						$("#otp_code").show();
                            
                            return true;
                        }if(data.sendmsg==0){
							document.getElementById("unableloginfield").disabled = false;
                            $("#forgot-response").html("Some technical problem are occured").css("color", "red");
                        }
                        if(data.nomobile==0){
							document.getElementById("unableloginfield").disabled = false;
                            $("#forgoterror").html("The Mobile you entered is not a registered Mobile. Please try again").css("color", "red");
                            return false;
                        }if(data.pass==1){
							$("#myModal1").fadeOut(1);
							$("#forgoterror").html('');
							$("#forgot_mobile").val('');
							$("#forgot_password").val('');
							$("#confirm_password").val('');
							$("#otp_number").val('');
							$("#otp_code").hide();
							$("#temp_pass").hide();
							$("#temp_pas_hi").show();
                            $("#forgot-response1").html("Password Successfully updated").css("color", "Green").fadeIn().fadeOut(5000);
						}if(data.pass==0){
							document.getElementById("unableloginfield").disabled = false;
                            $("#forgoterror").html("Your entered  OTP code is wrong. Please try again").css("color", "red");
						}if(data.conpass==0){
							document.getElementById("unableloginfield").disabled = false;
                            $("#forgoterror").html("password and confirm password was not matched. Please try again").css("color", "red");
						}
                    }
                    
            });
        
          
      }
        
      if(radiovalue==1){
          var email = document.getElementById('forgot_mobile').value;
          if(email==''){
              $("#forgoterror").html("Please Enter Email").css("color", "red");
              return false;
          }else{
              
              if (!emailchecking(email)) {
            $("#forgoterror").html("Please enter a valid email address. For example johndoe@domain.com").css("color", "red");
            jQuery('#seller_mobile').focus();
            return false;
            }
          }
            $("#forgoterror").html("");
            $("#forgot_submit").html("");
            $("#forgot_submit").html("");
			document.getElementById("unableloginfield").disabled = true;
                $.ajax({
                    type: 'post',
                    data: {
                    form_key : window.FORM_KEY,
                    mobile_number: jQuery('#forgot_mobile').val(),
					otp: jQuery('#otp_number').val(),
					password: jQuery('#forgot_password').val(),
                    conpassword: jQuery('#confirm_password').val(),
                    option: 1,
                    },
                    
                    dataType: 'json',
                    url: '<?php echo base_url("seller/login/forgot"); ?>',
                    success:function(data)
                    {
                         $('#EmptyforError').hide();
						if(data.mailsend==1){
                            $("#otp_code").show();
							document.getElementById("unableloginfield").disabled = false;
                            return true;
                        }
                        if(data.noemail==0){
                            $("#forgot-response").html("The Email you entered is not a registered email. Please try again").css("color", "red").fadeIn().fadeOut(5000);
                            document.getElementById("unableloginfield").disabled = false;
                            return false;
                        }
						if(data.pass==1){
							$("#myModal1").fadeOut(1);
							$("#forgoterror").html('');
							$("#forgot_mobile").val('');
							$("#forgot_password").val('');
							$("#otp_number").val('');
							$("#otp_code").hide();
							$("#temp_pass").hide();
							$("#temp_pas_hi").show();
                            $("#forgot-response1").html("Password Successfully updated").css("color", "Green").fadeIn().fadeOut(5000);
						}if(data.pass==0){
							document.getElementById("unableloginfield").disabled = false;
                            $("#forgoterror").html("Your entered  OTP code is wrong. Please try again").css("color", "red");
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
    if ($(".navbar").offset().top > 500) {
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
if ($(this).scrollTop() > 100) {
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
        scrollTop: $(hash).offset().top 
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
    $("#EmptyforError").html("Please Enter email and password").css("color", "red").fadeIn().fadeOut(5000);
    $("#login_email").focus();
    return false;
    }
    if(login_email == ""){
    $("#EmptyforError").html("Please Enter email").css("color", "red").fadeIn().fadeOut(5000);
    $("#login_email").focus();
    return false;   
    }
    if(login_password == ""){
    $("#EmptyforError").html("Please Enter Password").css("color", "red").fadeIn().fadeOut(5000);
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
    url: '<?php echo base_url('seller/login/do_login'); ?>',
    data: {login_email:login_email,login_password:login_password},
    success:function(data)
    {
    if(data == 1)
    {
		$("#login-response").html("Invalid Email / Mobile Number  or password.").css("color", "red").fadeIn().fadeOut(5000);
		$('#login_submit')[0].reset(); 
    }else if(data==2){
		$("#login-response").html("Your account deactivated. Please contact to system admin").css("color", "red").fadeIn().fadeOut(9000);
		$('#login_submit')[0].reset(); 	
	}
    else if(data == 0)
    {
    window.location='<?php echo base_url("seller/dashboard"); ?>'; 
    }
    },
    error:function()
    {
    $("#login-response").html("Oops! Error.  Please try again later!!").fadeIn().fadeOut(5000);
    }
    });
    });
    });
</script>



<!-- register script -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script type="text/javascript">

$(document).ready(function(){
    $("#togg_menu").click(function(){
        $(".cust_togg_menu").slideToggle("slow");
    });
     $(document).click(function (e) {
        if (!$(e.target).closest('#togg_menu, .cust_togg_menu').length) {
            $('.cust_togg_menu').stop(true).slideUp();
        }
    });
});
</script>