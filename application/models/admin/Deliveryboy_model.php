<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class deliveryboy_model extends MY_Model 

{

	protected $_table="deliveryboy";
	protected $primary_key="deliveryboy_id";
	protected $soft_delete = FALSE;
    public $before_create = array( 'created_at', 'updated_at' );
    public $before_update = array( 'updated_at' );

	public function __construct()
	{
	parent::__construct();
	}


public function search(){

    $match = $this->input->post('search');
	$this->db->like('deliveryboy_name',$match);
	$this->db->or_like('deliveryboy_email',$match);
	$this->db->or_like('deliveryboy_mobile',$match);
	$this->db->or_like('deliveryboy_address',$match);
	$this->db->or_like('deliveryboy_bike',$match);
	$this->db->or_like('deliveryboy_bikeno',$match);
	$this->db->or_like('deliveryboy_license',$match);
	$this->db->or_like('deliveryboy_adhar',$match);
	$this->db->or_like('deliveryboy_bank',$match);
	$query = $this->db->get('deliveryboy');
	return $query->result();
}

public function get_data($username, $password)

    {
      //  echo $username.$password;exit;
        $this->db->where("(deliveryboy_email LIKE '$username' OR deliveryboy_mobile LIKE '$username')"  );
            $this->db->where('deliveryboy_password',$password);
             $user=$this->db->get('deliveryboy');
             return $user->result();

    }

}