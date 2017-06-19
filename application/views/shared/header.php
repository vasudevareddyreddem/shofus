<!--wrapper start here -->
<div class="wrapper"> 
  <!--header part start here -->
  <div class="jain_container">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container1 container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <i class="icon-menu"></i> Menu </button>
          <a class="navbar-brand" href="<?php echo base_url(); ?>"> <img src="<?php echo base_url(); ?>assets/home/images/logo.png" /></a> </div>
        <div class="col-md-8">
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal form-horizontal_x">
                  <div class="flipkart-navbar-search smallsearch">
                    <div class="cart_search">
                      <input class="flipkart-navbar-input col-xs-11" type="" placeholder="Search for Products, Brands and more" name="">
                      <button class="flipkart-navbar-button col-xs-1"> <svg width="15px" height="15px">
                      <path d="M11.618 9.897l4.224 4.212c.092.09.1.23.02.312l-1.464 1.46c-.08.08-.222.072-.314-.02L9.868 11.66M6.486 10.9c-2.42 0-4.38-1.955-4.38-4.367 0-2.413 1.96-4.37 4.38-4.37s4.38 1.957 4.38 4.37c0 2.412-1.96 4.368-4.38 4.368m0-10.834C2.904.066 0 2.96 0 6.533 0 10.105 2.904 13 6.486 13s6.487-2.895 6.487-6.467c0-3.572-2.905-6.467-6.487-6.467 "></path>
                      </svg> </button>
                    </div>
                  </div>
                </form>
              </div>
              <div class="col-md-12">
                <ul class="nav navbar-nav">
                  <li><a href="<?php echo base_url(); ?>">HOME</a></li>
				   <?php foreach($catdata as $cat_data){?>
                  <li class="dropdown mega-dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php echo strtoupper($cat_data->category_name);  ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu mega-dropdown-menu">
					<?php foreach($cat_data->subcat as $subcat_data){?>
                      <li class="col-sm-4">
                        <ul>
                          <a href="<?php echo base_url(); ?>home/productsview/<?php echo $cat_data->category_name;  ?>/<?php echo $subcat_data->subcategory_name;  ?>"><li class="dropdown-header"><?php echo ucwords($subcat_data->subcategory_name);  ?></li></a>
                          <!--<li><a href="#">Veg Biryani</a></li>
                          <li><a href="#">Curries</a></li>-->
                          <!-- <li class="divider"></li>
							<li class="dropdown-header">Fonts</li>
                            <li><a href="#">Glyphicon</a></li>
							<li><a href="#">Google Fonts</a></li> -->
                        </ul>
                      </li>
					<?php } ?>
                      
                     
                    </ul>
                  </li>
                  
				   <?php } ?>
                
                  <li><a href="#">PAGES</a></li>
                  <li> <a href="#">CONTACT US</a> </li>
                </ul>
              </div>
              
            </div>
          </div>
        </div>
        <div class="col-md-2 medias">
          <ul class="largenav">
            <li class="upper-links"><a class="links cust_btn md-trigger" data-modal="modal-8" onClick="registershow()" href="javascript:void(0);">Login/signup</a></li>
            <!--<li class="upper-links dropdown"><a class="links" href="#">Dropdown</a>
              <ul class="dropdown-menu">
                <li class="profile-li"><a class="profile-links" href="#">Link</a></li>
                <li class="profile-li"><a class="profile-links" href="#">Link</a></li>
                <li class="profile-li"><a class="profile-links" href="#">Link</a></li>
              </ul>
            </li>-->
          </ul>
          <div class="classus">
            <div class="no-js">
              <h2 class="hm_lcao"><i class="fa fa-map-marker" aria-hidden="true"></i> Location : <?php echo $this->session->userdata('location_name');   ?></h2>
              <div class="fl-nav-links">
                <div class="input-box">
                  <select name="location_name" id="location_name" class="validate-select sel_are">
        <option value="">Select Area </option>
		<?php foreach($locationdata as $location_data) {?>
        <option value="<?php echo $location_data->location_name; ?>"><?php echo $location_data->location_name; ?></option>
       
		<?php } ?>
        </select>     
                </div>
              </div>
            </div>
          </div>
		   <?php $cart = $this->cart->contents();  ?>
		   
          <div class="cart largenav" id="cart"> <a class="cart-button dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <svg class="cart-svg " width="16 " height="16 " viewBox="0 0 16 16 ">
            <path d="M15.32 2.405H4.887C3 2.405 2.46.805 2.46.805L2.257.21C2.208.085 2.083 0 1.946 0H.336C.1 0-.064.24.024.46l.644 1.945L3.11 9.767c.047.137.175.23.32.23h8.418l-.493 1.958H3.768l.002.003c-.017 0-.033-.003-.05-.003-1.06 0-1.92.86-1.92 1.92s.86 1.92 1.92 1.92c.99 0 1.805-.75 1.91-1.712l5.55.076c.12.922.91 1.636 1.867 1.636 1.04 0 1.885-.844 1.885-1.885 0-.866-.584-1.593-1.38-1.814l2.423-8.832c.12-.433-.206-.86-.655-.86 " fill="#fff "></path>
            </svg> Cart <span class="item-number "><?php echo count($cart);   ?></span> </a>
            <ul class="dropdown-menu notify-drop">
			
              <div class="notify-drop-title">
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6">View Products (<b><?php echo count($cart);   ?></b>)</div>
                  <div class="col-md-6 col-sm-6 col-xs-6 text-right"><a href="" class="rIcon allRead" data-tooltip="tooltip" data-placement="bottom" title="tümü okundu."><i class="fa fa-dot-circle-o"></i></a></div>
                </div>
              </div>
              <!-- end notify title --> 
              <!-- notify content -->
              <div class="drop-content">
			  <?php
                     // Create form and send all values in "shopping/update_cart" function.
                    
                    $i = 1;

                    foreach ($cart as $item):
					 echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                        echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
                        echo form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
                        echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
						echo form_hidden('cart[' . $item['id'] . '][pro_image]', $item['pro_image']);
                        echo form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']);
						echo form_hidden('cart[' . $item['id'] . '][item_quantity]', $item['item_quantity']);
					?>
                <li>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <div class="notify-img"><img src="<?php echo base_url();?>uploads/products/<?php  echo $item['pro_image']; ?>" alt="" style="width:45px;height:45px;"></div>
                  </div>
                  <div class="col-md-9 col-sm-9 col-xs-9 pd-l0"><a href="#"><?php echo $item['name'];?></a> <a href="" class="rIcon"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                    <p>Lorem ipsum sit dolor amet consilium.</p>
                    <p class="time">Rs. <?php echo $item['price'];?></p>
                  </div>
                </li>
               <?php endforeach; ?>
               
               
              </div>
              <div class="notify-drop-footer text-center"> <a href="<?php echo base_url(); ?>home/addtocart"><i class="fa fa-eye"></i> Check Out</a> </div>
            </ul>
          </div>
		  
        </div>
      </div>
    </nav>
	
	
	
	
	<!-- Login popup start here -->
