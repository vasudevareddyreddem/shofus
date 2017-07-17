<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>::CART IN HOUR::</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/home/images/fav.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700" rel="stylesheet">
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

<body style="background-color:#f59171;">
    <div class="container mar_t10per" style="position:relative" >
        <div class="row ">
		<div class="col-md-6 col-md-offset-3" style="background-color:#fff; border-radius:10px;padding:10px 0px; ">
           

            <div class="col-md-10 col-md-offset-1 ">
			<h3 class="">Forget Password</h3>
			<hr>
				<?php if($this->session->flashdata('error')): ?>	
			<div class="alert dark alert-warning alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button><?php echo $this->session->flashdata('error');?></div>
			<?php endif; ?>	
			<form action="<?php echo base_url('admin/login/changepassword'); ?>" method="post" name="forgotpass" id="forgotpass">
			 <input type="hidden" name="email" id="email" value="<?php echo $email; ?>">
			  <input type="hidden" name="userid" id="userid" value="<?php echo $userid; ?>">
			<div class="row">
                        <div class=" col-md-12">
							<div class="form-group">
								<label class="control-label">New Password</label>
								<input type="password" id="npassword" name="npassword" value="" class="form-control" />
							</div>
						</div> 
						<div class=" col-md-12">
							<div class="form-group">
								<label class="control-label">Confirm Password</label>
								<input type="password" id="cpassword" name="cpassword" value="" class="form-control"  />
							</div>
						</div>
                        
							
                    </div>

                    <button class="btn btn-lg  btn-block signup-btn" style="background-color:#c33c12;color:#fff;" type="submit">
                        Submit</button>
                </form>
				<a  href="<?php echo base_url('admin/login'); ?>"class="btn btn-lg  btn-block signup-btn" style="background-color:#c33c12;color:#fff;" type="submit">
                  Cancel</a>

            </div>
            </div>
        </div>
		<a  href="<?php echo base_url(); ?>" class="" style="position: absolute;top:-100px;right:43%">
			<img src="<?php echo base_url(); ?>assets/images/inv_logo.png" />
		</a>
    </div>

</body>

</html>
<script type="text/javascript">
$(document).ready(function() {
    $('#forgotpass').bootstrapValidator({
       
        fields: {
			        npassword: {
					validators: {
					notEmpty: {
						message: 'New Password is required'
					},
					stringLength: {
                        min: 6,
                        message: 'New Password  must be atleast 6 characters'
                    },
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~'"\\|=^?$%*)(_+-]*$/,
					message: 'New Password wont allow <>[]'
					}
				}
        },
		 cpassword: {
          validators: {
                identical: {
                    field: 'npassword',
                    message: 'New password and confirm Password do not match'
                }
            }
        }
            
		
        }
    });
});
</script>
