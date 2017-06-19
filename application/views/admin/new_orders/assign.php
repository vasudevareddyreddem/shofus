 <!--main content start-->
  <section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-users" aria-hidden="true"></i>Assign Orders</h3>
         <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="<?php echo base_url();?>admin/dashboard">Home</a></li>
            <li><i class="fa fa-users" aria-hidden="true"></i>Assign Orders</li>
           <!-- <li><i class="fa fa-square-o"></i>Starters</li>-->
          </ol>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <section class="panel">
            <header class="panel-heading">Assign Orders</header>
            <div class="panel-body">
             <?php if($ordersdata): ?>

             <form action="<?php echo base_url(); ?>admin/assign_orders/assigned_insert/<?php echo $this->uri->segment('4'); ?>" method="post" enctype="multipart/form-data">
              <div><?php echo $this->session->flashdata('message');?></div>

                <div class="form-group nopaddingRight col-md-6">
                  <label for="exampleInputEmail1">Order</label>
                     <select class="form-control" name="order_id" id="order_id"  required >
                 <option value="">Select Order</option>
                 <?php foreach($ordersdata as $orders_data) { ?>
                <option  <?php echo  set_select('order_id', $orders_data->order_id ); ?>    value="<?php echo $orders_data->order_id ; ?>"><?php echo $orders_data->product_name.' ('.$orders_data->customer_address.')' ; ?></option>               
                <?php } ?>
                  </select>
                      <span style="color:red"> <?php echo form_error('order_id'); ?> </span>
                </div>

                <div class="clearfix"></div>
                <button type="submit" class="btn btn-primary">Assign</button>
                <button type="submit" class="btn btn-danger" onclick="window.location='<?php echo base_url(); ?>admin/assign_orders';return false;">Cancel</button>
              </form>
              <?php else: ?>
              <center>
                <strong>No Orders Availble</strong>
              </center>

              <?php endif; ?>
            </div>
          </section>
        </div>
      </div>
      <!-- page start--> 
      <!-- page end--> 
    </section>
  </section>
  <!--main content end--> 



