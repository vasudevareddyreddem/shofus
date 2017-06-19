 <!--main content start-->
  <section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-users" aria-hidden="true"></i>Add Seller</h3>
         <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="<?php echo base_url();?>admin/dashboard">Home</a></li>
            <li><i class="fa fa-users" aria-hidden="true"></i>Seller</li>
           <!-- <li><i class="fa fa-square-o"></i>Starters</li>-->
          </ol>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <section class="panel">
            <header class="panel-heading"> Add Seller </header>
            <div class="panel-body">
              <form action="<?php echo base_url(); ?>admin/sellers/insert" method="post" enctype="multipart/form-data">

              <div><?php echo $this->session->flashdata('message');?></div>
                <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">Seller Name</label>
                    <input type="text" pattern="[A-Za-z ]+"  value="<?php echo set_value('seller_name'); ?>"" title="Name accepts alphabets and spaces only" id="seller_name" name="seller_name" class="form-control">
                      <span style="color:red"> <?php echo form_error('seller_name'); ?> </span>
                </div>

                <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputPassword1">Email</label>
                <input type="seller_email"  value="<?php echo set_value('seller_email'); ?>"" id="seller_email" name="seller_email" class="form-control">
                          <span style="color:red"> <?php echo form_error('seller_email'); ?> </span>
                </div>

                <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputPassword1">Password</label>
                   <input type="password" value="<?php echo set_value('seller_password'); ?>" title="Must contain at least one number ,one special character,one uppercase , lowercase letter, and at least 8 or more characters"  id="seller_password" name="seller_password" class="form-control">
                    <span style="color:red"> <?php echo form_error('seller_password'); ?> </span>
                </div>

                <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">Mobile Number</label>
                    <input type="text" value="<?php echo set_value('seller_mobile'); ?>" id="seller_mobile" name="seller_mobile" class="form-control">
                      <span style="color:red"> <?php echo form_error('seller_mobile'); ?> </span>
                </div>

                
                <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputPassword1">Shop Name</label>
                  <input type="text" value="<?php echo set_value('seller_shop'); ?>" id="seller_shop" name="seller_shop" class="form-control">
                    <span style="color:red"> <?php echo form_error('seller_shop'); ?> </span>
                </div>

                 <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputPassword1">License Number</label>
                <input type="text" value="<?php echo set_value('seller_license'); ?>" id="seller_license" name="seller_license" class="form-control">
                          <span style="color:red"> <?php echo form_error('seller_license'); ?> </span>
                </div>

                <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputPassword1">Service Time</label>
                  <input type="text" value="<?php echo set_value('seller_servicetime'); ?>" id="seller_servicetime" name="seller_servicetime" class="form-control">
                    <span style="color:red"> <?php echo form_error('seller_servicetime'); ?> </span>
                </div>

                 <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputPassword1">Bank Acc Number</label>
                <input type="text" value="<?php echo set_value('seller_bank'); ?>" id="seller_bank" name="seller_bank" class="form-control">
                          <span style="color:red"> <?php echo form_error('seller_bank'); ?> </span>
                </div>

                <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputPassword1">Type</label>
                   <select class="form-control" id="type" name="type">
                         <option value="">-Select Type-</option>
                         <option value="1">Single Brand</option>
                         <option value="2">Multi Brand</option>
                      </select>
                    <span style="color:red"> <?php echo form_error('type'); ?> </span>
                </div>

                <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputPassword1">Status</label>
                   <select class="form-control" id="status" name="status">
                         <option value="">-Select Status-</option>
                         <option value="1">Available</option>
                         <option value="2">Not Available</option>
                      </select>
                    <span style="color:red"> <?php echo form_error('status'); ?> </span>
                </div>

               <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputPassword1">Address</label>
                <textarea id="seller_address" name="seller_address" class="form-control"><?php echo set_value('seller_address'); ?></textarea>
                          <span style="color:red"> <?php echo form_error('seller_address'); ?> </span>
                </div>
                
               <div class="clearfix"></div>
            <div class="form-group nopaddingRight col-md-12 san-lg">
                  <label for="exampleInputFile" >
        <input type="checkbox" value="" name="conditions" required>
        I have read the information given under <a href="#">Seller Terms&Conditions</a> section
        </label>
      </div>
                <div class="clearfix"></div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="submit" class="btn btn-danger" onclick="window.location='<?php echo base_url(); ?>admin/sellers';return false;">Cancel</button>
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



