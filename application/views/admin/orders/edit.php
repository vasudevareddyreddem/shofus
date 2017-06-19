<div class="right_col" role="main">



          <div class="">



           <div class="row">



              <div class="col-md-12 col-sm-12 col-xs-12">



                <div class="x_panel">



                  <div class="x_title">



                    <h2>Edit Order</h2>



                   <div class="clearfix"></div>



                  </div>



                  <div class="x_content">



                    <br />



                      <form action="<?php echo base_url(); ?>admin/orders/update/<?php echo $this->uri->segment(4); ?>" method="post">

                        <div class="form-group col-lg-10 col-xs-12">



                        <label class="control-label col-lg-2 col-md-2 col-sm-2 col-xs-12" for="first-name"> Order No



                        </label>



                        <div class=" col-lg-10 col-md-10 col-sm-10 col-xs-12">



                          <label class="control-label col-lg-3 col-md-2 col-sm-2 col-xs-12" for="first-name"># <?php if(isset($Ordersdata->order_id)) { echo $Ordersdata->order_id; } else { echo set_value('order_id'); }?>



                        </label>



                          



                        </div>



                      </div>



                       <div class="form-group col-lg-10 col-xs-12">



                        <label class="control-label col-lg-2 col-md-2 col-sm-2 col-xs-12" for="first-name">Cart Contents



                        </label>



                        <div class=" col-lg-10 col-md-10 col-sm-10 col-xs-12">



                          



                          <?php

              $total=0; $cartData = unserialize($Ordersdata->cart_data); ?>

                    <table class="table table-bordered qtytable" >

                      <tbody>

                        <tr>

                          <th>Product<br /> Name</th>

                          <th>Quantity</th>

                          <th>Rate</th>

                          <th>Total Price</th>

                        </tr>

                   <?php      foreach($cartData as $products)

        { 

        

        ?>

                        <tr>

                          <td><?php echo $products["name"]; ?></td>

                          <td><?php echo $products["qty"]; ?></td>

                          <td> <?php  echo (isset($products["price"]) && $products["price"]!=''?'Rs.'.number_format($products["price"]):'--') ; ?> </td>

                          <td> Rs.<?php echo number_format($products["subtotal"]); ?></td>

                        </tr>

                        <?php

            $total += doubleval($products["subtotal"]);

            

             } ?>

                        

                        <tr>

                          <td colspan="3" style="text-align:right;padding-right : 5px; font-size : 14px;"><strong>Total </strong></td>

                          <td>Rs.<?php echo number_format($total); ?></td>

                        </tr>

                      </tbody>

                    </table>



                        </div>



                      </div>

                      <div class="form-group col-lg-10 col-xs-12">



                        <label class="control-label col-lg-2 col-md-2 col-sm-2 col-xs-12" for="first-name"> Customer Details



                        </label>



                        <div class=" col-lg-10 col-md-10 col-sm-10 col-xs-12">



                          



                          <?php

              $total=0; $cartData = unserialize($Ordersdata->cart_data); ?>

                    <table class="table table-bordered qtytable" >

                      <tbody>

                        <tr>

                          <th>Customer Name</th>

                          <th>Mobile No.</th>

                          <th>Shipping Address</th>

                          <th>Shipping Area</th>

                          <th>Shipping PIN</th>

                        </tr>

                        <tr>

                          <td><?php if(isset($Ordersdata->name)) { echo $Ordersdata->name; } else { echo set_value('name'); }?></td>

                          <td><?php if(isset($Ordersdata->mobile)) { echo $Ordersdata->mobile; } else { echo set_value('mobile'); }?></td>

                          <td><?php if(isset($Ordersdata->shippingaddress)) { echo $Ordersdata->shippingaddress; } else { echo set_value('shippingaddress'); }?></td>

                          <td><?php if(isset($Ordersdata->shipping_area)) { echo $Ordersdata->shipping_area; } else { echo set_value('shipping_area'); }?></td>

                          <td><?php if(isset($Ordersdata->shipping_PIN)) { echo $Ordersdata->shipping_PIN; } else { echo set_value('shipping_PIN'); }?></td>

                        </tr>

                  

                        

                        

                      </tbody>

                    </table>



                        </div>



                      </div>

                      <div class="form-group col-lg-10 col-xs-12">

                        <label class="control-label col-lg-2 col-md-2 col-sm-2 col-xs-12">Order Status 

                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">

              <select name="status" class="form-control" required  >

                

               

                  <option <?php echo  (isset($Ordersdata->status) &&  $Ordersdata->status!='' && $Ordersdata->status==0?'selected':'');  ?> value="0">Pending</option>

                  <option <?php echo  (isset($Ordersdata->status) &&  $Ordersdata->status!='' && $Ordersdata->status==1?'selected':'');  ?> value="1">In Progress</option>

                  <option <?php echo  (isset($Ordersdata->status) &&  $Ordersdata->status!='' && $Ordersdata->status==2?'selected':'');  ?> value="2">Cancelled</option>

                  <option <?php echo  (isset($Ordersdata->status) &&  $Ordersdata->status!='' && $Ordersdata->status==3?'selected':'');  ?> value="3">Completed</option>

                

              </select>

            </div>

          </div>





                      <div class="form-group col-lg-10 col-xs-12">



                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-2">



                          <button type="button" class="btn btn-primary" onclick="window.location='<?php echo base_url(); ?>admin/orders';return false;">Cancel</button>



                          <button type="submit" class="btn btn-success" name="submit">Submit</button>



                        </div>



                      </div>







                    </form>



                  </div>



                </div>



              </div>



            </div>



          </div>



        </div>