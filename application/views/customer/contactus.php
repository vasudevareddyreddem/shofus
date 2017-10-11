
<style>
.panel-title > a:before {
    float: left !important;
    font-family: FontAwesome;
    content:"\f1db";
    padding-right: 5px;
}

.panel-title > a:hover, 
.panel-title > a:active, 
.panel-title > a:focus  {
    text-decoration:none;
}
</style>
<header>
<!--wrapper start here -->

<div class="wrapper"> 
  <!--header part start here -->
  <div class="jain_container">
    

</header>

<body >
<div class="pad_bod">
		<div class="row">
		<?php if($this->session->flashdata('success')): ?>
			<div class="alt_cus"><div class="alert_msg1 animated slideInUp btn_suc"> <?php echo $this->session->flashdata('success');?>&nbsp; <i class="fa fa-check text-success ico_bac" aria-hidden="true"></i></div></div>
			<?php endif; ?> 
			<?php if($this->session->flashdata('qtyerror')): ?>
				<div class="alt_cus"><div class="alert_msg1 animated slideInUp btn_war"> <?php echo $this->session->flashdata('qtyerror');?>&nbsp; <i class="fa fa-check  text-warning ico_bac" aria-hidden="true"></i></div></div>

			<?php endif; ?>
		<?php //echo '<pre>';print_r($cart_items);exit; ?>
		<div class="container">
		<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-primary">
			<div class="panel-heading ">Contact Us</div>
			
			<div class="panel-body">
			<div  style="padding:10px 15px;">
			<section>
        <div class="wizard">
           <?php //echo '<pre>';print_r($profile_details);exit; ?>
                <div class="tab-content">
                   
					<?php if($this->session->flashdata('errormsg')): ?>
					<div class="alt_cus"><div class="alert_msg animated slideInUp btn_war"> <?php echo $this->session->flashdata('errormsg');?>&nbsp; <i class="fa fa-check  text-warning ico_bac" aria-hidden="true"></i></div></div>

					<?php endif; ?>
                   <form id="contactus" name="contactus" method="post" action="<?php echo base_url('customer/contactuspost'); ?>" class="form-horizontal" enctype="multipart/form-data" role="form">
                        <div class=" form-group">
                            <label class="control-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="">
                        </div>
						

                        <div  class=" form-group">
                           <label class="control-label">Email Address</label>
                            <input id="email" type="text"  class="form-control"  name="email" value="" >
                        </div> 
						<div  class=" form-group">
                           <label class="control-label">Subject</label>
                            <input id="mobile" type="text" class="form-control"  name="Subject" value="" >
                        </div> 
						<div  class=" form-group">
                           <label class="control-label">Message</label>
                           	<textarea  placeholder="Message"  class="form-control" rows="3" id="message" name="message"></textarea>

                        </div>
						


                        <div style="margin-top:10px" class="form-group">
                            <!-- Button -->

                            <div class="col-sm-12 controls">
                                <button class="btn btn-lg btn-primary btn-block signup-btn" type="submit"> Submit</button>

                            </div>
                        </div>
				</form>
                
                </div>
          
        </div>
    </section>
	   </div>
	   </div>
	   </div>
	   </div>
	   </div>
	   
	   </div>
	   </div>
	</div>

	<script type="text/javascript">

$(document).ready(function() {
    $('#contactus').bootstrapValidator({
       
        fields: {
            name: {
              validators: {
					notEmpty: {
						message: 'Name is required'
					},
                   regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: 'Name can only consist of alphanumaric, space and dot'
					}
                }
            },
			Subject: {
              validators: {
					notEmpty: {
						message: 'Subject is required'
					},
                   regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: ' Subject can only consist of alphanumaric, space and dot'
					}
                }
            },
			
			email: {
             validators: {
					notEmpty: {
						message: 'Email is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
					message: 'Please enter a valid email address. For example johndoe@domain.com.'
					}
				}
            },
			message: {
              validators: {
					 notEmpty: {
						message: 'Message is required'
					}
                }
            },
			
        }
    });
});
</script>