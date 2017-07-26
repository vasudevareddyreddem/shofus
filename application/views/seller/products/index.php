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
			<h1>Listings</h1>
			<small>My Listings</small>
			<ol class="breadcrumb hidden-xs">
				<li><a href="<?php echo base_url('seller/dashboard');?>"><i class="pe-7s-home"></i> Home</a></li>
				<li class="active">Listings</li>
			</ol>
		</div>
	</section>
  <section class="content ">
  <div class="faq_main">
    <div class="container" style="width:100%">
	
      <!--<h1 class="head_title">My Listings</h1>-->
	  <?php //echo '<pre>';print_r($catitemdata1);exit;  ?>
	 <div><?php echo $this->session->flashdata('message');?></div>
      <div class="faq">
	  <?php //echo '<pre>';print_r($catitemdata1);exit;

if(count($catitemdata1)>0) {	  ?>

	   <?php  foreach($catitemdata1 as $catitem_data1 )  {  ?> 
    <?php 
    //$space =  $catitem_data1->category_id;
    //$pand =sprintf("%02d", $space);
    //echo "<pre>";print_r($pand);exit; 
    //$space =  $catitem_data1->category_id; 
    //$remove = preg_replace('/^\d+/', '1',$space );
    
     //$remove = str_replace(array(' ',';','/','_', '<','@','+','-','$',':','.','^','|','?','!','#','~', ',', '>', '&', '{', '}','(', ')', '*'), array('_'), $space);
     //$remove = str_replace(array('55'), array('3'),$space);
    $i = -9;
    for($i;$i<=count($i);$i==-9){
      $i++;
    }


    ?>
      
		  <a id="btn_chang<?php echo $catitem_data1->category_id;?>" onclick="addtabactive(<?php echo $catitem_data1->category_id;?>);addtabactives(<?php echo $catitem_data1->category_id;?>);" href="#gry<?php echo $i;?>" class="btn btn-large btn-info" data-toggle="tab"><?php echo $catitem_data1->category_name;   ?></a> 

  

	<?php } ?>

        <?php  foreach($catitemdata as $catitem_data )  {    ?>
        <?php 
        $i = -9;
    for($i;$i<=count($i);$i==-9){
      $i++;
    }
        //$space =  $catitem_data->category_id;
        //$pand =sprintf("%02d", $space); 
        //$remove = preg_replace('/^\d+/', '1',$space );
     //$remove = str_replace(array(' ',';','/','_', '<','@','+','-','$',':','.','^','|','?','!','#','~', ',', '>', '&', '{', '}','(', ')', '*'), array('_'), $space);
        //$remove = str_replace(array('55'), array('3'),$space);?>
        <!--<h1 onclick="document.getElementById('gry').style.display='block'">GETTING STARTED</h1>-->
        <div class="tab-content">
              <div class="tab-pane" id="gry<?php echo $i; ?>">
              <?php 
			foreach($catitem_data->docs as $subcategory){?>
			<?php $space =  $subcategory->subcategory_name; 
			
			$nospace = str_replace(array(' ',';','/','_', '<','@','+','-','$',':','.','^','|','?','!','#','~', ',', '>', '&', '{', '}','(', ')', '*'), array('_'), $space);
			
			?>
              <div class="panel panel-default mar_t10">
                <div class="panel-heading" role="tab" id="headingOne<?php echo $nospace;  ?>">
                  <h4 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?php echo $nospace;  ?>" aria-expanded="true" aria-controls="collapseOne<?php echo $nospace;  ?>"> <i class="more-less glyphicon glyphicon-plus"></i> <?php echo $subcategory->subcategory_name; ?> </a> </h4>
                </div>
                <div id="collapseOne<?php echo $nospace;  ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne<?php echo $nospace;  ?>">
                  <div class="panel-body">
          <section class="panel">
              <div class="table-responsive">
                <table class="table table-bordered table-striped" id="tables<?php echo $nospace;  ?>">
                <script type="text/javascript">
                $(document).ready(function(){
                  $('#tables<?php echo $nospace;  ?>').DataTable();
                });
              </script>
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
        <!-- container --> 
	   <?php }?>
	   
<?php } else{ ?>
You have no products right now. Please add products
<?php } ?>
      </div>
    </div>
   
  </div>
  
     

  <!--body end here --> 
 
</section>
  </div> 
  </div>

  <script type="text/javascript">
    function addtabactives(val)
{
  //alert(val);exit;
  $("#btn_chang"+val).removeClass("btn-info");
  $("#btn_chang"+val).addClass("btn-primary");
  var cnt;
    var count =<?php echo $cnt;?>;
  //var cnt='';
  for(cnt = 1; cnt <= count; cnt++){
    if(cnt!=val){
      $("#btn_chang"+cnt).removeClass("btn-primary");
      $("#btn_chang"+cnt).addClass("btn-info");
    }             
  }
      

}
function addtabactive(id)
{
  //alert(id);exit;
  $("#gry"+id).addClass("active");
  var cnt;
    var nt =<?php echo $cnt;?>;
  //var cnt='';
  for(cnt = 1; cnt <= nt; cnt++){
    if(cnt!=id){
      $("#gry"+cnt).removeClass("active");
    }             
  }
      
}

  </script>

  