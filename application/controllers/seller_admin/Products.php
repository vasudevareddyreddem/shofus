<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/seller_admin/Admin_Controller.php');


class Products extends Admin_Controller {

	
	public function __construct() {
		parent::__construct();
		
		$this->load->library('image_lib');
		$this->load->model('seller_admin/products_model');
		$this->load->model('seller_admin/dashboard_model');
       // $this->load->library('pagination');
		
	}

	public function index()
	{
		
	   
	   $data['catitemdata'] = $this->products_model->getcatsubcatpro();
		
		$this->template->write_view('content', 'seller_admin/products/index', $data);
		$this->template->render();


	}
	
	public function create()
	{
		//$this->load->view('welcome_message');
		
		
		//$cat_id = $this->uri->segment('4');
		//$subcat_id = $this->uri->segment('5');
		//$data['catname'] = $this->products_model->getcatname($cat_id);
		//$data['subcatname'] = $this->products_model->getsubcatname($subcat_id);
       //$data['subcatdata'] = $this->products_model->getsubcatdata($cat_id);
		$data['getcat'] = $this->products_model->getcatdata();
		$this->template->write_view('content', 'seller_admin/products/add', $data);
		$this->template->render();


	}
	
	public function getajaxsubcat()
	{
		
	$cat=$this->input->post('category_id');
	$result=$this->products_model->getsubcatdata($cat);
	echo '<option value="">Select Subcategory</option>';
	foreach($result as $alldata)
	{
	echo '<option value="'.$alldata->subcategory_id.'">'.$alldata->subcategory_name.'</option>';
	}
	exit;	
		
		
		
		
		
	}
	
	
	
	public function insert()
 {

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

                   $configer =  array(
              'image_library'   => 'gd2',
              'source_image'    =>  $uploadData['full_path'],
              'maintain_ratio'  =>  TRUE,
              'width'           =>  1600,
              'height'          =>  1061,
            );
            $this->image_lib->clear();
            $this->image_lib->initialize($configer);
            $this->image_lib->resize();

					$picture = $uploadData['file_name'];



				}else{



$this->prepare_flashmessage("Image format Invalid..", 1);



				//return redirect('admin/fooditems');

				echo "<script>window.location='".base_url()."seller_admin/products/create';</script>";



				}



			}else{



				$picture = '';



			}



		}
 	 
	 
/*if(isset($_POST)){
if(!empty($_FILES['picture']['name'])){
                $config['upload_path'] = 'uploads/products/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['picture']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('picture')){
                    $image_data = $this->upload->data();
					
                    //$picture =  $image_data['file_name'];
					$picture = $this->resize($image_data);
					@unlink( $image_data['full_path'] );
					//print_r($picture); exit;
					foreach($picture as $key => $value)
                 {
                      $picture1 = $value;
                      }
					 
					
                }else{
                    $picture1 = '';
                }
            }else{
                $picture1 = '';
            }
}	 */
	 
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

			$res=$this->products_model->insert($data);
			
			//print_r($res); exit;

			if($res)

			{
				
				$filename="report_".rand(1000,time());//time();
		$config['upload_path'] ='uploads/productsimages/';
		$config['allowed_types'] = '*';
		$config['file_name']= $filename;
		$config['overwrite']= FALSE;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$imageDetailArray = array();
		$images=array(); 
		for($i=0; $i<count($_FILES['report_file']['name']); $i++)
		{
		$_FILES['userfile']['name']= $_FILES['report_file']['name'][$i];
		$_FILES['userfile']['type']= $_FILES['report_file']['type'][$i];
		$_FILES['userfile']['tmp_name']= $_FILES['report_file']['tmp_name'][$i];
		$_FILES['userfile']['error']= $_FILES['report_file']['error'][$i];
		$_FILES['userfile']['size']= $_FILES['report_file']['size'][$i];
	     $this->upload->do_upload(); 
		$imageDetailArray=$this->upload->data();
		 $configer =  array(
              'image_library'   => 'gd2',
              'source_image'    =>  $imageDetailArray['full_path'],
              'maintain_ratio'  =>  TRUE,
              'width'           =>  1600,
              'height'          =>  1061,
            );
            $this->image_lib->clear();
            $this->image_lib->initialize($configer);
            $this->image_lib->resize();
		$images[]=$imageDetailArray['raw_name'].$imageDetailArray['file_ext']; // images names we need to inert into images table 
		}
				
			
	if(count($images)>0)
			{
			$img_result=$this->products_model->insertmultiimages($images,$res);
			}	
				

               $this->prepare_flashmessage("Successfully Inserted..", 0);

				//return redirect('admin/fooditems');

				echo "<script>window.location='".base_url()."seller_admin/products/create';</script>";

			}



			else



			{

				$this->prepare_flashmessage("Failed to Insert..", 1);



				//return redirect(base_url('admin/fooditems'));

echo "<script>window.location='".base_url()."seller_admin/products/".$this->uri->segment(4)."/".$this->uri->segment(5)."';</script>";

			}
	
	
	
	
}

