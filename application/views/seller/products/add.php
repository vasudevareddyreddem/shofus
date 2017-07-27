<style>
.shad_down{
	-webkit-box-shadow: -1px 1px 5px -1px rgba(0,0,0,0.75);
	-moz-box-shadow: -1px 1px 5px -1px rgba(0,0,0,0.75);
	box-shadow: -1px 1px 5px -1px rgba(0,0,0,0.75);
	background-color:#fff;
	padding:8px;
	border-radius:5px;
}
</style>
<div class="content-wrapper mar_t_con"  >
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
	<section class="content">
	<div class="row">
	<div class=" col-md-6 ">
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Category </label>
				<select class="form-control " id="subcategorylist" name="subcategorylist" >
				<option value="">Select category </option>
				</select>
				<p class="pull-right" style="font-size:12px;cursor: pointer;"><a>Request for new Category</a> </p>
			 
			</div>
			<div class="form-group nopaddingRight san-lg">
				<label for="exampleInputEmail1">Sub Category </label>
				<select class="form-control " id="subcategorylist" name="subcategorylist" >
				<option value="">Select Subcategory </option>

				</select>
				<p class="pull-right" style="font-size:12px;cursor: pointer;"><a>Request for new Subcategory</a> </p>
			 
			</div>
			
			
	</div>	
	<div class=" col-md-6 ">
	<label >&nbsp; </label>
		<div  class=" shad_down " >
			<h4 class="text-center" style="color:#006a99 ">Download this File to add Multiple Products</h4>
			<p class="text-center">
			<button type="button" class="btn btn-primary btn-xs">Download</button>
			<button type="button" class="btn btn-warning btn-xs">Upload</button>
			</p>
			<p class="text-center">(for each Subcategory)</p>
		</div >
	</div>
	</div>
	
	<div class="clearfix"></div>
	<hr>
	
	
	<div class="row">
			<div class=" col-md-6 ">
				<div class="form-group nopaddingRight san-lg">
					<label for="exampleInputEmail1">Category </label>
					<select class="form-control " id="subcategorylist" name="subcategorylist" >
					<option value="">Select category </option>

					</select>
				</div>
			</div>	<div class=" col-md-6 ">
				<div class="form-group nopaddingRight san-lg">
					<label for="exampleInputEmail1">Category </label>
					<select class="form-control " id="subcategorylist" name="subcategorylist" >
					<option value="">Select category </option>

					</select>
				</div>
			</div>
	</div>
	<div class="row">
			<div class=" col-md-6 ">
				<div class="form-group nopaddingRight san-lg">
					<label for="exampleInputEmail1">Category </label>
					<select class="form-control " id="subcategorylist" name="subcategorylist" >
					<option value="">Select category </option>

					</select>
				</div>
			</div>	<div class=" col-md-6 ">
				<div class="form-group nopaddingRight san-lg">
					<label for="exampleInputEmail1">Category </label>
					<select class="form-control " id="subcategorylist" name="subcategorylist" >
					<option value="">Select category </option>

					</select>
				</div>
			</div>
	</div>
	<div class="row">
			<div class=" col-md-6 ">
				<div class="form-group nopaddingRight san-lg">
					<label for="exampleInputEmail1">Category </label>
					<select class="form-control " id="subcategorylist" name="subcategorylist" >
					<option value="">Select category </option>

					</select>
				</div>
			</div>	<div class=" col-md-6 ">
				<div class="form-group nopaddingRight san-lg">
					<label for="exampleInputEmail1">Category </label>
					<select class="form-control " id="subcategorylist" name="subcategorylist" >
					<option value="">Select category </option>

					</select>
				</div>
			</div>
	</div>
	<div class="row">
			<div class=" col-md-6 ">
				<div class="form-group nopaddingRight san-lg">
					<label for="exampleInputEmail1">Category </label>
					<select class="form-control " id="subcategorylist" name="subcategorylist" >
					<option value="">Select category </option>

					</select>
				</div>
			</div>	<div class=" col-md-6 ">
				<div class="form-group nopaddingRight san-lg">
					<label for="exampleInputEmail1">Category </label>
					<select class="form-control " id="subcategorylist" name="subcategorylist" >
					<option value="">Select category </option>

					</select>
				</div>
			</div>
	</div>
	<div class="row">
			<div class=" col-md-6 ">
				<div class="form-group nopaddingRight san-lg">
					<label for="exampleInputEmail1">Category </label>
					<select class="form-control " id="subcategorylist" name="subcategorylist" >
					<option value="">Select category </option>

					</select>
				</div>
			</div>	<div class=" col-md-6 ">
				<div class="form-group nopaddingRight san-lg">
					<label for="exampleInputEmail1">Category </label>
					<select class="form-control " id="subcategorylist" name="subcategorylist" >
					<option value="">Select category </option>

					</select>
				</div>
			</div>
	</div>
	</section>
