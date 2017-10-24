
<?php //echo '<pre>';print_r($details);exit; ?>
<table width="100%" cellspacing="0" cellpadding="0" style="margin:0 auto;padding:10px;background-color:#f1f2f3"> 

   <tbody> 
    <tr> 
     <td> 
      <table width="100%" cellspacing="0" cellpadding="0" style="margin:0 auto;max-width:800px;background:#ffffff"> 
       <tbody>
	   
        <tr> 
         <td align="left"  style="display:block;margin:0 auto;clear:both;padding:0px 40px"> 
          <table width="100%" cellspacing="0" cellpadding="0" style="margin:0 auto;max-width:700px;background:#ffffff"> 
           <tbody>
            <tr> 
             <td align="left"   style="color:#212121;display:block;margin:0 auto;clear:both;padding:3px 0 0 0"> 
              <table width="100%" cellspacing="0" cellpadding="0"> 
               <tbody>
				<tr  ><h3 style="text-align:center;font-family:'Roboto-Medium',sans-serif;font-size:20px;font-weight:normal;font-style:normal;">Tax Invoice</h3></tr>			   
                <tr> 
                 <td  align="left" style="float:right;padding:0;text-align:center;vertical-align:middle">
				<p style="color:#444;font-size:16px;border-style: dotted;padding:5px;"><b>Invoice Number </b># <?php echo isset($details['order_item_id'])?$details['order_item_id']:'';  ?><?php echo isset($details['invoice_id'])?$details['invoice_id']:'';  ?></p>
				 </td> 
                 <td  align="left" style="float:left;vertical-align:middle"> <p style="font-family:'Roboto-Medium',sans-serif;font-size:16px;font-weight:normal;font-style:normal;line-height:1.5;font-stretch:normal;color:#212121;margin:16px 0px"><b>Sold By: <?php echo isset($details['store_name'])?$details['store_name']:'';  ?>,</b>
