 <!--main content start-->  <section id="main-content">    <section class="wrapper">      <div class="row">        <div class="col-lg-12">          <h3 class="page-header"><i class="fa fa-users" aria-hidden="true"></i>Edit CIH Fee</h3>         <ol class="breadcrumb">            <li><i class="fa fa-home"></i><a href="<?php echo base_url();?>category/dashboard">Home</a></li>            <li><i class="fa fa-users" aria-hidden="true"></i>CIH Fee</li>           <!-- <li><i class="fa fa-square-o"></i>Starters</li>-->          </ol>        </div>      </div>      <div class="row">        <div class="col-lg-12">          <section class="panel">            <header class="panel-heading"> Edit CIH Fee </header>            <div class="panel-body">             <form action="<?php echo base_url(); ?>admin/cih/update/<?php echo $this->uri->segment(4); ?>" method="post">                <div class="form-group nopaddingRight col-md-6">                  <label for="exampleInputEmail1">Category name</label>                  <input type="text" name="category_name" id="category_name" value="<?php if(isset($cihdata->category_name)) { echo $cihdata->category_name; } else { echo set_value('category_name'); }?>" class="form-control col-md-7 col-xs-12">                      <span style="color:red"> <?php echo form_error('category_name'); ?> </span>                </div>								<div class="form-group nopaddingRight col-md-6">                  <label for="exampleInputEmail1">CIH Fee</label>                  <input type="text" name="cih_fee" id="cih_fee" value="<?php if(isset($cihdata->cih_fee)) { echo $cihdata->cih_fee; } else { echo set_value('cih_fee'); }?>" class="form-control col-md-7 col-xs-12">                      <span style="color:red"> <?php echo form_error('cih_fee'); ?> </span>                </div>               <div class="clearfix"></div>                <button type="submit" class="btn btn-primary">Submit</button>                <button type="submit" class="btn btn-danger" onclick="window.location='<?php echo base_url(); ?>admin/cih';return false;">Cancel</button>              </form>            </div>          </section>        </div>      </div>      <!-- page start-->       <!-- page end-->     </section>  </section>  <!--main content end--> 