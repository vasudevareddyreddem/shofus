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
  background: #45b1b9;
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

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
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
    <title>cartinhours</title>
    <link rel="stylesheet" href="style.css" media="all" />
  </head>
  <body>

    <header class="clearfix ">
      
      <h1>INVOICE </h1>
	   <div class="clearfix">
		<div style="float: left;" > <b>Sold By:</b> <span>Consulting Rooms Private Limited ,</span></div>
		<div style="float: right;"> <b>Invoice Number </b># FABBMR1800050481 </div>
	  </div> 
	  <div class="">
		<p > <i><b>Ship-from Address:</b> </span>Survey No. 518, 527, 528, 529, & 530, Door No 14-7/5, Archana colony, Kistapur Village, Opp.RDC Concretes,
				Medchal, R.R. District, Hyderabad, Telangana, India - 501401, IN-TS</span></i></p>
	  </div>
	  <div class="">
		<p > <b>GSTIN</b> </span> - 36AAGCC4236P1ZA</span></p>
	  </div>
	  <hr>
      
      <div id="project" style=" width:250px;">
        <div><span>Order ID:</span> OD110472952447668000</div>
        <div><span>Order Date:</span> 13-10-2017</div>
        <div><span>Invoice Date:</span> 13-10-2017</div>
        <div><span>PAN:</span> aagcc4236p</div>
        <div><span>CIN:</span>U74900DL2016PTC291626</div>
        
      </div>
	  <div id="project" style=" width:200px;" >
        <div><h3>Delivery Address</h3></div>
        <div><p  style="word-wrap: break-word;">MIG-103 , 3 RD FLOOR , DHARMAREDDY colony , phase 2 , near pooja hospital , opp to rajashekar enclave , opp to RAJASHEKAR ENCLAVE , near pooja hospital,Hyderabad - 500072 ,Andhra Pradesh,Mob. 9494422779</p>
		</div>
      </div> 
	 
	  <div id="project" style=" width:200px;">
        <div><h3>Ship To</h3></div>
        <div><p  style="word-wrap: ">MIG-103 , 3 RD FLOOR , DHARMAREDDY colony , phase 2 , near pooja hospital , opp to rajashekar enclave , opp to RAJASHEKAR ENCLAVE , near pooja hospital,Hyderabad - 500072 ,Andhra Pradesh,Mob. 9494422779</p>
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
            <th>Discount </th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="service">Multi Function Printers FSN: PRNEBNZCUXP6FPZC HSN/SAC: 84433100</td>
            <td class="desc">Canon Pixma MG3670 Multi-function Wireless Printer Warranty: 1 Year Canon Carry In Warranty 1. [IMEI/Serial No: 4549292036428 ] CGST: 14.000 % SGST/UTGST: 14.000 %</td>
            <td class="unit">50</td>
            <td class="qty">1100.00</td>
            <td class="total">1,040.00</td>
            <td class="total">1,040.00</td>
          </tr>
		 
		  <tr style="font-weight:600">
         
            <td class="desc " colspan="2" style="text-align:right">Total</td>
            <td class="unit">50</td>
            <td class="qty">1100.00</td>
            <td class="total">1,040.00</td>
            <td class="total">1,040.00</td>
          </tr> 
		  <tr >
         
            <td class="desc " colspan="3" style="text-align:left;"><b>Notice
:</b> <span class="notice">*Keep this invoice and
					manufacturer box for warranty purposes.</span></td> 
			<td class="desc " style="text-align:right;font-size:17px">Total</td>
            
            <td  style="font-size:17px" colspan="2" ><b>1,040.00</b></td>
            
          </tr>
		  <tr>
            <td class="desc " colspan="6" style="text-align:right;font-size:17px;background:none;">&nbsp;</td>
          </tr>
		  <tr>
            <td class="desc " colspan="6" style="text-align:right;font-size:17px;background:none;">Authorized Signatory</td>
          </tr>
        </tbody>
      </table>
      
    </main>
   
  </body>
</html>