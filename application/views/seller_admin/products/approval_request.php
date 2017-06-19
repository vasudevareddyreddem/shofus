  <!--main content start-->
  <div class="col-md-9">
  <section id="main-content">
    <section class="wrapper">
     
      <div class="row">
        <div class="col-md-12">
          <section class="panel">
            <header class="panel-heading">
              <h3>Track Approval Requests</h3>
            </header>
            <div class="panel-body"> 
            <!--  <a href="<?php //echo base_url(); ?>seller_admin/seller_admin_users/create"  class="add_item"><button class="btn btn-primary" type="submit">Add seller_admin Users</button></a>-->
             <div class="clearfix"></div>
              <div><?php echo $this->session->flashdata('message');?></div>
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                 <th>S.No</th>
                 <th>Category</th>
                 <th>Subcategory</th>
                <th>Product Name</th>
                 <th>Product code</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Image</th>
				<th>Product Status</th>
				 <th>Approval Request</th>
                    </tr>
                  </thead>
                  <?php if(!empty($approvalrequestdata)): ?>

              <tbody>
                <?php $k=1;

   foreach($approvalrequestdata as $approvalrequest_data){
     ?>

                <tr>
                  <td><?= $k; ?></td>
                   <td><?php  echo $approvalrequest_data->category_name; ?></td>
				   <td><?php  echo $approvalrequest_data->subcategory_name; ?></td>
				   <td><?php  echo $approvalrequest_data->item_name; ?></td>
				   <td><?php  echo $approvalrequest_data->item_code; ?></td>
				   <td><?php  echo $approvalrequest_data->item_description; ?></td>
                   <td><?php  echo $approvalrequest_data->item_quantity; ?></td>
				   <td><?php  echo $approvalrequest_data->item_cost; ?></td>
				    <?php if($approvalrequest_data->item_image == "") {  ?>
					  
					  <td><img src="<?php echo base_url(); ?>assets/seller_admin/img/avatar1.jpg" class="img-responsive"></td>
					  <?php } else {?>
                      <td><img src="<?php echo base_url();?>uploads/products/<?php  echo $approvalrequest_data->item_image; ?>" width="80" height="50" /></td>
					  <?php } ?>
                    <?php if($approvalrequest_data->item_status == 1) {  ?>
                      <td>Available</td>
					 <?php } else {?>
					 
					 <td>Unavailable</td>
					 <?php } ?>
                  <td><?php if ($approvalrequest_data->admin_status == 0) { echo "<p style='color:orange;'>Pending</p>" ; } else if($approvalrequest_data->admin_status == 1) {echo "<p style='color:green;'>Approved</p>";} else{echo "<p style='color:red;'>Rejected</p>"; } ?></td>
      
                </tr>

                <?php $k++;} ?>

              </tbody>

              <?php else: ?>

              <center>

                <strong>No Records Found</strong>

              </center>

              <?php endif; ?>
                </table>
               
              </div>
            </div>
          </section>
        </div>
      </div>
      <!-- page start--> 
      <!-- page end--> 
    </section>
  </section>
  <!--main content end--> 
</div>
</div>
</div>
</div>
<script language="JavaScript" type="text/javascript">

function checkDelete(id)
{
return confirm('Are you sure want to delete "'+id +'" Order?');
}

</script>



     