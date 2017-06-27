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
			<h3 class="text-center">Sign in</h3>
			<hr>
                <div id="loginbox" class="mainbox ">
				<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                    <form id="loginform" class="form-horizontal" role="form">

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username or email">
                        </div>

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                        </div>



                        <div class="">
                            <div class="checkbox pull-left">
                                <label>
                                    <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                                </label>
                            </div>
							<div class="pull-right">
                                <label>
                                    <a> forget password?</a>
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



            <div class="col-md-6 ">
			<h3 class="text-center">Sign up</h3>
			<hr>
				<form action="r" method="post" accept-charset="utf-8" class="form" role="form" style="padding:0px 15px;">

                    <div class="row">
                        <div class="col-xs-6 col-md-6">
                            <input type="text" name="firstname" value="" class="form-control input-lg" placeholder="First Name" /> </div>
                        <div class="col-xs-6 col-md-6">
                            <input type="text" name="lastname" value="" class="form-control input-lg" placeholder="Last Name" /> </div>
                    </div>
                    <input type="text" name="email" value="" class="form-control input-lg" placeholder="Your Email" />
                    <input type="password" name="password" value="" class="form-control input-lg" placeholder="Password" />
                    <input type="password" name="confirm_password" value="" class="form-control input-lg" placeholder="Confirm Password" />

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