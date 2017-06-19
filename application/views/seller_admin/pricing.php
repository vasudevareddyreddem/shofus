
    <div class="navigation">
      <nav class="navbar navbar-default hm_nav">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            <!--<a class="navbar-brand" href="#">Brand</a>--> 
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li><a href="<?php echo base_url();?>seller_admin/login">HOME <span class="sr-only">(current)</span></a></li>
              <li><a href="<?php echo base_url(); ?>seller_admin/benifits">BENIFITS</a></li>
			  <li><a href="<?php echo base_url(); ?>seller_admin/howitworks">HOW IT WORKS</a></li>
              <!--<li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">HOW IT WORKS <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>-->
              <li class="active"><a href="<?php echo base_url();?>seller_admin/pricing_calculator">PRICINGS</a></li>
              <li><a href="<?php echo base_url();?>seller_admin/faq">FAQ's</a></li>
              <!--<li><a href="#">HELP</a></li>-->
			   <!--<li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">HELP <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="<?php //echo base_url();?>seller_admin/faq">FAQ's</a></li>
              <li><a href="<?php //echo base_url();?>seller_admin/LearningCenter">Learning Center</a></li>
            </ul>
          </li>-->
            </ul>
          </div>
          <!-- /.navbar-collapse --> 
        </div>
        <!-- /.container-fluid --> 
      </nav>
    </div>
  </div>
  
  <!--header part end here --> 
  <!--body start here -->
  <div class="pricing_main">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <div class="pricing_lft">
            <h1>What are the Fees</h1>
            <ul class="cih_fee">
              <li><img src="<?php echo base_url();?>assets/seller_login/images/cih.png" /><br>
                <h4 align="center">CIH Fee</h4>
              </li>
              <li><img src="<?php echo base_url();?>assets/seller_login/images/closing.png" /><br>
                <h4 align="center">Closing Fee</h4>
              </li>
              <li><img src="<?php echo base_url();?>assets/seller_login/images/shipping.png" /><br>
                <h4 align="center">Shipping Fee</h4>
              </li>
              <li><img src="<?php echo base_url();?>assets/seller_login/images/delivery.png" /><br>
                <h4 align="center">Delivery Services Fee</h4>
              </li>
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
			 
			 
			 <div id="refclose"></div>
			 <div class="line" id="demo2">&nbsp;</div>
			 <div class="form-group" id="demoki" style="display:none">
			 
                  <h4>Enter your product weight in grams:</h4>
                  <input type="number" class="form-control san_label" id="product_weight" name="product_weight" placeholder="Enter your product weightin grams">
                  <button type="submit" class="click" id="weight_submit">Calculate</button>
				  <span id="TermsErr12"></span>
                </div>
			 
			 
			 <div id="totalfee"></div>
			 
			 <div class="line" id="demo3" style="display:none">&nbsp;</div>
               
			  <div class="form-group" id="demo4" style="display:none">
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
 url: "<?php echo base_url();?>seller_admin/pricing_calculator/getajaxcih",
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
 url: "<?php echo base_url();?>seller_admin/pricing_calculator/getajaxcih1",
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
    $('#calfee_submit').click(function(e){
    e.preventDefault();
 
    //if ($('#chkterms2').is(':checked')) {
	 var cih1_id =	$("#cih1_id").val();
     var product_price = $("#product_price").val();
	 var cih_fee1 = $("#cih_fee1").val();
     //var subcatname = $("#subcatname").val();
	 //alert(cih1_id);
 //alert(product_price);
  
  
  if (cih1_id == "")
		{
		$("#CatErr").html("Please Select Category").css("color", "red").fadeIn().fadeOut(5000);
		return false;
		}
		else{
			$("#CatErr").html("");
		}
  
  
  if (product_price == "")
		{
		$("#TermsErr").html("Please Enter Price").css("color", "red").fadeIn().fadeOut(5000);
		return false;
		}
		else{
			$("#TermsErr").html("");
		}
 
    $.ajax({
    type: "POST",
    url: '<?php echo base_url() ?>seller_admin/pricing_calculator/getreferalfee',
    data: {product_price:product_price,cih_fee1:cih_fee1},
    success:function(data)
    {
    
  $("#refclose").html(data);
  $('#demo2').show();
    $('#demoki').show();
	
    }
    });
    });
    
    });
  

</script>


<script type="text/javascript" language="javascript">
      $(document).ready(function(){
    $('#weight_submit').click(function(e){
    e.preventDefault();
 
    //if ($('#chkterms2').is(':checked')) 
   var product_price = $("#product_price").val();
    var productcih_fee = $("#productcih_fee").val();
	 var closing_fee = $("#closing_fee").val();
	 //var cih_fee1 = $("#cih_fee1").val();
	 var product_weight = $("#product_weight").val();
  //alert(closing_fee);
  if (product_weight == "")
		{
		$("#TermsErr12").html("Please Enter Product Weight in grams").css("color", "red").fadeIn().fadeOut(5000);
		return false;
		}
		else{
			$("#TermsErr12").html("");
		}
 
    $.ajax({
    type: "POST",
    url: '<?php echo base_url() ?>seller_admin/pricing_calculator/shippingcharge',
    data: {product_weight:product_weight,product_price:product_price,closing_fee:closing_fee,productcih_fee:productcih_fee},
    success:function(data)
    {
    
  $("#totalfee").html(data);
  $('#demo3').show();
    $('#demo4').show();
  //$('#tfsubmit').show();
    
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
    url: '<?php echo base_url() ?>seller_admin/pricing_calculator/getajaxprofit',
    data: {youmake:youmake,actual_price:actual_price},
    success:function(data)
    {
      
   $("#total_cal").html(data);
   
    
    }
    });
    });
    
    });
  

</script>