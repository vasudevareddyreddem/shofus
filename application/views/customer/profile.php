<!--<div class="jain_container">
  <div class="pad_bod">
		<div class="row">
		<?php //echo '<pre>';print_r($profile_details);exit; ?>
			 <div class="panel panel-info">
            <div class="">
            </div>
            <div class="panel-body">
			<?php if($this->session->flashdata('success')): ?>
					<div class="alt_cus"><div class="alert_msg animated slideInUp btn_suc"> <?php echo $this->session->flashdata('success');?>&nbsp; <i class="fa fa-check text-success ico_bac" aria-hidden="true"></i></div></div>

					<?php endif; ?>
					<div class="clearfix">&nbsp;</div>
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
                        <td>Pincode</td>
                        <td><?php echo $profile_details['pincode']; ?></td>
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
</div>-->
<div class="container">

  <div class="row">
    <div class="col-md-3" >
		<div>	
			<li class="list-group-item " style="border-top:2px solid #45b1b9;">
        		<div class=" col-md-4">
        			
                  	<img class="img-responsive thumbnail" src="http://www.abc.net.au/news/image/8314104-1x1-940x940.jpg"/>
        		</div>
				<div class="col-md-8 ">
        			<p class="site_col">admin</p>
                  	<p><strong>First Last Name</strong></p>
        			
        		</div>
				<span class=" badge badge-warning">Lorem Ipsum</span> <span class=" badge badge-info">Lorem Ipsum	</span>
				<div class="clearfix">&nbsp;</div>
			</li>
		</div>
		<div>	
			<li class="list-group-item list_si" >
			<i class="fa fa-chevron-right  pull-right col_fa"></i>My Orders</li>
		</div>
		<div>	
			<li class="list-group-item list_si" >
			<i class="fa fa-chevron-right  pull-right col_fa"></i>My Orders</li>
		</div>
		<div>	
			<li class="list-group-item list_si" >
			<i class="fa fa-chevron-right  pull-right col_fa"></i>My Orders</li>
		</div>
		<div>	
			<li class="list-group-item list_si" >
			<i class="fa fa-chevron-right  pull-right col_fa"></i>My Orders</li>
		</div>
		<div>	
			<li class="list-group-item list_si" >
			<i class="fa fa-chevron-right  pull-right col_fa"></i>My Orders</li>
		</div>
		<div>	
			<li class="list-group-item list_si" >
			<i class="fa fa-chevron-right  pull-right col_fa"></i>My Orders</li>
		</div>
		<div>	
			<li class="list-group-item list_si" >
			<i class="fa fa-chevron-right  pull-right col_fa"></i>My Orders</li>
		</div>
		<div>	
			<li class="list-group-item list_si" >
			<i class="fa fa-chevron-right  pull-right col_fa"></i>My Orders</li>
		</div>
		<div>	
			<li class="list-group-item list_si" >
			<i class="fa fa-chevron-right  pull-right col_fa"></i>My Orders</li>
		</div>
		<div>	
			<li class="list-group-item list_si" >
			<i class="fa fa-chevron-right  pull-right col_fa"></i>My Orders</li>
		</div>
		
	</div>
	<div class="col-md-6">
		<div class="panel panel-default">
		  <div class="panel-heading">
				<div class="pull-left"><b>Personal Information</b></div>
				<div class="pull-right">
					<button class="btn btn-primary btn-xs" style="border-radius:5px;">Edit</button>
				</div>
				<div class="clearfix"></div>
		  </div>
		  <div class="panel-body" style="padding:20px 5px;">
		  <div class="col-md-8">
			<table class="table ">
			<tbody>
			  <tr>
				<td class="label_col">NAME</td>
				<td>Bayapu reddy</td>
			  </tr><tr>
				<td class="label_col">NAME</td>
				<td>Bayapu reddy</td>
			  </tr><tr>
				<td class="label_col">NAME</td>
				<td>Bayapu reddy</td>
			  </tr><tr>
				<td class="label_col">NAME</td>
				<td>Bayapu reddy</td>
			  </tr><tr>
				<td class="label_col">NAME</td>
				<td>Bayapu reddy</td>
			  </tr><tr>
				<td class="label_col">NAME</td>
				<td>Bayapu reddy</td>
			  </tr><tr>
				<td class="label_col">NAME</td>
				<td>Bayapu reddy</td>
			  </tr><tr>
				<td class="label_col">NAME</td>
				<td>Bayapu reddy</td>
			  </tr><tr>
				<td class="label_col">NAME</td>
				<td>Bayapu reddy</td>
			  </tr><tr>
				<td class="label_col">NAME</td>
				<td>Bayapu reddy</td>
			  </tr><tr>
				<td class="label_col">NAME</td>
				<td>Bayapu reddy</td>
			  </tr><tr>
				<td class="label_col">NAME</td>
				<td>Bayapu reddy</td>
			  </tr><tr>
				<td class="label_col">NAME</td>
				<td>Bayapu reddy</td>
			  </tr><tr>
				<td class="label_col">NAME</td>
				<td>Bayapu reddy</td>
			  </tr><tr>
				<td class="label_col">NAME</td>
				<td>Bayapu reddy</td>
			  </tr><tr>
				<td class="label_col">NAME</td>
				<td>Bayapu reddy</td>
			  </tr>
			</tbody>
			</table>
		  </div>
		  </div>
		</div>
	</div>
	<div class="col-md-3" >
		
		<div>	
			<li class="list-group-item list_si" >
			<i class="fa fa-chevron-right  pull-right col_fa"></i>My Orders</li>
		</div>
		<div>	
			<li class="list-group-item list_si" >
			<i class="fa fa-chevron-right  pull-right col_fa"></i>My Orders</li>
		</div>
		<div>	
			<li class="list-group-item list_si" >
			<i class="fa fa-chevron-right  pull-right col_fa"></i>My Orders</li>
		</div>
		<div>	
			<li class="list-group-item list_si" >
			<i class="fa fa-chevron-right  pull-right col_fa"></i>My Orders</li>
		</div>
		<div>	
			<li class="list-group-item list_si" >
			<i class="fa fa-chevron-right  pull-right col_fa"></i>My Orders</li>
		</div>
		<div>	
			<li class="list-group-item list_si" >
			<i class="fa fa-chevron-right  pull-right col_fa"></i>My Orders</li>
		</div>
		<div>	
			<li class="list-group-item list_si" >
			<i class="fa fa-chevron-right  pull-right col_fa"></i>My Orders</li>
		</div>
		<div>	
			<li class="list-group-item list_si" >
			<i class="fa fa-chevron-right  pull-right col_fa"></i>My Orders</li>
		</div>
		<div>	
			<li class="list-group-item list_si" >
			<i class="fa fa-chevron-right  pull-right col_fa"></i>My Orders</li>
		</div>
		<div>	
			<li class="list-group-item list_si" >
			<i class="fa fa-chevron-right  pull-right col_fa"></i>My Orders</li>
		</div>
		
	</div>
	
  </div>
</div>
<div class="clearfix">&nbsp;</div>

	