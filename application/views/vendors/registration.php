<section id="aa-myaccount">
  
  <div><?php echo $this->session->flashdata('message');?></div>
  <div class="container" style="margin-top:10px;">

    <form class="well form-horizontal" action="<?php echo base_url(); ?>vendors/insert"  enctype="multipart/form-data" method="post"  id="vendor_reg_form">
<fieldset>

<!-- Form Name -->
<legend>Vendor/Supplier Registration</legend>

<!-- Text input-->
<h5>Company Details</h5>
<div class="form-group col-md-4">
 <label>Name of Company/Vendor  </label>
   
    <input  name="company_name"  data-validation="required"  placeholder="Name of Company/Vendor" class="form-control"  type="text">
    
  </div>
  <div class="form-group col-md-4">

   <label>Registration Number  </label>
   
  <input name="registration_no" data-validation="required"  id="registration_no"  placeholder="Registration No." class="form-control"  type="text">
   
  </div>
  <div class="form-group col-md-4">
  <label>Company Type  </label>
    <select name="company_type"  data-validation="required"  class="form-control selectpicker" >
      <option value=" " >Please select Company Type</option>
      <option value=="Alabama">Alabama</option>
      <option value=="Wisconsin" >Wisconsin</option>
      <option value=="Wyoming"  >Wyoming</option>
    </select>
    

</div>

<!-- Text input-->

<div class="form-group col-md-4">
<label>Business Name</label>
  <input name="business_name" data-validation="required" placeholder="Website Name" class="form-control" type="text">
</div>

<div class="form-group col-md-4">
<label>Vat reg no</label>
  <input name="vat_regno" data-validation="required" placeholder="Vat reg no" class="form-control" type="text">
</div>

<div class="form-group col-md-4">
<label>Labour licence</label>
  <input name="labour_licence" data-validation="required" placeholder="Labour licence" class="form-control" type="text">   
</div>



<div class="form-group col-md-4">
<label>Company Website/Domain Name  </label>

  <input name="company_website" data-validation="required" placeholder="Website or domain name" class="form-control" type="text">
    
</div>

<div class="col-md-4 form-group">

 <label>Type of Business  </label>
   
    <select name="business_type" data-validation="required" class="form-control selectpicker" >
      <option value=" " >Select Tyoe of Business </option>
              <option value="Dealership">Dealership</option>
    <option value="Auth.Agency">Auth.Agency</option>
    <option value="Franchisee Partner">Franchisee Partner</option>
	 <option value="Whole Seller">Whole Seller</option>
	  <option value="Retailer">Retailer</option>

    </select>
  


</div>
<div class="col-md-4 form-group">
<label>Business Proofs Like Vat/Trade Licence Etc.</label>
<input name="image" data-validation="size required" 
		 
		 data-validation-max-size="3M" 
		 data-validation-error-msg-required="No image selected" type="file">
</div>





<div class="col-md-12 form-group" style="height:90px;">
<label>About Business  </label>
<textarea name="about_business" rows="1" class="form-control" data-validation="required" 
		 ></textarea>
</div>

<div class="clearfix"></div>
<h5>Contact Details</h5>

<div class="col-md-4 form-group">
  <label>Contact Person Name </label> 
  <input name="person_name" data-validation="required" placeholder="Contact person name" class="form-control"  type="text">
    
  </div>


<div class="col-md-4 form-group">
 <label>E-Mail Address  </label>   
  <input name="vendor_email" data-validation="email" placeholder="E-Mail Address" class="form-control"  type="email">
   
  </div>
  <div class="col-md-4 form-group">
 <label>Mobile Number  </label>
  <input name="phone" data-validation="required" placeholder="Mobile number" class="form-control" type="number">
</div>

<div class="col-md-4 form-group">
 <label> Address  </label> 
  <input name="address" data-validation="required" placeholder="Address" class="form-control" type="text">
    

</div>
<!-- Text input-->
<div class="col-md-4 form-group">
<label> City  </label>
   <input name="city" placeholder="city" data-validation="required" class="form-control"  type="text">

</div>
    
<!-- Text input-->
<div class="col-md-4 form-group">
<label> Pincode  </label>
 <input name="company_pin" placeholder="Pincode" data-validation="required" class="form-control"  type="number">
</div>

<div class="form-group col-md-4">
<label>Pan no</label>
  <input name="pan_no" data-validation="required" placeholder="Pan Number" class="form-control" type="text">
</div>

<div class="form-group col-md-4">
<label>Profile pic</label>
  <input name="profile_pic" data-validation="required" type="file">
</div>

<!-- Text input-->
    
<!-- Text input-->

<!-- Select Basic -->
   
<!-- Text input-->

<div class="form-group col-md-4">
<label> Country  </label>

    <input data-validation="country" class="form-control" name="user_country" type="text">
  </div>

<!-- Text input-->
<!-- radio checks -->
<!-- <div class="form-group">
                        <label class="col-md-4 control-label">Do you have hosting?</label>
                        <div class="col-md-4">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="hosting" value="yes" /> Yes
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="hosting" value="no" /> No
                                </label>
                            </div>
                        </div>
                    </div>-->
<!-- Text area -->
<!-- Success message -->
<!-- Button -->
<div class="clearfix"></div>
<h5>Bank Details</h5>

<div class="col-md-4 form-group">
  <label>A/C Number </label> 
  <input name="acc_num" data-validation="required" placeholder="A/C Number" class="form-control"  type="text">
  </div>

<div class="col-md-4 form-group">
 <label>IFSC Code</label>   
  <input name="ifsc_code" data-validation="requireds" placeholder="IFSC Code" class="form-control"  type="text">
  </div>

<div class="col-md-4 form-group">
 <label>Branch Name</label>
  <input name="branch_name" data-validation="required" placeholder="Branch Namess" class="form-control" type="text">
</div>

<div class="col-md-4 form-group">
 <label>Account Name</label>
  <input name="acc_name" data-validation="required" placeholder="Account Names" class="form-control" type="text">
</div>

<div class="col-md-4 form-group">
 <label>Branch Address</label>
  <input name="branch_address" data-validation="required" placeholder="Branch Addressss" class="form-control" type="text">
</div>

<div class="col-md-12 form-group">
<div class="col-md-6">
 
      <button type="submit" class="btn btn-warning pull-right" >Submit <span class="glyphicon glyphicon-send"></span></button>
</div> 
</div>

</fieldset>
</form>
</div>
    </div><!-- /.container -->
</section>
</div>
<style>
.form-bottom input[type="text"], .form-bottom input[type="password"], .form-bottom textarea, .form-bottom textarea.form-control {
    box-shadow: none;
    color: #888888;
	background:white;
	border:1px solid 888888 !important;
    
    font-weight: 300;
    height: 36px;
    line-height: 50px;
    margin: 0;
    padding: 0 10px;
    transition: all 0.3s ease 0s;
    vertical-align: middle;
}
.form-group {
    margin-bottom: 0 !important;
	
	height:78px;
}
.form-control{
	width:95%;


}
</style>
<!-- / Cart view section --> 

