<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<div class="right_col" role="main">
  <div class="">
    
    <?php //print_r($fooddata);exit;?>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Edit Food Item Details</h2>
            
            <!--<ul class="nav navbar-right panel_toolbox">



                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>



                      </li>



                      <li><a class="close-link"><i class="fa fa-close"></i></a>



                      </li>



                    </ul>-->
            
            <div class="clearfix"></div>
          </div>
          <div class="x_content"> <br />
            <form action="<?php echo base_url(); ?>admin/fooditems/update" method="post" enctype="multipart/form-data">
              <span style="color:red"> <?php echo validation_errors(); ?> </span>
              <div class="form-group col-lg-6 col-xs-12">
                <label class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-12" for="first-name">Food Item  Name </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="hidden" name="hidden" value="<?php echo $fooddata->food_id;?>">
                  <input type="text" id="food_name" name="food_name"  value="<?php if(isset($fooddata->food_name)) { echo $fooddata->food_name; } else { echo set_value('food_name'); }?>"class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group col-lg-6 col-xs-12">
                <label for="middle-name" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-12">Select type</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control" id="type_id" name="type">
                    <option value="Veg" <?php if ($fooddata->type == 'Veg') { echo 'selected="selected"';}?>>Veg</option>
                    <option value="NonVeg" <?php if ($fooddata->type == 'Non-veg') { echo 'selected="selected"';}?>>Non-Veg</option>
                  </select>
                </div>
              </div>
              <div class="form-group col-lg-6 col-xs-12">
                <label for="status" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-12">Status</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control" id="status"  name="status">
                    <option value="1" <?php if ($fooddata->status == '1') { echo 'selected="selected"';}?>>Available</option>
                    <option value="0" <?php if ($fooddata->status == '0') { echo 'selected="selected"';}?>>Unavailable</option>
                  </select>
                </div>
              </div>
              <div class="form-group col-lg-6 col-xs-12">
                <label class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-12" for="first-name"> Image </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="file" name="food_image" class="form-control col-md-7 col-xs-12" >
                  <input type="hidden" name="hidn" class="form-control col-md-7 col-xs-12" value="<?php echo $fooddata->food_image;?>">
                </div>
                <div class=" col-lg-3 col-md-7 col-sm-7 col-xs-12"> <img  class="form-control col-md-7 col-xs-12"  src=<?php echo base_url();?>uploads/hospital/<?php echo $fooddata->food_image;?> 

                      style="width:80px;height:80px"/> </div>
              </div>
              <div class="form-group col-lg-6 col-xs-12">
                <label class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-12">Description </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea class="form-control" rows="3" id="discription"  value="" name="food_discription"><?php if(isset($fooddata->food_discription)) { echo $fooddata->food_discription; } else { echo set_value('food_discription'); }?>
</textarea>
                </div>
              </div>
              <div class="form-group col-lg-6 col-xs-12">
                <label class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-12" for="first-name">Food Item Charges </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="food_charges" name="food_charges" value="<?php if(isset($fooddata->food_charges)) { echo $fooddata->food_charges; } else { echo set_value('food_charges'); }?>"class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <hr />
                <div class="col-md-8 col-sm-8 col-xs-8 col-md-offset-2">
                  <button type="submit" class="btn btn-primary" onclick="window.location='<?php echo base_url(); ?>admin/fooditems';return false;">Cancel</button>
                  <button type="submit" name="submit" class="btn btn-success">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script> 

<!--multi select with search --> 

<script>
$('input[name="food_charges"]').keyup(function(e)
                                {
  if (/\D/g.test(this.value))
  {
    // Filter non-digits from input value.
    this.value = this.value.replace(/\D/g, '');
  }
});


</script>