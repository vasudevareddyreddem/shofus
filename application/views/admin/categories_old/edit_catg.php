<?php $this->load->helper('msg_helper');

?>

<div class="right_col" role="main">
  <div class="">
    <div class="page-title"> </div>
  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Categories</h2>
          
          <!--<ul class="nav navbar-right panel_toolbox">





                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>





                  <li><a class="close-link"><i class="fa fa-close"></i></a> </li>





                </ul>-->
          
          <div class="clearfix"></div>
        </div>
        <form method="POST" class="form-horizontal edit-cart" accept-charset="utf-8" action="<?= base_url("admin/categories/category_update"); ?>">
          <?php foreach ($category as $categories): ?>
          <div class="form-group">
            <label class="control-label col-sm-2" for="username">Category Name:</label>
            <div class="col-sm-10">
            
           
              <select class="form-control" name="sub_parent_id" id="sel1">
               
                <?php foreach ($all_category as $all_categories): ?>
                <option value="<?php echo $all_categories->category_id; ?>" <?php echo isset($categories->category_id) && $categories->category_id!='' && $categories->category_id==$all_categories->category_id?'selected':''  ; ?> ><?php echo $all_categories->category_name; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="sub-category" class="col-sm-2 control-label">Sub-category</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="sub_cat_name" value = "<?php echo $categories->sub_cat_name; ?>">
            </div>
          </div>
          
          <div class="form-group">
            <div class="col-sm-10">
              <input type="hidden" class="form-control" name="sub_cat_id" id="hide" value = "<?php echo $categories->sub_cat_id; ?>">
            </div>
          </div>
          <?php endforeach; ?>
          <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-success" >Update</button>
          </div>
          </div>
        </form>
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