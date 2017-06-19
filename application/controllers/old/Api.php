<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once('./application/libraries/REST_Controller.php');

class Api extends REST_Controller 
{

  public function __construct()
    {
        
        parent::__construct();
        $this->load->model('admin/login_model');
        $this->load->model('admin/deliveryboy_model');
         $this->load->model('admin/deliveries_model');
      
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

    //*** Start api for delivery boy ***//

  public function deliveryboy_get()
    {    
       $this->response($this->deliveryboy_model->get_all());
    }


   public function deliveryboy_insert_post()
    {    
        $data = array(
            
        'deliveryboy_name' => $this->post('deliveryboy_name'),
  	  	'deliveryboy_email' => $this->post('deliveryboy_email'),
  	  	'deliveryboy_password' => md5($this->post('deliveryboy_password')),
  	  	'deliveryboy_mobile' => $this->post('deliveryboy_mobile'),
         );
          // print_r($data);exit;
        $res=$this->deliveryboy_model->insert($data);

        if($res)
                {
                    
                $this->response(
                        array(
                            "Message"=>"Succesfully inserted",
                            "Status_code"=>"201",
                            )
                        );
            
         }
           else
            {
             $this->response(
                            array(
                                "Message"=>"Failed to insert",
                                "Status_code"=>"401",
                                )
                            );
            }     
    }

 public function deliveryboy_edit_post()
{

    $id = $this->post('deliveryboy_id');

       $data = array(
         'deliveryboy_name' => $this->post('deliveryboy_name'),
  	  	'deliveryboy_email' => $this->post('deliveryboy_email'),
  	  	'deliveryboy_password' => md5($this->post('deliveryboy_password')),
  	  	'deliveryboy_mobile' => $this->post('deliveryboy_mobile')
         );

       $res=$this->deliveryboy_model->update($id,$data);
            
        if($res)
            {
            
              $this->response(
                        array(
                            "Message"=>"Succesfully Updated",
                            "Status_code"=>"201",
                            )
                        );
       
           }
             else
            {
             $this->response(
                            array(
                                "Message"=>"Failed to update",
                                "Status_code"=>"401",
                                )
                            );
              } 
   }

//*** End api for delivery boy ***// 

public function deliveries_post()
{

  $deliveryboy_id = $this->post('deliveryboy_id');
  $res = $this->deliveries_model->getalldeliveries($deliveryboy_id);

  if(!empty($res))
  {
     $this->response($res);
  }else{

  	$this->response(
                            array(
                                "Message"=>"No Records Found",
                                "Status_code"=>"401",
                                )
                            );
  }

}

}