<!DOCTYPE html>
<style>
	.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #5D6975;
  text-decoration: underline;
}
.water_mark{
background:url(<?php echo base_url('assets/home/images/opa.png');?>);
  background-repeat:no-repeat;
  background-position:center;
 
  }
body {
  position: relative;
  height: 29.7cm; 
  margin: 0 auto; 
  color: #001028;
   
  font-family: Arial, sans-serif; 
  font-size: 12px; 
  font-family: Arial;
}

header {
  padding-bottom: 10px;
  margin-bottom: 30px;
}

#logo {
  text-align: center;
  margin-bottom: 10px;
}

#logo img {
  width: 90px;
}

h1 {
  
  color: #5D6975;
  font-size: 20px;
 // line-height: 1.4em;
  font-weight: normal;
  text-align: center;
  margin: 0 0 20px 0;
  background: #d32134;
  color:#fff;
  padding:5px;
}

#project {
  float: left;
 
}

#project span {
  color: #5D6975;
  text-align: left;
  width: 60px;
  margin-right: 10px;
  display: inline-block;
  font-size: 12px;
}

#company {
  float: right;
  text-align: right;
}



table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table tr:nth-child(2n-1) td {
  background: #F5F5F5;
}

table th,
table td {
  text-align: center;
}

table th {
  padding: 5px 20px;
  color: #5D6975;
  border-bottom: 1px solid #C1CED9;
  white-space: nowrap;        
  font-weight: normal;
}

table .service,
table .desc {
  text-align: left;
  width:200px
}

table td {
  padding: 20px;
  text-align: right;
}

table td.service,
table td.desc {
  vertical-align: top;
}
table th,
table td,
table td.desc
{
  font-size: 22px;

}

table td.grand {
  border-top: 1px solid #5D6975;;
}

#notices .notice {
  color: #5D6975;
  font-size: 1.2em;
}


</style>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Shofus</title>
    <link rel="stylesheet" href="style.css" media="all" />
  </head>
  <body>

    <header class="clearfix ">
     
      <h1>INVOICE </h1>
	   <div class="clearfix">
		<div ><span style="float:left"> <b>Website Name</b> <span>Shofus.com</span></span>
		<div ><span style="float:left"> <b>Sold By:</b> <span><?php echo isset($details['store_name'])?$details['store_name']:'';  ?> ,</span></span>
		<span  style="float:right;"> <b>Invoice Number </b># <?php echo isset($details['order_item_id'])?$details['order_item_id']:'';  ?><?php echo isset($details['invoice_id'])?$details['invoice_id']:'';  ?> </span>
		</div>
	  </div> 
	  <div class="">
		<p > <i><b>Ship-from Address:</b> </span><?php echo isset($details['sadd1'])?$details['sadd1']:'';  ?>, <?php echo isset($details['sadd2'])?$details['sadd2']:'';  ?>,
		<?php echo isset($details['Spin'])?$details['Spin']:'';  ?></span></i></p>
	  </div>
	  <?php if(isset($details['gstin']) && $details['gstin']!=''){ ?>
	  <div class="">
		<p > <b>GSTIN</b> </span> - <?php echo isset($details['gstin'])?$details['gstin']:'';  ?></span></p>
	  </div>
	  <?php } ?>
	  <hr>
      
      <div id="project" style="width:250px;">
        <div><span>Order ID:</span> <?php echo isset($details['order_item_id'])?$details['order_item_id']:'';  ?></div>
        <div><span>Order Date:</span> <?php echo isset($details['create_at'])?Date('M-d-Y h:i:s A',strtotime(htmlentities($details['create_at']))):'';  ?></div>
        <div><span>Invoice Date:</span> <?php echo isset($details['create_at'])?Date('M-d-Y h:i:s A',strtotime(htmlentities($details['create_at']))):'';  ?></div>
        
      </div>
	  <div id="project" style=" width:200px;" >
        <div><h3>Billing Address</h3></div>
        <div><p  style="word-wrap: break-word;"><?php echo isset($details['cust_firstname'])?$details['cust_firstname']:'';  ?>&nbsp;<?php echo isset($details['cust_lastname'])?$details['cust_lastname']:'';  ?>, <?php echo isset($details['cust_email'])?$details['cust_email']:'';  ?> ,<?php echo isset($details['address1'])?$details['address1']:'';  ?>,<?php echo isset($details['address2'])?$details['address2']:'';  ?> , <?php echo isset($details['cpin'])?$details['cpin']:'';  ?>.</p>
		</div>
      </div> 
	 
	  <div id="project" style=" width:200px;">
        <div><h3>Shipping Address</h3></div>
        <div><p  style="word-wrap: "><?php echo isset($details['name'])?$details['name']:'';  ?>, <?php echo isset($details['customer_address'])?$details['customer_address']:'';  ?>, <?php echo isset($details['city'])?$details['city']:'';  ?> , <?php echo isset($details['state'])?$details['state']:'';  ?> , <?php echo isset($details['pincode'])?$details['pincode']:'';  ?> .</p>
		</div>
      </div>

      
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">Product</th>
            <th class="desc">Title</th>
            <th>Qty</th>
            <th>Gross Amount ?</th>
            <th>Delivery Amount</th>
            <th>Discount </th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="service"><?php echo isset($details['subcategory_name'])?$details['subcategory_name']:'';  ?></td>
            <td class="desc"><?php echo isset($details['item_name'])?$details['item_name']:'';  ?>&nbsp;<?php echo isset($details['product_code'])?$details['product_code']:'';  ?></td>
            <td class="unit"><?php echo isset($details['qty'])?$details['qty']:'';  ?></td>
            <td class="qty"><?php echo number_format(isset($details['item_price'])?$details['item_price']:'', 2);  ?></td>
            <td class="qty"><?php echo isset($details['delivery_amount'])?$details['delivery_amount']:'';  ?></td>
            <td class="total"><?php echo number_format($details['total_price'], 2);  ?></td>
            <td class="total"><?php echo number_format($details['total_price']+$details['delivery_amount'], 2);  ?></td>
          </tr>
		 
		  <tr >
         
            <td class="desc " colspan="4" style="text-align:left;"><b>Notice
:</b> <span class="notice">*Keep this invoice and
					manufacturer box for warranty purposes.</span></td> 
			<td class="desc " style="text-align:right;font-size:17px">Total</td>
            
            <td  style="font-size:17px" colspan="2" ><b><?php echo number_format($details['total_price']+$details['delivery_amount'], 2);  ?></b></td>
            
          </tr>
		  <tr>
            <td class="desc " colspan="6" style="text-align:right;font-size:17px;background:none;">&nbsp;</td>
          </tr>
		  <tr>
            <td class="desc " colspan="7" style="text-align:right;font-size:17px;background:none;">
			<?php if(isset($details['gstinimage']) && $details['gstinimage']!=''){?>
			<div > <img style="width:150px;height:auto;padding-right:15px" src="<?php echo base_url('assets/sellerfile/'.$details['gstinimage']); ?>"></div>
			<?php } ?>
			<span>Authorized Signatory<span></td>
          </tr>
        </tbody>
      </table>
      
    </main>
   
  </body>
</html>