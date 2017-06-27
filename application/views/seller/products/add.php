    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/bootstrapValidator.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/bootstrap-chosen.css"/>
    <script src="<?php echo base_url(); ?>assets/dist/js/bootstrapValidator.js"></script>
    
    <script src="<?php echo base_url(); ?>assets/dist/js/autocomplete.js"></script>
    <script>
      $(function() {
        $('.chosen-select').chosen();
        $('.chosen-select-deselect').chosen({ allow_single_deselect: true });
      });
    </script>

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
				<li><a href="<?php echo base_url('seller/dashboard'); ?>"><i class="pe-7s-home"></i> Home</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div>
	</section>
  <section class="content ">
  <section id="main-content">
    <section class="wrapper">
   
     <div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 m-b-20">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab1" data-toggle="tab">Add Single Product</a></li>
			<li><a href="#tab2" data-toggle="tab">Add Multipule Products</a></li>
		</ul>
		<!-- Tab panels -->
		<div class="tab-content">
		<?php echo $this->session->flashdata('sucess'); ?>
			<div class="tab-pane fade in active" id="tab1">
				<div class="panel-body">
				 <div id="categoryiddoc" class="form-group nopaddingRight "></div>
				 <form name="addprodustc" id="addprodustc" action="<?php echo base_url(); ?>seller/products/insert/<?php echo $this->uri->segment(4); ?>/<?php echo $this->uri->segment(5); ?>" method="post" enctype="multipart/form-data">
                <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">Select Category</label>
				  <?php //echo '<pre>';print_r($sub_cat_data);exit;?>
                 <select class="form-control " id="category_id" name="category_id">
                    <option value="">Select Category</option>
					
					 <?php foreach($sub_cat_data as $single_cat_data){ ?>
					
                    <option value="<?php echo $single_cat_data['category_id']; ?>"><?php echo $single_cat_data['category_name']; ?></option>
                   
					 <?php }?>
                  </select>
				 
                </div>
				
				
                <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputPassword1">Select Subcategory</label>
                  <select class="form-control" id="subcategory_id" name="subcategory_id">
                    <option value="">Select Subcategory</option>
					<?php foreach($subcatdata as $subcat_data){ ?>
                    <option value="<?php echo $subcat_data->subcategory_id; ?>"><?php echo $subcat_data->subcategory_name; ?></option>
                    <?php } ?>
                  </select>
                </div>
				<div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputPassword1">Select subitem</label>
                  <select class="form-control" id="subitem_id" name="subitem_id">
                    <option value="">Select Subitem</option>
          
                  </select>
                </div>
				
                <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">Select Item</label>
                 <select class="form-control chosen-select" id="item_name" name="item_name" >
                    <option value="Select Item"></option>					
					 <?php foreach($items as $item){ ?>				
                    <option value="<?php echo $item['item_name']; ?>"><?php echo $item['item_name']; ?></option>                   
					 <?php }?>
                  </select>				 
                </div>

           <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">Item Code</label>
                  <input class="form-control" placeholder="Item Code" type="text" id="item_code" name="item_code">
           </div>

				 <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">Item Quantity</label>
                  <input class="form-control" placeholder="Item Quantity" type="text" id="item_quantity" name="item_quantity">
                </div>
				 <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">Item Charges</label>
                  <input class="form-control" placeholder="Item Charges" type="text" name="item_cost" id="item_cost">
                </div>
                
               
				<div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputPassword1">Status</label>
                  <select class="form-control" id="item_status" name="item_status">
                    <option value="">Select Status</option>
                    <option value="1">Available</option>
                    <option value="2">Unavailable</option>
                  </select>
                </div>
				
                <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">Description</label>
                  <textarea  placeholder="Item Description" class="form-control" rows="3" id="item_description" name="item_description"></textarea>
                </div>
				<div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputFile">Image One</label>
                  <input type="file" name="picture_one" id="picture_one"><br/>
				  <label for="exampleInputFile">Image Two</label>
                  <input type="file" name="picture_two" id="picture_two"><br/>
                  <label for="exampleInputFile">Image Three</label>
                  <input type="file" name="picture_three" id="picture_three"><br/>
                  <label for="exampleInputFile">Image Four</label>
                  <input type="file" name="picture_four" id="picture_four"><br/>
                </div>
                
               
				
                <div class="clearfix"></div>
				<div style="margin-top: 20px; margin-left: 15px;">
                <button type="submit" class="btn btn-primary" >Submit</button>
                <button type="submit" class="btn btn-danger" onclick="window.location='<?php echo base_url(); ?>seller/products';return false;">Cancel</button>
				</div>
              </form>
				</div>
			</div>
			<div class="tab-pane fade" id="tab2">
				
				<div class="panel-body">
				<div>
					Please Select your Category and Download sample file then filling  the data then again upload your products &nbsp;&nbsp;<a href="" id="documentfilelink"><span id="documentfilename"></span></a>
				</div>
				 <div class="form-group nopaddingRight col-md-8 ">
                  <label for="exampleInputEmail1">Select Category</label>
				  <?php //echo '<pre>';print_r($sub_cat_data);exit;?>
				  <select class="form-control " onchange="documentid(this.value);"  id="category_id" name="category_id">
                    <option value="">Select Category</option>
					<?php foreach($sub_cat_data as $single_cat_data){ ?>
					<option value="<?php echo $single_cat_data['documetfile']; ?>"><?php echo $single_cat_data['category_name']; ?></option>
                   <?php }?>
                  </select>
				 </div>
				<div class="form-group nopaddingRight col-md-8">
				<form action="<?php echo base_url('seller/products/uploadproducts'); ?>" method="post" enctype="multipart/form-data" >
				<input type="file" name="categoryes" id="categoryes" class="form-control" >
				 <button type="submit" class="btn btn-primary" >Submit</button>
				</form>
				</div>
				</div>
      
			</div>
		</div>
	</div>
	

		</div>
 
    </section>
  </section>
  </section>
  </div>
  <!--main content end--> 

     
		
  
  <script type="text/javascript">
  
  
  function documentid(ids){
	  
	 var url='<?php echo base_url('assets/sellerfile/category/'); ?>'+ids;
	 document.getElementById("documentfilename").innerHTML  = ids;
	 $('a#documentfilelink').attr({target: '_blank', href  : url})
  }
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
    //alert(dataString);
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
	
	<script type="text/javascript">
