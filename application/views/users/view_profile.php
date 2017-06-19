<login_section>
  <div class="container">
    <div class="row">

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title"><?php echo ucfirst($userdata->user_name); ?></h3>
        </div>
        <div class="panel-body">
          <div class="row">
              <div><?php echo $this->session->flashdata('message');?></div>

            <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png" class="img-circle img-responsive"> </div>
            <div class=" col-md-9 col-lg-9 ">
              <table class="table table-user-information">
                <tbody>
                <!--  <tr>
                    <td>Department:</td>
                    <td>Programming</td>
                  </tr>-->

                  <tr>
                    <td>User name:</td>
                    <td><?php echo $userdata->user_name; ?></td>
                  </tr>

                  <tr>
                    <td>Registered date:</td>
                    <td><?php echo $userdata->created_at; ?></td>
                  </tr>
                 
                <!--  <tr>
                    <td>Home Address</td>
                    <td><?php //echo $userdata->user_address; ?></td>
                  </tr>
                  <tr> -->
                    <td>Email</td>
                    <td><?php echo $userdata->user_email; ?></td>
                  </tr>
                  <td>Phone Number</td>
                  <td><?php echo $userdata->user_mobile; ?><br>
                    
                </tr>
                  </tbody>
                
              </table>
              <a href="<?php echo base_url(); ?>users/edit_profile/<?php echo $userdata->user_id; ?>" class="btn btn-primary">Edit Profile</a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</login_section>
 