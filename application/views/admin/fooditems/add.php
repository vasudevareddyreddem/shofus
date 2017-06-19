
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<div class="right_col" role="main">



  <div class="">



    

    <div class="clearfix"></div>


    <div class="row">

   <div class="col-md-12 col-sm-12 col-xs-12">

        <div class="x_panel">

          <div class="x_title">

            <h2>Add Food item Details</h2>

                    <!--<ul class="nav navbar-right panel_toolbox">

                 <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
       </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>

         </li>
       </ul>-->

          <div class="clearfix"></div>

                  </div>

 <div><?php echo $this->session->flashdata('message');?></div>

                  <div class="x_content">



                    <br />

                    <form action="<?php echo base_url(); ?>admin/fooditems/insert" method="post" enctype="multipart/form-data">

          <span style="color:red"> <?php echo validation_errors(); ?> </span>

        <div class="form-group col-lg-6 col-xs-12">

        <label class="control-label col-lg-4 col-md-3 col-sm-3 col-xs-12" for="first-name">Food Item  Name 

            </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
           <input type="text" id="food_name" name="food_name" class="form-control col-md-7 col-xs-12" required>

                        </div>
      </div>

      <div class="form-group col-lg-6 col-xs-12">

         <label for="middle-name" class="control-label col-lg-4 col-md-3 col-sm-3 col-xs-12">Select type</label>

        <div class="col-md-6 col-sm-6 col-xs-12">

         <select class="form-control" id="state_id" name="type" required>

        <option value="">-Select Type-</option>

        <option value="Veg">Veg</option>

         <option value="Non-Veg">Non-Veg</option>

                           </select>


                       </div>

                     </div>

  <div class="form-group col-lg-6 col-xs-12">

         <label for="middle-name" class="control-label col-lg-4 col-md-3 col-sm-3 col-xs-12">Status</label>

            <div class="col-md-6 col-sm-6 col-xs-12">

           <select class="form-control" id="ststus" name="status" required>

             <option value="">-Select Availability-</option>

          <option value="1">Available</option>
         <option value="0">Unavailable</option>
         </select>


                     </div>

      </div>

                   <div class="form-group col-lg-6 col-xs-12">



                    <label class="control-label col-lg-4 col-md-4 col-sm-3 col-xs-12" for="first-name"> Image



                    </label>



                    <div class="col-md-6 col-sm-6 col-xs-12">


                      <input type="file" name="picture" class="form-control col-md-7 col-xs-12" required>



                    </div>



                  </div>


                  <div class="form-group col-lg-6 col-xs-12">

                    <label class="control-label col-lg-4 col-md-4 col-sm-3 col-xs-12">Description

                    </label>


                    <div class="col-md-6 col-sm-6 col-xs-12">


                      <textarea class="form-control" rows="3" id="discription" name="discription" required></textarea>


                    </div>

                  </div>


                  <div class="form-group col-lg-6 col-xs-12">


                    <label class="control-label col-lg-4 col-md-4 col-sm-3 col-xs-12" for="first-name">Food Item Charges 


                    </label>

                    <div class="col-md-6 col-sm-6 col-xs-12">

                      <input type="text" id="food_charges" name="food_charges" class="form-control col-md-7 col-xs-12" required>


                    </div>

                </div>

                  <div class="form-group col-lg-12 col-xs-12">
                  <hr />

                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">



                      <button type="submit" class="btn btn-primary" onclick="window.location='<?php echo base_url(); ?>admin/fooditems';return false;">Cancel</button>



                      <button type="submit" name="submit" class="btn btn-success">Submit</button>

                    </div>

                  </div>

                </form>

             </div>
            </div>
          </div>

  </div>
  </div>

  </div>


    <script src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>



    <!--multi select with search --> 


<script>
$('input[name="food_charges"]').keyup(function(e)
                                {
  if (/\D/g.test(this.value))
  {
    // Filter non-digits from input value.
    this.value = this.value.replace(/\D/g, '');
  }
});


</script>











    