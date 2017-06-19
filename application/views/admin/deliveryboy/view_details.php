<!--main content start-->
  <section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-cutlery" aria-hidden="true"></i>Deliveryboy</h3>
          <ol class="breadcrumb">
             <li><i class="fa fa-home"></i><a href="<?php echo base_url();?>admin/dashboard">Home</a></li>
            <li><i class="fa fa-users" aria-hidden="true"></i>Deliveryboy</li>
          </ol>
        </div>Deliveryboy
      </div>
      <div class="row">
        <div class="col-md-12">
          <section class="panel">
            <header class="panel-heading">
              <h3>Details Of <?php  echo $deliveryboydata->deliveryboy_name; ?></h3>
            </header>
            <div class="panel-body">
                            <a href="<?php echo base_url(); ?>admin/deliveryboy/edit/<?php  echo $deliveryboydata->deliveryboy_id; ?>" class="add_item"><button class="btn btn-primary" type="submit">Edit Deliveryboy</button></a>

              <div class="details-tbl">
                <table>
                <tr>
                             <a href="<?php echo base_url(); ?>admin/deliveryboy"  ><button class="btn btn-primary" type="submit">>>Back</button></a>

                </tr>
                  <tr>
                    <td class="title">Name: </td>
                    <td class="text"><?php  echo $deliveryboydata->deliveryboy_name; ?></td>
                  </tr>
                  <tr>
                    <td class="title">Email: </td>
                    <td class="text"><?php  echo $deliveryboydata->deliveryboy_email; ?></td>
                  </tr>
                  <tr>
                    <td class="title">Phone Number: </td>
                    <td class="text"><?php  echo $deliveryboydata->deliveryboy_mobile; ?></td>
                  </tr>
                  <tr>
                    <td class="title">Address:</td>
                    <td class="text"><?php  echo $deliveryboydata->deliveryboy_address; ?></td>
                  </tr>

                  <tr>
                    <td class="title">Bike Name: </td>
                    <td class="text"><?php  echo $deliveryboydata->deliveryboy_bike; ?></td>
                  </tr>
                  <tr>
                    <td class="title">Bike Number:</td>
                    <td class="text"><?php  echo $deliveryboydata->deliveryboy_bikeno; ?></td>
                  </tr>

                  <tr>
                    <td class="title">Driving License: </td>
                    <td class="text"><?php  echo $deliveryboydata->deliveryboy_license; ?></td>
                  </tr>
                  
                 
                  <tr>
                    <td class="title">Alternate Number:</td>
                    <td class="text"><?php  echo $deliveryboydata->deliveryboy_alternateno; ?></td>
                  </tr>

                   <tr>
                    <td class="title">Adhar Number: </td>
                    <td class="text"><?php  echo $deliveryboydata->deliveryboy_adhar; ?></td>
                  </tr>
                  
                 
                  <tr>
                    <td class="title">Bank Acc Number:</td>
                    <td class="text"><?php  echo $deliveryboydata->deliveryboy_bank; ?></td>
                  </tr>
                  
                  
                   <tr>
                    <td class="title">Current Location:</td>
                    <td class="text"><?php  echo $deliveryboydata->current_location; ?></td>
                  </tr>
                  
                </table>
              </div>
            </div>
          </section>
        </div>
      </div>
      <!-- page start--> 
      <!-- page end--> 
    </section>
  </section>
  <!--main content end-->   





