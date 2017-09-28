<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/seller/Admin_Controller.php');


class Subcategory extends Admin_Controller {

	
	public function __construct() {
		parent::__construct();
		
		$this->load->model('seller/dashboard_model');
		$this->load->model('seller/subcategory_model');
		$this->load->library('pagination');
	}

	public function index()
	{
		//$this->load->view('welcome_message');
		 $config = [
	   'base_url'   => base_url('seller/subcategory/index'),
	   'per_page'   => 20,
	   'total_rows'  => $this->subcategory_model->count_by(array()),
	   'full_tag_open'  => "<ul class='pagination'>",
	   'full_tag_close' => "</ul>",
	   'first_tag_open' => '<li>',
	   'first_tag_close' => '</li>',
	   'last_tag_open'  => '<li>',
	   'last_tag_close' => '</li>',
	   'next_tag_open'  => '<li>',
	   'next_tag_close' => '</li>',
	   'prev_tag_open'  => '<li>',
	   'prev_tag_close' => '</li>',
	   'num_tag_open'  => '<li>',
	   'num_tag_close'  => '</li>',
	   'cur_tag_open'  => "<li class='active'><a>",
	   'cur_tag_close'  => '</a></li>',
	  ];

       $this->pagination->initialize($config);
		
		
       $data['subcatdata'] = $this->subcategory_model->limit($config['per_page'], $this->uri->segment(4) )->getsubcat();
		
		$this->template->write_view('content', 'seller/subcategory/index', $data);
		$this->template->render();


	}
	
	public function create()
	{
		//$this->load->view('welcome_message');
		
		
		
       //$data['itemdata'] = $this->category_model->getitems();
		
		$this->template->write_view('content', 'seller/subcategory/add');
		$this->template->render();


	}
	
	public function insert()

 {



    $data=array(
	
	"category_id" => $this->input->post('category_id'),
	"subcategory_id" => $this->input->post('subcategory_id'),
	"seller_id" => $this->session->userdata('seller_id'),
				

   );	     
           $res=$this->subcategory_model->insert($data);
	      	   if($res)
				{
				 $this->prepare_flashmessage("Successfully Inserted..", 0);
	        // return redirect('admin/accomodation');
	         echo "<script>window.location='".base_url()."seller/subcategory';</script>";
				}
				else
				{
				$this->prepare_flashmessage("Failed to Insert..", 1);
	         // return redirect(base_url('admin/accomodation'));
				echo "<script>window.location='".base_url()."seller/subcategory';</script>";
				}	 

}

public function edit()
{
	$id = $this->uri->segment(4);
	
	
	 //$data['subcatdata'] = $this->products_model->getsubcatdata($cat_id);
		//$data['getcat'] = $this->products_model->getcatdata();getcatdata
	$data['catdata']=$this->dashboard_model->getcatdata();
	$data['categorydata']=$this->subcategory_model->getsubcategorydata($id);
	$result = $data['categorydata']->category_id; 
	
	$data['catsubcategorydata']=$this->subcategory_model->getcatsubcategorydata($result);
	$this->template->write_view('content', 'seller/subcategory/edit', $data);
		$this->template->render();
	
}

public function update()
{
	
	$id = $this->uri->segment(4);
	
	$data=array(
	
	"category_id" => $this->input->post('category_id'),
	"subcategory_id" => $this->input->post('subcategory_id'),
	"seller_id" => $this->session->userdata('seller_id'),
				

   );
	
	$res=$this->subcategory_model->update($id,$data);

				

	      	   if($res)

				{

				 $this->prepare_flashmessage("Successfully Updated..", 0);

	        // return redirect('admin/accomodation');

	         echo "<script>window.location='".base_url()."seller/subcategory';</script>";



				}

				else

				{

				$this->prepare_flashmessage("Failed to Update..", 1);

	         // return redirect(base_url('admin/accomodation'));

				echo "<script>window.location='".base_url()."seller/subcategory';</script>";

				}
	
}
	
public function delete()

	{

	//echo $this->uri->segment(3); exit;
		$id=$this->uri->segment(4);
		$result=$this->subcategory_model->delete($id);
		if($result==1){

          $this->prepare_flashmessage("Successfully Deleted..", 0);
			//return redirect('admin/fooditems');
           echo "<script>window.location='".base_url()."seller/subcategory';</script>";
		}

	}


function getajaxsubcat(){
	$cat=$this->input->post('category_id');
	$result=$this->subcategory_model->getsubcategoryDataforcat($cat);
	echo '<option value="">Select Subcategory</option>';
	foreach($result as $alldata)
	{
	echo '<option value="'.$alldata->subcategory_id.'">'.$alldata->subcategory_name.'</option>';
	}
	exit;
	}	

public function search()
    
  {

             $match = $this->input->post('search');
             
                $result1 = $this->subcategory_model->search($match);
                $result2 = count($result1);
                //echo $result2;exit;
              $this->load->library('pagination');
            //$this->load->view('welcome_message');
            $result=$this->subcategory_model->order_by('created_at',$order = 'DESC')->search($match);
            $data['subcatdata'] =  $result;
            $this->template->write_view('content', 'seller/subcategory/index',$data);

            $this->template->render();

    }
	public function check_category_exits(){
		
		$post=$this->input->post();
		
		$categorydata = $this->subcategory_model->get_already_exits_categories($post['cartegoryname']);
				if(count($categorydata)>0){
				$data=1;	
				echo json_encode($data);
				}else{
					$data=2;	
					echo json_encode($data);
				}
		
	}

}