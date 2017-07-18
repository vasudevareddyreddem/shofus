<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/seller/Admin_Controller.php');


class Products extends Admin_Controller {

	
	public function __construct() {
		parent::__construct();
		
		$this->load->helper(array('url', 'html'));
		$this->load->library('session');
		$this->load->helper('security');
		$this->load->library(array('form_validation','session'));
		$this->load->model('seller/products_model');
		$this->load->model('seller/dashboard_model');
       // $this->load->library('pagination');
		
	}

	public function index()
	{
		
	   
	   $data['catitemdata'] = $this->products_model->getcatsubcatpro();
	   $data['catitemdata1'] = $this->products_model->getcatsubcatpro();
		$data['cnt']= count($data['catitemdata1']);
		
		$this->template->write_view('content', 'seller/products/index', $data);
		$this->template->render();
	}
	
	public function create()
	{
	
		//$cat_id = $this->uri->segment('4');
		//$subcat_id = $this->uri->segment('5');
		//$data['catname'] = $this->products_model->getcatname($cat_id);
		//$data['subcatname'] = $this->products_model->getsubcatname($subcat_id);
       //$data['subcatdata'] = $this->products_model->getsubcatdata($cat_id);
	   $sid = $this->session->userdata('seller_id'); 
		$data['sub_cat_data'] = $this->products_model->get_seller_catdata($sid);
		$data['items'] = $this->products_model->auto_items();
		//echo $this->db->last-query();exit;
		//echo '<pre>';print_r($data);exit;
		$this->template->write_view('content', 'seller/products/add', $data);
		$this->template->render();

	}
	
	public function getajaxsubcat()
	{
		
	$cat=$this->input->post('category_id');
	$result=$this->products_model->getsubcatdata($cat);
	
	if(count($result)>0){
		echo '<option value="">Select Subcategory</option>';
		foreach($result as $alldata)
	{

	echo '<option value="'.$alldata->subcategory_id.'">'.$alldata->subcategory_name.'</option>';
	}
		
	}else{
		echo '<option value="">Select Subcategory</option>';	
			
	}
	
	exit;	
		
	}

