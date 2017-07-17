   <style>
   .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
		border:none;
	}
   </style>
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
	 <?php if($this->session->flashdata('addcus')): ?>
			<div class="alert dark alert-success alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button><?php echo $this->session->flashdata('addcus');?></div>
			<?php endif; ?>
	 <?php //echo '<pre>';print_r($this->session->flashdata('addsuccess'));exit; ?>
	  
				   <?php if($this->session->flashdata('addsuccess')){ ?>

					<div class="alert dark alert-warning alert-dismissible" id="infoMessage">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
					 <?php foreach($this->session->flashdata('addsuccess') as $error){?>
					
					<?php echo $error.'<br/>'; ?>
					
					
					<?php } ?></div><?php } ?>
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
                
				<div class="row">
				<div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">Select Category</label>
				  <?php //echo '<pre>';print_r($sub_cat_data);exit;?>
                 <select class="form-control " id="category_id" name="category_id">
                    <option value="">Select Category</option>					
					 <?php foreach($sub_cat_data as $single_cat_data){ ?>
					
                    <option value="<?php echo $single_cat_data['seller_category_id']; ?>"><?php echo $single_cat_data['category_name']; ?></option>
                   
					 <?php }?>
                  </select>
				 
                </div>
				
				
                <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputPassword1">Select Subcategory</label>
                  <select class="form-control" id="subcategory_id" name="subcategory_id">
                   </select>
                </div>
				
				</div>
				<div class="row">
				<div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">Select Item</label>
                 <select class="form-control chosen-select" id="sub_item_name" name="sub_item_name">
                    <option value=""></option>					
					 <?php foreach($items as $item){ ?>				
                    <option value="<?php echo $item['item_name']; ?>"><?php echo $item['item_name']; ?></option>                   
					 <?php }?>
                  </select>				 
                </div> 
				<div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputPassword1">Item Name</label>
                     <input class="form-control" placeholder="Item Code" type="text" id="item_name" name="item_name">

                </div>
				</div>
				<div class="row">
                <div class="form-group nopaddingRight col-md-6 san-lg">
					<label for="exampleInputEmail1">Item Code</label>
					<input class="form-control" placeholder="Item Code" type="text" id="item_code" name="item_code">
				</div>

				 <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">Item Quantity</label>
                  <input class="form-control" placeholder="Item Quantity" type="text" id="item_quantity" name="item_quantity">
                </div>
				</div>
				<div class="row">
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
				</div>
			
				
				  <div class="form-group nopaddingRight col-md-12 san-lg">
                  <label for="exampleInputEmail1">Description</label>
                  <textarea  placeholder="Item Description" class="form-control" rows="3" id="item_description" name="item_description"></textarea>
                </div>

				<div class="container">
				<div class="row ">
				<div class="form-group nopaddingRight  col-md-5 san-lg ">
				<label>Item Image</label>
				<table class="table" id="tab_logic">
				<tbody>
					<tr id='addr0'>
						<td>
						<input type="file" name='picture_three[]' id="picture_three" class="form-control" data-fv-notempty="true"
                data-fv-notempty-message="Please select an image"

                data-fv-file="true"
                data-fv-file-extension="jpeg,jpg,png"
                data-fv-file-type="image/jpeg,image/png"
                data-fv-file-maxsize="2097152"
                data-fv-file-message="The selected file is not valid" />
						</td>
					</tr>
					<tr id='addr1'></tr>
				</tbody>
				</table>
				</div>
				<div class="clearfix"></div>
				<div  class="col-md-5 san-lg" >
				<div class="pull-left">
				<a id="add_row" class="btn btn-default pull-left">Add Row</a>
				</div>
				<div class="pull-right" id="deletediv" style="padding-right:30px; display:none;">
				<a id='delete_row' class="btn btn-default">Delete Row</a>
				</div>
				</div>
				</div>
				<div class="clearfix"></div>


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
				<form action="<?php echo base_url('seller/products/uploadproducts'); ?>" method="post" enctype="multipart/form-data" >

				 <div class="form-group nopaddingRight col-md-6 ">
                  <label for="exampleInputEmail1">Select Category</label>
				  <?php //echo '<pre>';print_r($sub_cat_data);exit;?>
				  <select class="form-control " onchange="documentid(this.value);getsubcat(this.value);"  id="category_id_import" name="category_id_import">
                    <option value="">Select Category</option>
					<?php foreach($sub_cat_data as $single_cat_data){ ?>
					<option value="<?php echo $single_cat_data['seller_category_id'].'/'.$single_cat_data['documetfile']; ?>"><?php echo $single_cat_data['category_name']; ?></option>
                   <?php }?>
                  </select>
				 </div>
				 <div class="form-group nopaddingRight col-md-6">
                  <label for="exampleInputPassword1">Select Subcategory</label>
                  <select class="form-control" id="subcategory_id_import" name="subcategory_id_import">
                   </select>
                </div>
				<div class="form-group nopaddingRight col-md-8">
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
  $(document).ready(function(){
      var i=1;
     $("#add_row").click(function(){
      $('#addr'+i).html("<td><input  name='picture_three[]'  type='file' class='form-control input-md' data-fv-notempty='true' data-fv-notempty-message='Please select an image' data-fv-file='true' data-fv-file-extension='jpeg,jpg,png' data-fv-file-type='image/jpeg,image/png' data-fv-file-maxsize='2097152' data-fv-file-message='The selected file is not valid'></td>");
	
				
      $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
      $('#deletediv').show('');
	  
      i++; 
  });
     $("#delete_row").click(function(){
		 if(i==2){
			$('#deletediv').hide(''); 
		 }
    	 if(i>1){
		 $("#addr"+(i-1)).html('');
		 i--;
		 }
	 });

});
  

  function documentid(ids){
	  var cat=ids;
	 var myarr = cat.split("/");
	
	 var url='<?php echo base_url('assets/sellerfile/category/'); ?>'+myarr[1];
	 document.getElementById("documentfilename").innerHTML  = myarr[1];
	 $('a#documentfilelink').attr({target: '_blank', href  : url})
  } 
  function getsubcat(ids){
	  var cat=ids;
	 var myarr = cat.split("/");
	var dataString = 'category_id='+myarr[0];
	$.ajax
		({
		type: "POST",
		url: "<?php echo base_url();?>seller/products/getajaxsubcat",
		data: dataString,
		cache: false,
		success: function(data)
		{
		$("#subcategory_id_import").html(data);
		} 
		});
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
function getsubcaregories(id){
	alert(id);return false;
		$("#category_id_import").change(function()
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
		}
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
			sub_item_name: {
               validators: {
					notEmpty: {
						message: 'Please select an Item'
					}
				}
            },
            item_name: {
              validators: {
					notEmpty: {
						message: 'Item Name is required'
					},
                   regexp: {
					regexp: /^[a-zA-Z0-9. -_@,.&]+$/,
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
					regexp: /^[a-zA-Z0-9. -_@,.&]+$/,
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
					regexp: /^[0-9. ]+$/,
					message: ' Item Cost can only consist of Numbers, space and dot'
					}
                }
            },
			item_description: {
              validators: {
					notEmpty: {
						message: 'Description is required'
					}
                }
            },
			'picture_three[]': {
				validators: {
					 notEmpty: {
                        message: 'Please select an image'
                    },
                    file: {
                        extension: 'jpeg,jpg,png',
                        type: 'image/jpeg,image/png',
                        maxSize: 2097152,   // 2048 * 1024
                        message: 'Uploaded file is not a valid image. Only JPG PNG and GIF files are allowed'
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



		
