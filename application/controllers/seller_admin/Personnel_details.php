<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/seller_admin/Admin_Controller.php');


class Personnel_details extends Admin_Controller {

	
	public function __construct() {
		parent::__construct();
		
		//$this->load->model('seller_admin/products_model');
		$this->load->model('seller_admin/Personnel_details_model');
       // $this->load->library('pagination');
		
	}

	public function index()
	{
		
	   
	   $data['sellerlocationdata'] = $this->Personnel_details_model->getlocations();
	   $data['partsellerlocationdata'] = $this->Personnel_details_model->getsellerlocation();
		
		$this->template->write_view('content', 'seller_admin/personneldetails/index', $data);
		$this->template->render();


	}
	
public function updatedisplaydetails()
{
    $data = array(
	
	
	'seller_business_name' => $this->input->post('seller_business_name'),
	'seller_business_displayname' => $this->input->post('seller_business_displayname'),
	'seller_location' => $this->input->post('seller_location'),
	'seller_servicetime' => $this->input->post('seller_servicetime')
	
	);


$res=$this->Personnel_details_model->updatedd($data);


if($res)



			{

                 $this->prepare_flashmessage("Display Details are Updated Successfully..", 0);
				return redirect('seller_admin/Personnel_details');

				//echo "<script>window.location='".base_url()."seller_admin/products/index</script>";


			}

			else

			{

				$this->prepare_flashmessage("Failed to Insert..", 1);

				//return redirect(base_url('admin/fooditems'));
return redirect('seller_admin/Personnel_details');


			}	


}	


public function updatepersonneldetails()
{
	
	
	 $data = array(
	
	
	'seller_name' => $this->input->post('seller_name'),
	'seller_mobile' => $this->input->post('seller_mobile'),
	'seller_email' => $this->input->post('seller_email'),
	'seller_adhar' => $this->input->post('seller_adhar')
	
	);


$res=$this->Personnel_details_model->updatepd($data);


if($res)



			{

                 $this->prepare_flashmessage("Personnel Details are Updated Successfully..", 0);
				return redirect('seller_admin/Personnel_details');

				//echo "<script>window.location='".base_url()."seller_admin/products/index</script>";


			}

			else

			{

				$this->prepare_flashmessage("Failed to Insert..", 1);

				//return redirect(base_url('admin/fooditems'));
return redirect('seller_admin/Personnel_details');


			}	
	
	
	
	
	
	
}


public function updatebusinessdetails()
{
	
	
	 $data = array(
	
	
	'seller_business_name' => $this->input->post('seller_business_name'),
	'seller_type_category' => $this->input->post('seller_type_category'),
	'seller_license' => $this->input->post('seller_license'),
	'seller_tan' => $this->input->post('seller_tan'),
	'seller_gstin' => $this->input->post('seller_gstin')
	);


$res=$this->Personnel_details_model->updatebd($data);


if($res)



			{

                 $this->prepare_flashmessage("Business Details are Updated Successfully..", 0);
				return redirect('seller_admin/Personnel_details');

				//echo "<script>window.location='".base_url()."seller_admin/products/index</script>";


			}

			else

			{

				$this->prepare_flashmessage("Failed to Insert..", 1);

				//return redirect(base_url('admin/fooditems'));
return redirect('seller_admin/Personnel_details');


			}	
	
	
	
	
	
	
}


public function updatebankdetails()
{
	
	$data=$this->input->post();
    unset($data['submit']);
	// echo "<pre>";
	//print_r($_FILES); exit;


		$filename="report_".rand(1000,time());//time();
		$config['upload_path'] ='uploads/reports/';
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
		$images[]=$imageDetailArray['raw_name'].$imageDetailArray['file_ext']; // images names we need to inert into images table 
		}
	
	$data = array(
	
	
	'seller_bank' => $this->input->post('seller_bank'),
	'seller_pan' => $this->input->post('seller_pan')
	
	);
	
	
$res=$this->Personnel_details_model->updatebankd($data);	
	if($res &&  count($images)>0)
			{
			$img_result=$this->Personnel_details_model->insertFiles($images);
			}
			
			
if($res)



			{

                 $this->prepare_flashmessage("Bank Details are Updated Successfully..", 0);
				return redirect('seller_admin/Personnel_details');

				//echo "<script>window.location='".base_url()."seller_admin/products/index</script>";


			}

			else

			{

				$this->prepare_flashmessage("Failed to Insert..", 1);

				//return redirect(base_url('admin/fooditems'));
return redirect('seller_admin/Personnel_details');


			}				
			
			
			
			
			
	
}



	
}	
	
	
	?>