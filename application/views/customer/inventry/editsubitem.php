
<div class="content-wrapper">
		<section class="content" style="padding-top:100px;">
		<div class="container">
			<div class="row">
				<?php if($this->session->flashdata('error')): ?>
					<div class="alert dark alert-warning alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button><?php echo $this->session->flashdata('error');?></div>	
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
				<form enctype="multipart/form-data" method="post" name="editsubitem" id="editsubitem"  action="<?php echo base_url('inventory/editsubitempost'); ?>" class="well col-md-6 col-md-offset-2" style="background-color:#fff;">
				<div class=""  style="font-size:20px;font-weight:600;border-bottom:1px solid #ddd;margin-bottom:10px;padding-bottom:10px;">Edit SubItem</div>
				
				<input type="hidden" name="subitemid" id="subitemid" value="<?php echo isset($subitem_list['subitem_id'])?$subitem_list['subitem_id']:''; ?>">
				<div class="form-group">
				<label for="category">category Name</label>
				<select class="form-control" onchange="getsubcategorynames(this.value)" name="category_list" id="category_list">
				<option value="">Select</option>
				<?php foreach($category_list as $list){ ?>
				
				<?php if($list['category_id']==$subitem_list['category_id']){  ?>
					<option value="<?php echo $list['category_id'];?>" selected><?php echo $list['category_name'];?></option>

				<?php }else{ ?>
				<option value="<?php echo $list['category_id'];?>"><?php echo $list['category_name'];?></option>
				 <?php } ?>
				<?php } ?>
				</select>
				</div>
				<div class="form-group" id="oldcatewise">
				<label for="category">Subcategory Name</label>
				<select class="form-control" name="subcategory_list" id="subcategory_list">
				<option value="">Select</option>
				<?php foreach($subcategory_list as $list){ ?>
				
				<?php if($list['subcategory_id']==$subitem_list['subcategory_id']){  ?>
					<option value="<?php echo $list['subcategory_id'];?>" selected><?php echo $list['subcategory_name'];?></option>

				<?php }else{ ?>
				<option value="<?php echo $list['subcategory_id'];?>"><?php echo $list['subcategory_name'];?></option>
				 <?php } ?>
				<?php } ?>
				</select>
				</div>
				<div class="form-group" id="changecatwise" style="display:none;">
				<label for="category">Subcategory Name</label>
				<select class="form-control" name="changesubcategory_list" id="changesubcategory_list">
					<option value="">Select</option>
				</select></div>
				
				<div class="form-group">
				<label for="category">Sub Item Name</label>
				<input type="text"  class="form-control" id="subitemname"  name="subitemname" value="<?php echo isset($subitem_list['subitem_name'])?$subitem_list['subitem_name']:''; ?>"/>
				</div>
				<div class="form-group">
				<label for="category">Sub Item Image</label>
				<input type="file"  class="form-control" id="image"  name="image"/>
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
function getsubcategorynames(id){
	jQuery.ajax({
				url: "<?php echo site_url('inventory/getsubcategories');?>",
				type: 'post',
				data: {
					form_key : window.FORM_KEY,
					categoryid: id,
					},
				dataType: 'json',
				success: function (data) {
				$('#oldcatewise').hide();
				$('#changecatwise').show();
				$('#changesubcategory_list').empty();
				for(i=0; i<data.length; i++) {
						$('#changesubcategory_list').append("<option value="+data[i].subcategory_id+">"+data[i].subcategory_name+"</option>");                      
					}
			
			
				}
			});
}
$(document).ready(function() {
    $('#editsubitem').bootstrapValidator({
       
          fields: {
            category_list: {
					validators: {
					notEmpty: {
						message: 'category is required'
					}
				}
			}, 
			subcategory_list: {
					validators: {
					notEmpty: {
						message: 'Subcategory is required'
					}
				}
			}, 
			subitemname: {
					validators: {
					notEmpty: {
						message: 'Sub ItemName is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9.,&-_@#$ ]+$/,
					message: ' Sub ItemName can only consist of alphanumaric, space and dot'
					}
				}
			}
        }
    });
});
</script>