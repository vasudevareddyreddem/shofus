



<?php //print_r($orderdata);exit;?>



<div class="right_col" role="main">



          <div class="">



            



            <div class="clearfix"></div>



            <div class="row">



              <div class="col-md-12 col-sm-12 col-xs-12">



                <div class="x_panel">



                  <div class="x_title">



                    <h2>Edit Order Details</h2>



                    



                    <div class="clearfix"></div>



                  </div>



                  <div class="x_content">



                    <br />



                    	<form method="post" action="<?php echo base_url(); ?>admin/orders/updatedorder">







                      <div class="form-group col-lg-6 col-xs-12">



                        <label class="control-label col-lg-4 col-md-3 col-sm-3 col-xs-12" for="first-name">Order Id



                        </label>



                        <div class="col-md-6 col-sm-6 col-xs-12">

<input type="hidden" name="hidden" value="<?php echo $orderdata->order_id;?>">

                          <input type="text" value="<?php echo $orderdata->order_id;?>" required class="form-control col-md-7 col-xs-12" readonly>



                        </div>



                      </div>



					  <div class="form-group col-lg-6 col-xs-12">



                        <label class="control-label col-lg-4 col-md-3 col-sm-3 col-xs-12" for="first-name">Food Name



                        </label>



                        <div class="col-md-6 col-sm-6 col-xs-12">

<input type="hidden" value="<?php echo $orderdata->order_id;?>">

                          <input type="text" value="<?php if(isset($orderdata->food_name)) { echo $orderdata->food_name; } else { echo set_value('food_name'); }?>" required class="form-control col-md-7 col-xs-12" readonly >



                        </div>



                      </div>



					  <div class="form-group col-lg-6 col-xs-12">



                        <label class="control-label col-lg-4 col-md-3 col-sm-3 col-xs-12" for="first-name">Customer Name



                        </label>



                        <div class="col-md-6 col-sm-6 col-xs-12">



                          <input type="text" value="<?php if(isset($orderdata->user_name)) { echo $orderdata->user_name; } else { echo set_value('user_name'); }?>" required class="form-control col-md-7 col-xs-12"  name="user_name" readonly >



                        </div>



                      </div>



					  <div class="form-group col-lg-6 col-xs-12">



                        <label class="control-label col-lg-4 col-md-3 col-sm-3 col-xs-12" for="first-name">Phone



                        </label>



                        <div class="col-md-6 col-sm-6 col-xs-12">



                          <input type="text" value="<?php if(isset($orderdata->phone)) { echo $orderdata->phone; } else { echo set_value('phone'); }?>" required class="form-control col-md-7 col-xs-12"  name="phone" readonly >



                        </div>



                      </div>



					  



					  <div class="form-group col-lg-6 col-xs-12">



                        <label class="control-label col-lg-4 col-md-3 col-sm-3 col-xs-12" for="first-name">Email



                        </label>



                        <div class="col-md-6 col-sm-6 col-xs-12">



                          <input type="text" value="<?php if(isset($orderdata->email)) { echo $orderdata->email; } else { echo set_value('email'); }?>"required class="form-control col-md-7 col-xs-12"  name="email" readonly >



                        </div>



                      </div>



                      <div class="form-group col-lg-6 col-xs-12">



                        <label class="control-label col-lg-4 col-md-3 col-sm-3 col-xs-12" for="last-name"> Status 



                        </label>



                        <div class="col-md-6 col-sm-6 col-xs-12">



                         	<select class="form-control" id="status" name="order_status" ">



								              <option value="">--Select status--</option>



                              <option value="0" <?php if ($orderdata->order_status == '0') { echo 'selected="selected"';}?>>Pending</option>



                              <option value="1" <?php if ($orderdata->order_status == '1') { echo 'selected="selected"';}?>>In-Process</option>



								             <option value="2" <?php if ($orderdata->order_status == '2') { echo 'selected="selected"';}?>>Delivered</option>



                              <option value="3" <?php if ($orderdata->order_status == '3') { echo 'selected="selected"';}?>>Reject</option>



                              



                            </select>



                        </div>



                      </div>



               <!--       <div class="form-group col-lg-6 col-xs-12">



                        <label for="middle-name" class="control-label col-lg-4 col-md-3 col-sm-3 col-xs-12">Type</label>



                            <div class="col-md-6 col-sm-6 col-xs-12">



                                <select class="form-control" name="type">



									<option value="">--Select status--</option>



                                  <option value="Veg">VeG</option>



                                  <option value="Non-Veg">Non-Veg</option>



                                 



                                </select>



                            </div>



                      </div>-->



                     



                 



                      <div class="form-group col-lg-6 col-xs-12">



                        <label class="control-label col-lg-4 col-md-3 col-sm-3 col-xs-12">Address



                        </label>



                        <div class="col-md-6 col-sm-6 col-xs-12">



                          	<textarea  class="form-control" rows="4" name="address"  readonly ><?php if(isset($orderdata->address)) { echo $orderdata->address; } else { echo set_value('address'); }?></textarea>

                        </div>



                      </div>



                      <div class="form-group">
                      



                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                       



                          <a class="btn btn-default" href="<?php echo base_url(); ?>admin/orders">Cancel</a>



                          <button type="submit" class="btn btn-success">Submit</button>



                        </div>



                      </div>







                    </form>



                  </div>



                </div>



              </div>



            </div>



          </div>



        </div>
        <script>
      
        </script>