<!--main content start-->
  <section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-cutlery" aria-hidden="true"></i>Sellers</h3>
          <ol class="breadcrumb">
             <li><i class="fa fa-home"></i><a href="<?php echo base_url();?>admin/dashboard">Home</a></li>
            <li><i class="fa fa-users" aria-hidden="true"></i>Sellers</li>
          </ol>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <section class="panel">
            <header class="panel-heading">
              <h3>Details Of <?php  echo $sellerdata->seller_shop; ?></h3>
            </header>
            <div class="panel-body">
                       <!--     <a href="<?php //echo base_url(); ?>admin/sellers/edit/<?php  echo $sellerdata->seller_id; ?>" class="add_item"><button class="btn btn-primary" type="submit">Edit Seller</button></a>-->

              <div class="details-tbl">
                <table>
                <tr>
                             <a href="<?php echo base_url(); ?>admin/payments/seller_payments"  ><button class="btn btn-primary" type="submit">>>Back</button></a>

                </tr>
                  <tr>
                    <td class="title">Name: </td>
                    <td class="text"><?php  echo $sellerdata->seller_name; ?></td>
                  </tr>
                  <tr>
                    <td class="title">Email: </td>
                    <td class="text"><?php  echo $sellerdata->seller_email; ?></td>
                  </tr>
                  <tr>
                    <td class="title">Phone Number: </td>
                    <td class="text"><?php  echo $sellerdata->seller_mobile; ?></td>
                  </tr>
                  <tr>
                    <td class="title">Address:</td>
                    <td class="text"><?php  echo $sellerdata->seller_address; ?></td>
                  </tr>

                  <tr>
                    <td class="title">Shop License: </td>
                    <td class="text"><?php  echo $sellerdata->seller_license; ?></td>
                  </tr>

                  <tr>
                    <td class="title">Service Time:</td>
                    <td class="text"><?php  echo $sellerdata->seller_servicetime; ?></td>
                  </tr>

                  <tr>
                    <td class="title">Bank Acc Number: </td>
                    <td class="text"><?php  echo $sellerdata->seller_bank; ?></td>
                  </tr>
                  <tr>
                    <td class="title">Shop Type: </td>
                    <td  class="text"  style="color:<?php  if($sellerdata->type=='1' || $sellerdata->type=='' || $sellerdata->type=='0'  ){echo "Blue";}elseif($sellerdata->type==2){echo "Green";}

                       else{echo "Red";} ?>;font-weight:bold">

                      <?php  

                      if($sellerdata->type=='1' || $sellerdata->type=='' || $sellerdata->type=='0'){echo "<span style='color:#1f618d  !important'>Single Brand</span>";}
                      elseif($sellerdata->type==2){echo "<span style='color:#20B2AA'>Multi Brand</span>";}
                      else{
                        echo "N/A";
                      }
                      ?>

                      </td>
                  </tr>
                  <tr>
           <td class="title">Shop Status: </td>
           <td  class="text"  style="color:<?php  if( $sellerdata->status=='' || $sellerdata->status=='0' || $sellerdata->status=='1' ){echo "Green";}elseif($sellerdata->status=='2'){echo "Red";}

         else{echo "Blue";} ?>;font-weight:bold">

        <?php  

        if($sellerdata->status=='' || $sellerdata->status=='0' || $sellerdata->status=='1'){echo "Available";}
        elseif($sellerdata->status=='2'){echo "Not Available";}
        else{
          echo "N/A";
        }
        ?>

        </td>  
                  </tr>
                  <tr>
                    <td class="title">Address:</td>
                    <td class="text"><?php  echo $sellerdata->seller_address; ?></td>
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





