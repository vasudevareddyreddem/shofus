 <style>
 
 .add_button {
	border: 0 none;
	left: 440px;
	margin-left: 10px;
	margin-top: 10px;
	position: relative;
	top: -28px;
	vertical-align: text-bottom;
}
 .remove_button {
	border: 0 none;
	left: 440px;
	margin-left: 10px;
	margin-top: 10px;
	position: relative;
	top: -26px;
	vertical-align: text-bottom;
}
 </style>
 <script type="text/javascript">
$(document).ready(function(){
	var maxField = 10; //Input fields increment limitation
	var addButton = $('.add_button'); //Add button selector
	var wrapper = $('.field_wrapper'); //Input field wrapper
	var fieldHTML = '<div> <div class="clearfix"><div class="field_wrapper nopaddingRight col-md-13 san-lg" ><input type="file" class="form-control" name="report_file[]" value=""/><a href="javascript:void(0);" class="remove_button" title="Remove field"><img src="<?php echo site_url(); ?>assets/seller_admin/images/remove-icon.png"/></a></div></div></div>'; //New input field html 
	var x = 1; //Initial field counter is 1
	$(addButton).click(function(){ //Once add button is clicked
		if(x < maxField){ //Check maximum number of input fields
			x++; //Increment field counter
			$(wrapper).append(fieldHTML); // Add field html
		}
	});
	$(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
		e.preventDefault();
		$(this).parent('div').remove(); //Remove field html
		x--; //Decrement field counter
	});
});
</script>
 <div class="col-md-9">
   <!--body start here -->
  <div class="faq_main">
    <div class="container" style="width:100%">
      <h1 class="head_title">Personnel Details</h1>
	  <div><?php echo $this->session->flashdata('message');?></div>
      <div class="faq"> 
        
        <!--<h1 onclick="document.getElementById('gry').style.display='block'">GETTING STARTED</h1>-->
        <h1 data-toggle="collapse" data-target="#displaydetails">Display details</h1>
        <div class="demo"> 
          <!--<div id="gry" style="display:none">-->
          <div id="displaydetails" class="collapse">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
             
                  <div class="panel-body">

                      <section id="main-content">
    <section class="wrapper">
      <!--<div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-cutlery" aria-hidden="true"></i>Add <?php //echo $catname->category_name;?> Item Details</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="<?php //echo base_url();?>seller_admin/dashboard">Home</a></li>
            <li><i class="fa fa-cutlery" aria-hidden="true"></i><?php //echo $catname->category_name;?></li>
            <li><i class="fa fa-square-o"></i><?php //echo $subcatname->subcategory_name;?></li>
          </ol>
        </div>
      </div>-->
      <div class="row">
        <div class="col-lg-12">
          <section class="panel">
            <!--<header class="panel-heading"> Basic Forms </header>-->
			
            <div class="panel-body">
			
              <form action="<?php echo base_url(); ?>seller_admin/personnel_details/updatedisplaydetails" method="post" enctype="multipart/form-data" onSubmit="return scvalidateof();">
			  
               
				
				
             
				
				
                
				 <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">Business Name</label>
                  <input class="form-control" placeholder="Business Name" type="text" id="seller_business_name" name="seller_business_name" value="<?php echo $partsellerlocationdata->seller_business_name;   ?>">
				  <!--<span style="color:red" id="erroritemname"></span>-->
           </div>

           <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">Business Display Name</label>
                  <input class="form-control" placeholder="Business Display Name" type="text" id="seller_business_displayname" name="seller_business_displayname" value="<?php echo $partsellerlocationdata->seller_business_displayname;   ?>">
          <!--<span style="color:red" id="erroritemcode"></span>-->
           </div>

				<div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">Select Location</label>
                 <select class="form-control" id="seller_location" name="seller_location">
                    <option value="">Select Location</option>
					 <?php foreach($sellerlocationdata as $sellerlocation_data){ ?>
                    <option value="<?php echo $sellerlocation_data->location_name; ?>"><?php echo $sellerlocation_data->location_name; ?></option>
                   
					 <?php }?>
                  </select>
				 
				 <span style="color:red" id="errorcategory"></span>
                </div>
				<script type="text/javascript">

for(var i=0;i<document.getElementById('seller_location').length;i++)

{

if(document.getElementById('seller_location').options[i].value=="<?php echo $partsellerlocationdata->seller_location; ?>")

{

document.getElementById('seller_location').options[i].selected=true

}

}     

