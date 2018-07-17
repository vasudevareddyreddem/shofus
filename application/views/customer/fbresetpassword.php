<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shofus</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/home/images/fav.ico">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/home/css/fonts.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/home/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/home/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/home/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/bootstrapValidator.css" />


    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/home/css/default.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/home/css/component.css" />
    <script src="<?php echo base_url(); ?>assets/home/js/jquery.js"></script>

    <script src="<?php echo base_url(); ?>assets/home/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/bootstrapValidator.js"></script>

</head>
<style>
    .mar_t10per {
        margin-top: 10%;
    }
    .form .form-control {
        margin-bottom: 10px;
    }
</style>

<body style="background-color:#d32134;">
    <div class="container mar_t10per" style="position:relative" >
        <div class="row ">
		<div class="col-md-6 col-md-offset-3" style="background-color:#fff; border-radius:10px;padding:10px 0px; ">
           

            <div class="col-md-10 col-md-offset-1 ">
			<h3 class="">Set Password</h3>
			<hr>
				<?php if($this->session->flashdata('error')): ?>	
			<div class="alt_cus"><div class="alert_msg animated slideInUp btn_war"> <?php echo $this->session->flashdata('error');?>&nbsp; <i class="fa fa-check  text-warning ico_bac" aria-hidden="true"></i></div></div>

			<?php endif; ?>	
			<form action="<?php echo base_url('customer/facebookresetpasswordpost'); ?>" method="post" name="resetpassword" id="resetpassword">
			<div class="row">
			<input type="hidden" id="cust_id" name="cust_id" value="<?php echo $cust_id; ?>">
			<input type="hidden" id="email" name="email" value="<?php echo $cust_email; ?>">
                        <div class=" col-md-12">
							<div class="form-group">
								<label class="control-label">New Password</label>
								<input type="password" id="otp" name="newpassword" value="" class="form-control" placeholder="" />
							</div>
						</div>
						<div class=" col-md-12">
							<div class="form-group">
								<label class="control-label">Confirm Password</label>
								<input type="password" id="confirmpassword" name="confirmpassword" value="" class="form-control" placeholder="" />
							</div>
						</div>
                        
							
                    </div>
					<a class="btn  btn-primary "  href="<?php echo base_url('customer');?>">Cancel</a>
                    <button class="btn  btn-primary " type="submit">
                        Submit</button>
                </form>

            </div>
            </div>
        </div>
		<a  href="<?php echo base_url(); ?>" class="" style="position: absolute;top:-100px;right:43%">
			<img src="<?php echo base_url(); ?>assets/home/images/logo_login.png" />
		</a>
    </div>

</body>

</html>
	<script type="text/javascript">

$(document).ready(function() {
    $('#resetpassword').bootstrapValidator({
       
        fields: {
            newpassword: {
					validators: {
					notEmpty: {
						message: 'New password is required'
					},
					stringLength: {
                        min: 6,
                        message: 'New Password must be atleast six character'
                    },
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~'"\\|=^?$%*)(_+-]*$/,
					message: 'New password wont allow <>[]'
					}
				}
			},
			confirmpassword: {
					validators: {
					identical: {
						field: 'newpassword',
						message: 'New password and confirm Password do not match'
					}
				}
			},
        }
    });
});
</script>
