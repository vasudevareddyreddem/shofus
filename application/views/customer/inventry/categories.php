<div class="content-wrapper pad_t100">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">            
      <div class="row">
      <?php foreach($category as $names) { ?>
        <div class="col-lg-3 col-xs-6">          
          <div class="small-box ">
            <div class="inner text-center">
              <h4><?php echo $names['category_name'];?></h4>
            </div>           
          <!--  <a href="<?php echo base_url('inventory/categorywisesellers/'.base64_encode($names['category_id']));?>" class="small-box-footer">Sellers List<i class="fa fa-arrow-circle-right"></i></a>-->
          </div>
        </div>
        <?php } ?>
      </div>
	  </section>
	  
	  </div>

	