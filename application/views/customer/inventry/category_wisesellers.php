<div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <div class="container">
         <!-- Main content -->
      <div class="row">
<div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SNO</th>
                  <th>Seller Name</th>
                  <th>Seller category</th>                  
                </tr>
                </thead>
                <tbody>
                <?php  $count = $this->uri->segment(4, 0); 
                foreach($seller_category as $sellers) { ?>
                <tr>
                  <td><?= ++$count ?></td>
                  <td><?php echo $sellers['seller_name']; ?></td>
                  <?php if(count($sellers['category_name']) >= 1) { ?>
                  <td><?php echo "hello" ?></td>,

                   <?php }else{ ?>

                   <td><?php echo "hai" ?></td>,
                   <?php }

                   ?>

                  <!-- <td><?php echo $sellers['category_name']; ?></td>                   -->
                </tr>
                <?php } ?>
                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>

      </div>
      </div>
      </div>


      <script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>


