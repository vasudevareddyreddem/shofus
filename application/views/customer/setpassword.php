
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
		<div class="container">
		<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-primary">
			<div class="panel-heading ">Set Password</div>
			<div class="panel-body">
			<div  style="padding:10px 15px;">
			<section>
        <div class="wizard">           
                <div class="tab-content">     
                <input type="hidden" id="cust_id" name="cust_id" value="<?php echo $cust_id; ?>">
			<input type="hidden" id="email" name="email" value="<?php echo $email; ?>">               
					<?php if($this->session->flashdata('passworderror')): ?>
					<div class="alert dark alert-warning alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button><?php echo $this->session->flashdata('passworderror');?></div>	
					<?php endif; ?>
					<?php if(validation_errors()):?>
					<!-- <div class="alert dark alert-warning alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button><?php echo validation_errors(); ?></div> -->	
				<?php  endif;?>
                   <form id="chanagepassword" name="chanagepassword" method="post" action="<?php echo base_url('customer/set_password');?>" class="form-horizontal" role="form">
						<div class=" form-group">
                            <label class="control-label">New Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div  class=" form-group">
                           <label class="control-label">Confirm Password</label>
                            <input  type="password" class="form-control" id="confirmpassword" name="confirmpassword" >
                        </div>
                        <div style="margin-top:10px" class="form-group">
                            <!-- Button -->
                            <div class="col-sm-12 controls">
                                <button class="btn btn-lg btn-primary btn-block signup-btn" type="submit">
                                    Set password</button>
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
          
			password: {
					validators: {
					notEmpty: {
						message: 'New Password is required'
					},
					stringLength: {
                        min: 6,
                        message: 'New Password  must be greater than 6 characters'
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