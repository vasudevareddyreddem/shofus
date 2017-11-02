





 <div class="right_col" role="main">


    <div class="">


      <div class="page-title">


        <div class="title_left"> </div>


        <div class="title_right pull-right">


          


        </div>


      </div>


      <div class="clearfix"></div>


      <div class="row">


        <div class="col-md-12 col-sm-12 col-xs-12">


          <div class="x_panel">


            <div class="x_title">


              <h2><?php echo ucwords($hospitalsdata->hospital_name);  ?>(<?php echo ucwords($hospitalsdata->name);  ?>)</h2>


              


              <div class="clearfix"></div>


            </div>


            <div class="x_content"> <br />


              <div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">


                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3"> <!-- required for floating --> 


                  <!-- Nav tabs -->


                  <ul class="nav nav-tabs tabs-left sideways">


                    <li class="active"><a href="#summary-v" data-toggle="tab">Summary</a></li>


                    <li><a href="#address-v" data-toggle="tab">Address</a></li>


                    <li><a href="#home-v" data-toggle="tab">Doctors</a></li>


                    <li><a href="#profile-v" data-toggle="tab">Departments</a></li>


                    <li><a href="#service-v" data-toggle="tab">Services</a></li>


                    <li><a href="#messages-v" data-toggle="tab">Accomodation</a></li>


                    <li><a href="#settings-v" data-toggle="tab">Insurance</a></li>


                    <li><a href="#cancers-v" data-toggle="tab">Cancers</a></li>


                    <li><a href="#ngo-v" data-toggle="tab">NGO</a></li>


                    <li><a href="#amenities-v" data-toggle="tab">Amenities</a></li>


                    <li><a href="#specialisation-v" data-toggle="tab">Specialzation</a></li>


                    <li><a href="#reviews-v" data-toggle="tab">Reviews</a></li>


                    <li><a href="#ratings-v" data-toggle="tab">Ratings</a></li>


                  </ul>


                </div>


                <div class="col-xs-12 col-sm-6 col-md-8 col-lg-9"> 


                  <!-- Tab panes -->


                  <div class="tab-content">


                     <div class="tab-pane active" id="summary-v"><?php echo $hospitalsdata->hospital_summary;?></div>





        <div class="tab-pane" id="address-v"><?php echo str_replace(",", ", <br />", $hospitalsdata->hospital_address); ?></div>











                    <div class="tab-pane" id="home-v">


                    <table class="table table-bordered">


                  <thead>


                    <tr>


                      <th>S.NO</th>


                      <th>Doctor Name</th>


                      <th>Summary</th>


                      <th>Address</th>


                    </tr>


                  </thead>


                  <tbody>


                  <?php $i=1;


   foreach($doctorsdetails as $doctors_details){?>


                    <tr>


                      <td><?=$i;?></td>


                      <td><?php  echo $doctors_details->doctor_name; ?></td>


                      <td><?php  echo $doctors_details->doctor_summary; ?></td>


                      <td><?php  echo $doctors_details->doctor_address; ?></td>


                    </tr>


                    <?php $i++; } ?>


                  </tbody>


                </table>


                </div>











                    <div class="tab-pane" id="profile-v">


                      <table class="table table-bordered">


                  <thead>


                    <tr>


                      <th>S.NO</th>


                      <th>Department Name</th>


                      <th>Department Description</th>


                    </tr>


                  </thead>


                  <tbody>


                  <?php $i=1;


   foreach($departmentdetails as $department_details){?>


                    <tr>


                      <td><?=$i;?></td>


                      <td><?php  echo $department_details->department_name; ?></td>


                      <td><?php  echo $department_details->department_description; ?></td>


                    </tr>


                    <?php $i++; } ?>


                  </tbody>


                </table>


                    </div>





                    <div class="tab-pane" id="service-v">


                      <table class="table table-bordered">


                  <thead>


                    <tr>


                      <th>S.NO</th>


                      <th>Service Name</th>


                      <th>Service Description</th>


                    </tr>


                  </thead>


                  <tbody>


                  <?php $i=1;


   foreach($servicedetails as $service_details){?>


                    <tr>


                      <td><?=$i;?></td>


                      <td><?php  echo $service_details->service_name; ?></td>


                      <td><?php  echo $service_details->service_description; ?></td>


                    </tr>


                    <?php $i++; } ?>


                  </tbody>


                </table>


                    </div>











                    <div class="tab-pane" id="messages-v">


                      


                        <table class="table table-bordered">


                  <thead>


                    <tr>


                      <th>S.NO</th>


                      <th>Accomodation Name</th>


                      <th>Accomodation Address</th>


                      <th>Accomodation Cost</th>


                    </tr>


                  </thead>


                  <tbody>


                  <?php $i=1;


   foreach($accomodationdetails as $accomodation_details){?>


                    <tr>


                      <td><?=$i;?></td>


                      <td><?php  echo $accomodation_details->accomodation_name; ?></td>


                      <td><?php  echo $accomodation_details->accomodation_address; ?></td>


                      <td><?php  echo $accomodation_details->accomodation_cost; ?></td>


                    </tr>


                    <?php $i++; } ?>


                  </tbody>


                </table>





                    </div>








                    <div class="tab-pane" id="settings-v">


                      


                     <table class="table table-bordered">


                  <thead>


                    <tr>


                      <th>S.NO</th>


                      <th>Insurance Name</th>


                      <th>Insurance Description</th>


                    </tr>


                  </thead>


                  <tbody>


                  <?php $i=1;


   foreach($insurancedetails as $insurance_details){?>


                    <tr>


                      <td><?=$i;?></td>


                      <td><?php  echo $insurance_details->insurance_name; ?></td>


                      <td><?php  echo $insurance_details->insurance_description; ?></td>


                    </tr>


                    <?php $i++; } ?>


                  </tbody>


                </table>





                    </div>








                    <div class="tab-pane" id="cancers-v">


                      


                    <table class="table table-bordered">


                  <thead>


                    <tr>


                      <th>S.NO</th>


                      <th>Cancer Name</th>


                      <th>Cancer Description</th>


                    </tr>


                  </thead>


                  <tbody>


                  <?php $i=1;


   foreach($cancerdetails as $cancer_details){?>


                    <tr>


                      <td><?=$i;?></td>


                      <td><?php  echo $cancer_details->cancer_name; ?></td>


                      <td><?php  echo $cancer_details->cancer_description; ?></td>


                    </tr>


                    <?php $i++; } ?>


                  </tbody>


                </table>








                    </div>








                    <div class="tab-pane" id="ngo-v">


                      


                      <table class="table table-bordered">


                  <thead>


                    <tr>


                      <th>S.NO</th>


                      <th>Ngo Name</th>


                      <th>Ngo Description</th>


                    </tr>


                  </thead>


                  <tbody>


                  <?php $i=1;


   foreach($ngodetails as $ngo_details){?>


                    <tr>


                      <td><?=$i;?></td>


                      <td><?php  echo $ngo_details->ngo_name; ?></td>


                      <td><?php  echo $ngo_details->ngo_description; ?></td>


                    </tr>


                    <?php $i++; } ?>


                  </tbody>


                </table>


                    </div>








                    <div class="tab-pane" id="amenities-v">


                      <table class="table table-bordered">


                  <thead>


                    <tr>


                      <th>S.NO</th>


                      <th>Amenities Name</th>


                    </tr>


                  </thead>


                  <tbody>


                  <?php $i=1;


   foreach($amenitiesdetails as $amenitie_details){?>


                    <tr>


                      <td><?=$i;?></td>


                      <td><?php  echo $amenitie_details->amenities_name; ?></td>


                    </tr>


                    <?php $i++; } ?>


                  </tbody>


                </table>

















                    </div>


                    <div class="tab-pane" id="specialisation-v">Consectetuer adipiscing typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially uncdlfk LKy dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially uncdlfk</div>


                    <div class="tab-pane" id="reviews-v">Reviews typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially uncdlfk LKy dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially uncdlfk</div>


                    <div class="tab-pane" id="ratings-v">Ratings adipiscing typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially uncdlfk LKy dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially uncdlfk</div>


                  </div>


                </div>


                <div class="clearfix"></div>


              </div>


            </div>


          </div>


        </div>


      </div>


    </div>


    <!-- /page content --> 


    


    <!-- footer content -->


    


    <!-- /footer content --> 


  </div>