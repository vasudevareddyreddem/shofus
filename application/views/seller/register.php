 
  <!--banenr start here -->
  <div class="register">
    <div class="container">
      <div class="row">
        <div class="col-md-9 col-md-offset-3">
          <div class="reg_main">
            <h1>Create your Account</h1>
            <hr>
             <form action="<?php echo base_url(); ?>seller/login/insert" method="post" enctype="multipart/form-data" onSubmit="return sellerinfvalidateof();">
              <div class="form-group">
        <?php echo $this->session->flashdata('msg1'); ?>
                <div class="col-xs-12 col-md-4 nopaddingright reginput">
                  <label for="ex1">Name</label>
                  <input class="form-control" id="seller_fullname" name="seller_fullname" type="text">
          <span id="errorname1" style="color:red; font-size: 13px;"></span>
                </div>
                <div class="col-xs-12 col-md-4 nopaddingright reginput">
                  <label for="ex2">Email Id</label>
                  <input class="form-control" id="seller_email" name="seller_email" type="text">
          <span id="erroremail" style="color:red; font-size: 13px;"></span>
                </div>
                
                <div class="col-xs-12 col-md-4 nopaddingright reginput">
                  <label for="ex4">Mobile Number</label>
                  <input class="form-control" id="seller_mobile" name="seller_mobile" maxlength="10" type="text">
          <span id="errorphone" style="color:red; font-size: 13px;"></span>
                </div>
                <div class="col-xs-12 col-md-4 nopaddingright reginput">
                  <label for="ex5">Shop Name</label>
                  <input class="form-control" id="seller_shop" name="seller_shop" type="text">
          <span id="errorshop" style="color:red; font-size: 13px;"></span>
                </div>
                <div class="col-xs-12 col-md-4 nopaddingright reginput">
                  <label for="ex6">Shop Location</label>
                  <select class="form-control" id="location_name" name="location_name">
                         <option value="">-Select Location-</option>
             <?php foreach($locationdata as $location_data)  { ?>
                         <option value="<?php echo $location_data->location_name;?>"><?php echo $location_data->location_name;?></option>
                         
             <?php } ?>
                      </select>
            <span id="errorlocation" style="color:red; font-size: 13px;"></span>
                </div>
                <div class="col-xs-12 col-md-4 nopaddingright reginput">
                  <label for="ex7">VAT/TIN Number</label>
                  <input class="form-control" id="seller_license" name="seller_license" type="text">
          <span id="errorlicense" style="color:red; font-size: 13px;"></span>
                </div>
                <div class="col-xs-12 col-md-4 nopaddingright reginput">
                  <label for="ex8">Aadhar Number</label>
                  <input class="form-control" id="seller_adhar" name="seller_adhar" maxlength="12"  type="text">
          <span id="erroradhar" style="color:red; font-size: 13px;"></span>
                </div>
                <div class="col-xs-12 col-md-4 nopaddingright reginput">
                  <label for="ex9">Bank Acc Number</label>
                  <input class="form-control" id="seller_bank" name="seller_bank" type="text">
          <span id="errorbank" style="color:red; font-size: 13px;"></span>
                </div>
               
                <div class="col-xs-12 col-md-4 nopaddingright reginput">
                  <label for="ex12">Address</label>
                  <textarea class="form-control" id="seller_address" name="seller_address"></textarea>
          <span id="erroraddress" style="color:red; font-size: 13px;"></span>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="checkbox">
                <label>
                  <!-- <input type="checkbox" name="checkbox" value="check" id="tac">
                  If you have read and agree to the <a href=<?php echo base_url(); ?>seller/login/tac" >Terms and Conditions,</a> please continue</label>
         <div id="errorterms" style="color:red; font-size: 13px;"> --></div> 
         <input type="checkbox" value="" id="terms_condition">
                  If you have read and agree to the <a href="<?php echo base_url(); ?>seller/login/tac"" id="tac">Terms and Conditions,</a> please continue</label>
         <div id="errorterms" style="color:red; font-size: 13px;"></div> 
              </div>
        
              <input type="submit" class="btn btn-primary" value="Submit" onclick="if(!this.form.checkbox.checked){alert('You must agree to the Terms and Conditions first.');return false}">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  
  <!--banenr end here --> 
  
 

