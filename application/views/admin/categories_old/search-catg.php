<!DOCTYPE html>

<?php

$this->load->view('admin/header');

?>
<section>
<div class="container">
    <section class="add-catg">
<div class="container">
<h1 class="text-left">Categories</h1>
  <div class="row">
    <div class="col-md-6">
      <form method="POST" class="form-inline"  accept-charset="utf-8" action="<?= base_url("admin/category/search"); ?>">            
        <div class="form-group">
          <label>Category</label>
          <select class="form-control" name="parent_id">
            <option>Select a Category</option>
            <?php foreach ($all_category as $categories): ?>
            <option value="<?php echo $categories->category_id; ?><"><?php echo $categories->category_name; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-success" >Search</button>
        </div>
      </form>
    </div>
    <div class="col-md-6  slide-upload">  
      <h3><a href="<?= base_url("admin/category/add_category");?>" class="btn btn-info" role="button">Add Categories</a></h3>
    </div>
    </div>
    <div class="table-responsive">          
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Serial No</th>
            <th>Category</th>
            <th>Sub-Category</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($category as $categories): ?>
         <tr>
            <td>01</td>
            <td><?php echo $categories->category_name; ?></td>
            <td><?php echo $categories->sub_cat_name; ?></td>
            <td><a href="<?= base_url("admin/category/category_edit/$categories->sub_cat_id"); ?>"><img src="<?= base_url("assets/images/admin/edit.png"); ?>" alt="greeting"></a></td>

            <td> <a href="<?= base_url("admin/category/category_delete/$categories->sub_cat_id"); ?>" Onclick="return ConfirmDelete();" type="submit" name="actiondelete" value="1"><img src="<?= base_url("assets/images/admin/delete.png"); ?>" alt="Delete"></a>
</td>


          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      
	</div>
  </div>
</section>

<script>
    function ConfirmDelete()
    {
      var x = confirm("Are you sure you want to delete?");
      if (x)
          return true;
      else
        return false;
    }
</script>    


<?php

$this->load->view('admin/footer');

?>

</body>
</html>