public function resize($image_data) {
$img = substr($image_data['full_path'], 56);
$config['image_library'] = 'gd2';
$config['source_image'] = $image_data['full_path'];

$config['new_image'] = './uploads/products/new_' . $img;
$config['width'] = 1600;
$config['height'] = 1061;
$config['overwrite'] = TRUE;

//send config array to image_lib's  initialize function
$this->image_lib->initialize($config);
$src = $config['new_image'];
$picture['new_image'] = substr($src, 19);
//$picture['img_src'] = base_url() . $picture['new_image'];
// Call resize function in image library.

$this->image_lib->resize();
// Return new image contains above properties and also store in "upload" folder.
return $picture;
}	


public function edit()
{
	$id = $this->uri->segment(4);
	$cat_id = $this->uri->segment(5);
	//$subcat_id = $this->uri->segment(6);
	
	//$data['catname'] = $this->products_model->getcatname($cat_id);
		//$data['subcatname'] = $this->products_model->getsubcatname($subcat_id);
	
	 $data['subcatdata'] = $this->products_model->getsubcatdata($cat_id);
		$data['getcat'] = $this->products_model->getcatdata();
	$data['productdata']=$this->products_model->getproductdata($id);
	
	$this->template->write_view('content', 'seller_admin/products/edit', $data);
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

                    
                   $configer =  array(
              'image_library'   => 'gd2',
              'source_image'    =>  $uploadData['full_path'],
              'maintain_ratio'  =>  TRUE,
              'width'           =>  1600,
              'height'          =>  1061,
            );
            $this->image_lib->clear();
            $this->image_lib->initialize($configer);
            $this->image_lib->resize();

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
				return redirect('seller_admin/products');

				//echo "<script>window.location='".base_url()."seller_admin/products/index</script>";


			}

			else

			{

				$this->prepare_flashmessage("Failed to Insert..", 1);

				//return redirect(base_url('admin/fooditems'));
return redirect('seller_admin/products');


			}	
		
}


public function delete()

  {

	//echo $this->uri->segment(3); exit;

		$id=$this->uri->segment(4);
		$result=$this->products_model->delete($id);

		if($result==1){

			$this->prepare_flashmessage("Successfully Deleted..", 0);

			return redirect('seller_admin/products');

//echo "<script>window.location='".base_url()."seller_admin/products/".$this->uri->segment(5)."/".$this->uri->segment(6)."';</script>";

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
            $this->template->write_view('content', 'seller_admin/products/index',$data);

            $this->template->render();

    }
public function track_requests()
{
	

$data['approvalrequestdata'] = $this->products_model->getproductapproval();
$this->template->write_view('content', 'seller_admin/products/approval_request', $data);
		$this->template->render();



}

public function returns()

{

  $data['returncatitemdata'] = $this->products_model->returns();
		
		$this->template->write_view('content', 'seller_admin/products/returns', $data);
		$this->template->render();




}	

}