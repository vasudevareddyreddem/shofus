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
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                 
                  <th>Seller Id</th>
                  <th>Seller Name</th>
				  <th>Orders Count</th>
                  <th>Transaction Amount</th>                  
                  <th>Commission Amount</th>                  
                  <th>Amount to be deposited</th>                  
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php  
                  foreach($seller_payment as $payment) {?>
                <tr>                  
                  <td><?php echo $payment['seller_rand_id']; ?></td>
                  <td><?php echo $payment['seller_name']; ?></td>
                  <td><a href="<?php echo base_url('inventory/sellerpaymentdetails/'.base64_encode($payment['seller_id'])); ?>"><?php echo $payment['orderscount']; ?></a></td>
                  <td><?php echo $payment['totalamount']; ?></td>
                  <td><?php echo $payment['commissionamount']; ?></td>
                  <td><?php echo ($payment['totalamount']) - ($payment['commissionamount']); ?></td>
                  <td><a href="" class="btn btn-primary">Pay</td>
                </tr>
                 <?php }?>
                </tbody>              
              </table>
            
            </div>
            <!-- /.box-body -->
          </div>

</div>
</div>
</div>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>