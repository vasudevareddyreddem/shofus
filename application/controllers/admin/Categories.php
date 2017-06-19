<?php

defined('BASEPATH') OR exit('No direct script access allowed');

@include_once( APPPATH . 'controllers/admin/Admin_Controller.php');



class categories extends Admin_Controller {



    public function __construct() {

        parent::__construct();

         $this->load->library('email');
          $this->load->library('encrypt');
        $this->load->model('admin/categories_model');

   }



public function index()

    {
       
        //$this->load->view('welcome_message');
        
        $this->load->library('pagination');

          $config = [
           'base_url'   => base_url('admin/categories/index'),
           'per_page'   => 5,
           'total_rows'  => $this->categories_model->count_by(array()),
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

        $result=$this->categories_model->limit($config['per_page'], $this->uri->segment(4) )->get_all();
        $data['categoriesdata'] =  $result;
        $this->template->write_view('content', 'admin/categories/index', $data);
        $this->template->render();

}


public function create()

    {
        $this->template->write_view('content', 'admin/categories/add');
        $this->template->render();

    }

public function insert()

  {   

   
    if( $this->form_validation->run('category_rules'))
    {

      $data = array(
        'category_name' => $this->input->post('category_name'),
       
        );
    //print_r($data); exit;
    $res=$this->categories_model->insert($data);

        if($res)

            {       
                    $this->prepare_flashmessage(" Successfully Inserted..", 0);
                   return redirect('admin/categories');

                
            } else

            {

                //redirect(site_url('add_blogs_view'));

                $this->prepare_flashmessage("Failed to Insert..", 1);

                return redirect('admin/categories');

            }
   }
    else
    {
      $this->template->write_view('content', 'admin/categories/add');
           $this->template->render();
    }    

    }



public function delete()

    {

    //echo $this->uri->segment(3); exit;

        $id=$this->uri->segment(4);

        $result=$this->categories_model->delete($id);

        if($result==1){

            $this->prepare_flashmessage("Successfully Deleted..", 0);

            return redirect('admin/categories');

        }

    }



public function edit()

    {

        $id = $this->uri->segment(4); //controller/function/id

        $result=$this->categories_model->get($id);

        //print_r($result);
        //exit;

        $data['categoriesdata'] = null;

        if($result)

        {
            $data['categoriesdata'] = $result;

        }

        $this->template->write_view('content', 'admin/categories/edit',$data);
        $this->template->render();

    }

public function update()

    {


        $id = $this->uri->segment(4);
        
      $data = array(
        'category_name' => $this->input->post('category_name'),
        
        );
          $res=$this->categories_model->update($id,$data);

            if($res)

            {
                $this->prepare_flashmessage("Successfully Updated..", 0);
                return redirect('admin/categories');

            }

            else
            {

               $this->prepare_flashmessage("Failed to Update..", 1);
                return redirect(base_url('admin/categories'));

            }


 }


public function search()
    
  {

             $match = $this->input->post('search');
             
                $result1 = $this->categories_model->search($match);
                $result2 = count($result1);
                //echo $result2;exit;
              $this->load->library('pagination');

              $config = [
               'base_url'       =>  base_url('admin/categories/search'),
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
            $result=$this->categories_model->limit($config['per_page'], $this->uri->segment(4) )->search($match);
            $data['categoriesdata'] =  $result;
            $this->template->write_view('content', 'admin/categories/index',$data);

            $this->template->render();

    }


}







