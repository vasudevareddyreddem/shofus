<?php

defined('BASEPATH') OR exit('No direct script access allowed');

@include_once( APPPATH . 'controllers/admin/Admin_Controller.php');



class Closingfee extends Admin_Controller {



    public function __construct() {

        parent::__construct();

         $this->load->library('email');
          $this->load->library('encrypt');
        $this->load->model('admin/closingfee_model');

   }



public function index()

    {
       
        //$this->load->view('welcome_message');
        
        $this->load->library('pagination');

          $config = [
           'base_url'   => base_url('admin/closingfee/index'),
           'per_page'   => 5,
           'total_rows'  => $this->closingfee_model->count_by(array()),
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

        $result=$this->closingfee_model->limit($config['per_page'], $this->uri->segment(4) )->get_all();
        $data['closingdata'] =  $result;
        $this->template->write_view('content', 'admin/closingfee/index', $data);
        $this->template->render();

}


public function create()

    {
        $this->template->write_view('content', 'admin/closingfee/add');
        $this->template->render();

    }

public function insert()

  {   

   
    if( $this->form_validation->run('closingfee_rules'))
    {

      $data = array(
        'product_price' => $this->input->post('product_price'),
		'closing_fee' => $this->input->post('closing_fee'),
       
        );
    //print_r($data); exit;
    $res=$this->closingfee_model->insert($data);

        if($res)

            {       
                    $this->prepare_flashmessage(" Successfully Inserted..", 0);
                   return redirect('admin/closingfee');

                
            } else

            {

                //redirect(site_url('add_blogs_view'));

                $this->prepare_flashmessage("Failed to Insert..", 1);

                return redirect('admin/closingfee');

            }
   }
    else
    {
      $this->template->write_view('content', 'admin/closingfee/add');
           $this->template->render();
    }    

    }



public function delete()

    {

    //echo $this->uri->segment(3); exit;

        $id=$this->uri->segment(4);

        $result=$this->closingfee_model->delete($id);

        if($result==1){

            $this->prepare_flashmessage("Successfully Deleted..", 0);

            return redirect('admin/closingfee');

        }

    }



public function edit()

    {

        $id = $this->uri->segment(4); //controller/function/id

        $result=$this->closingfee_model->get($id);

        //print_r($result);
        //exit;

        $data['closingdata'] = null;

        if($result)

        {
            $data['closingdata'] = $result;

        }

        $this->template->write_view('content', 'admin/closingfee/edit',$data);
        $this->template->render();

    }

public function update()

    {


        $id = $this->uri->segment(4);
        
    if( $this->form_validation->run('closingfee_rules'))
    {
        
      $data = array(
        'product_price' => $this->input->post('product_price'),
		'closing_fee' => $this->input->post('closing_fee'),
        
        );
          $res=$this->closingfee_model->update($id,$data);

            if($res)

            {
                $this->prepare_flashmessage("Successfully Updated..", 0);
                return redirect('admin/closingfee');

            }

            else
            {

               $this->prepare_flashmessage("Failed to Update..", 1);
                return redirect(base_url('admin/closingfee'));

            }
  }else{
  
      $result=$this->closingfee_model->get($id);

        //print_r($result);
        //exit;

        $data['closingdata'] = null;

        if($result)

        {
            $data['closingdata'] = $result;

        }

        $this->template->write_view('content', 'admin/closingfee/edit',$data);
        $this->template->render();
  
  }

 }


public function search()
    
  {

             $match = $this->input->post('search');
                           
              $this->load->library('pagination');
             
            $result=$this->closingfee_model->search($match);
            $data['closingdata'] =  $result;
            $this->template->write_view('content', 'admin/closingfee/index',$data);

            $this->template->render();

    }


}







