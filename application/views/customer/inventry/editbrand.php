
<div class="content-wrapper">
		<section class="content" style="padding-top:100px;">
		<div class="container">
			<div class="row">
			
						<?php if($this->session->flashdata('updatpassword')): ?>
					<div class="alert dark alert-success alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button><?php echo $this->session->flashdata('updatpassword');?></div>	
					<?php endif; ?>
				<form enctype="multipart/form-data" method="post" name="addbrand" id="addbrand"  action="<?php echo base_url('inventory/postbrandlogo'); ?>" class="well col-md-6 col-md-offset-2" style="background-color:#fff;">
					<?php if($this->session->flashdata('error')): ?>
					<div class="alert dark alert-warning alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button><?php echo $this->session->flashdata('error');?></div>	
					<?php endif; ?>
				<div class=""  style="font-size:20px;font-weight:600;border-bottom:1px solid #ddd;margin-bottom:10px;padding-bottom:10px;">Edit brand Logo</div>
				<input type="hidden" name="brandid" name="brandid" value="<?php echo $brand_details['bid']; ?>">
				<div class="form-group">
					<label for="category">brand Name</label>
					<input type="text"  class="form-control" id="brandname"  name="brandname" value="<?php echo $brand_details['brand']; ?>"/>
				</div>
				<div class="form-group">
				<label for="category">brand Image</label>
				<input type="file"  class="form-control" id="image"  name="image"/>
				</div>
				
				<div class="btn-group-vertical btn-block text-center" role="group">
				<button type="submit" class="btn btn-danger btn-lg">Add</button>
				
				</div>
				</form>
			</div>
		</div>
    
		</section>
 </div>
   
	<script type="text/javascript">
$(document).ready(function() {
    $('#addbrand').bootstrapValidator({
       
        fields: {
            brandname: {
					validators: {
					notEmpty: {
						message: 'Brand name is required'
					}
				}
			},
			image: {
           validators: {
          regexp: {
          regexp: /\.(jpe?g|png)$/i,
          message: 'Uploaded file is not a valid image. Only JPG, PNG and Jpeg files are allowed'
          }
            }
      }
        }
    });
});


</script>