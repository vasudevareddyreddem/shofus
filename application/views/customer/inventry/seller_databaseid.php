
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>
 <section class="content">
      <div class="row">
        <div class="col-xs-12">
			<div class="box">
            <div class="box-header">
              <h3 class="box-title">Seller ID Database</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php if(!empty($database_id)): ?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Seller ID</th>
                  <th>Seller Name</th>
                  <th>Seller Mobile Number</th>                  
                  <th>Seller Store Details</th>
                  <th>Seller Categories</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($database_id as $id) { ?>
                <tr>                  
                  <td><?php echo $id['seller_id']; ?></td>
                  <td><?php echo $id['seller_name']; ?></td>
                  <td><?php echo $id['seller_mobile']; ?></td>
                  <td>
                    <table class="table table-bordered qtytable">
                    <tbody>
                      <tr>
                        <th>Shop name</th>
                        <td><?php echo $id['store_name']; ?></td>
                      </tr>
                      <tr>
                        <th>Address1</th>
                        <td><?php echo $id['addrees1']; ?></td>
                      </tr>
                      <tr>
                        <th>Address2</th>
                        <td><?php echo $id['addrees2']; ?></td>
                      </tr>
                      
                    </tbody>
                  </table>                   
                  </td> 
                        <td><?php echo $id['categoryname']; ?>.</td>               
                </tr>
                 <?php } ?>                
                </tbody>                
              </table>
              <?php else: ?>
                <center>
                <strong>No Sellers In Db</strong>
              </center>
              <?php endif; ?>
            </div>
            <!-- /.box-body -->
          </div>
          </div>
          </section>
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