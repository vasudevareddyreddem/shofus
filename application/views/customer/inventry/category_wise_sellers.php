<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="container">
    <!-- Main content -->
    <div class="row">
    <a class="btn btn-primary" href="<?php echo base_url('customer/categories');?>">BAck</a>
      <div class="box-body">
        <table id="example2" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>SNO</th>
              <th>Seller Name</th>
            </tr>
          </thead>
          <tbody>
            <?php  $count = $this->uri->segment(4, 0);
            foreach($seller_category as $sellers) { ?>
            <tr>
              <td><?php echo ++$count ?></td>
              <td>
                <?php echo $sellers['seller_name']; ?>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


