 <div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Add Vendor Details</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content"> <br />
            <form accept-charset="utf-8" action="<?= base_url("admin/vendors/add_details"); ?>" enctype="multipart/form-data" method="post"  >

              <div class="form-group col-lg-6 col-xs-12">
                <label for="cardname" class="col-md-4 control-label">Vendor Name</label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                  <input type="text" data-validation="required"  class="form-control" id="cardname" placeholder="Enter Vendor Name" name="vendor_name" >
                </div>
              </div>
             <!--  
              </div> -->
              <div class="form-group col-lg-6 col-xs-12">
                <label for="cardname" class="col-md-4 control-label">Contact Number</label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                  <input type="text" data-validation="required" class="form-control" id="cardname" placeholder="Enter Contact Number" name="contact_number" >
                </div>
              </div>

              <div class="form-group col-lg-6 col-xs-12">
                <label for="cardname" class="col-md-4 control-label">Email</label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                  <input type="text" data-validation="required" class="form-control" id="cardname" placeholder="Enter Email" name="vendor_email" >
                </div>
              </div>

                 <div class="form-group col-lg-6 col-xs-12">
                <label for="cardname" class="col-md-4 control-label">Password</label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                  <input type="password" data-validation="required" class="form-control" id="cardname" placeholder="Enter Password" name="password" >
                </div>
              </div>
              
              <div class="form-group col-lg-6 col-xs-12">
                <label for="cardname" class="col-md-4 control-label">Address</label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                  <textarea class="form-control" data-validation="required" id="cardname" placeholder="Enter Address" name="address" ></textarea>
                </div>
              </div>
              <!-- <div class="form-group col-lg-6 col-xs-12">
                <label for="cardname" class="col-md-4 control-label">Area</label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                  <input type="text" data-validation="required" class="form-control" id="cardname" placeholder="Enter Address" name="area" >
                </div> -->
               <div class="form-group col-lg-6 col-xs-12">

         <label for="middle-name" class="control-label col-lg-4 col-md-3 col-sm-3 col-xs-12">Delivery Type</label>

            <div class="col-md-6 col-sm-6 col-xs-12">

           <select class="form-control" id="ststus" name="Delivery" required>

             <option value="">-Delivery Type-</option>

          <option value="COD">COD</option>
         <option value="Prepaid">PRepaid</option>
         </select>


                     </div>

      </div>
               <div class="form-group col-lg-6 col-xs-12">

         <label for="middle-name" class="control-label col-lg-4 col-md-3 col-sm-3 col-xs-12">Status</label>

            <div class="col-md-6 col-sm-6 col-xs-12">

           <select class="form-control" id="ststus" name="status" required>

             <option value="">-Status-</option>

          <option value="Active">Active</option>
         <option value="Deactive">Deactive</option>
         </select>


                     </div>

      </div>
              <!-- <div class="form-group col-lg-6 col-xs-12">
                <label for="cardname" class="col-md-4 control-label">Upload Display Image</label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                  <input type="file"  id="product_image" data-validation="required"  name="file" >
                </div>
              </div> -->
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
 -->