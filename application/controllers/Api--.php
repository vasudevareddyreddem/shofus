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
          $this->load->model('admin/orders_model');
          $this->load->model('admin/deliveryboy_ratings_model');
          $this->load->model('admin/deliveryboy_location_model');
          
          $this->load->model('users_model');
      
    }

   public function login_post($id)
    {    

        //$username = NULL;

     
        	//echo '<pre>';print_r($id);exit;
			$username = $this->post('admin_name');
        	 $password = md5($this->post('admin_password'));
        	
        $res = $this->login_model->get_data($username,$password);
		echo $this->db->last_query();exit;
        print_r($res);exit;
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

     
           $username = $this->post('deliveryboy_username');
           $password = md5($this->post('deliveryboy_password'));
          
        $res = $this->deliveryboy_model->get_data($username,$password);
       // print_r($res);exit;
        if($res)
                {
                  
                $this->response($res);
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
       
	   if(!empty($_FILES['deliveryboy_photo']['name'])){

                $config['upload_path'] = 'uploads/deliveryboys/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['deliveryboy_photo']['name'];
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('deliveryboy_photo')){
                    $uploadData = $this->upload->data();
					$profile_pic =  base_url("uploads/deliveryboys/" . $uploadData['raw_name'] . $uploadData['file_ext']);

                   $deliveryboy_photo =   $uploadData['raw_name'] . $uploadData['file_ext'];
               }
               else{

               	    $this->prepare_flashmessage("Plz Choose Valid deliveryboy_photo..", 1);
                    echo "<script>window.location='".base_url()."admin/deliveryboys';</script>";
               }

                }else{

                	 $deliveryboy_photo = '';

                }

  	  $data = array(
  	  	'deliveryboy_name' => $this->post('deliveryboy_name'),
  	  	'deliveryboy_email' => $this->post('deliveryboy_email'),
  	  	'deliveryboy_password' => md5($this->post('deliveryboy_password')),
  	  	'deliveryboy_mobile' => $this->post('deliveryboy_mobile'),
               'deliveryboy_alternateno' => $this->post('deliveryboy_alternateno'),
  	  	'deliveryboy_address' => $this->post('deliveryboy_address'),
  	  	'deliveryboy_bike' => $this->post('deliveryboy_bike'),
  	  	'deliveryboy_bikeno' =>$this->post('deliveryboy_bikeno'),
  	  	'deliveryboy_license' => $this->post('deliveryboy_license'),
  	  	'deliveryboy_adhar' => $this->post('deliveryboy_adhar'),
  	  	'deliveryboy_bank' => $this->post('deliveryboy_bank'),
  	  	'deliveryboy_photo' => $deliveryboy_photo

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

       if(!empty($_FILES['deliveryboy_photo']['name'])){

                $config['upload_path'] = 'uploads/deliveryboys/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['deliveryboy_photo']['name'];
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('deliveryboy_photo')){
                    $uploadData = $this->upload->data();
					$profile_pic =  base_url("uploads/deliveryboys/" . $uploadData['raw_name'] . $uploadData['file_ext']);

                   $deliveryboy_photo =   $uploadData['raw_name'] . $uploadData['file_ext'];
               }
               else{

               	     $deliveryboy_photo = $_POST['hidn'];
               }

                }else{

                	 $deliveryboy_photo = $_POST['hidn'];

                }

  	  $data = array(
  	  	'deliveryboy_name' => $this->post('deliveryboy_name'),
  	  	'deliveryboy_email' => $this->post('deliveryboy_email'),
  	  	'deliveryboy_mobile' => $this->post('deliveryboy_mobile'),
  	  	'deliveryboy_alternateno' => $this->post('deliveryboy_alternateno'),
  	  	'deliveryboy_address' => $this->post('deliveryboy_address'),
  	  	'deliveryboy_bike' => $this->post('deliveryboy_bike'),
  	  	'deliveryboy_bikeno' => $this->post('deliveryboy_bikeno'),
  	  	'deliveryboy_license' => $this->post('deliveryboy_license'),
  	  	'deliveryboy_adhar' => $this->post('deliveryboy_adhar'),
  	  	'deliveryboy_bank' => $this->post('deliveryboy_bank'),
  	  	'deliveryboy_photo' => $deliveryboy_photo

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

public function current_location_post()
{

  $id = $this->post('deliveryboy_id');
  $data = array(
  'current_location' => $this->post('current_location')
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
   
   
   public function userlogin_post()
    {    

        //$username = NULL;     
           $username = $this->post('username');
           $password = md5($this->post('password'));
          
        $res = $this->users_model->get_data($username,$password);
       // print_r($res);exit;
        if($res)
                {
                 $username=$res->user_name;
                  $this->response(array('username'=>$username), 200);
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
  
public function user_insert_post()
    {    
        $data = array(
            
                'user_name' => $this->post('user_name'),
  	  	'user_password' => md5($this->post('user_password')),
  	  	'user_email' => $this->post('user_email'),
  	  	'user_mobile' => $this->post('user_mobile'),
  	  	'user_gender' => $this->post('user_gender'),
         );
        // print_r($data);exit;
        $res=$this->users_model->insert($data);

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
    
 public function droporder_post()
    {    

           
           $id =  $this->post('order_id');

        $res = $this->orders_model->get($id);
       // print_r($res);exit;
        if($res)
                {
                  $this->response($res);
                }
             else
            {
             $this->response(
                            array(
                                "Message"=>"No data available",
                                "Status_code"=>"401",
                                )
                            );
                        
            }

  }    
  
  
  
  public function deliveryboy_ratings_post()
    {    

           $data = array(
           "deliveryboy_id" =>  $this->post('deliveryboy_id'),
           "user_id" =>  $this->post('user_id'),
           "rating" =>  $this->post('rating'),
           "feedback" =>  $this->post('feedback'),
           
           );
           

        $res = $this->deliveryboy_ratings_model->insert($data);
       // print_r($res);exit;
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

public function deliveryboy_location_post()
    {    

           $data = array(
           "deliveryboy_id" =>  $this->post('deliveryboy_id'),
           "longitude" =>  $this->post('longitude'),
           "latitude" =>  $this->post('latitude'),
           "location" =>  $this->post('location'),
            "status" =>  $this->post('status'),           
           );
           

        $res = $this->deliveryboy_location_model->insert($data);
       // print_r($res);exit;
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
}