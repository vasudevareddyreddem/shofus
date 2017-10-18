
<div class="content-wrapper">
		<section class="content" style="padding-top:100px;">
		<div class="container">
			<div class="row">
				
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
					
				<form enctype="multipart/form-data" method="post" name="addbanners" id="addbanners"  action="<?php echo base_url('inventory/addhomepagemiddlebannerspost'); ?>" class="well col-md-6 col-md-offset-2" style="background-color:#fff;">
				<?php if($this->session->flashdata('error')): ?>
					<div class="alert dark alert-warning alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button><?php echo $this->session->flashdata('error');?></div>	
					<?php endif; ?>
				<div class=""  style="font-size:20px;font-weight:1200;border-bottom:1px solid #ddd;margin-bottom:10px;padding-bottom:10px;">Add home page middle Banner Images</div>
				
				
				<div class="form-group">
				<label for="category">Banner Image1</label>
				<input type="file"  class="form-control" id="img1"  name="img1"/>
				</div>
				<div class="form-group">
				<label for="category">Banner Image2</label>
				<input type="file"  class="form-control" id="img2"  name="img2"/>
				</div>
				<div class="form-group">
				<label for="category">Banner Image3</label>
				<input type="file"  class="form-control" id="img3"  name="img3"/>
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
    $('#addbanners').bootstrapValidator({
       
        fields: {
          img1: {
					validators: {
						 notEmpty: {
						message: 'Image is required'
					},
					regexp: {
					regexp: /\.(jpe?g|png|gif)$/i,
					message: 'Uploaded file is not a valid image. Only JPG, PNG and GIF files are allowed'
					}
				}
			}, 
			img2: {
					validators: {
						
					regexp: {
					regexp: /\.(jpe?g|png|gif)$/i,
					message: 'Uploaded file is not a valid image. Only JPG, PNG and GIF files are allowed'
					}
				}
			},
			img3: {
					validators: {
						 
					regexp: {
					regexp: /\.(jpe?g|png|gif)$/i,
					message: 'Uploaded file is not a valid image. Only JPG, PNG and GIF files are allowed'
					}
				}
			},
			
			img9: {
					validators: {
					
					regexp: {
					regexp: /\.(jpe?g|png|gif)$/i,
					message: 'Uploaded file is not a valid image. Only JPG, PNG and GIF files are allowed'
					}
				}
			}
        }
    });
});
</script>