	public function getajaxsubitem()
	{
	$subcat=$this->input->post('subcategory_id');
	$result=$this->products_model->getsubitemdata($subcat);
	echo '<option value="">Select Subitem</option>';
	foreach($result as $alldata)
	{
	echo '<option value="'.$alldata->subitem_id.'">'.$alldata->subitem_name.'</option>';
	}
	exit;	
	}	



		
	public function insert()
 		{

		$seller_location=$this->products_model->get_store_location($this->session->userdata('seller_id'));	
		$post=$this->input->post();
			$i=0;
			foreach($_FILES['picture_three']['name'] as $file){
				if(!empty($file))
				{ 

				$newfile1 = str_replace(' ','_',$_FILES["picture_three"]["name"][$i]);
				//$newfile1 =  explode(".",$_FILES["picture_three"]["name"][$i]);
				$newfilename = round(microtime(true)).$newfile1;

			
					if(move_uploaded_file($_FILES["picture_three"]["tmp_name"][$i], "uploads/products/" . $newfilename))
					{
					$images[]=$newfilename;
					}
				}
			$i++;
			}
			
	
		//echo '<pre>';print_r($images);exit;
		
		
		$data=array(

            'category_id' => $this->input->post('category_id'),			
			'subcategory_id' => $this->input->post('subcategory_id'),
			'subitem_id' => $this->input->post('subitem_id'),
            'seller_id' => $this->session->userdata('seller_id'),             
			'item_sub_name' => $this->input->post('sub_item_name'),
			'item_name' => $this->input->post('item_name'),
			'item_code' => $this->input->post('item_code'),
			'item_quantity' => $this->input->post('item_quantity'),
			'item_status' => $this->input->post('item_status'),
			'item_description' => $this->input->post('item_description'),
			'item_cost' => $this->input->post('item_cost'),
			'item_image'=>isset($images[0])?$images[0]:'',
			'item_image1'=>isset($images[1])?$images[1]:'',
			'item_image2'=>isset($images[2])?$images[2]:'',
			'item_image3'=>isset($images[3])?$images[3]:'',
			'item_image4'=>isset($images[4])?$images[4]:'',
			'item_image5'=>isset($images[5])?$images[5]:'',
			'item_image6'=>isset($images[6])?$images[6]:'',
			'item_image7'=>isset($images[7])?$images[7]:'',
			'item_image8'=>isset($images[8])?$images[8]:'',
			'item_image9'=>isset($images[9])?$images[9]:'',
			'item_image10'=>isset($images[10])?$images[10]:'',
			'item_image11'=>isset($images[11])?$images[11]:'',
			'seller_location_area'=>$seller_location['area'],
			'created_at'=>date('Y-m-d H:i:s'),

			);
			//echo '<pre>';print_r($data);exit;

			$res=$this->products_model->insert($data);
			if($res)
			{
				$this->session->set_flashdata('addsuccess',"Item Successfully added..", 0);
				redirect('seller/products/create');
			}
			else
			{

				$this->prepare_flashmessage("Failed to Insert..", 1);
				//return redirect(base_url('admin/fooditems'));
		echo "<script>window.location='".base_url()."seller/products/".$this->uri->segment(4)."/".$this->uri->segment(5)."';</script>";
			}
}


public function edit()
{
	$id = $this->uri->segment(4);
	$cat_id = $this->uri->segment(5);
	$data['items'] = $this->products_model->auto_items();
	$data['subcatdata'] = $this->products_model->getsubcatdata($cat_id);
	$data['getcat'] = $this->products_model->getcateditdata();
	$data['productdata']=$this->products_model->getproductdata($id);
	//echo '<pre>';print_r($data['productdata']);exit;
	$this->template->write_view('content', 'seller/products/edit', $data);
	$this->template->render();
	
}

public function update()

{
	
	$id = $this->uri->segment(4);
	$post=$this->input->post();
	echo '<pre>';print_r($post);
	echo '<pre>';print_r($_FILES);
	
	
	$seller_location=$this->products_model->get_store_location($this->session->userdata('seller_id'));
	$product_details=$this->products_model->get_producr_details($this->uri->segment(4));
//echo '<pre>';print_r($product_details);exit;	
		
		$post=$this->input->post();
			$i=0;
			foreach($_FILES['picture_three']['name'] as $file){
				if(!empty($file))
				{ 

				$newfile1 = str_replace(' ','_',$_FILES["picture_three"]["name"][$i]);
				//$newfile1 =  explode(".",$_FILES["picture_three"]["name"][$i]);
				$newfilename = round(microtime(true)).$newfile1;

			
					if(move_uploaded_file($_FILES["picture_three"]["tmp_name"][$i], "uploads/products/" . $newfilename))
					{
					$images[]=$newfilename;
					}
				}
			$i++;
			}
	//echo $id; exit;
		$data=array(
			'category_id' => $this->input->post('category_id'),
			'subcategory_id' => $this->input->post('subcategory_id'),
			'seller_id' => $this->session->userdata('seller_id'),
			'item_name' => $this->input->post('item_name'),
			'item_code' => $this->input->post('item_code'),
			'item_quantity' => $this->input->post('item_quantity'),
			'item_status' => $this->input->post('item_status'),
			'item_description' => $this->input->post('item_description'),
			'item_cost' => $this->input->post('item_cost'),
			'item_image'=>isset($images[0])?$images[0]:$product_details['item_image'],
			'item_image1'=>isset($images[1])?$images[1]:$product_details['item_image1'],
			'item_image2'=>isset($images[2])?$images[2]:$product_details['item_image2'],
			'item_image3'=>isset($images[3])?$images[3]:$product_details['item_image3'],
			'item_image4'=>isset($images[4])?$images[4]:$product_details['item_image4'],
			'item_image5'=>isset($images[5])?$images[5]:$product_details['item_image5'],
			'item_image6'=>isset($images[6])?$images[6]:$product_details['item_image6'],
			'item_image7'=>isset($images[7])?$images[7]:$product_details['item_image7'],
			'item_image8'=>isset($images[8])?$images[8]:$product_details['item_image8'],
			'item_image9'=>isset($images[9])?$images[9]:$product_details['item_image9'],
			'item_image10'=>isset($images[10])?$images[10]:$product_details['item_image10'],
			'item_image11'=>isset($images[11])?$images[11]:$product_details['item_image11'],
			'seller_location_area'=>$seller_location['area'],
			'created_at'=>date('Y-m-d H:i:s'),

			);
			
			//echo '<pre>';print_r($data);exit;
			$res=$this->products_model->update($id,$data);
			if(count($res)>0)
			{
				$this->prepare_flashmessage("Successfully Updated..", 0);
				return redirect('seller/products');
				//echo "<script>window.location='".base_url()."seller/products/index</script>";
			}else{
				$this->prepare_flashmessage("Failed to Insert..", 1);
				//return redirect(base_url('admin/fooditems'));
				return redirect('seller/products');
			}	
		
}


public function delete()

