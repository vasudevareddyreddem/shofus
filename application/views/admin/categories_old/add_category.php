<?php $this->load->helper('msg_helper');  ?>

<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h3 style="color:red;">Categories/Sub Categories Management <a href="<?php echo base_url(); ?>admin/categories/"  class="btn btn-info pull-right"><i class="fa fa-long-arrow-left"></i> Back to Categories</a>  </h3>
            
          
            <div class="clearfix"></div>
          </div>
          <div class="row">
            <div class="col-md-5">
              <?php if( $error = $this->session->flashdata('parent')): ?>
              <div class="row">
                <div class="col-lg-12">
                  <div class="alert alert-dismissible alert-success">
                    <?= $error ?>
                  </div>
                </div>
              </div>
              <?php elseif( $error = $this->session->flashdata('delete')): ?>
              <div class="row">
                <div class="col-lg-12">
                  <div class="alert alert-dismissible alert-danger">
                    <?= $error ?>
                  </div>
                </div>
              </div>
              <?php endif; ?>
              <form method="POST" class="form-inline" accept-charset="utf-8" action="<?= base_url("admin/categories/catg_add"); ?>">
                <h4>Add Category</h4>
                <div class="form-group">
                  <input type="text" class="form-control" name="catg_name" id="exampleInputName2" placeholder="Category Name" required>
                </div>
                <button type="submit" name="submit"  class="btn btn-success">Add</button>
              </form>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Category</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($all_category as $categories): ?>
                    <tr>
                      <td><span class="xedit" id="<?php echo $categories->category_id; ?>" valu="<?php echo $categories->category_name; ?>"> <a href="#"><?php echo $categories->category_name; ?></a></span></td>
                      <td><a href="<?= base_url("admin/categories/delete_parent/$categories->category_id") ?>" Onclick="return ConfirmDelete();" type="submit" name="actiondelete" value="1"><i class="fa fa-trash" style="font-size:18px"></i></a></td>
                      <?php endforeach; ?>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="col-md-7">
              <?php if( $error = $this->session->flashdata('added')): ?>
              <div class="row">
                <div class="col-lg-12">
                  <div class="alert alert-dismissible alert-success">
                    <?= $error ?>
                  </div>
                </div>
              </div>
              <?php endif; ?>
              <form method="POST" class="form-horizontal " accept-charset="utf-8" action="<?= base_url("admin/categories/sub_cat_add"); ?>">
                <h4>Add Sub-Category</h4>
                <div class="form-group">
                  <label class="control-label col-sm-4" for="category">Category:</label>
                  <div class="col-sm-8">
                    <select name="category_id" class="form-control" required>
                      <option value="" >Select the Category</option>
                      <?php foreach ($all_category as $categories): ?>
                      <option value="<?php echo $categories->category_id; ?><"><?php echo $categories->category_name; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-4" for="pwd">Sub-Category:</label>
                  <div class="col-sm-8">
                    <input type="sub-catg" class="form-control" name="sub-cat-name" id="sub" placeholder="Enter sub-category" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-4 col-sm-8">
                    <button type="submit" class="btn btn-success">Add</button>
                    <a href="<?php echo base_url(); ?>admin/categories/"  class="btn btn-default">Cancel</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
</div>
</div>
</div>
<script>





    function checkDelete(id)





  {





    





  return confirm('Are you sure want to delete "'+id +'" Order?');





  }





  </script>