  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
			<div class="container">
				 <!-- Main content -->
      <div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="box box-primary">
          <!-- <div class="alert dark alert-warning alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button><?php echo $this->session->flashdata('dashboard');?></div> -->
            <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="tab-content">
                    <?php if($this->session->flashdata('updatpassword')): ?>
					<div class="alert dark alert-success alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button><?php echo $this->session->flashdata('updatpassword');?></div>
					<?php endif; ?>
					<?php if($this->session->flashdata('passworderror')): ?>
					<div class="alert dark alert-warning alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button><?php echo $this->session->flashdata('passworderror');?></div>	
					<?php endif; ?>
                   <form id="chanagepassword" name="chanagepassword" method="post" action="<?php echo base_url('customer/inve_changepasswordpost');?>" class="form-horizontal" role="form">
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
          </div>
          </div>
		  
		
			</div>

  </div>
  
  <script src="<?php echo base_url(); ?>assets/home/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/bootstrapValidator.js"></script>
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

