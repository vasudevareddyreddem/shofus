
<html lang="en">


<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>::CART IN HOUR::</title>
<link rel="icon" href="<?php echo base_url(); ?>assets/home/images/fav.ico" >
<link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/home/css/font-awesome.min.css">
<!--Style start here -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/home/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/home/css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/home/css/animate.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/home/css/responsive.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/home/css/owl.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/home/css/owl_002.css">

<!--Style end here -->
<!--for image zooming -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/home/css/jquery.simpleLens.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/home/css/jquery.simpleGallery.css">
<!--for image zooming -->
<!-- pop up plugins -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/home/css/default.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/home/css/component.css" />
<script src="<?php echo base_url(); ?>assets/home/js/jquery.js"></script>

<script src="<?php echo base_url(); ?>assets/home/js/bootstrap.min.js"></script>

</head>
<header>
<!--wrapper start here -->

<div class="container" style="margin-top:150px">
      <div class="row">
        <div class="col-xs-12">
          
          <div class="table-responsive">
            <table class="table table-bordered table-compare">
              <thead>
                <tr>
                  <td class="compare-product" colspan="5"><h3>Product Details</h3></td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Product</td>
                  <td><a href="detail.html" class="d-block"><?php echo $compore_products['item_name'];?></a></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>Image</td>
                  <td>
                    <img src="<?php echo base_url('uploads/products/'.$compore_products['item_image3']); ?>">
                  </td>
                  <td>
                       <!-- <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputPassword1">Select Subcategory</label>
                  <select class="form-control" id="subcategory_id" name="subcategory_id">
                      <option>Select Subcategory</option> 
                        <?php foreach($subcatdata as $subcat_data){ ?>
                      <option value="<?php echo $subcat_data->subcategory_id; ?>"><?php echo $subcat_data->subcategory_name; ?></option>
                    <?php } ?> 
                  </select>
                </div>  -->
                <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputPassword1">Select Item</label>
                  <select class="form-control" id="item_id" name="item_id">
                      <option>Select item</option> 
                        <?php foreach($item as $item_data){ ?>
                      <option value="<?php echo $item_data->item_id; ?>"><?php echo $item_data->item_name; ?></option>
                    <?php } ?> 
                  </select>
                </div>
                  </td>
                   <td id="compare_item">
                    <p><?php echo $compare_item['item_name']; ?></p>
                  </td> 
                  <td >
                    
                  </td>
                </tr>
                <tr>
                  <td>Price</td>
                  <td>
				
				<div class="price">
                    <div><?php echo ($compore_products['item_cost'])-($compore_products['offer_amount']); ?></div>
                    <!-- <span class="price-old"><?php echo $compore_products['item_cost']; ?></span> -->
                  </div>
                  <!-- <div class="price">
                    <span class="price-old"><?php echo $compore_products['item_cost']; ?></span>
                  </div> -->				  

                </td>
                  <td>
                    <div class="price">
                      <div></div>
                      
                    </div>
                  </td>
                  <td>
                    <div class="price">
                      <div> </div>
                      
                    </div>
                  </td>
                  <td>
                    <div class="price">
                      <div></div>
                    
                    </div>
                  </td>
                </tr>
                <tr>
                <td>Item Code</td>
                	<td>

                    <div class="price">
                      <div><?php echo $compore_products['item_code']; ?></div>
                    </div>
                  </td><td>
                    <div class="price">
                      <div></div>
                      
                    </div>
                  </td><td>
                    <div class="price">
                      <div></div>
                      
                    </div>
                  </td><td>
                    <div class="price">
                      <div></div>
                      
                    </div>
                  </td>

                </tr>
                
                
               
                
                <tr>
                  <td></td>
                  <td><a href="" class="btn btn-sm btn-theme" type="button"><i class="fa fa-shopping-cart"></i> Add To Cart</a></td>
                  <td><button class="btn btn-sm btn-theme" type="button"><i class="fa fa-shopping-cart"></i> Add To Cart</button></td>
                  <td><button class="btn btn-sm btn-theme" type="button"><i class="fa fa-shopping-cart"></i> Add To Cart</button></td>
                  <td><button class="btn btn-sm btn-theme" type="button"><i class="fa fa-shopping-cart"></i> Add To Cart</button></td>
                </tr>
                <tr>
                  <td></td>
                  <td><button class="btn btn-sm btn-theme" type="button"><i class="fa fa-remove"></i> Remove</button></td>
                  <td><button class="btn btn-sm btn-theme" type="button"><i class="fa fa-remove"></i> Remove</button></td>
                  <td><button class="btn btn-sm btn-theme" type="button"><i class="fa fa-remove"></i> Remove</button></td>
                  <td><button class="btn btn-sm btn-theme" type="button"><i class="fa fa-remove"></i> Remove</button></td>
                </tr>
              </tbody>
            </table>
          </div>
          <nav aria-label="Shopping Cart Next Navigation">
            <ul class="pager">
              <li class="previous"><a href="products.html"><span aria-hidden="true">&larr;</span> Continue Shopping</a></li>
              <li class="next"><a href="cart.html">My Shopping Cart <span aria-hidden="true">&rarr;</span></a></li>
            </ul>
          </nav>
        </div>
      </div>
	  
    </div>
	 

<script type="text/javascript">
    // $(document).ready(function()
    // {
    // $("#subcategory_id").change(function()
    // {
    // var id=$(this).val();
    // //alert(id);
    // var dataString = 'subcategory_id='+ id;
    // //alert(dataString);
    // $.ajax
    // ({
    // type: "POST",
    // url: "<?php echo base_url();?>category/getitems",
    // data: dataString,
    // cache: false,
    // success: function(data)
    // {
    // $("#item_id").html(data);
    // } 
    // });
    
    // });
    // });



    $(document).ready(function()
    {
    $("#item_id").change(function()
    {
    var id=$(this).val();
    //alert(id);
    //var dataString = 'item_id='+ id;
    var item_id = $("#item_id").val();
    //var item_name = $("#item_id").val();
    //alert(item_id);exit;
    $.ajax
    ({
    type: "POST",
    url: "<?php echo base_url();?>category/compare_items_list",
    data: {item_id:item_id},
    cache: false,
    dataType:'json',
    success: function(data)
    {
      alert(data);
      alert(item_name);
      $("compare_items").html(data);
      //alert(data.details);
    //$("#compare_items").html(data);
    //$('#compare_items').show();
    } 
    });
    
    });
    });
    </script>   