</div>

  <!--main content end--> 
	 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/bootstrapValidator.css"/>
    <script src="<?php echo base_url(); ?>assets/dist/js/bootstrapValidator.js"></script>
  <script>
  
   function documentid(ids){
	 /* var cat=ids;
	 var myarr = cat.split("/");
	
	 var url='<?php echo base_url('assets/sellerfile/category/'); ?>'+myarr[1];
	 document.getElementById("documentfilename").innerHTML  = myarr[1];
	 $('a#documentfilelink').attr({target: '_blank', href  : url})*/
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
    $(document).ready(function() {
            var jsonData = [];
            var fruits = '<?php echo $color_lists; ?>'.split(',');
            for(var i=0;i<fruits.length;i++) jsonData.push({id:fruits[i],name:fruits[i]});
            var colors = $('#colors').tagSuggest({
                data: jsonData,
                sortOrder: 'name',
                maxDropHeight: 200,
                name: 'colors'
            });
        });
		
		$(document).ready(function() {
            var jsonData = [];
            var fruits = '<?php echo $sizes_lists; ?>'.split(',');
            for(var i=0;i<fruits.length;i++) jsonData.push({id:fruits[i],name:fruits[i]});
            var sizes = $('#sizes').tagSuggest({
                data: jsonData,
                sortOrder: 'name',
                maxDropHeight: 200,
                name: 'sizes'
            });
        });
   $(document).ready(function(){
      var i=1;
	 
     $("#add_row").click(function(){
		  if(i <=11){
      $('#addr'+i).html("<td><input  name='picture_three[]'  type='file' class='form-control input-md' data-fv-notempty='true' data-fv-notempty-message='Please select an image' data-fv-file='true' data-fv-file-extension='jpeg,jpg,png' data-fv-file-type='image/jpeg,image/png' data-fv-file-maxsize='2097152' data-fv-file-message='The selected file is not valid'></td>");
	
				
      $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
      $('#deletediv').show('');
	  
      i++; 
	   }
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
$(document).ready(function(){
  
	 var k=1;
     $("#add_sep").click(function(){
      $('#addrs'+k).html("<div class='col-md-6' style='padding:0'><input style='border-radius:5px 0px 0px 5px' type='text' class='form-control' id='specificationnameid[]' name='specificationname[]' ></div><div class='col-md-6' style='padding:0'><input style='border-radius:0px 5px 5px 0px' type='text' class='form-control' id='specificationvalueid[]' name='specificationvalue[]' ></div>");
		$('#tab_sep').append('<div id="addrs'+(k+1)+'"></div>');
		if(k >=1){
			$('#delbtn').show();
		}
	  k++; 
	
  });
 
     $("#tab_delet").click(function(){
		if(k==2){
			$('#delbtn').hide(''); 
		 }
    	 if(k>1){
		 $("#addrs"+(k-1)).html('');
		 k--;
		 }
		
	 });

});




  
  function getsubcategory(id){
	  if(id==2){
		  $('#materialpurose').show();
		  $('#seasonpurpose').show();
	  }else{
		  $('#materialpurose').hide(); 
		  $('#seasonpurpose').hide(); 
	  }
	  if(id!=''){
		$('#subcategorylist').empty();
		jQuery.ajax({
				url: "<?php echo site_url('seller/products/get_subcaregories_list');?>",
				type: 'post',
				data: {
					form_key : window.FORM_KEY,
					catid: id,
					},
				dataType: 'html',
				success: function (data) {
					$("#subcategorylist").append(data);	

				}
			});
			
	  }
	  
  }
	$(document).ready(function() {
    $('#addproduct').bootstrapValidator({
       
        fields: {
            category_id: {
					validators: {
					notEmpty: {
					message: 'Please select a category'
					}
				}
			},
			subcategorylist: {
					validators: {
					notEmpty: {
				message: 'Please select a subcategory'
					}
				}
			},
			skuid: {
					validators: {
					notEmpty: {
						message: 'Sku id is required'
					},
                   regexp: {
					regexp: /^[a-zA-Z0-9. -_&]+$/,
					message: 'Sku id can only consist of alphanumaric, space and dot'
					}
				}
			},
			otherunique: {
					validators: {
					notEmpty: {
						message: 'Other Unique code is required'
					},
                   regexp: {
					regexp: /^[a-zA-Z0-9. -_&]+$/,
					message: 'Other Unique can only consist of alphanumaric, space and dot'
					}
				}
			},
			productname: {
					validators: {
					notEmpty: {
						message: 'Product name is required'
					},
                   regexp: {
					regexp: /^[a-zA-Z0-9. -_&]+$/,
					message: 'Product name can only consist of alphanumaric, space and dot'
					}
				}
			},
			product_price: {
					validators: {
					notEmpty: {
						message: 'Price is required'
					},
                   regexp: {
					regexp: /^[0-9.]+$/,
					message: 'Price  can only consist of digits'
					}
				}
			},
			specialprice: {
					validators: {
					notEmpty: {
						message: 'Special price is required'
					},
                   regexp: {
					regexp: /^[0-9.]+$/,
					message: 'Special price can only consist of digits'
					}
				}
			},
			producttype: {
					validators: {
					notEmpty: {
						message: 'Sleeve / Fitting type  is required'
					},
                   regexp: {
					regexp: /^[a-zA-Z0-9. -_&]+$/,
					message: 'Sleeve / Fitting type  can only consist of alphanumaric, space and dot'
					}
				}
			},
			material: {
					validators: {
					notEmpty: {
						message: 'Material is required'
					},
                   regexp: {
					regexp: /^[a-zA-Z0-9. -_&]+$/,
					message: 'Material  can only consist of alphanumaric, space and dot'
					}
				}
			},
			sizes: {
					validators: {
					notEmpty: {
						message: 'please select a Size'
					}
				}
			},
			colors: {
					validators: {
					notEmpty: {
						message: 'please select a color'
					}
				}
			},
			weight: {
					validators: {
					notEmpty: {
						message: 'Weight is required'
					},
                   regexp: {
					regexp: /^[a-zA-Z0-9. -_&]+$/,
					message: 'Weight can only consist of alphanumaric, space and dot'
					}
				}
			},
			qty: {
					validators: {
					notEmpty: {
						message: 'Qty is required'
					},
					regexp: {
					regexp: /^[0-9]+$/,
					message: 'Qty can only consist of digits'
					}
				}
			},
			keywords: {
					validators: {
					notEmpty: {
						message: 'Meta keywords is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9. -_&]+$/,
					message: 'Meta keywords can only consist of alphanumaric, space and dot'
					}
				}
			},
			title: {
					validators: {
					notEmpty: {
						message: 'Meta title is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9. -_&]+$/,
					message: 'Meta title can only consist of alphanumaric, space and dot'
					}
				}
			},
			status: {
					validators: {
					notEmpty: {
						message: 'please select a status'
					}
				}
			},
			product_description: {
					validators: {
					notEmpty: {
						message: 'Product description is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message: 'Product description wont allow <> [] = % '
					}
				}
			},
			'specificationname[]': {
					validators: {
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message: 'Specification Name wont allow <> [] = % '
					}
				}
			},
			'specificationvalue[]': {
					validators: {
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message: 'Specification value wont allow <> [] = % '
					}
				}
			},
			'picture_three[]': {
					 validators: {
						 notEmpty: {
						message: 'product Image is required'
					},
					regexp: {
					regexp: /\.(jpe?g|png|gif)$/i,
					message: 'Uploaded file is not a valid image. Only JPG, PNG and GIF files are allowed'
					}
            }
			},
        }
    });
});
$(document).ready(function() {
    $('#importproducts').bootstrapValidator({
       
        fields: {
            category_id_import: {
               validators: {
					notEmpty: {
						message: 'Please select a Category'
					}
				}
            },
			subcategory_id_import: {
               validators: {
					notEmpty: {
					message: 'Please select a SubCategory'
					}
				}
            },
			
			categoryes: {
               validators: {
					notEmpty: {
						message: 'Please select a value'
					},
					regexp: {
						regexp: /\.(xlsx|xls|xlsm)$/i,
					message: 'Uploaded file is not a valid. Only xlsx,xls,xlsm files are allowed'
					}
				}
            }
        }
    });
});
 function hidemsg(id){
	  if(id=''){
		jQuery('#errormsg').html('Please select subcategory');  
	  }else{
		jQuery('#errormsg').html('');  
	  }
	  
  } 
function checkvalidation(){
		var e = document.getElementById("subcategory_id_import");
		var strUser = e.options[e.selectedIndex].value;
		if(strUser==''){
		jQuery('#errormsg').html('Please select subcategory');
		return false;
		}
		jQuery('#errormsg').html('');
	  
  }	  
</script>
  



		
