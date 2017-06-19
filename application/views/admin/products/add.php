<div class="right_col" role="main">

  <div class="">

    <div class="clearfix"></div>

    <div class="row">

      <div class="col-md-12 col-sm-12 col-xs-12">

        <div class="x_panel">

          <div class="x_title">

            <h2>Add Product Details</h2>

            <div class="clearfix"></div>

          </div>

          <div class="x_content"> <br />

            <form accept-charset="utf-8" action="<?= base_url("admin/products/upload_card"); ?>" enctype="multipart/form-data" method="post"  >

              <div class="form-group col-lg-6 col-xs-12">

                <label for="category" class="col-md-4 control-label">Category</label>

                <div class="col-md-8 col-sm-8 col-xs-12">

                  <select class="category form-control" data-validation="required" name="category">

                    <option value="">Select a Category</option>

                    <?php foreach ($all_category as $categories): ?>

                    <option class ="category" value=" <?php echo $categories->category_id;?>" ><?php echo $categories->category_name; ?></option>

                    <?php endforeach; ?>

                  </select>

                </div>

              </div>

              <div class="form-group col-lg-6 col-xs-12">

                <label for="category" class="col-md-4 control-label">Sub-Category</label>

                <div class="col-md-8 col-sm-8 col-xs-12">

                  <select class="sub_catg form-control" data-validation="required"  name="sub_cat_id">

                    <option value="">Select a Category</option>

                  </select>

                </div>

              </div>

              <div class="form-group col-lg-6 col-xs-12">

                <label for="cardname" class="col-md-4 control-label">Product Name</label>

                <div class="col-md-8 col-sm-8 col-xs-12">

                  <input type="text" data-validation="required"  class="form-control" id="cardname" placeholder="Enter Product Name" name="product_name" >

                </div>

              </div>

              <div class="form-group col-lg-6 col-xs-12">

                <label for="cardname" class="col-md-4 control-label">Actual Price</label>

                <div class="col-md-8 col-sm-8 col-xs-12">

                  <input type="text" data-validation="required" class="form-control" id="cardname" placeholder="Enter Product Actual Price" name="actual_price" >

                </div>

              </div>

              <div class="form-group col-lg-6 col-xs-12">

                <label for="cardname" class="col-md-4 control-label">Discount Price</label>

                <div class="col-md-8 col-sm-8 col-xs-12">

                  <input type="text" data-validation="required" class="form-control" id="cardname" placeholder="Enter Product Discount Price" name="discount_price" >

                </div>

              </div>

              <div class="form-group col-lg-6 col-xs-12">

                <label for="cardname" class="col-md-4 control-label">Description</label>

                <div class="col-md-8 col-sm-8 col-xs-12">

                  <textarea class="form-control" data-validation="required" id="cardname" placeholder="Enter Product Description here" name="description" ></textarea>

                </div>

              </div>
<div class="form-group col-lg-6 col-xs-12">
                <label for="cardname" class="col-md-4 control-label">New </label>
                
                 <input type="radio" name="new" value="new">New Product
  <input type="radio" name="new" value="regular"> Regular<br>

              </div>
<div class="form-group col-lg-6 col-xs-12">
                <label for="cardname" class="col-md-4 control-label">Featured </label>
                
                 <input type="radio" name="feature" value="featured">Featured Product
  <input type="radio" name="feature" value="regular"> Regular<br>

              </div>
              

              <div class="form-group col-lg-6 col-xs-12">

                <label for="cardname" class="col-md-4 control-label">Upload Display Image</label>

                <div class="col-md-8 col-sm-8 col-xs-12">

                  <input type="file"  id="product_image" data-validation="required"  name="file" >

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

