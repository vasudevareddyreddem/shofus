<login_section>
  <div class="container">
    <div id="loginbox" style="margin-top:30px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
      <div id="mainLogin">
        <div class="panel panel-info fm_border">
          <div class="panel-heading pa_head">
            <div class="panel-title pg_title">Edit Profile</div>
          </div>
          <div style="padding-top:30px" class="panel-body">
            <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
    	<form id="loginform" class="form-horizontal" role="form" action="<?php echo base_url(); ?>users/update_profile/<?php echo $userdata->user_id; ?>" method="post">

  <div><?php echo $this->session->flashdata('message');?></div>

	<!--User Name : &nbsp; &nbsp;<span style="color:#0066a1 !important;font-size:16px !important;"> <?php// echo ucfirst(current_author()->author_name); ?></span>-->
 <div style="margin-bottom: 25px" class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>  

                        	<input type="text" id="login-username" class="form-control" name="user_name" value="<?php if(isset($userdata->user_name)) { echo $userdata->user_name; } else { echo set_value('user_name'); }?>" />

                <span style="color:red"> <?php echo form_error('user_name'); ?> </span>

    </div>

         <div style="margin-bottom: 25px" class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input id="login-password" class="form-control" type="email" name="user_email"  value="<?php if(isset($userdata->user_email)) { echo $userdata->user_email; } else { echo set_value('user_email'); }?>" readonly/>
                          <span style="color:red"> <?php echo form_error('user_email'); ?> </span>

      </div>

      <div style="margin-bottom: 25px" class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>  

                          <input type="text" id="login-username" class="form-control" name="user_mobile" value="<?php if(isset($userdata->user_mobile)) { echo $userdata->user_mobile; } else { echo set_value('user_mobile'); }?>" placeholder="Mobile Number" />

                <span style="color:red"> <?php echo form_error('user_mobile'); ?> </span>

    </div>

      <!--   <div style="margin-bottom: 25px" class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <textarea id="login-password" class="form-control"  name="user_address" /> <?php echo $userdata->user_address; ?></textarea>
                          <span style="color:red"> <?php echo form_error('user_address'); ?> </span>

      </div> -->
                

            
              
              <div style="margin-top:10px" class="form-group"> 
                <!-- Button -->
                
                <div class="col-sm-12 controls">
                        	<input name="submit" class="btn btn-success" type="submit" value="Submit" />   
                          <input class="btn btn-primary" type="button" onclick="javascript:window.location.href='<?php echo base_url().'home/view_profile'; ?>'" value="Cancel" /></td>

                       </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</login_section>
 