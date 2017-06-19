  <!--container-->
  <div class="main-container col1-layout wow bounceInUp animated animated" style="visibility: visible;">
    <div class="main">
      <div class="cart wow bounceInUp animated animated" style="visibility: visible;">
        <div class="cart-collaterals container"> 
          <!-- BEGIN COL2 SEL COL 1 --> 
          
          <!-- BEGIN TOTALS COL 2 -->
          <div class="col-sm-12">
            <div class="shipping">
              <h3>Shipping Address</h3>
              <div class="shipping-form">
                <form action="<?php echo base_url(); ?>home/payment" method="post" onSubmit="return validateof();">
                  <ul class="form-list">
                   <p id="error" style="color: #F00; text-align: center; padding:20px 0 0 0"></p>

                    <li class="col-md-4 nopaddingright">
                      <label for="">First Name:</label>
                      <div class="input-box">
                        <input class="input-text" id="first_name" name="first_name"  type="text">
                      </div>
                    </li>
                    <li class="col-md-4 nopaddingright">
                      <label for="">Last Name:</label>
                      <div class="input-box">
                        <input class="input-text" id="last_name" name="last_name" type="text">
                      </div>
                    </li>
                    <li class="col-md-4 nopaddingright">
                      <label for="">Email:</label>
                      <div class="input-box">
                        <input class="input-text" id="email" name="email" value="" type="text" >
                      </div>
                    </li>
                    <li class="col-md-4 nopaddingright">
                      <label for="">Phone No:</label>
                      <div class="input-box">
                        <input class="input-text" id="" name="phone_num" type="text" >
                      </div>
                    </li>
                    
                    <li class="col-md-4 nopaddingright">
                      <label for="">Alternate Phone No:</label>
                      <div class="input-box">
                        <input class="input-text" id="alternate_num" name="alternate_num" type="text" >
                      </div>
                    </li>
                  <!--   <li class="col-md-4 nopaddingright">
                      <label for="">City:</label>
                      <div class="input-box">
                        <input class="input-text" id="" name="" value="" type="text" >
                      </div>
                    </li>
                   <li class="col-md-4 nopaddingright">
                      <label for="">State:</label>
                      <div class="input-box">
                        <input class="input-text" id="" name="" value="" type="text">
                      </div>
                    </li>
                    <li class="col-md-4 nopaddingright">
                      <label for="">country:</label>
                      <div class="input-box">
                        <input class="input-text" id="" name="" value="" type="text">
                      </div>
                    </li>
                    <li class="col-md-4 nopaddingright">
                      <label for="">Zip Code:</label>
                      <div class="input-box">
                        <input class="input-text" id="" name="" value="" type="text">
                      </div>
                    </li> -->
                    <li class="col-md-4 nopaddingright">
                      <label for="">Address:</label>
                      <div class="input-box">
                        <textarea class="form-control bill_text" rows="" id="address" name="address" ></textarea>
                      </div>
                    </li>
                  </ul>
                  <div class="buttons-set11">
                    <button type="submit" name="submit" class="button get-quote"><span>Check Out</span></button>
                  </div>
				  <a href="https://www.instamojo.com/@sameerwanjari/" rel="im-checkout" data-behaviour="remote" data-style="flat" data-text="Checkout "></a>
<script src="https://d2xwmjc4uy2hr5.cloudfront.net/im-embed/im-embed.min.js"></script>
                  
                </form>
              </div>
            </div>
          </div>
        </div>
        
        <!-- BEGIN CART COLLATERALS --> 
        
        <!--cart-collaterals--> 
        
      </div>
      <!--cart--> 
      
    </div>
    <!--main-container--> 
    
  </div>
  <div class="our-features-box wow bounceInUp animated animated animated" style="visibility: visible;">
    <div class="container">
      <ul>
        <li>
          <div class="feature-box free-shipping">
            <div class="icon-truck"></div>
            <div class="content">FREE SHIPPING on order over $99</div>
          </div>
        </li>
        <li>
          <div class="feature-box need-help">
            <div class="icon-support"></div>
            <div class="content">Need Help +1 800 123 1234</div>
          </div>
        </li>
        <li>
          <div class="feature-box money-back">
            <div class="icon-money"></div>
            <div class="content">Money Back Guarantee</div>
          </div>
        </li>
        <li class="last">
          <div class="feature-box return-policy">
            <div class="icon-return"></div>
            <div class="content">30 days return Service</div>
          </div>
        </li>
      </ul>
    </div>
  </div>
  <!-- For version 1,2,3,4,6 -->
 <script type="text/javascript">
 
function validateof()
{

//  alert('hi');
var first_name=document.getElementById('first_name');
var last_name=document.getElementById('last_name');
var email=document.getElementById('email');
var phone_num=document.getElementById('phone_num');
var alternate_num=document.getElementById('alternate_num');

var address=document.getElementById('address');


var first_name_reg=/^[a-zA-Z\s]+$/i;
var last_name_reg=/^[a-zA-Z\s]+$/i;
var email_reg = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
var phone_num_reg = /^[789]\d{9}$/;

var alternate_num_reg = /^[789]\d{9}$/;


if(first_name.value!=""){
if (!first_name_reg.test(first_name.value)) {
document.getElementById('error').innerHTML="First name contains characters only";
return false;
}   
}
else{
document.getElementById('error').innerHTML="Please enter the first name!";
return false;
}

if(last_name.value!=""){
if (!last_name_reg.test(last_name.value)) {
document.getElementById('error').innerHTML="Last name contains characters only";
return false;
}   
}
else{
document.getElementById('error').innerHTML="Please enter the last name!";
return false;
}

if(email.value!=""){
if (!email_reg.test(email.value)) {
document.getElementById('error').innerHTML="Invalid Email";
return false;
}

}
else{
document.getElementById('error').innerHTML="Please Enter The email";
return false;
}


if(phone_num.value!=""){
if (!phone_num_reg.test(phone_num.value)) {
document.getElementById('error').innerHTML="Invalid Phone number";
return false;
}

}
else{
document.getElementById('error').innerHTML="Please Enter Phone number";
return false;
}

if(alternate_num.value!=""){
if (!alternate_num_reg.test(alternate_num.value)) {
document.getElementById('error').innerHTML="Invalid Alternate Phone number";
return false;
}

}
else{
document.getElementById('error').innerHTML="Please Enter Alternate Phone number";
return false;
}

if(address.value == ""){
document.getElementById('error').innerHTML="Please Enter Your address";
return false;   

}  



}

</script>