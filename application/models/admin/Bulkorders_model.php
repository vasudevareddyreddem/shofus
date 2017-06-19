<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bulkorders_model extends MY_Model 

{



	protected $_table="bulkorders";

	protected $primary_key="order_id";

	protected $soft_delete = FALSE;

    public $before_create = array( 'created_at', 'updated_at' );

    public $before_update = array( 'updated_at' );



	public function __construct()



	{

	parent::__construct();



	}

	

	public function get_allorderdetails(){

			

     $this->db->select('*');

	$this->db->from('tbl_orders');
    $this->db->order_by("order_id","desc");
	//$this->db->join('food', 'food.food_id = tbl_orders.food_id');

			$data=$this->db->get();

			

			return $d=$data->result();

			

			}



	public function delete($id)



	{

	   $this->db->where('order_id',$id);



	    $query=$this->db->delete('tbl_orders');



	    return true;



	}

	public function getviewdata($id)



	{


$this->db->select('*');
	$this->db->from('tbl_orders');
	//$this->db->join('food', 'food.food_id = tbl_orders.food_id');
	$this->db->where('tbl_orders.order_id',$id);
	 
	$query = $this->db->get();
	return $query->row();


	}

public function geteditdata($id)



	{


$this->db->select('*');
	$this->db->from('tbl_orders');
	$this->db->join('food', 'food.food_id = tbl_orders.food_id');
	$this->db->where('tbl_orders.order_id',$id);
	 
	$query = $this->db->get();
	return $query->row();


	}
	

public function search(){

    $this->db->select('*');
	$this->db->from('tbl_orders');
	$this->db->join('food', 'food.food_id = tbl_orders.food_id');
	//$this->db->where('tbl_orders.order_id',$id);
    $match = $this->input->post('search');
    //echo $match;
    //exit;
	$this->db->like('user_name',$match);
	$this->db->or_like('order_id', $match);
	$this->db->or_like('food_name', $match);
    $this->db->or_like('phone', $match);
     $this->db->or_like('email', $match);
     $this->db->or_like('address', $match);
	$query = $this->db->get();
	return $query->result();

}
	

	

}