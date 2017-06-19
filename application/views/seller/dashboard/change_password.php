<div class="content-wrapper mar_t_con">
  <section class="content ">
          <div class="bdy_ser chng">
            <h2>Set Your Password</h2>
    	<form  role="form" action="<?php echo base_url(); ?>seller/dashboard/updatepassword" method="post" class="chang_form">

  <div><?php echo $this->session->flashdata('message');?></div>

	<!--User Name : &nbsp; &nbsp;<span style="color:#0066a1 !important;font-size:16px !important;"> <?php// echo ucfirst(current_author()->author_name); ?></span>-->

            <div class="form-group">
            <label for="pwd">New Password:</label>
                <input id="login-password" class="form-control" type="password" name="new_password"   placeholder="New Password"/>
                </div>
             <span style="color:red"> <?php echo form_error('new_password'); ?> </span>
              <div class="form-group">
              <label for="pwd">Repeat New Password:</label>
                <input id="login-password" class="form-control" type="password" name="repeat_password"  placeholder="Repeate Password"/> </div>  
                 <span style="color:red"> <?php echo form_error('repeat_password'); ?> </span>
              <div style="margin-top:10px" class="form-group"> 
                <!-- Button -->
                
                <div class="col-sm-12 controls">
                        	<input name="submit" class="btn btn-success" type="submit" value="Set Password" />   
                          <input class="btn btn-primary" type="button" onclick="javascript:window.location.href='<?php echo base_url().'seller/dashboard'; ?>'" value="Cancel" /></td>
                       </div>
              </div>
            </form>
          </div>
        </div>
        </section>
        </div>