<div class="content-wrapper pad_t100">
<div class="panel-heading panel-primary">
 <section class="content-header">
      <h1>
       Service Request reply
        <small>Service Request reply</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('inventory/dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Service Request reply</li>
      </ol>
    </section>
	</div>
	<div class="clearfix"></div>
	<div class="pad_bod mar_t10">
		<div class="row">
		
		<?php //echo '<pre>';print_r($cart_items);exit; ?>
		<div class="container">
		<div class="col-md-8 col-md-offset-2">
		<div class="panel ">
		
			
			<div class="panel-body">
			<div  style="padding:10px 15px;">
			<section>
        <div class="wizard">
           <?php //echo '<pre>';print_r($profile_details);exit; ?>
                <div class="tab-content">
                   
					<?php if($this->session->flashdata('errormsg')): ?>
					<div class="alert dark alert-warning alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button><?php echo $this->session->flashdata('errormsg');?></div>	
					<?php endif; ?>
                   <form id="servicespost" name="servicespost" method="post" action="<?php echo base_url('inventory/servicerequestpost');?>" class="form-horizontal" enctype="multipart/form-data" role="form">
                        <input type="hidden" name="seller_id" id="seller_id" value="<?php echo $seller_id ?>">
                        <input type="hidden" name="serviceid" id="serviceid" value="<?php echo $serviceid; ?>">

                        <div  class=" form-group">
                           <label class="control-label">Service Request reply</label>
                            <textarea rows="5" cols="70" name="serivcerequest" id="serivcerequest"></textarea>
                        </div> 
						
						



                        <div style="margin-top:10px" class="form-group">
                            <!-- Button -->

                            <div class="col-sm-12 controls">
                                <button type="submit" class="btn btn-lg btn-primary btn-block signup-btn" type="submit">Send</button>

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
    $('#servicespost').bootstrapValidator({
       
        fields: {
            serivcerequest: {
					validators: {
					notEmpty: {
						message: 'Service request is required'
					}
				}
			}
			
        }
    });
});
</script>