<div class="right_col" role="main">
<?php //print_r($card);exit;?>
  <div class="">

    <div class="clearfix"></div>

    <div class="row">

      <div class="col-md-12 col-sm-12 col-xs-12">

        <div class="x_panel">

          <div class="x_title">

            <h2>Search Filters</h2>

            <div class="clearfix"></div>

          </div>

          <div class="x_content"> <br />

            <form accept-charset="utf-8" action="<?= base_url("admin/products/search"); ?>" enctype="multipart/form-data" method="post"   >

              <div class="form-group col-lg-6 col-xs-12">

                <label for="category" class="col-md-4 control-label">Category</label>

                <div class="col-md-8 col-sm-8 col-xs-12">

                  <select class="category form-control"  name="category">

                    <option value="">Select a Category</option>

                    <?php foreach ($all_category as $categories): ?>

                    <option class ="category" value=" <?php echo $categories->category_id;?>" ><?php echo $categories->category_name; ?></option>

                    <?php endforeach; ?>

                  </select>

                </div>

              </div>

              <div class="form-group col-lg-6 col-xs-12">

                <label for="category" class="col-md-4 control-label">Sub-Category</label>

                <div class="col-md-8 col-sm-8 col-xs-12">

                  <select class="sub_catg form-control"   name="sub_cat_id">

                    <option value="">Select a Category</option>

                  </select>

                </div>

              </div>

              <div class="form-group col-lg-6 col-xs-12">

                <label for="cardname" class="col-md-4 control-label">Product Name</label>

                <div class="col-md-8 col-sm-8 col-xs-12">

                  <input type="text"  class="form-control" id="cardname" placeholder="Enter Product Name" name="product_name" >

                </div>

              </div>
              <div class="form-group col-lg-6 col-xs-12">

                <label for="cardname" class="col-md-4 control-label">Vendor Name</label>

                <div class="col-md-8 col-sm-8 col-xs-12">

                  <input type="text"   class="form-control" id="cardname" placeholder="Enter Product Name" name="vendor_name" >

                </div>

              </div>
              <div class="form-group col-lg-6 col-xs-12">

                <label for="cardname" class="col-md-4 control-label">Upload Date from</label>

                <div class="col-md-8 col-sm-8 col-xs-12">

                  <input type="date"   class="form-control" id="cardname" placeholder="Enter Product Name" name="fromdate" >

                </div>

              </div>
              <div class="form-group col-lg-6 col-xs-12">

                <label for="cardname" class="col-md-4 control-label">Upload Date to </label>

                <div class="col-md-8 col-sm-8 col-xs-12">

                  <input type="date"   class="form-control" id="cardname" placeholder="Enter Product Name" name="todate" >

                </div>

              </div>

             <div class="form-group">

                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"> <a href="<?= base_url("admin/products/index"); ?>"  class="btn btn-primary">Cancel</a>

                <button type="submit" name="submit" class="btn btn-success" >Search</button>

                </div>

              </div>

            </form>

          </div>

        </div>

      </div>

    </div>

 


<div class="right_col" role="main">

  <div class="">

    <div><?php echo $this->session->flashdata('message');?></div>

    <div class="clearfix"></div>



        <div class="x_panel">

          <div class="x_title">

            <h2>Products</h2>

            <ul class="nav navbar-right panel_toolbox">

               <a href="<?= base_url("admin/products/add_card"); ?>" style="color:white;" class="btn btn-primary" role="button"  data-target="#new-user-reg">Add Products</a> 

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
                     <th>New</th>
                        <th>Feature</th>
                          <th>Price</th>
                        <th>Discount Price</th>
 <th>Status</th>

                       
                         <th>Uploaded BY</th>
                          <th>Upoaded On </th>

                  <!-- <th>View</th> -->

                  <th>Edit</th>

                  <th>Delete</th>

                </tr>

              </thead>

               <?php if(!empty($card)): ?> 



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
                    <td><?php echo ucfirst($cards->new); ?></td>
                     <td><?php echo ucfirst($cards->feature); ?></td>
                     <td><?php echo $cards->actual_price; ?></td>
                     <td><?php echo $cards->discount_price; ?></td>
                      <td><?php  if($cards->status=="Active"){echo "<span style='color:green;font-weight:bold'> Active</span>";}
                   else{echo "<span style='color:red;font-weight:bold'> DeActive</span>";}?></td>
                      <td><?php  if($cards->vendor_id==0){echo "Admin";}else{echo "Vendor";} ?></td>
                     <td><?php echo $cards->created_at; ?></td>

                  <!-- <td><a href="#myModal" type="button"  data-toggle="modal" data-target="#myModal"><img src="<?= base_url("assets/images/admin/view-icon.png") ?>" alt="greeting"></a></td>

                  <div id="myModal" class="modal fade" role="dialog">

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

                  <td><a href="<?php echo base_url(); ?>admin/products/edit/<?php  echo $cards->card_id; ?>"><i class="fa fa-pencil-square-o" style="font-size:18px"></i></a></td>

                  <td><a href="<?php echo base_url(); ?>admin/products/delete/<?php  echo $cards->card_id; ?>" onclick="return checkDelete('<?php  echo $cards->card_id; ?>')"><i class="fa fa-trash" style="font-size:18px"></i></a></td>

                </tr>

                <?php endforeach; ?>

              </tbody>

              <?php endif; ?>

            </table>

          </div>

        </div>

      </div>

      <div class="clearfix"></div>
<center><?= $this->pagination->create_links(); ?></center>
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

url: "<?php echo base_url(); ?>admin/products/sub_catg",

data: dataString,

cache: false,

success: function(html)

{

  

$(".sub_catg").html(html);

} 

});



});



});



 $(function () {

        $("input[name='chkPassPort']").click(function () {

            if ($("#chkYes").is(":checked")) {

                $("#dvPassport").show();

            } else {

                $("#dvPassport").hide();

            }

        });

    });

</script> 

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script> 

<script>

  $.validate({

    lang: 'en'

  });

</script> 

