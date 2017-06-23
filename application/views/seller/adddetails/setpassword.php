
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<style>
.process-step .btn:focus{outline:none}
.process{display:table;width:100%;position:relative}
.process-row{display:table-row}
.process-step button[disabled]{opacity:1 !important;filter: alpha(opacity=100) !important}
.process-row:before{top:40px;bottom:0;position:absolute;content:" ";width:100%;height:1px;background-color:#ccc;z-order:0}
.process-step{display:table-cell;text-align:center;position:relative}
.process-step p{margin-top:4px}
.btn-circle{width:80px;height:80px;text-align:center;font-size:12px;border-radius:50%}
.modal-backdrop.in {
    opacity: 0 !important;
}
.mar_t50{
	margin-top:100px;
}
</style>

<div class="navigation_main ">
    <nav class="navbar navbar-inverse hm_nav">
      <div class="">
        <div class="navbar-header logo_style" >
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="<?php echo base_url('seller/login'); ?>">
      <img  src="<?php echo base_url(); ?>assets/seller/images/logo.png" class="img-responsive" style="width: 30%;"/></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
			<h4>Set Password</h4>
          </ul>
         
          
        </div>
      </div>
    </nav>
  </div>
  <?php if($this->session->flashdata('currentpassworderror')): ?>
					<div class="alert dark alert-warning alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button><?php echo $this->session->flashdata('currentpassworderror');?></div>	
					<?php endif; ?>
					<?php if($this->session->flashdata('matchpassworderror')): ?>
					<div class="alert dark alert-warning alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button><?php echo $this->session->flashdata('matchpassworderror');?></div>	
					<?php endif; ?>
					<?php if(validation_errors()):?>
					<div class="alert dark alert-warning alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button><?php echo validation_errors(); ?></div>	
				<?php  endif;?>
				<div class="row setup-content">
					<div class="col-xs-12 ">
					  <div class="col-md-6 col-md-offset-3 mar_t50">
					  <form id="setpassword" name="setpassword" action="<?php echo base_url('seller/adddetails/setpasswordpost'); ?>" method="post" >

							<div class="form-group">
							<label class="control-label">New Password</label>
							<input type="password"id="password" name="password" class="form-control" />
							</div>
							<div class="form-group">
							<label class="control-label">Confirm Password</label>
							<input type="password" id="confirmpassword"  name="confirmpassword" class="form-control"  />
							</div>
							  <button type="submit" id="resubmit" class="btn btn-primary btn-info" value="Next"> Set Password</button>

						</form>
					  </div>
					</div>
				</div>
</html>
 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/bootstrapValidator.css"/>
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/bootstrapValidator.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#setpassword').bootstrapValidator({
       
        fields: {
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
					regexp:/^[A-Za-z0-9_@.,/!;:}{@#&`~'"\\|=^?$%*)(_+-]*$/,
					message: 'Current Password wont allow <>[]'
					}
				}
        },
		 confirmpassword: {
          validators: {
					notEmpty: {
						message: 'Confirm Password is required'
					},
					stringLength: {
                        min: 6,
                        message: 'Confirm Password  must be greater than 6 characters'
                    },
					regexp: {
					regexp:/^[A-Za-z0-9_@.,/!;:}{@#&`~'"\\|=^?$%*)(_+-]*$/,
					message: 'Confirm Password wont allow <>[]'
					}
				}
        }
            
		
        }
    });
});
</script>
		
		
