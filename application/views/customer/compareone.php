
      <div class="row">
<div class="col-md-12">
    <div class="col-md-3" id="compare_items" style="display: block;"></div>
			
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
                        <?php foreach($item as $item_data){ ?>
                      <option value="<?php echo $item_data->item_id; ?>"><?php echo $item_data->item_name; ?></option>
                    <?php } ?> 
                  </select>
                </div>
			</div>
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
    //var item_name = $("#item_id").val();
    //alert(item_id);exit;
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
    </script> 