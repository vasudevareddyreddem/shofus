<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model 

{

	public function __construct()
	{

	parent::__construct();

	}

 public function authenticate($username, $password) {

        //$encrypted_password = ($password);

 	        $this->db->where('seller_name',$username);

			$this->db->where('seller_password',$password);

			 $user=$this->db->get('sellers');

       //print_r($user->result()); exit;

        if (!is_null($user)) {

            return $user->row();



        }

        return FALSE;

    }

    

public function checkEmailExits($email)
	{
	$query = $this->db->query("select * from selleradmin_users where selleradmin_email='$email'");
	//echo  $this->db->last_query();
	return $query->result_array();
	}

}