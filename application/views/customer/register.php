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

<body style="background-color:#45b1b5;">
    <div class="container mar_t10per" style="position:relative" >
        <div class="row ">
		<div class="col-md-10 col-md-offset-1" style="background-color:#fff; border-radius:10px;padding:10px 0px; ">
            <div class="col-md-6 " style="border-right:1px solid #ddd">
			<div class="" style="padding:0px 15px;">
			<h3 class="text-center">Sign in</h3>
			<hr>
                <div id="loginbox" class="mainbox ">
					<?php if($this->session->flashdata('loginerror')): ?>	
			<div class="alert dark alert-warning alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button><?php echo $this->session->flashdata('loginerror');?></div>
			<?php endif; ?>	
                    <form id="loginform" name="loginform" method="post" action="<?php echo base_url('customer/loginpost');?>" class="form-horizontal" role="form">
                        <div class=" form-group">
                            <label class="control-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email"  placeholder="Email">
                        </div>

                        <div  class=" form-group">
                           <label class="control-label">Password</label>
                            <input id="password" type="password" class="form-control" name="password" placeholder="password">
                        </div>

                        <div class="">
                            <div class="checkbox pull-left">
                                <label>
                                    <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                                </label>
                            </div>
							<div class="pull-right">
                                <label>
                                    <a href="<?php echo base_url('customer/forgotpassword');?>" >forget password?</a>
                                </label>
                            </div>
                        </div>


                        <div style="margin-top:10px" class="form-group">
                            <!-- Button -->

                            <div class="col-sm-12 controls">
                                <button class="btn btn-lg btn-primary btn-block signup-btn" type="submit">
                                    login</button>

                            </div>
                        </div>
  </form>
  


                </div>

            </div>
            </div>



            <div class="col-md-6 ">
			<h3 class="text-center">Sign up</h3>
			<hr>
			<?php if($this->session->flashdata('addcus')): ?>
			<div class="alert dark alert-success alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button><?php echo $this->session->flashdata('addcus');?></div>
			<?php endif; ?>
			<?php if($this->session->flashdata('error')): ?>	
			<div class="alert dark alert-warning alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button><?php echo $this->session->flashdata('error');?></div>
			<?php endif; ?>
				<form id="customerregister" name="customerregister" action="<?php echo base_url('customer/registerpost');?>" method="post" accept-charset="utf-8" class="form" role="form" style="padding:0px 15px;">

                    <div class="row">
                        <div class="col-xs-6 col-md-6">
						<div class="form-group">
							<label class="control-label">First Name</label>
                            <input type="text" id="firstname" name="firstname" value="" class="form-control" placeholder="First Name" />
							</div>
							</div>
                        <div class="col-xs-6 col-md-6">
							<div class="form-group">
							<label class="control-label">Last Name</label>
							<input type="text" id="lastname" name="lastname" value="" class="form-control" placeholder="Last Name" />
							</div> 
							</div>
							
                    </div>
					<div class="form-group">
					<label class="control-label">Email Address</label>
					<input type="text" id="email" name="email" value="" class="form-control " placeholder="Your Email" />
					</div>
					<div class="form-group">
					<label class="control-label">Mobile Number</label>
					<input type="text" id="mobile" name="mobile" value="" class="form-control " placeholder="Your Mobile Number" />
					</div>         
					<div class="form-group">
					<label class="control-label">Password</label>
                    <input type="password" id="password" name="password" value="" class="form-control" placeholder="Password" />
					</div>
					<div class="form-group">
					<label class="control-label">Confirm Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" value="" class="form-control" placeholder="Confirm Password" />
					</div>
					<div class="row">
					<div>

                    <button class="btn btn-lg btn-primary btn-block signup-btn" type="submit">
                        Create my account</button>
                </form>

            </div>
            </div>
        </div>
		<div class="" style="position: absolute;top:-100px;right:43%">
			<img src="<?php echo base_url(); ?>assets/home/images/logo_login.png" />
		</div>
    </div>

</body>

</html>
	<script type="text/javascript">
$(document).ready(function() {
    $('#customerregister').bootstrapValidator({
       
        fields: {
            
             firstname: {
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
					message:'Mobile Number must be 10 to 14 digits'
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
                        message: 'Password  must be greater than 6 characters'
                    },
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~'"\\|=^?$%*)(_+-]*$/,
					message: 'Password wont allow <>[]'
					}
				}
			},
			confirm_password: {
					validators: {
					notEmpty: {
						message: 'Confirm Password is required'
					},
					stringLength: {
                        min: 6,
                        message: 'Confirm Password  must be greater than 6 characters'
                    },
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~'"\\|=^?$%*)(_+-]*$/,
					message: 'Confirm Password wont allow <>[]'
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
						message: 'Email is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
					message: 'Please enter a valid email address. For example johndoe@domain.com.'
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
                        message: 'Password  must be greater than 6 characters'
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
