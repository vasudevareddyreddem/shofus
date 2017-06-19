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
			<h1>Returns</h1>
			<small>My Returns</small>
			<ol class="breadcrumb hidden-xs">
				<li><a href="index.html"><i class="pe-7s-home"></i> Home</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div>
	</section>
  <section class="content ">
  <!--header part end here --> 
  <!--body start here -->
   
  <div class="faq_main">

    <div class="container" style="width:100%">
	
    
	 <div><?php echo $this->session->flashdata('message');?></div>
      <div class="faq"> 
	  
        <?php  foreach($returncatitemdata as $returncatitem_data )  {    ?>
        <!--<h1 onclick="document.getElementById('gry').style.display='block'">GETTING STARTED</h1>-->
        <h1 data-toggle="collapse" data-target="#gry<?php echo $returncatitem_data->category_name;   ?>"><?php echo $returncatitem_data->category_name;   ?></h1>
        <div class="demo"> 
          <!--<div id="gry" style="display:none">-->
          <div id="gry<?php echo $returncatitem_data->category_name;   ?>" class="collapse">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			<?php 
			foreach($returncatitem_data->returndocs as $subcategory){?>
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
                      <th>Order Id</th>
                      <th>Seller Name</th>
                      <th>Product Id</th>
                      <th>Product Name</th>
                      <th>Delivery Date</th>
                      <th>Delivery Time</th>
                      <th>Customer Details</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <?php if(!empty($subcategory->returndocs12)): ?>
              <tbody>
                <?php $count = $this->uri->segment(4, 0);
   foreach($subcategory->returndocs12 as $orders_data){?>
                <tr>
                  <td><?= ++$count ?></td>
                  <td><?php  echo $orders_data->order_id; ?></td>
                  <td><?php  echo $orders_data->seller_name; ?></td>
                  <td><?php  echo $orders_data->item_id; ?></td>
                  <td><?php  echo $orders_data->product_name; ?></td>
                 <td><?php  echo $orders_data->delivery_date; ?></td>
                  <td><?php  echo $orders_data->delivery_time; ?></td>

                   <td><table class="table table-bordered qtytable">
                    <tbody>
                      <tr>
                        <th>Name</th>
                        <td><?php  echo $orders_data->customer_name; ?></td>
                      </tr>
                      <tr>
                        <th>Mobile</th>
                        <td><?php  echo $orders_data->customer_phone; ?></td>
                      </tr>
                      <tr>
                        <th>Email</th>
                        <td><?php  echo $orders_data->customer_email; ?></td>
                      </tr>
                      <tr>
                        <th>Address</th>
                        <td><?php  echo $orders_data->customer_address; ?></td>
                      </tr>
                    </tbody>
                  </table></td>
          <td>  <a href="<?php echo base_url(); ?>seller/orders/delete/<?php  echo $orders_data->order_id; ?>" onclick="return checkDelete('<?php  echo $orders_data->order_id; ?>')"><i class="fa fa-trash-o" style="font-size:18px"></i></a></td>

                
                </tr>

                <?php } ?>

              </tbody>

              <?php else: ?>

              <center>

                <strong>No Records Found</strong>

              </center>

              <?php endif; ?>
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
  
  </div>
  </section>
  </div>

  <!--body end here --> 
  <script language="JavaScript" type="text/javascript">
function checkDelete(id)
{
  
return confirm('Are you sure want to delete "'+id +'" product?');
}
</script>