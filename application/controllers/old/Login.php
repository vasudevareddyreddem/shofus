<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once('./application/libraries/REST_Controller.php');

class Login extends REST_Controller 
{

  public function __construct()
    {
        
        parent::__construct();
        $this->load->model('admin/login_model');
        $this->load->model('admin/deliveryboy_model');
      
    }

   public function login_post()
    {    

        //$username = NULL;

     
        	 $username = $this->post('admin_name');
        	 $password = md5($this->post('admin_password'));
        	
        $res = $this->login_model->get_data($username,$password);
       // print_r($res);exit;
        if($res)
                {
                $this->response(
                        array(
                            "Message"=>"Login Success",
                            "Status_code"=>"201",
                            )
                        );
                    //redirect('/login', 'refresh');
             }
             else
            {
             $this->response(
                            array(
                                "Message"=>"Invalid Username Password",
                                "Status_code"=>"401",
                                )
                            );
                        //redirect('/login/resetpassword', 'refresh');
            }

  }    


  public function deliveryboy_login_post()
    {    

        //$username = NULL;

     
           $username = $this->post('deliveryboy_name');
           $password = md5($this->post('deliveryboy_password'));
          
        $res = $this->deliveryboy_model->get_data($username,$password);
       // print_r($res);exit;
        if($res)
                {
                  
                $this->response(
                        array(
                            "Message"=>"Login Success",
                            "Status_code"=>"201",
                            )
                        );
                    //redirect('/login', 'refresh');
             }
             else
            {
             $this->response(
                            array(
                                "Message"=>"Invalid Username Password",
                                "Status_code"=>"401",
                                )
                            );
                        //redirect('/login/resetpassword', 'refresh');
            }

  }    
}