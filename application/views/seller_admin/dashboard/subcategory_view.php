<!--main content start-->
  <section id="main-content">
    <section class="wrapper"> 
      <!--overview start-->
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
            <li><i class="fa fa-laptop"></i>Dashboard</li>
          </ol>
        </div>
      </div>
      <div class="row">
	  
	  <?php foreach($sellerdata as $seller_data)    {?>
	  <a href="<?php echo site_url(); ?>seller_admin/products/<?php echo  $seller_data->category_id; ?>/<?php echo  $seller_data->subcategory_id; ?>" >
        <div class="col-lg-4 col-md-3 col-sm-12 col-xs-12">
          <div class="info-box blue-bg"> <i class="fa fa-list" aria-hidden="true"></i>
            <div class="count"><?php echo  $seller_data ->subcategory_name;  ?></div>
            <div class="title">Sellers</div>
          </div>
          <!--/.info-box--> 
        </div>
        <!--/.col-->
		</a>
	  <?php } ?>
       
        <!--/.col-->
        
        
        <!--/.col-->
        
       
        <!--/.col--> 
        
      </div>
      <!--/.row--> 
      
      <!-- project team & activity end --> 
      
    </section>
    <!--<div class="text-right">
      <div class="credits"> 
        <a href="https://bootstrapmade.com/free-business-bootstrap-themes-website-templates/">Business Bootstrap Themes</a> by <a href="https://bootstrapmade.com/">BootstrapMade</a> </div>
    </div>--> 
  </section>
  <!--main content end--> 