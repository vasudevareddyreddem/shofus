<div class="right_col" role="main">

          <div class="">

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_panel">

                  <div class="x_title">

                    <h2>Edit Service Details</h2>

                    <div class="clearfix"></div>

                  </div>

                  <div class="x_content">

                    <br />

                    	<form action="<?php echo base_url(); ?>admin/services/update/<?php echo $this->uri->segment(4); ?>" method="post">



                      <div class="form-group col-lg-10 col-xs-12">

                        <label class="control-label col-lg-3 col-md-2 col-sm-2 col-xs-12" for="first-name">Service Name 

                        </label>

                        <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-12">

                          <input type="text" name="service_name" id="service_name" value="<?php if(isset($servicesdata->service_name)) { echo $servicesdata->service_name; } else { echo set_value('service_name'); }?>" class="form-control col-md-7 col-xs-12">

                          <span style="color:red"> <?php echo form_error('service_name'); ?> </span>

                        </div>

                      </div>

                  <div class="form-group col-lg-10 col-xs-12">
                        <label class="control-label col-lg-3 col-md-2 col-sm-2 col-xs-12" for="first-name">Service Url
                        </label>
                        <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="service_url" id="service_url" value="<?php if(isset($servicesdata->service_url)) { echo $servicesdata->service_url; } else { echo set_value('service_url'); }?>" class="form-control col-md-7 col-xs-12">
                          <span style="color:red"> <?php echo form_error('service_url'); ?> </span>
                        </div>
                      </div>     

                      <div class="form-group col-lg-10 col-xs-12">

                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                          <button type="submit" class="btn btn-primary" onclick="window.location='<?php echo base_url(); ?>admin/services';return false;">Cancel</button>

                          <button type="submit" class="btn btn-success" name="submit">Submit</button>

                        </div>

                      </div>



                    </form>

                  </div>

                </div>

              </div>

            </div>

          </div>

        </div>