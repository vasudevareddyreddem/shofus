<?php

defined('BASEPATH') OR exit('No direct script access allowed');

@include_once( APPPATH . 'controllers/admin/Admin_Controller.php');



class Servicefee extends Admin_Controller {



    public function __construct() {

        parent::__construct();

         $this->load->library('email');
          $this->load->library('encrypt');
        $this->load->model('admin/servicefee_model');

   }



public function index()

    {
       
        //$this->load->view('welcome_message');
        
        $this->load->library('pagination');

          $config = [
           'base_url'   => base_url('admin/servicefee/index'),
           'per_page'   => 5,
           'total_rows'  => $this->servicefee_model->count_by(array()),
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

        $result=$this->servicefee_model->limit($config['per_page'], $this->uri->segment(4) )->get_all();
        $data['servicedata'] =  $result;
        $this->template->write_view('content', 'admin/servicefee/index', $data);
        $this->template->render();

}


public function create()

    {
        $this->template->write_view('content', 'admin/servicefee/add');
        $this->template->render();

    }

public function insert()

  {   

   
    if( $this->form_validation->run('servicefee_rules'))
    {

      $data = array(
        
		'service_fee' => $this->input->post('service_fee'),
       
        );
    //print_r($data); exit;
    $res=$this->servicefee_model->insert($data);

        if($res)

            {       
                    $this->prepare_flashmessage(" Successfully Inserted..", 0);
                   return redirect('admin/servicefee');

                
            } else

            {

                //redirect(site_url('add_blogs_view'));

                $this->prepare_flashmessage("Failed to Insert..", 1);

                return redirect('admin/servicefee');

            }
   }
    else
    {
      $this->template->write_view('content', 'admin/servicefee/add');
           $this->template->render();
    }    

    }



public function delete()

    {

    //echo $this->uri->segment(3); exit;

        $id=$this->uri->segment(4);

        $result=$this->servicefee_model->delete($id);

        if($result==1){

            $this->prepare_flashmessage("Successfully Deleted..", 0);

            return redirect('admin/servicefee');

        }

    }



public function edit()

    {

        $id = $this->uri->segment(4); //controller/function/id

        $result=$this->servicefee_model->get($id);

        //print_r($result);
        //exit;

        $data['servicedata'] = null;

        if($result)

        {
            $data['servicedata'] = $result;

        }

        $this->template->write_view('content', 'admin/servicefee/edit',$data);
        $this->template->render();

    }

public function update()

    {


        $id = $this->uri->segment(4);
        
    if( $this->form_validation->run('servicefee_rules'))
    {
        
      $data = array(
        
		'service_fee' => $this->input->post('service_fee'),
        
        );
          $res=$this->servicefee_model->update($id,$data);

            if($res)

            {
                $this->prepare_flashmessage("Successfully Updated..", 0);
                return redirect('admin/servicefee');

            }

            else
            {

               $this->prepare_flashmessage("Failed to Update..", 1);
                return redirect(base_url('admin/servicefee'));

            }

   }else{
   
      $result=$this->servicefee_model->get($id);

        //print_r($result);
        //exit;

        $data['servicedata'] = null;

        if($result)

        {
            $data['servicedata'] = $result;

        }

        $this->template->write_view('content', 'admin/servicefee/edit',$data);
        $this->template->render();
   
   }
 }


public function search()
    
  {

             $match = $this->input->post('search');
             
               
              $this->load->library('pagination');

              
            $result=$this->servicefee_model->search($match);
            $data['servicedata'] =  $result;
            $this->template->write_view('content', 'admin/servicefee/index',$data);

            $this->template->render();

    }


}