  {

	//echo $this->uri->segment(3); exit;

		$id=$this->uri->segment(4);
		$result=$this->products_model->delete($id);

		if($result==1){

			$this->prepare_flashmessage("Successfully Deleted..", 0);

			return redirect('seller/products');

//echo "<script>window.location='".base_url()."seller/products/".$this->uri->segment(5)."/".$this->uri->segment(6)."';</script>";

		}



	}
public function search()
    
  {
     $cat_id = $this->uri->segment(3);
	 $subcat_id = $this->uri->segment(4);
             $match = $this->input->post('search');
             
			 
			 
               // $result1 = $this->products_model->search($match,$cat_id,$subcat_id);
                //$result2 = count($result1);
                //echo $result2;exit;
              //$this->load->library('pagination');
            //$this->load->view('welcome_message');
            $result=$this->products_model->search($match,$cat_id,$subcat_id);
            $data['itemdata'] =  $result;
			$data['catname'] = $this->products_model->getcatname($cat_id);
		$data['subcatname'] = $this->products_model->getsubcatname($subcat_id);
       //$data['itemdata'] = $this->products_model->getitems($cat_id,$subcat_id);
            $this->template->write_view('content', 'seller/products/index',$data);

            $this->template->render();

    }
public function track_requests()
{
	

$data['approvalrequestdata'] = $this->products_model->getproductapproval();
$this->template->write_view('content', 'seller/products/approval_request', $data);
		$this->template->render();



}

public function returns()

{
		$data['returncatitemdata'] = $this->products_model->returns();
		
		$this->template->write_view('content', 'seller/products/returns', $data);
		$this->template->render();
}
public function uploadproducts(){
	
	$post=$this->input->post();
	$cat_id=explode("/",$post['category_id_import']);
	$seller_location=$this->products_model->get_store_location($this->session->userdata('seller_id'));	
	//echo '<pre>';print_r($post);
		
	if((!empty($_FILES["categoryes"])) && ($_FILES['categoryes']['error'] == 0)) {
				
				$limitSize	= 1000000000; //(15 kb) - Maximum size of uploaded file, change it to any size you want
				$fileName	= basename($_FILES['categoryes']['name']);
				$fileSize	= $_FILES["categoryes"]["size"];
				$fileExt	= substr($fileName, strrpos($fileName, '.') + 1);
				
				if (($fileExt == "xlsx") && ($fileSize < $limitSize)) {
					
						include( 'simplexlsx.class.php');

					$getWorksheetName = array();
					$xlsx = new SimpleXLSX( $_FILES['categoryes']['tmp_name'] );
					$getWorksheetName = $xlsx->getWorksheetName();
					//echo $xlsx->sheetsCount();exit;
					for($j=1;$j <= $xlsx->sheetsCount();$j++){
						$cnt=$xlsx->sheetsCount()-1;
						$arry=$xlsx->rows($j);
						unset($arry[0]);
					
						//echo "<pre>";print_r($arry);exit;
						foreach($arry as $key=>$fields)
							{
								if(isset($fields[1]) && $fields[1]!='' && $fields[2]!='' && $fields[3]!='' && $fields[4]!='' && $fields[5]!=''  && $fields[6]!='' && $fields[7]!=''  && $fields[8]!='' ){
								
									$totalfields[] = $fields;	
									
									if(empty($fields[1])) {
										$data['errors'][]="Item is required. Row Id is :  ".$key.'<br>';
										$error=1;
									}else if($fields[1]!=''){
										$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
										if(!preg_match( $regex, $fields[1]))	  	
										{
										$data['errors'][]='item wont allow "  <> []. Row Id is :  '.$key.'<br>';
										$error=1;
										}
									}
									if(empty($fields[2])) {
										$data['errors'][]="Iten Name is required. Row Id is :  ".$key.'<br>';
										$error=1;
									}else if($fields[2]!=''){
										$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
										if(!preg_match( $regex, $fields[2]))	  	
										{
										$data['errors'][]='Item Name wont allow "  <> []. Row Id is :  '.$key.'<br>';
										$error=1;
										}
									}
									if(empty($fields[3])) {
										$data['errors'][]="Iten Code is required. Row Id is :  ".$key.'<br>';
										$error=1;
									}else if($fields[3]!=''){
										$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
										if(!preg_match( $regex, $fields[3]))	  	
										{
										$data['errors'][]='Item Code wont allow "  <> []. Row Id is :  '.$key.'<br>';
										$error=1;
										}
									}
									if(empty($fields[4])) {
										$data['errors'][]="Item Quantity is required. Row Id is :  ".$key;
									$error=1;
									}else if($fields[4]!=''){
										$regex ="/^[0-9]+$/"; 
										if(!preg_match( $regex, $fields[4]))
										{
										$data['errors'][]="Item Quantity must be digits. Row Id is :  ".$key.'<br>';
										$error=1;
										}
									}
									if(empty($fields[5])) {
										$data['errors'][]="Item Charges is required. Row Id is :  ".$key;
									$error=1;
									}else if($fields[5]!=''){
										$regex ="/^[0-9]+$/"; 
										if(!preg_match( $regex, $fields[5]))
										{
										$data['errors'][]="Item Charges must be digits. Row Id is :  ".$key.'<br>';
										$error=1;
										}
									}
									if(empty($fields[6])) {
										$data['errors'][]="Status is required. Row Id is :  ".$key;
									$error=1;
									}else if($fields[6]!=''){
										$regex ="/^[0-1]+$/"; 
										if(!preg_match( $regex, $fields[6]))
										{
										$data['errors'][]="Status must be  0 or 1. Row Id is :  ".$key.'<br>';
										$error=1;
										}
									}
									if(empty($fields[7])) {
										$data['errors'][]="Description is required. Row Id is :  ".$key;
									$error=1;
									}else if($fields[7]!=''){
										$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
										if(!preg_match( $regex, $fields[3]))	  	
										{
										$data['errors'][]='Description wont allow "  <> []. Row Id is :  '.$key.'<br>';
										$error=1;
										}
									}
									if(empty($fields[8])) {
										$data['errors'][]="Image is required. Row Id is :  ".$key;
									$error=1;
									}else if($fields[8]!=''){
											$image_link = $fields[8];
											$split_image1 = pathinfo($image_link);
											$imagename=$split_image1['filename'].".".$split_image1['extension'];
											$split_image = pathinfo($imagename,PATHINFO_EXTENSION);;
											if($split_image != "jpg" && $split_image !="png" && $split_image != "jpeg" ) {
											$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
											$error=1;
											}
										
									}
									if(isset($fields[9])&& $fields[9]!=''){
											$img1 = $fields[9];
											$img12 = pathinfo($img1);
											$imagename22=$img12['filename'].".".$img12['extension'];
											$split_image212 = pathinfo($imagename22,PATHINFO_EXTENSION);;
											if($split_image212 != "jpg" && $split_image212 !="png" && $split_image212 != "jpeg" ) {
											$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
											$error=1;
											}
										
									}
									if(isset($fields[10])&& $fields[10]!=''){
											$img2 = $fields[10];
											$img122 = pathinfo($img2);
											$imagename2233=$img122['filename'].".".$img122['extension'];
											$image3 = pathinfo($imagename2233,PATHINFO_EXTENSION);;
											if($image3 != "jpg" && $image3 !="png" && $image3 != "jpeg" ) {
											$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
											$error=1;
											}
										
									}
									if(isset($fields[11])&& $fields[11]!=''){
											$img4 = $fields[11];
											$img133 = pathinfo($img4);
											$imagename5656=$img133['filename'].".".$img133['extension'];
											$image4 = pathinfo($imagename5656,PATHINFO_EXTENSION);;
											if($image4 != "jpg" && $image4 !="png" && $image4 != "jpeg" ) {
											$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
											$error=1;
											}
										
									}
									if(isset($fields[12])&& $fields[12]!=''){
											$image5 = $fields[12];
											$image55 = pathinfo($image5);
											$imagename555=$image55['filename'].".".$image55['extension'];
											$image5555 = pathinfo($imagename555,PATHINFO_EXTENSION);;
											if($image5555 != "jpg" && $image5555 !="png" && $image5555 != "jpeg" ) {
											$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
											$error=1;
											}
										
									}
									if(isset($fields[13])&& $fields[13]!=''){
											$image6 = $fields[13];
											$image66 = pathinfo($image6);
											$imagename666=$image66['filename'].".".$image66['extension'];
											$image6666 = pathinfo($imagename666,PATHINFO_EXTENSION);;
											if($image6666 != "jpg" && $image6666 !="png" && $image6666 != "jpeg" ) {
											$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
											$error=1;
											}
										
									}
									if(isset($fields[14])&& $fields[14]!=''){
											$image7 = $fields[14];
											$image77 = pathinfo($image7);
											$imagename777=$image77['filename'].".".$image77['extension'];
											$image7777 = pathinfo($imagename777,PATHINFO_EXTENSION);;
											if($image7777 != "jpg" && $image7777 !="png" && $image7777 != "jpeg" ) {
											$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
											$error=1;
											}
										
									}
									if(isset($fields[15])&& $fields[15]!=''){
											$image8 = $fields[15];
											$image88 = pathinfo($image8);
											$imagename888=$image88['filename'].".".$image88['extension'];
											$image8888 = pathinfo($imagename888,PATHINFO_EXTENSION);;
											if($image8888 != "jpg" && $image8888 !="png" && $image8888 != "jpeg" ) {
											$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
											$error=1;
											}
										
									}
									if(isset($fields[16])&& $fields[16]!=''){
											$image9 = $fields[16];
											$image99 = pathinfo($image9);
											$imagename999=$image99['filename'].".".$image99['extension'];
											$image9999 = pathinfo($imagename999,PATHINFO_EXTENSION);;
											if($image9999 != "jpg" && $image9999 !="png" && $image9999 != "jpeg" ) {
											$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
											$error=1;
											}
										
									}
									if(isset($fields[17])&& $fields[17]!=''){
											$image01 = $fields[17];
											$image001 = pathinfo($image01);
											$imagename0001=$image001['filename'].".".$image001['extension'];
											$image00001 = pathinfo($imagename0001,PATHINFO_EXTENSION);;
											if($image00001 != "jpg" && $image00001 !="png" && $image00001 != "jpeg" ) {
											$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
											$error=1;
											}
										
									}
									if(isset($fields[18])&& $fields[18]!=''){
											$image11 = $fields[18];
											$image111 = pathinfo($image11);
											$imagename1111=$image111['filename'].".".$image111['extension'];
											$image11111 = pathinfo($imagename1111,PATHINFO_EXTENSION);;
											if($image11111 != "jpg" && $image11111 !="png" && $image11111 != "jpeg" ) {
											$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
											$error=1;
											}
										
									}
									if(isset($fields[19])&& $fields[19]!=''){
											$image12 = $fields[19];
											$image112 = pathinfo($image12);
											$imagename1112=$image112['filename'].".".$image112['extension'];
											$image11112 = pathinfo($imagename1112,PATHINFO_EXTENSION);;
											if($image11112 != "jpg" && $image11112 !="png" && $image11112 != "jpeg" ) {
											$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
											$error=1;
											}
										
									}
									
									
								
								// $image_link = $fields[8];//Direct link to image
								// $split_image = pathinfo($image_link);
								// $imagename=$split_image['filename'].".".$split_image['extension'];
							
							}else{
								$data['errors'][]='Please Fillout all Fields';
								$this->session->set_flashdata('addsuccess',$data['errors']);
								redirect('/seller/products/create');
							}
					}
					//echo '<pre>';print_r($data['errors']);exit;
					if(count($data['errors'])>0){
					$this->session->set_flashdata('addsuccess',$data['errors']);
					redirect('/seller/products/create');
					}
						
						
					}
					
					}
				
					if(count($data['errors'])<=0){
						foreach($totalfields as $data){
						//echo '<pre>';print_r($data);
								$image_link = $data[8];
								$split_image = pathinfo($image_link);
								$imagename=round(microtime(true)).$split_image['filename'].".".$split_image['extension'];
								$ch = curl_init();
								curl_setopt($ch, CURLOPT_URL , $image_link);
								curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
								$response= curl_exec ($ch);
								curl_close($ch);
								$file_name = "H:/xampp/htdocs/cartinhour/uploads/products/".$imagename;
								$file = fopen($file_name , 'w') or die("X_x");
								fwrite($file, $response);
								fclose($file);
								if(isset($data[9])&& $data[9]!=''){
									$image_link1 = $data[9];
									$split_image1 = pathinfo($image_link1);
									$imagename1=round(microtime(true)).$split_image1['filename'].".".$split_image1['extension'];
									$ch = curl_init();
									curl_setopt($ch, CURLOPT_URL , $image_link1);
									curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
									$response= curl_exec ($ch);
									curl_close($ch);
									$file_name = "H:/xampp/htdocs/cartinhour/uploads/reports/".$imagename1;
									$file = fopen($file_name , 'w') or die("X_x");
									fwrite($file, $response);
									fclose($file);
								}
								if(isset($data[10])&& $data[10]!=''){
										$image_link2 = $data[10];
										$split_image2 = pathinfo($image_link2);
										$imagename2=round(microtime(true)).$split_image2['filename'].".".$split_image2['extension'];
										$ch = curl_init();
										curl_setopt($ch, CURLOPT_URL , $image_link2);
										curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
										$response= curl_exec ($ch);
										curl_close($ch);
										$file_name = "H:/xampp/htdocs/cartinhour/uploads/reports/".$imagename2;
										$file = fopen($file_name , 'w') or die("X_x");
										fwrite($file, $response);
										fclose($file);
								}
								if(isset($data[11])&& $data[11]!=''){
										$image_link3 = $data[11];
										$split_image3 = pathinfo($image_link3);
										$imagename3=round(microtime(true)).$split_image3['filename'].".".$split_image3['extension'];
										
										$ch = curl_init();
										curl_setopt($ch, CURLOPT_URL , $image_link3);
										curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
										$response= curl_exec ($ch);
										curl_close($ch);
										$file_name = "H:/xampp/htdocs/cartinhour/uploads/reports/".$imagename3;
										$file = fopen($file_name , 'w') or die("X_x");
										fwrite($file, $response);
										fclose($file);
								}
								if(isset($data[12])&& $data[12]!=''){
										$image_link4 = $data[12];
										$split_image4 = pathinfo($image_link4);
										$imagename4=round(microtime(true)).$split_image4['filename'].".".$split_image4['extension'];
										$ch = curl_init();
										curl_setopt($ch, CURLOPT_URL , $image_link4);
										curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
										$response= curl_exec ($ch);
										curl_close($ch);
										$file_name = "H:/xampp/htdocs/cartinhour/uploads/reports/".$imagename4;
										$file = fopen($file_name , 'w') or die("X_x");
										fwrite($file, $response);
										fclose($file);
								}
								if(isset($data[13])&& $data[13]!=''){
										$image_link5 = $data[13];
										$split_image5 = pathinfo($image_link5);
										$imagename5=round(microtime(true)).$split_image5['filename'].".".$split_image5['extension'];
										$ch = curl_init();
										curl_setopt($ch, CURLOPT_URL , $image_link5);
										curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
										$response= curl_exec ($ch);
										curl_close($ch);
										$file_name = "H:/xampp/htdocs/cartinhour/uploads/reports/".$imagename5;
										$file = fopen($file_name , 'w') or die("X_x");
										fwrite($file, $response);
										fclose($file);
								}
								if(isset($data[14])&& $data[14]!=''){
									$image_link6 = $data[14];
									$split_image6 = pathinfo($image_link6);
									$imagename6=round(microtime(true)).$split_image6['filename'].".".$split_image6['extension'];
									$ch = curl_init();
									curl_setopt($ch, CURLOPT_URL , $image_link6);
									curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
									$response= curl_exec ($ch);
									curl_close($ch);
									$file_name = "H:/xampp/htdocs/cartinhour/uploads/reports/".$imagename6;
									$file = fopen($file_name , 'w') or die("X_x");
									fwrite($file, $response);
									fclose($file);
								}
								if(isset($data[15])&& $data[15]!=''){
									$image_link7 = $data[15];
									$split_image7 = pathinfo($image_link7);
									$imagename7=round(microtime(true)).$split_image7['filename'].".".$split_image7['extension'];
									$ch = curl_init();
									curl_setopt($ch, CURLOPT_URL , $image_link7);
									curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
									$response= curl_exec ($ch);
									curl_close($ch);
									$file_name = "H:/xampp/htdocs/cartinhour/uploads/reports/".$imagename7;
									$file = fopen($file_name , 'w') or die("X_x");
									fwrite($file, $response);
									fclose($file);
								}
								if(isset($data[16])&& $data[16]!=''){
										$image_link8 = $data[16];
										$split_image8 = pathinfo($image_link8);
										$imagename8=round(microtime(true)).$split_image8['filename'].".".$split_image8['extension'];
										$ch = curl_init();
										curl_setopt($ch, CURLOPT_URL , $image_link8);
										curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
										$response= curl_exec ($ch);
										curl_close($ch);
										$file_name = "H:/xampp/htdocs/cartinhour/uploads/reports/".$imagename8;
										$file = fopen($file_name , 'w') or die("X_x");
										fwrite($file, $response);
										fclose($file);
								}
								if(isset($data[17])&& $data[17]!=''){
									$image_link9 = $data[17];
									$split_image9 = pathinfo($image_link9);
									$imagename9=round(microtime(true)).$split_image9['filename'].".".$split_image9['extension'];
									$ch = curl_init();
									curl_setopt($ch, CURLOPT_URL , $image_link9);
									curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
									$response= curl_exec ($ch);
									curl_close($ch);
									$file_name = "H:/xampp/htdocs/cartinhour/uploads/reports/".$imagename9;
									$file = fopen($file_name , 'w') or die("X_x");
									fwrite($file, $response);
									fclose($file);
								}
								if(isset($data[18])&& $data[18]!=''){
									$image_link10 = $data[18];
									$split_image10 = pathinfo($image_link10);
									$imagename10=round(microtime(true)).$split_image10['filename'].".".$split_image10['extension'];
									$ch = curl_init();
									curl_setopt($ch, CURLOPT_URL , $image_link10);
									curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
									$response= curl_exec ($ch);
									curl_close($ch);
									$file_name = "H:/xampp/htdocs/cartinhour/uploads/reports/".$imagename10;
									$file = fopen($file_name , 'w') or die("X_x");
									fwrite($file, $response);
									fclose($file);
								}
								if(isset($data[19])&& $data[19]!=''){
									$image_link11 = $data[19];
									$split_image11 = pathinfo($image_link11);
									$imagename11=round(microtime(true)).$split_image11['filename'].".".$split_image11['extension'];
									$ch = curl_init();
									curl_setopt($ch, CURLOPT_URL , $image_link11);
									curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
									$response= curl_exec ($ch);
									curl_close($ch);
									$file_name = "H:/xampp/htdocs/cartinhour/uploads/reports/".$imagename11;
									$file = fopen($file_name , 'w') or die("X_x");
									fwrite($file, $response);
									fclose($file);
								}
							$adddetails=array(
							'category_id' => $cat_id[0],			
							'subcategory_id' =>$post['subcategory_id_import'],
							'seller_id' =>$this->session->userdata('seller_id'),            
							'item_sub_name' => $data[1],
							'item_name' =>$data[2],
							'item_code' => $data[3],
							'item_quantity' => $data[4],
							'item_cost' =>$data[5],
							'item_status' => $data[6],
							'item_description' => $data[7],
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
						//echo $this->db->last_query();exit;						
						}
					}
					if(count($results)>0){
					$this->session->set_flashdata('addcus','Items are successfully added');
					redirect('/seller/products/create');	
					}
					
						//echo '<pre>';print_r($adddetails);exit;
					
						
					} 
}	

}