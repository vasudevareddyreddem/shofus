<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model 

{

	public function __construct()
	{

	parent::__construct();

	}

 public function authenticate($username, $password) {

        //$encrypted_password = ($password);

 	        $this->db->where('seller_email',$username);
			$this->db->where('seller_password',$password);
			$this->db->or_where('seller_mobile',$username);

			

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
	
	
	
public function getsubcategories($q)
	{

$this->db->select('*');
    //$this->db->where('cancer_id >', '0');
    $this->db->like('subcategory_name', $q);
	$this->db->group_by('subcategory_name');
    $query = $this->db->get('subcategories');
	
    if($query->num_rows() > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['subcategory_name']));
        $row_set[] = $new_row; //build an array
       //print_r($row_set); 
      }



      echo json_encode($row_set); //format the array into json data
    }




	}	
	
	
public function getreferralfee($subcatname){
	
	
	$this->db->select('*');   
	$this->db->from('subcategories');
    $this->db->join('referral_fee', 'subcategories.subcategory_id = referral_fee.subcategory_id');
    $this->db->where('subcategories.subcategory_name',$subcatname);  
    $query = $this->db->get();
	return $query->row();
	   
	   
	   
		$this->db->where('subcategory_id',$subcatid);
		$data=$this->db->get('referral_fee');
		return $data->row();
		}		
	
public function checksubcat($subcat)
    {
    $this->db->where('subcategory_name',$subcat);
	//$this->db->where('user_type',$user_type);
    $query = $this->db->get('subcategories');
    if ($query->num_rows() > 0){
        return 1;
    }
    else{
        return 0;
    }
}	
	
public function getlocation()
{

$query = $this->db->get('locations');
return $query->result();


}	

public function insertseller($data)
{
	
	
	$this->db->insert('sellers',$data);
			//print_r($data); exit;

		return true;
	
	
	
	
	
	
	
}
	
	
public function checksellerEmail($email,$phone)
    {
    if($email != "")
		{
    $this->db->where('seller_email',$email);
	$this->db->or_where('seller_mobile',$phone);
		}
		else{
			
		$this->db->where('seller_mobile',$phone);	
			
		}
    $query = $this->db->get('sellers');
    if ($query->num_rows() > 0){
        return 1;
    }
    else{
        return 0;
    }
}		
	
	
	
public function getcihcatedata()
{

$this->db->order_by('category_name','asc');
$query = $this->db->get('cih');
return $query->result();



}		
	
public function getcihfeedata($cih)
{
$this->db->where('cih_id',$cih);

$query = $this->db->get('cih');
return $query->row();



}	
	
public function getshippingcharge($product_weight)

{
$this->db->select('shipping_charges');
	$this->db->from('shipping');
	
	$this->db->where('product_weight >=', $product_weight);
	
$this->db->limit('1');

$query = $this->db->get();
	return $query->row();

}		
	
public function getclosingcharge($product_price)

{
$this->db->select('closing_fee');
	$this->db->from('closingfee');
	
	$this->db->where('product_price >=', $product_price);
	
$this->db->limit('1');

$query = $this->db->get();
//echo $this->db->last_query(); exit;
	return $query->row();

}			
	
public function getdeliveryfee()
{

$query = $this->db->get('servicefee');
	return $query->row();


}	


/* Frogot Password  */


public function checkuseremail($email)
{
	
    $this->db->where('seller_email',$email);
	
	//$this->db->where('user_type',$user_type);
    $query = $this->db->get('sellers');
    if ($query->num_rows() > 0){
        return 1;
    }
    else{
        return 0;
    }
	
	
	
}

public function insertrandom($six_digit_random_number,$pat)

{
	
	
	$data = array(
	
	'seller_password' => md5($six_digit_random_number),
	
	);
	
	$this->db->where('seller_id',$pat);
	$query1=$this->db->update('sellers',$data);
	return $query1;
	
	
	
	
}



public function checkusermobile($phone)
{
	
    $this->db->where('seller_mobile',$phone);
	
	//$this->db->where('user_type',$user_type);
    $query = $this->db->get('sellers');
    if ($query->num_rows() > 0){
        return 1;
    }
    else{
        return 0;
    }
	
	
	
}


public function checkusermobileemail($phone,$email)
{
	
    $this->db->where('mobile',$phone);
	$this->db->where('email',$email);
	
	//$this->db->where('user_type',$user_type);
    $query = $this->db->get('partner_inform');
    if ($query->num_rows() > 0){
        return 1;
    }
    else{
        return 0;
    }
	
	
	
}


public function getsellerid($email)
		{
		$this->db->where('seller_email',$email);
		$query = $this->db->get('sellers');
		//print_r($query->result()); exit;
		return $query->row();
		}


public function getsellermobile($phone)
		{
		$this->db->where('seller_mobile',$phone);
		$query = $this->db->get('sellers');
		//print_r($query->result()); exit;
		return $query->row();
		}
public function getselleridall($phone,$email)
		{
		$this->db->where('seller_mobile',$phone);
		$this->db->where('seller_email',$email);
		$query = $this->db->get('sellers');
		//print_r($query->result()); exit;
		return $query->row();
		}
}