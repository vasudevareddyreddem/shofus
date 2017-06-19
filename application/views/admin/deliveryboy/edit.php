 <!--main content start-->
  <section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-users" aria-hidden="true"></i>Edit Delivery Boy</h3>
         <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="<?php echo base_url();?>admin/dashboard">Home</a></li>
            <li><i class="fa fa-users" aria-hidden="true"></i>Delivery Boy</li>
           <!-- <li><i class="fa fa-square-o"></i>Starters</li>-->
          </ol>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <section class="panel">
            <header class="panel-heading"> Edit Delivery Boy </header>
            <div class="panel-body">
             <form action="<?php echo base_url(); ?>admin/deliveryboy/update/<?php echo $deliveryboydata->deliveryboy_id;?>" method="post" enctype="multipart/form-data">

              <div><?php echo $this->session->flashdata('message');?></div>
              <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">Delivery Boy Name</label>
                       <input type="text" pattern="[A-Za-z ]+" title="Name accepts alphabets and spaces only"  id="deliveryboy_name" name="deliveryboy_name"  value="<?php if(isset($deliveryboydata->deliveryboy_name)) { echo $deliveryboydata->deliveryboy_name; } else { echo set_value('deliveryboy_name'); }?>" class="form-control">
                      <span style="color:red"> <?php echo form_error('deliveryboy_name'); ?> </span>
                </div>

              <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputPassword1">Email</label>
                          <input type="deliveryboy_email" id="deliveryboy_email" name="deliveryboy_email"  value="<?php if(isset($deliveryboydata->deliveryboy_email)) { echo $deliveryboydata->deliveryboy_email; } else { echo set_value('deliveryboy_email'); }?>" class="form-control" readonly>
                          <span style="color:red"> <?php echo form_error('deliveryboy_email'); ?> </span>
                </div>

              <!--<div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" value="<?php// echo set_value('deliveryboy_password'); ?>" title="Must contain at least one number ,one special character,one uppercase , lowercase letter, and at least 8 or more characters"  id="deliveryboy_password" name="deliveryboy_password" class="form-control">
                    <span style="color:red"> <?php //echo form_error('deliveryboy_password'); ?> </span>
                </div>-->

              <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">Mobile Number</label>
                   <input type="text" title="Enter a Valid Phone Number" id="deliveryboy_mobile" name="deliveryboy_mobile" pattern="^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$"  value="<?php if(isset($deliveryboydata->deliveryboy_mobile)) { echo $deliveryboydata->deliveryboy_mobile; } else { echo set_value('deliveryboy_mobile'); }?>" class="form-control">
                      <span style="color:red"> <?php echo form_error('deliveryboy_mobile'); ?> </span>
                </div>
                  
                    <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">Alternate Number</label>
                  <input type="text"  pattern="^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$" title="Enter a Valid Phone Number" id="deliveryboy_alternateno" name="deliveryboy_alternateno" value="<?php if(isset($deliveryboydata->deliveryboy_alternateno)) { echo $deliveryboydata->deliveryboy_alternateno; } else { echo set_value('deliveryboy_alternateno'); }?>" class="form-control">
                      <span style="color:red"> <?php echo form_error('deliveryboy_alternateno'); ?> </span>
                </div>

              <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputPassword1">Address</label>
              <input type="text" id="deliveryboy_address" name="deliveryboy_address" class="form-control col-md-7 col-xs-12" value="<?php if(isset($deliveryboydata->deliveryboy_address)) { echo $deliveryboydata->deliveryboy_address; } else { echo set_value('deliveryboy_address'); }?>" required>
                          <span style="color:red"> <?php echo form_error('deliveryboy_address'); ?> </span>
                </div>

              <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputPassword1">Bike Name</label>
                 <input type="text" value="<?php if(isset($deliveryboydata->deliveryboy_bike)) { echo $deliveryboydata->deliveryboy_bike; } else { echo set_value('deliveryboy_bike'); }?>" id="deliveryboy_bike" name="deliveryboy_bike" class="form-control">
                    <span style="color:red"> <?php echo form_error('deliveryboy_bike'); ?> </span>
                </div>

               <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputPassword1">Bike Number</label>
               <input type="text" value="<?php if(isset($deliveryboydata->deliveryboy_bikeno)) { echo $deliveryboydata->deliveryboy_bikeno; } else { echo set_value('deliveryboy_bikeno'); }?>" id="deliveryboy_bikeno" name="deliveryboy_bikeno" class="form-control">
                          <span style="color:red"> <?php echo form_error('deliveryboy_bikeno'); ?> </span>
                </div>

               <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputPassword1">Driving License</label>
               <input type="text" value="<?php if(isset($deliveryboydata->deliveryboy_license)) { echo $deliveryboydata->deliveryboy_license; } else { echo set_value('deliveryboy_license'); }?>" id="deliveryboy_license" name="deliveryboy_license" class="form-control">
                          <span style="color:red"> <?php echo form_error('deliveryboy_license'); ?> </span>
                </div>

                  <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputPassword1">Adhar Card Number</label>
                 <input type="text" value="<?php if(isset($deliveryboydata->deliveryboy_adhar)) { echo $deliveryboydata->deliveryboy_adhar; } else { echo set_value('deliveryboy_adhar'); }?>" id="deliveryboy_adhar" name="deliveryboy_adhar" class="form-control">
                    <span style="color:red"> <?php echo form_error('deliveryboy_adhar'); ?> </span>
                </div>

                 <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputPassword1">Bank Acc. Number</label>
               <input type="text" value="<?php if(isset($deliveryboydata->deliveryboy_bank)) { echo $deliveryboydata->deliveryboy_bank; } else { echo set_value('deliveryboy_bank'); }?>" id="deliveryboy_bank" id="deliveryboy_bank" name="deliveryboy_bank" class="form-control">
                          <span style="color:red"> <?php echo form_error('deliveryboy_bank'); ?> </span>
                </div>


                <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputFile">Profile Photo</label>
                   <input type="file" name="deliveryboy_photo" id="deliveryboy_photo"  class="form-control col-md-7 col-xs-12">
               <input type="hidden" name="hidn" class="form-control col-md-7 col-xs-12" value="<?php echo $deliveryboydata->deliveryboy_photo;?>">
               </div>
              <div class="form-group nopaddingRight col-md-6 san-lg"> <img  class="form-control col-md-7 col-xs-12"  src=<?php echo base_url();?>uploads/deliveryboys/<?php echo $deliveryboydata->deliveryboy_photo;?> 

                      style="width:80px;height:80px"/> </div>
                           <span style="color:red"> <?php echo form_error('deliveryboy_photo'); ?> </span>
             
                <div class="clearfix"></div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="submit" class="btn btn-danger" onclick="window.location='<?php echo base_url(); ?>admin/deliveryboy';return false;">Cancel</button>
              </form>
            </div>
          </section>
        </div>
      </div>
      <!-- page start--> 
      <!-- page end--> 
    </section>
  </section>
  <!--main content end--> 



