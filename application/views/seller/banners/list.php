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
			<small>category Page banner</small>
			<ol class="breadcrumb hidden-xs">
				<li><a href="<?php echo base_url('seller/dashboard');?>"><i class="pe-7s-home"></i> Home</a></li>
				<li class="active">category Page banner</li>
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
              <h3 class="box-title">category page Banners List</h3>
              <a href="<?php echo base_url('seller/showups/catehorybanner/');?> " class="pull-right btn btn-sm btn-primary">ADD</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Image</th>
                  <th>Category page Position</th>
                  <th>Link Page</th>
                  <th>Created Date</th>
                  <th>Expiry Date</th>
                  <th>Status</th>
                  <th>Home Page Status</th>
                  <th>Action</th>
                  
                </tr>
                </thead>
                <tbody>
                <?php foreach($banner_list as $banner) { ?>
                <tr>
                  <td><?php echo $banner['name']; ?></td>
                    <td><img src="<?php echo base_url();?>assets/categoryimages/<?php  echo $banner['name']; ?>" width="80" height="50" /></td>

                  <td><?php if($banner['position']==1){
					  echo "First position";
					  }else if($banner['position']==2){
						  echo "Second position"; 
					  }else if($banner['position']==3){
						  echo "third position"; 
					  }else if($banner['position']==4){
						  echo "Fourth position"; 
					  }else if($banner['position']==5){
						  echo "Fifth position"; 
					  } ?></td>
                  <td><?php if($banner['link']==1){
					  echo "Category";
					  }else if($banner['link']==2){
						  echo "Subcategory"; 
					  }else if($banner['link']==3){
						  echo "Subitem"; 
					  }else if($banner['link']==4){
						  echo "Item"; 
					  }else if($banner['link']==5){
						  echo "Single Product"; 
					  } ?></td>
                  <td><?php echo $banner['created_at']; ?></td>
                  <td><?php echo $banner['expirydate']; ?></td>
                  <td><?php 
                  if($banner['status']==1){echo "Active";}else{echo "Deactive";} ?>
                  	
                  </td>
				  <td><?php 
                  if($banner['admin_status']==1){echo "Active";}else{echo "Deactive";} ?>
                  	
                  </td>
                  <td><a href="<?php echo base_url('seller/showups/categorybanner_status/'
						.base64_encode($banner['baneer_id']).'/'
						.base64_encode($banner['status'])
						); ?>">
						<?php if($banner['status']== 0)
						{echo 'Deactive';}
						else{echo "Active";}
						?></a>| <a href="<?php echo base_url('seller/showups/categorybanner_delete/'
						.base64_encode($banner['baneer_id']).'/'
						.base64_encode($banner['status'])
						); ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
						
                </tr>
                <?php } ?>
                </tbody>

                </tbody>
                
              </table>
            </div>
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