<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/seller/Admin_Controller.php');


class Products extends Admin_Controller {

	
	public function __construct() {
		parent::__construct();
		
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
		//$this->load->view('welcome_message');
		
		
		//$cat_id = $this->uri->segment('4');
		//$subcat_id = $this->uri->segment('5');
		//$data['catname'] = $this->products_model->getcatname($cat_id);
		//$data['subcatname'] = $this->products_model->getsubcatname($subcat_id);
       //$data['subcatdata'] = $this->products_model->getsubcatdata($cat_id);
	   $sid = $this->session->userdata('seller_id'); 
		$data['sub_cat_data'] = $this->products_model->getcatdata($sid);
		//echo $this->db->last-query();exit;
		//echo '<pre>';print_r($data);exit;
		$this->template->write_view('content', 'seller/products/add', $data);
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
			$this->prepare_flashmessage("Image format Invalid..", 1);
				//return redirect('admin/fooditems');
				echo "<script>window.location='".base_url()."seller/products/create';</script>";
				}
			}else{
				$picture = '';
			}
		}
		$data=array(

            'category_id' => $this->input->post('category_id'),			
			'subcategory_id' => $this->input->post('subcategory_id'),
			'subitem_id' => $this->input->post('subitem_id'),
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

			if($res)

			{

               $this->prepare_flashmessage("Successfully Inserted..", 0);

				//return redirect('admin/fooditems');

				echo "<script>window.location='".base_url()."seller/products/create';</script>";

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

}