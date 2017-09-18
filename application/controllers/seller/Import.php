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
		//echo substr($_FILES['categoryfile']['name'], 0, 26);exit;
			if((!empty($_FILES["categoryfile"])) && ($_FILES['categoryfile']['error'] == 0)) {

			$limitSize	= 1000000000; //(15 kb) - Maximum size of uploaded file, change it to any size you want
			$fileName	= basename($_FILES['categoryfile']['name']);
			$fileSize	= $_FILES["categoryfile"]["size"];
			$fileExt	= substr($fileName, strrpos($fileName, '.') + 1);
						
		
		
						if($post['category_ids']==18){
							if(substr($_FILES['categoryfile']['name'], 0, 16)=='foodcategoryfile'){
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
																
																$totalfields[] = $fields;
																if(empty($fields[1])) {
																	$data['errors'][]="Product name is required. Row Id is :  ".$key.'<br>';
																	$error=1;
																}else if($fields[1]!=''){
																	$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																	if(!preg_match( $regex, $fields[1]))	  	
																	{
																	$data['errors'][]='Product name wont allow "  <> []. Row Id is :  '.$key.'<br>';
																	$error=1;
																	}
																}
																if(empty($fields[2])){
																	$data['errors'][]="Sku code is required. Row Id is :  ".$key.'<br>';
																	$error=1;
																}else if($fields[2]!=''){
																	$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																	if(!preg_match( $regex, $fields[2]))	  	
																	{
																	$data['errors'][]='Sku code wont allow "  <> []. Row Id is :  '.$key.'<br>';
																	$error=1;
																	}else{
																		$result = $this->products_model->get_skuid_exists($fields[2]);
																		if(count($result)>0){
																		$data['errors'][]="Sku code already exits .please use another Sku code. Row Id is :  ".$key.'<br>';
																		$error=1;	
																		}

																	}

																}
																if($fields[3]!=''){
																	$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																	if(!preg_match( $regex, $fields[3]))	  	
																	{
																	$data['errors'][]='Other Unique code wont allow "  <> []. Row Id is :  '.$key.'<br>';
																	$error=1;
																	}
																}
																if(empty($fields[4])) {
																	$data['errors'][]="Price is required. Row Id is :  ".$key.'<br>';
																	$error=1;
																}else if($fields[4]!=''){
																	$regex ="/^[0-9.]+$/"; 
																	if(!preg_match( $regex, $fields[4]))	  	
																	{
																	$data['errors'][]='Price  can only consist of digits. Row Id is :  '.$key.'<br>';
																	$error=1;
																	}
																}
																if(empty($fields[5])) {
																	$data['errors'][]="Special Price is required. Row Id is :  ".$key.'<br>';
																	$error=1;
																}else if($fields[5]!=''){
																	$regex ="/^[0-9.]+$/"; 
																	if(!preg_match( $regex, $fields[5]))	  	
																	{
																	$data['errors'][]='Special Price  can only consist of digits. Row Id is :  '.$key.'<br>';
																	$error=1;
																	}
																}
																if($fields[6]!=''){
																	$regex ="/^[0-9.]+$/"; 
																	if(!preg_match( $regex, $fields[6]))	  	
																	{
																	$data['errors'][]='Offer can only consist of digits. Row Id is :  '.$key.'<br>';
																	$error=1;
																	}
																}
																if($fields[7]!=''){
																	$regex ="/^[0-9.]+$/"; 
																	if(!preg_match( $regex, $fields[7]))	  	
																	{
																	$data['errors'][]='Discount can only consist of digits. Row Id is :  '.$key.'<br>';
																	$error=1;
																	}
																}
																if(empty($fields[8])) {
																	$data['errors'][]="Qty is required. Row Id is :  ".$key.'<br>';
																	$error=1;
																}else if($fields[8]!=''){
																	$regex ="/^[0-9]+$/"; 
																	if(!preg_match( $regex, $fields[8]))
																	{
																	$data['errors'][]="Qty must be digits. Row Id is :  ".$key.'<br>';
																	$error=1;
																	}
																}
																if(empty($fields[9])) {
																	$data['errors'][]="Meta keywords is required. Row Id is :  ".$key.'<br>';
																	$error=1;
																}else if($fields[9]!=''){
																	$regex ="/^[a-zA-Z0-9.-_& ]+$/"; 
																	if(!preg_match( $regex, $fields[9]))	  	
																	{
																	$data['errors'][]='Meta keywords can only consist of alphanumaric, space and dot. Row Id is :  '.$key.'<br>';
																	$error=1;
																	}
																}
																if(empty($fields[10])) {
																	$data['errors'][]="Meta title is required. Row Id is :  ".$key.'<br>';
																	$error=1;
																}else if($fields[10]!=''){
																	$regex ="/^[a-zA-Z0-9.-_& ]+$/"; 
																	if(!preg_match( $regex, $fields[10]))	  	
																	{
																	$data['errors'][]='Meta title can only consist of alphanumaric, space and dot. Row Id is :  '.$key.'<br>';
																	$error=1;
																	}
																}
																if(empty($fields[11])) {
																	$data['errors'][]="Status is required. Row Id is :  ".$key;
																$error=1;
																}else if($fields[11]!=''){
																	$regex ="/^[0-1]+$/"; 
																	if(!preg_match( $regex, $fields[11]))
																	{
																	$data['errors'][]="Status must be  0 or 1. Row Id is :  ".$key.'<br>';
																	$error=1;
																	}
																}
																if(empty($fields[12])) {
																	$data['errors'][]="Product description is required. Row Id is :  ".$key;
																$error=1;
																}else if($fields[12]!=''){
																	$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																	if(!preg_match( $regex, $fields[12]))	  	
																	{
																	$data['errors'][]='Product description wont allow "  <> []. Row Id is :  '.$key.'<br>';
																	$error=1;
																	}
																}
																if(empty($fields[13])) {
																	$data['errors'][]="Sub Item is required. Row Id is :  ".$key;
																$error=1;
																}else if($fields[13]!=''){
																	$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																	if(!preg_match( $regex, $fields[13]))	  	
																	{
																	$data['errors'][]='Sub Item wont allow "  <> []. Row Id is :  '.$key.'<br>';
																	$error=1;
																	}
																}
																if(empty($fields[14])) {
																	$data['errors'][]="Cusine is required. Row Id is :  ".$key;
																$error=1;
																}else if($fields[14]!=''){
																	$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																	if(!preg_match( $regex, $fields[14]))	  	
																	{
																	$data['errors'][]='Cusine wont allow "  <> []. Row Id is :  '.$key.'<br>';
																	$error=1;
																	}
																}
																if(empty($fields[15])) {
																	$data['errors'][]="Sufficient is required. Row Id is :  ".$key.'<br>';
																	$error=1;
																}else if($fields[15]!=''){
																	$regex ="/^[0-9]+$/"; 
																	if(!preg_match( $regex, $fields[15]))
																	{
																	$data['errors'][]="Sufficient must be digits. Row Id is :  ".$key.'<br>';
																	$error=1;
																	}
																}
																if(empty($fields[16])) {
																	$data['errors'][]="Product specifications name is required. Row Id is :  ".$key;
																$error=1;
																}else if($fields[16]!=''){
																	$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																	if(!preg_match( $regex, $fields[16]))	  	
																	{
																	$data['errors'][]='Product specifications name wont allow "  <> []. Row Id is :  '.$key.'<br>';
																	$error=1;
																	}
																}
																if(empty($fields[17])) {
																	$data['errors'][]="Product specifications value is required. Row Id is :  ".$key;
																$error=1;
																}else if($fields[17]!=''){
																	$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																	if(!preg_match( $regex, $fields[17]))	  	
																	{
																	$data['errors'][]='Product specifications value wont allow "  <> []. Row Id is :  '.$key.'<br>';
																	$error=1;
																	}
																}
																if(empty($fields[18])) {
																	$data['errors'][]="Image is required. Row Id is :  ".$key;
																$error=1;
																}else if($fields[18]!=''){
																		$image_link = $fields[18];
																		$split_image1 = pathinfo($image_link);
																		$imagename=$split_image1['filename'].".".$split_image1['extension'];
																		$split_image = pathinfo($imagename,PATHINFO_EXTENSION);;
																		if($split_image != "jpg" && $split_image !="png" && $split_image != "jpeg" ) {
																		$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																		$error=1;
																		}
																	
																}
																if(isset($fields[19])&& $fields[19]!=''){
																		$img1 = $fields[19];
																		$img12 = pathinfo($img1);
																		$imagename22=$img12['filename'].".".$img12['extension'];
																		$split_image212 = pathinfo($imagename22,PATHINFO_EXTENSION);;
																		if($split_image212 != "jpg" && $split_image212 !="png" && $split_image212 != "jpeg" ) {
																		$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																		$error=1;
																		}
																	
																}
																if(isset($fields[20])&& $fields[20]!=''){
																		$img2 = $fields[20];
																		$img122 = pathinfo($img2);
																		$imagename2233=$img122['filename'].".".$img122['extension'];
																		$image3 = pathinfo($imagename2233,PATHINFO_EXTENSION);;
																		if($image3 != "jpg" && $image3 !="png" && $image3 != "jpeg" ) {
																		$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																		$error=1;
																		}
																	
																}
																if(isset($fields[21])&& $fields[21]!=''){
																		$img4 = $fields[21];
																		$img133 = pathinfo($img4);
																		$imagename5656=$img133['filename'].".".$img133['extension'];
																		$image4 = pathinfo($imagename5656,PATHINFO_EXTENSION);;
																		if($image4 != "jpg" && $image4 !="png" && $image4 != "jpeg" ) {
																		$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																		$error=1;
																		}
																	
																}
																if(isset($fields[22])&& $fields[22]!=''){
																		$image5 = $fields[22];
																		$image55 = pathinfo($image5);
																		$imagename555=$image55['filename'].".".$image55['extension'];
																		$image5555 = pathinfo($imagename555,PATHINFO_EXTENSION);;
																		if($image5555 != "jpg" && $image5555 !="png" && $image5555 != "jpeg" ) {
																		$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																		$error=1;
																		}
																	
																}
																if(isset($fields[23])&& $fields[23]!=''){
																		$image6 = $fields[23];
																		$image66 = pathinfo($image6);
																		$imagename666=$image66['filename'].".".$image66['extension'];
																		$image6666 = pathinfo($imagename666,PATHINFO_EXTENSION);;
																		if($image6666 != "jpg" && $image6666 !="png" && $image6666 != "jpeg" ) {
																		$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																		$error=1;
																		}
																	
																}
																if(isset($fields[24])&& $fields[24]!=''){
																		$image7 = $fields[24];
																		$image77 = pathinfo($image7);
																		$imagename777=$image77['filename'].".".$image77['extension'];
																		$image7777 = pathinfo($imagename777,PATHINFO_EXTENSION);;
																		if($image7777 != "jpg" && $image7777 !="png" && $image7777 != "jpeg" ) {
																		$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																		$error=1;
																		}
																	
																}
																if(isset($fields[25])&& $fields[25]!=''){
																		$image8 = $fields[25];
																		$image88 = pathinfo($image8);
																		$imagename888=$image88['filename'].".".$image88['extension'];
																		$image8888 = pathinfo($imagename888,PATHINFO_EXTENSION);;
																		if($image8888 != "jpg" && $image8888 !="png" && $image8888 != "jpeg" ) {
																		$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																		$error=1;
																		}
																	
																}
																if(isset($fields[26])&& $fields[26]!=''){
																		$image9 = $fields[26];
																		$image99 = pathinfo($image9);
																		$imagename999=$image99['filename'].".".$image99['extension'];
																		$image9999 = pathinfo($imagename999,PATHINFO_EXTENSION);;
																		if($image9999 != "jpg" && $image9999 !="png" && $image9999 != "jpeg" ) {
																		$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																		$error=1;
																		}
																	
																}
																if(isset($fields[27])&& $fields[27]!=''){
																		$image01 = $fields[27];
																		$image001 = pathinfo($image01);
																		$imagename0001=$image001['filename'].".".$image001['extension'];
																		$image00001 = pathinfo($imagename0001,PATHINFO_EXTENSION);;
																		if($image00001 != "jpg" && $image00001 !="png" && $image00001 != "jpeg" ) {
																		$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																		$error=1;
																		}
																	
																}
																if(isset($fields[28])&& $fields[28]!=''){
																		$image11 = $fields[28];
																		$image111 = pathinfo($image11);
																		$imagename1111=$image111['filename'].".".$image111['extension'];
																		$image11111 = pathinfo($imagename1111,PATHINFO_EXTENSION);;
																		if($image11111 != "jpg" && $image11111 !="png" && $image11111 != "jpeg" ) {
																		$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																		$error=1;
																		}
																		
																}
																if(isset($fields[29])&& $fields[29]!=''){
																		$image12 = $fields[29];
																		$image112 = pathinfo($image12);
																		$imagename1112=$image112['filename'].".".$image112['extension'];
																		$image11112 = pathinfo($imagename1112,PATHINFO_EXTENSION);;
																		if($image11112 != "jpg" && $image11112 !="png" && $image11112 != "jpeg" ) {
																		$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																		$error=1;
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
														$path='/home/cartinhour/public_html/uploads/products/';
														//echo '<pre>';print_r($data);exit;
															$image_link = $data[18];
															$split_image = pathinfo($image_link);
															$imagename=round(microtime(true)).$split_image['filename'].".".$split_image['extension'];
															copy($data[18], $path.$imagename);
															if(isset($data[19])&& $data[19]!=''){
																$image_link1 = $data[19];
																$split_image1 = pathinfo($image_link1);
																$imagename1=round(microtime(true)).$split_image1['filename'].".".$split_image1['extension'];
																copy($data[19], $path.$imagename1);
															}
															if(isset($data[20])&& $data[20]!=''){
																	$image_link2 = $data[20];
																	$split_image2 = pathinfo($image_link2);
																	$imagename2=round(microtime(true)).$split_image2['filename'].".".$split_image2['extension'];
																	copy($data[20], $path.$imagename2);
															}
															if(isset($data[21])&& $data[21]!=''){
																	$image_link3 = $data[21];
																	$split_image3 = pathinfo($image_link3);
																	$imagename3=round(microtime(true)).$split_image3['filename'].".".$split_image3['extension'];
																	copy($data[21], $path.$imagename3);
																	
															}
															if(isset($data[22])&& $data[22]!=''){
																	$image_link4 = $data[22];
																	$split_image4 = pathinfo($image_link4);
																	$imagename4=round(microtime(true)).$split_image4['filename'].".".$split_image4['extension'];
																	copy($data[22], $path.$imagename4);
																	
															}
															if(isset($data[23])&& $data[23]!=''){
																	$image_link5 = $data[23];
																	$split_image5 = pathinfo($image_link5);
																	$imagename5=round(microtime(true)).$split_image5['filename'].".".$split_image5['extension'];
																	copy($data[23], $path.$imagename5);
																	
															}
															if(isset($data[24])&& $data[24]!=''){
																$image_link6 = $data[24];
																$split_image6 = pathinfo($image_link6);
																$imagename6=round(microtime(true)).$split_image6['filename'].".".$split_image6['extension'];
																copy($data[24], $path.$imagename6);
															
															}
															if(isset($data[25])&& $data[25]!=''){
																$image_link7 = $data[25];
																$split_image7 = pathinfo($image_link7);
																$imagename7=round(microtime(true)).$split_image7['filename'].".".$split_image7['extension'];
																copy($data[25], $path.$imagename7);
															
															}
															if(isset($data[26])&& $data[26]!=''){
																	$image_link8 = $data[26];
																	$split_image8 = pathinfo($image_link8);
																	$imagename8=round(microtime(true)).$split_image8['filename'].".".$split_image8['extension'];
																	copy($data[26], $path.$imagename8);
																	
															}
															if(isset($data[27])&& $data[27]!=''){
																$image_link9 = $data[27];
																$split_image9 = pathinfo($image_link9);
																$imagename9=round(microtime(true)).$split_image9['filename'].".".$split_image9['extension'];
																copy($data[27], $path.$imagename9);
															}
															if(isset($data[28])&& $data[28]!=''){
																$image_link10 = $data[28];
																$split_image10 = pathinfo($image_link10);
																$imagename10=round(microtime(true)).$split_image10['filename'].".".$split_image10['extension'];
																copy($data[28], $path.$imagename10);
															
															}
															if(isset($data[29])&& $data[29]!=''){
																$image_link11 = $data[29];
																$split_image11 = pathinfo($image_link11);
																$imagename11=round(microtime(true)).$split_image11['filename'].".".$split_image11['extension'];
																copy($data[29], $path.$imagename11);
																
															}
															
															$adddetails=array(
																	'category_id' => $post['category_ids'],			
																	'subcategory_id' =>$post['subcategory_ids'],
																	'seller_id' =>$this->session->userdata('seller_id'), 
																	'item_name' => $data[1],
																	'skuid' => $data[2],
																	'item_code' => $data[3],
																	'item_cost' => $data[4],
																	'special_price' => $data[5],
																	'offers' =>$data[6],
																	'discount' =>$data[7],
																	'item_quantity' =>$data[8],
																	'keywords' =>$data[9],
																	'title' =>$data[10],
																	'item_status' => $data[11],
																	'item_description' =>$data[12],
																	'item_sub_name' =>$data[13],
																	'cusine' =>$data[14],
																	'sufficient_for' =>$data[15],
																	'item_image'=>isset($imagename)?$imagename:'',
																	'item_image1'=>isset($imagename1)?$imagename1:'',
																	'item_image2'=>isset($imagename2)?$imagename2:'',
																	'item_image3'=>isset($imagename3)?$imagename3:'',
																	'item_image4'=>isset($imagename4)?$imagename4:'',
																	'item_image5'=>isset($imagename5)?$imagename5:'',
																	'item_image6'=>isset($imagename6)?$imagename6:'',
																	'item_image7'=>isset($imagename7)?$imagename7:'',
																	'item_image8'=>isset($imagename8)?$imagename8:'',
																	'item_image9'=>isset($imagename9)?$imagename9:'',
																	'item_image10'=>isset($imagename10)?$imagename10:'',
																	'item_image11'=>isset($imagename11)?$imagename11:'',
																	'seller_location_area'=>$seller_location['area'],
																	'created_at'=>date('Y-m-d H:i:s'),

																);
																//echo '<pre>';print_r($adddetails);exit;
																	$results=$this->products_model->save_prodcts($adddetails);
																		if(count($results)>0){
																				/* for spcification purpose*/
																				$arr1=explode(",",$data[16]);
																				$arr2=explode(",",$data[17]);
																				foreach (array_combine($arr1,$arr2) as $key=>$list){
																					if($list!='' && $key!=''){
																					$addspc=array(
																					'item_id' =>$results,
																					'spc_name' => $key,
																					'spc_value' => $list,
																					'create_at' => date('Y-m-d H:i:s'),
																					);
																					$this->products_model->insert_product_spcifications($addspc);
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

														//echo "<pre>";print_r($arry);exit;
														foreach($arry as $key=>$fields)
														{
																
																$totalfields[] = $fields;
																if(empty($fields[1])) {
																	$data['errors'][]="Product name is required. Row Id is :  ".$key.'<br>';
																	$error=1;
																}else if($fields[1]!=''){
																	$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																	if(!preg_match( $regex, $fields[1]))	  	
																	{
																	$data['errors'][]='Product name wont allow "  <> []. Row Id is :  '.$key.'<br>';
																	$error=1;
																	}
																}
																if(empty($fields[2])){
																	$data['errors'][]="Sku code is required. Row Id is :  ".$key.'<br>';
																	$error=1;
																}else if($fields[2]!=''){
																	$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																	if(!preg_match( $regex, $fields[2]))	  	
																	{
																	$data['errors'][]='Sku code wont allow "  <> []. Row Id is :  '.$key.'<br>';
																	$error=1;
																	}else{
																		$result = $this->products_model->get_skuid_exists($fields[2]);
																		if(count($result)>0){
																		$data['errors'][]="Sku code already exits .please use another Sku code. Row Id is :  ".$key.'<br>';
																		$error=1;	
																		}

																	}

																}
																if(empty($fields[3])) {
																	$data['errors'][]="Other Unique code is required. Row Id is :  ".$key.'<br>';
																	$error=1;
																}else if($fields[3]!=''){
																	$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																	if(!preg_match( $regex, $fields[3]))	  	
																	{
																	$data['errors'][]='Other Unique code wont allow "  <> []. Row Id is :  '.$key.'<br>';
																	$error=1;
																	}
																}
																if(empty($fields[4])) {
																	$data['errors'][]="Price is required. Row Id is :  ".$key.'<br>';
																	$error=1;
																}else if($fields[4]!=''){
																	$regex ="/^[0-9.]+$/"; 
																	if(!preg_match( $regex, $fields[4]))	  	
																	{
																	$data['errors'][]='Price  can only consist of digits. Row Id is :  '.$key.'<br>';
																	$error=1;
																	}
																}
																if(empty($fields[5])) {
																	$data['errors'][]="Special Price is required. Row Id is :  ".$key.'<br>';
																	$error=1;
																}else if($fields[5]!=''){
																	$regex ="/^[0-9.]+$/"; 
																	if(!preg_match( $regex, $fields[5]))	  	
																	{
																	$data['errors'][]='Special Price  can only consist of digits. Row Id is :  '.$key.'<br>';
																	$error=1;
																	}
																}
																if($fields[6]!=''){
																	$regex ="/^[0-9.]+$/"; 
																	if(!preg_match( $regex, $fields[6]))	  	
																	{
																	$data['errors'][]='Offer can only consist of digits. Row Id is :  '.$key.'<br>';
																	$error=1;
																	}
																}
																if($fields[7]!=''){
																	$regex ="/^[0-9.]+$/"; 
																	if(!preg_match( $regex, $fields[7]))	  	
																	{
																	$data['errors'][]='Discount can only consist of digits. Row Id is :  '.$key.'<br>';
																	$error=1;
																	}
																}
																if(empty($fields[8])) {
																	$data['errors'][]="Qty is required. Row Id is :  ".$key.'<br>';
																	$error=1;
																}else if($fields[8]!=''){
																	$regex ="/^[0-9]+$/"; 
																	if(!preg_match( $regex, $fields[8]))
																	{
																	$data['errors'][]="Qty must be digits. Row Id is :  ".$key.'<br>';
																	$error=1;
																	}
																}
																if(empty($fields[9])) {
																	$data['errors'][]="Meta keywords is required. Row Id is :  ".$key.'<br>';
																	$error=1;
																}else if($fields[9]!=''){
																	$regex ="/^[a-zA-Z0-9.-_& ]+$/"; 
																	if(!preg_match( $regex, $fields[9]))	  	
																	{
																	$data['errors'][]='Meta keywords can only consist of alphanumaric, space and dot. Row Id is :  '.$key.'<br>';
																	$error=1;
																	}
																}
																if(empty($fields[10])) {
																	$data['errors'][]="Meta title is required. Row Id is :  ".$key.'<br>';
																	$error=1;
																}else if($fields[10]!=''){
																	$regex ="/^[a-zA-Z0-9.-_& ]+$/"; 
																	if(!preg_match( $regex, $fields[10]))	  	
																	{
																	$data['errors'][]='Meta title can only consist of alphanumaric, space and dot. Row Id is :  '.$key.'<br>';
																	$error=1;
																	}
																}
																if(empty($fields[11])) {
																	$data['errors'][]="Status is required. Row Id is :  ".$key;
																$error=1;
																}else if($fields[11]!=''){
																	$regex ="/^[0-1]+$/"; 
																	if(!preg_match( $regex, $fields[11]))
																	{
																	$data['errors'][]="Status must be  0 or 1. Row Id is :  ".$key.'<br>';
																	$error=1;
																	}
																}
																if(empty($fields[12])) {
																	$data['errors'][]="Product description is required. Row Id is :  ".$key;
																$error=1;
																}else if($fields[12]!=''){
																	$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																	if(!preg_match( $regex, $fields[12]))	  	
																	{
																	$data['errors'][]='Product description wont allow "  <> []. Row Id is :  '.$key.'<br>';
																	$error=1;
																	}
																}
																if(empty($fields[13])) {
																	$data['errors'][]="Sub Item is required. Row Id is :  ".$key;
																$error=1;
																}else if($fields[13]!=''){
																	$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																	if(!preg_match( $regex, $fields[13]))	  	
																	{
																	$data['errors'][]='Sub Item wont allow "  <> []. Row Id is :  '.$key.'<br>';
																	$error=1;
																	}
																}
																if(empty($fields[14])) {
																	$data['errors'][]="Brand is required. Row Id is :  ".$key;
																$error=1;
																}else if($fields[14]!=''){
																	$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																	if(!preg_match( $regex, $fields[14]))	  	
																	{
																	$data['errors'][]='Brand wont allow "  <> []. Row Id is :  '.$key.'<br>';
																	$error=1;
																	}
																}
																if(empty($fields[15])) {
																	$data['errors'][]="Sizes is required. Row Id is :  ".$key.'<br>';
																	$error=1;
																}else if($fields[15]!=''){
																	$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																	if(!preg_match( $regex, $fields[15]))
																	{
																	$data['errors'][]="Sizes wont allow   <> []. Row Id is :  ".$key.'<br>';
																	$error=1;
																	}
																}
																if(empty($fields[16])) {
																	$data['errors'][]="Product specifications name is required. Row Id is :  ".$key;
																$error=1;
																}else if($fields[16]!=''){
																	$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																	if(!preg_match( $regex, $fields[16]))	  	
																	{
																	$data['errors'][]='Product specifications name wont allow "  <> []. Row Id is :  '.$key.'<br>';
																	$error=1;
																	}
																}
																if(empty($fields[17])) {
																	$data['errors'][]="Product specifications value is required. Row Id is :  ".$key;
																$error=1;
																}else if($fields[17]!=''){
																	$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																	if(!preg_match( $regex, $fields[17]))	  	
																	{
																	$data['errors'][]='Product specifications value wont allow "  <> []. Row Id is :  '.$key.'<br>';
																	$error=1;
																	}
																}
																if(empty($fields[18])) {
																	$data['errors'][]="Image is required. Row Id is :  ".$key;
																$error=1;
																}else if($fields[18]!=''){
																		$image_link = $fields[18];
																		$split_image1 = pathinfo($image_link);
																		$imagename=$split_image1['filename'].".".$split_image1['extension'];
																		$split_image = pathinfo($imagename,PATHINFO_EXTENSION);;
																		if($split_image != "jpg" && $split_image !="png" && $split_image != "jpeg" ) {
																		$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																		$error=1;
																		}
																	
																}
																if(isset($fields[19])&& $fields[19]!=''){
																		$img1 = $fields[19];
																		$img12 = pathinfo($img1);
																		$imagename22=$img12['filename'].".".$img12['extension'];
																		$split_image212 = pathinfo($imagename22,PATHINFO_EXTENSION);;
																		if($split_image212 != "jpg" && $split_image212 !="png" && $split_image212 != "jpeg" ) {
																		$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																		$error=1;
																		}
																	
																}
																if(isset($fields[20])&& $fields[20]!=''){
																		$img2 = $fields[20];
																		$img122 = pathinfo($img2);
																		$imagename2233=$img122['filename'].".".$img122['extension'];
																		$image3 = pathinfo($imagename2233,PATHINFO_EXTENSION);;
																		if($image3 != "jpg" && $image3 !="png" && $image3 != "jpeg" ) {
																		$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																		$error=1;
																		}
																	
																}
																if(isset($fields[21])&& $fields[21]!=''){
																		$img4 = $fields[21];
																		$img133 = pathinfo($img4);
																		$imagename5656=$img133['filename'].".".$img133['extension'];
																		$image4 = pathinfo($imagename5656,PATHINFO_EXTENSION);;
																		if($image4 != "jpg" && $image4 !="png" && $image4 != "jpeg" ) {
																		$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																		$error=1;
																		}
																	
																}
																if(isset($fields[22])&& $fields[22]!=''){
																		$image5 = $fields[22];
																		$image55 = pathinfo($image5);
																		$imagename555=$image55['filename'].".".$image55['extension'];
																		$image5555 = pathinfo($imagename555,PATHINFO_EXTENSION);;
																		if($image5555 != "jpg" && $image5555 !="png" && $image5555 != "jpeg" ) {
																		$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																		$error=1;
																		}
																	
																}
																if(isset($fields[23])&& $fields[23]!=''){
																		$image6 = $fields[23];
																		$image66 = pathinfo($image6);
																		$imagename666=$image66['filename'].".".$image66['extension'];
																		$image6666 = pathinfo($imagename666,PATHINFO_EXTENSION);;
																		if($image6666 != "jpg" && $image6666 !="png" && $image6666 != "jpeg" ) {
																		$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																		$error=1;
																		}
																	
																}
																if(isset($fields[24])&& $fields[24]!=''){
																		$image7 = $fields[24];
																		$image77 = pathinfo($image7);
																		$imagename777=$image77['filename'].".".$image77['extension'];
																		$image7777 = pathinfo($imagename777,PATHINFO_EXTENSION);;
																		if($image7777 != "jpg" && $image7777 !="png" && $image7777 != "jpeg" ) {
																		$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																		$error=1;
																		}
																	
																}
																if(isset($fields[25])&& $fields[25]!=''){
																		$image8 = $fields[25];
																		$image88 = pathinfo($image8);
																		$imagename888=$image88['filename'].".".$image88['extension'];
																		$image8888 = pathinfo($imagename888,PATHINFO_EXTENSION);;
																		if($image8888 != "jpg" && $image8888 !="png" && $image8888 != "jpeg" ) {
																		$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																		$error=1;
																		}
																	
																}
																if(isset($fields[26])&& $fields[26]!=''){
																		$image9 = $fields[26];
																		$image99 = pathinfo($image9);
																		$imagename999=$image99['filename'].".".$image99['extension'];
																		$image9999 = pathinfo($imagename999,PATHINFO_EXTENSION);;
																		if($image9999 != "jpg" && $image9999 !="png" && $image9999 != "jpeg" ) {
																		$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																		$error=1;
																		}
																	
																}
																if(isset($fields[27])&& $fields[27]!=''){
																		$image01 = $fields[27];
																		$image001 = pathinfo($image01);
																		$imagename0001=$image001['filename'].".".$image001['extension'];
																		$image00001 = pathinfo($imagename0001,PATHINFO_EXTENSION);;
																		if($image00001 != "jpg" && $image00001 !="png" && $image00001 != "jpeg" ) {
																		$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																		$error=1;
																		}
																	
																}
																if(isset($fields[28])&& $fields[28]!=''){
																		$image11 = $fields[28];
																		$image111 = pathinfo($image11);
																		$imagename1111=$image111['filename'].".".$image111['extension'];
																		$image11111 = pathinfo($imagename1111,PATHINFO_EXTENSION);;
																		if($image11111 != "jpg" && $image11111 !="png" && $image11111 != "jpeg" ) {
																		$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																		$error=1;
																		}
																		
																}
																if(isset($fields[29])&& $fields[29]!=''){
																		$image12 = $fields[29];
																		$image112 = pathinfo($image12);
																		$imagename1112=$image112['filename'].".".$image112['extension'];
																		$image11112 = pathinfo($imagename1112,PATHINFO_EXTENSION);;
																		if($image11112 != "jpg" && $image11112 !="png" && $image11112 != "jpeg" ) {
																		$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																		$error=1;
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
														$path='/home/cartinhour/public_html/uploads/products/';
														//echo '<pre>';print_r($data);exit;
															$image_link = $data[18];
															$split_image = pathinfo($image_link);
															$imagename=round(microtime(true)).$split_image['filename'].".".$split_image['extension'];
															copy($data[18], $path.$imagename);
															if(isset($data[19])&& $data[19]!=''){
																$image_link1 = $data[19];
																$split_image1 = pathinfo($image_link1);
																$imagename1=round(microtime(true)).$split_image1['filename'].".".$split_image1['extension'];
																copy($data[19], $path.$imagename1);
															}
															if(isset($data[20])&& $data[20]!=''){
																	$image_link2 = $data[20];
																	$split_image2 = pathinfo($image_link2);
																	$imagename2=round(microtime(true)).$split_image2['filename'].".".$split_image2['extension'];
																	copy($data[20], $path.$imagename2);
															}
															if(isset($data[21])&& $data[21]!=''){
																	$image_link3 = $data[21];
																	$split_image3 = pathinfo($image_link3);
																	$imagename3=round(microtime(true)).$split_image3['filename'].".".$split_image3['extension'];
																	copy($data[21], $path.$imagename3);
																	
															}
															if(isset($data[22])&& $data[22]!=''){
																	$image_link4 = $data[22];
																	$split_image4 = pathinfo($image_link4);
																	$imagename4=round(microtime(true)).$split_image4['filename'].".".$split_image4['extension'];
																	copy($data[22], $path.$imagename4);
																	
															}
															if(isset($data[23])&& $data[23]!=''){
																	$image_link5 = $data[23];
																	$split_image5 = pathinfo($image_link5);
																	$imagename5=round(microtime(true)).$split_image5['filename'].".".$split_image5['extension'];
																	copy($data[23], $path.$imagename5);
																	
															}
															if(isset($data[24])&& $data[24]!=''){
																$image_link6 = $data[24];
																$split_image6 = pathinfo($image_link6);
																$imagename6=round(microtime(true)).$split_image6['filename'].".".$split_image6['extension'];
																copy($data[24], $path.$imagename6);
															
															}
															if(isset($data[25])&& $data[25]!=''){
																$image_link7 = $data[25];
																$split_image7 = pathinfo($image_link7);
																$imagename7=round(microtime(true)).$split_image7['filename'].".".$split_image7['extension'];
																copy($data[25], $path.$imagename7);
															
															}
															if(isset($data[26])&& $data[26]!=''){
																	$image_link8 = $data[26];
																	$split_image8 = pathinfo($image_link8);
																	$imagename8=round(microtime(true)).$split_image8['filename'].".".$split_image8['extension'];
																	copy($data[26], $path.$imagename8);
																	
															}
															if(isset($data[27])&& $data[27]!=''){
																$image_link9 = $data[27];
																$split_image9 = pathinfo($image_link9);
																$imagename9=round(microtime(true)).$split_image9['filename'].".".$split_image9['extension'];
																copy($data[27], $path.$imagename9);
															}
															if(isset($data[28])&& $data[28]!=''){
																$image_link10 = $data[28];
																$split_image10 = pathinfo($image_link10);
																$imagename10=round(microtime(true)).$split_image10['filename'].".".$split_image10['extension'];
																copy($data[28], $path.$imagename10);
															
															}
															if(isset($data[29])&& $data[29]!=''){
																$image_link11 = $data[29];
																$split_image11 = pathinfo($image_link11);
																$imagename11=round(microtime(true)).$split_image11['filename'].".".$split_image11['extension'];
																copy($data[29], $path.$imagename11);
																
															}
															
															$adddetails=array(
																	'category_id' => $post['category_ids'],			
																	'subcategory_id' =>$post['subcategory_ids'],
																	'seller_id' =>$this->session->userdata('seller_id'), 
																	'item_name' => $data[1],
																	'skuid' => $data[2],
																	'item_code' => $data[3],
																	'item_cost' => $data[4],
																	'special_price' => $data[5],
																	'offers' =>$data[6],
																	'discount' =>$data[7],
																	'item_quantity' =>$data[8],
																	'keywords' =>$data[9],
																	'title' =>$data[10],
																	'item_status' => $data[11],
																	'item_description' =>$data[12],
																	'item_sub_name' =>$data[13],
																	'brand' =>$data[14],
																	'item_image'=>isset($imagename)?$imagename:'',
																	'item_image1'=>isset($imagename1)?$imagename1:'',
																	'item_image2'=>isset($imagename2)?$imagename2:'',
																	'item_image3'=>isset($imagename3)?$imagename3:'',
																	'item_image4'=>isset($imagename4)?$imagename4:'',
																	'item_image5'=>isset($imagename5)?$imagename5:'',
																	'item_image6'=>isset($imagename6)?$imagename6:'',
																	'item_image7'=>isset($imagename7)?$imagename7:'',
																	'item_image8'=>isset($imagename8)?$imagename8:'',
																	'item_image9'=>isset($imagename9)?$imagename9:'',
																	'item_image10'=>isset($imagename10)?$imagename10:'',
																	'item_image11'=>isset($imagename11)?$imagename11:'',
																	'seller_location_area'=>$seller_location['area'],
																	'created_at'=>date('Y-m-d H:i:s'),

																);
																//echo '<pre>';print_r($adddetails);exit;
																	$results=$this->products_model->save_prodcts($adddetails);
																		if(count($results)>0){
																				/* for spcification purpose*/
																				$arr1=explode(",",$data[16]);
																				$arr2=explode(",",$data[17]);
																				foreach (array_combine($arr1,$arr2) as $key=>$list){
																					if($list!='' && $key!=''){
																					$addspc=array(
																					'item_id' =>$results,
																					'spc_name' => $key,
																					'spc_value' => $list,
																					'create_at' => date('Y-m-d H:i:s'),
																					);
																					$this->products_model->insert_product_spcifications($addspc);
																					}
																				}
																				/* for spcification purpose*/
																				/* for size purpose*/
																				foreach(explode(",",$data[15]) as $listsizes){
																				if($listsizes !=''){
																					$addsizesdata=array(
																					'item_id' =>$results,
																					'p_size_name' => $listsizes,
																					'create_at' => date('Y-m-d H:i:s'),
																					);
																					$this->products_model->insert_product_sizes($addsizesdata);
																					}
																				}
																				/* for size purpose*/
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
							
							
						}else if($post['category_ids']==20){
							
							if($post['subcategory_ids']==31 || $post['subcategory_ids']==32 || $post['subcategory_ids']==33 || $post['subcategory_ids']==37 || $post['subcategory_ids']==38){
								
									if(substr($_FILES['categoryfile']['name'], 0, 22)=='Electroniccategoryfile'){
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
																	
																	$totalfields[] = $fields;
																	if(empty($fields[1])) {
																		$data['errors'][]="Product name is required. Row Id is :  ".$key.'<br>';
																		$error=1;
																	}else if($fields[1]!=''){
																		$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																		if(!preg_match( $regex, $fields[1]))	  	
																		{
																		$data['errors'][]='Product name wont allow "  <> []. Row Id is :  '.$key.'<br>';
																		$error=1;
																		}
																	}
																	if(empty($fields[2])){
																		$data['errors'][]="Sku code is required. Row Id is :  ".$key.'<br>';
																		$error=1;
																	}else if($fields[2]!=''){
																		$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																		if(!preg_match( $regex, $fields[2]))	  	
																		{
																		$data['errors'][]='Sku code wont allow "  <> []. Row Id is :  '.$key.'<br>';
																		$error=1;
																		}else{
																			$result = $this->products_model->get_skuid_exists($fields[2]);
																			if(count($result)>0){
																			$data['errors'][]="Sku code already exits .please use another Sku code. Row Id is :  ".$key.'<br>';
																			$error=1;	
																			}

																		}

																	}
																	if(isset($data[3])&& $data[3]!=''){
																		$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																		if(!preg_match( $regex, $fields[3]))	  	
																		{
																		$data['errors'][]='Other Unique code wont allow "  <> []. Row Id is :  '.$key.'<br>';
																		$error=1;
																		}
																	}
																	if(empty($fields[4])) {
																		$data['errors'][]="Price is required. Row Id is :  ".$key.'<br>';
																		$error=1;
																	}else if($fields[4]!=''){
																		$regex ="/^[0-9.]+$/"; 
																		if(!preg_match( $regex, $fields[4]))	  	
																		{
																		$data['errors'][]='Price  can only consist of digits. Row Id is :  '.$key.'<br>';
																		$error=1;
																		}
																	}
																	if(empty($fields[5])) {
																		$data['errors'][]="Special Price is required. Row Id is :  ".$key.'<br>';
																		$error=1;
																	}else if($fields[5]!=''){
																		$regex ="/^[0-9.]+$/"; 
																		if(!preg_match( $regex, $fields[5]))	  	
																		{
																		$data['errors'][]='Special Price  can only consist of digits. Row Id is :  '.$key.'<br>';
																		$error=1;
																		}
																	}
																	if($fields[5]>=$fields[4]){
																		$data['errors'][]="special price must be between 1 and".$fields[4].". Row Id is :  ".$key.'<br>';
																		$error=1;	
																	}
																	if(isset($data[6])&& $data[6]!=''){
																		$regex ="/^[0-9.]+$/"; 
																		if(!preg_match( $regex, $fields[6]))	  	
																		{
																		$data['errors'][]='Offer can only consist of digits. Row Id is :  '.$key.'<br>';
																		$error=1;
																		}
																	}
																	if(isset($data[7])&& $data[7]!=''){
																		$regex ="/^[0-9.]+$/"; 
																		if(!preg_match( $regex, $fields[7]))	  	
																		{
																		$data['errors'][]='Discount can only consist of digits. Row Id is :  '.$key.'<br>';
																		$error=1;
																		}
																	}
																	if(empty($fields[8])) {
																		$data['errors'][]="Qty is required. Row Id is :  ".$key.'<br>';
																		$error=1;
																	}else if($fields[8]!=''){
																		$regex ="/^[0-9]+$/"; 
																		if(!preg_match( $regex, $fields[8]))
																		{
																		$data['errors'][]="Qty must be digits. Row Id is :  ".$key.'<br>';
																		$error=1;
																		}
																	}
																	if(isset($data[9])&& $data[9]!=''){
																		$regex ="/^[a-zA-Z0-9.-_& ]+$/"; 
																		if(!preg_match( $regex, $fields[9]))	  	
																		{
																		$data['errors'][]='Meta keywords can only consist of alphanumaric, space and dot. Row Id is :  '.$key.'<br>';
																		$error=1;
																		}
																	}
																	if(isset($data[10])&& $data[10]!=''){
																		$regex ="/^[a-zA-Z0-9.-_& ]+$/"; 
																		if(!preg_match( $regex, $fields[10]))	  	
																		{
																		$data['errors'][]='Meta title can only consist of alphanumaric, space and dot. Row Id is :  '.$key.'<br>';
																		$error=1;
																		}
																	}
																	if(empty($fields[11])) {
																		$data['errors'][]="Status is required. Row Id is :  ".$key;
																	$error=1;
																	}else if($fields[11]!=''){
																		$regex ="/^[0-1]+$/"; 
																		if(!preg_match( $regex, $fields[11]))
																		{
																		$data['errors'][]="Status must be  0 or 1. Row Id is :  ".$key.'<br>';
																		$error=1;
																		}
																	}
																	if(empty($fields[12])) {
																		$data['errors'][]="Product description is required. Row Id is :  ".$key;
																	$error=1;
																	}else if($fields[12]!=''){
																		$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																		if(!preg_match( $regex, $fields[12]))	  	
																		{
																		$data['errors'][]='Product description wont allow "  <> []. Row Id is :  '.$key.'<br>';
																		$error=1;
																		}
																	}
																	if(empty($fields[13])) {
																		$data['errors'][]="Sub Item is required. Row Id is :  ".$key;
																	$error=1;
																	}else if($fields[13]!=''){
																		$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																		if(!preg_match( $regex, $fields[13]))	  	
																		{
																		$data['errors'][]='Sub Item wont allow "  <> []. Row Id is :  '.$key.'<br>';
																		$error=1;
																		}
																	}
																	if(empty($fields[14])) {
																		$data['errors'][]="Brand is required. Row Id is :  ".$key;
																	$error=1;
																	}else if($fields[14]!=''){
																		$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																		if(!preg_match( $regex, $fields[14]))	  	
																		{
																		$data['errors'][]='Brand wont allow "  <> []. Row Id is :  '.$key.'<br>';
																		$error=1;
																		}
																	}
																	if(isset($data[15])&& $data[15]!=''){
																		$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																		if(!preg_match( $regex, $fields[15]))
																		{
																		$data['errors'][]="Ideal for wont allow   <> []. Row Id is :  ".$key.'<br>';
																		$error=1;
																		}
																	}
																	if(empty($fields[16])) {
																		$data['errors'][]="Product specifications name is required. Row Id is :  ".$key;
																	$error=1;
																	}else if($fields[16]!=''){
																		$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																		if(!preg_match( $regex, $fields[16]))	  	
																		{
																		$data['errors'][]='Product specifications name wont allow "  <> []. Row Id is :  '.$key.'<br>';
																		$error=1;
																		}
																	}
																	if(empty($fields[17])) {
																		$data['errors'][]="Product specifications value is required. Row Id is :  ".$key;
																	$error=1;
																	}else if($fields[17]!=''){
																		$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																		if(!preg_match( $regex, $fields[17]))	  	
																		{
																		$data['errors'][]='Product specifications value wont allow "  <> []. Row Id is :  '.$key.'<br>';
																		$error=1;
																		}
																	}
																	if(empty($fields[18])) {
																		$data['errors'][]="Image is required. Row Id is :  ".$key;
																	$error=1;
																	}else if($fields[18]!=''){
																			$image_link = $fields[18];
																			$split_image1 = pathinfo($image_link);
																			$imagename=$split_image1['filename'].".".$split_image1['extension'];
																			$split_image = pathinfo($imagename,PATHINFO_EXTENSION);;
																			if($split_image != "jpg" && $split_image !="png" && $split_image != "jpeg" ) {
																			$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		
																	}
																	if(isset($fields[19])&& $fields[19]!=''){
																			$img1 = $fields[19];
																			$img12 = pathinfo($img1);
																			$imagename22=$img12['filename'].".".$img12['extension'];
																			$split_image212 = pathinfo($imagename22,PATHINFO_EXTENSION);;
																			if($split_image212 != "jpg" && $split_image212 !="png" && $split_image212 != "jpeg" ) {
																			$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		
																	}
																	if(isset($fields[20])&& $fields[20]!=''){
																			$img2 = $fields[20];
																			$img122 = pathinfo($img2);
																			$imagename2233=$img122['filename'].".".$img122['extension'];
																			$image3 = pathinfo($imagename2233,PATHINFO_EXTENSION);;
																			if($image3 != "jpg" && $image3 !="png" && $image3 != "jpeg" ) {
																			$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		
																	}
																	if(isset($fields[21])&& $fields[21]!=''){
																			$img4 = $fields[21];
																			$img133 = pathinfo($img4);
																			$imagename5656=$img133['filename'].".".$img133['extension'];
																			$image4 = pathinfo($imagename5656,PATHINFO_EXTENSION);;
																			if($image4 != "jpg" && $image4 !="png" && $image4 != "jpeg" ) {
																			$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		
																	}
																	if(isset($fields[22])&& $fields[22]!=''){
																			$image5 = $fields[22];
																			$image55 = pathinfo($image5);
																			$imagename555=$image55['filename'].".".$image55['extension'];
																			$image5555 = pathinfo($imagename555,PATHINFO_EXTENSION);;
																			if($image5555 != "jpg" && $image5555 !="png" && $image5555 != "jpeg" ) {
																			$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		
																	}
																	if(isset($fields[23])&& $fields[23]!=''){
																			$image6 = $fields[23];
																			$image66 = pathinfo($image6);
																			$imagename666=$image66['filename'].".".$image66['extension'];
																			$image6666 = pathinfo($imagename666,PATHINFO_EXTENSION);;
																			if($image6666 != "jpg" && $image6666 !="png" && $image6666 != "jpeg" ) {
																			$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		
																	}
																	if(isset($fields[24])&& $fields[24]!=''){
																			$image7 = $fields[24];
																			$image77 = pathinfo($image7);
																			$imagename777=$image77['filename'].".".$image77['extension'];
																			$image7777 = pathinfo($imagename777,PATHINFO_EXTENSION);;
																			if($image7777 != "jpg" && $image7777 !="png" && $image7777 != "jpeg" ) {
																			$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		
																	}
																	if(isset($fields[25])&& $fields[25]!=''){
																			$image8 = $fields[25];
																			$image88 = pathinfo($image8);
																			$imagename888=$image88['filename'].".".$image88['extension'];
																			$image8888 = pathinfo($imagename888,PATHINFO_EXTENSION);;
																			if($image8888 != "jpg" && $image8888 !="png" && $image8888 != "jpeg" ) {
																			$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		
																	}
																	if(isset($fields[26])&& $fields[26]!=''){
																			$image9 = $fields[26];
																			$image99 = pathinfo($image9);
																			$imagename999=$image99['filename'].".".$image99['extension'];
																			$image9999 = pathinfo($imagename999,PATHINFO_EXTENSION);;
																			if($image9999 != "jpg" && $image9999 !="png" && $image9999 != "jpeg" ) {
																			$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		
																	}
																	if(isset($fields[27])&& $fields[27]!=''){
																			$image01 = $fields[27];
																			$image001 = pathinfo($image01);
																			$imagename0001=$image001['filename'].".".$image001['extension'];
																			$image00001 = pathinfo($imagename0001,PATHINFO_EXTENSION);;
																			if($image00001 != "jpg" && $image00001 !="png" && $image00001 != "jpeg" ) {
																			$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		
																	}
																	if(isset($fields[28])&& $fields[28]!=''){
																			$image11 = $fields[28];
																			$image111 = pathinfo($image11);
																			$imagename1111=$image111['filename'].".".$image111['extension'];
																			$image11111 = pathinfo($imagename1111,PATHINFO_EXTENSION);;
																			if($image11111 != "jpg" && $image11111 !="png" && $image11111 != "jpeg" ) {
																			$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																			
																	}
																	if(isset($fields[29])&& $fields[29]!=''){
																			$image12 = $fields[29];
																			$image112 = pathinfo($image12);
																			$imagename1112=$image112['filename'].".".$image112['extension'];
																			$image11112 = pathinfo($imagename1112,PATHINFO_EXTENSION);;
																			if($image11112 != "jpg" && $image11112 !="png" && $image11112 != "jpeg" ) {
																			$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																			$error=1;
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
															$path='/home/cartinhour/public_html/uploads/products/';
															//echo '<pre>';print_r($data);exit;
																$image_link = $data[18];
																$split_image = pathinfo($image_link);
																$imagename=round(microtime(true)).$split_image['filename'].".".$split_image['extension'];
																copy($data[18], $path.$imagename);
																if(isset($data[19])&& $data[19]!=''){
																	$image_link1 = $data[19];
																	$split_image1 = pathinfo($image_link1);
																	$imagename1=round(microtime(true)).$split_image1['filename'].".".$split_image1['extension'];
																	copy($data[19], $path.$imagename1);
																}
																if(isset($data[20])&& $data[20]!=''){
																		$image_link2 = $data[20];
																		$split_image2 = pathinfo($image_link2);
																		$imagename2=round(microtime(true)).$split_image2['filename'].".".$split_image2['extension'];
																		copy($data[20], $path.$imagename2);
																}
																if(isset($data[21])&& $data[21]!=''){
																		$image_link3 = $data[21];
																		$split_image3 = pathinfo($image_link3);
																		$imagename3=round(microtime(true)).$split_image3['filename'].".".$split_image3['extension'];
																		copy($data[21], $path.$imagename3);
																		
																}
																if(isset($data[22])&& $data[22]!=''){
																		$image_link4 = $data[22];
																		$split_image4 = pathinfo($image_link4);
																		$imagename4=round(microtime(true)).$split_image4['filename'].".".$split_image4['extension'];
																		copy($data[22], $path.$imagename4);
																		
																}
																if(isset($data[23])&& $data[23]!=''){
																		$image_link5 = $data[23];
																		$split_image5 = pathinfo($image_link5);
																		$imagename5=round(microtime(true)).$split_image5['filename'].".".$split_image5['extension'];
																		copy($data[23], $path.$imagename5);
																		
																}
																if(isset($data[24])&& $data[24]!=''){
																	$image_link6 = $data[24];
																	$split_image6 = pathinfo($image_link6);
																	$imagename6=round(microtime(true)).$split_image6['filename'].".".$split_image6['extension'];
																	copy($data[24], $path.$imagename6);
																
																}
																if(isset($data[25])&& $data[25]!=''){
																	$image_link7 = $data[25];
																	$split_image7 = pathinfo($image_link7);
																	$imagename7=round(microtime(true)).$split_image7['filename'].".".$split_image7['extension'];
																	copy($data[25], $path.$imagename7);
																
																}
																if(isset($data[26])&& $data[26]!=''){
																		$image_link8 = $data[26];
																		$split_image8 = pathinfo($image_link8);
																		$imagename8=round(microtime(true)).$split_image8['filename'].".".$split_image8['extension'];
																		copy($data[26], $path.$imagename8);
																		
																}
																if(isset($data[27])&& $data[27]!=''){
																	$image_link9 = $data[27];
																	$split_image9 = pathinfo($image_link9);
																	$imagename9=round(microtime(true)).$split_image9['filename'].".".$split_image9['extension'];
																	copy($data[27], $path.$imagename9);
																}
																if(isset($data[28])&& $data[28]!=''){
																	$image_link10 = $data[28];
																	$split_image10 = pathinfo($image_link10);
																	$imagename10=round(microtime(true)).$split_image10['filename'].".".$split_image10['extension'];
																	copy($data[28], $path.$imagename10);
																
																}
																if(isset($data[29])&& $data[29]!=''){
																	$image_link11 = $data[29];
																	$split_image11 = pathinfo($image_link11);
																	$imagename11=round(microtime(true)).$split_image11['filename'].".".$split_image11['extension'];
																	copy($data[29], $path.$imagename11);
																	
																}
																$discount= ($data[4]-$data[5]);
																$offers= (($discount) /$data[4])*100;
																$adddetails=array(
																		'category_id' => $post['category_ids'],			
																		'subcategory_id' =>$post['subcategory_ids'],
																		'seller_id' =>$this->session->userdata('seller_id'), 
																		'item_name' => isset($data[1])?$data[1]:'',
																		'skuid' => isset($data[2])?$data[2]:'',
																		'item_code' => isset($data[3])?$data[3]:'',
																		'item_cost' => isset($data[4])?$data[4]:'',
																		'special_price' => isset($data[5])?$data[5]:'',
																		'offers' =>isset($offers)?$offers:'',
																		'discount' =>isset($discount)?$discount:'',
																		'item_quantity' =>isset($data[8])?$data[8]:'',
																		'keywords' =>isset($data[9])?$data[9]:'',
																		'title' =>isset($data[10])?$data[10]:'',
																		'item_status' => isset($data[11])?$data[11]:'',
																		'item_description' =>isset($data[12])?$data[12]:'',
																		'item_sub_name' =>isset($data[13])?$data[13]:'',
																		'brand' =>isset($data[14])?$data[14]:'',
																		'ideal_for' =>isset($data[15])?$data[15]:'',
																		'item_image'=>isset($imagename)?$imagename:'',
																		'item_image1'=>isset($imagename1)?$imagename1:'',
																		'item_image2'=>isset($imagename2)?$imagename2:'',
																		'item_image3'=>isset($imagename3)?$imagename3:'',
																		'item_image4'=>isset($imagename4)?$imagename4:'',
																		'item_image5'=>isset($imagename5)?$imagename5:'',
																		'item_image6'=>isset($imagename6)?$imagename6:'',
																		'item_image7'=>isset($imagename7)?$imagename7:'',
																		'item_image8'=>isset($imagename8)?$imagename8:'',
																		'item_image9'=>isset($imagename9)?$imagename9:'',
																		'item_image10'=>isset($imagename10)?$imagename10:'',
																		'item_image11'=>isset($imagename11)?$imagename11:'',
																		'seller_location_area'=>$seller_location['area'],
																		'created_at'=>date('Y-m-d H:i:s'),

																	);
																	//echo '<pre>';print_r($adddetails);exit;
																		$results=$this->products_model->save_prodcts($adddetails);
																			if(count($results)>0){
																					/* for spcification purpose*/
																					$arr1=explode(",",$data[16]);
																					$arr2=explode(",",$data[17]);
																					foreach (array_combine($arr1,$arr2) as $key=>$list){
																						if($list!='' && $key!=''){
																						$addspc=array(
																						'item_id' =>$results,
																						'spc_name' => $key,
																						'spc_value' => $list,
																						'create_at' => date('Y-m-d H:i:s'),
																						);
																						$this->products_model->insert_product_spcifications($addspc);
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
								
								
								
							}else if($post['subcategory_ids']==30){
								
									if(substr($_FILES['categoryfile']['name'], 0, 31)=='Electroniccategoryfilemobileacc'){
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
																		
																		$totalfields[] = $fields;
																		if(empty($fields[1])) {
																			$data['errors'][]="Product name is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[1]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[1]))	  	
																			{
																			$data['errors'][]='Product name wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[2])){
																			$data['errors'][]="Sku code is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[2]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[2]))	  	
																			{
																			$data['errors'][]='Sku code wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}else{
																				$result = $this->products_model->get_skuid_exists($fields[2]);
																				if(count($result)>0){
																				$data['errors'][]="Sku code already exits .please use another Sku code. Row Id is :  ".$key.'<br>';
																				$error=1;	
																				}

																			}

																		}
																		if(isset($data[3])&& $data[3]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[3]))	  	
																			{
																			$data['errors'][]='Other Unique code wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[4])) {
																			$data['errors'][]="Price is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[4]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[4]))	  	
																			{
																			$data['errors'][]='Price  can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[5])) {
																			$data['errors'][]="Special Price is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[5]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[5]))	  	
																			{
																			$data['errors'][]='Special Price  can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if($fields[5]>=$fields[4]){
																			$data['errors'][]="special price must be between 1 and".$fields[4].". Row Id is :  ".$key.'<br>';
																			$error=1;	
																		}
																		if(isset($data[6])&& $data[6]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[6]))	  	
																			{
																			$data['errors'][]='Offer can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($data[7])&& $data[7]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[7]))	  	
																			{
																			$data['errors'][]='Discount can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[8])) {
																			$data['errors'][]="Qty is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[8]!=''){
																			$regex ="/^[0-9]+$/"; 
																			if(!preg_match( $regex, $fields[8]))
																			{
																			$data['errors'][]="Qty must be digits. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($data[9])&& $data[9]!=''){
																			$regex ="/^[a-zA-Z0-9.-_& ]+$/"; 
																			if(!preg_match( $regex, $fields[9]))	  	
																			{
																			$data['errors'][]='Meta keywords can only consist of alphanumaric, space and dot. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($data[10])&& $data[10]!=''){
																			$regex ="/^[a-zA-Z0-9.-_& ]+$/"; 
																			if(!preg_match( $regex, $fields[10]))	  	
																			{
																			$data['errors'][]='Meta title can only consist of alphanumaric, space and dot. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[11])) {
																			$data['errors'][]="Status is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[11]!=''){
																			$regex ="/^[0-1]+$/"; 
																			if(!preg_match( $regex, $fields[11]))
																			{
																			$data['errors'][]="Status must be  0 or 1. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[12])) {
																			$data['errors'][]="Product description is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[12]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[12]))	  	
																			{
																			$data['errors'][]='Product description wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[13])) {
																			$data['errors'][]="Sub Item is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[13]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[13]))	  	
																			{
																			$data['errors'][]='Sub Item wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[14])) {
																			$data['errors'][]="Brand is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[14]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[14]))	  	
																			{
																			$data['errors'][]='Brand wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($data[15])&& $data[15]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[15]))
																			{
																			$data['errors'][]="Ideal for wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[16])) {
																			$data['errors'][]="Product specifications name is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[16]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[16]))	  	
																			{
																			$data['errors'][]='Product specifications name wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[17])) {
																			$data['errors'][]="Product specifications value is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[17]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[17]))	  	
																			{
																			$data['errors'][]='Product specifications value wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[18])) {
																			$data['errors'][]="Compatible mobiles is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[18]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[18]))	  	
																			{
																			$data['errors'][]='Compatible mobiles wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[19])) {
																			$data['errors'][]="Image is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[19]!=''){
																				$image_link = $fields[19];
																				$split_image1 = pathinfo($image_link);
																				$imagename=$split_image1['filename'].".".$split_image1['extension'];
																				$split_image = pathinfo($imagename,PATHINFO_EXTENSION);;
																				if($split_image != "jpg" && $split_image !="png" && $split_image != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[20])&& $fields[20]!=''){
																				$img1 = $fields[20];
																				$img12 = pathinfo($img1);
																				$imagename22=$img12['filename'].".".$img12['extension'];
																				$split_image212 = pathinfo($imagename22,PATHINFO_EXTENSION);;
																				if($split_image212 != "jpg" && $split_image212 !="png" && $split_image212 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[21])&& $fields[21]!=''){
																				$img2 = $fields[21];
																				$img122 = pathinfo($img2);
																				$imagename2233=$img122['filename'].".".$img122['extension'];
																				$image3 = pathinfo($imagename2233,PATHINFO_EXTENSION);;
																				if($image3 != "jpg" && $image3 !="png" && $image3 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[22])&& $fields[22]!=''){
																				$img4 = $fields[22];
																				$img133 = pathinfo($img4);
																				$imagename5656=$img133['filename'].".".$img133['extension'];
																				$image4 = pathinfo($imagename5656,PATHINFO_EXTENSION);;
																				if($image4 != "jpg" && $image4 !="png" && $image4 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[23])&& $fields[23]!=''){
																				$image5 = $fields[23];
																				$image55 = pathinfo($image5);
																				$imagename555=$image55['filename'].".".$image55['extension'];
																				$image5555 = pathinfo($imagename555,PATHINFO_EXTENSION);;
																				if($image5555 != "jpg" && $image5555 !="png" && $image5555 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[24])&& $fields[24]!=''){
																				$image6 = $fields[24];
																				$image66 = pathinfo($image6);
																				$imagename666=$image66['filename'].".".$image66['extension'];
																				$image6666 = pathinfo($imagename666,PATHINFO_EXTENSION);;
																				if($image6666 != "jpg" && $image6666 !="png" && $image6666 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[25])&& $fields[25]!=''){
																				$image7 = $fields[25];
																				$image77 = pathinfo($image7);
																				$imagename777=$image77['filename'].".".$image77['extension'];
																				$image7777 = pathinfo($imagename777,PATHINFO_EXTENSION);;
																				if($image7777 != "jpg" && $image7777 !="png" && $image7777 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[26])&& $fields[26]!=''){
																				$image8 = $fields[26];
																				$image88 = pathinfo($image8);
																				$imagename888=$image88['filename'].".".$image88['extension'];
																				$image8888 = pathinfo($imagename888,PATHINFO_EXTENSION);;
																				if($image8888 != "jpg" && $image8888 !="png" && $image8888 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[27])&& $fields[27]!=''){
																				$image9 = $fields[27];
																				$image99 = pathinfo($image9);
																				$imagename999=$image99['filename'].".".$image99['extension'];
																				$image9999 = pathinfo($imagename999,PATHINFO_EXTENSION);;
																				if($image9999 != "jpg" && $image9999 !="png" && $image9999 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[28])&& $fields[28]!=''){
																				$image01 = $fields[28];
																				$image001 = pathinfo($image01);
																				$imagename0001=$image001['filename'].".".$image001['extension'];
																				$image00001 = pathinfo($imagename0001,PATHINFO_EXTENSION);;
																				if($image00001 != "jpg" && $image00001 !="png" && $image00001 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[29])&& $fields[29]!=''){
																				$image11 = $fields[29];
																				$image111 = pathinfo($image11);
																				$imagename1111=$image111['filename'].".".$image111['extension'];
																				$image11111 = pathinfo($imagename1111,PATHINFO_EXTENSION);;
																				if($image11111 != "jpg" && $image11111 !="png" && $image11111 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																				
																		}
																		if(isset($fields[30])&& $fields[30]!=''){
																				$image12 = $fields[30];
																				$image112 = pathinfo($image12);
																				$imagename1112=$image112['filename'].".".$image112['extension'];
																				$image11112 = pathinfo($imagename1112,PATHINFO_EXTENSION);;
																				if($image11112 != "jpg" && $image11112 !="png" && $image11112 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
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
																$path='/home/cartinhour/public_html/uploads/products/';
																//echo '<pre>';print_r($data);exit;
																	$image_link = $data[19];
																	$split_image = pathinfo($image_link);
																	$imagename=round(microtime(true)).$split_image['filename'].".".$split_image['extension'];
																	copy($data[19], $path.$imagename);
																	if(isset($data[20])&& $data[20]!=''){
																		$image_link1 = $data[20];
																		$split_image1 = pathinfo($image_link1);
																		$imagename1=round(microtime(true)).$split_image1['filename'].".".$split_image1['extension'];
																		copy($data[20], $path.$imagename1);
																	}
																	if(isset($data[21])&& $data[21]!=''){
																			$image_link2 = $data[21];
																			$split_image2 = pathinfo($image_link2);
																			$imagename2=round(microtime(true)).$split_image2['filename'].".".$split_image2['extension'];
																			copy($data[21], $path.$imagename2);
																	}
																	if(isset($data[22])&& $data[22]!=''){
																			$image_link3 = $data[22];
																			$split_image3 = pathinfo($image_link3);
																			$imagename3=round(microtime(true)).$split_image3['filename'].".".$split_image3['extension'];
																			copy($data[22], $path.$imagename3);
																			
																	}
																	if(isset($data[23])&& $data[23]!=''){
																			$image_link4 = $data[23];
																			$split_image4 = pathinfo($image_link4);
																			$imagename4=round(microtime(true)).$split_image4['filename'].".".$split_image4['extension'];
																			copy($data[23], $path.$imagename4);
																			
																	}
																	if(isset($data[24])&& $data[24]!=''){
																			$image_link5 = $data[24];
																			$split_image5 = pathinfo($image_link5);
																			$imagename5=round(microtime(true)).$split_image5['filename'].".".$split_image5['extension'];
																			copy($data[24], $path.$imagename5);
																			
																	}
																	if(isset($data[25])&& $data[25]!=''){
																		$image_link6 = $data[25];
																		$split_image6 = pathinfo($image_link6);
																		$imagename6=round(microtime(true)).$split_image6['filename'].".".$split_image6['extension'];
																		copy($data[25], $path.$imagename6);
																	
																	}
																	if(isset($data[26])&& $data[26]!=''){
																		$image_link7 = $data[26];
																		$split_image7 = pathinfo($image_link7);
																		$imagename7=round(microtime(true)).$split_image7['filename'].".".$split_image7['extension'];
																		copy($data[26], $path.$imagename7);
																	
																	}
																	if(isset($data[27])&& $data[27]!=''){
																			$image_link8 = $data[27];
																			$split_image8 = pathinfo($image_link8);
																			$imagename8=round(microtime(true)).$split_image8['filename'].".".$split_image8['extension'];
																			copy($data[27], $path.$imagename8);
																			
																	}
																	if(isset($data[28])&& $data[28]!=''){
																		$image_link9 = $data[28];
																		$split_image9 = pathinfo($image_link9);
																		$imagename9=round(microtime(true)).$split_image9['filename'].".".$split_image9['extension'];
																		copy($data[28], $path.$imagename9);
																	}
																	if(isset($data[29])&& $data[29]!=''){
																		$image_link10 = $data[29];
																		$split_image10 = pathinfo($image_link10);
																		$imagename10=round(microtime(true)).$split_image10['filename'].".".$split_image10['extension'];
																		copy($data[29], $path.$imagename10);
																	
																	}
																	if(isset($data[30])&& $data[30]!=''){
																		$image_link11 = $data[30];
																		$split_image11 = pathinfo($image_link11);
																		$imagename11=round(microtime(true)).$split_image11['filename'].".".$split_image11['extension'];
																		copy($data[30], $path.$imagename11);
																		
																	}
																	$discount= ($data[4]-$data[5]);
																	$offers= (($discount) /$data[4])*100;
																	$adddetails=array(
																			'category_id' => $post['category_ids'],			
																			'subcategory_id' =>$post['subcategory_ids'],
																			'seller_id' =>$this->session->userdata('seller_id'), 
																			'item_name' => isset($data[1])?$data[1]:'',
																			'skuid' => isset($data[2])?$data[2]:'',
																			'item_code' => isset($data[3])?$data[3]:'',
																			'item_cost' => isset($data[4])?$data[4]:'',
																			'special_price' => isset($data[5])?$data[5]:'',
																			'offers' =>isset($offers)?$offers:'',
																			'discount' =>isset($discount)?$discount:'',
																			'item_quantity' =>isset($data[8])?$data[8]:'',
																			'keywords' =>isset($data[9])?$data[9]:'',
																			'title' =>isset($data[10])?$data[10]:'',
																			'item_status' => isset($data[11])?$data[11]:'',
																			'item_description' =>isset($data[12])?$data[12]:'',
																			'item_sub_name' =>isset($data[13])?$data[13]:'',
																			'brand' =>isset($data[14])?$data[14]:'',
																			'ideal_for' =>isset($data[15])?$data[15]:'',
																			'compatible_mobiles' =>isset($data[18])?$data[18]:'',
																			'item_image'=>isset($imagename)?$imagename:'',
																			'item_image1'=>isset($imagename1)?$imagename1:'',
																			'item_image2'=>isset($imagename2)?$imagename2:'',
																			'item_image3'=>isset($imagename3)?$imagename3:'',
																			'item_image4'=>isset($imagename4)?$imagename4:'',
																			'item_image5'=>isset($imagename5)?$imagename5:'',
																			'item_image6'=>isset($imagename6)?$imagename6:'',
																			'item_image7'=>isset($imagename7)?$imagename7:'',
																			'item_image8'=>isset($imagename8)?$imagename8:'',
																			'item_image9'=>isset($imagename9)?$imagename9:'',
																			'item_image10'=>isset($imagename10)?$imagename10:'',
																			'item_image11'=>isset($imagename11)?$imagename11:'',
																			'seller_location_area'=>$seller_location['area'],
																			'created_at'=>date('Y-m-d H:i:s'),

																		);
																		//echo '<pre>';print_r($adddetails);exit;
																			$results=$this->products_model->save_prodcts($adddetails);
																				if(count($results)>0){
																						/* for spcification purpose*/
																						$arr1=explode(",",$data[16]);
																						$arr2=explode(",",$data[17]);
																						foreach (array_combine($arr1,$arr2) as $key=>$list){
																							if($list!='' && $key!=''){
																							$addspc=array(
																							'item_id' =>$results,
																							'spc_name' => $key,
																							'spc_value' => $list,
																							'create_at' => date('Y-m-d H:i:s'),
																							);
																							$this->products_model->insert_product_spcifications($addspc);
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
								
								
								
								}else if($post['subcategory_ids']==34){
									  if(substr($_FILES['categoryfile']['name'], 0, 28)=='Electroniccategoryfilecamera'){
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
																		
																		$totalfields[] = $fields;
																		if(empty($fields[1])) {
																			$data['errors'][]="Product name is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[1]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[1]))	  	
																			{
																			$data['errors'][]='Product name wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[2])){
																			$data['errors'][]="Sku code is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[2]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[2]))	  	
																			{
																			$data['errors'][]='Sku code wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}else{
																				$result = $this->products_model->get_skuid_exists($fields[2]);
																				if(count($result)>0){
																				$data['errors'][]="Sku code already exits .please use another Sku code. Row Id is :  ".$key.'<br>';
																				$error=1;	
																				}

																			}

																		}
																		if(isset($fields[3])&& $fields[3]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[3]))	  	
																			{
																			$data['errors'][]='Other Unique code wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[4])) {
																			$data['errors'][]="Price is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[4]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[4]))	  	
																			{
																			$data['errors'][]='Price  can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[5])) {
																			$data['errors'][]="Special Price is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[5]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[5]))	  	
																			{
																			$data['errors'][]='Special Price  can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if($fields[5]>=$fields[4]){
																			$data['errors'][]="special price must be between 1 and".$fields[4].". Row Id is :  ".$key.'<br>';
																			$error=1;	
																		}
																		if(isset($fields[6])&& $fields[6]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[6]))	  	
																			{
																			$data['errors'][]='Offer can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[7])&& $fields[7]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[7]))	  	
																			{
																			$data['errors'][]='Discount can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[8])) {
																			$data['errors'][]="Qty is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[8]!=''){
																			$regex ="/^[0-9]+$/"; 
																			if(!preg_match( $regex, $fields[8]))
																			{
																			$data['errors'][]="Qty must be digits. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[9])&& $fields[9]!=''){
																			$regex ="/^[a-zA-Z0-9.-_& ]+$/"; 
																			if(!preg_match( $regex, $fields[9]))	  	
																			{
																			$data['errors'][]='Meta keywords can only consist of alphanumaric, space and dot. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[10])&& $fields[10]!=''){
																			$regex ="/^[a-zA-Z0-9.-_& ]+$/"; 
																			if(!preg_match( $regex, $fields[10]))	  	
																			{
																			$data['errors'][]='Meta title can only consist of alphanumaric, space and dot. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[11])) {
																			$data['errors'][]="Status is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[11]!=''){
																			$regex ="/^[0-1]+$/"; 
																			if(!preg_match( $regex, $fields[11]))
																			{
																			$data['errors'][]="Status must be  0 or 1. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[12])) {
																			$data['errors'][]="Product description is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[12]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[12]))	  	
																			{
																			$data['errors'][]='Product description wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[13])) {
																			$data['errors'][]="Sub Item is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[13]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[13]))	  	
																			{
																			$data['errors'][]='Sub Item wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[14])) {
																			$data['errors'][]="Brand is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[14]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[14]))	  	
																			{
																			$data['errors'][]='Brand wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[15])&& $fields[15]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[15]))
																			{
																			$data['errors'][]="Ideal for wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[16])) {
																			$data['errors'][]="Product specifications name is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[16]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[16]))	  	
																			{
																			$data['errors'][]='Product specifications name wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[17])) {
																			$data['errors'][]="Product specifications value is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[17]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[17]))	  	
																			{
																			$data['errors'][]='Product specifications value wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[18])) {
																			$data['errors'][]="Color is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[18]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[18]))	  	
																			{
																			$data['errors'][]='Color wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[19])&& $fields[19]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[19]))	  	
																			{
																			$data['errors'][]='Type wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[20])) {
																			$data['errors'][]="Mega Pixel is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[20]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[20]))	  	
																			{
																			$data['errors'][]='Mega Pixel wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[21])) {
																			$data['errors'][]="sensor type is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[21]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[21]))	  	
																			{
																			$data['errors'][]='sensor type wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[22])) {
																			$data['errors'][]="Battery type is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[22]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[22]))	  	
																			{
																			$data['errors'][]='Battery type wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[23])) {
																			$data['errors'][]="Image is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[23]!=''){
																				$image_link = $fields[23];
																				$split_image1 = pathinfo($image_link);
																				$imagename=$split_image1['filename'].".".$split_image1['extension'];
																				$split_image = pathinfo($imagename,PATHINFO_EXTENSION);;
																				if($split_image != "jpg" && $split_image !="png" && $split_image != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[24])&& $fields[24]!=''){
																				$img1 = $fields[24];
																				$img12 = pathinfo($img1);
																				$imagename22=$img12['filename'].".".$img12['extension'];
																				$split_image212 = pathinfo($imagename22,PATHINFO_EXTENSION);;
																				if($split_image212 != "jpg" && $split_image212 !="png" && $split_image212 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[25])&& $fields[25]!=''){
																				$img2 = $fields[25];
																				$img122 = pathinfo($img2);
																				$imagename2233=$img122['filename'].".".$img122['extension'];
																				$image3 = pathinfo($imagename2233,PATHINFO_EXTENSION);;
																				if($image3 != "jpg" && $image3 !="png" && $image3 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[26])&& $fields[26]!=''){
																				$img4 = $fields[26];
																				$img133 = pathinfo($img4);
																				$imagename5656=$img133['filename'].".".$img133['extension'];
																				$image4 = pathinfo($imagename5656,PATHINFO_EXTENSION);;
																				if($image4 != "jpg" && $image4 !="png" && $image4 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[27])&& $fields[27]!=''){
																				$image5 = $fields[27];
																				$image55 = pathinfo($image5);
																				$imagename555=$image55['filename'].".".$image55['extension'];
																				$image5555 = pathinfo($imagename555,PATHINFO_EXTENSION);;
																				if($image5555 != "jpg" && $image5555 !="png" && $image5555 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[28])&& $fields[28]!=''){
																				$image6 = $fields[28];
																				$image66 = pathinfo($image6);
																				$imagename666=$image66['filename'].".".$image66['extension'];
																				$image6666 = pathinfo($imagename666,PATHINFO_EXTENSION);;
																				if($image6666 != "jpg" && $image6666 !="png" && $image6666 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[29])&& $fields[29]!=''){
																				$image7 = $fields[29];
																				$image77 = pathinfo($image7);
																				$imagename777=$image77['filename'].".".$image77['extension'];
																				$image7777 = pathinfo($imagename777,PATHINFO_EXTENSION);;
																				if($image7777 != "jpg" && $image7777 !="png" && $image7777 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[30])&& $fields[30]!=''){
																				$image8 = $fields[30];
																				$image88 = pathinfo($image8);
																				$imagename888=$image88['filename'].".".$image88['extension'];
																				$image8888 = pathinfo($imagename888,PATHINFO_EXTENSION);;
																				if($image8888 != "jpg" && $image8888 !="png" && $image8888 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[31])&& $fields[31]!=''){
																				$image9 = $fields[31];
																				$image99 = pathinfo($image9);
																				$imagename999=$image99['filename'].".".$image99['extension'];
																				$image9999 = pathinfo($imagename999,PATHINFO_EXTENSION);;
																				if($image9999 != "jpg" && $image9999 !="png" && $image9999 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[32])&& $fields[32]!=''){
																				$image01 = $fields[32];
																				$image001 = pathinfo($image01);
																				$imagename0001=$image001['filename'].".".$image001['extension'];
																				$image00001 = pathinfo($imagename0001,PATHINFO_EXTENSION);;
																				if($image00001 != "jpg" && $image00001 !="png" && $image00001 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[33])&& $fields[33]!=''){
																				$image11 = $fields[33];
																				$image111 = pathinfo($image11);
																				$imagename1111=$image111['filename'].".".$image111['extension'];
																				$image11111 = pathinfo($imagename1111,PATHINFO_EXTENSION);;
																				if($image11111 != "jpg" && $image11111 !="png" && $image11111 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																				
																		}
																		if(isset($fields[34])&& $fields[34]!=''){
																				$image12 = $fields[34];
																				$image112 = pathinfo($image12);
																				$imagename1112=$image112['filename'].".".$image112['extension'];
																				$image11112 = pathinfo($imagename1112,PATHINFO_EXTENSION);;
																				if($image11112 != "jpg" && $image11112 !="png" && $image11112 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
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
																$path='/home/cartinhour/public_html/uploads/products/';
																//echo '<pre>';print_r($data);exit;
																	$image_link = $data[23];
																	$split_image = pathinfo($image_link);
																	$imagename=round(microtime(true)).$split_image['filename'].".".$split_image['extension'];
																	copy($data[23], $path.$imagename);
																	if(isset($data[24])&& $data[24]!=''){
																		$image_link1 = $data[24];
																		$split_image1 = pathinfo($image_link1);
																		$imagename1=round(microtime(true)).$split_image1['filename'].".".$split_image1['extension'];
																		copy($data[24], $path.$imagename1);
																	}
																	if(isset($data[25])&& $data[25]!=''){
																			$image_link2 = $data[25];
																			$split_image2 = pathinfo($image_link2);
																			$imagename2=round(microtime(true)).$split_image2['filename'].".".$split_image2['extension'];
																			copy($data[25], $path.$imagename2);
																	}
																	if(isset($data[26])&& $data[26]!=''){
																			$image_link3 = $data[26];
																			$split_image3 = pathinfo($image_link3);
																			$imagename3=round(microtime(true)).$split_image3['filename'].".".$split_image3['extension'];
																			copy($data[26], $path.$imagename3);
																			
																	}
																	if(isset($data[27])&& $data[27]!=''){
																			$image_link4 = $data[27];
																			$split_image4 = pathinfo($image_link4);
																			$imagename4=round(microtime(true)).$split_image4['filename'].".".$split_image4['extension'];
																			copy($data[27], $path.$imagename4);
																			
																	}
																	if(isset($data[28])&& $data[28]!=''){
																			$image_link5 = $data[28];
																			$split_image5 = pathinfo($image_link5);
																			$imagename5=round(microtime(true)).$split_image5['filename'].".".$split_image5['extension'];
																			copy($data[28], $path.$imagename5);
																			
																	}
																	if(isset($data[29])&& $data[29]!=''){
																		$image_link6 = $data[29];
																		$split_image6 = pathinfo($image_link6);
																		$imagename6=round(microtime(true)).$split_image6['filename'].".".$split_image6['extension'];
																		copy($data[29], $path.$imagename6);
																	
																	}
																	if(isset($data[30])&& $data[30]!=''){
																		$image_link7 = $data[30];
																		$split_image7 = pathinfo($image_link7);
																		$imagename7=round(microtime(true)).$split_image7['filename'].".".$split_image7['extension'];
																		copy($data[30], $path.$imagename7);
																	
																	}
																	if(isset($data[31])&& $data[31]!=''){
																			$image_link8 = $data[31];
																			$split_image8 = pathinfo($image_link8);
																			$imagename8=round(microtime(true)).$split_image8['filename'].".".$split_image8['extension'];
																			copy($data[31], $path.$imagename8);
																			
																	}
																	if(isset($data[32])&& $data[32]!=''){
																		$image_link9 = $data[32];
																		$split_image9 = pathinfo($image_link9);
																		$imagename9=round(microtime(true)).$split_image9['filename'].".".$split_image9['extension'];
																		copy($data[32], $path.$imagename9);
																	}
																	if(isset($data[33])&& $data[33]!=''){
																		$image_link10 = $data[33];
																		$split_image10 = pathinfo($image_link10);
																		$imagename10=round(microtime(true)).$split_image10['filename'].".".$split_image10['extension'];
																		copy($data[33], $path.$imagename10);
																	
																	}
																	if(isset($data[34])&& $data[34]!=''){
																		$image_link11 = $data[34];
																		$split_image11 = pathinfo($image_link11);
																		$imagename11=round(microtime(true)).$split_image11['filename'].".".$split_image11['extension'];
																		copy($data[34], $path.$imagename11);
																		
																	}
																	$discount= ($data[4]-$data[5]);
																	$offers= (($discount) /$data[4])*100;
																	$adddetails=array(
																			'category_id' => $post['category_ids'],			
																			'subcategory_id' =>$post['subcategory_ids'],
																			'seller_id' =>$this->session->userdata('seller_id'), 
																			'item_name' => isset($data[1])?$data[1]:'',
																			'skuid' => isset($data[2])?$data[2]:'',
																			'item_code' => isset($data[3])?$data[3]:'',
																			'item_cost' => isset($data[4])?$data[4]:'',
																			'special_price' => isset($data[5])?$data[5]:'',
																			'offers' =>isset($offers)?$offers:'',
																			'discount' =>isset($discount)?$discount:'',
																			'item_quantity' =>isset($data[8])?$data[8]:'',
																			'keywords' =>isset($data[9])?$data[9]:'',
																			'title' =>isset($data[10])?$data[10]:'',
																			'item_status' => isset($data[11])?$data[11]:'',
																			'item_description' =>isset($data[12])?$data[12]:'',
																			'item_sub_name' =>isset($data[13])?$data[13]:'',
																			'brand' =>isset($data[14])?$data[14]:'',
																			'ideal_for' =>isset($data[15])?$data[15]:'',
																			'producttype' =>isset($data[19])?$data[19]:'',
																			'mega_pixel' =>isset($data[20])?$data[20]:'',
																			'sensor_type' =>isset($data[21])?$data[21]:'',
																			'battery_type' =>isset($data[22])?$data[22]:'',
																			'item_image'=>isset($imagename)?$imagename:'',
																			'item_image1'=>isset($imagename1)?$imagename1:'',
																			'item_image2'=>isset($imagename2)?$imagename2:'',
																			'item_image3'=>isset($imagename3)?$imagename3:'',
																			'item_image4'=>isset($imagename4)?$imagename4:'',
																			'item_image5'=>isset($imagename5)?$imagename5:'',
																			'item_image6'=>isset($imagename6)?$imagename6:'',
																			'item_image7'=>isset($imagename7)?$imagename7:'',
																			'item_image8'=>isset($imagename8)?$imagename8:'',
																			'item_image9'=>isset($imagename9)?$imagename9:'',
																			'item_image10'=>isset($imagename10)?$imagename10:'',
																			'item_image11'=>isset($imagename11)?$imagename11:'',
																			'seller_location_area'=>$seller_location['area'],
																			'created_at'=>date('Y-m-d H:i:s'),

																		);
																		//echo '<pre>';print_r($adddetails);exit;
																			$results=$this->products_model->save_prodcts($adddetails);
																				if(count($results)>0){
																						/* for spcification purpose*/
																						$arr1=explode(",",$data[16]);
																						$arr2=explode(",",$data[17]);
																						foreach (array_combine($arr1,$arr2) as $key=>$list){
																							if($list!='' && $key!=''){
																							$addspc=array(
																							'item_id' =>$results,
																							'spc_name' => $key,
																							'spc_value' => $list,
																							'create_at' => date('Y-m-d H:i:s'),
																							);
																							$this->products_model->insert_product_spcifications($addspc);
																							}
																						}
																						/* for spcification purpose*/
																						/* for color*/
																						
																						if($data[18]!=''){
																									$colordata = str_replace(array('[', ']','"'), array(''), $data[18]);
																									foreach (explode(",",$colordata) as $colorss){

																									$addcolorsdata=array(
																									'item_id' =>$results,
																									'color_name' => $colorss,
																									'create_at' => date('Y-m-d H:i:s'),
																									);
																									$this->products_model->insert_product_colors($addcolorsdata);
																									}
																								
																							}
																						/* for color*/
																						
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
									  
									  
								}else if($post['subcategory_ids']==35){
									
									        if(substr($_FILES['categoryfile']['name'], 0, 28)=='Electroniccategoryfiletablet'){
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
																		
																		$totalfields[] = $fields;
																		if(empty($fields[1])) {
																			$data['errors'][]="Product name is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[1]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[1]))	  	
																			{
																			$data['errors'][]='Product name wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[2])){
																			$data['errors'][]="Sku code is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[2]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[2]))	  	
																			{
																			$data['errors'][]='Sku code wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}else{
																				$result = $this->products_model->get_skuid_exists($fields[2]);
																				if(count($result)>0){
																				$data['errors'][]="Sku code already exits .please use another Sku code. Row Id is :  ".$key.'<br>';
																				$error=1;	
																				}

																			}

																		}
																		if(isset($fields[3]) && $fields[3]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[3]))	  	
																			{
																			$data['errors'][]='Other Unique code wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[4])) {
																			$data['errors'][]="Price is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[4]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[4]))	  	
																			{
																			$data['errors'][]='Price  can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[5])) {
																			$data['errors'][]="Special Price is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[5]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[5]))	  	
																			{
																			$data['errors'][]='Special Price  can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if($fields[5]>=$fields[4]){
																			$data['errors'][]="special price must be between 1 and".$fields[4].". Row Id is :  ".$key.'<br>';
																			$error=1;	
																		}

																		if(isset($fields[6]) && $fields[6]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[6]))	  	
																			{
																			$data['errors'][]='Offer can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[7]) && $fields[7]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[7]))	  	
																			{
																			$data['errors'][]='Discount can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[8])) {
																			$data['errors'][]="Qty is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[8]!=''){
																			$regex ="/^[0-9]+$/"; 
																			if(!preg_match( $regex, $fields[8]))
																			{
																			$data['errors'][]="Qty must be digits. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[9]) && $fields[9]!=''){
																			$regex ="/^[a-zA-Z0-9.-_& ]+$/"; 
																			if(!preg_match( $regex, $fields[9]))	  	
																			{
																			$data['errors'][]='Meta keywords can only consist of alphanumaric, space and dot. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[10]) && $fields[10]!=''){
																			$regex ="/^[a-zA-Z0-9.-_& ]+$/"; 
																			if(!preg_match( $regex, $fields[10]))	  	
																			{
																			$data['errors'][]='Meta title can only consist of alphanumaric, space and dot. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[11])) {
																			$data['errors'][]="Status is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[11]!=''){
																			$regex ="/^[0-1]+$/"; 
																			if(!preg_match( $regex, $fields[11]))
																			{
																			$data['errors'][]="Status must be  0 or 1. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[12])) {
																			$data['errors'][]="Product description is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[12]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[12]))	  	
																			{
																			$data['errors'][]='Product description wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[13])) {
																			$data['errors'][]="Sub Item is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[13]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[13]))	  	
																			{
																			$data['errors'][]='Sub Item wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[14])) {
																			$data['errors'][]="Brand is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[14]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[14]))	  	
																			{
																			$data['errors'][]='Brand wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[15]) && $fields[15]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[15]))
																			{
																			$data['errors'][]="Ideal for wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[16])) {
																			$data['errors'][]="Product specifications name is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[16]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[16]))	  	
																			{
																			$data['errors'][]='Product specifications name wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[17])) {
																			$data['errors'][]="Product specifications value is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[17]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[17]))	  	
																			{
																			$data['errors'][]='Product specifications value wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[18]) && $fields[18]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[18]))	  	
																			{
																			$data['errors'][]='Display size wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[19])) {
																			$data['errors'][]="Connectivity is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[19]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[19]))	  	
																			{
																			$data['errors'][]='Connectivity wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[20]) && $fields[20]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[20]))	  	
																			{
																			$data['errors'][]='Ram wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[21])) {
																			$data['errors'][]="Voice calling facility is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[21]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[21]))	  	
																			{
																			$data['errors'][]='Voice calling facility wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[22]) && $fields[22]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[22]))	  	
																			{
																			$data['errors'][]='Operating system wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[23]) && $fields[23]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[23]))	  	
																			{
																			$data['errors'][]='Internal storage wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																	if(isset($fields[24]) && $fields[24]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[24]))	  	
																			{
																			$data['errors'][]='Battery type wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[25]) && $fields[25]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[25]))	  	
																			{
																			$data['errors'][]='Primary camera wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[26])) {
																			$data['errors'][]="Processor clock speed is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[26]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[26]))	  	
																			{
																			$data['errors'][]='Processor clock speed wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[27])) {
																			$data['errors'][]="Image is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[27]!=''){
																				$image_link = $fields[27];
																				$split_image1 = pathinfo($image_link);
																				$imagename=$split_image1['filename'].".".$split_image1['extension'];
																				$split_image = pathinfo($imagename,PATHINFO_EXTENSION);;
																				if($split_image != "jpg" && $split_image !="png" && $split_image != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[28])&& $fields[28]!=''){
																				$img1 = $fields[28];
																				$img12 = pathinfo($img1);
																				$imagename22=$img12['filename'].".".$img12['extension'];
																				$split_image212 = pathinfo($imagename22,PATHINFO_EXTENSION);;
																				if($split_image212 != "jpg" && $split_image212 !="png" && $split_image212 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[29])&& $fields[29]!=''){
																				$img2 = $fields[29];
																				$img122 = pathinfo($img2);
																				$imagename2233=$img122['filename'].".".$img122['extension'];
																				$image3 = pathinfo($imagename2233,PATHINFO_EXTENSION);;
																				if($image3 != "jpg" && $image3 !="png" && $image3 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[30])&& $fields[30]!=''){
																				$img4 = $fields[30];
																				$img133 = pathinfo($img4);
																				$imagename5656=$img133['filename'].".".$img133['extension'];
																				$image4 = pathinfo($imagename5656,PATHINFO_EXTENSION);;
																				if($image4 != "jpg" && $image4 !="png" && $image4 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[31])&& $fields[31]!=''){
																				$image5 = $fields[31];
																				$image55 = pathinfo($image5);
																				$imagename555=$image55['filename'].".".$image55['extension'];
																				$image5555 = pathinfo($imagename555,PATHINFO_EXTENSION);;
																				if($image5555 != "jpg" && $image5555 !="png" && $image5555 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[32])&& $fields[32]!=''){
																				$image6 = $fields[32];
																				$image66 = pathinfo($image6);
																				$imagename666=$image66['filename'].".".$image66['extension'];
																				$image6666 = pathinfo($imagename666,PATHINFO_EXTENSION);;
																				if($image6666 != "jpg" && $image6666 !="png" && $image6666 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[33])&& $fields[33]!=''){
																				$image7 = $fields[33];
																				$image77 = pathinfo($image7);
																				$imagename777=$image77['filename'].".".$image77['extension'];
																				$image7777 = pathinfo($imagename777,PATHINFO_EXTENSION);;
																				if($image7777 != "jpg" && $image7777 !="png" && $image7777 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[34])&& $fields[34]!=''){
																				$image8 = $fields[34];
																				$image88 = pathinfo($image8);
																				$imagename888=$image88['filename'].".".$image88['extension'];
																				$image8888 = pathinfo($imagename888,PATHINFO_EXTENSION);;
																				if($image8888 != "jpg" && $image8888 !="png" && $image8888 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[35])&& $fields[35]!=''){
																				$image9 = $fields[35];
																				$image99 = pathinfo($image9);
																				$imagename999=$image99['filename'].".".$image99['extension'];
																				$image9999 = pathinfo($imagename999,PATHINFO_EXTENSION);;
																				if($image9999 != "jpg" && $image9999 !="png" && $image9999 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[36])&& $fields[36]!=''){
																				$image01 = $fields[36];
																				$image001 = pathinfo($image01);
																				$imagename0001=$image001['filename'].".".$image001['extension'];
																				$image00001 = pathinfo($imagename0001,PATHINFO_EXTENSION);;
																				if($image00001 != "jpg" && $image00001 !="png" && $image00001 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[37])&& $fields[37]!=''){
																				$image11 = $fields[37];
																				$image111 = pathinfo($image11);
																				$imagename1111=$image111['filename'].".".$image111['extension'];
																				$image11111 = pathinfo($imagename1111,PATHINFO_EXTENSION);;
																				if($image11111 != "jpg" && $image11111 !="png" && $image11111 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																				
																		}
																		if(isset($fields[38])&& $fields[38]!=''){
																				$image12 = $fields[38];
																				$image112 = pathinfo($image12);
																				$imagename1112=$image112['filename'].".".$image112['extension'];
																				$image11112 = pathinfo($imagename1112,PATHINFO_EXTENSION);;
																				if($image11112 != "jpg" && $image11112 !="png" && $image11112 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
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
																$path='/home/cartinhour/public_html/uploads/products/';
																//echo '<pre>';print_r($data);exit;
																	$image_link = $data[27];
																	$split_image = pathinfo($image_link);
																	$imagename=round(microtime(true)).$split_image['filename'].".".$split_image['extension'];
																	copy($data[27], $path.$imagename);
																	if(isset($data[28])&& $data[28]!=''){
																		$image_link1 = $data[28];
																		$split_image1 = pathinfo($image_link1);
																		$imagename1=round(microtime(true)).$split_image1['filename'].".".$split_image1['extension'];
																		copy($data[28], $path.$imagename1);
																	}
																	if(isset($data[29])&& $data[29]!=''){
																			$image_link2 = $data[29];
																			$split_image2 = pathinfo($image_link2);
																			$imagename2=round(microtime(true)).$split_image2['filename'].".".$split_image2['extension'];
																			copy($data[29], $path.$imagename2);
																	}
																	if(isset($data[30])&& $data[30]!=''){
																			$image_link3 = $data[30];
																			$split_image3 = pathinfo($image_link3);
																			$imagename3=round(microtime(true)).$split_image3['filename'].".".$split_image3['extension'];
																			copy($data[30], $path.$imagename3);
																			
																	}
																	if(isset($data[31])&& $data[31]!=''){
																			$image_link4 = $data[31];
																			$split_image4 = pathinfo($image_link4);
																			$imagename4=round(microtime(true)).$split_image4['filename'].".".$split_image4['extension'];
																			copy($data[31], $path.$imagename4);
																			
																	}
																	if(isset($data[32])&& $data[32]!=''){
																			$image_link5 = $data[32];
																			$split_image5 = pathinfo($image_link5);
																			$imagename5=round(microtime(true)).$split_image5['filename'].".".$split_image5['extension'];
																			copy($data[32], $path.$imagename5);
																			
																	}
																	if(isset($data[33])&& $data[33]!=''){
																		$image_link6 = $data[33];
																		$split_image6 = pathinfo($image_link6);
																		$imagename6=round(microtime(true)).$split_image6['filename'].".".$split_image6['extension'];
																		copy($data[33], $path.$imagename6);
																	
																	}
																	if(isset($data[34])&& $data[34]!=''){
																		$image_link7 = $data[34];
																		$split_image7 = pathinfo($image_link7);
																		$imagename7=round(microtime(true)).$split_image7['filename'].".".$split_image7['extension'];
																		copy($data[34], $path.$imagename7);
																	
																	}
																	if(isset($data[35])&& $data[35]!=''){
																			$image_link8 = $data[35];
																			$split_image8 = pathinfo($image_link8);
																			$imagename8=round(microtime(true)).$split_image8['filename'].".".$split_image8['extension'];
																			copy($data[35], $path.$imagename8);
																			
																	}
																	if(isset($data[36])&& $data[36]!=''){
																		$image_link9 = $data[36];
																		$split_image9 = pathinfo($image_link9);
																		$imagename9=round(microtime(true)).$split_image9['filename'].".".$split_image9['extension'];
																		copy($data[36], $path.$imagename9);
																	}
																	if(isset($data[37])&& $data[37]!=''){
																		$image_link10 = $data[37];
																		$split_image10 = pathinfo($image_link10);
																		$imagename10=round(microtime(true)).$split_image10['filename'].".".$split_image10['extension'];
																		copy($data[37], $path.$imagename10);
																	
																	}
																	if(isset($data[38])&& $data[38]!=''){
																		$image_link11 = $data[38];
																		$split_image11 = pathinfo($image_link11);
																		$imagename11=round(microtime(true)).$split_image11['filename'].".".$split_image11['extension'];
																		copy($data[38], $path.$imagename11);
																		
																	}
																	$discount= ($data[4]-$data[5]);
																	$offers= (($discount) /$data[4])*100;
																	$adddetails=array(
																			'category_id' => $post['category_ids'],			
																			'subcategory_id' =>$post['subcategory_ids'],
																			'seller_id' =>$this->session->userdata('seller_id'), 
																			'item_name' => isset($data[1])?$data[1]:'',
																			'skuid' => isset($data[2])?$data[2]:'',
																			'item_code' => isset($data[3])?$data[3]:'',
																			'item_cost' => isset($data[4])?$data[4]:'',
																			'special_price' => isset($data[5])?$data[5]:'',
																			'offers' =>isset($offers)?$offers:'',
																			'discount' =>isset($discount)?$discount:'',
																			'item_quantity' =>isset($data[8])?$data[8]:'',
																			'keywords' =>isset($data[9])?$data[9]:'',
																			'title' =>isset($data[10])?$data[10]:'',
																			'item_status' =>isset($data[11])?$data[11]:'',
																			'item_description' =>isset($data[12])?$data[12]:'',
																			'item_sub_name' =>isset($data[13])?$data[13]:'',
																			'brand' =>isset($data[14])?$data[14]:'',
																			'ideal_for' =>isset($data[15])?$data[15]:'',
																			'display_size' =>isset($data[18])?$data[18]:'',
																			'connectivity' =>isset($data[19])?$data[19]:'',
																			'ram' =>isset($data[20])?$data[20]:'',
																			'voice_calling_facility' =>isset($data[21])?$data[21]:'',
																			'operatingsystem' =>isset($data[22])?$data[22]:'',
																			'internal_storage' =>isset($data[23])?$data[23]:'',
																			'battery_capacity' =>isset($data[24])?$data[24]:'',
																			'primary_camera' =>isset($data[25])?$data[25]:'',
																			'processor_clock_speed' =>isset($data[26])?$data[26]:'',
																			'item_image'=>isset($imagename)?$imagename:'',
																			'item_image1'=>isset($imagename1)?$imagename1:'',
																			'item_image2'=>isset($imagename2)?$imagename2:'',
																			'item_image3'=>isset($imagename3)?$imagename3:'',
																			'item_image4'=>isset($imagename4)?$imagename4:'',
																			'item_image5'=>isset($imagename5)?$imagename5:'',
																			'item_image6'=>isset($imagename6)?$imagename6:'',
																			'item_image7'=>isset($imagename7)?$imagename7:'',
																			'item_image8'=>isset($imagename8)?$imagename8:'',
																			'item_image9'=>isset($imagename9)?$imagename9:'',
																			'item_image10'=>isset($imagename10)?$imagename10:'',
																			'item_image11'=>isset($imagename11)?$imagename11:'',
																			'seller_location_area'=>$seller_location['area'],
																			'created_at'=>date('Y-m-d H:i:s'),

																		);
																		//echo '<pre>';print_r($adddetails);exit;
																			$results=$this->products_model->save_prodcts($adddetails);
																				if(count($results)>0){
																						/* for spcification purpose*/
																						$arr1=explode(",",$data[16]);
																						$arr2=explode(",",$data[17]);
																						foreach (array_combine($arr1,$arr2) as $key=>$list){
																							if($list!='' && $key!=''){
																							$addspc=array(
																							'item_id' =>$results,
																							'spc_name' => $key,
																							'spc_value' => $list,
																							'create_at' => date('Y-m-d H:i:s'),
																							);
																							$this->products_model->insert_product_spcifications($addspc);
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
									 
									
								}else if($post['subcategory_ids']==36){
									
										 if(substr($_FILES['categoryfile']['name'], 0, 29)=='Electroniccategoryfilerouters'){
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
																		
																		$totalfields[] = $fields;
																		if(empty($fields[1])) {
																			$data['errors'][]="Product name is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[1]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[1]))	  	
																			{
																			$data['errors'][]='Product name wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[2])){
																			$data['errors'][]="Sku code is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[2]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[2]))	  	
																			{
																			$data['errors'][]='Sku code wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}else{
																				$result = $this->products_model->get_skuid_exists($fields[2]);
																				if(count($result)>0){
																				$data['errors'][]="Sku code already exits .please use another Sku code. Row Id is :  ".$key.'<br>';
																				$error=1;	
																				}

																			}

																		}
																		if(isset($fields[3]) && $fields[3]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[3]))	  	
																			{
																			$data['errors'][]='Other Unique code wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[4])) {
																			$data['errors'][]="Price is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[4]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[4]))	  	
																			{
																			$data['errors'][]='Price  can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[5])) {
																			$data['errors'][]="Special Price is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[5]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[5]))	  	
																			{
																			$data['errors'][]='Special Price  can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if($fields[5]>=$fields[4]){
																		$data['errors'][]="special price must be between 1 and".$fields[4].". Row Id is :  ".$key.'<br>';
																		$error=1;	
																		}
																		if(isset($fields[6]) && $fields[6]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[6]))	  	
																			{
																			$data['errors'][]='Offer can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[7]) && $fields[7]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[7]))	  	
																			{
																			$data['errors'][]='Discount can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[8])) {
																			$data['errors'][]="Qty is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[8]!=''){
																			$regex ="/^[0-9]+$/"; 
																			if(!preg_match( $regex, $fields[8]))
																			{
																			$data['errors'][]="Qty must be digits. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[9]) && $fields[9]!=''){
																			$regex ="/^[a-zA-Z0-9.-_& ]+$/"; 
																			if(!preg_match( $regex, $fields[9]))	  	
																			{
																			$data['errors'][]='Meta keywords can only consist of alphanumaric, space and dot. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[10]) && $fields[10]!=''){
																			$regex ="/^[a-zA-Z0-9.-_& ]+$/"; 
																			if(!preg_match( $regex, $fields[10]))	  	
																			{
																			$data['errors'][]='Meta title can only consist of alphanumaric, space and dot. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[11])) {
																			$data['errors'][]="Status is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[11]!=''){
																			$regex ="/^[0-1]+$/"; 
																			if(!preg_match( $regex, $fields[11]))
																			{
																			$data['errors'][]="Status must be  0 or 1. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[12])) {
																			$data['errors'][]="Product description is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[12]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[12]))	  	
																			{
																			$data['errors'][]='Product description wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[13])) {
																			$data['errors'][]="Sub Item is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[13]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[13]))	  	
																			{
																			$data['errors'][]='Sub Item wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[14])) {
																			$data['errors'][]="Brand is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[14]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[14]))	  	
																			{
																			$data['errors'][]='Brand wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[15]) && $fields[15]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[15]))
																			{
																			$data['errors'][]="Ideal for wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[16])) {
																			$data['errors'][]="Product specifications name is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[16]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[16]))	  	
																			{
																			$data['errors'][]='Product specifications name wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[17])) {
																			$data['errors'][]="Product specifications value is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[17]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[17]))	  	
																			{
																			$data['errors'][]='Product specifications value wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[18]) && $fields[18]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[18]))	  	
																			{
																			$data['errors'][]='Type wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[19])) {
																			$data['errors'][]="Wireless speed is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[19]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[19]))	  	
																			{
																			$data['errors'][]='Wireless speed wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[20])) {
																			$data['errors'][]="Frequency band is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[20]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[20]))	  	
																			{
																			$data['errors'][]='Frequency band wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[21]) && $fields[21]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[21]))	  	
																			{
																			$data['errors'][]='Broadband compatibility wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[22]) && $fields[22]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[22]))	  	
																			{
																			$data['errors'][]='NO.of usb ports wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[23]) && $fields[23]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[23]))	  	
																			{
																			$data['errors'][]='Frequency wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[24]) && $fields[24]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[24]))	  	
																			{
																			$data['errors'][]='Antennae wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		
																		if(empty($fields[25])) {
																			$data['errors'][]="Image is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[25]!=''){
																				$image_link = $fields[25];
																				$split_image1 = pathinfo($image_link);
																				$imagename=$split_image1['filename'].".".$split_image1['extension'];
																				$split_image = pathinfo($imagename,PATHINFO_EXTENSION);;
																				if($split_image != "jpg" && $split_image !="png" && $split_image != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[26])&& $fields[26]!=''){
																				$img1 = $fields[26];
																				$img12 = pathinfo($img1);
																				$imagename22=$img12['filename'].".".$img12['extension'];
																				$split_image212 = pathinfo($imagename22,PATHINFO_EXTENSION);;
																				if($split_image212 != "jpg" && $split_image212 !="png" && $split_image212 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[27])&& $fields[27]!=''){
																				$img2 = $fields[27];
																				$img122 = pathinfo($img2);
																				$imagename2233=$img122['filename'].".".$img122['extension'];
																				$image3 = pathinfo($imagename2233,PATHINFO_EXTENSION);;
																				if($image3 != "jpg" && $image3 !="png" && $image3 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[28])&& $fields[28]!=''){
																				$img4 = $fields[28];
																				$img133 = pathinfo($img4);
																				$imagename5656=$img133['filename'].".".$img133['extension'];
																				$image4 = pathinfo($imagename5656,PATHINFO_EXTENSION);;
																				if($image4 != "jpg" && $image4 !="png" && $image4 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[29])&& $fields[29]!=''){
																				$image5 = $fields[29];
																				$image55 = pathinfo($image5);
																				$imagename555=$image55['filename'].".".$image55['extension'];
																				$image5555 = pathinfo($imagename555,PATHINFO_EXTENSION);;
																				if($image5555 != "jpg" && $image5555 !="png" && $image5555 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[30])&& $fields[30]!=''){
																				$image6 = $fields[30];
																				$image66 = pathinfo($image6);
																				$imagename666=$image66['filename'].".".$image66['extension'];
																				$image6666 = pathinfo($imagename666,PATHINFO_EXTENSION);;
																				if($image6666 != "jpg" && $image6666 !="png" && $image6666 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[31])&& $fields[31]!=''){
																				$image7 = $fields[31];
																				$image77 = pathinfo($image7);
																				$imagename777=$image77['filename'].".".$image77['extension'];
																				$image7777 = pathinfo($imagename777,PATHINFO_EXTENSION);;
																				if($image7777 != "jpg" && $image7777 !="png" && $image7777 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[32])&& $fields[32]!=''){
																				$image8 = $fields[32];
																				$image88 = pathinfo($image8);
																				$imagename888=$image88['filename'].".".$image88['extension'];
																				$image8888 = pathinfo($imagename888,PATHINFO_EXTENSION);;
																				if($image8888 != "jpg" && $image8888 !="png" && $image8888 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[33])&& $fields[33]!=''){
																				$image9 = $fields[33];
																				$image99 = pathinfo($image9);
																				$imagename999=$image99['filename'].".".$image99['extension'];
																				$image9999 = pathinfo($imagename999,PATHINFO_EXTENSION);;
																				if($image9999 != "jpg" && $image9999 !="png" && $image9999 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[34])&& $fields[34]!=''){
																				$image01 = $fields[34];
																				$image001 = pathinfo($image01);
																				$imagename0001=$image001['filename'].".".$image001['extension'];
																				$image00001 = pathinfo($imagename0001,PATHINFO_EXTENSION);;
																				if($image00001 != "jpg" && $image00001 !="png" && $image00001 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[35])&& $fields[35]!=''){
																				$image11 = $fields[35];
																				$image111 = pathinfo($image11);
																				$imagename1111=$image111['filename'].".".$image111['extension'];
																				$image11111 = pathinfo($imagename1111,PATHINFO_EXTENSION);;
																				if($image11111 != "jpg" && $image11111 !="png" && $image11111 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																				
																		}
																		if(isset($fields[36])&& $fields[36]!=''){
																				$image12 = $fields[36];
																				$image112 = pathinfo($image12);
																				$imagename1112=$image112['filename'].".".$image112['extension'];
																				$image11112 = pathinfo($imagename1112,PATHINFO_EXTENSION);;
																				if($image11112 != "jpg" && $image11112 !="png" && $image11112 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
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
																$path='/home/cartinhour/public_html/uploads/products/';
																//echo '<pre>';print_r($data);exit;
																	$image_link = $data[25];
																	$split_image = pathinfo($image_link);
																	$imagename=round(microtime(true)).$split_image['filename'].".".$split_image['extension'];
																	copy($data[25], $path.$imagename);
																	if(isset($data[26])&& $data[26]!=''){
																		$image_link1 = $data[26];
																		$split_image1 = pathinfo($image_link1);
																		$imagename1=round(microtime(true)).$split_image1['filename'].".".$split_image1['extension'];
																		copy($data[26], $path.$imagename1);
																	}
																	if(isset($data[27])&& $data[27]!=''){
																			$image_link2 = $data[27];
																			$split_image2 = pathinfo($image_link2);
																			$imagename2=round(microtime(true)).$split_image2['filename'].".".$split_image2['extension'];
																			copy($data[27], $path.$imagename2);
																	}
																	if(isset($data[28])&& $data[28]!=''){
																			$image_link3 = $data[28];
																			$split_image3 = pathinfo($image_link3);
																			$imagename3=round(microtime(true)).$split_image3['filename'].".".$split_image3['extension'];
																			copy($data[28], $path.$imagename3);
																			
																	}
																	if(isset($data[29])&& $data[29]!=''){
																			$image_link4 = $data[29];
																			$split_image4 = pathinfo($image_link4);
																			$imagename4=round(microtime(true)).$split_image4['filename'].".".$split_image4['extension'];
																			copy($data[29], $path.$imagename4);
																			
																	}
																	if(isset($data[30])&& $data[30]!=''){
																			$image_link5 = $data[30];
																			$split_image5 = pathinfo($image_link5);
																			$imagename5=round(microtime(true)).$split_image5['filename'].".".$split_image5['extension'];
																			copy($data[30], $path.$imagename5);
																			
																	}
																	if(isset($data[31])&& $data[31]!=''){
																		$image_link6 = $data[31];
																		$split_image6 = pathinfo($image_link6);
																		$imagename6=round(microtime(true)).$split_image6['filename'].".".$split_image6['extension'];
																		copy($data[31], $path.$imagename6);
																	
																	}
																	if(isset($data[32])&& $data[32]!=''){
																		$image_link7 = $data[32];
																		$split_image7 = pathinfo($image_link7);
																		$imagename7=round(microtime(true)).$split_image7['filename'].".".$split_image7['extension'];
																		copy($data[32], $path.$imagename7);
																	
																	}
																	if(isset($data[33])&& $data[33]!=''){
																			$image_link8 = $data[33];
																			$split_image8 = pathinfo($image_link8);
																			$imagename8=round(microtime(true)).$split_image8['filename'].".".$split_image8['extension'];
																			copy($data[33], $path.$imagename8);
																			
																	}
																	if(isset($data[34])&& $data[34]!=''){
																		$image_link9 = $data[34];
																		$split_image9 = pathinfo($image_link9);
																		$imagename9=round(microtime(true)).$split_image9['filename'].".".$split_image9['extension'];
																		copy($data[34], $path.$imagename9);
																	}
																	if(isset($data[35])&& $data[35]!=''){
																		$image_link10 = $data[35];
																		$split_image10 = pathinfo($image_link10);
																		$imagename10=round(microtime(true)).$split_image10['filename'].".".$split_image10['extension'];
																		copy($data[35], $path.$imagename10);
																	
																	}
																	if(isset($data[36])&& $data[36]!=''){
																		$image_link11 = $data[36];
																		$split_image11 = pathinfo($image_link11);
																		$imagename11=round(microtime(true)).$split_image11['filename'].".".$split_image11['extension'];
																		copy($data[36], $path.$imagename11);
																		
																	}
																	$discount= ($data[4]-$data[5]);
																	$offers= (($discount) /$data[4])*100;
																	$adddetails=array(
																			'category_id' => $post['category_ids'],			
																			'subcategory_id' =>$post['subcategory_ids'],
																			'seller_id' =>$this->session->userdata('seller_id'), 
																			'item_name' => isset($data[1])?$data[1]:'',
																			'skuid' => isset($data[2])?$data[2]:'',
																			'item_code' => isset($data[3])?$data[3]:'',
																			'item_cost' => isset($data[4])?$data[4]:'',
																			'special_price' => isset($data[5])?$data[5]:'',
																			'offers' =>isset($offers)?$offers:'',
																			'discount' =>isset($discount)?$discount:'',
																			'item_quantity' =>isset($data[8])?$data[8]:'',
																			'keywords' =>isset($data[9])?$data[9]:'',
																			'title' =>isset($data[10])?$data[10]:'',
																			'item_status' => isset($data[11])?$data[11]:'',
																			'item_description' =>isset($data[12])?$data[12]:'',
																			'item_sub_name' =>isset($data[13])?$data[13]:'',
																			'brand' =>isset($data[14])?$data[14]:'',
																			'ideal_for' =>isset($data[15])?$data[15]:'',
																			'producttype' =>isset($data[18])?$data[18]:'',
																			'wireless_speed' =>isset($data[19])?$data[19]:'',
																			'frequency_band' =>isset($data[20])?$data[20]:'',
																			'broadband_compatibility' =>isset($data[21])?$data[21]:'',
																			'usb_ports' =>isset($data[22])?$data[22]:'',
																			'frequency' =>isset($data[23])?$data[23]:'',
																			'antennae' =>isset($data[24])?$data[24]:'',
																			'item_image'=>isset($imagename)?$imagename:'',
																			'item_image1'=>isset($imagename1)?$imagename1:'',
																			'item_image2'=>isset($imagename2)?$imagename2:'',
																			'item_image3'=>isset($imagename3)?$imagename3:'',
																			'item_image4'=>isset($imagename4)?$imagename4:'',
																			'item_image5'=>isset($imagename5)?$imagename5:'',
																			'item_image6'=>isset($imagename6)?$imagename6:'',
																			'item_image7'=>isset($imagename7)?$imagename7:'',
																			'item_image8'=>isset($imagename8)?$imagename8:'',
																			'item_image9'=>isset($imagename9)?$imagename9:'',
																			'item_image10'=>isset($imagename10)?$imagename10:'',
																			'item_image11'=>isset($imagename11)?$imagename11:'',
																			'seller_location_area'=>$seller_location['area'],
																			'created_at'=>date('Y-m-d H:i:s'),

																		);
																		//echo '<pre>';print_r($adddetails);exit;
																			$results=$this->products_model->save_prodcts($adddetails);
																				if(count($results)>0){
																						/* for spcification purpose*/
																						$arr1=explode(",",$data[16]);
																						$arr2=explode(",",$data[17]);
																						foreach (array_combine($arr1,$arr2) as $key=>$list){
																							if($list!='' && $key!=''){
																							$addspc=array(
																							'item_id' =>$results,
																							'spc_name' => $key,
																							'spc_value' => $list,
																							'create_at' => date('Y-m-d H:i:s'),
																							);
																							$this->products_model->insert_product_spcifications($addspc);
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
									
								}else if($post['subcategory_ids']==39){
									
										 if(substr($_FILES['categoryfile']['name'], 0, 29)=='Electroniccategoryfilelaptops'){
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
																		
																		$totalfields[] = $fields;
																		if(empty($fields[1])) {
																			$data['errors'][]="Product name is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[1]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[1]))	  	
																			{
																			$data['errors'][]='Product name wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[2])){
																			$data['errors'][]="Sku code is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[2]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[2]))	  	
																			{
																			$data['errors'][]='Sku code wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}else{
																				$result = $this->products_model->get_skuid_exists($fields[2]);
																				if(count($result)>0){
																				$data['errors'][]="Sku code already exits .please use another Sku code. Row Id is :  ".$key.'<br>';
																				$error=1;	
																				}

																			}

																		}
																		if($fields[3]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[3]))	  	
																			{
																			$data['errors'][]='Other Unique code wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[4])) {
																			$data['errors'][]="Price is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[4]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[4]))	  	
																			{
																			$data['errors'][]='Price  can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[5])) {
																			$data['errors'][]="Special Price is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[5]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[5]))	  	
																			{
																			$data['errors'][]='Special Price  can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if($fields[5]>=$fields[4]){
																			$data['errors'][]="speacial price must be between 1 and".$fields[4].". Row Id is :  ".$key.'<br>';
																			$error=1;	
																		}
																		if(isset($fields[6]) && $fields[6]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[6]))	  	
																			{
																			$data['errors'][]='Offer can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[7]) && $fields[7]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[7]))	  	
																			{
																			$data['errors'][]='Discount can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[8])) {
																			$data['errors'][]="Qty is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[8]!=''){
																			$regex ="/^[0-9]+$/"; 
																			if(!preg_match( $regex, $fields[8]))
																			{
																			$data['errors'][]="Qty must be digits. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[9]) && $fields[9]!=''){
																			$regex ="/^[a-zA-Z0-9.-_& ]+$/"; 
																			if(!preg_match( $regex, $fields[9]))	  	
																			{
																			$data['errors'][]='Meta keywords can only consist of alphanumaric, space and dot. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[10]) && $fields[10]!=''){
																			$regex ="/^[a-zA-Z0-9.-_& ]+$/"; 
																			if(!preg_match( $regex, $fields[10]))	  	
																			{
																			$data['errors'][]='Meta title can only consist of alphanumaric, space and dot. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[11])) {
																			$data['errors'][]="Status is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[11]!=''){
																			$regex ="/^[0-1]+$/"; 
																			if(!preg_match( $regex, $fields[11]))
																			{
																			$data['errors'][]="Status must be  0 or 1. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[12])) {
																			$data['errors'][]="Product description is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[12]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[12]))	  	
																			{
																			$data['errors'][]='Product description wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[13])) {
																			$data['errors'][]="Sub Item is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[13]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[13]))	  	
																			{
																			$data['errors'][]='Sub Item wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[14])) {
																			$data['errors'][]="Brand is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[14]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[14]))	  	
																			{
																			$data['errors'][]='Brand wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[15]) && $fields[15]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[15]))
																			{
																			$data['errors'][]="Ideal for wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[16])) {
																			$data['errors'][]="Product specifications name is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[16]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[16]))	  	
																			{
																			$data['errors'][]='Product specifications name wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[17])) {
																			$data['errors'][]="Product specifications value is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[17]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[17]))	  	
																			{
																			$data['errors'][]='Product specifications value wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[18]) && $fields[18]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[18]))	  	
																			{
																			$data['errors'][]='Screen size wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[19])) {
																			$data['errors'][]="Processor is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[19]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[19]))	  	
																			{
																			$data['errors'][]='Processor wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[20]) && $fields[20]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[20]))	  	
																			{
																			$data['errors'][]='Processor Brand wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[21]) && $fields[21]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[21]))	  	
																			{
																			$data['errors'][]='Operating system wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[22]) && $fields[22]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[22]))	  	
																			{
																			$data['errors'][]='Ram wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[23])) {
																			$data['errors'][]="life Style is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[23]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[23]))	  	
																			{
																			$data['errors'][]='life Style wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[24]) && $fields[24]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[24]))	  	
																			{
																			$data['errors'][]='Storage type wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[25]) && $fields[25]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[25]))	  	
																			{
																			$data['errors'][]='Dedicated graphics memory wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[26])) {
																			$data['errors'][]="Touch screen is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[26]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[26]))	  	
																			{
																			$data['errors'][]='Touch screen wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[27])) {
																			$data['errors'][]="Weight is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[27]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[27]))	  	
																			{
																			$data['errors'][]='Weight wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[28]) && $fields[28]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[28]))	  	
																			{
																			$data['errors'][]='Hard disk capacity wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[29]) && $fields[29]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[29]))	  	
																			{
																			$data['errors'][]='Graphics memory type wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[30]) && $fields[30]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[30]))	  	
																			{
																			$data['errors'][]='Ram type wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		
																		if(empty($fields[31])) {
																			$data['errors'][]="Image is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[31]!=''){
																				$image_link = $fields[31];
																				$split_image1 = pathinfo($image_link);
																				$imagename=$split_image1['filename'].".".$split_image1['extension'];
																				$split_image = pathinfo($imagename,PATHINFO_EXTENSION);;
																				if($split_image != "jpg" && $split_image !="png" && $split_image != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[32])&& $fields[32]!=''){
																				$img1 = $fields[32];
																				$img12 = pathinfo($img1);
																				$imagename22=$img12['filename'].".".$img12['extension'];
																				$split_image212 = pathinfo($imagename22,PATHINFO_EXTENSION);;
																				if($split_image212 != "jpg" && $split_image212 !="png" && $split_image212 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[33])&& $fields[33]!=''){
																				$img2 = $fields[33];
																				$img122 = pathinfo($img2);
																				$imagename2233=$img122['filename'].".".$img122['extension'];
																				$image3 = pathinfo($imagename2233,PATHINFO_EXTENSION);;
																				if($image3 != "jpg" && $image3 !="png" && $image3 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[34])&& $fields[34]!=''){
																				$img4 = $fields[34];
																				$img133 = pathinfo($img4);
																				$imagename5656=$img133['filename'].".".$img133['extension'];
																				$image4 = pathinfo($imagename5656,PATHINFO_EXTENSION);;
																				if($image4 != "jpg" && $image4 !="png" && $image4 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[35])&& $fields[35]!=''){
																				$image5 = $fields[35];
																				$image55 = pathinfo($image5);
																				$imagename555=$image55['filename'].".".$image55['extension'];
																				$image5555 = pathinfo($imagename555,PATHINFO_EXTENSION);;
																				if($image5555 != "jpg" && $image5555 !="png" && $image5555 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[36])&& $fields[36]!=''){
																				$image6 = $fields[36];
																				$image66 = pathinfo($image6);
																				$imagename666=$image66['filename'].".".$image66['extension'];
																				$image6666 = pathinfo($imagename666,PATHINFO_EXTENSION);;
																				if($image6666 != "jpg" && $image6666 !="png" && $image6666 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[37])&& $fields[37]!=''){
																				$image7 = $fields[37];
																				$image77 = pathinfo($image7);
																				$imagename777=$image77['filename'].".".$image77['extension'];
																				$image7777 = pathinfo($imagename777,PATHINFO_EXTENSION);;
																				if($image7777 != "jpg" && $image7777 !="png" && $image7777 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[38])&& $fields[38]!=''){
																				$image8 = $fields[38];
																				$image88 = pathinfo($image8);
																				$imagename888=$image88['filename'].".".$image88['extension'];
																				$image8888 = pathinfo($imagename888,PATHINFO_EXTENSION);;
																				if($image8888 != "jpg" && $image8888 !="png" && $image8888 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[39])&& $fields[39]!=''){
																				$image9 = $fields[39];
																				$image99 = pathinfo($image9);
																				$imagename999=$image99['filename'].".".$image99['extension'];
																				$image9999 = pathinfo($imagename999,PATHINFO_EXTENSION);;
																				if($image9999 != "jpg" && $image9999 !="png" && $image9999 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[40])&& $fields[40]!=''){
																				$image01 = $fields[40];
																				$image001 = pathinfo($image01);
																				$imagename0001=$image001['filename'].".".$image001['extension'];
																				$image00001 = pathinfo($imagename0001,PATHINFO_EXTENSION);;
																				if($image00001 != "jpg" && $image00001 !="png" && $image00001 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[41])&& $fields[41]!=''){
																				$image11 = $fields[41];
																				$image111 = pathinfo($image11);
																				$imagename1111=$image111['filename'].".".$image111['extension'];
																				$image11111 = pathinfo($imagename1111,PATHINFO_EXTENSION);;
																				if($image11111 != "jpg" && $image11111 !="png" && $image11111 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																				
																		}
																		if(isset($fields[42])&& $fields[42]!=''){
																				$image12 = $fields[42];
																				$image112 = pathinfo($image12);
																				$imagename1112=$image112['filename'].".".$image112['extension'];
																				$image11112 = pathinfo($imagename1112,PATHINFO_EXTENSION);;
																				if($image11112 != "jpg" && $image11112 !="png" && $image11112 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
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
																$path='/home/cartinhour/public_html/uploads/products/';
																//echo '<pre>';print_r($data);exit;
																	$image_link = $data[31];
																	$split_image = pathinfo($image_link);
																	$imagename=round(microtime(true)).$split_image['filename'].".".$split_image['extension'];
																	copy($data[31], $path.$imagename);
																	if(isset($data[32])&& $data[32]!=''){
																		$image_link1 = $data[32];
																		$split_image1 = pathinfo($image_link1);
																		$imagename1=round(microtime(true)).$split_image1['filename'].".".$split_image1['extension'];
																		copy($data[32], $path.$imagename1);
																	}
																	if(isset($data[33])&& $data[33]!=''){
																			$image_link2 = $data[33];
																			$split_image2 = pathinfo($image_link2);
																			$imagename2=round(microtime(true)).$split_image2['filename'].".".$split_image2['extension'];
																			copy($data[33], $path.$imagename2);
																	}
																	if(isset($data[34])&& $data[34]!=''){
																			$image_link3 = $data[34];
																			$split_image3 = pathinfo($image_link3);
																			$imagename3=round(microtime(true)).$split_image3['filename'].".".$split_image3['extension'];
																			copy($data[34], $path.$imagename3);
																			
																	}
																	if(isset($data[35])&& $data[35]!=''){
																			$image_link4 = $data[35];
																			$split_image4 = pathinfo($image_link4);
																			$imagename4=round(microtime(true)).$split_image4['filename'].".".$split_image4['extension'];
																			copy($data[35], $path.$imagename4);
																			
																	}
																	if(isset($data[36])&& $data[36]!=''){
																			$image_link5 = $data[36];
																			$split_image5 = pathinfo($image_link5);
																			$imagename5=round(microtime(true)).$split_image5['filename'].".".$split_image5['extension'];
																			copy($data[36], $path.$imagename5);
																			
																	}
																	if(isset($data[37])&& $data[37]!=''){
																		$image_link6 = $data[37];
																		$split_image6 = pathinfo($image_link6);
																		$imagename6=round(microtime(true)).$split_image6['filename'].".".$split_image6['extension'];
																		copy($data[37], $path.$imagename6);
																	
																	}
																	if(isset($data[38])&& $data[38]!=''){
																		$image_link7 = $data[38];
																		$split_image7 = pathinfo($image_link7);
																		$imagename7=round(microtime(true)).$split_image7['filename'].".".$split_image7['extension'];
																		copy($data[38], $path.$imagename7);
																	
																	}
																	if(isset($data[39])&& $data[39]!=''){
																			$image_link8 = $data[39];
																			$split_image8 = pathinfo($image_link8);
																			$imagename8=round(microtime(true)).$split_image8['filename'].".".$split_image8['extension'];
																			copy($data[39], $path.$imagename8);
																			
																	}
																	if(isset($data[40])&& $data[40]!=''){
																		$image_link9 = $data[40];
																		$split_image9 = pathinfo($image_link9);
																		$imagename9=round(microtime(true)).$split_image9['filename'].".".$split_image9['extension'];
																		copy($data[40], $path.$imagename9);
																	}
																	if(isset($data[41])&& $data[41]!=''){
																		$image_link10 = $data[41];
																		$split_image10 = pathinfo($image_link10);
																		$imagename10=round(microtime(true)).$split_image10['filename'].".".$split_image10['extension'];
																		copy($data[41], $path.$imagename10);
																	
																	}
																	if(isset($data[42])&& $data[42]!=''){
																		$image_link11 = $data[42];
																		$split_image11 = pathinfo($image_link11);
																		$imagename11=round(microtime(true)).$split_image11['filename'].".".$split_image11['extension'];
																		copy($data[42], $path.$imagename11);
																		
																	}
																		$discount= ($data[4]-$data[5]);
																		$offers= (($discount) /$data[4])*100;
																	$adddetails=array(
																			'category_id' => $post['category_ids'],			
																			'subcategory_id' =>$post['subcategory_ids'],
																			'seller_id' =>$this->session->userdata('seller_id'), 
																			'item_name' =>isset($data[1])?$data[1]:'',
																			'skuid' => isset($data[2])?$data[2]:'',
																			'item_code' => isset($data[3])?$data[3]:'',
																			'item_cost' => isset($data[4])?$data[4]:'',
																			'special_price' => isset($data[5])?$data[5]:'',
																			'offers' =>isset($offers)?$offers:'',
																			'discount' =>isset($discount)?$discount:'',
																			'item_quantity' =>isset($data[8])?$data[8]:'',
																			'keywords' =>isset($data[9])?$data[9]:'',
																			'title' =>isset($data[10])?$data[10]:'',
																			'item_status' => isset($data[11])?$data[11]:'',
																			'item_description' =>isset($data[12])?$data[12]:'',
																			'item_sub_name' =>isset($data[13])?$data[13]:'',
																			'brand' =>isset($data[14])?$data[14]:'',
																			'ideal_for' =>isset($data[15])?$data[15]:'',
																			'display_size' =>isset($data[18])?$data[18]:'',
																			'processor' =>isset($data[19])?$data[19]:'',
																			'processor_brand' =>isset($data[20])?$data[20]:'',
																			'operatingsystem' =>isset($data[21])?$data[21]:'',
																			'ram' =>isset($data[22])?$data[22]:'',
																			'life_style' =>isset($data[23])?$data[23]:'',
																			'storage_type' =>isset($data[24])?$data[24]:'',
																			'graphics_memory' =>isset($data[25])?$data[25]:'',
																			'touch_screen' =>isset($data[26])?$data[26]:'',
																			'weight' =>isset($data[27])?$data[27]:'',
																			'internal_storage' =>isset($data[28])?$data[28]:'',
																			'memory_type' =>isset($data[29])?$data[29]:'',
																			'ram_type' =>isset($data[30])?$data[30]:'',
																			'item_image'=>isset($imagename)?$imagename:'',
																			'item_image1'=>isset($imagename1)?$imagename1:'',
																			'item_image2'=>isset($imagename2)?$imagename2:'',
																			'item_image3'=>isset($imagename3)?$imagename3:'',
																			'item_image4'=>isset($imagename4)?$imagename4:'',
																			'item_image5'=>isset($imagename5)?$imagename5:'',
																			'item_image6'=>isset($imagename6)?$imagename6:'',
																			'item_image7'=>isset($imagename7)?$imagename7:'',
																			'item_image8'=>isset($imagename8)?$imagename8:'',
																			'item_image9'=>isset($imagename9)?$imagename9:'',
																			'item_image10'=>isset($imagename10)?$imagename10:'',
																			'item_image11'=>isset($imagename11)?$imagename11:'',
																			'seller_location_area'=>$seller_location['area'],
																			'created_at'=>date('Y-m-d H:i:s'),

																		);
																		//echo '<pre>';print_r($adddetails);exit;
																			$results=$this->products_model->save_prodcts($adddetails);
																				if(count($results)>0){
																						/* for spcification purpose*/
																						$arr1=explode(",",$data[16]);
																						$arr2=explode(",",$data[17]);
																						foreach (array_combine($arr1,$arr2) as $key=>$list){
																							if($list!='' && $key!=''){
																							$addspc=array(
																							'item_id' =>$results,
																							'spc_name' => $key,
																							'spc_value' => $list,
																							'create_at' => date('Y-m-d H:i:s'),
																							);
																							$this->products_model->insert_product_spcifications($addspc);
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
									
									
							}else if($post['subcategory_ids']==40){
								
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
																		
																		$totalfields[] = $fields;
																		if(empty($fields[1])) {
																			$data['errors'][]="Product name is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[1]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[1]))	  	
																			{
																			$data['errors'][]='Product name wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[2])){
																			$data['errors'][]="Sku code is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[2]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[2]))	  	
																			{
																			$data['errors'][]='Sku code wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}else{
																				$result = $this->products_model->get_skuid_exists($fields[2]);
																				if(count($result)>0){
																				$data['errors'][]="Sku code already exits .please use another Sku code. Row Id is :  ".$key.'<br>';
																				$error=1;	
																				}

																			}

																		}
																		if(isset($fields[3]) && $fields[3]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[3]))	  	
																			{
																			$data['errors'][]='Other Unique code wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[4])) {
																			$data['errors'][]="Price is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[4]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[4]))	  	
																			{
																			$data['errors'][]='Price  can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[5])) {
																			$data['errors'][]="Special Price is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[5]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[5]))	  	
																			{
																			$data['errors'][]='Special Price  can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if($fields[5]>=$fields[4]){
																			$data['errors'][]="special price must be between 1 and".$fields[4].". Row Id is :  ".$key.'<br>';
																			$error=1;	
																		}
																		if(isset($fields[6]) && $fields[6]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[6]))	  	
																			{
																			$data['errors'][]='Offer can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[7]) && $fields[7]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[7]))	  	
																			{
																			$data['errors'][]='Discount can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[8])) {
																			$data['errors'][]="Qty is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[8]!=''){
																			$regex ="/^[0-9]+$/"; 
																			if(!preg_match( $regex, $fields[8]))
																			{
																			$data['errors'][]="Qty must be digits. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[9]) && $fields[9]!=''){
																			$regex ="/^[a-zA-Z0-9.-_& ]+$/"; 
																			if(!preg_match( $regex, $fields[9]))	  	
																			{
																			$data['errors'][]='Meta keywords can only consist of alphanumaric, space and dot. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[10]) && $fields[10]!=''){
																			$regex ="/^[a-zA-Z0-9.-_& ]+$/"; 
																			if(!preg_match( $regex, $fields[10]))	  	
																			{
																			$data['errors'][]='Meta title can only consist of alphanumaric, space and dot. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[11])) {
																			$data['errors'][]="Status is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[11]!=''){
																			$regex ="/^[0-1]+$/"; 
																			if(!preg_match( $regex, $fields[11]))
																			{
																			$data['errors'][]="Status must be  0 or 1. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[12])) {
																			$data['errors'][]="Product description is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[12]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[12]))	  	
																			{
																			$data['errors'][]='Product description wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[13])) {
																			$data['errors'][]="Sub Item is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[13]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[13]))	  	
																			{
																			$data['errors'][]='Sub Item wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[14])) {
																			$data['errors'][]="Brand is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[14]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[14]))	  	
																			{
																			$data['errors'][]='Brand wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(isset($fields[15]) && $fields[15]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[15]))
																			{
																			$data['errors'][]="Ideal for wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[16])) {
																			$data['errors'][]="Product specifications name is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[16]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[16]))	  	
																			{
																			$data['errors'][]='Product specifications name wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[17])) {
																			$data['errors'][]="Product specifications value is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[17]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[17]))	  	
																			{
																			$data['errors'][]='Product specifications value wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if($fields[18]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[18]))	  	
																			{
																			$data['errors'][]='Ram wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if($fields[19]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[19]))	  	
																			{
																			$data['errors'][]='Operating System wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if($fields[20]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[20]))	  	
																			{
																			$data['errors'][]='internal Storage wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if($fields[21]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[21]))	  	
																			{
																			$data['errors'][]='Screen size wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if($fields[22]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[22]))	  	
																			{
																			$data['errors'][]='Network type wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if($fields[23]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[23]))	  	
																			{
																			$data['errors'][]='Battery capacity wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if($fields[24]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[24]))	  	
																			{
																			$data['errors'][]='Speciality wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if($fields[25]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[25]))	  	
																			{
																			$data['errors'][]='Type wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if($fields[26]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[26]))	  	
																			{
																			$data['errors'][]='Operating system version name wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if($fields[27]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[27]))	  	
																			{
																			$data['errors'][]='Processor brand wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if($fields[28]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[28]))	  	
																			{
																			$data['errors'][]='Resolution type wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if($fields[29]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[29]))	  	
																			{
																			$data['errors'][]='Primary camera wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if($fields[30]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[30]))	  	
																			{
																			$data['errors'][]='Secondary camera wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if($fields[31]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[31]))	  	
																			{
																			$data['errors'][]='sim type wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if($fields[32]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[32]))	  	
																			{
																			$data['errors'][]='Clock Speed wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if($fields[33]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[33]))	  	
																			{
																			$data['errors'][]='No.of cores wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		
																		if($fields[34]!=''){
																				$image_link = $fields[34];
																				$split_image1 = pathinfo($image_link);
																				$imagename=$split_image1['filename'].".".$split_image1['extension'];
																				$split_image = pathinfo($imagename,PATHINFO_EXTENSION);;
																				if($split_image != "jpg" && $split_image !="png" && $split_image != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[35])&& $fields[35]!=''){
																				$img1 = $fields[35];
																				$img12 = pathinfo($img1);
																				$imagename22=$img12['filename'].".".$img12['extension'];
																				$split_image212 = pathinfo($imagename22,PATHINFO_EXTENSION);;
																				if($split_image212 != "jpg" && $split_image212 !="png" && $split_image212 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[36])&& $fields[36]!=''){
																				$img2 = $fields[36];
																				$img122 = pathinfo($img2);
																				$imagename2233=$img122['filename'].".".$img122['extension'];
																				$image3 = pathinfo($imagename2233,PATHINFO_EXTENSION);;
																				if($image3 != "jpg" && $image3 !="png" && $image3 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[37])&& $fields[37]!=''){
																				$img4 = $fields[37];
																				$img133 = pathinfo($img4);
																				$imagename5656=$img133['filename'].".".$img133['extension'];
																				$image4 = pathinfo($imagename5656,PATHINFO_EXTENSION);;
																				if($image4 != "jpg" && $image4 !="png" && $image4 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[38])&& $fields[38]!=''){
																				$image5 = $fields[38];
																				$image55 = pathinfo($image5);
																				$imagename555=$image55['filename'].".".$image55['extension'];
																				$image5555 = pathinfo($imagename555,PATHINFO_EXTENSION);;
																				if($image5555 != "jpg" && $image5555 !="png" && $image5555 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[39])&& $fields[39]!=''){
																				$image6 = $fields[39];
																				$image66 = pathinfo($image6);
																				$imagename666=$image66['filename'].".".$image66['extension'];
																				$image6666 = pathinfo($imagename666,PATHINFO_EXTENSION);;
																				if($image6666 != "jpg" && $image6666 !="png" && $image6666 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[40])&& $fields[40]!=''){
																				$image7 = $fields[40];
																				$image77 = pathinfo($image7);
																				$imagename777=$image77['filename'].".".$image77['extension'];
																				$image7777 = pathinfo($imagename777,PATHINFO_EXTENSION);;
																				if($image7777 != "jpg" && $image7777 !="png" && $image7777 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[41])&& $fields[41]!=''){
																				$image8 = $fields[41];
																				$image88 = pathinfo($image8);
																				$imagename888=$image88['filename'].".".$image88['extension'];
																				$image8888 = pathinfo($imagename888,PATHINFO_EXTENSION);;
																				if($image8888 != "jpg" && $image8888 !="png" && $image8888 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[42])&& $fields[42]!=''){
																				$image9 = $fields[42];
																				$image99 = pathinfo($image9);
																				$imagename999=$image99['filename'].".".$image99['extension'];
																				$image9999 = pathinfo($imagename999,PATHINFO_EXTENSION);;
																				if($image9999 != "jpg" && $image9999 !="png" && $image9999 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[43])&& $fields[43]!=''){
																				$image01 = $fields[43];
																				$image001 = pathinfo($image01);
																				$imagename0001=$image001['filename'].".".$image001['extension'];
																				$image00001 = pathinfo($imagename0001,PATHINFO_EXTENSION);;
																				if($image00001 != "jpg" && $image00001 !="png" && $image00001 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[44])&& $fields[44]!=''){
																				$image11 = $fields[44];
																				$image111 = pathinfo($image11);
																				$imagename1111=$image111['filename'].".".$image111['extension'];
																				$image11111 = pathinfo($imagename1111,PATHINFO_EXTENSION);;
																				if($image11111 != "jpg" && $image11111 !="png" && $image11111 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																				
																		}
																		if(isset($fields[45])&& $fields[45]!=''){
																				$image12 = $fields[45];
																				$image112 = pathinfo($image12);
																				$imagename1112=$image112['filename'].".".$image112['extension'];
																				$image11112 = pathinfo($imagename1112,PATHINFO_EXTENSION);;
																				if($image11112 != "jpg" && $image11112 !="png" && $image11112 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
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
																$path='/home/cartinhour/public_html/uploads/products/';
																//echo '<pre>';print_r($data);exit;
																	$image_link = $data[34];
																	$split_image = pathinfo($image_link);
																	$imagename=round(microtime(true)).$split_image['filename'].".".$split_image['extension'];
																	copy($data[34], $path.$imagename);
																	if(isset($data[35])&& $data[35]!=''){
																		$image_link1 = $data[35];
																		$split_image1 = pathinfo($image_link1);
																		$imagename1=round(microtime(true)).$split_image1['filename'].".".$split_image1['extension'];
																		copy($data[35], $path.$imagename1);
																	}
																	if(isset($data[36])&& $data[36]!=''){
																			$image_link2 = $data[36];
																			$split_image2 = pathinfo($image_link2);
																			$imagename2=round(microtime(true)).$split_image2['filename'].".".$split_image2['extension'];
																			copy($data[36], $path.$imagename2);
																	}
																	if(isset($data[37])&& $data[37]!=''){
																			$image_link3 = $data[37];
																			$split_image3 = pathinfo($image_link3);
																			$imagename3=round(microtime(true)).$split_image3['filename'].".".$split_image3['extension'];
																			copy($data[37], $path.$imagename3);
																			
																	}
																	if(isset($data[38])&& $data[38]!=''){
																			$image_link4 = $data[38];
																			$split_image4 = pathinfo($image_link4);
																			$imagename4=round(microtime(true)).$split_image4['filename'].".".$split_image4['extension'];
																			copy($data[38], $path.$imagename4);
																			
																	}
																	if(isset($data[39])&& $data[39]!=''){
																			$image_link5 = $data[39];
																			$split_image5 = pathinfo($image_link5);
																			$imagename5=round(microtime(true)).$split_image5['filename'].".".$split_image5['extension'];
																			copy($data[39], $path.$imagename5);
																			
																	}
																	if(isset($data[40])&& $data[40]!=''){
																		$image_link6 = $data[40];
																		$split_image6 = pathinfo($image_link6);
																		$imagename6=round(microtime(true)).$split_image6['filename'].".".$split_image6['extension'];
																		copy($data[40], $path.$imagename6);
																	
																	}
																	if(isset($data[41])&& $data[41]!=''){
																		$image_link7 = $data[41];
																		$split_image7 = pathinfo($image_link7);
																		$imagename7=round(microtime(true)).$split_image7['filename'].".".$split_image7['extension'];
																		copy($data[41], $path.$imagename7);
																	
																	}
																	if(isset($data[42])&& $data[42]!=''){
																			$image_link8 = $data[42];
																			$split_image8 = pathinfo($image_link8);
																			$imagename8=round(microtime(true)).$split_image8['filename'].".".$split_image8['extension'];
																			copy($data[42], $path.$imagename8);
																			
																	}
																	if(isset($data[43])&& $data[43]!=''){
																		$image_link9 = $data[43];
																		$split_image9 = pathinfo($image_link9);
																		$imagename9=round(microtime(true)).$split_image9['filename'].".".$split_image9['extension'];
																		copy($data[43], $path.$imagename9);
																	}
																	if(isset($data[44])&& $data[44]!=''){
																		$image_link10 = $data[44];
																		$split_image10 = pathinfo($image_link10);
																		$imagename10=round(microtime(true)).$split_image10['filename'].".".$split_image10['extension'];
																		copy($data[44], $path.$imagename10);
																	
																	}
																	if(isset($data[45])&& $data[45]!=''){
																		$image_link11 = $data[45];
																		$split_image11 = pathinfo($image_link11);
																		$imagename11=round(microtime(true)).$split_image11['filename'].".".$split_image11['extension'];
																		copy($data[45], $path.$imagename11);
																		
																	}
																	$discount= ($data[4]-$data[5]);
																	$offers= (($discount) /$data[4])*100;
																	$adddetails=array(
																			'category_id' => $post['category_ids'],			
																			'subcategory_id' =>$post['subcategory_ids'],
																			'seller_id' =>$this->session->userdata('seller_id'), 
																			'item_name' =>isset($data[1])?$data[1]:'',
																			'skuid' => isset($data[2])?$data[2]:'',
																			'item_code' => isset($data[3])?$data[3]:'',
																			'item_cost' => isset($data[4])?$data[4]:'',
																			'special_price' => isset($data[5])?$data[5]:'',
																			'offers' =>isset($offers)?$offers:'',
																			'discount' =>isset($discount)?$discount:'',
																			'item_quantity' =>isset($data[8])?$data[8]:'',
																			'keywords' =>isset($data[9])?$data[9]:'',
																			'title' =>isset($data[10])?$data[10]:'',
																			'item_status' => isset($data[11])?$data[11]:'',
																			'item_description' =>isset($data[12])?$data[12]:'',
																			'item_sub_name' =>isset($data[13])?$data[13]:'',
																			'brand' =>isset($data[14])?$data[14]:'',
																			'ideal_for' =>isset($data[15])?$data[15]:'',
																			'ram' =>isset($data[18])?$data[18]:'',
																			'operatingsystem' =>isset($data[19])?$data[19]:'',
																			'internal_storage' =>isset($data[20])?$data[20]:'',
																			'display_size' =>isset($data[21])?$data[21]:'',
																			'network_type' =>isset($data[22])?$data[22]:'',
																			'battery_capacity' =>isset($data[23])?$data[23]:'',
																			'speciality' =>isset($data[24])?$data[24]:'',
																			'producttype' =>isset($data[25])?$data[25]:'',
																			'operating_system_version_name' =>isset($data[26])?$data[26]:'',
																			'processor_brand' =>isset($data[27])?$data[27]:'',
																			'resolution_type' =>isset($data[28])?$data[28]:'',
																			'primary_camera' =>isset($data[29])?$data[29]:'',
																			'secondary_camera' =>isset($data[30])?$data[30]:'',
																			'sim_type' =>isset($data[31])?$data[31]:'',
																			'clock_speed' =>isset($data[32])?$data[32]:'',
																			'cores' =>isset($data[33])?$data[33]:'',
																			'item_image'=>isset($imagename)?$imagename:'',
																			'item_image1'=>isset($imagename1)?$imagename1:'',
																			'item_image2'=>isset($imagename2)?$imagename2:'',
																			'item_image3'=>isset($imagename3)?$imagename3:'',
																			'item_image4'=>isset($imagename4)?$imagename4:'',
																			'item_image5'=>isset($imagename5)?$imagename5:'',
																			'item_image6'=>isset($imagename6)?$imagename6:'',
																			'item_image7'=>isset($imagename7)?$imagename7:'',
																			'item_image8'=>isset($imagename8)?$imagename8:'',
																			'item_image9'=>isset($imagename9)?$imagename9:'',
																			'item_image10'=>isset($imagename10)?$imagename10:'',
																			'item_image11'=>isset($imagename11)?$imagename11:'',
																			'seller_location_area'=>$seller_location['area'],
																			'created_at'=>date('Y-m-d H:i:s'),

																		);
																		//echo '<pre>';print_r($adddetails);exit;
																			$results=$this->products_model->save_prodcts($adddetails);
																				if(count($results)>0){
																						/* for spcification purpose*/
																						$arr1=explode(",",$data[16]);
																						$arr2=explode(",",$data[17]);
																						foreach (array_combine($arr1,$arr2) as $key=>$list){
																							if($list!='' && $key!=''){
																							$addspc=array(
																							'item_id' =>$results,
																							'spc_name' => $key,
																							'spc_value' => $list,
																							'create_at' => date('Y-m-d H:i:s'),
																							);
																							$this->products_model->insert_product_spcifications($addspc);
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

						}else{
							/*fashion category*/
							if($post['subcategory_ids']==7 || $post['subcategory_ids']==9 || $post['subcategory_ids']==24 || $post['subcategory_ids']==26){
											
											if(substr($_FILES['categoryfile']['name'], 0, 25)=='Fashioncategoryfilebeauty'){
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
																		
																		$totalfields[] = $fields;
																		if(empty($fields[1])) {
																			$data['errors'][]="Product name is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[1]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[1]))	  	
																			{
																			$data['errors'][]='Product name wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[2])){
																			$data['errors'][]="Sku code is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[2]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[2]))	  	
																			{
																			$data['errors'][]='Sku code wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}else{
																				$result = $this->products_model->get_skuid_exists($fields[2]);
																				if(count($result)>0){
																				$data['errors'][]="Sku code already exits .please use another Sku code. Row Id is :  ".$key.'<br>';
																				$error=1;	
																				}

																			}

																		}
																		if(empty($fields[3])) {
																			$data['errors'][]="Other Unique code is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[3]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[3]))	  	
																			{
																			$data['errors'][]='Other Unique code wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[4])) {
																			$data['errors'][]="Price is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[4]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[4]))	  	
																			{
																			$data['errors'][]='Price  can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[5])) {
																			$data['errors'][]="Special Price is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[5]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[5]))	  	
																			{
																			$data['errors'][]='Special Price  can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if($fields[6]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[6]))	  	
																			{
																			$data['errors'][]='Offer can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if($fields[7]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[7]))	  	
																			{
																			$data['errors'][]='Discount can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[8])) {
																			$data['errors'][]="Qty is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[8]!=''){
																			$regex ="/^[0-9]+$/"; 
																			if(!preg_match( $regex, $fields[8]))
																			{
																			$data['errors'][]="Qty must be digits. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[9])) {
																			$data['errors'][]="Meta keywords is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[9]!=''){
																			$regex ="/^[a-zA-Z0-9.-_& ]+$/"; 
																			if(!preg_match( $regex, $fields[9]))	  	
																			{
																			$data['errors'][]='Meta keywords can only consist of alphanumaric, space and dot. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[10])) {
																			$data['errors'][]="Meta title is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[10]!=''){
																			$regex ="/^[a-zA-Z0-9.-_& ]+$/"; 
																			if(!preg_match( $regex, $fields[10]))	  	
																			{
																			$data['errors'][]='Meta title can only consist of alphanumaric, space and dot. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[11])) {
																			$data['errors'][]="Status is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[11]!=''){
																			$regex ="/^[0-1]+$/"; 
																			if(!preg_match( $regex, $fields[11]))
																			{
																			$data['errors'][]="Status must be  0 or 1. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[12])) {
																			$data['errors'][]="Product description is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[12]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[12]))	  	
																			{
																			$data['errors'][]='Product description wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[13])) {
																			$data['errors'][]="Sub Item is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[13]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[13]))	  	
																			{
																			$data['errors'][]='Sub Item wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[14])) {
																			$data['errors'][]="Brand is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[14]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[14]))	  	
																			{
																			$data['errors'][]='Brand wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[15])) {
																			$data['errors'][]="Ideal for required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[15]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[15]))
																			{
																			$data['errors'][]="Ideal for wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[16])) {
																			$data['errors'][]="Product specifications name is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[16]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[16]))	  	
																			{
																			$data['errors'][]='Product specifications name wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[17])) {
																			$data['errors'][]="Product specifications value is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[17]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[17]))	  	
																			{
																			$data['errors'][]='Product specifications value wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[18])) {
																			$data['errors'][]="Image is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[18]!=''){
																				$image_link = $fields[18];
																				$split_image1 = pathinfo($image_link);
																				$imagename=$split_image1['filename'].".".$split_image1['extension'];
																				$split_image = pathinfo($imagename,PATHINFO_EXTENSION);;
																				if($split_image != "jpg" && $split_image !="png" && $split_image != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[19])&& $fields[19]!=''){
																				$img1 = $fields[19];
																				$img12 = pathinfo($img1);
																				$imagename22=$img12['filename'].".".$img12['extension'];
																				$split_image212 = pathinfo($imagename22,PATHINFO_EXTENSION);;
																				if($split_image212 != "jpg" && $split_image212 !="png" && $split_image212 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[20])&& $fields[20]!=''){
																				$img2 = $fields[20];
																				$img122 = pathinfo($img2);
																				$imagename2233=$img122['filename'].".".$img122['extension'];
																				$image3 = pathinfo($imagename2233,PATHINFO_EXTENSION);;
																				if($image3 != "jpg" && $image3 !="png" && $image3 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[21])&& $fields[21]!=''){
																				$img4 = $fields[21];
																				$img133 = pathinfo($img4);
																				$imagename5656=$img133['filename'].".".$img133['extension'];
																				$image4 = pathinfo($imagename5656,PATHINFO_EXTENSION);;
																				if($image4 != "jpg" && $image4 !="png" && $image4 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[22])&& $fields[22]!=''){
																				$image5 = $fields[22];
																				$image55 = pathinfo($image5);
																				$imagename555=$image55['filename'].".".$image55['extension'];
																				$image5555 = pathinfo($imagename555,PATHINFO_EXTENSION);;
																				if($image5555 != "jpg" && $image5555 !="png" && $image5555 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[23])&& $fields[23]!=''){
																				$image6 = $fields[23];
																				$image66 = pathinfo($image6);
																				$imagename666=$image66['filename'].".".$image66['extension'];
																				$image6666 = pathinfo($imagename666,PATHINFO_EXTENSION);;
																				if($image6666 != "jpg" && $image6666 !="png" && $image6666 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[24])&& $fields[24]!=''){
																				$image7 = $fields[24];
																				$image77 = pathinfo($image7);
																				$imagename777=$image77['filename'].".".$image77['extension'];
																				$image7777 = pathinfo($imagename777,PATHINFO_EXTENSION);;
																				if($image7777 != "jpg" && $image7777 !="png" && $image7777 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[25])&& $fields[25]!=''){
																				$image8 = $fields[25];
																				$image88 = pathinfo($image8);
																				$imagename888=$image88['filename'].".".$image88['extension'];
																				$image8888 = pathinfo($imagename888,PATHINFO_EXTENSION);;
																				if($image8888 != "jpg" && $image8888 !="png" && $image8888 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[26])&& $fields[26]!=''){
																				$image9 = $fields[26];
																				$image99 = pathinfo($image9);
																				$imagename999=$image99['filename'].".".$image99['extension'];
																				$image9999 = pathinfo($imagename999,PATHINFO_EXTENSION);;
																				if($image9999 != "jpg" && $image9999 !="png" && $image9999 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[27])&& $fields[27]!=''){
																				$image01 = $fields[27];
																				$image001 = pathinfo($image01);
																				$imagename0001=$image001['filename'].".".$image001['extension'];
																				$image00001 = pathinfo($imagename0001,PATHINFO_EXTENSION);;
																				if($image00001 != "jpg" && $image00001 !="png" && $image00001 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[28])&& $fields[28]!=''){
																				$image11 = $fields[28];
																				$image111 = pathinfo($image11);
																				$imagename1111=$image111['filename'].".".$image111['extension'];
																				$image11111 = pathinfo($imagename1111,PATHINFO_EXTENSION);;
																				if($image11111 != "jpg" && $image11111 !="png" && $image11111 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																				
																		}
																		if(isset($fields[29])&& $fields[29]!=''){
																				$image12 = $fields[29];
																				$image112 = pathinfo($image12);
																				$imagename1112=$image112['filename'].".".$image112['extension'];
																				$image11112 = pathinfo($imagename1112,PATHINFO_EXTENSION);;
																				if($image11112 != "jpg" && $image11112 !="png" && $image11112 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
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
																$path='/home/cartinhour/public_html/uploads/products/';
																//echo '<pre>';print_r($data);exit;
																	$image_link = $data[18];
																	$split_image = pathinfo($image_link);
																	$imagename=round(microtime(true)).$split_image['filename'].".".$split_image['extension'];
																	copy($data[18], $path.$imagename);
																	if(isset($data[19])&& $data[19]!=''){
																		$image_link1 = $data[19];
																		$split_image1 = pathinfo($image_link1);
																		$imagename1=round(microtime(true)).$split_image1['filename'].".".$split_image1['extension'];
																		copy($data[19], $path.$imagename1);
																	}
																	if(isset($data[20])&& $data[20]!=''){
																			$image_link2 = $data[20];
																			$split_image2 = pathinfo($image_link2);
																			$imagename2=round(microtime(true)).$split_image2['filename'].".".$split_image2['extension'];
																			copy($data[20], $path.$imagename2);
																	}
																	if(isset($data[21])&& $data[21]!=''){
																			$image_link3 = $data[21];
																			$split_image3 = pathinfo($image_link3);
																			$imagename3=round(microtime(true)).$split_image3['filename'].".".$split_image3['extension'];
																			copy($data[21], $path.$imagename3);
																			
																	}
																	if(isset($data[22])&& $data[22]!=''){
																			$image_link4 = $data[22];
																			$split_image4 = pathinfo($image_link4);
																			$imagename4=round(microtime(true)).$split_image4['filename'].".".$split_image4['extension'];
																			copy($data[22], $path.$imagename4);
																			
																	}
																	if(isset($data[23])&& $data[23]!=''){
																			$image_link5 = $data[23];
																			$split_image5 = pathinfo($image_link5);
																			$imagename5=round(microtime(true)).$split_image5['filename'].".".$split_image5['extension'];
																			copy($data[23], $path.$imagename5);
																			
																	}
																	if(isset($data[24])&& $data[24]!=''){
																		$image_link6 = $data[24];
																		$split_image6 = pathinfo($image_link6);
																		$imagename6=round(microtime(true)).$split_image6['filename'].".".$split_image6['extension'];
																		copy($data[24], $path.$imagename6);
																	
																	}
																	if(isset($data[25])&& $data[25]!=''){
																		$image_link7 = $data[25];
																		$split_image7 = pathinfo($image_link7);
																		$imagename7=round(microtime(true)).$split_image7['filename'].".".$split_image7['extension'];
																		copy($data[25], $path.$imagename7);
																	
																	}
																	if(isset($data[26])&& $data[26]!=''){
																			$image_link8 = $data[26];
																			$split_image8 = pathinfo($image_link8);
																			$imagename8=round(microtime(true)).$split_image8['filename'].".".$split_image8['extension'];
																			copy($data[26], $path.$imagename8);
																			
																	}
																	if(isset($data[27])&& $data[27]!=''){
																		$image_link9 = $data[27];
																		$split_image9 = pathinfo($image_link9);
																		$imagename9=round(microtime(true)).$split_image9['filename'].".".$split_image9['extension'];
																		copy($data[27], $path.$imagename9);
																	}
																	if(isset($data[28])&& $data[28]!=''){
																		$image_link10 = $data[28];
																		$split_image10 = pathinfo($image_link10);
																		$imagename10=round(microtime(true)).$split_image10['filename'].".".$split_image10['extension'];
																		copy($data[28], $path.$imagename10);
																	
																	}
																	if(isset($data[29])&& $data[29]!=''){
																		$image_link11 = $data[29];
																		$split_image11 = pathinfo($image_link11);
																		$imagename11=round(microtime(true)).$split_image11['filename'].".".$split_image11['extension'];
																		copy($data[29], $path.$imagename11);
																		
																	}
																	
																	$adddetails=array(
																			'category_id' => $post['category_ids'],			
																			'subcategory_id' =>$post['subcategory_ids'],
																			'seller_id' =>$this->session->userdata('seller_id'), 
																			'item_name' => $data[1],
																			'skuid' => $data[2],
																			'item_code' => $data[3],
																			'item_cost' => $data[4],
																			'special_price' => $data[5],
																			'offers' =>$data[6],
																			'discount' =>$data[7],
																			'item_quantity' =>$data[8],
																			'keywords' =>$data[9],
																			'title' =>$data[10],
																			'item_status' => $data[11],
																			'item_description' =>$data[12],
																			'item_sub_name' =>$data[13],
																			'brand' =>$data[14],
																			'ideal_for' =>$data[15],
																			'item_image'=>isset($imagename)?$imagename:'',
																			'item_image1'=>isset($imagename1)?$imagename1:'',
																			'item_image2'=>isset($imagename2)?$imagename2:'',
																			'item_image3'=>isset($imagename3)?$imagename3:'',
																			'item_image4'=>isset($imagename4)?$imagename4:'',
																			'item_image5'=>isset($imagename5)?$imagename5:'',
																			'item_image6'=>isset($imagename6)?$imagename6:'',
																			'item_image7'=>isset($imagename7)?$imagename7:'',
																			'item_image8'=>isset($imagename8)?$imagename8:'',
																			'item_image9'=>isset($imagename9)?$imagename9:'',
																			'item_image10'=>isset($imagename10)?$imagename10:'',
																			'item_image11'=>isset($imagename11)?$imagename11:'',
																			'seller_location_area'=>$seller_location['area'],
																			'created_at'=>date('Y-m-d H:i:s'),

																		);
																		//echo '<pre>';print_r($adddetails);exit;
																			$results=$this->products_model->save_prodcts($adddetails);
																				if(count($results)>0){
																						/* for spcification purpose*/
																						$arr1=explode(",",$data[16]);
																						$arr2=explode(",",$data[17]);
																						foreach (array_combine($arr1,$arr2) as $key=>$list){
																							if($list!='' && $key!=''){
																							$addspc=array(
																							'item_id' =>$results,
																							'spc_name' => $key,
																							'spc_value' => $list,
																							'create_at' => date('Y-m-d H:i:s'),
																							);
																							$this->products_model->insert_product_spcifications($addspc);
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
									
								
							}else if($post['subcategory_ids']==888){
								
									if(substr($_FILES['categoryfile']['name'], 0, 25)=='Fashioncategoryfilewinter'){
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
																		
																		$totalfields[] = $fields;
																		if(empty($fields[1])) {
																			$data['errors'][]="Product name is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[1]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[1]))	  	
																			{
																			$data['errors'][]='Product name wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[2])){
																			$data['errors'][]="Sku code is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[2]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[2]))	  	
																			{
																			$data['errors'][]='Sku code wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}else{
																				$result = $this->products_model->get_skuid_exists($fields[2]);
																				if(count($result)>0){
																				$data['errors'][]="Sku code already exits .please use another Sku code. Row Id is :  ".$key.'<br>';
																				$error=1;	
																				}

																			}

																		}
																		if(empty($fields[3])) {
																			$data['errors'][]="Other Unique code is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[3]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[3]))	  	
																			{
																			$data['errors'][]='Other Unique code wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[4])) {
																			$data['errors'][]="Price is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[4]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[4]))	  	
																			{
																			$data['errors'][]='Price  can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[5])) {
																			$data['errors'][]="Special Price is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[5]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[5]))	  	
																			{
																			$data['errors'][]='Special Price  can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if($fields[6]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[6]))	  	
																			{
																			$data['errors'][]='Offer can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if($fields[7]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[7]))	  	
																			{
																			$data['errors'][]='Discount can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[8])) {
																			$data['errors'][]="Qty is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[8]!=''){
																			$regex ="/^[0-9]+$/"; 
																			if(!preg_match( $regex, $fields[8]))
																			{
																			$data['errors'][]="Qty must be digits. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[9])) {
																			$data['errors'][]="Meta keywords is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[9]!=''){
																			$regex ="/^[a-zA-Z0-9.-_& ]+$/"; 
																			if(!preg_match( $regex, $fields[9]))	  	
																			{
																			$data['errors'][]='Meta keywords can only consist of alphanumaric, space and dot. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[10])) {
																			$data['errors'][]="Meta title is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[10]!=''){
																			$regex ="/^[a-zA-Z0-9.-_& ]+$/"; 
																			if(!preg_match( $regex, $fields[10]))	  	
																			{
																			$data['errors'][]='Meta title can only consist of alphanumaric, space and dot. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[11])) {
																			$data['errors'][]="Status is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[11]!=''){
																			$regex ="/^[0-1]+$/"; 
																			if(!preg_match( $regex, $fields[11]))
																			{
																			$data['errors'][]="Status must be  0 or 1. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[12])) {
																			$data['errors'][]="Product description is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[12]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[12]))	  	
																			{
																			$data['errors'][]='Product description wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[13])) {
																			$data['errors'][]="Sub Item is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[13]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[13]))	  	
																			{
																			$data['errors'][]='Sub Item wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[14])) {
																			$data['errors'][]="Brand is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[14]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[14]))	  	
																			{
																			$data['errors'][]='Brand wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[15])) {
																			$data['errors'][]="Ideal for required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[15]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[15]))
																			{
																			$data['errors'][]="Ideal for wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[16])) {
																			$data['errors'][]="Product specifications name is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[16]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[16]))	  	
																			{
																			$data['errors'][]='Product specifications name wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[17])) {
																			$data['errors'][]="Product specifications value is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[17]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[17]))	  	
																			{
																			$data['errors'][]='Product specifications value wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[18])) {
																			$data['errors'][]="Sizes is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[18]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[18]))	  	
																			{
																			$data['errors'][]='Sizes wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[19])) {
																			$data['errors'][]="Sizes is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[19]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[19]))	  	
																			{
																			$data['errors'][]='Sizes wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[20])) {
																			$data['errors'][]="Image is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[20]!=''){
																				$image_link = $fields[20];
																				$split_image1 = pathinfo($image_link);
																				$imagename=$split_image1['filename'].".".$split_image1['extension'];
																				$split_image = pathinfo($imagename,PATHINFO_EXTENSION);;
																				if($split_image != "jpg" && $split_image !="png" && $split_image != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[21])&& $fields[21]!=''){
																				$img1 = $fields[21];
																				$img12 = pathinfo($img1);
																				$imagename22=$img12['filename'].".".$img12['extension'];
																				$split_image212 = pathinfo($imagename22,PATHINFO_EXTENSION);;
																				if($split_image212 != "jpg" && $split_image212 !="png" && $split_image212 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[22])&& $fields[22]!=''){
																				$img2 = $fields[22];
																				$img122 = pathinfo($img2);
																				$imagename2233=$img122['filename'].".".$img122['extension'];
																				$image3 = pathinfo($imagename2233,PATHINFO_EXTENSION);;
																				if($image3 != "jpg" && $image3 !="png" && $image3 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[23])&& $fields[23]!=''){
																				$img4 = $fields[23];
																				$img133 = pathinfo($img4);
																				$imagename5656=$img133['filename'].".".$img133['extension'];
																				$image4 = pathinfo($imagename5656,PATHINFO_EXTENSION);;
																				if($image4 != "jpg" && $image4 !="png" && $image4 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[24])&& $fields[24]!=''){
																				$image5 = $fields[24];
																				$image55 = pathinfo($image5);
																				$imagename555=$image55['filename'].".".$image55['extension'];
																				$image5555 = pathinfo($imagename555,PATHINFO_EXTENSION);;
																				if($image5555 != "jpg" && $image5555 !="png" && $image5555 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[25])&& $fields[25]!=''){
																				$image6 = $fields[25];
																				$image66 = pathinfo($image6);
																				$imagename666=$image66['filename'].".".$image66['extension'];
																				$image6666 = pathinfo($imagename666,PATHINFO_EXTENSION);;
																				if($image6666 != "jpg" && $image6666 !="png" && $image6666 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[26])&& $fields[26]!=''){
																				$image7 = $fields[26];
																				$image77 = pathinfo($image7);
																				$imagename777=$image77['filename'].".".$image77['extension'];
																				$image7777 = pathinfo($imagename777,PATHINFO_EXTENSION);;
																				if($image7777 != "jpg" && $image7777 !="png" && $image7777 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[27])&& $fields[27]!=''){
																				$image8 = $fields[27];
																				$image88 = pathinfo($image8);
																				$imagename888=$image88['filename'].".".$image88['extension'];
																				$image8888 = pathinfo($imagename888,PATHINFO_EXTENSION);;
																				if($image8888 != "jpg" && $image8888 !="png" && $image8888 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[28])&& $fields[28]!=''){
																				$image9 = $fields[28];
																				$image99 = pathinfo($image9);
																				$imagename999=$image99['filename'].".".$image99['extension'];
																				$image9999 = pathinfo($imagename999,PATHINFO_EXTENSION);;
																				if($image9999 != "jpg" && $image9999 !="png" && $image9999 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[29])&& $fields[29]!=''){
																				$image01 = $fields[29];
																				$image001 = pathinfo($image01);
																				$imagename0001=$image001['filename'].".".$image001['extension'];
																				$image00001 = pathinfo($imagename0001,PATHINFO_EXTENSION);;
																				if($image00001 != "jpg" && $image00001 !="png" && $image00001 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[30])&& $fields[30]!=''){
																				$image11 = $fields[30];
																				$image111 = pathinfo($image11);
																				$imagename1111=$image111['filename'].".".$image111['extension'];
																				$image11111 = pathinfo($imagename1111,PATHINFO_EXTENSION);;
																				if($image11111 != "jpg" && $image11111 !="png" && $image11111 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																				
																		}
																		if(isset($fields[31])&& $fields[31]!=''){
																				$image12 = $fields[31];
																				$image112 = pathinfo($image12);
																				$imagename1112=$image112['filename'].".".$image112['extension'];
																				$image11112 = pathinfo($imagename1112,PATHINFO_EXTENSION);;
																				if($image11112 != "jpg" && $image11112 !="png" && $image11112 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
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
																$path='/home/cartinhour/public_html/uploads/products/';
																//echo '<pre>';print_r($data);exit;
																	$image_link = $data[20];
																	$split_image = pathinfo($image_link);
																	$imagename=round(microtime(true)).$split_image['filename'].".".$split_image['extension'];
																	copy($data[20], $path.$imagename);
																	if(isset($data[21])&& $data[21]!=''){
																		$image_link1 = $data[21];
																		$split_image1 = pathinfo($image_link1);
																		$imagename1=round(microtime(true)).$split_image1['filename'].".".$split_image1['extension'];
																		copy($data[21], $path.$imagename1);
																	}
																	if(isset($data[22])&& $data[22]!=''){
																			$image_link2 = $data[22];
																			$split_image2 = pathinfo($image_link2);
																			$imagename2=round(microtime(true)).$split_image2['filename'].".".$split_image2['extension'];
																			copy($data[22], $path.$imagename2);
																	}
																	if(isset($data[23])&& $data[23]!=''){
																			$image_link3 = $data[23];
																			$split_image3 = pathinfo($image_link3);
																			$imagename3=round(microtime(true)).$split_image3['filename'].".".$split_image3['extension'];
																			copy($data[23], $path.$imagename3);
																			
																	}
																	if(isset($data[24])&& $data[24]!=''){
																			$image_link4 = $data[24];
																			$split_image4 = pathinfo($image_link4);
																			$imagename4=round(microtime(true)).$split_image4['filename'].".".$split_image4['extension'];
																			copy($data[24], $path.$imagename4);
																			
																	}
																	if(isset($data[25])&& $data[25]!=''){
																			$image_link5 = $data[25];
																			$split_image5 = pathinfo($image_link5);
																			$imagename5=round(microtime(true)).$split_image5['filename'].".".$split_image5['extension'];
																			copy($data[25], $path.$imagename5);
																			
																	}
																	if(isset($data[26])&& $data[26]!=''){
																		$image_link6 = $data[26];
																		$split_image6 = pathinfo($image_link6);
																		$imagename6=round(microtime(true)).$split_image6['filename'].".".$split_image6['extension'];
																		copy($data[26], $path.$imagename6);
																	
																	}
																	if(isset($data[27])&& $data[27]!=''){
																		$image_link7 = $data[27];
																		$split_image7 = pathinfo($image_link7);
																		$imagename7=round(microtime(true)).$split_image7['filename'].".".$split_image7['extension'];
																		copy($data[27], $path.$imagename7);
																	
																	}
																	if(isset($data[28])&& $data[28]!=''){
																			$image_link8 = $data[28];
																			$split_image8 = pathinfo($image_link8);
																			$imagename8=round(microtime(true)).$split_image8['filename'].".".$split_image8['extension'];
																			copy($data[28], $path.$imagename8);
																			
																	}
																	if(isset($data[29])&& $data[29]!=''){
																		$image_link9 = $data[29];
																		$split_image9 = pathinfo($image_link9);
																		$imagename9=round(microtime(true)).$split_image9['filename'].".".$split_image9['extension'];
																		copy($data[29], $path.$imagename9);
																	}
																	if(isset($data[30])&& $data[30]!=''){
																		$image_link10 = $data[30];
																		$split_image10 = pathinfo($image_link10);
																		$imagename10=round(microtime(true)).$split_image10['filename'].".".$split_image10['extension'];
																		copy($data[30], $path.$imagename10);
																	
																	}
																	if(isset($data[31])&& $data[31]!=''){
																		$image_link11 = $data[31];
																		$split_image11 = pathinfo($image_link11);
																		$imagename11=round(microtime(true)).$split_image11['filename'].".".$split_image11['extension'];
																		copy($data[31], $path.$imagename11);
																		
																	}
																	
																	$adddetails=array(
																			'category_id' => $post['category_ids'],			
																			'subcategory_id' =>$post['subcategory_ids'],
																			'seller_id' =>$this->session->userdata('seller_id'), 
																			'item_name' => $data[1],
																			'skuid' => $data[2],
																			'item_code' => $data[3],
																			'item_cost' => $data[4],
																			'special_price' => $data[5],
																			'offers' =>$data[6],
																			'discount' =>$data[7],
																			'item_quantity' =>$data[8],
																			'keywords' =>$data[9],
																			'title' =>$data[10],
																			'item_status' => $data[11],
																			'item_description' =>$data[12],
																			'item_sub_name' =>$data[13],
																			'brand' =>$data[14],
																			'ideal_for' =>$data[15],
																			'item_image'=>isset($imagename)?$imagename:'',
																			'item_image1'=>isset($imagename1)?$imagename1:'',
																			'item_image2'=>isset($imagename2)?$imagename2:'',
																			'item_image3'=>isset($imagename3)?$imagename3:'',
																			'item_image4'=>isset($imagename4)?$imagename4:'',
																			'item_image5'=>isset($imagename5)?$imagename5:'',
																			'item_image6'=>isset($imagename6)?$imagename6:'',
																			'item_image7'=>isset($imagename7)?$imagename7:'',
																			'item_image8'=>isset($imagename8)?$imagename8:'',
																			'item_image9'=>isset($imagename9)?$imagename9:'',
																			'item_image10'=>isset($imagename10)?$imagename10:'',
																			'item_image11'=>isset($imagename11)?$imagename11:'',
																			'seller_location_area'=>$seller_location['area'],
																			'created_at'=>date('Y-m-d H:i:s'),

																		);
																		//echo '<pre>';print_r($adddetails);exit;
																			$results=$this->products_model->save_prodcts($adddetails);
																				if(count($results)>0){
																						/* for spcification purpose*/
																						$arr1=explode(",",$data[16]);
																						$arr2=explode(",",$data[17]);
																						foreach (array_combine($arr1,$arr2) as $key=>$list){
																							if($list!='' && $key!=''){
																							$addspc=array(
																							'item_id' =>$results,
																							'spc_name' => $key,
																							'spc_value' => $list,
																							'create_at' => date('Y-m-d H:i:s'),
																							);
																							$this->products_model->insert_product_spcifications($addspc);
																							}
																						}
																						/* for spcification purpose*/
																						/*FOR COLOR*/
																						foreach(explode(",",$data[19]) as $listcolors){
																							if($listcolors !=''){
																									$addcolorsdata=array(
																									'item_id' =>$results,
																									'color_name' => $listcolors,
																									'create_at' => date('Y-m-d H:i:s'),
																									);
																							$this->products_model->insert_product_colors($addcolorsdata);
																							}
																						}
																						/*FOR COLOR*/
																						/* sizes*/
																						foreach(explode(",",$data[18]) as $listsizes){
																							if($listsizes !=''){
																								$addsizesdata=array(
																								'item_id' =>$results,
																								'p_size_name' => $listsizes,
																								'create_at' => date('Y-m-d H:i:s'),
																								);
																								$this->products_model->insert_product_sizes($addsizesdata);
																								}
																							}
																						/* sizes*/
																						
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
										$this->session->set_flashdata('error','Your are uploaded  wrong File. Please upload correct file!');
										redirect('/seller/products/create');
									}
									
								
								
							}else if($post['subcategory_ids']==10){
										if(substr($_FILES['categoryfile']['name'], 0, 31)=='Fashioncategoryfilesmartwatches'){
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
																		
																		$totalfields[] = $fields;
																		if(empty($fields[1])) {
																			$data['errors'][]="Product name is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[1]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[1]))	  	
																			{
																			$data['errors'][]='Product name wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[2])){
																			$data['errors'][]="Sku code is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[2]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[2]))	  	
																			{
																			$data['errors'][]='Sku code wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}else{
																				$result = $this->products_model->get_skuid_exists($fields[2]);
																				if(count($result)>0){
																				$data['errors'][]="Sku code already exits .please use another Sku code. Row Id is :  ".$key.'<br>';
																				$error=1;	
																				}

																			}

																		}
																		if(empty($fields[3])) {
																			$data['errors'][]="Other Unique code is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[3]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[3]))	  	
																			{
																			$data['errors'][]='Other Unique code wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[4])) {
																			$data['errors'][]="Price is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[4]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[4]))	  	
																			{
																			$data['errors'][]='Price  can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[5])) {
																			$data['errors'][]="Special Price is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[5]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[5]))	  	
																			{
																			$data['errors'][]='Special Price  can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if($fields[6]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[6]))	  	
																			{
																			$data['errors'][]='Offer can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if($fields[7]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[7]))	  	
																			{
																			$data['errors'][]='Discount can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[8])) {
																			$data['errors'][]="Qty is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[8]!=''){
																			$regex ="/^[0-9]+$/"; 
																			if(!preg_match( $regex, $fields[8]))
																			{
																			$data['errors'][]="Qty must be digits. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[9])) {
																			$data['errors'][]="Meta keywords is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[9]!=''){
																			$regex ="/^[a-zA-Z0-9.-_& ]+$/"; 
																			if(!preg_match( $regex, $fields[9]))	  	
																			{
																			$data['errors'][]='Meta keywords can only consist of alphanumaric, space and dot. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[10])) {
																			$data['errors'][]="Meta title is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[10]!=''){
																			$regex ="/^[a-zA-Z0-9.-_& ]+$/"; 
																			if(!preg_match( $regex, $fields[10]))	  	
																			{
																			$data['errors'][]='Meta title can only consist of alphanumaric, space and dot. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[11])) {
																			$data['errors'][]="Status is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[11]!=''){
																			$regex ="/^[0-1]+$/"; 
																			if(!preg_match( $regex, $fields[11]))
																			{
																			$data['errors'][]="Status must be  0 or 1. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[12])) {
																			$data['errors'][]="Product description is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[12]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[12]))	  	
																			{
																			$data['errors'][]='Product description wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[13])) {
																			$data['errors'][]="Sub Item is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[13]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[13]))	  	
																			{
																			$data['errors'][]='Sub Item wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[14])) {
																			$data['errors'][]="Brand is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[14]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[14]))	  	
																			{
																			$data['errors'][]='Brand wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[15])) {
																			$data['errors'][]="Ideal for required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[15]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[15]))
																			{
																			$data['errors'][]="Ideal for wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[16])) {
																			$data['errors'][]="Product specifications name is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[16]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[16]))	  	
																			{
																			$data['errors'][]='Product specifications name wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[17])) {
																			$data['errors'][]="Product specifications value is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[17]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[17]))	  	
																			{
																			$data['errors'][]='Product specifications value wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[18])) {
																			$data['errors'][]="Dial shape is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[18]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[18]))	  	
																			{
																			$data['errors'][]='Dial shape wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[19])) {
																			$data['errors'][]="Compatible os is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[19]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[19]))	  	
																			{
																			$data['errors'][]='Compatible os wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[20])) {
																			$data['errors'][]="usage is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[20]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[20]))	  	
																			{
																			$data['errors'][]='usage wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[21])) {
																			$data['errors'][]="Display type is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[21]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[21]))	  	
																			{
																			$data['errors'][]='Display type wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[22])) {
																			$data['errors'][]="Image is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[22]!=''){
																				$image_link = $fields[22];
																				$split_image1 = pathinfo($image_link);
																				$imagename=$split_image1['filename'].".".$split_image1['extension'];
																				$split_image = pathinfo($imagename,PATHINFO_EXTENSION);;
																				if($split_image != "jpg" && $split_image !="png" && $split_image != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[23])&& $fields[23]!=''){
																				$img1 = $fields[23];
																				$img12 = pathinfo($img1);
																				$imagename22=$img12['filename'].".".$img12['extension'];
																				$split_image212 = pathinfo($imagename22,PATHINFO_EXTENSION);;
																				if($split_image212 != "jpg" && $split_image212 !="png" && $split_image212 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[24])&& $fields[24]!=''){
																				$img2 = $fields[24];
																				$img122 = pathinfo($img2);
																				$imagename2233=$img122['filename'].".".$img122['extension'];
																				$image3 = pathinfo($imagename2233,PATHINFO_EXTENSION);;
																				if($image3 != "jpg" && $image3 !="png" && $image3 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[25])&& $fields[25]!=''){
																				$img4 = $fields[25];
																				$img133 = pathinfo($img4);
																				$imagename5656=$img133['filename'].".".$img133['extension'];
																				$image4 = pathinfo($imagename5656,PATHINFO_EXTENSION);;
																				if($image4 != "jpg" && $image4 !="png" && $image4 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[26])&& $fields[26]!=''){
																				$image5 = $fields[26];
																				$image55 = pathinfo($image5);
																				$imagename555=$image55['filename'].".".$image55['extension'];
																				$image5555 = pathinfo($imagename555,PATHINFO_EXTENSION);;
																				if($image5555 != "jpg" && $image5555 !="png" && $image5555 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[27])&& $fields[27]!=''){
																				$image6 = $fields[27];
																				$image66 = pathinfo($image6);
																				$imagename666=$image66['filename'].".".$image66['extension'];
																				$image6666 = pathinfo($imagename666,PATHINFO_EXTENSION);;
																				if($image6666 != "jpg" && $image6666 !="png" && $image6666 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[28])&& $fields[28]!=''){
																				$image7 = $fields[28];
																				$image77 = pathinfo($image7);
																				$imagename777=$image77['filename'].".".$image77['extension'];
																				$image7777 = pathinfo($imagename777,PATHINFO_EXTENSION);;
																				if($image7777 != "jpg" && $image7777 !="png" && $image7777 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[29])&& $fields[29]!=''){
																				$image8 = $fields[29];
																				$image88 = pathinfo($image8);
																				$imagename888=$image88['filename'].".".$image88['extension'];
																				$image8888 = pathinfo($imagename888,PATHINFO_EXTENSION);;
																				if($image8888 != "jpg" && $image8888 !="png" && $image8888 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[30])&& $fields[30]!=''){
																				$image9 = $fields[30];
																				$image99 = pathinfo($image9);
																				$imagename999=$image99['filename'].".".$image99['extension'];
																				$image9999 = pathinfo($imagename999,PATHINFO_EXTENSION);;
																				if($image9999 != "jpg" && $image9999 !="png" && $image9999 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[31])&& $fields[31]!=''){
																				$image01 = $fields[31];
																				$image001 = pathinfo($image01);
																				$imagename0001=$image001['filename'].".".$image001['extension'];
																				$image00001 = pathinfo($imagename0001,PATHINFO_EXTENSION);;
																				if($image00001 != "jpg" && $image00001 !="png" && $image00001 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[32])&& $fields[32]!=''){
																				$image11 = $fields[32];
																				$image111 = pathinfo($image11);
																				$imagename1111=$image111['filename'].".".$image111['extension'];
																				$image11111 = pathinfo($imagename1111,PATHINFO_EXTENSION);;
																				if($image11111 != "jpg" && $image11111 !="png" && $image11111 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																				
																		}
																		if(isset($fields[33])&& $fields[33]!=''){
																				$image12 = $fields[33];
																				$image112 = pathinfo($image12);
																				$imagename1112=$image112['filename'].".".$image112['extension'];
																				$image11112 = pathinfo($imagename1112,PATHINFO_EXTENSION);;
																				if($image11112 != "jpg" && $image11112 !="png" && $image11112 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
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
																$path='/home/cartinhour/public_html/uploads/products/';
																//echo '<pre>';print_r($data);exit;
																	$image_link = $data[22];
																	$split_image = pathinfo($image_link);
																	$imagename=round(microtime(true)).$split_image['filename'].".".$split_image['extension'];
																	copy($data[22], $path.$imagename);
																	if(isset($data[23])&& $data[23]!=''){
																		$image_link1 = $data[23];
																		$split_image1 = pathinfo($image_link1);
																		$imagename1=round(microtime(true)).$split_image1['filename'].".".$split_image1['extension'];
																		copy($data[23], $path.$imagename1);
																	}
																	if(isset($data[24])&& $data[24]!=''){
																			$image_link2 = $data[24];
																			$split_image2 = pathinfo($image_link2);
																			$imagename2=round(microtime(true)).$split_image2['filename'].".".$split_image2['extension'];
																			copy($data[24], $path.$imagename2);
																	}
																	if(isset($data[25])&& $data[25]!=''){
																			$image_link3 = $data[25];
																			$split_image3 = pathinfo($image_link3);
																			$imagename3=round(microtime(true)).$split_image3['filename'].".".$split_image3['extension'];
																			copy($data[25], $path.$imagename3);
																			
																	}
																	if(isset($data[26])&& $data[26]!=''){
																			$image_link4 = $data[26];
																			$split_image4 = pathinfo($image_link4);
																			$imagename4=round(microtime(true)).$split_image4['filename'].".".$split_image4['extension'];
																			copy($data[26], $path.$imagename4);
																			
																	}
																	if(isset($data[27])&& $data[27]!=''){
																			$image_link5 = $data[27];
																			$split_image5 = pathinfo($image_link5);
																			$imagename5=round(microtime(true)).$split_image5['filename'].".".$split_image5['extension'];
																			copy($data[27], $path.$imagename5);
																			
																	}
																	if(isset($data[28])&& $data[28]!=''){
																		$image_link6 = $data[28];
																		$split_image6 = pathinfo($image_link6);
																		$imagename6=round(microtime(true)).$split_image6['filename'].".".$split_image6['extension'];
																		copy($data[28], $path.$imagename6);
																	
																	}
																	if(isset($data[29])&& $data[29]!=''){
																		$image_link7 = $data[29];
																		$split_image7 = pathinfo($image_link7);
																		$imagename7=round(microtime(true)).$split_image7['filename'].".".$split_image7['extension'];
																		copy($data[29], $path.$imagename7);
																	
																	}
																	if(isset($data[30])&& $data[30]!=''){
																			$image_link8 = $data[30];
																			$split_image8 = pathinfo($image_link8);
																			$imagename8=round(microtime(true)).$split_image8['filename'].".".$split_image8['extension'];
																			copy($data[30], $path.$imagename8);
																			
																	}
																	if(isset($data[31])&& $data[31]!=''){
																		$image_link9 = $data[31];
																		$split_image9 = pathinfo($image_link9);
																		$imagename9=round(microtime(true)).$split_image9['filename'].".".$split_image9['extension'];
																		copy($data[31], $path.$imagename9);
																	}
																	if(isset($data[32])&& $data[32]!=''){
																		$image_link10 = $data[32];
																		$split_image10 = pathinfo($image_link10);
																		$imagename10=round(microtime(true)).$split_image10['filename'].".".$split_image10['extension'];
																		copy($data[32], $path.$imagename10);
																	
																	}
																	if(isset($data[33])&& $data[33]!=''){
																		$image_link11 = $data[33];
																		$split_image11 = pathinfo($image_link11);
																		$imagename11=round(microtime(true)).$split_image11['filename'].".".$split_image11['extension'];
																		copy($data[33], $path.$imagename11);
																		
																	}
																	
																	$adddetails=array(
																			'category_id' => $post['category_ids'],			
																			'subcategory_id' =>$post['subcategory_ids'],
																			'seller_id' =>$this->session->userdata('seller_id'), 
																			'item_name' => $data[1],
																			'skuid' => $data[2],
																			'item_code' => $data[3],
																			'item_cost' => $data[4],
																			'special_price' => $data[5],
																			'offers' =>$data[6],
																			'discount' =>$data[7],
																			'item_quantity' =>$data[8],
																			'keywords' =>$data[9],
																			'title' =>$data[10],
																			'item_status' => $data[11],
																			'item_description' =>$data[12],
																			'item_sub_name' =>$data[13],
																			'brand' =>$data[14],
																			'ideal_for' =>$data[15],
																			'dial_shape' =>$data[18],
																			'compatibleos' =>$data[19],
																			'usage' =>$data[20],
																			'display_type' =>$data[21],
																			'item_image'=>isset($imagename)?$imagename:'',
																			'item_image1'=>isset($imagename1)?$imagename1:'',
																			'item_image2'=>isset($imagename2)?$imagename2:'',
																			'item_image3'=>isset($imagename3)?$imagename3:'',
																			'item_image4'=>isset($imagename4)?$imagename4:'',
																			'item_image5'=>isset($imagename5)?$imagename5:'',
																			'item_image6'=>isset($imagename6)?$imagename6:'',
																			'item_image7'=>isset($imagename7)?$imagename7:'',
																			'item_image8'=>isset($imagename8)?$imagename8:'',
																			'item_image9'=>isset($imagename9)?$imagename9:'',
																			'item_image10'=>isset($imagename10)?$imagename10:'',
																			'item_image11'=>isset($imagename11)?$imagename11:'',
																			'seller_location_area'=>$seller_location['area'],
																			'created_at'=>date('Y-m-d H:i:s'),

																		);
																		//echo '<pre>';print_r($adddetails);exit;
																			$results=$this->products_model->save_prodcts($adddetails);
																				if(count($results)>0){
																						/* for spcification purpose*/
																						$arr1=explode(",",$data[16]);
																						$arr2=explode(",",$data[17]);
																						foreach (array_combine($arr1,$arr2) as $key=>$list){
																							if($list!='' && $key!=''){
																							$addspc=array(
																							'item_id' =>$results,
																							'spc_name' => $key,
																							'spc_value' => $list,
																							'create_at' => date('Y-m-d H:i:s'),
																							);
																							$this->products_model->insert_product_spcifications($addspc);
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
								
								
							}else if($post['subcategory_ids']==11 || $post['subcategory_ids']==21){
								
										if(substr($_FILES['categoryfile']['name'], 0, 27)=='Fashioncategoryfilewomenacc'){
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
																		
																		$totalfields[] = $fields;
																		if(empty($fields[1])) {
																			$data['errors'][]="Product name is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[1]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[1]))	  	
																			{
																			$data['errors'][]='Product name wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[2])){
																			$data['errors'][]="Sku code is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[2]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[2]))	  	
																			{
																			$data['errors'][]='Sku code wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}else{
																				$result = $this->products_model->get_skuid_exists($fields[2]);
																				if(count($result)>0){
																				$data['errors'][]="Sku code already exits .please use another Sku code. Row Id is :  ".$key.'<br>';
																				$error=1;	
																				}

																			}

																		}
																		if(empty($fields[3])) {
																			$data['errors'][]="Other Unique code is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[3]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[3]))	  	
																			{
																			$data['errors'][]='Other Unique code wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[4])) {
																			$data['errors'][]="Price is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[4]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[4]))	  	
																			{
																			$data['errors'][]='Price  can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[5])) {
																			$data['errors'][]="Special Price is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[5]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[5]))	  	
																			{
																			$data['errors'][]='Special Price  can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if($fields[6]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[6]))	  	
																			{
																			$data['errors'][]='Offer can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if($fields[7]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[7]))	  	
																			{
																			$data['errors'][]='Discount can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[8])) {
																			$data['errors'][]="Qty is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[8]!=''){
																			$regex ="/^[0-9]+$/"; 
																			if(!preg_match( $regex, $fields[8]))
																			{
																			$data['errors'][]="Qty must be digits. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[9])) {
																			$data['errors'][]="Meta keywords is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[9]!=''){
																			$regex ="/^[a-zA-Z0-9.-_& ]+$/"; 
																			if(!preg_match( $regex, $fields[9]))	  	
																			{
																			$data['errors'][]='Meta keywords can only consist of alphanumaric, space and dot. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[10])) {
																			$data['errors'][]="Meta title is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[10]!=''){
																			$regex ="/^[a-zA-Z0-9.-_& ]+$/"; 
																			if(!preg_match( $regex, $fields[10]))	  	
																			{
																			$data['errors'][]='Meta title can only consist of alphanumaric, space and dot. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[11])) {
																			$data['errors'][]="Status is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[11]!=''){
																			$regex ="/^[0-1]+$/"; 
																			if(!preg_match( $regex, $fields[11]))
																			{
																			$data['errors'][]="Status must be  0 or 1. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[12])) {
																			$data['errors'][]="Product description is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[12]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[12]))	  	
																			{
																			$data['errors'][]='Product description wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[13])) {
																			$data['errors'][]="Sub Item is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[13]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[13]))	  	
																			{
																			$data['errors'][]='Sub Item wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[14])) {
																			$data['errors'][]="Brand is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[14]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[14]))	  	
																			{
																			$data['errors'][]='Brand wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[15])) {
																			$data['errors'][]="Ideal for required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[15]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[15]))
																			{
																			$data['errors'][]="Ideal for wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[16])) {
																			$data['errors'][]="Product specifications name is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[16]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[16]))	  	
																			{
																			$data['errors'][]='Product specifications name wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[17])) {
																			$data['errors'][]="Product specifications value is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[17]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[17]))	  	
																			{
																			$data['errors'][]='Product specifications value wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[18])) {
																			$data['errors'][]="Theme is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[18]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[18]))	  	
																			{
																			$data['errors'][]='Theme wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[19])) {
																			$data['errors'][]="Image is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[19]!=''){
																				$image_link = $fields[19];
																				$split_image1 = pathinfo($image_link);
																				$imagename=$split_image1['filename'].".".$split_image1['extension'];
																				$split_image = pathinfo($imagename,PATHINFO_EXTENSION);;
																				if($split_image != "jpg" && $split_image !="png" && $split_image != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[20])&& $fields[20]!=''){
																				$img1 = $fields[20];
																				$img12 = pathinfo($img1);
																				$imagename22=$img12['filename'].".".$img12['extension'];
																				$split_image212 = pathinfo($imagename22,PATHINFO_EXTENSION);;
																				if($split_image212 != "jpg" && $split_image212 !="png" && $split_image212 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[21])&& $fields[21]!=''){
																				$img2 = $fields[21];
																				$img122 = pathinfo($img2);
																				$imagename2233=$img122['filename'].".".$img122['extension'];
																				$image3 = pathinfo($imagename2233,PATHINFO_EXTENSION);;
																				if($image3 != "jpg" && $image3 !="png" && $image3 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[22])&& $fields[22]!=''){
																				$img4 = $fields[22];
																				$img133 = pathinfo($img4);
																				$imagename5656=$img133['filename'].".".$img133['extension'];
																				$image4 = pathinfo($imagename5656,PATHINFO_EXTENSION);;
																				if($image4 != "jpg" && $image4 !="png" && $image4 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[23])&& $fields[23]!=''){
																				$image5 = $fields[23];
																				$image55 = pathinfo($image5);
																				$imagename555=$image55['filename'].".".$image55['extension'];
																				$image5555 = pathinfo($imagename555,PATHINFO_EXTENSION);;
																				if($image5555 != "jpg" && $image5555 !="png" && $image5555 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[24])&& $fields[24]!=''){
																				$image6 = $fields[24];
																				$image66 = pathinfo($image6);
																				$imagename666=$image66['filename'].".".$image66['extension'];
																				$image6666 = pathinfo($imagename666,PATHINFO_EXTENSION);;
																				if($image6666 != "jpg" && $image6666 !="png" && $image6666 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[25])&& $fields[25]!=''){
																				$image7 = $fields[25];
																				$image77 = pathinfo($image7);
																				$imagename777=$image77['filename'].".".$image77['extension'];
																				$image7777 = pathinfo($imagename777,PATHINFO_EXTENSION);;
																				if($image7777 != "jpg" && $image7777 !="png" && $image7777 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[26])&& $fields[26]!=''){
																				$image8 = $fields[26];
																				$image88 = pathinfo($image8);
																				$imagename888=$image88['filename'].".".$image88['extension'];
																				$image8888 = pathinfo($imagename888,PATHINFO_EXTENSION);;
																				if($image8888 != "jpg" && $image8888 !="png" && $image8888 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[27])&& $fields[27]!=''){
																				$image9 = $fields[27];
																				$image99 = pathinfo($image9);
																				$imagename999=$image99['filename'].".".$image99['extension'];
																				$image9999 = pathinfo($imagename999,PATHINFO_EXTENSION);;
																				if($image9999 != "jpg" && $image9999 !="png" && $image9999 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[28])&& $fields[28]!=''){
																				$image01 = $fields[28];
																				$image001 = pathinfo($image01);
																				$imagename0001=$image001['filename'].".".$image001['extension'];
																				$image00001 = pathinfo($imagename0001,PATHINFO_EXTENSION);;
																				if($image00001 != "jpg" && $image00001 !="png" && $image00001 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[29])&& $fields[29]!=''){
																				$image11 = $fields[29];
																				$image111 = pathinfo($image11);
																				$imagename1111=$image111['filename'].".".$image111['extension'];
																				$image11111 = pathinfo($imagename1111,PATHINFO_EXTENSION);;
																				if($image11111 != "jpg" && $image11111 !="png" && $image11111 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																				
																		}
																		if(isset($fields[30])&& $fields[30]!=''){
																				$image12 = $fields[30];
																				$image112 = pathinfo($image12);
																				$imagename1112=$image112['filename'].".".$image112['extension'];
																				$image11112 = pathinfo($imagename1112,PATHINFO_EXTENSION);;
																				if($image11112 != "jpg" && $image11112 !="png" && $image11112 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
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
																$path='/home/cartinhour/public_html/uploads/products/';
																//echo '<pre>';print_r($data);exit;
																	$image_link = $data[19];
																	$split_image = pathinfo($image_link);
																	$imagename=round(microtime(true)).$split_image['filename'].".".$split_image['extension'];
																	copy($data[19], $path.$imagename);
																	if(isset($data[20])&& $data[20]!=''){
																		$image_link1 = $data[20];
																		$split_image1 = pathinfo($image_link1);
																		$imagename1=round(microtime(true)).$split_image1['filename'].".".$split_image1['extension'];
																		copy($data[20], $path.$imagename1);
																	}
																	if(isset($data[21])&& $data[21]!=''){
																			$image_link2 = $data[21];
																			$split_image2 = pathinfo($image_link2);
																			$imagename2=round(microtime(true)).$split_image2['filename'].".".$split_image2['extension'];
																			copy($data[21], $path.$imagename2);
																	}
																	if(isset($data[22])&& $data[22]!=''){
																			$image_link3 = $data[22];
																			$split_image3 = pathinfo($image_link3);
																			$imagename3=round(microtime(true)).$split_image3['filename'].".".$split_image3['extension'];
																			copy($data[22], $path.$imagename3);
																			
																	}
																	if(isset($data[23])&& $data[23]!=''){
																			$image_link4 = $data[23];
																			$split_image4 = pathinfo($image_link4);
																			$imagename4=round(microtime(true)).$split_image4['filename'].".".$split_image4['extension'];
																			copy($data[23], $path.$imagename4);
																			
																	}
																	if(isset($data[24])&& $data[24]!=''){
																			$image_link5 = $data[24];
																			$split_image5 = pathinfo($image_link5);
																			$imagename5=round(microtime(true)).$split_image5['filename'].".".$split_image5['extension'];
																			copy($data[24], $path.$imagename5);
																			
																	}
																	if(isset($data[25])&& $data[25]!=''){
																		$image_link6 = $data[25];
																		$split_image6 = pathinfo($image_link6);
																		$imagename6=round(microtime(true)).$split_image6['filename'].".".$split_image6['extension'];
																		copy($data[25], $path.$imagename6);
																	
																	}
																	if(isset($data[26])&& $data[26]!=''){
																		$image_link7 = $data[26];
																		$split_image7 = pathinfo($image_link7);
																		$imagename7=round(microtime(true)).$split_image7['filename'].".".$split_image7['extension'];
																		copy($data[26], $path.$imagename7);
																	
																	}
																	if(isset($data[27])&& $data[27]!=''){
																			$image_link8 = $data[27];
																			$split_image8 = pathinfo($image_link8);
																			$imagename8=round(microtime(true)).$split_image8['filename'].".".$split_image8['extension'];
																			copy($data[27], $path.$imagename8);
																			
																	}
																	if(isset($data[28])&& $data[28]!=''){
																		$image_link9 = $data[28];
																		$split_image9 = pathinfo($image_link9);
																		$imagename9=round(microtime(true)).$split_image9['filename'].".".$split_image9['extension'];
																		copy($data[28], $path.$imagename9);
																	}
																	if(isset($data[29])&& $data[29]!=''){
																		$image_link10 = $data[29];
																		$split_image10 = pathinfo($image_link10);
																		$imagename10=round(microtime(true)).$split_image10['filename'].".".$split_image10['extension'];
																		copy($data[29], $path.$imagename10);
																	
																	}
																	if(isset($data[30])&& $data[30]!=''){
																		$image_link11 = $data[30];
																		$split_image11 = pathinfo($image_link11);
																		$imagename11=round(microtime(true)).$split_image11['filename'].".".$split_image11['extension'];
																		copy($data[30], $path.$imagename11);
																		
																	}
																	
																	$adddetails=array(
																			'category_id' => $post['category_ids'],			
																			'subcategory_id' =>$post['subcategory_ids'],
																			'seller_id' =>$this->session->userdata('seller_id'), 
																			'item_name' => $data[1],
																			'skuid' => $data[2],
																			'item_code' => $data[3],
																			'item_cost' => $data[4],
																			'special_price' => $data[5],
																			'offers' =>$data[6],
																			'discount' =>$data[7],
																			'item_quantity' =>$data[8],
																			'keywords' =>$data[9],
																			'title' =>$data[10],
																			'item_status' => $data[11],
																			'item_description' =>$data[12],
																			'item_sub_name' =>$data[13],
																			'brand' =>$data[14],
																			'ideal_for' =>$data[15],
																			'theme' =>$data[18],
																			'item_image'=>isset($imagename)?$imagename:'',
																			'item_image1'=>isset($imagename1)?$imagename1:'',
																			'item_image2'=>isset($imagename2)?$imagename2:'',
																			'item_image3'=>isset($imagename3)?$imagename3:'',
																			'item_image4'=>isset($imagename4)?$imagename4:'',
																			'item_image5'=>isset($imagename5)?$imagename5:'',
																			'item_image6'=>isset($imagename6)?$imagename6:'',
																			'item_image7'=>isset($imagename7)?$imagename7:'',
																			'item_image8'=>isset($imagename8)?$imagename8:'',
																			'item_image9'=>isset($imagename9)?$imagename9:'',
																			'item_image10'=>isset($imagename10)?$imagename10:'',
																			'item_image11'=>isset($imagename11)?$imagename11:'',
																			'seller_location_area'=>$seller_location['area'],
																			'created_at'=>date('Y-m-d H:i:s'),

																		);
																		//echo '<pre>';print_r($adddetails);exit;
																			$results=$this->products_model->save_prodcts($adddetails);
																				if(count($results)>0){
																						/* for spcification purpose*/
																						$arr1=explode(",",$data[16]);
																						$arr2=explode(",",$data[17]);
																						foreach (array_combine($arr1,$arr2) as $key=>$list){
																							if($list!='' && $key!=''){
																							$addspc=array(
																							'item_id' =>$results,
																							'spc_name' => $key,
																							'spc_value' => $list,
																							'create_at' => date('Y-m-d H:i:s'),
																							);
																							$this->products_model->insert_product_spcifications($addspc);
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
								
								
							}else if($post['subcategory_ids']==53){
								
											if(substr($_FILES['categoryfile']['name'], 0, 27)=='Fashioncategoryfilefootware'){
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
																		
																		$totalfields[] = $fields;
																		if(empty($fields[1])) {
																			$data['errors'][]="Product name is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[1]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[1]))	  	
																			{
																			$data['errors'][]='Product name wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[2])){
																			$data['errors'][]="Sku code is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[2]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[2]))	  	
																			{
																			$data['errors'][]='Sku code wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}else{
																				$result = $this->products_model->get_skuid_exists($fields[2]);
																				if(count($result)>0){
																				$data['errors'][]="Sku code already exits .please use another Sku code. Row Id is :  ".$key.'<br>';
																				$error=1;	
																				}

																			}

																		}
																		if(empty($fields[3])) {
																			$data['errors'][]="Other Unique code is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[3]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[3]))	  	
																			{
																			$data['errors'][]='Other Unique code wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[4])) {
																			$data['errors'][]="Price is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[4]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[4]))	  	
																			{
																			$data['errors'][]='Price  can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[5])) {
																			$data['errors'][]="Special Price is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[5]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[5]))	  	
																			{
																			$data['errors'][]='Special Price  can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if($fields[6]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[6]))	  	
																			{
																			$data['errors'][]='Offer can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if($fields[7]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[7]))	  	
																			{
																			$data['errors'][]='Discount can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[8])) {
																			$data['errors'][]="Qty is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[8]!=''){
																			$regex ="/^[0-9]+$/"; 
																			if(!preg_match( $regex, $fields[8]))
																			{
																			$data['errors'][]="Qty must be digits. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[9])) {
																			$data['errors'][]="Meta keywords is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[9]!=''){
																			$regex ="/^[a-zA-Z0-9.-_& ]+$/"; 
																			if(!preg_match( $regex, $fields[9]))	  	
																			{
																			$data['errors'][]='Meta keywords can only consist of alphanumaric, space and dot. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[10])) {
																			$data['errors'][]="Meta title is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[10]!=''){
																			$regex ="/^[a-zA-Z0-9.-_& ]+$/"; 
																			if(!preg_match( $regex, $fields[10]))	  	
																			{
																			$data['errors'][]='Meta title can only consist of alphanumaric, space and dot. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[11])) {
																			$data['errors'][]="Status is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[11]!=''){
																			$regex ="/^[0-1]+$/"; 
																			if(!preg_match( $regex, $fields[11]))
																			{
																			$data['errors'][]="Status must be  0 or 1. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[12])) {
																			$data['errors'][]="Product description is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[12]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[12]))	  	
																			{
																			$data['errors'][]='Product description wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[13])) {
																			$data['errors'][]="Sub Item is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[13]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[13]))	  	
																			{
																			$data['errors'][]='Sub Item wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[14])) {
																			$data['errors'][]="Brand is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[14]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[14]))	  	
																			{
																			$data['errors'][]='Brand wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[15])) {
																			$data['errors'][]="Ideal for required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[15]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[15]))
																			{
																			$data['errors'][]="Ideal for wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[16])) {
																			$data['errors'][]="Product specifications name is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[16]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[16]))	  	
																			{
																			$data['errors'][]='Product specifications name wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[17])) {
																			$data['errors'][]="Product specifications value is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[17]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[17]))	  	
																			{
																			$data['errors'][]='Product specifications value wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		} 
																		if(empty($fields[18])) {
																			$data['errors'][]="Sizes is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[18]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[18]))	  	
																			{
																			$data['errors'][]='Sizes wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[19])) {
																			$data['errors'][]="Colors is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[19]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[19]))	  	
																			{
																			$data['errors'][]='Colors wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[20])) {
																			$data['errors'][]="UKSizes is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[20]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[20]))	  	
																			{
																			$data['errors'][]='UKSizes wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[21])) {
																			$data['errors'][]="Theme is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[21]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[21]))	  	
																			{
																			$data['errors'][]='Theme wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[22])) {
																			$data['errors'][]="occasion is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[22]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[22]))	  	
																			{
																			$data['errors'][]='occasion wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[23])) {
																			$data['errors'][]="Image is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[23]!=''){
																				$image_link = $fields[23];
																				$split_image1 = pathinfo($image_link);
																				$imagename=$split_image1['filename'].".".$split_image1['extension'];
																				$split_image = pathinfo($imagename,PATHINFO_EXTENSION);;
																				if($split_image != "jpg" && $split_image !="png" && $split_image != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[24])&& $fields[24]!=''){
																				$img1 = $fields[24];
																				$img12 = pathinfo($img1);
																				$imagename22=$img12['filename'].".".$img12['extension'];
																				$split_image212 = pathinfo($imagename22,PATHINFO_EXTENSION);;
																				if($split_image212 != "jpg" && $split_image212 !="png" && $split_image212 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[25])&& $fields[25]!=''){
																				$img2 = $fields[25];
																				$img122 = pathinfo($img2);
																				$imagename2233=$img122['filename'].".".$img122['extension'];
																				$image3 = pathinfo($imagename2233,PATHINFO_EXTENSION);;
																				if($image3 != "jpg" && $image3 !="png" && $image3 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[26])&& $fields[26]!=''){
																				$img4 = $fields[26];
																				$img133 = pathinfo($img4);
																				$imagename5656=$img133['filename'].".".$img133['extension'];
																				$image4 = pathinfo($imagename5656,PATHINFO_EXTENSION);;
																				if($image4 != "jpg" && $image4 !="png" && $image4 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[27])&& $fields[27]!=''){
																				$image5 = $fields[27];
																				$image55 = pathinfo($image5);
																				$imagename555=$image55['filename'].".".$image55['extension'];
																				$image5555 = pathinfo($imagename555,PATHINFO_EXTENSION);;
																				if($image5555 != "jpg" && $image5555 !="png" && $image5555 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[28])&& $fields[28]!=''){
																				$image6 = $fields[28];
																				$image66 = pathinfo($image6);
																				$imagename666=$image66['filename'].".".$image66['extension'];
																				$image6666 = pathinfo($imagename666,PATHINFO_EXTENSION);;
																				if($image6666 != "jpg" && $image6666 !="png" && $image6666 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[29])&& $fields[29]!=''){
																				$image7 = $fields[29];
																				$image77 = pathinfo($image7);
																				$imagename777=$image77['filename'].".".$image77['extension'];
																				$image7777 = pathinfo($imagename777,PATHINFO_EXTENSION);;
																				if($image7777 != "jpg" && $image7777 !="png" && $image7777 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[30])&& $fields[30]!=''){
																				$image8 = $fields[30];
																				$image88 = pathinfo($image8);
																				$imagename888=$image88['filename'].".".$image88['extension'];
																				$image8888 = pathinfo($imagename888,PATHINFO_EXTENSION);;
																				if($image8888 != "jpg" && $image8888 !="png" && $image8888 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[31])&& $fields[31]!=''){
																				$image9 = $fields[31];
																				$image99 = pathinfo($image9);
																				$imagename999=$image99['filename'].".".$image99['extension'];
																				$image9999 = pathinfo($imagename999,PATHINFO_EXTENSION);;
																				if($image9999 != "jpg" && $image9999 !="png" && $image9999 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[32])&& $fields[32]!=''){
																				$image01 = $fields[32];
																				$image001 = pathinfo($image01);
																				$imagename0001=$image001['filename'].".".$image001['extension'];
																				$image00001 = pathinfo($imagename0001,PATHINFO_EXTENSION);;
																				if($image00001 != "jpg" && $image00001 !="png" && $image00001 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[33])&& $fields[33]!=''){
																				$image11 = $fields[33];
																				$image111 = pathinfo($image11);
																				$imagename1111=$image111['filename'].".".$image111['extension'];
																				$image11111 = pathinfo($imagename1111,PATHINFO_EXTENSION);;
																				if($image11111 != "jpg" && $image11111 !="png" && $image11111 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																				
																		}
																		if(isset($fields[34])&& $fields[34]!=''){
																				$image12 = $fields[34];
																				$image112 = pathinfo($image12);
																				$imagename1112=$image112['filename'].".".$image112['extension'];
																				$image11112 = pathinfo($imagename1112,PATHINFO_EXTENSION);;
																				if($image11112 != "jpg" && $image11112 !="png" && $image11112 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
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
																$path='/home/cartinhour/public_html/uploads/products/';
																//echo '<pre>';print_r($data);exit;
																	$image_link = $data[23];
																	$split_image = pathinfo($image_link);
																	$imagename=round(microtime(true)).$split_image['filename'].".".$split_image['extension'];
																	copy($data[23], $path.$imagename);
																	if(isset($data[24])&& $data[24]!=''){
																		$image_link1 = $data[24];
																		$split_image1 = pathinfo($image_link1);
																		$imagename1=round(microtime(true)).$split_image1['filename'].".".$split_image1['extension'];
																		copy($data[24], $path.$imagename1);
																	}
																	if(isset($data[25])&& $data[25]!=''){
																			$image_link2 = $data[25];
																			$split_image2 = pathinfo($image_link2);
																			$imagename2=round(microtime(true)).$split_image2['filename'].".".$split_image2['extension'];
																			copy($data[25], $path.$imagename2);
																	}
																	if(isset($data[26])&& $data[26]!=''){
																			$image_link3 = $data[26];
																			$split_image3 = pathinfo($image_link3);
																			$imagename3=round(microtime(true)).$split_image3['filename'].".".$split_image3['extension'];
																			copy($data[26], $path.$imagename3);
																			
																	}
																	if(isset($data[27])&& $data[27]!=''){
																			$image_link4 = $data[27];
																			$split_image4 = pathinfo($image_link4);
																			$imagename4=round(microtime(true)).$split_image4['filename'].".".$split_image4['extension'];
																			copy($data[27], $path.$imagename4);
																			
																	}
																	if(isset($data[28])&& $data[28]!=''){
																			$image_link5 = $data[28];
																			$split_image5 = pathinfo($image_link5);
																			$imagename5=round(microtime(true)).$split_image5['filename'].".".$split_image5['extension'];
																			copy($data[28], $path.$imagename5);
																			
																	}
																	if(isset($data[29])&& $data[29]!=''){
																		$image_link6 = $data[29];
																		$split_image6 = pathinfo($image_link6);
																		$imagename6=round(microtime(true)).$split_image6['filename'].".".$split_image6['extension'];
																		copy($data[29], $path.$imagename6);
																	
																	}
																	if(isset($data[30])&& $data[30]!=''){
																		$image_link7 = $data[30];
																		$split_image7 = pathinfo($image_link7);
																		$imagename7=round(microtime(true)).$split_image7['filename'].".".$split_image7['extension'];
																		copy($data[30], $path.$imagename7);
																	
																	}
																	if(isset($data[31])&& $data[31]!=''){
																			$image_link8 = $data[31];
																			$split_image8 = pathinfo($image_link8);
																			$imagename8=round(microtime(true)).$split_image8['filename'].".".$split_image8['extension'];
																			copy($data[31], $path.$imagename8);
																			
																	}
																	if(isset($data[32])&& $data[32]!=''){
																		$image_link9 = $data[32];
																		$split_image9 = pathinfo($image_link9);
																		$imagename9=round(microtime(true)).$split_image9['filename'].".".$split_image9['extension'];
																		copy($data[32], $path.$imagename9);
																	}
																	if(isset($data[33])&& $data[33]!=''){
																		$image_link10 = $data[33];
																		$split_image10 = pathinfo($image_link10);
																		$imagename10=round(microtime(true)).$split_image10['filename'].".".$split_image10['extension'];
																		copy($data[33], $path.$imagename10);
																	
																	}
																	if(isset($data[34])&& $data[34]!=''){
																		$image_link11 = $data[34];
																		$split_image11 = pathinfo($image_link11);
																		$imagename11=round(microtime(true)).$split_image11['filename'].".".$split_image11['extension'];
																		copy($data[34], $path.$imagename11);
																		
																	}
																	
																	$adddetails=array(
																			'category_id' => $post['category_ids'],			
																			'subcategory_id' =>$post['subcategory_ids'],
																			'seller_id' =>$this->session->userdata('seller_id'), 
																			'item_name' => $data[1],
																			'skuid' => $data[2],
																			'item_code' => $data[3],
																			'item_cost' => $data[4],
																			'special_price' => $data[5],
																			'offers' =>$data[6],
																			'discount' =>$data[7],
																			'item_quantity' =>$data[8],
																			'keywords' =>$data[9],
																			'title' =>$data[10],
																			'item_status' => $data[11],
																			'item_description' =>$data[12],
																			'item_sub_name' =>$data[13],
																			'brand' =>$data[14],
																			'ideal_for' =>$data[15],
																			'theme' =>$data[21],
																			'occasion' =>$data[22],
																			'item_image'=>isset($imagename)?$imagename:'',
																			'item_image1'=>isset($imagename1)?$imagename1:'',
																			'item_image2'=>isset($imagename2)?$imagename2:'',
																			'item_image3'=>isset($imagename3)?$imagename3:'',
																			'item_image4'=>isset($imagename4)?$imagename4:'',
																			'item_image5'=>isset($imagename5)?$imagename5:'',
																			'item_image6'=>isset($imagename6)?$imagename6:'',
																			'item_image7'=>isset($imagename7)?$imagename7:'',
																			'item_image8'=>isset($imagename8)?$imagename8:'',
																			'item_image9'=>isset($imagename9)?$imagename9:'',
																			'item_image10'=>isset($imagename10)?$imagename10:'',
																			'item_image11'=>isset($imagename11)?$imagename11:'',
																			'seller_location_area'=>$seller_location['area'],
																			'created_at'=>date('Y-m-d H:i:s'),

																		);
																		//echo '<pre>';print_r($adddetails);exit;
																			$results=$this->products_model->save_prodcts($adddetails);
																				if(count($results)>0){
																						
																						
																						
																						
																						
																						
																							/* for size purpose*/
																							foreach(explode(",",$data[18]) as $listsizes){
																							if($listsizes !=''){
																								$addsizesdata=array(
																								'item_id' =>$results,
																								'p_size_name' => $listsizes,
																								'create_at' => date('Y-m-d H:i:s'),
																								);
																								$this->products_model->insert_product_sizes($addsizesdata);
																								}
																							}
																							/* for size purpose*/
																							/* for color purpose*/
																							foreach(explode(",",$data[19]) as $listcolors){
																								if($listcolors !=''){
																										$addcolorsdata=array(
																										'item_id' =>$results,
																										'color_name' => $listcolors,
																										'create_at' => date('Y-m-d H:i:s'),
																										);
																								$this->products_model->insert_product_colors($addcolorsdata);
																								}
																							
																							}
																							/* for color purpose*/
																							/*uksizes*/
																							if($data[20]!=''){
																								$uksizesdata = str_replace(array('[', ']','"'), array(''), $data[20]);
																							
																								foreach (explode(",",$uksizesdata) as $uksizess){

																								$adduksizesdata=array(
																								'item_id' =>$results,
																								'p_size_name' => $uksizess,
																								'create_at' => date('Y-m-d H:i:s'),
																								);
																								$this->products_model->insert_product_uksizes($adduksizesdata);
																								}
																							}
																							/*uksizes*/
																						/* for spcification purpose*/
																						$arr1=explode(",",$data[16]);
																						$arr2=explode(",",$data[17]);
																						foreach (array_combine($arr1,$arr2) as $key=>$list){
																							if($list!='' && $key!=''){
																							$addspc=array(
																							'item_id' =>$results,
																							'spc_name' => $key,
																							'spc_value' => $list,
																							'create_at' => date('Y-m-d H:i:s'),
																							);
																							$this->products_model->insert_product_spcifications($addspc);
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
								
								
							}else if($post['subcategory_ids']==13 || $post['subcategory_ids']==16 || $post['subcategory_ids']==17){
										if(substr($_FILES['categoryfile']['name'], 0, 32)=='Fashioncategoryfilewoensclothing'){
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
																		
																		$totalfields[] = $fields;
																		if(empty($fields[1])) {
																			$data['errors'][]="Product name is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[1]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[1]))	  	
																			{
																			$data['errors'][]='Product name wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[2])){
																			$data['errors'][]="Sku code is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[2]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[2]))	  	
																			{
																			$data['errors'][]='Sku code wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}else{
																				$result = $this->products_model->get_skuid_exists($fields[2]);
																				if(count($result)>0){
																				$data['errors'][]="Sku code already exits .please use another Sku code. Row Id is :  ".$key.'<br>';
																				$error=1;	
																				}

																			}

																		}
																		if(empty($fields[3])) {
																			$data['errors'][]="Other Unique code is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[3]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[3]))	  	
																			{
																			$data['errors'][]='Other Unique code wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[4])) {
																			$data['errors'][]="Price is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[4]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[4]))	  	
																			{
																			$data['errors'][]='Price  can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[5])) {
																			$data['errors'][]="Special Price is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[5]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[5]))	  	
																			{
																			$data['errors'][]='Special Price  can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if($fields[6]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[6]))	  	
																			{
																			$data['errors'][]='Offer can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if($fields[7]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[7]))	  	
																			{
																			$data['errors'][]='Discount can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[8])) {
																			$data['errors'][]="Qty is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[8]!=''){
																			$regex ="/^[0-9]+$/"; 
																			if(!preg_match( $regex, $fields[8]))
																			{
																			$data['errors'][]="Qty must be digits. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[9])) {
																			$data['errors'][]="Meta keywords is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[9]!=''){
																			$regex ="/^[a-zA-Z0-9.-_& ]+$/"; 
																			if(!preg_match( $regex, $fields[9]))	  	
																			{
																			$data['errors'][]='Meta keywords can only consist of alphanumaric, space and dot. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[10])) {
																			$data['errors'][]="Meta title is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[10]!=''){
																			$regex ="/^[a-zA-Z0-9.-_& ]+$/"; 
																			if(!preg_match( $regex, $fields[10]))	  	
																			{
																			$data['errors'][]='Meta title can only consist of alphanumaric, space and dot. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[11])) {
																			$data['errors'][]="Status is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[11]!=''){
																			$regex ="/^[0-1]+$/"; 
																			if(!preg_match( $regex, $fields[11]))
																			{
																			$data['errors'][]="Status must be  0 or 1. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[12])) {
																			$data['errors'][]="Product description is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[12]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[12]))	  	
																			{
																			$data['errors'][]='Product description wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[13])) {
																			$data['errors'][]="Sub Item is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[13]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[13]))	  	
																			{
																			$data['errors'][]='Sub Item wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[14])) {
																			$data['errors'][]="Brand is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[14]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[14]))	  	
																			{
																			$data['errors'][]='Brand wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[15])) {
																			$data['errors'][]="Ideal for required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[15]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[15]))
																			{
																			$data['errors'][]="Ideal for wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[16])) {
																			$data['errors'][]="Product specifications name is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[16]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[16]))	  	
																			{
																			$data['errors'][]='Product specifications name wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[17])) {
																			$data['errors'][]="Product specifications value is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[17]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[17]))	  	
																			{
																			$data['errors'][]='Product specifications value wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		} 
																		if(empty($fields[18])) {
																			$data['errors'][]="Sizes is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[18]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[18]))	  	
																			{
																			$data['errors'][]='Sizes wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[19])) {
																			$data['errors'][]="Colors is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[19]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[19]))	  	
																			{
																			$data['errors'][]='Colors wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		
																		
																		if(empty($fields[20])) {
																			$data['errors'][]="Type is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[20]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[20]))	  	
																			{
																			$data['errors'][]='Type wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[21])) {
																			$data['errors'][]="Image is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[21]!=''){
																				$image_link = $fields[21];
																				$split_image1 = pathinfo($image_link);
																				$imagename=$split_image1['filename'].".".$split_image1['extension'];
																				$split_image = pathinfo($imagename,PATHINFO_EXTENSION);;
																				if($split_image != "jpg" && $split_image !="png" && $split_image != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[22])&& $fields[22]!=''){
																				$img1 = $fields[22];
																				$img12 = pathinfo($img1);
																				$imagename22=$img12['filename'].".".$img12['extension'];
																				$split_image212 = pathinfo($imagename22,PATHINFO_EXTENSION);;
																				if($split_image212 != "jpg" && $split_image212 !="png" && $split_image212 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[23])&& $fields[23]!=''){
																				$img2 = $fields[23];
																				$img122 = pathinfo($img2);
																				$imagename2233=$img122['filename'].".".$img122['extension'];
																				$image3 = pathinfo($imagename2233,PATHINFO_EXTENSION);;
																				if($image3 != "jpg" && $image3 !="png" && $image3 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[24])&& $fields[24]!=''){
																				$img4 = $fields[24];
																				$img133 = pathinfo($img4);
																				$imagename5656=$img133['filename'].".".$img133['extension'];
																				$image4 = pathinfo($imagename5656,PATHINFO_EXTENSION);;
																				if($image4 != "jpg" && $image4 !="png" && $image4 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[25])&& $fields[25]!=''){
																				$image5 = $fields[25];
																				$image55 = pathinfo($image5);
																				$imagename555=$image55['filename'].".".$image55['extension'];
																				$image5555 = pathinfo($imagename555,PATHINFO_EXTENSION);;
																				if($image5555 != "jpg" && $image5555 !="png" && $image5555 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[26])&& $fields[26]!=''){
																				$image6 = $fields[26];
																				$image66 = pathinfo($image6);
																				$imagename666=$image66['filename'].".".$image66['extension'];
																				$image6666 = pathinfo($imagename666,PATHINFO_EXTENSION);;
																				if($image6666 != "jpg" && $image6666 !="png" && $image6666 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[27])&& $fields[27]!=''){
																				$image7 = $fields[27];
																				$image77 = pathinfo($image7);
																				$imagename777=$image77['filename'].".".$image77['extension'];
																				$image7777 = pathinfo($imagename777,PATHINFO_EXTENSION);;
																				if($image7777 != "jpg" && $image7777 !="png" && $image7777 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[28])&& $fields[28]!=''){
																				$image8 = $fields[28];
																				$image88 = pathinfo($image8);
																				$imagename888=$image88['filename'].".".$image88['extension'];
																				$image8888 = pathinfo($imagename888,PATHINFO_EXTENSION);;
																				if($image8888 != "jpg" && $image8888 !="png" && $image8888 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[29])&& $fields[29]!=''){
																				$image9 = $fields[29];
																				$image99 = pathinfo($image9);
																				$imagename999=$image99['filename'].".".$image99['extension'];
																				$image9999 = pathinfo($imagename999,PATHINFO_EXTENSION);;
																				if($image9999 != "jpg" && $image9999 !="png" && $image9999 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[30])&& $fields[30]!=''){
																				$image01 = $fields[30];
																				$image001 = pathinfo($image01);
																				$imagename0001=$image001['filename'].".".$image001['extension'];
																				$image00001 = pathinfo($imagename0001,PATHINFO_EXTENSION);;
																				if($image00001 != "jpg" && $image00001 !="png" && $image00001 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[31])&& $fields[31]!=''){
																				$image11 = $fields[31];
																				$image111 = pathinfo($image11);
																				$imagename1111=$image111['filename'].".".$image111['extension'];
																				$image11111 = pathinfo($imagename1111,PATHINFO_EXTENSION);;
																				if($image11111 != "jpg" && $image11111 !="png" && $image11111 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																				
																		}
																		if(isset($fields[32])&& $fields[32]!=''){
																				$image12 = $fields[32];
																				$image112 = pathinfo($image12);
																				$imagename1112=$image112['filename'].".".$image112['extension'];
																				$image11112 = pathinfo($imagename1112,PATHINFO_EXTENSION);;
																				if($image11112 != "jpg" && $image11112 !="png" && $image11112 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
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
																$path='/home/cartinhour/public_html/uploads/products/';
																//echo '<pre>';print_r($data);exit;
																	$image_link = $data[21];
																	$split_image = pathinfo($image_link);
																	$imagename=round(microtime(true)).$split_image['filename'].".".$split_image['extension'];
																	copy($data[21], $path.$imagename);
																	if(isset($data[22])&& $data[22]!=''){
																		$image_link1 = $data[22];
																		$split_image1 = pathinfo($image_link1);
																		$imagename1=round(microtime(true)).$split_image1['filename'].".".$split_image1['extension'];
																		copy($data[22], $path.$imagename1);
																	}
																	if(isset($data[23])&& $data[23]!=''){
																			$image_link2 = $data[23];
																			$split_image2 = pathinfo($image_link2);
																			$imagename2=round(microtime(true)).$split_image2['filename'].".".$split_image2['extension'];
																			copy($data[23], $path.$imagename2);
																	}
																	if(isset($data[24])&& $data[24]!=''){
																			$image_link3 = $data[24];
																			$split_image3 = pathinfo($image_link3);
																			$imagename3=round(microtime(true)).$split_image3['filename'].".".$split_image3['extension'];
																			copy($data[24], $path.$imagename3);
																			
																	}
																	if(isset($data[25])&& $data[25]!=''){
																			$image_link4 = $data[25];
																			$split_image4 = pathinfo($image_link4);
																			$imagename4=round(microtime(true)).$split_image4['filename'].".".$split_image4['extension'];
																			copy($data[25], $path.$imagename4);
																			
																	}
																	if(isset($data[26])&& $data[26]!=''){
																			$image_link5 = $data[26];
																			$split_image5 = pathinfo($image_link5);
																			$imagename5=round(microtime(true)).$split_image5['filename'].".".$split_image5['extension'];
																			copy($data[28], $path.$imagename5);
																			
																	}
																	if(isset($data[27])&& $data[27]!=''){
																		$image_link6 = $data[27];
																		$split_image6 = pathinfo($image_link6);
																		$imagename6=round(microtime(true)).$split_image6['filename'].".".$split_image6['extension'];
																		copy($data[27], $path.$imagename6);
																	
																	}
																	if(isset($data[28])&& $data[28]!=''){
																		$image_link7 = $data[28];
																		$split_image7 = pathinfo($image_link7);
																		$imagename7=round(microtime(true)).$split_image7['filename'].".".$split_image7['extension'];
																		copy($data[28], $path.$imagename7);
																	
																	}
																	if(isset($data[29])&& $data[29]!=''){
																			$image_link8 = $data[29];
																			$split_image8 = pathinfo($image_link8);
																			$imagename8=round(microtime(true)).$split_image8['filename'].".".$split_image8['extension'];
																			copy($data[29], $path.$imagename8);
																			
																	}
																	if(isset($data[30])&& $data[30]!=''){
																		$image_link9 = $data[30];
																		$split_image9 = pathinfo($image_link9);
																		$imagename9=round(microtime(true)).$split_image9['filename'].".".$split_image9['extension'];
																		copy($data[30], $path.$imagename9);
																	}
																	if(isset($data[31])&& $data[31]!=''){
																		$image_link10 = $data[31];
																		$split_image10 = pathinfo($image_link10);
																		$imagename10=round(microtime(true)).$split_image10['filename'].".".$split_image10['extension'];
																		copy($data[31], $path.$imagename10);
																	
																	}
																	if(isset($data[32])&& $data[32]!=''){
																		$image_link11 = $data[32];
																		$split_image11 = pathinfo($image_link11);
																		$imagename11=round(microtime(true)).$split_image11['filename'].".".$split_image11['extension'];
																		copy($data[32], $path.$imagename11);
																		
																	}
																	
																	$adddetails=array(
																			'category_id' => $post['category_ids'],			
																			'subcategory_id' =>$post['subcategory_ids'],
																			'seller_id' =>$this->session->userdata('seller_id'), 
																			'item_name' => $data[1],
																			'skuid' => $data[2],
																			'item_code' => $data[3],
																			'item_cost' => $data[4],
																			'special_price' => $data[5],
																			'offers' =>$data[6],
																			'discount' =>$data[7],
																			'item_quantity' =>$data[8],
																			'keywords' =>$data[9],
																			'title' =>$data[10],
																			'item_status' => $data[11],
																			'item_description' =>$data[12],
																			'item_sub_name' =>$data[13],
																			'brand' =>$data[14],
																			'ideal_for' =>$data[15],
																			'producttype' =>$data[20],
																			'item_image'=>isset($imagename)?$imagename:'',
																			'item_image1'=>isset($imagename1)?$imagename1:'',
																			'item_image2'=>isset($imagename2)?$imagename2:'',
																			'item_image3'=>isset($imagename3)?$imagename3:'',
																			'item_image4'=>isset($imagename4)?$imagename4:'',
																			'item_image5'=>isset($imagename5)?$imagename5:'',
																			'item_image6'=>isset($imagename6)?$imagename6:'',
																			'item_image7'=>isset($imagename7)?$imagename7:'',
																			'item_image8'=>isset($imagename8)?$imagename8:'',
																			'item_image9'=>isset($imagename9)?$imagename9:'',
																			'item_image10'=>isset($imagename10)?$imagename10:'',
																			'item_image11'=>isset($imagename11)?$imagename11:'',
																			'seller_location_area'=>$seller_location['area'],
																			'created_at'=>date('Y-m-d H:i:s'),

																		);
																		//echo '<pre>';print_r($adddetails);exit;
																			$results=$this->products_model->save_prodcts($adddetails);
																				if(count($results)>0){
																						
																						
																						
																						
																						
																						
																							/* for size purpose*/
																							foreach(explode(",",$data[18]) as $listsizes){
																							if($listsizes !=''){
																								$addsizesdata=array(
																								'item_id' =>$results,
																								'p_size_name' => $listsizes,
																								'create_at' => date('Y-m-d H:i:s'),
																								);
																								$this->products_model->insert_product_sizes($addsizesdata);
																								}
																							}
																							/* for size purpose*/
																							/* for color purpose*/
																							foreach(explode(",",$data[19]) as $listcolors){
																								if($listcolors !=''){
																										$addcolorsdata=array(
																										'item_id' =>$results,
																										'color_name' => $listcolors,
																										'create_at' => date('Y-m-d H:i:s'),
																										);
																								$this->products_model->insert_product_colors($addcolorsdata);
																								}
																							
																							}
																							/* for color purpose*/
																							/*uksizes*/
																							if($data[20]!=''){
																								$uksizesdata = str_replace(array('[', ']','"'), array(''), $data[20]);
																							
																								foreach (explode(",",$uksizesdata) as $uksizess){

																								$adduksizesdata=array(
																								'item_id' =>$results,
																								'p_size_name' => $uksizess,
																								'create_at' => date('Y-m-d H:i:s'),
																								);
																								$this->products_model->insert_product_uksizes($adduksizesdata);
																								}
																							}
																							/*uksizes*/
																						/* for spcification purpose*/
																						$arr1=explode(",",$data[16]);
																						$arr2=explode(",",$data[17]);
																						foreach (array_combine($arr1,$arr2) as $key=>$list){
																							if($list!='' && $key!=''){
																							$addspc=array(
																							'item_id' =>$results,
																							'spc_name' => $key,
																							'spc_value' => $list,
																							'create_at' => date('Y-m-d H:i:s'),
																							);
																							$this->products_model->insert_product_spcifications($addspc);
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
								
							}else if($post['subcategory_ids']==8 ||$post['subcategory_ids']==14 || $post['subcategory_ids']==19 || $post['subcategory_ids']==20 || $post['subcategory_ids']==22 || $post['subcategory_ids']==52 || $post['subcategory_ids']==28 || $post['subcategory_ids']==29){
								
										if(substr($_FILES['categoryfile']['name'], 0, 30)=='Fashioncategoryfileethinicwear'){
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
																		
																		$totalfields[] = $fields;
																		if(empty($fields[1])) {
																			$data['errors'][]="Product name is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[1]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[1]))	  	
																			{
																			$data['errors'][]='Product name wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[2])){
																			$data['errors'][]="Sku code is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[2]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[2]))	  	
																			{
																			$data['errors'][]='Sku code wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}else{
																				$result = $this->products_model->get_skuid_exists($fields[2]);
																				if(count($result)>0){
																				$data['errors'][]="Sku code already exits .please use another Sku code. Row Id is :  ".$key.'<br>';
																				$error=1;	
																				}

																			}

																		}
																		if(empty($fields[3])) {
																			$data['errors'][]="Other Unique code is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[3]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[3]))	  	
																			{
																			$data['errors'][]='Other Unique code wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[4])) {
																			$data['errors'][]="Price is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[4]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[4]))	  	
																			{
																			$data['errors'][]='Price  can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[5])) {
																			$data['errors'][]="Special Price is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[5]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[5]))	  	
																			{
																			$data['errors'][]='Special Price  can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if($fields[6]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[6]))	  	
																			{
																			$data['errors'][]='Offer can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if($fields[7]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[7]))	  	
																			{
																			$data['errors'][]='Discount can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[8])) {
																			$data['errors'][]="Qty is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[8]!=''){
																			$regex ="/^[0-9]+$/"; 
																			if(!preg_match( $regex, $fields[8]))
																			{
																			$data['errors'][]="Qty must be digits. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[9])) {
																			$data['errors'][]="Meta keywords is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[9]!=''){
																			$regex ="/^[a-zA-Z0-9.-_& ]+$/"; 
																			if(!preg_match( $regex, $fields[9]))	  	
																			{
																			$data['errors'][]='Meta keywords can only consist of alphanumaric, space and dot. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[10])) {
																			$data['errors'][]="Meta title is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[10]!=''){
																			$regex ="/^[a-zA-Z0-9.-_& ]+$/"; 
																			if(!preg_match( $regex, $fields[10]))	  	
																			{
																			$data['errors'][]='Meta title can only consist of alphanumaric, space and dot. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[11])) {
																			$data['errors'][]="Status is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[11]!=''){
																			$regex ="/^[0-1]+$/"; 
																			if(!preg_match( $regex, $fields[11]))
																			{
																			$data['errors'][]="Status must be  0 or 1. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[12])) {
																			$data['errors'][]="Product description is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[12]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[12]))	  	
																			{
																			$data['errors'][]='Product description wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[13])) {
																			$data['errors'][]="Sub Item is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[13]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[13]))	  	
																			{
																			$data['errors'][]='Sub Item wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[14])) {
																			$data['errors'][]="Brand is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[14]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[14]))	  	
																			{
																			$data['errors'][]='Brand wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[15])) {
																			$data['errors'][]="Ideal for required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[15]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[15]))
																			{
																			$data['errors'][]="Ideal for wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[16])) {
																			$data['errors'][]="Product specifications name is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[16]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[16]))	  	
																			{
																			$data['errors'][]='Product specifications name wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[17])) {
																			$data['errors'][]="Product specifications value is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[17]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[17]))	  	
																			{
																			$data['errors'][]='Product specifications value wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		} 
																		if(empty($fields[18])) {
																			$data['errors'][]="Sizes is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[18]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[18]))	  	
																			{
																			$data['errors'][]='Sizes wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[19])) {
																			$data['errors'][]="Colors is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[19]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[19]))	  	
																			{
																			$data['errors'][]='Colors wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		
																		
																		if(empty($fields[20])) {
																			$data['errors'][]="Type is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[20]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[20]))	  	
																			{
																			$data['errors'][]='Type wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		} if(empty($fields[21])) {
																			$data['errors'][]="Theme is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[21]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[21]))	  	
																			{
																			$data['errors'][]='Theme wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[22])) {
																			$data['errors'][]="Image is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[22]!=''){
																				$image_link = $fields[22];
																				$split_image1 = pathinfo($image_link);
																				$imagename=$split_image1['filename'].".".$split_image1['extension'];
																				$split_image = pathinfo($imagename,PATHINFO_EXTENSION);;
																				if($split_image != "jpg" && $split_image !="png" && $split_image != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[23])&& $fields[23]!=''){
																				$img1 = $fields[23];
																				$img12 = pathinfo($img1);
																				$imagename22=$img12['filename'].".".$img12['extension'];
																				$split_image212 = pathinfo($imagename22,PATHINFO_EXTENSION);;
																				if($split_image212 != "jpg" && $split_image212 !="png" && $split_image212 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[24])&& $fields[24]!=''){
																				$img2 = $fields[24];
																				$img122 = pathinfo($img2);
																				$imagename2233=$img122['filename'].".".$img122['extension'];
																				$image3 = pathinfo($imagename2233,PATHINFO_EXTENSION);;
																				if($image3 != "jpg" && $image3 !="png" && $image3 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[25])&& $fields[25]!=''){
																				$img4 = $fields[25];
																				$img133 = pathinfo($img4);
																				$imagename5656=$img133['filename'].".".$img133['extension'];
																				$image4 = pathinfo($imagename5656,PATHINFO_EXTENSION);;
																				if($image4 != "jpg" && $image4 !="png" && $image4 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[26])&& $fields[26]!=''){
																				$image5 = $fields[26];
																				$image55 = pathinfo($image5);
																				$imagename555=$image55['filename'].".".$image55['extension'];
																				$image5555 = pathinfo($imagename555,PATHINFO_EXTENSION);;
																				if($image5555 != "jpg" && $image5555 !="png" && $image5555 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[27])&& $fields[27]!=''){
																				$image6 = $fields[27];
																				$image66 = pathinfo($image6);
																				$imagename666=$image66['filename'].".".$image66['extension'];
																				$image6666 = pathinfo($imagename666,PATHINFO_EXTENSION);;
																				if($image6666 != "jpg" && $image6666 !="png" && $image6666 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[28])&& $fields[28]!=''){
																				$image7 = $fields[28];
																				$image77 = pathinfo($image7);
																				$imagename777=$image77['filename'].".".$image77['extension'];
																				$image7777 = pathinfo($imagename777,PATHINFO_EXTENSION);;
																				if($image7777 != "jpg" && $image7777 !="png" && $image7777 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[29])&& $fields[29]!=''){
																				$image8 = $fields[29];
																				$image88 = pathinfo($image8);
																				$imagename888=$image88['filename'].".".$image88['extension'];
																				$image8888 = pathinfo($imagename888,PATHINFO_EXTENSION);;
																				if($image8888 != "jpg" && $image8888 !="png" && $image8888 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[30])&& $fields[30]!=''){
																				$image9 = $fields[30];
																				$image99 = pathinfo($image9);
																				$imagename999=$image99['filename'].".".$image99['extension'];
																				$image9999 = pathinfo($imagename999,PATHINFO_EXTENSION);;
																				if($image9999 != "jpg" && $image9999 !="png" && $image9999 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[31])&& $fields[31]!=''){
																				$image01 = $fields[31];
																				$image001 = pathinfo($image01);
																				$imagename0001=$image001['filename'].".".$image001['extension'];
																				$image00001 = pathinfo($imagename0001,PATHINFO_EXTENSION);;
																				if($image00001 != "jpg" && $image00001 !="png" && $image00001 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[32])&& $fields[32]!=''){
																				$image11 = $fields[32];
																				$image111 = pathinfo($image11);
																				$imagename1111=$image111['filename'].".".$image111['extension'];
																				$image11111 = pathinfo($imagename1111,PATHINFO_EXTENSION);;
																				if($image11111 != "jpg" && $image11111 !="png" && $image11111 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																				
																		}
																		if(isset($fields[33])&& $fields[33]!=''){
																				$image12 = $fields[33];
																				$image112 = pathinfo($image12);
																				$imagename1112=$image112['filename'].".".$image112['extension'];
																				$image11112 = pathinfo($imagename1112,PATHINFO_EXTENSION);;
																				if($image11112 != "jpg" && $image11112 !="png" && $image11112 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
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
																$path='/home/cartinhour/public_html/uploads/products/';
																//echo '<pre>';print_r($data);exit;
																	$image_link = $data[22];
																	$split_image = pathinfo($image_link);
																	$imagename=round(microtime(true)).$split_image['filename'].".".$split_image['extension'];
																	copy($data[22], $path.$imagename);
																	if(isset($data[23])&& $data[23]!=''){
																		$image_link1 = $data[23];
																		$split_image1 = pathinfo($image_link1);
																		$imagename1=round(microtime(true)).$split_image1['filename'].".".$split_image1['extension'];
																		copy($data[23], $path.$imagename1);
																	}
																	if(isset($data[24])&& $data[24]!=''){
																			$image_link2 = $data[24];
																			$split_image2 = pathinfo($image_link2);
																			$imagename2=round(microtime(true)).$split_image2['filename'].".".$split_image2['extension'];
																			copy($data[24], $path.$imagename2);
																	}
																	if(isset($data[25])&& $data[25]!=''){
																			$image_link3 = $data[25];
																			$split_image3 = pathinfo($image_link3);
																			$imagename3=round(microtime(true)).$split_image3['filename'].".".$split_image3['extension'];
																			copy($data[25], $path.$imagename3);
																			
																	}
																	if(isset($data[26])&& $data[26]!=''){
																			$image_link4 = $data[26];
																			$split_image4 = pathinfo($image_link4);
																			$imagename4=round(microtime(true)).$split_image4['filename'].".".$split_image4['extension'];
																			copy($data[26], $path.$imagename4);
																			
																	}
																	if(isset($data[27])&& $data[27]!=''){
																			$image_link5 = $data[27];
																			$split_image5 = pathinfo($image_link5);
																			$imagename5=round(microtime(true)).$split_image5['filename'].".".$split_image5['extension'];
																			copy($data[27], $path.$imagename5);
																			
																	}
																	if(isset($data[28])&& $data[28]!=''){
																		$image_link6 = $data[28];
																		$split_image6 = pathinfo($image_link6);
																		$imagename6=round(microtime(true)).$split_image6['filename'].".".$split_image6['extension'];
																		copy($data[28], $path.$imagename6);
																	
																	}
																	if(isset($data[29])&& $data[29]!=''){
																		$image_link7 = $data[29];
																		$split_image7 = pathinfo($image_link7);
																		$imagename7=round(microtime(true)).$split_image7['filename'].".".$split_image7['extension'];
																		copy($data[29], $path.$imagename7);
																	
																	}
																	if(isset($data[30])&& $data[30]!=''){
																			$image_link8 = $data[30];
																			$split_image8 = pathinfo($image_link8);
																			$imagename8=round(microtime(true)).$split_image8['filename'].".".$split_image8['extension'];
																			copy($data[30], $path.$imagename8);
																			
																	}
																	if(isset($data[31])&& $data[31]!=''){
																		$image_link9 = $data[31];
																		$split_image9 = pathinfo($image_link9);
																		$imagename9=round(microtime(true)).$split_image9['filename'].".".$split_image9['extension'];
																		copy($data[31], $path.$imagename9);
																	}
																	if(isset($data[32])&& $data[32]!=''){
																		$image_link10 = $data[32];
																		$split_image10 = pathinfo($image_link10);
																		$imagename10=round(microtime(true)).$split_image10['filename'].".".$split_image10['extension'];
																		copy($data[32], $path.$imagename10);
																	
																	}
																	if(isset($data[33])&& $data[33]!=''){
																		$image_link11 = $data[33];
																		$split_image11 = pathinfo($image_link11);
																		$imagename11=round(microtime(true)).$split_image11['filename'].".".$split_image11['extension'];
																		copy($data[33], $path.$imagename11);
																		
																	}
																	
																	$adddetails=array(
																			'category_id' => $post['category_ids'],			
																			'subcategory_id' =>$post['subcategory_ids'],
																			'seller_id' =>$this->session->userdata('seller_id'), 
																			'item_name' => $data[1],
																			'skuid' => $data[2],
																			'item_code' => $data[3],
																			'item_cost' => $data[4],
																			'special_price' => $data[5],
																			'offers' =>$data[6],
																			'discount' =>$data[7],
																			'item_quantity' =>$data[8],
																			'keywords' =>$data[9],
																			'title' =>$data[10],
																			'item_status' => $data[11],
																			'item_description' =>$data[12],
																			'item_sub_name' =>$data[13],
																			'brand' =>$data[14],
																			'ideal_for' =>$data[15],
																			'producttype' =>$data[20],
																			'theme' =>$data[21],
																			'item_image'=>isset($imagename)?$imagename:'',
																			'item_image1'=>isset($imagename1)?$imagename1:'',
																			'item_image2'=>isset($imagename2)?$imagename2:'',
																			'item_image3'=>isset($imagename3)?$imagename3:'',
																			'item_image4'=>isset($imagename4)?$imagename4:'',
																			'item_image5'=>isset($imagename5)?$imagename5:'',
																			'item_image6'=>isset($imagename6)?$imagename6:'',
																			'item_image7'=>isset($imagename7)?$imagename7:'',
																			'item_image8'=>isset($imagename8)?$imagename8:'',
																			'item_image9'=>isset($imagename9)?$imagename9:'',
																			'item_image10'=>isset($imagename10)?$imagename10:'',
																			'item_image11'=>isset($imagename11)?$imagename11:'',
																			'seller_location_area'=>$seller_location['area'],
																			'created_at'=>date('Y-m-d H:i:s'),

																		);
																		//echo '<pre>';print_r($adddetails);exit;
																			$results=$this->products_model->save_prodcts($adddetails);
																				if(count($results)>0){
																						
																						
																						
																						
																						
																						
																							/* for size purpose*/
																							foreach(explode(",",$data[18]) as $listsizes){
																							if($listsizes !=''){
																								$addsizesdata=array(
																								'item_id' =>$results,
																								'p_size_name' => $listsizes,
																								'create_at' => date('Y-m-d H:i:s'),
																								);
																								$this->products_model->insert_product_sizes($addsizesdata);
																								}
																							}
																							/* for size purpose*/
																							/* for color purpose*/
																							foreach(explode(",",$data[19]) as $listcolors){
																								if($listcolors !=''){
																										$addcolorsdata=array(
																										'item_id' =>$results,
																										'color_name' => $listcolors,
																										'create_at' => date('Y-m-d H:i:s'),
																										);
																								$this->products_model->insert_product_colors($addcolorsdata);
																								}
																							
																							}
																							/* for color purpose*/
														
																						/* for spcification purpose*/
																						$arr1=explode(",",$data[16]);
																						$arr2=explode(",",$data[17]);
																						foreach (array_combine($arr1,$arr2) as $key=>$list){
																							if($list!='' && $key!=''){
																							$addspc=array(
																							'item_id' =>$results,
																							'spc_name' => $key,
																							'spc_value' => $list,
																							'create_at' => date('Y-m-d H:i:s'),
																							);
																							$this->products_model->insert_product_spcifications($addspc);
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
								
								
							}else if($post['subcategory_ids']==15){
									
									if(substr($_FILES['categoryfile']['name'], 0, 27)=='Fashioncategoryfilejwellery'){
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
																		
																		$totalfields[] = $fields;
																		if(empty($fields[1])) {
																			$data['errors'][]="Product name is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[1]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[1]))	  	
																			{
																			$data['errors'][]='Product name wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[2])){
																			$data['errors'][]="Sku code is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[2]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[2]))	  	
																			{
																			$data['errors'][]='Sku code wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}else{
																				$result = $this->products_model->get_skuid_exists($fields[2]);
																				if(count($result)>0){
																				$data['errors'][]="Sku code already exits .please use another Sku code. Row Id is :  ".$key.'<br>';
																				$error=1;	
																				}

																			}

																		}
																		if(empty($fields[3])) {
																			$data['errors'][]="Other Unique code is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[3]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[3]))	  	
																			{
																			$data['errors'][]='Other Unique code wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[4])) {
																			$data['errors'][]="Price is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[4]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[4]))	  	
																			{
																			$data['errors'][]='Price  can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[5])) {
																			$data['errors'][]="Special Price is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[5]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[5]))	  	
																			{
																			$data['errors'][]='Special Price  can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if($fields[6]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[6]))	  	
																			{
																			$data['errors'][]='Offer can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if($fields[7]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[7]))	  	
																			{
																			$data['errors'][]='Discount can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[8])) {
																			$data['errors'][]="Qty is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[8]!=''){
																			$regex ="/^[0-9]+$/"; 
																			if(!preg_match( $regex, $fields[8]))
																			{
																			$data['errors'][]="Qty must be digits. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[9])) {
																			$data['errors'][]="Meta keywords is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[9]!=''){
																			$regex ="/^[a-zA-Z0-9.-_& ]+$/"; 
																			if(!preg_match( $regex, $fields[9]))	  	
																			{
																			$data['errors'][]='Meta keywords can only consist of alphanumaric, space and dot. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[10])) {
																			$data['errors'][]="Meta title is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[10]!=''){
																			$regex ="/^[a-zA-Z0-9.-_& ]+$/"; 
																			if(!preg_match( $regex, $fields[10]))	  	
																			{
																			$data['errors'][]='Meta title can only consist of alphanumaric, space and dot. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[11])) {
																			$data['errors'][]="Status is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[11]!=''){
																			$regex ="/^[0-1]+$/"; 
																			if(!preg_match( $regex, $fields[11]))
																			{
																			$data['errors'][]="Status must be  0 or 1. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[12])) {
																			$data['errors'][]="Product description is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[12]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[12]))	  	
																			{
																			$data['errors'][]='Product description wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[13])) {
																			$data['errors'][]="Sub Item is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[13]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[13]))	  	
																			{
																			$data['errors'][]='Sub Item wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[14])) {
																			$data['errors'][]="Brand is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[14]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[14]))	  	
																			{
																			$data['errors'][]='Brand wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[15])) {
																			$data['errors'][]="Ideal for required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[15]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[15]))
																			{
																			$data['errors'][]="Ideal for wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[16])) {
																			$data['errors'][]="Product specifications name is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[16]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[16]))	  	
																			{
																			$data['errors'][]='Product specifications name wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[17])) {
																			$data['errors'][]="Product specifications value is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[17]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[17]))	  	
																			{
																			$data['errors'][]='Product specifications value wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		} 
																		
																		if(empty($fields[18])) {
																			$data['errors'][]="Colors is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[18]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[18]))	  	
																			{
																			$data['errors'][]='Colors wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		
																		
																		if(empty($fields[19])) {
																			$data['errors'][]="material is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[19]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[19]))	  	
																			{
																			$data['errors'][]='material wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		} if(empty($fields[20])) {
																			$data['errors'][]="Gemstones is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[20]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[20]))	  	
																			{
																			$data['errors'][]='Gemstones wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[21])) {
																			$data['errors'][]="Image is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[21]!=''){
																				$image_link = $fields[21];
																				$split_image1 = pathinfo($image_link);
																				$imagename=$split_image1['filename'].".".$split_image1['extension'];
																				$split_image = pathinfo($imagename,PATHINFO_EXTENSION);;
																				if($split_image != "jpg" && $split_image !="png" && $split_image != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[22])&& $fields[22]!=''){
																				$img1 = $fields[22];
																				$img12 = pathinfo($img1);
																				$imagename22=$img12['filename'].".".$img12['extension'];
																				$split_image212 = pathinfo($imagename22,PATHINFO_EXTENSION);;
																				if($split_image212 != "jpg" && $split_image212 !="png" && $split_image212 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[23])&& $fields[23]!=''){
																				$img2 = $fields[23];
																				$img122 = pathinfo($img2);
																				$imagename2233=$img122['filename'].".".$img122['extension'];
																				$image3 = pathinfo($imagename2233,PATHINFO_EXTENSION);;
																				if($image3 != "jpg" && $image3 !="png" && $image3 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[24])&& $fields[24]!=''){
																				$img4 = $fields[24];
																				$img133 = pathinfo($img4);
																				$imagename5656=$img133['filename'].".".$img133['extension'];
																				$image4 = pathinfo($imagename5656,PATHINFO_EXTENSION);;
																				if($image4 != "jpg" && $image4 !="png" && $image4 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[25])&& $fields[25]!=''){
																				$image5 = $fields[25];
																				$image55 = pathinfo($image5);
																				$imagename555=$image55['filename'].".".$image55['extension'];
																				$image5555 = pathinfo($imagename555,PATHINFO_EXTENSION);;
																				if($image5555 != "jpg" && $image5555 !="png" && $image5555 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[26])&& $fields[26]!=''){
																				$image6 = $fields[26];
																				$image66 = pathinfo($image6);
																				$imagename666=$image66['filename'].".".$image66['extension'];
																				$image6666 = pathinfo($imagename666,PATHINFO_EXTENSION);;
																				if($image6666 != "jpg" && $image6666 !="png" && $image6666 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[27])&& $fields[27]!=''){
																				$image7 = $fields[27];
																				$image77 = pathinfo($image7);
																				$imagename777=$image77['filename'].".".$image77['extension'];
																				$image7777 = pathinfo($imagename777,PATHINFO_EXTENSION);;
																				if($image7777 != "jpg" && $image7777 !="png" && $image7777 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[28])&& $fields[28]!=''){
																				$image8 = $fields[28];
																				$image88 = pathinfo($image8);
																				$imagename888=$image88['filename'].".".$image88['extension'];
																				$image8888 = pathinfo($imagename888,PATHINFO_EXTENSION);;
																				if($image8888 != "jpg" && $image8888 !="png" && $image8888 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[29])&& $fields[29]!=''){
																				$image9 = $fields[29];
																				$image99 = pathinfo($image9);
																				$imagename999=$image99['filename'].".".$image99['extension'];
																				$image9999 = pathinfo($imagename999,PATHINFO_EXTENSION);;
																				if($image9999 != "jpg" && $image9999 !="png" && $image9999 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[30])&& $fields[30]!=''){
																				$image01 = $fields[30];
																				$image001 = pathinfo($image01);
																				$imagename0001=$image001['filename'].".".$image001['extension'];
																				$image00001 = pathinfo($imagename0001,PATHINFO_EXTENSION);;
																				if($image00001 != "jpg" && $image00001 !="png" && $image00001 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[31])&& $fields[31]!=''){
																				$image11 = $fields[31];
																				$image111 = pathinfo($image11);
																				$imagename1111=$image111['filename'].".".$image111['extension'];
																				$image11111 = pathinfo($imagename1111,PATHINFO_EXTENSION);;
																				if($image11111 != "jpg" && $image11111 !="png" && $image11111 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																				
																		}
																		if(isset($fields[32])&& $fields[32]!=''){
																				$image12 = $fields[32];
																				$image112 = pathinfo($image12);
																				$imagename1112=$image112['filename'].".".$image112['extension'];
																				$image11112 = pathinfo($imagename1112,PATHINFO_EXTENSION);;
																				if($image11112 != "jpg" && $image11112 !="png" && $image11112 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
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
																$path='/home/cartinhour/public_html/uploads/products/';
																//echo '<pre>';print_r($data);exit;
																	$image_link = $data[21];
																	$split_image = pathinfo($image_link);
																	$imagename=round(microtime(true)).$split_image['filename'].".".$split_image['extension'];
																	copy($data[21], $path.$imagename);
																	if(isset($data[22])&& $data[22]!=''){
																		$image_link1 = $data[22];
																		$split_image1 = pathinfo($image_link1);
																		$imagename1=round(microtime(true)).$split_image1['filename'].".".$split_image1['extension'];
																		copy($data[22], $path.$imagename1);
																	}
																	if(isset($data[23])&& $data[23]!=''){
																			$image_link2 = $data[23];
																			$split_image2 = pathinfo($image_link2);
																			$imagename2=round(microtime(true)).$split_image2['filename'].".".$split_image2['extension'];
																			copy($data[23], $path.$imagename2);
																	}
																	if(isset($data[24])&& $data[24]!=''){
																			$image_link3 = $data[24];
																			$split_image3 = pathinfo($image_link3);
																			$imagename3=round(microtime(true)).$split_image3['filename'].".".$split_image3['extension'];
																			copy($data[24], $path.$imagename3);
																			
																	}
																	if(isset($data[25])&& $data[25]!=''){
																			$image_link4 = $data[25];
																			$split_image4 = pathinfo($image_link4);
																			$imagename4=round(microtime(true)).$split_image4['filename'].".".$split_image4['extension'];
																			copy($data[25], $path.$imagename4);
																			
																	}
																	if(isset($data[26])&& $data[26]!=''){
																			$image_link5 = $data[26];
																			$split_image5 = pathinfo($image_link5);
																			$imagename5=round(microtime(true)).$split_image5['filename'].".".$split_image5['extension'];
																			copy($data[26], $path.$imagename5);
																			
																	}
																	if(isset($data[27])&& $data[27]!=''){
																		$image_link6 = $data[27];
																		$split_image6 = pathinfo($image_link6);
																		$imagename6=round(microtime(true)).$split_image6['filename'].".".$split_image6['extension'];
																		copy($data[27], $path.$imagename6);
																	
																	}
																	if(isset($data[28])&& $data[28]!=''){
																		$image_link7 = $data[28];
																		$split_image7 = pathinfo($image_link7);
																		$imagename7=round(microtime(true)).$split_image7['filename'].".".$split_image7['extension'];
																		copy($data[28], $path.$imagename7);
																	
																	}
																	if(isset($data[29])&& $data[29]!=''){
																			$image_link8 = $data[29];
																			$split_image8 = pathinfo($image_link8);
																			$imagename8=round(microtime(true)).$split_image8['filename'].".".$split_image8['extension'];
																			copy($data[29], $path.$imagename8);
																			
																	}
																	if(isset($data[30])&& $data[30]!=''){
																		$image_link9 = $data[30];
																		$split_image9 = pathinfo($image_link9);
																		$imagename9=round(microtime(true)).$split_image9['filename'].".".$split_image9['extension'];
																		copy($data[30], $path.$imagename9);
																	}
																	if(isset($data[31])&& $data[31]!=''){
																		$image_link10 = $data[31];
																		$split_image10 = pathinfo($image_link10);
																		$imagename10=round(microtime(true)).$split_image10['filename'].".".$split_image10['extension'];
																		copy($data[31], $path.$imagename10);
																	
																	}
																	if(isset($data[32])&& $data[32]!=''){
																		$image_link11 = $data[32];
																		$split_image11 = pathinfo($image_link11);
																		$imagename11=round(microtime(true)).$split_image11['filename'].".".$split_image11['extension'];
																		copy($data[32], $path.$imagename11);
																		
																	}
																	
																	$adddetails=array(
																			'category_id' => $post['category_ids'],			
																			'subcategory_id' =>$post['subcategory_ids'],
																			'seller_id' =>$this->session->userdata('seller_id'), 
																			'item_name' => $data[1],
																			'skuid' => $data[2],
																			'item_code' => $data[3],
																			'item_cost' => $data[4],
																			'special_price' => $data[5],
																			'offers' =>$data[6],
																			'discount' =>$data[7],
																			'item_quantity' =>$data[8],
																			'keywords' =>$data[9],
																			'title' =>$data[10],
																			'item_status' => $data[11],
																			'item_description' =>$data[12],
																			'item_sub_name' =>$data[13],
																			'brand' =>$data[14],
																			'ideal_for' =>$data[15],
																			'producttype' =>$data[20],
																			'material' =>$data[19],
																			'gemstones' =>$data[20],
																			'item_image'=>isset($imagename)?$imagename:'',
																			'item_image1'=>isset($imagename1)?$imagename1:'',
																			'item_image2'=>isset($imagename2)?$imagename2:'',
																			'item_image3'=>isset($imagename3)?$imagename3:'',
																			'item_image4'=>isset($imagename4)?$imagename4:'',
																			'item_image5'=>isset($imagename5)?$imagename5:'',
																			'item_image6'=>isset($imagename6)?$imagename6:'',
																			'item_image7'=>isset($imagename7)?$imagename7:'',
																			'item_image8'=>isset($imagename8)?$imagename8:'',
																			'item_image9'=>isset($imagename9)?$imagename9:'',
																			'item_image10'=>isset($imagename10)?$imagename10:'',
																			'item_image11'=>isset($imagename11)?$imagename11:'',
																			'seller_location_area'=>$seller_location['area'],
																			'created_at'=>date('Y-m-d H:i:s'),

																		);
																		//echo '<pre>';print_r($adddetails);exit;
																			$results=$this->products_model->save_prodcts($adddetails);
																				if(count($results)>0){
																					/* for color purpose*/
																							foreach(explode(",",$data[18]) as $listcolors){
																								if($listcolors !=''){
																										$addcolorsdata=array(
																										'item_id' =>$results,
																										'color_name' => $listcolors,
																										'create_at' => date('Y-m-d H:i:s'),
																										);
																								$this->products_model->insert_product_colors($addcolorsdata);
																								}
																							
																							}
																							/* for color purpose*/
														
																						/* for spcification purpose*/
																						$arr1=explode(",",$data[16]);
																						$arr2=explode(",",$data[17]);
																						foreach (array_combine($arr1,$arr2) as $key=>$list){
																							if($list!='' && $key!=''){
																							$addspc=array(
																							'item_id' =>$results,
																							'spc_name' => $key,
																							'spc_value' => $list,
																							'create_at' => date('Y-m-d H:i:s'),
																							);
																							$this->products_model->insert_product_spcifications($addspc);
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
									
									
								
							}else if($post['subcategory_ids']==18){
										
									if(substr($_FILES['categoryfile']['name'], 0, 39)=='FashioncategoryfileWomensswim&beachwear'){
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
																		
																		$totalfields[] = $fields;
																		if(empty($fields[1])) {
																			$data['errors'][]="Product name is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[1]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[1]))	  	
																			{
																			$data['errors'][]='Product name wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[2])){
																			$data['errors'][]="Sku code is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[2]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[2]))	  	
																			{
																			$data['errors'][]='Sku code wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}else{
																				$result = $this->products_model->get_skuid_exists($fields[2]);
																				if(count($result)>0){
																				$data['errors'][]="Sku code already exits .please use another Sku code. Row Id is :  ".$key.'<br>';
																				$error=1;	
																				}

																			}

																		}
																		if(empty($fields[3])) {
																			$data['errors'][]="Other Unique code is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[3]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[3]))	  	
																			{
																			$data['errors'][]='Other Unique code wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[4])) {
																			$data['errors'][]="Price is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[4]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[4]))	  	
																			{
																			$data['errors'][]='Price  can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[5])) {
																			$data['errors'][]="Special Price is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[5]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[5]))	  	
																			{
																			$data['errors'][]='Special Price  can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if($fields[6]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[6]))	  	
																			{
																			$data['errors'][]='Offer can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if($fields[7]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[7]))	  	
																			{
																			$data['errors'][]='Discount can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[8])) {
																			$data['errors'][]="Qty is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[8]!=''){
																			$regex ="/^[0-9]+$/"; 
																			if(!preg_match( $regex, $fields[8]))
																			{
																			$data['errors'][]="Qty must be digits. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[9])) {
																			$data['errors'][]="Meta keywords is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[9]!=''){
																			$regex ="/^[a-zA-Z0-9.-_& ]+$/"; 
																			if(!preg_match( $regex, $fields[9]))	  	
																			{
																			$data['errors'][]='Meta keywords can only consist of alphanumaric, space and dot. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[10])) {
																			$data['errors'][]="Meta title is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[10]!=''){
																			$regex ="/^[a-zA-Z0-9.-_& ]+$/"; 
																			if(!preg_match( $regex, $fields[10]))	  	
																			{
																			$data['errors'][]='Meta title can only consist of alphanumaric, space and dot. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[11])) {
																			$data['errors'][]="Status is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[11]!=''){
																			$regex ="/^[0-1]+$/"; 
																			if(!preg_match( $regex, $fields[11]))
																			{
																			$data['errors'][]="Status must be  0 or 1. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[12])) {
																			$data['errors'][]="Product description is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[12]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[12]))	  	
																			{
																			$data['errors'][]='Product description wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[13])) {
																			$data['errors'][]="Sub Item is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[13]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[13]))	  	
																			{
																			$data['errors'][]='Sub Item wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[14])) {
																			$data['errors'][]="Brand is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[14]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[14]))	  	
																			{
																			$data['errors'][]='Brand wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[15])) {
																			$data['errors'][]="Ideal for required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[15]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[15]))
																			{
																			$data['errors'][]="Ideal for wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[16])) {
																			$data['errors'][]="Product specifications name is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[16]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[16]))	  	
																			{
																			$data['errors'][]='Product specifications name wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[17])) {
																			$data['errors'][]="Product specifications value is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[17]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[17]))	  	
																			{
																			$data['errors'][]='Product specifications value wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		} 
																		if(empty($fields[18])) {
																			$data['errors'][]="Sizes is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[18]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[18]))	  	
																			{
																			$data['errors'][]='Sizes wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[19])) {
																			$data['errors'][]="Colors is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[19]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[19]))	  	
																			{
																			$data['errors'][]='Colors wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		
																		if(empty($fields[20])) {
																			$data['errors'][]="Image is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[20]!=''){
																				$image_link = $fields[20];
																				$split_image1 = pathinfo($image_link);
																				$imagename=$split_image1['filename'].".".$split_image1['extension'];
																				$split_image = pathinfo($imagename,PATHINFO_EXTENSION);;
																				if($split_image != "jpg" && $split_image !="png" && $split_image != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[21])&& $fields[21]!=''){
																				$img1 = $fields[21];
																				$img12 = pathinfo($img1);
																				$imagename22=$img12['filename'].".".$img12['extension'];
																				$split_image212 = pathinfo($imagename22,PATHINFO_EXTENSION);;
																				if($split_image212 != "jpg" && $split_image212 !="png" && $split_image212 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[22])&& $fields[22]!=''){
																				$img2 = $fields[22];
																				$img122 = pathinfo($img2);
																				$imagename2233=$img122['filename'].".".$img122['extension'];
																				$image3 = pathinfo($imagename2233,PATHINFO_EXTENSION);;
																				if($image3 != "jpg" && $image3 !="png" && $image3 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[23])&& $fields[23]!=''){
																				$img4 = $fields[23];
																				$img133 = pathinfo($img4);
																				$imagename5656=$img133['filename'].".".$img133['extension'];
																				$image4 = pathinfo($imagename5656,PATHINFO_EXTENSION);;
																				if($image4 != "jpg" && $image4 !="png" && $image4 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[24])&& $fields[24]!=''){
																				$image5 = $fields[24];
																				$image55 = pathinfo($image5);
																				$imagename555=$image55['filename'].".".$image55['extension'];
																				$image5555 = pathinfo($imagename555,PATHINFO_EXTENSION);;
																				if($image5555 != "jpg" && $image5555 !="png" && $image5555 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[25])&& $fields[25]!=''){
																				$image6 = $fields[25];
																				$image66 = pathinfo($image6);
																				$imagename666=$image66['filename'].".".$image66['extension'];
																				$image6666 = pathinfo($imagename666,PATHINFO_EXTENSION);;
																				if($image6666 != "jpg" && $image6666 !="png" && $image6666 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[26])&& $fields[26]!=''){
																				$image7 = $fields[26];
																				$image77 = pathinfo($image7);
																				$imagename777=$image77['filename'].".".$image77['extension'];
																				$image7777 = pathinfo($imagename777,PATHINFO_EXTENSION);;
																				if($image7777 != "jpg" && $image7777 !="png" && $image7777 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[27])&& $fields[27]!=''){
																				$image8 = $fields[27];
																				$image88 = pathinfo($image8);
																				$imagename888=$image88['filename'].".".$image88['extension'];
																				$image8888 = pathinfo($imagename888,PATHINFO_EXTENSION);;
																				if($image8888 != "jpg" && $image8888 !="png" && $image8888 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[28])&& $fields[28]!=''){
																				$image9 = $fields[28];
																				$image99 = pathinfo($image9);
																				$imagename999=$image99['filename'].".".$image99['extension'];
																				$image9999 = pathinfo($imagename999,PATHINFO_EXTENSION);;
																				if($image9999 != "jpg" && $image9999 !="png" && $image9999 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[29])&& $fields[29]!=''){
																				$image01 = $fields[29];
																				$image001 = pathinfo($image01);
																				$imagename0001=$image001['filename'].".".$image001['extension'];
																				$image00001 = pathinfo($imagename0001,PATHINFO_EXTENSION);;
																				if($image00001 != "jpg" && $image00001 !="png" && $image00001 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[30])&& $fields[30]!=''){
																				$image11 = $fields[30];
																				$image111 = pathinfo($image11);
																				$imagename1111=$image111['filename'].".".$image111['extension'];
																				$image11111 = pathinfo($imagename1111,PATHINFO_EXTENSION);;
																				if($image11111 != "jpg" && $image11111 !="png" && $image11111 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																				
																		}
																		if(isset($fields[31])&& $fields[31]!=''){
																				$image12 = $fields[31];
																				$image112 = pathinfo($image12);
																				$imagename1112=$image112['filename'].".".$image112['extension'];
																				$image11112 = pathinfo($imagename1112,PATHINFO_EXTENSION);;
																				if($image11112 != "jpg" && $image11112 !="png" && $image11112 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
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
																$path='/home/cartinhour/public_html/uploads/products/';
																//echo '<pre>';print_r($data);exit;
																	$image_link = $data[20];
																	$split_image = pathinfo($image_link);
																	$imagename=round(microtime(true)).$split_image['filename'].".".$split_image['extension'];
																	copy($data[20], $path.$imagename);
																	if(isset($data[21])&& $data[21]!=''){
																		$image_link1 = $data[21];
																		$split_image1 = pathinfo($image_link1);
																		$imagename1=round(microtime(true)).$split_image1['filename'].".".$split_image1['extension'];
																		copy($data[21], $path.$imagename1);
																	}
																	if(isset($data[22])&& $data[22]!=''){
																			$image_link2 = $data[22];
																			$split_image2 = pathinfo($image_link2);
																			$imagename2=round(microtime(true)).$split_image2['filename'].".".$split_image2['extension'];
																			copy($data[22], $path.$imagename2);
																	}
																	if(isset($data[23])&& $data[23]!=''){
																			$image_link3 = $data[23];
																			$split_image3 = pathinfo($image_link3);
																			$imagename3=round(microtime(true)).$split_image3['filename'].".".$split_image3['extension'];
																			copy($data[23], $path.$imagename3);
																			
																	}
																	if(isset($data[24])&& $data[24]!=''){
																			$image_link4 = $data[24];
																			$split_image4 = pathinfo($image_link4);
																			$imagename4=round(microtime(true)).$split_image4['filename'].".".$split_image4['extension'];
																			copy($data[24], $path.$imagename4);
																			
																	}
																	if(isset($data[25])&& $data[25]!=''){
																			$image_link5 = $data[25];
																			$split_image5 = pathinfo($image_link5);
																			$imagename5=round(microtime(true)).$split_image5['filename'].".".$split_image5['extension'];
																			copy($data[25], $path.$imagename5);
																			
																	}
																	if(isset($data[26])&& $data[26]!=''){
																		$image_link6 = $data[26];
																		$split_image6 = pathinfo($image_link6);
																		$imagename6=round(microtime(true)).$split_image6['filename'].".".$split_image6['extension'];
																		copy($data[26], $path.$imagename6);
																	
																	}
																	if(isset($data[27])&& $data[27]!=''){
																		$image_link7 = $data[27];
																		$split_image7 = pathinfo($image_link7);
																		$imagename7=round(microtime(true)).$split_image7['filename'].".".$split_image7['extension'];
																		copy($data[27], $path.$imagename7);
																	
																	}
																	if(isset($data[28])&& $data[28]!=''){
																			$image_link8 = $data[28];
																			$split_image8 = pathinfo($image_link8);
																			$imagename8=round(microtime(true)).$split_image8['filename'].".".$split_image8['extension'];
																			copy($data[28], $path.$imagename8);
																			
																	}
																	if(isset($data[29])&& $data[29]!=''){
																		$image_link9 = $data[29];
																		$split_image9 = pathinfo($image_link9);
																		$imagename9=round(microtime(true)).$split_image9['filename'].".".$split_image9['extension'];
																		copy($data[29], $path.$imagename9);
																	}
																	if(isset($data[30])&& $data[30]!=''){
																		$image_link10 = $data[30];
																		$split_image10 = pathinfo($image_link10);
																		$imagename10=round(microtime(true)).$split_image10['filename'].".".$split_image10['extension'];
																		copy($data[30], $path.$imagename10);
																	
																	}
																	if(isset($data[31])&& $data[31]!=''){
																		$image_link11 = $data[31];
																		$split_image11 = pathinfo($image_link11);
																		$imagename11=round(microtime(true)).$split_image11['filename'].".".$split_image11['extension'];
																		copy($data[31], $path.$imagename11);
																		
																	}
																	
																	$adddetails=array(
																			'category_id' => $post['category_ids'],			
																			'subcategory_id' =>$post['subcategory_ids'],
																			'seller_id' =>$this->session->userdata('seller_id'), 
																			'item_name' => $data[1],
																			'skuid' => $data[2],
																			'item_code' => $data[3],
																			'item_cost' => $data[4],
																			'special_price' => $data[5],
																			'offers' =>$data[6],
																			'discount' =>$data[7],
																			'item_quantity' =>$data[8],
																			'keywords' =>$data[9],
																			'title' =>$data[10],
																			'item_status' => $data[11],
																			'item_description' =>$data[12],
																			'item_sub_name' =>$data[13],
																			'brand' =>$data[14],
																			'ideal_for' =>$data[15],
																			'item_image'=>isset($imagename)?$imagename:'',
																			'item_image1'=>isset($imagename1)?$imagename1:'',
																			'item_image2'=>isset($imagename2)?$imagename2:'',
																			'item_image3'=>isset($imagename3)?$imagename3:'',
																			'item_image4'=>isset($imagename4)?$imagename4:'',
																			'item_image5'=>isset($imagename5)?$imagename5:'',
																			'item_image6'=>isset($imagename6)?$imagename6:'',
																			'item_image7'=>isset($imagename7)?$imagename7:'',
																			'item_image8'=>isset($imagename8)?$imagename8:'',
																			'item_image9'=>isset($imagename9)?$imagename9:'',
																			'item_image10'=>isset($imagename10)?$imagename10:'',
																			'item_image11'=>isset($imagename11)?$imagename11:'',
																			'seller_location_area'=>$seller_location['area'],
																			'created_at'=>date('Y-m-d H:i:s'),

																		);
																		//echo '<pre>';print_r($adddetails);exit;
																			$results=$this->products_model->save_prodcts($adddetails);
																				if(count($results)>0){
																						
																						
																						
																						
																						
																						
																							/* for size purpose*/
																							foreach(explode(",",$data[18]) as $listsizes){
																							if($listsizes !=''){
																								$addsizesdata=array(
																								'item_id' =>$results,
																								'p_size_name' => $listsizes,
																								'create_at' => date('Y-m-d H:i:s'),
																								);
																								$this->products_model->insert_product_sizes($addsizesdata);
																								}
																							}
																							/* for size purpose*/
																							/* for color purpose*/
																							foreach(explode(",",$data[19]) as $listcolors){
																								if($listcolors !=''){
																										$addcolorsdata=array(
																										'item_id' =>$results,
																										'color_name' => $listcolors,
																										'create_at' => date('Y-m-d H:i:s'),
																										);
																								$this->products_model->insert_product_colors($addcolorsdata);
																								}
																							
																							}
																							/* for color purpose*/
																						
																						/* for spcification purpose*/
																						$arr1=explode(",",$data[16]);
																						$arr2=explode(",",$data[17]);
																						foreach (array_combine($arr1,$arr2) as $key=>$list){
																							if($list!='' && $key!=''){
																							$addspc=array(
																							'item_id' =>$results,
																							'spc_name' => $key,
																							'spc_value' => $list,
																							'create_at' => date('Y-m-d H:i:s'),
																							);
																							$this->products_model->insert_product_spcifications($addspc);
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
								
								
							}else if($post['subcategory_ids']==50){
									
									if(substr($_FILES['categoryfile']['name'], 0, 32)=='FashioncategoryfileWomenswatches'){
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
																		
																		$totalfields[] = $fields;
																		if(empty($fields[1])) {
																			$data['errors'][]="Product name is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[1]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[1]))	  	
																			{
																			$data['errors'][]='Product name wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[2])){
																			$data['errors'][]="Sku code is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[2]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[2]))	  	
																			{
																			$data['errors'][]='Sku code wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}else{
																				$result = $this->products_model->get_skuid_exists($fields[2]);
																				if(count($result)>0){
																				$data['errors'][]="Sku code already exits .please use another Sku code. Row Id is :  ".$key.'<br>';
																				$error=1;	
																				}

																			}

																		}
																		if(empty($fields[3])) {
																			$data['errors'][]="Other Unique code is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[3]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[3]))	  	
																			{
																			$data['errors'][]='Other Unique code wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[4])) {
																			$data['errors'][]="Price is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[4]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[4]))	  	
																			{
																			$data['errors'][]='Price  can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[5])) {
																			$data['errors'][]="Special Price is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[5]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[5]))	  	
																			{
																			$data['errors'][]='Special Price  can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if($fields[6]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[6]))	  	
																			{
																			$data['errors'][]='Offer can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if($fields[7]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[7]))	  	
																			{
																			$data['errors'][]='Discount can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[8])) {
																			$data['errors'][]="Qty is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[8]!=''){
																			$regex ="/^[0-9]+$/"; 
																			if(!preg_match( $regex, $fields[8]))
																			{
																			$data['errors'][]="Qty must be digits. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[9])) {
																			$data['errors'][]="Meta keywords is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[9]!=''){
																			$regex ="/^[a-zA-Z0-9.-_& ]+$/"; 
																			if(!preg_match( $regex, $fields[9]))	  	
																			{
																			$data['errors'][]='Meta keywords can only consist of alphanumaric, space and dot. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[10])) {
																			$data['errors'][]="Meta title is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[10]!=''){
																			$regex ="/^[a-zA-Z0-9.-_& ]+$/"; 
																			if(!preg_match( $regex, $fields[10]))	  	
																			{
																			$data['errors'][]='Meta title can only consist of alphanumaric, space and dot. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[11])) {
																			$data['errors'][]="Status is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[11]!=''){
																			$regex ="/^[0-1]+$/"; 
																			if(!preg_match( $regex, $fields[11]))
																			{
																			$data['errors'][]="Status must be  0 or 1. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[12])) {
																			$data['errors'][]="Product description is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[12]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[12]))	  	
																			{
																			$data['errors'][]='Product description wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[13])) {
																			$data['errors'][]="Sub Item is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[13]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[13]))	  	
																			{
																			$data['errors'][]='Sub Item wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[14])) {
																			$data['errors'][]="Brand is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[14]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[14]))	  	
																			{
																			$data['errors'][]='Brand wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[15])) {
																			$data['errors'][]="Ideal for required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[15]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[15]))
																			{
																			$data['errors'][]="Ideal for wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[16])) {
																			$data['errors'][]="Product specifications name is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[16]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[16]))	  	
																			{
																			$data['errors'][]='Product specifications name wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[17])) {
																			$data['errors'][]="Product specifications value is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[17]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[17]))	  	
																			{
																			$data['errors'][]='Product specifications value wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		} 
																		if(empty($fields[18])) {
																			$data['errors'][]="Material is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[18]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[18]))	  	
																			{
																			$data['errors'][]='Material wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[19])) {
																			$data['errors'][]="Type is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[19]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[19]))	  	
																			{
																			$data['errors'][]='Type wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[20])) {
																			$data['errors'][]="Dial Shape is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[20]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[20]))	  	
																			{
																			$data['errors'][]='Dial Shape wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[21])) {
																			$data['errors'][]="Dial Color is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[21]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[21]))	  	
																			{
																			$data['errors'][]='Dial Color wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[22])) {
																			$data['errors'][]="Strap Color is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[22]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[22]))	  	
																			{
																			$data['errors'][]='Strap Color wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		
																		if(empty($fields[23])) {
																			$data['errors'][]="Image is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[23]!=''){
																				$image_link = $fields[23];
																				$split_image1 = pathinfo($image_link);
																				$imagename=$split_image1['filename'].".".$split_image1['extension'];
																				$split_image = pathinfo($imagename,PATHINFO_EXTENSION);;
																				if($split_image != "jpg" && $split_image !="png" && $split_image != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[24])&& $fields[24]!=''){
																				$img1 = $fields[24];
																				$img12 = pathinfo($img1);
																				$imagename22=$img12['filename'].".".$img12['extension'];
																				$split_image212 = pathinfo($imagename22,PATHINFO_EXTENSION);;
																				if($split_image212 != "jpg" && $split_image212 !="png" && $split_image212 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[25])&& $fields[25]!=''){
																				$img2 = $fields[25];
																				$img122 = pathinfo($img2);
																				$imagename2233=$img122['filename'].".".$img122['extension'];
																				$image3 = pathinfo($imagename2233,PATHINFO_EXTENSION);;
																				if($image3 != "jpg" && $image3 !="png" && $image3 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[26])&& $fields[26]!=''){
																				$img4 = $fields[26];
																				$img133 = pathinfo($img4);
																				$imagename5656=$img133['filename'].".".$img133['extension'];
																				$image4 = pathinfo($imagename5656,PATHINFO_EXTENSION);;
																				if($image4 != "jpg" && $image4 !="png" && $image4 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[27])&& $fields[27]!=''){
																				$image5 = $fields[27];
																				$image55 = pathinfo($image5);
																				$imagename555=$image55['filename'].".".$image55['extension'];
																				$image5555 = pathinfo($imagename555,PATHINFO_EXTENSION);;
																				if($image5555 != "jpg" && $image5555 !="png" && $image5555 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[28])&& $fields[28]!=''){
																				$image6 = $fields[28];
																				$image66 = pathinfo($image6);
																				$imagename666=$image66['filename'].".".$image66['extension'];
																				$image6666 = pathinfo($imagename666,PATHINFO_EXTENSION);;
																				if($image6666 != "jpg" && $image6666 !="png" && $image6666 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[29])&& $fields[29]!=''){
																				$image7 = $fields[29];
																				$image77 = pathinfo($image7);
																				$imagename777=$image77['filename'].".".$image77['extension'];
																				$image7777 = pathinfo($imagename777,PATHINFO_EXTENSION);;
																				if($image7777 != "jpg" && $image7777 !="png" && $image7777 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[30])&& $fields[30]!=''){
																				$image8 = $fields[30];
																				$image88 = pathinfo($image8);
																				$imagename888=$image88['filename'].".".$image88['extension'];
																				$image8888 = pathinfo($imagename888,PATHINFO_EXTENSION);;
																				if($image8888 != "jpg" && $image8888 !="png" && $image8888 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[31])&& $fields[31]!=''){
																				$image9 = $fields[31];
																				$image99 = pathinfo($image9);
																				$imagename999=$image99['filename'].".".$image99['extension'];
																				$image9999 = pathinfo($imagename999,PATHINFO_EXTENSION);;
																				if($image9999 != "jpg" && $image9999 !="png" && $image9999 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[32])&& $fields[32]!=''){
																				$image01 = $fields[32];
																				$image001 = pathinfo($image01);
																				$imagename0001=$image001['filename'].".".$image001['extension'];
																				$image00001 = pathinfo($imagename0001,PATHINFO_EXTENSION);;
																				if($image00001 != "jpg" && $image00001 !="png" && $image00001 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[33])&& $fields[33]!=''){
																				$image11 = $fields[33];
																				$image111 = pathinfo($image11);
																				$imagename1111=$image111['filename'].".".$image111['extension'];
																				$image11111 = pathinfo($imagename1111,PATHINFO_EXTENSION);;
																				if($image11111 != "jpg" && $image11111 !="png" && $image11111 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																				
																		}
																		if(isset($fields[34])&& $fields[34]!=''){
																				$image12 = $fields[34];
																				$image112 = pathinfo($image12);
																				$imagename1112=$image112['filename'].".".$image112['extension'];
																				$image11112 = pathinfo($imagename1112,PATHINFO_EXTENSION);;
																				if($image11112 != "jpg" && $image11112 !="png" && $image11112 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
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
																$path='/home/cartinhour/public_html/uploads/products/';
																//echo '<pre>';print_r($data);exit;
																	$image_link = $data[23];
																	$split_image = pathinfo($image_link);
																	$imagename=round(microtime(true)).$split_image['filename'].".".$split_image['extension'];
																	copy($data[23], $path.$imagename);
																	if(isset($data[24])&& $data[24]!=''){
																		$image_link1 = $data[24];
																		$split_image1 = pathinfo($image_link1);
																		$imagename1=round(microtime(true)).$split_image1['filename'].".".$split_image1['extension'];
																		copy($data[24], $path.$imagename1);
																	}
																	if(isset($data[25])&& $data[25]!=''){
																			$image_link2 = $data[25];
																			$split_image2 = pathinfo($image_link2);
																			$imagename2=round(microtime(true)).$split_image2['filename'].".".$split_image2['extension'];
																			copy($data[25], $path.$imagename2);
																	}
																	if(isset($data[26])&& $data[26]!=''){
																			$image_link3 = $data[26];
																			$split_image3 = pathinfo($image_link3);
																			$imagename3=round(microtime(true)).$split_image3['filename'].".".$split_image3['extension'];
																			copy($data[26], $path.$imagename3);
																			
																	}
																	if(isset($data[27])&& $data[27]!=''){
																			$image_link4 = $data[27];
																			$split_image4 = pathinfo($image_link4);
																			$imagename4=round(microtime(true)).$split_image4['filename'].".".$split_image4['extension'];
																			copy($data[27], $path.$imagename4);
																			
																	}
																	if(isset($data[28])&& $data[28]!=''){
																			$image_link5 = $data[28];
																			$split_image5 = pathinfo($image_link5);
																			$imagename5=round(microtime(true)).$split_image5['filename'].".".$split_image5['extension'];
																			copy($data[28], $path.$imagename5);
																			
																	}
																	if(isset($data[29])&& $data[29]!=''){
																		$image_link6 = $data[29];
																		$split_image6 = pathinfo($image_link6);
																		$imagename6=round(microtime(true)).$split_image6['filename'].".".$split_image6['extension'];
																		copy($data[29], $path.$imagename6);
																	
																	}
																	if(isset($data[30])&& $data[30]!=''){
																		$image_link7 = $data[30];
																		$split_image7 = pathinfo($image_link7);
																		$imagename7=round(microtime(true)).$split_image7['filename'].".".$split_image7['extension'];
																		copy($data[30], $path.$imagename7);
																	
																	}
																	if(isset($data[31])&& $data[31]!=''){
																			$image_link8 = $data[31];
																			$split_image8 = pathinfo($image_link8);
																			$imagename8=round(microtime(true)).$split_image8['filename'].".".$split_image8['extension'];
																			copy($data[31], $path.$imagename8);
																			
																	}
																	if(isset($data[32])&& $data[32]!=''){
																		$image_link9 = $data[32];
																		$split_image9 = pathinfo($image_link9);
																		$imagename9=round(microtime(true)).$split_image9['filename'].".".$split_image9['extension'];
																		copy($data[32], $path.$imagename9);
																	}
																	if(isset($data[33])&& $data[33]!=''){
																		$image_link10 = $data[33];
																		$split_image10 = pathinfo($image_link10);
																		$imagename10=round(microtime(true)).$split_image10['filename'].".".$split_image10['extension'];
																		copy($data[33], $path.$imagename10);
																	
																	}
																	if(isset($data[34])&& $data[34]!=''){
																		$image_link11 = $data[34];
																		$split_image11 = pathinfo($image_link11);
																		$imagename11=round(microtime(true)).$split_image11['filename'].".".$split_image11['extension'];
																		copy($data[34], $path.$imagename11);
																		
																	}
																	
																	$adddetails=array(
																			'category_id' => $post['category_ids'],			
																			'subcategory_id' =>$post['subcategory_ids'],
																			'seller_id' =>$this->session->userdata('seller_id'), 
																			'item_name' => $data[1],
																			'skuid' => $data[2],
																			'item_code' => $data[3],
																			'item_cost' => $data[4],
																			'special_price' => $data[5],
																			'offers' =>$data[6],
																			'discount' =>$data[7],
																			'item_quantity' =>$data[8],
																			'keywords' =>$data[9],
																			'title' =>$data[10],
																			'item_status' => $data[11],
																			'item_description' =>$data[12],
																			'item_sub_name' =>$data[13],
																			'brand' =>$data[14],
																			'ideal_for' =>$data[15],
																			'material' =>$data[18],
																			'producttype' =>$data[19],
																			'dial_shape' =>$data[20],
																			'dial_color' =>$data[21],
																			'strap_color' =>$data[22],
																			'item_image'=>isset($imagename)?$imagename:'',
																			'item_image1'=>isset($imagename1)?$imagename1:'',
																			'item_image2'=>isset($imagename2)?$imagename2:'',
																			'item_image3'=>isset($imagename3)?$imagename3:'',
																			'item_image4'=>isset($imagename4)?$imagename4:'',
																			'item_image5'=>isset($imagename5)?$imagename5:'',
																			'item_image6'=>isset($imagename6)?$imagename6:'',
																			'item_image7'=>isset($imagename7)?$imagename7:'',
																			'item_image8'=>isset($imagename8)?$imagename8:'',
																			'item_image9'=>isset($imagename9)?$imagename9:'',
																			'item_image10'=>isset($imagename10)?$imagename10:'',
																			'item_image11'=>isset($imagename11)?$imagename11:'',
																			'seller_location_area'=>$seller_location['area'],
																			'created_at'=>date('Y-m-d H:i:s'),

																		);
																		//echo '<pre>';print_r($adddetails);exit;
																			$results=$this->products_model->save_prodcts($adddetails);
																				if(count($results)>0){
																						
																						
																						/* for spcification purpose*/
																						$arr1=explode(",",$data[16]);
																						$arr2=explode(",",$data[17]);
																						foreach (array_combine($arr1,$arr2) as $key=>$list){
																							if($list!='' && $key!=''){
																							$addspc=array(
																							'item_id' =>$results,
																							'spc_name' => $key,
																							'spc_value' => $list,
																							'create_at' => date('Y-m-d H:i:s'),
																							);
																							$this->products_model->insert_product_spcifications($addspc);
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
								
							}else if($post['subcategory_ids']==51){
								
										if(substr($_FILES['categoryfile']['name'], 0, 33)=='FashioncategoryfileMensehinicwear'){
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
																		
																		$totalfields[] = $fields;
																		if(empty($fields[1])) {
																			$data['errors'][]="Product name is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[1]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[1]))	  	
																			{
																			$data['errors'][]='Product name wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[2])){
																			$data['errors'][]="Sku code is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[2]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[2]))	  	
																			{
																			$data['errors'][]='Sku code wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}else{
																				$result = $this->products_model->get_skuid_exists($fields[2]);
																				if(count($result)>0){
																				$data['errors'][]="Sku code already exits .please use another Sku code. Row Id is :  ".$key.'<br>';
																				$error=1;	
																				}

																			}

																		}
																		if(empty($fields[3])) {
																			$data['errors'][]="Other Unique code is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[3]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[3]))	  	
																			{
																			$data['errors'][]='Other Unique code wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[4])) {
																			$data['errors'][]="Price is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[4]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[4]))	  	
																			{
																			$data['errors'][]='Price  can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[5])) {
																			$data['errors'][]="Special Price is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[5]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[5]))	  	
																			{
																			$data['errors'][]='Special Price  can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if($fields[6]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[6]))	  	
																			{
																			$data['errors'][]='Offer can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if($fields[7]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[7]))	  	
																			{
																			$data['errors'][]='Discount can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[8])) {
																			$data['errors'][]="Qty is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[8]!=''){
																			$regex ="/^[0-9]+$/"; 
																			if(!preg_match( $regex, $fields[8]))
																			{
																			$data['errors'][]="Qty must be digits. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[9])) {
																			$data['errors'][]="Meta keywords is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[9]!=''){
																			$regex ="/^[a-zA-Z0-9.-_& ]+$/"; 
																			if(!preg_match( $regex, $fields[9]))	  	
																			{
																			$data['errors'][]='Meta keywords can only consist of alphanumaric, space and dot. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[10])) {
																			$data['errors'][]="Meta title is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[10]!=''){
																			$regex ="/^[a-zA-Z0-9.-_& ]+$/"; 
																			if(!preg_match( $regex, $fields[10]))	  	
																			{
																			$data['errors'][]='Meta title can only consist of alphanumaric, space and dot. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[11])) {
																			$data['errors'][]="Status is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[11]!=''){
																			$regex ="/^[0-1]+$/"; 
																			if(!preg_match( $regex, $fields[11]))
																			{
																			$data['errors'][]="Status must be  0 or 1. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[12])) {
																			$data['errors'][]="Product description is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[12]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[12]))	  	
																			{
																			$data['errors'][]='Product description wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[13])) {
																			$data['errors'][]="Sub Item is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[13]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[13]))	  	
																			{
																			$data['errors'][]='Sub Item wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[14])) {
																			$data['errors'][]="Brand is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[14]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[14]))	  	
																			{
																			$data['errors'][]='Brand wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[15])) {
																			$data['errors'][]="Ideal for required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[15]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[15]))
																			{
																			$data['errors'][]="Ideal for wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[16])) {
																			$data['errors'][]="Product specifications name is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[16]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[16]))	  	
																			{
																			$data['errors'][]='Product specifications name wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[17])) {
																			$data['errors'][]="Product specifications value is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[17]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[17]))	  	
																			{
																			$data['errors'][]='Product specifications value wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		} 
																		if(empty($fields[18])) {
																			$data['errors'][]="Sizes is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[18]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[18]))	  	
																			{
																			$data['errors'][]='Sizes wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[19])) {
																			$data['errors'][]="Colors is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[19]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[19]))	  	
																			{
																			$data['errors'][]='Colors wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[20])) {
																			$data['errors'][]="Type is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[20]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[20]))	  	
																			{
																			$data['errors'][]='Type wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[21])) {
																			$data['errors'][]="Theme is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[21]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[21]))	  	
																			{
																			$data['errors'][]='Theme wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[22])) {
																			$data['errors'][]="Occasion is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[22]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[22]))	  	
																			{
																			$data['errors'][]='Occasion wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[23])) {
																			$data['errors'][]="packof is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[23]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[23]))	  	
																			{
																			$data['errors'][]='packof wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		
																		if(empty($fields[24])) {
																			$data['errors'][]="Image is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[24]!=''){
																				$image_link = $fields[24];
																				$split_image1 = pathinfo($image_link);
																				$imagename=$split_image1['filename'].".".$split_image1['extension'];
																				$split_image = pathinfo($imagename,PATHINFO_EXTENSION);;
																				if($split_image != "jpg" && $split_image !="png" && $split_image != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[25])&& $fields[25]!=''){
																				$img1 = $fields[25];
																				$img12 = pathinfo($img1);
																				$imagename22=$img12['filename'].".".$img12['extension'];
																				$split_image212 = pathinfo($imagename22,PATHINFO_EXTENSION);;
																				if($split_image212 != "jpg" && $split_image212 !="png" && $split_image212 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[26])&& $fields[26]!=''){
																				$img2 = $fields[26];
																				$img122 = pathinfo($img2);
																				$imagename2233=$img122['filename'].".".$img122['extension'];
																				$image3 = pathinfo($imagename2233,PATHINFO_EXTENSION);;
																				if($image3 != "jpg" && $image3 !="png" && $image3 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[27])&& $fields[27]!=''){
																				$img4 = $fields[27];
																				$img133 = pathinfo($img4);
																				$imagename5656=$img133['filename'].".".$img133['extension'];
																				$image4 = pathinfo($imagename5656,PATHINFO_EXTENSION);;
																				if($image4 != "jpg" && $image4 !="png" && $image4 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[28])&& $fields[28]!=''){
																				$image5 = $fields[28];
																				$image55 = pathinfo($image5);
																				$imagename555=$image55['filename'].".".$image55['extension'];
																				$image5555 = pathinfo($imagename555,PATHINFO_EXTENSION);;
																				if($image5555 != "jpg" && $image5555 !="png" && $image5555 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[29])&& $fields[29]!=''){
																				$image6 = $fields[29];
																				$image66 = pathinfo($image6);
																				$imagename666=$image66['filename'].".".$image66['extension'];
																				$image6666 = pathinfo($imagename666,PATHINFO_EXTENSION);;
																				if($image6666 != "jpg" && $image6666 !="png" && $image6666 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[30])&& $fields[30]!=''){
																				$image7 = $fields[30];
																				$image77 = pathinfo($image7);
																				$imagename777=$image77['filename'].".".$image77['extension'];
																				$image7777 = pathinfo($imagename777,PATHINFO_EXTENSION);;
																				if($image7777 != "jpg" && $image7777 !="png" && $image7777 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[31])&& $fields[31]!=''){
																				$image8 = $fields[31];
																				$image88 = pathinfo($image8);
																				$imagename888=$image88['filename'].".".$image88['extension'];
																				$image8888 = pathinfo($imagename888,PATHINFO_EXTENSION);;
																				if($image8888 != "jpg" && $image8888 !="png" && $image8888 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[32])&& $fields[32]!=''){
																				$image9 = $fields[32];
																				$image99 = pathinfo($image9);
																				$imagename999=$image99['filename'].".".$image99['extension'];
																				$image9999 = pathinfo($imagename999,PATHINFO_EXTENSION);;
																				if($image9999 != "jpg" && $image9999 !="png" && $image9999 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[33])&& $fields[33]!=''){
																				$image01 = $fields[33];
																				$image001 = pathinfo($image01);
																				$imagename0001=$image001['filename'].".".$image001['extension'];
																				$image00001 = pathinfo($imagename0001,PATHINFO_EXTENSION);;
																				if($image00001 != "jpg" && $image00001 !="png" && $image00001 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[34])&& $fields[34]!=''){
																				$image11 = $fields[34];
																				$image111 = pathinfo($image11);
																				$imagename1111=$image111['filename'].".".$image111['extension'];
																				$image11111 = pathinfo($imagename1111,PATHINFO_EXTENSION);;
																				if($image11111 != "jpg" && $image11111 !="png" && $image11111 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																				
																		}
																		if(isset($fields[35])&& $fields[35]!=''){
																				$image12 = $fields[35];
																				$image112 = pathinfo($image12);
																				$imagename1112=$image112['filename'].".".$image112['extension'];
																				$image11112 = pathinfo($imagename1112,PATHINFO_EXTENSION);;
																				if($image11112 != "jpg" && $image11112 !="png" && $image11112 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
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
																$path='/home/cartinhour/public_html/uploads/products/';
																//echo '<pre>';print_r($data);exit;
																	$image_link = $data[24];
																	$split_image = pathinfo($image_link);
																	$imagename=round(microtime(true)).$split_image['filename'].".".$split_image['extension'];
																	copy($data[24], $path.$imagename);
																	if(isset($data[25])&& $data[25]!=''){
																		$image_link1 = $data[25];
																		$split_image1 = pathinfo($image_link1);
																		$imagename1=round(microtime(true)).$split_image1['filename'].".".$split_image1['extension'];
																		copy($data[25], $path.$imagename1);
																	}
																	if(isset($data[26])&& $data[26]!=''){
																			$image_link2 = $data[26];
																			$split_image2 = pathinfo($image_link2);
																			$imagename2=round(microtime(true)).$split_image2['filename'].".".$split_image2['extension'];
																			copy($data[26], $path.$imagename2);
																	}
																	if(isset($data[27])&& $data[27]!=''){
																			$image_link3 = $data[27];
																			$split_image3 = pathinfo($image_link3);
																			$imagename3=round(microtime(true)).$split_image3['filename'].".".$split_image3['extension'];
																			copy($data[27], $path.$imagename3);
																			
																	}
																	if(isset($data[28])&& $data[28]!=''){
																			$image_link4 = $data[28];
																			$split_image4 = pathinfo($image_link4);
																			$imagename4=round(microtime(true)).$split_image4['filename'].".".$split_image4['extension'];
																			copy($data[28], $path.$imagename4);
																			
																	}
																	if(isset($data[29])&& $data[29]!=''){
																			$image_link5 = $data[29];
																			$split_image5 = pathinfo($image_link5);
																			$imagename5=round(microtime(true)).$split_image5['filename'].".".$split_image5['extension'];
																			copy($data[29], $path.$imagename5);
																			
																	}
																	if(isset($data[30])&& $data[30]!=''){
																		$image_link6 = $data[30];
																		$split_image6 = pathinfo($image_link6);
																		$imagename6=round(microtime(true)).$split_image6['filename'].".".$split_image6['extension'];
																		copy($data[30], $path.$imagename6);
																	
																	}
																	if(isset($data[31])&& $data[31]!=''){
																		$image_link7 = $data[31];
																		$split_image7 = pathinfo($image_link7);
																		$imagename7=round(microtime(true)).$split_image7['filename'].".".$split_image7['extension'];
																		copy($data[31], $path.$imagename7);
																	
																	}
																	if(isset($data[32])&& $data[32]!=''){
																			$image_link8 = $data[32];
																			$split_image8 = pathinfo($image_link8);
																			$imagename8=round(microtime(true)).$split_image8['filename'].".".$split_image8['extension'];
																			copy($data[32], $path.$imagename8);
																			
																	}
																	if(isset($data[33])&& $data[33]!=''){
																		$image_link9 = $data[33];
																		$split_image9 = pathinfo($image_link9);
																		$imagename9=round(microtime(true)).$split_image9['filename'].".".$split_image9['extension'];
																		copy($data[33], $path.$imagename9);
																	}
																	if(isset($data[34])&& $data[34]!=''){
																		$image_link10 = $data[34];
																		$split_image10 = pathinfo($image_link10);
																		$imagename10=round(microtime(true)).$split_image10['filename'].".".$split_image10['extension'];
																		copy($data[34], $path.$imagename10);
																	
																	}
																	if(isset($data[35])&& $data[35]!=''){
																		$image_link11 = $data[35];
																		$split_image11 = pathinfo($image_link11);
																		$imagename11=round(microtime(true)).$split_image11['filename'].".".$split_image11['extension'];
																		copy($data[35], $path.$imagename11);
																		
																	}
																	
																	$adddetails=array(
																			'category_id' => $post['category_ids'],			
																			'subcategory_id' =>$post['subcategory_ids'],
																			'seller_id' =>$this->session->userdata('seller_id'), 
																			'item_name' => $data[1],
																			'skuid' => $data[2],
																			'item_code' => $data[3],
																			'item_cost' => $data[4],
																			'special_price' => $data[5],
																			'offers' =>$data[6],
																			'discount' =>$data[7],
																			'item_quantity' =>$data[8],
																			'keywords' =>$data[9],
																			'title' =>$data[10],
																			'item_status' => $data[11],
																			'item_description' =>$data[12],
																			'item_sub_name' =>$data[13],
																			'brand' =>$data[14],
																			'ideal_for' =>$data[15],
																			'producttype' =>$data[20],
																			'theme' =>$data[21],
																			'occasion' =>$data[22],
																			'packof' =>$data[23],
																			'item_image'=>isset($imagename)?$imagename:'',
																			'item_image1'=>isset($imagename1)?$imagename1:'',
																			'item_image2'=>isset($imagename2)?$imagename2:'',
																			'item_image3'=>isset($imagename3)?$imagename3:'',
																			'item_image4'=>isset($imagename4)?$imagename4:'',
																			'item_image5'=>isset($imagename5)?$imagename5:'',
																			'item_image6'=>isset($imagename6)?$imagename6:'',
																			'item_image7'=>isset($imagename7)?$imagename7:'',
																			'item_image8'=>isset($imagename8)?$imagename8:'',
																			'item_image9'=>isset($imagename9)?$imagename9:'',
																			'item_image10'=>isset($imagename10)?$imagename10:'',
																			'item_image11'=>isset($imagename11)?$imagename11:'',
																			'seller_location_area'=>$seller_location['area'],
																			'created_at'=>date('Y-m-d H:i:s'),

																		);
																		//echo '<pre>';print_r($adddetails);exit;
																			$results=$this->products_model->save_prodcts($adddetails);
																				if(count($results)>0){
																						
																						foreach(explode(",",$data[18]) as $listsizes){
																						if($listsizes !=''){
																							$addsizesdata=array(
																							'item_id' =>$results,
																							'p_size_name' => $listsizes,
																							'create_at' => date('Y-m-d H:i:s'),
																							);
																							$this->products_model->insert_product_sizes($addsizesdata);
																							}
																						}
																						/* for size purpose*/
																						/* for color purpose*/
																						foreach(explode(",",$data[19]) as $listcolors){
																							if($listcolors !=''){
																									$addcolorsdata=array(
																									'item_id' =>$results,
																									'color_name' => $listcolors,
																									'create_at' => date('Y-m-d H:i:s'),
																									);
																							$this->products_model->insert_product_colors($addcolorsdata);
																							}
																						}
																						/* for spcification purpose*/
																						$arr1=explode(",",$data[16]);
																						$arr2=explode(",",$data[17]);
																						foreach (array_combine($arr1,$arr2) as $key=>$list){
																							if($list!='' && $key!=''){
																							$addspc=array(
																							'item_id' =>$results,
																							'spc_name' => $key,
																							'spc_value' => $list,
																							'create_at' => date('Y-m-d H:i:s'),
																							);
																							$this->products_model->insert_product_spcifications($addspc);
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
								
								
							}else if($post['subcategory_ids']==23){ 
							
												if(substr($_FILES['categoryfile']['name'], 0, 30)=='FashioncategoryfileMensfabrics'){
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
																		
																		$totalfields[] = $fields;
																		if(empty($fields[1])) {
																			$data['errors'][]="Product name is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[1]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[1]))	  	
																			{
																			$data['errors'][]='Product name wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[2])){
																			$data['errors'][]="Sku code is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[2]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[2]))	  	
																			{
																			$data['errors'][]='Sku code wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}else{
																				$result = $this->products_model->get_skuid_exists($fields[2]);
																				if(count($result)>0){
																				$data['errors'][]="Sku code already exits .please use another Sku code. Row Id is :  ".$key.'<br>';
																				$error=1;	
																				}

																			}

																		}
																		if(empty($fields[3])) {
																			$data['errors'][]="Other Unique code is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[3]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[3]))	  	
																			{
																			$data['errors'][]='Other Unique code wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[4])) {
																			$data['errors'][]="Price is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[4]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[4]))	  	
																			{
																			$data['errors'][]='Price  can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[5])) {
																			$data['errors'][]="Special Price is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[5]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[5]))	  	
																			{
																			$data['errors'][]='Special Price  can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if($fields[6]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[6]))	  	
																			{
																			$data['errors'][]='Offer can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if($fields[7]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[7]))	  	
																			{
																			$data['errors'][]='Discount can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[8])) {
																			$data['errors'][]="Qty is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[8]!=''){
																			$regex ="/^[0-9]+$/"; 
																			if(!preg_match( $regex, $fields[8]))
																			{
																			$data['errors'][]="Qty must be digits. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[9])) {
																			$data['errors'][]="Meta keywords is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[9]!=''){
																			$regex ="/^[a-zA-Z0-9.-_& ]+$/"; 
																			if(!preg_match( $regex, $fields[9]))	  	
																			{
																			$data['errors'][]='Meta keywords can only consist of alphanumaric, space and dot. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[10])) {
																			$data['errors'][]="Meta title is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[10]!=''){
																			$regex ="/^[a-zA-Z0-9.-_& ]+$/"; 
																			if(!preg_match( $regex, $fields[10]))	  	
																			{
																			$data['errors'][]='Meta title can only consist of alphanumaric, space and dot. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[11])) {
																			$data['errors'][]="Status is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[11]!=''){
																			$regex ="/^[0-1]+$/"; 
																			if(!preg_match( $regex, $fields[11]))
																			{
																			$data['errors'][]="Status must be  0 or 1. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[12])) {
																			$data['errors'][]="Product description is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[12]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[12]))	  	
																			{
																			$data['errors'][]='Product description wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[13])) {
																			$data['errors'][]="Sub Item is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[13]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[13]))	  	
																			{
																			$data['errors'][]='Sub Item wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[14])) {
																			$data['errors'][]="Brand is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[14]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[14]))	  	
																			{
																			$data['errors'][]='Brand wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[15])) {
																			$data['errors'][]="Ideal for required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[15]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[15]))
																			{
																			$data['errors'][]="Ideal for wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[16])) {
																			$data['errors'][]="Product specifications name is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[16]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[16]))	  	
																			{
																			$data['errors'][]='Product specifications name wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[17])) {
																			$data['errors'][]="Product specifications value is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[17]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[17]))	  	
																			{
																			$data['errors'][]='Product specifications value wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		} 
																		if(empty($fields[18])) {
																			$data['errors'][]="Colors is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[18]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[18]))	  	
																			{
																			$data['errors'][]='Colors wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[19])) {
																			$data['errors'][]="Type is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[19]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[19]))	  	
																			{
																			$data['errors'][]='Type wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		
																		if(empty($fields[20])) {
																			$data['errors'][]="Image is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[20]!=''){
																				$image_link = $fields[20];
																				$split_image1 = pathinfo($image_link);
																				$imagename=$split_image1['filename'].".".$split_image1['extension'];
																				$split_image = pathinfo($imagename,PATHINFO_EXTENSION);;
																				if($split_image != "jpg" && $split_image !="png" && $split_image != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[21])&& $fields[21]!=''){
																				$img1 = $fields[21];
																				$img12 = pathinfo($img1);
																				$imagename22=$img12['filename'].".".$img12['extension'];
																				$split_image212 = pathinfo($imagename22,PATHINFO_EXTENSION);;
																				if($split_image212 != "jpg" && $split_image212 !="png" && $split_image212 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[22])&& $fields[22]!=''){
																				$img2 = $fields[22];
																				$img122 = pathinfo($img2);
																				$imagename2233=$img122['filename'].".".$img122['extension'];
																				$image3 = pathinfo($imagename2233,PATHINFO_EXTENSION);;
																				if($image3 != "jpg" && $image3 !="png" && $image3 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[23])&& $fields[23]!=''){
																				$img4 = $fields[23];
																				$img133 = pathinfo($img4);
																				$imagename5656=$img133['filename'].".".$img133['extension'];
																				$image4 = pathinfo($imagename5656,PATHINFO_EXTENSION);;
																				if($image4 != "jpg" && $image4 !="png" && $image4 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[24])&& $fields[24]!=''){
																				$image5 = $fields[24];
																				$image55 = pathinfo($image5);
																				$imagename555=$image55['filename'].".".$image55['extension'];
																				$image5555 = pathinfo($imagename555,PATHINFO_EXTENSION);;
																				if($image5555 != "jpg" && $image5555 !="png" && $image5555 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[25])&& $fields[25]!=''){
																				$image6 = $fields[25];
																				$image66 = pathinfo($image6);
																				$imagename666=$image66['filename'].".".$image66['extension'];
																				$image6666 = pathinfo($imagename666,PATHINFO_EXTENSION);;
																				if($image6666 != "jpg" && $image6666 !="png" && $image6666 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[26])&& $fields[26]!=''){
																				$image7 = $fields[26];
																				$image77 = pathinfo($image7);
																				$imagename777=$image77['filename'].".".$image77['extension'];
																				$image7777 = pathinfo($imagename777,PATHINFO_EXTENSION);;
																				if($image7777 != "jpg" && $image7777 !="png" && $image7777 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[27])&& $fields[27]!=''){
																				$image8 = $fields[27];
																				$image88 = pathinfo($image8);
																				$imagename888=$image88['filename'].".".$image88['extension'];
																				$image8888 = pathinfo($imagename888,PATHINFO_EXTENSION);;
																				if($image8888 != "jpg" && $image8888 !="png" && $image8888 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[28])&& $fields[28]!=''){
																				$image9 = $fields[28];
																				$image99 = pathinfo($image9);
																				$imagename999=$image99['filename'].".".$image99['extension'];
																				$image9999 = pathinfo($imagename999,PATHINFO_EXTENSION);;
																				if($image9999 != "jpg" && $image9999 !="png" && $image9999 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[29])&& $fields[29]!=''){
																				$image01 = $fields[29];
																				$image001 = pathinfo($image01);
																				$imagename0001=$image001['filename'].".".$image001['extension'];
																				$image00001 = pathinfo($imagename0001,PATHINFO_EXTENSION);;
																				if($image00001 != "jpg" && $image00001 !="png" && $image00001 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[30])&& $fields[30]!=''){
																				$image11 = $fields[30];
																				$image111 = pathinfo($image11);
																				$imagename1111=$image111['filename'].".".$image111['extension'];
																				$image11111 = pathinfo($imagename1111,PATHINFO_EXTENSION);;
																				if($image11111 != "jpg" && $image11111 !="png" && $image11111 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																				
																		}
																		if(isset($fields[31])&& $fields[31]!=''){
																				$image12 = $fields[31];
																				$image112 = pathinfo($image12);
																				$imagename1112=$image112['filename'].".".$image112['extension'];
																				$image11112 = pathinfo($imagename1112,PATHINFO_EXTENSION);;
																				if($image11112 != "jpg" && $image11112 !="png" && $image11112 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
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
																$path='/home/cartinhour/public_html/uploads/products/';
																//echo '<pre>';print_r($data);exit;
																	$image_link = $data[20];
																	$split_image = pathinfo($image_link);
																	$imagename=round(microtime(true)).$split_image['filename'].".".$split_image['extension'];
																	copy($data[20], $path.$imagename);
																	if(isset($data[21])&& $data[21]!=''){
																		$image_link1 = $data[21];
																		$split_image1 = pathinfo($image_link1);
																		$imagename1=round(microtime(true)).$split_image1['filename'].".".$split_image1['extension'];
																		copy($data[21], $path.$imagename1);
																	}
																	if(isset($data[22])&& $data[22]!=''){
																			$image_link2 = $data[22];
																			$split_image2 = pathinfo($image_link2);
																			$imagename2=round(microtime(true)).$split_image2['filename'].".".$split_image2['extension'];
																			copy($data[22], $path.$imagename2);
																	}
																	if(isset($data[23])&& $data[23]!=''){
																			$image_link3 = $data[23];
																			$split_image3 = pathinfo($image_link3);
																			$imagename3=round(microtime(true)).$split_image3['filename'].".".$split_image3['extension'];
																			copy($data[23], $path.$imagename3);
																			
																	}
																	if(isset($data[24])&& $data[24]!=''){
																			$image_link4 = $data[24];
																			$split_image4 = pathinfo($image_link4);
																			$imagename4=round(microtime(true)).$split_image4['filename'].".".$split_image4['extension'];
																			copy($data[24], $path.$imagename4);
																			
																	}
																	if(isset($data[25])&& $data[25]!=''){
																			$image_link5 = $data[25];
																			$split_image5 = pathinfo($image_link5);
																			$imagename5=round(microtime(true)).$split_image5['filename'].".".$split_image5['extension'];
																			copy($data[25], $path.$imagename5);
																			
																	}
																	if(isset($data[26])&& $data[26]!=''){
																		$image_link6 = $data[26];
																		$split_image6 = pathinfo($image_link6);
																		$imagename6=round(microtime(true)).$split_image6['filename'].".".$split_image6['extension'];
																		copy($data[26], $path.$imagename6);
																	
																	}
																	if(isset($data[27])&& $data[27]!=''){
																		$image_link7 = $data[27];
																		$split_image7 = pathinfo($image_link7);
																		$imagename7=round(microtime(true)).$split_image7['filename'].".".$split_image7['extension'];
																		copy($data[27], $path.$imagename7);
																	
																	}
																	if(isset($data[28])&& $data[28]!=''){
																			$image_link8 = $data[28];
																			$split_image8 = pathinfo($image_link8);
																			$imagename8=round(microtime(true)).$split_image8['filename'].".".$split_image8['extension'];
																			copy($data[28], $path.$imagename8);
																			
																	}
																	if(isset($data[29])&& $data[29]!=''){
																		$image_link9 = $data[29];
																		$split_image9 = pathinfo($image_link9);
																		$imagename9=round(microtime(true)).$split_image9['filename'].".".$split_image9['extension'];
																		copy($data[29], $path.$imagename9);
																	}
																	if(isset($data[30])&& $data[30]!=''){
																		$image_link10 = $data[30];
																		$split_image10 = pathinfo($image_link10);
																		$imagename10=round(microtime(true)).$split_image10['filename'].".".$split_image10['extension'];
																		copy($data[30], $path.$imagename10);
																	
																	}
																	if(isset($data[31])&& $data[31]!=''){
																		$image_link11 = $data[31];
																		$split_image11 = pathinfo($image_link11);
																		$imagename11=round(microtime(true)).$split_image11['filename'].".".$split_image11['extension'];
																		copy($data[31], $path.$imagename11);
																		
																	}
																	
																	$adddetails=array(
																			'category_id' => $post['category_ids'],			
																			'subcategory_id' =>$post['subcategory_ids'],
																			'seller_id' =>$this->session->userdata('seller_id'), 
																			'item_name' => $data[1],
																			'skuid' => $data[2],
																			'item_code' => $data[3],
																			'item_cost' => $data[4],
																			'special_price' => $data[5],
																			'offers' =>$data[6],
																			'discount' =>$data[7],
																			'item_quantity' =>$data[8],
																			'keywords' =>$data[9],
																			'title' =>$data[10],
																			'item_status' => $data[11],
																			'item_description' =>$data[12],
																			'item_sub_name' =>$data[13],
																			'brand' =>$data[14],
																			'ideal_for' =>$data[15],
																			'producttype' =>$data[19],
																			'item_image'=>isset($imagename)?$imagename:'',
																			'item_image1'=>isset($imagename1)?$imagename1:'',
																			'item_image2'=>isset($imagename2)?$imagename2:'',
																			'item_image3'=>isset($imagename3)?$imagename3:'',
																			'item_image4'=>isset($imagename4)?$imagename4:'',
																			'item_image5'=>isset($imagename5)?$imagename5:'',
																			'item_image6'=>isset($imagename6)?$imagename6:'',
																			'item_image7'=>isset($imagename7)?$imagename7:'',
																			'item_image8'=>isset($imagename8)?$imagename8:'',
																			'item_image9'=>isset($imagename9)?$imagename9:'',
																			'item_image10'=>isset($imagename10)?$imagename10:'',
																			'item_image11'=>isset($imagename11)?$imagename11:'',
																			'seller_location_area'=>$seller_location['area'],
																			'created_at'=>date('Y-m-d H:i:s'),

																		);
																		//echo '<pre>';print_r($adddetails);exit;
																			$results=$this->products_model->save_prodcts($adddetails);
																				if(count($results)>0){
																						
																						
																							/* for color purpose*/
																							foreach(explode(",",$data[18]) as $listcolors){
																								if($listcolors !=''){
																										$addcolorsdata=array(
																										'item_id' =>$results,
																										'color_name' => $listcolors,
																										'create_at' => date('Y-m-d H:i:s'),
																										);
																								$this->products_model->insert_product_colors($addcolorsdata);
																								}
																							
																							}
																							/* for color purpose*/
																	
																							/*uksizes*/
																						/* for spcification purpose*/
																						$arr1=explode(",",$data[16]);
																						$arr2=explode(",",$data[17]);
																						foreach (array_combine($arr1,$arr2) as $key=>$list){
																							if($list!='' && $key!=''){
																							$addspc=array(
																							'item_id' =>$results,
																							'spc_name' => $key,
																							'spc_value' => $list,
																							'create_at' => date('Y-m-d H:i:s'),
																							);
																							$this->products_model->insert_product_spcifications($addspc);
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
								
							
							}else if($post['subcategory_ids']==25){ 
							
										if(substr($_FILES['categoryfile']['name'], 0, 32)=='FashioncategoryfileMensinnerwear'){
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
																		
																		$totalfields[] = $fields;
																		if(empty($fields[1])) {
																			$data['errors'][]="Product name is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[1]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[1]))	  	
																			{
																			$data['errors'][]='Product name wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[2])){
																			$data['errors'][]="Sku code is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[2]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[2]))	  	
																			{
																			$data['errors'][]='Sku code wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}else{
																				$result = $this->products_model->get_skuid_exists($fields[2]);
																				if(count($result)>0){
																				$data['errors'][]="Sku code already exits .please use another Sku code. Row Id is :  ".$key.'<br>';
																				$error=1;	
																				}

																			}

																		}
																		if(empty($fields[3])) {
																			$data['errors'][]="Other Unique code is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[3]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[3]))	  	
																			{
																			$data['errors'][]='Other Unique code wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[4])) {
																			$data['errors'][]="Price is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[4]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[4]))	  	
																			{
																			$data['errors'][]='Price  can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[5])) {
																			$data['errors'][]="Special Price is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[5]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[5]))	  	
																			{
																			$data['errors'][]='Special Price  can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if($fields[6]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[6]))	  	
																			{
																			$data['errors'][]='Offer can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if($fields[7]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[7]))	  	
																			{
																			$data['errors'][]='Discount can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[8])) {
																			$data['errors'][]="Qty is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[8]!=''){
																			$regex ="/^[0-9]+$/"; 
																			if(!preg_match( $regex, $fields[8]))
																			{
																			$data['errors'][]="Qty must be digits. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[9])) {
																			$data['errors'][]="Meta keywords is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[9]!=''){
																			$regex ="/^[a-zA-Z0-9.-_& ]+$/"; 
																			if(!preg_match( $regex, $fields[9]))	  	
																			{
																			$data['errors'][]='Meta keywords can only consist of alphanumaric, space and dot. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[10])) {
																			$data['errors'][]="Meta title is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[10]!=''){
																			$regex ="/^[a-zA-Z0-9.-_& ]+$/"; 
																			if(!preg_match( $regex, $fields[10]))	  	
																			{
																			$data['errors'][]='Meta title can only consist of alphanumaric, space and dot. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[11])) {
																			$data['errors'][]="Status is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[11]!=''){
																			$regex ="/^[0-1]+$/"; 
																			if(!preg_match( $regex, $fields[11]))
																			{
																			$data['errors'][]="Status must be  0 or 1. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[12])) {
																			$data['errors'][]="Product description is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[12]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[12]))	  	
																			{
																			$data['errors'][]='Product description wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[13])) {
																			$data['errors'][]="Sub Item is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[13]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[13]))	  	
																			{
																			$data['errors'][]='Sub Item wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[14])) {
																			$data['errors'][]="Brand is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[14]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[14]))	  	
																			{
																			$data['errors'][]='Brand wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[15])) {
																			$data['errors'][]="Ideal for required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[15]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[15]))
																			{
																			$data['errors'][]="Ideal for wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[16])) {
																			$data['errors'][]="Product specifications name is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[16]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[16]))	  	
																			{
																			$data['errors'][]='Product specifications name wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[17])) {
																			$data['errors'][]="Product specifications value is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[17]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[17]))	  	
																			{
																			$data['errors'][]='Product specifications value wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		} 
																		if(empty($fields[18])) {
																			$data['errors'][]="Sizes is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[18]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[18]))	  	
																			{
																			$data['errors'][]='Sizes wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[19])) {
																			$data['errors'][]="Colors is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[19]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[19]))	  	
																			{
																			$data['errors'][]='Colors wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		
																		
																		if(empty($fields[20])) {
																			$data['errors'][]="Theme is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[20]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[20]))	  	
																			{
																			$data['errors'][]='Theme wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[21])) {
																			$data['errors'][]="Image is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[21]!=''){
																				$image_link = $fields[21];
																				$split_image1 = pathinfo($image_link);
																				$imagename=$split_image1['filename'].".".$split_image1['extension'];
																				$split_image = pathinfo($imagename,PATHINFO_EXTENSION);;
																				if($split_image != "jpg" && $split_image !="png" && $split_image != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[22])&& $fields[22]!=''){
																				$img1 = $fields[22];
																				$img12 = pathinfo($img1);
																				$imagename22=$img12['filename'].".".$img12['extension'];
																				$split_image212 = pathinfo($imagename22,PATHINFO_EXTENSION);;
																				if($split_image212 != "jpg" && $split_image212 !="png" && $split_image212 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[23])&& $fields[23]!=''){
																				$img2 = $fields[23];
																				$img122 = pathinfo($img2);
																				$imagename2233=$img122['filename'].".".$img122['extension'];
																				$image3 = pathinfo($imagename2233,PATHINFO_EXTENSION);;
																				if($image3 != "jpg" && $image3 !="png" && $image3 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[24])&& $fields[24]!=''){
																				$img4 = $fields[24];
																				$img133 = pathinfo($img4);
																				$imagename5656=$img133['filename'].".".$img133['extension'];
																				$image4 = pathinfo($imagename5656,PATHINFO_EXTENSION);;
																				if($image4 != "jpg" && $image4 !="png" && $image4 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[25])&& $fields[25]!=''){
																				$image5 = $fields[25];
																				$image55 = pathinfo($image5);
																				$imagename555=$image55['filename'].".".$image55['extension'];
																				$image5555 = pathinfo($imagename555,PATHINFO_EXTENSION);;
																				if($image5555 != "jpg" && $image5555 !="png" && $image5555 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[26])&& $fields[26]!=''){
																				$image6 = $fields[26];
																				$image66 = pathinfo($image6);
																				$imagename666=$image66['filename'].".".$image66['extension'];
																				$image6666 = pathinfo($imagename666,PATHINFO_EXTENSION);;
																				if($image6666 != "jpg" && $image6666 !="png" && $image6666 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[27])&& $fields[27]!=''){
																				$image7 = $fields[27];
																				$image77 = pathinfo($image7);
																				$imagename777=$image77['filename'].".".$image77['extension'];
																				$image7777 = pathinfo($imagename777,PATHINFO_EXTENSION);;
																				if($image7777 != "jpg" && $image7777 !="png" && $image7777 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[28])&& $fields[28]!=''){
																				$image8 = $fields[28];
																				$image88 = pathinfo($image8);
																				$imagename888=$image88['filename'].".".$image88['extension'];
																				$image8888 = pathinfo($imagename888,PATHINFO_EXTENSION);;
																				if($image8888 != "jpg" && $image8888 !="png" && $image8888 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[29])&& $fields[29]!=''){
																				$image9 = $fields[29];
																				$image99 = pathinfo($image9);
																				$imagename999=$image99['filename'].".".$image99['extension'];
																				$image9999 = pathinfo($imagename999,PATHINFO_EXTENSION);;
																				if($image9999 != "jpg" && $image9999 !="png" && $image9999 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[30])&& $fields[30]!=''){
																				$image01 = $fields[30];
																				$image001 = pathinfo($image01);
																				$imagename0001=$image001['filename'].".".$image001['extension'];
																				$image00001 = pathinfo($imagename0001,PATHINFO_EXTENSION);;
																				if($image00001 != "jpg" && $image00001 !="png" && $image00001 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[31])&& $fields[31]!=''){
																				$image11 = $fields[31];
																				$image111 = pathinfo($image11);
																				$imagename1111=$image111['filename'].".".$image111['extension'];
																				$image11111 = pathinfo($imagename1111,PATHINFO_EXTENSION);;
																				if($image11111 != "jpg" && $image11111 !="png" && $image11111 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																				
																		}
																		if(isset($fields[32])&& $fields[32]!=''){
																				$image12 = $fields[32];
																				$image112 = pathinfo($image12);
																				$imagename1112=$image112['filename'].".".$image112['extension'];
																				$image11112 = pathinfo($imagename1112,PATHINFO_EXTENSION);;
																				if($image11112 != "jpg" && $image11112 !="png" && $image11112 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
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
																$path='/home/cartinhour/public_html/uploads/products/';
																//echo '<pre>';print_r($data);exit;
																	$image_link = $data[21];
																	$split_image = pathinfo($image_link);
																	$imagename=round(microtime(true)).$split_image['filename'].".".$split_image['extension'];
																	copy($data[21], $path.$imagename);
																	if(isset($data[22])&& $data[22]!=''){
																		$image_link1 = $data[22];
																		$split_image1 = pathinfo($image_link1);
																		$imagename1=round(microtime(true)).$split_image1['filename'].".".$split_image1['extension'];
																		copy($data[22], $path.$imagename1);
																	}
																	if(isset($data[23])&& $data[23]!=''){
																			$image_link2 = $data[23];
																			$split_image2 = pathinfo($image_link2);
																			$imagename2=round(microtime(true)).$split_image2['filename'].".".$split_image2['extension'];
																			copy($data[23], $path.$imagename2);
																	}
																	if(isset($data[24])&& $data[24]!=''){
																			$image_link3 = $data[24];
																			$split_image3 = pathinfo($image_link3);
																			$imagename3=round(microtime(true)).$split_image3['filename'].".".$split_image3['extension'];
																			copy($data[24], $path.$imagename3);
																			
																	}
																	if(isset($data[25])&& $data[25]!=''){
																			$image_link4 = $data[25];
																			$split_image4 = pathinfo($image_link4);
																			$imagename4=round(microtime(true)).$split_image4['filename'].".".$split_image4['extension'];
																			copy($data[25], $path.$imagename4);
																			
																	}
																	if(isset($data[26])&& $data[26]!=''){
																			$image_link5 = $data[26];
																			$split_image5 = pathinfo($image_link5);
																			$imagename5=round(microtime(true)).$split_image5['filename'].".".$split_image5['extension'];
																			copy($data[28], $path.$imagename5);
																			
																	}
																	if(isset($data[27])&& $data[27]!=''){
																		$image_link6 = $data[27];
																		$split_image6 = pathinfo($image_link6);
																		$imagename6=round(microtime(true)).$split_image6['filename'].".".$split_image6['extension'];
																		copy($data[27], $path.$imagename6);
																	
																	}
																	if(isset($data[28])&& $data[28]!=''){
																		$image_link7 = $data[28];
																		$split_image7 = pathinfo($image_link7);
																		$imagename7=round(microtime(true)).$split_image7['filename'].".".$split_image7['extension'];
																		copy($data[28], $path.$imagename7);
																	
																	}
																	if(isset($data[29])&& $data[29]!=''){
																			$image_link8 = $data[29];
																			$split_image8 = pathinfo($image_link8);
																			$imagename8=round(microtime(true)).$split_image8['filename'].".".$split_image8['extension'];
																			copy($data[29], $path.$imagename8);
																			
																	}
																	if(isset($data[30])&& $data[30]!=''){
																		$image_link9 = $data[30];
																		$split_image9 = pathinfo($image_link9);
																		$imagename9=round(microtime(true)).$split_image9['filename'].".".$split_image9['extension'];
																		copy($data[30], $path.$imagename9);
																	}
																	if(isset($data[31])&& $data[31]!=''){
																		$image_link10 = $data[31];
																		$split_image10 = pathinfo($image_link10);
																		$imagename10=round(microtime(true)).$split_image10['filename'].".".$split_image10['extension'];
																		copy($data[31], $path.$imagename10);
																	
																	}
																	if(isset($data[32])&& $data[32]!=''){
																		$image_link11 = $data[32];
																		$split_image11 = pathinfo($image_link11);
																		$imagename11=round(microtime(true)).$split_image11['filename'].".".$split_image11['extension'];
																		copy($data[32], $path.$imagename11);
																		
																	}
																	
																	$adddetails=array(
																			'category_id' => $post['category_ids'],			
																			'subcategory_id' =>$post['subcategory_ids'],
																			'seller_id' =>$this->session->userdata('seller_id'), 
																			'item_name' => $data[1],
																			'skuid' => $data[2],
																			'item_code' => $data[3],
																			'item_cost' => $data[4],
																			'special_price' => $data[5],
																			'offers' =>$data[6],
																			'discount' =>$data[7],
																			'item_quantity' =>$data[8],
																			'keywords' =>$data[9],
																			'title' =>$data[10],
																			'item_status' => $data[11],
																			'item_description' =>$data[12],
																			'item_sub_name' =>$data[13],
																			'brand' =>$data[14],
																			'ideal_for' =>$data[15],
																			'theme' =>$data[20],
																			'item_image'=>isset($imagename)?$imagename:'',
																			'item_image1'=>isset($imagename1)?$imagename1:'',
																			'item_image2'=>isset($imagename2)?$imagename2:'',
																			'item_image3'=>isset($imagename3)?$imagename3:'',
																			'item_image4'=>isset($imagename4)?$imagename4:'',
																			'item_image5'=>isset($imagename5)?$imagename5:'',
																			'item_image6'=>isset($imagename6)?$imagename6:'',
																			'item_image7'=>isset($imagename7)?$imagename7:'',
																			'item_image8'=>isset($imagename8)?$imagename8:'',
																			'item_image9'=>isset($imagename9)?$imagename9:'',
																			'item_image10'=>isset($imagename10)?$imagename10:'',
																			'item_image11'=>isset($imagename11)?$imagename11:'',
																			'seller_location_area'=>$seller_location['area'],
																			'created_at'=>date('Y-m-d H:i:s'),

																		);
																		//echo '<pre>';print_r($adddetails);exit;
																			$results=$this->products_model->save_prodcts($adddetails);
																				if(count($results)>0){
																						
																						
																						
																						
																						
																						
																							/* for size purpose*/
																							foreach(explode(",",$data[18]) as $listsizes){
																							if($listsizes !=''){
																								$addsizesdata=array(
																								'item_id' =>$results,
																								'p_size_name' => $listsizes,
																								'create_at' => date('Y-m-d H:i:s'),
																								);
																								$this->products_model->insert_product_sizes($addsizesdata);
																								}
																							}
																							/* for size purpose*/
																							/* for color purpose*/
																							foreach(explode(",",$data[19]) as $listcolors){
																								if($listcolors !=''){
																										$addcolorsdata=array(
																										'item_id' =>$results,
																										'color_name' => $listcolors,
																										'create_at' => date('Y-m-d H:i:s'),
																										);
																								$this->products_model->insert_product_colors($addcolorsdata);
																								}
																							
																							}
																							/* for color purpose*/
																							/*uksizes*/
																							if($data[20]!=''){
																								$uksizesdata = str_replace(array('[', ']','"'), array(''), $data[20]);
																							
																								foreach (explode(",",$uksizesdata) as $uksizess){

																								$adduksizesdata=array(
																								'item_id' =>$results,
																								'p_size_name' => $uksizess,
																								'create_at' => date('Y-m-d H:i:s'),
																								);
																								$this->products_model->insert_product_uksizes($adduksizesdata);
																								}
																							}
																							/*uksizes*/
																						/* for spcification purpose*/
																						$arr1=explode(",",$data[16]);
																						$arr2=explode(",",$data[17]);
																						foreach (array_combine($arr1,$arr2) as $key=>$list){
																							if($list!='' && $key!=''){
																							$addspc=array(
																							'item_id' =>$results,
																							'spc_name' => $key,
																							'spc_value' => $list,
																							'create_at' => date('Y-m-d H:i:s'),
																							);
																							$this->products_model->insert_product_spcifications($addspc);
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
								
							
							}else if($post['subcategory_ids']==27){
								
										if(substr($_FILES['categoryfile']['name'], 0, 26)=='Fashioncategoryfilewatches'){
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
																		
																		$totalfields[] = $fields;
																		if(empty($fields[1])) {
																			$data['errors'][]="Product name is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[1]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[1]))	  	
																			{
																			$data['errors'][]='Product name wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[2])){
																			$data['errors'][]="Sku code is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[2]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[2]))	  	
																			{
																			$data['errors'][]='Sku code wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}else{
																				$result = $this->products_model->get_skuid_exists($fields[2]);
																				if(count($result)>0){
																				$data['errors'][]="Sku code already exits .please use another Sku code. Row Id is :  ".$key.'<br>';
																				$error=1;	
																				}

																			}

																		}
																		if(empty($fields[3])) {
																			$data['errors'][]="Other Unique code is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[3]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[3]))	  	
																			{
																			$data['errors'][]='Other Unique code wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[4])) {
																			$data['errors'][]="Price is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[4]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[4]))	  	
																			{
																			$data['errors'][]='Price  can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[5])) {
																			$data['errors'][]="Special Price is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[5]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[5]))	  	
																			{
																			$data['errors'][]='Special Price  can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if($fields[6]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[6]))	  	
																			{
																			$data['errors'][]='Offer can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if($fields[7]!=''){
																			$regex ="/^[0-9.]+$/"; 
																			if(!preg_match( $regex, $fields[7]))	  	
																			{
																			$data['errors'][]='Discount can only consist of digits. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[8])) {
																			$data['errors'][]="Qty is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[8]!=''){
																			$regex ="/^[0-9]+$/"; 
																			if(!preg_match( $regex, $fields[8]))
																			{
																			$data['errors'][]="Qty must be digits. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[9])) {
																			$data['errors'][]="Meta keywords is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[9]!=''){
																			$regex ="/^[a-zA-Z0-9.-_& ]+$/"; 
																			if(!preg_match( $regex, $fields[9]))	  	
																			{
																			$data['errors'][]='Meta keywords can only consist of alphanumaric, space and dot. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[10])) {
																			$data['errors'][]="Meta title is required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[10]!=''){
																			$regex ="/^[a-zA-Z0-9.-_& ]+$/"; 
																			if(!preg_match( $regex, $fields[10]))	  	
																			{
																			$data['errors'][]='Meta title can only consist of alphanumaric, space and dot. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[11])) {
																			$data['errors'][]="Status is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[11]!=''){
																			$regex ="/^[0-1]+$/"; 
																			if(!preg_match( $regex, $fields[11]))
																			{
																			$data['errors'][]="Status must be  0 or 1. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[12])) {
																			$data['errors'][]="Product description is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[12]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[12]))	  	
																			{
																			$data['errors'][]='Product description wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[13])) {
																			$data['errors'][]="Sub Item is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[13]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[13]))	  	
																			{
																			$data['errors'][]='Sub Item wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[14])) {
																			$data['errors'][]="Brand is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[14]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[14]))	  	
																			{
																			$data['errors'][]='Brand wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[15])) {
																			$data['errors'][]="Ideal for required. Row Id is :  ".$key.'<br>';
																			$error=1;
																		}else if($fields[15]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/";
																			if(!preg_match( $regex, $fields[15]))
																			{
																			$data['errors'][]="Ideal for wont allow   <> []. Row Id is :  ".$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[16])) {
																			$data['errors'][]="Product specifications name is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[16]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[16]))	  	
																			{
																			$data['errors'][]='Product specifications name wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[17])) {
																			$data['errors'][]="Product specifications value is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[17]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[17]))	  	
																			{
																			$data['errors'][]='Product specifications value wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[18])) {
																			$data['errors'][]="Dial shape is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[18]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[18]))	  	
																			{
																			$data['errors'][]='Dial shape wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[19])) {
																			$data['errors'][]="usage is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[19]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[19]))	  	
																			{
																			$data['errors'][]='usage wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		if(empty($fields[20])) {
																			$data['errors'][]="Display type is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[20]!=''){
																			$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																			if(!preg_match( $regex, $fields[20]))	  	
																			{
																			$data['errors'][]='Display type wont allow "  <> []. Row Id is :  '.$key.'<br>';
																			$error=1;
																			}
																		}
																		
																		if(empty($fields[21])) {
																			$data['errors'][]="Image is required. Row Id is :  ".$key;
																		$error=1;
																		}else if($fields[21]!=''){
																				$image_link = $fields[21];
																				$split_image1 = pathinfo($image_link);
																				$imagename=$split_image1['filename'].".".$split_image1['extension'];
																				$split_image = pathinfo($imagename,PATHINFO_EXTENSION);;
																				if($split_image != "jpg" && $split_image !="png" && $split_image != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[22])&& $fields[22]!=''){
																				$img1 = $fields[22];
																				$img12 = pathinfo($img1);
																				$imagename22=$img12['filename'].".".$img12['extension'];
																				$split_image212 = pathinfo($imagename22,PATHINFO_EXTENSION);;
																				if($split_image212 != "jpg" && $split_image212 !="png" && $split_image212 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[23])&& $fields[23]!=''){
																				$img2 = $fields[23];
																				$img122 = pathinfo($img2);
																				$imagename2233=$img122['filename'].".".$img122['extension'];
																				$image3 = pathinfo($imagename2233,PATHINFO_EXTENSION);;
																				if($image3 != "jpg" && $image3 !="png" && $image3 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[24])&& $fields[24]!=''){
																				$img4 = $fields[24];
																				$img133 = pathinfo($img4);
																				$imagename5656=$img133['filename'].".".$img133['extension'];
																				$image4 = pathinfo($imagename5656,PATHINFO_EXTENSION);;
																				if($image4 != "jpg" && $image4 !="png" && $image4 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[25])&& $fields[25]!=''){
																				$image5 = $fields[25];
																				$image55 = pathinfo($image5);
																				$imagename555=$image55['filename'].".".$image55['extension'];
																				$image5555 = pathinfo($imagename555,PATHINFO_EXTENSION);;
																				if($image5555 != "jpg" && $image5555 !="png" && $image5555 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[26])&& $fields[26]!=''){
																				$image6 = $fields[26];
																				$image66 = pathinfo($image6);
																				$imagename666=$image66['filename'].".".$image66['extension'];
																				$image6666 = pathinfo($imagename666,PATHINFO_EXTENSION);;
																				if($image6666 != "jpg" && $image6666 !="png" && $image6666 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[27])&& $fields[27]!=''){
																				$image7 = $fields[27];
																				$image77 = pathinfo($image7);
																				$imagename777=$image77['filename'].".".$image77['extension'];
																				$image7777 = pathinfo($imagename777,PATHINFO_EXTENSION);;
																				if($image7777 != "jpg" && $image7777 !="png" && $image7777 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[28])&& $fields[28]!=''){
																				$image8 = $fields[28];
																				$image88 = pathinfo($image8);
																				$imagename888=$image88['filename'].".".$image88['extension'];
																				$image8888 = pathinfo($imagename888,PATHINFO_EXTENSION);;
																				if($image8888 != "jpg" && $image8888 !="png" && $image8888 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[29])&& $fields[29]!=''){
																				$image9 = $fields[29];
																				$image99 = pathinfo($image9);
																				$imagename999=$image99['filename'].".".$image99['extension'];
																				$image9999 = pathinfo($imagename999,PATHINFO_EXTENSION);;
																				if($image9999 != "jpg" && $image9999 !="png" && $image9999 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[30])&& $fields[30]!=''){
																				$image01 = $fields[30];
																				$image001 = pathinfo($image01);
																				$imagename0001=$image001['filename'].".".$image001['extension'];
																				$image00001 = pathinfo($imagename0001,PATHINFO_EXTENSION);;
																				if($image00001 != "jpg" && $image00001 !="png" && $image00001 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																			
																		}
																		if(isset($fields[31])&& $fields[31]!=''){
																				$image11 = $fields[31];
																				$image111 = pathinfo($image11);
																				$imagename1111=$image111['filename'].".".$image111['extension'];
																				$image11111 = pathinfo($imagename1111,PATHINFO_EXTENSION);;
																				if($image11111 != "jpg" && $image11111 !="png" && $image11111 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
																				}
																				
																		}
																		if(isset($fields[32])&& $fields[32]!=''){
																				$image12 = $fields[32];
																				$image112 = pathinfo($image12);
																				$imagename1112=$image112['filename'].".".$image112['extension'];
																				$image11112 = pathinfo($imagename1112,PATHINFO_EXTENSION);;
																				if($image11112 != "jpg" && $image11112 !="png" && $image11112 != "jpeg" ) {
																				$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																				$error=1;
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
																$path='/home/cartinhour/public_html/uploads/products/';
																//echo '<pre>';print_r($data);exit;
																	$image_link = $data[21];
																	$split_image = pathinfo($image_link);
																	$imagename=round(microtime(true)).$split_image['filename'].".".$split_image['extension'];
																	copy($data[21], $path.$imagename);
																	if(isset($data[22])&& $data[22]!=''){
																		$image_link1 = $data[22];
																		$split_image1 = pathinfo($image_link1);
																		$imagename1=round(microtime(true)).$split_image1['filename'].".".$split_image1['extension'];
																		copy($data[22], $path.$imagename1);
																	}
																	if(isset($data[23])&& $data[23]!=''){
																			$image_link2 = $data[23];
																			$split_image2 = pathinfo($image_link2);
																			$imagename2=round(microtime(true)).$split_image2['filename'].".".$split_image2['extension'];
																			copy($data[23], $path.$imagename2);
																	}
																	if(isset($data[24])&& $data[24]!=''){
																			$image_link3 = $data[24];
																			$split_image3 = pathinfo($image_link3);
																			$imagename3=round(microtime(true)).$split_image3['filename'].".".$split_image3['extension'];
																			copy($data[24], $path.$imagename3);
																			
																	}
																	if(isset($data[25])&& $data[25]!=''){
																			$image_link4 = $data[25];
																			$split_image4 = pathinfo($image_link4);
																			$imagename4=round(microtime(true)).$split_image4['filename'].".".$split_image4['extension'];
																			copy($data[25], $path.$imagename4);
																			
																	}
																	if(isset($data[26])&& $data[26]!=''){
																			$image_link5 = $data[26];
																			$split_image5 = pathinfo($image_link5);
																			$imagename5=round(microtime(true)).$split_image5['filename'].".".$split_image5['extension'];
																			copy($data[26], $path.$imagename5);
																			
																	}
																	if(isset($data[27])&& $data[27]!=''){
																		$image_link6 = $data[27];
																		$split_image6 = pathinfo($image_link6);
																		$imagename6=round(microtime(true)).$split_image6['filename'].".".$split_image6['extension'];
																		copy($data[27], $path.$imagename6);
																	
																	}
																	if(isset($data[28])&& $data[28]!=''){
																		$image_link7 = $data[28];
																		$split_image7 = pathinfo($image_link7);
																		$imagename7=round(microtime(true)).$split_image7['filename'].".".$split_image7['extension'];
																		copy($data[28], $path.$imagename7);
																	
																	}
																	if(isset($data[29])&& $data[29]!=''){
																			$image_link8 = $data[29];
																			$split_image8 = pathinfo($image_link8);
																			$imagename8=round(microtime(true)).$split_image8['filename'].".".$split_image8['extension'];
																			copy($data[29], $path.$imagename8);
																			
																	}
																	if(isset($data[30])&& $data[30]!=''){
																		$image_link9 = $data[30];
																		$split_image9 = pathinfo($image_link9);
																		$imagename9=round(microtime(true)).$split_image9['filename'].".".$split_image9['extension'];
																		copy($data[30], $path.$imagename9);
																	}
																	if(isset($data[31])&& $data[31]!=''){
																		$image_link10 = $data[31];
																		$split_image10 = pathinfo($image_link10);
																		$imagename10=round(microtime(true)).$split_image10['filename'].".".$split_image10['extension'];
																		copy($data[31], $path.$imagename10);
																	
																	}
																	if(isset($data[32])&& $data[32]!=''){
																		$image_link11 = $data[32];
																		$split_image11 = pathinfo($image_link11);
																		$imagename11=round(microtime(true)).$split_image11['filename'].".".$split_image11['extension'];
																		copy($data[32], $path.$imagename11);
																		
																	}
																	
																	$adddetails=array(
																			'category_id' => $post['category_ids'],			
																			'subcategory_id' =>$post['subcategory_ids'],
																			'seller_id' =>$this->session->userdata('seller_id'), 
																			'item_name' => $data[1],
																			'skuid' => $data[2],
																			'item_code' => $data[3],
																			'item_cost' => $data[4],
																			'special_price' => $data[5],
																			'offers' =>$data[6],
																			'discount' =>$data[7],
																			'item_quantity' =>$data[8],
																			'keywords' =>$data[9],
																			'title' =>$data[10],
																			'item_status' => $data[11],
																			'item_description' =>$data[12],
																			'item_sub_name' =>$data[13],
																			'brand' =>$data[14],
																			'ideal_for' =>$data[15],
																			'dial_shape' =>$data[18],
																			'usage' =>$data[19],
																			'display_type' =>$data[20],
																			'item_image'=>isset($imagename)?$imagename:'',
																			'item_image1'=>isset($imagename1)?$imagename1:'',
																			'item_image2'=>isset($imagename2)?$imagename2:'',
																			'item_image3'=>isset($imagename3)?$imagename3:'',
																			'item_image4'=>isset($imagename4)?$imagename4:'',
																			'item_image5'=>isset($imagename5)?$imagename5:'',
																			'item_image6'=>isset($imagename6)?$imagename6:'',
																			'item_image7'=>isset($imagename7)?$imagename7:'',
																			'item_image8'=>isset($imagename8)?$imagename8:'',
																			'item_image9'=>isset($imagename9)?$imagename9:'',
																			'item_image10'=>isset($imagename10)?$imagename10:'',
																			'item_image11'=>isset($imagename11)?$imagename11:'',
																			'seller_location_area'=>$seller_location['area'],
																			'created_at'=>date('Y-m-d H:i:s'),

																		);
																		//echo '<pre>';print_r($adddetails);exit;
																			$results=$this->products_model->save_prodcts($adddetails);
																				if(count($results)>0){
																						/* for spcification purpose*/
																						$arr1=explode(",",$data[16]);
																						$arr2=explode(",",$data[17]);
																						foreach (array_combine($arr1,$arr2) as $key=>$list){
																							if($list!='' && $key!=''){
																							$addspc=array(
																							'item_id' =>$results,
																							'spc_name' => $key,
																							'spc_value' => $list,
																							'create_at' => date('Y-m-d H:i:s'),
																							);
																							$this->products_model->insert_product_spcifications($addspc);
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


							
							
						
				}
		
		//exit;
		
		
			}else{
				$this->session->set_flashdata('error','Due to technical problem please try aftre some time.');
				redirect('/seller/products/create');
				
			}
			
			
		
	}	

}