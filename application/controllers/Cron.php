<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Front_Controller.php');
class Cron extends Front_Controller 
{	
	public function __construct() 
		{

		parent::__construct();	
		$this->load->helper(array('url','html','form'));
		$this->load->library('session','form_validation');
		$this->load->library('email');
		$this->load->model('Cron_model'); 
	}
	
	public function index (){
		
		$unassignorder_list= $this->Cron_model->getall_unasigned_order_list();
		$selleraddress='';
		foreach($unassignorder_list as $unaslists){
			
			$customeraddress=$unaslists['customer_address'].'&nbsp;'.$unaslists['city'].'&nbsp;'.$unaslists['state'].'&nbsp;'.$unaslists['pincode'];
			 $selleraddress=$unaslists['selleradd2'];
			//echo '<pre>';print_r($unaslists);exit;
			//echo '<pre>';print_r($unaslists);exit;
			if($unaslists['customer_seller_km']=='' && $unaslists['customer_seller_time']=='' && $unaslists['customer_seller_timevalue']==''){
			/*customer to seller address*/
					 $urls = "https://maps.googleapis.com/maps/api/distancematrix/json?origins='".urlencode($customeraddress)."'&destinations='".urlencode($selleraddress)."'&key=AIzaSyBaHdfHglhoERINejBYkHOocaFEsxp8L28&sensor=false";
					$ch1 = curl_init();
					curl_setopt($ch1, CURLOPT_URL, $urls);
					curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch1, CURLOPT_PROXYPORT, 3128);
					curl_setopt($ch1, CURLOPT_SSL_VERIFYHOST, 0);
					curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, 0);
					$response = curl_exec($ch1);
					curl_close($ch1);
					$characters1 = json_decode($response, TRUE);
					//echo '<pre>';print_r($characters1);exit;
					$km=isset($characters1['rows'][0]['elements'][0]['distance']['text'])?$characters1['rows'][0]['elements'][0]['distance']['text']:'';
					$time=isset($characters1['rows'][0]['elements'][0]['duration']['text'])?$characters1['rows'][0]['elements'][0]['duration']['text']:'';
					$timevalue=isset($characters1['rows'][0]['elements'][0]['duration']['value'])?$characters1['rows'][0]['elements'][0]['duration']['value']:'';
					
					$this->Cron_model->update_delivery_time($unaslists['order_item_id'],$km,$time,$timevalue);
			}
			