</p> 
				 </td> 
                </tr> 
                <tr> 
				<td>
				<p style="padding:0;margin:0;font-size:16px;line-height:20px;font-family:'Roboto',sans-serif"><i><b>Ship-from Address:</b> <?php echo isset($details['sadd1'])?$details['sadd1']:'';  ?>,
				<?php echo isset($details['sadd2'])?$details['sadd2']:'';  ?>, <?php echo isset($details['Spin'])?$details['Spin']:'';  ?></p>
				</td>
                </tr>
				<tr> 
				<?php if(isset($details['gstin']) && $details['gstin']!=''){ ?>
				<td>
				<p style="padding:0;margin-top:8px;font-size:16px;line-height:20px;font-family:'Roboto',sans-serif"><b>GSTIN</b> - <?php echo isset($details['gstin'])?$details['gstin']:'';  ?>
				</p>
				</td>
				<?php } ?>
                </tr> 
               </tbody> 
              </table> </td> 
            </tr> 
           </tbody>
          </table> 
		  <hr>
          <table width="100%" cellspacing="0" cellpadding="0" style="margin:0 auto;padding:40px 0 0 0;max-width:700px;background:#ffffff;" border="0"> 
           <tbody>
            <tr> 
             <td> 
              <table width="100%" cellpadding="0" cellspacing="0"  style="table-layout:fixed;border-spacing:0;border-collapse:collapse;width:100%;border:none;margin-bottom:24px;"> 
               <tbody>
                <tr style="margin:0"> 
				<td   style="padding-right:10px;"> 
				
				 <p style="padding:0;margin:0;font-size:16px;font-family:'Roboto-Medium',sans-serif;color:#212121;"><b>Order ID: </b><?php echo isset($details['order_item_id'])?$details['order_item_id']:'';  ?></p>
				 <p style="padding:0;margin-top:8px;font-size:16px;font-family:'Roboto-Medium',sans-serif;color:#212121;"><b>Order Date:</b> <?php echo isset($details['create_at'])?Date('M-d-Y h:i:s A',strtotime(htmlentities($details['create_at']))):'';  ?></p>
				 <p style="padding:0;margin-top:8px;font-size:16px;font-family:'Roboto-Medium',sans-serif;color:#212121;"><b>Invoice Date:</b> <?php echo isset($details['create_at'])?Date('M-d-Y h:i:s A',strtotime(htmlentities($details['create_at']))):'';  ?></p> 
				 <p style="padding:0;margin:0;font-size:16px;font-family:'Roboto-Medium',sans-serif;color:#212121;margin-bottom:10px"> &nbsp;</p> <p style="padding:0;margin:0;font-size:16px;font-family:'Roboto-Medium',sans-serif;color:#212121;margin-bottom:10px"> &nbsp;</p> <p style="padding:0;margin:0;font-size:16px;font-family:'Roboto-Medium',sans-serif;color:#212121;margin-bottom:10px"> &nbsp;</p><p style="padding:0;margin:0;font-size:16px;font-family:'Roboto-Medium',sans-serif;color:#212121;margin-bottom:10px"> &nbsp;</p><p style="padding:0;margin:0;font-size:16px;font-family:'Roboto-Medium',sans-serif;color:#212121;margin-bottom:10px"> &nbsp;</p>
				 
				 
				   </td>
				
                 <td   style="padding-right:10px"> 
					<p style="padding:0;margin:0;font-size:16px;font-family:'Roboto-Medium',sans-serif;color:#212121;margin-bottom:16px">Billing Address</p>
				 <p style="padding:0;margin:0;font-size:16px;font-family:'Roboto',sans-serif;line-height:20px;padding-right:35px;color:#212121"> </p>
				 <p style="padding:0;margin:0;font-size:16px;font-family:'Roboto',sans-serif;line-height:20px"><?php echo isset($details['cust_firstname'])?$details['cust_firstname']:'';  ?>&nbsp;<?php echo isset($details['cust_lastname'])?$details['cust_lastname']:'';  ?></p> 
				 <p style="padding:0;margin:0;font-size:16px;font-family:'Roboto',sans-serif;line-height:20px"><?php echo isset($details['cust_email'])?$details['cust_email']:'';  ?>&nbsp;</p> 
				 <p style="padding:0;margin:0;font-size:16px;font-family:'Roboto',sans-serif;line-height:20px"><?php echo isset($details['address1'])?$details['address1']:'';  ?>, <?php echo isset($details['address2'])?$details['address2']:'';  ?> , <?php echo isset($details['cpin'])?$details['cpin']:'';  ?>  .</p> 
				 <p>
				 </p>
				 </td>
				  <td   style="padding-right:10px"> 
					<p style="padding:0;margin:0;font-size:16px;font-family:'Roboto-Medium',sans-serif;color:#212121;margin-bottom:16px">Shipping Address</p>
				 <p style="padding:0;margin:0;font-size:16px;font-family:'Roboto',sans-serif;line-height:20px;padding-right:35px;color:#212121"> </p>
				 <p style="padding:0;margin:0;font-size:16px;font-family:'Roboto',sans-serif;line-height:20px"><?php echo isset($details['name'])?$details['name']:'';  ?></p> 
				 <p style="padding:0;margin:0;font-size:16px;font-family:'Roboto',sans-serif;line-height:20px"><?php echo isset($details['customer_address'])?$details['customer_address']:'';  ?>, <?php echo isset($details['city'])?$details['city']:'';  ?> , <?php echo isset($details['state'])?$details['state']:'';  ?> , <?php echo isset($details['pincode'])?$details['pincode']:'';  ?> .</p> 
				 <p>
				 </p>
				 </td>
				   
				   <td   style="padding-right:10px;width:80px"> 
				
				 <p style="padding:0;margin:0;font-size:16px;font-family:'Roboto-Medium',sans-serif;color:#212121;margin-bottom:16px"> </p>
				 <p style="padding:0;margin:0;font-size:16px;line-height:20px;font-family:'Roboto',sans-serif"><i>*Keep this invoice and
					manufacturer box for warranty purposes.</i>
 </p> 
				  </td> 
                </tr> 
               </tbody>
              </table> 
               </td> 
            </tr> 
           </tbody>
		   
          </table> 
		 <p style="border-top:1px solid #ddd"></p>
		  
		  
		  
          <table width="100%"  style="max-width:700px;background:#ffffff " >
			<tr >
    <th style="padding:0;margin:0;font-size:16px;font-family:'Roboto-Medium',sans-serif;color:#212121;padding-left:10px;min-width:180px;text-align:left">Product </th>
    <th style="padding:0;margin:0;font-size:16px;font-family:'Roboto-Medium',sans-serif;color:#212121;padding-left:10px;min-width:220px;text-align:left">Title</th> 
    <th style="padding:0;margin:0;font-size:16px;font-family:'Roboto-Medium',sans-serif;color:#212121;padding-left:10px;text-align:left">Qty</th>
    <th style="padding:0;margin:0;font-size:16px;font-family:'Roboto-Medium',sans-serif;color:#212121;padding-left:10px;text-align:left">Gross Amount ₹</th>
    <th style="padding:0;margin:0;font-size:16px;font-family:'Roboto-Medium',sans-serif;color:#212121;padding-left:10px;text-align:left">Delivery Amount ₹</th>
	<th style="padding:0;margin:0;font-size:16px;font-family:'Roboto-Medium',sans-serif;color:#212121;padding-left:10px;text-align:left">Total ₹</th>

  </tr>
  
 <tr style="border:">
	 <td colspan="9"style="padding:10px 0px;margin:0;font-size:16px;font-family:'Roboto-Medium',sans-serif;color:#212121;text-algin:right;border-top:1px solid #ddd"></td>
	 
  </tr>
  
  <tr>
  <td style="padding:0;margin:0;font-size:16px;font-family:'Roboto-Medium',sans-serif;color:#212121;padding-left:10px;text-align:left">
  <?php echo isset($details['subcategory_name'])?$details['subcategory_name']:'';  ?>
	</td>
    <td style="padding:0;margin:0;font-size:16px;font-family:'Roboto-Medium',sans-serif;color:#212121;padding-left:10px;text-align:left">
	<?php echo isset($details['item_name'])?$details['item_name']:'';  ?>&nbsp;<?php echo isset($details['product_code'])?$details['product_code']:'';  ?>
