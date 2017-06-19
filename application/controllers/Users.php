<?php

defined('BASEPATH') OR exit('No direct script access allowed');



@include_once( APPPATH . 'controllers/Front_Controller.php');

class Users extends Front_Controller 

{

public function __construct() 
  {

		parent::__construct();
		//$this->load->model('Home_model');
    $this->load->library('email');
		$this->load->helper("url");
		$this->load->model("users_model");
    $this->load->library('encrypt');
	
 }

  public function index()

	{ 

    $id = current_user()->user_id;
    $data['Ordersdata'] = $this->users_model->get_orders($id);
//echo "<pre>"; print_r($data); exit;
	   $this->template->write_view('content', 'users/index',$data);
    $this->template->render(); 

  }


  public function change_password()
{

   $this->template->write_view('content', 'users/changepassword');
   $this->template->render();

}

public function updatepassword()

  {


    if( $this->form_validation->run('changepassword_rules'))

    {
        $this->load->model('home_model');
           $old_password =  md5($this->input->post('old_password'));
           $new_password =  md5($this->input->post('new_password'));
           $repeat_password =  $this->input->post('repeat_password');      
           $user_id = current_user()->user_id;
         //  echo $user_id; exit;

          if($user_id)

          {

             $result=$this->users_model->get($user_id);
           //  print_r($result); exit;

            $password = $result->user_password;
         /*   echo $password."<br>";
             echo $old_password;
            exit; */

          if($password == $old_password){

          $data = array(

            'user_password' => md5($this->input->post('new_password'))

            );
             //print_r($data);
             //exit;
         $res=$this->users_model->update($user_id,$data);
          if($res)
         {
              $this->prepare_flashmessage("Successfully Updated Your Password..", 0);
              return redirect('users/change_password');
          }
          else
          {
                $this->prepare_flashmessage("Failed to Update Your Password..", 1);
                return redirect(base_url('users/change_password'));
          }
          //echo "hello";
         }else{

                 $this->prepare_flashmessage("Please Enter Current Password Correctly ..", 1);
                  return redirect(base_url('users/change_password'));
              }

}

}else{
        $this->template->write_view('content', 'users/changepassword');
        $this->template->render();

  }
}





public function viewprofile()
{

     $id = current_user()->user_id;
     $data['userdata'] = $this->users_model->get($id);
    //echo "<pre>"; print_r($data); exit;
     $this->template->write_view('content', 'users/view_profile',$data);
     $this->template->render(); 
}

public function edit_profile()
  {
    $id = $this->uri->segment(3); 
    $result=$this->users_model->get($id);
    $data['userdata'] = null;
    if($result)
    {
    $data['userdata'] = $result;
    }
    
    $this->template->write_view('content', 'users/edit_profile',$data);
    $this->template->render();
  }


public function update_profile()
    {
       $id = $this->uri->segment(3);
       $data = array(
               'user_name' => $this->input->post('user_name'),
                'user_email'     => $this->input->post('user_email'),
                'user_password'  => md5($this->input->post('user_password')),
                 'user_mobile'     => $this->input->post('user_mobile'),
              //  'user_address'  => $this->input->post('user_address'),             
            );
 
      
       $res=$this->users_model->update($id,$data);
      if($res)
      {
          $this->prepare_flashmessage("Successfully Updated..", 0);
              echo "<script>window.location='".base_url()."users/viewprofile';</script>";
      }
      else
      {

      $this->prepare_flashmessage("Failed to Update..", 1);   
      echo "<script>window.location='".base_url()."users/viewprofile';</script>";
      }

  }      

 }      