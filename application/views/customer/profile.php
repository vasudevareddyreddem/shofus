
<header>
<!--wrapper start here -->

<div class="wrapper"> 
  <!--header part start here -->
  <div class="jain_container">
    

</header>


<div class="pad_bod">
		<div class="row">
		<?php //echo '<pre>';print_r($profile_details);exit; ?>
			 <div class="panel panel-info">
            <div class="">
            </div>
            <div class="panel-body">
			<?php if($this->session->flashdata('success')): ?>
					<div class="alert dark alert-success alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button><?php echo $this->session->flashdata('success');?></div>	
					<?php endif; ?>
              <div class="row">
			  <?php 
			  if($profile_details['cust_propic']!=''){ ?>
			    <div class="col-md-3 col-lg-3 " align="center"> <img alt="<?php echo $profile_details['cust_propic']; ?>" src="<?php echo base_url('uploads/profile/'.$profile_details['cust_propic']); ?>" class="img-circle img-responsive"> </div>
			  <?php }else{ ?>
			         <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="<?php echo base_url(); ?>uploads/profile/default.jpg" class="img-circle img-responsive"> </div>
			  <?php } ?>
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                     
                        <td>Name</td>
                        <td><?php echo $profile_details['cust_firstname'].'&nbsp;'.$profile_details['cust_lastname']; ?></td>
                   
                      <tr>
                        <td>Email Address </td>
                        <td><?php echo $profile_details['cust_email']; ?></td>
                      </tr>
                      <tr>
                        <td>Mobile</td>
                          <td><?php echo $profile_details['cust_mobile']; ?></td>
                      </tr>
                   
                        
                             <tr>
                        <td>Address 1</td>
                          <td><?php echo $profile_details['address1']; ?></td>
                      </tr>
                        <tr>
                         <td>Address 2</td>
                         <td><?php echo $profile_details['address2']; ?></td>
                      </tr>
                      <tr>
                        <td>Delivery Location Area</td>
                        <td><?php echo $profile_details['location_name']; ?></td>
                      </tr>
                     
                     
                    </tbody>
                  </table>
                  
                  <a href="<?php echo base_url('customer/editprofile'); ?>" class="btn btn-primary">Edit profile</a>
                  
                </div>
              </div>
            </div>
                
            
          </div>
	   </div>
</div>

	