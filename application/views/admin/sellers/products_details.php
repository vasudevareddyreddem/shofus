  <!--main content start-->
  <section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
      <div class="row">
       <div class="col-md-7">
           <h3 class="page-header"><i class="fa fa-users" aria-hidden="true"></i>Seller Products</h3></div>
          </div>
          <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="<?php echo base_url();?>admin/dashboard">Home</a></li>
            <li><i class="fa fa-users" aria-hidden="true"></i>Seller Products</li>
          </ol>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <section class="panel">
            <header class="panel-heading">
              <h3>Seller Products</h3>
            </header>
            <div class="panel-body">   
			<a href="<?php echo base_url(); ?>admin/sellers"  class="add_item"><button class="btn btn-primary" type="submit">Back</button></a>
                    
                    <div class="clearfix"></div>
                    <div><?php echo $this->session->flashdata('message');?></div>
              <div class="table-responsive">      
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                       <th>S.NO</th>
                       <th>Category</th>
                       <th>Subcategory</th>
                       <th>Product Name</th>
                       <th>Product code</th>
					   <th>Description</th>
					   <th>Quantity</th>
					   <th>Price</th>
					   <th>Image</th>
                       <th>Product Status</th>
					   <th>Status</th>
					    <th>Approve</th>
                      <th>Reject</th>
                    </tr>
                  </thead>
                  <?php if(!empty($sellerproductsdata)): ?>
                  <tbody>
                     <?php $k = 1;

   foreach($sellerproductsdata as $sellerproducts_data){?>

    <tr>

      <td><?= $k; ?></td>

      <td><?php  echo $sellerproducts_data->category_name; ?></td>
      <td><?php  echo $sellerproducts_data->subcategory_name; ?></td>
	  <td><?php  echo $sellerproducts_data->item_name; ?></td>
	  <td><?php  echo $sellerproducts_data->item_code; ?></td>
	  <td><?php  echo $sellerproducts_data->item_description; ?></td>
	  <td><?php  echo $sellerproducts_data->item_quantity; ?></td>
	  <td><?php  echo $sellerproducts_data->item_cost; ?></td>
	  <?php if($sellerproducts_data->item_image == "") {  ?>
					  
					  <td><img src="<?php echo base_url(); ?>assets/seller_admin/img/avatar1.jpg" class="img-responsive"></td>
					  <?php } else {?>
                      <td><img src="<?php echo base_url();?>uploads/products/<?php  echo $sellerproducts_data->item_image; ?>" width="80" height="50" /></td>
					  <?php } ?>
	  <?php if($sellerproducts_data->item_status == 1) {  ?>
                      <td>Available</td>
					 <?php } else {?>
					 
					 <td>Unavailable</td>
					 <?php } ?>
	
	  
      <td><?php if ($sellerproducts_data->admin_status == 0) { echo "<p style='color:orange;'>Pending</p>" ; } else if($sellerproducts_data->admin_status == 1) {echo "<p style='color:green;'>Approved</p>";} else{echo "<p style='color:red;'>Rejected</p>"; } ?></td>
     
	  <td><a href="<?php echo base_url(); ?>admin/sellers/approve_status/<?php  echo $sellerproducts_data->item_id; ?>/<?php  echo $sellerproducts_data->seller_id; ?>" onclick="return checkDelete('<?php  echo $sellerproducts_data->item_name; ?>')"><img src="<?php echo base_url(); ?>assets/admin/img/download.jpg" style="width:30px;height:30px;" class="img-responsive"></a></td>
	  <td><a href="<?php echo base_url(); ?>admin/sellers/reject_status/<?php  echo $sellerproducts_data->item_id; ?>/<?php  echo $sellerproducts_data->seller_id; ?>" onclick="return checkDelete12('<?php  echo $sellerproducts_data->item_name; ?>')"><img src="<?php echo base_url(); ?>assets/admin/img/diapprove.png" style="width:30px;height:30px;" class="img-responsive"></a></td>
   


    </tr>

    <?php $k++; } ?>

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

<script language="JavaScript" type="text/javascript">

function checkDelete(id)
{
return confirm('Are you sure want to Approve "'+id +'" Product?');
}


function checkDelete12(id)
{
return confirm('Are you sure want to Reject "'+id +'" Product?');
}
</script>



     