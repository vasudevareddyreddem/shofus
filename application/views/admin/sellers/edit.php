 <!--main content start-->
  <section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-users" aria-hidden="true"></i>Edit Seller</h3>
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
            <header class="panel-heading"> Edit Seller </header>
            <div class="panel-body">
             <form action="<?php echo base_url(); ?>admin/sellers/update/<?php echo $sellerdata->seller_id;?>" method="post">
              <div><?php echo $this->session->flashdata('message');?></div>
                <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">Seller Name</label>
                    <input type="text" pattern="[A-Za-z ]+" title="Name accepts alphabets and spaces only"  id="seller_name" name="seller_name"  value="<?php if(isset($sellerdata->seller_name)) { echo $sellerdata->seller_name; } else { echo set_value('seller_name'); }?>" class="form-control">
                      <span style="color:red"> <?php echo form_error('seller_name'); ?> </span>
                </div>

                <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputPassword1">Email</label>
                <input type="seller_email" id="seller_email" name="seller_email"  value="<?php if(isset($sellerdata->seller_email)) { echo $sellerdata->seller_email; } else { echo set_value('seller_email'); }?>" class="form-control" readonly>
                          <span style="color:red"> <?php echo form_error('seller_email'); ?> </span>
                </div>

               
                <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">Mobile Number</label>
                     <input type="text" title="Enter a Valid Phone Number" id="seller_mobile" name="seller_mobile" pattern="^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$"  value="<?php if(isset($sellerdata->seller_mobile)) { echo $sellerdata->seller_mobile; } else { echo set_value('seller_mobile'); }?>" class="form-control">
                      <span style="color:red"> <?php echo form_error('seller_mobile'); ?> </span>
                </div>

                <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputPassword1">Shop Name</label>
                  <input type="text" id="seller_shop" name="seller_shop" value="<?php if(isset($sellerdata->seller_shop)) { echo $sellerdata->seller_shop; } else { echo set_value('seller_shop'); }?>" class="form-control">
                    <span style="color:red"> <?php echo form_error('seller_shop'); ?> </span>
                </div>

                 <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputPassword1">License Number</label>
                <input type="text" id="seller_license" name="seller_license" value="<?php if(isset($sellerdata->seller_license)) { echo $sellerdata->seller_license; } else { echo set_value('seller_license'); }?>" class="form-control">
                          <span style="color:red"> <?php echo form_error('seller_license'); ?> </span>
                </div>

                 <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputPassword1">Service Time</label>
                  <input type="text" id="seller_servicetime" name="seller_servicetime" value="<?php if(isset($sellerdata->seller_servicetime)) { echo $sellerdata->seller_servicetime; } else { echo set_value('seller_servicetime'); }?>" class="form-control">
                    <span style="color:red"> <?php echo form_error('seller_servicetime'); ?> </span>
                </div>

                 <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputPassword1">Bank Acc Number</label>
                <input type="text" id="seller_bank" name="seller_bank" value="<?php if(isset($sellerdata->seller_bank)) { echo $sellerdata->seller_bank; } else { echo set_value('seller_bank'); }?>" class="form-control">
                          <span style="color:red"> <?php echo form_error('seller_bank'); ?> </span>
                </div>

                <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputPassword1">Type</label>
                   <select class="form-control" id="type" name="type" required>
                         <option value="<?php if(isset($sellerdata->type)) { echo $sellerdata->type; } else { echo set_value('type'); }?>">-Select Type-</option>

                         <option <?php echo (isset($sellerdata->type) && $sellerdata->type=='' || $sellerdata->type=='0' || $sellerdata->type=='1'?'selected':'') ; ?> value="1">Single Brand</option>

                         <option <?php echo (isset($sellerdata->type) && $sellerdata->type!='' && $sellerdata->type==2?'selected':'') ; ?> value="2">Multi Brand</option>
                      </select>
                    <span style="color:red"> <?php echo form_error('type'); ?> </span>
                </div>

                <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputPassword1">Status</label>
                   <select class="form-control" id="status" name="status" required>
                         <option value="<?php if(isset($sellerdata->status)) { echo $sellerdata->status; } else { echo set_value('status'); }?>">-Select Status-</option>

                         <option <?php echo (isset($sellerdata->status) && $sellerdata->status=='' || $sellerdata->status=='0' || $sellerdata->status=='1'?'selected':'') ; ?> value="1">Available</option>

                         <option <?php echo (isset($sellerdata->status) && $sellerdata->status!='' && $sellerdata->status=='2'?'selected':'') ; ?> value="2">Not Available</option>
                      </select>
                    <span style="color:red"> <?php echo form_error('status'); ?> </span>
                </div>
                
                <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputPassword1">Address</label>
               <textarea id="seller_address" name="seller_address" class="form-control"><?php if(isset($sellerdata->seller_address)) { echo $sellerdata->seller_address; } else { echo set_value('seller_address'); }?></textarea>
                          <span style="color:red"> <?php echo form_error('seller_address'); ?> </span>
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



