<!-- 
<div class="row">
			<div class="col-md-3">
			<table class="table table-bordered table-compare">
				<tr>
					<td><?php echo $compare_one['item_name'];?></td>
				</tr>
				<tr>
					<td><img class="img-responsive" style="width: 40%" src="<?php echo base_url('uploads/products/'.$compare_one['item_image']); ?>"></td>
				</tr>
				<tr>
					<td><?php echo ($compare_one['item_cost']); ?></td>
				</tr>
        <tr>
          <td><?php echo $compare_one['item_code']; ?></td>
        </tr>
			</table>
			</div>
			<div class="col-md-3" id="compare_items_two" ></div>
      
			<div class="col-md-3" id="item_hide_one">
			<div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputPassword1">Select One Item</label>
                  <select class="form-control" id="item_id_one" name="item_id_one">
                      <option>Select item</option> 
                        <?php foreach($items as $item_data){ ?>
                      <option value="<?php echo $item_data->item_id; ?>"><?php echo $item_data->item_name; ?></option>
                    <?php } ?> 
                  </select>
                </div>
			</div>
	  </div> -->

  <div class="container">
    <div class="row">
        <div class="col-md-4 text-center" id="div_hide">
            <div class="panel panel-default panel-pricing">
                <div class="panel-heading">
                    <img class="img-responsive" src="<?php echo base_url('uploads/products/'.$compare_one['item_image']); ?>">
                   <!-- <button id="close_product">Close</button>  -->
                </div>
                <ul class="list-group text-center">
                    <li class="list-group-item">Product Name:
                        <?php echo $compare_one[ 'item_name'];?>
                    </li>
                    <li class="list-group-item">Product Price:
                        <?php echo $compare_one[ 'item_cost']; ?>
                    </li>
                    <li class="list-group-item">Product Code:
                        <?php echo $compare_one[ 'item_code']; ?>
                    </li>

                </ul>

            </div>
        </div>
<!-- <button id="btnTimeextend_one">ADD</button> -->        
        <div class="col-md-3" id="item_hide_one">
            <div class="form-group nopaddingRight col-md-6 san-lg">
                <label for="exampleInputPassword1">Select Compare Productsss</label>
                <select class="form-control" id="item_id_one" name="item_id_one">
                    <option>Select item</option>
                    <?php foreach($items as $item_data){ ?>
                    <option value="<?php echo $item_data->item_id; ?>">
                        <?php echo $item_data->item_name; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-md-3" id="compare_items_two"></div>
    </div>
</div>

	  <script type="text/javascript">
    $(document).ready(function()
    {
    $("#item_id_one").change(function()
    {
    var id=$(this).val();
    //alert(id);
    //var dataString = 'item_id='+ id;
    var item_id = $("#item_id_one").val();
      
    $.ajax
    ({
    type: "POST",
    url: "<?php echo base_url();?>category/compare_items_list_two",
     data: {item_id:item_id},
     cache: false,
    dataType:'html',
    success: function (data) {

       $('#compare_items_two').append(data);
       $('#item_hide_one').hide();
     } 
    });
    
    });
    });

//  var count =0;
// $('#close_product').on('change',function(){
//     $('#item_hide_one').show();
//     $('#div_hide').hide();
//     count = count +1;
//   if(count == 3){
//   $('#item_hide_one').hide();
//   }

 
// })

// var myEl = document.getElementById('close_product');

// myEl.addEventListener('click', function() {
//   //$('#item_hide_one').show();
//     $('#hide_div').hide();
    
// }, false);

    </script> 