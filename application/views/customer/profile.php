
<div class="container mar_res_t150">
<?php if($this->session->flashdata('success')): ?>
					<div class="alt_cus"><div class="alert_msg1 animated slideInUp btn_suc"> <?php echo $this->session->flashdata('success');?>&nbsp; <i class="fa fa-check text-success ico_bac" aria-hidden="true"></i></div></div>

					<?php endif; ?>
  <div class="row">
    <div class="col-md-3" >
		<div>	
			<li class="list-group-item " style="border-top:2px solid #d32134;">
        		<div class=" col-md-4">
        		
			  	<?php  if($profile_details['cust_propic']!=''){ ?>
                  	<img class="img-responsive thumbnail" src="<?php echo base_url('uploads/profile/'.$profile_details['cust_propic']); ?>"/>
        		<?php } else{ ?>
				     	<img class="img-responsive thumbnail" src="<?php echo base_url(); ?>uploads/profile/default.jpg"/>

				<?php } ?>
				</div>
				<div class="col-md-8 ">
        			<p class="site_col">admin</p>
                  	<p><strong><?php echo $profile_details['cust_firstname'].'&nbsp;'.$profile_details['cust_lastname']; ?></strong></p>
        			
        		</div>
				<div class="clearfix">&nbsp;</div>
			</li>
		</div>
		<div>	
			<a href="<?php echo base_url('customer/cart'); ?>" ><li class="list-group-item list_si" >
			<i class="fa fa-chevron-right  pull-right col_fa"></i>My cart</li></a>
		</div>
		<div>	
			<a href="<?php echo base_url('customer/orders'); ?>" ><li class="list-group-item list_si" >
			<i class="fa fa-chevron-right  pull-right col_fa"></i>My Orders</li></a>
		</div>
		<div>	
			<a href="<?php echo base_url('customer/trackorders'); ?>" ><li class="list-group-item list_si" >
			<i class="fa fa-chevron-right  pull-right col_fa"></i>Track Orders</li></a>
		</div>
		<div>	
			<a href="<?php echo base_url('customer/wishlist'); ?>" ><li class="list-group-item list_si" >
			<i class="fa fa-chevron-right  pull-right col_fa"></i> My Wishlist </li></a>
		</div>
		<div>	
			<a href="<?php echo base_url('customer/changepassword'); ?>" ><li class="list-group-item list_si" >
			<i class="fa fa-chevron-right  pull-right col_fa"></i>Change password</li></a>
		</div>
		<div>	
			<a href="<?php echo base_url('customer/logout'); ?>" ><li class="list-group-item list_si" >
			<i class="fa fa-chevron-right  pull-right col_fa"></i>Log out</li></a>
		</div>
		
		
		
	</div>
	<div class="col-md-6">
		<div class="panel panel-default">
		  <div class="panel-heading">
				<div class="pull-left"><b>Personal Information</b></div>
				<div class="pull-right">
					<a href="<?php echo base_url('customer/editprofile'); ?>" class="btn btn-primary btn-xs" style="border-radius:5px;">Edit</a>
				</div>
				<div class="clearfix"></div>
		  </div>
		  <div class="panel-body" style="padding:20px 5px;">
		  <div class="col-md-8">
			<table class="table ">
			<tbody>
			  <tr>
				<td class="label_col">NAME</td>
				<td><?php echo $profile_details['cust_firstname'].'&nbsp;'.$profile_details['cust_lastname']; ?></td>
			  </tr><tr>
				<td class="label_col">Email</td>
				<td><?php echo $profile_details['cust_email']; ?></td>
			  </tr><tr>
				<td class="label_col">Mobile</td>
				<td><?php echo $profile_details['cust_mobile']; ?></td>
			  </tr>
			  <tr>
				<td class="label_col">Address1</td>
				<td><?php echo $profile_details['address1']; ?></td>
			  </tr>
			  <tr>
				<td class="label_col">Address2</td>
				<td><?php echo $profile_details['address2']; ?></td>
			  </tr>
			  <tr>
				<td class="label_col">Pincode</td>
				<td><?php echo $profile_details['pincode']; ?></td>
			  </tr>
			 
			 
			</tbody>
			</table>
		  </div>
		  </div>
		</div>
	</div>
	<!--<div class="col-md-3" >
		
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
		
	</div>-->
	
  </div>
</div>
<div class="clearfix">&nbsp;</div>

	