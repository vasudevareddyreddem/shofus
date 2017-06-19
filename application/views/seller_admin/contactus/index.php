
  <div class="col-md-9">
  <!--header part end here --> 
  <!--body start here -->
   
   
    <div class="contain-main">
	<div style="text-align:center; margin-top:35px;background-color:#FFF;font-weight:bold;" id="message_hide">
    
	<span style="color:green;"><?php  echo @$this->session->flashdata('verify_msg');?> </span>
    <span style="color:red;"><?php  echo @$this->session->flashdata('err_code');?> </span>
    
    </div>
    
    
      <div class="contact_inner">
      <h1>CONTACT US</h1>
 	  <span id="emailSuccess" style="color:#C00;"></span>
       <div class="contact_inner_left">
        <form action="<?php echo base_url() ?>seller_admin/contactus/send" id="mailform" onsubmit="return validationForm();this.js_enabled.value=1;return true;"  method="POST">
         <table>
		 <tr>
                <td><span id="emailphErr" style="color:#C00;"></span></td>
            </tr>
            <tr>
            	<td>Name<span id="nameErr" style="color:#C00;"> </span> </td>
            </tr>
            <tr>
                <td><input type="text" name="name" id="name" /></td>
				</tr>

            <tr>
                <td>Email <span id="emailErr" style="color:#C00;"></span></td>
            </tr>
            <tr>
                <td><input type="text" name="fromemail" id="fromemail" /></td>
				
            </tr>
			            

            <tr>
            	<td>Phone Number<span id="mblErr" style="color:#C00;"></span></td>
            </tr>
            <tr>
                <td><input type="text" class="phone_us_msr" name="mobile" id="mobile" /></td>
            </tr>
            <tr>
            	<td>Message<span id="msgErr" style="color:#C00;"></span></td>
            </tr>
            <tr>
                <td><textarea name="message" id="message"></textarea></td>
            </tr>
            
            
            
            
            
            <tr>
                <td><input type="submit" value="Send Enquiry" /></td>
            </tr>
            </table>
        </form>
        </div>
        <div class="contact_inner_right">
        	<h2>Cart in Hour</h2>
            <p>Plot No.177,1st floor, Sri Vani Nilayam,
			Sardar Patel Nagar, Nizampet ‘X’ Road,
			Hyderabad, Telangana<br />
            Mobile No. +919494422779,
            EMail ID:imainacartin@gmail.com,<br /> 			
			www.cartinhour.com
			</p>
            <div class="contact_inner_right_map">
            	<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1902.603941571986!2d78.38998466067792!3d17.49758717711942!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1494410712406" width="100%" height="auto" frameborder="0" style="border:0" allowfullscreen></iframe>
             </div>
        </div>
      </div>
    </div>
  
     
  </div>
  
  </div>
  
  </div>
  
  </div>
  
   <script type="text/javascript" language="javascript">
        function validationForm()
		{
 			var name= document.getElementById('name').value;
 			var fromemail= document.getElementById('fromemail').value;
 			var mobile= document.getElementById('mobile').value;
 			var message= document.getElementById('message').value;
           document.getElementById('nameErr').innerHTML = "";
           document.getElementById('emailErr').innerHTML = "";
		   document.getElementById('emailphErr').innerHTML = "";
           document.getElementById('mblErr').innerHTML = "";
           document.getElementById('msgErr').innerHTML = "";
	
            var NumReg = /^\d{10}/;
			
			var eReg  = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
           

 			if(name =="" || name == null)
			{	
 			$('#nameErr').css('padding', '10px 0 0 12px');
            document.getElementById('nameErr').innerHTML = "Please Enter Your Name";
            document.getElementById('name').focus();	
			return false;
 			}
			
			if((fromemail =="" || fromemail == null) && (mobile =="" || mobile == null))
			{
 			$('#emailphErr').css('padding', '10px 0 0 12px');
            document.getElementById('emailphErr').innerHTML = "Please Enter Email ID or Phone Number";
            //document.getElementById('fromemail').focus();	
			return false;
			}
			else if(!(fromemail =="" || fromemail == null) && !(eReg.test(fromemail))) {
            $('#emailErr').css('padding', '10px 0 0 12px');
            document.getElementById('emailErr').innerHTML = "Please Enter a Valid Email ID";
            document.getElementById('fromemail').focus();
            return false;
            } 
			if(mobile !="" && mobile.length!=10 ) {
            $('#mblErr').css('padding', '10px 0 0 12px');
            document.getElementById('mblErr').innerHTML = "Please Enter a Valid Phone Number";
            document.getElementById('mobile').focus();
            return false;
            } 
			/*else if(mobile.length!=12){
			$('#mblErr').css('padding', '10px 0 0 12px');
            document.getElementById('mblErr').innerHTML = "Please Enter a Valid Phone Number";
            document.getElementById('mobile').focus();
              }	*/		
			if(message =="" || message == null)
			{	
 			$('#msgErr').css('padding', '10px 0 0 12px');
            document.getElementById('msgErr').innerHTML = "Please Enter Message";
            document.getElementById('message').focus();	
			return false;
 			}
        }
		
		
	$(function() {
	setTimeout(function() {
	$("#message_hide").hide('blind', {}, 500)
	}, 5000);
	});
</script> 