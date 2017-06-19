<?php



defined('BASEPATH') OR exit('No direct script access allowed');



@include_once( APPPATH . 'controllers/admin/Admin_Controller.php');







class Locations extends Admin_Controller {







	public function __construct() {



		parent::__construct();





		$this->load->model('admin/locations_model');

	



	}







	public function index()



	{



         $this->load->library('pagination');



		  $config = [

		   'base_url'   => base_url('admin/locations/index'),

		   'per_page'   => 10,

		   'total_rows'  => $this->locations_model->count_by(array()),

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

		//$this->load->view('welcome_message');



		$result=$this->locations_model->limit($config['per_page'], $this->uri->segment(4) )->get_all();



		$data['locationdata'] =  $result;



		$this->template->write_view('content', 'admin/locations/index',$data);



		$this->template->render();











	}



	public function create()



	{



		//$this->load->view('admin/locations/add');





		$this->template->write_view('content', 'admin/locations/add');



		$this->template->render();





	}



	public function insert()



	{





		$data=array(



			'location_name' => $this->input->post('location_name'),



			'status' => $this->input->post('status')



			);



		//print_r($data);

		//exit;

  

		

			$res=$this->locations_model->insert($data);



			if($res)



			{	



				$this->prepare_flashmessage("Successfully Inserted..", 0);



		

				echo "<script>window.location='".base_url()."admin/locations';</script>";

			}



			else



			{



				$this->prepare_flashmessage("Failed to Insert..", 1);



				//return redirect(base_url('admin/fooditems'));

          echo "<script>window.location='".base_url()."admin/locations';</script>";

			}







		

	}



	public function delete()



	{



	



		$id=$this->uri->segment(4);



		$result=$this->locations_model->delete($id);



		if($result==1){



	     $this->prepare_flashmessage("Successfully Deleted..", 0);



         echo "<script>window.location='".base_url()."admin/locations';</script>";

		}



	}



	



	public function edit()



	{



	$id = $this->uri->segment(4); //controller/function/id



	$result=$this->locations_model->get($id);



	$data['locationdata'] = $result;



		//print_r($result);exit;



	if($data)



	{



		$this->template->write_view('content', 'admin/locations/edit',$data);



		$this->template->render();



	}



}



public function update()



{



	$id = $this->uri->segment(4);

$data=array(



'location_name' => $this->input->post('location_name'),

'status' => $this->input->post('status')



);



	//$id=$this->input->post('hidden');

	



	$res=$this->locations_model->update($id,$data);







	if($res)



	{



					//



		$this->prepare_flashmessage("Successfully Updated..", 0);



		//return redirect('admin/fooditems');

		echo "<script>window.location='".base_url()."admin/locations';</script>";







	}



	else



	{



		$this->prepare_flashmessage("Failed to Update..", 1);



		//return redirect(base_url('admin/fooditems'));

		echo "<script>window.location='".base_url()."admin/locations';</script>";



	}







}



public function search()

{

   $match = $this->input->post('search');
 //  echo $match; exit;

      $this->load->library('pagination');
      $result=$this->locations_model->search($match);
      $data['locationdata'] =  $result;
      $this->template->write_view('content', 'admin/locations/index',$data);
       $this->template->render();



}

}





















































