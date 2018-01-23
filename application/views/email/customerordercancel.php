<?php //echo '<pre>';print_r($order_items);exit; ?>
   <table width="100%"  style="max-width:650px;margin:0 auto" cellspacing="0" cellpadding="0" height="60"> 
   <tbody>
    <tr style="background:#d32134"> 
     <td> 
      <table width="100%" style="max-width:650px;margin:0 auto"> 
       <tbody>
        <tr> 
			<td style="width:50%;text-align:left;padding-left:16px;position:relative"> 
			 <a style="text-decoration:none;outline:none;color:#ffffff;font-size:13px" href=""> 
				<span >
				<img style="position:absolute;top:-19px;left:0;width:72%;" border="0"  src="http://test.shofus.com/assets/home/images/logo_arr.png" alt="cartinhours.com"  class="CToWUd"> 
			 </a> 
			 </span>
			 
		 </td>
         <td style="width:50%;text-align:right;color:rgba(255,255,255,0.8);font-family:'Roboto-Medium',sans-serif;font-size:14px;font-style:normal;font-stretch:normal;padding-right:16px"> <b>Order Cancelled</b> </td> 
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
					<h4><b style="color:#d32134">Order :</b><span >&nbsp; Cancelled</span></h4>
				 </td> 
                 <td  align="left" style="float:left;vertical-align:middle"> <p style="font-family:'Roboto-Medium',sans-serif;font-size:16px;font-weight:normal;font-style:normal;line-height:1.5;font-stretch:normal;color:#212121;margin:16px 0px">Hi <?php echo isset($list['name'])?$list['name']:''; ?>,</p> 
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
              <table width="100%" border="0" cellpadding="0" cellspacing="0" align="left" style="table-layout:fixed;border-spacing:0;border-collapse:collapse;width:100%;border:none;margin-bottom:24px;margin-right:30px"> 
               <tbody>
                <tr> 
                 <td  align="left" style="padding-right:10px"> 
				 <p style="padding:0;margin:0;font-size:16px;font-family:'Roboto-Medium',sans-serif;color:#212121">Greetings from Cartinhours.com!</p> 
				 <p style="padding:0;margin:0;font-size:16px;font-family:'Roboto-Medium',sans-serif;color:#212121;margin-bottom:12px"> </p>
				 <p style="padding:0;margin:0;font-size:12px;line-height:20px;font-family:'Roboto',sans-serif"> We would like to inform you that we are processing your cancellation request for the following items in the Order <span><b><?php echo isset($list['order_item_id'])?$list['order_item_id']:''; ?>.</b></span></p> 
				 <br> <p></p> <p style="padding:0;margin:0;font-size:12px;line-height:20px;font-family:'Roboto',sans-serif;font-weight:400;padding-bottom:12px">Any amount already paid by you for the below product(s) will be refunded by the seller as soon as the courier partner confirms the cancellation. We will notify you via E-mail and SMS when the refund is processed. </p> 
                </tr> 
               </tbody>
              </table> 
             </td> 
            </tr> 
           </tbody>
		   
          </table> 
		 <p style="border-top:1px solid #ddd"></p>
		  
		  
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
					 <a href="" style="font-family:'Roboto',sans-serif;font-size:14px;font-weight:normal;font-style:normal;font-stretch:normal;line-height:1.25;color:#2175ff;text-decoration:none" target="_blank"><?php echo isset($list['item_name'])?$list['item_name']:''; ?>
					 </a>
					 <sup></sup> <br>
					 </p>
					 <p style="font-family:'Roboto',sans-serif;font-size:12px;font-weight:normal;font-style:normal;line-height:1.5;font-stretch:normal;color:#878787;margin:0px 0px">Seller: <?php echo isset($list['store_name'])?$list['store_name']:''; ?></p>
											 
					 <p style="font-family:'Roboto',sans-serif;font-size:12px;font-weight:normal;font-style:normal;line-height:1.5;font-stretch:normal;color:#212121;margin:0px 0px">Item  Cancelled On <?php echo isset($list['cancel_date'])?Date('M-d-Y H:i:s A',strtotime(htmlentities($list['cancel_date']))):'';  ?> </p> 
					 <p style="font-family:'Roboto-Medium',sans-serif;font-style:normal;line-height:1.5;font-stretch:normal;color:#212121;margin:5px 0px"> 
						 <span style="padding-right:10px">Amount : ₹<?php echo isset($list['total_price'])?$list['total_price']:''; ?></span>
						 <span style="font-family:'Roboto-Medium',sans-serif;font-size:12px;font-weight:normal;font-style:normal;line-height:1.5;font-stretch:normal;color:#878787;margin:0px 0px;border:1px solid #dfdfdf;display:inline;border-radius:3px;padding:3px 10px">Qty: <?php echo isset($list['qty'])?$list['qty']:''; ?></span> 
					 </p> 
					 <br>
					  </td> 

				 </td> 
                </tr> 
               </tbody>

					   
              </table>		  
			  
			  </td> 
            </tr> 
           </tbody>
          </table> 
         <p style="border-top:1px solid #ddd"></p>
          <table width="100%" cellspacing="0" cellpadding="0" style="margin:0 auto;padding:30px 0 0 40px;max-width:650px;background:#ffffff" border="0"> 
           <tbody>
            <tr> 
             <td> 
              <table width="100%" border="0" cellpadding="0" cellspacing="0" align="left" style="border-spacing:0;border-collapse:collapse;width:100%;border:none;margin-bottom:24px"> 
               <tbody>
                <tr> 
                 <td align="left"> 
                  <table width="100%" border="0" cellpadding="0" cellspacing="0"> 
                   <tbody>
                    <tr> 
                     <td style="padding:0px"> 
						 <p style="padding:0;margin:0;font-size:12px;font-family:'Roboto',sans-serif;font-weight:400;color:#212121"><b>Note: &nbsp;</b>Please note that items were already dispatched by the Seller and we have initiated cancel request with the courier partner. In case delivery is attempted, feel free to reject the shipment with the reason as already cancelled.
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
		 <p style="border-top:1px solid #ddd"></p>
		
	
		<br> </td> 
        </tr> 
       </tbody> 
      </table> 
     
    </tr> 
   </tbody>
  </table> 
   
    
  