$(document).ready(function() {
    $('#addprodustc').bootstrapValidator({
       
        fields: {
            category_id: {
               validators: {
					notEmpty: {
						message: 'Please select a Category'
					}
				}
            },
			subcategory_id: {
               validators: {
					notEmpty: {
						message: 'Please select a Subcategory'
					}
				}
            },
            item_name: {
              validators: {
					notEmpty: {
						message: 'Item Name is required'
					},
                   regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: ' Item Name can only consist of alphanumaric, space and dot'
					}
                }
            },
			item_code: {
              validators: {
					notEmpty: {
						message: 'Item Code is required'
					},
                   regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: ' Item Code can only consist of alphanumaric, space and dot'
					}
                }
            },
			item_quantity: {
              validators: {
					notEmpty: {
						message: 'Item Quantity is required'
					},
                   regexp: {
					regexp: /^[0-9]+$/,
					message: ' Item Quantity can only consist of digits'
					}
                }
            },
			item_cost: {
              validators: {
					notEmpty: {
						message: 'Item Cost is required'
					},
                   regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: ' Item Cost can only consist of alphanumaric, space and dot'
					}
                }
            },
			picture: {
				validators: {
					   
					regexp: {
					regexp: /\.(jpe?g|png|gif)$/i,
					message: 'Uploaded file is not a valid image. Only JPG, PNG and GIF files are allowed'
					}
				}
			},
			item_status: {
               validators: {
					notEmpty: {
						message: 'Please select a Status'
					}
				}
            }
        }
    });
});
</script>



		
