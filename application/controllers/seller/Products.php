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
	//$subcat_id = $this->uri->segment(6);
	
	//$data['catname'] = $this->products_model->getcatname($cat_id);
	//$data['subcatname'] = $this->products_model->getsubcatname($subcat_id);
	
	 	$data['subcatdata'] = $this->products_model->getsubcatdata($cat_id);
		$data['getcat'] = $this->products_model->getcateditdata();
		$data['productdata']=$this->products_model->getproductdata($id);
		$this->template->write_view('content', 'seller/products/edit', $data);
		$this->template->render();
	
}

public function update()

{
	
	$id = $this->uri->segment(4);
	//echo $id; exit;
if(isset($_POST)){

if(!empty($_FILES['picture']['name'])){

                $config['upload_path'] = 'uploads/products/';

                $config['allowed_types'] = 'jpg|jpeg|png|gif';

                $config['file_name'] = $_FILES['picture']['name'];

                

                //Load upload library and initialize configuration

                $this->load->library('upload',$config);

                $this->upload->initialize($config);

                

                if($this->upload->do_upload('picture')){

                    $uploadData = $this->upload->data();

                    $picture = $uploadData['file_name'];

                }else{

                    $picture = $_POST['hdn_inner_banner'];

                }

            }else{

                $picture = $_POST['hdn_inner_banner'];

            }

}
 	
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
			'item_image'=>$picture,

	);

			$res=$this->products_model->update($id,$data);

			if($res)



			{

                 $this->prepare_flashmessage("Successfully Updated..", 0);
				return redirect('seller/products');

				//echo "<script>window.location='".base_url()."seller/products/index</script>";


			}

			else

			{

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
	echo '<pre>';print_r($post);
		
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
					
						echo "<pre>";print_r($arry);
						foreach($arry as $key=>$fields)
							{
							if(isset($fields[1]) && $fields[1]!='' ){
							
								$totalfields[] = $fields;	
								
								if(empty($fields[1])) {
									$data['errors'][]="Item is required. Row Id is :  ".$key.'<br>';
									$error=1;
								}else if($fields[1]!=''){
									$regex ="/^[a-zA-Z0-9]+$/";  
									if(!preg_match( $regex, $fields[1]))
									{
									$data['errors'][]="Item  can only consist of alphanumaric, space and dot. Row Id is :   ".$key.'<br>';
									$error=1;
									}
								}
								if(empty($fields[2])) {
									$data['errors'][]="Iten Name is required. Row Id is :  ".$key.'<br>';
									$error=1;
								}else if($fields[2]!=''){
									$regex ="/^[a-zA-Z0-9]+$/";  
									if(!preg_match( $regex, $fields[2]))
									{
									$data['errors'][]="Iten Name can only consist of alphanumaric, space and dot. Row Id is :  ".$key.'<br>';
									$error=1;
									}
								}
								if(empty($fields[3])) {
									$data['errors'][]="Iten Name is required. Row Id is :  ".$key.'<br>';
									$error=1;
								}else if($fields[3]!=''){
									$regex ="/^[a-zA-Z0-9]+$/";  
									if(!preg_match( $regex, $fields[3]))
									{
									$data['errors'][]="Iten Name can only consist of alphanumaric, space and dot. Row Id is :  ".$key.'<br>';
									$error=1;
									}
								}
							
							// $image_link = $fields[8];//Direct link to image
							// $split_image = pathinfo($image_link);
							// $imagename=$split_image['filename'].".".$split_image['extension'];
						
						}
					}
					echo '<pre>';print_r($data['errors']);exit;
						
						
					}
					
					}
						//echo '<pre>';print_r($data['errors']);exit;
					
						
					} 
					echo "hello";exit;
}	

}