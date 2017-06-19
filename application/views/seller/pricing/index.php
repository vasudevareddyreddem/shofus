 
 
 <style>
 
 .profitbutton {
	    margin-top: 25px;
	
}
    
	 
</style>
 <!--main content start-->
  <section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header">Pricing Calculation</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="<?php echo base_url();?>">Home</a></li>
            <!--<li><i class="fa fa-cutlery" aria-hidden="true"></i><?php //echo $catname->category_name;?></li>
            <li><i class="fa fa-square-o"></i><?php //echo $subcatname->subcategory_name;?></li>-->
          </ol>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <section class="panel">
            <header class="panel-heading"> Basic Forms </header>
            <div class="panel-body">
			
              <form method="post" enctype="multipart/form-data">
			  
                <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">Select Category</label>
                 <select class="form-control" id="category_id" name="category_id">
                    <option value="">Select Category</option>
					 <?php foreach($catdata as $cat_data){ ?>
                    <option value="<?php echo $cat_data->category_id; ?>"><?php echo $cat_data->category_name; ?></option>
                   
					 <?php }?>
                  </select>
				 <span style="color:red" id="errorcategory"></span>
                </div>
				
			
                <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputPassword1">Select Subcategory</label>
                  <select class="form-control" id="subcategory_id" name="subcategory_id">
                    <option value="">Select Subcategory</option>
					<?php foreach($subcatdata as $subcat_data){ ?>
                    <option value="<?php echo $subcat_data->subcategory_id; ?>"><?php echo $subcat_data->subcategory_name; ?></option>
                    <?php } ?>
                  </select>
				   <span style="color:red" id="errorsubcategory"></span>
                </div>
				
				
                <div id="hide"></div>
				<!-- <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">Refferal Fee</label>
                  <input class="form-control" placeholder="Food Item Charges" type="text" id="ref_id" name="ref_id">
				  <span style="color:red" id="erroritemname"></span>
                </div>-->
                <div class="clearfix"></div>
				<div id="psubmit" style="display:none">
				<button type="submit" class="btn btn-primary profitbutton" name="submit" id="product_submit">Submit</button>
				</div>
				 <div id="hide12"></div>
				
				
				
				<div id="ssubmit" style="display:none">
				<button type="submit" class="btn btn-primary profitbutton" name="submit" id="weight_submit">Submit</button>
                <!--<button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
                <button type="submit" class="btn btn-danger" onclick="window.location='<?php //echo base_url(); ?>seller/products/<?php //echo $this->uri->segment(4);?>/<?php //echo $this->uri->segment(5);?>';return false;">Cancel</button>-->
            </div>
			  <div id="hide123"></div>
			  <div id="cpsubmit" style="display:none">
				<button style="margin-top: 24px;" type="submit" class="btn btn-primary profitbutton" name="submit" id="cost_submit">Whats my Profit?</button>
				</div>
			  <div id="hide1234"></div>
			  </form>
            </div>
          </section>
        </div>
      </div>
      <!-- page start--> 
      <!-- page end--> 
    </section>
  </section>
  <!--main content end--> 
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
       
		
  
  <script type="text/javascript">
		$(document).ready(function()
		{
		$("#category_id").change(function()
		{
		var id=$(this).val();
		//alert(id);
		var dataString = 'category_id='+ id;
		$.ajax
		({
		type: "POST",
		url: "<?php echo base_url();?>seller/pricing/getajaxsubcat",
		data: dataString,
		cache: false,
		success: function(data)
		{
		$("#subcategory_id").html(data);
		} 
		});
		
		});
		});
		</script>
		
		

 <script type="text/javascript">
		$(document).ready(function()
		{
		$("#subcategory_id").change(function()
		{
		var id=$(this).val();
		//alert(id);
		var dataString = 'subcategory_id='+ id;
		$.ajax
		({
		type: "POST",
		url: "<?php echo base_url();?>seller/pricing/getajaxrefferal",
		data: dataString,
		cache: false,
		success: function(data)
		{
			//alert(data);
		$("#hide").html(data);
		$('#psubmit').show();
		} 
		});
		
		});
		});
		</script>	






<script type="text/javascript" language="javascript">
      $(document).ready(function(){
    $('#product_submit').click(function(e){
    e.preventDefault();
 
    //if ($('#chkterms2').is(':checked')) {
		
		
		
     var ref_id = $("#ref_id").val();
    var product_price = $("#product_price").val();
   
  	 //alert(product_price);
 
    $.ajax({
    type: "POST",
    url: '<?php echo base_url() ?>seller/pricing/getajaxcount',
    data: {ref_id:ref_id,product_price:product_price},
    success:function(data)
    {
      //alert(data);
   $("#hide12").html(data);
   $('#psubmit').hide();
$('#ssubmit').show();
    
    }
    });
    });
    
    });
  

</script>		
		
		
	<script type="text/javascript" language="javascript">
      $(document).ready(function(){
    $('#weight_submit').click(function(e){
    e.preventDefault();
 
    //if ($('#chkterms2').is(':checked')) {
		
		
		
     
    var product_weight = $("#product_weight").val();
   var product_price = $("#product_price").val();
   var ref_count = $("#ref_count").val();
   var closing_price = $("#closing_price").val();
  	//var product_price = $("#product_price").val(); 
	//alert(product_price);
 
    $.ajax({
    type: "POST",
    url: '<?php echo base_url() ?>seller/pricing/getajaxweight',
    data: {product_weight:product_weight, product_price:product_price, ref_count:ref_count, closing_price:closing_price},
    success:function(data)
    {
     // alert(data);
   $("#hide123").html(data);
    $('#ssubmit').hide();
    $('#cpsubmit').show();
    }
    });
    });
    
    });
  

</script>		
		
		
		
<script type="text/javascript" language="javascript">
      $(document).ready(function(){
    $('#cost_submit').click(function(e){
    e.preventDefault();
 
    //if ($('#chkterms2').is(':checked')) {
		
		
		
     
    var you_make = $("#you_make").val();
	
	var cost_product = $("#cost_product").val();
   
  	//var product_price = $("#product_price").val(); 
	
 
    $.ajax({
    type: "POST",
    url: '<?php echo base_url() ?>seller/pricing/getajaxprofit',
    data: {you_make:you_make, cost_product:cost_product},
    success:function(data)
    {
      
   $("#hide1234").html(data);
   $('#cpsubmit').hide();
    
    }
    });
    });
    
    });
  

</script>				
		
		
		