</td> 
    <td style="padding:0;margin:0;font-size:16px;font-family:'Roboto-Medium',sans-serif;color:#212121;padding-left:10px;text-align:left"><?php echo isset($details['qty'])?$details['qty']:'';  ?></td>
    <td style="padding:0;margin:0;font-size:16px;font-family:'Roboto-Medium',sans-serif;color:#212121;padding-left:10px;text-align:left"><?php echo number_format(isset($details['item_price'])?$details['item_price']:'', 2);  ?></td>
    <?php if(isset($details['delivery_amount']) && $details['delivery_amount']!=''){ ?> 
	<td style="padding:0;margin:0;font-size:16px;font-family:'Roboto-Medium',sans-serif;color:#212121;padding-left:10px;text-align:left"><?php echo isset($details['delivery_amount'])?$details['delivery_amount']:'';  ?></td>
    <?php }else{ ?>
		<td style="padding:0;margin:0;font-size:16px;font-family:'Roboto-Medium',sans-serif;color:#212121;padding-left:10px;text-align:left">&nbsp;</td>

	<?php } ?>
	<td style="padding:0;margin:0;font-size:16px;font-family:'Roboto-Medium',sans-serif;color:#212121;padding-left:10px;text-align:left"><?php echo number_format($details['total_price']+$details['delivery_amount'], 2);  ?></td>
  </tr>
  
  <tr >
	 <td style="padding:10px;margin-top:10px;">
		
	 </td>
	 
  </tr>
 
  
  <tr>
   <th colspan="9" style="padding:0px;margin-top:10px;border-top:1px solid #ddd">
  </th>
  </tr> 
  <tr>
   <th colspan="5"  style="padding:0px;margin-top:10px;text-algin:right;width:100%">
  </th> 
  <th  colspan="4"  style="padding-top:10px;margin-top:10px;font-size:16px;font-family:'Roboto-Medium',sans-serif;font-weight:600">Grand Total:<span style="padding-left:40px;">₹<?php echo number_format($details['total_price']+$details['delivery_amount'], 2);  ?></span>
  <p style="font-size:16px;font-weight:200;color:#555;padding:0;margin:4px"><i>Consulting Rooms Private Limited</i></p>
  </th>
 
  </tr>
  <tr>
   <th colspan="5"  style="padding:0px;margin-top:10px;text-algin:right;width:100%">
  </th> 
  <th  colspan="4"  style="padding-top:80px;margin-top:10px;font-size:16px;font-family:'Roboto-Medium',sans-serif;font-weight:600">Authorized Signatory

  </th>
 
  </tr>
  <tr>
   
  <th    style="padding-top:50px;margin-top:10px;font-size:16px;font-family:'Roboto-Medium',sans-serif;font-weight:600">

  </th>
 
  </tr>
 
  
  
		  </table>
          
          </td> 
        </tr> 
       </tbody> 
      </table> 
     
    </tr> 
   </tbody>
  </table> 
    
    
  