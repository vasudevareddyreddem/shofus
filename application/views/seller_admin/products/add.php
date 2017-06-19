 <style>
 
 .add_button {
  border: 0 none;
  left: 440px;
  margin-left: 10px;
  margin-top: 10px;
  position: relative;
  top: -28px;
  vertical-align: text-bottom;
}
 .remove_button {
  border: 0 none;
  left: 440px;
  margin-left: 10px;
  margin-top: 10px;
  position: relative;
  top: -26px;
  vertical-align: text-bottom;
}
 </style>
 <script type="text/javascript">
$(document).ready(function(){
  var maxField = 10; //Input fields increment limitation
  var addButton = $('.add_button'); //Add button selector
  var wrapper = $('.field_wrapper'); //Input field wrapper
  var fieldHTML = '<div> <div class="clearfix"><div class="field_wrapper nopaddingRight col-md-13 san-lg" ><input type="file" class="form-control" name="report_file[]" value=""/><a href="javascript:void(0);" class="remove_button" title="Remove field"><img src="<?php echo site_url(); ?>assets/seller_admin/images/remove-icon.png"/></a></div></div></div>'; //New input field html 
  var x = 1; //Initial field counter is 1
  $(addButton).click(function(){ //Once add button is clicked
    if(x < maxField){ //Check maximum number of input fields
      x++; //Increment field counter
      $(wrapper).append(fieldHTML); // Add field html
    }
  });
  $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
    e.preventDefault();
    $(this).parent('div').remove(); //Remove field html
    x--; //Decrement field counter
  });
});
</script>

 <!--main content start-->
 <div class="col-md-9">
  <section id="main-content">
    <section class="wrapper">
      <!--<div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-cutlery" aria-hidden="true"></i>Add <?php //echo $catname->category_name;?> Item Details</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="<?php //echo base_url();?>seller_admin/dashboard">Home</a></li>
            <li><i class="fa fa-cutlery" aria-hidden="true"></i><?php //echo $catname->category_name;?></li>
            <li><i class="fa fa-square-o"></i><?php //echo $subcatname->subcategory_name;?></li>
          </ol>
        </div>
      </div>-->
      <div class="row">
        <div class="col-lg-12">
          <section class="panel">
            <!--<header class="panel-heading"> Basic Forms </header>-->
			<div><?php echo $this->session->flashdata('message');?></div>
            <div class="panel-body">
			
              <form action="<?php echo base_url(); ?>seller_admin/products/insert/<?php echo $this->uri->segment(4); ?>/<?php echo $this->uri->segment(5); ?>" method="post" enctype="multipart/form-data" onSubmit="return scvalidateof();this.js_enabled.value=1;return true;">
			  
                <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">Select Category</label>
                 <select class="form-control" id="category_id" name="category_id">
                    <option value="">Select Category</option>
					 <?php foreach($getcat as $cat_data){ ?>
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
				
				
                
				 <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">Item Name</label>
                  <input class="form-control" placeholder="Item Name" type="text" id="item_name" name="item_name">
				  <span style="color:red" id="erroritemname"></span>
           </div>

           <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">Item Code</label>
                  <input class="form-control" placeholder="Item Code" type="text" id="item_code" name="item_code">
          <span style="color:red" id="erroritemcode"></span>
           </div>

				 <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">Item Quantity</label>
                  <input class="form-control" placeholder="Item Quantity" type="text" id="item_quantity" name="item_quantity">
				  <span style="color:red" id="errorquantity"></span>
                </div>
				 <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">Item Charges</label>
                  <input class="form-control" placeholder="Item Charges" type="text" name="item_cost" id="item_cost">
				  <span style="color:red" id="errorcost"></span>
                </div>
                
                <div class="clearfix"></div>
				<div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputPassword1">Status</label>
                  <select class="form-control" id="item_status" name="item_status">
                    <option value="">Select Status</option>
                    <option value="1">Available</option>
                    <option value="2">Unavailable</option>
                  </select>
				  <span style="color:red" id="errorstatus"></span>
                </div>
				<div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputFile">Main Image</label>
                  <input type="file" name="picture" id="picture">
				  
				   <span style="color:red" id="errorpicture"></span>
                </div>
				<div class="clearfix"></div>
                <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">Description</label>
                  <textarea  placeholder="Item Description" class="form-control" rows="3" id="item_description" name="item_description"></textarea>
                </div>
               
               <div class="field_wrapper nopaddingRight col-md-5 san-lg" >
                  <label for="exampleInputEmail1">product images</label>
                  <input class="form-control" type="file" name="report_file[]" >
          <!--<span style="color:red" id="erroritemcode"></span>-->
      <span><a href="javascript:void(0);" class="add_button" title="Add field"> <img src="<?php echo site_url(); ?>assets/seller_admin/images/add-icon.png"> </a></span>
           </div>
				
                <div class="clearfix"></div>
				<div style="margin-top: 20px; margin-left: 15px;">
                <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
                <button type="submit" class="btn btn-danger" onclick="window.location='<?php echo base_url(); ?>seller_admin/products';return false;">Cancel</button>
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
  </div>
  </div>
  </div>
  </div>
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
		url: "<?php echo base_url();?>seller_admin/products/getajaxsubcat",
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