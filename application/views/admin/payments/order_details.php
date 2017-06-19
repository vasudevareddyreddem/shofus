<!--main content start-->
  <section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-cutlery" aria-hidden="true"></i>Orders</h3>
          <ol class="breadcrumb">
             <li><i class="fa fa-home"></i><a href="<?php echo base_url();?>admin/dashboard">Home</a></li>
            <li><i class="fa fa-users" aria-hidden="true"></i>Orders</li>
          </ol>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <section class="panel">
            <header class="panel-heading">
              <h3>Details of order id <?php  echo $orderdata->order_id; ?></h3>
            </header>
            <div class="panel-body">
             <a href="<?php echo base_url(); ?>admin/payments/customer_payments"><button class="btn btn-primary" type="submit">>>Back</button></a>
              <div class="details-tbl">
                <table>
                  <tr>
                    <td class="title">Product Name: </td>
                    <td class="text"><?php  echo $orderdata->product_name; ?></td>
                  </tr>
                  <tr>
                    <td class="title">Deliveryboy Name: </td>
                    <td class="text"><?php 
                      if(isset($orderdata->deliveryboy_id) && $orderdata->deliveryboy_id!=0 &&  $orderdata->deliveryboy_id!='')
                      {
                                $this->db->select('deliveryboy_name');
                                $this->db->where('deliveryboy_id',$orderdata->deliveryboy_id);
                      $query =  $this->db->from('deliveryboy')->get();

                      if($query->num_rows() > 0)
                       {
                              $ret = $query->row();
                              if(isset($ret->deliveryboy_name) && $ret->deliveryboy_name!='')
                              {
                           echo  $ret->deliveryboy_name; 
                         }else
                         {
                          echo '--';
                         }
}else
                         {
                          echo '--';
                         } 
}else
                         {
                          echo '--';
                         } ?></td>
                  </tr>

                   <tr>
                    <td class="title">Delivered Place: </td>
                    <td class="text"><?php  echo $orderdata->delivery_drop; ?></td>
                  </tr>
                  <tr>
                    <td class="title">Pic Date&Time: </td>
                    <td class="text"><?php  echo $orderdata->pickup_time; ?></td>
                  </tr>
                  <tr>
                    <td class="title">Delivered Date&Time:</td>
                    <td class="text"><?php  echo $orderdata->delivered_time; ?></td>
                  </tr>

                 
                 
                </table>
              </div>
            </div>
          </section>
        </div>
      </div>
      <!-- page start--> 
      <!-- page end--> 
    </section>
  </section>
  <!--main content end-->   





