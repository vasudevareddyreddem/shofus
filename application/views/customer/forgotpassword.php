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
	.mat-input {
    margin-top: 8px;
}
label {
    display: inline-block;
    max-width: 100%;
    margin-bottom: 15px;
    font-weight: 400;
}
</style>

<body class="log_bac">
    <div class="container mar_t10per" style="position:relative" >
        <div class="row res_log">
		<div class="col-md-6 col-md-offset-3 log_bac_col" >
           

            <div class="col-md-10 col-md-offset-1 " style="padding-bottom:20px;">
			<h3 class="">Forgot Password</h3>
			<hr>
				<?php if($this->session->flashdata('error')): ?>	
			<div class="alt_cus"><div class="alert_msg1 animated slideInUp btn_war"> <?php echo $this->session->flashdata('error');?>&nbsp; <i class="fa fa-check  text-warning ico_bac" aria-hidden="true"></i></div></div>

			<?php endif; ?>	
			<form action="<?php echo base_url('customer/forgotpasswordpost'); ?>" method="post" name="forgotpass" id="forgotpass">
			<div class="row">
                        <div class=" col-md-12">
							<div class="mat-div form-group">
								<label class="mat-label">Email ID / Mobile number</label>
								<input type="text" id="emailaddress" name="emailaddress" value="" class="mat-input"  />
							</div>
						</div>
                        
							
                    </div>
					<br>
				<div class="col-md-6 col-xs-6 ">
                    <button class="btn btn-block btn-primary signup-btn" type="submit" style="border-radius:5px">
                        Submit</button>
						</div>
                </form>
				<div class="col-md-6 col-xs-6  ">
				<a href="<?php echo base_url('customer'); ?>" class="btn  btn-primary  signup-btn btn-block" type="submit" style="border-radius:5px" >
                        Cancel</a>
						</div>
				<div class="clearfix">&nbsp;</div>
            </div>
            </div>
        </div>
		<a class="log_res_logo_for" href="<?php echo base_url(); ?>" >
			<img style="width:130px;" src="<?php echo base_url(); ?>assets/home/images/logo.png" />
		</a>
    </div>

</body>

</html>
<script type="text/javascript">

$(document).ready(function() {
    $('#forgotpass').bootstrapValidator({
       
        fields: {
            emailaddress: {
             validators: {
					notEmpty: {
						message: 'Email / Mobile is required'
					}
				}
            }
        }
    });
});
</script>
<script>
$(".mat-input").focus(function(){
  $(this).parent().addClass("is-active is-completed");
});

$(".mat-input").focusout(function(){
  if($(this).val() === "")
    $(this).parent().removeClass("is-completed");
  $(this).parent().removeClass("is-active");
})
</script>
