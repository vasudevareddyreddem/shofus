<!--main content start-->
  <section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-cutlery" aria-hidden="true"></i>Edit Seller Subcategory Details</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
           
          </ol>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <section class="panel">
            <header class="panel-heading"> Basic Forms </header>
            <div class="panel-body">
              <form action="<?php echo base_url(); ?>seller_admin/subcategory/update/<?php echo $categorydata->subcategory_id;?>" method="post" onSubmit="return scvalidateof();">
			  <div class="form-group nopaddingRight col-md-7">
                  <label for="exampleInputPassword1">Select Category</label>
                  <select class="form-control m-bot15" id="category_id" name="category_id">
                    <option >Select Category</option>
					 <?php foreach($catdata as $cat_data){ ?>
                    <option value="<?php echo $cat_data->category_id ;?>"><?php  echo $cat_data->category_name; ?></option>
					 <?php } ?>
                  </select>
				  <span style="color:red" id="errorcategory"></span>
                </div>
				<script type="text/javascript">
for(var i=0;i<document.getElementById('category_id').length;i++)
{
if(document.getElementById('category_id').options[i].value=="<?php echo $categorydata->category_id; ?>")
{
document.getElementById('category_id').options[i].selected=true
}
}     
</script>
               <div class="form-group nopaddingRight col-md-7">
                  <label for="exampleInputEmail1">Select Subcategory</label>
                  <select class="form-control m-bot15" id="subcategory_id" name="subcategory_id">
                    <option >Select Subcategory</option>
					 <?php foreach($catsubcategorydata as $catsubcategory_data){ ?>
                    <option value="<?php echo $catsubcategory_data->subcategory_id ;?>"><?php  echo $catsubcategory_data->subcategory_name; ?></option>
					 <?php } ?>
                  </select>
				  <span style="color:red" id="errorsubcategory"></span>
				</div>
                <script type="text/javascript">
for(var i=0;i<document.getElementById('subcategory_id').length;i++)
{
if(document.getElementById('subcategory_id').options[i].value=="<?php echo $categorydata->subcategory_id; ?>")
{
document.getElementById('subcategory_id').options[i].selected=true
}
}     
</script>
                
              
                <div class="clearfix"></div>
                <button type="submit" class="btn btn-primary" name="submit" id="submit" >Submit</button>
                <button type="submit" class="btn btn-danger" name="submit" id="submit" onclick="window.location='<?php echo base_url(); ?>seller_admin/subcategory';return false;">Cancel</button>
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
		url: "<?php echo base_url();?>seller_admin/subcategory/getajaxsubcat",
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

document.getElementById('errorsubcategory').innerHTML="Please Enter Subcategory";

$("#subcategory_id").focus();

return false;	

}	

else{

	document.getElementById('errorsubcategory').innerHTML="";

}

}
</script>