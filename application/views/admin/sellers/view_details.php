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
                            <a href="<?php echo base_url(); ?>admin/sellers" class="add_item"><button class="btn btn-primary" type="submit">Back</button></a>

              <div class="details-tbl">
                <table>
                <!--<tr>
                             <a href="<?php //echo base_url(); ?>admin/sellers"  ><button class="btn btn-primary" type="submit">>>Back</button></a>

                </tr>-->
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
                    <td class="title">Location:</td>
                    <td class="text"><?php  echo $sellerdata->seller_location; ?></td>
                  </tr>
                  <tr>
                    <td class="title">VAT/TIN: </td>
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
                    <td class="title">Business Name: </td>
                    <td class="text"><?php  echo $sellerdata->seller_business_name; ?></td>
                  </tr>
				  
				   <tr>
                    <td class="title">Business Display Name: </td>
                    <td class="text"><?php  echo $sellerdata->seller_business_displayname; ?></td>
                  </tr>
				  
				   <tr>
                    <td class="title">Type of Category: </td>
                    <td class="text"><?php  echo $sellerdata->seller_type_category; ?></td>
                  </tr>
				  
				  <tr>
                    <td class="title">TAN: </td>
                    <td class="text"><?php  echo $sellerdata->seller_tan; ?></td>
                  </tr>
				  
				   <tr>
                    <td class="title">GSTIN: </td>
                    <td class="text"><?php  echo $sellerdata->seller_gstin; ?></td>
                  </tr>
				  
				   <tr>
                    <td class="title">PAN: </td>
                    <td class="text"><?php  echo $sellerdata->seller_pan; ?></td>
                  </tr>
                 
				 <tr>
                    <td class="title">KYC Documents: </td>
                    <td class="text"> <?php if( count($file_pathes)>0){
							  foreach( $file_pathes as $all_files){
							   ?>
                          <?php //echo $all_files->file_name; exit;
                 if( $all_files->file_name!=""){?>
                          <li> <a href="<?php echo site_url(); ?>uploads/reports/<?php echo $all_files->file_name;  ?>" download ><?php echo  $all_files->file_name; ?><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></li>
                          <?php }?>
                          <?php }
						    } ?></td>
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





