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
	$post=$this->input->post();
	//echo '<pre>';print_r($post);exit;
	$email=$post['admin_email'];
	$users = $this->login_model->forgot_password($email);
	//echo '<pre>';print_r($users);exit;
	if(count($users)>0)
	{
		$this->load->library('email');
		$this->email->from('admin@cartinhour.com', 'CartInHour');
		$this->email->to($email);
		$this->email->subject('CartInHour - Forgot Password');
		$html = "Click this link to reset your password. ".site_url('admin/login/changepwd?code='.base64_encode($email).'__'.base64_encode($users['admin_id']));
		//echo $html;exit;
		$this->email->message($html);
		if($this->email->send())
		{	
		$this->session->set_flashdata('success','Check Your Email to reset your password!');
		redirect('user/forgotpassword');
		}else{
		$this->session->set_flashdata('emailinvalid','Your  email not send!');
		redirect('user/forgotpassword');
		}			
	}else{
		
		$this->session->set_flashdata('emailinvalid','The email you entered is not a registered email. Please try again. ');
		redirect('user/forgotpassword');
	}
	

	}

	public function changepwd(){
		
		$code= $_GET['code'];
		$arr = explode('__',$code);
		$data['email'] = base64_decode($arr[0]);
		$data['userid'] = base64_decode($arr[1]);
		// echo '<pre>';print_r($data);exit;
		$this->load->view('admin/changepwd_view',$data);
	 }
	
public function changepassword()
{
	
	
	$reset_pass = $this->input->post();
	//echo '<pre>';print_r($reset_pass);exit;
		if(isset($reset_pass['npassword']) && $reset_pass['cpassword'] !='' )
		{
			if(!empty($reset_pass['npassword']) && $reset_pass['npassword']== $reset_pass['cpassword'])
			{
				$this->load->model('users_model');
				$users = $this->login_model->update_password($reset_pass);
				if(count($users)>0)
				{
					$this->session->set_flashdata("success","Your password changed successfully!");
					redirect('admin/login');
				}
			}
			else
			{
				$this->session->set_flashdata("error","Passwords are Not matched!");
				redirect('admin/login/changepwd?code='.base64_encode($reset_pass['email']).'__'.base64_encode($reset_pass['userid']));
			}
		}else{
			
			$this->session->set_flashdata("error","Please enter Passwords and Confirm password");
				redirect('admin/login/changepwd?code='.base64_encode($reset_pass['email']).'__'.base64_encode($reset_pass['userid']));
				
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