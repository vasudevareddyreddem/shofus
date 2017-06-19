<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once('./application/libraries/REST_Controller.php');

class Apis extends REST_Controller 
{

  public function __construct()
    {
        
        parent::__construct();
        $this->load->model('seller/login_model');
        $this->load->model('seller/Personnel_details_model');
        
      
    }


    public function login_post()
    {

      $username   = $this->input->post('seller_name');
      $password = md5($this->input->post('seller_password'));
      $result   = $this->login_model->get_data($username, $password);

      if($result)
                {
                $this->response(
                  array(
                    
                        "Message"=>"Login Success",
                        "Status_code"=>"201",
                      )
                      );
                    
             }
             else
            {
             $this->response(
                array(
                      "Message"=>"Invalid Username Password",
                      "Status_code"=>"401",
                      )
              );
                  
            }
    }



    public function mystore_get()
    {
      $id   = $this->input->post('id');
      $my= $this->Personnel_details_model->getsellerlocationid();

    $this->response($my);

    }
    

    

}