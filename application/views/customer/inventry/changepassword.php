
<div class="content-wrapper">
		<section class="content" style="padding-top:100px;">
		<div class="container">
			<div class="row">
				<?php if($this->session->flashdata('passworderror')): ?>
					<div class="alert dark alert-warning alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button><?php echo $this->session->flashdata('passworderror');?></div>	
					<?php endif; ?>
						<?php if($this->session->flashdata('updatpassword')): ?>
					<div class="alert dark alert-success alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button><?php echo $this->session->flashdata('updatpassword');?></div>	
					<?php endif; ?>
					<?php if(validation_errors()):?>
					<div class="alert dark alert-warning alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button><?php echo validation_errors(); ?></div>	
					<?php  endif;?>
				<form method="post" name="chanagepassword" id="chanagepassword"  action="<?php echo base_url('inventory/changepasswordpost'); ?>" class="well col-md-6 col-md-offset-2" style="background-color:#fff;">
				<div class="" style="font-size:20px;font-weight:600;border-bottom:1px solid #ddd;margin-bottom:10px;padding-bottom:10px;">Change Password</div>
				
				<div class="form-group">
				<label for="password">Old Password</label>
				<input type="password"  class="form-control" id="oldpassword"  name="oldpassword"/>
				</div>
				<div class="form-group">
				<label for="password">New Password</label>
				<input type="password" placeholder="" class="form-control" id="newpassword" name="newpassword" />
				</div>
				<div class="form-group">
				<label for="password">confirm Password</label>
				<input type="password" placeholder="" class="form-control" id="confirmpassword" name="confirmpassword"  />
				</div>
				<div class="btn-group-vertical btn-block text-center" role="group">
				<button class="btn btn-danger btn-lg">Change Password</button>
				
				</div>
				</form>
			</div>
		</div>
    
		</section>
 </div>
   
	<script type="text/javascript">

<<<<<<< HEAD
<<<<<<< HEAD
	<script type="text/javascript">

=======
>>>>>>> 944516ea390301ffb8a65730c3fe6d705526dccd
=======
>>>>>>> 944516ea390301ffb8a65730c3fe6d705526dccd
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
                        message: 'Old Password  must be greater than 6 characters'
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