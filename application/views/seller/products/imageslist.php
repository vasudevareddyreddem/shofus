<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendor/datatable/jquery.dataTables.min.css">

<script src="<?php echo base_url();?>assets/vendor/datatable/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendor/datatable/base/jquery-ui.css">
<script src="<?php echo base_url();?>assets/vendor/datatable/jquery-ui.js"></script>
<div class="content-wrapper mar_t_con" >
<section class="content-header">
		<div class="header-icon">
			<i class="pe-7s-note2"></i>
		</div>
		<div class="header-title">
			<form action="#" method="get" class="sidebar-form search-box pull-right hidden-md hidden-lg hidden-sm">
				<div class="input-group">
					<input type="text" name="q" class="form-control" placeholder="Search...">
					<span class="input-group-btn">
						<button type="submit" name="search" id="search-btn" class="btn"><i class="fa fa-search"></i></button>
					</span>
				</div>
			</form>  
			<h1>Image urls</h1>
			<small>Image urls</small>
			<ol class="breadcrumb hidden-xs">
				<li><a href="<?php echo base_url('seller/dashboard'); ?>"><i class="pe-7s-home"></i> Home</a></li>
				<li class="active">Image urls</li>
			</ol>
		</div>
	</section>
  <section class="content ">
  <section id="main-content">
    <section class="wrapper">
      
      <div class="row">
        <div class="col-md-12">
          <section class="panel">
            <header class="panel-heading">
              <h3>Image urls</h3>
            </header>
            <div class="panel-body"> 
            <!--  <a href="<?php //echo base_url(); ?>seller/seller_users/create"  class="add_item"><button class="btn btn-primary" type="submit">Add seller Users</button></a>-->
             <div class="clearfix"></div>
              <div><?php echo $this->session->flashdata('message');?></div>
              <div class="table-responsive">
			  
			  <?php if(count($imglist)>0){ ?>
                <table class="table table-bordered table-striped" id="example1">
                  <thead>
                    <tr>
                <th>Image Id</th>
                <th>Name</th>                
                <th>url</th>                
                <th>Image</th>                
                 </tr>
                  </thead>

              <tbody>
			  
			  <?php  foreach ($imglist as $list) { ?>
                 <tr>
                  <td><?php  echo $list['img_id']; ?></td>
                  <td><?php  echo $list['img_name']; ?></td>
                  <td><?php  echo base_url('uploads/products/'.$list['img_name']); ?></td>
                  <td>
				  <img src="<?php echo base_url('uploads/products/'.$list['img_name']);?>" width="80" height="50" ></td>
				</tr>
				  
			  <?php } ?>

              </tbody>

                </table>
				<?php  }else{ ?>
			  <div>NO data available</div>
			  <?php } ?>
                
              </div>
            </div>
          </section>
        </div>
      </div>
      <!-- page start--> 
      <!-- page end--> 
    </section>
  </section>
  </section>
  </div>
  <!--main content end--> 

<script language="JavaScript" type="text/javascript">

$(document).ready(function() {
    $('#example1').DataTable( {
        "order": [[ 0, "desc" ]]
    } );
} );
</script>



     