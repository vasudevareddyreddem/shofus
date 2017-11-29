<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cart In Hours::</title>
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
        margin-top: 9%;
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

<body class="log_bac" >
    <div class="container mar_t10per" style="position:relative" >
        <div class="row res_log" >
		<div class="col-md-10 col-md-offset-1 log_bac_col">
            <div class="col-md-6 bor_ri1" >
			<div class="" style="padding:0px 15px;">
			<h3 class="text-center">Sign in</h3>
			<hr>
			
			<?php if(isset($_GET['social']) && $_GET['social']='error'){ ?>
					<div class="alt_cus"><div class="alert_msg1 animated slideInUp btn_war"> You cancelled social login. please try again&nbsp; <i class="fa fa-check  text-warning ico_bac" aria-hidden="true"></i></div></div>

			<?php } ?>
                <div id="loginbox" class="mainbox ">
					<?php if($this->session->flashdata('loginerror')): ?>	
				<div class="alt_cus"><div class="alert_msg1 animated slideInUp btn_war"> <?php echo $this->session->flashdata('loginerror');?>&nbsp; <i class="fa fa-check  text-warning ico_bac" aria-hidden="true"></i></div></div>

			<?php endif; ?>	
			<?php if($this->session->flashdata('forsuccess')): ?>
							<div class="alt_cus"><div class="alert_msg1 animated slideInUp btn_war"> <?php echo $this->session->flashdata('forsuccess');?>&nbsp; <i class="fa fa-check  text-warning ico_bac" aria-hidden="true"></i></div></div>

			<?php endif; ?>
                    <form id="loginform" name="loginform" method="post" action="<?php echo base_url('customer/loginpost');?>" class="form-horizontal" role="form">
                        <div class=" mat-div form-group">
                            <label class="mat-label">Email id / Mobile Number</label>
                            <input type="text" class="mat-input" id="email" name="email"   value="<?php echo isset($username)?$username:''; ?>">
                        </div>

                        <div  class="mat-div form-group">
                           <label class="mat-label">Password</label>
                            <input id="password" type="password" class=" mat-input " name="password" value="<?php echo isset($password)?$password:''; ?>">
                        </div>

                        <div class="">
                            <div class="checkbox pull-left">
                                <label>
								<?php if(isset($remember) && $remember!=''){ ?>
                                    <input  id="login-remember" type="checkbox" checked="checked" name="remember" value="1"><span class="fo_forg"> Remember me</span>
								<?php } else{ ?>
								          <input  id="login-remember" type="checkbox" name="remember" value="1"> <span class="fo_forg">Remember me</span>

								<?php } ?>
                                </label>
                            </div>
							<div class="pull-right">
                                <p class="mar_t8">
                                    <a class="forg_pas fo_forg" href="<?php echo base_url('customer/forgotpassword');?>" >Forgot Password?</a>
                                </p>
                            </div>
                        </div>


                        <div class="log_mar_t10"  class="form-group">
                            <!-- Button -->

                            <div class="col-sm-12  "> &nbsp; </div>
                                <button class="btn  btn-primary btn-block signup-btn " type="submit">
                                    Login</button>

                          
                        </div>
										  
				<!--<div class="or-text">
					<div class="or-text-row">
						<div class="or-text-line">
							<button type="button" class="btn btn-default btn-circle" disabled="disabled">or</button>
						</div>
					</div>
				</div>
				<div class="row">	
					<div class="col-sm-5">
						<div class="btn-group">
							<a href="<?php echo base_url('hauth/login/Facebook'); ?>" type="button" class="btn btn-primary_org"><i class="fa fa-facebook"></i>Sign in with Facebook</a>
						</div>
					</div>
					<div class="col-sm-1">&nbsp;</div>
					<div class="col-sm-5">
						<div class="btn-group">
							<a  href="<?php echo base_url('hauth/login/LinkedIn'); ?>" type="button" class="btn btn-danger"><i class="fa fa-linkedin" aria-hidden="true"></i></i>Sign in with linkedin</a>
						</div>
					</div>
					
					
				</div>_-->
				</form>
  


                </div>

            </div>
            </div>



            <div class="col-md-6 ">
			<h3 class="text-center">Sign up</h3>
			<hr>
			<?php if($this->session->flashdata('addcus')): ?>
						<div class="alt_cus"><div class="alert_msg1 animated slideInUp btn_suc"> <?php echo $this->session->flashdata('addcus');?>&nbsp; <i class="fa fa-check text-success ico_bac" aria-hidden="true"></i></div></div>

			<?php endif; ?>
			<?php if($this->session->flashdata('error')): ?>	
							<div class="alt_cus"><div class="alert_msg1 animated slideInUp btn_war"> <?php echo $this->session->flashdata('error');?>&nbsp; <i class="fa fa-check  text-warning ico_bac" aria-hidden="true"></i></div></div>

			<?php endif; ?>
			
			<?php 
			$registervalues=$this->session->userdata('registervalues');
			//echo '<pre>';print_r($registervalues);exit; ?>
				<form id="customerregister" name="customerregister" action="<?php echo base_url('customer/registerpost');?>" method="post" accept-charset="utf-8" class="form" role="form" style="padding:0px 15px;">

                    <div class="row">
                        <div class="col-xs-6 col-md-6">
						<div class="mat-div form-group">
							<label class="mat-label">First Name</label>
                            <input type="text" id="firstname" name="firstname" value="<?php echo isset($registervalues['firstname'])?$registervalues['firstname']:'' ; ?>" class="mat-input" />
							</div>
							</div>
                        <div class="col-xs-6 col-md-6">
							<div class="mat-div form-group">
							<label class="mat-label">Last Name</label>
							<input type="text" id="lastname" name="lastname" value="<?php echo isset($registervalues['lastname'])?$registervalues['lastname']:'' ; ?>" class="mat-input"  />
							</div> 
							</div>
							
                    </div>
					<div class=" mat-div form-group">
					<label class="mat-label">Email Address</label>
					<input type="text" id="email" name="email" value="<?php echo isset($registervalues['email'])?$registervalues['email']:'' ; ?>" class="mat-input"  />
					</div>
					<div class=" mat-div form-group">
					<label class="mat-label">Mobile Number</label>
					<input type="text" id="mobile" name="mobile" value="<?php echo isset($registervalues['mobile'])?$registervalues['mobile']:'' ; ?>" class="mat-input" />
					</div>         
					<div class="mat-div form-group">
					<label class="mat-label">Password</label>
                    <input type="password" id="password" name="password" value="" class="mat-input"  />
					</div>
					<div class="mat-div form-group">
					<label class="mat-label">Confirm Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" value="" class="mat-input"  />
					</div>
					<div class="row">
					<div>

                    <button class="btn  btn-primary btn-block signup-btn" type="submit">
                        Create my account</button>
                </form>

            </div>
            </div>
        </div>
		<a class="log_res_logo"  href="<?php echo base_url(); ?>" >
			<img src="<?php echo base_url(); ?>assets/home/images/logo_login.png" />
		</a>
    </div>

