<div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <div class="container">
         <!-- Main content -->
      <div class="row">
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Seller Payments</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php if(!empty($seller_payment)): ?>
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Order ID</th>
                  <th>Seller Id</th>
                  <th>Order Status</th>                  
                  <th>payment Amount</th>
                  <th>Invoice</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php  
                  foreach($seller_payment as $payment) {?>
                <tr>                  
                  <td><?php echo $payment->order_id; ?></td>
                  <td><?php echo $payment->seller_id; ?></td>                  
                  <td style="color:<?php  
                    if( $payment->order_status=='' || $payment->order_status=='0' ){echo "Red";}
                    elseif($payment->order_status=='1'){echo "Blue";}
                    elseif($payment->order_status=='2'){echo "Brown";}
                    elseif($payment->order_status=='3'){echo "Green";}
                    else{echo "Orange";} ?>;font-weight:bold">
                    <?php  
                    if($payment->order_status=='' || $payment->order_status=='0'){echo "Not Assigned";}
                    elseif($payment->order_status=='1'){echo "Assigned" ?>  
                    <?php } 
                    elseif($payment->order_status=='2'){ ?>
                    <?php echo "In-Progress";  ?> <?php }
                    elseif($payment->order_status=='3'){ ?>
                    <?php echo "Delivered";  ?> <?php }
                    else{
                    echo "N/A";
                    }
                    ?>
                  </td>
                   <td><?php echo $payment->order_price; ?></td> 
                  <td></td>
                  <td><a href="" class="btn btn-primary">Pay</td>
                </tr>
                 <?php }?>
                </tbody>              
              </table>
              <?php else: ?>
              <center>
                <strong>No Payments Found</strong>
              </center>
              <?php endif; ?>
            </div>
            <!-- /.box-body -->
          </div>

</div>
</div>
</div>