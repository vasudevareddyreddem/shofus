<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


	public function __construct() {

		parent::__construct();

		$this->load->model('admin/login_model');
}


 public function index() {


    $this->load->view('admin/login');

    //$this->template->render(); 

  }

public function do_login()

{

       $this->form_validation->set_rules('admin_name', 'Username', 'trim|required'); 
        $this->form_validation->set_rules('admin_password', 'Password', 'trim|required'); 
        if ($this->form_validation->run() == TRUE) {

            $username   = $this->input->post('admin_name');
            $password = $this->input->post('admin_password');
            $result   = $this->login_model->authenticate($username, $password);

//print_r($result); exit;

       if ($result) {


                $data                   = array(

                    'admin_id'    => $result->admin_id,
                    'admin_name'  => $result->admin_name,
                    'admin_email' => $result->admin_email,
                    'loggedin'   => TRUE,

                );



                $this->session->set_userdata($data);

               return redirect(base_url('admin/dashboard')); 

            } else {


            //$this->data['message'] = alert_message('Invalid Username/Password', 'danger');



                $this->session->set_flashdata('msg','<div class="alert alert-success text-center" style="color: red;font-size:13px;">Invalid username or password.</div>');


                  return redirect(base_url('admin/login'));


                }

            }

       $this->load->view('admin/login');


}


 public function logout() {

        $data = array(

            'admin_id'        => '',

            'admin_name'  => '',

            'user_email'     => '',

            'loggedin'  => FALSE,



        );



        $this->session->set_userdata($data);



        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");



        $this->output->set_header("Pragma: no-cache");



        $this->session->sess_regenerate(TRUE);



        //flash_message('Successfully Logged Out', 'success');



        return redirect(base_url('admin/login'));



    }


public function forgot()
{
	$this->load->view('admin/forgot_view');
	
}
    
public function doforget()
	{
		$x=$this->encrypt->encode($this->input->post('admin_email'));
		$x=str_replace(array('+', '/', '='), array('-', '_', '~'), $x);
		
		if ($this->login_model->checkEmailExits($this->input->post('admin_email')))
		{
		$from_email = 'admin@cartinhour.com';
		$subject = 'Reset Your Password';
		$message = "Dear User,\nPlease click on below URL to change the password\n\n dev2.kateit.in/php/infinity/admin/login/changepwd/". $x ."?id=changepwd"."\n\nThanks,\nUncancer Team";
		
		//send mail
		$this->email->from($from_email, 'CART IN HOUR');
		
				$this->email->to($this->input->post('admin_email'));
				$this->email->subject($subject);
				$this->email->message($message);
				$this->email->send();
				
		
			
			 echo '1';
		
        }
		else
		{
			
	   echo '0';
			

		}
		
	
		}
	public function changepwd(){
		
	

	
    
		$this->load->view('admin/changepwd_view');
		
              
    
    }
	
public function changepassword()
{
	
	$this->load->library('form_validation');
	//$this->form_validation->set_rules('Email','Current Email','trim|callback_change');
	$this->form_validation->set_rules('npassword','New Password','required|trim|callback_change');
	$this->form_validation->set_rules('cpassword','Confirm Password','required|trim|matches[npassword]');
	
	if ($this->form_validation->run() == FALSE)
 
    {
    
		$this->load->view('admin/changepwd_view');
		
              
    }
	
}	
	
	
	public function change() 
{
 $z=$this->uri->segment('4');
 $dec_username=str_replace(array('-', '_', '~'), array('+', '/', '='), $z);
 $db_password =$this->encrypt->decode($dec_username);
$fixed_pw = $this->input->post('npassword');
     $update = $this->db->query("Update admin_users SET admin_password='$fixed_pw' WHERE admin_email='$db_password '")or die(mysql_error()); 
if($update)
   
$this->session->set_flashdata('msg1', '<div class="alert alert-success" style="color: #7BAE52;">
<strong>Your Password Updated! Please <a href="'.base_url().'admin/login">Login</a> to Continue</strong></div>');
//return redirect(base_url('home/changepwd_view'));
return false; 

	

}
    



















}