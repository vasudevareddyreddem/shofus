<login_section>
  <div class="container">
    <div id="loginbox" style="margin-top:30px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
      <div id="mainLogin">
        <div class="panel panel-info fm_border">
          <div class="panel-heading pa_head">
            <div class="panel-title pg_title">Change Password</div>
          </div>
          <div style="padding-top:30px" class="panel-body">
            <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
    	<form id="loginform" class="form-horizontal" role="form" action="<?php echo base_url(); ?>users/updatepassword" method="post">

  <div><?php echo $this->session->flashdata('message');?></div>

	<!--User Name : &nbsp; &nbsp;<span style="color:#0066a1 !important;font-size:16px !important;"> <?php// echo ucfirst(current_author()->author_name); ?></span>-->
 <div style="margin-bottom: 25px" class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>  

                        	<input type="password" id="login-username" class="form-control" name="old_password" value="<?php echo set_value('old_password'); ?>" placeholder="Current Password" />

                <span style="color:red"> <?php echo form_error('old_password'); ?> </span>

                 </div>
              <div style="margin-bottom: 25px" class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input id="login-password" class="form-control" type="password" name="new_password" value="<?php echo set_value('new_password'); ?>" placeholder="New Password"/>
</div>
                
                             <span style="color:red"> <?php echo form_error('new_password'); ?> </span>

              <div style="margin-bottom: 25px" class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input id="login-password" class="form-control" type="password" name="repeat_password" value="<?php echo set_value('repeat_password'); ?>" placeholder="Repeate Password"/> </div>  
                 <span style="color:red"> <?php echo form_error('repeat_password'); ?> </span>
              <div style="margin-top:10px" class="form-group"> 
                <!-- Button -->
                
                <div class="col-sm-12 controls">
                        	<input name="submit" class="btn btn-success" type="submit" value="Change Password" />   
                          <input class="btn btn-primary" type="button" onclick="javascript:window.location.href='<?php echo base_url().'home'; ?>'" value="Cancel" /></td>

                       </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</login_section>
 