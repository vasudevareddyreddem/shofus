<script src="<?php echo base_url();?>assets/vendor/datatable/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendor/datatable/base/jquery-ui.css">
<script src="<?php echo base_url();?>assets/vendor/datatable/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/bootstrapValidator.js"></script>
 <style>
	
	.preview_box{clear: both; padding: 5px; margin-top: 10px; text-align: center;}
	.preview_box img{width: 900px; height: 500px;}
</style> 
<div class="content-wrapper mar_t_con" >
	<section class="content-header">
		<div class="header-icon">
			<i class="pe-7s-note2"></i>
		</div>
		<div class="header-title">
			  
			<h1>Banners</h1>
			<small>Add Category Page banner</small>
			<ol class="breadcrumb hidden-xs">
				<li><a href="<?php echo base_url('seller/dashboard');?>"><i class="pe-7s-home"></i> Home</a></li>
				<li class="active">Add Category Page banner</li>
			</ol>
		</div>
	</section>
  	<section class="content ">
  <section id="main-content">
    <section class="wrapper">
	<?php if($this->session->flashdata('success')): ?>
					<div class="alert dark alert-success alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button><?php echo $this->session->flashdata('success');?></div>	
					<?php endif; ?>
						<?php if($this->session->flashdata('error')): ?>
					<div class="alert dark alert-warning alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button><?php echo $this->session->flashdata('error');?></div>	
					<?php endif; ?>
					
      	<a href="<?php echo base_url('seller/showups/catehorybannerlist');?> " class="pull-right btn btn-sm btn-primary">list</a>
<form id="addbanners" name="addbanners" method="post" action="<?php echo base_url('seller/showups/savebanners/'); ?>" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-12 form-group">
			<div class="col-md-6 form-group">
				<div class="form-group nopaddingRight san-lg">
					 <label for="exampleInputEmail1">Image</label>
					<input type="file"  name='image' id="image"  class="form-control" >
				</div>
			</div>
			<div class="col-md-6 form-group">
				<div class="form-group nopaddingRight san-lg">
					 <label for="exampleInputEmail1"> Category page Position</label>
					<select class="form-control" id="position" name="position" >
					<option value="">Select item </option>
					<option value="1">First position </option>
					<option value="2">Second position </option>
					<option value="3">Third position </option>
					<option value="4">Fourth position </option>
					</select>
				</div>
			</div>
		</div>
		<div class="col-md-12 form-group">
			<div class="col-md-6 form-group">
				<div class="form-group nopaddingRight san-lg">
					 <label for="exampleInputEmail1">link</label>
					<select class="form-control" id="link" onchange="getselectedproducts(this.value);" name="link" >
					<option value="">Select item </option>
					<option value="1">Category </option>
					<option value="2">Subcategory </option>
					<option value="3">Subitem</option>
					<option value="4">Item</option>
					<option value="5">Single Product</option>
					</select>
				</div>
			</div>
			<div class="col-md-6 form-group" id="selectlist" style="">
				<div class="form-group nopaddingRight san-lg">
					 <label for="exampleInputEmail1">options</label>
					<select class="form-control" id="selecteddata" name="selecteddata" >
					<option value="">Select item </option>
					</select>
				</div>
			</div>
			
		</div>
		<div class="col-md-12 form-group">
			<div class="col-md-6 form-group" id="selectlist" style="">
				<div class="form-group nopaddingRight san-lg">
					 <label for="exampleInputEmail1">Expiry Date</label>
					<select class="form-control" id="expirydate" name="expirydate" >
					<option value="">Select</option>
					<option value="7">one Week</option>
					<option value="14">two Week</option>
					<option value="4">4 days</option>
					</select>
				</div>
			</div>
			
		</div>
		
		<div class="col-md-12 form-group">
		
		<button type="submit" id="keysubtton" name="buttonSubmit" class="btn btn-primary" >Submit</button>
		<a type="submit" class="btn btn-danger" href="<?php echo base_url('seller/products'); ?>">Cancel</a>
		</div>
		
		
	</div>
	
	</form>
	
	
	
      <!-- page start--> 
      <!-- page end--> 
    </section>
  </section>
  </section>
				</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#addbanners').bootstrapValidator({
       
        fields: {
			image: {
				validators: {
					 notEmpty: {
						message: 'image is required'
					},  
					regexp: {
					regexp: /\.(jpe?g|png|gif)$/i,
					message: 'Uploaded file is not a valid image. Only JPG, PNG and GIF files are allowed'
					}
				}
			},
			position: {
				validators: {
					 notEmpty: {
						message: 'Position is required'
					}
				}
			},
			selecteddata: {
				validators: {
					 notEmpty: {
						message: 'options is required'
					}
				}
			},
			expirydate: {
				validators: {
					 notEmpty: {
						message: 'expiry date is required'
					}
				}
			},
			link: {
				validators: {
					 notEmpty: {
						message: 'Link is required'
					}
				}
			}
        }
    });
});


function getselectedproducts(val){
	if(val!=''){
		jQuery.ajax({
				url: "<?php echo site_url('seller/showups/getrelateddata');?>",
				type: 'post',
				data: {
					form_key : window.FORM_KEY,
					option: val,
					},
				dataType: 'json',
				success: function (data) {
				$('#selectlist').show();
				$('#selecteddata').empty();
				$('#selecteddata').empty();
						for(i=0; i<data.length; i++) {
						$('#selecteddata').append("<option value="+data[i].linkis+">"+data[i].name+"</option>");                      
					}
					}
			});
	}

}



</script>