<div class="md-modal md-effect-8" id="modal-8">
  <div class="md-content">
    <div id="log_sign"> 
      
      <!-- Nav tabs -->
      <button class="md-close pull-right miy">Close me!</button>
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#login" aria-controls="home" role="tab" data-toggle="tab"> <i class="fa fa-lock" aria-hidden="true"></i> Login</a></li>
        <li role="presentation"><a href="#signup" aria-controls="profile" role="tab" data-toggle="tab"> <i class="fa fa-user" aria-hidden="true"></i> Sign Up</a></li>
      </ul>
      
      <!-- Tab panes -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="login">
		 <div id="login-response" style="font-size:100%;"></div>
          <form id="login-form" method="post">
            <div class="form-group">
              <label for="email">Email address:</label>
              <input type="text" class="form-control" name="login_email" id="login_email">
			  <span class="all_errors"><p id="NameErr1" class="Error_msge"></p></span>
            </div>
            <div class="form-group">
              <label for="pwd">Password:</label>
              <label class="pull-right" id="frgt_pass"><a href="#" class="pull-right" style="text-decoration: none;"><i class="icon-question-sign"></i>&nbsp; <i class="fa fa-question-circle" aria-hidden="true"></i> Forgot Password ?</a> </label>
              <input type="password" class="form-control" name="login_password" id="login_password">
			  <span class="all_errors"><p id="PasswordErr5" class="Error_msge"></p></span>
            </div>
            <!--<div class="checkbox">
              <label>
                <input type="checkbox">
                Remember me</label>
            </div>-->
            <button type="submit" class="btn btn-danger cls pull-left" id="login_submit" name="submit">SIGN IN</button>
          </form>
        </div>
        <div role="tabpanel" class="tab-pane" id="signup">
		<div id="signup-response" style="font-size:100%;"></div>
          <form method="post" id="register-form">
            <div class="form-group">
              <label for="user name">User Name:</label>
              <input type="text" name="user_name" id="user_name" class="form-control">
			  <span class="all_errors"><p id="NameErr" class="Error_msge"></p></span>
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="text" class="form-control" name="user_email" id="user_email">
			  <span class="all_errors"><p id="EmailErr" class="Error_msge"></p></span>
            </div>
			 <div class="form-group">
              <label for="phone">Phone No:</label>
              <input type="text" class="form-control" name="user_phone" id="user_phone">
			  <span class="all_errors"><p id="PhoneErr" class="Error_msge"></p></span>
            </div>
            <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" class="form-control" name="user_password" id="user_password">
			  <span class="all_errors"><p id="PassErr1" class="Error_msge"></p></span>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" id="chkterms2">
                By signing up I agree to terms & conditions</label>
				<span class="all_errors"><p id="TermsErr" class="Error_msge"></p></span>
            </div>
            <button type="submit" class="btn btn-danger cls pull-left" id="register_submit" name="submit">Submit</button>
          </form>
        </div>
      </div>
    </div>
    <div id="show_pass" style="display: none;">
      
	  <button class="md-close pull-right miy" style="margin-bottom: 15px;">Close me!</button>
      Forgot Your Password ?
	  <div id="lost-response" style="font-size:100%;"></div>
	  <form method="post" id="lost-form">
      <div class="form-group">
        <input type="password" class="form-control" name="lost_email" id="lost_email" placeholder="Please Enter Your Email Here">
      </div>
      <button type="submit" class="btn btn-danger cls pull-left" id="lost_submit">Submit</button>
	  </form>
      <label id="show_login" class="pull-right lgo"><i class="fa fa-user-plus"></i> Login</label>
    </div>
  </div>
