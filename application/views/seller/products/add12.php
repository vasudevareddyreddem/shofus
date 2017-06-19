
<div class="content-wrapper mar_t_con" >
<section class="content-header">
		<div class="header-icon">
			<i class="pe-7s-note2"></i>
		</div>
		<div class="header-title">
			<form action="#" method="get" class="sidebar-form search-box pull-right hidden-md hidden-lg hidden-sm">
				<div class="input-group">
					<input type="text" name="q" class="form-control" placeholder="Search...">
					<span class="input-group-btn">
						<button type="submit" name="search" id="search-btn" class="btn"><i class="fa fa-search"></i></button>
					</span>
				</div>
			</form>  
			<h1>Listing</h1>
			<small>Add Listing</small>
			<ol class="breadcrumb hidden-xs">
				<li><a href="index.html"><i class="pe-7s-home"></i> Home</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div>
	</section>
  <section class="content ">
  <section id="main-content">
    <section class="wrapper">
      <!--<div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-cutlery" aria-hidden="true"></i>Add <?php //echo $catname->category_name;?> Item Details</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="<?php //echo base_url();?>seller/dashboard">Home</a></li>
            <li><i class="fa fa-cutlery" aria-hidden="true"></i><?php //echo $catname->category_name;?></li>
            <li><i class="fa fa-square-o"></i><?php //echo $subcatname->subcategory_name;?></li>
          </ol>
        </div>
      </div>-->
	 <?php //echo '<pre>';print_r($sub_cat_data);exit;  ?>
      <div class="row">
        <div class="col-lg-12">
          <section class="panel">
            <!--<header class="panel-heading"> Basic Forms </header>-->
			<div><?php echo $this->session->flashdata('message');?></div>
            <div class="panel-body">
              <form action="<?php echo base_url(); ?>seller/products/insert/<?php echo $this->uri->segment(4); ?>/<?php echo $this->uri->segment(5); ?>" method="post" enctype="multipart/form-data" onSubmit="return scvalidateof();this.js_enabled.value=1;return true;">
                <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">Select Category</label>
                 <select class="form-control" id="category_id" name="category_id">
                    <option value="">Select Category</option>
					
					 <?php foreach($sub_cat_data as $single_cat_data){ ?>
					
                    <option value="<?php echo $single_cat_data['category_id']; ?>"><?php echo $single_cat_data['category_name']; ?></option>
                   
					 <?php }?>
                  </select>
				 
				 <span style="color: 	;position: absolute;top: 0;right: 20px;" id="errorcategory"></span>
                </div>
				
				
                <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputPassword1">Select Subcategory</label>
                  <select class="form-control" id="subcategory_id" name="subcategory_id">
                    <option value="">Select Subcategory</option>
					<?php foreach($subcatdata as $subcat_data){ ?>
                    <option value="<?php echo $subcat_data->subcategory_id; ?>"><?php echo $subcat_data->subcategory_name; ?></option>
                    <?php } ?>
                  </select>
				   <span style="color:red; position: absolute;top: 0;right: 20px;" id="errorsubcategory"></span>
                </div>
				<div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputPassword1">Select subitem</label>
                  <select class="form-control" id="subitem_id" name="subitem_id">
                    <option value="">Select Subitem</option>
          
                  </select>
           <span style="color:red; position: absolute;top: 0;right: 20px;" id="errorsubitem"></span>
                </div>
				
                
				 <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">Item Name</label>
                  <input class="form-control" placeholder="Item Name" type="text" id="item_name" name="item_name">
				  <span style="color:red ;position: absolute;top: 0;right: 20px;" id="erroritemname"></span>
           </div>

           <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">Item Code</label>
                  <input class="form-control" placeholder="Item Code" type="text" id="item_code" name="item_code">
          <span style="color:red;position: absolute;top: 0;right: 20px;" id="erroritemcode"></span>
           </div>

				 <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">Item Quantity</label>
                  <input class="form-control" placeholder="Item Quantity" type="text" id="item_quantity" name="item_quantity">
				  <span style="color:red;position: absolute;top: 0;right: 20px;" id="errorquantity"></span>
                </div>
				 <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">Item Charges</label>
                  <input class="form-control" placeholder="Item Charges" type="text" name="item_cost" id="item_cost">
				  <span style="color:red;position: absolute;top: 0;right: 20px;" id="errorcost"></span>
                </div>
                
                <div class="clearfix"></div>
				<div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputPassword1">Status</label>
                  <select class="form-control" id="item_status" name="item_status">
                    <option value="">Select Status</option>
                    <option value="1">Available</option>
                    <option value="2">Unavailable</option>
                  </select>
				  <span style="color:red;position: absolute;top: 0;right: 20px;" id="errorstatus"></span>
                </div>
				<div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputFile">Image</label>
                  <input type="file" name="picture" id="picture">
				  
				   <span style="color:red;position: absolute;top: 0;right: 20px;" id="errorpicture"></span>
                </div>
				<div class="clearfix"></div>
                <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">Description</label>
                  <textarea  placeholder="Item Description" class="form-control" rows="3" id="item_description" name="item_description"></textarea>
                </div>
               
				
                <div class="clearfix"></div>
				<div style="margin-top: 20px; margin-left: 15px;">
                <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
                <button type="submit" class="btn btn-danger" onclick="window.location='<?php echo base_url(); ?>seller/products';return false;">Cancel</button>
				</div>
              </form>
            </div>
          </section>
        </div>
      </div>
      <!-- page start--> 
      <!-- page end--> 
    </section>
  </section>
  </section>
  </div>
  <!--main content end--> 

       
		
  
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
		url: "<?php echo base_url();?>seller/products/getajaxsubcat",
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
    url: "<?php echo base_url();?>seller/products/getajaxsubitem",
    data: dataString,
    cache: false,
    success: function(data)
    {
    $("#subitem_id").html(data);
    } 
    });
    
    });
    });
    </script>   
		
