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

		//echo "<pre>";print_r($post);exit;
		//echo "<pre>";print_r($_FILES);
		
		//echo substr($_FILES['categoryfile']['name'], 0, 29);exit;
			if((!empty($_FILES["categoryfile"])) && ($_FILES['categoryfile']['error'] == 0)) {

			$limitSize	= 1000000000; //(15 kb) - Maximum size of uploaded file, change it to any size you want
			$fileName	= basename($_FILES['categoryfile']['name']);
			$fileSize	= $_FILES["categoryfile"]["size"];
			$fileExt	= substr($fileName, strrpos($fileName, '.') + 1);
					/* subcategory data upload data*/
							if($post['subcategory_ids']==226 || $post['subcategory_ids']==227 || $post['subcategory_ids']==228 || $post['subcategory_ids']==229 || $post['subcategory_ids']==230 || $post['subcategory_ids']==231){
					
								
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

																//echo "<pre>";print_r($arry);
																foreach($arry as $key=>$fields)
																{
																		if(isset($fields[1]) && $fields[1]!='' && $fields[2]!='' && $fields[3]!=''){
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
																
																	//echo '<pre>';print_r($data);
																	

																	
																	$discount1= ($data[2]-$data[3]);
																	$discount= number_format($discount1, 2);
																	$offers1= (($discount) /$data[3])*100;
																	$offers= number_format($offers1, 2);
																	if($data[26]!='' && $data[22]!='' && $data[27]!=''){
																	$name=$data[1].' '.ucfirst(strtolower($data[26])).' '.str_replace(' ', '', strtoupper($data[22])).' '.str_replace(' ', '', strtoupper($data[27])).' Ram';
																	}else if($data[26]!='' && $data[22]!=''){
																	$name=$data[1].' '.ucfirst(strtolower($data[26])).' '.str_replace(' ', '', strtoupper($data[22]));
																	}else if($data[26]!=''){
																	$name=$data[1].' '.ucfirst(strtolower($data[26]));
																	}
																	
																	$adddetails=array(
																			'category_id' => $post['category_ids'],			
																			'subcategory_id' =>$post['subcategory_ids'],
																			'itemwise_id' => isset($post['subitemwiseitemid'])?$post['subitemwiseitemid']:'',
																			'subitemid' => isset($post['subitemid'])?$post['subitemid']:'',
																			'seller_id' =>$this->session->userdata('seller_id'), 
																			'item_name' => isset($name)?$name:'',
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
																			'internal_memeory' =>isset($data[22])?str_replace(' ', '', strtoupper($data[22])):'',
																			'camera' => isset($data[23])?$data[23]:'',
																			'sim_type' => isset($data[24])?$data[24]:'',
																			'os' =>isset($data[25])?$data[25]:'',
																			'colour' =>isset($data[26])?ucfirst(strtolower($data[26])):'',
																			'ram' => isset($data[27])?str_replace(' ', '', strtoupper($data[27])):'',
																			'model_name' =>isset($data[28])?$data[28]:'',
																			'model_id' => isset($data[29])?$data[29]:'',
																			'internal_memory' => isset($data[30])?str_replace(' ', '', strtoupper($data[30])):'',
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
																			'item_image'=>isset($data[69])?trim($data[69]):'',
																			'item_image1'=>isset($data[70])?trim($data[70]):'',
																			'item_image2'=>isset($data[71])?trim($data[71]):'',
																			'item_image3'=>isset($data[72])?trim($data[72]):'',
																			'item_image4'=>isset($data[73])?trim($data[73]):'',
																			'item_image5'=>isset($data[74])?trim($data[74]):'',
																			'item_image6'=>isset($data[75])?trim($data[75]):'',
																			'item_image7'=>isset($data[76])?trim($data[76]):'',
																			'seller_location_area'=>$seller_location['area'],
																			'created_at'=>date('Y-m-d H:i:s'),
																			'name'=>isset($data[1])?$data[1]:'',
																			'seller_id' => $this->session->userdata('seller_id'),  
																			);
																		//echo '<pre>';print_r($adddetails);exit;
																			$results=$this->products_model->save_prodcts($adddetails);
																				if(count($results)>0){
																					
																					$des=array(isset($data[6])?$data[6]:'',isset($data[8])?$data[8]:'',isset($data[10])?$data[10]:'',isset($data[12])?$data[12]:'');
																					$img=array(isset($data[7])?$data[7]:'',isset($data[9])?$data[9]:'',isset($data[11])?$data[11]:'',isset($data[13])?$data[13]:'');
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
								
							}else if($post['subcategory_ids']==109){
								if(substr($_FILES['categoryfile']['name'], 0, 27)=='Electroniccameraaccessories'){
											
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

																//echo "<pre>";print_r($post);exit;
																foreach($arry as $key=>$fields)
																{
																		if(isset($fields[1]) && $fields[1]!='' && $fields[2]!='' && $fields[3]!=''){
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
																//echo '<pre>';print_r($data);exit;
																	$discount1= ($data[2]-$data[3]);
																	$discount= number_format($discount1, 2);
																	$offers1= (($discount) /$data[3])*100;
																	$offers= number_format($offers1, 2);
																	
																	$adddetails=array(
																			'category_id' => $post['category_ids'],			
																			'subcategory_id' =>$post['subcategory_ids'],
																			'itemwise_id' => isset($post['subitemwiseitemid'])?$post['subitemwiseitemid']:'',
																			'subitemid' =>isset($post['subitemids'])?$post['subitemids']:'',
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
																			'colour' =>isset($data[20])?$data[20]:'',
																			'f_stop' =>isset($data[21])?$data[21]:'',
																			'picture_angle' =>isset($data[22])?$data[22]:'',
																			'type' =>isset($data[23])?$data[23]:'',
																			'model_name' =>isset($data[24])?$data[24]:'',
																			'minimum_focusing_distance' =>isset($data[25])?$data[25]:'',
																			'aperture_withmaxfocal_length' =>isset($data[26])?$data[26]:'',
																			'aperture_with_minfocal_length' =>isset($data[27])?$data[27]:'',
																			'maximum_focal_length' =>isset($data[28])?$data[28]:'',
																			'maximum_reproduction_ratio' =>isset($data[29])?$data[29]:'',
																			'lens_construction' =>isset($data[30])?$data[30]:'',
																			'lens_hood' =>isset($data[31])?$data[31]:'',
																			'lens_case' =>isset($data[32])?$data[32]:'',
																			'lens_cap' =>isset($data[33])?$data[33]:'',
																			'filter_attachment_size' =>isset($data[34])?$data[34]:'',
																			'other_camera_features' =>isset($data[35])?$data[35]:'',
																			'dimension' =>isset($data[36])?$data[36]:'',
																			'weight' =>isset($data[37])?$data[37]:'',
																			'insales_package' =>isset($data[38])?$data[38]:'',
																			'item_image'=>isset($data[39])?trim($data[39]):'',
																			'item_image1'=>isset($data[40])?trim($data[40]):'',
																			'item_image2'=>isset($data[41])?trim($data[41]):'',
																			'item_image3'=>isset($data[42])?trim($data[42]):'',
																			'item_image4'=>isset($data[43])?trim($data[43]):'',
																			'item_image5'=>isset($data[44])?trim($data[44]):'',
																			'item_image6'=>isset($data[45])?trim($data[45]):'',
																			'item_image7'=>isset($data[46])?trim($data[46]):'',
																			'seller_location_area'=>$seller_location['area'],																	'seller_location_area'=>$seller_location['area'],
																			'created_at'=>date('Y-m-d H:i:s'),
																			'name' => isset($data[1])?$data[1]:'',
																			'seller_id' => $this->session->userdata('seller_id'),  
																			);
																		//echo '<pre>';print_r($adddetails);exit;
																			$results=$this->products_model->save_prodcts($adddetails);
																				if(count($results)>0){
																					
																					$des=array(isset($data[6])?$data[6]:'',isset($data[8])?$data[8]:'',isset($data[10])?$data[10]:'',isset($data[12])?$data[12]:'');
																					$img=array(isset($data[7])?$data[7]:'',isset($data[9])?$data[9]:'',isset($data[11])?$data[11]:'',isset($data[13])?$data[13]:'');
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
								
							}else if($post['subcategory_ids']==107){
													if(substr($_FILES['categoryfile']['name'], 0, 17)=='Electroniclaptops'){
											
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

																//echo "<pre>";print_r($post);exit;
																foreach($arry as $key=>$fields)
																{
																		if(isset($fields[1]) && $fields[1]!='' && $fields[2]!='' && $fields[3]!=''){
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
																//echo '<pre>';print_r($data);exit;
																	$discount1= ($data[2]-$data[3]);
																	$discount= number_format($discount1, 2);
																	$offers1= (($discount) /$data[3])*100;
																	$offers= number_format($offers1, 2);
																	
																	$adddetails=array(
																			'category_id' => $post['category_ids'],			
																			'subcategory_id' =>$post['subcategory_ids'],
																			'subitemid' =>isset($post['subitemids'])?$post['subitemids']:'',
																			'itemwise_id' => isset($post['subitemwiseitemid'])?$post['subitemwiseitemid']:'',
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
																			'series' =>isset($data[21])?$data[21]:'',
																			'part_number' =>isset($data[22])?$data[22]:'',
																			'os' =>isset($data[23])?$data[23]:'',
																			'ram' =>isset($data[24])?$data[24]:'',
																			'hdd_capacity' =>isset($data[25])?$data[25]:'',
																			'processorbrand' =>isset($data[26])?$data[26]:'',
																			'colour' =>isset($data[27])?$data[27]:'',
																			'model_name' =>isset($data[28])?$data[28]:'',
																			'processorbrand' =>isset($data[29])?$data[29]:'',
																			'variant' =>isset($data[30])?$data[30]:'',
																			'chipset' =>isset($data[31])?$data[31]:'',
																			'clock_speed' =>isset($data[32])?$data[32]:'',
																			'cache' =>isset($data[33])?$data[33]:'',
																			'screen_type' =>isset($data[34])?$data[34]:'',
																			'resolution' =>isset($data[35])?$data[35]:'',
																			'graphic_processor' =>isset($data[36])?$data[36]:'',
																			'memory_slots' =>isset($data[37])?$data[37]:'',
																			'hdd_capacity' =>isset($data[38])?$data[38]:'',
																			'rpm' =>isset($data[39])?$data[39]:'',
																			'optical_drive' =>isset($data[40])?$data[40]:'',
																			'wan' =>isset($data[41])?$data[41]:'',
																			'ethernet' =>isset($data[42])?$data[42]:'',
																			'vgaport' =>isset($data[43])?$data[43]:'',
																			'usb_port' =>isset($data[44])?$data[44]:'',
																			'hdmi_port' =>isset($data[45])?$data[45]:'',
																			'multi_card_slot' =>isset($data[46])?$data[46]:'',
																			'web_camera' =>isset($data[47])?$data[47]:'',
																			'keyboard' =>isset($data[48])?$data[48]:'',
																			'speakers' =>isset($data[49])?$data[49]:'',
																			'mic_in' =>isset($data[50])?$data[50]:'',
																			'power_supply' =>isset($data[51])?$data[51]:'',
																			'battery_backup' =>isset($data[52])?$data[52]:'',
																			'battery_cell' =>isset($data[53])?$data[53]:'',
																			'dimension' =>isset($data[54])?$data[54]:'',
																			'weight' =>isset($data[55])?$data[55]:'',
																			'adapter' =>isset($data[56])?$data[56]:'',
																			'office' =>isset($data[57])?$data[57]:'',
																			'fingerprint_point' =>isset($data[58])?$data[58]:'',
																			'insales_package' =>isset($data[59])?$data[59]:'',
																			'item_image'=>isset($data[60])?trim($data[60]):'',
																			'item_image1'=>isset($data[61])?trim($data[61]):'',
																			'item_image2'=>isset($data[62])?trim($data[62]):'',
																			'item_image3'=>isset($data[63])?trim($data[63]):'',
																			'item_image4'=>isset($data[64])?trim($data[64]):'',
																			'item_image5'=>isset($data[65])?trim($data[65]):'',
																			'item_image6'=>isset($data[66])?trim($data[66]):'',
																			'item_image7'=>isset($data[67])?trim($data[67]):'',
																			'seller_location_area'=>$seller_location['area'],																	'seller_location_area'=>$seller_location['area'],
																			'created_at'=>date('Y-m-d H:i:s'),
																			'name' => isset($data[1])?$data[1]:'',
																			'seller_id' => $this->session->userdata('seller_id'),  
																			);
																		//echo '<pre>';print_r($adddetails);exit;
																			$results=$this->products_model->save_prodcts($adddetails);
																				if(count($results)>0){
																					
																					$des=array(isset($data[6])?$data[6]:'',isset($data[8])?$data[8]:'',isset($data[10])?$data[10]:'',isset($data[12])?$data[12]:'');
																					$img=array(isset($data[7])?$data[7]:'',isset($data[9])?$data[9]:'',isset($data[11])?$data[11]:'',isset($data[13])?$data[13]:'');
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
								
							}else if($post['subcategory_ids']==219){
											if(substr($_FILES['categoryfile']['name'], 0, 26)=='Electroniccomputerspeakers'){
											
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

																//echo "<pre>";print_r($post);exit;
																foreach($arry as $key=>$fields)
																{
																		if(isset($fields[1]) && $fields[1]!='' && $fields[2]!='' && $fields[3]!=''){
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
																//echo '<pre>';print_r($data);exit;
																	$discount1= ($data[2]-$data[3]);
																	$discount= number_format($discount1, 2);
																	$offers1= (($discount) /$data[3])*100;
																	$offers= number_format($offers1, 2);
																	
																	$adddetails=array(
																			'category_id' => $post['category_ids'],			
																			'subcategory_id' =>$post['subcategory_ids'],
																			'subitemid' =>isset($post['subitemids'])?$post['subitemids']:'',
																			'itemwise_id' => isset($post['subitemwiseitemid'])?$post['subitemwiseitemid']:'',
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
																			'total_power_output' =>isset($data[20])?$data[20]:'',
																			'sound_system' =>isset($data[21])?$data[21]:'',
																			'speaker_driver' =>isset($data[22])?$data[22]:'',
																			'power' =>isset($data[23])?$data[23]:'',
																			'battery_type' =>isset($data[24])?$data[24]:'',
																			'usb_port' =>isset($data[25])?$data[25]:'',
																			'headphone_jack' =>isset($data[26])?$data[26]:'',
																			'bluetooth' =>isset($data[27])?$data[27]:'',
																			'wired_wireless' =>isset($data[28])?$data[28]:'',
																			'bluetooth_range' =>isset($data[29])?$data[29]:'',
																			'compatible_for' =>isset($data[30])?$data[30]:'',
																			'weight' =>isset($data[31])?$data[31]:'',
																			'insales_package' =>isset($data[32])?$data[32]:'',
																			'item_image'=>isset($data[33])?trim($data[33]):'',
																			'item_image1'=>isset($data[34])?trim($data[34]):'',
																			'item_image2'=>isset($data[35])?trim($data[35]):'',
																			'item_image3'=>isset($data[36])?trim($data[36]):'',
																			'item_image4'=>isset($data[37])?trim($data[37]):'',
																			'item_image5'=>isset($data[38])?trim($data[38]):'',
																			'item_image6'=>isset($data[39])?trim($data[39]):'',
																			'item_image7'=>isset($data[40])?trim($data[40]):'',
																			'seller_location_area'=>$seller_location['area'],																	'seller_location_area'=>$seller_location['area'],
																			'created_at'=>date('Y-m-d H:i:s'),
																			'name' => isset($data[1])?$data[1]:'',
																			'seller_id' => $this->session->userdata('seller_id'),  
																			);
																		//echo '<pre>';print_r($adddetails);exit;
																			$results=$this->products_model->save_prodcts($adddetails);
																				if(count($results)>0){
																					
																					$des=array(isset($data[6])?$data[6]:'',isset($data[8])?$data[8]:'',isset($data[10])?$data[10]:'',isset($data[12])?$data[12]:'');
																					$img=array(isset($data[7])?$data[7]:'',isset($data[9])?$data[9]:'',isset($data[11])?$data[11]:'',isset($data[13])?$data[13]:'');
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
							}else if($post['subcategory_ids']==111){
																
											if(substr($_FILES['categoryfile']['name'], 0, 18)=='Electronicprinters'){
											
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

																//echo "<pre>";print_r($post);exit;
																foreach($arry as $key=>$fields)
																{
																		if(isset($fields[1]) && $fields[1]!='' && $fields[2]!='' && $fields[3]!=''){
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
																//echo '<pre>';print_r($data);exit;
																	$discount1= ($data[2]-$data[3]);
																	$discount= number_format($discount1, 2);
																	$offers1= (($discount) /$data[3])*100;
																	$offers= number_format($offers1, 2);
																	
																	$adddetails=array(
																			'category_id' => $post['category_ids'],			
																			'subcategory_id' =>$post['subcategory_ids'],
																			'subitemid' =>isset($post['subitemids'])?$post['subitemids']:'',
																			'itemwise_id' => isset($post['subitemwiseitemid'])?$post['subitemwiseitemid']:'',
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
																			'model_series' =>isset($data[20])?$data[20]:'',
																			'installation' =>isset($data[21])?$data[21]:'',
																			'warranty_card' =>isset($data[22])?$data[22]:'',
																			'type' =>isset($data[23])?$data[23]:'',
																			'functions' =>isset($data[24])?$data[24]:'',
																			'printer_type' =>isset($data[25])?$data[25]:'',
																			'interface' =>isset($data[26])?$data[26]:'',
																			'printer_output' =>isset($data[27])?$data[27]:'',
																			'model_id' =>isset($data[28])?$data[28]:'',
																			'max_print_resolution' =>isset($data[29])?$data[29]:'',
																			'print_speed' =>isset($data[30])?$data[30]:'',
																			'scanner_type' =>isset($data[31])?$data[31]:'',
																			'document_size' =>isset($data[32])?$data[32]:'',
																			'scanning_resolution' =>isset($data[33])?$data[33]:'',
																			'copies_from' =>isset($data[34])?$data[34]:'',
																			'copy_size' =>isset($data[35])?$data[35]:'',
																			'iso_29183' =>isset($data[36])?$data[36]:'',
																			'noise_level' =>isset($data[37])?$data[37]:'',
																			'paper_hold_input' =>isset($data[38])?$data[38]:'',
																			'paper_hold_output' =>isset($data[39])?$data[39]:'',
																			'paper_size' =>isset($data[40])?$data[40]:'',
																			'print_margin' =>isset($data[41])?$data[41]:'',
																			'standby' =>isset($data[42])?$data[42]:'',
																			'operating_temperature_range' =>isset($data[43])?$data[43]:'',
																			'power' =>isset($data[44])?$data[44]:'',
																			'frequency' =>isset($data[45])?$data[45]:'',
																			'insales_package' =>isset($data[46])?$data[46]:'',
																			'item_image'=>isset($data[47])?trim($data[47]):'',
																			'item_image1'=>isset($data[48])?trim($data[48]):'',
																			'item_image2'=>isset($data[49])?trim($data[49]):'',
																			'item_image3'=>isset($data[50])?trim($data[50]):'',
																			'item_image4'=>isset($data[51])?trim($data[51]):'',
																			'item_image5'=>isset($data[52])?trim($data[52]):'',
																			'item_image6'=>isset($data[53])?trim($data[53]):'',
																			'item_image7'=>isset($data[54])?trim($data[54]):'',
																			'seller_location_area'=>$seller_location['area'],																	'seller_location_area'=>$seller_location['area'],
																			'created_at'=>date('Y-m-d H:i:s'),
																			'name' => isset($data[1])?$data[1]:'',
																			'seller_id' => $this->session->userdata('seller_id'),  
																			);
																		//echo '<pre>';print_r($adddetails);exit;
																			$results=$this->products_model->save_prodcts($adddetails);
																				if(count($results)>0){
																					
																					$des=array(isset($data[6])?$data[6]:'',isset($data[8])?$data[8]:'',isset($data[10])?$data[10]:'',isset($data[12])?$data[12]:'');
																					$img=array(isset($data[7])?$data[7]:'',isset($data[9])?$data[9]:'',isset($data[11])?$data[11]:'',isset($data[13])?$data[13]:'');
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
							}else if($post['category_ids']==21){
							
									 if(substr($_FILES['categoryfile']['name'], 0, 19)=='grocerycategoryfile'){
											
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

																//echo "<pre>";print_r($post);exit;
																foreach($arry as $key=>$fields)
																{
																		if(isset($fields[1]) && $fields[1]!='' && $fields[2]!='' && $fields[3]!=''){
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
																
																	//echo '<pre>';print_r($data);exit;
																	

															
																	$discount1= ($data[2]-$data[3]);
																	$discount= number_format($discount1, 2);
																	$offers1= (($discount) /$data[3])*100;
																	$offers= number_format($offers1, 2);
																	
																	$adddetails=array(
																			'category_id' => $post['category_ids'],			
																			'subcategory_id' =>$post['subcategory_ids'],
																			'subitemid' =>isset($post['subitemids'])?$post['subitemids']:'',
																			'itemwise_id' => isset($post['subitemwiseitemid'])?$post['subitemwiseitemid']:'',
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
																			'ingredients' =>isset($data[20])?$data[20]:'',
																			'key_feature' =>isset($data[21])?$data[21]:'',
																			'unit' =>isset($data[22])?$data[22]:'',
																			'packingtype' =>isset($data[23])?$data[23]:'',
																			'disclaimer' =>isset($data[24])?$data[24]:'',
																			
																			'item_image'=>isset($data[25])?trim($data[25]):'',
																			'item_image1'=>isset($data[26])?trim($data[26]):'',
																			'item_image2'=>isset($data[27])?trim($data[27]):'',
																			'item_image3'=>isset($data[28])?trim($data[28]):'',
																			'item_image4'=>isset($data[29])?trim($data[29]):'',
																			'item_image5'=>isset($data[30])?trim($data[30]):'',
																			'item_image6'=>isset($data[31])?trim($data[31]):'',
																			'item_image7'=>isset($data[32])?trim($data[31]):'',
																			'seller_location_area'=>$seller_location['area'],
																			'created_at'=>date('Y-m-d H:i:s'),
																			'name' => isset($data[1])?$data[1]:'',
																			'seller_id' => $this->session->userdata('seller_id'),  
																			);
																		//echo '<pre>';print_r($adddetails);exit;
																			$results=$this->products_model->save_prodcts($adddetails);
																				if(count($results)>0){
																					
																					$des=array(isset($data[6])?$data[6]:'',isset($data[8])?$data[8]:'',isset($data[10])?$data[10]:'',isset($data[12])?$data[12]:'');
																					$img=array(isset($data[7])?$data[7]:'',isset($data[9])?$data[9]:'',isset($data[11])?$data[11]:'',isset($data[13])?$data[13]:'');
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
							
							
						}else if($post['subcategory_ids']==128 || $post['subcategory_ids']==129 || $post['subcategory_ids']==130 || $post['subcategory_ids']==140 || $post['subcategory_ids']==232 || $post['subcategory_ids']==233){									
									if(substr($_FILES['categoryfile']['name'], 0, 12)=='footwareshoe'){
											
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

																//echo "<pre>";print_r($post);exit;
																foreach($arry as $key=>$fields)
																{
																		if(isset($fields[1]) && $fields[1]!='' && $fields[2]!='' && $fields[3]!=''){
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
																
																	//echo '<pre>';print_r($data);exit;
																	$discount1= ($data[2]-$data[3]);
																	$discount= number_format($discount1, 2);
																	$offers1= (($discount) /$data[3])*100;
																	$offers= number_format($offers1, 2);
																	
																	$adddetails=array(
																			'category_id' => $post['category_ids'],			
																			'subcategory_id' =>$post['subcategory_ids'],
																			'subitemid' =>isset($post['subitemids'])?$post['subitemids']:'',
																			'itemwise_id' => isset($post['subitemwiseitemid'])?$post['subitemwiseitemid']:'',
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
																			'style_code' =>isset($data[20])?$data[20]:'',
																			'colour' =>isset($data[21])?$data[21]:'',
																			'size' =>isset($data[22])?$data[22]:'',
																			'material' =>isset($data[23])?$data[23]:'',
																			'type' =>isset($data[24])?$data[24]:'',
																			'sole_material' =>isset($data[25])?$data[25]:'',
																			'fastening' =>isset($data[26])?$data[26]:'',
																			'toe_shape' =>isset($data[27])?$data[27]:'',
																			'ean_upc' =>isset($data[28])?$data[28]:'',
																			'item_image'=>isset($data[29])?trim($data[29]):'',
																			'item_image1'=>isset($data[30])?trim($data[30]):'',
																			'item_image2'=>isset($data[31])?trim($data[31]):'',
																			'item_image3'=>isset($data[32])?trim($data[32]):'',
																			'item_image4'=>isset($data[33])?trim($data[33]):'',
																			'item_image5'=>isset($data[34])?trim($data[34]):'',
																			'item_image6'=>isset($data[35])?trim($data[35]):'',
																			'item_image7'=>isset($data[36])?trim($data[36]):'',
																			'seller_location_area'=>$seller_location['area'],
																			'created_at'=>date('Y-m-d H:i:s'),
																			'name' => isset($data[1])?$data[1]:'',
																			'seller_id' => $this->session->userdata('seller_id'),  
																			);
																		//echo '<pre>';print_r($adddetails);exit;
																			$results=$this->products_model->save_prodcts($adddetails);
																				if(count($results)>0){
																					
																					$des=array(isset($data[6])?$data[6]:'',isset($data[8])?$data[8]:'',isset($data[10])?$data[10]:'',isset($data[12])?$data[12]:'');
																					$img=array(isset($data[7])?$data[7]:'',isset($data[9])?$data[9]:'',isset($data[11])?$data[11]:'',isset($data[13])?$data[13]:'');
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
									
								}else if($post['subcategory_ids']==123 || $post['subcategory_ids']==125 || $post['subcategory_ids']==126 || $post['subcategory_ids']==127 || $post['subcategory_ids']==136 || $post['subcategory_ids']==137 || $post['subcategory_ids']==138){
											if(substr($_FILES['categoryfile']['name'], 0, 17)=='clothcategoryfile'){
											
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
																foreach($arry as $key=>$fields)
																{
																		if(isset($fields[1]) && $fields[1]!='' && $fields[2]!='' && $fields[3]!=''){
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
																$discount1= ($data[2]-$data[3]);
																	$discount= number_format($discount1, 2);
																	$offers1= (($discount) /$data[3])*100;
																	$offers= number_format($offers1, 2);
																	
																	$adddetails=array(
																			'category_id' => $post['category_ids'],			
																			'subcategory_id' =>$post['subcategory_ids'],
																			'subitemid' =>isset($post['subitemids'])?$post['subitemids']:'',
																			'itemwise_id' => isset($post['subitemwiseitemid'])?$post['subitemwiseitemid']:'',
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
																			'size' =>isset($data[20])?$data[20]:'',
																			'colour' =>isset($data[21])?$data[21]:'',
																			'occasion' =>isset($data[22])?$data[22]:'',
																			'material' =>isset($data[23])?$data[23]:'',
																			'wash_care' =>isset($data[24])?$data[24]:'',
																			'style_code' =>isset($data[25])?$data[25]:'',
																			'look' =>isset($data[26])?$data[26]:'',
																			'collar_type' =>isset($data[27])?$data[27]:'',
																			'sleeve' =>isset($data[28])?$data[28]:'',
																			'fit' =>isset($data[29])?$data[29]:'',
																			'pattern' =>isset($data[30])?$data[30]:'',
																			'gender' =>isset($data[31])?$data[31]:'',
																			
																			'item_image'=>isset($data[32])?trim($data[32]):'',
																			'item_image1'=>isset($data[33])?trim($data[33]):'',
																			'item_image2'=>isset($data[34])?trim($data[34]):'',
																			'item_image3'=>isset($data[35])?trim($data[35]):'',
																			'item_image4'=>isset($data[36])?trim($data[36]):'',
																			'item_image5'=>isset($data[37])?trim($data[37]):'',
																			'item_image6'=>isset($data[38])?trim($data[38]):'',
																			'item_image7'=>isset($data[39])?trim($data[39]):'',
																			'seller_location_area'=>$seller_location['area'],
																			'created_at'=>date('Y-m-d H:i:s'),
																			'name' => isset($data[1])?$data[1]:'',
																			'seller_id' => $this->session->userdata('seller_id'),  
																			);
																		//echo '<pre>';print_r($adddetails);exit;
																			$results=$this->products_model->save_prodcts($adddetails);
																				if(count($results)>0){
																					
																					$des=array(isset($data[6])?$data[6]:'',isset($data[8])?$data[8]:'',isset($data[10])?$data[10]:'',isset($data[12])?$data[12]:'');
																					$img=array(isset($data[7])?$data[7]:'',isset($data[9])?$data[9]:'',isset($data[11])?$data[11]:'',isset($data[13])?$data[13]:'');
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
								}else if($post['subcategory_ids']==124){
												if(substr($_FILES['categoryfile']['name'], 0, 19)=='clothcategoryfile62'){
											
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
																foreach($arry as $key=>$fields)
																{
																		if(isset($fields[1]) && $fields[1]!='' && $fields[2]!='' && $fields[3]!=''){
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
																//echo '<pre>';print_r($data);exit;
																$discount1= ($data[2]-$data[3]);
																	$discount= number_format($discount1, 2);
																	$offers1= (($discount) /$data[3])*100;
																	$offers= number_format($offers1, 2);
																	
																	$adddetails=array(
																			'category_id' => $post['category_ids'],			
																			'subcategory_id' =>$post['subcategory_ids'],
																			'subitemid' =>isset($post['subitemids'])?$post['subitemids']:'',
																			'itemwise_id' => isset($post['subitemwiseitemid'])?$post['subitemwiseitemid']:'',
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
																			'size' =>isset($data[20])?$data[20]:'',
																			'colour' =>isset($data[21])?$data[21]:'',
																			'occasion' =>isset($data[22])?$data[22]:'',
																			'material' =>isset($data[23])?$data[23]:'',
																			'wash_care' =>isset($data[24])?$data[24]:'',
																			'style_code' =>isset($data[25])?$data[25]:'',
																			'set_contents' =>isset($data[26])?$data[26]:'',
																			'gender' =>isset($data[27])?$data[27]:'',
																			'item_image'=>isset($data[28])?trim($data[28]):'',
																			'item_image1'=>isset($data[29])?trim($data[29]):'',
																			'item_image2'=>isset($data[30])?trim($data[30]):'',
																			'item_image3'=>isset($data[31])?trim($data[31]):'',
																			'item_image4'=>isset($data[32])?trim($data[32]):'',
																			'item_image5'=>isset($data[33])?trim($data[33]):'',
																			'item_image6'=>isset($data[34])?trim($data[34]):'',
																			'item_image7'=>isset($data[35])?trim($data[35]):'',
																			'seller_location_area'=>$seller_location['area'],
																			'created_at'=>date('Y-m-d H:i:s'),
																			'name' => isset($data[1])?$data[1]:'',
																			'seller_id' => $this->session->userdata('seller_id'),  
																			);
																		//echo '<pre>';print_r($adddetails);exit;
																			$results=$this->products_model->save_prodcts($adddetails);
																				if(count($results)>0){
																					
																					$des=array(isset($data[6])?$data[6]:'',isset($data[8])?$data[8]:'',isset($data[10])?$data[10]:'',isset($data[12])?$data[12]:'');
																					$img=array(isset($data[7])?$data[7]:'',isset($data[9])?$data[9]:'',isset($data[11])?$data[11]:'',isset($data[13])?$data[13]:'');
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
								}else if($post['subcategory_ids']==135 || $post['subcategory_ids']==139){
										if(substr($_FILES['categoryfile']['name'], 0, 19)=='clothcategoryfile63'){
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
																foreach($arry as $key=>$fields)
																{
																		if(isset($fields[1]) && $fields[1]!='' && $fields[2]!='' && $fields[3]!=''){
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
																//echo '<pre>';print_r($data);exit;
																$discount1= ($data[2]-$data[3]);
																	$discount= number_format($discount1, 2);
																	$offers1= (($discount) /$data[3])*100;
																	$offers= number_format($offers1, 2);
																	
																	$adddetails=array(
																			'category_id' => $post['category_ids'],			
																			'subcategory_id' =>$post['subcategory_ids'],
																			'subitemid' =>isset($post['subitemids'])?$post['subitemids']:'',
																			'itemwise_id' => isset($post['subitemwiseitemid'])?$post['subitemwiseitemid']:'',
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
																			'size' =>isset($data[20])?$data[20]:'',
																			'colour' =>isset($data[21])?$data[21]:'',
																			'occasion' =>isset($data[22])?$data[22]:'',
																			'material' =>isset($data[23])?$data[23]:'',
																			'wash_care' =>isset($data[24])?$data[24]:'',
																			'style_code' =>isset($data[25])?$data[25]:'',
																			'look' =>isset($data[26])?$data[26]:'',
																			'collar_type' =>isset($data[27])?$data[27]:'',
																			'sleeve' =>isset($data[28])?$data[28]:'',
																			'sleeve' =>isset($data[28])?$data[28]:'',
																			'fit' =>isset($data[29])?$data[29]:'',
																			'type' =>isset($data[30])?$data[30]:'',
																			'neck_type' =>isset($data[31])?$data[31]:'',
																			'length' =>isset($data[32])?$data[32]:'',
																			'pockets' =>isset($data[33])?$data[33]:'',
																			'blouse_length' =>isset($data[34])?$data[34]:'',
																			'saree_length' =>isset($data[35])?$data[35]:'',
																			'disclaimer' =>isset($data[36])?$data[36]:'',
																			'item_image'=>isset($data[37])?trim($data[37]):'',
																			'item_image1'=>isset($data[38])?trim($data[38]):'',
																			'item_image2'=>isset($data[39])?trim($data[39]):'',
																			'item_image3'=>isset($data[40])?trim($data[40]):'',
																			'item_image4'=>isset($data[41])?trim($data[41]):'',
																			'item_image5'=>isset($data[42])?trim($data[42]):'',
																			'item_image6'=>isset($data[43])?trim($data[43]):'',
																			'item_image7'=>isset($data[44])?trim($data[44]):'',
																			'seller_location_area'=>$seller_location['area'],
																			'created_at'=>date('Y-m-d H:i:s'),
																			'name' => isset($data[1])?$data[1]:'',
																			'seller_id' => $this->session->userdata('seller_id'),  
																			);
																		//echo '<pre>';print_r($adddetails);exit;
																			$results=$this->products_model->save_prodcts($adddetails);
																				if(count($results)>0){
																					
																					$des=array(isset($data[6])?$data[6]:'',isset($data[8])?$data[8]:'',isset($data[10])?$data[10]:'',isset($data[12])?$data[12]:'');
																					$img=array(isset($data[7])?$data[7]:'',isset($data[9])?$data[9]:'',isset($data[11])?$data[11]:'',isset($data[13])?$data[13]:'');
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
								}else if($post['subcategory_ids']==132 || $post['subcategory_ids']==142 || $post['subcategory_ids']==144 || $post['subcategory_ids']==220 || $post['subcategory_ids']==221 || $post['subcategory_ids']==222){
									if(substr($_FILES['categoryfile']['name'], 0, 16)=='bagscategoryfile'){
											
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

																//echo "<pre>";print_r($post);exit;
																foreach($arry as $key=>$fields)
																{
																		if(isset($fields[1]) && $fields[1]!='' && $fields[2]!='' && $fields[3]!=''){
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
																
																	$discount1= ($data[2]-$data[3]);
																	$discount= number_format($discount1, 2);
																	$offers1= (($discount) /$data[3])*100;
																	$offers= number_format($offers1, 2);
																	
																	$adddetails=array(
																			'category_id' => $post['category_ids'],			
																			'subcategory_id' =>$post['subcategory_ids'],
																			'subitemid' =>isset($post['subitemids'])?$post['subitemids']:'',
																			'itemwise_id' => isset($post['subitemwiseitemid'])?$post['subitemwiseitemid']:'',
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
																			'colour' =>isset($data[20])?$data[20]:'',
																			'material' =>isset($data[21])?$data[21]:'',
																			'type' =>isset($data[22])?$data[22]:'',
																			'waterproof' =>isset($data[23])?$data[23]:'',
																			'laptop_compartment' =>isset($data[24])?$data[24]:'',
																			'closure' =>isset($data[25])?$data[25]:'',
																			'wheels' =>isset($data[26])?$data[26]:'',
																			'no_of_pockets' =>isset($data[27])?$data[27]:'',
																			'inner_material' =>isset($data[28])?$data[28]:'',
																			'product_dimension' =>isset($data[29])?$data[29]:'',
																			'disclaimer' =>isset($data[30])?$data[30]:'',
																			'item_image'=>isset($data[31])?trim($data[31]):'',
																			'item_image1'=>isset($data[32])?trim($data[32]):'',
																			'item_image2'=>isset($data[33])?trim($data[33]):'',
																			'item_image3'=>isset($data[34])?trim($data[34]):'',
																			'item_image4'=>isset($data[35])?trim($data[35]):'',
																			'item_image5'=>isset($data[36])?trim($data[36]):'',
																			'item_image6'=>isset($data[37])?trim($data[37]):'',
																			'item_image7'=>isset($data[38])?trim($data[38]):'',
																			'seller_location_area'=>$seller_location['area'],																	'seller_location_area'=>$seller_location['area'],
																			'created_at'=>date('Y-m-d H:i:s'),
																			'name' => isset($data[1])?$data[1]:'',
																			'seller_id' => $this->session->userdata('seller_id'),  
																			);
																		//echo '<pre>';print_r($adddetails);exit;
																			$results=$this->products_model->save_prodcts($adddetails);
																				if(count($results)>0){
																					
																					$des=array(isset($data[6])?$data[6]:'',isset($data[8])?$data[8]:'',isset($data[10])?$data[10]:'',isset($data[12])?$data[12]:'');
																					$img=array(isset($data[7])?$data[7]:'',isset($data[9])?$data[9]:'',isset($data[11])?$data[11]:'',isset($data[13])?$data[13]:'');
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
									
							}else if($post['subcategory_ids']==237){
								
										if(substr($_FILES['categoryfile']['name'], 0, 18)=='externaldvdwriters'){
											
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

																//echo "<pre>";print_r($post);exit;
																foreach($arry as $key=>$fields)
																{
																		if(isset($fields[1]) && $fields[1]!='' && $fields[2]!='' && $fields[3]!=''){
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
																		
																		
																 }else{
																	 $this->session->set_flashdata('error','fields are missing check once again');
																	 redirect('/seller/products/create');
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
																//echo '<pre>';print_r($data);exit;
																	$discount1= ($data[2]-$data[3]);
																	$discount= number_format($discount1, 2);
																	$offers1= (($discount) /$data[3])*100;
																	$offers= number_format($offers1, 2);
																	
																	$adddetails=array(
																			'category_id' => $post['category_ids'],			
																			'subcategory_id' =>$post['subcategory_ids'],
																			'subitemid' =>isset($post['subitemids'])?$post['subitemids']:'',
																			'itemwise_id' => isset($post['subitemwiseitemid'])?$post['subitemwiseitemid']:'',
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
																			'size' =>isset($data[20])?$data[20]:'',
																			'colour' =>isset($data[21])?$data[21]:'',
																			'type' =>isset($data[22])?$data[22]:'',
																			'factor' =>isset($data[23])?$data[23]:'',
																			'model_name' =>isset($data[24])?$data[24]:'',
																			'model_id' =>isset($data[25])?$data[25]:'',
																			'interface' =>isset($data[26])?$data[26]:'',
																			'disclaimer' =>isset($data[27])?$data[27]:'',
																			'insales_package' =>isset($data[28])?$data[28]:'',
																			'item_image'=>isset($data[29])?trim($data[29]):'',
																			'item_image1'=>isset($data[30])?trim($data[30]):'',
																			'item_image2'=>isset($data[31])?trim($data[31]):'',
																			'item_image3'=>isset($data[32])?trim($data[32]):'',
																			'item_image4'=>isset($data[33])?trim($data[33]):'',
																			'item_image5'=>isset($data[34])?trim($data[34]):'',
																			'item_image6'=>isset($data[35])?trim($data[35]):'',
																			'item_image7'=>isset($data[36])?trim($data[36]):'',
																			'seller_location_area'=>$seller_location['area'],																	'seller_location_area'=>$seller_location['area'],
																			'created_at'=>date('Y-m-d H:i:s'),
																			'name' => isset($data[1])?$data[1]:'',
																			'seller_id' => $this->session->userdata('seller_id'),  
																			);
																		//echo '<pre>';print_r($adddetails);exit;
																			$results=$this->products_model->save_prodcts($adddetails);
																				if(count($results)>0){
																					
																					$des=array(isset($data[6])?$data[6]:'',isset($data[8])?$data[8]:'',isset($data[10])?$data[10]:'',isset($data[12])?$data[12]:'');
																					$img=array(isset($data[7])?$data[7]:'',isset($data[9])?$data[9]:'',isset($data[11])?$data[11]:'',isset($data[13])?$data[13]:'');
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
								
								
							}else if($post['subcategory_ids']==238){
								
										if(substr($_FILES['categoryfile']['name'], 0, 10)=='converters'){
											
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

																//echo "<pre>";print_r($post);exit;
																foreach($arry as $key=>$fields)
																{
																		if(isset($fields[1]) && $fields[1]!='' && $fields[2]!='' && $fields[3]!=''){
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
																		
																		
																 }else{
																	 $this->session->set_flashdata('error','fields are missing check once again');
																	 redirect('/seller/products/create');
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
																//echo '<pre>';print_r($data);exit;
																	$discount1= ($data[2]-$data[3]);
																	$discount= number_format($discount1, 2);
																	$offers1= (($discount) /$data[3])*100;
																	$offers= number_format($offers1, 2);
																	
																	$adddetails=array(
																			'category_id' => $post['category_ids'],			
																			'subcategory_id' =>$post['subcategory_ids'],
																			'subitemid' =>isset($post['subitemids'])?$post['subitemids']:'',
																			'itemwise_id' => isset($post['subitemwiseitemid'])?$post['subitemwiseitemid']:'',
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
																			'size' =>isset($data[20])?$data[20]:'',
																			'colour' =>isset($data[21])?$data[21]:'',
																			'type' =>isset($data[22])?$data[22]:'',
																			'connector1' =>isset($data[23])?$data[23]:'',
																			'connector2' =>isset($data[24])?$data[24]:'',
																			'model_name' =>isset($data[25])?$data[25]:'',
																			'model_id' =>isset($data[26])?$data[26]:'',
																			'interface' =>isset($data[27])?$data[27]:'',
																			'disclaimer' =>isset($data[28])?$data[28]:'',
																			'insales_package' =>isset($data[29])?$data[29]:'',
																			'item_image'=>isset($data[30])?trim($data[30]):'',
																			'item_image1'=>isset($data[31])?trim($data[31]):'',
																			'item_image2'=>isset($data[32])?trim($data[32]):'',
																			'item_image3'=>isset($data[33])?trim($data[33]):'',
																			'item_image4'=>isset($data[34])?trim($data[34]):'',
																			'item_image5'=>isset($data[35])?trim($data[35]):'',
																			'item_image6'=>isset($data[36])?trim($data[36]):'',
																			'item_image7'=>isset($data[37])?trim($data[37]):'',
																			'seller_location_area'=>$seller_location['area'],																	'seller_location_area'=>$seller_location['area'],
																			'created_at'=>date('Y-m-d H:i:s'),
																			'name' => isset($data[1])?$data[1]:'',
																			'seller_id' => $this->session->userdata('seller_id'),  
																			);
																		//echo '<pre>';print_r($adddetails);exit;
																			$results=$this->products_model->save_prodcts($adddetails);
																				if(count($results)>0){
																					
																					$des=array(isset($data[6])?$data[6]:'',isset($data[8])?$data[8]:'',isset($data[10])?$data[10]:'',isset($data[12])?$data[12]:'');
																					$img=array(isset($data[7])?$data[7]:'',isset($data[9])?$data[9]:'',isset($data[11])?$data[11]:'',isset($data[13])?$data[13]:'');
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
								
								
							}else if($post['subcategory_ids']==239){
								
										if(substr($_FILES['categoryfile']['name'], 0, 10)=='projectors'){
											
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

																//echo "<pre>";print_r($post);exit;
																foreach($arry as $key=>$fields)
																{
																		if(isset($fields[1]) && $fields[1]!='' && $fields[2]!='' && $fields[3]!=''){
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
																		
																		
																 }else{
																	 $this->session->set_flashdata('error','fields are missing check once again');
																	 redirect('/seller/products/create');
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
																//echo '<pre>';print_r($data);exit;
																	$discount1= ($data[2]-$data[3]);
																	$discount= number_format($discount1, 2);
																	$offers1= (($discount) /$data[3])*100;
																	$offers= number_format($offers1, 2);
																	
																	$adddetails=array(
																			'category_id' => $post['category_ids'],			
																			'subcategory_id' =>$post['subcategory_ids'],
																			'subitemid' =>isset($post['subitemids'])?$post['subitemids']:'',
																			'itemwise_id' => isset($post['subitemwiseitemid'])?$post['subitemwiseitemid']:'',
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
																			'portable' =>isset($data[20])?$data[20]:'',
																			'maximumbrightness' =>isset($data[21])?$data[21]:'',
																			'projectionratio' =>isset($data[22])?$data[22]:'',
																			'contrastratio' =>isset($data[23])?$data[23]:'',
																			'model_name' =>isset($data[24])?$data[24]:'',
																			'model_id' =>isset($data[25])?$data[25]:'',
																			'outputperspeaker' =>isset($data[26])?$data[26]:'',
																			'powersupply' =>isset($data[27])?$data[27]:'',
																			'powerconsumption' =>isset($data[28])?$data[28]:'',
																			'minopertingtemperature' =>isset($data[29])?$data[29]:'',
																			'maxopertingtemperature' =>isset($data[30])?$data[30]:'',
																			'remotecontrol' =>isset($data[31])?$data[31]:'',
																			'weight' =>isset($data[32])?$data[332]:'',
																			'insales_package' =>isset($data[33])?$data[33]:'',
																			'item_image'=>isset($data[34])?trim($data[34]):'',
																			'item_image1'=>isset($data[35])?trim($data[35]):'',
																			'item_image2'=>isset($data[36])?trim($data[36]):'',
																			'item_image3'=>isset($data[37])?trim($data[37]):'',
																			'item_image4'=>isset($data[38])?trim($data[38]):'',
																			'item_image5'=>isset($data[39])?trim($data[39]):'',
																			'item_image6'=>isset($data[40])?trim($data[40]):'',
																			'item_image7'=>isset($data[41])?trim($data[41]):'',
																			'seller_location_area'=>$seller_location['area'],																	'seller_location_area'=>$seller_location['area'],
																			'created_at'=>date('Y-m-d H:i:s'),
																			'name' => isset($data[1])?$data[1]:'',
																			'seller_id' => $this->session->userdata('seller_id'),  
																			);
																		//echo '<pre>';print_r($adddetails);exit;
																			$results=$this->products_model->save_prodcts($adddetails);
																				if(count($results)>0){
																					
																					$des=array(isset($data[6])?$data[6]:'',isset($data[8])?$data[8]:'',isset($data[10])?$data[10]:'',isset($data[12])?$data[12]:'');
																					$img=array(isset($data[7])?$data[7]:'',isset($data[9])?$data[9]:'',isset($data[11])?$data[11]:'',isset($data[13])?$data[13]:'');
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
								
								
							}else {
								
										if(substr($_FILES['categoryfile']['name'], 0, 9)=='allfields'){
											
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

																//echo "<pre>";print_r($post);exit;
																foreach($arry as $key=>$fields)
																{
																		if(isset($fields[1]) && $fields[1]!='' && $fields[2]!='' && $fields[3]!=''){
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
																		
																		
																 }else{
																	 $this->session->set_flashdata('error','fields are missing check once again');
																	 redirect('/seller/products/create');
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
																	$discount1= ($data[2]-$data[3]);
																	$discount= number_format($discount1, 2);
																	$offers1= (($discount) /$data[3])*100;
																	$offers= number_format($offers1, 2);
																	
																	$adddetails=array(
																			'category_id' => $post['category_ids'],			
																			'subcategory_id' =>$post['subcategory_ids'],
																			'subitemid' =>isset($post['subitemids'])?$post['subitemids']:'',
																			'itemwise_id' => isset($post['subitemwiseitemid'])?$post['subitemwiseitemid']:'',
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
																			'size' =>isset($data[20])?$data[20]:'',
																			'colour' =>isset($data[21])?$data[21]:'',
																			'type' =>isset($data[22])?$data[22]:'',
																			'weight' =>isset($data[23])?$data[23]:'',
																			'model_name' =>isset($data[24])?$data[24]:'',
																			'model_id' =>isset($data[25])?$data[25]:'',
																			'useage' =>isset($data[26])?$data[26]:'',
																			'disclaimer' =>isset($data[27])?$data[27]:'',
																			'insales_package' =>isset($data[28])?$data[28]:'',
																			'item_image'=>isset($data[29])?trim($data[29]):'',
																			'item_image1'=>isset($data[30])?trim($data[30]):'',
																			'item_image2'=>isset($data[31])?trim($data[31]):'',
																			'item_image3'=>isset($data[32])?trim($data[32]):'',
																			'item_image4'=>isset($data[33])?trim($data[33]):'',
																			'item_image5'=>isset($data[34])?trim($data[34]):'',
																			'item_image6'=>isset($data[35])?trim($data[35]):'',
																			'item_image7'=>isset($data[36])?trim($data[36]):'',
																			'seller_location_area'=>$seller_location['area'],																	'seller_location_area'=>$seller_location['area'],
																			'created_at'=>date('Y-m-d H:i:s'),
																			'name' => isset($data[1])?$data[1]:'',
																			'seller_id' => $this->session->userdata('seller_id'),  
																			);
																		//echo '<pre>';print_r($adddetails);exit;
																			$results=$this->products_model->save_prodcts($adddetails);
																				if(count($results)>0){
																					
																					$des=array(isset($data[6])?$data[6]:'',isset($data[8])?$data[8]:'',isset($data[10])?$data[10]:'',isset($data[12])?$data[12]:'');
																					$img=array(isset($data[7])?$data[7]:'',isset($data[9])?$data[9]:'',isset($data[11])?$data[11]:'',isset($data[13])?$data[13]:'');
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
								
								
							}


							
					/* subcategory data upload data*/	
		
		
			}else{
				$this->session->set_flashdata('error','Due to technical problem please try aftre some time.');
				redirect('/seller/products/create');
				
			}
			
			
		
	}	

}