			/*customer to seller address*/
			}
	}
	public function deliveryboydistance(){
		$unassignorder_list= $this->Cron_model->getall_unasigned_order_list();
		
		foreach ($unassignorder_list as $dlist){
			
			 if($dlist['delivery_boy_assign']==0){
				$delivery_boy_list= $this->Cron_model->getall_deliveries_list();
				//echo '<pre>';print_r($delivery_boy_list);exit;
				foreach ($delivery_boy_list as $dylist ){
						//echo '<pre>';print_r($dylist);exit;
					if($dylist['address1']!=''){
						$deliveryadd=$dylist['address1'];
					}else{
						$deliveryadd=$dylist['address2'];
					}
					$cutomertimevalue=$dlist['customer_seller_timevalue'];
					$cutomertime=$dlist['customer_seller_time'];
					$selleraddress=$dlist['selleradd2'];
				/* seller to delivery address*/
					$urls1 = "https://maps.googleapis.com/maps/api/distancematrix/json?origins='".urlencode($deliveryadd)."'&destinations='".urlencode($selleraddress)."'&key=AIzaSyBYkh0t1B_RRskD4WkvHSiGAPRjt-WVJrU&sensor=false";
					$ch2 = curl_init();
					curl_setopt($ch2, CURLOPT_URL, $urls1);
					curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch2, CURLOPT_PROXYPORT, 3128);
					curl_setopt($ch2, CURLOPT_SSL_VERIFYHOST, 0);
					curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, 0);
					$response2 = curl_exec($ch2);
					curl_close($ch2);
					$characters2 = json_decode($response2, TRUE);
					if(isset($characters2['error_message']) && $characters2['error_message']!=''){
						$urls1 = "https://maps.googleapis.com/maps/api/distancematrix/json?origins='".urlencode($deliveryadd)."'&destinations='".urlencode($selleraddress)."'&sensor=false";
					$ch2 = curl_init();
					curl_setopt($ch2, CURLOPT_URL, $urls1);
					curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch2, CURLOPT_PROXYPORT, 3128);
					curl_setopt($ch2, CURLOPT_SSL_VERIFYHOST, 0);
					curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, 0);
					$response2 = curl_exec($ch2);
					curl_close($ch2);
					$characters2 = json_decode($response2, TRUE);
					}
					//echo '<pre>';print_r($characters2);exit;
					$dkm[]=isset($characters2['rows'][0]['elements'][0]['distance']['text'])?$characters2['rows'][0]['elements'][0]['distance']['text']:'';
					$dtime[]=isset($characters2['rows'][0]['elements'][0]['duration']['text'])?$characters2['rows'][0]['elements'][0]['duration']['text']:'';
					$data[$dylist['customer_id']]['dtimevalue']=isset($characters2['rows'][0]['elements'][0]['duration']['value'])?$characters2['rows'][0]['elements'][0]['duration']['value']:'';
					$data[$dylist['customer_id']]['dboyid']=$dylist['customer_id'];
					/* seller to delivery address*/
					
				}
				//$data=array('61'=>array('dtimevalue'=>221,'dboyid'=>61),'62'=>array('dtimevalue'=>1347,'dboyid'=>62),'63'=>array('dtimevalue'=>1127,'dboyid'=>63),'64'=>array('dtimevalue'=>'','dboyid'=>64),'65'=>array('dtimevalue'=>1424,'dboyid'=>65));
				foreach($data as $key=>$li){
					if(!empty($li['dtimevalue'])) {
						$priceprod[$key] = $li;
						//$priceprod[$g]['did'] = $li['dboyid'];
					}
					
					
				}
				//echo '<pre>';print_r($priceprod);exit;
				if(isset($priceprod) && $priceprod!=''){
				
				$mindistancedboyid = min($priceprod);
				if($mindistancedboyid['dboyid']!=0){
				$success=$this->Cron_model->assign_orderto_deliveryboy($mindistancedboyid['dboyid'],$dlist['order_item_id'],1);
						$details=$this->Cron_model->get_order_item_details($dlist['order_item_id']);
						$customerdetails=$this->Cron_model->get_delivery_details($mindistancedboyid['dboyid']);
						
						//echo '<pre>';print_r($details);
						//echo '--';
						//echo '<pre>';print_r($customerdetails);
						//exit;
					if(count($success)>0){
					
					
					if($details['time']!=''){
						$time=$details['time'];
					}else{
						$time='2 hours';
					}
					
					$msg=' Order Product Name: '.$details['item_name'].' Delivery Boy Phone number '.$customerdetails['cust_mobile'].' Expected time '.$time;
					$username=$this->config->item('smsusername');
					$pass=$this->config->item('smspassword');
					$mobilesno=$details['customer_phone'];
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL,"http://bhashsms.com/api/sendmsg.php");
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_POSTFIELDS,'user='.$username.'&pass='.$pass.'&sender=cartin&phone='.$mobilesno.'&text='.$msg.'&priority=ndnd&stype=normal');
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					//echo '<pre>';print_r($ch);exit;
					$server_output = curl_exec ($ch);
					
					
					/*delivery boy*/
					$msg1='Order-item-id: '.$details['order_item_id'].'Customer address: '.$details['customer_address'].','.$details['city'].','.$details['state'].' Mobile number'.$details['customer_phone'].'. Seller Details: '.$details['selleradd1'].','.$details['selleradd2'].'. Mobile number'.$details['seller_mobile'];

					//$mobilesno1='8500050944';
					$mobilesno1=$customerdetails['cust_mobile'];
					$ch1 = curl_init();
					curl_setopt($ch1, CURLOPT_URL,"http://bhashsms.com/api/sendmsg.php");
					curl_setopt($ch1, CURLOPT_POST, 1);
					curl_setopt($ch1, CURLOPT_POSTFIELDS,'user='.$username.'&pass='.$pass.'&sender=cartin&phone='.$mobilesno1.'&text='.$msg1.'&priority=ndnd&stype=normal');
					curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
					//echo '<pre>';print_r($ch);exit;
					$server_output2 = curl_exec ($ch1);
					/*delivery boy*/
					curl_close ($ch1);
					
						
					}
				}
				
				}
				

				
				
			 }
			
			
		}
		
	}
	
	public function returnorderassign(){
		$returnorder_list= $this->Cron_model->getall_return_order_list();
		//echo '<pre>';print_r($returnorder_list);exit;
		foreach ($returnorder_list as $dlist){
			//echo '<pre>';print_r($dlist);exit;
			 if($dlist['return_deliveryboy_id']==0){
				$delivery_boy_list= $this->Cron_model->getall_deliveries_list();
				//echo '<pre>';print_r($delivery_boy_list);exit;
				foreach ($delivery_boy_list as $dylist ){
						//echo '<pre>';print_r($dylist);exit;
					if($dylist['address1']!=''){
						$deliveryadd=$dylist['address1'];
					}else{
						$deliveryadd=$dylist['address2'];
					}
					$cutomertimevalue=$dlist['customer_seller_timevalue'];
					$cutomertime=$dlist['customer_seller_time'];
					$selleraddress=$dlist['selleradd2'];
					//exit;
				/* seller to delivery address*/
					$urls1 = "https://maps.googleapis.com/maps/api/distancematrix/json?origins='".urlencode($deliveryadd)."'&destinations='".urlencode($selleraddress)."'&sensor=false";
					$ch2 = curl_init();
					curl_setopt($ch2, CURLOPT_URL, $urls1);
					curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch2, CURLOPT_PROXYPORT, 3128);
					curl_setopt($ch2, CURLOPT_SSL_VERIFYHOST, 0);
					curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, 0);
					$response2 = curl_exec($ch2);
					curl_close($ch2);
					$characters2 = json_decode($response2, TRUE);
					//echo '<pre>';print_r($characters2);exit;
					$dkm[]=isset($characters2['rows'][0]['elements'][0]['distance']['text'])?$characters2['rows'][0]['elements'][0]['distance']['text']:'';
					$dtime[]=isset($characters2['rows'][0]['elements'][0]['duration']['text'])?$characters2['rows'][0]['elements'][0]['duration']['text']:'';
					$data[$dylist['customer_id']]['dtimevalue']=isset($characters2['rows'][0]['elements'][0]['duration']['value'])?$characters2['rows'][0]['elements'][0]['duration']['value']:'';
					$data[$dylist['customer_id']]['dboyid']=$dylist['customer_id'];
					/* seller to delivery address*/
				
					
				}
				//$data=array('61'=>array('dtimevalue'=>221,'dboyid'=>61),'62'=>array('dtimevalue'=>1347,'dboyid'=>62),'63'=>array('dtimevalue'=>1127,'dboyid'=>63),'64'=>array('dtimevalue'=>'','dboyid'=>64),'65'=>array('dtimevalue'=>1424,'dboyid'=>65));
				foreach($data as $key=>$li){
					if(!empty($li['dtimevalue'])) {
						$priceprod[$key] = $li;
						//$priceprod[$g]['did'] = $li['dboyid'];
					}
					
					
				}

				if(isset($priceprod) && $priceprod!=''){
					
				
					$mindistancedboyid = min($priceprod);
					//echo '<pre>';print_r($mindistancedboyid);exit;
					if($mindistancedboyid['dboyid']!=0){
						$success=$this->Cron_model->assign_returnorderto_deliveryboy($mindistancedboyid['dboyid'],$dlist['order_item_id']);
					}
				}
				
				
				
				

				
				
			 }
			
			
		}
		
	}
	
	public function createinvoice(){
		$invoiceorders=$this->Cron_model->get_complted_orders();
		foreach ($invoiceorders as $list){
			
			if($list['invoicename']=='' && $list['mail_send']==0){
				
					$path = rtrim(FCPATH,"/");
					$datas['details'] = $list;
					//echo '<pre>';print_r($list);exit;
					//echo '<pre>';print_r($data['details']);exit;
					$file_name = $datas['details']['order_item_id'].'_'.$datas['details']['invoice_id'].'.pdf';                
					$datas['page_title'] = $datas['details']['item_name'].'invoice'; // pass data to the view
					$pdfFilePath = $path."/assets/downloads/".$file_name;
					ini_set('memory_limit','320M'); // boost the memory limit if it's low <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
					$html = $this->load->view('customer/invoice', $datas, true); // render the view into HTML
					//echo '<pre>';print_r($html);exit;
					$stylesheet1 = file_get_contents(base_url('assets/css/bootstrap.min.css')); // external css
					$stylesheet6 = file_get_contents('http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic');
					$this->load->library('pdf');
					$pdf = $this->pdf->load();
					$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date('M-d-Y')); // Add a footer for good measure <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
					$pdf->SetDisplayMode('fullpage');
					$pdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list
					$pdf->WriteHTML($html); // write the HTML into the PDF
					$pdf->Output($pdfFilePath, 'F'); // save to file because we can
					$this->Cron_model->update_invocie_name_save($list['invoice_id'],$list['order_item_id'],$file_name);
					$htmlmessage = "Invoice has been generated from the https:shofus.com";
					$this->load->library('email');
					$this->email->set_newline("\r\n");
					$this->email->set_mailtype("html");
					$this->email->from('shofus.com');
					$this->email->to($list['seller_email']);
					$this->email->attach($pdfFilePath);
					$this->email->subject('shofus - Invoice '.$file_name);
					//echo $html;exit;
					$this->email->message($htmlmessage);
						if($this->email->send()){
							$this->Cron_model->update_invocie_mail_send($list['order_item_id'],1);
						}
					
				
				}
		
		}
		
	}
	
	public function sendinvoice(){
		
		$invoicependingcustomers=$this->Cron_model->get_pending_inovices_list();
		//echo '<pre>';print_r($invoicependingcustomers);exit;
		foreach ($invoicependingcustomers as $list){
			//echo '<pre>';print_r($list);exit;
			if($list['customer_email_send']==0){
				
				//echo $list['customer_email_send'];exit;
				$htmlmessage = "Invoice has been generated from the https:cartinhours.com";
					$this->load->library('email');
					$this->email->set_newline("\r\n");
					$this->email->set_mailtype("html");
					$this->email->from('cartinhours.com');
					$this->email->to($list['cust_email']);
					$pdfFilePath = base_url('/assets/downloads/'.$list['invoicename']);
					$this->email->attach($pdfFilePath);
					$this->email->subject('Cartinhours - Invoice '.$list['invoicename']);
					//echo $html;exit;
					$this->email->message($htmlmessage);
						if($this->email->send()){
							$this->Cron_model->update_invocie_mail_send_customer($list['invoice_id'],1);
						}
						//echo $list['cust_email'];
			}
		}
		
	}
	
		
	public function remove_unwanteddatedate(){
		$details=$this->Cron_model->get_all_filters_data();
		if(count($details)>0){
			
			
		foreach ($details as $lis){
			$this->Cron_model->delete_privous_searchdata($lis['id']);
			
		}
		
		}

		
		
		
	}
	public function testing(){
		
		//echo $list['customer_email_send'];exit;
				$htmlmessage = "Invoice has been generated from the";
					$this->load->library('email');
					$this->email->set_newline("\r\n");
					$this->email->set_mailtype("html");
					$this->email->from('shofus.com');
					$this->email->to('vasudevareddy549@gmail.com');
					$this->email->subject('testing');
					//echo $html;exit;
					$this->email->message($htmlmessage);
					if($this->email->send()){
							echo 'Email was send';
							
							exit;
						}
				
	}
	
	
	
	
	
}		
?>