<script>
	
	function scvalidateof()

{

var category_id=document.getElementById('category_id');

var subcategory_id=document.getElementById('subcategory_id');

var item_name=document.getElementById('item_name');

var item_code=document.getElementById('item_code');

var item_quantity=document.getElementById('item_quantity');

var picture=document.getElementById('picture');


var item_status=document.getElementById('item_status');
var item_cost=document.getElementById('item_cost');


var patterns = /[0-9]|\./;
//var phone_validation = /^(?=.*?[1-9])[0-9()-+]+$/ ;

//var name=/^[^-\s][a-zA-Z_\s-]+$/;


//alert(category_id.value);

if(category_id.value==""){

document.getElementById('errorcategory').innerHTML="Please Select Category";

$("#category_id").focus();

return false;	

}	

else{

	document.getElementById('errorcategory').innerHTML="";

}

if(subcategory_id.value==""){

document.getElementById('errorsubcategory').innerHTML="Please Select Subcategory";

$("#subcategory_id").focus();

return false;	

}	

else{

	document.getElementById('errorsubcategory').innerHTML="";

}

if(item_name.value==""){

document.getElementById('erroritemname').innerHTML="Please Enter Item Name";

$("#item_name").focus();

return false;	

}	

else{

	document.getElementById('erroritemname').innerHTML="";

}


if(item_code.value==""){

document.getElementById('erroritemcode').innerHTML="Please Enter Item Code";

$("#item_code").focus();

return false;	

}	

else{

	document.getElementById('erroritemcode').innerHTML="";

}

if(item_quantity.value !=""){
	
	
if (!patterns.test(item_quantity.value)) {

document.getElementById('errorquantity').innerHTML="Item Quantity accepts Numbers only";

$("#item_quantity").focus();

return false;

}

else{

	document.getElementById('errorquantity').innerHTML="";

}	
	
}
	
else{
document.getElementById('errorquantity').innerHTML="Please Enter Item Quantity";

$("#item_quantity").focus();

return false;	

}		













if(picture.value==""){

document.getElementById('errorpicture').innerHTML="Please Choose Product Image";

$("#picture").focus();

return false;	

}	

else{

	document.getElementById('errorpicture').innerHTML="";

}


if(item_status.value==""){

document.getElementById('errorstatus').innerHTML="Please Select Status";

$("#item_status").focus();

return false;	

}	

else{

	document.getElementById('errorstatus').innerHTML="";

}


if(item_cost.value !=""){
	
	
if (!patterns.test(item_cost.value)) {

document.getElementById('errorcost').innerHTML="Cost accepts Numbers only";

$("#item_cost").focus();

return false;

}

else{

	document.getElementById('errorcost').innerHTML="";

}	
	
}
	
else{
document.getElementById('errorcost').innerHTML="Please Enter Item Cost";

$("#item_cost").focus();

return false;	

}		



}
</script>