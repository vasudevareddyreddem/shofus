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
		//echo substr($_FILES['categoryfile']['name'], 0, 19);exit;
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
														$path='F:/xampp/htdocs/cartinhour/uploads/products/';
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
								$this->session->set_flashdata('error','Your are uploaded  wrong File. Please upload coreect file!');
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
														$path='F:/xampp/htdocs/cartinhour/uploads/products/';
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
								$this->session->set_flashdata('error','Your are uploaded  wrong File. Please upload coreect file!');
								redirect('/seller/products/create');
							}
							
							
						}else if($post['category_ids']==20){
							
							
						}else{
						
						
						}
		
		//exit;
		
		
			}else{
				$this->session->set_flashdata('error','Due to technical problem please try aftre some time.');
				redirect('/seller/products/create');
				
			}
			
			
		
	}	

}