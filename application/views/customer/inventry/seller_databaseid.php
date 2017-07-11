


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <div class="container">
         <!-- Main content -->
      <div class="row">
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Seller Id's In Database</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
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
                <?php  
                  foreach($database_id as $id) {?>
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
                 <?php }?>
                </tbody>
                </tbody>                
              </table>
            </div>

            <!-- /.box-body -->
          </div>
</div>
</div>
</div>