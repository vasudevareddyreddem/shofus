


 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Sellers</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Seller Names</a></li>
      </ol>
    </section>
 <section class="content">
      <div class="row">
        <div class="col-xs-12">
        <a class="btn btn-primary" href="<?php echo base_url('inventory/dashboard');?>">BAck</a>
      <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?php echo isset($category_name['category_name'])?$category_name['category_name']:''; ?> &nbsp; category Wise Sellers lists</h3>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
			<?php //echo '<pre>';print_r($seller_category);exit; ?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Categoty Name</th>
                  <th>Seller ID</th>
                  <th>Seller Name</th>              
                  <th>Seller Email</th>              
                  <th>Seller Mobile</th>              
                  <th>Status</th>              
                  <th>Action</th>              
                </tr>
                </thead>
                <tbody>
                <?php foreach($seller_category as $sellers) { ?>
               <tr>                  
                  <td><?php echo $sellers['category_name']; ?></td> 
				  <td><a href="<?php echo base_url('inventory/sellerdetails/'.base64_encode($sellers['seller_id']).'/'.base64_encode($sellers['seller_category_id']).'/'.'direct'); ?>"><?php echo $sellers['seller_rand_id']; ?></a></td>    
				  <td><?php echo $sellers['seller_name']; ?></td>    
				  <td><?php echo $sellers['seller_email']; ?></td>    
				  <td><?php echo $sellers['seller_mobile']; ?></td>    
                  <td><?php if($sellers['status']==1){ echo "Active";}else{ echo "Deactivae";} ?></td>                  
                  <td><a href="<?php echo base_url('inventory/sellerdetails/'.base64_encode($sellers['seller_id']).'/'.base64_encode($sellers['seller_category_id']).'/'.'direct'); ?>">View</a></td>                  
				
                 </tr>  
				<?php } ?>
                </tbody>                
              </table>
         
            </div>
            <!-- /.box-body -->
          </div>
          </div>
          </section>
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
