<!--header part end here --> 
  <!--body start here -->
  <div class="pricing_main">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <div class="pricing_lft">
            <h1>What are the Fees</h1>
            <ul class="cih_fee text-center">
              <li><img src="<?php echo base_url();?>assets/seller_login/images/cih.png" /><br>
                <h4 align="center">CIH Fee</h4>
              </li>
        <li><span class="plus_fon">+</span></li>
              <li><img src="<?php echo base_url();?>assets/seller_login/images/service.png" /><br>
                <h4 align="center">Service Tax</h4>
              </li>
        <!--<li><img src="<?php echo base_url();?>assets/seller_login/images/closing.png" /><br>
                <h4 align="center">Closing Fee</h4>
              </li>
          <li><span class="plus_fon">+</span></li>
              <li><img src="<?php echo base_url();?>assets/seller_login/images/shipping.png" /><br>
                <h4 align="center">Shipping Fee</h4>
              </li>
          <li><span class="plus_fon">+</span></li>
              <li><img src="<?php echo base_url();?>assets/seller_login/images/delivery.png" /><br>
                <h4 align="center">Delivery Services Fee</h4>
              </li>-->
            </ul>
            <h3 align="center">Find CIH Fee for your Product</h3>
            <div class="price_lt">
              <div class="form-group">
                <select class="form-control" id="cih_id" name="cih_id">
                  <option>--Select Product--</option>
                    <?php foreach($cihcatdata as $cih_catdata) {?>   
                  <option value="<?php echo $cih_catdata->cih_id;?>"><?php echo $cih_catdata->category_name;?></option>
                  <?php } ?>
                </select>
              </div>
              <div id="cihfee"></div>
            </div> 
          </div>
        </div>
        <div class="col-md-4">
          <div class="price_rgt">
            <h3>Calculate Your Profit :</h3>
            <h4>Find CIH fee for your Product</h4>
            <div class="calculate">
              <div class="form-group san_sle">
                <select class="form-control" id="cih1_id" name="cih1_id">
                  <option value="">Select Your Category</option>
                    <?php foreach($cihcatdata as $cih_catdata) {?>   
                  <option value="<?php echo $cih_catdata->cih_id;?>"><?php echo $cih_catdata->category_name;?></option>
                  <?php } ?>
                </select>
                <span id="CatErr"></span>
              </div>
        <div id="cihfee1"></div>
       <div class="form-group" id="sellingfee" >
                <h4>your Product Selling Price :</h4>
                <input type="number" class="form-control san_label" id="product_price" name="product_price" placeholder="your Product Selling Price ">
                <button type="submit" class="click" id="calfee_submit">Calculate</button>
         <span id="TermsErr"></span>
              </div>
               
        <div class="form-group"  style="display:none">
        <h3>Calculate My Profit :</h3>
                  <h5>Enter your product Price :</h5>
                  <input type="number" class="form-control san_label" id="actual_price" name="actual_price" placeholder="Enter your product Price">
                  <button type="submit" class="click" id="profit_submit">Calculate</button>
          <span id="TermsErr15"></span>
                </div>
      <div id ="total_cal"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!--body end here --> 
  
  
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
  
  
  <script type="text/javascript">
$(document).ready(function()
{
$("#cih_id").change(function()
{
var id=$(this).val();
//alert(id);
var dataString = 'cih_id='+ id;
$.ajax
({
type: "POST",
 url: "<?php echo base_url();?>seller/pricing_calculator/getajaxcih",
data: dataString,
cache: false,
success: function(data)
{
  //alert(data);
$("#cihfee").html(data);
} 
});

});
});
</script>




<script type="text/javascript">
$(document).ready(function()
{
$("#cih1_id").change(function()
{
var id=$(this).val();
//alert(id);
var dataString = 'cih1_id='+ id;
$.ajax
({
type: "POST",
 url: "<?php echo base_url();?>seller/pricing_calculator/getreferalfee",
data: dataString,
cache: false,
success: function(data)
{
  //alert(data);
$("#cihfee1").html(data);
} 
});

});
});
</script>
<script type="text/javascript" language="javascript">
      $(document).ready(function(){
    $('#profit_submit').click(function(e){
    e.preventDefault();
 
    //if ($('#chkterms2').is(':checked')) {
    
    
    
     
    var youmake = $("#youmake").val();
  
  var actual_price = $("#actual_price").val();
   
    //var product_price = $("#product_price").val(); TermsErr15
  
  if (actual_price == "")
    {
    $("#TermsErr15").html("Please Enter Product Price").css("color", "red").fadeIn().fadeOut(5000);
    return false;
    }
    else{
      $("#TermsErr15").html("");
    }
  
 
    $.ajax({
    type: "POST",
    url: '<?php echo base_url() ?>seller/pricing_calculator/getajaxprofit',
    data: {youmake:youmake,actual_price:actual_price},
    success:function(data)
    {
      
   $("#total_cal").html(data);
   
    
    }
    });
    });
    
    });
  

</script>