</div>
<div class="md-overlay"></div>

<!-- the overlay element --> 

<script src="<?php echo base_url(); ?>assets/home/js/classie.js"></script> 
<script src="<?php echo base_url(); ?>assets/home/js/modalEffects.js"></script> 
<script type="text/javascript">
    $(document).ready(function(){
      $('#frgt_pass').click(function(){
          $('#log_sign').hide();
          $('#show_pass').show();

      });
       $('.md-close').click(function(){
            $('#modal-8').hide();
            $('.md-overlay').hide();
          });
       $('#show_login').click(function(){
          $('#log_sign').show();
          $('#show_pass').hide();
       })
    });
  </script> 

<!-- Login popup end here -->
<script>
function registershow(){
	
$("#modal-8").show();	
} 
</script>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>

    <script type="text/javascript">
$(document).ready(function()
{
$("#location_name").change(function()
{

  
var id=$(this).val();

var dataString = 'location_name='+ id;
$.ajax
({
type: "POST",
 url: "<?php echo base_url();?>home/location",
data: dataString,
cache: false,
success: function(data)
{
  //alert(data);
//location.reload();
window.location.href="<?php echo base_url(); ?>";
} 
});

});
});
</script>

<script type="text/javascript" language="javascript">
      $(document).ready(function(){
    $('#register_submit').click(function(e){
    e.preventDefault();
 
    //if ($('#chkterms2').is(':checked')) {
    var user_name = $("#user_name").val();
    var user_email= $("#user_email").val();
	var user_phone = $("#user_phone").val();
    var user_password = $("#user_password").val();
	var terms_conditions = $('#chkterms2').is(':checked');
     
    
    var letters = /^[0-9a-zA-Z]+$/; 
    var number = /^\d{10}$/;
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var name=/^[^-\s][a-zA-Z0-9_\s-]+$/;
    var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
    
    if (user_name == "")
    {
    $("#NameErr").html("Enter Your Name ").css("color", "red");
    $("#user_name").focus();
    return false;
    }
    else{
      if(user_name!="" && user_name.match(letters)) 
      {
        $("#NameErr").html("");
      }
      else{
        
        $("#NameErr").html("Name Accepts Alphanumeric Only");
        $("#user_name").focus();
        return false;
        }
    }
    
    
    if (user_email == "")
    {
    $("#EmailErr").html("Enter Your Email ID ").css("color", "red");
    $("#user_email").focus();
    return false;
    }
    else{
      if(user_email!="" && user_email.match(mailformat)) 
      {
        $("#EmailErr").html("");
      }
      else{
        
        $("#EmailErr").html("Invalid Email Format");
        $("#user_email").focus();
        return false;
        }
      
    }
	
	
	
	if (user_phone == "")
    {
    $("#PhoneErr").html("Enter Your Phone Number").css("color", "red");
    $("#user_phone").focus();
    return false;
    }
    else{
      if(user_phone!="" && user_phone.match(number)) 
      {
        $("#PhoneErr").html("");
      }
      else{
        
        $("#PhoneErr").html("Invalid Phone Number");
        $("#user_phone").focus();
        return false;
        }
      
    }
    
   
    /************************************************************************/
      if(user_password==""){
      $("#PassErr1").html("Enter Your Password ").css("color", "red");
      $("#user_password").focus();
      return false; 
      }
      else{
      if(user_password!="" && user_password.match(strongRegex)) 
      {
      $("#PassErr1").html("");
      }
      else{
      $("#PassErr1").html("Password minimum length is 8 characters and should contain letters (One Letter in Caps), symbols, numbers");
      $("#user_password").focus();
      return false;
      } 
      }
	  if (terms_conditions == "")
		{
		$("#TermsErr").html("Please Accept Terms & Conditions").css("color", "red");
		return false;
		}
		else{
			$("#TermsErr").html("");
		}
  
    $.ajax({
    type: "POST",
    url: '<?php echo base_url() ?>Home/signup',
    data: {user_name:user_name,user_email:user_email,user_phone:user_phone,user_password:user_password},
    success:function(data)
    {
      //alert(data);
    if(data == 1)
    {
      
    $("#signup-response").html("You are Successfully Registered! Please Login to Continue. ").css("color", "green");
    $('#register-form')[0].reset();
    }

    else if(data == 2){
    
    $("#EmailErr").html("The Mail Id you gave is already registered, Please try again.").css("color", "red");
    $("#user_email").val("");
    $('#register-form')[0].reset();
    
    }
    else
    {
    $("#signup-response").html("Oops! Error.  Please try again later").css("color", "red");
    
    $('#register-form')[0].reset();

    }
    
    },
    error:function()
    {
    //alert('fail');
    $("#signup-response").html("Please try again later for signup").css("color", "red");

    $('#register-form')[0].reset();
    }
    });
    });
    
    });
  

</script>

<script type="text/javascript" language="javascript">
 
		$(document).ready(function(){
		$("#login_submit").click(function(e){
		e.preventDefault();
		
		var user_email= $("#login_email").val();
		var user_password = $("#login_password").val();
		if (user_email == "")
    {
    $("#NameErr1").html("Enter Email").css("color", "red");
    $("#login_email").focus();
    return false;
    }
    else{
      $("#NameErr1").html("");
    }
	if (user_password == "")
    {
    $("#PasswordErr5").html("Enter Password").css("color", "red");
    $("#login_password").focus();
    return false;
    }
    else{
      $("#PasswordErr5").html("");
    }
		$.ajax({
		type: "POST",
		url: '<?php echo base_url() ?>Home/login',
		data: {user_email:user_email,user_password:user_password},
		success:function(data)
		{
		if(data == 1)
		{
			location.reload();
		}
		else{
		
		$("#login-response").html("Invalid User Name or Password").css("color", "red");
		$('#login-form')[0].reset();	
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