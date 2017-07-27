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
			<small>Season sale</small>
			<ol class="breadcrumb hidden-xs">
				<li><a href="<?php echo base_url('seller/dashboard');?>"><i class="pe-7s-home"></i> Home</a></li>
				<li class="active">Season sale</li>
			</ol>
		</div>
	</section>
  	<section class="content ">
  		<div class="faq_main">
  	<a href="<?php echo base_url('seller/showups/addseasonsale');?>" class="btn btn-primary pull-right">Add</a>
   <?php if(!empty($catitemdata))  { ?>
    <div class="container" style="width:100%">
	
      <!--<h1 class="head_title">My Listings</h1>-->
	  <?php //echo '<pre>';print_r($catitemdata1);exit;  ?>
      <div class="faq">

	  <?php //echo '<pre>';print_r($catitemdata1);exit;  ?>
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
	   <?php  $i=1;foreach($catitemdata1 as $catitem_data1 )  {  ?> 		
		 <a id="btn_chang<?php echo $i;?>" onclick="addtabactive(<?php echo $i;?>);addtabactives(<?php echo $i;?>);" href="#gry<?php echo $i;  ?>" class="btn btn-large btn-info" data-toggle="tab"><?php echo $catitem_data1->category_name;   ?></a>

	<?php $i++;} ?>

	
        <?php $kk=1; foreach($catitemdata as $catitem_data )  {    ?>
        <!--<h1 onclick="document.getElementById('gry').style.display='block'">GETTING STARTED</h1>-->
        <div class="tab-content">
              <div class="tab-pane" id="gry<?php echo $kk; ?>">
              <?php 
			foreach($catitem_data->docs as $subcategory){?>
			<?php $space =  $subcategory->subcategory_name; 
			
			$nospace = str_replace(array(' ',';','/','_', '<','@','+','-','$',':','.','^','|','?','!','#','~', ',', '>', '&', '{', '}','(', ')', '*'), array('_'), $space);
			
			?>
              <div style="padding:10px;" class="panel panel-default mar_t10">
                <div class="panel-heading" role="tab" id="headingOne<?php echo $nospace;  ?>">
                  <h4 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion" onclick="sibcategoryproductlist(<?php echo $subcategory->subcategory_id;  ?>);" href="#collapseOne<?php echo $nospace;  ?>" aria-expanded="true" aria-controls="collapseOne<?php echo $nospace;  ?>"> <i class="more-less glyphicon glyphicon-plus"></i> <?php echo $subcategory->subcategory_name; ?> </a> </h4>
                </div>
                <div id="collapseOne<?php echo $nospace;  ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne<?php echo $nospace;  ?>">
		
	<form  id="frm-example<?php echo $subcategory->subcategory_id;?>" name="frm-example<?php echo $subcategory->subcategory_id;?>" action="" method="POST">
		<table  id="tables<?php echo $subcategory->subcategory_id;  ?>" class="display" width="100%" cellspacing="0">
        <thead>
            <tr>
                
				
				<th>Item Name</th>
                <th>Item Price</th>
                <th>Offer percentage</th>
                <th>offer Amount</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>               
            </tr>
        </thead>
      
             <tbody>
					<?php  
					foreach($subcategory->docs12 as $item_data){
					//echo '<pre>';print_r($item_data);exit;							
						?>
					<tr>						
						<td><?php echo $item_data->item_name;?></td>
						<td><?php echo $item_data->item_price;?></td>
						<td><?php echo $item_data->offer_percentage;?></td>
						<td><?php echo $item_data->offer_amount;?></td>
						<td><?php echo $item_data->intialdate;?></td>
						<td><?php echo $item_data->expairdate;?></td>	
						<td><a href="<?php echo base_url('seller/showups/seasonsaleactive/'
						.base64_encode($item_data->season_sales_id).'/'
						.base64_encode($item_data->status)); ?>">
						<?php if($item_data->status== 0)
						{echo 'Deactive';}
						else{echo "Active";}
						?></a></td>

					</tr>
				  <?php  } ?>
				  </tbody>
    </table>

	
                </div>
              </div>
              <script type="text/javascript">
              	$(document).ready(function(){
    $('#tables<?php echo $subcategory->subcategory_id;  ?>').DataTable();
});
              </script>
			<?php }?>
              </div>
             
             
              
            </div>
        <!-- container --> 
	   <?php $kk++;}?>
      </div>
    </div>
   <?php } else {?>
   
   <div class="container">
	
      <h1 class="head_title">Your Season sales List Is Empty Click add Button To Add Season sales.Thank You!</h1>
   
   </div>
   
   <?php } ?>
  			<!-- <a href="<?php echo base_url('seller/showups/addseasonsale');?>" class="btn btn-primary">Add</a>
  			<a href="<?php echo base_url('seller/showups/activeseasonsale');?>" class="btn btn-success">Active</a> -->
  				
			</div>
    </section>
    </div>
	
<script type="text/javascript">
		function addtabactives(val)
{
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