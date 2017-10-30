<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/seller/Admin_Controller.php');


class Import extends Admin_Controller {

	
	public function __construct() {
		parent::__construct();
		
		$this->load->helper(array('url', 'html'));
		$this->load->library('session');
		$this->load->helper('security');
		$this->load->library(array('form_validation','session'));
		$this->load->model('seller/products_model');
		$this->load->model('seller/dashboard_model');
		$this->load->model('inventory_model');
		
       // $this->load->library('pagination');
		
	}

	public function uploadproducts(){
		
		$post=$this->input->post();
		$seller_location=$this->products_model->get_store_location($this->session->userdata('seller_id'));	

		//echo "<pre>";print_r($post);
		//echo "<pre>";print_r($_FILES);
		
		//echo substr($_FILES['categoryfile']['name'], 0, 29);exit;
			if((!empty($_FILES["categoryfile"])) && ($_FILES['categoryfile']['error'] == 0)) {

			$limitSize	= 1000000000; //(15 kb) - Maximum size of uploaded file, change it to any size you want
			$fileName	= basename($_FILES['categoryfile']['name']);
			$fileSize	= $_FILES["categoryfile"]["size"];
			$fileExt	= substr($fileName, strrpos($fileName, '.') + 1);
						
		
		if($post['category_ids']==20){
				if($post['subcategory_ids']==40){
					
								
										 if(substr($_FILES['categoryfile']['name'], 0, 29)=='Electroniccategoryfilemobiles'){
											
										if (($fileExt == "xlsx") && ($fileSize < $limitSize)) {
												include_once('simplexlsx.class.php');
												$getWorksheetName = array();
												$xlsx = new SimpleXLSX( $_FILES['categoryfile']['tmp_name'] );
												$getWorksheetName = $xlsx->getWorksheetName();
												//echo $xlsx->sheetsCount();exit;
														for($j=1;$j <= $xlsx->sheetsCount();$j++){
														$cnt=$xlsx->sheetsCount()-1;
														$arry=$xlsx->rows($j);
														unset($arry[0]);

																//echo "<pre>";print_r($arry);exit;
																foreach($arry as $key=>$fields)
																{
																		if($fields[1]!='' && $fields[2]!='' && $fields[3]!=''){
																		$totalfields[] = $fields;
																		if(empty($fields[1])) {
																			$data['errors'][]="Product name is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}/*else if($fields[1]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[1]))	  	
																			{
																			$data['errors'][]='Product name wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}*/
																		if(empty($fields[2])) {
																			$data['errors'][]="Price is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[2]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[2]))	  	
																			{
																			$data['errors'][]='Price  can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[3])) {
																			$data['errors'][]="Special Price is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[3]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[3]))	  	
																			{
																			$data['errors'][]='Special Price  can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if($fields[3]>=$fields[2]){
																			$data['errors'][]="special price must be between 1 and".$fields[2].". Row Id is :  ".$key.'<br>';
																			$error=1;	
																		}
																		
																		
																		if(empty($fields[4])) {
																			$data['errors'][]="Qty is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[4]!=''){
																			$regex ="/^[0-9]+$/"; 
																			if(!preg_match( $regex, $fields[4]))
																			{
																			$data['errors'][]="Qty must be digits. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		/*if(empty($fields[5])) {
																			$data['errors'][]="Highlights is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[5]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[5]))	  	
																			{
																			$data['errors'][]='Highlights wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[6])) {
																			$data['errors'][]="Description1 is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[6]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[6]))	  	
																			{
																			$data['errors'][]='Description1 wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[7])&& $fields[7]!=''){
																				$img1 = $fields[7];
																				$img12 = pathinfo($img1);
																				$imagename22=$img12['filename'].".".$img12['extension'];
																				$split_image212 = pathinfo($imagename22,PATHINFO_EXTENSION);;
																				if($split_image212 != "jpg" && $split_image212 !="png" && $split_image212 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[8])&& $fields[8]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[8]))	  	
																			{
																			$data['errors'][]='Description2 wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[9])&& $fields[9]!=''){
																				$img9 = $fields[9];
																				$img129 = pathinfo($img9);
																				$imagename22=$img129['filename'].".".$img129['extension'];
																				$split_image2129 = pathinfo($imagename22,PATHINFO_EXTENSION);;
																				if($split_image2129 != "jpg" && $split_image2129 !="png" && $split_image2129 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[10])&& $fields[10]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[10]))	  	
																			{
																			$data['errors'][]='Description3 wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[11])&& $fields[11]!=''){
																				$img11 = $fields[11];
																				$img1291 = pathinfo($img11);
																				$imagename221=$img1291['filename'].".".$img1291['extension'];
																				$split_image21291 = pathinfo($imagename221,PATHINFO_EXTENSION);;
																				if($split_image21291 != "jpg" && $split_image21291 !="png" && $split_image21291 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[12])&& $fields[12]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[12]))	  	
																			{
																			$data['errors'][]='Description4 wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[13])&& $fields[13]!=''){
																				$img13 = $fields[13];
																				$img1293 = pathinfo($img13);
																				$imagename223=$img1293['filename'].".".$img1293['extension'];
																				$split_image21293 = pathinfo($imagename223,PATHINFO_EXTENSION);;
																				if($split_image21293 != "jpg" && $split_image21293 !="png" && $split_image21293 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		
																		if(isset($fields[14]) && $fields[14]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[14]))	  	
																			{
																			$data['errors'][]='Warranty Summary wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		
																		
																		if(isset($fields[15]) && $fields[15]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[15]))
																			{
																			$data['errors'][]="Warranty Type wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[16]) && $fields[16]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[16]))
																			{
																			$data['errors'][]="Service Type wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[17]) && $fields[17]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[17]))
																			{
																			$data['errors'][]="Return Policy wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[18]) && $fields[18]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[18]))
																			{
																			$data['errors'][]="Brand wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[19]) && $fields[19]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[19]))
																			{
																			$data['errors'][]="Product Code wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[20]) && $fields[20]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[20]))
																			{
																			$data['errors'][]="Processor wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[21]) && $fields[21]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[21]))
																			{
																			$data['errors'][]="Screen Size wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[22]) && $fields[22]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[22]))
																			{
																			$data['errors'][]="Internal Memory wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[23]) && $fields[23]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[23]))
																			{
																			$data['errors'][]="Camera wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[24]) && $fields[24]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[24]))
																			{
																			$data['errors'][]="Sim Type wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[25]) && $fields[25]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[25]))
																			{
																			$data['errors'][]="OS wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[26]) && $fields[26]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[26]))
																			{
																			$data['errors'][]="Colour wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[27]) && $fields[27]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[27]))
																			{
																			$data['errors'][]="RAM wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[28]) && $fields[28]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[28]))
																			{
																			$data['errors'][]="Model Name wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[29]) && $fields[29]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[29]))
																			{
																			$data['errors'][]="Model ID wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[30]) && $fields[30]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[30]))
																			{
																			$data['errors'][]="Internal Memory wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[31]) && $fields[31]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[31]))
																			{
																			$data['errors'][]="Expandable Memory wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[32]) && $fields[32]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[32]))
																			{
																			$data['errors'][]="Primary Camera wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}if(isset($fields[33]) && $fields[33]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[33]))
																			{
																			$data['errors'][]="Primary Camera Features wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[34]) && $fields[34]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[34]))
																			{
																			$data['errors'][]="Secondary Camera wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[35]) && $fields[35]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[35]))
																			{
																			$data['errors'][]="Secondary Camera Features wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[36]) && $fields[36]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[36]))
																			{
																			$data['errors'][]="Video Recording wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[37]) && $fields[37]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[37]))
																			{
																			$data['errors'][]="HD Recording wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[38]) && $fields[38]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[38]))
																			{
																			$data['errors'][]="Flash wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[39]) && $fields[39]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[39]))
																			{
																			$data['errors'][]="Other Camera Features wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[40]) && $fields[40]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[40]))
																			{
																			$data['errors'][]="Battery Capacity wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[41]) && $fields[41]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[41]))
																			{
																			$data['errors'][]="Talk Time wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[42]) && $fields[42]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[42]))
																			{
																			$data['errors'][]="Standby Time wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[43]) && $fields[43]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[43]))
																			{
																			$data['errors'][]="Operating Frequency wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[44]) && $fields[44]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[44]))
																			{
																			$data['errors'][]="Preinstalled Browser wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[45]) && $fields[45]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[45]))
																			{
																			$data['errors'][]="2G wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[46]) && $fields[46]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[46]))
																			{
																			$data['errors'][]="3G wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[47]) && $fields[47]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[47]))
																			{
																			$data['errors'][]="4G wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[48]) && $fields[48]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[48]))
																			{
																			$data['errors'][]="Wifi wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[49]) && $fields[49]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[49]))
																			{
																			$data['errors'][]="GPS wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[50]) && $fields[50]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[50]))
																			{
																			$data['errors'][]="USB Connectivity wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[51]) && $fields[51]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[51]))
																			{
																			$data['errors'][]="Bluetooth wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[52]) && $fields[52]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[52]))
																			{
																			$data['errors'][]="NFC wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[53]) && $fields[53]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[53]))
																			{
																			$data['errors'][]="Edge wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[54]) && $fields[54]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[54]))
																			{
																			$data['errors'][]="Edge Features wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[55]) && $fields[55]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[55]))
																			{
																			$data['errors'][]="Music Player wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[56]) && $fields[56]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[56]))
																			{
																			$data['errors'][]="Video Player wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[57]) && $fields[57]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[57]))
																			{
																			$data['errors'][]="Audio Jack wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[58]) && $fields[58]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[58]))
																			{
																			$data['errors'][]="GPU wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[59]) && $fields[59]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[59]))
																			{
																			$data['errors'][]="Sim Size wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[60]) && $fields[60]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[60]))
																			{
																			$data['errors'][]="Sim Type wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[61]) && $fields[61]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[61]))
																			{
																			$data['errors'][]="Call Memory wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[62]) && $fields[62]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[62]))
																			{
																			$data['errors'][]="SMS Memory wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[63]) && $fields[63]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[63]))
																			{
																			$data['errors'][]="Phone Book Memory wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[64]) && $fields[64]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[64]))
																			{
																			$data['errors'][]="Sensors wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[65]) && $fields[65]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[65]))
																			{
																			$data['errors'][]="Java wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[66]) && $fields[66]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[65]))
																			{
																			$data['errors'][]="In Sales Package wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[67]) && $fields[67]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[67]))
																			{
																			$data['errors'][]="Display & resolution wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[68]) && $fields[68]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[67]))
																			{
																			$data['errors'][]="Display Type wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[69])) {
																			$data['errors'][]="Image is required. Row Id is :  ".$key;
																			$error=1;
																		}else if($fields[69]!=''){
																				$image_link = $fields[69];
																				$split_image1 = pathinfo($image_link);
																				$imagename=$split_image1['filename'].".".$split_image1['extension'];
																				$split_image = pathinfo($imagename,PATHINFO_EXTENSION);;
																				if($split_image != "jpg" && $split_image !="png" && $split_image != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																	
																		}
																		if(isset($fields[70])&& $fields[70]!=''){
																			$img21 = $fields[70];
																			$img312 = pathinfo($img21);
																			$imagename222=$img312['filename'].".".$img312['extension'];
																			$split_image3212 = pathinfo($imagename222,PATHINFO_EXTENSION);;
																			if($split_image3212 != "jpg" && $split_image3212 !="png" && $split_image3212 != "jpeg" ) {
																			$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																	
																		}
																		if(isset($fields[71])&& $fields[71]!=''){
																			$img211 = $fields[71];
																			$img3121 = pathinfo($img211);
																			$imagename2221=$img3121['filename'].".".$img3121['extension'];
																			$split_image32121 = pathinfo($imagename2221,PATHINFO_EXTENSION);;
																			if($split_image32121 != "jpg" && $split_image32121 !="png" && $split_image32121 != "jpeg" ) {
																			$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																	
																		}
																		if(isset($fields[72])&& $fields[72]!=''){
																			$img212 = $fields[72];
																			$img3122 = pathinfo($img212);
																			$imagename2222=$img3122['filename'].".".$img3122['extension'];
																			$split_image32122 = pathinfo($imagename2222,PATHINFO_EXTENSION);;
																			if($split_image32122 != "jpg" && $split_image32122 !="png" && $split_image32122 != "jpeg" ) {
																			$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																	
																		}
																		if(isset($fields[73])&& $fields[73]!=''){
																			$img213 = $fields[73];
																			$img3123 = pathinfo($img213);
																			$imagename2223=$img3123['filename'].".".$img3123['extension'];
																			$split_image32123 = pathinfo($imagename2223,PATHINFO_EXTENSION);;
																			if($split_image32123 != "jpg" && $split_image32123 !="png" && $split_image32123 != "jpeg" ) {
																			$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																	
																		}
																		if(isset($fields[74])&& $fields[74]!=''){
																			$img214 = $fields[74];
																			$img3124 = pathinfo($img214);
																			$imagename2224=$img3124['filename'].".".$img3124['extension'];
																			$split_image32124 = pathinfo($imagename2224,PATHINFO_EXTENSION);;
																			if($split_image32124 != "jpg" && $split_image32124 !="png" && $split_image32124 != "jpeg" ) {
																			$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																	
																		}
																		if(isset($fields[75])&& $fields[75]!=''){
																			$img215 = $fields[75];
																			$img3125 = pathinfo($img215);
																			$imagename2225=$img3125['filename'].".".$img3125['extension'];
																			$split_image32125 = pathinfo($imagename2225,PATHINFO_EXTENSION);;
																			if($split_image32125 != "jpg" && $split_image32125 !="png" && $split_image32125 != "jpeg" ) {
																			$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																	
																		}
																		if(isset($fields[76])&& $fields[76]!=''){
																			$img216 = $fields[76];
																			$img3126 = pathinfo($img216);
																			$imagename2226=$img3126['filename'].".".$img3126['extension'];
																			$split_image32126 = pathinfo($imagename2226,PATHINFO_EXTENSION);;
																			if($split_image32126 != "jpg" && $split_image32126 !="png" && $split_image32126 != "jpeg" ) {
																			$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																	
																		}*/
																		
																 }
																}
																//echo '<pre>';print_r($data);exit;
														if(count($data['errors'])>0){
														$this->session->set_flashdata('addsuccess',$data['errors']);
														redirect('/seller/products/create');
														}

													}
													if(count($data['errors'])<=0){
															foreach($totalfields as $data){
																//$path='/home/cartinhours/public_html/uploads/products/';
																//$path='/home/cartinhours/public_html/staging/uploads/products/';
																//$path1='/home/cartinhours/public_html/staging/assets/descriptionimages/';
																$path='F:/xampp/htdocs/cartinhour/uploads/products/';
																$path1='F:/xampp/htdocs/cartinhour/assets/descriptionimages/';
																//echo '<pre>';print_r($data);exit;
																	$image_link = $data[69];
																	$split_image = pathinfo($image_link);
																	$imagename=microtime().basename($split_image['filename'].".".$split_image['extension']);
																	copy($data[69], $path.$imagename);
																	if(isset($data[70])&& $data[70]!=''){
																		$image_link1 = $data[70];
																		$split_image1 = pathinfo($image_link1);
																		$imagename1=microtime().basename($split_image1['filename'].".".$split_image1['extension']);
																		copy($data[70], $path.$imagename1);
																	}
																	if(isset($data[71])&& $data[71]!=''){
																			$image_link2 = $data[71];
																			$split_image2 = pathinfo($image_link2);
																			$imagename2=microtime().basename($split_image2['filename'].".".$split_image2['extension']);
																			copy($data[71], $path.$imagename2);
																	}
																	if(isset($data[72])&& $data[72]!=''){
																			$image_link3 = $data[72];
																			$split_image3 = pathinfo($image_link3);
																			$imagename3=microtime().basename($split_image3['filename'].".".$split_image3['extension']);
																			copy($data[72], $path.$imagename3);
																			
																	}
																	if(isset($data[73])&& $data[73]!=''){
																			$image_link4 = $data[73];
																			$split_image4 = pathinfo($image_link4);
																			$imagename4=microtime().basename($split_image4['filename'].".".$split_image4['extension']);
																			copy($data[73], $path.$imagename4);
																			
																	}
																	if(isset($data[74])&& $data[74]!=''){
																			$image_link5 = $data[74];
																			$split_image5 = pathinfo($image_link5);
																			$imagename5=microtime().basename($split_image5['filename'].".".$split_image5['extension']);
																			copy($data[74], $path.$imagename5);
																			
																	}
																	if(isset($data[75])&& $data[75]!=''){
																		$image_link6 = $data[75];
																		$split_image6 = pathinfo($image_link6);
																		$imagename6=microtime().basename($split_image6['filename'].".".$split_image6['extension']);
																		copy($data[75], $path.$imagename6);
																	
																	}
																	if(isset($data[76])&& $data[76]!=''){
																		$image_link7 = $data[76];
																		$split_image7 = pathinfo($image_link7);
																		$imagename7=microtime().basename($split_image7['filename'].".".$split_image7['extension']);
																		copy($data[76], $path.$imagename7);
																	
																	}
																	
																	if(isset($data[7])&& $data[7]!=''){
																		$image_linkD7 = $data[7];
																		$split_imageD7 = pathinfo($image_linkD7);
																		$imagenameD7=microtime().basename($split_imageD7['filename'].".".$split_imageD7['extension']);
																		copy($data[7], $path1.$imagenameD7);
																	
																	}
																	if(isset($data[9])&& $data[9]!=''){
																		$image_linkD9 = $data[9];
																		$split_imageD9 = pathinfo($image_linkD9);
																		$imagenameD9=microtime().basename($split_imageD9['filename'].".".$split_imageD9['extension']);
																		copy($data[9], $path1.$imagenameD9);
																	
																	}
																	if(isset($data[11])&& $data[11]!=''){
																		$image_linkD11 = $data[11];
																		$split_imageD11 = pathinfo($image_linkD11);
																		$imagenameD11=microtime().basename($split_imageD11['filename'].".".$split_imageD11['extension']);
																		copy($data[11], $path1.$imagenameD11);
																	
																	}
																	if(isset($data[13])&& $data[13]!=''){
																		$image_linkD13 = $data[13];
																		$split_imageD13 = pathinfo($image_linkD13);
																		$imagenameD13=microtime().basename($split_imageD13['filename'].".".$split_imageD13['extension']);
																		copy($data[13], $path1.$imagenameD13);
																	
																	}
																	
																	

																	
																	$discount= ($data[2]-$data[3]);
																	$offers= (($discount) /$data[3])*100;
																	$adddetails=array(
																			'category_id' => $post['category_ids'],			
																			'subcategory_id' =>$post['subcategory_ids'],
																			'seller_id' =>$this->session->userdata('seller_id'), 
																			'item_name' => isset($data[1])?$data[1]:'',
																			'item_cost' => isset($data[2])?$data[2]:'',
																			'special_price' => isset($data[3])?$data[3]:'',
																			'offers' =>  isset($offers)?$offers:'',
																			'discount' => isset($discount)?$discount:'',
																			'item_quantity' =>isset($data[4])?$data[4]:'',
																			'highlights' =>isset($data[5])?$data[5]:'',
																			//'description' =>isset($post['description'])?$post['description']:'',
																			'item_status' => 1,
																			'warranty_summary' => isset($data[14])?$data[14]:'',
																			'warranty_type' =>isset($data[15])?$data[15]:'',
																			'service_type' =>isset($data[16])?$data[16]:'',
																			'return_policy' =>isset($data[17])?$data[17]:'',
																			'brand' =>isset($data[18])?$data[18]:'',
																			'product_code' =>isset($data[19])?$data[19]:'',
																			'Processor' =>isset($data[20])?$data[20]:'',
																			'screen_size' => isset($data[21])?$data[21]:'',
																			'internal_memeory' =>isset($data[22])?$data[22]:'',
																			'camera' => isset($data[23])?$data[23]:'',
																			'sim_type' => isset($data[24])?$data[24]:'',
																			'os' =>isset($data[25])?$data[25]:'',
																			'colour' =>isset($data[26])?$data[26]:'',
																			'ram' => isset($data[27])?$data[27]:'',
																			'model_name' =>isset($data[28])?$data[28]:'',
																			'model_id' => isset($data[29])?$data[29]:'',
																			'internal_memory' => isset($data[30])?$data[30]:'',
																			'expand_memory' => isset($data[31])?$data[31]:'',
																			'primary_camera' =>isset($data[32])?$data[32]:'',
																			'primary_camera_feature' => isset($data[33])?$data[33]:'',
																			'secondary_camera' => isset($data[34])?$data[34]:'',
																			'secondary_camera_feature' => isset($data[35])?$data[35]:'',
																			'video_recording' => isset($data[36])?$data[36]:'',
																			'hd_recording' =>isset($data[37])?$data[37]:'',
																			'flash' => isset($data[38])?$data[38]:'',
																			'other_camera_features' => isset($data[39])?$data[39]:'',
																			'battery_capacity' =>isset($data[40])?$data[40]:'',
																			'talk_time' => isset($data[41])?$data[41]:'',
																			'standby_time' => isset($data[42])?$data[42]:'',
																			'operating_frequency' => isset($data[43])?$data[43]:'',
																			'preinstalled_browser' => isset($data[44])?$data[44]:'',
																			'2g' => isset($data[45])?$data[45]:'',
																			'3g' => isset($data[46])?$data[46]:'',
																			'4g' => isset($data[47])?$data[47]:'',
																			'wifi' =>isset($data[48])?$data[48]:'',
																			'gps' => isset($data[49])?$data[49]:'',
																			'edge' =>isset($data[53])?$data[53]:'',
																			'edge_features' => isset($data[54])?$data[54]:'',
																			'bluetooth' => isset($data[51])?$data[51]:'',
																			'nfc' => isset($data[52])?$data[52]:'',
																			'usb_connectivity' =>  isset($data[50])?$data[50]:'',
																			'music_player' => isset($data[55])?$data[55]:'',
																			'video_player' => isset($data[56])?$data[56]:'',
																			'audio_jack' => isset($data[57])?$data[57]:'',
																			'gpu' => isset($data[58])?$data[58]:'',
																			'sim_size' => isset($data[59])?$data[59]:'',
																			'sim_supported' => isset($data[60])?$data[60]:'',
																			'call_memory' =>isset($data[61])?$data[61]:'',
																			'sms_memory' => isset($data[62])?$data[62]:'',
																			'phone_book_memory' => isset($data[63])?$data[63]:'',
																			'sensors' => isset($data[64])?$data[64]:'',
																			'java' => isset($data[65])?$data[65]:'',
																			'insales_package' => isset($data[66])?$data[66]:'',
																			'dislay_resolution' => isset($data[67])?$data[67]:'',
																			'display_type' => isset($data[68])?$data[68]:'',
																			'item_image'=>isset($imagename)?$imagename:'',
																			'item_image1'=>isset($imagename1)?$imagename1:'',
																			'item_image2'=>isset($imagename2)?$imagename2:'',
																			'item_image3'=>isset($imagename3)?$imagename3:'',
																			'item_image4'=>isset($imagename4)?$imagename4:'',
																			'item_image5'=>isset($imagename5)?$imagename5:'',
																			'item_image6'=>isset($imagename6)?$imagename6:'',
																			'item_image7'=>isset($imagename7)?$imagename7:'',
																			'seller_location_area'=>$seller_location['area'],
																			'created_at'=>date('Y-m-d H:i:s'),
																			'seller_id' => $this->session->userdata('seller_id'),  
																			);
																		//echo '<pre>';print_r($adddetails);exit;
																			$results=$this->products_model->save_prodcts($adddetails);
																				if(count($results)>0){
																					
																					$des=array(isset($data[6])?$data[6]:'',isset($data[8])?$data[8]:'',isset($data[10])?$data[10]:'',isset($data[12])?$data[12]:'');
																					$img=array(isset($imagenameD7)?$imagenameD7:'',isset($imagenameD9)?$imagenameD9:'',isset($imagenameD11)?$imagenameD11:'',isset($imagenameD13)?$imagenameD13:'');
																					$conbimearray=array_combine($des,$img);
																						/* for spcification purpose*/
																						foreach ($conbimearray as $key=>$list){

																							if($key!=''){
																								$adddesc=array(
																								'item_id' =>$results,
																								'description' => $key,
																								'image' => $list,
																								'create_at' => date('Y-m-d H:i:s'),
																								'status' =>1,
																								);
																								//echo '<pre>';print_r($adddesc);exit;
																								$this->products_model->insert_product_descriptions($adddesc);
																								
																							}
																						}
																						/* for spcification purpose*/
																						
																						
																				}

														   }
															
													}
													if(count($results)>0){
													$this->session->set_flashdata('addcus','Items are successfully added');
													redirect('/seller/products/create');	
													}
													
												
										}else{
											$this->session->set_flashdata('error','Your are uploaded  wrong File');
											redirect('/seller/products/create');	
										}
										
									}else{
										$this->session->set_flashdata('error','Your are uploaded  wrong File. Please upload correctfile!');
										redirect('/seller/products/create');
									}
								
							}else{
								echo "Subcategory ids is wrong";
							}

						}else{
							echo "category ids is wrong";
						}
						
		
		//exit;
		
		
			}else{
				$this->session->set_flashdata('error','Due to technical problem please try aftre some time.');
				redirect('/seller/products/create');
				
			}
			
			
		
	}	

}