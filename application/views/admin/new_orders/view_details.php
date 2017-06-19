<!--main content start-->
  <section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-cutlery" aria-hidden="true"></i>New Orders</h3>
          <ol class="breadcrumb">
             <li><i class="fa fa-home"></i><a href="<?php echo base_url();?>admin/dashboard">Home</a></li>
            <li><i class="fa fa-users" aria-hidden="true"></i>New Orders</li>
          </ol>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <section class="panel">
            <header class="panel-heading">
              <h3>Details Of <?php  echo $newordersdata->order_id; ?></h3>
            </header>
            <div class="panel-body">
                        <!--    <a href="<?php// echo base_url(); ?>admin/new_orders/edit/<?php  echo $newordersdata->new_orders_id; ?>" class="add_item"><button class="btn btn-primary" type="submit">Edit new_orders</button></a> -->

              <div class="details-tbl">
                <table>
                <tr>
                             <a href="<?php echo base_url(); ?>admin/new_orders"  ><button class="btn btn-primary" type="submit">>>Back</button></a>

                </tr>
                  <tr>
                    <td class="title">Product Name </td>
                    <td class="text"><?php  echo $newordersdata->product_name; ?></td>
                  </tr>
                  <tr>
                    <td class="title">Delivery Date: </td>
                    <td class="text"><?php  echo $newordersdata->delivery_date; ?></td>
                  </tr>
                  <tr>
                    <td class="title">Delivery Time: </td>
                    <td class="text"><?php  echo $newordersdata->delivery_time; ?></td>
                  </tr>
                  <tr>
                    <td class="title">Customer Name:</td>
                    <td class="text"><?php  echo $newordersdata->customer_name; ?></td>
                  </tr>

                  <tr>
                    <td class="title">Customer Email: </td>
                    <td class="text"><?php  echo $newordersdata->customer_email; ?></td>
                  </tr>
                  <tr>
                    <td class="title">Customer Phone:</td>
                    <td class="text"><?php  echo $newordersdata->customer_phone; ?></td>
                  </tr>

                  <tr>
                    <td class="title">Customer Address: </td>
                    <td class="text"><?php  echo $newordersdata->customer_address; ?></td>
                  </tr>
                  
                 
                  <tr>
                    <td class="title">Seller Name:</td>
                    <td class="text"><?php  echo $newordersdata->seller_name; ?></td>
                  </tr>

                   <tr>
                    <td class="title">Seller Email: </td>
                    <td class="text"><?php  echo $newordersdata->seller_email; ?></td>
                  </tr>
                  
                 
                  <tr>
                    <td class="title">Seller Mobile:</td>
                    <td class="text"><?php  echo $newordersdata->seller_mobile; ?></td>
                  </tr>


                   <tr>
                    <td class="title">Seller Address: </td>
                    <td class="text"><?php  echo $newordersdata->seller_address; ?></td>
                  </tr>
                  
                 
                  <tr>
                    <td class="title">Seller Shop:</td>
                    <td class="text"><?php  echo $newordersdata->seller_shop; ?></td>
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





