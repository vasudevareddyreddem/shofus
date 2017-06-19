 <section id="aa-popular-category">
  <div class="container">
 <div class="row">
      <div class="table-responsive">
        <table class="table table-bordered table table-hover table-striped">
          <thead>
           <tr>
                  <th style="width:2%;">S.No.</th>
                  <th style="width:2%;" >Order No.</th>
                  <th style="width:18%;">Cart Contents</th>
                  <th  style="width:10%;" > Customer Details &amp; <br />
                  Shipping 
                  Details</th>
                  <th style="width:7%;" >Ordered Date</th>
                   
                     <th style="width:7%;" >Status</th>
                  
                  <!--  <th>Journal</th> -->
                  
                 <!-- <th class="text-center" style="width:5%;" >Actions</th>-->
                </tr>
          </thead>
                 <?php if(!empty($Ordersdata)): ?>
              <tbody>
                <?php $count = $this->uri->segment(4, 0);

   foreach($Ordersdata as $Orders_data){
     $total = 0;
     ?>
                <tr>
                  <td><?= ++$count ?></td>
                  <td><?php  echo $Orders_data->order_id; ?></td>
                  <td><?php $cartData = unserialize($Orders_data->cart_data); 
                  //print_r($cartData); exit; ?>
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
                    </table></td>
                  <td>
                  <table class="table table-bordered qtytable">
                      <tbody>
                        <tr>
                          <th>Name</th>
                          <td><?php  echo (isset($Orders_data->name) && $Orders_data->name!=''?ucfirst($Orders_data->name):'') ; ?></td>
                        
                        </tr>
                        <tr>
                          <th>Mobile</th>
                          <td><?php  echo $Orders_data->mobile; ?></td>
                        
                        </tr>
                        <tr>
                          <th>Address</th>
                          <td><?php  echo (isset($Orders_data->shippingaddress) && $Orders_data->shippingaddress!=''?$Orders_data->shippingaddress:'') ; ?></td>
                        
                        </tr>
                        <tr>
                          <th>Area</th>
                          <td><?php  echo (isset($Orders_data->shipping_area) && $Orders_data->shipping_area!=''?$Orders_data->shipping_area:'') ; ?></td>
                        
                        </tr>
                        <tr>
                          <th>PIN</th>
                          <td><?php  echo (isset($Orders_data->shipping_PIN) && $Orders_data->shipping_PIN!=''?$Orders_data->shipping_PIN:'') ; ?></td>
                        
                        </tr>
                        
                        </tbody></table></td>
                  
                   <td><?php  echo $Orders_data->created_at; ?></td>
                    <td><?php  if(isset($Orders_data->status) && $Orders_data->status!='' )
          {
            if($Orders_data->status==0)
            {
              echo '<span style="color:red">Pending</span>';
                
            }
            if($Orders_data->status==1)
            {
              echo '<span style="color:blue">In Progress</span><hr style="margin:0;padding:0">';  
              ?>
              
                          <?php echo '<br> <b>Delivery Type : </b>'; echo isset($Orders_data->delivery_type) &&$Orders_data->delivery_type!=''?$Orders_data->delivery_type:'--';  ?>
                            <?php echo '<br> <b>Track Number : </b>'; echo isset($Orders_data->track_number) &&$Orders_data->track_number!=''?$Orders_data->track_number:'--'; ?>
              
              <?php 
            }
            if($Orders_data->status==2)
            {
              echo '<span style="color:orange">Cancelled</span>'; 
            }
            if($Orders_data->status==3)
            {
              echo '<span style="color:green">Completed</span>';  
            }
            
            
          }; ?></td>
              
                  
                  
                  
                </tr>
                <?php } ?>
              </tbody>
              <?php else: ?>
              <center>
                <strong>No Records Found</strong>
              </center>
              <?php endif; ?>
            </table>
      </div>
    </div>
  </div>
  </section>

  <style>
.qtytable > tbody > tr > th
{
  padding:5px;
}
.qtytable > tbody > tr > td
{
  padding:5px;
}
.qtytable
{
  margin-bottom:0px;
  font-size:12px; 
}
</style>