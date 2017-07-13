
<script src="<?php echo base_url(); ?>assets/dist/js/bootstrapValidator.js"></script>
<div class="content-wrapper mar_t_con" >
	<section class="content-header">
		<div class="header-icon">
			<i class="pe-7s-note2"></i>
		</div>
		<div class="header-title">
			  
			<h1>Show Ups</h1>
			<small>Top Offers</small>
			<ol class="breadcrumb hidden-xs">
				<li><a href="<?php echo base_url('seller/dashboard');?>"><i class="pe-7s-home"></i> Home</a></li>
				<li class="active">Top Offers</li>
			</ol>
		</div>
	</section>
  	<section class="content ">
  		<div class="faq_main">
  				<a href="<?php echo base_url('seller/showups/activetopoffers');?>" class="btn btn-success">Active</a>
  				<a href="<?php echo base_url('seller/showups/addtopoffers');?>" class="btn btn-primary">Add</a>
			</div>
    </section>
    </div>

<script type="text/javascript">
$(document).ready(function() {
    $('#addbanner').bootstrapValidator({
       
        fields: {
			home_banner: {
				validators: {
					 notEmpty: {
						message: 'Banner is required'
					},  
					regexp: {
					regexp: /\.(jpe?g|png|gif)$/i,
					message: 'Uploaded file is not a valid image. Only JPG, PNG and GIF files are allowed'
					}
				}
			},
        }
    });
});
</script>