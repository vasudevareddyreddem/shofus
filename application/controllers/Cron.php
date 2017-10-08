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
		foreach($unassignorder_list as $unaslists){
			$customeraddress=$unaslists['customer_address'].' '.$unaslists['customerpincode'];
			$selleraddress=$unaslists['selleradd1'].' '.$unaslists['selleradd2'].' '.$unaslists['sellerpincode'];
			if($unaslists['customer_seller_km']=='' && $unaslists['customer_seller_time']=='' && $unaslists['customer_seller_timevalue']==''){
			/*customer to seller address*/
					$urls = "https://maps.googleapis.com/maps/api/distancematrix/json?origins='".urlencode($customeraddress)."'&destinations='".urlencode($selleraddress)."'&key=AIzaSyBYkh0t1B_RRskD4WkvHSiGAPRjt-WVJrU&sensor=false";
					$ch1 = curl_init();
					curl_setopt($ch1, CURLOPT_URL, $urls);
					curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch1, CURLOPT_PROXYPORT, 3128);
					curl_setopt($ch1, CURLOPT_SSL_VERIFYHOST, 0);
					curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, 0);
					$response = curl_exec($ch1);
					curl_close($ch1);
					$characters1 = json_decode($response, TRUE);
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
				foreach ($delivery_boy_list as $dylist ){
						//echo '<pre>';print_r($dylist);exit;
					$deliveryadd=$dylist['deliveryboy_current_location'];
					$cutomertimevalue=$dlist['customer_seller_timevalue'];
					$cutomertime=$dlist['customer_seller_time'];
					$selleraddress=$dlist['selleradd1'].' '.$dlist['selleradd2'].' '.$dlist['sellerpincode'];
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
				$mindistancedboyid = min($priceprod);
				$this->Cron_model->assign_orderto_deliveryboy($mindistancedboyid['dboyid'],$dlist['order_item_id'],1);
				

				
				
			 }
			
			
		}
		
	}
	
		
	public function testing(){
		
		$this->load->library('email');
		$this->email->from('cartinhours.com');
		$this->email->to('gvijayaraghavareddy7@gmail.com');
		$this->email->subject("testing");
		$body = 'helllo vijay';
		$this->email->message($body);
		if ($this->email->send())
		{
		echo 'email send';
		}
	}
	/*public function testing(){
		
			
					$msg='hello ho';
					$mobile=8500050944;
					$username='cartinhour';
					$pass='qwerty';
					$ch = curl_init();
					 curl_setopt($ch, CURLOPT_URL,"http://bhashsms.com/api/sendmsg.php");
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_POSTFIELDS,'user='.$username.'&pass='.$pass.'&sender=cartin&phone='.$mobile.'&text=Your cartinhour verification code is '.$msg.'&priority=ndnd&stype=normal');
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					//echo '<pre>';print_r($ch);exit;
					$server_output = curl_exec ($ch);
	}*/
 

  



}		
?>