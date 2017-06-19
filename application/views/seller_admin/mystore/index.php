 
 
 <div class="col-md-9">
   <!--body start here -->
  <div class="faq_main">
    <div class="container" style="width:100%">
      <h1 class="head_title">Store Details</h1>
	  <div><?php echo $this->session->flashdata('message');?></div>
      <div class="faq"> 
        
        <!--<h1 onclick="document.getElementById('gry').style.display='block'">GETTING STARTED</h1>-->
        <h1 data-toggle="collapse" data-target="#storedetails">My Store</h1>
        <div class="demo"> 
          <!--<div id="gry" style="display:none">-->
          <div id="storedetails" class="collapse">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
             
                  <div class="panel-body">

                      <section id="main-content">
    <section class="wrapper">
      <!--<div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-cutlery" aria-hidden="true"></i>Add <?php //echo $catname->category_name;?> Item Details</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="<?php //echo base_url();?>seller_admin/dashboard">Home</a></li>
            <li><i class="fa fa-cutlery" aria-hidden="true"></i><?php //echo $catname->category_name;?></li>
            <li><i class="fa fa-square-o"></i><?php //echo $subcatname->subcategory_name;?></li>
          </ol>
        </div>
      </div>-->
      <div class="row">
        <div class="col-lg-12">
          <section class="panel">
            <!--<header class="panel-heading"> Basic Forms </header>-->
			
            <div class="panel-body">
			
              <form>
			  
				 <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">Store Name</label>
                  <input class="form-control" placeholder="Store Name" type="text" id="seller_shop" name="seller_shop" value="<?php echo $partsellerlocationdata->seller_shop;   ?>" readonly>
				  <!--<span style="color:red" id="erroritemname"></span>-->
           </div>

           <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">Store Location</label>
                  <input class="form-control" placeholder="Store Location" type="text" id="seller_location" name="seller_location" value="<?php echo $partsellerlocationdata->seller_location;   ?>" readonly>
          <!--<span style="color:red" id="erroritemcode"></span>-->
           </div>
		   
		    <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">Store Timings</label>
                  <input class="form-control" placeholder="Store Timings" type="text" id="seller_servicetime" name="seller_servicetime" value="<?php echo $partsellerlocationdata->seller_servicetime;   ?>" readonly>
          <!--<span style="color:red" id="erroritemcode"></span>-->
           </div>

				
				
                
                <div class="clearfix"></div>
				
				
				
               
				
                
				<!--<div style="margin-top: 20px; margin-left: 15px;">
                <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
                <button type="submit" class="btn btn-danger" onclick="window.location='<?php //echo base_url(); ?>seller_admin/personnel_details';return false;">Cancel</button>
				</div>-->
              </form>
            </div>
          </section>
        </div>
      </div>
      <!-- page start--> 
      <!-- page end--> 
    </section>
  </section>









				  </div>
             
            </div>
          </div>
          <!-- panel-group -->
         
		 
		 
		<h1 data-toggle="collapse" data-target="#inventorydetails">My Inventory</h1> 
		 
		 
		 
		 
		 
	    <div id="inventorydetails" class="collapse">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
             
                  <div class="panel-body">

                      <section id="main-content">
    <section class="wrapper">
      <!--<div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-cutlery" aria-hidden="true"></i>Add <?php //echo $catname->category_name;?> Item Details</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="<?php //echo base_url();?>seller_admin/dashboard">Home</a></li>
            <li><i class="fa fa-cutlery" aria-hidden="true"></i><?php //echo $catname->category_name;?></li>
            <li><i class="fa fa-square-o"></i><?php //echo $subcatname->subcategory_name;?></li>
          </ol>
        </div>
      </div>-->
      <div class="row">
        <div class="col-lg-12">
          <section class="panel">
            <!--<header class="panel-heading"> Basic Forms </header>-->
			
            <div class="panel-body">
			
			
			
			
			
			
			 <div class="faq"> 
	  
        <?php  foreach($catitemdata as $catitem_data )  {    ?>
        <!--<h1 onclick="document.getElementById('gry').style.display='block'">GETTING STARTED</h1>-->
        <h1 data-toggle="collapse" data-target="#gry<?php echo $catitem_data->category_name;   ?>"><?php echo $catitem_data->category_name;   ?></h1>
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
					  
					  <td><img src="<?php echo base_url(); ?>assets/seller_admin/img/avatar1.jpg" class="img-responsive"></td>
					  <?php } else {?>
                      <td><img src="<?php echo base_url();?>uploads/products/<?php  echo $item_data->item_image; ?>" width="80" height="50" /></td>
					  <?php } ?>
					 <!--<td><img src="img/avatar1.jpg" class="img-responsive"></td>-->
					 <?php if($item_data->item_status == 1) {  ?>
                      <td>Available</td>
					 <?php } else {?>
					 
					 <td>Unavailable</td>
					 <?php } ?>
                      <td><a href="<?php echo site_url(); ?>seller_admin/products/edit/<?php  echo $item_data->item_id; ?>/<?php  echo $item_data->category_id; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                      <td><a href="<?php echo site_url(); ?>seller_admin/products/delete/<?php  echo $item_data->item_id; ?>"onclick="return checkDelete('<?php  echo $item_data->item_name; ?>')"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
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
          </section>
        </div>
      </div>
      <!-- page start--> 
      <!-- page end--> 
    </section>
  </section>









				  </div>
             
            </div>
          </div>	 
		 
		 
		 
		 
		 
		 
		 
		 
          
    
          
         
        </div>
        <!-- container --> 
        
      </div>
    </div>
  </div>
  
  </div>
  </div>
   </div>
   </div>
   
  <!--body end here -->