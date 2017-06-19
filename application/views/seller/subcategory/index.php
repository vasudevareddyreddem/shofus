  <!--main content start-->
  <section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
      <div class="row">
       <div class="col-md-7">
           <h3 class="page-header"><i class="fa fa-users" aria-hidden="true"></i>Seller Sub-Categories</h3></div>
          <div class="col-md-5 pull-right">
         <form class="navbar-form" action="<?php echo base_url(); ?>seller/subcategory/search" method="post">
          <input class="form-control" placeholder="Search" name="search" type="text">
         <button class="btn btn-default" type="submit">Go!</button>
          </form>
            </div></div>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="<?php echo base_url(); ?>seller/dashboard">Home</a></li>
         <li><i class="fa fa-cutlery" aria-hidden="true"></i>Seller sub-categories</li>
          <!--  <li><i class="fa fa-square-o"></i>Starters</li>-->
          </ol>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <section class="panel">
            <header class="panel-heading">
              <h3>Seller Sub-Categories</h3>
            </header>
			 <div><?php echo $this->session->flashdata('message');?></div>
            <div class="panel-body"> <a href="<?php echo base_url();  ?>seller/subcategory/create" class="add_item">
              <button class="btn btn-primary" type="submit">Add Subcategory</button>
              </a>
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Category Name</th>
                      <th>Subcategory</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
				  <?php $count = $this->uri->segment(4, 0);
				  foreach($subcatdata as $subcat_data){?>
                    <tr>
                      <td><?= ++$count ?></td>
                      <td><?php echo $subcat_data->category_name;?></td>
                      <td><?php echo $subcat_data->subcategory_name;?></td>
                      
                      <td><a href="<?php echo site_url(); ?>seller/subcategory/edit/<?php echo $subcat_data->seller_subcategory_id; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                      <td><a href="<?php echo site_url(); ?>seller/subcategory/delete/<?php echo $subcat_data->seller_subcategory_id; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                    </tr>
				  <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </section>
		   <center><?= $this->pagination->create_links(); ?></center>
        </div>
      </div>
      <!-- page start--> 
      <!-- page end--> 
    </section>
  </section>
  <!--main content end--> 