
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
<div class="" style="margin-top:8px;">
</div>
<body >
<div class="pad_bod">
		<div class="row">
		
		<?php //echo '<pre>';print_r($cart_items);exit; ?>
		<div class="container">
		<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-primary">
			<div class="panel-heading ">Change Password</div>
			
			<div class="panel-body">
			<div  style="padding:10px 15px;">
			<section>
        <div class="wizard">
                <div class="tab-content">
                    <?php if($this->session->flashdata('updatpassword')): ?>
				<div class="alt_cus"><div class="alert_msg1 animated slideInUp btn_suc"> <?php echo $this->session->flashdata('updatpassword');?>&nbsp; <i class="fa fa-check text-success ico_bac" aria-hidden="true"></i></div></div>


					<?php endif; ?>
					<?php if($this->session->flashdata('passworderror')): ?>
					<div class="alt_cus"><div class="alert_msg1 animated slideInUp btn_war"> <?php echo $this->session->flashdata('passworderror');?>&nbsp; <i class="fa fa-check  text-warning ico_bac" aria-hidden="true"></i></div></div>

					<?php endif; ?>
                   <form id="chanagepassword" name="chanagepassword" method="post" action="<?php echo base_url('customer/changepasswordpost');?>" class="form-horizontal" role="form">
                        <div class=" form-group">
                            <label class="control-label">Old Password</label>
                            <input type="password" class="form-control" id="oldpassword" name="oldpassword">
                        </div>
						<div class=" form-group">
                            <label class="control-label">New Password</label>
                            <input type="password" class="form-control" id="newpassword" name="newpassword">
                        </div>
                        <div  class=" form-group">
                           <label class="control-label">Confirm Password</label>
                            <input  type="password" class="form-control" id="confirmpassword" name="confirmpassword" >
                        </div>
                        <div style="margin-top:10px" class="form-group">
                            <!-- Button -->
                            <div class="col-sm-12 controls">
                                <button class="btn btn-lg btn-primary btn-block signup-btn" type="submit">
                                    Change password</button>

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
    $('#chanagepassword').bootstrapValidator({
       
        fields: {
            oldpassword: {
					validators: {
					notEmpty: {
						message: 'Old Password is required'
					},
					stringLength: {
                        min: 6,
                        message: 'Old Password must be atleast six character'
                    },
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~'"\\|=^?$%*)(_+-]*$/,
					message: 'Old Password wont allow <>[]'
					}
				}
			},
			newpassword: {
					validators: {
					notEmpty: {
						message: 'New Password is required'
					},
					stringLength: {
                        min: 6,
                        message: 'New Password must be at least six character'
                    },
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~'"\\|=^?$%*)(_+-]*$/,
					message: 'New Password wont allow <>[]'
					}
				}
			},
			confirmpassword: {
					 validators: {
                identical: {
                    field: 'newpassword',
                    message: 'The New password and its confirm Password are not the same'
                }
            }
			},
        }
    });
});
</script>