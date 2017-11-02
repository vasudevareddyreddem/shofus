<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
              </div>

              <div class="title_right pull-right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>ADD Order Details</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    	<form action="<?php echo base_url(); ?>admin/admin_users/insert">

                      <div class="form-group col-lg-6 col-xs-12">
                        <label class="control-label col-lg-4 col-md-3 col-sm-3 col-xs-12" for="first-name">FOOD item Name 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group col-lg-6 col-xs-12">
                        <label class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-12" for="last-name"> Type 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         	<select class="form-control">
								<option>--Select status--</option>
                              <option>Pending</option>
                              <option>In-Process</option>
								 <option>Delivered</option>
                              <option>Reject</option>
                              
                            </select>
                        </div>
                      </div>
                      <div class="form-group col-lg-6 col-xs-12">
                        <label for="middle-name" class="control-label col-lg-4 col-md-3 col-sm-3 col-xs-12">Status</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control">
									<option>--Select status--</option>
                                  <option>VeG</option>
                                  <option>Non-Veg</option>
                                  <option>State-3</option>
                                </select>
                            </div>
                      </div>
                     
                      
                      
                      
                      <div class="form-group col-lg-6 col-xs-12">
                        <label class="control-label col-lg-4 col-md-3 col-sm-3 col-xs-12">Discription
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          	<textarea class="form-control" rows="3"></textarea>
                        </div>
                      </div>
                      <div class="form-group col-lg-6 col-xs-12">
                        <label class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-12">Address
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          	<textarea class="form-control" rows="3"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">Cancel</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>