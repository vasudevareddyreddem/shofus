
<div class="content-wrapper">
		<section class="content" style="padding-top:100px;">
		<div class="container">
			<div class="row">
				<?php if($this->session->flashdata('passworderror')): ?>
					<div class="alert dark alert-warning alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button><?php echo $this->session->flashdata('passworderror');?></div>	
					<?php endif; ?>
						<?php if($this->session->flashdata('updatpassword')): ?>
					<div class="alert dark alert-success alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button><?php echo $this->session->flashdata('updatpassword');?></div>	
					<?php endif; ?>
					<?php if(validation_errors()):?>
					<div class="alert dark alert-warning alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button><?php echo validation_errors(); ?></div>	
					<?php  endif;?>
				<form enctype="multipart/form-data" method="post" name="addcategory" id="addcategory"  action="<?php echo base_url('inventory/editsubcategorypost'); ?>" class="well col-md-6 col-md-offset-2" style="background-color:#fff;">
				<div class=""  style="font-size:20px;font-weight:600;border-bottom:1px solid #ddd;margin-bottom:10px;padding-bottom:10px;">Edit Subcategory</div>
				<input type="hidden" name="subcategoryid" id="subcategoryid" value="<?php echo $subcategory_details['subcategory_id']; ?>">
				<div class="form-group">
				<label for="category">Subcategory Name</label>
				<input type="text"  class="form-control" id="subcategoryname"  name="subcategoryname" value="<?php echo isset($subcategory_details['subcategory_name'])?$subcategory_details['subcategory_name']:''; ?>"/>
				</div>
				<div class="form-group">
				<label for="category">category Name</label>
				<select class="form-control" name="category_list" id="category_list">
				<option value="">Select</option>
				<?php foreach($category_list as $list){ ?>
				
				<?php if($list['category_id']==$subcategory_details['category_id']){  ?>
					<option value="<?php echo $list['category_id'];?>" selected><?php echo $list['category_name'];?></option>

				<?php }else{ ?>
				<option value="<?php echo $list['category_id'];?>"><?php echo $list['category_name'];?></option>
				 <?php } ?>
				<?php } ?>
				</select>
				</div>
				
				<div class="btn-group-vertical btn-block text-center" role="group">
				<button type="submit" class="btn btn-danger btn-lg">Update</button>
				
				</div>
				</form>
			</div>
		</div>
    
		</section>
 </div>
   
	<script type="text/javascript">

$(document).ready(function() {
    $('#addcategory').bootstrapValidator({
       
        fields: {
            subcategoryname: {
					validators: {
					notEmpty: {
						message: 'Subcategory Name is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9.&$-_ ]+$/,
					message: ' Subcategory Name can only consist of alphanumaric, space and dot'
					}
				}
			}, 
			category_list: {
					validators: {
					notEmpty: {
						message: 'Please select a catehory'
					}
				}
			}
        }
    });
});
</script>