<?php //echo '<pre>';print_r($order_items);exit; ?>
   <table width="100%"  style="max-width:650px;margin:0 auto" cellspacing="0" cellpadding="0" height="60"> 
   <tbody>
    <tr style="background:#009688"> 
     <td> 
      <table width="100%" style="max-width:650px;margin:0 auto"> 
       <tbody>
        <tr> 
			<td style="width:50%;text-align:left;padding-left:16px;position:relative"> 
			 <a style="text-decoration:none;outline:none;color:#ffffff;font-size:13px" href=""> 
				<span >
				<img style="position:absolute;top:-19px;left:0;width:72%;" border="0"  src="http://test.cartinhours.com/assets/home/images/logo_arr.png" alt="cartinhours.com"  class="CToWUd"> 
			 </a> 
			 </span>
			 
		 </td>
         <td style="width:50%;text-align:right;color:rgba(255,255,255,0.8);font-family:'Roboto-Medium',sans-serif;font-size:14px;font-style:normal;font-stretch:normal;padding-right:16px"> <b>Order confirmed</b> </td> 
        </tr> 
       </tbody>
      </table> </td> 
    </tr> 
   </tbody>
  </table> 
   
   
  <table width="100%" cellspacing="0" cellpadding="0" style="margin:0 auto;padding:10px;background-color:#f1f2f3;max-width:650px;"> 
   <tbody> 
    <tr> 
     <td> 
      <table width="100%" cellspacing="0" cellpadding="0" style="margin:0 auto;max-width:650px;background:#ffffff"> 
       <tbody>
        <tr> 
         <td align="left"  style="display:block;margin:0 auto;clear:both;padding:0px 40px"> 
          <table width="100%" cellspacing="0" cellpadding="0" style="margin:0 auto;max-width:650px;background:#ffffff"> 
           <tbody>
            <tr> 
             <td align="left"   style="color:#212121;display:block;margin:0 auto;clear:both;padding:3px 0 0 0"> 
              <table width="100%" cellspacing="0" cellpadding="0"> 
               <tbody> 
                <tr> 
                 <td  align="left" style="float:right;padding:0;text-align:center;vertical-align:middle">
					<h4><b style="color:#009688">Order :</b><span >&nbsp; Placed</span></h4>
				 </td> 
                 <td  align="left" style="float:left;vertical-align:middle"> <p style="font-family:'Roboto-Medium',sans-serif;font-size:16px;font-weight:normal;font-style:normal;line-height:1.5;font-stretch:normal;color:#212121;margin:16px 0px">Hi <?php echo isset($order_items[0]['name'])?$order_items[0]['name']:''; ?>,</p> 
				 </td> 
                </tr> 
               </tbody> 
              </table> </td> 
            </tr> 
           </tbody>
          </table> 
          <table width="100%" cellspacing="0" cellpadding="0" style="margin:0 auto;padding:20px 0 0 0;max-width:650px;background:#ffffff;" border="0"> 
           <tbody>
            <tr> 
             <td> 
              <table width="100%" border="0" cellpadding="0" cellspacing="0" align="left" style="table-layout:fixed;border-spacing:0;border-collapse:collapse;width:100%;max-width:260px;border:none;margin-bottom:24px;margin-right:30px"> 
               <tbody>
                <tr> 
                 <td  align="left" style="border-right:1px solid #f4f4f4;padding-right:10px"> 
				 <p style="padding:0;margin:0;font-size:16px;font-family:'Roboto-Medium',sans-serif;color:#212121">Your order has been successfully placed.</p> 
				 <p style="padding:0;margin:0;font-size:16px;font-family:'Roboto-Medium',sans-serif;color:#212121;margin-bottom:12px"> </p>
				 <br> <p></p> <p style="padding:0;margin:0;font-size:12px;line-height:20px;font-family:'Roboto',sans-serif;font-weight:400;padding-bottom:12px"> We are pleased to inform you that <?php echo isset($order_items[0]['qty'])?$order_items[0]['qty']:''; ?> 
				 item from your order <b><?php echo isset($order_items[0]['order_id'])?$order_items[0]['order_id']:''; ?></b> has been shipped! </p> 
                </tr> 
               </tbody>
              </table> 
              <table width="100%" border="0" cellpadding="0" cellspacing="0" align="left" style="border-spacing:0;border-collapse:collapse;width:100%;max-width:220px;border:none;margin-bottom:24px"> 
               <tbody>
                <tr> 
                 <td align="left"> 
				 <p style="padding:0;margin:0;font-size:16px;font-family:'Roboto-Medium',sans-serif;color:#212121;margin-bottom:12px">Delivery Address</p>
				 <p style="padding:0;margin:0;font-size:12px;font-family:'Roboto',sans-serif;line-height:20px;padding-right:35px;color:#212121"> </p>
				 <p style="padding:0;margin:0;font-size:12px;font-family:'Roboto',sans-serif;line-height:20px"><?php echo isset($order_items[0]['name'])?$order_items[0]['name']:''; ?></p> 
				 <p style="padding:0;margin:0;font-size:12px;font-family:'Roboto',sans-serif;line-height:20px"><?php echo isset($order_items[0]['customer_address'])?$order_items[0]['customer_address']:''; ?></p> 
				 <p style="padding:0;margin:0;font-size:12px;font-family:'Roboto',sans-serif;line-height:20px"><?php echo isset($order_items[0]['city'])?$order_items[0]['city']:''; ?> - <?php echo isset($order_items[0]['pincode'])?$order_items[0]['pincode']:''; ?></p>
				 <p style="padding:0;margin:0;font-size:12px;font-family:'Roboto',sans-serif;line-height:20px"><?php echo isset($order_items[0]['state'])?$order_items[0]['state']:''; ?></p> <p style="padding:0;margin:0;font-size:12px;font-family:'Roboto',sans-serif;line-height:20px">Mob. <?php echo isset($order_items[0]['customer_phone'])?$order_items[0]['customer_phone']:''; ?></p></p>
				 <p>
				 </p>
				 </td> 
                </tr> 
               </tbody>
              </table> </td> 
            </tr> 
           </tbody>
		   
          </table> 
		 <p style="border-top:1px solid #ddd"></p>
		  
		  <?php foreach ($order_items as $list){  ?>	
		  
          <table width="100%" cellspacing="0" cellpadding="0" style="margin:0 auto;max-width:650px;background:#ffffff"> 
           <tbody>
            <tr> 
             <td align="left" > 
              <table width="100%" cellspacing="0" cellpadding="0">

					  
               <tbody> 
                <tr> 
                 <td width="120" valign="top" align="left">
				 <?php 
				 $url=base_url('uploads/products/'.$list['item_image']);
				 $new = str_replace(' ', '%20', $url); ?>
					 <a style="color:#027cd8;text-decoration:none;outline:none;color:#ffffff;font-size:13px;display:block;width:100px"
					 href="<?php echo base_url('category/productview/'.base64_encode($list['item_id'])); ?>" >
					 <img border="0" src="<?php echo $new; ?>" alt="<?php echo isset($list['item_name'])?$list['item_name']:''; ?>" style="border:none;width:100%"> 
					 </a> 
				 </td>  
                 <td width="8"></td> 
                 <td  align="left"> 
					 <p style="margin-bottom:13px"> 
					 <a href="" style="font-family:'Roboto',sans-serif;font-size:14px;font-weight:normal;font-style:normal;font-stretch:normal;line-height:1.25;color:#2175ff;text-decoration:none" target="_blank"><?php echo isset($list['item_name'])?$list['item_name']:''; ?>&nbsp;<?php echo isset($list['product_code'])?$list['product_code']:''; ?> (<?php echo isset($list['colour'])?$list['colour']:''; ?>, <?php echo isset($list['internal_memeory'])?$list['internal_memeory'].' GB':''; ?>)
					 </a>
					 <sup></sup> <br>
					 </p>
					 <p style="font-family:'Roboto',sans-serif;font-size:12px;font-weight:normal;font-style:normal;line-height:1.5;font-stretch:normal;color:#878787;margin:0px 0px">Seller: <?php echo isset($list['store_name'])?$list['store_name']:''; ?></p>
					
					<?php $time = date("H:i:s a",strtotime($list['create_at']));
					$begin1 = new DateTime('12:00 am');
					$end1 = new DateTime('7:00 pm');
					$begin2 = new DateTime('7:01 pm');
					$end2 = new DateTime('11:59 pm');
					$convertdate=date("g:i a", strtotime($time));
					$now = new DateTime($convertdate);

					if ($now >= $begin1 && $now <= $end1){
						$times=' today 10 pm';
					}else{
						$times=' tomorrow 2pm';
					}
					
					?>						
					 <p style="font-family:'Roboto',sans-serif;font-size:12px;font-weight:normal;font-style:normal;line-height:1.5;font-stretch:normal;color:#212121;margin:0px 0px">Item will be delivery expected by <?php echo isset($times)?$times:'';  ?></p> 
					 <p style="font-family:'Roboto-Medium',sans-serif;font-style:normal;line-height:1.5;font-stretch:normal;color:#212121;margin:5px 0px"> 
						 <span style="padding-right:10px">Amount : ₹<?php echo isset($list['total_price'])?$list['total_price']:''; ?></span>
						 <span style="font-family:'Roboto-Medium',sans-serif;font-size:12px;font-weight:normal;font-style:normal;line-height:1.5;font-stretch:normal;color:#878787;margin:0px 0px;border:1px solid #dfdfdf;display:inline;border-radius:3px;padding:3px 10px">Qty: <?php echo isset($list['qty'])?$list['qty']:''; ?></span> 
					 </p> 
					 <br>
					  <a href="<?php echo base_url('customer/orederdetails/'.base64_encode($list['order_item_id']));?>" style="font-family:'Roboto-Medium',sans-serif;box-sizing:border-box;text-decoration:none;background-color:#009688;color:#fff;min-width:160px;padding:7px 16px;border-radius:2px;text-align:center;display:inline-block;font-size:14px" target="_blank" >Track your Shipment</a> </td> 

				 </td> 
                </tr> 
               </tbody>

					   
              </table>		  
			  
			  </td> 
            </tr> 
           </tbody>
          </table> 
         <p style="border-top:1px solid #ddd"></p>
         <?php if(isset($list['amount_status_paid']) && $list['amount_status_paid']==0){ ?>
          <table width="100%" cellspacing="0" cellpadding="0" style="margin:0 auto;padding:30px 0 0 40px;max-width:650px;background:#ffffff" border="0"> 
           <tbody>
            <tr> 
             <td> 
              <table width="100%" border="0" cellpadding="0" cellspacing="0" align="left" style="border-spacing:0;border-collapse:collapse;width:100%;max-width:220px;border:none;margin-bottom:24px"> 
               <tbody>
                <tr> 
                 <td align="left"> <p style="padding:0;margin:0;font-size:14px;font-family:'Roboto-Medium',sans-serif;color:#212121;margin-bottom:12px">Payment Details</p> 
                  <table width="100%" border="0" cellpadding="0" cellspacing="0"> 
                   <tbody>
                    <tr> 
                     <td style="padding:0px"> 
						 <p style="padding:0;margin:0;font-size:12px;font-family:'Roboto',sans-serif;font-weight:400;color:#212121"> Amount Payable on Delivery 
							<span style="padding:0;margin:0;font-size:12px;font-family:'Roboto-Medium',sans-serif;color:#212121;padding-left:10px">₹<?php echo ($list['total_price']) + ($list['delivery_amount']); ?></span> 
						</p>
					 </td> 
                    </tr> 
                   </tbody>
                  </table> </td> 
                </tr> 
               </tbody>
              </table> </td> 
            </tr> 
           </tbody>
          </table>
		 <?php } ?> <p style="border-top:1px solid #ddd"></p>
		<?php } ?> 
	
		<br> </td> 
        </tr> 
       </tbody> 
      </table> 
     
    </tr> 
   </tbody>
   
  </table> 
   
    
  