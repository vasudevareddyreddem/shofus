<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendor/datatable/jquery.dataTables.min.css">

<script src="<?php echo base_url();?>assets/vendor/datatable/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendor/datatable/base/jquery-ui.css">
<script src="<?php echo base_url();?>assets/vendor/datatable/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/bootstrapValidator.js"></script>
<div class="content-wrapper mar_t_con" >
	<section class="content-header">
		<div class="header-icon">
			<i class="pe-7s-note2"></i>
		</div>
		<div class="header-title">
			  
			<h1>Show Ups</h1>
			<small>Home Banners</small>
			<ol class="breadcrumb hidden-xs">
				<li><a href="<?php echo base_url('seller/dashboard');?>"><i class="pe-7s-home"></i> Home</a></li>
				<li class="active">Home Banners</li>
			</ol>
		</div>
	</section>
  	<section class="content ">
  	<?php if($this->session->flashdata('active')): ?>
			<div class="alert dark alert-success alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button><?php echo $this->session->flashdata('active');?></div>	
			<?php endif; ?>
			<?php if($this->session->flashdata('deactive')): ?>
			<div class="alert dark alert-warning alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button><?php echo $this->session->flashdata('deactive');?></div>	
			<?php endif; ?>

				<div class="box">
            <div class="box-header">
              <h3 class="box-title">Home Page Banners List
              <a href="<?php echo base_url('seller/showups/addhomebanner');?>" class="btn btn-primary pull-right">Add</a>
                 <!-- <?php if(count($banner_button)>5){ ?> -->
                  <!-- <a  class="btn btn-danger pull-right">Limit Exceeded</a> -->
                <!-- <?php }else{ ?> -->
                  
                 <!-- <?php } ?> -->
              </h3>
            </div>
            <!-- /.box-header -->
            <?php if(!empty($seller_banner))  { ?>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Seller Id</th>
                  <th>Seller Name</th>
                  <th>Banner</th>
                  <th>Start date</th>
                  <th>End date</th>
                  <th>Status</th>
                  <th>ActionS</th>
                  
                </tr>
                </thead>
                <tbody>
                <?php foreach($seller_banner as $banner) { ?>
                <tr>
                  <td><?php echo $banner['seller_rand_id']; ?></td>
                  <td><?php echo $banner['seller_name'];?></td>
                  <td><img src="<?php echo base_url();?>uploads/banners/<?php  echo $banner['file_name']; ?>" width="80" height="50" /></td>
                  <td><?php echo $banner['intialdate'];?></td>
                  <td><?php echo $banner['expairydate']; ?></td>
                  <td><?php 
                  if($banner['status']==1){echo "Active";}else{echo "Deactive";} ?>
                  	
                  </td>
                  <td><a href="<?php echo base_url('seller/showups/banner_status/'
						.base64_encode($banner['image_id']).'/'
						.base64_encode($banner['seller_id']).'/'
						.base64_encode($banner['status'])
						); ?>">
						<?php if($banner['status']== 0)
						{echo 'Deactive';}
						else{echo "Active";}
						?></a>| <a href="<?php echo base_url('seller/showups/banner_delete/'
						.base64_encode($banner['image_id']).'/'
						.base64_encode($banner['seller_id']).'/'
						.base64_encode($banner['status'])
						); ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
						
                </tr>
                <?php } ?>
                </tbody>

                </tbody>
                
              </table>
            </div>
            <?php } else {?>
   
   <div class="container">
  
      <h1 class="head_title">Home Banners List Is Empty Click add Button To Add Home Banners.Thank You!</h1>
   
   </div>
   
   <?php } ?>
            <!-- /.box-body -->
          </div>
			</div>
    </section>
    </div>
    <script type="text/javascript">


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