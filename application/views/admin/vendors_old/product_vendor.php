<div class="right_col" role="main">

  <div class="">

    <div><?php echo $this->session->flashdata('message');?></div>

    <div class="clearfix"></div>

    <div class="row">

      <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">

        <div class="x_panel">

          <div class="x_title">

            <h2>Products</h2>
 
            <ul class="nav navbar-right panel_toolbox">

               <a href="<?= base_url("admin/vendors"); ?>" style="color:white;" class="btn btn-primary" role="button"  data-target="#new-user-reg">Back To Vendor</a> 

            </ul> 

            <div class="clearfix"></div>

          </div>

          <div class="x_content table-responsive">
         
                     <table class="table table-bordered">

              <thead>

                <tr>

                  <th>Product ID</th>

                  <th>Image</th>

                  <th>Product Name</th>

                   <th>Category</th>

                  <th>Sub Category</th>

                 <th>Price</th>

                  <th>Discount Price</th>
                   <th>New/Regular</th>
                    <th>Feature/Regular</th>

                <!--   <th>Delete</th> --> 

                </tr>

              </thead>

               <?php if(!empty($card)){ ?> 



                  <tbody>

            <?php $count = $this->uri->segment(4, 0);



					  foreach( $card as $cards):

               ?>

                <tr>

                  <td><?= ++$count ?></td>

                  <td><?php if(isset($cards->product_image) &&$cards->product_image!='')

				  {?>

                    <?php

$filename = 'uploads/'.$cards->product_image;



if (file_exists($filename)) {?>

                    <img  class="thumbnail" src="<?php echo base_url("uploads/$cards->product_image")?>" alt="greeting" style="margin-bottom:0 !important"  height="50" width="50">

                    <?php } else {?>

                    <img  style="margin-bottom:0 !important"  class="thumbnail" src="<?php echo base_url("uploads/$cards->product_image")?>" alt="No Image"  height="50" width="50">

                    <?php 

}

?>

                    <?php	  }

			else

			{ ?>

                    <img style="margin-bottom:0 !important"  class="thumbnail" src="<?php echo base_url("uploads/$cards->product_image")?>" alt="No Image"  height="50" width="50">

                    <?php   } ?></td>

                 

                  <td><?php echo $cards->product_name; ?></td>

                   <td><?php echo $cards->category_name; ?></td>

                   <td><?php echo $cards->sub_cat_name; ?></td>
                   <td><?php echo $cards->actual_price; ?></td>
                   <td><?php echo $cards->discount_price; ?></td>
                   <td><?php echo $cards->new; ?></td>
                   <td><?php echo $cards->feature; ?></td>

                <!--   <td><a href="#myModal" type="button"  data-toggle="modal" data-target="#myModal"><img src="<?= base_url("assets/images/admin/view-icon.png") ?>" alt="greeting"></a></td> -->

                  <!-- <div id="myModal" class="modal fade" role="dialog">

                    <div class="modal-dialog">

                      <div class="modal-content">

                        <div class="modal-header">

                          <button type="button" class="close" data-dismiss="modal">&times;</button>

                          <h4 class="modal-title">Card Details</h4>

                        </div>

                        <div class="modal-body">

                          <h5>Card Name:Anniversary </h5>

                          <h5>Card Category:Wedding</h5>

                          <img src="

<?= base_url("assets/images/admin/birthday-card.png"); ?>"> </div>

                        <div class="modal-footer">

                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                        </div>

                      </div>

                    </div>

                  </div> -->

                 <!--  <td><a href="<?php echo base_url(); ?>admin/products/edit/<?php  echo $cards->card_id; ?>"><i class="fa fa-pencil-square-o" style="font-size:18px"></i></a></td>

                  <td><a href="<?php echo base_url(); ?>admin/products/delete/<?php  echo $cards->card_id; ?>" onclick="return checkDelete('<?php  echo $cards->card_id; ?>')"><i class="fa fa-trash" style="font-size:18px"></i></a></td>
 -->
                </tr>

                <?php endforeach; ?>

              </tbody>

              <?php  }else{"NO products Uploaded !!!!";}?>

            </table>

          </div>

        </div>

      </div>

      <div class="clearfix"></div>

    </div>

  </div>

</div>

<script language="JavaScript" type="text/javascript">



function checkDelete(id)



{



  



return confirm('Are you sure want to delete "'+id +'" user?');



}



</script> 

<script type="text/javascript" src="http://ajax.googleapis.com/

ajax/libs/jquery/1.4.2/jquery.min.js"></script> 

<script type="text/javascript">

$(document).ready(function()

{

$(".category").change(function()

{

var id=$(this).val();

var dataString = 'id='+ id;



$.ajax

({

type: "POST",

url: "<?php echo base_url(); ?>admin/cards/sub_catg",

data: dataString,

cache: false,

success: function(html)

{

$(".sub_catg").html(html);

} 

});



});



});

</script> 