<script>
  
  function sellerinfvalidateof()

{
  
var seller_fullname = document.getElementById('seller_fullname');

var seller_email=document.getElementById('seller_email');

var seller_mobile=document.getElementById('seller_mobile');

var seller_shop=document.getElementById('seller_shop');

var location_name=document.getElementById('location_name');

var seller_license=document.getElementById('seller_license');

var seller_adhar=document.getElementById('seller_adhar');

var seller_bank=document.getElementById('seller_bank');

var seller_address=document.getElementById('seller_address');

//var addres=document.getElementById('addres');
var terms_condition=document.getElementById('terms_condition');

// var phone_validation = /^(?=.*?[1-9])[0-9()-+]+$/ ;

var phone_validation = /^[789]\d{9}$/ ;

var name_reg=/^[^-\s][a-zA-Z_\s-]+$/;

var email_reg = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;

var adhar = /^\d{4}\d{4}\d{4}$/;
var bank = /^[a-zA-Z0-9]*$/;

var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");


if(seller_fullname.value!=""){

if (!name_reg.test(seller_fullname.value)) {
document.getElementById('errorname1').innerHTML="Name Accepts Characters Only";
$("#seller_fullname").focus();
return false;
} 
else{
  document.getElementById('errorname1').innerHTML="";
}
}
else{
document.getElementById('errorname1').innerHTML="Enter the Name";
$("#seller_fullname").focus();
return false;
}


if(seller_email.value!=""){

if (!email_reg.test(seller_email.value)) {
document.getElementById('erroremail').innerHTML="Invalid Email Format";
$("#seller_email").focus();
return false;
} 
else{
  document.getElementById('erroremail').innerHTML="";
}
}
else{
document.getElementById('erroremail').innerHTML="Enter the Email";
$("#seller_email").focus();
return false;
}

if(seller_mobile.value!=""){

if (!phone_validation.test(seller_mobile.value)) {
document.getElementById('errorphone').innerHTML="Invalid Phone Number";
$("#seller_mobile").focus();
return false;
} 
else{
  document.getElementById('errorphone').innerHTML="";
}
}
else{
document.getElementById('errorphone').innerHTML="Enter the Phone Number";
$("#seller_mobile").focus();
return false;
}


if(seller_shop.value!=""){

  document.getElementById('errorshop').innerHTML="";

}
else{
document.getElementById('errorshop').innerHTML="Enter the Shop Name";
$("#seller_shop").focus();
return false;
}

if(location_name.value!=""){

  document.getElementById('errorlocation').innerHTML="";

}
else{
document.getElementById('errorlocation').innerHTML="Select Loation";
$("#location_name").focus();
return false;
}


if(seller_license.value!=""){

  document.getElementById('errorlicense').innerHTML="";

}
else{
document.getElementById('errorlicense').innerHTML="Enter License Number";
$("#seller_license").focus();
return false;
}


if(seller_adhar.value!=""){

  if (!adhar.test(seller_adhar.value)) {
document.getElementById('erroradhar').innerHTML="Invalid Aadhar Number";
$("#seller_adhar").focus();
return false;
} 
else{
  document.getElementById('erroradhar').innerHTML="";
}


}
else{
document.getElementById('erroradhar').innerHTML="Enter Adhar Number";
$("#seller_adhar").focus();
return false;
}

if(seller_bank.value!=""){

  if (!bank.test(seller_bank.value)) {
document.getElementById('errorbank').innerHTML="Invalid Bank Account Number";
$("#seller_bank").focus();
return false;
} 
else{
    document.getElementById('errorbank').innerHTML="";

}


}
else{
document.getElementById('errorbank').innerHTML="Enter Bank Account Number";
$("#seller_bank").focus();
return false;
}


if(seller_address.value!=""){

  document.getElementById('erroraddress').innerHTML="";

}
else{
document.getElementById('erroraddress').innerHTML="Enter the Address";
$("#seller_address").focus();
return false;
}



if(!terms_condition.checked){



document.getElementById('errorterms').innerHTML="Accept Terms and Contitions";



return false; 



} 


}
</script>


