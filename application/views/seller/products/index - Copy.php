
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
			<h1>Listings</h1>
			<small>My Listings</small>
			<ol class="breadcrumb hidden-xs">
				<li><a href="index.html"><i class="pe-7s-home"></i> Home</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div>
	</section>
  <section class="content ">
  <div class="faq_main">
   <?php if(!empty($catitemdata))  { ?>
    <div class="container" style="width:100%">
	
      <!--<h1 class="head_title">My Listings</h1>-->
	 <div><?php echo $this->session->flashdata('message');?></div>
      <div class="faq"> 
	  
        <?php  foreach($catitemdata as $catitem_data )  {    ?>
        <!--<h1 onclick="document.getElementById('gry').style.display='block'">GETTING STARTED</h1>-->
        <h1 data-toggle="collapse" data-target="#gry<?php echo $catitem_data->category_name;?>"><?php echo $catitem_data->category_name;   ?></h1>
        <div class="demo"> 
          <!--<div id="gry" style="display:none">-->
          <div id="gry<?php echo $catitem_data->category_name;   ?>" class="collapse">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			<?php 
			foreach($catitem_data->docs as $subcategory){?>
			<?php $space =  $subcategory->subcategory_name; 
			
			$nospace = str_replace(' ','',$space);
			
			?>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne<?php echo $nospace;  ?>">
                  <h4 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?php echo $nospace;  ?>" aria-expanded="true" aria-controls="collapseOne<?php echo $nospace;  ?>"> <i class="more-less glyphicon glyphicon-plus"></i> <?php echo $subcategory->subcategory_name; ?> </a> </h4>
                </div>
                <div id="collapseOne<?php echo $nospace;  ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne<?php echo $nospace;  ?>">
                  <div class="panel-body">
          <section class="panel">
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Item Name</th>
                      <th>Item Code</th>
                      <th>Description</th>
                      <th>Quantity</th>
                      <th>Item Cost</th>
                      <th>Image</th>
                      <th>Status</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
				  <?php $k=1; 
				  foreach($subcategory->docs12 as $item_data){?>
                    <tr>
                      <td><?= $k; ?></td>
                      <td><?php echo $item_data->item_name;?></td>
                      <td><?php echo $item_data->item_code;?></td>
                      <td><?php echo $item_data->item_description;?></td>
                      <td><?php echo $item_data->item_quantity;?></td>
                      <td><?php echo $item_data->item_cost;?></td>
					  <?php if($item_data->item_image == "") {  ?>
					  <td><img src="<?php echo base_url(); ?>assets/seller/img/avatar1.jpg" class="img-responsive"></td>
					  <?php } else {?>
                      <td><img src="<?php echo base_url();?>uploads/products/<?php  echo $item_data->item_image; ?>" width="80" height="50" /></td>
					  <?php } ?>
					 <!--<td><img src="img/avatar1.jpg" class="img-responsive"></td>-->
					 <?php if($item_data->item_status == 1) {  ?>
                      <td>Available</td>
					 <?php } else {?>					 
					 <td>Unavailable</td>
					 <?php } ?>
                      <td><a href="<?php echo site_url(); ?>seller/products/edit/<?php  echo $item_data->item_id; ?>/<?php  echo $item_data->category_id; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                      <td><a href="<?php echo site_url(); ?>seller/products/delete/<?php  echo $item_data->item_id; ?>"onclick="return checkDelete('<?php  echo $item_data->item_name; ?>')"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                    </tr>
				  <?php $k++; } ?>
                  </tbody>
                </table>
              </div>
          </section>
				  </div>
                </div>
              </div>
			<?php }?>
            </div>
          </div>
          <!-- panel-group -->
          
         
        </div>
        <!-- container --> 
	   <?php }?>
      </div>
    </div>
   <?php } else {?>
   
   <div class="container">
	
      <h1 class="head_title">Welcome to the Cart In Hour</h1>
   
   </div>
   
   <?php } ?>
  </div>
  
     
  

 
  
  <!--body end here --> 
  <script language="JavaScript" type="text/javascript">
function checkDelete(id)
{
  
return confirm('Are you sure want to delete "'+id +'" product?');
}
</script>
</section>
  </div> 
  </div>