</body>

</html>
	<script type="text/javascript">
	$(".alert_msg1").fadeOut(5000);
$(document).ready(function() {
    $('#customerregister').bootstrapValidator({
       
        fields: {
            
             firstname: {
              validators: {
					notEmpty: {
						message: 'First Name is required'
					},
                   regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: ' Last Name can only consist of alphanumaric, space and dot'
					}
                }
            },
			lastname: {
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
			password: {
					validators: {
					notEmpty: {
						message: 'Password is required'
					},
					stringLength: {
                        min: 6,
                        message: 'Password  must be at least 6 characters'
                    },
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~'"\\|=^?$%*)(_+-]*$/,
					message: 'Password wont allow <>[]'
					}
				}
			},
			confirm_password: {
					 validators: {
                identical: {
                    field: 'password',
                    message: 'password and confirm Password do not match'
                }
            }
			}
        }
    });
});

$(document).ready(function() {
    $('#loginform').bootstrapValidator({
       
        fields: {
            
           
			
			email: {
             validators: {
					notEmpty: {
						message: 'Email id / Mobile number is required'
					}
				}
            },
			
			password: {
					validators: {
					notEmpty: {
						message: 'Password is required'
					},
					stringLength: {
                        min: 6,
                        message: 'Password  must be at least 6 characters'
                    },
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~'"\\|=^?$%*)(_+-]*$/,
					message: 'Password wont allow <>[]'
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
