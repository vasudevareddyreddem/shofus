 
<style>
.navbar-nav>li>a{
	padding:0px;
}
.navbar-nav {
    float: left;
    margin: 0;
    padding-top: 12px;
}
.main-header .logo .logo-lg img {
    height: 42px;
    margin-right: 70px;
}
</style>
<head>
<link href="<?php echo base_url(); ?>assets/seller/dist/css/app.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/seller/dist/css/bootstrap-tagsinput.css" rel="stylesheet" type="text/css"/>
</head>

  <body class="hold-transition sidebar-mini " >
        <!-- Site wrapper -->
        
            <header class="main-header hm_nav" style="position: fixed;top:0px;width:100%; ">
                <a href="<?php echo base_url('seller/dashboard');?>" class="logo"> <!-- Logo -->
                    <span class="logo-mini">
                        <!--<b>A</b>H-admin-->
                        <img src="<?php echo base_url(); ?>assets/seller/dist/img/mini-logo.png" alt="CIH">
                    </span>
                    <span class="logo-lg">                        
                        <img src="<?php echo base_url(); ?>assets/seller/dist/img/logo.png" alt="Cart In Hour">
                    </span>
                </a>
                <!-- Header Navbar -->
                <nav class="navbar navbar-static-top ">
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <!-- Sidebar toggle button-->
                        <span class="sr-only">Toggle navigation</span>
                        <span class="fa fa-tasks"></span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">                            
												<!-- order notifications -->
								<li class="pad_l50">
								<ul class="nav navbar-nav pad_li">  
								
								<li class="active"><a href="<?php echo base_url('seller/dashboard');?>">Home</a></li>
								
								<!--<li><a href="<?php echo base_url();?>seller/aboutus">About Us</a></li>-->
							   <li><a href="<?php echo base_url();?>seller/faqs">FAQ's</a></li>
                 
							    <li><a href="<?php echo base_url();?>seller/products/create" class="pull-right">Add Listing</a>  </li>
                  
								<!--<li><a href="#">Help</a></li>-->
								<li><a href="<?php echo base_url();?>seller/contactus">Contact Us</a></li>
								</ul>
								
                            <!-- Admin Notifications -->
                            <li class="dropdown notifications-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="pe-7s-bell"></i>
                                    <span class="label label-warning"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header"><i class="fa fa-bell"></i>Admin Notifications</li>
                                    <li>
                                        <ul class="menu">
                                        <?php foreach($sellernotify as $cat_data){ ?>
                                            <li>
                                            <a href="#" class="border-gray"><i class="fa fa-inbox"></i><?php  echo $cat_data->message; ?> <span class=" label-success label label-default pull-right">ADMIN</span></a></li>  <?php } ?>                                           
                                        </ul>
                                    </li>
                                   <li class="footer">
                                   <a href="#"> See all Notifications <i class=" fa fa-arrow-right"></i></a>
                                    </li>
                                </ul>
                            </li>


                            <!-- user -->
                            <li class="dropdown dropdown-user admin-user">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php foreach($profiles as $profile){ ?>
                                <?php if($profile['profile_pic'] == "") {  ?>
                                <div class="user-image">
                                <img src="<?php echo base_url();?>uploads/profile/default.jpg" class="img-circle" height="40" width="40" alt="User Image">
                                </div>
                          <?php } else {?>
                          <div class="user-image">
                                <img src="<?php echo base_url();?>uploads/profile/<?php  echo $profile['profile_pic']; ?>" class="img-circle" height="40" width="40" alt="User Image">
                                </div>
                                <?php } ?>
                                <?php } ?>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo base_url();?>seller/personnel_details"><i class="fa fa-users"></i> Update Profile</a></li>
                                    <li><a href="<?php echo base_url();?>seller/user_profile"><i class="fa fa-gear"></i> User Profile</a></li>
                                    <!-- <li><a href="<?php echo base_url();?>seller/user_profile/profile_pic"><i class="fa fa-picture-o"></i> Change ProfilePic</a></li> --> 
                                    <li><a href="<?php echo base_url() ; ?>seller/login/logout"><i class="fa fa-sign-out"></i> Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
    </body>
	<div class="modal animated  zoomIn" id="myModal_ser" role="dialog">
    <div class="modal-dialog modal-lg " style="width: 1200px;">
    
      <!-- Modal content-->
     <div class="modal-content"  >
   
        <div class="modal-body" style="padding:0px;margin-top:-22px;">
		<span type="button" class="close " data-dismiss="modal" style="position:absolute;top:12px;right:12px">&times;</span>
		<img style="width:100%;" class="img-responsive" src="<?php echo base_url();?>assets/seller_login/images/price_hide.png" />
		<div style="position: absolute;top:50%;color:#ddd;right:36%; background:#ed4916;border-radius:5px;padding:15px;">
			<p style="font-size:30px;"><b>Limited period offer</b></p>		
			<p style="font-size:20px;margin-left:72px;">Free for 1 month</p>		<br>
			<span id="bntt" style="background:#006a99;padding:5px 10px ;border-radius:5px;font-size:18px;margin-left: 85px;cursor: pointer;" class="" data-dismiss="modal"  data-toggle="modal"
			data-target="#myModal_sel_mod_en">Enquiry form</span>
		</div>
     
