<div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <div class="container">
         <!-- Main content -->
      <div class="row">
      <?php foreach($category as $names) { ?>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="info-box blue-bg">          
            <a  href="<?php echo base_url('customer/category_wise_sellers/'.base64_encode($names['category_id']));?>" onclick="seller_category(<?php echo $names['category_id'];?>)">
            <div class="count"><?php echo $names['category_name'];?></div></a>
          </div>          
        </div>
        <?php } ?>
      </div>
      </div>
      </div>
<!-- <script type="text/javascript">
      function seller_category(id) {
          alert(id);
        }  



</script> -->


