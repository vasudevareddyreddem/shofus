<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Edit Product Details</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content"> <br />
            <form accept-charset="utf-8" action="<?= base_url("admin/products/update_product/".$this->uri->segment(4)); ?>" enctype="multipart/form-data" method="post"  >
              <div class="form-group col-lg-6 col-xs-12">
                <label for="category" class="col-md-4 control-label">Category</label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                  <select class="category form-control" data-validation="required" name="category_id">
                    <option value="" >Select a Category</option>
                    <?php foreach ($all_category as $categories): ?>
                    <option class ="category" <?php echo isset($all_get_product_details->category_id) && $all_get_product_details->category_id!=0 && $all_get_product_details->category_id==$categories->category_id?'selected':''; ?>  value="<?php echo $categories->category_id;?>" ><?php echo $categories->category_name; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="form-group col-lg-6 col-xs-12">
                <label for="category" class="col-md-4 control-label">Sub-Category</label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                  <select class="sub_catg form-control"  data-validation="required"  name="subcategory_id">
                    <option value="" >Select a Category</option>
                    <?php for($i=0;$i<count($card);$i++): ?>
                    <option class="category" <?php echo isset($all_get_product_details->product_parent_id) && $all_get_product_details->product_parent_id!=0 && $all_get_product_details->product_parent_id==$card[$i]->sub_cat_id?'selected':''; ?>  value="<?php echo $card[$i]->sub_cat_id;?>" ><?php echo   $card[$i]->sub_cat_name;
						 ?></option>
                    <?php endfor; ?>
                  </select>
                </div>
              </div>
              <div class="form-group col-lg-6 col-xs-12">
                <label for="cardname" class="col-md-4 control-label">Product Name</label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                  <input type="text" value="<?php echo isset($all_get_product_details->product_name) && $all_get_product_details->product_name!=''?$all_get_product_details->product_name:''; ?>" data-validation="required"  class="form-control" id="cardname" placeholder="Enter Product Name" name="product_name" >
                </div>
              </div>
              <div class="form-group col-lg-6 col-xs-12">
                <label for="cardname" class="col-md-4 control-label">Actual Price</label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                  <input type="text" value="<?php echo isset($all_get_product_details->actual_price) && $all_get_product_details->actual_price!=''?$all_get_product_details->actual_price:''; ?>"  data-validation="required" class="form-control" id="actual_price" placeholder="Enter Product Actual Price" name="actual_price" >
                </div>
              </div>
              <div class="form-group col-lg-6 col-xs-12">
                <label for="cardname" class="col-md-4 control-label">Discount Price</label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                  <input type="text" data-validation="required" value="<?php echo isset($all_get_product_details->discount_price) && $all_get_product_details->discount_price!=''?$all_get_product_details->discount_price:''; ?>"  class="form-control" id="cardname" placeholder="Enter Product Discount Price" name="discount_price" >
                </div>
              </div>
              <div class="form-group col-lg-6 col-xs-12">
                <label for="cardname" class="col-md-4 control-label">Description</label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                  <textarea class="form-control" data-validation="required" id="cardname" placeholder="Enter Product Description here" name="description"  ><?php echo isset($all_get_product_details->description) && $all_get_product_details->description!=''?$all_get_product_details->description:''; ?></textarea>
                </div>
              </div>
              <div class="form-group col-lg-6 col-xs-12">
                <label for="cardname" class="col-md-4 control-label">Upload Display Image</label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                  <input type="file"  id="product_image"   name="file" <?php echo isset($all_get_product_details->product_image) && $all_get_product_details->product_image!=''?'':'data-validation="required"'; ?> >
                  <br />
                  <?php if(isset($all_get_product_details->product_image) && $all_get_product_details->product_image!='')
				  {?>
                  <?php
$filename = 'uploads/'.$all_get_product_details->product_image;

if (file_exists($filename)) {?>
                  <img  class="thumbnail" src="<?php echo base_url("uploads/$all_get_product_details->product_image")?>" alt="greeting"  height="100" width="100">
                  <?php } else {?>
                  <img  class="thumbnail" src="<?php echo base_url("assets/images/no_image.png")?>" alt="greeting"  height="100" width="100">
                  <?php 
}
?>
                  <?php	  } ?>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"> <a href="<?= base_url("admin/products/index"); ?>"  class="btn btn-primary">Cancel</a>
                  <button type="submit" name="submit" class="btn btn-success" >Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/
ajax/libs/jquery/1.4.2/jquery.min.js"></script> 
<script type="text/javascript">
$(document).ready(function()
{
$(".category").change(function()
{
	
var id=$(this).val();
var dataString = 'id='+ id;


$.ajax
({
type: "POST",
url: "<?php echo base_url(); ?>admin/products/sub_catg",
data: dataString,
cache: false,
success: function(html)
{
	
$(".sub_catg").html(html);
} 
});

});

});

 $(function () {
        $("input[name='chkPassPort']").click(function () {
            if ($("#chkYes").is(":checked")) {
                $("#dvPassport").show();
            } else {
                $("#dvPassport").hide();
            }
        });
    });
</script> 
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script> 
<script>
  $.validate({
    lang: 'en'
  });
</script> 
