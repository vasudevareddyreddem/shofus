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
			echo '<pre>';print_r($dlist);exit;
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
					
			
		}
		exit;
		
	}
 

  



}		
?>