</script>
				 <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">Service time</label>
                  <input class="form-control" placeholder="Service time" type="text" name="seller_servicetime" id="seller_servicetime" value="<?php echo $partsellerlocationdata->seller_servicetime; ?>">
				  <!--<span style="color:red" id="errorcost"></span>-->
                </div>
                
                <div class="clearfix"></div>
				
				
				
               
				
                
				<div style="margin-top: 20px; margin-left: 15px;">
                <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
                <button type="submit" class="btn btn-danger" onclick="window.location='<?php echo base_url(); ?>seller_admin/personnel_details';return false;">Cancel</button>
				</div>
              </form>
            </div>
          </section>
        </div>
      </div>
      <!-- page start--> 
      <!-- page end--> 
    </section>
  </section>









				  </div>
             
            </div>
          </div>
          <!-- panel-group -->
          <h1 data-toggle="collapse" data-target="#personneldetails">Personnel details</h1>
          <div id="personneldetails" class="collapse">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                  <div class="panel-body">


                  <section id="main-content">
    <section class="wrapper">
      <!--<div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-cutlery" aria-hidden="true"></i>Add <?php //echo $catname->category_name;?> Item Details</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="<?php //echo base_url();?>seller_admin/dashboard">Home</a></li>
            <li><i class="fa fa-cutlery" aria-hidden="true"></i><?php //echo $catname->category_name;?></li>
            <li><i class="fa fa-square-o"></i><?php //echo $subcatname->subcategory_name;?></li>
          </ol>
        </div>
      </div>-->
      <div class="row">
        <div class="col-lg-12">
          <section class="panel">
            <!--<header class="panel-heading"> Basic Forms </header>-->
			
            <div class="panel-body">
			
              <form action="<?php echo base_url(); ?>seller_admin/personnel_details/updatepersonneldetails" method="post" enctype="multipart/form-data">
			  
               
				
				
             
				
				
                
				 <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">Name</label>
                  <input class="form-control" placeholder="Name" type="text" id="seller_name" name="seller_name" value="<?php echo $partsellerlocationdata->seller_name;   ?>" readonly>
				  <!--<span style="color:red" id="erroritemname"></span>-->
           </div>

           <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">Mobile Number</label>
                  <input class="form-control" placeholder="Mobile Number" type="text" id="seller_mobile" name="seller_mobile" value="<?php echo $partsellerlocationdata->seller_mobile;   ?>" readonly>
          <!--<span style="color:red" id="erroritemcode"></span>-->
           </div>
		   
		    <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">Email</label>
                  <input class="form-control" placeholder="Email" type="text" id="seller_email" name="seller_email" value="<?php echo $partsellerlocationdata->seller_email;   ?>" readonly> 
          <!--<span style="color:red" id="erroritemcode"></span>-->
           </div>

				
				 <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">Adhar Number</label>
                  <input class="form-control" placeholder="Adhar Number" type="text" name="seller_adhar" id="seller_adhar" value="<?php echo $partsellerlocationdata->seller_adhar; ?>">
				  <!--<span style="color:red" id="errorcost"></span>-->
                </div>
                
                <div class="clearfix"></div>
				
				
				
               
				
                
				<div style="margin-top: 20px; margin-left: 15px;">
                <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
                <button type="submit" class="btn btn-danger" onclick="window.location='<?php echo base_url(); ?>seller_admin/personnel_details';return false;">Cancel</button>
				</div>
              </form>
            </div>
          </section>
        </div>
      </div>
      <!-- page start--> 
      <!-- page end--> 
    </section>
  </section>


















				  </div>
            </div>
          </div>
          <h1 data-toggle="collapse" data-target="#businessdetails">Business details</h1>
          <div id="businessdetails" class="collapse">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
              
               
                
                  <div class="panel-body">


                  <section id="main-content">
    <section class="wrapper">
      <!--<div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-cutlery" aria-hidden="true"></i>Add <?php //echo $catname->category_name;?> Item Details</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="<?php //echo base_url();?>seller_admin/dashboard">Home</a></li>
            <li><i class="fa fa-cutlery" aria-hidden="true"></i><?php //echo $catname->category_name;?></li>
            <li><i class="fa fa-square-o"></i><?php //echo $subcatname->subcategory_name;?></li>
          </ol>
        </div>
      </div>-->
      <div class="row">
        <div class="col-lg-12">
          <section class="panel">
            <!--<header class="panel-heading"> Basic Forms </header>-->
			
            <div class="panel-body">
			
              <form action="<?php echo base_url(); ?>seller_admin/personnel_details/updatebusinessdetails" method="post" enctype="multipart/form-data">
			  
               
				
				
             
				
				
                
				 <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">Business Name</label>
                  <input class="form-control" placeholder="Name" type="text" id="seller_business_name" name="seller_business_name" value="<?php echo $partsellerlocationdata->seller_business_name;   ?>">
				  <!--<span style="color:red" id="erroritemname"></span>-->
           </div>

           <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">Type of Category</label>
                  <input class="form-control" placeholder="Type of Category" type="text" id="seller_type_category" name="seller_type_category" value="<?php echo $partsellerlocationdata->seller_type_category;   ?>">
          <!--<span style="color:red" id="erroritemcode"></span>-->
           </div>
		   
		    <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">TIN/VAT</label>
                  <input class="form-control" placeholder="TIN/VAT" type="text" id="seller_license" name="seller_license" value="<?php echo $partsellerlocationdata->seller_license;   ?>">
          <!--<span style="color:red" id="erroritemcode"></span>-->
           </div>

				
				 <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">TAN</label>
                  <input class="form-control" placeholder="TAN" type="text" name="seller_tan" id="seller_tan" value="<?php echo $partsellerlocationdata->seller_tan; ?>">
				  <!--<span style="color:red" id="errorcost"></span>-->
                </div>
				
				<div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">GSTIN</label>
                  <input class="form-control" placeholder="GSTIN" type="text" name="seller_gstin" id="seller_gstin" value="<?php echo $partsellerlocationdata->seller_gstin; ?>">
				  <!--<span style="color:red" id="errorcost"></span>-->
                </div>
                
                <div class="clearfix"></div>
				
				
				
               
				
                
				<div style="margin-top: 20px; margin-left: 15px;">
                <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
                <button type="submit" class="btn btn-danger" onclick="window.location='<?php echo base_url(); ?>seller_admin/personnel_details';return false;">Cancel</button>
				</div>
              </form>
            </div>
          </section>
        </div>
      </div>
      <!-- page start--> 
      <!-- page end--> 
    </section>
  </section>








				  </div>
           
          
              
    
            </div>
          </div>
          <h1 data-toggle="collapse" data-target="#bankdetails">Bank details</h1>
          <div id="bankdetails" class="collapse">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            
                
                  <div class="panel-body">
				  
				    <section id="main-content">
    <section class="wrapper">
      <!--<div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-cutlery" aria-hidden="true"></i>Add <?php //echo $catname->category_name;?> Item Details</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="<?php //echo base_url();?>seller_admin/dashboard">Home</a></li>
            <li><i class="fa fa-cutlery" aria-hidden="true"></i><?php //echo $catname->category_name;?></li>
            <li><i class="fa fa-square-o"></i><?php //echo $subcatname->subcategory_name;?></li>
          </ol>
        </div>
      </div>-->
      <div class="row">
        <div class="col-lg-12">
          <section class="panel">
            <!--<header class="panel-heading"> Basic Forms </header>-->
			
            <div class="panel-body">
			
              <form action="<?php echo base_url(); ?>seller_admin/personnel_details/updatebankdetails" method="post" enctype="multipart/form-data">
			  
               
				
				
             
				
				
                
				 <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">Bank Account Number</label>
                  <input class="form-control" placeholder="Bank Account Number" type="text" id="seller_bank" name="seller_bank" value="<?php echo $partsellerlocationdata->seller_bank;   ?>">
				  <!--<span style="color:red" id="erroritemname"></span>-->
           </div>

           <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">Personnel PAN</label>
                  <input class="form-control" placeholder="Personnel PAN" type="text" id="seller_pan" name="seller_pan" value="<?php echo $partsellerlocationdata->seller_pan;   ?>">
          <!--<span style="color:red" id="erroritemcode"></span>-->
           </div>
		   
		    <div class="field_wrapper nopaddingRight col-md-6 san-lg" >
                  <label for="exampleInputEmail1">KYC Documents</label>
                  <input class="form-control" type="file" name="report_file[]">
          <!--<span style="color:red" id="erroritemcode"></span>-->
		  <span><a href="javascript:void(0);" class="add_button" title="Add field"> <img src="<?php echo site_url(); ?>assets/seller_admin/images/add-icon.png"> </a></span>
           </div>

                <div class="clearfix"></div>
				
				
				
               
				
                
				<div style="margin-top: 20px; margin-left: 15px;">
                <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
                <button type="submit" class="btn btn-danger" onclick="window.location='<?php echo base_url(); ?>seller_admin/personnel_details';return false;">Cancel</button>
				</div>
              </form>
            </div>
          </section>
        </div>
      </div>
      <!-- page start--> 
      <!-- page end--> 
    </section>
  </section>
				  
				  
				  
				  
				  
				  
				  
				  
				  
				  
				  
				  
				  
				  
				  
				  
				  
				  
				  
				  
				  </div>
                
             
  
              
            </div>
          </div>
          
         
        </div>
        <!-- container --> 
        
      </div>
    </div>
  </div>
  
  </div>
  </div>
   </div>
   </div>
   
  <!--body end here -->