<!-- 
      <div class="row">
<div class="col-md-12">		
			<div class="col-md-3">
			<table class="table table-bordered table-compare">
				<tr>
					<td><?php echo $compare_two['item_name'];?></td>
				</tr>
				<tr>
					<td><img class="img-responsive" style="width: 40%" src="<?php echo base_url('uploads/products/'.$compare_two['item_image']); ?>"></td>
				</tr>
				<tr>
					<td><?php echo ($compare_two['item_cost']); ?></td>
				</tr>
        <tr>
          <td><?php echo $compare_two['item_code']; ?></td>
        </tr>
			</table>
			</div>
			
	  </div>
	  </div> -->

<div class="container">
    <div class="row">
        <div class="col-md-4 text-center">
            <div class="panel panel-danger panel-pricing">
                <div class="panel-heading">

                    <img class="img-responsive" src="<?php echo base_url('uploads/products/'.$compare_two['item_image']); ?>">
                </div>

                <ul class="list-group text-center">
                    <li class="list-group-item">Product Name:
                        <?php echo $compare_two[ 'item_name'];?>
                    </li>
                    <li class="list-group-item">Product Price:
                        <?php echo $compare_two[ 'item_cost']; ?>
                    </li>
                    <li class="list-group-item">Product Code:
                        <?php echo $compare_two[ 'item_code']; ?>
                    </li>

                </ul>

            </div>
        </div>
    </div>
</div>