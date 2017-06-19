<?php

defined('BASEPATH') OR exit('No direct script access allowed');

@include_once( APPPATH . 'controllers/admin/Admin_Controller.php');



class Shipping extends Admin_Controller {



    public function __construct() {

        parent::__construct();

         $this->load->library('email');
          $this->load->library('encrypt');
        $this->load->model('admin/shipping_model');

   }



public function index()

    {
       
        //$this->load->view('welcome_message');
        
        $this->load->library('pagination');

          $config = [
           'base_url'   => base_url('admin/shipping/index'),
           'per_page'   => 5,
           'total_rows'  => $this->shipping_model->count_by(array()),
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

        $result=$this->shipping_model->limit($config['per_page'], $this->uri->segment(4) )->get_all();
        $data['shippingdata'] =  $result;
        $this->template->write_view('content', 'admin/shipping/index', $data);
        $this->template->render();

}


public function create()

    {
        $this->template->write_view('content', 'admin/shipping/add');
        $this->template->render();

    }

public function insert()

  {   

   
    if( $this->form_validation->run('shipping_rules'))
    {

      $data = array(
        'product_weight' => $this->input->post('product_weight'),
		'shipping_charges' => $this->input->post('shipping_charges'),
       
        );
    //print_r($data); exit;
    $res=$this->shipping_model->insert($data);

        if($res)

            {       
                    $this->prepare_flashmessage(" Successfully Inserted..", 0);
                   return redirect('admin/shipping');

                
            } else

            {

                //redirect(site_url('add_blogs_view'));

                $this->prepare_flashmessage("Failed to Insert..", 1);

                return redirect('admin/shipping');

            }
   }
    else
    {
      $this->template->write_view('content', 'admin/shipping/add');
           $this->template->render();
    }    

    }



public function delete()

    {

    //echo $this->uri->segment(3); exit;

        $id=$this->uri->segment(4);

        $result=$this->shipping_model->delete($id);

        if($result==1){

            $this->prepare_flashmessage("Successfully Deleted..", 0);

            return redirect('admin/shipping');

        }

    }



public function edit()

    {

        $id = $this->uri->segment(4); //controller/function/id

        $result=$this->shipping_model->get($id);

        //print_r($result);
        //exit;

        $data['shippingdata'] = null;

        if($result)

        {
            $data['shippingdata'] = $result;

        }

        $this->template->write_view('content', 'admin/shipping/edit',$data);
        $this->template->render();

    }

public function update()

    {


        $id = $this->uri->segment(4);
        
    if( $this->form_validation->run('shipping_rules'))
    { 
        
        $data = array(
        'product_weight' => $this->input->post('product_weight'),
		'shipping_charges' => $this->input->post('shipping_charges'),
        
        );
          $res=$this->shipping_model->update($id,$data);

            if($res)

            {
                $this->prepare_flashmessage("Successfully Updated..", 0);
                return redirect('admin/shipping');

            }

            else
            {

               $this->prepare_flashmessage("Failed to Update..", 1);
                return redirect(base_url('admin/shipping'));

            }
  }else{
  
       $result=$this->shipping_model->get($id);

        //print_r($result);
        //exit;

        $data['shippingdata'] = null;

        if($result)

        {
            $data['shippingdata'] = $result;

        }

        $this->template->write_view('content', 'admin/shipping/edit',$data);
        $this->template->render();
  }

 }


public function search()
    
  {

             $match = $this->input->post('search');
             
               // echo $match; exit;
              $this->load->library('pagination');

             
            $result=$this->shipping_model->search($match);
            $data['shippingdata'] =  $result;
            $this->template->write_view('content', 'admin/shipping/index',$data);

            $this->template->render();

    }


}