</div>
        </div>
        
      </div>
      
    </div>
	<!--Just fill form to Select plan modal -->
  <div class="modal fade" id="myModal_sel_mod_en" role="dialog">
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
                
<div class=" orm-horizontal" >
  <div class="form-group">
      <label class="control-label col-sm-4" for="">Mobile Number</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" maxlength="10" id="phone_number" placeholder="Enter Mobile Number" name="Mobile_number" required>
	<span id="Emptyforregister"></span>     
	 </div>
	  
    </div> 
	  </br></br></br><div class="clearfix"></div>
  <div class="form-group">
      <label class="control-label col-sm-4" for="">Select Plan :</label>
      <div class="col-sm-8">   
      <div id="register-response"></div>
            
        <select class="form-control" id="plan" name="plan" required="required">
        <option>Select Plan</option>
        <option value="Both">Both</option>
        <option value="Inventory management">Inventory management</option>
        <option value="Catalog Management">Catalog Management</option>
      </select>
	  <div id="selecrpalnerror"></div> 
      </div>
	   
   </div>
  </br></br>
  
    <div class="form-group">        
      <div class="col-sm-offset-4 col-sm-8">
        <button  name="enquery_form" id="enquery_form" onclick="validation();" class="btn btn-primary" value="Send">Send</button>
      </div>
    </div>
	</div>
  
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
  <script type="text/javascript">
  function IsLcemail(reasontype) {
        var regex = /^[0-9]{10}$/;
        return regex.test(reasontype);
		}
  function validation(){
	  var mobile = $("#phone_number").val();
	  if(mobile==''){
		$("#Emptyforregister").html("Please Enter Mobile Number").css("color", "red");
		$("#phone_number").focus();
		return false;
	  }else {
		  $("#Emptyforregister").html("");
		 }
	  if(mobile!=''){
		  var lcemail = document.getElementById('phone_number').value;
		if (!IsLcemail(lcemail)) {
			$("#Emptyforregister").html("Please Enter Correct Mobile Number").css("color", "red");
			jQuery('#seller_mobile').focus();
			return false;
			}else{
			$("#Emptyforregister").html("");	
			}
		}
		var plans = $("#plan").val();
		if(plans=="Select Plan"){
			$("#selecrpalnerror").html("Please Select a Plan").css("color", "red");
			return false;
		}else{
			$("#selecrpalnerror").html("");
		} 
		$.ajax({
			type: "POST",
			url: '<?php echo base_url('seller/services/details'); ?>',
			data: {phone_number:mobile,plan:plans},
				success:function(data)
				{
						  //alert(data);
						if(data == 0)
						{
					   $("#Emptyforregister").html("The Phone Number you entered already exist..").css("color", "red");
						 $('#enquery_form')[0].reset(); 
						}
						else if(data == 1)
						{
							$("#Emptyforregister").html("Success..").css("color", "green");
						document.location.href='<?php echo base_url('seller/services'); ?>'; 
					 }
				},
    });
	  
			 
  }
 
</script>
