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
						$time='4 hours';
					}
					
					$msg=' order Product Name: '.$details['item_name'].' Delivery Boy Phone number'.$customerdetails['cust_mobile'].' Expected time '.$time;
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
	
	
	public function pdf()
    {
            
            // As PDF creation takes a bit of memory, we're saving the created file in /downloads/reports/
		$path = rtrim(FCPATH,"/");

		///echo $pdfFilePath;exit;            
		$this->load->model('Cron_model');
		if($this->session->userdata('userinfo'))
		{
		$this->load->model('Cron_model');
		$segs = $this->uri->segment_array();
		$user_id = $this->uri->segment(3);
		$refill_id= base64_decode($this->uri->segment(4));
		if($user_id!='')
		{
		$user_id = base64_decode($user_id);
		}
		//echo '<pre>';print_r($user_id);exit;
		$userdata = $this->session->userdata('userinfo');
		$data['doctornotes']=$this->Cron_model->getrefill_view($refill_id);
		$data['userdetails'] = $this->Cron_model->getuserinfo($user_id,$refill_id);

		//$data['refilldatails']= $this->Cron_model->getrefill_details($user_id,$refill_id);

		$userdata = $this->session->userdata('userinfo');
		$file_name = $data['userdetails']['firstname'].'_'.$data['userdetails']['lastname'].'.pdf';                
		//$data['userdetails'] = $this->Cron_model->getuserinfo($user_id);
		//echo '<pre>';print_r($data);exit;
		} else {
		$data['userdetails'] = array();
		}
		$file_name='test1'.'.pdf';
		$data['page_title'] = 'Hello world'; // pass data to the view
		$pdfFilePath = $path."/assets/downloads/".$file_name;
		///$pdfFilePath = str_replace("/","\"," $pdfFilePath");
		//echo $pdfFilePath;exit;            

		ini_set('memory_limit','320M'); // boost the memory limit if it's low <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
		$html = $this->load->view('customer/inovice', $data, true); // render the view into HTML
		$stylesheet1 = file_get_contents(base_url('assets/css/bootstrap.min.css')); // external css
		//$stylesheet6 = file_get_contents('http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic');
		//echo $stylesheet;exit;
		$this->load->library('pdf');
		$pdf = $this->pdf->load();
		$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date(DATE_RFC822)); // Add a footer for good measure <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
		//$pdf->WriteHTML($stylesheet1,1);
		//$pdf->WriteHTML($stylesheet6,6);
		$pdf->SetMargins(0);
		//$pdf->WriteHTML('<tocentry content="Letter portrait" /><p>This should print on an Letter sheet</p>');
		$pdf->SetDisplayMode('fullpage');
		$pdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list
		$pdf->WriteHTML($html); // write the HTML into the PDF
		$pdf->Output($pdfFilePath, 'F'); // save to file because we can
		redirect("assets/downloads/".$file_name);
    }
	
}		
?>