

<div class="container">
    <div class="row">
        <div class="col-md-4 text-center">
            <div class="panel panel-default panel-pricing">
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