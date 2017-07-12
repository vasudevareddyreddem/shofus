<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model 

{

	public function __construct()

	{

	parent::__construct();

	}

 public function authenticate($username, $password) {

       $sql="SELECT * FROM customers WHERE cust_email ='".$username."' AND cust_password ='".md5($password)."'";
        return $this->db->query($sql)->row_array(); 
    }
	public function forgot_password($email) {

      $this->db->select('*')->from('customers');
		$this->db->where('cust_email',$email);
        return $this->db->get()->row_array();
    }
	function update_password($reset_pass){
		$sql1="UPDATE customers SET cust_password ='".md5($reset_pass['cpassword'])."'WHERE customer_id = '".$reset_pass['userid']."' AND cust_email='".$reset_pass['email']."'";
		return $this->db->query($sql1);
	}

public function get_data($username, $password)

    {
      //  echo $username.$password;exit;
         $this->db->where('admin_name',$username);
            $this->db->where('admin_password',$password);
             $user=$this->db->get('admin_users');
             return $user->result();

    }
  public function checkEmailExits($email)
	{
	$query = $this->db->query("select * from admin_users where admin_email='$email'");
	//echo  $this->db->last_query();
	return $query->result_array();
	}


}