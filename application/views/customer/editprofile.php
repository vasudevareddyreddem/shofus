
<style>
.panel-title > a:before {
    float: left !important;
    font-family: FontAwesome;
    content:"\f1db";
    padding-right: 5px;
}

.panel-title > a:hover, 
.panel-title > a:active, 
.panel-title > a:focus  {
    text-decoration:none;
}
</style>
<header>
<!--wrapper start here -->

<div class="wrapper"> 
  <!--header part start here -->
  <div class="jain_container">
    

</header>
<div class="" style="margin-top:130px;">
	
</div>
<body >
<div class="pad_bod">
		<div class="row">
		
		<?php //echo '<pre>';print_r($cart_items);exit; ?>
		<div class="container">
		<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-primary">
			<div class="panel-heading ">Update profile</div>
			
			<div class="panel-body">
			<div  style="padding:10px 15px;">
			<section>
        <div class="wizard">
           <?php //echo '<pre>';print_r($profile_details);exit; ?>
                <div class="tab-content">
                   
					<?php if($this->session->flashdata('errormsg')): ?>
					<div class="alert dark alert-warning alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button><?php echo $this->session->flashdata('errormsg');?></div>	
					<?php endif; ?>
                   <form id="editprofile" name="editprofile" method="post" action="<?php echo base_url('customer/updateprofilepost');?>" class="form-horizontal" enctype="multipart/form-data" role="form">
                        <div class=" form-group">
                            <label class="control-label">First Name</label>
                            <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $profile_details['cust_firstname']; ?>">
                        </div>
						<div class=" form-group">
                            <label class="control-label">Last Name</label>
                            <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $profile_details['cust_lastname']; ?>">
                        </div>

                        <div  class=" form-group">
                           <label class="control-label">Email Address</label>
                            <input id="email" type="text"  class="form-control"  name="email" value="<?php echo $profile_details['cust_email']; ?>" >
                        </div> 
						<div  class=" form-group">
                           <label class="control-label">Mobile</label>
                            <input id="mobile" type="text" class="form-control"  name="mobile" value="<?php echo $profile_details['cust_mobile']; ?>" >
                        </div> 
						<div  class=" form-group">
                           <label class="control-label">Address 1</label>
                            <input id="address1" type="text" class="form-control"  name="address1" value="<?php echo $profile_details['address1']; ?>" >
                        </div>
						<div  class=" form-group">
                           <label class="control-label">Address 2</label>
                            <input id="address2" type="text" class="form-control"  name="address2" value="<?php echo $profile_details['address2']; ?>" >
                        </div>
						<?php //echo '<pre>';print_r($profile_details); ?>
						<?php //echo '<pre>';print_r($locationdata);exit; ?>
						<div  class=" form-group">
							<label class="control-label">Delivery Location Area</label>
							<select class="form-control" id="area" name="area">
							<option>Select</option>
							
							<?php foreach($locationdata as $localarea){ ?>
							<?php if($profile_details['area']==$localarea['location_id']){

				?>
								<option value="<?php echo $localarea['location_id']; ?>" selected><?php echo $localarea['location_name']; ?></option>

							<?php }else{ ?>
							<option value="<?php echo $localarea['location_id']; ?>"><?php echo $localarea['location_name']; ?></option>

							<?php } ?>
								<?php } ?>
							</select>  
						</div>
						<div  class=" form-group">
                           <label class="control-label">Profile Pic</label>
                            <input id="profile" type="file" class="form-control"  name="profile" value="" >
                        </div>



                        <div style="margin-top:10px" class="form-group">
                            <!-- Button -->

                            <div class="col-sm-12 controls">
                                <button class="btn btn-lg btn-primary btn-block signup-btn" type="submit"> Update</button>

                            </div>
                        </div>
				</form>
                
                </div>
          
        </div>
    </section>
	   </div>
	   </div>
	   </div>
	   </div>
	   </div>
	   
	   </div>
	   </div>
	</div>

	<script type="text/javascript">

$(document).ready(function() {
    $('#editprofile').bootstrapValidator({
       
        fields: {
            fname: {
              validators: {
					notEmpty: {
						message: 'Last Name is required'
					},
                   regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: ' Last Name can only consist of alphanumaric, space and dot'
					}
                }
            },
			lname: {
              validators: {
					notEmpty: {
						message: 'Last Name is required'
					},
                   regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: ' Last Name can only consist of alphanumaric, space and dot'
					}
                }
            },
			
			email: {
             validators: {
					notEmpty: {
						message: 'Email is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
					message: 'Please enter a valid email address. For example johndoe@domain.com.'
					}
				}
            },
			mobile: {
              validators: {
					 notEmpty: {
						message: 'Mobile Number is required'
					},
                    regexp: {
					regexp:  /^[0-9]{10}$/,
					message:'Mobile Number must be 10 digits'
					}
                }
            },
			area: {
              validators: {
					notEmpty: {
						message: 'Please select an area'
					}
                }
            },
			address1: {
				validators: {
					notEmpty: {
						message: 'Address1 is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message: 'Address1 wont allow <> [] = % '
					}
				
				}
			},
			address2: {
				validators: {
					
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message: 'Address2 wont allow <> [] = % '
					}
				
				}
			},
			profile: {
				validators: {
					  
					regexp: {
					regexp: /\.(jpe?g|png|gif)$/i,
					message: 'Uploaded file is not a valid image. Only JPG, PNG and GIF files are allowed'
					}
				}
			},
        }
    });
});
</script>