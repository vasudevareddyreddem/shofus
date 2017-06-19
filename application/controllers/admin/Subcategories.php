<?php

defined('BASEPATH') OR exit('No direct script access allowed');

@include_once( APPPATH . 'controllers/admin/Admin_Controller.php');



class Subcategories extends Admin_Controller {



    public function __construct() {

        parent::__construct();

         $this->load->library('email');
          $this->load->library('encrypt');
        $this->load->model('admin/subcategories_model');
		$this->load->model('admin/categories_model');

   }



public function index()

    {
       
        //$this->load->view('welcome_message');
        
        $this->load->library('pagination');

          $config = [
           'base_url'   => base_url('admin/subcategories/index'),
           'per_page'   => 5,
           'total_rows'  => $this->subcategories_model->count_by(array()),
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

        $result=$this->subcategories_model->limit($config['per_page'], $this->uri->segment(4) )->order_by('subcategories.created_at',$order = 'DESC')->get_subcat();
		
		
		
        $data['subcategoriesdata'] = $result ;
        $this->template->write_view('content', 'admin/subcategories/index', $data);
        $this->template->render();

}


public function create()

    {
		$data['categoriesdata'] = $this->categories_model->get_all();
        $this->template->write_view('content', 'admin/subcategories/add',$data);
        $this->template->render();

    }

public function insert()

  {   

   
    if( $this->form_validation->run('subcategory_rules'))
    {

      $data = array(
	  'category_id' => $this->input->post('category_id'),
        'subcategory_name' => $this->input->post('subcategory_name'),
       
        );
    //print_r($data); exit;
    $res=$this->subcategories_model->insert($data);

        if($res)

            {       
                    $this->prepare_flashmessage(" Successfully Inserted..", 0);
                   return redirect('admin/subcategories');

                
            } else

            {

                //redirect(site_url('add_blogs_view'));

                $this->prepare_flashmessage("Failed to Insert..", 1);

                return redirect('admin/subcategories');

            }
   }
    else
    {
		$data['categoriesdata'] = $this->categories_model->get_all();
      $this->template->write_view('content', 'admin/subcategories/add',$data);
           $this->template->render();
    }    

    }



public function delete()

    {

    //echo $this->uri->segment(3); exit;

        $id=$this->uri->segment(4);

        $result=$this->subcategories_model->delete($id);

        if($result==1){

            $this->prepare_flashmessage("Successfully Deleted..", 0);

            return redirect('admin/subcategories');

        }

    }



public function edit()

    {

        $id = $this->uri->segment(4); //controller/function/id

        $result=$this->subcategories_model->get_subcatsingle($id);

        //print_r($result);
        //exit;
       $data['categoriesdata'] = $this->categories_model->get_all();
        $data['subcategoriesdata'] = null;

        if($result)

        {
            $data['subcategoriesdata'] = $result;

        }

        $this->template->write_view('content', 'admin/subcategories/edit',$data);
        $this->template->render();

    }

public function update()

    {


        $id = $this->uri->segment(4);
        
      $data = array(
	    'category_id' => $this->input->post('category_id'),
        'subcategory_name' => $this->input->post('subcategory_name'),
        
        );
          $res=$this->subcategories_model->update($id,$data);

            if($res)

            {
                $this->prepare_flashmessage("Successfully Updated..", 0);
                return redirect('admin/subcategories');

            }

            else
            {

               $this->prepare_flashmessage("Failed to Update..", 1);
                return redirect(base_url('admin/subcategories'));

            }


 }


public function search()
    
  {

             $match = $this->input->post('search');
             
                $result1 = $this->subcategories_model->search($match);
                $result2 = count($result1);
                //echo $result2;exit;
              $this->load->library('pagination');

              $config = [
               'base_url'       =>  base_url('admin/subcategories/search'),
               'per_page'       =>  5,
               'total_rows'     =>  $result2,
               'full_tag_open'  =>  "<ul class='pagination'>",
               'full_tag_close' =>  "</ul>",
               'first_tag_open' =>  '<li>',
               'first_tag_close'=>  '</li>',
               'last_tag_open'  =>  '<li>',
               'last_tag_close' =>  '</li>',
               'next_tag_open'  =>  '<li>',
               'next_tag_close' =>  '</li>',
               'prev_tag_open'  =>  '<li>',
               'prev_tag_close' =>  '</li>',
               'num_tag_open'   =>  '<li>',
               'num_tag_close'  =>  '</li>',
               'cur_tag_open'   =>  "<li class='active'><a>",
               'cur_tag_close'  =>  '</a></li>',
              ];

             $this->pagination->initialize($config);
            //$this->load->view('welcome_message');
            $result=$this->subcategories_model->limit($config['per_page'], $this->uri->segment(4) )->search($match);
            $data['subcategoriesdata'] =  $result;
            $this->template->write_view('content', 'admin/subcategories/index',$data);

            $this->template->render();

    }


}







